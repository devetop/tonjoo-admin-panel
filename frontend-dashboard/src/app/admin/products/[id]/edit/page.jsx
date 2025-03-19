"use client"

import {  useGetProductEditQuery, usePostProductUpdateMutation } from "@/app/admin/products/_api/adminProductApi";
import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { useParams, useRouter } from "next/navigation";
import { toast } from "sonner";
import ProductForm from "../../_components/templates/ProductForm";

export default function ProductEdit() {

    const { id } = useParams()

    const breadcrumbItems = [
        { label: "Dashboard", path: "/admin" },
        { label: "Products", path: "/admin/products" },
        { label: "Edit", path: `/admin/products/${id}/edit` },
    ];

    const [editCategory, { error }] = usePostProductUpdateMutation()
    const { isError, error: getEditError, data } = useGetProductEditQuery({id},{skip:!id} );

    const router = useRouter()

    if (isError) {
        throw getEditError;
    }

    const onSubmitHandler = async (data) => {
        const resData = await editCategory({ data, id }).unwrap();
        resData?.message && toast.success(resData?.message);
        router.push('/admin/products');
    }

    return (
        <div className="max-w-[1200]">
            <MenuBreadcrumb items={breadcrumbItems} />

            <ProductForm mode="edit" onSubmitHandler={onSubmitHandler} defaultValues={data} error={error}/>
        </div>
    )
}