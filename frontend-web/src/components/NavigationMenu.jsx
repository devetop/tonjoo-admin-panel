import { useState, useCallback, useEffect } from 'react';
import Link from 'next/link';
import Icons from './Icons';
import { useRouter } from 'next/router';

export default function NavigationMenu(props) {
	const { className, menuMobileToggle, isMenuMobileOpen, menus } = props;
	const router = useRouter();
	
	const [openSubmenus, setOpenSubmenus] = useState({});
	const menuItems = menus.map((menu, i) => ({
		href: menu.url || '#',
		label: menu.name,
		submenu: menu.menus?.map((menu2) => ({
			href: menu2.url || '#',
			label: menu2.name,
			submenu: menu2.menus?.map((menu3) => ({
				href: menu3.url || '#',
				label: menu3.name,
			}))
		}))
	})) || [];

	// Function to check if a menu item is active
    const isMenuItemActive = (href) => {
        return router.asPath === href || router.asPath.startsWith(href);
    };
	
	const toggleSubMenu = useCallback((path) => {
        setOpenSubmenus(prev => ({
            ...prev,
            [path]: !prev[path],
        }));
    }, []);

    // Function to render menu items recursively
    const renderMenuItems = (items, isTopLevel = true, path = '') => {

        return items.map((item, index) => {
			const currentPath = `${path}/${index}`;
            const isSubMenuOpen = !!openSubmenus[currentPath];
            const isActive = isMenuItemActive(item.href);
            const hasChildren = !!item.submenu?.length;
            const isCurrentAncestor = isTopLevel && hasChildren && item.submenu.some(subItem => isMenuItemActive(subItem.href));

			const handleLinkClick = (e) => {
				e.preventDefault();
				menuMobileToggle();
				setTimeout(() => {
					if(item.href.startsWith("http") || item.href.startsWith("https")) {
						window.location.href = item.href;
					} else {
						router.push(item.href);
					}
				}, 10);
			};

            return (
                <li key={index} className={`menu-item menu-item-${index} ${hasChildren ? 'menu-item-has-children' : ''} ${isActive ? 'current-menu-item' : ''} ${isCurrentAncestor ? 'current-menu-ancestor' : ''} ${isSubMenuOpen ? 'show' : ''}`}>
					<Link 
						href={item.href}
						onClick={handleLinkClick}>
						{item.label}
					</Link>
                    {hasChildren && (
                        <>
							<button 
								type="button" 
								className="expand"
								onClick={() => toggleSubMenu(currentPath)}>
                                <Icons icon='caret-down' />
                            </button>

                            <ul className={`sub-menu ${isSubMenuOpen ? 'show' : ''}`}>
                                {/* When rendering submenu items, we pass false to isTopLevel as they are not top-level items */}
                                {renderMenuItems(item.submenu, false, currentPath)}
                            </ul>
                        </>
                    )}
                </li>
            );
        });
    };

    return (
        <div className={`menunav ${className}`}>
            <ul id="primary-menu" className="menu relative">
                {renderMenuItems(menuItems)}
            </ul>
        </div>
    );

};

