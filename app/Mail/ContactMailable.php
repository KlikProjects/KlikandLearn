<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Event;
use App\Models\User;



class ContactMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject = "Confirmation event subscription";
    public $username;
    public $title;
    public $date;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($username, $event)
    {
        $this->date = $event->date_time; 
        $this->username = $username;
        $this->title = $event->title; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact');               
    }
}
