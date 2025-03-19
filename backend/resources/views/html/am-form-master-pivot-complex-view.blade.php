<?php 
$pageTitle = 'Edit Kontrak';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

<?php 
//BEGIN: DEMO Data Kontrak 
$cookie_name = "kontrak";
$cookie_value = 0;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$kontrak_items = 0;
if (!empty($_COOKIE[$cookie_name]) || isset($_GET['kontrak'])) {
  $kontrak_items = $_COOKIE[$cookie_name];
  
  if (isset($_GET['kontrak'])) {
    if ( $_GET['kontrak'] >= 1) {
      $kontrak_items = $kontrak_items + $_GET['kontrak'];
    }else{
      $kontrak_items = 0;
    }
  }

  setcookie($cookie_name, $kontrak_items, time() + (86400 * 30), "/"); // 86400 = 1 day
}
//END: DEMO Data Kontrak 
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
                    <strong>BERHASIL:</strong> Data profil berhasil disimpan. Silahkan lanjut mengisi data kontrak.
                </div>
            <?php } ?>

            <?php if ( isset($_GET['success_kontrak']) ) { ?>
                <div class="alert alert-success" role="alert">
                    <strong>BERHASIL:</strong> Menambahkan list kontrak berhasil.
                </div>
            <?php } ?>

                <form id="mainForm" accept-charset="UTF-8" action="am-form-master-pivot-complex-view.php?success" method="post" role="form" class="multi-action-form validate-form"> 
                    <div class="row">
                        <div class="col-12 col-lg">
                            <div class="card">
                                <div class="card-header py-2">
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
                                                            
                                                                {{-- Digunakan untuk melakukan preselecting option diambil dari file json
                                                                $dataPegawai =file_get_contents ("./api/pegawai.json");
                                                                $pegawai = json_decode($dataPegawai,true); --}}
                                                                @php
                                                        include(resource_path('views/html/ajax-demo/ajax-get-pegawai.blade.php'))
                                                    @endphp
                                                                @php
                                                                    $idPegawaiSelected = '';
                                                                @endphp
                                                                
                                                            <select class="form-control js-select2-pegawai" id="pegawai" name="pegawai" 
                                                                data-rule-required="true" 
                                                                data-msg-required="Pegawai wajib diisi." 
                                                                data-allow-clear="false" 
                                                                data-placeholder="Pilih Nama Pegawai">

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
                                                        <input class="form-control" name="username" type="text" placeholder="Username" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Email</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control" name="email" type="text" placeholder="Email" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Phone</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control" name="phone" type="text" placeholder="Phone" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                    <input class="form-control" name="gender" type="text" placeholder="Gender" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Tempat Lahir</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control" name="tempat-lahir" type="text" placeholder="Tempat Lahir" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Tanggal Lahir</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control" name="tanggal-lahir" type="text" placeholder="Tanggal Lahir" disabled>
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
                                                        <input class="form-control" name="bank" type="text" placeholder="Bank" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">No. Rekening</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control" name="no_rekening" type="text" placeholder="No. Rekening" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Status</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <input class="form-control" name="status-pegawai" type="text" placeholder="Status" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-4">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Alamat</label>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-8">
                                                    <div class="input-wrap">
                                                        <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat" disabled></textarea>
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
                                <div class="card-header py-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6">
                                            <h3 class="card-title">List Kontrak</h3>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <!-- <a href="am-form-master-pivot-complex-add-data.php<?php echo (!empty($_POST['pegawai']) && $_POST['pegawai'] != '') ? '?pegawai=' . $_POST['pegawai'] : '' ;?>" class="btn btn-sm btn-default" data-repeater-create>
                                                <i class="ph ph-plus"></i> Tambah
                                            </a> -->
                                        </div>
                                    </div>
                                </div>           
                                <div class="card-body p-3">

                                    <?php if ( $kontrak_items >= 1) { ?>
                  
                                        <?php for ($i=0; $i < $kontrak_items; $i++) { ?>
                                            
                                            <div class="card shadow-none border">
                                                <div class="card-body p-2">
                                                    <div class="text-right mb-10">
                                                        <!-- <a href="am-form-master-pivot-complex-add-data.php?edit" class="btn btn-default ml-auto"><i class="ph ph-pencil mr-1"></i> Edit</a> -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Masa berlaku:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">05/22/2023 s.d 05/22/2024</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Status:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">Aktif</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Golongan Pajak:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">Kawin/1</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">BPJS:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li><i class="fa fa-check mr-1"></i> Kesehatan</li>
                                                                        <li><i class="fa fa-check mr-1"></i> TK</li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Posisi:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">Content Writer Website</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Divisi:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">Teknikal</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 col-md-6">
                                                            
                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Cuti / Tahun:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">12</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Jenis Kontrak:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">Tetap</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Minimal Jam Per Bulan:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">-</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Rate Lembur:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">Rp 50.000</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-xs-12 col-md-4">
                                                                    <label class="control-label text-right text-left-sm d-block">Catatan:</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-8">
                                                                    <p class="mb-0">Ini teks catatan untuk kontrak jika ada</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!--.row-->

                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">

                                                            <div class="card shadow-none border">
                                                                <div class="card-header">
                                                                    <h3 class="card-title font-weight-bold">Pendapatan</h3>
                                                                </div>           
                                                                <div class="card-body p-0">
                                                                    <table class="table table-bordered table-striped table-compact mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nama</th>
                                                                                <th>Tipe</th>
                                                                                <th>Nominal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Gaji Pokok</td>
                                                                                <td>Gaji</td>
                                                                                <td class="text-right">Rp 2.000.000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tunjangan Performa</td>
                                                                                <td>Tunjangan</td>
                                                                                <td class="text-right">Rp 3.350.000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tunjangan Proyek</td>
                                                                                <td>Tunjangan</td>
                                                                                <td class="text-right">Rp 250.000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Bonus</td>
                                                                                <td>Tunjangan</td>
                                                                                <td class="text-right">Rp 5.000.000</td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="2">Total Pendapatan Kotor</th>
                                                                                <th class="text-right">Rp <span class="total">5.600.000</span></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- /.card -->

                                                        </div>
                                                        <div class="col-xs-12 col-md-6">

                                                            <div class="card shadow-none border">
                                                                <div class="card-header">
                                                                    <h3 class="card-title font-weight-bold">Potongan</h3>
                                                                </div>           
                                                                <div class="box-body p-0">
                                                                    <table class="table table-bordered table-striped table-compact mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nama</th>
                                                                                <th>Tipe</th>
                                                                                <th>Nominal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>PPH 21</td>
                                                                                <td>Pajak</td>
                                                                                <td class="text-right">Rp 112.000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>BPJS TK</td>
                                                                                <td>(Bagian Perusahaan)</td>
                                                                                <td class="text-right">Rp 50.000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>BPJS TK</td>
                                                                                <td>(Bagian Pegawai)</td>
                                                                                <td class="text-right">Rp 50.000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>BPJS</td>
                                                                                <td>(Bagian Perusahaan)</td>
                                                                                <td class="text-right">Rp 50.000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>BPJS</td>
                                                                                <td>(Bagian Pegawai)</td>
                                                                                <td class="text-right">Rp 50.000</td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="2">Total Pendapatan Kotor</th>
                                                                                <th class="text-right">Rp <span class="total">312.000</span></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- /.card -->

                                                        </div>
                                                    </div> <!--.row-->

                                                </div> <!--.card-body-->
                                            </div> <!--.card-->

                                        <?php } ?>

                                    <?php } else { ?>
                                        <h5 class="text-center mt-15 mb-15">Belum ada kontrak. Silahkan klik Tambah untuk menambah kontrak baru.</h5>
                                    <?php } ?>
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
                                                    <a href={{@url("/html/am-table-sample-pivot-complex")}} class="btn btn-sm btn-md btn-default d-block w-full">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <a href="am-form-master-pivot-complex-edit?pegawai=<?php echo (isset($_POST['pegawai'])) ? $_POST['pegawai'] : ''; ?>" class="btn btn-sm btn-md btn-primary d-block w-full">Edit</a>
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

    //   const btnAddKontrak = $('.btn-add-kontrak');
    //   let btnAddKontrakHref = btnAddKontrak.attr('href').split('?')[0];
    //   btnAddKontrak.attr('href', btnAddKontrakHref + '?pegawai=' + idpegawai);

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
    var url = './api/pegawai.json';

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
