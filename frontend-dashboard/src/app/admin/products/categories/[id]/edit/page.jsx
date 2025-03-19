"use client"

import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { useParams, useRouter } from "next/navigation";
import { useGetEditProductCategoryQuery, usePostUpdateProductCategoryMutation } from "../../../_api/adminProductApi";
import CategoryForm from "../../_components/CategoryForm";
import Loading from "@/components/layout/loading";

export default function ProductCategoryEdit() {
    const breadcrumbItems = [
        { label: "Dashboard", path: "/admin" },
        { label: "Products", path: "/admin/products" },
        { label: "Category", path: "/admin/products/categories" },
        { label: "Edit", path: "/admin/products/categories/create" },
    ];

    const { id } = useParams()
    const [ updateCategory, { error: updateError } ] = usePostUpdateProductCategoryMutation()
    const { isLoading, data, isError, error } = useGetEditProductCategoryQuery({ id }, { skip: !id })
    const router = useRouter()

    const formOnSubmitHandler = async (data) => {
        await updateCategory({data, id}).unwrap();        
        router.push('/admin/products/categories')
    }

    if (isLoading) {
        return <Loading />
    }
    
    if (isError) {        
        throw error
    } 

    return (
        <div className="max-w-[900]">
            <MenuBreadcrumb items={breadcrumbItems} />
            <div className="mx-2">
                <h1 className="text-2xl my-2">Create Product Page</h1>
                <div className="grid grid-cols-12 gap-2">
                    <div className="col-span-9">
                        <div className="py-2 px-3 shadow border rounded-md">
                            <h2 className="text-xl mb-3">Form</h2>
                            <CategoryForm
                                onSubmit={formOnSubmitHandler}
                                errors={updateError}
                                defaultValues={data}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}