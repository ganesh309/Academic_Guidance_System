<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Mentee;
use App\Models\Gender;
use App\Models\Batch;
use App\Models\Semester;
use App\Models\School;
use App\Models\Degree;
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
                      ->where('password', $request->password)
                      ->first();
        if ($admin) {
            session(['admin_logged_in' => true]);
            Auth::guard('admin')->login($admin);
            session(['admin_email' => $request->email]);
            return redirect()->route('students.index');
        }

        return back()->with('error', 'Invalid credentials!');
    }


//------------------------------------------Dash-Board-------------------------------------//
    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        return view('admin.dashboard');
    }

//---------------------------------------------All Students List----------------------------------------//
    
    public function studentsList(Request $request)
    {
        $query = Student::with(['academic', 'batch', 'degree', 'gender', 'school', 'semester', 'country', 'state', 'district']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('registration_no', 'like', "%$search%")
                ->orWhere('fname', 'like', "%$search%")
                ->orWhere('lname', 'like', "%$search%")
                ->orWhere('uid', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('mobile', 'like', "%$search%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender_id', $request->gender);
        }

        if ($request->filled('batch')) {
            $query->where('batch_id', $request->batch);
        }

        if ($request->filled('semester')) {
            $query->where('semester_id', $request->semester);
        }

        if ($request->filled('school')) {
            $query->where('school_id', $request->school);
        }

        if ($request->filled('degree')) {
            $query->where('degree_id', $request->degree);
        }

        $students = $query->paginate(3);

        $genders = Gender::all();
        $batches = Batch::all();
        $semesters = Semester::all();
        $schools = School::all();
        $degrees = Degree::all();

        return view('students.index', compact('students', 'genders', 'batches', 'semesters', 'schools', 'degrees'));
    }

//----------------------------------------menteeslist--------------------------------------------------//
    public function menteesList()
    {
        $students = Student::with(['degree', 'school', 'mentee'])
                    ->where('sgpa', '<', 6)
                    ->get();

        $faculties = Faculty::all();

        return view('mentees.index', compact('students', 'faculties'));
    }

//------------------------------------------AsignMentor---------------------------------------------//
    public function assignMentor(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'mentor_id'  => 'required|exists:faculties,id',
        ]);

        $student = Student::findOrFail($request->student_id);
        $faculty = Faculty::findOrFail($request->mentor_id);

        $mentor = Mentor::where('faculty_id', $faculty->id)->first();

        if (!$mentor) {
            $mentor = Mentor::create([
                'faculty_id' => $faculty->id,
                'email'  => $faculty->email,
                'password'   => hash('sha256', $faculty->email),
            ]);
        }

        $mentee = Mentee::where('student_id', $student->id)->first();
        if ($mentee) {

            if ($mentee->mentor_id == $mentor->id) {
                return redirect()->back()->withErrors(['mentor_id' => 'New mentor cannot be the same as the current mentor.']);
            }

            $mentee->mentor_id = $mentor->id;
            $mentee->save();

            Mail::to($student->email)->send(new MentorChangedForStudentMail($student, $mentor));
            Mail::to($faculty->email)->send(new MenteeAssignedToMentorMail($student, $mentor));

            return redirect()->route('mentees.index')->with('success', 'Mentor changed successfully!');
        } else {
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

//----------------------------------------------MentorMentee list--------------------------------------//

    public function mentorMenteeList()
    {

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
