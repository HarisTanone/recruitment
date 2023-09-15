<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $jobData;

    public function __construct($jobData)
    {
        $this->jobData = $jobData;
    }

    public function build()
    {
        $subject = $this->jobData['subject'];

        return $this->from('testadmin@gmail.com', 'Admin Talent Finder')->subject($subject)
        ->view('emails.job_plain');
    }
}
