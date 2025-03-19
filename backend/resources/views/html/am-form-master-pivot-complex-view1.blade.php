<?php 
$pageTitle = 'Lihat Kontrak';
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
        <div class="container">
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

                <form accept-charset="UTF-8" action="" method="POST" role="form" class="multi-action-form validate-form"> 
                    <div class="row">
                        <div class="col-12 col-lg">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Profil</h3>
                                </div>           
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                        Nama
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="d-flex align-items-start">
                                                        <div class="input-wrap w-100">
                                                            <!-- field ini -->   
                                                            <?php 
                                                                //Digunakan untuk melakukan preselecting option diambil dari file json
                                                                // $dataPegawai =file_get_contents ("./api/pegawai.json");
                                                                // $pegawai = json_decode($dataPegawai,true);
                                                                include(resource_path('views/html/ajax-demo/ajax-get-pegawai.blade.php'));
                                                                $idPegawaiSelected = '';
                                                            ?>                       
                                                            <select class="form-control js-select2-pegawai" id="pegawai" name="pegawai" 
                                                                data-rule-required="true" 
                                                                data-msg-required="Pegawai wajib diisi." 
                                                                data-allow-clear="false" 
                                                                data-placeholder="Pilih Nama Pegawai" disabled>

                                                                <option value="" 
                                                                <?php echo ((isset($_GET['pegawai']) && $_GET['pegawai'] == '') || (!empty($_POST['pegawai']) && $_POST['pegawai'] == '')) ? 'selected' : '' ;?>>
                                                                Pilih Nama Pegawai
                                                                </option>
                                                                
                                                                <?php foreach ( $pegawai as $peg) {
                                                                if ( (isset($_GET['pegawai']) && $_GET['pegawai'] != '') ) {
                                                                    $idPegawaiSelected = $_GET['pegawai'];
                                                                }elseif( (!empty($_POST['pegawai']) && $_POST['pegawai'] != '') ){
                                                                    $idPegawaiSelected = $_POST['pegawai'];
                                                                }else{
                                                                    $idPegawaiSelected = '';
                                                                }

                                                                if ( $peg['id'] == $idPegawaiSelected ) {
                                                                    echo '<option value="' .$peg['id']. '" selected>' .$peg['nama']. '</option>';
                                                                }
                                                                }?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">User</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="username" type="text" placeholder="Username" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Email</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="email" type="mail" placeholder="Email" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Phone</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="phone" type="text" placeholder="Phone" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="gender" type="text" placeholder="Gender" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Tempat Lahir</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="tempatLahir" type="text" placeholder="Tempat Lahir" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Tanggal Lahir</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="tanggalLahir" type="date" placeholder="Tanggal Lahir" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Bank</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="bank" type="text" placeholder="Bank" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">No. Rekening</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control form-control-sm" name="noRekening" type="text" placeholder="No. Rekening" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Status</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <select class="form-control form-control-sm" name="status" id="" data-rule-required="true" data-msg-required="Status field is required." placeholder="Status" disabled>
                                                            <option selected>Status</option>
                                                            <option value="">Active</option>
                                                            <option value="">Non-Active </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Alamat</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <textarea class="form-control form-control-sm" name="alamat" placeholder="Input Alamat" name="alamat" rows="4" disabled></textarea>
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
                                    </div>
                                </div>           
                                <div class="card-body">
                                    <h5 class="text-center mt-15 mb-15">Belum ada kontrak. Silahkan klik Tambah untuk menambah kontrak baru.</h5>
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
                                                    <a href={{@url("html.table-master.php")}} class="btn btn-sm btn-md btn-default d-block w-full">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <div class="btn-group w-100">
                                                        <button class="btn btn-sm btn-primary btn-block" type="button">Submit</button>
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
    $('#pegawai').select2({
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

    function populateDataPegawai(){
      idpegawai = $(this).val();
      var url = './api/pegawai.json';

      const btnAddKontrak = $('.btn-add-kontrak');
      let btnAddKontrakHref = btnAddKontrak.attr('href').split('?')[0];
      btnAddKontrak.attr('href', btnAddKontrakHref + '?pegawai=' + idpegawai);

      $.ajax({
        url,
        method: 'POST',
        dataType: 'json',
        success: (data) => {
          $.each(data, function(index, item){
            if (item.id == idpegawai) {
              $('#mainForm [name="username"]').val( item.username );
              $('#mainForm [name="email"]').val( item.email );
              $('#mainForm [name="phone"]').val( item.phone );
              $('#mainForm [name="gender"]').val( item.gender );
              $('#mainForm [name="tempat-lahir"]').val( item.tempat_lahir );
              $('#mainForm [name="tanggal-lahir"]').val( item.tanggal_lahir);
              $('#mainForm [name="bank"]').val( item.bank );
              $('#mainForm [name="no_rekening"]').val( item.rekening );
              $('#mainForm [name="status-pegawai"]').val( item.status );
              $('#mainForm [name="alamat"]').val( item.alamat );
            }
          });
        }
      });
    }
    $('#pegawai').on('change', populateDataPegawai);

    // populateDataPegawai( $('#pegawai').val() );

    // populate data pegawai on load
    let idpegawai = $('#pegawai').val();
    var url = 'api/pegawai.json';

    $.ajax({
      url,
      method: 'POST',
      dataType: 'json',
      success: (data) => {
        $.each(data, function(index, item){
          if (item.id == idpegawai) {
            $('#mainForm [name="username"]').val( item.username );
            $('#mainForm [name="email"]').val( item.email );
            $('#mainForm [name="phone"]').val( item.phone );
            $('#mainForm [name="gender"]').val( item.gender );
            $('#mainForm [name="tempat-lahir"]').val( item.tempat_lahir );
            $('#mainForm [name="tanggal-lahir"]').val( item.tanggal_lahir);
            $('#mainForm [name="bank"]').val( item.bank );
            $('#mainForm [name="no_rekening"]').val( item.rekening );
            $('#mainForm [name="status-pegawai"]').val( item.status );
            $('#mainForm [name="alamat"]').val( item.alamat );
          }
        });
      }
    });
  });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
