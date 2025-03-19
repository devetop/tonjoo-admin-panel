import Widgets from "./Widgets";

export default function Footer({options}) {
    const currentYear = new Date().getFullYear();

    return(
        <>
            <footer className="site-footer bg-primary text-white">
                <div className="container">
                    <div className="py-10 lg:pt-20 lg:pb-8">
                        <div className="flex flex-row flex-wrap lg:-mx-3">
                            <div className="flex-initial basis-full lg:basis-1/3 max-lg:mb-12 max-lg:last:mb-0 lg:px-3">

                                <Widgets
                                    image={options?.web_logo_white}
                                    type='contact'
                                    content = {[
                                        {
                                            icon: "map-pin",
                                            text: options?.web_footer_address,
                                        },
                                        {
                                            icon: "device-mobile-camera",
                                            text: options?.web_footer_phone,
                                            link: `tel:${options?.web_footer_phone}`
                                        },
                                        {
                                            icon: "envelope-simple",
                                            text: options?.web_footer_email,
                                            link: `mailto:${options?.web_footer_email}`
                                        }
                                    ]}
                                />
                            </div>
                            <div className="flex-initial basis-full lg:basis-1/3 max-lg:mb-12 max-lg:last:mb-0 lg:px-3">

                                <Widgets 
                                    title="Media Sosial"
                                    desc="Mari berkolaborasi, ciptakan masa depan yang berkelanjutan & berkesetaraan!"
                                    type="social"
                                    content = {[
                                        {
                                            icon: "social-facebook",
                                            text: "Facebook",
                                            link: options?.web_footer_social_fb,
                                        },
                                        {
                                            icon: "social-instagram",
                                            text: "Instagram",
                                            link: options?.web_footer_social_ig,
                                        },
                                        {
                                            icon: "social-twitter",
                                            text: "Twitter",
                                            link: options?.web_footer_social_x,
                                        },
                                        {
                                            icon: "social-linkedin",
                                            text: "Linkedin",
                                            link: options?.web_footer_social_in,
                                        },
                                        {
                                            icon: "social-youtube",
                                            text: "Youtube",
                                            link: options?.web_footer_social_yt,
                                        },
                                    ]}
                                />

                            </div>
                            <div className="flex-initial basis-full lg:basis-1/3 max-lg:mb-12 max-lg:last:mb-0 lg:px-3">
                                <Widgets 
                                    title="Subscribe"
                                    desc="Terus terhubung dengan masa depan bersama kami. Mari berkolaborasi!"
                                    type="subscribe"
                                />

                            </div>
                        </div>
                    </div>
                    <div className="py-5 lg:py-10 border-t border-slate-50/20">
                        <p className="mb-0 max-lg:text-center">&copy; {currentYear} MADE WITH THOUGHT AND LOVE USING NEXTJS BY TONJOO.</p>
                    </div>
                </div>
            </footer>
        </>
    );
};