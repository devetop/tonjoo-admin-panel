import { router } from "@inertiajs/react";

function AdminBar({ user, post }) {
    function handleLogout(e) {
        e.preventDefault();
        router.post(route("cms.logout"));
    }
    return (
        <>
            <style>{`
                html {
                    margin-top: 32px !important;
                    position: relative;
                }
                * html body {
                    margin-top: 32px !important;
                }
            `}</style>
            <div id="aksara-adminbar" className="adminbar">
                <ul className="adminbar__menu">
                    <li className="adminbar__item">
                        <a className="text-decoration-none" href={route('cms.dashboard')}>
                            <i className="fa fa-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    {post && (
                        <li className="adminbar__item">
                            <a className="text-decoration-none" href={route(`cms.${post.type}.edit`, post.id)}>
                                <i className="fa fa-pencil"></i>
                                <span> Edit </span>
                            </a>
                        </li>
                    )}
                </ul>
                <ul className="adminbar__secondary">
                    <li className="adminbar__dropdown adminbar__item">
                        <a href="#" className="adminbar__dropdown-toggle profile text-decoration-none" data-toggle="dropdown" aria-expanded="true">
                            <i className="fa fa-user"></i>
                            <span className="name"> {user.name} </span>
                        </a>
                        <ul className="adminbar__dropdown-menu">
                            <li>
                                <a className="text-decoration-none" onClick={(e) => handleLogout(e)}>
                                    <i className="m-r-10 fa fa-power-off"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </>
    );
}

export default AdminBar;
