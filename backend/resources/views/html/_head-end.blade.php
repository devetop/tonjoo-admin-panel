    <!-- REQUIRED CSS -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" src={{@url("assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
    <!-- Theme js & style -->
    @vite(['resources/js/app.js', 'resources/scss/adminlte.scss'])
    <!-- Amanah style -->
    <!-- <link rel="stylesheet" href="dist/css/amanah/style.min.css"> -->
    <!-- Skin this application-->
    @vite([
        'resources/scss/skins/skin-backend-1.scss',
        // 'resources/scss/skins/skin-backend-2.scss',
        // 'resources/scss/skins/skin-backend-3.scss',
        // 'resources/scss/skins/skin-backend-4.scss',
        // 'resources/scss/skins/skin-backend-5.scss',
        // 'resources/scss/skins/skin-backend-6.scss',
    ])

    <!-- Skins Frontend -->
    @vite([
        // 'resources/scss/skins/skin-frontend-1.scss',
        // 'resources/scss/skins/skin-frontend-2.scss',
        // 'resources/scss/skins/skin-frontend-3.scss',
        // 'resources/scss/skins/skin-frontend-4.scss',
        // 'resources/scss/skins/skin-frontend-5.scss',
    ])
    <style>
        .navbar-custom-menu{
            height: 100%;
            background-color: rgba(0,0,0,0.67);
            border-radius: 3px;
            border: 1px solid rgba(255,255,255,0.38);
        }
        .navbar-custom-menu > .nav > .dropdown > a{
            padding: 4px 6px;
            display: flex;
            align-items: center;
            color: #FFF;
        }
        .navbar-custom-menu .dropdown-toggle::after{
            display: none;
        }
        .navbar-custom-menu .ph:not(.ph-caret-down){
            margin-right: 0.5rem!important;
        }
        .navbar-custom-menu ul{
            list-style-type: none;
            padding-left: 0;
        }
        .navbar-custom-menu .menu a{
            display: block;
            padding: 4px 6px;
        }
        .navbar-custom-menu .menu li:not(:last-child) a{
            border-bottom: 1px solid #ccc;
        }

        @media ( max-width: 991px ) {
            .navbar-custom-menu .js-tenant-active{
                font-size: 0;
            }
            .navbar-custom-menu .ph:not(.ph-caret-down){
                margin-right: 0!important;
            }
            .navbar-custom-menu .ph.ph-caret-down{
                display: none;
            }
        }
    </style>

</head>
<?php $skin = ( !empty( $_COOKIE['skin'] ) ) ? $_COOKIE['skin'] : 'skin-backend-1' ;?>
<?php $boxed = ( !empty( $_COOKIE['boxed'] ) ) ? $_COOKIE['boxed'] : '' ;?>
<body class="hold-transition sidebar-mini layout-navbar-fixed text-sm <?php echo $skin; ?> <?php echo $boxed; ?>">
<div class="wrapper">
