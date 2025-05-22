<?php



namespace App\Http\Controllers;

use App\Mail\UniversityMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GenerateSummaryJob;




ini_set('display_errors', 1);
error_reporting(E_ALL);

class MentorController extends Controller
{
    public function showLoginForm()
    {
        $title = "Mentor Login";
        $success = 'Login Successful!';
        return view('mentor.login',compact('title','success'));
    }

    public function mentorDashBoard()
    {
        $email = session('mentor_email');
        $faculty = Mentor::getFacultyData($email);

        // Step 1: Fetch gender distribution from DB
        $genderCounts = DB::table('students')
            ->select('gender_id', DB::raw('count(*) as total'))
            ->groupBy('gender_id')
            ->pluck('total', 'gender_id')
            ->toArray();

        // Step 2: Map gender_id to labels for Highcharts
        $mappedData = [];

        $genderMap = [
            1 => 'Male',
            2 => 'Female',
            3 => 'Third Gender'
        ];

        foreach ($genderMap as $id => $label) {
            $mappedData[] = [
                'name' => $label,
                'y' => $genderCounts[$id] ?? 0
            ];
        }
        $title = "Mentor Home";
        return view('mentor.mentorHome', compact('faculty', 'mappedData','title'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $mentor = Mentor::where('email', $request->email)->first();
        $password = hash('sha256', $request->password);
        // Log::info('Hashed Password: ',(array) $password);
        if (!$mentor || ($password != $mentor->password)) {
            // Log::info($mentor->toArray());
            $title = "Mentor login";
            $error = "Invalid email or password";
            return redirect()->route('mentor.login',['error' => $error]);
        }
        // Log::info($mentor->toArray());
        if (!$mentor->password_updated) {
            session(['mentor_id' => $mentor->id]);
            $title = "Password Update Mentor";
            return redirect()->route('mentor.update-password',['title' => $title]);
        }

        Auth::guard('mentor')->login($mentor);
        $faculty = Mentor::getFacultyData($request->email);
        session(['mentor_email' => $faculty->email]);
        $title = "Mentor Home";
        return view('mentor.mentorHome', compact('faculty','title'));
    }

    public function logout(Request $request)
    {
        Auth::guard('mentor')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $title = "Home";
        return redirect()->route('welcome',['title' => $title]);
    }

    public function showUpdatePasswordForm()
    {
        if (!session()->has('mentor_id')) {
            Log::info('Showing password update form');
            return redirect()->route('mentor.login');
        }
        $title = "Password Update Mentor";
        return view('mentor.update-password',compact('title'));
    }

    public function savePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $mentor = Mentor::find(session('mentor_id'));
        if (!$mentor) {
            $error = "Something went wrong";
            return redirect()->route('mentor.login',['error' => $error]);
        }

        $mentor->password = hash('sha256', $request->password);
        $mentor->password_updated = 1;
        $mentor->save();
        session()->forget('mentor_id');
        return redirect()->route('mentor.login',['success' => 'Password updated successfully. Please log in again.' ]);
    }

    public function showInMentees()
    {
        $email = session('mentor_email');
        $mentees = Mentor::getAllMentees($email);
        $title = "Mentee List Mentor";
        return view('mentor.menteesMentor', compact('mentees','title'));
    }

    public function showNewInteractionForm(Request $request, $id)
    {
        $title = "New Interaction";
        return view('mentor.newInteractionMentor', compact('id','title'));
    }

    public function submitNewInteractionForm(Request $request, $id)
    {

        try {
            Log::info('in the controller function');
            $validateData = $request->validate([
                'date' => 'required|date',
                'attendance' => 'required|string|max:10',
                'interaction' => 'required|string|max:2000',
                'problem_understood' => 'required|string|max:2000',
                'remedy' => 'required|string|max:2000',
                'observation' => 'required|string|max:2000'
            ]);

            $success = Mentor::submitNewInteraction($id, $validateData);
            if (!$success) {
                $error = 'Data insert failed';
                Log::error('Data insert failed', ['error_message' => $error]);
                $title = 'New Interaction';
                return view('mentor.newInteractionMentor', compact('id', 'error'));
            }
                        // Log::info("Successfull");

             GenerateSummaryJob::dispatch($id);
            $email = session('mentor_email');
            $mentees = Mentor::getAllMentees($email);
            $title = "Mentee List Mentor";
            $success = "Interaction Data Submitted!";
            return view('mentor.menteesMentor', compact('mentees','title','success'));
        } catch (ValidationException $e) {
            $error = $e->getMessage();
            Log::error('Data insert failed', ['error_message' => $e->getMessage()]);
            $title = 'New Interaction';
            return view('mentor.newInteractionMentor', compact('id', 'error'));
        } catch (\Exception $e) {
            $error = $e->getMessage();
            Log::error('Data insert failed', ['error_message' => $e->getMessage()]);
            $title = 'New Interaction';
            return view('mentor.newInteractionMentor', compact('id', 'error'));
        }
    }

    public function viewInteractions(Request $request, $id)
    {
        $data = Mentor::getAllInteractions($id);
        $mentee = $data['mentee'];
        $dates = $data['interactions'];
        $title = "View Interactions";
        return view('mentor.viewInteractionsMentor', compact('dates', 'mentee','title'));
    }

    public function fetchInteraction(Request $request, $mentee_id)
    {
        $date = $request->input('date');
        Log::info("Mentee_id", (array) $mentee_id);

        $interaction = Mentor::fetchInteractionData($mentee_id, $date);
        // DB::table('interactions')
        //     ->where('mentee_id',$mentee_id,)->where('date',$date)
        //     ->first();

        if (!$interaction) {
            return "<p>No data found for this date.</p>";
        }

        return view('partials.interaction_details', compact('interaction', 'mentee_id'));
    }
    public function ShoweditInteractionForm(Request $request, $mentee_id, $interaction_id, $date)
    {
        $interaction = Mentor::fetchInteractionData($mentee_id, $date);
        $title = "Edit Interaction";
        return view('mentor.editInteractionMentor', compact('mentee_id', 'interaction_id', 'date', 'interaction','title'));
    }

    public function submitEditedInteractionForm(Request $request, $mentee_id, $interaction_id, $date)
    {

        try {
            Log::info('in the submitEditedInteractionForm controller function');
            $validateData = $request->validate([
                'attendance' => 'required|string|max:10',
                'interaction' => 'required|string|max:2000',
                'problem_understood' => 'required|string|max:2000',
                'remedy' => 'required|string|max:2000',
                'observation' => 'required|string|max:2000'
            ]);

            $success = Mentor::submitEditedInteraction($mentee_id, $interaction_id, $date, $validateData);
            Log::info('Success: ', (array) $success);
            if (!$success) {
                $error = 'Data Updation failed';
                Log::error('Data insert failed', ['error_message' => $error]);
                $title = 'Edit Interaction';
                return redirect()->route('edit-interactions', ['mentee_id' => $mentee_id, "interaction_id" => $interaction_id, "date" => $date,'title' =>$title]);
            }
            $success = "Update Successfull";
             GenerateSummaryJob::dispatch($mentee_id);

            return redirect()->route('view-interactions', ['id' => $mentee_id,'success' => $success]);
        } catch (ValidationException $e) {
            $error = $e->getMessage();
            Log::error('Data insert failed', ['error_message' => $e->getMessage()]);
            $title = 'Edit Interaction';
            return redirect()->route('edit-interactions', ['mentee_id' => $mentee_id, "interaction_id" => $interaction_id, "date" => $date]);
            // return view('mentor.editInteractionMentor', compact('mentee_id', 'interaction_id','date', 'interaction', 'error'));
        } catch (\Exception $e) {
            $error = $e->getMessage();
            Log::error('Data insert failed', ['error_message' => $e->getMessage()]);
            $title = 'Edit Interaction';
            return redirect()->route('edit-interactions', ['mentee_id' => $mentee_id, "interaction_id" => $interaction_id, "date" => $date]);
        }
    }


    public function setAppointmentWithMentee(Request $request, $mentee_id)
    {
        try {
            Log::info('in the setAppointmentWithMentee controller function');
            $message = $request->validate([
                'date' => 'required|date',
                'time' => 'required|date_format:H:i'
            ]);
            $mentor_email = session('mentor_email');
            Log::info('Validated');
            $mentee = Mentor::getMenteeBasic($mentee_id);
            $mentor_mobile = Mentor::getMentorContact($mentor_email);
            Log::info('Mail yet to be send');
            $date = $message['date'];
            $time = $message['time'];
            Mail::to($mentee->email)->send(new UniversityMail($mentee, $date, $time, $mentor_mobile));
            Log::info('Mail has been sent.');
            return redirect()->route('mentor.mentees',['success' => "Appointment set done!"]);
        } catch (ValidationException $e) {
            $error = $e->getMessage();
            Log::error('Failed to send mail', ['error_message' => $e->getMessage()]);
            $title = 'Mentees';
            return redirect()->route('mentor.mentees', compact('error'));
        } catch (\Exception $e) {
            $error = $e->getMessage();
            Log::error('Failed to send mail', ['error_message' => $e->getMessage()]);
            $title = 'Mentees';
            return redirect()->route('mentor.mentees', compact('error'));
        }
    }
}
