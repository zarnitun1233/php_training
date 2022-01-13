<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailData extends Mailable
{
    use Queueable, SerializesModels;
    public $students;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($students)
    {
        $this->students = $students;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Student Data')->view('emails.sendMailData');
    }
}
