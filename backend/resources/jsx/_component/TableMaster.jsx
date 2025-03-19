import { Link } from "@inertiajs/react";
import classNames from "classnames";
import { useCallback, useEffect } from "react";

const PageLink = ({ active, disabled, label, url }) => {
  const className = classNames(["page-item"], { active, disabled });
  return (
    <li className={className} style={{ minWidth: 32 }}>
      <Link className="page-link text-center" href={url}>
        <span dangerouslySetInnerHTML={{ __html: label }} />
      </Link>
    </li>
  );
};

const Pagination = ({ paginator, params, filterHandler }) => (
  <div className="table-action-bottom no-gap">
    <div className="row align-items-center">
      <div className="col-auto">
        <div className="show-entries">
          <label>Show</label>
          <select
            className="form-control form-control-sm"
            value={params.perPage}
            onChange={(e) => filterHandler({ perPage: e.target.value })}
          >
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
          </select>
          <label>Entries</label>
        </div>
      </div>
      <div className="col-auto ml-auto">
        <div className="tablenav-pages d-flex align-items-center">
          <span className="displaying-num">
            {"Showing "}
            <span className="font-medium">{paginator.from}</span>
            {" to "}
            <span className="font-medium">{paginator.to}</span>
            {" of "}
            <span className="font-medium">{paginator.total}</span>
            {" results"}
          </span>
          <ul className="pagination pagination-sm ml-3 mb-0">
            {paginator.links.map(({ active, label, url }, i) => {
              return (
                <PageLink
                  key={i}
                  label={label}
                  active={active}
                  disabled={url === null}
                  url={url}
                />
              );
            })}
          </ul>
        </div>
      </div>
    </div>
  </div>
)

export default function TableMaster({ paginator, tableHeader, table, params, filterHandler, showPaginationBeforeTable = false }) {

  const jq = useCallback(() => {
    // untuk aktifkan toggler filter dan dropdown exporter
    $('.filter-attempt-btn').on('click', function () {
      $(".js-filter-btn").toggleClass("btn-default");
      $(".js-filter-btn").toggleClass("btn-secondary");
      $(".js-filter-btn").find(".icon").toggle();
      $("#form-filter").slideToggle("slow");
    })
  
    $(".js-filter-btn").on('click', function () {
      $(this).toggleClass("btn-default");
      $(this).toggleClass("btn-secondary");
      $(this).find(".icon").toggle();
      $("#form-filter").slideToggle("slow");
    });
  
    $(".btn-dropdown").on('click', function () {
      $(this).next().slideToggle();
    });
  })
  const removeJq = useCallback(() => {
    $('.filter-attempt-btn').off('click');
    $('.js-filter-btn').off('click');
    $('.btn-dropdown').off('click');
  })

  useEffect(() => {
    jq();
    return () => {
      return removeJq();
    }
  }, [])

  return (
    <div className="card">
      <div className="card-body">

        {tableHeader}

        {
          showPaginationBeforeTable && (
            <div className="mb-3">
              <Pagination 
                paginator={paginator}
                params={params}
                filterHandler={filterHandler}
              />
            </div>
          )
        }


        <div className="table-responsive no-gap">
          {table}
        </div>

        <Pagination
          paginator={paginator}
          params={params}
          filterHandler={filterHandler}
        />
        
      </div>
    </div>
  );
}