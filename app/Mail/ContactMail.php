<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        // ->from(env('MAIL_USERNAME', 'syujiswe@gmail.com'),'Kyan-G')
        ->subject('お問い合わせありがとうございます') 
        ->view('mailtext/contactmail') 
        ->with(['contact' => $this->contact]);
    }
}
