import { Link, usePage } from "@inertiajs/react";
import classNames from "classnames";

function isActive(ziggy, menu) {
  const path = menu?.url?.toLowerCase();
  return ziggy.location == ziggy.url + (path == undefined ? '' : path)
}

export default function MenuItem({menu}) {
  const {ziggy} = usePage().props

  if (menu.menus.length > 0) {
    // Menu Tingkat 2
    return (
      <li className={classNames(['nav-item', 'dropdown', menu.class], {
        active: isActive(ziggy, menu)
      })}>
        <Link
          href="#"
          className="nav-link"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          {menu.name}
        </Link>
        <ul className="dropdown-menu">
          {menu.menus.map((menu2, i2) => (menu2?.menus?.length > 0) ? (
            // Menu Tingkat 3
            <li className={`nav-item dropdown ${menu2.class}`} key={i2}>
              <Link
                href="#"
                className="nav-link"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {menu2.name}
              </Link>
              <ul className="dropdown-menu">
                {
                  menu2?.menus?.map((menu3, i3) => (
                    <li key={i3}>
                      {
                        menu3.is_inertia_link ? (
                          <Link href={menu3.url} className={`dropdown-item ${menu3.class}`}>
                            {menu3.name}
                          </Link>
                        ) : (
                          <a href={menu3.url} className={`dropdown-item ${menu3.class}`}>
                            {menu3.name}
                          </a>
                        )
                      }
                    </li>
                  ))
                }
              </ul>
            </li>
          ) : (
            <li key={i2}>
              {
                menu2.is_inertia_link ? (
                  <Link href={menu2.url} className={`dropdown-item ${menu2.class}`}>
                    {menu2.name}
                  </Link>
                ) : (
                  <a href={menu2.url} className={`dropdown-item ${menu2.class}`}>
                    {menu2.name}
                  </a>
                )
              }
            </li>
          ))}
        </ul>
      </li>
    );
  } else {
    // Menu Tingkat 1
    return (
      <li
        className={classNames("nav-item", {
          active: isActive(ziggy, menu)
        })}
      >
        <Link
          className="nav-link"
          aria-current="page"
          href={menu.url}
        >
          {menu.name}
        </Link>
      </li>
    );
  }
}
