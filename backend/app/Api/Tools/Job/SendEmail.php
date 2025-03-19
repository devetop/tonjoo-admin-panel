<?php

namespace App\Api\Tools\Job;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\EmailForQueuing;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $email = new \App\Api\Tools\Mail\TestMail($this->details);

            \Mail::to($this->details['mail_to'])->send($email);

            \Log::info("Email berhasil dikirim ke ".$this->details['mail_to']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function failed($exception)
    {
        \Log::error('Fail send email to ' . $this->details['mail_to']);
    }
}
