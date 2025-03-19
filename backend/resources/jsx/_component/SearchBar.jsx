export default function SearchBar({search, setSearch, filterHandler}) {
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
  