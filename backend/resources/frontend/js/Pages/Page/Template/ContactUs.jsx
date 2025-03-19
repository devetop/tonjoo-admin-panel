import { Head } from "@inertiajs/react";
import AppLayout from "@frontend/js/Layouts/AppLayout";
import {
  Heading,
  SectionTitle,
  Breadcrumb,
  BreadcrumbChild
} from '@frontend/js/Components/Heading';

function ContactForm() {
  return (
    <div id="headingContact" className="headingContact" style={{paddingTop: 1, paddingBottom: 128}}>
      <div className="container">
          <div className="headingContact__wrapper">
              <div className="headingContact__heading">
                  <div className="headingContact__heading-top">
                      <div className="title">
                          Contact Us Now
                      </div>
                      <div className="desc">
                          Mari menjadi Pijarian!
                      </div>
                      <table className="subscriptionTable">
                        <tbody>
                        <tr>
                              <td className="icon">
                                  <img src="dist/icons/pin.svg" alt=""/>
                              </td>
                              <td className="desc">
                                  <strong>Jakarta Office</strong>
                                  <div className="adds one">Noble House 30th floor Jl. Dr. Ide Anak Agung Gde Agung Kav E, No. 42 Kuningan, Setiabudi, Jakarta Selatan</div>
                                  <div className="adds">Jalan Taman Patra Raya III No. 2 Kuningan, Jakarta Selatan</div>
                              </td>
                          </tr>
                          <tr>
                              <td className="icon">
                                  <img src="dist/icons/pin.svg" alt=""/>
                              </td>
                              <td className="desc">
                                  <strong>Jogja Office</strong>
                                  <div className="adds">Jl. Dewi Sartika No. 9, Terban, Kec.Gondokusuman, Yogyakarta 555223</div>
                              </td>
                          </tr>
                          <tr>
                              <td className="icon">
                                  <img src="dist/icons/phone.svg" alt=""/>
                              </td>
                              <td className="desc">
                                  <a href="tel:+6281210102400">0812-1010-2400</a>
                              </td>
                          </tr>
                          <tr>
                              <td className="icon">
                                  <img src="dist/icons/envelope.svg" alt=""/>
                              </td>
                              <td className="desc">
                                  <a href="mailto:info@pijarfoundation.org">info@pijarfoundation.org</a>
                              </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <div className="headingContact__heading-bottom">
                      <div className="mediaSosial">
                          <ul>
                              <li>
                                  <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                      <img src="dist/icons/facebook.svg" alt=""/>
                                  </a>
                              </li>
                              <li>
                                  <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                      <img src="dist/icons/instagram.svg" alt=""/>
                                  </a>
                              </li>
                              <li>
                                  <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer">
                                      <img src="dist/icons/twitter.svg" alt=""/>
                                  </a>
                              </li>
                              <li>
                                  <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer">
                                      <img src="dist/icons/linkedin.svg" alt=""/>
                                  </a>
                              </li>
                              <li>
                                  <a href="http://www.youtube.com" target="_blank" rel="noopener noreferrer">
                                      <img src="dist/icons/youtube.svg" alt=""/>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div className="headingContact__form">
                  <form>
                      <div className="row headingContact__form-wrap">
                          <div className="col-md-12">
                              <div className="mb-3">
                                  <label htmlFor="exampleInputEmail1" className="form-label">Nama Lengkap</label>
                                  <input type="text" className="form-control" id="name" aria-describedby="emailHelp" placeholder="Masukkan nama lengkap anda"/>
                              </div>
                          </div>
                          <div className="col-md-6">
                              <div className="mb-3">
                                  <label htmlFor="exampleInputEmail1" className="form-label">Email</label>
                                  <input type="email" className="form-control" id="name" aria-describedby="emailHelp" placeholder="Masukkan alamat email anda"/>
                              </div>
                          </div>
                          <div className="col-md-6">
                              <div className="mb-3">
                                  <label htmlFor="exampleInputEmail1" className="form-label">Telepon</label>
                                  <input type="email" className="form-control" id="name" aria-describedby="emailHelp" placeholder="Masukkan nomor telepon anda"/>
                              </div>
                          </div>
                          <div className="col-md-12">
                              <div className="mb-3">
                                  <label htmlFor="exampleInputEmail1" className="form-label">Website (Opsional)</label>
                                  <input type="text" className="form-control" id="name" aria-describedby="emailHelp" placeholder="Masukkan link website anda"/>
                              </div>
                          </div>
                          <div className="col-md-12">
                              <div className="mb-3">
                                  <label htmlFor="exampleInputEmail1" className="form-label">Tulis Pesan</label>
                                  <textarea className="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tulis pesan anda disini"></textarea>
                              </div>
                          </div>
                      </div>
                      <button className="btn__readmore-green-banner">
                          <a href="#">
                              Contact Us
                          </a>
                      </button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  )
}

export default function ContactUs({auth}) {
  return (
    <AppLayout 
      auth={auth} 
      masthead={
        <Heading style={{paddingBottom: 0}}>
          <Breadcrumb>
            <BreadcrumbChild title={'Home'} link={'/'} />
            <BreadcrumbChild
              title={`Contact`}
            />
          </Breadcrumb>

          <SectionTitle
            title={`Contact`}
            desc={`Kami berkolaborasi bersama berbagai mitra strategis dengan setara. Mari berkolaborasi, mari menjadi Pijarian!`}
          />
        </Heading>
      }
    >
      <Head title="Pijar Foundaion" />
      
      <ContactForm />

    </AppLayout>
  )
}