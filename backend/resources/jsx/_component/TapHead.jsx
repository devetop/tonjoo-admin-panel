import { Head, usePage } from "@inertiajs/react"
import React from "react"

export default function TapHead({ title, ...props }) {
    const { title: web_title, description } = usePage().props.head

    return (
        <Head title={`${title} - ${web_title}`} {...props}>
            <meta name="description" content={description}/>
        </Head>
    )
}