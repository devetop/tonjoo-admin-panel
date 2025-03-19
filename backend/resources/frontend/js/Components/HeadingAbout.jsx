import {useRef} from 'react'
import { Link } from "@inertiajs/react";

export default function HeadingAbout() {
  const videoRef = useRef(null)
  
  const toggleVideoPlayPause = () => {
    const videoElement = videoRef.current;
    if (videoElement.paused) {
      videoElement.play();
    } else {
      videoElement.pause();
    }
  };

  return (
    <div id="headingAbout" className="headingAbout">
      <div className="container">
        <div className="heading__wrapper">
          <div className="heading__wrapper-breadcrumb">
            <div className="breadcrumb__simple">
              <ul>
                <li>
                  <Link href={route('frontend.index')}>HOME</Link>
                </li>
                <li>
                  <span>ABOUT</span>
                </li>
              </ul>
            </div>
          </div>
          <div className="heading__wrapper-title">About Us</div>
          <div className="heading__wrapper-desc">
            Institusi terpercaya dengan beragam kontribusi pada pengembangan
            talenta masa depan Indonesia
          </div>
        </div>
      </div>
      <div className="container">
        <div className="row">
          <div className="col-md-12">
            <div className="video">
              <video
                id="headingVideo"
                ref={videoRef}
                poster="dist/images/background/single-post-01.jpg"
              >
                <source src="dist/videos/bg.mp4" type="video/mp4" />
                <source src="dist/videos/bg.ogg" type="video/ogg" />
                Your browser does not support the video tag.
              </video>
              <div id='btn-headingVideo' onClick={toggleVideoPlayPause} rel='button'>
                <input type="checkbox" name="" id="" />
                <div className="btn-animasi"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
