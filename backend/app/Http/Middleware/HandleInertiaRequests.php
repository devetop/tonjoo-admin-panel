<?php

namespace App\Http\Middleware;

use App\Api\Config\SideMenuConfig;
use App\Api\Contracts\OptionInterface;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    public function __construct(
        private OptionInterface $optionApi
    ) {}

    public $rootView = 'inertia-root.admin-dashboard';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        switch (\Auth::getDefaultDriver()) {
            case 'admin':
                $sharedData = array_merge(parent::share($request), [
                    'list_side_menu' => SideMenuConfig::instance()->make(),
                ]);
            case 'dashboard':
                $sharedData = array_merge(parent::share($request), [
                    'list_side_menu' => SideMenuConfig::instance('menu-dashboard')->make(),
                ]);
                break;
            default:
                $sharedData = array_merge(parent::share($request), [
                    'list_side_menu' => config()->get('menu-web'),
                    'filters' => [
                        'search' => $request->query('search')
                    ],
                    'menu' => $this->optionApi->get('menu', [])
                ]);
        }

        return array_merge($sharedData, [
            'auth' => [
                'user' => function() use($request) {
                    $user = $request->user() ?? $request->user('admin') ?? $request->user('dashboard') ?? null;
                    if(!is_null($user)) {
                        $user->avatar = $user?->name ? $user->getAvatar() : '#';
                    }
                    return $user;
                },
                'admin' => fn () => $request->user('admin'),
                'dashboard' => fn () => $request->user('dashboard'),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                    'current_route_name' => \Route::currentRouteName()
                ]);
            },
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
                'warning' => fn () => $request->session()->get('warning'),
                'custom' => fn () => $request->session()->get('custom'),
            ],
            'guard' => \Auth::getDefaultDriver(),
            'head' => [
                'title' => $this->optionApi->get('web_title', config('app.name')),
                'description' => $this->optionApi->get('web_description', ''),
            ]
        ]);
    }
}
