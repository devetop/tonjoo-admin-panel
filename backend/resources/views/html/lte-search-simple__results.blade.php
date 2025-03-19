<?php 
$pageTitle = 'Simple Search Results';
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
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="simple-results.html">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">2021-04-20 04:04pm</div>
                                        <h3>Lorem ipsum dolor sit amet</h3>
                                        <p class="mb-0">consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                    <img class="img-fluid" src=".././assets/backend/dist/img/photo1.png" alt="Photo" style="max-height: 160px;">
                                </div>
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">2021-04-20 10:14pm</div>
                                        <h3>Lorem ipsum dolor sit amet</h3>
                                        <p class="mb-0">consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                    <iframe width="240" height="160" src="https://www.youtube.com/embed/WEkSYw3o5is?controls=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="border-0" allowfullscreen></iframe>
                                </div>
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">2021-04-20 11:54pm</div>
                                        <h3>Lorem ipsum dolor sit amet</h3>
                                        <p class="mb-0">consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
