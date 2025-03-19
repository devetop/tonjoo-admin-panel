import { Head, Link } from '@inertiajs/react';

import AppLayout from '@frontend/js/Layouts/AppLayout';
import Banner from '@frontend/js/Components/Banner';
import WeAre from '@frontend/js/Components/WeAre';
import ProgramV2 from '@frontend/js/Components/ProgramV2';
import Portfolio from '@frontend/js/Components/Portfolio';
import Quote from '@frontend/js/Components/Quote';
import {
  Exposure,
  ExposureHeading,
  ExposureChild
} from '@frontend/js/Components/Exposure';
import Coalition from '@frontend/js/Components/Coalition';

function Home ({ auth, posts }) {
  return (
    <AppLayout auth={auth} masthead={<Banner />}>
      <Head title='Home' />

      <WeAre />

      <ProgramV2 />

      <Portfolio />

      <Quote />

      <Exposure
        heading={
          <ExposureHeading
            title='Media'
            desc='Semua aktivitas Pijar tersedia di sini'
          />
        }
        readmore={
          <Link href={route('frontend.post-type.post.archive')}>See More</Link>
        }
      >
        {posts.data.map(post => {
          return <ExposureChild post={post} key={post.id} />;
        })}
      </Exposure>

      <Coalition />
    </AppLayout>
  );
}

export default Home;
