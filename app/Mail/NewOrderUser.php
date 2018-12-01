<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderUser extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $person;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $person)
    {
        $this->cart = $cart;
        $this->person = $person;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-order');
    }
}
