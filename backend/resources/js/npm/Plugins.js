'use strict'

const Plugins = [
    // jQuery
    {
        from: 'node_modules/jquery/dist/jquery.min.js',
        to: 'public/assets/backend/plugins/jquery/jquery.min.js'
    },
    // Popper
    {
        from: 'node_modules/popper.js/dist',
        to: 'public/assets/backend/plugins/popper'
    },
    // Bootstrap
    {
        from: 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        to: 'public/assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js'
    },
    // Font Awesome
    {
        from: 'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
        to: 'public/assets/backend/plugins/fontawesome-free/css/all.min.css'
    },
    {
        from: 'node_modules/@fortawesome/fontawesome-free/webfonts',
        to: 'public/assets/backend/plugins/fontawesome-free/webfonts'
    },
    // overlayScrollbars
    {
        from: 'node_modules/overlayscrollbars/js/jquery.overlayScrollbars.min.js',
        to: 'public/assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'
    },
    {
        from: 'node_modules/overlayscrollbars/css/OverlayScrollbars.min.css',
        to: 'public/assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'
    },
    // Chart.js
    {
        from: 'node_modules/chart.js/dist/',
        to: 'public/assets/backend/plugins/chart.js'
    },
    // jQuery UI
    {
        from: 'node_modules/jquery-ui-dist/jquery-ui.min.js',
        to: 'public/assets/backend/plugins/jquery-ui/jquery-ui.min.js'
    },
    // Flot
    {
        from: 'node_modules/flot/dist/es5/',
        to: 'public/assets/backend/plugins/flot'
    },
    {
        from: 'node_modules/flot/source/',
        to: 'public/assets/backend/plugins/flot/plugins'
    },
    // Summernote
    {
        from: 'node_modules/summernote/dist/summernote-bs4.min.css',
        to: 'public/assets/backend/plugins/summernote/summernote-bs4.min.css'
    },
    // Bootstrap Slider
    {
        from: 'node_modules/bootstrap-slider/dist/',
        to: 'public/assets/backend/plugins/bootstrap-slider'
    },
    {
        from: 'node_modules/bootstrap-slider/dist/css',
        to: 'public/assets/backend/plugins/bootstrap-slider/css'
    },
    // Bootstrap Colorpicker
    {
        from: 'node_modules/bootstrap-colorpicker/dist/js',
        to: 'public/assets/backend/plugins/bootstrap-colorpicker/js'
    },
    {
        from: 'node_modules/bootstrap-colorpicker/dist/css',
        to: 'public/assets/backend/plugins/bootstrap-colorpicker/css'
    },
    // Tempusdominus Bootstrap 4
    {
        from: 'node_modules/tempusdominus-bootstrap-4/build/js',
        to: 'public/assets/backend/plugins/tempusdominus-bootstrap-4/js'
    },
    {
        from: 'node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css',
        to: 'public/assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'
    },
    // Moment
    {
        from: 'node_modules/moment/min',
        to: 'public/assets/backend/plugins/moment'
    },
    {
        from: 'node_modules/moment/locale',
        to: 'public/assets/backend/plugins/moment/locale'
    },
    // FastClick
    {
        from: 'node_modules/fastclick/lib',
        to: 'public/assets/backend/plugins/fastclick'
    },
    // Date Range Picker
    {
        from: 'node_modules/daterangepicker/daterangepicker.css',
        to: 'public/assets/backend/plugins/daterangepicker'
    },
    // DataTables
    {
        from: 'node_modules/pdfmake/build',
        to: 'public/assets/backend/plugins/pdfmake'
    },
    {
        from: 'node_modules/jszip/dist',
        to: 'public/assets/backend/plugins/jszip'
    },
    {
        from: 'node_modules/datatables.net/js',
        to: 'public/assets/backend/plugins/datatables'
    },
    {
        from: 'node_modules/datatables.net-bs4/js',
        to: 'public/assets/backend/plugins/datatables-bs4/js'
    },
    {
        from: 'node_modules/datatables.net-bs4/css',
        to: 'public/assets/backend/plugins/datatables-bs4/css'
    },
    {
        from: 'node_modules/datatables.net-autofill/js',
        to: 'public/assets/backend/plugins/datatables-autofill/js'
    },
    {
        from: 'node_modules/datatables.net-autofill-bs4/js',
        to: 'public/assets/backend/plugins/datatables-autofill/js'
    },
    {
        from: 'node_modules/datatables.net-autofill-bs4/css',
        to: 'public/assets/backend/plugins/datatables-autofill/css'
    },
    {
        from: 'node_modules/datatables.net-buttons/js',
        to: 'public/assets/backend/plugins/datatables-buttons/js'
    },
    {
        from: 'node_modules/datatables.net-buttons-bs4/js',
        to: 'public/assets/backend/plugins/datatables-buttons/js'
    },
    {
        from: 'node_modules/datatables.net-buttons-bs4/css',
        to: 'public/assets/backend/plugins/datatables-buttons/css'
    },
    {
        from: 'node_modules/datatables.net-colreorder/js',
        to: 'public/assets/backend/plugins/datatables-colreorder/js'
    },
    {
        from: 'node_modules/datatables.net-colreorder-bs4/js',
        to: 'public/assets/backend/plugins/datatables-colreorder/js'
    },
    {
        from: 'node_modules/datatables.net-colreorder-bs4/css',
        to: 'public/assets/backend/plugins/datatables-colreorder/css'
    },
    {
        from: 'node_modules/datatables.net-fixedcolumns/js',
        to: 'public/assets/backend/plugins/datatables-fixedcolumns/js'
    },
    {
        from: 'node_modules/datatables.net-fixedcolumns-bs4/js',
        to: 'public/assets/backend/plugins/datatables-fixedcolumns/js'
    },
    {
        from: 'node_modules/datatables.net-fixedcolumns-bs4/css',
        to: 'public/assets/backend/plugins/datatables-fixedcolumns/css'
    },
    {
        from: 'node_modules/datatables.net-fixedheader/js',
        to: 'public/assets/backend/plugins/datatables-fixedheader/js'
    },
    {
        from: 'node_modules/datatables.net-fixedheader-bs4/js',
        to: 'public/assets/backend/plugins/datatables-fixedheader/js'
    },
    {
        from: 'node_modules/datatables.net-fixedheader-bs4/css',
        to: 'public/assets/backend/plugins/datatables-fixedheader/css'
    },
    {
        from: 'node_modules/datatables.net-keytable/js',
        to: 'public/assets/backend/plugins/datatables-keytable/js'
    },
    {
        from: 'node_modules/datatables.net-keytable-bs4/js',
        to: 'public/assets/backend/plugins/datatables-keytable/js'
    },
    {
        from: 'node_modules/datatables.net-keytable-bs4/css',
        to: 'public/assets/backend/plugins/datatables-keytable/css'
    },
    {
        from: 'node_modules/datatables.net-responsive/js',
        to: 'public/assets/backend/plugins/datatables-responsive/js'
    },
    {
        from: 'node_modules/datatables.net-responsive-bs4/js',
        to: 'public/assets/backend/plugins/datatables-responsive/js'
    },
    {
        from: 'node_modules/datatables.net-responsive-bs4/css',
        to: 'public/assets/backend/plugins/datatables-responsive/css'
    },
    {
        from: 'node_modules/datatables.net-rowgroup/js',
        to: 'public/assets/backend/plugins/datatables-rowgroup/js'
    },
    {
        from: 'node_modules/datatables.net-rowgroup-bs4/js',
        to: 'public/assets/backend/plugins/datatables-rowgroup/js'
    },
    {
        from: 'node_modules/datatables.net-rowgroup-bs4/css',
        to: 'public/assets/backend/plugins/datatables-rowgroup/css'
    },
    {
        from: 'node_modules/datatables.net-rowreorder/js',
        to: 'public/assets/backend/plugins/datatables-rowreorder/js'
    },
    {
        from: 'node_modules/datatables.net-rowreorder-bs4/js',
        to: 'public/assets/backend/plugins/datatables-rowreorder/js'
    },
    {
        from: 'node_modules/datatables.net-rowreorder-bs4/css',
        to: 'public/assets/backend/plugins/datatables-rowreorder/css'
    },
    {
        from: 'node_modules/datatables.net-scroller/js',
        to: 'public/assets/backend/plugins/datatables-scroller/js'
    },
    {
        from: 'node_modules/datatables.net-scroller-bs4/js',
        to: 'public/assets/backend/plugins/datatables-scroller/js'
    },
    {
        from: 'node_modules/datatables.net-scroller-bs4/css',
        to: 'public/assets/backend/plugins/datatables-scroller/css'
    },
    {
        from: 'node_modules/datatables.net-searchbuilder/js',
        to: 'public/assets/backend/plugins/datatables-searchbuilder/js'
    },
    {
        from: 'node_modules/datatables.net-searchbuilder-bs4/js',
        to: 'public/assets/backend/plugins/datatables-searchbuilder/js'
    },
    {
        from: 'node_modules/datatables.net-searchbuilder-bs4/css',
        to: 'public/assets/backend/plugins/datatables-searchbuilder/css'
    },
    {
        from: 'node_modules/datatables.net-searchpanes/js',
        to: 'public/assets/backend/plugins/datatables-searchpanes/js'
    },
    {
        from: 'node_modules/datatables.net-searchpanes-bs4/js',
        to: 'public/assets/backend/plugins/datatables-searchpanes/js'
    },
    {
        from: 'node_modules/datatables.net-searchpanes-bs4/css',
        to: 'public/assets/backend/plugins/datatables-searchpanes/css'
    },
    {
        from: 'node_modules/datatables.net-select/js',
        to: 'public/assets/backend/plugins/datatables-select/js'
    },
    {
        from: 'node_modules/datatables.net-select-bs4/js',
        to: 'public/assets/backend/plugins/datatables-select/js'
    },
    {
        from: 'node_modules/datatables.net-select-bs4/css',
        to: 'public/assets/backend/plugins/datatables-select/css'
    },

    // Fullcalendar
    {
        from: 'node_modules/fullcalendar/',
        to: 'public/assets/backend/plugins/fullcalendar'
    },
    // icheck bootstrap
    {
        from: 'node_modules/icheck-bootstrap/icheck-bootstrap.min.css',
        to: 'public/assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css'
    },
    // inputmask
    {
        from: 'node_modules/inputmask/dist/',
        to: 'public/assets/backend/plugins/inputmask'
    },
    // ion-rangeslider
    {
        from: 'node_modules/ion-rangeslider/',
        to: 'public/assets/backend/plugins/ion-rangeslider'
    },
    // JQVMap (jqvmap-novulnerability)
    {
        from: 'node_modules/jqvmap-novulnerability/dist/jqvmap.min.css',
        to: 'public/assets/backend/plugins/jqvmap/jqvmap.min.css'
    },
    // jQuery Mapael
    {
        from: 'node_modules/jquery-mapael/js/',
        to: 'public/assets/backend/plugins/jquery-mapael'
    },
    // Raphael
    {
        from: 'node_modules/raphael/',
        to: 'public/assets/backend/plugins/raphael'
    },
    // jQuery Mousewheel
    {
        from: 'node_modules/jquery-mousewheel/',
        to: 'public/assets/backend/plugins/jquery-mousewheel'
    },
    // jQuery Knob
    {
        from: 'node_modules/jquery-knob-chif/dist/',
        to: 'public/assets/backend/plugins/jquery-knob'
    },
    // pace-progress
    {
        from: 'node_modules/@lgaitan/pace-progress/dist/',
        to: 'public/assets/backend/plugins/pace-progress'
    },
    // Select2
    {
        from: 'node_modules/select2/dist/',
        to: 'public/assets/backend/plugins/select2'
    },
    {
        from: 'node_modules/@ttskch/select2-bootstrap4-theme/dist/',
        to: 'public/assets/backend/plugins/select2-bootstrap4-theme'
    },
    // Sparklines
    {
        from: 'node_modules/sparklines/source/',
        to: 'public/assets/backend/plugins/sparklines'
    },
    // SweetAlert2
    {
        from: 'node_modules/sweetalert2/dist/sweetalert2.min.js',
        to: 'public/assets/backend/plugins/sweetalert2/sweetalert2.min.js'
    },
    {
        from: 'node_modules/sweetalert2/dist/sweetalert2.min.css',
        to: 'public/assets/backend/plugins/sweetalert2/sweetalert2.min.css'
    },
    {
        from: 'node_modules/@sweetalert2/theme-bootstrap-4/',
        to: 'public/assets/backend/plugins/sweetalert2-theme-bootstrap-4'
    },
    // Toastr
    {
        from: 'node_modules/toastr/build/',
        to: 'public/assets/backend/plugins/toastr'
    },
    // jsGrid
    {
        from: 'node_modules/jsgrid/dist',
        to: 'public/assets/backend/plugins/jsgrid'
    },
    {
        from: 'node_modules/jsgrid/demos/db.js',
        to: 'public/assets/backend/plugins/jsgrid/demos/db.js'
    },
    // flag-icon-css
    {
        from: 'node_modules/flag-icon-css/css',
        to: 'public/assets/backend/plugins/flag-icon-css/css'
    },
    {
        from: 'node_modules/flag-icon-css/flags',
        to: 'public/assets/backend/plugins/flag-icon-css/flags'
    },
    // bootstrap4-duallistbox
    {
        from: 'node_modules/bootstrap4-duallistbox/dist',
        to: 'public/assets/backend/plugins/bootstrap4-duallistbox/'
    },
    // filterizr
    {
        from: 'node_modules/filterizr/dist',
        to: 'public/assets/backend/plugins/filterizr/'
    },
    // ekko-lightbox
    {
        from: 'node_modules/ekko-lightbox/dist',
        to: 'public/assets/backend/plugins/ekko-lightbox/'
    },
    // bootstrap-switch
    {
        from: 'node_modules/bootstrap-switch/dist',
        to: 'public/assets/backend/plugins/bootstrap-switch/'
    },
    // jQuery Validate
    {
        from: 'node_modules/jquery-validation/dist/',
        to: 'public/assets/backend/plugins/jquery-validation'
    },
    // bs-custom-file-input
    {
        from: 'node_modules/bs-custom-file-input/dist/',
        to: 'public/assets/backend/plugins/bs-custom-file-input'
    },
    // bs-stepper
    {
        from: 'node_modules/bs-stepper/dist/',
        to: 'public/assets/backend/plugins/bs-stepper'
    },
    // CodeMirror
    {
        from: 'node_modules/codemirror/lib/',
        to: 'public/assets/backend/plugins/codemirror'
    },
    {
        from: 'node_modules/codemirror/addon/',
        to: 'public/assets/backend/plugins/codemirror/addon'
    },
    {
        from: 'node_modules/codemirror/keymap/',
        to: 'public/assets/backend/plugins/codemirror/keymap'
    },
    {
        from: 'node_modules/codemirror/mode/',
        to: 'public/assets/backend/plugins/codemirror/mode'
    },
    {
        from: 'node_modules/codemirror/theme/',
        to: 'public/assets/backend/plugins/codemirror/theme'
    },
    // dropzonejs
    {
        from: 'node_modules/dropzone/dist/',
        to: 'public/assets/backend/plugins/dropzone'
    },
    // uPlot
    {
        from: 'node_modules/uplot/dist/',
        to: 'public/assets/backend/plugins/uplot'
    },
    // phospor icon
    {
        from: 'resources/plugins/phosphor-icon/',
        to: 'public/assets/backend/plugins/phosphor-icon'
    }
]

module.exports = Plugins
