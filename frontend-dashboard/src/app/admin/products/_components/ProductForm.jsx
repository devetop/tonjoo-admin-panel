"use client"

import { useGetProductCreateQuery } from "@/app/admin/products/_api/adminProductApi";
import Loading from "@/components/layout/loading";
import { InputWithError } from "@/components/molecules/InputWithError";
import { SelectWithError } from "@/components/molecules/SelectWithError";
import { TextareaWithError } from "@/components/molecules/TextareaWithError";
import { UploadImage } from "@/components/molecules/UploadImage";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Checkbox } from "@/components/ui/checkbox";
import { FormField, FormItem } from "@/components/ui/form";
import { Plus, Trash2Icon } from "lucide-react";
import { useId } from "react";
import { useFieldArray } from "react-hook-form";

export function MainContent({ register, errors }) {
  return (
    <Card>
      <CardHeader className={'border-b px-6 py-[14px] bg-head'}>
        <CardTitle className='text-p2'>Main Content</CardTitle>
      </CardHeader>
      <CardContent className="p-6 space-y-4">
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

      </CardContent>
    </Card>
  )
}

export function SeoContent({ register, errors }) {
  return (
    <Card>
      <CardHeader className={'border-b px-6 py-[14px] bg-head'}>
        <CardTitle className='text-p2'>SEO Content</CardTitle>
      </CardHeader>
      <CardContent className="p-6 space-y-4">
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
      </CardContent>
    </Card>
  )
}

export function ConfigContent({ errors, control }) {

  const { data, isLoading, isError, error } = useGetProductCreateQuery();

  if (isLoading) {
    return <Loading />
  }

  // if (isError) {
  //     throw error
  // }

  return (
    <Card>
      <CardContent className="space-y-4 p-6">
        <SelectWithError
          label={<span className="font-semibold">Status<span className="text-red-500">*</span></span>}
          placeholder="status"
          error={errors?.status}
          options={data?.status ?? []}
          control={control}
          name="status"
        />
        <SelectWithError
          label={<span className="font-semibold">Author</span>}
          placeholder="author"
          error={errors?.author_id}
          options={data?.author ?? []}
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
          options={data?.templates ?? []}
          control={control}
          name="meta.page_template"
        />
      </CardContent>
    </Card>
  )
}

function TermsConfig({ control, title, name, options }) {
  const id = useId()
  return (
    <Card>
      <CardContent>
        <FormField
          control={control}
          name={`term.${name}`}
          render={({ field }) => {
            return (
              <FormItem>
                <h2 className="font-bold">{title}</h2>
                {
                  Object.keys(options).map((key) => {
                    const _id = `term-${name}-${id}-${key}`
                    return (
                      <div className="flex items-center space-x-2" key={_id}>
                        <Checkbox
                          id={_id}
                          checked={field.value?.includes(parseInt(key))}
                          onCheckedChange={(checked) => {
                            return checked
                              ? field.onChange([...field.value, parseInt(key)])
                              : field.onChange(
                                field.value?.filter(
                                  (value) => value != key
                                )
                              )
                          }} />
                        <label
                          htmlFor={_id}
                          className="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        >
                          {options[key]}
                        </label>
                      </div>
                    )
                  })
                }
              </FormItem>
            )
          }}
        />
      </CardContent>
    </Card>
  )
}

export function TermsContent({ control }) {
  const { data, isLoading } = useGetProductCreateQuery();

  if (isLoading) {
    return <Loading />
  }

  return (
    <>
      <TermsConfig
        title={'Tags'}
        control={control}
        name={'product_tag'}
        options={data?.tags ?? []}
      />

      <TermsConfig
        title={'Categories'}
        control={control}
        name={'product_category'}
        options={data?.categories ?? []}
      />
    </>
  )
}

export function SlidersContent({ control, register, errors }) {
  const { fields, append, remove } = useFieldArray({ control, name: 'meta.sliders' })

  const defaultSlider = {
    url: "",
    name: "",
    desc: "",
  }

  return (
    <Card>
      <CardHeader className="flex flex-row justify-between align-center border-b px-6 py-[14px] bg-head">
        <CardTitle className='text-p2 flex items-center'>Sliders</CardTitle>
        <Button onClick={() => append(defaultSlider)} size="xs" type="button" className="!mt-0">Add Slider</Button>
      </CardHeader>
      <CardContent className="grid grid-cols-3 gap-3 mt-2">
        {
          fields.map((item, idx) => (
            <Card key={item.id}>
              <CardHeader className="flex flex-row justify-between mb-1">
                <CardTitle className="text-p2">{`Slider #${idx + 1}`}</CardTitle>
                <Button variant="destructive" size="2xs" onClick={() => remove(idx)} className="!mt-0"><Trash2Icon /></Button>
              </CardHeader>
              <CardContent className="flex flex-col gap-3">
                <UploadImage
                  placeholder={`slider image ${idx + 1}`}
                  error={errors?.[idx]?.url}
                  uploadPath={'/images/products/sliders'}
                  control={control}
                  name={`meta.sliders.${idx}.url`}
                />
                <InputWithError
                  label="Name"
                  isVertical={true}
                  placeholder="Enter name"
                  error={errors?.[idx]?.name}
                  {...register(`meta.sliders.${idx}.name`)}
                />
                <TextareaWithError
                  label="Description"
                  isVertical={true}
                  placeholder="Enter description"
                  error={errors?.[idx]?.desc}
                  {...register(`meta.sliders.${idx}.desc`)}
                />
              </CardContent>
            </Card>
          ))
        }
      </CardContent>
    </Card>
  )
}