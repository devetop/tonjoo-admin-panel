import Image from "next/image";
import Icons from "./Icons";

export default function SlideQuote({ image, quote, name, position, className }) {
    return (
        <div className={`shadow-md border border-slate-200/60 p-4 lg:p-10 rounded-3xl flex flex-row h-full ${className || ''}`}>
            <div className="flex-initial lg:basis-1/4 pr-3 hidden lg:block">
                <Image
                    src={image}
                    width={230}
                    height={300}
                    className="object-cover h-full rounded-full"
                    alt=""
                />
            </div>
            <div className="flex-initial lg:basis-3/4 flex items-center pl-3">
                <div>
                    <Icons icon="quote-left" />
                    <p className="mb-0 max-lg:mt-4">{quote}</p>

                    <div className="mt-8 flex flex-wrap lg:hidden">
                        <div className="flex-shrink flex-grow basis-full">
                            <Image
                                src={image}
                                width={50}
                                height={50}
                                className="object-cover w-16 h-16 rounded-full"
                                alt=""
                            />
                        </div>
                        <div className="flex-shrink flex-grow basis-full mt-2">
                            <strong>{name}</strong>
                            <br />
                            <span className="text-sm">{position}</span>
                        </div>
                    </div>

                    <div className="mt-5 flex max-lg:hidden">
                        <div className="flex-shrink flex-grow basis-2/3 max-lg:pl-2">
                            <strong>{name}</strong>
                            <br />
                            <span className="text-sm">{position}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
