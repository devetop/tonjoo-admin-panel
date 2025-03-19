import { Link, router, usePage } from '@inertiajs/react';
import { useSelector } from 'react-redux'
import classNames from 'classnames';
import React, { useEffect, useState } from 'react';
import './layout.scss';
import OutsideClickHandler from '../OutsideClickHandler';

function Breadcrumbs() {
    const breadcrumbs = useSelector(state => state.layout.breadcrumbs)

    return (
        <ol className="breadcrumb bg-transparent mb-0 py-1">
            {
                breadcrumbs.map((item, i) => (
                    <li
                        className={classNames('breadcrumb-item', {
                            'active': (breadcrumbs.length - 1) == i
                        })}
                        key={i}
                    >
                        {
                            (item[1])
                                ? <Link href={item[1]}><span>{item[0]}</span></Link>
                                : <span>{item[0]}</span>
                        }
                    </li>
                ))
            }
        </ol>
    )
}

function ProfileButton() {
    const { user } = usePage().props.auth
    const { guard } = usePage().props

    const [isShown, setIsShown] = useState(false)
    
    function onLogoutHandler() {
        router.post(
            (guard == 'dashboard')
            ? route('dashboard.logout')
            : route('cms.logout')
        );
    }

    return (
        <OutsideClickHandler onOutsideClick={() => setIsShown(false)}>
            <div className='profile-button'>
                <div 
                    className='d-flex align-items-center px-4' 
                    role='button' 
                    style={{ gap: '.5em' }}
                    onClick={() => setIsShown(!isShown)}
                >
                    <div style={{
                        backgroundImage: `url("${user.avatar}")`,
                        height: 30,
                        width: 30,
                        borderRadius: '50%',
                        backgroundPosition: 'center',
                        backgroundSize: 'cover',
                    }}>
                    </div>
                    <div>{user.name}</div>
                </div>
                <div style={{display: (isShown ? 'block' : 'none')}} className='_dropdown'>
                    <ul className="list-group text-secondary">
                        <li className='list-group-item'>
                            <Link 
                                href={(guard == 'dashboard') ? route('dashboard.profile') : route('cms.profile.edit')} 
                                className='text-secondary'
                            >
                                <i className="ph ph-pencil"></i>
                                <span className='ml-2'>Edit Profile</span>
                            </Link>
                        </li>
                        <li className='list-group-item'>
                            <div role="button" onClick={onLogoutHandler}>
                                <i className="ph-bold ph-sign-out"></i>
                                <span className='ml-2'>Logout</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </OutsideClickHandler>
    )
}

export default function Topbar() {
    const guard = usePage().props.guard

    return (
        <nav className="main-header navbar navbar-expand navbar-white navbar-light">
            <ul className="navbar-nav">
                <li className="nav-item">
                    <a className="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i className="fas fa-bars"></i>
                    </a>
                </li>
                <li className="nav-item d-none d-sm-inline-block">
                    <Breadcrumbs />
                </li>
            </ul>

            <ul className="navbar-nav ml-auto">
                {
                    (guard != 'web') && (
                        <li className="nav-item">
                            <ProfileButton />
                        </li>
                    )
                }
                {/* <a className="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i className="ph-bold ph-squares-four"></i>
                </a> */}
            </ul>
        </nav>
    )
}