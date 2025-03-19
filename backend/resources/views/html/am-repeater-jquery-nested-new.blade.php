<?php 
$pageTitle = 'Repeater jQuery Nested New';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- Select2 -->
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
                <div class="col-12 col-md-6">
                    <form class="form-horizontal text-left repeater" data-parsley-validate="">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h3 class="card-title">Inline Form (button add di atas)</h3>
                            </div>  
                            <form class="form-horizontal text-left repeater" data-parsley-validate="">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" required data-parsley-required-message="Nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                                <div data-repeater-list="daftar_barang">
                                                    <div data-repeater-item>
                                                        <div class="input-wrap mt-3">
                                                            <div class="card shadow-none border">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Barang</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Jumlah</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2 text-right">
                                                                            <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
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
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                        </div>
                    </form>
                    <form class="form-horizontal text-left repeater" data-parsley-validate="">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h3 class="card-title">Block Form</h3>
                            </div>  
                            <form class="form-horizontal text-left repeater" data-parsley-validate="">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" required data-parsley-required-message="Nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="input-wrap">
                                                <div data-repeater-list="daftar_barang">
                                                    <div data-repeater-item>
                                                        <div class="input-wrap mt-3">
                                                            <div class="card shadow-none border">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Barang</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Jumlah</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2 text-right">
                                                                            <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
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
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form class="form-horizontal text-left repeater" data-parsley-validate="">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h3 class="card-title">Inline Form (button add di atas)</h3>
                            </div>  
                            <form class="form-horizontal text-left repeater" data-parsley-validate="">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" required data-parsley-required-message="Nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <div data-repeater-list="daftar_barang">
                                                    <div data-repeater-item>
                                                        <div class="input-wrap mt-3">
                                                            <div class="card shadow-none border">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Barang</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Jumlah</label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2 text-right">
                                                                            <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                        </div>
                    </form>
                    <form class="form-horizontal text-left repeater" data-parsley-validate="">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h3 class="card-title">Table</h3>
                            </div>  
                            <form class="form-horizontal text-left repeater" data-parsley-validate="">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" required data-parsley-required-message="Nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" required data-parsley-required-message="Telepon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3 col-md-2">
                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                        </div>
                                        <div class="col-xs-9 col-md-10">
                                            <div class="input-wrap">
                                                <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                                <table class="table table-bordered mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Barang</th>
                                                            <th>Jumlah</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-repeater-list="daftar_barang">
                                                        <tr data-repeater-item>
                                                            <td>
                                                                <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama" value="" required data-parsley-required-message="Nama wajib diisi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control form-control-sm" name="barang" placeholder="Barang" value="" required data-parsley-required-message="Barang wajib diisi">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control form-control-sm" name="jumlah" placeholder="Jumlah" value="" required min="1" data-parsley-required-message="Jumlah wajib diisi" data-parsley-min-message="Jumlah minimal 1">
                                                            </td>
                                                            <td>
                                                                <button type="button" data-repeater-delete class="btn btn-sm btn-sm"><i class="ph ph-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                                </div>
                            </form>
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

<!-- Repeater -->
<script src={{url("dist/plugins/repeater/jquery.repeater.min.js")}}></script>
<!-- Select2 -->
<script src={{url("dist/plugins/select2/js/select2.full.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
   $(document).ready(function() {

        // init select2 for outside repeater
        $('.js-select2').select2();
        $('.js-select2-ajax').select2({
            ajax: {
                url: "../backend-v2/aksara-repeater-ajax.php",
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: $.map(data, function(obj, i) {
                            return {
                                id: i,
                                text: obj
                            };
                        })
                    }
                }
            }
        });

        // remove select2 initialization on inside repeater, so we can reinit it when add new item on repeater
        $('[data-repeater-list] .js-select2, [data-repeater-list] .js-select2-ajax').each(function() {
            $(this).select2('destroy');
        });

        $('.repeater').repeater({
            initEmpty: true,
            defaultValues: [],
            show: function() {
                // reinit select2 when adding new item to repeater
                $(this).find('.js-select2').select2();
                $(this).find('.js-select2-ajax').select2({
                    ajax: {
                        url: "aksara-repeater-ajax.php",
                        dataType: 'json',
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(obj, i) {
                                    return {
                                        id: i,
                                        text: obj
                                    };
                                })
                            }
                        }
                    }
                });
                $(this).slideDown(100);
            },

            // init repeater inside the repeater
            repeaters: [{
                selector: '.inner-repeater',
                initEmpty: true,
                show: function() {
                    // reinit select2 when adding new item to repeater
                    $(this).find('.js-select2').select2();
                    $(this).find('.js-select2-ajax').select2({
                        ajax: {
                            url: "ajax-demo/ajax-repeater.php",
                            dataType: 'json',
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(obj, i) {
                                        return {
                                            id: i,
                                            text: obj
                                        };
                                    })
                                }
                            }
                        }
                    });
                    $(this).slideDown(100);
                },
            }],
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function(setIndexes) {
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        })
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
