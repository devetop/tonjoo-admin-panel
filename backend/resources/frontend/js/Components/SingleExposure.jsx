import { usePage } from '@inertiajs/react';
import classNames from 'classnames';
import React from 'react';

function SingleExposure ({ children, readmore, tags = [], currentTagSlug = [], filterHandler }) {
  const filterTags = (value) => {
    if(currentTagSlug.includes(value)) {
      filterHandler({tag: currentTagSlug.filter(t => t != value)})
    } else {
      filterHandler({tag: [...currentTagSlug, value]})
    }
  }

  return (
    <div id='singleExposure' className='singleExposure'>
      <div className='swiper exposure__slider-content'>
        <div className='wrapper'>
          <div className='item-wrapper'>
            <div className='container'>
              <div className='exposure__category'>
                <ul>
                  {tags.map((tag, i) => (
                    <li 
                      key={i}
                      className={classNames({active: currentTagSlug.includes(tag.slug)})} 
                      onClick={() => filterTags(tag.slug)} 
                      role='button'
                    >
                      <a>{tag.name}</a>
                    </li>
                  ))}
                </ul>
              </div>
              <div className='exposure__item'>
                {children}
              </div>
              <div className='exposure__readmore'>
                <div className='btn__readmore-green'>
                  {readmore}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

function HeaderExposure ({categories = [], currentCategorySlug = null, filterHandler}) {
  const [menu, setMenu] = React.useState([
    {
      name: 'All',
      slug: ''
    },
    ...categories.map(c => ({ 
      name: c.name, 
      slug: c.slug,
    }))
  ])

  return (
    <div id='headerExposure' className='headerExposure'>
      <div className='container'>
        <div className='headerExposure-wrapper'>
          <ul>
            {menu.map((category, i) => (
              <li 
                key={i} 
                className={classNames({active: category.slug === currentCategorySlug})} 
                onClick={() => filterHandler({category: category.slug})} 
                role='button'
              >
                <span>{category.name}</span>
              </li>
            ))}
          </ul>
        </div>
      </div>
    </div>
  );
}

export {
  SingleExposure,
  HeaderExposure
};
