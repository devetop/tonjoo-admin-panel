<?php 
$pageTitle = 'Table Sample 2';
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
                    <a href="#" class="btn btn-primary btn-sm ml-2">Add New</a>
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

                    <div class="row justify-content-end mb-3">
                        <div class="col-2">
                            <form action="" class="">
                                <div class="d-flex">
                                    <input name="search" value="" type="search" class="form-control form-control-sm" placeholder="Search...">
                                    <button class="btn btn-sm btn-default ml-2"><i class="ph ph-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-action-top no-gap">
                        <div class="row align-items-center flex-wrap">
                            <div class="col-auto d-flex align-items-center">
                                <div class="col-auto border-right pr-2 mr-2">
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
                                <div class="action bulk-action d-flex align-items-center border-right pr-2 mr-2">
                                    <select name="apply" class="form-control form-control-sm">
                                        <option disabled="" selected>Option</option>
                                        <option value="trash">Move to Trash</option>
                                    </select>
                                    <input name="bapply" type="submit" class="btn btn-default ml-2" value="Terapkan">
                                </div>  
                                
                                <div class="action filter-action d-flex align-items-center">
                                    <label for="job" class="mb-0 mr-2">Job</label>
                                    <select id="job" class="form-control form-control-sm" name="">
                                        <option value="0">All Job</option>
                                        <option value="1">Projecr Manager</option>
                                        <option value="1">Developer</option>
                                    </select>

                                    <label for="start_date" class="mb-0 mx-2">From</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control form-control-sm datepicker" id="start_date" value="19-Sep-2018" data-date-format="dd-M-yyyy">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="ph ph-calendar-blank"></i></div>
                                        </div>
                                    </div>
                                    <!-- <div class="input-group date">                          
                                        <input type="text" class="form-control form-control-sm pull-right datepicker" id="start_date" value="19-Sep-2018" data-date-format="dd-M-yyyy">
                                        <div class="input-group-addon">
                                        <i class="ph ph-calendar-blank"></i>
                                        </div>
                                    </div> -->

                                    <label for="end_date" class="mb-0 mx-2">To</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control form-control-sm datepicker" id="end_date" value="20-Sep-2018" data-date-format="dd-M-yyyy">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="ph ph-calendar-blank"></i></div>
                                        </div>
                                    </div>
                                    <!-- <div class="input-group date">                          
                                        <input type="text" class="form-control form-control-sm pull-right datepicker" id="end_date" value="20-Sep-2018" data-date-format="dd-M-yyyy">
                                        <div class="input-group-addon">
                                        <i class="ph ph-calendar-blank"></i>
                                        </div>
                                    </div> -->

                                    <button class="btn btn-default ml-2">Filter</button>
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
                        <table cellspacing="0" class="table table-compact table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main" width="100%">
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

                    <div class="table-action-bottom no-gap">
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
                                    <input name="bapply" type="submit" class="btn btn-sm btn-default ml-2" value="Terapkan">
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
