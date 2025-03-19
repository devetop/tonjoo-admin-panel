<?php 
$pageTitle = 'Tambah Kontrak';
$breadcrumbs = array( 
    ['Home', '#'],
    ['Kontrak', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- Select 2 -->
<link rel="stylesheet" href="/dist/plugins/select2/css/select2.min.css">

<!-- datepicker -->
<link rel="stylesheet" href="/dist/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

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
            <div class="mw-1200px">

                <?php if ( isset($_GET['success']) ) { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>BERHASIL:</strong> Data berhasil disimpan.
                    </div>
                <?php } ?>

                <form accept-charset="UTF-8" action="am-form-master-pivot-complex-edit?success_kontrak&kontrak=1" method="post" role="form" class="multi-action-form validate-form"> 
                    @csrf
                    <input type="hidden" name="pegawai" value="<?php echo (isset($_GET['pegawai']) && $_GET['pegawai'] != '') ? $_GET['pegawai'] : '' ;?>">
                    <div class="row">
                        <div class="col-12 col-lg">
                            <div class="card">
                                <div class="card-header py-2">
                                    <h3 class="card-title">Kontrak</h3>
                                </div>           
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Masa berlaku
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div id="datepicker" class="input-daterange d-flex align-items-center">
                                                        <div class="input-wrap input-wrap-sm">
                                                            <i class="icon ph ph-calendar-blank"></i>
                                                            <input type="text" class="form-control form-control-sm" name="start" data-rule-required="true" data-msg-required="Tanggal mulai berlaku wajib diisi.">
                                                        </div>
                                                        <div class="mx-2">
                                                            s.d
                                                        </div>
                                                        <div class="input-wrap input-wrap-sm">
                                                            <i class="icon ph ph-calendar-blank"></i>
                                                            <input type="text" class="form-control form-control-sm" name="end" data-rule-required="true" data-msg-required="Tanggal berakhir berlaku wajib diisi.">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Golongan Pajak
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <select name="golongan-pajak" id="" class="form-control form-control-sm"
                                                            data-rule-required="true" 
                                                            data-msg-required="Golongan pajak wajib diisi.">
                                                            <option value="">Pilih Golongan Pajak</option>
                                                            <option value="1">Tidak Kawin/0</option>
                                                            <option value="2">Tidak Kawin/1</option>
                                                            <option value="3">Tidak Kawin/2</option>
                                                            <option value="4">Tidak Kawin/3</option>
                                                            <option value="5">Kawin/0</option>
                                                            <option value="6">Kawin/1</option>
                                                            <option value="7">Kawin/2</option>
                                                            <option value="8">Kawin/3</option>
                                                            <option value="9">Gabungan K/I/0</option>
                                                            <option value="10">Gabungan K/I/1</option>
                                                            <option value="11">Gabungan K/I/2</option>
                                                            <option value="12">Gabungan K/I/3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">BPJS</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8 d-flex align-items-center">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="input-wrap d-flex align-items-center px-2">
                                                                <div class="checkbox checkbox-custom mr-2">
                                                                    <label class="font-weight-normal pl-0 mb-0">
                                                                        <input type="checkbox" value="Ketenagakerjaan">
                                                                        <span class="icon"></span> Ketenagakerjaan
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox checkbox-custom">
                                                                    <label class="font-weight-normal mb-0">
                                                                        <input type="checkbox" value="Kesehatan">
                                                                        <span class="icon"></span> Kesehatan
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Posisi
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <?php $data = array(
                                                            ['id' => 1, 'nama' => 'Content Writer Website'],
                                                            ['id' => 2, 'nama' => 'SEO'],
                                                            ['id' => 3, 'nama' => 'Project Manager'],
                                                            ['id' => 4, 'nama' => 'Quality Assurance'],
                                                            ['id' => 5, 'nama' => 'System Analyst'],
                                                            ['id' => 6, 'nama' => 'System Administrator'],
                                                            ['id' => 7, 'nama' => 'Laravel Developer'],
                                                            ['id' => 8, 'nama' => 'Frontend Developer'],
                                                            ['id' => 9, 'nama' => 'WordPress Developer'],
                                                            ['id' => 10, 'nama' => 'UI/UX Web Designer'],
                                                            ['id' => 11, 'nama' => 'Staff HR Personalia'],
                                                            ['id' => 12, 'nama' => 'Admin Project']
                                                        );?>
                                                        <select class="form-control form-control-sm js-select2" name="posisi" 
                                                            data-rule-required="true" 
                                                            data-msg-required="Posisi pegawai wajib diisi." 
                                                            data-allow-clear="true" 
                                                            data-placeholder="Pilih Posisi">

                                                            <option value="" selected>Pilih Posisi</option>
                                                            <?php foreach ($data as $d) { ?>
                                                            <option value="<?php echo $d['id'] ?>"><?php echo $d['nama'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Divisi
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <?php $data = array(
                                                            ['id' => 1, 'nama' => 'SEO & CW'],
                                                            ['id' => 2, 'nama' => 'Administrasi'],
                                                            ['id' => 3, 'nama' => 'Teknikal'],
                                                            ['id' => 4, 'nama' => 'Rumah Tangga'],
                                                            ['id' => 5, 'nama' => 'HR'],
                                                            ['id' => 6, 'nama' => 'Sales'],
                                                            ['id' => 7, 'nama' => 'Finance'],
                                                        );?>
                                                        <select class="form-control form-control-sm js-select2" name="divisi" 
                                                            data-rule-required="true" 
                                                            data-msg-required="Divisi wajib diisi." 
                                                            data-allow-clear="true" 
                                                            data-placeholder="Pilih Divisi">

                                                            <option value="" selected>Pilih Divisi</option>
                                                            <?php foreach ($data as $d) { ?>
                                                            <option value="<?php echo $d['id'] ?>"><?php echo $d['nama'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Cuti / Tahun
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <select name="golongan-pajak" id="" class="form-control form-control-sm"
                                                        data-rule-required="true" 
                                                        data-msg-required="Jumlah cuti wajib diisi.">
                                                        <option value="">Pilih Cuti Tahunan</option>
                                                        <option value="1">12</option>
                                                        <option value="2">15</option>
                                                        <option value="3">999</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Jenis Kontrak
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <?php $data = array(
                                                            ['id' => 1, 'nama' => 'Kontrak 1'],
                                                            ['id' => 2, 'nama' => 'Kontrak 2'],
                                                            ['id' => 3, 'nama' => 'Kontrak 3']
                                                        );?>
                                                        <select class="form-control form-control-sm js-select2" name="jenis-kontrak" 
                                                        data-rule-required="true" 
                                                        data-msg-required="Jenis kontrak wajib diisi." 
                                                        data-allow-clear="true" 
                                                        data-placeholder="Jenis kontrak">

                                                        <option value="" selected>Pilih Jenis Kontrak</option>
                                                        <?php foreach ($data as $d) { ?>
                                                            <option value="<?php echo $d['id'] ?>"><?php echo $d['nama'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Min. Jam/Bulan</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="number" type="text" placeholder="Minimal Jam Per Bulan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Rate Lembur</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="number" type="text" placeholder="Masukkan Rate Lembur">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Catatan</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <textarea name="catatan" id="" rows="3" class="form-control form-control-sm" placeholder="Catatan kontrak"></textarea>
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
                            <div class="card repeater">
                                <div class="card-header py-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-6">
                                            <h3 class="card-title">Pendapatan</h3>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-sm btn-default" data-repeater-create>
                                                <i class="ph ph-plus"></i> Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>           
                                <div class="card-body">
                                    <table class="table table-compact table-bordered table-striped table-flush table-main align-items-center">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tipe</th>
                                                <th>Nominal</th>
                                                <th width="20"></th>
                                            </tr>
                                        </thead>
                                        <tbody data-repeater-list="pendapatan">
                                            <tr data-repeater-item="">
                                                <td>
                                                    <select name="nama-pendapatan" class="form-control form-control-sm">
                                                        <option value="" selected disabled>Pilih Nama Pendapatan</option>
                                                        <option value="gaji-pokok">Gaji Pokok</option>
                                                        <option value="tunjangan-performa">Tunjangan Performa</option>
                                                        <option value="tunjangan-proyek">Tunjangan Proyek</option>
                                                        <option value="bonus">Bonus</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="tipe-pendapatan" class="form-control form-control-sm" disabled>
                                                        <option value="" selected disabled>Pilih Tipe</option>
                                                        <option value="gaji">Gaji</option>
                                                        <option value="tunjangan">Tunjangan</option>
                                                    </select>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control form-control-sm" name="nominal-pendapatan" placeholder="0">
                                                </td>
                                                    <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete="">
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">Total Pendapatan Kotor</th>
                                                <th>Rp <span class="total">0</span></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                            <!-- box -->
                            <div class="card repeater">
                                <div class="card-header py-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-6">
                                            <h3 class="card-title">Potongan</h3>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-sm btn-default" data-repeater-create>
                                                <i class="ph ph-plus"></i> Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>           
                                <div class="card-body">
                                    <table class="table table-compact table-bordered table-striped table-flush table-main align-items-center">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tipe</th>
                                                <th>Nominal</th>
                                                <th width="20"></th>
                                            </tr>
                                        </thead>
                                        <tbody data-repeater-list="pendapatan">
                                            <tr data-repeater-item="">
                                                <td>
                                                    <select name="nama-potongan" class="form-control form-control-sm">
                                                        <option value="" selected disabled>Pilih Nama Potongan</option>
                                                        <option value="pph21">PPH 21</option>
                                                        <option value="bpjs-tk">BPJS TK</option>
                                                        <option value="bpjs">BPJS</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="tipe-pajak" class="form-control form-control-sm">
                                                        <option value="" selected disabled>Pilih Tipe</option>
                                                        <option value="pajak">Pajak</option>
                                                        <option value="perusahaan">(Bagian Perusahaan)</option>
                                                        <option value="pegawai">(Bagian Pegawai)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" name="nominal-pajak" placeholder="0">
                                                </td>
                                                    <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete="">
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">Total Pengurangan</th>
                                                <th>Rp <span class="total">0</span></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div> <!-- /.col-flex-md-->
                        <div class="col-12 col-lg-auto">
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
                                                    <a href={{@url("html/am-table-sample-pivot-complex")}} class="btn btn-sm btn-md btn-default d-block w-full">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <div class="btn-group w-100">
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit">Submit</button>
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
                                            <table class="table table-compact table-compact table-bordered table-striped mb-0">
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

<!-- bootstrap datepicker -->
<script src={{url("dist/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}></script>

<!-- Select2 -->
<script src={{url("dist/plugins/select2/js/select2.min.js")}}></script>

<!-- JQUERY Repeater -->
<script src={{url("dist/plugins/repeater/jquery.repeater.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
     $(function () {
        // remove datepicker initialization on inside repeater, so we can reinit it when add new item on repeater
        $('[data-repeater-list] .datepicker').each(function(){
            $(this).datepicker('remove');
        });

        //Repeater
        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {
                'types': 'paid',
                'duration': 1
            },
            show: function () {
                $(this).slideDown(100);
                // reinit select2 when adding new item to repeater
                    $(this).find('.datepicker').datepicker('update');
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        })    

        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
        });
        $('.input-daterange').datepicker({
            autoclose: true,
        });

        // Select2
        $('.js-select2').select2();

        // Select2 Ajax
        // $('.js-select2-ajax').select2({
        //     ajax: {
        //         url: 'api/email.json',
        //         dataType       : 'json',
        //         processResults : function (data) {
        //         return {
        //             results: data.emails.map(obj => {
        //             return { id: obj.email, text: obj.email };
        //             })
        //         }
        //         }
        //     }
        // });

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
                a.$element.parent().append('<a href="#" target="_blank" class="select2-edit"><i class="fa fa-edit "></i></a>');

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
                a.$element.parent().append('<a href="#" target="_blank" class="select2-edit"><i class="fa fa-edit "></i></a>');

                var editWidth = a.$element.parent().find('.select2-edit').outerWidth(true) + 4;
                var select2Width = a.$element.next().width();

                a.$element.next().css('width', select2Width - editWidth);
            }
        });
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
