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
$pageTitle = $preffix_title . ' Monitor';
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
            <div class="mw-1000px">

                <?php if ( isset($_GET['success']) && $_GET['success'] == '1' ) { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>BERHASIL:</strong> Data berhasil disimpan.
                    </div>
                <?php } ?>

                <?php if ( isset($_GET['failed']) && $_GET['failed'] == '1' ) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>GAGAL:</strong> Data gagal disimpan.
                    </div>
                <?php } ?>

                <form accept-charset="UTF-8" action="" method="get" role="form" class="multi-action-form validate-form"> 
                    @csrf
                    <input type="hidden" name="success" value="1">
                    <input type="hidden" name="dummy_endpoint" value="1">
                    <div class="row">
                        <div class="col-12 col-lg">
                            <div class="card">
                                <div class="card-header py-2">
                                    <h3 class="card-title">Informasi Umum</h3>
                                </div>           
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Monitor</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input class="form-control form-control-sm @error('monitor_name') is-invalid @enderror" name="monitor_name" type="text" data-rule-required="true" data-msg-required="Monitor name field is required." placeholder="Input Monitor Name" value="<?php echo (isset($_GET['add'])) ? '' : 'demo.tonjoostudio.com' ;?>">
                                            </div>
                                            @error('monitor_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">URL</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input class="form-control form-control-sm @error('monitor_url') is-invalid @enderror" name="monitor_url" type="text" data-rule-required="true" data-msg-required="URL field is required." placeholder="Input URL" value="<?php echo (isset($_GET['add'])) ? '' : 'http://demo.tonjoostudio.com' ;?>">
                                            </div>
                                            @error('monitor_url')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Domain</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input class="form-control form-control-sm" name="monitor_domain" type="text" data-rule-required="true" data-msg-required="Domain field is required." placeholder="Domain" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Scheme</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input class="form-control form-control-sm" name="monitor_scheme" type="text" data-rule-required="true" data-msg-required="Scheme field is required." placeholder="Scheme" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Port</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input class="form-control form-control-sm" name="monitor_port" type="text" data-rule-required="true" data-msg-required="Port field is required." placeholder="Port" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Group</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <?php 
                                                    $data = array(
                                                    ['id' => 1, 'nama' => 'Internal'],
                                                    ['id' => 2, 'nama' => 'Client'],
                                                    ['id' => 3, 'nama' => 'Hipwee'],
                                                    ['id' => 4, 'nama' => 'GNI'],
                                                    ['id' => 5, 'nama' => 'Infra Tonjoo'],
                                                    ['id' => 6, 'nama' => 'Scrapper'],
                                                    ['id' => 7, 'nama' => 'cakap-mainsite'],
                                                    ['id' => 7, 'nama' => 'cakap-blog']
                                                    );
                                                ?>   
                                                <select style="width: 100%;" class="form-control form-control-sm js-select2" name="group" 
                                                    data-allow-clear="true" 
                                                    data-placeholder="Pilih Group">

                                                    
                                                    <?php 
                                                    echo '<option value="" selected>Pilih Group</option>';
                                                    
                                                    foreach ( $data as $d) {
                                                    if ( (isset($_GET['group']) && $_GET['group'] != '') ) {
                                                        $idGroupSelected = $_GET['group'];
                                                    }elseif( (!empty($_POST['group']) && $_POST['group'] != '') ){
                                                        $idGroupSelected = $_POST['group'];
                                                    }elseif( !isset($_GET['success'])  ){
                                                        $idGroupSelected = '';
                                                    }else{
                                                        $idGroupSelected = '';
                                                    }

                                                    $selected = ( $d['id'] == $idGroupSelected ) ? 'selected' : '';
                                                    echo '<option value="' .$d['id']. '" '. $selected .'>' .$d['nama']. '</option>';
                                                    }?>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <a target="_blank" href="#">Add new group</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

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
                                                    <a href={{@url("/html/am-table-master")}} class="btn btn-sm btn-default d-block w-full">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <div class="btn-group w-100">
                                                        <button type="submit" class="btn btn-sm btn-primary js-submit-create" type="button">Create</button>
                                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <a href="{{@url("/html/am-form-master-basic-view?success=1")}}" class="dropdown-item js-submit-create">Create Berhasil</a>
                                                            <a href="{{@url("/html/am-form-master-basic-edit?add=&failed=1")}}" class="dropdown-item js-submit-create-failed">Create Gagal</a>
                                                            <a href="{{@url("/html/am-form-master-basic-edit?add=&success=1")}}" class="dropdown-item js-submit-new">Create & New</a>
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

<!-- Select2 -->
<script src={{url("dist/plugins/select2/js/select2.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
    $(function () {
        // Select2
        $('.js-select2').select2();


        //BEGIN: Breakdown URL
        function breakdownUrl(url) {
            if (!url) {
                return;
            }

            const parsedUrl = new URL(url);
            const scheme = parsedUrl.protocol.slice(0, -1); // Remove trailing colon
            const domain = parsedUrl.hostname;
            let port = parsedUrl.port;

            // If the port is not specified, use default ports for HTTP and HTTPS
            if (!port) {
                port = scheme === "http" ? 80 : scheme === "https" ? 443 : "";
            }

            return {
                scheme,
                domain,
                port,
            };
        }

        function monitor_url( el ){
            if ( !el ) {
                return;
            }
            let url = breakdownUrl( el )
            let urlScheme = '', urlDomain = '', urlPort = '';
            urlScheme = url.scheme;
            urlDomain = url.domain;
            urlPort = url.port;

            $('[name=monitor_domain]').val( urlDomain );
            $('[name=monitor_scheme]').val( urlScheme );
            $('[name=monitor_port]').val( urlPort );
            }

            monitor_url( $('[name=monitor_url]').val() );
            $('[name=monitor_url]').on('blur', function() {
            monitor_url( $(this).val() );
        });  
        //END: Breakdown URL 
 
        // BEGIN: SUBMITTED  
        // $('.js-submit-create').on('click', function(){
        //     $('form').attr('action', '{{@url("/html/am-form-master-basic-view?success")}}');
        //     $('form').submit();
        // })
        // $('.js-submit-new').on('click', function(){
        //     $('form').attr('action', '?success');
        //     $('form').submit();
        // })
        // END: SUBMITTED
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
