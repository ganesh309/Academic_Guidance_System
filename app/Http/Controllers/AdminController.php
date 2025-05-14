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
use App\Models\Attendance;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\MentorAssignedToStudentMail;
use App\Mail\MentorChangedForStudentMail;
use App\Mail\MenteeAssignedToMentorMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        $title = "Login Admin";
        return view('admin.login', compact('title'));
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
            $title = "Students Admin";
            return redirect()->route('students.index', ['success' => "Login Successfull!", 'title' => $title]);
        }
        return redirect()->route('admin.login', ['error' => "Invalid credentials!"]);
    }


    //------------------------------------------Dash-Board-------------------------------------//
    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            $title = "Login Admin";
            return redirect()->route('admin.login', ['error' => "Please login first.", 'title' => $title]);
        }
        $title = "Dashboard Admin";
        return view('admin.dashboard', 'title');
    }

    //---------------------------------------------All Students List----------------------------------------//

    // public function studentsList(Request $request)
    // {
    //     try {
    //         $query = Student::with(['academic', 'batch', 'degree', 'gender', 'school', 'semester', 'country', 'state', 'district']);

    //         if ($request->filled('search')) {
    //             $search = $request->search;
    //             $query->where(function ($q) use ($search) {
    //                 $q->where('registration_no', 'like', "%$search%")
    //                     ->orWhere('fname', 'like', "%$search%")
    //                     ->orWhere('lname', 'like', "%$search%")
    //                     ->orWhere('uid', 'like', "%$search%")
    //                     ->orWhere('email', 'like', "%$search%")
    //                     ->orWhere('mobile', 'like', "%$search%");
    //             });
    //         }

    //         if ($request->filled('gender')) {
    //             $query->where('gender_id', $request->gender);
    //         }

    //         if ($request->filled('batch')) {
    //             $query->where('batch_id', $request->batch);
    //         }

    //         if ($request->filled('semester')) {
    //             $query->where('semester_id', $request->semester);
    //         }

    //         if ($request->filled('school')) {
    //             $query->where('school_id', $request->school);
    //         }

    //         if ($request->filled('degree')) {
    //             $query->where('degree_id', $request->degree);
    //         }


    //         $perPage = $request->input('per_page', 5);
    //         $students = $query->paginate($perPage);


    //         $genders = Gender::all();
    //         $batches = Batch::all();
    //         $semesters = Semester::all();
    //         $schools = School::all();
    //         $degrees = Degree::all();

    //         $title = "Students Admin";
    //         return view('students.index', compact('students', 'genders', 'batches', 'semesters', 'schools', 'degrees', 'title'));
    //     } catch (Exception $e) {
    //         Log::info("error from the admin Controller function - studentsList: ", (array) $e);
    //     }
    // }


    // public function attendanceChart(Student $student)
    // {
    //     try {
    //         $monthlyAttendance = Attendance::selectRaw('DATE_FORMAT(date, "%Y-%m") as month, COUNT(*) as total')
    //             ->where('student_id', $student->id)
    //             ->where('attendance', true)
    //             ->groupBy('month')
    //             ->orderBy('month')
    //             ->get();

    //         $monthly = [];
    //         $drilldown = [];

    //         foreach ($monthlyAttendance as $record) {
    //             $monthName = Carbon::createFromFormat('Y-m', $record->month)->format('F Y');

    //             $subjects = Attendance::select('subjects.name', DB::raw('COUNT(*) as total'))
    //                 ->join('subjects', 'attendances.subject_id', '=', 'subjects.id')
    //                 ->where('attendances.student_id', $student->id)
    //                 ->where('attendances.attendance', true)
    //                 ->whereRaw('DATE_FORMAT(attendances.date, "%Y-%m") = ?', [$record->month])
    //                 ->groupBy('subjects.name')
    //                 ->pluck('total', 'subjects.name')
    //                 ->toArray();

    //             $drillData = [];
    //             foreach ($subjects as $subject => $total) {
    //                 $drillData[] = [$subject, $total];
    //             }

    //             $monthly[] = [
    //                 'name' => $monthName,
    //                 'y' => $record->total,
    //                 'drilldown' => $record->month
    //             ];

    //             $drilldown[] = [
    //                 'id' => $record->month,
    //                 'name' => $monthName . ' Subjects',
    //                 'data' => $drillData
    //             ];
    //         }

    //         return response()->json([
    //             'monthly' => $monthly,
    //             'drilldown' => $drilldown
    //         ]);
    //     } catch (Exception $e) {
    //         Log::info("error from the admin Controller function - attendanceChart: ", (array) $e);
    //     }
    // }
   
public function studentsList(Request $request)
{
try {
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

    $perPage = $request->input('per_page', 5);
    $students = $query->paginate($perPage);

    $genders = Gender::all();
    $batches = Batch::all();
    $semesters = Semester::all();
    $schools = School::all();
    $degrees = Degree::all();
$title = "Students Admin";
            return view('students.index', compact('students', 'genders', 'batches', 'semesters', 'schools', 'degrees','title'));
        } catch (Exception $e) {
            Log::info("error from the admin Controller function - studentsList: ", (array) $e);
        }
    
}




/**
 * Return attendance chart data and student details for the modal.
 */
