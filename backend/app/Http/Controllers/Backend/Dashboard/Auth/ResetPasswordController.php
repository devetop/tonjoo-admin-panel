<?php

namespace App\Http\Controllers\Backend\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return inertia('Auth/ResetPassword', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == \Password::PASSWORD_RESET
            ? back()->with('success', trans($response))
            : back()->with('error', trans($response));
    }

    protected function guard()
    {
        return Auth::guard('dashboard');
    }
}
