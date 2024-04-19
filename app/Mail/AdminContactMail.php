<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

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
        $customer = 'Kyan-G('.$this->contact['name'].'様)';

        return $this
        // ->from(env('MAIL_USERNAME', 'syujiswe@gmail.com'),$customer)
        ->subject('お問い合わせ内容') 
        ->view('mailtext/adminContactMail') 
        ->with(['contact' => $this->contact]);
    }
}
