<?php 
$pageTitle = 'Standard Form';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- custom plugin switchery -->
<link rel="stylesheet" href="/dist/plugins/switchery/css/switchery.min.css">

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="/dist/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<!-- Select 2 -->
<link rel="stylesheet" href="/dist/plugins/select2/css/select2.min.css">

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
            <div class="mw-1200px">

                <form accept-charset="UTF-8" action="" method="POST" role="form" class="multi-action-form validate-form">  
                    <div class="row">
                        <div class="col-12 col-lg">
                            <div class="card">
                                <div class="card-header py-2">
                                    <h3 class="card-title">General Product Information</h3>
                                </div>           
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Product Name</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input class="form-control" name="productName" type="text" placeholder="Product Name">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Select 2</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">

                                                <select class="form-control js-select2 js-select2-editable" name="supplier_id" 
                            data-rule-required="true" 
                            data-msg-required="Supplier field is required." 
                            data-allow-clear="true" 
                            data-placeholder="Select Supplier">

                                                    <option value="" selected>Select Supplier</option>
                                                    <option value="1">
                                                        supplier 1
                                                    </option>
                                                    <option value="2">
                                                        supplier 2
                                                    </option>
                                                    <option value="3">
                                                        Supplier 3
                                                    </option>
                                                    <option value="4">
                                                        Supplier 4
                                                    </option>
                                                    <option value="5">
                                                        Supplier 5
                                                    </option>
                                                    <option value="6">
                                                        Supplier 6
                                                    </option>
                                                    <option value="7">
                                                        Supplier 7
                                                    </option>
                                                    <option value="8">
                                                        Supplier 8
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Select 2 Ajax</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">

                                                <select class="form-control js-select2-ajax js-select2-editable" name="supplier_id" 
                            data-rule-required="true" 
                            data-msg-required="Supplier field is required." 
                            data-allow-clear="true" 
                            data-placeholder="Select Supplier">

                                                    <option value="" selected>Select Supplier</option>
                                                    <option value="1">
                                                        supplier 1
                                                    </option>
                                                    <option value="2">
                                                        supplier 2
                                                    </option>
                                                    <option value="3">
                                                        Supplier 3
                                                    </option>
                                                    <option value="4">
                                                        Supplier 4
                                                    </option>
                                                    <option value="5">
                                                        Supplier 5
                                                    </option>
                                                    <option value="6">
                                                        Supplier 6
                                                    </option>
                                                    <option value="7">
                                                        Supplier 7
                                                    </option>
                                                    <option value="8">
                                                        Supplier 8
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Description</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <textarea id="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <hr>

                                    <div class="form-group row">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="control-label text-left font-weight-normal d-block">Available for purchase</label>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <div class="input-wrap">
                                                <div class="col-form-input input-wrap d-flex">
                                                    <input type="checkbox" checked 
                                                    data-plugin="switchery" 
                                                    data-text-active="Active"
                                                    data-text-inactive="Inactive"
                                                    data-color="#00a65a"/>
                                                    <div class="switchery-text ml-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">

                                            <div class="form-group row">
                                                <div class="col-xs-12 col-md-12">
                                                    <label class="control-label text-left font-weight-normal d-block">Order Date</label>
                                                </div>
                                                <div class="col-xs-12 col-md-12">
                                                    <div class="input-wrap">
                                                        
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <i class="input-group-text ph ph-calendar-blank"></i>
                                                            </div>
                                                            <input autocomplete="off" name="order_date" class="form-control hasDatepicker hasDatepicker--start" 
                                                                placeholder="Input Order Date" 
                                                                id="order_date-picker" 
                                                                type="text" 
                                                                value="" 
                                                                data-date-format="dd M yyyy"
                                                                data-rule-required="true" 
                                                                data-msg-required="Order Date field is required.">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-md-12">
                                                    <label class="control-label text-left font-weight-normal d-block">Estimated Delivery Date</label>
                                                </div>
                                                <div class="col-xs-12 col-md-12">
                                                    <div class="input-wrap">
                                                        
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <i class="input-group-text ph ph-calendar-blank"></i>
                                                            </div>
                                                            <input autocomplete="off" name="delivery_date" class="form-control hasDatepicker hasDatepicker--end" 
                                                            placeholder="Input Estimated Delivery Date" 
                                                            id="estimated_delivery_date-picker" 
                                                            type="text" 
                                                            value="" 
                                                            data-date-format="dd M yyyy" 
                                                            data-rule-required="true" 
                                                            data-msg-required="Estimated Delivery Date is required.">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header py-2">
                                    <h3 class="card-title">Product Detail</h3>
                                </div>           
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">SKU</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input class="form-control" name="sku" type="text" placeholder="SKU">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Price</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rp</div>
                                                    </div>
                                                    <input type="text" class="form-control" id="price" placeholder="Input Price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Sale Price</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rp</div>
                                                    </div>
                                                    <input type="text" class="form-control" id="price" placeholder="Input Sale Price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Product Measurement</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">

                                            <table id="measurement-list" class="table table-bordered table-striped table-main">
                                                <thead>
                                                    <tr>
                                                        <th width="200">Name</th>
                                                        <th width="200">Unit of Measurement</th>
                                                        <th width="200">Value</th>
                                                        <th width="50"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Width</td>
                                                        <td>cm</td>
                                                        <td class="js-cell-value"><span>100</span> <input type="hidden" class="form-control format-number" value="100"></td>
                                                        <td class="text-center">
                                                            <div class="d-flex">
                                                            <a href="javascript:void(0);" class="btn-act-circle js-save-measurement mr-2" style="display: none;"><i class="fa fa-check"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-edit-measurement mr-2"><i class="ph ph-pencil"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-del-measurement"><i class="ph ph-x-circle"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Height</td>
                                                        <td>cm</td>
                                                        <td class="js-cell-value"><span>200</span> <input type="hidden" class="form-control format-number" value="200"></td>
                                                        <td class="text-center">
                                                            <div class="d-flex">
                                                            <a href="javascript:void(0);" class="btn-act-circle js-save-measurement mr-2" style="display: none;"><i class="fa fa-check"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-edit-measurement mr-2"><i class="ph ph-pencil"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-del-measurement"><i class="ph ph-x-circle"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Weight</td>
                                                        <td>kg</td>
                                                        <td class="js-cell-value"><span>5</span> <input type="hidden" class="form-control format-number" value="5"></td>
                                                        <td class="text-center">
                                                            <div class="d-flex">
                                                            <a href="javascript:void(0);" class="btn-act-circle js-save-measurement mr-2" style="display: none;"><i class="fa fa-check"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-edit-measurement mr-2"><i class="ph ph-pencil"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-del-measurement"><i class="ph ph-x-circle"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Capacity</td>
                                                        <td>liter</td>
                                                        <td class="js-cell-value"><span>20</span> <input type="hidden" class="form-control format-number" value="20"></td>
                                                        <td class="text-center">
                                                            <div class="d-flex">
                                                            <a href="javascript:void(0);" class="btn-act-circle js-save-measurement mr-2" style="display: none;"><i class="fa fa-check"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-edit-measurement mr-2"><i class="ph ph-pencil"></i></a>
                                                            <a href="javascript:void(0);" class="btn-act-circle js-del-measurement"><i class="ph ph-x-circle"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                </div>
                            </div>
                            <!-- /.card -->

                            
                        </div> <!-- /.col-flex-md-->
                        <div class="col-12 col-lg-auto">
                            <div class="w-300px">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <h3 class="card-title float-none">Save Product</h3>
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="form-group mb-2">
                                            <label class="control-label font-weight-normal">Document Status</label>
                                            <div class="col-form-input">
                                                <select class="form-control form-control-sm" name="status">
                                                    <option value="draft">
                                                        Draft
                                                    </option>
                                                    <option value="applied">
                                                        Applied
                                                    </option>
                                                </select>
                                            </div>
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
                                    <div class="card-header">
                                        <h3 class="card-title float-none">Featured Image</h3>
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="single-list-box single-list-box--featured image-ajax my-2">
                                            <div class="input-wrap">
                                                <div class="deleted-box"><i class="ph ph-x"></i></div>
                                                <label class="single-file-label">
                                                    <input accept="image/x-png, image/png, image/jpg, image/jpeg" type="file" name="main-img" class="single-file-custom">
                                                    <i class="ph-fill ph-plus-circle"></i>
                                                    <span class="single-file-text">ADD IMAGE</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title float-none">Image</h3>
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="row">
                                            <div class="col-md-6 my-2">
                                                <div class="single-list-box form-group">
                                                    <div class="input-wrap">
                                                    <div class="deleted-box"><i class="ph ph-x"></i></div>
                                                    <label class="single-file-label">
                                                        <input accept="image/x-png, image/png, image/jpg, image/jpeg" type="file" name="main-img" class="single-file">
                                                        <i class="ph-fill ph-plus-circle"></i>
                                                        ADD IMAGE
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <div class="single-list-box form-group">
                                                    <div class="input-wrap">
                                                    <div class="deleted-box"><i class="ph ph-x"></i></div>
                                                    <label class="single-file-label">
                                                        <input accept="image/x-png, image/png, image/jpg, image/jpeg" type="file" name="main-img" class="single-file">
                                                        <i class="ph-fill ph-plus-circle"></i>
                                                        ADD IMAGE
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <div class="single-list-box form-group">
                                                    <div class="input-wrap">
                                                    <div class="deleted-box"><i class="ph ph-x"></i></div>
                                                    <label class="single-file-label">
                                                        <input accept="image/x-png, image/png, image/jpg, image/jpeg" type="file" name="main-img" class="single-file">
                                                        <i class="ph-fill ph-plus-circle"></i>
                                                        ADD IMAGE
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <div class="single-list-box form-group">
                                                    <div class="input-wrap">
                                                    <div class="deleted-box"><i class="ph ph-x"></i></div>
                                                    <label class="single-file-label">
                                                        <input accept="image/x-png, image/png, image/jpg, image/jpeg" type="file" name="main-img" class="single-file">
                                                        <i class="ph-fill ph-plus-circle"></i>
                                                        ADD IMAGE
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title float-none">Category</h3>
                                    </div>
                                    <div class="card-body px-2 py-0">
                                        
                                        <ul class="checkbox-list js-scroll">
                                            <li>
                                                <div class="checkbox checkbox-custom">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="icon"></span> Category A </label>
                                                </div>
                                                <ul class="sub-checkbox-list">
                                                    <li>
                                                        <div class="checkbox checkbox-custom">
                                                            <label>
                                                                <input type="checkbox">
                                                                <span class="icon"></span> Sub Category A 1 </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox checkbox-custom">
                                                            <label>
                                                                <input type="checkbox">
                                                                <span class="icon"></span> Sub Category A 2 </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="checkbox checkbox-custom">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="icon"></span> Category B </label>
                                                </div>
                                                <ul class="sub-checkbox-list">
                                                    <li>
                                                        <div class="checkbox checkbox-custom">
                                                            <label>
                                                                <input type="checkbox">
                                                                <span class="icon"></span> Sub Category B 1 </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox checkbox-custom">
                                                            <label>
                                                                <input type="checkbox">
                                                                <span class="icon"></span> Sub Category B 2 </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="checkbox checkbox-custom">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="icon"></span> Category B </label>
                                                </div>
                                                <ul class="sub-checkbox-list">
                                                    <li>
                                                        <div class="checkbox checkbox-custom">
                                                            <label>
                                                                <input type="checkbox">
                                                                <span class="icon"></span> Sub Category B 1 </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox checkbox-custom">
                                                            <label>
                                                                <input type="checkbox">
                                                                <span class="icon"></span> Sub Category B 2 </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title float-none">Tag</h3>
                                    </div>
                                    <div class="card-body px-2 py-0">

                                        <ul class="checkbox-list js-scroll">
                                            <li>
                                                <div class="checkbox checkbox-custom">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="icon"></span> Tag A </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox checkbox-custom">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="icon"></span> Tag B </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox checkbox-custom">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="icon"></span> Tag C </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox checkbox-custom">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="icon"></span> Tag D </label>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="card-footer">
                                        <a href="#">Add Tag</a>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title float-none">Print Label</h3>
                                    </div>
                                    <div class="card-body py-2">

                                        <a href="#" class="btn btn-md btn-primary d-block w-full">Print</a>

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

