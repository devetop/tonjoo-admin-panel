function SearchBar({search, setSearch, filterHandler}) {

  return (
    <div className="d-flex">
      <input
        name="search"
        value={search}
        type="search"
        onChange={(e) => setSearch(e.target.value)}
        className="form-control form-control-sm"
        placeholder="Search..."
        onKeyDown={(e) => e.key === "Enter" && filterHandler({ search })}
      />
      <button
        className="btn btn-sm btn-default ml-2"
        onClick={() => filterHandler({ search })}
      >
        <i className="ph ph-magnifying-glass" />
      </button>
    </div>
  );
}

function FilterBox() {
  return (
    <div className="card card-filter shadow-none border bg-gray-light">
      <div className="card-body">
        <div className="filter-data-wrapper">
          <div className="row grid-filter-data">
            <div className="col-12 col-md-3"></div>
          </div>
        </div>
      </div>
      <div className="card-footer bg-gray-light text-right border-top">
        <button
          type="button"
          className="btn btn-primary btn-sm filter-attempt-btn"
        >
          <i className="fa fa-filter" /> <span>Filter</span>
        </button>
      </div>
    </div>
  )
}

export default function TaxonomyTableHeader({search, setSearch, filterHandler}) {
  return (
    <>
      <div className="row align-items-center mb-3">
        <div className="col-sm-12 col-md-3"></div>
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
            </div>
          </div>
        </div>
      </div>

      <form id="form-filter" style={{ display: "none" }}>
        <FilterBox />
      </form>
    </>
  );
}
