<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Backend\PasswordRequest;
use App\Http\Requests\Backend\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Inertia\Response
     */
    public function edit()
    {
        return inertia('User/Profile/Edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\Backend\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        return back()->withCustom(['update-success' => __('Profile successfully updated.')]);
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\Backend\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return back()->withCustom(['password-success' => __('Password successfully updated.')]);
    }
}
