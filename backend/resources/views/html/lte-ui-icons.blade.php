<?php 
$pageTitle = 'Icons';
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
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Icons</h3>
				</div> <!-- /.card-body -->
				<div class="card-body">
					<p>Silahkan menggunakan salah satu font icon yang ada dibawah ini.<br>
					Untuk project baru <strong>DIREKOMENDASI</strong> menggunakan Phosphor Icons.</p>
					<p>
						<strong>Amanah TAP</strong><br>
						<a href="https://phosphoricons.com/">Phosphor Icons</a>
					</p>

					<p>
						<strong>Recommendations</strong><br>
						<a href="https://fontawesome.com/">Font Awesome</a><br>
						<a href="https://useiconic.com/open/">Iconic Icons</a><br>
						<a href="https://ionicons.com/">Ion Icons</a>
					</p>
					
				</div><!-- /.card-body -->
			</div>
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
