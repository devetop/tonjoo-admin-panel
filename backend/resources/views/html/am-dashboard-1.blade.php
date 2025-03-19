<?php 
$pageTitle = 'Dashboard Monitor';
$breadcrumbs = array(
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
            <div class="row">

                <div class="col-12 col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0">Uptime Monitor</h5>
                        </div>
                        <div class="card-body">

                            <p>Down: 2 <a href="#">View All</a></p>
                            
                            <div class="table-responsive px-0 no-gap no-gap-bottom">
                                <table class="table table-bordered table-head-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Monitor Name</th>
                                            <th>Group</th>
                                            <th>Last check</th>
                                            <th>Failure reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>www.guegensy.com</td>
                                            <td>hipwee</td>
                                            <td>2023-06-28 08:55:12</td>
                                            <td> 
                                            cURL error 60: SSL: no alternative certificate subject name matches target host name 'www.guegensy.c... 
                                            <button class="btn btn-xs btn-default excerpt">
                                                <i class="ph ph-dots-three"></i>
                                            </button>
                                            <div style="display: none;" class="error-full-text">cURL error 60: SSL: no alternative certificate subject name matches target host name 'www.guegensy.com' (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://www.guegensy.com/</div>
                                            </td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>astra-md-dev.tongkolspace.com</td>
                                            <td>client</td>
                                            <td>2023-06-28 08:55:04</td>
                                            <td> cURL error 60: SSL certificate problem: certificate has expired (see https://curl.haxx.se/libcurl/c/... 
                                            <button class="btn btn-xs btn-default excerpt">
                                                <i class="ph ph-dots-three"></i>
                                            </button>
                                            <div style="display: none;" class="error-full-text">cURL error 60: SSL certificate problem: certificate has expired (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://astra-md-dev.tongkolspace.com/</div>
                                            </td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0">Certificate Monitor</h5>
                        </div>
                        <div class="card-body">

                            <p>Down: 3 <a href="#">View All</a></p>
                            
                            <div class="table-responsive px-0 no-gap no-gap-bottom">
                                <table class="table table-bordered table-head-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Monitor Name</th>
                                            <th>Group</th>
                                            <th>Last check</th>
                                            <th>Failure reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>www.guegensy.com</td>
                                            <td>hipwee</td>
                                            <td>2023-06-28 00:00:34</td>
                                            <td> Could not download certificate for host `www.guegensy.com` because Could not connect to `www.guegens... <button class="btn btn-xs btn-default excerpt">
                                                <i class="ph ph-dots-three"></i>
                                            </button>
                                            <div style="display: none;" class="error-full-text">Could not download certificate for host `www.guegensy.com` because Could not connect to `www.guegensy.com`.</div>
                                            </td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>https://amanah.tonjoo.com:4443</td>
                                            <td>internal</td>
                                            <td>2023-06-28 00:00:30</td>
                                            <td> Could not download certificate for host `amanah.tonjoo.com` because Could not connect to `amanah.ton... <button class="btn btn-xs btn-default excerpt">
                                                <i class="ph ph-dots-three"></i>
                                            </button>
                                            <div style="display: none;" class="error-full-text">Could not download certificate for host `amanah.tonjoo.com` because Could not connect to `amanah.tonjoo.com`.</div>
                                            </td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>astra-md-dev.tongkolspace.com</td>
                                            <td>client</td>
                                            <td>2023-06-28 00:00:30</td>
                                            <td> Could not download certificate for host `astra-md-dev.tongkolspace.com` because Could not connect to... <button class="btn btn-xs btn-default excerpt">
                                                <i class="ph ph-dots-three"></i>
                                            </button>
                                            <div style="display: none;" class="error-full-text">Could not download certificate for host `astra-md-dev.tongkolspace.com` because Could not connect to `astra-md-dev.tongkolspace.com`.</div>
                                            </td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0">Keyword Monitor</h5>
                        </div>
                        <div class="card-body">

                            <p>Down: 0 <a href="#">View All</a></p>
                            
                            <div class="table-responsive px-0 no-gap no-gap-bottom">
                                <table class="table table-bordered table-head-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Monitor Name</th>
                                            <th>Group</th>
                                            <th>Last check</th>
                                            <th>Failure reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td colspan="5" class="text-center">Data kosong</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title float-none m-0">Domain Monitor</h5>
                            <p class="mb-0" style="--text-small-color: var(--dark-text);"><small>(Expired or will expire within 10 days or less)</small></p>
                        </div>
                        <div class="card-body">

                            <p>Down: 0 <a href="#">View All</a></p>
                            
                            <div class="table-responsive px-0 no-gap no-gap-bottom">
                                <table class="table table-bordered table-head-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Monitor Name</th>
                                            <th>Group</th>
                                            <th>Expiration date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>utu.futureskills.id</td>
                                            <td>client</td>
                                            <td>30 Jun 2023</td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>upb.futureskills.id</td>
                                            <td>client</td>
                                            <td>30 Jun 2023</td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>executivebusinessschool.id</td>
                                            <td>client</td>
                                            <td>30 Jun 2023</td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>haircare.erhaultimate.co.id</td>
                                            <td>client</td>
                                            <td>20 Apr 2023</td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>stbmdsbitung.futureskills.id</td>
                                            <td>client</td>
                                            <td>30 Jun 2023</td>
                                            <td class="text-center text-red">
                                            <i class="fa-lg ph ph-x" style="font-weight: 700;"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
