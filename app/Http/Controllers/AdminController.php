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
use Illuminate\Support\Facades\Http;

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
            return view('students.index', compact('students', 'genders', 'batches', 'semesters', 'schools', 'degrees', 'title'));
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
                ->where('attendance', true)
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // Fetch total classes per month (all records, regardless of attendance)
            $monthlyTotalClasses = Attendance::selectRaw('DATE_FORMAT(date, "%Y-%m") as month, COUNT(*) as total_classes')
                ->where('student_id', $student->id)
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->keyBy('month');

            $monthly = [];
            $drilldown = [];

            foreach ($monthlyAttendance as $record) {
                $monthName = Carbon::createFromFormat('Y-m', $record->month)->format('F Y');
                $totalClasses = $monthlyTotalClasses->get($record->month)->total_classes ?? 0;

                // Fetch subject-wise attendance for this month
                $subjectAttendance = Attendance::select('subjects.name', DB::raw('COUNT(*) as total'))
                    ->join('subjects', 'attendances.subject_id', '=', 'subjects.id')
                    ->where('attendances.student_id', $student->id)
                    ->where('attendances.attendance', true)
                    ->whereRaw('DATE_FORMAT(attendances.date, "%Y-%m") = ?', [$record->month])
                    ->groupBy('subjects.name')
                    ->pluck('total', 'subjects.name')
                    ->toArray();

                // Fetch total classes per subject for this month
                $subjectTotalClasses = Attendance::select('subjects.name', DB::raw('COUNT(*) as total_classes'))
                    ->join('subjects', 'attendances.subject_id', '=', 'subjects.id')
                    ->where('attendances.student_id', $student->id)
                    ->whereRaw('DATE_FORMAT(attendances.date, "%Y-%m") = ?', [$record->month])
                    ->groupBy('subjects.name')
                    ->pluck('total_classes', 'subjects.name')
                    ->toArray();

                $drillData = [];
                foreach ($subjectAttendance as $subject => $total) {
                    $drillData[] = [
                        'subject' => $subject,
                        'attendance' => $total,
                        'total_classes' => $subjectTotalClasses[$subject] ?? 0
                    ];
                }

                $monthly[] = [
                    'name' => $monthName,
                    'y' => $record->total,
                    'total_classes' => $totalClasses,
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
            Log::error("Error in attendanceChart: " . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch attendance data'], 500);
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

    public function generateReport(Request $request)

    {
        try{
         Log::info('in the generateReport admin controller function');
         Log::info('generateReport mentor: ', (array) $request->input('mentee_id'));
        // $validateData = $request->validate(
        //     [
        //         'mentee_id' => 'required|exists:mentees,id'
        //     ]
        // );
        // Log::info('generateReport mentor: ', (array) $validateData['mentee_id']);

        // $text = Admin::getMenteeInteractions($validateData['mentee_id']);
        $text = Admin::getMenteeInteractions(3);


        $response = Http::withHeaders([
            'Authorization' => 'Bearer YOUR_HUGGINGFACE_API_TOKEN',
        ])->post('https://api-inference.huggingface.co/models/facebook/bart-large-cnn', [
            'inputs' => $text,
        ]);
        dd($response);
        }
        catch (Exception $e) {
            Log::info("error from the admin Controller function - generateReport: ", (array) $e);
        }

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
