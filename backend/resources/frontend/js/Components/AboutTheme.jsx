export default function AboutTheme({items}) {
  return (
    <div className="about__theme">
      <div className="about__theme-wrap">
        {items.map((item, i) => (
          <div className="item" key={i}>
            <div className="item__image">
              <img src={item.icon} alt="" />
            </div>
            <div className="item__title">{item.title}</div>
            <div className="item__desc">{item.desc}</div>
            {item?.list && (
              <div className="item__list">
                <ul>
                  {item?.list.map((item, i) => (
                    <li key={i}>
                      <div className="title">{item.title}</div>
                      <div className="desc">{item.desc}</div>
                    </li>
                  ))}
                </ul>
              </div>
            )}
          </div>
        ))}
      </div>
    </div>
  );
}
