<?php 
$pageTitle = 'Statistik Rawat Jalan';
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
        <div class="container-fluid">
            <div class="mw-1200px">

                <div class="card">
                    <div class="card-body">

                        <div class="row align-items-center mb-3">
                            <div class="col-sm-12 col-md-6">
                                <div class="list-status">
                                    <ul>
                                        <li class="active">
                                            <a href="#">Hari Ini</a>
                                        </li>
                                        <li>
                                            <a href="#">Minggu Ini</a>
                                        </li>
                                        <li>
                                            <a href="#">Bulan Ini</a>
                                        </li>
                                        <li>
                                            <a href="#">7 Hari</a>
                                        </li>
                                        <li>
                                            <a href="#">30 Hari</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row row-action separator justify-content-end align-items-center">
                                    <div class="col-auto column-search">
                                        <form action="">
                                            <div class="d-flex">
                                                <input name="search" value="" type="search" class="form-control form-control-sm" placeholder="Search...">
                                                <button class="btn btn-default btn-sm ml-2"><i class="ph ph-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-auto column-filter">
                                        <button class="btn btn-default btn-sm js-filter-btn">
                                            <i class="icon ph ph-funnel"></i>
                                            <i class="icon ph ph-x" style="display: none;"></i>
                                        </button>
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <form action="" id="form-filter" style="display: none;">
                            <div class="card card-filter shadow-none border bg-gray-light">
                                <div class="card-body">     
                                    <div class="filter-data-wrapper">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-10 d-flex align-items-center">
                                                    <label class="control-label mr-3 mb-0">Report Type</label>
                                                    <div class="input-wrap">
                                                        <select name="" class="form-control form-control-sm">
                                                            <option value="">Select Report Type</option>
                                                            <option value="0">Detail</option>
                                                            <option value="1">Total</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row grid-filter-data">
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> SKU
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="status" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Serial Number
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Bin
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> Pallet
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md">
                                                <div class="filter-data-list">
                                                    <div class="filter-data-list__header">
                                                        <a href="#" class="clear js-clear-all" title="Clear All">
                                                            <i class="ph ph-trash"></i>
                                                        </a> PO
                                                    </div>
                                                    <div class="filter-data-list__body">
                                                        <div class="input">
                                                            <input type="text" class="form-control" name="group" placeholder="Paste Here">
                                                        </div>
                                                        <div class="empty">Empty</div>
                                                        <div class="data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-gray-light text-right border-top">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa fa-filter"></i> <span>Filter</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="card shadow-none border">
                            <div class="card-body">

                                <div class="row d-flex">
                                    <div class="col-lg col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-red small-box-bottom mb-0" style="height: 100%;">
                                            <div class="inner">
                                                <p><strong>Total Kunjungan</strong></p>
                                                <h3>159</h3>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <div class="col-lg col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-blue small-box-bottom mb-0" style="height: 100%;">
                                            <div class="inner">
                                                <p><strong>Tindakan</strong></p>
                                                <h3>139</h3>
                                                <p class="mb-0"><small>87.4% / Total Kunjungan</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <div class="col-lg col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-orange small-box-bottom mb-0" style="height: 100%;">
                                            <div class="inner">
                                                <p><strong>Input Obat</strong></p>
                                                <h3>108</h3>
                                                <p class="mb-0"><small>67.9% / Total Kunjungan</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <div class="col-lg col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-green small-box-bottom mb-0" style="height: 100%;">
                                            <div class="inner">
                                                <p><strong>Penyerahan Obat</strong></p>
                                                <h3>108</h3>
                                                <p class="mb-0"><small>67.9% / Total Kunjungan</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <div class="col-lg col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-indigo small-box-bottom mb-0" style="height: 100%;">
                                            <div class="inner">
                                                <p><strong>Selesai</strong></p>
                                                <h3>152</h3>
                                                <p class="mb-0"><small>95.6% / Total Kunjungan</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- ./row -->

                            </div>
                        </div>

                        <?php for ($i=0; $i < 2; $i++) { ?>

                            <div class="card border shadow-none">
                                <div class="row no-gutters flex-nowrap">
                                    <div class="col-auto box-info-left">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th class="text-center" style="border-bottom-color: #e5e5e5;">Poliklinik Orthopedi & Traumatologi</th>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <div class="form-horizontal">

                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Total Kunjungan</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">10</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Tindakan</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">4</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Resep</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">7</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Selesai</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">10</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">

                                        <table id="" class="table table-compact table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Dokter</th>
                                                    <th class="text-center">Total Kunjungan</th>
                                                    <th class="text-center">Tindakan</th>
                                                    <th class="text-center">Resep</th>
                                                    <th class="text-center">Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">dr. Adam Moeljono, Sp.OT (K)</td>
                                                    <td class="text-center">10</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">7</td>
                                                    <td class="text-center">10</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="card border shadow-none">
                                <div class="row no-gutters flex-nowrap">
                                    <div class="col-auto box-info-left">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th class="text-center" style="border-bottom-color: #e5e5e5;">Poliklinik Penyakit Dalam</th>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <div class="form-horizontal">

                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Total Kunjungan</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">1</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Tindakan</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">1</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Resep</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">0</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-6 label-inline">Selesai</label>
                                                        <div class="col-sm-6">
                                                        <div class="form-value">1</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">

                                        <table id="" class="table table-compact table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Dokter</th>
                                                    <th class="text-center">Total Kunjungan</th>
                                                    <th class="text-center">Tindakan</th>
                                                    <th class="text-center">Resep</th>
                                                    <th class="text-center">Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">dr. Boy Hutaperi, Sp. PD</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">0</td>
                                                    <td class="text-center">1</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="card border shadow-none">
                                <div class="row no-gutters flex-nowrap">
                                    <div class="col-auto box-info-left">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th class="text-center" style="border-bottom-color: #e5e5e5;">Poliklinik Anak</th>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <div class="form-horizontal">

                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Total Kunjungan</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">50</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Tindakan</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">40</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Resep</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">28</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Selesai</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">50</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">

                                        <table id="" class="table table-compact table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Dokter</th>
                                                    <th class="text-center">Total Kunjungan</th>
                                                    <th class="text-center">Tindakan</th>
                                                    <th class="text-center">Resep</th>
                                                    <th class="text-center">Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">Dr. dr. Ekawaty Lutfia Haksari, MPH, Sp. A (K)</td>
                                                    <td class="text-center">46</td>
                                                    <td class="text-center">36</td>
                                                    <td class="text-center">27</td>
                                                    <td class="text-center">46</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">dr. Elysa Nur Safrida, Sp. A</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">4</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="card border shadow-none">
                                <div class="row no-gutters flex-nowrap">
                                    <div class="col-auto box-info-left">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th class="text-center" style="border-bottom-color: #e5e5e5;">Poliklinik Umum</th>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <div class="form-horizontal">

                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Total Kunjungan</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">79</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Tindakan</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">78</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Resep</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">60</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label class="col-sm-6 label-inline">Selesai</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-value">73</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">

                                        <table id="" class="table table-compact table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Dokter</th>
                                                    <th class="text-center">Total Kunjungan</th>
                                                    <th class="text-center">Tindakan</th>
                                                    <th class="text-center">Resep</th>
                                                    <th class="text-center">Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">dr. Eta Auria Latiefa</td>
                                                    <td class="text-center">12</td>
                                                    <td class="text-center">11</td>
                                                    <td class="text-center">8</td>
                                                    <td class="text-center">10</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">dr. Farah Putri Novianti</td>
                                                    <td class="text-center">17</td>
                                                    <td class="text-center">17</td>
                                                    <td class="text-center">15</td>
                                                    <td class="text-center">16</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">dr. Ni Wayan Diah Kartinayanti</td>
                                                    <td class="text-center">23</td>
                                                    <td class="text-center">23</td>
                                                    <td class="text-center">20</td>
                                                    <td class="text-center">21</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">dr. Retno Wulandari</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">dr. Rizki Fitria Febriani</td>
                                                    <td class="text-center">15</td>
                                                    <td class="text-center">15</td>
                                                    <td class="text-center">10</td>
                                                    <td class="text-center">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">dr. Syahnaz Yasmine Sissarian</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">4</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">dr. Zulfikar Adi Gumawang</td>
                                                    <td class="text-center">5</td>
                                                    <td class="text-center">5</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">4</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <div class="table-action-bottom py-3 no-gap bg-white">
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
    </section>
</div>
<!-- /.content-wrapper -->


@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
    // show hide filter
    $('.js-filter-btn').click(function() {
        $(this).toggleClass('btn-default');
        $(this).toggleClass('btn-secondary');
        $(this).find('.icon').toggle();
        $('#form-filter').slideToggle('slow');
    });

    // Select All
    $('.table-main th > input[type="checkbox"]').on('click', function() {
      if ($(this).is(':checked')) {
        $('.table-main tbody > tr').addClass('selected');
        $('.table-main tbody > tr > td > input[type="checkbox').prop("checked", true);
      } else {
        $('.table-main tbody > tr').removeClass('selected');
        $('.table-main tbody > tr > td > input[type="checkbox').prop("checked", false);
      }
    });

    // Select Row
    $('.table-main tbody td > input[type="checkbox"]').on('click', function() {
      if ($(this).is(':checked')) {
        $(this).parent().parent().addClass('selected');
      } else {
        $(this).parent().parent().removeClass('selected');
      }
    });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
