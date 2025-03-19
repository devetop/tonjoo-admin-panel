import { stripHtml } from "@/helper";
import Head from "next/head";

/**
 * @param data.title string
 * @param data.content string
 * @param data.featuredImage ?string
 * @returns jsx
 */
export default function SeoHead({ data }) {
    return (
        <Head>
            <title>{data.title?.substring(0, 70)}</title>
            <meta name="description" content={stripHtml(data.content)?.substring(0, 200)} />
            <meta property="og:title" content={data.title?.substring(0, 70)} />
            <meta property="og:description" content={stripHtml(data.content)?.substring(0, 200)} />
            <meta property="og:image" content={data?.featuredImage}></meta>
        </Head>
    )
}