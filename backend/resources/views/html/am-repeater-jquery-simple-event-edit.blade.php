<?php 
$pageTitle = 'Repeater Simple Event Edit';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

<?php
  $data = [
    "nama" => "Aminah",
    "telepon" => "01231321",
    "daftar_pesanan" => [
      [
        "nama" => "pesanan 1",
        "pembayaran" => "cash",
        "daftar_barang" =>  [
          [
            "barang" => 'lele',
            "jumlah" => 4
          ],
          [
            "barang" => 'bebek',
            "jumlah" => 4
          ]
        ]
      ],          
      [
        "nama" => "pesanan 2",
        "pembayaran" => "gopay",
        "daftar_barang" =>  [
          [
            "barang" => 'ayam',
            "jumlah" => 4
          ],
          [
            "barang" => 'lele',
            "jumlah" => 4
          ]
        ]
      ]    
    ]
  ];
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
            <div class="mw-1000px">

                <form class="form-horizontal text-left repeater" data-parsley-validate=""> 
                    <div class="row">
                        <div class="col-12 col-lg">
                            <form class="form-horizontal text-left repeater" data-parsley-validate="">
                                <div class="card shadow-none border">
                                    <div class="card-header py-2">
                                        <h3 class="card-title">Tab Repeater</h3>
                                    </div>           
                                    <div class="card-body px-2">
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-2">
                                                <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                    Nama
                                                </label>
                                            </div>
                                            <div class="col-xs-9 col-md-10">
                                                <div class="input-wrap">
                                                    <input class="form-control form-control-sm" name="nama" value="<?php echo $data['nama']; ?>" type="text" placeholder="Nama" required data-parsley-required-message="Nama wajib diisi">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-2">
                                                <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                    Telepon
                                                </label>
                                            </div>
                                            <div class="col-xs-9 col-md-10">
                                                <div class="input-wrap">
                                                    <input class="form-control form-control-sm" name="phone" value="<?php echo $data['telepon']; ?>" type="text" placeholder="Telepon">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-2">
                                                <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                    Daftar Pesanan
                                                </label>
                                            </div>
                                            <div class="col-xs-9 col-md-10">
                                                <div class="input-wrap">
                                                    <input type="button" data-repeater-create class="btn btn-sm btn-default" value="Add">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="card shadow-none border">
                                            <div class="card-header p-0">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="" aria-selected="false">Pesanan {tab_index} <i class="icon ph ph-x" data-repeater-delete></i></a>
                                                    </li>
                                                    <li data-repeater-tab class="d-flex align-items-center">
                                                        <button type="button" class="btn btn-default btn-xs ml-2" title="Add"><i class="icon ph ph-plus"></i></button>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-body p-0">

                                                <div class="tab-content" data-repeater-list="daftar_pesanan">
                                                    <?php foreach ( $data['daftar_pesanan'] as $pesanan ) : ?>
                                                        <div class="tab-pane active" data-repeater-item>
                                                            <div class="card shadow-none">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <button type="button" data-repeater-delete class="btn d-none"><i class="ph ph-x"></i></button>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                                                        Nama
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama" value="<?php echo $pesanan['nama']; ?>" required data-parsley-required-message="Nama wajib diisi">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                                                        Pembayaran
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <select class="form-control js-select2" name="pembayaran" style="width: 100%;" required data-parsley-required-message="Pembayaran wajib diisi">
                                                                                            <option value="cash" <?php echo 'cash' === $pesanan['pembayaran'] ? 'selected' : ''; ?>>Cash</option>
                                                                                            <option value="debit" <?php echo 'debit' === $pesanan['pembayaran'] ? 'selected' : ''; ?>>Debit</option>
                                                                                            <option value="gopay" <?php echo 'gopay' === $pesanan['pembayaran'] ? 'selected' : ''; ?>>Go Pay</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-xs-3 col-md-2">
                                                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                                                        Daftar Barang
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-xs-9 col-md-10">
                                                                                    <div class="input-wrap">
                                                                                        <div class="inner-repeater">
                                                                                            <input type="button" data-repeater-create class="btn btn-sm btn-default" value="Add">
                                                                                            <div data-repeater-list="daftar_barang">
                                                                                                <?php foreach ( $pesanan['daftar_barang'] as $barang ) : ?>
                                                                                                    <div data-repeater-item>
                                                                                                        <div class="card shadow-none mt-3">
                                                                                                            <div class="card-body">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-10">
                                                                                                                        <div class="form-group row">
                                                                                                                            <div class="col-xs-3 col-md-2">
                                                                                                                                <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                                                                                                    Barang
                                                                                                                                </label>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-9 col-md-10">
                                                                                                                                <div class="input-wrap">
                                                                                                                                    <input type="text" class="form-control form-control-sm" name="barang" placeholder="Barang" value="<?php echo $barang['barang']; ?>" required data-parsley-required-message="Nama Barang wajib diisi">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group row">
                                                                                                                            <div class="col-xs-3 col-md-2">
                                                                                                                                <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                                                                                                    Jumlah
                                                                                                                                </label>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-9 col-md-10">
                                                                                                                                <div class="input-wrap">
                                                                                                                                    <input type="number" class="form-control form-control-sm" name="jumlah" placeholder="Jumlah" value="<?php echo $barang['jumlah']; ?>" required data-parsley-required-message="Nama wajib diisi">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-2 text-right">
                                                                                                                        <button type="button" data-repeater-delete class="btn btn-secondary"><i class="ph ph-trash"></i></button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                                    </div>
                                                                                                <?php endforeach; ?>
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
                                                    <?php endforeach; ?>
                                                </div>

                                            </div>
                                            
                                            
                                        </div>        
                                    </div>
                                    
                                    <div class="card-footer">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>         
                                </div>
                                <!-- /.box -->
                            </form>
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

