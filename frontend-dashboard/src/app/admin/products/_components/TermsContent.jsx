"use client"

import Loading from "@/components/layout/loading"
import { Checkbox } from "@/components/ui/checkbox"
import { FormField, FormItem } from "@/components/ui/form"
import { useGetProductCreateQuery } from "../_api/adminProductApi"
import { useId } from "react"

function TermsConfig({ control, title, name, options }) {
    const id = useId()
    return (
        <div className="shadow-md border rounded-md p-4 grid gap-3">
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
        </div>
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
                options={data.tags}
            />

            <TermsConfig
                title={'Categories'}
                control={control}
                name={'product_category'}
                options={data.categories}
            />
        </>
    )
}