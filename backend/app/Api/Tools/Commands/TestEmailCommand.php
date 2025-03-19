<?php

namespace App\Api\Tools\Commands;

use Illuminate\Console\Command;
use App\Api\Tools\Job\SendEmail;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'aksara:test-mail {email} {?--set_error}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending test email';

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
     * @return int
     */
    public function handle()
    {
        $mail_to = $this->argument('email');
        $set_error = $this->option('set_error');

        if (!filter_var($mail_to, FILTER_VALIDATE_EMAIL)) {
            $this->error("Parameter harus berupa email yang valid");
            die();
        }

        $details = [
            'mail_title'     => 'Percobaan kirim email',
            'mail_to'     => $mail_to,
            'set_error' => $set_error,
            'mail_body'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit deserunt laborum dolores at officia blanditiis commodi cupiditate nobis, totam quibusdam ullam numquam hic dolorem fugiat exercitationem consectetur, quia praesentium quas!'
        ];

        SendEmail::dispatch($details);

        $this->info("Email ke " . $mail_to . " sedang diantrekan");
    }
}
