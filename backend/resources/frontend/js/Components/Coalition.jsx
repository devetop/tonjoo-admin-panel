import React from 'react';

function Coalition() {
  // Daftar brand yang akan ditampilkan
  const brands = ["bsi", "telkom", "xl", "brin", "ud", "brin", "ud", "kemenkop", "km", "mandiri", "telkom", "brin", "bsi", "xl", "ud"];

  function getImageUrl(name) {
    return new URL(`../../images/coalition/${name}.webp`, import.meta.url).href
  }

  return (
    <div id="coalition" className="coalition">
      <div className="container">
        <div className="coalition__heading">
          <div className="title">
            <h4>Coalition</h4>
          </div>
          <div className="desc">
            <p>
              Kami berkolaborasi bersama berbagai mitra strategis dengan setara.
              <br />
              Mari berkolaborasi, mari menjadi Pijarian!
            </p>
          </div>
        </div>
      </div>
      <div className="container">
        <div className="coalition__item">
          {brands.map((brand, index) => (
            <div className="item" key={index}>
              <div className="item__image">
                <img src={getImageUrl(brand)} alt={brand} />
              </div>
            </div>
          ))}
        </div>
        <div className="coalition__readmore">
          <div className="btn__readmore-green">
            <a href="/#!">See More</a>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Coalition;
