<?php
// app/Mail/RegisterNotification.php

namespace App\Mail;

use App\Models\Applicant;
use App\Models\BillingDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;
    public $billing;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Applicant $applicant, BillingDetails $billing)
    {
        $this->applicant = $applicant;
        $this->billing = $billing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Use the course name in the subject for clarity
        $courseName = $this->applicant->courses->course_en_name ?? 'Course Registration';

        return $this->subject("✅ New Registration: {$courseName} - {$this->applicant->name}")
                    ->view('emails.registration_notification');
    }
}
