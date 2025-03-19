<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OAuthProvider;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function __construct(
        private User $user,
        private OAuthProvider $oAuthProvider,
    ) {
    }

    public function redirectTo()
    {
        return Socialite::driver(request()->input('driver', 'google'))->redirect();
    }

    private function handleCallback($driver = 'google')
    {
        try {
            $oAuthUser = Socialite::driver($driver)->user();

            $oauth = $this->oAuthProvider->where([
                'provider_id' => $oAuthUser->getId(),
                'provider_name' => $driver,
            ])->first();

            $user = $this->user->where('email', $oAuthUser->getEmail())->first();

            if (!is_null($oauth) && !is_null($user)) {
                auth('admin')->loginUsingId($oauth->user_id);
                return back();
            } else if (is_null($oauth) && !is_null($user)) {
                $user->oauth_provider()->create([
                    'provider_id' => $oAuthUser->getId(),
                    'provider_name' => $driver,
                ]);
                auth('admin')->login($user);
                return back();
            } else if (is_null($oauth) && is_null($user)) {
                $user = $this->user->create([
                    'email' => $oAuthUser->getEmail(),
                    'name' => $oAuthUser->getName(),
                ]);
                $user->oauth_provider()->create([
                    'provider_id' => $oAuthUser->getId(),
                    'provider_name' => $driver,
                ]);
                auth('admin')->login($user);
                return to_route('cms.profile.edit');
            }
        } catch (\Throwable $th) {
            return to_route('cms.login');
        }
    }

    public function handleGoogleCallback()
    {
        return $this->handleCallback('google');
    }

    public function handleFacebookCallback()
    {
        return $this->handleCallback('facebook');
    }
}
