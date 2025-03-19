"use client";

import { clientApi } from "@/axios";
import HeadSection from "../HeadSection";
import PostsList from "@/components/archive/postsList";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";

export default function SectionMedia(props) {
    const router = useRouter();
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        clientApi
            .get('/archive/post', {
                params: router.query
            })
            .then((response) => {
                if (response.status == 200 && response?.data?.data) {
                    const {
                        posts: _posts
                    } = response?.data?.data;

                    setPosts(_posts.data.slice(0, 6));
                }
            })
    }, [router])

    return(
        <>

            <section className="bg-light py-10 lg:py-20">
                <div className="container">

                    <HeadSection 
                        title="Artikel Terbaru"
                        desc="Semua aktifitas Lipsum ada di sini"
                    />
                    
                    <PostsList posts={posts} />
                </div>
            </section>




        </>
    );
    
};
