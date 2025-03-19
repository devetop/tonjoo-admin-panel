import React from 'react';
import SmallQuote from "@frontend/images/quote/small-quote-01.png";

function getIconUrl(name) {
  return new URL(`../../icons/${name}.svg`, import.meta.url).href
}

function ShareWithAuthor ({ author }) {
  return (
    <div className='media__share-withAuthor'>
      <div className='author'>
        <div className='title'>Media author</div>
        <div className='user'>
          <img src={SmallQuote} alt='' />
          <div className='user-wrap'>
            <div className='name'>{author.name}</div>
            <div className='position'>Author & Penulis Handal Pijari</div>
          </div>
        </div>
      </div>
      <div className='share'>
        <div className='title'>Bagikan ke</div>
        <ul className='icon'>
          <li>
            <a href=''>
              <img src={getIconUrl('share-facebook')} alt='' />
            </a>
          </li>
          <li>
            <a href=''>
              <img src={getIconUrl('share-twitter')} alt='' />
            </a>
          </li>
          <li>
            <a href=''>
              <img src={getIconUrl('share-linkedin')} alt='' />
            </a>
          </li>
          <li>
            <a href=''>
              <img src={getIconUrl('share-pinterst')} alt='' />
            </a>
          </li>
          <li>
            <a href=''>
              <img src={getIconUrl('share-whatsapp')} alt='' />
            </a>
          </li>
        </ul>
      </div>
    </div>
  );
}

export default ShareWithAuthor;
