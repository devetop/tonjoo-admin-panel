<?php 
$pageTitle = 'Recovery Password v1';
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
<body class="hold-transition login-page">
        

    <div class="login-box">
        <div class="login-logo mb-4">
            <a href={{@url("html.index2.php")}}>
                <img src={{@url("assets/backend/dist/img/logo-backend.png")}} alt="Logo" class="w-50">
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
                <form action="login.html" method="post">
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="login.html">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
        <!-- /.card -->
    </div>


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
