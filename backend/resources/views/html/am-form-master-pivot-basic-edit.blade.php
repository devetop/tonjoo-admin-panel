<?php 
$preffix_title = '';
if (isset($_GET['add'])) {
  $preffix_title = 'Tambah';
}elseif (isset($_GET['edit'])) {
  $preffix_title = 'Edit';
}else{
  $preffix_title = 'Edit';
}
?>

<?php 
$pageTitle = $preffix_title . ' Cuti';
$breadcrumbs = array( 
    ['Home', '#'],
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
            <div class="mw-1000px">

                <?php if ( isset($_GET['success']) ) { ?>
                    <div class="alert alert-success" role="alert">
                    <strong>BERHASIL:</strong> Data berhasil disimpan.
                    </div>
                <?php } ?>

                <form accept-charset="UTF-8" action="" method="POST" role="form" class="multi-action-form validate-form"> 
                    <div class="row">
                        <div class="col-12 col-lg">
                            <div class="card">
                                <div class="card-header py-2">
                                    <h3 class="card-title">Informasi Cuti Pegawai</h3>
                                </div>           
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                Pegawai
                                                <span class="required">*</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="d-flex align-items-start">
                                                <div class="input-wrap w-100">

                                                    @php
                                                        include(resource_path('views/html/ajax-demo/ajax-get-pegawai.blade.php'))
                                                    @endphp

                                                    <select class="form-control form-control-sm js-select2-pegawai" name="pegawai" 
                                                        data-rule-required="true" 
                                                        data-msg-required="Pegawai wajib diisi." 
                                                        data-allow-clear="true" 
                                                        data-placeholder="Pilih Pegawai">

                                                        <?php foreach ( $pegawai as $peg) {
                                                            if ( (isset($_GET['pegawai']) && $_GET['pegawai'] != '') ) {
                                                                $idPegawaiSelected = $_GET['pegawai'];
                                                            }elseif( (!empty($_POST['pegawai']) && $_POST['pegawai'] != '') ){
                                                                $idPegawaiSelected = $_POST['pegawai'];
                                                            }elseif( !isset($_GET['success'])  ){
                                                                $idPegawaiSelected = '';
                                                            }else{
                                                                $idPegawaiSelected = '';
                                                            }

                                                            if ( $peg['id'] == $idPegawaiSelected ) {
                                                                echo '<option value="' .$peg['id']. '" selected>' .$peg['nama']. '</option>';
                                                            }else{
                                                                echo '<option value="" selected>Pilih Pegawai</option>';
                                                            }
                                                        }?>
                                                    </select>
                                                </div>
                                                <a href="#" title="Ubah Data Pegawai" class="btn btn-sm btn-default ml-2"><i class="ph ph-pencil"></i></a>
                                            </div>
                                            <div class="mt-1">
                                                <a target="_blank" href="#">Tambah pegawai baru</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Detail</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <textarea class="form-control form-control-sm" name="detail" placeholder="Input detail ijin" name="detail-ijin" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Surat Ijin</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                            <input class="form-control form-control-sm" name="surat-ijin" type="file" placeholder="Surat Ijin">
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
                                        <div class="col-md-6">
                                            <h3 class="card-title">Informasi Cuti Pegawai</h3>
                                        </div>
                                        <div class="col-md-6 text-right">
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
                                            <th>Tanggal</th>
                                            <th>Jenis Cuti</th>
                                            <th>Durasi Hari</th>
                                            <th width="20"></th>
                                            </tr>
                                        </thead>
                                        <tbody data-repeater-list="details">
                                            <tr data-repeater-item>
                                                <td>
                                                    <div class="input-wrap">
                                                        <input type="text" class="form-control form-control-sm datepicker" name="date" data-date-format="dd-M-yyyy">
                                                    </div>
                                                    <!---->
                                                </td>
                                                <td>
                                                    <select name="types" class="form-control form-control-sm">
                                                        <option value="paid" selected>Paid</option>
                                                        <option value="unpaid">Unpaid</option>
                                                    </select>
                                                    <!---->
                                                </td>
                                                <td>
                                                    <select name="duration" class="form-control form-control-sm">
                                                        <option value="0.25">0.25</option>
                                                        <option value="0.5">0.5</option>
                                                        <option value="0.75">0.75</option>
                                                        <option value="1" selected>1</option>
                                                    </select>
                                                    <!---->
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-repeater-delete>
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div> <!-- /.col-flex-lg-->
                        <div class="col-12 col-lg-auto">
                            <div class="w-300px">
                                <div class="card">
                                    <div class="card-header">
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
                                                    <a href={{@url("/html/am-table-master")}} class="btn btn-sm btn-default d-block w-full">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <div class="btn-group w-100">
                                                        <button type="button" class="btn btn-sm btn-primary js-submit-create">Create</button>
                                                        
                                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <a href="#" class="dropdown-item js-submit-create">Create</a>
                                                            <a href="#" class="dropdown-item js-submit-new">Create &amp; New</a>
                                                        </div>
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

    // Select2
    $('.js-select2').select2();

    // Select2 Ajax Pegawai
    $('.js-select2-pegawai').select2({
      ajax: {
        url: './api/pegawai.json',
        dataType       : 'json',
        processResults : function (data) {
          return {
            results: data.map(obj => {
              return { id: obj.id, text: obj.nama };
            })
          }
        }
      }
    });

    // BEGIN: SUBMITTED
    $('.js-submit-create').on('click', function(){
      $('form').attr('action', 'am-form-master-pivot-basic-view.php?success&pegawai=' + $('form').find('[name=pegawai]').val() );
      $('form').submit();
    })
    $('.js-submit-new').on('click', function(e){
      $('form').attr('action', '?success&pegawai=' + $('form').find('[name=pegawai]').val() );
      $('form').submit();
    })
    // END: SUBMITTED
  });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
