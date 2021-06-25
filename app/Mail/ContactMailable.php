<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject = "Confirmation event subscription";

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('klikandlearn@gmail.com')
                    ->view('mails.contact');
    }
}
