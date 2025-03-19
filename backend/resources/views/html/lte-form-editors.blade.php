<?php 
$pageTitle = 'Text Editors';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

<!-- summernote -->
<link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="./plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="./plugins/codemirror/theme/monokai.css">
<!-- SimpleMDE -->
<link rel="stylesheet" href="./plugins/simplemde/simplemde.min.css">

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
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Summernote
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <textarea id="summernote">
              Place <em>some</em> <u>text</u> <strong>here</strong>
            </textarea>
          </div>
          <div class="card-footer">
            Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              CodeMirror
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <textarea id="codeMirrorDemo" class="p-3">
              <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Bookmarks</span>
                  <span class="info-box-number">41,410</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                </div>
              </div>
            </textarea>
          </div>
          <div class="card-footer">
            Visit <a href="https://codemirror.net/">CodeMirror</a> documentation for more examples and information about the plugin.
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
  
@include("html._footer-start")

<!-- Summernote -->
<script src={{url("./plugins/summernote/summernote-bs4.min.js")}}></script>
<!-- CodeMirror -->
<script src={{url("./plugins/codemirror/codemirror.js")}}></script>
<script src={{url("./plugins/codemirror/mode/css/css.js")}}></script>
<script src={{url("./plugins/codemirror/mode/xml/xml.js")}}></script>
<script src={{url("./plugins/codemirror/mode/htmlmixed/htmlmixed.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

@include("html._footer-end")
