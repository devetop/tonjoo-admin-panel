<?php 
$pageTitle = 'Product';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- Select 2 -->
<link rel="stylesheet" href="/dist/plugins/select2/css/select2.min.css">

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
    <section class="content">
        <div class="container-fluid">

            <div class="mw-1200px">
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
                                        <a href="#" class="btn btn-default btn-sm">Import</a>
                                        <a href="#" class="btn btn-default btn-sm">Export</a>
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
                                        <div class="row grid-filter-data">
                                            <div class="col-auto">
                                                <div class="form-group mb-10">
                                                    <label class="control-label">Range</label>
                                                    <div class="input-wrap">
                                                        <select name="range" class="form-control form-control-sm js-select2 w-100" data-allow-clear="true" data-placeholder="Select Range">
                                                            <option value="">All</option>
                                                            <option value="0">Range 1</option>
                                                            <option value="1">Range 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-group mb-10">
                                                    <label class="control-label">Category</label>
                                                    <div class="input-wrap">
                                                        <select name="category" class="form-control form-control-sm js-select2 w-100" data-allow-clear="true" data-placeholder="Select Group">
                                                            <option value="">All</option>
                                                            <option value="1">Variation 1</option>
                                                            <option value="2">Variation 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex align-items-end">
                                                <div class="form-group mb-10">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <span>Filter</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    
                        <div class="row align-items-center flex-wrap">
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

                        <div class="row align-items-center flex-wrap my-3">

                            <?php for ($i=0; $i < 8; $i++) { ?>
                                <div class="col-xs-12 col-md-6 col-lg-3 mb-3">
                                    <div class="variant-card">
                                        <div class="variant-card__label">Variation Product</div>
                                        <div class="variant-card__image">
                                            <img src="../assets/backend/dist/img/photo2.png" alt="" class="img-cover">
                                        </div>
                                        <div class="variant-card__header bg-gray-light font-weight-bold">Product A</div>
                                            <div class="variant-card__body">
                                                <div class="form-horizontal p-2">
                                                    <div class="form-group form-group--view row mb-0">
                                                        <label class="col-12 col-lg-4 label-inline">SKU</label>

                                                        <div class="col-12 col-lg-8">
                                                            <div class="form-value">SKU-003</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->

                                                    <div class="form-group form-group--view row mb-0">
                                                        <label class="col-12 col-lg-4 label-inline">Price</label>

                                                        <div class="col-12 col-lg-8">
                                                            <div class="form-value">Rp 50.000,00</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->

                                                    <div class="form-group form-group--view row mb-0">
                                                        <label class="col-12 col-lg-4 label-inline">Range</label>

                                                        <div class="col-12 col-lg-8">
                                                            <div class="form-value">Verve</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->

                                                    <div class="form-group form-group--view row mb-0">
                                                        <label class="col-12 col-lg-4 label-inline">Stock</label>

                                                        <div class="col-12 col-lg-8">
                                                            <div class="form-value">10</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                            </div>
                                        <div class="variant-card__footer border-none">
                                            <div class="btn-card-wrapper">
                                                <div class="row no-gutters">
                                                    <div class="col-12 col-md-6 d-flex justify-content-center border-right">
                                                        <a href="#" class="btn btn-card text-danger">
                                                            <i class="ph ph-eye"></i> View
                                                        </a>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex justify-content-center">
                                                        <a href="#" class="btn btn-card text-danger">
                                                            <i class="ph ph-pencil"></i> Edit
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div> 
                        <div class="row align-items-center flex-wrap">
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

<!-- Select2 -->
<script src={{url("dist/plugins/select2/js/select2.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
    // Select2
    $('.js-select2').select2();

    // show hide filter
    $('.js-filter-btn').click(function() {
        $(this).toggleClass('btn-default');
        $(this).toggleClass('btn-secondary');
        $(this).find('.icon').toggle();
        $('#form-filter').slideToggle('slow');
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
