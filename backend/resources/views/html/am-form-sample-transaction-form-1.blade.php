<?php 
$pageTitle = 'Transaction Form';
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
            <div class="mw-100">

                <form accept-charset="UTF-8" action="" method="POST" role="form" class="multi-action-form validate-form"> 
                    <div class="row">
                        <div class="col-12 col-md">
                            <div class="card">         
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                        
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-3">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Inbound
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-9">
                                                    <div class="input-wrap">
                                                        <input type="text" class="form-control form-control-sm" value="IBD-001" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-3">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Date
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-9">
                                                    <div class="input-wrap">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i class="ph ph-calendar-blank"></i></div>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" value="" placeholder="Input Incoming Date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-3">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Warehouse
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-9">
                                                    <div class="input-wrap">
                                                        <input type="text" class="form-control form-control-sm" value="" placeholder="Input Warehouse">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-3">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Reference Number
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-9">
                                                    <div class="input-wrap">
                                                        <select class="form-control form-control-sm" id="" data-rule-required="true" data-msg-required="Golongan Pajak field is required." placeholder="Golongan Pajak">
                                                            <option value="">Select Reference Number</option>
                                                            <option value="LDD-01">LDD-01</option>
                                                            <option value="LDD-02">LDD-02</option>
                                                            <option value="LDD-03">LDD-03</option>
                                                            <option value="LDD-04">LDD-04</option>
                                                            <option value="LDD-05">LDD-05</option>
                                                            <option value="LDD-06">LDD-06</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-3">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Attachment
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-9">
                                                    <div class="input-wrap">
                                                        <input type="file" class="form-control" value="" placeholder="Input Attachment">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Item</h3>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-end">

                                    <div class="col-md-2">
                                        <div class="form-group form-group--table">
                                            <label>Product</label>
                                            <div class="col-form-input">
                                                <div class="input-wrap">
                                                    <select class="form-control form-control-sm" name="product" id="" data-msg-required="Product field is required.">
                                                        <option selected disabled>Select Product</option>
                                                        <option value="">Product 1</option>
                                                        <option value="">Product 2</option>
                                                        <option value="">Product 3</option>
                                                        <option value="">Product 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group form-group--table">
                                            <label>Quantity</label>
                                            <div class="col-form-input">
                                                <div class="input-wrap">
                                                    <div class="input-group">
                                                        <input name="quantity" class="form-control form-control-sm" placeholder="Input Quantity" type="number" value="" data-msg-required="Quantity field is required.">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group form-group--table">
                                            <label>Unit Price (Rp)</label>
                                            <div class="col-form-input">
                                                <div class="input-wrap">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Rp</div>
                                                        </div>
                                                        <input name="unitPrice" class="form-control form-control-sm" placeholder="Input Unit Price" type="number" value="" data-msg-required="Unit Price field is required.">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group form-group--table">
                                            <label>Discount (%)</label>
                                            <div class="col-form-input">
                                                <div class="input-wrap">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">%</div>
                                                        </div>
                                                        <input name="discount" class="form-control form-control-sm" placeholder="Input Discount" type="number" value="" data-msg-required="Discount field is required.">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group form-group--table">
                                            <label>Unit Price (Rp)</label>
                                            <div class="col-form-input">
                                                <div class="input-wrap">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Rp</div>
                                                        </div>
                                                        <input name="unitPriceSub" class="form-control form-control-sm" placeholder="Input Unit Price" type="number" value="" data-msg-required="Sub Total field is required." disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group form-group--table">
                                            <div class="col-form-input mt-1">
                                                <button type="button" class="btn btn-sm btn-primary" data-repeater-create="">
                                                    <i class="ph ph-plus"></i> Tambah
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="table-action-top no-gap">
                                    <div class="row align-items-center flex-wrap">
                                        <div class="col-auto d-flex align-items-center">
                                            <div class="action bulk-action d-flex align-items-center mr-2">
                                                <select name="apply" class="form-control form-control-sm">
                                                    <option disabled="" selected>Option</option>
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

                                <div class="table-responsive no-gap">
                                    <table cellspacing="0" class="table table-compact table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main" width="100%">
                                        <thead>
                                            <tr>
                                            <th width="30" class="text-center"><input type="checkbox"></th>
                                            <th class="col-sort"><a href="#">Product <i class="ph ph-sort-ascending"></i></a></th>
                                            <th class="col-sort"><a href="#">Quantity <i class="ph ph-sort-descending"></i></a></th>
                                            <th>Unit Price (Rp)</th>
                                            <th>Discount (%)</th>
                                            <th>Sub Total (Rp)	</th>                      
                                            <th width="100" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for ($i=0; $i<5; $i++) { ?>
                                            <tr>
                                                <td class="check-column">
                                                    <div class="text-center">
                                                        <input name="id_list[]" type="checkbox" value="11">
                                                    </div>
                                                </td>
                                                <td>produk RINI</td>
                                                <td class="text-right">5</td>
                                                <td class="text-right">10,000.00</td>
                                                <td class="text-right">7 %</td>
                                                <td class="text-right">46,500.00</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="check-column">
                                                    <div class="text-center">
                                                        <input name="id_list[]" type="checkbox" value="12">
                                                    </div>
                                                </td>
                                                <td>Product 123</td>
                                                <td class="text-right">6</td>
                                                <td class="text-right">10,000.00</td>
                                                <td class="text-right">0 %</td>
                                                <td class="text-right">60,000.00</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-action-bottom no-gap">
                                    <div class="row align-items-center">
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
                            
                            <div class="card-body">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-4">
                                        <div class="invoice-total">
                                            <div class="invoice-total-box">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-total__label">SubTotal</div>
                                                    </div>
                                                        <div class="col-md-6">
                                                        <div class="invoice-total__value text-right">Rp. 120.000,00</div>
                                                    </div>                        
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <div class="invoice-total__label">Total</div>
                                                    </div>
                                                        <div class="col-md-6">
                                                        <div class="invoice-total__value text-right">Rp. 120.000,00</div>
                                                    </div>
                                                </div>

                                                <div class="invoice-total__balance mt-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="invoice-total__label">
                                                                <h6>
                                                                    <strong>
                                                                        Balance Due
                                                                    </strong>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="invoice-total__value text-right">
                                                                <h6>
                                                                    Rp. 120.000,00
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            
                        </div> <!-- /.col-flex-md-->
                        <div class="col-12 col-md-auto">
                            <div class="w-300px">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <h3 class="card-title float-none">Aksi</h3>
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="form-group mb-2">
                                            <label class="control-label font-weight-normal">Status</label>
                                            <div class="col-form-input">
                                                <select class="form-control form-control-sm" name="status">
                                                    <option value="non-aktif">
                                                        Tidak Aktif
                                                    </option>
                                                    <option value="aktif">
                                                        Aktif
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <a href="#" class="text-danger d-block">
                                                <i class="ph ph-trash mr-2"></i> Pindah ke trash
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="submit-row">
                                            <div class="row">
                                                <div class="col">
                                                    <a href={{@url("html.table-master.php")}} class="btn btn-sm btn-default d-block w-full">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <div class="btn-group w-100">
                                                        <button type="button" class="btn btn-sm btn-primary" type="button">Create</button>
                                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <a href="#" class="dropdown-item js-submit-create">Create</a>
                                                            <a href="#" class="dropdown-item js-submit-new">Create & New</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header py-2">
                                        <h3 class="card-title float-none">Audit Trail</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-compact table-bordered table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th width="120">Tanggal</th>
                                                        <th>Nama</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> 02/05/23 07:03:51 </td>
                                                        <td>User Full Name</td>
                                                        <td>check in</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->


@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
