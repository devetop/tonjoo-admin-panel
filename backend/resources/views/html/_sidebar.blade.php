<!-- Main Sidebar Container -->
<?php $sidebarColor = ( !empty( $_COOKIE['sidebarColor'] ) ) ? $_COOKIE['sidebarColor'] : 'sidebar-dark-primary' ;?>
<aside class="main-sidebar <?php echo $sidebarColor; ?> elevation-4">
    <!-- Brand Logo -->
    <a href={{url("/html/index")}} class="brand-link">
        <!-- Catatan: class .brand-color memiliki efek merubah warna logo jadi putih jika sidebar memiliki class .sidebar-dark-primary -->

        <img src={{@url("assets/backend/dist/img/logo-backend.png")}} alt="Amanah Tonjoo Admin Panel Logo" class="brand-image brand-large brand-color">
        <img src={{@url("assets/backend/dist/img/logo-backend-b.png")}} alt="Amanah Tonjoo Admin Panel Logo" class="brand-image brand-small brand-color">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-5">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-collapse-hide-child text-sm" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">AMANAH ELEMENTS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-gauge"></i>
                        <p> Amanah Dashboard <i class="right ph ph-caret-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/am-dashboard-1")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Dashboard 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/am-dashboard-2")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Dashboard 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/am-dashboard-3")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Dashboard 3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-note-pencil"></i>
                        <p> Form <i class="right ph ph-caret-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Form Master <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-basic-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Basic [Edit]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-basic-view")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Basic [View]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-pivot-basic-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Pivot Basic [Edit]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-pivot-basic-view")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Pivot Basic [View]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-pivot-complex-add")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Pivot Kompleks [Add]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-pivot-complex-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Pivot Kompleks [Edit]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-pivot-complex-add-data")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Pivot Kompleks [Add Data]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-master-pivot-complex-view")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Pivot Kompleks [View]</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Pivot Kompleks Vue</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Form Sample <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-sample-form-sederhana-1")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Form Sederhana I</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-sample-form-sederhana-2")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Form Sederhana II</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-sample-transaction-form-1")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Form Transaksi I</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-form-sample-transaction-form-2")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Form Transaksi II</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-table"></i>
                        <p> Table <i class="right ph ph-caret-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Table Master <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-master")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Master Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-pivot-complex")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Pivot Complex</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Table Sample <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-1")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Full Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-2")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Full Page v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-alternatif")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Alternatif</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-slide-filter")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Slide Search Filter</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-max1000")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Width 1000px</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-max1200")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Width 1200px</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-table-sample-list-product")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table List Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-chart-line"></i>
                        <p> Report <i class="right ph ph-caret-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Report Master <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-report-master-detail")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Report Detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-report-master-rekap")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Table Report Rekap</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Report Sample <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-report-sample-stock")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Report Stock</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-report-sample-proyek")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Report Proyek</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-report-sample-pegawai")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Report Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-report-sample-dokter")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Report Dokter</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-report-sample-wavepicking-list")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Wavepicking List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-repeat"></i>
                        <p> Repeater <i class="right ph ph-caret-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/am-repeater")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Repeater</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>jQuery <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-jquery-simple-new")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Simple - New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-jquery-simple-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Simple - Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-jquery-simple-event-new")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater Simple Event - New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-jquery-simple-event-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater Simple Event - Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-jquery-nested-new")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater dalam repeater dan Select2 - New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-jquery-nested-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater dalam repeater dan Select2 - Edit</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Vue JS <i class="right ph ph-caret-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-vue-simple-new")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater Simple - New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-vue-simple-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater Simple - Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-vue-kompleks-new")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater Kompleks - New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/am-repeater-vue-kompleks-edit")}} class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Repeater Kompleks - Edit</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">ADMINLTE ELEMENTS</li>
                <li class="nav-item"> <!--.menu-open-->
                    <a href="#" class="nav-link"> <!--.active-->
                        <i class="nav-icon ph ph-gauge"></i>
                        <p> Dashboard <i class="right ph ph-caret-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/./index")}} class="nav-link"> <!--.active-->
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/./index2")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/./index3")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href={{url("/html/lte-page-widgets")}} class="nav-link">
                        <i class="nav-icon ph ph-squares-four"></i>
                        <p> Widgets <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-copy"></i>
                        <p> Layout Options <small>(HTML)</small> <i class="ph ph-caret-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Fixed Sidebar <small>+ Custom Area</small>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-footer.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-chart-pie-slice"></i>
                        <p> Charts <i class="right ph ph-caret-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/lte-charts-chartjs")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-charts-flot")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-charts-inline")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-charts-uplot")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-tree"></i>
                        <p> UI Elements <i class="ph ph-caret-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-general")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-icons")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-buttons")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-sliders")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-modals")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-navbar")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-timeline")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-ribbons")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-ui-am-alerts")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Amanah Alerts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-note-pencil"></i>
                        <p> Forms <i class="ph ph-caret-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/lte-form-general")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-form-advanced")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-form-editors")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-form-validation")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Validation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-table"></i>
                        <p> Tables <i class="ph ph-caret-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/lte-tables-simple-tables")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-tables-datatables")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-tables-jsgrid")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href={{url("/html/lte-page-calendar")}} class="nav-link">
                        <i class="nav-icon ph ph-calendar"></i>
                        <p> Calendar <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{url("/html/lte-page-gallery")}} class="nav-link">
                        <i class="nav-icon ph ph-image"></i>
                        <p> Gallery </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{url("/html/lte-page-kanban")}} class="nav-link">
                        <i class="nav-icon ph ph-square-split-horizontal"></i>
                        <p> Kanban Board </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-envelope"></i>
                        <p> Mailbox <i class="ph ph-caret-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/lte-mailbox-inbox")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-mailbox-compose")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-mailbox-read")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-book"></i>
                        <p> Pages <i class="ph ph-caret-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-invoice")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-profile")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-e-commerce")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-projects")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-project-add")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-project-edit")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-project-detail")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-contacts")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-faq")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-page-contact-us")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-plus-square"></i>
                        <p> Extras <i class="ph ph-caret-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p> Login & Register v1 <i class="ph ph-caret-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-login")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-register")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-forgot-password")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-recovery-password")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Recover Password v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p> Login & Register v2 <i class="ph ph-caret-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-login-v2")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Login v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-register-v2")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Register v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-forgot-password-v2")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Forgot Password v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{url("/html/lte-example-extra-recovery-password-v2")}} class="nav-link">
                                        <i class="ph ph-circle nav-icon"></i>
                                        <p>Recover Password v2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-lockscreen")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-legacy-user-menu")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-language-menu")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-404")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-500")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-pace")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-blank")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-example-extra-starter")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-magnifying-glass"></i>
                        <p> Search <i class="ph ph-caret-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{url("/html/lte-search-simple")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{url("/html/lte-search-enhanced")}} class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Enhanced</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="iframe.html" class="nav-link">
                        <i class="nav-icon ph-fill ph-dots-three-outline"></i>
                        <p>Tabbed IFrame Plugin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                        <i class="nav-icon ph ph-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="ph-fill ph-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph-fill ph-circle"></i>
                        <p> Level 1 <i class="right ph ph-caret-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p> Level 2 <i class="right ph ph-caret-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="ph ph-arrow-right nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph ph-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="ph-fill ph-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ph ph-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
