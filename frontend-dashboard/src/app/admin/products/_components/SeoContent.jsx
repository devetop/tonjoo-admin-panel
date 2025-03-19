"use client"

import { InputWithError } from "@/components/molecules/InputWithError";

export function SeoContent({ register, errors }) {
    return (
        <div className="border rounded-md shadow-md p-4 grid gap-3">
            <InputWithError
                label={<span className="font-semibold">Meta Title</span>}
                placeholder="meta title"
                error={errors?.meta?.meta_title}
                {...register('meta.meta_title')}
            />
            <InputWithError
                label={<span className="font-semibold">Meta Description</span>}
                placeholder="meta description"
                error={errors?.meta?.meta_description}
                {...register('meta.meta_description')}
            />
        </div>
    )
}
