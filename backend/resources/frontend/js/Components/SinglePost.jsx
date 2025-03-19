import { format } from 'date-fns';
import parse from 'html-react-parser';
import React from 'react';
import { SinglePostRelated } from "@frontend/js/Components/SinglePostRelated";
import ShareWithAuthor from '@frontend/js/Components/ShareWithAuthor';

function getIconUrl(name) {
  return new URL(`../../icons/${name}.svg`, import.meta.url).href
}

const SinglePost = ({ post }) => {
  return (
    <div id='singlePost' className='singlePost'>
      <div className='singlePost__content'>
        <div className='container'>
          <div className='row justify-content-center'>
            <div className='col-md-8'>
              <div className='float__share'>
                <input type='checkbox' name='' id='' />
                <div className='float__share-buttonAction'>Share</div>
                <div className='float__share-icon'>
                  <ul>
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
            </div>
          </div>
          <div className='row justify-content-center'>
            <div className='col-md-8'>
              <div className='singlePost__content-fituredImage'>
                <div className='ratio__16x9'>
                  <div className='inner'>
                    <img
                      src={post.featuredImage}
                      alt=''
                    />
                  </div>
                </div>
              </div>
              <div className='content__heading'>
                <div className='subtitle'>
                  {post.author.name}
                </div>
                <h1 className='title'>
                  {post.title}
                </h1>
                <div className='desc'>
                  <ul>
                    <li>
                      {format(new Date(post.created_at), 'dd MM yyyy')}
                    </li>
                    <li>{post.type.replace('-', ' ').toUpperCase()}</li>
                  </ul>
                </div>
              </div>
              {parse(post.content)}
            </div>
          </div>
        </div>
        <div className='container'>
          <div className='row justify-content-center'>
            <div className='col-md-8'>
              <ShareWithAuthor author={post.author} />
            </div>
          </div>
        </div>
      </div>

      <SinglePostRelated />
    </div>
  );
};

export default SinglePost;
