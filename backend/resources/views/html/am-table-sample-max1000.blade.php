<?php 
$pageTitle = 'Unit of Measurement';
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
                    <a href="#" class="btn btn-primary btn-sm ml-2">Create Unit of Measurement</a>
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
            <div class="mw-1000px">
                <div class="card">
                    <div class="card-body">

                        <div class="row align-items-center mb-3">
                            <div class="col-sm-12 col-md-4">
                                <div class="list-status">
                                    <ul>
                                        <li class="active">
                                            <a href="#">Published</a>
                                        </li>
                                        <li>
                                            <a href="#">Draft</a>
                                        </li>
                                        <li>
                                            <a href="#">Repro</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="row row-action separator justify-content-end align-items-center">
                                    <div class="col-auto column-button">
                                        <a href="#" class="btn btn-default btn-sm">Contact Admin</a>
                                        <a href="#" class="btn btn-default btn-sm">Mass Update Priority</a>
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

                        <form action="" id="form-filter" style="display: none;" class="no-gap">
                            <div class="card card-filter shadow-none border-top border-bottom mb-0 bg-gray-light rounded-0">
                                <div class="card-body">     
                                    <div class="row">
                                        <div class="col-auto d-flex flex-column">
                                            <label class="d-block">Lorem</label>
                                            <select id="status" class="form-control form-control-sm" name="">
                                                <option selected="selected" value="">Select Lorem</option>
                                                <option value="2">Lorem-001</option>
                                                <option value="6">Lorem-001</option>
                                                <option value="7">Lorem-001</option>
                                                <option value="8">Lorem-001</option>
                                            </select>
                                        </div>
                                        <div class="col-auto d-flex flex-column">
                                            <label class="d-block">Lorem</label>
                                            <select id="status" class="form-control form-control-sm" name="">
                                                <option selected="selected" value="">Select Lorem</option>
                                                <option value="2">Lorem-002</option>
                                                <option value="6">Lorem-002</option>
                                                <option value="7">Lorem-002</option>
                                                <option value="8">Lorem-002</option>
                                            </select>
                                        </div>
                                        <div class="col-auto d-flex flex-column justify-content-end">
                                            <button type="button" class="btn btn-primary btn-sm">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-action-top p-2 no-gap">
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
                                        <input name="bapply" type="submit" class="btn btn-default btn-sm ml-2" value="Terapkan">
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
                                        <th width="30" class="text-center"><input type="checkbox"></th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a href={{@url("html.table-300-view.php")}}> Cm </a></td>
                                        <td>cm</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a href={{@url("html.table-300-view.php")}}> Liter </a></td>
                                        <td>liter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-action-bottom p-2 no-gap">
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
                                        <input name="bapply" type="submit" class="btn btn-default btn-sm ml-2" value="Terapkan">
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
