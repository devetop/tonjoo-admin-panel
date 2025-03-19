import SearchBar from '../../../../_component/SearchBar';

export default function RoleTabeHeader({ search, setSearch, filterHandler }) {
    return (
        <div className="row row-action separator justify-content-end align-items-center mb-3">
            <div className="col-auto column-search">
                <SearchBar
                    search={search}
                    setSearch={setSearch}
                    filterHandler={filterHandler}
                />
            </div>
        </div>
    )
}