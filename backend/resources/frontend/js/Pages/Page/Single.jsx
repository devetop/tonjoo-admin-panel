import { Head } from '@inertiajs/react';
import AppLayout from '@frontend/js/Layouts/AppLayout';
import SinglePost from '@frontend/js/Components/SinglePost';
import { Breadcrumb, BreadcrumbChild } from '@frontend/js/Components/Breadcrumb';

function Single ({ auth, post }) {
  return (
    <AppLayout auth={auth} post={post}>
      <Head title={post.title} />

      <Breadcrumb>
        <BreadcrumbChild title={'Home'} link={'/'} />
        <BreadcrumbChild title={post.title} />
      </Breadcrumb>

      <SinglePost post={post} />
    </AppLayout>
  );
}

export default Single;
