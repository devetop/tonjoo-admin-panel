"use client"

import { usePostProductCreateMutation } from "@/app/admin/products/_api/adminProductApi";
import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import Link from "next/link";
import { useRouter } from "next/navigation";
import { toast } from "sonner";
import ProductForm from "../_components/templates/ProductForm";

export default function ProductCreate() {
    const breadcrumbs = [
        { label: 'Dashboard', path: '/admin' },
        { label: 'Products', path: '/admin/products' },
        { label: 'Create', path: '/admin/products/create' },
    ];

    const router = useRouter()

    const [createProduct, { error }] = usePostProductCreateMutation();

    const onSubmitHandler = async (data) => {
        const resData = await createProduct({ data }).unwrap();
        if (resData?.message) {
            router.push('/admin/products');
            toast.success(resData?.message);
        }
    }

    return (
        <>
            <MenuBreadcrumb items={breadcrumbs} />
            <form className="m-3 grid grid-cols-12 gap-4" onSubmit={() => handleSubmit(onSubmitHandler)}>
                <div className="col-span-12 lg:col-span-9 grid gap-4 auto-rows-max">
                    <MainContent register={register} errors={error?.errors} />
                    <SeoContent register={register} errors={error?.errors} />
                    <SlidersContent register={register} control={control} errors={error?.meta?.sliders} />
                </div>
                <div className="col-span-12 lg:col-span-3 flex-col-reverse lg:flex-col gap-4 auto-rows-max">
                    <Card>
                        <CardHeader className={'border-b px-6 py-[14px] bg-head'}>
                            <CardTitle className='text-p2'>Action</CardTitle>
                        </CardHeader>
                        <CardContent>
                        <div className="grid grid-cols-2 gap-2">
                            <Link href={'/admin/products'}>
                                <Button variant="outline" type="button" className="w-full">Back</Button>
                            </Link>
                            <Button>Submit</Button>
                        </div>
                        </CardContent>
                    </Card>
                    <div className="grid gap-4 mt-6">
                        <ConfigContent
                            setFeaturedImageUrlValue={(newValue) => setValue('meta.featured_image_url', newValue)}
                            register={register}
                            control={control}
                            errors={error?.errors}
                        />
                        <TermsContent control={control} />
                    </div>
                </div>
            </form>
        </>
    )
}