import { Link, usePage } from '@inertiajs/react';
import React, { useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import './layout.scss';
import { setActiveSidebarMenu } from '../../_redux/slices/LayoutSlice';

function NavItem({ href, icon, text, isActive, routeName }) {
    const dispatch = useDispatch()

    return (
        <li className={`nav-item ${isActive ? 'active' : ''}`}>
            <Link href={href || '#'} className="nav-link" onClick={() => dispatch(setActiveSidebarMenu(routeName))}>
                <i className={`nav-icon ph ${icon || ''}`}></i>
                <p>{text}</p>
            </Link>
        </li>
    );
}

function NavTreeView({ icon, text, isActive, children }) {
    const [_isActive, _setIsActive] = useState(isActive);
    
    return (
        <li className={`nav-item ${_isActive ? 'menu-open' : ''}`}>
            <span className="nav-link" role='button' onClick={() => _setIsActive(!_isActive)} >
                <i className={`nav-icon ph ${icon}`}></i>
                <p> {text} <i className="right ph ph-caret-left"></i></p>
            </span>
            <ul className="nav nav-treeview">
                {children}
            </ul>
        </li>
    );
}

function SidebarMenus() {
    const list_side_menu = useSelector(state => state.layout.list_side_menu);
    const active_sidebar_menu = useSelector(state => state.layout.active_sidebar_menu);

    return (
        <>
            {list_side_menu?.map((menu, index) => {
                /**
                 * apakah route-name childsnya memiliki nama yang sama dengan active_sidebar_menu
                 */
                const isActiveTreeview = menu.childs?.map((menu) => menu.href).includes(active_sidebar_menu);

                if (menu.childs) {
                    return (
                        <NavTreeView
                            key={index}
                            icon={menu.icon}
                            text={menu.text}
                            isActive={isActiveTreeview}
                        >
                            {menu.childs.map((submenu, subIndex) => (
                                <NavItem
                                    key={subIndex}
                                    text={submenu.text}
                                    href={menu.jsx ? '/jsx' + submenu.href : generateHref(submenu.href)}
                                    isActive={active_sidebar_menu == submenu.href}
                                    icon="ph-circle"
                                    routeName={submenu.href}
                                />
                            ))}
                        </NavTreeView>
                    );
                } else {
                    return (
                        <NavItem
                            key={index}
                            text={menu.text}
                            icon={menu.icon}
                            href={menu.jsx ? '/jsx' + menu.href : generateHref(menu.href)}
                            isActive={active_sidebar_menu == menu.href}
                            menu={menu.href}
                        />
                    );
                }
            })}
        </>
    );
}

function generateHref(href) {
    if (typeof href === 'function') {
        return href();
    } else if (typeof href === 'object') {
        return `/${href.name}/${href.params.join('/')}`;
    } else {
        return route(href);
    }
}


export default function Sidebar({ asset_url }) {
    const { guard } = usePage().props

    return (
        <aside className="main-sidebar sidebar-dark-primary elevation-4">
            <Link href={guard === 'dashboard' ? route('dashboard.index') : route('cms.dashboard')} className="brand-link">
                <img src={`${asset_url}assets/backend/dist/img/logo-backend-white.png`} alt="Amanah Tonjoo Admin Panel Logo" className="brand-image brand-large brand-indark" />
                <img src={`${asset_url}assets/backend/dist/img/logo-backend-b-white.png`} alt="Amanah Tonjoo Admin Panel Logo" className="brand-image brand-small brand-indark" />
            </Link>
            <div className="sidebar">
                <nav className="mt-3 mb-5">
                    <ul className="nav nav-pills nav-sidebar flex-column nav-compact nav-collapse-hide-child text-md" data-widget="treeview" role="menu" data-accordion="false">

                        <SidebarMenus />

                    </ul>
                </nav>
            </div>
        </aside>
    )
}