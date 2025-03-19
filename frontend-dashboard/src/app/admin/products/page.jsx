"use client"

import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { useGetProductFilterQuery, useGetProductPaginateQuery } from "@/app/admin/products/_api/adminProductApi";
import { BaseTable } from "@/components/molecules/BaseTable";
import { productColumns } from "./_datatable/productColumns";
import { useSearchParams } from "next/navigation";
import Link from "next/link";
import { Button } from "@/components/ui/button";
import BaseTableFilter from "@/components/molecules/BaseTableFilter";
import Loading from "@/components/layout/loading";
import { ErrorBoundary } from "@/components/molecules/ErrorBoundary";
import { Plus } from "lucide-react";
import { Card, CardContent } from "@/components/ui/card";

function Action() {
    const { data: filter, isLoading, isError, error } = useGetProductFilterQuery();

    if (isLoading) {
        return <Loading />
    }

    if (isError) {
        throw error
    }

    return (
        <ErrorBoundary>
            <div className="flex gap-2">
                <BaseTableFilter name={'author'} options={filter?.authors ?? []} />
                <BaseTableFilter name={'category'} options={filter?.categories ?? []} />
                <BaseTableFilter name={'tag'} options={filter?.tags ?? []} />
                {/* <Link href={'/admin/products/create'}>
                    <Button variant="outline" size="xs">Create</Button>
                </Link> */}
            </div>
        </ErrorBoundary>
    )
}

export default function ProductPage() {
    const searchParams = useSearchParams();
    const params = Object.fromEntries(searchParams);

    const breadcrumbItems = [
        { label: "Dashboard", path: "/admin" },
        { label: "Products", path: "/admin/products" },
    ];

    const { data: paginated, isLoading, isError, error } = useGetProductPaginateQuery({ params });

    if (isLoading) {
        return <Loading />
    }
    

    // if (isError) {
    //     throw error
    // }

    return (
        <>
            <div className='flex justify-between items-center '>
                <div className='flex items-center space-x-3'>
                    <div className='text-h5 font-bold tracking-tight'>
                        Daftar Proudct
                    </div>
                    <Link href={'/admin/products/create'}>
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
                        actions={<Action />}
                        data={paginated?.data ?? []}
                        // {...paginated?.data}
                    />
                </CardContent>
            </Card>
        </>
    )
}