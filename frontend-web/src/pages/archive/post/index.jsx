"use client";

import { clientApi } from "@/axios";
import Header from "@/components/archive/header";
import PostsList from "@/components/archive/postsList";
import { setObjectQuery } from "@/helper";
import classNames from "classnames";
import Head from "next/head";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";

export default function Post() {
    const router = useRouter();
    const [posts, setPosts] = useState([]);
    const [tags, setTags] = useState([]);
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        clientApi
            .get('/archive/post', {
                params: router.query
            })
            .then((response) => {
                if (response.status == 200 && response?.data?.data) {
                    const {
                        posts: _posts,
                        tags: _tags,
                        categories: _categories
                    } = response?.data?.data;

                    setPosts(_posts.data);
                    setTags(_tags);
                    setCategories(_categories);
                }
            })
    }, [router])

    const onCategoryChangeHandler = (slug) => {
        let newQuery = { ...router.query };
        newQuery.category = slug;
        router.push({
            pathname: router.pathname,
            query: newQuery,
        });
    }
    const onTagChangeHandler = (slug) => {
        const newQuery = setObjectQuery(router.query, 'tag[]', slug)
        router.push({
            pathname: router.pathname,
            query: newQuery,
        });
    }

    return (
        <>
            <Head>
                <title>Post Archive</title>
                <meta name="keywords" content="tap, post, archive" />
                <meta name="description" content="ini adalah halaman post archive" />
            </Head>

            <div className="bg-[#f2f4f7] min-h-[100vh] pb-8 lg:pb-14">

                <Header
                    breadcrumbs={['Home', 'Post']}
                    title={'Post Archive'}
                    subtitle={'a List of Post'}
                />

                <nav className="block max-lg:whitespace-nowrap lg:flex gap-2 lg:justify-center bg-white shadow-sm max-lg:overflow-auto">
                    <button className="py-4 px-6 border-b-4 border-b-transparent inline-block max-lg:whitespace-normal lg:block text-lg transition-colors duration-300" onClick={() => onCategoryChangeHandler('')}>All</button>
                    {
                        categories.map((cat, i) => (
                            <button key={i} className={classNames("py-4 px-6 border-b-4 border-b-transparent inline-block max-lg:whitespace-normal lg:block text-lg transition-colors duration-300", {
                                'font-bold border-b-4  !border-b-secondary': (router.query?.category == cat.slug),
                                'font-bold border-b-4  !border-b-secondary': (router.query?.category == cat.slug),
                            })} onClick={() => onCategoryChangeHandler(cat.slug)}>{cat.name}</button>
                        ))
                    }
                </nav>
                <nav className="block max-lg:whitespace-nowrap lg:flex gap-2 max-lg:px-4 lg:mx-10 lg:justify-center my-8 lg:my-10 max-lg:pb-3 max-lg:overflow-auto">
                    <button className="py-2 px-4 rounded-full bg-white inline-block max-lg:whitespace-normal lg:block text-lg transition-colors duration-300 mr-2 last:mr-0" onClick={() => onTagChangeHandler('')}>All</button>
                    {
                        tags.map((tag, i) => (
                            <button key={i} className={classNames("py-2 px-4 rounded-full bg-white inline-block max-lg:whitespace-normal lg:block  text-lg transition-colors duration-300 mr-2 last:mr-0", {
                                '!bg-secondary text-white': router.query['tag[]']?.includes(tag.slug),
                                '!bg-secondary text-white': router.query['tag[]']?.includes(tag.slug),
                            })} onClick={() => onTagChangeHandler(tag.slug)}>{tag.name}</button>
                        ))
                    }
                </nav>

                <div className="container m-auto pb-10">
                    <PostsList posts={posts} />
                </div>

            </div>

        </>
    )
}