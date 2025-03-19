"use client"

import { InputWithError } from "@/components/molecules/InputWithError";
import { Button } from "@/components/ui/button";
import { Card, CardHeader, CardContent, CardTitle } from "@/components/ui/card";
import Link from "next/link";
import { useForm } from "react-hook-form"

export default function ProductForm({ errors, onSubmit = (data) => console.log(data) }) {

    const { handleSubmit, register } = useForm({
        defaultValues: {
            title: '',
            slug: '',
            content: '',
            status: '',
        }
    });

    return (
        <form
            className='mt-6 grid grid-cols-12 gap-4'
            onSubmit={handleSubmit(onSubmit)}
        >
            <div className='col-span-12 lg:col-span-9 grid gap-4 auto-rows-max'>
                <Card>
                    <CardHeader className={'border-b px-6 py-[14px] bg-head'}>
                        <CardTitle className='text-p2'>Detail Product</CardTitle>
                    </CardHeader>
                    <CardContent className='space-y-4 p-6'>
                        <InputWithError
                            formClass='grid grid-cols-7'
                            inputClass='col-span-6'
                            label="Title"
                            placeholder="title"
                            error={errors?.errors?.title}
                            {...register('title')}
                        />
                        <InputWithError
                            formClass='grid grid-cols-7'
                            inputClass='col-span-6'
                            label="Slug"
                            placeholder="slug"
                            error={errors?.errors?.slug}
                            {...register('slug')}
                        />
                    </CardContent>
                </Card>
            </div>
            <div className='col-span-12 lg:col-span-3 flex-col-reverse lg:flex-col gap-4 auto-rows-max'>
                <Card>
                    <CardHeader className={'border-b px-6 py-[14px] bg-head'}>
                        <CardTitle className='text-p2'>Aksi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className='flex space-x-2 mt-5'>
                            <Link href={'/mahasiswa/pasien'} className='flex-1'>
                                <Button
                                    variant='outline-primary'
                                    type='button'
                                    className='w-full'
                                >
                                    Cancel
                                </Button>
                            </Link>
                            <div className='flex-1'>
                                <Button className='w-full'>Save</Button>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </form>
    )
}