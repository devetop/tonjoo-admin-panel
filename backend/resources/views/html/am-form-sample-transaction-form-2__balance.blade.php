<div class="row mt-2 mb-3">
    <div class="col-12 col-lg-7">
        
        <div class="list-status">
            <ul>
                <li class="active">
                    <a href="#">All</a>
                </li>
                <li>
                    <a href="#">Draft</a>
                </li>
                <li>
                    <a href="#">Verified</a>
                </li>
                <li>
                    <a href="#">Pending</a>
                </li>
            </ul>
        </div>
        
    </div>
    <div class="col-12 col-lg-5">

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
                            <label class="control-label mr-3 mb-0">Serial Number</label>
                            <div class="input-wrap">
                                <select name="" class="form-control form-control-sm">
                                    <option value="">Select Serial Number</option>
                                    <option value="0">SKU-001</option>
                                    <option value="1">SKU-002</option>
                                    <option value="0">SKU-003</option>
                                    <option value="1">SKU-004</option>
                                    <option value="0">SKU-005</option>
                                    <option value="1">SKU-006</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row grid-filter-data">
                    <div class="col-12 col-md-3">
                        <div class="filter-data-list">
                            <div class="filter-data-list__header">
                                <a href="#" class="clear js-clear-all" title="Clear All">
                                    <i class="ph ph-trash"></i>
                                </a> Pegawai
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
                    <div class="col-12 col-md-3">
                        <div class="filter-data-list">
                            <div class="filter-data-list__header">
                                <a href="#" class="clear js-clear-all" title="Clear All">
                                    <i class="ph ph-trash"></i>
                                </a> Divisi
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

<div class="table-action-top no-gap">
    <div class="row align-items-center flex-wrap">
        <div class="col-auto d-flex align-items-center">
            <div class="action bulk-action d-flex align-items-center mr-2">
                <select name="apply" class="form-control form-control-sm">
                    <option disabled="" selected>Option</option>
                    <option value="trash">Move to Trash</option>
                </select>
                <input name="bapply" type="submit" class="btn btn-sm btn-default ml-2" value="Terapkan">
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

<div class="table-responsive no-gap w-auto">
    <table cellspacing="0" class="table table-compact table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main" width="100%">
        <thead>
            <tr>
                <th>SKU</th>
                <th>Serial Number</th>
                <th>Qty Inbound</th>
                <th>Qty Stock Taking</th>
                <th>Balance</th>
                <th>Uom</th>
                <td>Bin</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i<5; $i++) { ?>
                <tr>
                  <td><a href="#">SKU-002</a></td>
                  <td></td>
                  <td>20</td>
                  <td>10</td>
                  <td>-10</td>
                  <td>Pcs</td>
                  <td>WH01-01</td>
                  <td>Kurang dari inbound</td>
                </tr>
                <tr>
                  <td><a href="#">SKU-001</a></td>
                  <td></td>
                  <td>25</td>
                  <td>15</td>
                  <td>0</td>
                  <td>Pcs</td>
                  <td>WH01-01</td>
                  <td>Verified</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="table-action-bottom no-gap">
    <div class="row align-items-center">
        <div class="col-auto">
            <div class="action bulk-action d-flex">
                <select name="apply" class="form-control form-control-sm">
                    <option disabled="" selected="">Option</option>
                    <option value="trash">Move to Trash</option>
                </select>
                <input name="bapply" type="submit" class="btn btn-sm btn-default ml-2" value="Terapkan">
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