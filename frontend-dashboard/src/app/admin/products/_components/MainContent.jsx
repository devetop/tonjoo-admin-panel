"use client"

import { InputWithError } from "@/components/molecules/InputWithError";
import { TextareaWithError } from "@/components/molecules/TextareaWithError";

export function MainContent({ register, errors }) {
    return (
        <div className="border rounded-md shadow-md p-4 grid gap-3">
            <InputWithError
                label={<span className="font-semibold">Title<span className="text-red-500">*</span></span>}
                placeholder="title"
                error={errors?.title}
                {...register('title')}
            />
            <InputWithError
                label={<span className="font-semibold">Sub Title</span>}
                placeholder="sub title"
                error={errors?.meta?.sub_title}
                {...register('meta.sub_title')}
            />
            <InputWithError
                label={<span className="font-semibold">Slug</span>}
                placeholder="slug"
                error={errors?.slug}
                {...register('slug')}
            />
            <TextareaWithError
                label={<span className="font-semibold">Content</span>}
                placeholder="content"
                error={errors?.content}
                {...register('content')}
            />
        </div>
    )
}