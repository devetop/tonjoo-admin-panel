<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return inertia('Auth/ForgotPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == \Password::RESET_LINK_SENT
                    ? back()->with('success', trans($response))
                    : back()->with('error', trans($response));
    }
}
