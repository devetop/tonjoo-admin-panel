import { baseUrlExchange } from "@/helper";
import Header from "../archive/header";
import Image from "next/image";
import { FaFacebookF, FaLinkedinIn, FaTwitter } from "react-icons/fa6";

function SectionHeader({ title, subTitle }) {
    return (
        <div className="mx-auto mt-20 mb-10 text-center">
            <h2 className="text-4xl">{title}</h2>
            <p className="text-base">{subTitle}</p>
        </div>
    )
}

export default function AboutUs({ data }) {
    const title = data['title'];
    const subTitle = data.post_metas.find((meta) => meta.key === 'sub_title')?.value;
    const aboutUs = data.post_metas.find((meta) => meta.key === 'about_us')?.value;

    if (!aboutUs || !aboutUs?.section1 || !aboutUs?.section2 || !aboutUs?.section3) {
        return (
            <h1 className="text-center my-10">Invalid About Us Data</h1>
        )
    }

    return (
        <>
            <div className="bg-[#f2f4f7] min-h-[100vh] pb-8 lg:pb-14">

                <Header
                    breadcrumbs={['Home', title]}
                    title={title}
                    subtitle={`${subTitle || ''}`}
                    className=""
                />

                <section className="bg-transparent -mt-[100px]">
                    <div className="container mx-auto">
                        <div className="flex max-lg:flex-wrap rounded-xl overflow-hidden shadow-md">
                            <div className="flex-initial basis-full">
                                <Image
                                    src={baseUrlExchange(data.featuredImage)}
                                    alt={`featured image for post ${data.title}`}
                                    width={900}
                                    height={600}
                                    className="object-cover w-full"
                                />
                            </div>
                        </div>
                    </div>

                    <div className="px-8 md:px-16 lg:px-32">
                        <SectionHeader title={aboutUs.section1.header.title} subTitle={aboutUs.section1.header.subtitle} />

                        <div className="grid grid-cols-1 lg:grid-cols-3 gap-10">
                            {
                                aboutUs.section1.cards.map((card, i) => (
                                    <div className="rounded-2xl p-8 shadow-lg" key={i}>
                                        <div className="rounded-xl bg-teal-500 inline-block p-4">
                                            <Image
                                                src={baseUrlExchange(card.image_url)}
                                                width={50}
                                                height={50}
                                                alt={`core values images ${i + 1}`}
                                            />
                                        </div>
                                        <h3 className="text-2xl font-bold my-3">{card.title}</h3>
                                        <p className="text-base text-gray-600">{card.description}</p>
                                    </div>
                                ))
                            }
                        </div>

                        <SectionHeader title={aboutUs.section2.header.title} subTitle={aboutUs.section2.header.subtitle} />

                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            {
                                aboutUs.section2.cards.map((card, i) => (
                                    <div key={i} className="group group-hover:cursor-pointer relative">
                                        <div className="flex justify-center w-2/3 mx-auto">
                                            <div className="rounded-full bg-white inline-block p-2 overflow-hidden relative  w-[200px] h-[200px]">
                                                <Image
                                                    className="absolute bottom-0 left-[50%] translate-x-[-50%]"
                                                    src={baseUrlExchange(card.image_url)}
                                                    width={300}
                                                    height={300}
                                                    style={{objectFit: 'cover'}}
                                                    alt={`core values images ${i + 1}`}
                                                />
                                            </div>
                                        </div>
                                        <div className="rounded-2xl p-4 mb-10 text-center shadow-center w-2/3 min-w-[280px] pt-[90px] group-hover:pt-[210px] -mt-[100px] group-hover:-mt-[220px] transition-margin transition-padding duration-300 ease-in-out mx-auto">
                                            <div className="mt-4 mb-2">
                                                <h3 className="text-2xl font-bold">{card.name}</h3>
                                                <p className="text-base text-gray-600">{card.job_title}</p>
                                            </div>
                                            <div className="flex justify-around w-1/2 mx-auto my-5">
                                                <a href={card.social_fb} className="rounded-full bg-sky-700 text-white p-1">
                                                    <FaFacebookF size={20} />
                                                </a>
                                                <a href={card.social_x} className="rounded-full bg-sky-700 text-white p-1">
                                                    <FaTwitter size={20} />
                                                </a>
                                                <a href={card.social_in} className="rounded-full bg-sky-700 text-white p-1">
                                                    <FaLinkedinIn size={20} />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                ))
                            }
                        </div>

                        <SectionHeader title={aboutUs.section3.header.title} subTitle={aboutUs.section3.header.subtitle} />

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-10">
                            {
                                aboutUs.section3.cards.map((card, i) => (
                                    <div className="rounded-2xl p-8 shadow-center" key={i}>
                                        <div className="rounded-xl bg-teal-500 inline-block p-2">
                                            <Image
                                                src={baseUrlExchange(card.image_url)}
                                                width={50}
                                                height={50}
                                                alt={`core values images ${i + 1}`}
                                            />
                                        </div>
                                        <h3 className="text-2xl font-bold">{card.title}</h3>
                                        <p className="text-base text-gray-600" dangerouslySetInnerHTML={{ __html: card.content }}></p>
                                    </div>
                                ))
                            }
                        </div>

                    </div>
                </section>

            </div>
        </>
    );
}