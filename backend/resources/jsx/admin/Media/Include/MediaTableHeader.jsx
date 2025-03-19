function SearchBar({ search, setSearch, filterHandler }) {

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

export default function MediaTableHeader({ search, setSearch, filterHandler }) {
    return (
        <>
            <div className="row align-items-center mb-3">
                <div className="col-sm-12">
                    <div className="row row-action separator justify-content-end align-items-center">
                        <div className="col-auto column-button mb-2"></div>
                        <div className="col-auto column-search">
                            <SearchBar
                                search={search}
                                setSearch={setSearch}
                                filterHandler={filterHandler}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
