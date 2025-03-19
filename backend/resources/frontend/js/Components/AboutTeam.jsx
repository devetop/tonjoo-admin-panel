export default function AboutTeam({ persons }) {
  return (
    <div className="about__team">
      <div className="about__team-wrap">
        {persons.map((person, i) => (
          <div className="item" key={i}>
            <div className="item__image">
              <img src={`dist/images/team/${person.image}`} alt="" />
            </div>
            <div className="item__heading">
              <div className="item__heading-wrap">
                <div className="item__heading-name">{person.name}</div>
                <div className="item__heading-position">{person?.position || 'BUSINESS LEADER'}</div>
              </div>
              <div className="item__heading-sosialMedia">
                <ul>
                  <li>
                    <a
                      href={person?.social?.facebook || 'http://www.facebook.com'}
                      target="_blank"
                      rel="noopener noreferrer"
                    >
                      <img src="dist/icons/team-facebook.svg" alt="" />
                    </a>
                  </li>
                  <li>
                    <a
                      href={person?.social?.twitter || 'http://www.twitter.com'}
                      target="_blank"
                      rel="noopener noreferrer"
                    >
                      <img src="dist/icons/team-twitter.svg" alt="" />
                    </a>
                  </li>
                  <li>
                    <a
                      href={person?.social?.linkedin || 'http://www.linkedin.com'}
                      target="_blank"
                      rel="noopener noreferrer"
                    >
                      <img src="dist/icons/team-linkedin.svg" alt="" />
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}
