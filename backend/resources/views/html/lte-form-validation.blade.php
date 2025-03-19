<?php 
$pageTitle = 'Validation';
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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include("html._footer-start")

<!-- jquery-validation -->
<script src={{url("./plugins/jquery-validation/jquery.validate.min.js")}}></script>
<script src={{url("./plugins/jquery-validation/additional-methods.min.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@include("html._footer-end")