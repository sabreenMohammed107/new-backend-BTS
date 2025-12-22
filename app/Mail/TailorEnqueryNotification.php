<?php

namespace App\Mail;

use App\Models\TailorCourse;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TailorEnqueryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;

    public function __construct(TailorCourse $applicant)
    {
        $this->applicant = $applicant;
    }

    public function build()
    {
        return $this->subject('New Enquiry: ' . $this->applicant->name)
                    ->view('emails.tailor_notification');
    }
}
