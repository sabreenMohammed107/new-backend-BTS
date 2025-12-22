<?php

namespace App\Mail;

use App\Models\CareersApplicant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerEnqueryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;

    public function __construct(CareersApplicant $applicant)
    {
        $this->applicant = $applicant;
    }

    public function build()
    {
        return $this->subject('New Enquiry: ' . $this->applicant->name)
                    ->view('emails.career_notification');
    }
}
