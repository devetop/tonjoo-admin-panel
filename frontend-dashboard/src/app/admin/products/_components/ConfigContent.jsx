"use client"

import Loading from "@/components/layout/loading";
import { useGetProductCreateQuery } from "../_api/adminProductApi";
import { SelectWithError } from "@/components/molecules/SelectWithError";
import { UploadImage } from "@/components/molecules/UploadImage";

export function ConfigContent({ errors, control }) {

    const { data, isLoading, isError, error } = useGetProductCreateQuery();

    if (isLoading) {
        return <Loading />
    }

    if (isError) {
        throw error
    }

    return (
        <div className="shadow-md border rounded-md p-4 grid gap-3">
            <SelectWithError
                label={<span className="font-semibold">Status<span className="text-red-500">*</span></span>}
                placeholder="status"
                error={errors?.status}
                options={data.status}
                control={control}
                name="status"
            />
            <SelectWithError
                label={<span className="font-semibold">Author</span>}
                placeholder="author"
                error={errors?.author_id}
                options={data.author}
                control={control}
                name="author_id"
            />
            <UploadImage
                label={<span className="font-semibold">Featured Image (960 x 720)</span>}
                placeholder="featured image"
                error={errors?.meta?.featured_image_url}
                uploadPath={'/images/products'}
                control={control}
                name={'meta.featured_image_url'}
            />
            <SelectWithError
                label={<span className="font-semibold">Template<span className="text-red-500">*</span></span>}
                placeholder="template"
                error={errors?.meta?.page_template}
                options={data.templates}
                control={control}
                name="meta.page_template"
            />
        </div>
    )
}