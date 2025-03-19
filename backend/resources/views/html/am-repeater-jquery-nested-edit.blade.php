<?php 
$pageTitle = 'Repeater Nested dan Select2';
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
            "barang" => 1,
            "jumlah" => 4
          ],
          [
            "barang" => 18,
            "jumlah" => 4
          ]
        ]
      ],          
      [
        "nama" => "pesanan 2",
        "pembayaran" => "cash",
        "daftar_barang" =>  [
          [
            "barang" => 1,
            "jumlah" => 4
          ],
          [
            "barang" => 18,
            "jumlah" => 4
          ]
        ]
      ]    
  	]
	];

	$barangs = [
    1 => 'lele',
    4 => 'ayam',
    18 => 'bebek'
	];
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
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h3 class="card-title">Inline Form (button di atas)</h3>
                        </div>
                        <!-- form start -->
                        <form class="form-horizontal text-left repeater" data-parsley-validate="">
                          <div class="card-body">
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                        <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" value="<?php echo $data['nama']; ?>" required data-parsley-required-message="Nama">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                        <input type="text" class="form-control form-control-sm" id="inputPhone" placeholder="Nama" value="<?php echo $data['telepon']; ?>" required data-parsley-required-message="Telepon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Pesanan</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                      <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                      <div data-repeater-list="daftar_pesanan">
                                        <?php foreach ( $data['daftar_pesanan'] as $pesanan ) : ?>
                                          <div data-repeater-item>
                                            <div class="card mt-3">
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="col-md-10">
                                                    <div class="form-group row">
                                                        <div class="col-xs-3 col-md-2">
                                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                                        </div>
                                                        <div class="col-xs-9 col-md-10">
                                                            <div class="input-wrap">
                                                                <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" value="<?php echo $pesanan['nama']; ?>" required data-parsley-required-message="Nama">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xs-3 col-md-2">
                                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Pembayaran (Select2)</label>
                                                        </div>
                                                        <div class="col-xs-9 col-md-10">
                                                            <div class="input-wrap">
                                                              <select class="form-control js-select2" name="pembayaran" style="width: 100%;" required data-parsley-required-message="Pembayaran wajib diisi">
                                                                <option value="cash" <?php echo 'cash' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Cash</option>
                                                                <option value="debit" <?php echo 'debit' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Debit</option>
                                                                <option value="gopay" <?php echo 'gopay' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Go Pay</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xs-3 col-md-2">
                                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                                        </div>
                                                        <div class="col-xs-9 col-md-10">
                                                            <div class="input-wrap">
                                                              <div class="inner-repeater">
                                                                <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                                                
                                                                <div data-repeater-list="daftar_barang">
                                                                  <?php foreach ( $pesanan['daftar_barang'] as $barang ) : ?>
                                                                    <div data-repeater-item>
                                                                      <div class="card mt-3">
                                                                        <div class="card-body">
                                                                          <div class="row">
                                                                            <div class="col-md-10">
                                                                              <div class="form-group row">
                                                                                  <div class="col-xs-3 col-md-2">
                                                                                      <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Barang (Select2 Ajax)</label>
                                                                                  </div>
                                                                                  <div class="col-xs-9 col-md-10">
                                                                                      <div class="input-wrap">
                                                                                        <select class="form-control js-select2-ajax" name="barang" style="width: 100%;" required data-parsley-required-message="Barang wajib diisi">
										                            	                                        <option value="<?php echo $barang['barang'] ?>" selected><?php echo $barangs[ $barang['barang'] ]; ?></option>
                                                                                        </select>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="form-group row">
                                                                                  <div class="col-xs-3 col-md-2">
                                                                                      <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Jumlah</label>
                                                                                  </div>
                                                                                  <div class="col-xs-9 col-md-10">
                                                                                      <div class="input-wrap">
                                                                                        <input type="number" class="form-control form-control-sm" name="jumlah" value="<?php echo $barang['jumlah']; ?>" placeholder="Jumlah" value="" required min="1" data-parsley-required-message="Jumlah wajib diisi" data-parsley-min-message="Jumlah minimal 1">
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                            </div>
                                                                            <div class="col-md-2 text-right">
                                                                              <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
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
                                                  <div class="col-md-2 text-right">
                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
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
                          <div class="card-footer">
                            <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                          </div>
                        </form>
                    </div>
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h3 class="card-title">Block Form</h3>
                        </div>
                        <!-- form start -->
                        <form class="form-horizontal text-left repeater" data-parsley-validate="">
                          <div class="card-body">
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                        <input type="text" class="form-control form-control-sm" id="inputNama" value="<?php echo $data['nama']; ?>" placeholder="Nama" required data-parsley-required-message="Nama">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                        <input type="text" class="form-control form-control-sm" id="inputPhone" value="<?php echo $data['telepon']; ?>" placeholder="Nama" required data-parsley-required-message="Telepon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-xs-3 col-md-2">
                                  <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Pesanan</label>
                              </div>
                              <div class="col-xs-9 col-md-10">
                                  <div class="input-wrap">
                                    <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                  </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-xs-12 col-md-12">
                              <div data-repeater-list="daftar_pesanan">
                                <?php foreach ( $data['daftar_pesanan'] as $pesanan ) : ?>
                                  <div data-repeater-item>
                                    <div class="card mt-3">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col-md-10">
                                            <div class="form-group row">
                                                <div class="col-xs-3 col-md-2">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                                </div>
                                                <div class="col-xs-9 col-md-10">
                                                    <div class="input-wrap">
                                                        <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama"  value="<?php echo $pesanan['nama']; ?>" required data-parsley-required-message="Nama">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-3 col-md-2">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Pembayaran (Select2)</label>
                                                </div>
                                                <div class="col-xs-9 col-md-10">
                                                    <div class="input-wrap">
                                                      <select class="form-control js-select2" name="pembayaran" style="width: 100%;" required data-parsley-required-message="Pembayaran wajib diisi">
                                                        <option value="cash" <?php echo 'cash' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Cash</option>
                                                        <option value="debit" <?php echo 'debit' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Debit</option>
                                                        <option value="gopay" <?php echo 'gopay' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Go Pay</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-3 col-md-2">
                                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                                </div>
                                                <div class="col-xs-9 col-md-10">
                                                    <div class="input-wrap">
                                                      <div class="inner-repeater">
                                                        <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                                        
                                                        <div data-repeater-list="daftar_barang">
                						                              <?php foreach ( $pesanan['daftar_barang'] as $barang ) : ?>
                                                            <div data-repeater-item>
                                                              <div class="card mt-3">
                                                                <div class="card-body">
                                                                  <div class="row">
                                                                    <div class="col-md-10">
                                                                      <div class="form-group row">
                                                                          <div class="col-xs-3 col-md-2">
                                                                              <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Barang (Select2 Ajax)</label>
                                                                          </div>
                                                                          <div class="col-xs-9 col-md-10">
                                                                              <div class="input-wrap">
                                                                                <select class="form-control js-select2-ajax" name="barang" style="width: 100%;" required data-parsley-required-message="Barang wajib diisi">
                                                                                  <option value="<?php echo $barang['barang'] ?>" selected><?php echo $barangs[ $barang['barang'] ]; ?></option>
                                                                                </select>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <div class="col-xs-3 col-md-2">
                                                                              <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Jumlah</label>
                                                                          </div>
                                                                          <div class="col-xs-9 col-md-10">
                                                                              <div class="input-wrap">
                                                                                <input type="number" class="form-control form-control-sm" name="jumlah" placeholder="Jumlah" value="<?php echo $barang['jumlah']; ?>" required min="1" data-parsley-required-message="Jumlah wajib diisi" data-parsley-min-message="Jumlah minimal 1">
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-right">
                                                                      <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
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
                                          <div class="col-md-2 text-right">
                                            <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
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
                            <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                          </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h3 class="card-title">Inline Form (button di bawah)</h3>
                        </div>
                        <!-- form start -->
                        <form class="form-horizontal text-left repeater" data-parsley-validate="">
                          <div class="card-body">
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                        <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" value="<?php echo $data['nama']; ?>" required data-parsley-required-message="Nama">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                        <input type="text" class="form-control form-control-sm" id="inputPhone" value="<?php echo $data['telepon']; ?>" placeholder="Nama" required data-parsley-required-message="Telepon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-3 col-md-2">
                                    <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Pesanan</label>
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div class="input-wrap">
                                      <div data-repeater-list="daftar_pesanan">
                                        <?php foreach ( $data['daftar_pesanan'] as $pesanan ) : ?>
                                          <div data-repeater-item>
                                            <div class="card mt-3">
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="col-md-10">
                                                    <div class="form-group row">
                                                        <div class="col-xs-3 col-md-2">
                                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama</label>
                                                        </div>
                                                        <div class="col-xs-9 col-md-10">
                                                            <div class="input-wrap">
                                                                <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" value="<?php echo $pesanan['nama']; ?>" required data-parsley-required-message="Nama">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xs-3 col-md-2">
                                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Pembayaran (Select2)</label>
                                                        </div>
                                                        <div class="col-xs-9 col-md-10">
                                                            <div class="input-wrap">
                                                              <select class="form-control js-select2" name="pembayaran" style="width: 100%;" required data-parsley-required-message="Pembayaran wajib diisi">
                                                                <option value="cash" <?php echo 'cash' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Cash</option>
                                                                <option value="debit" <?php echo 'debit' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Debit</option>
                                                                <option value="gopay" <?php echo 'gopay' === $pesanan['pembayaran'] ? 'selected' : '' ?>>Go Pay</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xs-3 col-md-2">
                                                            <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                                        </div>
                                                        <div class="col-xs-9 col-md-10">
                                                            <div class="input-wrap">
                                                              <div class="inner-repeater">
                                                                <input type="button" data-repeater-create class="btn btn-sm btn-secondary" value="Add">
                                                                
                                                                <div data-repeater-list="daftar_barang">
			                  						                              <?php foreach ( $pesanan['daftar_barang'] as $barang ) : ?>
                                                                    <div data-repeater-item>
                                                                      <div class="card mt-3">
                                                                        <div class="card-body">
                                                                          <div class="row">
                                                                            <div class="col-md-10">
                                                                              <div class="form-group row">
                                                                                  <div class="col-xs-3 col-md-2">
                                                                                      <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Barang (Select2 Ajax)</label>
                                                                                  </div>
                                                                                  <div class="col-xs-9 col-md-10">
                                                                                      <div class="input-wrap">
                                                                                        <select class="form-control js-select2-ajax" name="barang" style="width: 100%;" required data-parsley-required-message="Barang wajib diisi">
                                                                                          <option value="<?php echo $barang['barang'] ?>" selected><?php echo $barangs[ $barang['barang'] ]; ?></option>
                                                                                        </select>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="form-group row">
                                                                                  <div class="col-xs-3 col-md-2">
                                                                                      <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Jumlah</label>
                                                                                  </div>
                                                                                  <div class="col-xs-9 col-md-10">
                                                                                      <div class="input-wrap">
                                                                                        <input type="number" class="form-control form-control-sm" name="jumlah" placeholder="Jumlah" value="<?php echo $barang['jumlah']; ?>" required min="1" data-parsley-required-message="Jumlah wajib diisi" data-parsley-min-message="Jumlah minimal 1">
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                            </div>
                                                                            <div class="col-md-2 text-right">
                                                                              <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
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
                                                  <div class="col-md-2 text-right">
                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-secondary"><i class="ph ph-trash"></i></button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        <?php endforeach; ?>
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

        // remove select2 initialization on inside repeater, so we can reinit it when add new item on repeater
        $('[data-repeater-list] .js-select2, [data-repeater-list] .js-select2-ajax').each(function() {
            $(this).select2('destroy');
        });

        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: [],
            show: function() {
                // reinit select2 when adding new item to repeater
                manualDestroySelect2($(this).find('.js-select2'));
                manualDestroySelect2($(this).find('.js-select2-ajax'));
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
                $(this).find('[data-repeater-item]').each(function(i) {
                    if (0 < i) {
                        $(this).remove();
                    }
                });
            },

            // init repeater inside the repeater
            repeaters: [{
                selector: '.inner-repeater',
                initEmpty: false,
                show: function() {
                    manualDestroySelect2($(this).find('.js-select2'));
                    manualDestroySelect2($(this).find('.js-select2-ajax'));
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
                ready: function(setIndexes) {
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
                }
            }],
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function(setIndexes) {
                // init select2 for outside repeater
                $('.js-select2').select2();
                $('.js-select2-ajax').select2({
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
                $('.js-select2-ajax').each(function() {
                    $(this).trigger('change');
                });
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        });

        function manualDestroySelect2(selector) {
            selector.removeClass('select2-hidden-accessible');
            selector.next('.select2').remove();
        }
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
