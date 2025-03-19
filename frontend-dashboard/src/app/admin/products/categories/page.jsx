"use client"

import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { BaseTable } from "@/components/molecules/BaseTable";
import { categoryColumns } from "./categoryColumns";
import { useGetProductCategoryPaginateQuery } from "../_api/adminProductApi";
import { useSearchParams } from "next/navigation";
import Link from "next/link";
import { Button } from "@/components/ui/button";
import Loading from "@/components/layout/loading";
import { Card, CardContent } from "@/components/ui/card";
import { Plus } from "lucide-react";

export default function CategoryPage() {
    const searchParams = useSearchParams();
    const params = Object.fromEntries(searchParams)

    const breadcrumbs = [
        { label: 'Dashboard', path: '/admin' },
        { label: 'Products', path: '/admin/products' },
        { label: 'Categories', path: '/admin/products/categories' }
    ];

    const { data, isLoading, isError, error } = useGetProductCategoryPaginateQuery({ params })

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
                        Daftar Categories
                    </div>
                    <Link href={'/dashboard/products/create'}>
                        <Button className='font-semibold'>
                            {' '}
                            <Plus /> Tambah Categories
                        </Button>
                    </Link>
                </div>
                <MenuBreadcrumb items={breadcrumbs} />
            </div>
            <Card className='mt-6'>
                <CardContent>
                    <BaseTable
                        columns={categoryColumns}
                        data={data ?? []}
                    />
                </CardContent>
            </Card>
        </>
    )
}