"use client"

import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { usePostCreateProductCategoryMutation } from "../../_api/adminProductApi";
import { useRouter } from "next/navigation";
import CategoryForm from "../_components/CategoryForm";

export default function ProductCategoryCreate() {

    const breadcrumbItems = [
        { label: "Dashboard", path: "/dashboard" },
        { label: "Products", path: "/dashboard/products" },
        { label: "Category", path: "/dashboard/products/categories" },
        { label: "Create", path: "/dashboard/products/categories/create" },
    ];

    const [ createCategory, { error } ] = usePostCreateProductCategoryMutation()
    const router = useRouter()

    const formOnSubmitHandler = async (data) => {
        await createCategory({data}).unwrap();        
        router.push('/admin/products/categories')
    }

    return (
        <div className="max-w-[300]">
            <MenuBreadcrumb items={breadcrumbItems} />
            <div className="mx-2">
                <h1 className="text-2xl my-2">Create Product Page</h1>
                <div className="grid grid-cols-12 gap-2">
                    <div className="col-span-9">
                        <div className="py-2 px-3 shadow border rounded-md">
                            <h2 className="text-xl mb-3">Form</h2>
                            <CategoryForm
                                onSubmit={formOnSubmitHandler}
                                errors={error}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}