<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\OAuthProvider;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(
        private User $user,
    ) {
    }

    public function register()
    {
        $providerId = request()->get('provider_id');

        $user = $this->user->whereRelation('oauth_provider', 'provider_id', $providerId)->first();

        return inertia('');
    }
}
