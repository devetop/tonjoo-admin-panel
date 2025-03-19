<?php 
$pageTitle = 'Language Menu';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>


@include("html._head-start")

<!-- BEGIN: Insert additional plugin css -->

<!-- flag-icon-css -->
<link rel="stylesheet" href="/dist/plugins/flag-icon-css/css/flag-icon.min.css">

<!-- END: Insert additional plugin css -->

@include("html._head-end")
  
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?php if ( !empty( $breadcrumbs ) ) { ?>
                <ol class="breadcrumb bg-transparent mb-0 py-1">
                    <?php $bci = 0;
                    foreach ($breadcrumbs as $bc) {?>
                        <li class="breadcrumb-item <?php echo ( $bci == array_key_last($breadcrumbs)) ? 'active' : ''; ?>">
                            <?php if ( $bci !== array_key_last($breadcrumbs) ) { ?>
                                <a href="<?php echo $bc[1] ?>"><?php echo $bc[0] ?></a>
                            <?php }else{ ?>
                                <span><?php echo $bc[0] ?></span>
                            <?php } ?>
                        </li>
                    <?php $bci++; }?>
                </ol>
            <?php } ?>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <?php include '../../tenant-menu.php' ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="ph-bold ph-magnifying-glass"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="ph-bold ph-magnifying-glass"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="ph-bold ph-x"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="ph-bold ph-chats"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src={{@url("assets/backend/dist/img/user1-128x128.jpg")}} alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title"> Brad Diesel <span class="float-right text-sm text-danger">
                                    <i class="ph-bold ph-star"></i>
                                </span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted">
                                <i class="ph-bold ph-clock mr-1"></i> 4 Hours Ago
                            </p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src={{@url("assets/backend/dist/img/user8-128x128.jpg")}} alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title"> John Pierce <span class="float-right text-sm text-muted">
                                    <i class="fas fa-star"></i>
                                </span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted">
                                <i class="far fa-clock mr-1"></i> 4 Hours Ago
                            </p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src={{@url("assets/backend/dist/img/user3-128x128.jpg")}} alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title"> Nora Silvester <span class="float-right text-sm text-warning">
                                    <i class="fas fa-star"></i>
                                </span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted">
                                <i class="far fa-clock mr-1"></i> 4 Hours Ago
                            </p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <!-- Language Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="flag-icon flag-icon-us"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <a href="#" class="dropdown-item active">
                    <i class="flag-icon flag-icon-us mr-2"></i> English </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-id mr-2"></i> Indonesia </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-de mr-2"></i> German </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-fr mr-2"></i> French </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-es mr-2"></i> Spanish </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="ph-bold ph-corners-out"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="ph-bold ph-squares-four"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

@include("html._sidebar")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
        <div class="container-fluid">
            <div class="row flex-column-reverse mb-2">
                <div class="col-sm-6">
                    <h1>
                    <?php echo (!empty( $pageTitle )) ? $pageTitle : '' ;?> 
                    </h1>
                </div>
                <div class="col-sm-6 mb-2">
                    <?php if ( !empty( $breadcrumbs ) ) { ?>
                        <ol class="breadcrumb d-lg-none d-md-none">
                            <?php $bci = 0;
                            foreach ($breadcrumbs as $bc) {?>
                                <li class="breadcrumb-item <?php echo ( $bci == array_key_last($breadcrumbs)) ? 'active' : ''; ?>">
                                    <?php if ( $bci !== array_key_last($breadcrumbs) ) { ?>
                                        <a href="<?php echo $bc[1] ?>"><?php echo $bc[0] ?></a>
                                    <?php }else{ ?>
                                        <span><?php echo $bc[0] ?></span>
                                    <?php } ?>
                                </li>
                            <?php $bci++; }?>
                        </ol>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

	<!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body"> Check the Header part you can find Language Changing Options with Icon. <br> Start creating your amazing application! </div>
            <!-- /.card-body -->
            <div class="card-footer"> Footer </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