<!-- CKEDITOR -->
<script src={{url("dist/plugins/ckeditor/ckeditor.js")}}></script>

<!-- custom plugin switchery -->
<script src={{url("dist/plugins/switchery/js/switchery.min.js")}}></script>

<!-- Select2 -->
<script src={{url("dist/plugins/select2/js/select2.min.js")}}></script>

<!-- bootstrap datepicker -->
<script src={{url("dist/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}></script>

<!-- Slimscroll -->
<script src={{url("dist/plugins/jquery-slimscroll/jquery.slimscroll.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>

$(function () {
    //ckeditor
    CKEDITOR.replace('textarea', {
        toolbarGroups: [
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'insert', groups: [ 'insert' ] },
        ],
        removeButtons: 'RemoveFormat,Subscript,Superscript,Strike,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,TextColor,BGColor,Maximize,ShowBlocks,About'
    });

    /* Custom Scroll */
    $(".js-scroll").slimScroll({
        height: "auto",
        size: "3px",
        color: "#333",
        alwaysVisible: true
    });

    //Date picker
    $('.hasDatepicker').datepicker({
        autoclose: true
    });
    $('.hasDatepicker--start').on('changeDate', function(selected) {
        var minDate = new Date(selected.date.valueOf());
        var endDate = new Date($(this).closest('.form-group').next().find('.hasDatepicker--end').val());

        $(this).closest('.js-daterange-wrap').find('.hasDatepicker--end').datepicker('setStartDate', minDate);

        if (minDate > endDate) {
            $(this).closest('.js-daterange-wrap').find('.hasDatepicker--end').datepicker('setDate', minDate);
        }
    });
    if ($('.hasDatepicker--start').val() != '') {
        var minDate = new Date($('.hasDatepicker--start').val());

        $('.hasDatepicker--start').closest('.js-daterange-wrap').find('.hasDatepicker--end').datepicker('setStartDate', minDate);
    }

    $('.hasDatepicker, .js-select2').on('change', function() {
        if ($(this).val() != '') {
            $(this).valid();
        }
    });

    // switchery
    $('[data-plugin="switchery"]').each(function (idx, obj) {
        new Switchery($(this)[0], $(this).data());

        var textActive = $(this).data('text-active');
        var textInactive = $(this).data('text-inactive');
        if ($(this).is(':checked')) {
            $(this).siblings('.switchery-text').text(textActive);
        } else {
            $(this).siblings('.switchery-text').text(textInactive);
        }

        $(this).on('change', function() {
            if ($(this).is(':checked')) {
                $(this).siblings('.switchery-text').removeClass('disabled').text(textActive);
            } else {
                $(this).siblings('.switchery-text').addClass('disabled').text(textInactive);
            }
        });
    });

    // Select2
    $('.js-select2').select2();

    // Select2 Ajax
    $('.js-select2-ajax').select2({
        ajax: {
            url: 'api/email.json',
            dataType       : 'json',
            processResults : function (data) {
                return {
                    results: data.emails.map(obj => {
                        return { id: obj.email, text: obj.email };
                    })
                }
            }
        }
    });

    // Select2 Editable
    $('.js-select2-editable').on('select2:open', function(e) {
        var a = $(this).data('select2');
        if (!a.$results.parent().find('.select2-link').length) {
            a.$results.parents('.select2-results')
            .append('<div class="select2-link"><a href="#" target="_blank"><i class="ph ph-plus"></i> New item</a></div>');
        }
    });
    $('.js-select2-editable').on('select2:select', function(e) {
        var a = $(this).data('select2');
        if (!a.$element.parent().find('.select2-edit').length) {
            a.$element.parent().append('<a href="#" target="_blank" class="btn btn-default btn-sm ml-2 select2-edit"><i class="ph ph-pencil "></i></a>');

            var editWidth = a.$element.parent().find('.select2-edit').outerWidth(true) + 4;
            var select2Width = a.$element.next().width();

            a.$element.next().css('width', select2Width - editWidth);
        }
    });
    $('.js-select2-editable').on('change', function(e) {
        var a = $(this).data('select2');
        if ($(this).val() === null || $(this).val() == '') {
            var editWidth = a.$element.parent().find('.select2-edit').outerWidth(true) + 4;
            var select2Width = a.$element.next().width();

            a.$element.next().css('width', select2Width + editWidth);
            a.$element.parent().find('.select2-edit').remove();
        }
    });
    $('.js-select2-editable').each(function() {
        var a = $(this).data('select2');
        if ( ($(this).val() != null && $(this).val() != '') && !a.$element.parent().find('.select2-edit').length) {
            a.$element.parent().append('<a href="#" target="_blank" class="btn btn-default btn-sm ml-2 select2-edit"><i class="ph ph-pencil "></i></a>');

            var editWidth = a.$element.parent().find('.select2-edit').outerWidth(true) + 4;
            var select2Width = a.$element.next().width();

            a.$element.next().css('width', select2Width - editWidth);
        }
    });

    // MEASUREMENT
    // --------------------------------------
    // delete
    $('#measurement-list').on('click', '.js-del-measurement', function(e) {
        var valueInput = $(this).closest('tr').find('.js-cell-value > input');
        var valueText = $(this).closest('tr').find('.js-cell-value > span');

        valueInput.val('');
        valueText.html('');
    });

    // Edit
    $('#measurement-list').on('click', '.js-edit-measurement', function(e) {
        var valueInput = $(this).closest('tr').find('.js-cell-value > input');
        var valueText = $(this).closest('tr').find('.js-cell-value > span');
        var saveBtn = $(this).siblings('.js-save-measurement');

        valueInput.attr('type', 'text');
        valueText.hide();
        saveBtn.show();
        $(this).hide();
    });

    // Save
    $('#measurement-list').on('click', '.js-save-measurement', function(e) {
        var valueInput = $(this).closest('tr').find('.js-cell-value > input');
        var valueText = $(this).closest('tr').find('.js-cell-value > span');
        var editBtn = $(this).siblings('.js-edit-measurement');
        var valueVal = valueInput.val();

        valueInput.attr('type', 'hidden');
        valueText.html(valueVal).show();
        editBtn.show();
        $(this).hide();
    });

    // Submit Dropdown
    $('.js-submit-create').on('click', function(e) {
        e.preventDefault();

        $(this).closest('.multi-action-form').submit();
    });
    $('.js-submit-new').on('click', function(e) {
        e.preventDefault();

        var action = $(this).data('action');
        
        $(this).closest('.multi-action-form').attr('action', action);
        $(this).closest('.multi-action-form').submit();
    });
});

</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
