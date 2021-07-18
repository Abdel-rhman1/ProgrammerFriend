<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $title ;
    public function __construct($data , $title)
    {
        $this->signup_mail_data = $data;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('from_email@gmail.com', 'WithYou.com')->subject($this->title)
        ->view('mail.signup-email', ['mail_data' => $this->signup_mail_data]);
    }
}
