<?php

namespace App\Mail;

use App\Models\Speaker;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SpeakerEnqueryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;

    public function __construct(Speaker $applicant)
    {
        $this->applicant = $applicant;
    }

    public function build()
    {
        return $this->subject('New Enquiry: ' . $this->applicant->name)
                    ->view('emails.speaker_notification');
    }
}
