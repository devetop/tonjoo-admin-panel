<?php 
$pageTitle = 'Starter Template';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>


@include("html._head-start")

<!-- BEGIN: Insert additional plugin css -->

<!-- pace-progress -->
<link rel="stylesheet" href="/dist/plugins/pace-progress/themes/black/pace-theme-flat-top.css">

<!-- END: Insert additional plugin css -->

@include("html._head-end")
  
@include("html._navbar")

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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Featured</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Special title treatment</h6>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Featured</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Special title treatment</h6>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- pace-progress -->
<script src={{url("dist/plugins/pace-progress/pace.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
