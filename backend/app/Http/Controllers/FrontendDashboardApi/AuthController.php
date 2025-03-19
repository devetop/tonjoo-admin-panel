<?php

namespace App\Http\Controllers\FrontendDashboardApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PasswordRequest;
use App\Http\Requests\Backend\ProfileRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;
    
    public function user(Request $request)
    {
        $user = $request->user('frontend-dashboard');
        if ($user) {
            $user->avatar = $user?->name ? $user->getAvatar() : '#';
        }
        return [
            'success' => true,
            'data' => compact('user'),
        ];
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        $role = Role::where('name', 'Frontend Dashboard User')->first();
        $user->roles()->attach($role);

        return response()->json([
            'message' => 'Register success',
            'data' => [
                'user' => $user,
            ]
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        $isSuccess = $response == \Password::RESET_LINK_SENT;
        return  response()
            ->json([
                'success' => $isSuccess,
                'message' => trans($response),
            ])
            ->setStatusCode($isSuccess ? 200 : 422);
    }

    public function resetPassword(Request $request)
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
                'success' => $isSuccess,
                'message' => trans($response),
            ])
            ->setStatusCode($isSuccess ? 200 : 422);
    }

    public function updatePassword(PasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'password' => \Hash::make($request->get('password')),
        ]);

        return response()->json([
            'success' => true,
            'message' => __('Password successfully updated.')
        ]);
    }

    public function updateInformation(ProfileRequest $request)
    {
        $user = auth('frontend-dashboard')->user();

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);
        
        return response()->json([
            'success' => true,
            'message'=> __('Profile successfully updated.')
        ]);
    }
}
