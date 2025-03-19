<?php 
$pageTitle = 'Laporan Harian';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")



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
    
    <section class="content pb-5">
        <div class="container-fluid">

            <div class="mw-1200px">

                <div class="card">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" aria-selected="true">Harian</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-selected="false">Rekap</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-selected="false">Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-selected="false">Presensi Hari Ini</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">

                        <div class="row align-items-center mb-3">
                            <div class="col-sm-12 col-md-6">
                                <div class="list-status">
                                    <ul>
                                        <li class="active">
                                            <a href="#">Hari Ini</a>
                                        </li>
                                        <li>
                                            <a href="#">Minggu Ini</a>
                                        </li>
                                        <li>
                                            <a href="#">Bulan Ini</a>
                                        </li>
                                        <li>
                                            <a href="#">7 Hari</a>
                                        </li>
                                        <li>
                                            <a href="#">30 Hari</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row row-action separator justify-content-end align-items-center">
                                    <div class="col-auto column-button">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-default">Export</button>
                                            <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a class="dropdown-item" href="#">Export All</a>
                                                <a class="dropdown-item" href="#">Export Page</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto column-search">
                                        <form action="">
                                            <div class="d-flex">
                                                <input name="search" value="" type="search" class="form-control form-control-sm" placeholder="Search...">
                                                <button class="btn btn-default btn-sm ml-2"><i class="ph ph-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-auto column-filter">
                                        <button class="btn btn-default btn-sm js-filter-btn">
                                            <i class="icon ph ph-funnel"></i>
                                            <i class="icon ph ph-x" style="display: none;"></i>
                                        </button>
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <form action="" id="form-filter" style="display: none;">
                            <div class="card card-filter shadow-none border bg-gray-light">
                                <div class="card-body">     
                                    <div class="filter-data-wrapper">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-10 d-flex align-items-center">
                                                    <label class="control-label mr-3 mb-0">Report Type</label>
                                                    <div class="input-wrap">
                                                        <select name="" class="form-control form-control-sm">
                                                            <option value="">Select Report Type</option>
                                                            <option value="0">Detail</option>
                                                            <option value="1">Total</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row grid-filter-data">
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> SKU
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="status" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Serial Number
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Bin
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Pallet
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> PO
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-gray-light text-right border-top">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa fa-filter"></i> <span>Filter</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="card shadow-none border">
                            <div class="card-body">

                                <div class="row d-flex">
                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-primary small-box-bottom mb-0" style="height: 100%;">
                                            <div class="inner">
                                                <p><strong>
                                                    20 Hari Kerja<br>
                                                    1 Tanggal Merah
                                                </strong></p>
                                                <p class="mb-0"><small>Hari Kerja</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- ./row -->

                            </div>
                        </div>

                        <?php for ($i=0; $i < 2; $i++) { ?>

                            <div class="card border shadow-none">
                                <div class="row no-gutters flex-nowrap">
                                    <div class="col-auto box-info-left">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <td>

                                                    <div class="form-horizontal">
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Nama</label>
                                                            <div class="col-6">
                                                                <div class="form-value">Purnomo Jati (testing)</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Posisi</label>
                                                            <div class="col-6">
                                                                <div class="form-value">System Administrator</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Divisi</label>
                                                            <div class="col-6">
                                                                <div class="form-value">Administrasi</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Tanggal</label>
                                                            <div class="col-6">
                                                                <div class="form-value">Senin, 5 Juni 2023</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Jumlah Check In</label>
                                                            <div class="col-6">
                                                                <div class="form-value">1</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Total Jam</label>
                                                            <div class="col-6">
                                                                <div class="form-value">23:30</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Pause</label>
                                                            <div class="col-6">
                                                                <div class="form-value">00:00</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Pengurangan</label>
                                                            <div class="col-6">
                                                                <div class="form-value">00:00</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col p-3">

                                        <style>
                                            .bg-color-status {
                                                background-color: #ff5151 !important;
                                                color: white;
                                            }
                                        </style>
                                        <div class="repeater-item">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-lg-2">
                                                    <strong class="d-block pt-4i">Check IN #1</strong>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="form-group d-flex align-items-center justify-content-end mb-0 search-box--flex">
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-clock"></i> In 10:36 </strong>
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-clock"></i> Out 10:06 </strong>
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-clock"></i> 23:30 </strong>
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-pause-circle"></i> 00:00 </strong>
                                                        <div class="ml-2">
                                                            <a href="#" class="btn btn-xs btn-link">
                                                                <i class="ph ph-magnifying-glass"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-xs btn-link">
                                                                <i class="ph ph-pencil"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- table box -->
                                            <div class="table-box" style="margin-top: 15px;">
                                                <table id="" class="table table-compact table-bordered table-striped table-main">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Proyek</th>
                                                            <th width="40%">Task</th>
                                                            <th width="20%">Tag</th>
                                                            <th width="10%">Durasi</th>
                                                            <th width="30%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>CR G-Asfin Risk Limit 2023</td>
                                                            <td> Testing </td>
                                                            <td></td>
                                                            <td>23:30</td>
                                                            <td class="text-center">
                                                                <a href="javascript:void(0)" class="lihat btn btn-xs btn-link" data-detail="
                                                                    <p>tester</p>">
                                                                    <i class="fa fa-sticky-note-o"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card border shadow-none">
                                <div class="row no-gutters flex-nowrap">
                                    <div class="col-auto box-info-left">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <td>

                                                    <div class="form-horizontal">
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Nama</label>
                                                            <div class="col-6">
                                                                <div class="form-value">Purnomo Jati (testing)</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Posisi</label>
                                                            <div class="col-6">
                                                                <div class="form-value">System Administrator</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Divisi</label>
                                                            <div class="col-6">
                                                                <div class="form-value">Administrasi</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Tanggal</label>
                                                            <div class="col-6">
                                                                <div class="form-value">Jumat, 2 Juni 2023</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Jumlah Check In</label>
                                                            <div class="col-6">
                                                                <div class="form-value">1</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Total Jam</label>
                                                            <div class="col-6">
                                                                <div class="form-value">00:40</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Pause</label>
                                                            <div class="col-6">
                                                                <div class="form-value">00:05</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <div class="row mb-2">
                                                            <label class="col-6 label-inline text-right mb-0">Pengurangan</label>
                                                            <div class="col-6">
                                                                <div class="form-value">00:00</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col p-3">

                                        <style>
                                        .bg-color-status {
                                            background-color: #ff5151 !important;
                                            color: white;
                                        }
                                        </style>

                                        <div class="repeater-item">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-lg-2">
                                                    <strong class="d-block pt-4i">Check IN #1</strong>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="form-group d-flex align-items-center justify-content-end mb-0 search-box--flex">
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-clock"></i> In 13:00 </strong>
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-clock"></i> Out 13:45 </strong>
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-clock"></i> 00:45 </strong>
                                                        <strong class="d-block" style="margin-left: 5px">
                                                            <i class="ph ph-pause-circle"></i> 00:05 </strong>
                                                        <div class="ml-2">
                                                            <a href="#" class="btn btn-xs btn-link">
                                                                <i class="ph ph-magnifying-glass"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-xs btn-link">
                                                                <i class="ph ph-pencil"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- table box -->
                                            <div class="table-box" style="margin-top: 15px;">
                                                <table id="" class="table table-compact table-bordered table-striped table-main">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Proyek</th>
                                                            <th width="40%">Task</th>
                                                            <th width="20%">Tag</th>
                                                            <th width="10%">Durasi</th>
                                                            <th width="30%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>POLIGON</td>
                                                            <td> Testing </td>
                                                            <td></td>
                                                            <td>00:40</td>
                                                            <td class="text-center">
                                                                <a href="javascript:void(0)" class="lihat btn btn-xs btn-link" data-detail="
                                                                                    
                                                                    <p>L
                                                                                        
                                                                        <br />Revisi Backlog Umum:
                                                                                    
                                                                    </p>
                                                                    <ul>
                                                                        <li>No.15: Kontrak - Impact Advanced Query (Kurang jenis kontak dan laporan 2 jenis kontrak)</li>
                                                                        <li>No.5: Revisi Kontrak Pegawai (Masih ada revisi terakhir)</li>
                                                                        <li>No. 6: System menghitung ulang laporan dan dasboard sesuai dengan tipe kontrak pegawai (selesai)</li>
                                                                        <li>No.8: Revisi Dashboard Tahap 2 =&amp;gt; statistik sudah sesai SQL (Selesai)</li>
                                                                        <li>No.12: Enhance Advanced Feature Tahap 3 (Kurang task 5-8)</li>
                                                                    </ul>
                                                                                    ">
                                                                    <i class="fa fa-sticky-note-o"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <div class="table-action-bottom py-3  no-gap bg-white">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="show-entries">
                                        <label>Show</label>
                                        <select class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                        <label>Entries</label>
                                    </div>
                                </div>
                                <div class="col-auto ml-auto">
                                    <div class="tablenav-pages d-flex align-items-center">
                                        <span class="displaying-num">Showing 1 to 10 of 57 entries</span>
                                        <ul class="pagination pagination-sm ml-3 mb-0">
                                            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                                        </ul>
                                    </div>
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

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
    // show hide filter
    $('.js-filter-btn').click(function() {
        $(this).toggleClass('btn-default');
        $(this).toggleClass('btn-secondary');
        $(this).find('.icon').toggle();
        $('#form-filter').slideToggle('slow');
    });

    // Select All
    $('.table-main th > input[type="checkbox"]').on('click', function() {
      if ($(this).is(':checked')) {
        $('.table-main tbody > tr').addClass('selected');
        $('.table-main tbody > tr > td > input[type="checkbox').prop("checked", true);
      } else {
        $('.table-main tbody > tr').removeClass('selected');
        $('.table-main tbody > tr > td > input[type="checkbox').prop("checked", false);
      }
    });

    // Select Row
    $('.table-main tbody td > input[type="checkbox"]').on('click', function() {
      if ($(this).is(':checked')) {
        $(this).parent().parent().addClass('selected');
      } else {
        $(this).parent().parent().removeClass('selected');
      }
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
