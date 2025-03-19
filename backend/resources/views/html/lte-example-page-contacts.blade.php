<?php 
$pageTitle = 'Contact';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>


@include("html._head-start")

<!-- BEGIN: Insert additional plugin css -->

<!-- END: Insert additional plugin css -->

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
                    <h1>
                    <?php echo (!empty( $pageTitle )) ? $pageTitle : '' ;?> 
                    </h1>
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
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user1-128x128.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user2-160x160.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user1-128x128.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user2-160x160.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user1-128x128.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user1-128x128.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user1-128x128.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user1-128x128.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0"> Digital Strategist </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>Nicole Pearson</b>
                                        </h2>
                                        <p class="text-muted text-sm">
                                            <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> Phone #: + 800 - 12 12 23 52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src={{@url("assets/backend/dist/img/user2-160x160.jpg")}} alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">5</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">6</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">7</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">8</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
