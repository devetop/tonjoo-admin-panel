export default function HeaderPage(props) {
    const {title, desc} = props;
    return(
        <>
            <section className="bg-primary pt-[94px] pb-[356px] text-center text-white">
                <div className="container mx-auto">

                    <div className="w-full max-w-[500px] mx-auto">
                        <h1 className="text-[56px] font-bold mb-[12px]">{title}</h1>
                        <p className="last-of-type:mb-0">{desc}</p>
                    </div>

                </div>
            </section>
        </>
    );
};
