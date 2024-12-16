<?php

namespace App\Jobs;

use App\Models\Patient;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVaccinationEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Patient $patient)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = $this->patient->email;
        $this->patient->load('center');
        $data = [
            'name' => $this->patient->name,
            'scheduled_date' => $this->patient->scheduled_date,
            'center_name' => $this->patient->center->name
        ];

        Mail::send('emails.vaccination-schedule', $data, function ($message) use ($email) {
            $message->to($email)->subject('Your Vaccination Schedule');
        });
    }
}
