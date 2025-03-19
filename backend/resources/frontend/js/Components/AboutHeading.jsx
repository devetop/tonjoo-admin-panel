export default function AboutHeading({ title, desc }) {
  return (
    <div className="row">
      <div className="col-md-12">
        <div className="about__heading">
          <div className="about__heading-title">{title}</div>
          <div className="about__heading-desc">{desc}</div>
        </div>
      </div>
    </div>
  );
}
