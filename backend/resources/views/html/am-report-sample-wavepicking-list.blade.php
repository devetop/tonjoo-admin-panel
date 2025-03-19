<?php 
  $pageTitle = 'Add New Warehouse';
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
                        <li
                            class="breadcrumb-item <?php echo ( $bci == array_key_last($breadcrumbs)) ? 'active' : ''; ?>">
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

            <div class="card mb-0 shadow-none border">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-material" href="#inbound" aria-controls="inbound" aria-selected="true" data-toggle="pill" role="tab">Material List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#crossdock" id="tab-crossdock" aria-controls="stack" aria-selected="false" data-toggle="pill" role="tab">Crossdock</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-3">
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="inbound" role="tabpanel" aria-labelledby="tab-inbound">
                      <?php 
                        for ($i=0; $i < 3; $i++) { 
                      ?>
                      <div class="card border shadow-none">
                          <div class="row no-gutters flex-nowrap">
                              <div class="col-auto box-info-left">
                                <table class="table table-compact table-borderless">
                                  <tr>
                                    <td class="text-right"><strong>SKU</strong></td>
                                    <td>AAXH28ST7P50G1</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Description</strong></td>
                                    <td>Strateos</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>EAN</strong></td>
                                    <td>E-1111</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>UPC</strong></td>
                                    <td>U-1222</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Old Code</strong></td>
                                    <td>9292</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Atribut Po</strong></td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Atribut Destinasi</strong></td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Atribut Kelengkapan</strong></td>
                                    <td>10</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Qty DO</strong></td>
                                    <td>40</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Qty Gudang</strong></td>
                                    <td>50</td>
                                  </tr>
                                  <tr>
                                    <td class="text-right"><strong>Crossdock</strong></td>
                                    <td>XXXX</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col">

                                <table class="table table-striped table-bordered">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Job ID</th>
                                      <th scope="col">Wave</th>
                                      <th scope="col">Priority</th>
                                      <th scope="col">Priority Timestamp</th>
                                      <th scope="col">Pallet ID</th>
                                      <th scope="col">Origin Bin</th>
                                      <th scope="col">Destination Bin</th>
                                      <th scope="col" class="text-right">Qty</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>JB-1</td>
                                      <td>9</td>
                                      <td>3</td>
                                      <td>-</td>
                                      <td>PL-1</td>
                                      <td>P2-S-1-1-1</td>
                                      <td>LD4</td>
                                      <td class="text-right">15</td>
                                    </tr>
                                    <tr>
                                      <td>JB-1</td>
                                      <td>9</td>
                                      <td>3</td>
                                      <td>-</td>
                                      <td>PL-1</td>
                                      <td>P2-S-1-1-1</td>
                                      <td>
                                        LD4
                                        <br>
                                        LD6
                                      </td>
                                      <td class="text-right">15</td>
                                    </tr>
                                    <tr>
                                      <td>JB-1</td>
                                      <td>9</td>
                                      <td>3</td>
                                      <td>-</td>
                                      <td>PL-1</td>
                                      <td>P2-S-1-1-1</td>
                                      <td>LD4</td>
                                      <td class="text-right">5</td>
                                    </tr>
                                    <tr>
                                      <td colspan="7" class="text-right">TOTAL</td>
                                      <td class="text-right">35</td>
                                    </tr>
                                  </tbody>
                                </table>

                              </div>
                          </div>
                      </div>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="tab-pane fade" id="crossdock" role="tabpanel" aria-labelledby="tab-crossdock">
                      <div class="row d-flex justify-content-end">
                        <div class="col-12 col-lg-2">

                            <form action="">
                                <div class="d-flex mb-3">
                                    <input name="search" value="" type="search" class="form-control form-control-sm" placeholder="Search...">
                                    <button class="btn btn-default btn-sm ml-2"><i class="ph ph-magnifying-glass"></i></button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="table-responsive no-gap w-auto">
                        <table cellspacing="0" class="table table-compact table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main" width="100%">
                            <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Loading Dock</th>
                                    <th>Outbound Document</th>
                                    <th>Loading Dock Status</th>
                                    <th>PO Attribute</th>
                                    <th>PO Destinasi</th>
                                    <th>PO Kelengkapan</th>
                                    <th>Quantity Dibutuhkan</th>
                                    <th>Quantity Terpenuhi</th>
                                    <th>Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i=0; $i<5; $i++) { ?>
                                <tr>
                                    <td>
                                      <a href="#">SKU-002</a>
                                    </td>
                                    <td>
                                      <a href="#">LD-002</a>
                                    </td>
                                    <td>
                                      <a href="#">OBD-002</a>
                                    </td>
                                    <td>Draft</td>
                                    <td>PO Attribute A</td>
                                    <td>PO Destinasi A</td>
                                    <td>PO Kelengkapan A</td>
                                    <td>20</td>
                                    <td>17</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>
                                      <a href="#">SKU-001</a>
                                    </td>
                                    <td>
                                      <a href="#">LD-001</a>
                                    </td>
                                    <td>
                                      <a href="#">OBD-001</a>
                                    </td>
                                    <td>Draft</td>
                                    <td>PO Attribute B</td>
                                    <td>PO Destinasi B</td>
                                    <td>PO Kelengkapan B</td>
                                    <td>20</td>
                                    <td>17</td>
                                    <td>3</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                      </div>
                      <div class="table-action-bottom py-3 no-gap border-bottom">
                          <div class="row align-items-center">
                            <div class="col-auto">
                                  <div class="show-entries">
                                      <label>Show</label>
                                      <select class="form-control form-control-sm">
                                          <option value="10">10</option>
                                          <option value="20">20</option>
                                          <option value="30">30</option>
                                          <option value="40">40</option>
                                          <option value="50">50</option>
                                      </select>
                                      <label>Entries</label>
                                  </div>
                              </div>
                              <div class="col-auto ml-auto">
                                  <div class="tablenav-pages d-flex align-items-center">
                                      <span class="displaying-num">Showing 1 to 10 of 57 entries</span>
                                      <ul class="pagination pagination-sm ml-3 mb-0">
                                          <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item"><a class="page-link" href="#">»</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
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

<!-- END: Insert additional plugin js -->

@include("html._footer-end")