<?php

namespace App\Console\Commands;

use App\Models\Patient;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class ScheduleVaccinationCompleted extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:vaccinated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Complete the vaccination schedule';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Patient::where('status', 'Scheduled')
            ->where('scheduled_date', '<git ', Carbon::today())
            ->update(['status' => 'Vaccinated']);

        $this->info('Vaccination schedule completed.');
    }
}
