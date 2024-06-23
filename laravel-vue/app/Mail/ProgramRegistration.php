<?php

namespace App\Mail;

use App\Models\Registration;
use App\Models\Program;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProgramRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $program;

    public function __construct(Registration $registration, Program $program)
    {
        $this->registration = $registration;
        $this->program = $program;
    }

    public function build()
    {
        return $this->subject('Program Registration Confirmation')
                    ->view('emails.program_registration');
    }
}

