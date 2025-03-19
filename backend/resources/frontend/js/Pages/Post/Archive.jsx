import { useState, useEffect } from 'react';
import { Head, Link, router, useForm } from '@inertiajs/react';
import { intlFormatDistance } from 'date-fns';
import AppLayout from '@frontend/js/Layouts/AppLayout';
import {
  Heading,
  SectionTitle,
  Breadcrumb,
  BreadcrumbChild
} from '@frontend/js/Components/Heading';
import { ExposureChild } from '@frontend/js/Components/Exposure';
import {
  SingleExposure,
  HeaderExposure
} from '@frontend/js/Components/SingleExposure';
import Pagination from '@frontend/js/Components/Pagination';

function Archive ({ auth, posts, post_type, categories, tags }) {
  const searchParams = new URLSearchParams(new URL(window.location.href).search);
  const {data: params, setData: setParams, get} = useForm({
    category: searchParams.get('category') || '',
    tag: searchParams.getAll('tag[]') || [],
    perPage: searchParams.get('perPage') || '10',
    page: searchParams.get('page') || '1',
  })
  
  const filterHandler = (value) => {
    router.get(route(`frontend.post-type.${post_type}.archive`) ,{
      ...params, 
      ...value,
    }, {
      preserveScroll: true
    })

    setParams({
      ...params, 
      ...value,
    })
  }

  return (
    <AppLayout
      auth={auth}
      masthead={
        <Heading>
          <Breadcrumb>
            <BreadcrumbChild title={'Home'} link={'/'} />
            <BreadcrumbChild
              title={`${post_type.replace('-', ' ').toTitleCase()}`}
            />
          </Breadcrumb>

          <SectionTitle
            title={`${post_type.replace('-', ' ').toTitleCase()} Archive`}
            desc={`A list of ${post_type.replace('-', ' ').toLowerCase()}`}
          />
        </Heading>
      }
    >
      <Head title={`${post_type.replace('-', ' ').toTitleCase()} Archive`} />

      <HeaderExposure 
        categories={categories} 
        currentCategorySlug={params.category} 
        filterHandler={filterHandler} 
      />

      <SingleExposure
        tags={tags}
        currentTagSlug={params.tag}
        filterHandler={filterHandler} 
        readmore={
          <Pagination 
            perPage={params.perPage}
            filterHandler={filterHandler}
            paginator={posts} 
          />
        }
      >
        {posts?.data?.map(post => {
          return <ExposureChild post={post} key={post.id} />;
        })}
      </SingleExposure>
    </AppLayout>
  );
}

export default Archive;
