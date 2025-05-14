<?php

namespace App\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MenteeAssignedToMentorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $mentor;

    public function __construct($student, $mentor)
    {
        $this->student = $student;
        $this->mentor = $mentor;
    }

    public function build()
    {
        try{
            Log::info("in the MenteeAssignedToMentorMail");
        return $this->subject('New Mentee Assigned')
                    ->view('emails.mentee-assigned-mentor');
        }catch(Exception $e){
            Log::info("in the MenteeAssignedToMentorMail-got exception: ", (array) $e);
        }

    }
}
