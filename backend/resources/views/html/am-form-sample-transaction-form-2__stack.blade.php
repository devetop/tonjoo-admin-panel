<a href="#" class="btn btn-primary btn-sm">Add New Stock Taking</a>

<div class="row mt-2 mb-3">
    <div class="col-12 col-lg-9">
        
        <div class="list-status">
            <ul>
                <li class="active">
                    <a href="#">All</a>
                </li>
                <li>
                    <a href="#">Draft</a>
                </li>
                <li>
                    <a href="#">Waiting Approval</a>
                </li>
                <li>
                    <a href="#">Applied</a>
                </li>
            </ul>
        </div>
        
    </div>
    <div class="col-12 col-lg-3">

        <form action="">
            <div class="d-flex">
                <input name="search" value="" type="search" class="form-control form-control-sm" placeholder="Search...">
                <button class="btn btn-default btn-sm ml-2"><i class="ph ph-magnifying-glass"></i></button>
            </div>
        </form>

    </div>
</div>

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
                <th>Stock Taking No</th>
                <th>Date</th>
                <th>Qty Total</th>
                <th>Uom</th>
                <th>Bin</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i<5; $i++) { ?>
                <tr>
                    <td><a href="#">PLLT-002</a></td>
                    <td>12 Mei 2019</td>
                    <td>20</td>
                    <td>Pcs</td>
                    <td>WH01-01</td>
                    <td>Applied</td>
                </tr>
                <tr>
                    <td><a href="#">PLLT-001</a></td>
                    <td>12 Mei 2019</td>
                    <td>20</td>
                    <td>Pcs</td>
                    <td>WH01-01</td>
                    <td>Applied</td>
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