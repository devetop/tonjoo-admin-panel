<?php 
$pageTitle = 'Mail Compose';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>


@include("html._head-start")

<!-- BEGIN: Insert additional plugin css -->

<!-- summernote -->
<link rel="stylesheet" href="/dist/plugins/summernote/summernote-bs4.min.css">

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Back to Inbox</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Folders</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-inbox"></i> Inbox <span class="badge bg-primary float-right">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-envelope"></i> Sent </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file-alt"></i> Drafts </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-filter"></i> Junk <span class="badge bg-warning float-right">65</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-trash-alt"></i> Trash </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Labels</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="far fa-circle text-danger"></i> Important </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="far fa-circle text-warning"></i> Promotions </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="far fa-circle text-primary"></i> Social </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Compose New Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" placeholder="To:">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" style="height: 300px">
                                            <h1>
                                                <u>Heading Of Message</u>
                                            </h1>
                                            <h4>Subheading</h4>
                                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                            was born and I will give you a complete account of the system, and expound the actual teachings
                            of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                            dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                            how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                            is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                            but because occasionally circumstances occur in which toil and pain can procure him some great
                            pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                            except to obtain some advantage from it? But who has any right to find fault with a man who
                            chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                            produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                            dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                            blinded by desire, that they cannot foresee</p>
                                            <ul>
                                                <li>List item one</li>
                                                <li>List item two</li>
                                                <li>List item three</li>
                                                <li>List item four</li>
                                            </ul>
                                            <p>Thank you,</p>
                                            <p>John Doe</p>
                                        </textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i> Attachment <input type="file" name="attachment">
                                </div>
                                <p class="help-block">Max. 32MB</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-default">
                                    <i class="fas fa-pencil-alt"></i> Draft </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="far fa-envelope"></i> Send </button>
                            </div>
                            <button type="reset" class="btn btn-default">
                                <i class="fas fa-times"></i> Discard </button>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<!-- Summernote -->
<script src={{url("dist/plugins/summernote/summernote-bs4.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>
    $(function () {
        //Add text editor
        $('#compose-textarea').summernote()
    })
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
