"use client"

import { InputWithError } from "@/components/molecules/InputWithError"
import { TextareaWithError } from "@/components/molecules/TextareaWithError"
import { UploadImage } from "@/components/molecules/UploadImage"
import { Button } from "@/components/ui/button"
import { useFieldArray } from "react-hook-form"

export function SlidersContent({ control, register, errors }) {
    const { fields, append, remove } = useFieldArray({ control, name: 'meta.sliders' })

    const defaultSlider = {
        url: "",
        name: "",
        desc: "",
    }

    return (
        <div className="shadow-md border rounded-md p-4">
            <div className="flex justify-between align-middle">
                <h2 className="font-semibold">Sliders</h2>
                <Button onClick={() => append(defaultSlider)} size="xs" type="button">Add Slider</Button>
            </div>
            <div className="grid grid-cols-3 gap-2 mt-2">
                {
                    fields.map((item, idx) => (
                        <div key={item.id} className="border rounded-md p-2">
                            <div className="flex justify-between mb-1">
                                <h3>{`Slider #${idx + 1}`}</h3>
                                <Button size="2xs" onClick={() => remove(idx)}>remove</Button>
                            </div>
                            <UploadImage
                                placeholder={`slider image ${idx + 1}`}
                                error={errors?.[idx]?.url}
                                uploadPath={'/images/products/sliders'}
                                control={control}
                                name={`meta.sliders.${idx}.url`}
                            />
                            <InputWithError
                                label="Name"
                                placeholder="Enter name"
                                error={errors?.[idx]?.name}
                                {...register(`meta.sliders.${idx}.name`)}
                            />
                            <TextareaWithError
                                label="Description"
                                placeholder="Enter description"
                                error={errors?.[idx]?.desc}
                                {...register(`meta.sliders.${idx}.desc`)}
                            />
                        </div>
                    ))
                }
            </div>
        </div>
    )
}