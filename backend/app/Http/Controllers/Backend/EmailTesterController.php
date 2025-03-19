<?php

namespace App\Http\Controllers\Backend;

use App\Api\Tools\Job\SendEmail;
use App\Api\Tools\Mail\TestMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailTesterController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        authorize('tool-email-tester');

        return inertia('Tool/EmailTester');
    }

    public function send(Request $request)
    {
        authorize('tool-email-tester');

        $request->validate([
            'mail_to' => "required|email",
            'mail_body' => "required",
            'mail_title' => "required"]
        );

        $details = [
            'mail_title' => $request->input('mail_title', 'Percobaan kirim email'),
            'mail_to' => $request->mail_to,
            'set_error' => $request->input('set_error', false),
            'mail_body' => $request->input('body', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit deserunt laborum dolores at officia blanditiis commodi cupiditate nobis, totam quibusdam ullam numquam hic dolorem fugiat exercitationem consectetur, quia praesentium quas!')
        ];

        SendEmail::dispatch($details, new TestMail($details));

        return redirect()->back()
            ->with('success', 'Email telah masuk antrian');
    }
}
