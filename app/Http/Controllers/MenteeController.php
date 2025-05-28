<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentee;
use App\Models\Mentor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Mail\RequestPasswordMentee;



class MenteeController extends Controller
{
    public function showLoginForm()
    {
        $title = "Mentee Login";
        return view('mentee.login', compact('title'));
    }

    public function menteeDashBoard()
    {
        $email = session('mentee_email');
        $mentee = Mentee::where('email', $email)->first();
        $student = Mentee::getStudentData($email);
        $title = "Mentee Dashboard";
        return view('mentee.menteeHome', compact('student', 'title', 'mentee'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $mentee = Mentee::where('email', $request->email)->first();
        $password = hash('sha256', $request->password);

        Log::info("Mentee logged in", [
            'email' => $mentee->email,
            'time' => now(),
        ]);

        // if (!$mentee || ($password != $mentee->password)) {
        //     return back()->withErrors(['email' => 'Invalid email or password']);
        // }


        if (!$mentee) {
            $title = "Mentee login";
            $error = "Account Does not exist!";
            return redirect()->route('mentee.login', ['error' => $error]);
        }

        Log::info('Hashed Password: ', (array) $password);
        if (!$mentee || ($password != $mentee->password)) {
            // Log::info($mentee->toArray());
            $error = 'Invalid email or password';
            $title = "Mentee Login";
            return view('mentee.login', compact('title', 'error'));

        }

        if ($password != $mentee->password) {
            $title = "Mentee login";
            $error = "Wrong Password!";
            return redirect()->route('mentee.login', ['error' => $error]);
        }

        if (!$mentee->password_updated) {
            session(['mentee_id' => $mentee->id]);

            return redirect()->route('mentee.update-password');
        }

        Auth::guard('mentee')->login($mentee);
        $student = Mentee::getStudentData($request->email);
        session(['mentee_email' => $student->email]);

        $title = "Mentee Dashboard";
        $success = "Login Successfull";
        return view('mentee.menteeHome', compact('student', 'mentee', 'title', 'success'));
    }

    public function logout(Request $request)
    {


        $mentee_email = session('mentee_email');
        Log::info("Mentee logged out", [
            'email' => $mentee_email,
            'time' => now(),
        ]);
        Auth::guard('mentee')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $success = "Logout Successful!";
        $title = "Home";
        return redirect()->route('welcome', ['title' => $title, 'success' => $success]);
    }

    public function showUpdatePasswordForm()
    {
        if (!session()->has('mentee_id')) {
            $title = "Mentee Login";
            return redirect()->route('mentee.login', compact('title'));
        }
        $title = "Update Password Mentee";
        return view('mentee.update-password', compact('title'));
    }

    public function savePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $mentee = Mentee::find(session('mentee_id'));
        if (!$mentee) {
            $title = "Mentor Login";
            $error = "Something went wrong!";
            return redirect()->route('mentee.login', ['title' => $title, 'error' => $error]);
        }

        $mentee->password = hash('sha256', $request->password);
        $mentee->password_updated = 1;
        $mentee->save();
        session()->forget('mentee_id');
        $title = "Mentor Login";
        $success = 'Password updated successfully. Please log in again.';
        return redirect()->route('mentee.login', ['title' => $title, 'success' => $success]);
    }


    public function viewInteractions(Request $request, $mentee_id)
    {
        $data = Mentee::getAllInteractions($mentee_id);
        // dd($data);
        $mentor = $data['mentor'];
        $dates = $data['interactions'];
        $title = "View Interactions";
        return view('mentee.ViewInteractionMentee', compact('title', 'mentor', 'dates', 'mentee_id'));
    }


    public function changePasswordMenteeOpenForm()
    {
        $title = "Request Password Mentee";
        return view('mentee.requestPasswordFormMentee', compact('title'));
    }
    public function mennteeRequestPassword(Request $request)
    {
        try {
            Log::info('in the menteeRequestPassword controller function');
            $validateData = $request->validate([
                'email' => 'required|exists:mentees,email',
            ]);
            Log::info('Request password mentor: ', (array) $validateData['email']);
            $email = $validateData['email'];

            $mentee = Mentee::getStudentData($email);
            $admin_mail = "sankarrajak1223@gmail.com";


            Mail::to($admin_mail)->send(new RequestPasswordMentee($email, $mentee));
            $title = "Mentee Login";
            $success = "Soon Admin Will connect with you!";
            return view('mentee.login', compact('title', 'success'));
        } catch (ValidationException $e) {
            $error = $e->getMessage();
            Log::error('Request password from ', ['error_message' => $e->getMessage()]);
            $title = 'Request Password Mentor';
            return view('mentee.requestPasswordFormMentee', compact('title', 'error'));
        } catch (\Exception $e) {
            $error = $e->getMessage();
            Log::error('Request password from ', ['error_message' => $e->getMessage()]);
            $title = 'Request Password Mentor';
            return view('mentee.requestPasswordFormMentee', compact('title', 'error'));
        }
    }


    public function fetchInteraction(Request $request, $mentee_id)
    {
        $date = $request->input('date');
        Log::info("Mentee_id", (array) $mentee_id);

        $interaction = Mentee::fetchInteractionData($mentee_id, $date);
        if (!$interaction) {
            return "<p>No data found for this date.</p>";
        }

        return view('partials.interaction_details_mentee', compact('interaction', 'mentee_id'));
    }
}
