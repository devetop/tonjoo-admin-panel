<?php

namespace App\Http\Controllers\FrontendDashboardApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    private function loginByPermission(LoginRequest $request, $permission) : JsonResponse
    {
        $user = $request->authenticate('frontend-dashboard', $permission);
        $user->append('permissions');
        $user->setHidden(['roles', 'password', 'remember_token']);
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'data' => compact('user'),
        ]);
    }

    public function store(LoginRequest $request): JsonResponse
    {
        return $this->loginByPermission($request, 'dashboard.login-as-user');
    }

    public function adminStore(LoginRequest $request): JsonResponse
    {
        return $this->loginByPermission($request, 'dashboard.login-as-admin');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('frontend-dashboard')->logout();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
