import WeAre01 from '../../images/weare/weare-01.png';
import WeAre02 from '../../images/weare/weare-02.png';
import WeAre03 from '../../images/weare/weare-03.png';
import IconWeAre01 from '../../icons/weare-01.svg';
import IconWeAre02 from '../../icons/weare-02.svg';
import IconWeAre03 from '../../icons/weare-03.svg';

function WeAre() {
  return (
    <div id="weare" className="weare">
      <div className="item-wrapper">

        <div className="item right">
          <div className="background__left-50">
            <div className="inner">
              <img src={WeAre01} alt="" />
            </div>
          </div>
          <div className="container content__wrapper">
            <div className="content">
              <div className="content__header">
                Who We are?
              </div>
              <div className="content__desc">
                Pijar Foundation merupakan ekosistem yang menghubungkan sektor-sektor strategis dalam rangka menghadapi tren, tantangan, dan peluang masa depan
              </div>
              <div className="content__readmore btn__readmore-green">
                <a href="/#!">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>

        <div className="item left">
          <div className="background__right-50">
            <div className="inner">
              <img src={WeAre02} alt="" />
            </div>
          </div>
          <div className="container content__wrapper">
            <div className="content">
              <div className="content__header">
                Our Vision
              </div>
              <div className="content__desc">
                Membangun kerjasama antar sektor strategis untuk menghadapi tren, peluang, dan tantangan di masa depan
              </div>
              <div className="content__readmore btn__readmore-green">
                <a href="/#!">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>

        <div className="item right">
          <div className="background__left-50">
            <div className="inner">
              <img src={WeAre03} alt="" />
            </div>
          </div>
          <div className="container content__wrapper">
            <div className="content">
              <div className="content__header">
                What We Do?
              </div>
              <div className="content__desc">
                {/* Pijar Foundation merupakan ekosistem yang menghubungkan sektor-sektor strategis dalam rangka menghadapi tren, tantangan, dan peluang masa depan. */}
              </div>
              <div className="content__list">

                <div className="list">
                  <div className="list-icon">
                    <img src={IconWeAre01} alt="" />
                  </div>
                  <div className="list-heading">
                    <div className="title">
                      Shape Future Mind
                    </div>
                    <div className="desc">
                      <p>
                        Membentuk mindset yang bertumpu pada gagasan-gagasan masa depan
                      </p>
                    </div>
                  </div>
                </div>
                <div className="list">
                  <div className="list-icon">
                    <img src={IconWeAre02} alt="" />
                  </div>
                  <div className="list-heading">
                    <div className="title">
                      Shape Future Market
                    </div>
                    <div className="desc">
                      <p>
                        Membentuk iklim pasar yang terbuka dengan inovasi & teknologi masa depan
                      </p>
                    </div>
                  </div>
                </div>
                <div className="list">
                  <div className="list-icon">
                    <img src={IconWeAre03} alt="" />
                  </div>
                  <div className="list-heading">
                    <div className="title">
                      Shape Future Policy
                    </div>
                    <div className="desc">
                      <p>
                        Membentuk kebijakan yang mengakomodasi tantangan & peluang masa depan
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  );
}

export default WeAre;
