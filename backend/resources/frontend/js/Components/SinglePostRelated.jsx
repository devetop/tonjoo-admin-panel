import { Link } from '@inertiajs/react';
import React from 'react';

function getImageUrl(name) {
  return new URL(`../../images/background/${name}.jpg`, import.meta.url).href
}

function SinglePostRelated ({ posts }) {
  return (
    <div className='singlePost__terkait'>
      <div className='container'>
        <div className='row justify-content-center'>
          <div className='col-md-8'>
            <div className='singlePost__terkait-heading'>
              <div className='title'>Berita Terkait</div>
            </div>

            {posts ? (
              posts.map((post, index) => {
                return (
                  <SinglePostRelatedChild
                    post={post}
                    key={`related-${index}`}
                  />
                );
              })
            ) : (
              <div className='singlePost__terkait-item'>
                <div className='title'>Tidak ada Berita Terkait</div>
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  );
}

function SinglePostRelatedChild ({ post }) {
  return (
    <div className='singlePost__terkait-item'>
      <Link href={route('frontend.post-type.post.single', post.slug)}>
        <div className='item-wrapper'>
          <div className='img'>
            <img src={getImageUrl('single-post-01')} alt='' />
          </div>
          <div className='heading'>
            <div className='title'>
              {post.title}
            </div>
            <div className='desc'>
              {post.subTitle}
            </div>
          </div>
        </div>
      </Link>
    </div>
  );
}

export { SinglePostRelated, SinglePostRelatedChild };
