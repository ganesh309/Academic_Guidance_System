<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Mentee;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\MentorAssignedToStudentMail;
use App\Mail\MentorChangedForStudentMail;
use App\Mail\MenteeAssignedToMentorMail;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)
                      ->where('password', $request->password) // plain text check
                      ->first();

        if ($admin) {
            session(['admin_logged_in' => true]);
            Auth::guard('admin')->login($admin);
            session(['admin_email' => $request->email]);
            return redirect()->route('students.index');
        }

        return back()->with('error', 'Invalid credentials!');
    }






    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        return view('admin.dashboard');
    }

    public function studentsList()
    {
        $students = Student::with(['academic', 'batch', 'degree', 'gender', 'school', 'semester', 'country', 'state', 'district'])->get();
        return view('students.index', compact('students'));
    }

    public function menteesList()
{
    // Get all students with SGPA below 6 and load relationships
    $students = Student::with(['degree', 'school', 'mentee'])
                ->where('sgpa', '<', 6)
                ->get();

    $faculties = Faculty::all();

    return view('mentees.index', compact('students', 'faculties'));
}


    public function assignMentor(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'mentor_id'  => 'required|exists:faculties,id',
    ]);

    $student = Student::findOrFail($request->student_id);
    $faculty = Faculty::findOrFail($request->mentor_id);

    // Check if mentor already exists in mentors table
    $mentor = Mentor::where('faculty_id', $faculty->id)->first();

    if (!$mentor) {
        // Create new mentor if not present
        $mentor = Mentor::create([
            'faculty_id' => $faculty->id,
            'email'  => $faculty->email,
            'password'   => hash('sha256', $faculty->email),
        ]);
    }

    // Check if mentee already exists for this student
    $mentee = Mentee::where('student_id', $student->id)->first();

    if ($mentee) {
        // Change mentor (update)
        $mentee->mentor_id = $mentor->id;
        $mentee->save();

        Mail::to($student->email)->send(new MentorChangedForStudentMail($student, $mentor));
        Mail::to($faculty->email)->send(new MenteeAssignedToMentorMail($student, $mentor));

        return redirect()->route('mentees.index')->with('success', 'Mentor changed successfully!');
    } else {
        // Assign new mentor (create)
        Mentee::create([
            'student_id' => $student->id,
            'mentor_id'  => $mentor->id,
            'email'  => $student->email,
            'password'   => hash('sha256', $student->email),
        ]);

        Mail::to($student->email)->send(new MentorAssignedToStudentMail($student, $mentor));
        Mail::to($faculty->email)->send(new MenteeAssignedToMentorMail($student, $mentor));

        return redirect()->route('mentees.index')->with('success', 'Mentor assigned successfully!');
    }
}



public function mentorMenteeList()
{
    // Eager load related faculty and mentees, and for each mentee, load the student
    $mentors = Mentor::with(['faculty', 'mentees.student'])->get();

    return view('mentor-mentees.index', compact('mentors'));

}

    public function logout(Request $request)
    {
        session()->forget('admin_logged_in');
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
