<?php 
$pageTitle = 'Inline Chart';
$breadcrumbs = array( 
    ['Home', '#'],
    ['Inline Chart', '#']
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
			<!-- row -->
			<div class="row">
				<div class="col-12">
					<!-- jQuery Knob -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="far fa-chart-bar"></i> jQuery Knob
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#3c8dbc">
									<div class="knob-label">New Visitors</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="70" data-width="90" data-height="90" data-fgColor="#f56954">
									<div class="knob-label">Bounce Rate</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="-80" data-min="-150" data-max="150" data-width="90" data-height="90" data-fgColor="#00a65a">
									<div class="knob-label">Server Load</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="40" data-width="90" data-height="90" data-fgColor="#00c0ef">
									<div class="knob-label">Disk Space</div>
								</div>
								<!-- ./col -->
							</div>
							<!-- /.row -->
							<div class="row">
								<div class="col-6 text-center">
									<input type="text" class="knob" value="90" data-width="90" data-height="90" data-fgColor="#932ab6">
									<div class="knob-label">Bandwidth</div>
								</div>
								<!-- ./col -->
								<div class="col-6 text-center">
									<input type="text" class="knob" value="50" data-width="90" data-height="90" data-fgColor="#39CCCC">
									<div class="knob-label">CPU</div>
								</div>
								<!-- ./col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="far fa-chart-bar"></i> jQuery Knob Different Sizes
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">
									<div class="knob-label">data-width="90"</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="30" data-width="120" data-height="120" data-fgColor="#f56954">
									<div class="knob-label">data-width="120"</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="30" data-thickness="0.1" data-width="90" data-height="90" data-fgColor="#00a65a">
									<div class="knob-label">data-thickness="0.1"</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="30" data-width="120" data-height="120" data-fgColor="#00c0ef">
									<div class="knob-label">data-angleArc="250"</div>
								</div>
								<!-- ./col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="far fa-chart-bar"></i> jQuery Knob Tron Style
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="80" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">
									<div class="knob-label">data-width="90"</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="60" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#f56954">
									<div class="knob-label">data-width="120"</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="10" data-skin="tron" data-thickness="0.1" data-width="90" data-height="90" data-fgColor="#00a65a">
									<div class="knob-label">data-thickness="0.1"</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="100" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" data-height="120" data-fgColor="#00c0ef">
									<div class="knob-label">data-angleArc="250"</div>
								</div>
								<!-- ./col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="far fa-chart-bar"></i> Sparklines
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-4 text-center">
									<div id="sparkline-1"></div>
								</div>
								<!-- ./col -->
								<div class="col-4 text-center">
									<div id="sparkline-2"></div>
								</div>
								<!-- ./col -->
								<div class="col-4 text-center">
									<div id="sparkline-3"></div>
								</div>
								<!-- ./col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- jQuery Knob -->
<script src={{url("dist/plugins/jquery-knob/jquery.knob.min.js")}}></script>
<!-- Sparkline -->
<script src={{url("dist/plugins/sparklines/sparkline.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<!-- Page specific script -->
<script>
	$(function() {
		/* jQueryKnob */

		$('.knob').knob({
			/*change : function (value) {
			//console.log("change : " + value);
			},
			release : function (value) {
			console.log("release : " + value);
			},
			cancel : function () {
			console.log("cancel : " + this.value);
			},*/
			draw: function() {

				// "tron" case
				if (this.$.data('skin') == 'tron') {

					var a = this.angle(this.cv) // Angle
						,
						sa = this.startAngle // Previous start angle
						,
						sat = this.startAngle // Start angle
						,
						ea // Previous end angle
						,
						eat = sat + a // End angle
						,
						r = true

					this.g.lineWidth = this.lineWidth

					this.o.cursor &&
						(sat = eat - 0.3) &&
						(eat = eat + 0.3)

					if (this.o.displayPrevious) {
						ea = this.startAngle + this.angle(this.value)
						this.o.cursor &&
							(sa = ea - 0.3) &&
							(ea = ea + 0.3)
						this.g.beginPath()
						this.g.strokeStyle = this.previousColor
						this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
						this.g.stroke()
					}

					this.g.beginPath()
					this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
					this.g.stroke()

					this.g.lineWidth = 2
					this.g.beginPath()
					this.g.strokeStyle = this.o.fgColor
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
					this.g.stroke()

					return false
				}
			}
		})
		/* END JQUERY KNOB */

		//INITIALIZE SPARKLINE CHARTS
		var sparkline1 = new Sparkline($('#sparkline-1')[0], {
			width: 240,
			height: 70,
			lineColor: '#92c1dc',
			endColor: '#92c1dc'
		})
		var sparkline2 = new Sparkline($('#sparkline-2')[0], {
			width: 240,
			height: 70,
			lineColor: '#f56954',
			endColor: '#f56954'
		})
		var sparkline3 = new Sparkline($('#sparkline-3')[0], {
			width: 240,
			height: 70,
			lineColor: '#3af221',
			endColor: '#3af221'
		})

		sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
		sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
		sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

	})
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")