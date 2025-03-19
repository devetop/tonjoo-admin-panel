<?php

namespace App\Http\Controllers\Backend\Dashboard\Auth;

use App\Http\Controllers\Backend\Auth\ProfileController as AdminProfileController;
use App\Http\Requests\Backend\PasswordRequest;
use App\Http\Requests\Backend\ProfileRequest;
use App\Models\User;

class ProfileController extends AdminProfileController
{
    public function __construct()
    {
        $this->middleware('auth:dashboard');
    }

    public function edit()
    {
        context_authorize('dashboard', 'profile');
        return inertia('User/Profile');
    }
    
    public function update(ProfileRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        return back()->withCustom(['update-success' => __('Profile successfully updated.')]);
    }

    public function password(PasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'password' => \Hash::make($request->get('password')),
        ]);

        return back()->withCustom(['password-success' => __('Password successfully updated.')]);
    }
}