<?php 
$pageTitle = 'jsGrid';
$breadcrumbs = array( 
    ['Home', '#'],
    ['jsGrid', '#']
);
?>

@include("html._head-start")

<!-- BEGIN: Insert additional plugin css -->

<!-- jsGrid -->
<link rel="stylesheet" href="/dist/plugins/jsgrid/jsgrid.min.css">
<link rel="stylesheet" href="/dist/plugins/jsgrid/jsgrid-theme.min.css">

<!-- END: Insert additional plugin css -->

@include("html._head-end")

@include("html._navbar")

@include("html._sidebar")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header page-header">
        <div class="container-fluid">
            <div class="row flex-column-reverse mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1><?php echo (!empty( $pageTitle )) ? $pageTitle : '' ;?></h1>
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
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">jsGrid</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div id="jsGrid1"></div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
    </section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- jsGrid -->
<script src={{url("dist/plugins/jsgrid/demos/db.js")}}></script>
<script src={{url("dist/plugins/jsgrid/jsgrid.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<!-- Page specific script -->
<script>
	$(function() {
		$("#jsGrid1").jsGrid({
			height: "100%",
			width: "100%",

			sorting: true,
			paging: true,

			data: db.clients,

			fields: [
				{ name: "Name", type: "text", width: 150 },
				{ name: "Age", type: "number", width: 50 },
				{ name: "Address", type: "text", width: 200 },
				{ name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
				{ name: "Married", type: "checkbox", title: "Is Married" }
			]
		});
	});
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")