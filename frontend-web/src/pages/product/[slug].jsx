import { serverApi } from "@/axios";
import Breadcrumbs from "@/components/Breadcrumbs";
import { baseUrlExchange, dateFormat, stripHtml } from "@/helper";
import Head from "next/head";
import Image from "next/image";

import Terms from "@/components/post/terms";
import SharePost from "@/components/SharePost";
import AuthorShare from "@/components/AuthorShare";
import Link from "next/link";

export default function Detail({ data }) {
    return (
        <>
            <Head>
                <title>{data.title?.substring(0, 70)}</title>
                <meta name="description" content={stripHtml(data.content)?.substring(0, 200)} />
                <meta property="og:title" content={data.title?.substring(0, 70)} />
                <meta property="og:description" content={stripHtml(data.content)?.substring(0, 200)} />
                <meta property="og:image" content={baseUrlExchange(data.featuredImage)}></meta>
            </Head>

            <div className="container">
                <div className="max-w-[900px] m-auto pt-0 lg:pt-7 relative">
                    <div className="absolute -left-24 h-full">
                        <div className="sticky inline-block top-28">
                            <SharePost 
                                title={data.title}
                                image={baseUrlExchange(data.featuredImage)}
                                permalink={`/${data.type}/${data.slug}`}
                                className="flex-col -m-1"
                                classNameChild="!p-1"
                            />
                        </div>
                    </div>

                    <Breadcrumbs
                        breadcrumbs={[
                            ['Post Archive', '/archive/product'],
                            [data.title]
                        ]}
                        className="max-lg:-mx-5 max-lg:px-4 max-lg:!py-3 max-lg:border-t max-lg:bg-slate-400/10 max-lg:w-auto"
                    />

                    <div className="mb-5 lg:my-9">
                        <div className="rounded-2xl overflow-hidden max-md:-mx-5 max-md:rounded-none shadow-md">
                            <Image
                                src={baseUrlExchange(data.featuredImage)}
                                alt={`featured image for post ${data.title}`}
                                width={900}
                                height={600}
                                className="object-cover h-[350px]"
                            />
                        </div>

                        <div className="mt-6 lg:mt-8">
                            <Link href={`/archive/author/${data.author.name}`} className="text-teal-800 font-bold flex gap-1">
                                <hr className="border-2 border-teal-800 w-4 my-auto" />
                                <span>{data.author.name}</span>
                            </Link>


                            <h1 className="text-3xl lg:text-5xl mt-2 font-semibold !leading-tight">{data.title}</h1>

                            <div className="block">
                                <p className="my-4 lg:my-6 text-gray-400 inline-flex border-r border-[#ccc] pr-2">{dateFormat(data.created_at)} - <span className="uppercase ml-1">{data.type}</span></p>
                                <span className="inline-flex lg:ml-2 first:ml-0"><strong>Kategori:</strong> &nbsp;<Terms terms={data.categories} term_route={'category'} className="inline" classNameItem="!p-0 !border-0 hover:bg-transparent hover:!text-secondary" /></span>
                                <span className="inline-flex lg:ml-2 first:ml-0"><strong>Tag:</strong> &nbsp;<Terms terms={data.tags} term_route={'tag'} className="inline" classNameItem="!p-0 !border-0 hover:bg-transparent hover:!text-secondary" /></span>
                            </div>

                            <div className="*:mb-2 mt-2 leading-6 lg:leading-7">
                                <article className="prose lg:prose-xl" dangerouslySetInnerHTML={{ __html: data.content }}></article>
                            </div>
                        </div>

                        <AuthorShare 
                            title={data.title}
                            image={data.featuredImage}
                            permalink={`/${data.type}/${data.slug}`}
                        />
                    </div>
                </div>
            </div>
        </>
    )
}

export async function getServerSideProps(context) {
    const response = await serverApi.get('/archive/product/' + context.query.slug)

    if (response.status == 200 && response?.data?.data) {
        return { props: response.data };
    }

    return {
        props: {
            data: null
        }
    }
}