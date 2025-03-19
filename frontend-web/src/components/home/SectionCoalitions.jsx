import Image from "next/image";
import HeadSection from "../HeadSection";

export default function SectionCoalitions(props) {
    return(
        <>
            <section className="bg-white py-10 lg:py-20">
                <div className="container">
                    <HeadSection 
                        title="Coalitions"
                        desc={<>We do collaborate with strategic partners equally. Let’s collaborate on many good things with us!</>}
                        className="max-w-[350px]"
                    />

                    <div className="grid grid-cols-3 lg:grid-cols-5 max-lg:gap-10 gap-14">
                        {Array.from({ length: 15 }, (_, index) => (
                            <div className="item flex items-center justify-center group" key={index}>
                                <Image 
                                    src={`/assets/images/brand-${index + 1}.svg`}
                                    alt={`Brand ${index + 1}`}
                                    width={176}
                                    height={100}
                                    className="grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all object-contain h-14 w-full"
                                />
                            </div>
                        ))}
                    </div>

                </div>
            </section>
        </>
    );
};
