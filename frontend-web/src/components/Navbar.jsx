import Image from "next/image";
import Link from "next/link";
import Icons from "./Icons";
import Button from "./Button";
import NavigationMenu from "./NavigationMenu";
import FormInput from "./FormInput";
import { useEffect, useState } from "react";
import { useRouter } from 'next/router';

function Menus({isSearchOpen, menuMobileToggle, isMenuMobileOpen, menus}) {
    return (
        <>
            <button
                className="bg-transparent border-0 p-2 lg:p-4 lg:hidden" 
                onClick={menuMobileToggle}
            >
                <Icons icon={isMenuMobileOpen ? 'x' : 'list'} size={20} />
            </button>

            <div className={`menunav-wrapper max-lg:border-t max-lg:border-t-[#E4E7EC] ${isMenuMobileOpen ? 'max-lg:right-0' : 'max-lg:-right-full'}`}
                style={{'--navbar-height': '60px'}}>
                
                <div className={`searchform max-lg:mt-4 max-lg:mb-2 ${isSearchOpen ? `lg:w-full lg:opacity-100` : `lg:w-0 lg:opacity-0`} `}>
                    <form className={`w-full`}>
                        <div className="form-group">
                            <div className="flex-initial basis-full">
                                <FormInput
                                    id="input-search"
                                    type={`search`}
                                    placeholder={`Cari disini...`}
                                    className="!px-0 !py-3 !border-0 !outline-none"
                                />
                            </div>
                            <div className="flex-initial">
                                <button
                                    type="submit"
                                    className="bg-transparent border-0 p-3" 
                                >
                                    <Icons icon="magnifying-glass" size={20}/>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <NavigationMenu 
                    className={`transition-all duration-200 max-lg:!opacity-100 ${isSearchOpen ? `opacity-0` : `opacity-100`}`}
                    menuMobileToggle={menuMobileToggle}
                    isMenuMobileOpen={isMenuMobileOpen}
                    menus={menus}
                />  
            </div>
        </>
    )
}


function ColAction( { searchToggle, isSearchOpen } ) {
    return (
        <div className="gap-3 items-center hidden lg:flex">

            <button
                className="bg-transparent border-0 p-2" 
                onClick={searchToggle}
            >
                <Icons icon={isSearchOpen ? 'x' : 'magnifying-glass'} size={25}/>
            </button>

            <Button 
                href={'/contact-us'}
                text="Contact Us"
                btnClass="!border-secondary text-white bg-secondary !py-3 text-center justify-center"
            />
        </div>
    )
}

export default function Navbar({options}) {    
    const [isSearchOpen, setIsSearchOpen] = useState(false);
    const [isMenuMobileOpen, setIsMenuMobileOpen] = useState(false);
    const router = useRouter();

    const searchToggle = () => {
        setIsSearchOpen(!isSearchOpen);
        document.getElementById('input-search').focus();
    }
    const menuMobileToggle = () => {
        setIsMenuMobileOpen(!isMenuMobileOpen);
    }

    const handleLinkClick = (e) => {
        e.preventDefault();
        const href = e.currentTarget.getAttribute('href');
        setIsMenuMobileOpen(false);
        setTimeout(() => {
            if (href.startsWith("http") || href.startsWith("https")) {
                window.location.href = href;
            } else {
                router.push(href);
            }
        }, 10);
    };

    //Header Sticky
    /* Header Scroll
	--------------------------------------------- */
	const [isScrollDown, setIsScrollDown] = useState(false);
    const [isScrolled, setIsScrolled] = useState(false);

    useEffect(() => {
        let lastScrollY = window.scrollY;

        const updateScroll = () => {
            const currentScrollY = window.scrollY;
            setIsScrollDown(currentScrollY > lastScrollY && currentScrollY > 0);
            setIsScrolled(currentScrollY > 0);
            lastScrollY = currentScrollY;
        };

        window.addEventListener('scroll', updateScroll);

        // Cleanup function to remove the event listener
        return () => {
            window.removeEventListener('scroll', updateScroll);
        };
    }, []);

    return (
        <header className={`site-header p-5 max-lg:py-3 m-auto fixed top-0 left-0 w-full max-w-full z-50 transition-shadow duration-200 bg-white ${isScrollDown ? 'scroll-down' : ''} ${isScrolled ? 'scrolled shadow-md' : ''}`}>
            <div className="container flex justify-between items-center max-lg:px-0">
                <Link href={'/'} className="d" onClick={handleLinkClick}>
                    {
                        options?.web_logo
                            ? <Image src={options?.web_logo} width={100} height={100} alt="logo" className="max-lg:max-h-8 h-10 w-auto max-lg:w-full"/>
                            : ''
                    }
                </Link>

                <Menus 
                    menuMobileToggle={menuMobileToggle}
                    isMenuMobileOpen={isMenuMobileOpen}
                    isSearchOpen={isSearchOpen}
                    menus={options?.web_menu || []}
                />

                <ColAction 
                    searchToggle={searchToggle}
                    isSearchOpen={isSearchOpen}
                />
            </div>
        </header>
    )
}