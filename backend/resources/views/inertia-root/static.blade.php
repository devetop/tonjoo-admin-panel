<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    @php
        $favicon = !\Option::get('favicon') ? '' : \Option::get('favicon');
    @endphp

    <link
        href="{{ $favicon ? \ImageStorage::getUrl('option/', $favicon) : asset('assets/frontend/assets/favicon.ico') }}"
        rel="icon">
    
    <!-- REQUIRED CSS -->
    <!-- Font Icon: Phosphor, Font Awesome, Ionicons -->
    @vite(['resources/plugins/fonts.css'])
    @vite(['resources/js/app.js', 'resources/scss/adminlte.scss'])
    @vite(['resources/scss/skins/skin-backend-1.scss'])
    
    @routes
    @viteReactRefresh
    @vite(['resources/jsx/app-inertia-static.jsx'])
    @inertiaHead
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed text-sm skin-backend-1">
    @inertia
</body>

</html>
