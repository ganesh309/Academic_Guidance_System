<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentee;
use Illuminate\Support\Facades\Log;



class MenteeController extends Controller
{
    public function showLoginForm()
    {
        Log::info('In the showLoginForm function');
        return view('mentee.login');
    }

    public function menteeDashBoard(){
        $email = session('mentee_email'); 
       $student = Mentee::getStudentData($email);

        return view('mentee.menteeHome',compact('student'));
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $mentee = Mentee::where('email', $request->email)->first();
        $password = hash('sha256', $request->password);
        Log::info('Hashed Password: ',(array) $password);
        if (!$mentee || ($password != $mentee->password)) {
            // Log::info($mentee->toArray());
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
        Log::info($mentee->toArray());
        if (!$mentee->password_updated) {
            session(['mentee_id' => $mentee->id]);
            return redirect()->route('mentee.update-password');
        }
        
        Auth::guard('mentee')->login($mentee);
        $student = Mentee::getStudentData($request->email);
        session(['mentee_email' => $student->email]);

        return view('mentee.menteeHome',compact('student'));
    }

    public function logout(Request $request)
    {
        Auth::guard('mentee')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('mentee.login');
    }

    public function showUpdatePasswordForm()
{
    if (!session()->has('mentee_id')) {
        Log::info('Showing password update form');
        return redirect()->route('mentee.login');
    }

    return view('mentee.update-password');
}

public function savePassword(Request $request)
{
    $request->validate([
        'password' => 'required|confirmed|min:6',
    ]);

    $mentee = Mentee::find(session('mentee_id'));
    if (!$mentee) {
        return redirect()->route('mentee.login');
    }

    $mentee->password = hash('sha256', $request->password);
    $mentee->password_updated = 1;
    $mentee->save();
    session()->forget('mentee_id');
    return redirect()->route('mentee.login')->with('success', 'Password updated successfully. Please log in again.');
}

public function showInteractionForm(){
    return view('mentee.ViewInteractionMentee');
}





}
