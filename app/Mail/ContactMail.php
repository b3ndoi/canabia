<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->message['email'])
                    ->view('emails.contact')
                    ->with([
                        'email' => $this->message['email'],
                        'phone' => isset($this->message['phone'])?$this->message['phone']:'',
                        'subject' => isset($this->message['subject'])?$this->message['subject']:'',
                        'messages' => $this->message['message'],
                    ]);;
    }
}
