import { Link } from '@inertiajs/react';
import classNames from 'classnames';
import React from 'react';

function Breadcrumb ({ children }) {
  return (
    <div id='breadcrumb' className='breadcrumb'>
      <div className='container'>
        <div className='row justify-content-center'>
          <div className='col-md-8'>
            <nav aria-label='breadcrumb'>
              <ol className='breadcrumb'>
                {children}
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  );
}

function BreadcrumbChild({ title, link }) {
  return (
    <li className={classNames("breadcrumb-item", { 'active' : !link })}>
      {link ? (
        <Link href={link}>{title}</Link>
      ) : (
        <span>{title}</span>
      )}
    </li>
  )
}

export {
  Breadcrumb,
  BreadcrumbChild
};
