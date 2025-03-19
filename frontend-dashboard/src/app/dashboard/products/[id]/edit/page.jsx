"use client"

import MenuBreadcrumb from "@/components/menu-breadcrumb"
import { useParams } from "next/navigation"

export default function ProductEdit() {
    const { id } = useParams()

    const breadcrumbItems = [
        { label: "Dashboard", path: "/dashboard" },
        { label: "Products", path: "/dashboard/products" },
        { label: "Edit" },
    ];

    return (
        <div className="max-w-[1200]">
            <MenuBreadcrumb items={breadcrumbItems} />
            <div className="m-3 p-4 shadow-md border rounded-md">
                <h1>edit produk {id}</h1>
            </div>
        </div>
    )
}