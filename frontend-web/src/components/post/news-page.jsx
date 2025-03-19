import { baseUrlExchange, dateFormat } from "@/helper";
import Image from "next/image";
import Link from "next/link";
import Breadcrumbs from "../Breadcrumbs";
import Terms from "./terms";

export default function NewsPage({data}) {
    return (
        <div className="max-w-[900px] m-auto pt-7">
            <Breadcrumbs
                breadcrumbs={[
                    ['Post Archive', '/archive/post'],
                    [data.title]
                ]}
            />

            <div className="my-9">
                <div className="rounded-2xl overflow-hidden shadow-md">
                    <Image
                        src={baseUrlExchange(data.featuredImage)}
                        alt={`featured image for post ${data.title}`}
                        width={900}
                        height={600}
                    />
                </div>

                <div className="mt-8">
                    <Link href={`/archive/author/${data.author.name}`} className="text-teal-800 font-bold flex gap-1">
                        <hr className="border-2 border-teal-800 w-4 my-auto" />
                        <span>{data.author.name}</span>
                    </Link>

                    <Terms terms={data.categories} term_route={'category'} />
                    <Terms terms={data.tags} term_route={'tag'} />

                    <h1 className="text-5xl mt-4 font-semibold">{data.title}</h1>
                    <h1>page-template : news-page</h1>

                    <p className="mt-8 text-gray-400">Created at : {dateFormat(data.created_at)}</p>
                    <p className="text-gray-400">Published at : {dateFormat(data.post_metas.find(meta=>meta.key == 'release_date').value)}</p>

                    <div dangerouslySetInnerHTML={{ __html: data.content }}></div>
                </div>

                <div className="my-8 py-8 border-y border-gray-300 flex">
                    <div className="w-[45%]">
                        <h2 className="font-semibold text-2xl">Media Author</h2>
                    </div>
                    <div className="w-[55%]">
                        <h2 className="font-semibold text-2xl">Bagikan ke</h2>
                        <div className="flex justify-between">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}