<?php 
$pageTitle = 'Register v1';
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
                <img src="<?php echo $assetPath; ?>assets/backend/dist/img/logo-backend.png" alt="Logo" class="w-50">
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="index.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms"> I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign up using Facebook </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign up using Google+ </a>
                </div>
                <a href={{@url("html.lte-example-extra-login.php")}} class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
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
