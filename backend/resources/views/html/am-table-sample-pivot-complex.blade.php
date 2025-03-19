<?php 
$pageTitle = 'Kontrak';
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
                    <a href="{{@url('/html/am-form-master-pivot-complex-add')}}" class="btn btn-primary btn-sm ml-2">Add New</a>
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
        <div class="container ml-0">
            <div class="card">
                <div class="card-body">

                    <div class="row align-items-center mb-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="list-status">
                                <ul>
                                    <li class="active">
                                        <a href="#">Publish</a>
                                    </li>
                                    <li>
                                        <a href="#">Trash</a>
                                    </li>
                                    <li>
                                        <a href="#">All</a>
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
                                            <button class="btn btn-sm btn-default ml-2"><i class="ph ph-magnifying-glass"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto column-filter">
                                    <button class="btn btn-sm btn-default js-filter-btn">
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
                                    <div class="row grid-filter-data">
                                        <div class="col-12 col-md-3">
                                            <div class="form-group mb-10">
                                                <label class="control-label">Pegawai</label>
                                                <div class="input-wrap">
                                                    <select name="status" class="form-control form-control-sm">
                                                        <option value="" selected="">Pilih Nama Pegawai</option>
                                                        <option value="1">Alga Kharisma Adiyuda</option>
                                                        <option value="2">Nugroho Dwis Sugiharto</option>
                                                        <option value="3">Abdullah Hanif Mufid</option>
                                                        <option value="4">Anisa Kautsar Juniardi</option>
                                                        <option value="5">Erlina Cahyani</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="filter-data-list">
                                                <div class="filter-data-list__header">
                                                    <a href="#" class="clear js-clear-all" title="Clear All">
                                                        <i class="ph ph-trash"></i>
                                                    </a> Pegawai
                                                </div>
                                                <div class="filter-data-list__body">
                                                    <div class="input">
                                                        <input type="text" class="form-control form-control-sm" name="pegawai" placeholder="Paste Here">
                                                    </div>
                                                    <div class="empty">Empty</div>
                                                    <div class="data"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group mb-10">
                                                <label class="control-label">Posisi</label>
                                                <div class="input-wrap">
                                                    <select name="status" class="form-control form-control-sm">
                                                        <option value="">Select Posisi</option>
                                                        <option value="1">Frontend Developer</option>
                                                        <option value="2">Content Writer Website</option>
                                                        <option value="3">System Analyst</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="filter-data-list">
                                                <div class="filter-data-list__header">
                                                    <a href="#" class="clear js-clear-all" title="Clear All">
                                                        <i class="ph ph-trash"></i>
                                                    </a> Posisi
                                                </div>
                                                <div class="filter-data-list__body">
                                                    <div class="input">
                                                        <input type="text" class="form-control form-control-sm" name="pegawai" placeholder="Paste Here">
                                                    </div>
                                                    <div class="empty">Empty</div>
                                                    <div class="data"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group mb-10">
                                                <label class="control-label">Divisi</label>
                                                <div class="input-wrap">
                                                    <select name="status" class="form-control form-control-sm">
                                                        <option value="">Select Divisi</option>
                                                        <option value="1">Teknikal</option>
                                                        <option value="2">Content & SEO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="filter-data-list">
                                                <div class="filter-data-list__header">
                                                    <a href="#" class="clear js-clear-all" title="Clear All">
                                                        <i class="ph ph-trash"></i>
                                                    </a> Divisi
                                                </div>
                                                <div class="filter-data-list__body">
                                                    <div class="input">
                                                        <input type="text" class="form-control form-control-sm" name="divisi" placeholder="Paste Here">
                                                    </div>
                                                    <div class="empty">Empty</div>
                                                    <div class="data"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group mb-10">
                                                <label class="control-label">Status Pegawai</label>
                                                <div class="input-wrap">
                                                    <select name="status" class="form-control form-control-sm">
                                                        <option value="">Select Status Pegawai</option>
                                                        <option value="1">Full Time</option>
                                                        <option value="2">Freelance</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="filter-data-list">
                                                <div class="filter-data-list__header">
                                                    <a href="#" class="clear js-clear-all" title="Clear All">
                                                        <i class="ph ph-trash"></i>
                                                    </a> Status Pegawai
                                                </div>
                                                <div class="filter-data-list__body">
                                                    <div class="input">
                                                        <input type="text" class="form-control form-control-sm" name="status" placeholder="Paste Here">
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

                    <div class="table-action-top p-2 bg-white no-gap border-top">
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

                    <div class="table-responsive no-gap">
                        <table cellspacing="0" class="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main" width="100%">
                            <thead>
                                <tr>
                                    <th>Pegawai</th>
                                    <th>Tanggal Kontrak</th>
                                    <th>Sisa Kontrak</th>
                                    <th>Posisi</th>
                                    <th>Status</th>
                                    <th>Divisi</th>
                                    <th>Total Benefit</th>
                                    <th width="120" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alga Kharisma Adiyuda</td>
                                    <td>19 Mei 2020 s/d 19 Mei 2022</td>
                                    <td>9 bulan 20 hari</td>
                                    <td>Frontend Developer</td>
                                    <td>Full Time</td>
                                    <td>Teknikal</td>
                                    <td>Rp 1.800.000</td>
                                    <td class="text-center">
                                        <a href="{{@url('/html/am-form-master-pivot-complex-edit?pegawai=2')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-pencil"></i>
                                        </a>
                                        <a href="{{@url('/html/am-form-master-pivot-complex-view?pegawai=1')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nugroho Dwis Sugiharto</td>
                                    <td>19 Mei 2020 s/d 19 Mei 2022</td>
                                    <td>9 bulan 20 hari</td>
                                    <td>Frontend Developer</td>
                                    <td>Full Time</td>
                                    <td>Teknikal</td>
                                    <td>Rp 1.800.000</td>
                                    <td class="text-center">
                                        <a href="{{@url('/html/am-form-master-pivot-complex-edit?pegawai=2')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-pencil"></i>
                                        </a>
                                        <a href="{{@url('/html/am-form-master-pivot-complex-view?pegawai=2')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Abdullah Hanif Mufid</td>
                                    <td>19 Mei 2020 s/d 19 Mei 2022</td>
                                    <td>9 bulan 20 hari</td>
                                    <td>Content Writer Website</td>
                                    <td>Full Time</td>
                                    <td>SEO &amp; CW</td>
                                    <td>Rp 1.800.000</td>
                                    <td class="text-center">
                                        <a href="{{@url('/html/am-form-master-pivot-complex-edit?pegawai=3')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-pencil"></i>
                                        </a>
                                        <a href="{{@url('/html/am-form-master-pivot-complex-view?pegawai=3')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Anisa Kautsar Juniardi</td>
                                    <td>19 Mei 2020 s/d 19 Mei 2022</td>
                                    <td>9 bulan 20 hari</td>
                                    <td>Content Writer Website</td>
                                    <td>Full Time</td>
                                    <td>SEO &amp; CW</td>
                                    <td>Rp 1.800.000</td>
                                    <td class="text-center">
                                        <a href="{{@url('/html/am-form-master-pivot-complex-edit?pegawai=4')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-pencil"></i>
                                        </a>
                                        <a href="{{@url('/html/am-form-master-pivot-complex-view?pegawai=4')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Erlina Cahyani</td>
                                    <td>19 Mei 2020 s/d 19 Mei 2022</td>
                                    <td>9 bulan 20 hari</td>
                                    <td>System Analyst</td>
                                    <td>Full Time</td>
                                    <td>Teknikal</td>
                                    <td>Rp 1.800.000</td>
                                    <td class="text-center">
                                        <a href="{{@url('/html/am-form-master-pivot-complex-edit?pegawai=5')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-pencil"></i>
                                        </a>
                                        <a href="{{@url('/html/am-form-master-pivot-complex-view?pegawai=5')}}" class="btn btn-xs btn-link">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-action-bottom p-2 bg-white no-gap">
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
