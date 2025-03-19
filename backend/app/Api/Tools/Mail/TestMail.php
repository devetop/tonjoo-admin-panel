<?php

namespace App\Api\Tools\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        if ($this->details['set_error']) {
            throw new \Exception('Simulasi gagal kirim email');
        }

        return $this->subject($this->details['mail_title'])
            ->view('email.email-tester');
    }
}