<!-- repeater -->
<script src={{url("dist/plugins/repeater/jquery.repeater.min.js")}}></script>
<script src={{url("dist/plugins/parsleyjs/dist/parsley.min.js")}}></script>
<!-- FastClick -->
<script src={{url("dist/plugins/fastclick/fastclick.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
    $(document).ready(function () {
        var repeater = $('.repeater');
        var tabsWrapper = repeater.find('.nav-tabs');
        var tabTemplate = tabsWrapper.find('li:not([data-repeater-tab])').first();
        var tabAppender = tabsWrapper.find('li[data-repeater-tab]').first();

        repeater.repeater({
        initEmpty: false,
        defaultValues: [],
        show: function () {
            $(this).slideDown(100);
            syncTab();
            tabsWrapper.find('a[href="#' + $(this).attr('id') +'"]').click();
        },
        hide: function (deleteElement) {
            if(confirm('Are you sure you want to delete this tab?')) {
            $(this).slideUp();
            var current = $(this);
            deleteElement();
            syncTab();
            setTimeout(function() {
                tabsWrapper.find('li').first().find('a').click();
            }, 100)
            }
        },
        // init repeater inside the repeater
        repeaters: [{
            selector: '.inner-repeater',
            initEmpty: true,
            show: function () {
            $(this).slideDown(100);
            },
        }],
        ready: function (setIndexes) {
            syncTab();
            tabsWrapper.find('li').first().find('a').click();
        },
        isFirstItemUndeletable: true
        });

        tabsWrapper.on('click', '[data-repeater-delete]', function(e) {
            e.preventDefault();
            var selector = $(this).parents('a').attr('href');
            $(selector).find('[data-repeater-delete]').first().click();
        });

        function syncTab() {
            tabsWrapper.html('');
            repeater.find('.tab-content[data-repeater-list] > [data-repeater-item]').each(function() {
                var tabIndex = 'tab_' + $(this).parents('[data-repeater-list]').data('repeater-list') + '_' + $(this).index();
                $(this).removeAttr( 'style' );
                $(this).attr( 'id', tabIndex );
                var tab = tabTemplate.clone();
                tab.removeClass('active');
                tab.find('a').attr('href', '#'+tabIndex);
                tab.find('a').html( tab.find('a').html().replace('{tab_index}', $(this).index() + 1) );
                tabsWrapper.append(tab);
            });

            if ( tabAppender ) {
                tabAppender.on('click',function(){
                    repeater.find('[data-repeater-create]').first().click();
                });
                tabsWrapper.append(tabAppender);
            }
        }
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
