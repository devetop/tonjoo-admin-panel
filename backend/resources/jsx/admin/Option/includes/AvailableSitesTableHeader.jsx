import { useState } from "react";
import { Link } from "@inertiajs/react";
import classNames from "classnames";
import SelectInput from "../../../_component/SelectInput";
import SearchBar from "../../../_component/SearchBar";


function FilterStatus({params, filterHandler}) {

  return (
    <div className="list-status">
      <ul>
        <li
          className={classNames({ active: params.status == "all" })}
          onClick={() => filterHandler({ status: "all" })}
        >
          <Link>All</Link>
        </li>
        <li
          className={classNames({ active: params.status == "publish" })}
          onClick={() => filterHandler({ status: "publish" })}
        >
          <Link>Publish</Link>
        </li>
        <li
          className={classNames({ active: params.status == "draft" })}
          onClick={() => filterHandler({ status: "draft" })}
        >
          <Link>Draft</Link>
        </li>
      </ul>
    </div>
  );
}

export default function AvailableSitesTableHeader({search, setSearch, filterHandler, clearFilterHandler, isFilterClearable}) {
  return (
    <>
      <div className="row align-items-center mb-3">
        <div className="col-sm-12 col-md-3">
          {/* <FilterStatus 
            params={params} 
            filterHandler={filterHandler}
          /> */}
        </div>
        <div className="col-sm-12 col-md-9">
          <div className="row row-action separator justify-content-end align-items-center">
            <div className="col-auto column-button mb-2"></div>
            <div className="col-auto column-search">
              <SearchBar
                search={search}
                setSearch={setSearch}
                filterHandler={filterHandler}
              />
            </div>
            <div className="col-auto column-filter">
              <button className="btn btn-sm btn-default js-filter-btn">
                <i className="icon ph ph-funnel" />
                <i className="icon ph ph-x" style={{ display: "none" }} />
              </button>

              {
                isFilterClearable && (
                  <button 
                    className="btn btn-sm btn-default ml-2"
                    onClick={clearFilterHandler}
                  >
                    <i className="icon ph ph-arrow-counter-clockwise" />
                  </button>
                )
              }
            </div>
          </div>
        </div>
      </div>

      <form id="form-filter" style={{ display: "none" }}>

      </form>
    </>
  );
}
