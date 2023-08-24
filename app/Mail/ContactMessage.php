<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        $subject = 'Reply Contact Message';

        return $this->from('testadmin@gmail.com', 'Admin Talent Finder')->subject($subject)
        ->view('emails.contact_plain');
    }
}
