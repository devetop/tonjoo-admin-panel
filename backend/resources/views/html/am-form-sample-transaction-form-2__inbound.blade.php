<div class="row">
    <div class="col-12 col-lg-9">
        
        <div class="row align-items-end">

            <div class="col-md-3">
                <div class="form-group form-group--table">
                    <div class="col-form-input">
                        <div class="input-wrap">
                            <select class="form-control form-control-sm js-select2"
                                data-allow-clear="true"
                                data-placeholder="Select SKU">
                                <option selected="selected" value="">Select SKU</option>
                                <option value="2">SKU-001</option>
                                <option value="6">SKU-001</option>
                                <option value="7">SKU-001</option>
                                <option value="8">SKU-001</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group form-group--table">
                    <div class="col-form-input">
                        <div class="input-wrap">
                            <select class="form-control form-control-sm js-select2"
                                data-allow-clear="true"
                                data-placeholder="Select Serial Number">
                                <option selected="selected" value="">Select Serial Number</option>
                                <option value="2">SN-001</option>
                                <option value="6">SN-001</option>
                                <option value="7">SN-001</option>
                                <option value="8">SN-001</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group form-group--table">
                    <div class="col-form-input">
                        <div class="input-wrap">
                            <input class="form-control form-control-sm" type="number" placeholder="Quantity" value="IBD-001">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group--table">
                    <div class="col-form-input mt-1">
                        <button type="button" class="btn btn-sm btn-primary">
                            <i class="ph ph-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>

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
                <th class="no-sort check-column" width="20">
                    <div class="text-center">
                    <input type="checkbox">
                    </div>
                </th>
                <th>SKU</th>
                <th>Serial Number</th>
                <th>Quantity</th>
                <th>Uom</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i<5; $i++) { ?>
            <tr>
                <td class="check-column">
                    <div class="text-center">
                    <input name="id_list[]" type="checkbox" value="11">
                    </div>
                </td>
                <td>SKU-002</td>
                <td></td>
                <td>20</td>
                <td>Pcs</td>
                <td class="text-center">
                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-trash"></i></a>
                </td>
            </tr>
            <tr>
                <td class="check-column">
                    <div class="text-center">
                    <input name="id_list[]" type="checkbox" value="11">
                    </div>
                </td>
                <td>SKU-001</td>
                <td></td>
                <td>20</td>
                <td>Pcs</td>
                <td class="text-center">
                    <a href="#" class="btn btn-xs btn-link"><i class="ph ph-trash"></i></a>
                </td>
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