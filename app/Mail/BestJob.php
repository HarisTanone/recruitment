<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BestJob extends Mailable
{
    use Queueable, SerializesModels;

    public $bestJob;

    public function __construct($bestJob)
    {
        $this->bestJob = $bestJob;
    }

    public function build()
    {
        $subject = 'Informasi Pekerjaan Terbaik';

        return $this->from('testadmin@gmail.com', 'Admin Talent Finder')->subject($subject)
        ->view('emails.bestJob');
    }
}
