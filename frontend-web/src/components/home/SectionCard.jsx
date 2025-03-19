import classNames from "classnames";
import Image from "next/image";

export default function SectionCard({ imageUrl, title, body, isReverse = false }) {
    return (
        <section className={classNames("flex max-lg:flex-wrap relative drop-shadow-xl", { 'lg:flex-row-reverse': isReverse })}>
            <div className="lg:h-[600px] overflow-hidden w-full lg:w-1/2">
                <Image
                    src={imageUrl}
                    width={1900 / 2}
                    height={600}
                    alt={`${title} images`}
                    className="max-lg:h-[320px] object-cover"
                />
            </div>
            <div className="h-[200px] lg:h-[600px]"></div>
            <div className={`lg:absolute bg-white p-5 lg:p-6 lg:py-10 lg:px-16 lg:m-10 lg:rounded-2xl bottom-0 lg:bottom-[40%] lg:translate-y-[50%] max-w-full lg:max-w-[700px] ${isReverse ? 'lg:right-[45%]' : 'lg:left-[45%]'}`}>
                <h1 className="text-3xl font-semibold mb-4">{title}</h1>
                {body}
            </div>
        </section>
    )
}

export function WhatWeDo({iconUrl, title, body}) {
    return (
        <div className="flex max-lg:flex-nowrap my-10">
            <div className="w-50 lg:w-20">
                <Image
                    src={iconUrl}
                    alt="what we do icon 1"
                    width={50}
                    height={50}
                />
            </div>
            <div className="w-[80%] lg:w-[50%] max-lg:pl-4">
                <h2 className="text-2xl font-bold">{title}</h2>
                <p className="text-gray-600">{body}</p>
            </div>
        </div>
    )
}