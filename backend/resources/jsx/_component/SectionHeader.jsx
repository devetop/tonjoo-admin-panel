import React from 'react';

const SectionHeader = ({ children }) => (
    <div className="content-header pt-4">
        <div className="container-fluid">
            <div className="row flex-column-reverse mb-2">
                {children}
            </div>
        </div>
    </div>
);

const SectionTitle = ({ children }) => (
    <div className="col-sm-6 d-flex align-items-center">
        <h1>{children}</h1>
    </div>
);

const Breadcrumb = ({ children }) => (
    <div className="col-sm-6 mb-2">
        <ol className="breadcrumb d-lg-none d-md-none">
            {children}
        </ol>
    </div>
);

const BreadcrumbChild = ({ children }) => (
    <li className="breadcrumb-item active">
        <span>{children}</span>
    </li>
);

export { SectionHeader, SectionTitle, Breadcrumb, BreadcrumbChild };
