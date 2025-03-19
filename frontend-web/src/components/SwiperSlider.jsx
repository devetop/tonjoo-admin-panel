

import { Swiper, SwiperSlide } from 'swiper/react';
import { Pagination, Navigation } from 'swiper/modules';

import 'swiper/css'
import 'swiper/css/pagination';
import 'swiper/css/navigation';

import SlideQuote from './SlideQuote';

export default function SwiperSlider(props) {   

    const { 
        slide, 
        content, 
        centered=false, 
        pagination=false, 
        navigation=false, 
        loop=true, 
        gap=50, 
        showSlide=5, 
        gapMd, 
        showSlideMd, 
        gapLg, 
        showSlideLg, 
        gapXl, 
        showSlideXl, 
        className 
    } = props;

    const modules = [];
    if (pagination) modules.push(Pagination);
    if (navigation) modules.push(Navigation);

    function renderSlide(slide, content) {
        switch (slide) {
            case 'SlideQuote':
                return(
                    <>
                        {content.map((cnt, index) => (
                            <SwiperSlide key={index} className='!h-auto'>
                                <SlideQuote 
                                    image = {cnt.image}
                                    quote = {cnt.quote}
                                    name = {cnt.name}
                                    position = {cnt.position}
                                />
                            </SwiperSlide>
                        ))}

                    </>
                );                
                break;
        
            default:
                break;
        }
    }

    return(
        <>
            <Swiper
                // ref={swiperRef}
                spaceBetween={gap}
                slidesPerView={showSlide}
                centeredSlides={centered}
                navigation={navigation ? {enabled: true} : false}
                pagination={pagination ? {clickable: true} : false}
                modules={modules}
                loop={loop}
                watchSlidesProgress={true}
                breakpoints={{
                    ...(showSlideMd && gapMd ? {
                    '768': {
                        slidesPerView: showSlideMd,
                        spaceBetween: gapMd || gap,
                    },
                    } : {}),
                    ...(showSlideLg && gapLg ? {
                    '1024': {
                        slidesPerView: showSlideLg,
                        spaceBetween: gapLg || gap,
                    },
                    } : {}),
                    ...(showSlideXl && gapXl ? {
                    '1280': {
                        slidesPerView: showSlideXl,
                        spaceBetween: gapXl || gap,
                    },
                    } : {}),
                }}
                // onSlideChange={handleSlideChange}
                // onSlideChange={() => console.log('slide change')}
                // onSwiper={(swiper) => console.log(swiper)}
                className={`${className || ''}`}
                >
                {renderSlide(slide, content)}
            </Swiper>
        </>
    );
};
