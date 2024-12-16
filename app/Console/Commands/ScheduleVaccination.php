<?php

namespace App\Console\Commands;

use App\Models\Center;
use App\Models\Patient;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class ScheduleVaccination extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:vaccination';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule vaccination dates for registered patient';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
         // Skip if it's the weekend (Friday, Saturday)
        if ($today->isFriday() || $today->isSaturday()) {
            $this->info('Skipping scheduling on weekends.');
            return;
        }

        $centers = Center::all();

        foreach ($centers as $center) {
            $patients = Patient::where('status', 'Not Scheduled')
                ->where('center_id', $center->id)
                ->orderBy('created_at')
                ->take($center->daily_limit)
                ->get();

            foreach ($patients as $patient) {
                $patient->update([
                    'status' => 'Scheduled',
                    'scheduled_date' => $today,
                ]);

                // Dispatch email notification
                dispatch(new \App\Jobs\SendVaccinationEmail($patient));
            }
        }

        $this->info('Vaccination scheduling completed.');

    }
}
