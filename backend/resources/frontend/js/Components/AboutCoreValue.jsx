export default function AboutCoreValue({items}) {
  return (
    <div className="about__item">
      <div className="about__item-wrap">
        {items.map((item, i) => (
          <div className="item" key={i}>
            <div className="item__image">
              <img src={item.icon} alt="" />
            </div>
            <div className="item__title">{item.title}</div>
            <div className="item__desc">{item.desc}</div>
          </div>
        ))}
      </div>
    </div>
  );
}
