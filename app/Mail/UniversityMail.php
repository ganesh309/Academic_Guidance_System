<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class UniversityMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mentee;
    public $date;
    public $time;
    public $mentor_mobile;

    public function __construct($mentee,$date,$time,$mentor_mobile)
    {
        $this->mentee = $mentee;
        $this->date = $date;
        $this->time = $time;
        $this->mentor_mobile = $mentor_mobile;
    }

    public function build()
    {
        return $this->subject('Welcome to the Club!')
                    ->view('emails.requestAppointmentMail')
                    ->with(['mentee' => $this->mentee,'date' => $this->date,'time' => $this->time,'mentor_mobile' => $this->mentor_mobile]);
    }
}

