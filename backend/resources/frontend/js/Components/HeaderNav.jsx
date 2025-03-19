import { Link, useForm, usePage } from '@inertiajs/react';
import Logo from '../../images/logo.svg';
import classNames from 'classnames';
import MenuItem from './Partials/HeaderNav/MenuItem';

function HeaderNav () {
  const {menu: menus} = usePage().props

  const { filters } = usePage().props;

  const { data, setData, get, processing } = useForm({
    search: filters.search || ''
  });

  function handleSubmit (e) {
    e.preventDefault();
    get(route('frontend.post-type.post.archive'), data);
  }

  return (
    <nav id='navbar' className='navbar01'>
      <div className='container'>
        <div className='navbar01-warpper'>
          <div className='navbar01__logo'>
            <Link href='/'>
              <img src={Logo} alt='Logo' />
            </Link>
          </div>
          <div className='navbar01__menu'>
            <nav className='navbar'>
              <div className='navbar-collapse'>
                <ul>
                  {menus.map((m, i) => (
                    <MenuItem key={i} menu={m} /> 
                  ))}
                  
                  {/* <li
                    className={classNames('nav-item', {
                      active: route().current('frontend.index')
                    })}
                  >
                    <Link
                      className={classNames('nav-link', {
                        active: route().current('frontend.index')
                      })}
                      aria-current='page'
                      href='/'
                    >
                      Home
                    </Link>
                  </li>
                  <li
                    className={classNames('nav-item', {
                      active: route().current('frontend.post-type.post.archive')
                    })}
                  >
                    <Link
                      className={classNames('nav-link', {
                        active: route().current('frontend.post-type.post.archive')
                      })}
                      href={route('frontend.post-type.post.archive')}
                      tabIndex='-1'
                      aria-disabled='true'
                    >
                      Media
                    </Link>
                  </li>
                  <li className='nav-item dropdown'>
                    <Link
                      href='#'
                      className='nav-link'
                      id='navbarScrollingDropdown'
                      role='button'
                      data-bs-toggle='dropdown'
                      aria-expanded='false'
                    >
                      About
                    </Link>
                    <ul className='dropdown-menu'>
                      <li>
                        <Link href='/#!' className='dropdown-item'>
                          About Default
                        </Link>
                      </li>
                      <li>
                        <Link href='/#!' className='dropdown-item'>
                          About Embed Youtube
                        </Link>
                      </li>
                      <li>
                        <Link href='/#!' className='dropdown-item'>
                          About Image
                        </Link>
                      </li>
                    </ul>
                  </li>
                  <li className='nav-item contact'>
                    <Link
                      className='nav-link'
                      href='/#!'
                      tabIndex='-1'
                      aria-disabled='true'
                    >
                      Contact Us
                    </Link>
                  </li> */}
                  
                  <li className='nav-item lang'>
                    <Link
                      href='/#!'
                      hrefLang='id-ID'
                      lang='id-ID'
                      className='active'
                    >
                      ID
                    </Link>
                    <Link href='/#!' hrefLang='en-US' lang='en-US'>
                      EN
                    </Link>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          <div className='navbar01__action'>
            <div className='lang-switcher'>
              <ul>
                <li className='active'>
                  <Link href='/#!' hrefLang='id-ID' lang='id-ID'>
                    ID
                  </Link>
                </li>
                <li>
                  <Link href='/#!' hrefLang='en-US' lang='en-US'>
                    EN
                  </Link>
                </li>
              </ul>
            </div>
            <div className='contact'>
              <div className='btn__readmore-green-banner'>
                <Link href='/contact-us'>Contact Us</Link>
              </div>
            </div>
            <div className='button-menu'>
              <div className='hamburger'>
                <span />
                <span />
                <span />
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  );
}

export default HeaderNav;
