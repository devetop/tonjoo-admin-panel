<?php 
$pageTitle = 'Rekap Stock';
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
                                <a class="nav-link active" href="#" aria-selected="true">Nav Tab 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-selected="false">Nav Tab 2</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">

                        <div class="row align-items-center mb-3">
                            <div class="col-sm-12 col-md-6">
                                <div class="list-status">
                                    <ul>
                                        <li class="active">
                                            <a href="#">Filter 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Filter 2</a>
                                        </li>
                                        <li>
                                            <a href="#">Filter 3</a>
                                        </li>
                                        <li>
                                            <a href="#">Filter 4</a>
                                        </li>
                                        <li>
                                            <a href="#">Filter 5</a>
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
                                            <div class="col-12 col-md-3">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Pegawai
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
                                            <div class="col-12 col-md-3">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Divisi
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

                        <div class="table-responsive no-gap">
                            <table cellspacing="0" class="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main" width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-sort"><a href="#">SKU <i class="ph ph-sort-ascending"></i></a></th>
                                        <th class="col-sort"><a href="#">Name <i class="ph ph-sort-descending"></i></a></th>
                                        <th>Old Material</th>
                                        <th>EAN</th>
                                        <th>UPC</th>
                                        <th>PO</th>  
                                        <th>Destination</th>
                                        <th>Kelengkapan</th>
                                        <th>Bin Number</th>
                                        <th>Pallet</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i<5; $i++) { ?>
                                        <tr>
                                            <td><a href={{@url("html.fg-import.php")}}>SKU-001</a></td>
                                            <td>Lorem ipsum, dolor sit amet</td>
                                            <td>NO-1356</td>
                                            <td>EAN-6345</td>
                                            <td>UPC-2346</td>
                                            <td>PO-2586</td>
                                            <td>Destination</td>
                                            <td>Kelengkapan</td>
                                            <td>BIN-1534</td>
                                            <td>PL-2534</td>
                                            <td>230</td>
                                        </tr>
                                        <tr>
                                            <td><a href={{@url("html.fg-import.php")}}>SKU-002</a></td>
                                            <td>Lorem ipsum, dolor sit amet</td>
                                            <td>NO-1356</td>
                                            <td>EAN-6345</td>
                                            <td>UPC-2346</td>
                                            <td>PO-2586</td>
                                            <td>Destination</td>
                                            <td>Kelengkapan</td>
                                            <td>BIN-1534</td>
                                            <td>PL-2534</td>
                                            <td>230</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

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