public function attendanceChart(Student $student)
{
try {
    // Fetch monthly attendance (count of present days)
    $monthlyAttendance = Attendance::selectRaw('DATE_FORMAT(date, "%Y-%m") as month, COUNT(*) as total')
        ->where('student_id', $student->id)
        ->where('attendance', true) // Count only present days
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $monthly = [];
    $drilldown = [];

    foreach ($monthlyAttendance as $record) {
        $monthName = Carbon::createFromFormat('Y-m', $record->month)->format('F Y');

        // Fetch subject-wise attendance for this month
        $subjects = Attendance::select('subjects.name', DB::raw('COUNT(*) as total'))
            ->join('subjects', 'attendances.subject_id', '=', 'subjects.id')
            ->where('attendances.student_id', $student->id)
            ->where('attendances.attendance', true)
            ->whereRaw('DATE_FORMAT(attendances.date, "%Y-%m") = ?', [$record->month])
            ->groupBy('subjects.name')
            ->pluck('total', 'subjects.name')
            ->toArray();

        $drillData = [];
        foreach ($subjects as $subject => $total) {
            $drillData[] = [$subject, $total];
        }

        $monthly[] = [
            'name' => $monthName,
            'y' => $record->total,
            'drilldown' => $record->month
        ];

        $drilldown[] = [
            'id' => $record->month,
            'name' => $monthName . ' Subjects',
            'data' => $drillData
        ];
    }

    // Find the image file
    $imagePath = public_path('studentImages/' . $student->uid . '.*');
    $imageFile = glob($imagePath)[0] ?? null;
    $imageFilename = $imageFile ? basename($imageFile) : null;

    // Prepare student details
    $studentData = [
        'uid' => $student->uid,
        'image_filename' => $imageFilename,
        'degree' => ['name' => optional($student->degree)->name ?? 'N/A'],
        'semester' => ['name' => optional($student->semester)->name ?? 'N/A'],
        'batch' => ['name' => optional($student->batch)->name ?? 'N/A']
    ];

    return response()->json([
        'monthly' => $monthly,
        'drilldown' => $drilldown,
        'student' => $studentData
    ]);
} catch (Exception $e) {
            Log::info("error from the admin Controller function - attendanceChart: ", (array) $e);
        }
}
    //----------------------------------------menteeslist--------------------------------------------------//
    public function menteesList()
    {
        try {
            $students = Student::with(['degree', 'school', 'mentee'])
                ->where('sgpa', '<', 6)
                ->get();

            $faculties = Faculty::all();

            $title = "Mentees Admin";
            return view('mentees.index', compact('students', 'faculties', 'title'));
        } catch (Exception $e) {
            Log::info("error from the admin Controller function - menteesList: ", (array) $e);
        }
    }

    //------------------------------------------AsignMentor---------------------------------------------//
    public function assignMentor(Request $request)
    {
        try {
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

                $title = "Mentees Admin";
                return redirect()->route('mentees.index', ['success' => "Mentor changed successfully!", 'title' => $title]);
            } else {
                Mentee::create([
                    'student_id' => $student->id,
                    'mentor_id'  => $mentor->id,
                    'email'  => $student->email,
                    'password'   => hash('sha256', $student->email),
                ]);

                Mail::to($student->email)->send(new MentorAssignedToStudentMail($student, $mentor));
                Mail::to($faculty->email)->send(new MenteeAssignedToMentorMail($student, $mentor));
                $title = "Mentees Admin";
                return redirect()->route('mentees.index', ['success' => "Mentor assigned successfully!", 'title' => $title]);
            }
        } catch (ValidationException $e) {
            Log::info("error from the admin Controller function - assignMentor: ", (array) $e);
        } catch (Exception $e) {
            Log::info("error from the admin Controller function - assignMentor: ", (array) $e);
        }
    }

    //----------------------------------------------MentorMentee list--------------------------------------//

    public function mentorMenteeList()
    {
        try {
            $mentors = Mentor::with(['faculty', 'mentees.student'])->get();

            $title = "Mentor-Mentee List";
            return view('mentor-mentees.index', compact('mentors', 'title'));
        } catch (Exception $e) {
            Log::info("error from the admin Controller function - mentorMenteeList: ", (array) $e);
        }
    }

    public function text()
    {
        $text = "The sun hadn’t risen yet, but Arjun was already awake.

Eyes staring at the cracked ceiling of his one-room house in a Kolkata suburb, he lay there listening to the sound of rain tapping on the tin roof. His alarm hadn’t even rung yet. But the storm inside him had. Again.

His father, a daily wage laborer, lay asleep on the floor beside his mother and younger sister. They had no bed. No table. No fridge. Just hope—and a second-hand Dell laptop with a broken hinge, rescued from a scrap shop.

Arjun’s journey wasn’t poetic. It was raw. Gritty. Not the stuff Instagram reels are made of. He didn’t have fancy headphones while studying or a sunset-lit desk aesthetic. He had torn notes, unstable electricity, and a dream: to become a computer engineer.

He zipped up his worn-out bag and stepped out into the grey morning, his sneakers squelching in the wet mud. A local train ride to the city, standing all the way because he couldn’t afford the luxury of a seat, was his daily reality. His government school had unreliable teachers, so he taught himself Python and JavaScript from whatever PDFs he could find. No Udemy. No YouTube Premium. Just pirated eBooks and patience.

His classmates often mocked him for being quiet, for wearing the same two shirts every week. “Techie beggar,” one whispered once. Arjun smiled. Because they didn’t know the hunger burning inside him. Not just for food—but for transformation.

College entrance exams loomed like a monster, one he had to slay without coaching or support. Every evening after school, he’d work at a small cyber café, fixing malware-ridden systems for ₹100 a day. That money wasn’t just survival. It was investment—into his data pack, his exam forms, and sometimes, a vada-pav dinner when the hunger pangs got too loud.

In moments of darkness, when the failures piled up—mock test scores too low, sleep too little—Arjun would think of giving up. But then he’d remember his mother saying, “Tui hariye gele, amra sabai hariye jabo.” If you give up, we all will lose.";
    }

    public function logout(Request $request)
    {
        session()->forget('admin_logged_in');
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome', ['success' => 'Logged out successfully!', 'title' => "University"]);
    }
}
