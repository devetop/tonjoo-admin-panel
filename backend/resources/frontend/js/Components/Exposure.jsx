import { Link, usePage } from '@inertiajs/react';
import React from 'react';

import IconReadMore from '@frontend/icons/arrow-readmore-dark.svg';

function Exposure ({ heading, readmore, children }) {
  return (
    <div id='exposure' className='exposure'>
      <div className='container'>
        <div className='exposure__heading'>
          {heading}
        </div>
      </div>
      <div className='container'>
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
  );
}

function ExposureHeading ({ title, desc }) {
  return (
    <>
      <div className='title'>{title}</div>
      <div className='desc'>
        <p>{desc}</p>
      </div>
    </>
  )
}

function ExposureChild ({ post, props }) {
  const {post_type} = usePage().props

  return (
    <div className='item' key={post.id} {...props}>
      <Link
        className='links'
        href={route(`frontend.post-type.${post_type || 'post'}.single`, post.slug)}
      />
      <div className='item__image'>
        <img src={post.featuredImage} alt='' />
      </div>
      <div className='heading-wrapper'>
        <div className='item__heading'>
          <div className='subtitle'>
            <p>
              {post.author.name}
            </p>
          </div>
          <div className='title'>
            <h3>
              <Link href={route(`frontend.post-type.${post_type || 'post'}.single`, post.slug)}>
                {post.title}
              </Link>
            </h3>
          </div>
        </div>
        <hr className='item__sparator' />
        <div className='item__footer'>
          <div className='place'>
            {post.title}
          </div>
          <div className='readmore'>
            <Link href={route('frontend.post-type.post.single', post.slug)}>
              read more <img src={IconReadMore} alt='' />
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}

export {
  Exposure,
  ExposureHeading,
  ExposureChild
};
