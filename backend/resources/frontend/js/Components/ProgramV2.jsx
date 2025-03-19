import React, { useState } from 'react';

// Import Swiper React components
import { Swiper, SwiperSlide } from 'swiper/react';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/thumbs';

// import required modules
import { FreeMode, Navigation, Thumbs } from 'swiper/modules';

import Program01 from '../../images/program/program-01.png';
import Program02 from '../../images/program/program-02.png';
import Program03 from '../../images/program/program-03.png';
import Program04 from '../../images/program/program-04.png';
import Program05 from '../../images/program/program-05.png';
import IconArrow from '../../icons/arrow-readmore-green.svg';

function ProgramV2 () {
  const [thumbsSwiper, setThumbsSwiper] = useState(null);

  const programs = [
    {
      image: Program01,
      title: 'Leaders Connect',
      description: 'Forum perdana bagi para pembuat kebijakan strategis',
      link: '/#!'
    },
    {
      image: Program02,
      title: 'Future Skills Platform',
      description: 'Ekosistem untuk mengakselerasi para talenta masa depan',
      link: '/#!'
    },
    {
      image: Program03,
      title: 'Innovation Accelerator',
      description: 'Inkubator & akselerator bagi inisiatif yang bergerak di isu masa depan',
      link: '/#!'
    },
    {
      image: Program04,
      title: 'Innovation Landing Pad',
      description: 'Sarana pengembangan model bisnis & konsultasi untuk memasuki pasar',
      link: '/#!'
    },
    {
      image: Program05,
      title: 'Policy Co-creation Forum',
      description: 'Pengembang kebijakan berbasis kebutuhan masa depan',
      link: '/#!'
    }
  ];

  return (
    <div id='programv2' className='programv2'>
      <div className='container'>
        <div className='programv2__heading'>
          <div className='title'>Programs</div>
          <div className='desc'>
            <p>Membangun ekosistem pengembangan talenta masa depan</p>
          </div>
        </div>
      </div>
      <div className='programv2__wrapper'>
        <div className='container'>
          <Swiper
            onSwiper={setThumbsSwiper}
            loop
            spaceBetween={10}
            slidesPerView={'auto'}
            freeMode
            watchSlidesProgress
            modules={[FreeMode, Navigation, Thumbs]}
            className='swiper programv2__slider-header'
          >
            {programs.map((program) => {
              return (
                <SwiperSlide className='title' key={`header-${program.title}`}>
                  <p>{program.title}</p>
                </SwiperSlide>
              );
            })}
          </Swiper>
        </div>
        <div className='programv2__slider'>
          <div className='container'>
            <Swiper
              style={{
                '--swiper-navigation-color': '#fff',
                '--swiper-pagination-color': '#fff'
              }}
              spaceBetween={10}
              navigation={false}
              thumbs={{ swiper: thumbsSwiper }}
              modules={[FreeMode, Navigation, Thumbs]}
              className='swiper programv2__slider-content'
              wrapperClass='swiper-wrapper wrapper'
            >
              {programs.map((program) => {
                return (
                  <SwiperSlide className='swiper-slide item-wrapper' key={`slider-${program.title}`}>
                    <div className='item'>
                      <div className='item__image'>
                        <img src={program.image} alt='' />
                      </div>
                      <div className='item__heading'>
                        <div className='item__heading-title'>
                          {program.title}
                        </div>
                        <div className='item__heading-content'>
                          {program.description}
                        </div>
                        <div className='item__heading-readmore'>
                          <a href={program.link}>
                            read more
                            <img src={IconArrow} alt='' />
                          </a>
                        </div>
                      </div>
                    </div>
                  </SwiperSlide>
                );
              })}
            </Swiper>
          </div>
        </div>
      </div>
    </div>
  );
}

export default ProgramV2;
