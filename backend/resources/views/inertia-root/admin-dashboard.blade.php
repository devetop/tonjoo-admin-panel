@auth
    @php
    if (has_capability('debugbar')) {
        \Debugbar::enable();
    } else {
        \Debugbar::disable();
    }
    @endphp
@endauth

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    @php
        $favicon = !\Option::get('favicon') ? '' : \Option::get('favicon');

        if (request()->segment(1) === 'dashboard') {
            $inertiaRootJsx = 'resources/jsx/app-inertia-dashboard.jsx';
            $cssSkin = 'skin-backend-4';
        } else {
            $inertiaRootJsx = 'resources/jsx/app-inertia-admin.jsx';
            $cssSkin = 'skin-backend-1';
        }
    @endphp

    <link
        href="{{ $favicon ? \ImageStorage::getUrl('option/', $favicon) : asset('assets/frontend/assets/favicon.ico') }}"
        rel="icon">

    <!-- REQUIRED CSS -->
    <!-- Font Icon: Phosphor, Font Awesome, Ionicons -->
    @vite(['resources/plugins/fonts.css'])

    <!-- Main js/css for this application-->
    @vite(['resources/js/app.js', 'resources/scss/adminlte.scss'])

    <!-- Skin this application-->
    @vite(["resources/scss/skins/$cssSkin.scss"])

    <!-- Main js/css for this application-->
    @routes
    @viteReactRefresh
    
    {{-- Main Inertia Jsx --}}
    @vite([$inertiaRootJsx])
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed text-sm {{$cssSkin}}">
    @inertia
</body>

</html>
