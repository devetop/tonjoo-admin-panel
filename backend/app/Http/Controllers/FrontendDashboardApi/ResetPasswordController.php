<?php

namespace App\Http\Controllers\FrontendDashboardApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        $isSuccess = $response == \Password::PASSWORD_RESET;
        return response()
            ->json([
                'message' => trans($response),
                'is_success' => $isSuccess,
            ])
            ->setStatusCode($isSuccess ? 200 : 422);
    }

}
