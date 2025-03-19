<?php 
$pageTitle = 'Lockscreen';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (!empty( $pageTitle )) ? $pageTitle . ' | ' : '' ;?>Amanah TAP v3</title>

    <!-- REQUIRED CSS -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/dist/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Phosphor -->
    <!-- <link rel="stylesheet" href="/dist/plugins/phosphor-icon/fill/style.css">
    <link rel="stylesheet" href="/dist/plugins/phosphor-icon/regular/style.css">
    <link rel="stylesheet" href="/dist/plugins/phosphor-icon/bold/style.css"> -->

    <!-- BEGIN: Insert additional plugin css -->


    <!-- END: Insert additional plugin css -->

    <!-- REQUIRED CSS -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Amanah style -->
    <link rel="stylesheet" href="dist/css/amanah/style.min.css">
</head>
<body class="hold-transition lockscreen">
        

    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo mb-4">
            <a href={{@url("html.index2.php")}}>
                <img src="<?php echo $assetPath; ?>assets/backend/dist/img/logo-backend.png" alt="Logo" class="w-50">
            </a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">John Doe</div>
        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="<?php echo $assetPath; ?>assets/backend/dist/img/user1-128x128.jpg" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->
            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="password">
                    <div class="input-group-append">
                        <button type="button" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->
        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center"> Enter your password to retrieve your session </div>
        <div class="text-center">
            <a href="login.html">Or sign in as a different user</a>
        </div>
        <!-- <div class="lockscreen-footer text-center"> Copyright &copy; 2014-2021 <b>
                <a href="https://adminlte.io" class="text-black">AdminLTE.io</a>
            </b>
            <br> All rights reserved
        </div> -->
    </div>
    <!-- /.center -->


    <!-- REQUIRED PLUGIN -->
    <!-- jQuery -->
    <script src={{url("dist/plugins/jquery/jquery.min.js")}}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{url("dist/plugins/jquery-ui/jquery-ui.min.js")}}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src={{url("dist/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- AdminLTE App -->
    <script src={{url("dist/js/adminlte.js")}}></script>

    <!-- BEGIN: Insert additional plugin js -->


    <!-- END: Insert additional plugin js -->

    </body>
</html>
