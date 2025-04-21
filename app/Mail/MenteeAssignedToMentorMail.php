<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
        return $this->subject('New Mentee Assigned')
                    ->view('emails.mentee-assigned-mentor');
    }
}
