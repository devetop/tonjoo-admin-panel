import { serverApi } from "@/axios";
import PostsList from "@/components/archive/postsList";
import Image from "next/image";

export default function AuthorName({data}) {
    return (
        <main>
            <div className="container max-w-[800px] mx-auto">
                <div className="flex gap-4 align-middle items-center    ">
                    <div>
                        <Image
                            src={data.author.avatar}
                            height={100}
                            width={100}
                            alt={`${data.author.name} avatar image`}
                        />
                    </div>
                    <div>
                        <p>{data.author.name}</p>
                        <p>{data.author.email}</p>
                    </div>
                </div>

                <PostsList posts={data.posts.data} />
            </div>
        </main>
    )
}

export async function getServerSideProps(context) {
    const response = await serverApi.get('/archive/author/' + context.query.name)

    if (response.status == 200 && response?.data?.data) {
        return { props: response.data };
    }

    return {
        props: {
            data: null
        }
    }
}