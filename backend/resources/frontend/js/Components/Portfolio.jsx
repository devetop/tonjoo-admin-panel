import React from 'react';

import Portfolio01 from '../../images/portfolio/image-01.jpg';
import Portfolio02 from '../../images/portfolio/image-02.jpg';
import Portfolio03 from '../../images/portfolio/image-03.jpg';
import Portfolio04 from '../../images/portfolio/image-04.jpg';
import Portfolio05 from '../../images/portfolio/image-05.jpg';
import Portfolio06 from '../../images/portfolio/image-06.jpg';
import IconReadMore from "../../icons/arrow-readmore.svg";

function Portfolio () {
  const portfolios = [
    {
      image: Portfolio01,
      title: 'Role Model of National Student Talent Development',
      description:
        'Melalui Future Skills dan Kewirausahaan Sosial, Pijar  berhasil menyelenggarakan program kuliah inovatif yang menghadirkan pembicara, langsung dari industri untuk berbagi pengalaman dan pengetahuan praktis.',
      link: '/#!'
    },
    {
      image: Portfolio02,
      title: 'Role Model of National Technopark',
      description:
        'Bersama Solo Techno Park, Pijar membangun pusat inovasi dan kejuruan yang berperan sebagai ekosistem pengembangan generasi muda, UMKM, dan startup berbasis teknologi kreatif.',
      link: '/#!'
    },
    {
      image: Portfolio03,
      title: 'Role Model of Future Higher Education',
      description:
        'Melalui Gama Socio Techno Preneur, Pijar mengembangkan pusat kreativitas yang menyatukan mahasiswa dari berbagai latar belakang untuk berinovasi dan berkolaborasi.',
      link: '/#!'
    },
    {
      image: Portfolio04,
      title: 'Creative Model of Halal Industry Ecosystem',
      description:
        'Pijar mengembangkan Shafiec UNU Yogyakarta sebagai pusat studi yang bergerak untuk menjadi rujukan dalam bidang gaya hidup halal, mengoptimalkan potensi keuangan syariah dan ekonomi digital.',
      link: '/#!'
    },
    {
      image: Portfolio05,
      title: 'Role Model of Digital-Based Pesantren Empowerment',
      description:
        'Pijar membentuk komunitas Muslim Kreatif yang merupakan inisiatif pemuda Muslim Indonesia untuk mempromosikan nilai inklusivitas islam.',
      link: '/#!'
    },
    {
      image: Portfolio06,
      title: 'International Youth Forum',
      description:
        'Pijar melalui Digitrend berupaya melakukan digitalisasi pesantren untuk mengoptimalkan potensi dari sistem, para pelajar, sumber daya, dan jejaring global.',
      link: '/#!'
    },
  ];

  return (
    <div id='portfolio' className='portfolio'>
      <div className='container'>
        <div className='portfolio__heading'>
          <div className='title'>Portfolio</div>
          <div className='desc'>
            <p>
              Institusi terpercaya dengan beragam kontribusi pada pengembangan
              talenta masa depan Indonesia
            </p>
          </div>
        </div>
      </div>
      <div className='container'>
        <div className='portfolio__wrap'>
          {portfolios.map(portfolio => {
            return (
              <div className='portfolio__wrap-item' key={portfolio.title}>
                <a className='links' href={portfolio.link} />
                <div className='item-image'>
                  <div className='ratio__1x1'>
                    <div className='inner'>
                      <img src={portfolio.image} alt='' />
                    </div>
                  </div>
                </div>
                <div className='item-content'>
                  <div className='content'>
                    <div className='title'>
                      {portfolio.title}
                    </div>
                    <hr className='sparator' />
                    <div className='desc'>
                      {portfolio.description}
                    </div>
                  </div>
                  <div className='readmore'>
                    <a href={portfolio.link}>
                      read more
                      <img src={IconReadMore} alt='' />
                    </a>
                  </div>
                </div>
              </div>
            );
          })}

          {/* Tambahkan komponen lain sesuai dengan jumlah item portfolio */}
        </div>
        <div className='portfolio__readmore'>
          <div className='btn__readmore-green'>
            <a href='/#!'>See More</a>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Portfolio;
