<?php

namespace Database\Seeders;

use App\Api\Tools\Job\SendEmail;
use App\Api\Tools\Models\Cron;
use App\Api\Tools\Models\HistoryCron;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // # Tool Worker
        // ## List Cron
        Cron::truncate();
        for ($i=0; $i < 100; $i++) { 
            Cron::insert([
                'name' => 'dummy cron name ' . $i,
                'time' => 'test time'
            ]);
        }
        // ## Cron History
        HistoryCron::truncate();
        for ($i=0; $i < 100; $i++) { 
            HistoryCron::insert([
                'name' => 'dummy cron history name ' . $i,
            ]);
        }
        // ## Queue Pending
        for ($i=0; $i < 10; $i++) {
            SendEmail::dispatch([
                'mail_title' => 'Percobaan kirim email',
                'mail_to' => 'test@gmail.com',
                'set_error' => $i < 5,
                'mail_body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit deserunt laborum dolores at officia blanditiis commodi cupiditate nobis, totam quibusdam ullam numquam hic dolorem fugiat exercitationem consectetur, quia praesentium quas!'
            ]);
        }
    }
}
