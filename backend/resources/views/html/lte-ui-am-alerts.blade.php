<?php 
$pageTitle = 'Amanah Alerts';
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
            
        <div class="alert alert-primary" role="alert"><strong>Alert Primary:</strong> Jalankan perintah <code>php artisan aksara:store-schedule</code> setiap kali ada job schedule baru</div>
        <div class="alert alert-secondary" role="alert"><strong>Alert Secondary:</strong> Jalankan perintah <code>php artisan aksara:store-schedule</code> setiap kali ada job schedule baru</div>
        <div class="alert alert-info" role="alert"><strong>Alert Info:</strong> Jalankan perintah <code>php artisan aksara:store-schedule</code> setiap kali ada job schedule baru</div>
        <div class="alert alert-danger" role="alert"><strong>Alert Danger:</strong> Jalankan perintah <code>php artisan aksara:store-schedule</code> setiap kali ada job schedule baru</div>
        <div class="alert alert-warning" role="alert"><strong>Alert Warning:</strong> Jalankan perintah <code>php artisan aksara:store-schedule</code> setiap kali ada job schedule baru</div>
        <div class="alert alert-dark" role="alert"><strong>Alert Dark:</strong> Jalankan perintah <code>php artisan aksara:store-schedule</code> setiap kali ada job schedule baru</div>
        <div class="alert alert-light" role="alert"><strong>Alert Light:</strong> Jalankan perintah <code>php artisan aksara:store-schedule</code> setiap kali ada job schedule baru</div>
        <br><hr><br>
        <div class="alert alert-primary" role="alert"><strong>Alert Primary:</strong> Tampilan alert yang <a href="#">ada linknya seperti ini</a>.</div>
        <div class="alert alert-secondary" role="alert"><strong>Alert Secondary:</strong> Tampilan alert yang <a href="#">ada linknya seperti ini</a>.</div>
        <div class="alert alert-info" role="alert"><strong>Alert Info:</strong> Tampilan alert yang <a href="#">ada linknya seperti ini</a>.</div>
        <div class="alert alert-danger" role="alert"><strong>Alert Danger:</strong> Tampilan alert yang <a href="#">ada linknya seperti ini</a>.</div>
        <div class="alert alert-warning" role="alert"><strong>Alert Warning:</strong> Tampilan alert yang <a href="#">ada linknya seperti ini</a>.</div>
        <div class="alert alert-dark" role="alert"><strong>Alert Dark:</strong> Tampilan alert yang <a href="#">ada linknya seperti ini</a>.</div>
        <div class="alert alert-light" role="alert"><strong>Alert Light:</strong> Tampilan alert yang <a href="#">ada linknya seperti ini</a>.</div>

		</div><!-- /.container-fluid -->
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
