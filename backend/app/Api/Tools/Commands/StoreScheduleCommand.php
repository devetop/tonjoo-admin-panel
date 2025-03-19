<?php

namespace App\Api\Tools\Commands;

use App\Api\Tools\Models\Cron;
use App\Api\Tools\Services\CronSchedule;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class StoreScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aksara:store-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[Aksara] Storing schedule by environment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schedules = app(Schedule::class)->events();

        $data = [];

        $days = ['Mondays', 'Tuesdays', 'Wednesdays', 'Thursdays', 'Fridays', 'Saturdays', 'Sundays'];

        foreach ($schedules as $schedule) {
            $name = class_basename($schedule->description);

            $cronCoverter = CronSchedule::fromCronString($schedule->expression);
            $result = $cronCoverter->asNaturalLanguage();

            $time = $result;
            if (str_contains($result, 'every day.')) {
                $time = str_replace(' on every day', '', $result);
            }

            $data[] = [
                'name' => $name,
                'time' => $time,
            ];
        }

        Cron::truncate();
        Cron::insert($data);

        $this->info('Done');
    }
}
