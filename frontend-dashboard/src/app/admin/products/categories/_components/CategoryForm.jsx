"use client"

import { InputWithError } from "@/components/molecules/InputWithError";
import { Button } from "@/components/ui/button";
import { useForm } from "react-hook-form"

const _defaultValues = {
    id: "",
    name: "",
};

export default function CategoryForm({ 
    errors, 
    onSubmit = (data) => console.log(data), 
    defaultValues = _defaultValues 
}) {
    const { handleSubmit, register } = useForm({
        defaultValues
    });

    return (
        <form onSubmit={handleSubmit(onSubmit)}>
            <InputWithError 
                label="Name"
                placeholder="name"
                error={errors?.errors?.name}
                {...register('name')}
            />

            <div className="text-right mt-4">
                <Button variant="outline">Submit</Button>
            </div>
        </form>
    )
}