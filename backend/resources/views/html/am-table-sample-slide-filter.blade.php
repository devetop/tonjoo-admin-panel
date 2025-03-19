<?php 
$pageTitle = 'My Order';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- <link rel="stylesheet" href="./plugins/bootstrap-slider/slider.css"> -->

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
                    <a href="#" class="btn btn-primary btn-sm ml-2">Add New Attribute</a>
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
            <div class="card">
                <div class="card-body">

                    <div class="row align-items-center mb-3">
                        <div class="col-sm-12 col-md-4">
                            <div class="list-status">
                                <ul>
                                    <li class="active">
                                        <a href="#">Pending Approcal (14)</a>
                                    </li>
                                    <li>
                                        <a href="#">In Progress (10)</a>
                                    </li>
                                    <li>
                                        <a href="#">Reject (4)</a>
                                    </li>
                                    <li>
                                        <a href="#">Trash</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="row row-action separator justify-content-end align-items-center">
                                <div class="col-auto column-button">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle export-btn custom-icon" data-toggle="dropdown">
                                            <i class="ph ph-export mr-1"></i> Export
                                            <i class="ph ph-caret-down ml-1"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a class="dropdown-item" href="#">Excel</a>
                                            <a class="dropdown-item" href="#">PDF</a>
                                        </div>
                                    </div>

                                    <!-- forward button -->
                                    <a href="#" class="btn btn-sm btn-default"><i class="ph ph-share mr-1"></i> Forward</a>

                                    <!-- print button -->
                                    <a href="#" class="btn btn-sm btn-default"><i class="ph ph-printer mr-1"></i> Print</a>

                                    <!-- share button -->
                                    <a href="#" class="btn btn-sm btn-default"><i class="ph ph-share-network mr-1"></i> Share</a>
                                </div>
                                <div class="col-auto column-search">
                                    <form action="">
                                        <div class="d-flex">
                                            <input name="search" value="" type="text" class="form-control form-control-sm" placeholder="Search...">
                                            <button class="btn btn-sm btn-default ml-2"><i class="ph ph-magnifying-glass"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto column-filter">
                                    <a href="#" class="btn btn-sm btn-default js-filter-btn">
                                        <i class="icon ph ph-funnel"></i>
                                        <i class="icon ph ph-x" style="display: none;"></i>
                                    </a>
                                </div>
                            </div>                                    
                        </div>
                    </div>

                    <form action="" id="form-filter" style="display: none;" class="no-gap">
                        <div class="card card-filter shadow-none border-top border-bottom mb-0 bg-gray-light rounded-0">
                            <div class="card-body">     
                                <div class="row">
                                    <div class="col-auto d-flex flex-column">
                                        <label class="d-block">Status</label>
                                        <select id="status" class="form-control form-control-sm" name="">
                                            <option value="0">All</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <label class="d-block">Order Date</label>

                                        <div class="d-flex align-items-center">
                                            <div class="input-group date">
                                                <input type="text" class="form-control form-control-sm datepicker" id="start_date" value="19-Sep-2018" data-date-format="dd-M-yyyy">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="ph ph-calendar-blank"></i></div>
                                                </div>
                                            </div>
                                            
                                            <label for="end_date" class="mb-0 mx-2">To</label>
                                            
                                            <div class="input-group date">
                                                <input type="text" class="form-control form-control-sm datepicker" id="end_date" value="20-Sep-2018" data-date-format="dd-M-yyyy">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="ph ph-calendar-blank"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <label class="d-block">Order Level</label>

                                        <div class="d-flex align-items-center">
                                            <span class="checkbox mr-2">
                                                <label class="mb-0"><input type="checkbox"><span class="ml-1">Old</span></label>
                                            </span>
                                            <span class="checkbox mr-2">
                                                <label class="mb-0"><input type="checkbox"><span class="ml-1">New</span></label>
                                            </span>
                                            <span class="checkbox">
                                                <label class="mb-0"><input type="checkbox"><span class="ml-1">Future</span></label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <label class="d-block">Customer</label>

                                        <div class="d-flex align-items-center">
                                            <span class="checkbox mr-2">
                                                <label class="mb-0"><input type="radio" name="customer"><span class="ml-1">Single</span></label>
                                            </span>
                                            <span class="checkbox mr-2">
                                                <label class="mb-0"><input type="radio" name="customer"><span class="ml-1">Corporate</span></label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <label class="d-block">Range</label>

                                        <div class="filter-range">
                                            <small class="text-red">$100 - $900</small>
                                            <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200" data-slider-step="5" data-slider-value="[-200,100]" data-slider-orientation="horizontal"
                                            data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex flex-column justify-content-end">
                                        <button type="button" class="btn btn-sm btn-primary btn-sm">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-action-top p-2 bg-white border">
                        <div class="row align-items-center flex-wrap">
                            <div class="col-auto border-right pr-3 mr-1">
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
                            <div class="col-auto d-flex align-items-center">
                                <div class="action bulk-action d-flex align-items-center mr-2">
                                    <select name="apply" class="form-control form-control-sm">
                                        <option disabled="" selected>Option</option>
                                        <option value="trash">Move to Trash</option>
                                    </select>
                                    <input name="bapply" type="submit" class="btn btn-sm btn-default btn-sm ml-2" value="Terapkan">
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

                    <div class="table-responsive">
                        <table cellspacing="0" class="table table-head-fixed table-bordered table-head-nowrap table-striped table-main" width="100%">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center"><input type="checkbox"></th>
                                    <th class="col-sort"><a href="#">Name <i class="ph ph-sort-ascending"></i></a></th>
                                    <th class="col-sort"><a href="#">Job <i class="ph ph-sort-descending"></i></a></th>
                                    <th>Join Date</th>
                                    <th><i class="ph ph-money"></i></th>
                                    <th>Alamat</th>                      
                                    <th width="100" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0;$i<5;$i++){?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Budi Raharjo</td>
                                    <td>Mekanik</td>
                                    <td>21-Apr-2016</td>
                                    <td>320.800</td>
                                    <td>Jln. Nakula Sadewa No 10, Kampung pulo, Magetan, Jawa Timur</td>      
                                    <td class="text-center">
                                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-pencil"></i></a>
                                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-eye"></i></a>
                                    </td>                  
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Nanik Rahayu</td>
                                    <td>Koki</td>
                                    <td>21-Apr-2016</td>
                                    <td>120.800</td>
                                    <td>Jln. Maju Mundur No. 55, RT 03/ RW 10, Kecamatan Suka-suka</td>     
                                    <td class="text-center">
                                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-pencil"></i></a>
                                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-eye"></i></a>
                                    </td>                   
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-action-bottom bg-white p-2 border">
                        <div class="row align-items-center">
                            <div class="col-auto border-right pr-3 mr-1">
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
                            <div class="col-auto">
                                <div class="action bulk-action d-flex">
                                    <select name="apply" class="form-control form-control-sm">
                                        <option disabled="" selected="">Option</option>
                                        <option value="trash">Move to Trash</option>
                                    </select>
                                    <input name="bapply" type="submit" class="btn btn-sm btn-default btn-sm ml-2" value="Terapkan">
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
    </section>
</div>
<!-- /.content-wrapper -->


@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>
<!-- <script src={{url("./plugins/bootstrap-slider/bootstrap-slider.min.js")}}></script> -->

<script>
    // Bootstrap Slider
    $('.slider').slider();

    // show hide filter
    $('.js-filter-btn').click(function() {
        $(this).toggleClass('btn-sm btn-default');
        $(this).toggleClass('btn-secondary');
        $(this).find('.icon').toggle();
        $('#form-filter').slideToggle('slow');
    });

    // list data
    $.sanitize = function(input) {
      var output = input.replace(/<script[^>]*?>.*?<\/script>/gi, '').
        replace(/<((?!br))[\/\!]*?[^<>]*?>/gi, '').
        replace(/<style[^>]*?>.*?<\/style>/gi, '').
        replace(/<![\s\S]*?--[ \t\n\r]*>/gi, '');
      return output;
    };

    // Add Data On Paste
    $('.filter-data-list__body .form-control').on('paste', function(e) {
      var pastedData = e.originalEvent.clipboardData.getData('text');
      var dataArray = pastedData.split("\n");
      var name = $(this).attr('name');

      $(this).closest('.filter-data-list__body').find('.empty').hide();
      $(this).closest('.filter-data-list__body').find('.data').show();

      for (var i = 0; i < dataArray.length; i++) {
        var dataItem = $.sanitize(dataArray[i]).trim();

        if (dataItem !== '') {
          var itemWrap = '<div class="item">' +
            '<a href="#" class="clear js-clear-item" title="Delete"><i class="ph ph-trash"></i></a>' + dataItem +
            '<input type="hidden" value="' + dataItem + '" name="' + name + '[]">' +
          '</div>';

          $(this).closest('.filter-data-list__body').find('.data').prepend($(itemWrap));
        }
      }

      e.preventDefault();
    });

    // Add Data On Enter
    $('.filter-data-list__body .form-control').on('keypress', function(e) {
      if (event.keyCode === 10 || event.keyCode === 13) {
        e.preventDefault();
        var name = $(this).attr('name');
        var dataItem = $.sanitize($(this).val()).trim();

        $(this).closest('.filter-data-list__body').find('.empty').hide();
        $(this).closest('.filter-data-list__body').find('.data').show();

        var itemWrap = '<div class="item">' +
          '<a href="#" class="clear js-clear-item" title="Delete"><i class="ph ph-trash"></i></a>' + dataItem +
          '<input type="hidden" value="' + dataItem + '" name="' + name + '[]">' +
        '</div>';

        $(this).closest('.filter-data-list__body').find('.data').prepend($(itemWrap));
        $(this).val('');
      }
    });

    // Clear All
    $('.filter-data-list .js-clear-all').on('click', function(e) {
      var container = $(this).closest('.filter-data-list');

      container.find('.data').empty().hide();
      container.find('.empty').show();

      e.preventDefault();
    });

    // Clear Item
    $('.filter-data-list').on('click', '.js-clear-item', function(e) {
      var container = $(this).closest('.filter-data-list__body')
      $(this).parent().remove();

      if (container.find('.data .item').length == 0) {
        container.find('.empty').show();
        container.find('.data').hide();
      }

      e.preventDefault();
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
