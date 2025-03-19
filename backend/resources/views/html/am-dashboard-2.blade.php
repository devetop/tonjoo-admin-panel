<?php 
$pageTitle = 'Dashboard Admin Amanah Presensi';
$breadcrumbs = array(
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- Swiper -->
<link rel="stylesheet" href="/dist/plugins/swiper@10.1.0/swiper-bundle.min.css">

<!-- fullCalendar -->
<link rel="stylesheet" href="/dist/plugins/fullcalendar/main.css">

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
            <div class="row">

                <div class="col-12 col-md-8 pb-3">

                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title m-0">ATTENTION</h3>
                        </div>
                        <div class="card-body">

                            <div class="swiper swiper-attention h-100" style="--swiper-navigation-size: 20px;">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        <div class="px-5">
                                            <h2>Pengumuman Pertama</h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                            
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="px-5">
                                            <h2>Pengumuman Kedua</h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>

                                    </div>
                                    <div class="swiper-slide">
                                        <div class="px-5">
                                            <h2>Pengumuman Ketiga</h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-4 pb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title m-0">NOTIFIKASI</h3>
                        </div>
                        <div class="card-body">
                            
                            <ul class="list-item list-unstyled">
                                <?php for ($i=0; $i < 10; $i++) { ?>
                                    <li class="d-flex align-item-start flex-nowrap mb-1">
                                        <i class="fas fa-circle fa-xs my-1 mr-2 text-danger"></i>
                                        <span>Al-Khadafi mengajukan <a href="#">revisi presensi</a></span>
                                    </li>
                                <?php } ?>
                                
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-md-8 pb-3">

                    <div class="card h-100">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-4 pb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title m-0">STATISTIK BULAN INI</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="info-box bg-green">
                                        <span class="info-box-icon w-auto px-2"><i class="far fa-clock"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Jam Kerja</span>
                                            <span class="info-box-number text-lg line-height">52:06</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-6">
                                    <div class="info-box bg-orange">
                                        <span class="info-box-icon w-auto px-2"><i class="far fa-calendar-alt"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Rata-rata Harian</span>
                                            <span class="info-box-number text-lg line-height">08:41</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-6">
                                    <div class="info-box bg-purple">
                                        <span class="info-box-icon w-auto px-2"><i class="far fa-moon"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Lembur</span>
                                            <span class="info-box-number text-lg line-height">04:06</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-6">
                                    <div class="info-box bg-red">
                                        <span class="info-box-icon w-auto px-2"><i class="far fa-calendar-times"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Kekurangan Jam</span>
                                            <span class="info-box-number text-lg line-height">00:00</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-6">
                                    <div class="info-box bg-teal">
                                        <span class="info-box-icon w-auto px-2"><i class="far fa-calendar-plus"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Paid Leave Bulan Ini</span>
                                            <span class="info-box-number text-lg line-height">0 Hari</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-6">
                                    <div class="info-box bg-indigo">
                                        <span class="info-box-icon w-auto px-2"><i class="far fa-calendar-minus"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Unpaid Leave Bulan Ini</span>
                                            <span class="info-box-number text-lg line-height">0 Hari</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-6">
                                    <div class="info-box bg-blue">
                                        <span class="info-box-icon w-auto px-2"><i class="far fa-calendar-check"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Sisa Paid Leave</span>
                                            <span class="info-box-number text-lg line-height">12 Hari</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
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

<!-- Swiper -->
<script src={{url("dist/plugins/swiper@10.1.0/swiper-bundle.min.js")}}></script>

<!-- fullCalendar 2.2.5 -->
<script src={{url("dist/plugins/moment/moment.min.js")}}></script>
<script src={{url("dist/plugins/fullcalendar/main.js")}}></script>
<script src={{url("dist/plugins/fullcalendar/locales-all.min.js")}}></script>
<!-- <script src={{url("https://unpkg.com/popper.js/dist/umd/popper.min.js")}}></script> -->
<!-- <script src={{url("https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js")}}></script> -->

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>

    $(function () {
        // Swiper
        const swiper = new Swiper('.swiper-attention', {
            loop: true,

            pagination: {
                el: '.swiper-pagination',
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        //Calendar
        /* initialize the calendar
		-----------------------------------------------------------------*/
		//Date for the calendar events (dummy data)
		var date = new Date()
		var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear()

		var Calendar = FullCalendar.Calendar;
		var calendarEl = document.getElementById('calendar');

        var calendar = new Calendar(calendarEl, {
            locale: 'id',
            timeZone: 'Asia/Jakarta',
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay'
			},
			themeSystem: 'bootstrap',
            // eventDidMount: function(info) {
            //     var tooltip = new Tooltip(info.el, {
            //         title: info.event.extendedProps.description,
            //         placement: 'top',
            //         trigger: 'hover',
            //         container: 'body'
            //     });
            // },
			//Random default events
			events: [
                
                {
					title: 'Hari Proklamasi Kemerdekaan R.I.',
                    description: 'Libur 17 Agustus',
					start: new Date(y, 7, 17),
					backgroundColor: 'red', //red
					borderColor: 'red', //red
					allDay: true
				},

                {
					title: 'All Day Event',
					start: new Date(y, m, 1),
					backgroundColor: '#f56954', //red
					borderColor: '#f56954', //red
					allDay: true
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d - 5),
					end: new Date(y, m, d - 2),
					backgroundColor: '#f39c12', //yellow
					borderColor: '#f39c12' //yellow
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					backgroundColor: '#0073b7', //Blue
					borderColor: '#0073b7' //Blue
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					backgroundColor: '#00c0ef', //Info (aqua)
					borderColor: '#00c0ef' //Info (aqua)
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d + 1, 19, 0),
					end: new Date(y, m, d + 1, 22, 30),
					allDay: false,
					backgroundColor: '#00a65a', //Success (green)
					borderColor: '#00a65a' //Success (green)
				},

                
			],
			editable: false,
			droppable: false, // this allows things to be dropped onto the calendar !!!
		});

		calendar.render();
        
    });

</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
