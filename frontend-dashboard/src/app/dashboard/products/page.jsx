"use client"

import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { useGetProductPaginateQuery } from "./_api/dashboardProductApi";
import { BaseTable } from "@/components/molecules/BaseTable";
import { productColumns } from "./_datatable/productColumns";
import { useSearchParams } from "next/navigation";
import ProductsActions from "./_components/ProductsActions";
import Loading from "@/components/layout/loading";
import Link from "next/link";
import { Plus } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent } from "@/components/ui/card";

export default function ProductPage() {
    const searchParams = useSearchParams();
    let params = Object.fromEntries(searchParams);

    const breadcrumbItems = [
        { label: "Dashboard", path: "/dashboard" },
        { label: "Products", path: "/dashboard/products" },
    ];

    const { data, isLoading, isError, error } = useGetProductPaginateQuery({ params });

    if (isLoading) {
        return <Loading />;
    }

    if (isError) {
        throw error;
    }

    return (
        <>
            <div className='flex justify-between items-center '>
                <div className='flex items-center space-x-3'>
                    <div className='text-h5 font-bold tracking-tight'>
                        Daftar Proudct
                    </div>
                    <Link href={'/dashboard/products/create'}>
                        <Button className='font-semibold'>
                            {' '}
                            <Plus /> Tambah Product
                        </Button>
                    </Link>
                </div>
                <MenuBreadcrumb items={breadcrumbItems} />
            </div>
            <Card className='mt-6'>
                <CardContent>
                    <BaseTable
                        columns={productColumns}
                        actions={<ProductsActions />}
                        data={data?.data?.products?.data}
                        {...data?.data}
                    />
                </CardContent>
            </Card>
        </>
    )
}