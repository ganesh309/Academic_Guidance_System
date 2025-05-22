<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class RequestPasswordMentor extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $mentor;

    public function __construct($email,$mentor)
    {
        $this->email = $email;
        $this->mentor = $mentor;
    }

    public function build()
    {
        return $this->subject('Password Change Request!')
                    ->view('emails.RequestPasswordMentor')
                    ->with(['email' => $this->email,'mentor' => $this->mentor]);
    }
}

