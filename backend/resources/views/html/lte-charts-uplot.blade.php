<?php 
$pageTitle = 'uPlot Chart';
$breadcrumbs = array( 
    ['Home', '#'],
    ['uPlot Chart', '#']
);
?>

@include("html._head-start")

<!-- BEGIN: Insert additional plugin css -->

  <!-- uPlot -->
  <link rel="stylesheet" href="/dist/plugins/uplot/uPlot.min.css">

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
		<div class="container-fluid">
			<!-- AREA CHART -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Area Chart</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="chart">
						<div id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- LINE CHART -->
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title">Line Chart</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="chart">
						<div id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- uPlot -->
<script src={{url("dist/plugins/uplot/uPlot.iife.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<!-- Page specific script -->
<script>
	$(function() {
		/* uPlot
		* -------
		* Here we will create a few charts using uPlot
		*/

		function getSize(elementId) {
			return {
				width: document.getElementById(elementId).offsetWidth,
				height: document.getElementById(elementId).offsetHeight,
			}
		}

		let data = [
			[0, 1, 2, 3, 4, 5, 6],
			[28, 48, 40, 19, 86, 27, 90],
			[65, 59, 80, 81, 56, 55, 40]
		];

		//--------------
		//- AREA CHART -
		//--------------

		const optsAreaChart = {
			...getSize('areaChart'),
			scales: {
				x: {
					time: false,
				},
				y: {
					range: [0, 100],
				},
			},
			series: [{},
				{
					fill: 'rgba(60,141,188,0.7)',
					stroke: 'rgba(60,141,188,1)',
				},
				{
					stroke: '#c1c7d1',
					fill: 'rgba(210, 214, 222, .7)',
				},
			],
		};

		let areaChart = new uPlot(optsAreaChart, data, document.getElementById('areaChart'));

		const optsLineChart = {
			...getSize('lineChart'),
			scales: {
				x: {
					time: false,
				},
				y: {
					range: [0, 100],
				},
			},
			series: [{},
				{
					fill: 'transparent',
					width: 5,
					stroke: 'rgba(60,141,188,1)',
				},
				{
					stroke: '#c1c7d1',
					width: 5,
					fill: 'transparent',
				},
			],
		};

		let lineChart = new uPlot(optsLineChart, data, document.getElementById('lineChart'));

		window.addEventListener("resize", e => {
			areaChart.setSize(getSize('areaChart'));
			lineChart.setSize(getSize('lineChart'));
		});
	})
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")