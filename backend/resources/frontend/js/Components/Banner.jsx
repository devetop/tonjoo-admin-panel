import BannerDefault from "../../images/background/banner.jpg";
import BannerMobile from "../../images/background/banner-mobile.jpg";
import IconArrow from '../../icons/arrow-readmore.svg';

function Banner() {
  const isMobile = () => {
    // Fungsi untuk menentukan apakah tampilan sedang diakses dari perangkat mobile
    // Anda bisa mengimplementasikan logika ini sesuai dengan kebutuhan Anda.
    // Contoh sederhana:
    return window.innerWidth <= 768; // Angka 768 adalah breakpoint mobile
  };

  return (
    <div id="banner" className="banner">
      <div className="background__full">
        <div className="inner">
          {isMobile() ? (
            <img src={BannerMobile} id="banner-desktop-default" alt="" />
          ) : (
            <img src={BannerDefault} id="banner-desktop-default" alt="" />
          )}
        </div>
      </div>
      <div className="container">
        <div className="banner__wrapper">
          <div className="banner__wrapper-heading">
            <div className="title">
              Halo, Kami Pijar!
            </div>
            <div className="desc">
              Ruang kolaborasi untuk menciptakan masa depan yang berkesetaraan
            </div>
            <div className="readmore">
              <div className="btn__readmore-green-banner">
                <a href="#">
                  let’s get started
                  <img src={IconArrow} alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Banner;
