import React from 'react';

import IconArrowTop from "@frontend/icons/arrow-top.svg";
import IconLogo from "@frontend/icons/logo.svg";
import IconPin from "@frontend/icons/pin.svg";
import IconPhone from "@frontend/icons/phone.svg";
import IconEnvelope from "@frontend/icons/envelope.svg";
import IconFacebook from "@frontend/icons/facebook.svg";
import IconInstagram from "@frontend/icons/instagram.svg";
import IconTwitter from "@frontend/icons/twitter.svg";
import IconLinkedin from "@frontend/icons/linkedin.svg";
import IconYoutube from "@frontend/icons/youtube.svg";

function Subscription() {
  return (
    <div id="subscription" className="subscription">
      <a href="#navbar">
        <div className="subscription__backtop">
          <img src={IconArrowTop} alt="" />
        </div>
      </a>
      <div className="container">
        <div className="subscription__content">
          <div className="subscription__content-about">
            <img className="subscriptionLogo" src={IconLogo} alt="" />
            <table className="subscriptionTable">
              <tbody>
                <tr>
                  <td className="icon">
                    <img src={IconPin} alt="" />
                  </td>
                  <td className="desc">
                    <strong>Jakarta Office</strong>
                    <div className="adds one">Noble House 30th floor Jl. Dr. Ide Anak Agung Gde Agung Kav E, No. 42 Kuningan, Setiabudi, Jakarta Selatan</div>
                    <div className="adds">Jalan Taman Patra Raya III No. 2 Kuningan, Jakarta Selatan</div>
                  </td>
                </tr>
                <tr>
                  <td className="icon">
                    <img src={IconPin} alt="" />
                  </td>
                  <td className="desc">
                    <strong>Jogja Office</strong>
                    <div className="adds">Jl. Dewi Sartika No. 9, Terban, Kec.Gondokusuman, Yogyakarta 555223</div>
                  </td>
                </tr>
                <tr>
                  <td className="icon">
                    <img src={IconPhone} alt="" />
                  </td>
                  <td className="desc">
                    <a href="tel:+6281210102400">0812-1010-2400</a>
                  </td>
                </tr>
                <tr>
                  <td className="icon">
                    <img src={IconEnvelope} alt="" />
                  </td>
                  <td className="desc">
                    <a href="mailto:info@pijarfoundation.org">info@pijarfoundation.org</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div className="subscription__content-mediaSocial">
            <h4 className="title">MEDIA SOSIAL</h4>
            <p className="desc">Mari berkolaborasi, ciptakan masa depan yang berkelanjutan & berkesetaraan!</p>
            <table className="subscriptionTable">
              <tbody>
                <tr>
                  <td className="icon">
                    <img src={IconFacebook} alt="" />
                  </td>
                  <td className="desc">
                    <a href="facebook.com">Facebook</a>
                  </td>
                </tr>
                <tr>
                  <td className="icon">
                    <img src={IconInstagram} alt="" />
                  </td>
                  <td className="desc">
                    <a href="instagram.com">Instagram</a>
                  </td>
                </tr>
                <tr>
                  <td className="icon">
                    <img src={IconTwitter} alt="" />
                  </td>
                  <td className="desc">
                    <a href="twitter.com">Twitter</a>
                  </td>
                </tr>
                <tr>
                  <td className="icon">
                    <img src={IconLinkedin} alt="" />
                  </td>
                  <td className="desc">
                    <a href="linkedin.com">Linkedin</a>
                  </td>
                </tr>
                <tr>
                  <td className="icon">
                    <img src={IconYoutube} alt="" />
                  </td>
                  <td className="desc">
                    <a href="youtube.com">Youtube</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div className="subscription__content-subscribe">
            <h4 className="title">SUBSCRIPTION</h4>
            <p className="desc">Terus terhubung dengan masa depan melalui Pijar. Mari berkolaborasi, mari menjadi Pijarian!</p>
            <form action="" method="post">
              <div className="formSubscribe">
                <input type="text" className="form-control" id="exampleInputPassword1" placeholder="Enter your email here" />
                <button type="submit" className="btn btn-primary">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Subscription;
