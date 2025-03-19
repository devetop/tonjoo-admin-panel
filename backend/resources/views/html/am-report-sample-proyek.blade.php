<?php 
$pageTitle = 'Rekap PIC';
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
                                <a class="nav-link active" href="#" aria-selected="true">Rekap PIC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-selected="false">Rekap Task</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-selected="false">Detail</a>
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
                                        <div class="small-box bg-primary small-box-bottom mb-0">
                                            <div class="inner">
                                                <h3>723:44</h3>
                                                <p class="mb-0"><small>Total Jam Proyek</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-primary small-box-bottom mb-0">
                                            <div class="inner">
                                                <h3>90.5</h3>
                                                <p class="mb-0"><small>Total Mandays</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-primary small-box-bottom mb-0">
                                            <div class="inner">
                                                <h3>7</h3>
                                                <p class="mb-0"><small>Total Proyek</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- ./row -->

                            </div>
                        </div>

                        <table class="table table-compact table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Proyek</th>
                                    <th class="text-center">PIC</th>
                                    <th class="text-center">Tag</th>
                                    <th class="text-center">Task</th>
                                    <th class="text-center">Man Days</th>
                                    <th class="text-center">Jam Kerja</th>
                                    <th class="text-center">Lihat</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php for ($i=0; $i<2; $i++) { ?> 
                                    <tr>
                                        <td rowspan="4">Amanah V2</td>
                                        <td>Al-Khadafi</td>
                                        <td></td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">0.7</td>
                                        <td class="text-center">5:25</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-xs btn-link">
                                                <i class="ph ph-magnifying-glass"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="4">Amanah V2</td> -->
                                        <td>Fulan</td>
                                        <td></td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">0.5</td>
                                        <td class="text-center">3:43</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-xs btn-link">
                                                <i class="ph ph-magnifying-glass"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="4">Amanah V2</td> -->
                                        <td>Fulana</td>
                                        <td></td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">0.5</td>
                                        <td class="text-center">3:43</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-xs btn-link">
                                                <i class="ph ph-magnifying-glass"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="4">Amanah V2</td> -->
                                        <td colspan="3" class="text-right bg-gray">
                                            <strong>TOTAL</strong>
                                        </td>
                                        <!-- <td></td> -->
                                        <!-- <td class="text-center">1</td> -->
                                        <td class="text-center bg-gray">
                                            <strong>1.6</strong>
                                        </td>
                                        <td class="text-center bg-gray">
                                            <strong>12:51</strong>
                                        </td>
                                        <td class="text-center bg-gray"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">CR G-Asfin Risk Limit 2023</td>
                                        <td>Purnomo Jati (testing)</td>
                                        <td></td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2.9</td>
                                        <td class="text-center">23:30</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-xs btn-link">
                                                <i class="ph ph-magnifying-glass"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="4">Amanah V2</td> -->
                                        <td colspan="3" class="text-right bg-gray">
                                            <strong>TOTAL</strong>
                                        </td>
                                        <!-- <td></td> -->
                                        <!-- <td class="text-center">1</td> -->
                                        <td class="text-center bg-gray">
                                            <strong>2.9</strong>
                                        </td>
                                        <td class="text-center bg-gray">
                                            <strong>23:30</strong>
                                        </td>
                                        <td class="text-center bg-gray"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="6">Mega Project</td>
                                        <td>Purnomo Jati (testing)</td>
                                        <td>billable</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">1.1</td>
                                        <td class="text-center">09:00</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-xs btn-link">
                                                <i class="ph ph-magnifying-glass"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td rowspan="2">Mega Project</td> -->
                                        <td>Purnomo Jati (testing)</td>
                                        <td>unbillable</td>
                                        <td class="text-center">6</td>
                                        <td class="text-center">2.2</td>
                                        <td class="text-center">17:30</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-xs btn-link">
                                                <i class="ph ph-magnifying-glass"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td rowspan="2">Mega Project</td> -->
                                        <td>Purnomo Jati (testing)</td>
                                        <td>unbillable</td>
                                        <td class="text-center">7</td>
                                        <td class="text-center">4.7</td>
                                        <td class="text-center">37:30</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-xs btn-link">
                                                <i class="ph ph-magnifying-glass"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="4">Amanah V2</td> -->
                                        <td colspan="3" class="text-right bg-gray">
                                            <strong>TOTAL</strong>
                                        </td>
                                        <!-- <td></td> -->
                                        <!-- <td class="text-center">1</td> -->
                                        <td class="text-center bg-gray">
                                            <strong>8.0</strong>
                                        </td>
                                        <td class="text-center bg-gray">
                                            <strong>64:00</strong>
                                        </td>
                                        <td class="text-center bg-gray"></td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="4">Amanah V2</td> -->
                                        <td colspan="3" class="text-right bg-gray">
                                            <strong>TOTAL BILLABLE</strong>
                                        </td>
                                        <!-- <td></td> -->
                                        <!-- <td class="text-center">1</td> -->
                                        <td class="text-center bg-gray">
                                            <strong>1.1</strong>
                                        </td>
                                        <td class="text-center bg-gray">
                                            <strong>09:00</strong>
                                        </td>
                                        <td class="text-center bg-gray"></td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="4">Amanah V2</td> -->
                                        <td colspan="3" class="text-right bg-gray">
                                            <strong>TOTAL UNBILLABLE</strong>
                                        </td>
                                        <!-- <td></td> -->
                                        <!-- <td class="text-center">1</td> -->
                                        <td class="text-center bg-gray">
                                            <strong>2.2</strong>
                                        </td>
                                        <td class="text-center bg-gray">
                                            <strong>17:30</strong>
                                        </td>
                                        <td class="text-center bg-gray"></td>
                                    </tr> 
                                <?php } ?>
                            </tbody>
                        </table>

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
