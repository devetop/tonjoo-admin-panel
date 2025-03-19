import { useState } from "react";
import { Link } from "@inertiajs/react";
import classNames from "classnames";
import SelectInput from "../../../_component/SelectInput";
import SearchBar from "../../../_component/SearchBar";

function FilterBox({params, filterHandler, filters}) {

  const [_filter, _setFilter] = useState({
    author: params.author || '',
    tag: params.tag || '',
    category: params.category || '',
  })

  const filterAttempt = () => {
    filterHandler(_filter)
  }

  const getFilter = (type) => {
    return [
      {
        value: '',
        text: `All ${type}`
      },
      ...filters[type].map(f => ({
        value: f,
        text: f,
      }))
    ]
  }

  return (
    <div className="card card-filter shadow-none border bg-gray-light">
      <div className="card-body">
        <div className="filter-data-wrapper">
          <div className="row grid-filter-data">
            <div className="col-12 col-md-3">
              <div className="form-group mb-10">
                <SelectInput
                  showChooseOption={false}
                  label="Author"
                  name="author"
                  value={_filter.author}
                  onChangeHandler={(e) => _setFilter({..._filter, author: e.target.value})}
                  options={getFilter('authors')}
                />
              </div>
            </div>
            <div className="col-12 col-md-3">
              <div className="form-group mb-10">
                <SelectInput
                  showChooseOption={false}
                  label="Tag"
                  name="tag"
                  value={_filter.tag}
                  onChangeHandler={(e) => _setFilter({..._filter, tag: e.target.value})}
                  options={getFilter('tags')}
                />
              </div>
            </div>
            <div className="col-12 col-md-3">
              <div className="form-group mb-10">
                <SelectInput
                  showChooseOption={false}
                  label="Category"
                  name="category"
                  value={_filter.category}
                  onChangeHandler={(e) => _setFilter({..._filter, category: e.target.value})}
                  options={getFilter('categories')}
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div className="card-footer bg-gray-light text-right border-top">
        <button
          type="button"
          className="btn btn-primary btn-sm filter-attempt-btn"
          onClick={filterAttempt}
        >
          <i className="fa fa-filter" /> <span>Filter</span>
        </button>
      </div>
    </div>
  );
}

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

function Dropdown({ title }) {
  return (
    <div className="btn-group mr-3">
      <button
        type="button"
        className="btn btn-sm btn-default dropdown-toggle btn-dropdown"
        data-toggle="dropdown"
      >
        {title}
      </button>
      <div
        className="dropdown-menu dropdown-menu-right"
        role="menu"
        style={{ top: 0 }}
      >
        <a className="dropdown-item" href="#">
          Export All
        </a>
        <a className="dropdown-item" href="#">
          Export Page
        </a>
      </div>
    </div>
  );
}

export default function PostsTableHeader({params, search, setSearch, filters, filterHandler, clearFilterHandler, isFilterClearable}) {
  return (
    <>
      <div className="row align-items-center mb-3">
        <div className="col-sm-12 col-md-3">
          <FilterStatus 
            params={params} 
            filterHandler={filterHandler}
          />
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

      {
        (filters?.length) && (
          <form id="form-filter" style={{ display: "none" }}>
            <FilterBox
              params={params} 
              filterHandler={filterHandler}
              filters={filters}
            />
          </form>
        )
      }
    </>
  );
}
