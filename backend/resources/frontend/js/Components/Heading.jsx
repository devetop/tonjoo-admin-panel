import React from 'react';
import { Link } from '@inertiajs/react';

function Heading({ children, style }) {
  return (
    <div id="heading" className="heading" style={style}>
      <div className="container">
        <div className="heading__wrapper">
          {children}
        </div>
      </div>
    </div>
  );
}

function SectionTitle({ title, desc }) {
  return (
    <>
      <div className="heading__wrapper-title">{title}</div>
      <div className="heading__wrapper-desc">{desc}</div>
    </>
  )
}

function Breadcrumb({ children }) {
  return (
    <div className="heading__wrapper-breadcrumb">
      <div className="breadcrumb__simple">
        <ul>
          {children}
        </ul>
      </div>
    </div>
  )
}

function BreadcrumbChild({ title, link }) {
  return (
    <li>
      {link ? (
        <Link href={link}>{title}</Link>
      ) : (
        <span>{title}</span>
      )}
    </li>
  )
}

export {
  Heading,
  SectionTitle,
  Breadcrumb,
  BreadcrumbChild
};
