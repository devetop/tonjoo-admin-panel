"use client"

import { clientApi } from "@/axios";
import Breadcrumbs from "@/components/Breadcrumbs";
import { baseUrlExchange, dateFormat, stripHtml } from "@/helper";
import dynamic from "next/dynamic";
import Head from "next/head";
import Image from "next/image";
import Link from "next/link";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";

export default function Detail() {
    const router = useRouter()

    const [data, setData] = useState(null)

    useEffect(() => {
        router.isReady && clientApi
            .get('/archive/post/' + router.query?.slug)
            .then((response) => {
                if (response.status == 200 && response?.data?.data) {
                    setData(response.data.data)
                }
            })
    }, [router.isReady, router.query])

    const DynamicPost = dynamic(
        () => import('@/components/post/' + data.post_metas.find((meta) => meta.key == 'page_template').value),
        { loading: () => <p>Loading...</p>, ssr: false }
    );

    return (
        <main>
            <Head>
                <title>{data?.title?.substring(0, 70)}</title>
                <meta name="description" content={stripHtml(data?.content)?.substring(0, 200)} />
                <meta property="og:title" content={data?.title?.substring(0, 70)} />
                <meta property="og:description" content={stripHtml(data?.content)?.substring(0, 200)} />
                <meta property="og:image" content={data?.featuredImage}></meta>
            </Head>

            {
                (router.isReady && data) && (
                    <DynamicPost data={data} />
                )
            }
        </main>
    )
}