import React, { useCallback, useEffect } from 'react';
import { useDispatch } from 'react-redux';
import Topbar from '../_component/Layout/Topbar';
import Sidebar from '../_component/Layout/Sidebar';
import Footer from '../_component/Layout/Footer';
import { setActiveSidebarMenu, setListSideMenu } from '../_redux/slices/LayoutSlice';
import { router, usePage } from '@inertiajs/react';
import './layout.scss';

export default function Layout({ children }) {
    const { list_side_menu, asset_url, ziggy } = usePage().props

    const dispatch = useDispatch()
    const handleNavigate = useCallback((e) => {
        // untuk aktivasi menu sidebar
        for (const [key, value] of Object.entries(e.detail.page.props.ziggy.routes)) {
            if ((value.uri == e.detail.page.url.substring(1)) && value.methods.includes('GET')) {
                dispatch(setActiveSidebarMenu(key))
            }
        }

        if (document.body.classList.contains('sidebar-open')) {
            document.body.classList.remove('sidebar-open');
            document.body.classList.add('sidebar-close');
        }
    });

    useEffect(() => {
        dispatch(setListSideMenu(list_side_menu));
        dispatch(setActiveSidebarMenu(ziggy.current_route_name));

        const unsibscribe = router.on('navigate', handleNavigate);

        return () => {
            unsibscribe()
        }
    }, [])

    return (
        <div className="wrapper" style={{marginTop: '10px !important'}}>
            <Topbar />
            <Sidebar asset_url={asset_url} />
            <div className="content-wrapper">
                {children}
            </div>
            <Footer />
        </div>
    )
}