<?php 
$pageTitle = 'Simple Search';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>


@include("html._head-start")

<!-- BEGIN: Insert additional plugin css -->

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
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="lte-search-simple__results.php">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
