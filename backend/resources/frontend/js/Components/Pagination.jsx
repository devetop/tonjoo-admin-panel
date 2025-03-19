import React from "react";
import { Link } from "@inertiajs/react";
import classNames from "classnames";

const PageLink = ({ active, label, url }) => {
  const className = classNames(["page-item"], {
    active: active,
  });
  return (
    <li className={className} style={{minWidth: 32}}>
      <Link className="page-link" href={url}>
        <span dangerouslySetInnerHTML={{ __html: label }} />
      </Link>
    </li>
  );
};

// Previous, if on first page
// Next, if on last page
// and dots, if exists (...)
const PageInactive = ({ label }) => {
  const className = classNames("page-item disabled");
  return (
    <li className={className} aria-disabled="true">
      <span className="page-link" dangerouslySetInnerHTML={{ __html: label }} />
    </li>
  );
};

export default ({ paginator, perPage, filterHandler }) => {
  // dont render, if there's only 1 page (previous, 1, next)
  // if (paginator.links.length === 3) return null;

  return (
    <nav className="d-flex justify-items-center justify-content-between">
      {paginator.links.length > 3 && (
        <div className="d-sm-none w-100">
          <ul className="pagination pagination-sm">
            {paginator.prev_page_url ? (
              <PageLink
                label={"&laquo; Previous"}
                url={paginator.prev_page_url}
              />
            ) : (
              <PageInactive label={"&laquo; Previous"} />
            )}

            {paginator.next_page_url ? (
              <PageLink label={"Next &raquo;"} url={paginator.next_page_url} />
            ) : (
              <PageInactive label={"Next &raquo;"} />
            )}
          </ul>
        </div>
      )}

      <div className="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
        <div>
          <p className="small text-muted">
            {"Showing "}
            <span className="font-medium">{paginator.from}</span>
            {" to "}
            <span className="font-medium">{paginator.to}</span>
            {" of "}
            <span className="font-medium">{paginator.total}</span>
            {" results"}
          </p>
        </div>

        {paginator.links.length > 3 && (
          <div>
            <div className="pagination pagination-sm" style={{gap: 10, alignItems: 'center'}}>
              {paginator.links.map(({ active, label, url }) => {
                return url === null ? (
                  <PageInactive key={label} label={label} />
                ) : (
                  <PageLink key={label} label={label} active={active} url={url} />
                );
              })}
            </div>
          </div>
        )}
      </div>

      <div className="form-group ms-3" style={{minWidth: 50, whiteSpace: 'nowrap'}}>
        <select
          className="form-control text-center"
          value={perPage}
          onChange={(e) =>
            filterHandler({
              perPage: e.target.value,
              page: "1",
            })
          }
        >
          <option value="6">6</option>
          <option value="10">10</option>
          <option value="20">20</option>
        </select>
      </div>
    </nav>
  );
};
