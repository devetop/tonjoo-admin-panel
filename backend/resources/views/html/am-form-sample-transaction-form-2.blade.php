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
            <div class="mw-1200px">

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
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tab-inbound" href="#inbound" aria-controls="inbound" aria-selected="true" data-toggle="pill" role="tab">Inbound Item</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#stack" id="tab-stack" aria-controls="stack" aria-selected="false" data-toggle="pill" role="tab">Stack Taking</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#balance" id="tab-balance" aria-controls="balance" aria-selected="false" data-toggle="pill" role="tab">Balance</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="tab-content">

                                        <div class="tab-pane fade show active" id="inbound" role="tabpanel" aria-labelledby="tab-inbound">
                                            @include("html../am-form-sample-transaction-form-2__inbound")
                                        </div>
                                        <div class="tab-pane fade" id="stack" role="tabpanel" aria-labelledby="tab-stack">
                                            @include("html../am-form-sample-transaction-form-2__stack")
                                        </div>
                                        <div class="tab-pane fade" id="balance" role="tabpanel" aria-labelledby="tab-balance">
                                            @include("html../am-form-sample-transaction-form-2__balance")
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
