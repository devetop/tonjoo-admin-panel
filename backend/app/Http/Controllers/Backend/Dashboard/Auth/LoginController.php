<?php

namespace App\Http\Controllers\Backend\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest:dashboard')->except('logout');
    }

    public function showLoginForm()
    {
        return inertia('Auth/Login');
    }

    protected function loggedOut(Request $request)
    {
        if (app('App\\Api\\Services\\RoutingService')->isBackend(url()->previous())) {
            return redirect(route('cms.login'));
        }
        return redirect(url()->previous());
    }

    protected function guard()
    {
        return Auth::guard('dashboard');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
}
