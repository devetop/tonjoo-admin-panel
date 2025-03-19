<?php 
$pageTitle = 'Repeater';
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
    <section class="content pb-5">
        <div class="container">
            
            <div class="row">
                <div class="col-12 col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Repeater Example - Standard jQuery</h2>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>
                                    <a href="#">Simple - New</a>
                                </li>
                                <li>
                                    <a href="#">Simple - Edit</a>
                                </li>
                                <li>
                                    <a href="#">Repeater Simple Event - New</a>
                                </li>
                                <li>
                                    <a href="#">Repeater Simple Event - Edit</a>
                                </li>
                                <li>
                                    <a href="#">Repeater dalam repeater dan select2 - New</a>
                                </li>
                                <li>
                                    <a href="#">Repeater dalam repeater dan select2 - Edit</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Library Repeater</h2>
                        </div>
                        <div class="card-body">
                            <p>Library repeater yang dipakai: <a href="https://github.com/DubFriend/jquery.repeater" target="_blank">https://github.com/DubFriend/jquery.repeater</a></p>

                            <p>Untuk dokumentasi sudah cukup jelas di Github. Untuk contoh modifikasi event dalam repeater bisa cek kode pada sample <a href="#">Repeater Simple Event - New</a> dan <a href="#">Repeater Simple Event - Edit</a>.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Library Form Validator</h2>
                        </div>
                        <div class="card-body">
                            <p>Library form validator yang dipakai: <a href="https://parsleyjs.org/" target="_blank">https://parsleyjs.org/</a></p>

                            <p>Contoh sederhana implementasi Parsley</p>

                            <pre class="bg-gray-light border rounded"><?php echo htmlspecialchars( '<form data-parsley-validate="">
    Nama:
    <input type="text" required data-parsley-required-message="Nama wajib diisi" />
    Usia:
    <input type="number" required data-parsley-required-message="Usia wajib diisi" min="20" data-parsley-min-message="Usia minimal 20"/>
    Telepon:
    <input type="text" required pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" data-parsley-pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" data-parsley-required-message="Telepon wajib diisi" data-parsley-pattern-message="Nomor telepon tidak valid" />
    Password:
    <input type="text" required data-parsley-required-message="Password wajib diisi" minlength="8" data-parsley-minlength="8" data-parsley-minlength-message="Password minimal 8 karakter" />
</form>' ); ?></pre>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6">
                                
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Repeater Example - Vue JS</h2>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>
                                    <a href="#">Repeater Simple - New</a>
                                </li>
                                <li>
                                    <a href="#">Repeater Simple - Edit</a>
                                </li>
                                <li>
                                    <a href="#">Repeater Kompleks - New</a>
                                </li>
                                <li>
                                    <a href="#">Repeater Kompleks - Edit</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Repeater Example - Vue JS</h2>
                        </div>
                        <div class="card-body">
                            <p>Library form validator yang dipakai: <a href="https://vuelidate.js.org/" target="_blank">https://vuelidate.js.org/</a></p>

                            <p>Contoh penggunaan <a href="https://vuelidate.js.org/#sub-basic-form" target="_blank">https://vuelidate.js.org/#sub-basic-form</a></p>

                            <p>List validator bawaan <a href="https://vuelidate.js.org/#sub-builtin-validators" target="_blank">https://vuelidate.js.org/#sub-builtin-validators</a></p>
                        </div>
                    </div>

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
