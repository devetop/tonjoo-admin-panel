<?php 
$pageTitle = 'Tambah Kontrak (Vue)';
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8">

                    <form accept-charset="UTF-8" action="" method="POST" role="form" class="multi-action-form validate-form"> 
                        <div class="row">
                            <div class="col-12 col-md">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Profil</h3>
                                    </div>           
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                            Nama
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="d-flex align-items-start">
                                                            <div class="input-wrap w-100">
                                                                <select class="form-control" name="pegawai_name" id="" data-rule-required="true" data-msg-required="Pegawai name field is required." placeholder="Input Pegawai Name">
                                                                    <option selected>Pegawai 1</option>
                                                                    <option value="">Pegawai 2</option>
                                                                    <option value="">Pegawai 3</option>
                                                                    <option value="">Pegawai 4</option>
                                                                </select>
                                                            </div>
                                                            <a href="#" title="Ubah Data Pegawai" class="btn btn-default ml-2"><i class="ph ph-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">User</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="username" type="text" placeholder="Username" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Email</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="email" type="mail" placeholder="Email" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Phone</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="phone" type="text" placeholder="Phone" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Gender</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="gender" type="text" placeholder="Gender" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="tempatLahir" type="text" placeholder="Tempat Lahir" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="tanggalLahir" type="date" placeholder="Tanggal Lahir" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Bank</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="bank" type="text" placeholder="Bank" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">No. Rekening</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <input class="form-control" name="noRekening" type="text" placeholder="No. Rekening" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Status</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <select class="form-control" name="status" id="" data-rule-required="true" data-msg-required="Status field is required." placeholder="Status" disabled>
                                                                <option>Status</option>
                                                                <option selected>Active</option>
                                                                <option value="">Non-Active </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-3 col-md-4">
                                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Alamat</label>
                                                    </div>
                                                    <div class="col-xs-9 col-md-8">
                                                        <div class="input-wrap">
                                                            <textarea class="form-control" name="alamat" placeholder="Input Alamat" name="alamat" rows="4" disabled></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->

                                    </div>
                                </div>
                                <!-- /.box -->
                                <!-- box -->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-6">
                                                <h3 class="card-title">List Kontrak</h3>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="button" class="btn btn-primary" data-repeater-create>
                                                <i class="ph ph-plus"></i> Tambah
                                                </button>
                                            </div>
                                        </div>
                                    </div>           
                                    <div class="card-body">
                                        <h5 class="text-center mt-15 mb-15">Silahkan klik Submit untuk mengisi data.</h5>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div> <!-- /.col-flex-md-->
                            <div class="col-12 col-md-auto">
                                <div class="w-300px">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title float-none">Aksi</h3>
                                        </div>
                                        <div class="card-body py-2">
                                            <div class="form-group mb-2">
                                                <label class="control-label font-weight-normal">Status</label>
                                                <div class="col-form-input">
                                                    <select class="form-control" name="status">
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
                                                            <button class="btn btn-primary btn-block" type="button">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-header">
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
        </div>
    </section>
</div>
<!-- /.content-wrapper -->


@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
