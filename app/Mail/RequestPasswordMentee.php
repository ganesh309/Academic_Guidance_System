<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class RequestPasswordMentee extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $mentee;

    public function __construct($email,$mentee)
    {
        $this->email = $email;
        $this->mentee = $mentee;
    }

    public function build()
    {
        return $this->subject('Password Change Request!')
                    ->view('emails.RequestPasswordMentee')
                    ->with(['email' => $this->email,'mentee' => $this->mentee]);
    }
}

