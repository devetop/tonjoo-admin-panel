import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation } from 'swiper/modules';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';

import Quote01 from '../../images/quote/quote-01.png';
import SmallQuote01 from '../../images/quote/small-quote-01.png';
import Quote02 from '../../images/quote/quote-02.png';
import SmallQuote02 from '../../images/quote/small-quote-02.png';
import Quote03 from '../../images/quote/quote-03.png';
import SmallQuote03 from '../../images/quote/small-quote-03.png';
import IconQuote from '../../icons/quote.svg';

function Quote () {
  const quotes = [
    {
      name: 'Gibran Rakabuming Raka',
      position: 'Walikota Solo',
      description:
        'Dengan semangat kolaborasi diharapkan Solo Technopark mampu menjadi motor penggerak ekonomi masyarakat sehingga mampu meningkatkan perekonomian dan daya saing daerah. Saya ingin mengucapkan terimakasih atas dukungan untuk mendukung Merdeka Belajar.',
      image: Quote01,
      small_image: SmallQuote01
    },
    {
      name: 'Nadiem Anwar Makarim',
      position: 'Minister of Education, Culture, Research, and Technology',
      description:
        'Saya luar biasa bahagia ketika mendengar mata kuliah Kewirausahaan Sosial UGM. Kuliah ini mencerminkan prinsip dan role model Kampus Merdeka. Saya ingin mengucapkan terimakasih atas dukungan untuk mendukung Merdeka Belajar.',
      image: Quote02,
      small_image: SmallQuote02
    },
    {
      name: 'Zaki Mansour',
      position: 'Islamic Development Bank',
      description:
        'Shafiec UNU adalah program inovatif dan unik yang dirancang untuk menciptakan lulusan profesional untuk menjadi bagian dari solusi dunia. Kurikulum disesuaikan dengan industri dan profesional terkemuka untuk memberikan siswa pengalaman langsung di dunia nyata.',
      image: Quote03,
      small_image: SmallQuote03
    }
  ];
  return (
    <div id='quote' className='quote'>
      <div className='container'>
        <div className='quote__heading'>
          <div className='title'>KUTIPAN PENERIMA</div>
          <div className='desc'>
            <p>Menjadi referensi terpercaya</p>
          </div>
        </div>
      </div>
      <Swiper
        className='swiper quote__slider'
        wrapperClass='swiper-wrapper quote__slider-wrapper'
        slidesPerView='auto'
        centeredSlides
        spaceBetween={30}
        modules={[Navigation]}
        navigation={{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }}
      >
        {quotes.map((quote, index) => {
          return (
            <SwiperSlide className='item' key={index}>
              <div className='item__image'>
                <img src={quote.image} alt='' />
              </div>
              <div className='item__content'>
                <div className='item__content-mark'>
                  <img src={IconQuote} alt='' />
                </div>
                <div className='item__content-quote'>
                  <p>
                    {quote.description}
                  </p>
                </div>
                <hr className='item__content-separator' />
                <div className='item-footer-wrapper'>
                  <div className='item__content-image'>
                    <img src={quote.small_image} alt='' />
                  </div>
                  <div className='item-footer-content'>
                    <div className='item__content-name'>
                      {quote.name}
                    </div>
                    <div className='item__content-position'>
                      {quote.position}
                    </div>
                  </div>
                </div>
              </div>
            </SwiperSlide>
          );
        })}

        <div className='quote__slider-navigation'>
          <div className='swiper-button-next quote__slider-navigationNext' />
          <div className='swiper-button-prev quote__slider-navigationPrev' />
        </div>
      </Swiper>
    </div>
  );
}

export default Quote;
