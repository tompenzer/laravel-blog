<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use SerializesModels;

    protected $email_from;
    protected $message;

    /**
     * Create a new message instance.
     */
    public function __construct($email_from, $message)
    {
        $this->email_from = $email_from;
        $this->message = $message;
    }

    /**
     * Build the message.
     */
    public function build(): Contact
    {
        return $this->from($this->email_from, config('app.name', 'ThePenzone.com'))
                    ->subject(__('contact.email.subject'))
                    ->view('emails.contact')
                    ->with([
                        'contact' => [
                            'from' => $this->email_from,
                            'body' => $this->message
                        ]
                    ]);
    }
}
