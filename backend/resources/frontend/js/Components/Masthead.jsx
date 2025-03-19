import PostBg from "@frontend/images/background/banner.jpg";

function Masthead({ featuredImage, children }) {
    return (
        <header className="masthead" style={{ backgroundImage: `url(${featuredImage || PostBg})` }}>
            <div className="container position-relative px-4 px-lg-5">
                <div className="row gx-4 gx-lg-5 justify-content-center">
                    <div className="col-md-10 col-lg-8 col-xl-7">
                        {children}
                    </div>
                </div>
            </div>
        </header>
    );
}

export default Masthead;
