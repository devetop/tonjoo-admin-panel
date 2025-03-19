import Link from "next/link"
// import { OulinedButtonLink } from "../button"
import Image from "next/image"
import { FaArrowRightLong } from "react-icons/fa6";
import { baseUrlExchange } from "@/helper";


export default function PostsList({posts}) {

    
    return (
        <div className="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-8">
            {
                posts.map((post, i) => {
                    return (
                        <Link href={`/${post.type}/${post.slug}`} key={i} className="card group">
                            <div className="border h-full rounded-xl lg:rounded-3xl overflow-hidden flex flex-col bg-white">

                                <div className="relative overflow-hidden">

                                    <Image 
                                        src={baseUrlExchange(post.featuredImage)} 
                                        width={500} 
                                        height={500} 
                                        alt={`image of ${post.title}`}
                                        style={{objectFit: 'cover'}}
                                        className="hover:scale-110 transition-transform duration-300 max-lg:h-[150px] object-cover"
                                    />
                                </div>

                                <div className="p-4 relative">
                                    <p className="text-blue-500 font-semibold mb-2">- {post.author.name}</p>
                                    <h1 className="mb-2 text-lg lg:text-xl font-bold max-lg:leading-6 group-hover:text-secondary transition-colors duration-200">{post.title}</h1>
                                    <p className="hidden lg:block">{post.subTitle || post.title}</p>

                                </div>
                                <div className="mt-auto px-4 group">
                                    <div className="flex align-middle py-2 pb-4 items-center border-t border-slate-200">
                                        <span className="mr-2">Read more</span> 
                                        <i className="icon group-hover:translate-x-1 transition-transform duration-300">
                                            <FaArrowRightLong />
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </Link>
                    )
                })
            }
        </div>
    )
}