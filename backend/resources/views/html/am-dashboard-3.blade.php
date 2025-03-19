<?php 
$pageTitle = 'Dashboard FS';
$breadcrumbs = array(
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- Select 2 -->
<link rel="stylesheet" href="/dist/plugins/select2/css/select2.min.css">

<!-- Daterangepicker -->
<link rel="stylesheet" href="/dist/plugins/daterangepicker/daterangepicker.css">

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
            <div class="mw-1200px">

                <form action="" class="no-gap">
                    <div class="card card-filter shadow-none border mb-0">
                        <div class="card-body">     
                            <div class="row">
                                
                                <div class="col-auto d-flex flex-column">
                                    <label class="d-block">Rentang Tanggal</label>
                                    <div class="input-group">
                                    <button type="button" class="btn btn-sm btn-default" id="daterange-btn">
                                        <span>01-01-2023 - 31-12-2023</span>
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="col-auto d-flex flex-column">
                                    <label class="d-block">Konten</label>
                                    <select id="status" class="form-control form-control-sm js-select2" name="">
                                        <option selected="selected" value="">Semua Konten</option>
                                        <option value="1">Konten 1</option>
                                        <option value="2">Konten 2</option>
                                        <option value="3">Konten 3</option>
                                        <option value="4">Konten 4</option>
                                        <option value="5">Konten 5</option>
                                    </select>
                                </div>
                                <div class="col-auto d-flex flex-column">
                                    <label class="d-block">Mitra</label>
                                    <select id="status" class="form-control form-control-sm js-select2" name="">
                                        <option selected="selected" value="">Semua Mitra</option>
                                        <option value="1">Mitra 1</option>
                                        <option value="2">Mitra 2</option>
                                        <option value="3">Mitra 3</option>
                                        <option value="4">Mitra 4</option>
                                        <option value="5">Mitra 5</option>
                                    </select>
                                </div>
                                <div class="col-auto d-flex flex-column justify-content-end">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                        <a href="#" class="btn btn-default btn-sm ml-2">Reset Filter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row mt-3">
                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Semua User</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>User Aktif</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Pendaftar</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>User Bukan Pendaftar</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>User Profile Tidak Lengkap</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Semua Konten</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Perkuliahan</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Kelas</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Webinar</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Mentor</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Unversitas Terdaftar</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>999</h3>

                                <p>Mitra</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 col-lg-6">
                        <div class="card card-success card-outline">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title">Persebaran Daerah Pendaftar Top 20</h3>
                                <a href="#" class="btn btn-sm btn-link ml-auto"><i class="ph ph-arrow-square-out"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chart-daerahPendaftar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card card-success card-outline">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title">Persebaran Universitas Pendaftar Top 20</h3>
                                <a href="#" class="btn btn-sm btn-link ml-auto"><i class="ph ph-arrow-square-out"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chart-univPendaftar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card card-success card-outline">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title">Persebaran Usia Pendaftar</h3>
                                <a href="#" class="btn btn-sm btn-link ml-auto"><i class="ph ph-arrow-square-out"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chart-usiaPendaftar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card card-success card-outline">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title">Persebaran Pekerjaan Pendaftar</h3>
                                <a href="#" class="btn btn-sm btn-link ml-auto"><i class="ph ph-arrow-square-out"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chart-pekerjaanPendaftar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->


@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- Moment -->
<script src={{url("dist/plugins/moment/moment.min.js")}}></script>

<!-- Select2 -->
<script src={{url("dist/plugins/select2/js/select2.min.js")}}></script>

<!-- Daterangepicker -->
<script src={{url("dist/plugins/daterangepicker/daterangepicker.js")}}></script>

<!-- ChartJS -->
<script src={{url("dist/plugins/chart.js/Chart.min.js")}}></script>


<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
    $(function () {
        //Date range as a button
        $('#daterange-btn').daterangepicker({
            ranges: {
                'Hari ini': [moment(), moment()],
                '7 Terakhir': [moment().subtract(6, 'days'), moment()],
                'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                'Tahun Ini': [moment().startOf('year'), moment().endOf('year')],
            },
            startDate: "2023-01-01" ? moment("2023-01-01") : moment(),
            endDate: "2023-01-01" ? moment("2023-12-31") : moment()
        },
        function(start, end) {
            $('#tanggal_mulai').val(start.format('YYYY-MM-DD'))
            $('#tanggal_selesai').val(end.format('YYYY-MM-DD'))
            $('#daterange-btn span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'))
        });

        // Select2
        $('.js-select2').select2();

        // Chart
        // Daerah Pendaftar
        var daerahPendaftarData = {
			labels: ['Jakarta', 'Surabaya', 'Yogyakarta', 'Semarang', 'Surakarta', 'Madiun', 'Depok', 'Klaten', 'Ngawi', 'Sidoarjo', 'Makassar', 'Balikpapan'],
			datasets: [
                {
					label: 'Pendaftar',
					backgroundColor: 'rgba(60,141,188,0.9)',
					borderColor: 'rgba(60,141,188,0.8)',
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: 'rgba(60,141,188,1)',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data: [28, 48, 40, 19, 86, 27, 90, 76, 87, 12, 45, 99]
				},				
			]
		}

        var daerahPendaftarCanvas = $('#chart-daerahPendaftar').get(0).getContext('2d')
		var daerahChartData = $.extend(true, {}, daerahPendaftarData)
		var temp0 = daerahChartData.datasets[0]
		daerahChartData.datasets[0] = temp0

		var daerahChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false
		}

		new Chart(daerahPendaftarCanvas, {
			type: 'bar',
			data: daerahChartData,
			options: daerahChartOptions
		})

        // Universitas Pendaftar
        var univPendaftarData = {
			labels: ['UNU', 'UGM', 'UNY', 'UNJ', 'UNS', 'Amikom Yk', 'UPH', 'UI', 'Unair', 'UB', 'USU', 'ITB'],
			datasets: [
                {
					label: 'Pendaftar',
					backgroundColor: 'rgba(60,141,188,0.9)',
					borderColor: 'rgba(60,141,188,0.8)',
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: 'rgba(60,141,188,1)',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data: [28, 48, 40, 19, 86, 27, 90, 76, 87, 12, 45, 99]
				},				
			]
		}

        var univPendaftarCanvas = $('#chart-univPendaftar').get(0).getContext('2d')
		var univChartData = $.extend(true, {}, univPendaftarData)
		var temp0 = univChartData.datasets[0]
		univChartData.datasets[0] = temp0

		var univChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false
		}

		new Chart(univPendaftarCanvas, {
			type: 'bar',
			data: univChartData,
			options: univChartOptions
		})

        // Usia Pendaftar
        var usiaPendaftarData = {
			labels: ['18-20', '21-23', '24-26', '27-29', '30-32', '33-35', '36-38', '39-41'],
			datasets: [
                {
					label: 'Pendaftar',
					backgroundColor: 'rgba(60,141,188,0.9)',
					borderColor: 'rgba(60,141,188,0.8)',
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: 'rgba(60,141,188,1)',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data: [10, 58, 45, 20, 10, 0, 0, 0]
				},				
			]
		}

        var usiaPendaftarCanvas = $('#chart-usiaPendaftar').get(0).getContext('2d')
		var usiaChartData = $.extend(true, {}, usiaPendaftarData)
		var temp0 = usiaChartData.datasets[0]
		usiaChartData.datasets[0] = temp0

		var usiaChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false
		}

		new Chart(usiaPendaftarCanvas, {
			type: 'bar',
			data: usiaChartData,
			options: usiaChartOptions
		})

        // Pekerjaan Pendaftar
        var pekerjaanPendaftarData = {
			labels: ['Pelajar', 'Mahasiswa', 'Guru', 'TNI', 'Polri', 'PNS', 'Karyawan Swasta', 'Wirausaha'],
			datasets: [
                {
					label: 'Pendaftar',
					backgroundColor: 'rgba(60,141,188,0.9)',
					borderColor: 'rgba(60,141,188,0.8)',
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: 'rgba(60,141,188,1)',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data: [20, 58, 10, 0, 0, 0, 30, 0]
				},				
			]
		}

        var pekerjaanPendaftarCanvas = $('#chart-pekerjaanPendaftar').get(0).getContext('2d')
		var pekerjaanChartData = $.extend(true, {}, pekerjaanPendaftarData)
		var temp0 = pekerjaanChartData.datasets[0]
		pekerjaanChartData.datasets[0] = temp0

		var pekerjaanChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false
		}

		new Chart(pekerjaanPendaftarCanvas, {
			type: 'bar',
			data: pekerjaanChartData,
			options: pekerjaanChartOptions
		})
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
