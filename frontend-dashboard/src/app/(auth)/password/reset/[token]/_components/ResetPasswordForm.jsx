"use client"

import { GalleryVerticalEnd } from "lucide-react"

import { cn } from "@/lib/utils"
import { Button } from "@/components/ui/button"
import { useForm } from "react-hook-form"
import Link from "next/link"
import { InputWithError } from "@/components/molecules/InputWithError"
import { useSearchParams } from "next/navigation"

export function ResetPasswordForm({
    className,
    onSubmit,
    errors,
    ...props
}) {
    const searchParams = useSearchParams()
    const email = searchParams.get('email')

    const { handleSubmit, register } = useForm({
        defaultValues: {
            email,
            password: '',
            password_confirmation: '',
        }
    })

    return (
        <div className={cn("flex flex-col gap-6", className)} {...props}>
            <form onSubmit={handleSubmit(onSubmit)}>
                <div className="flex flex-col gap-6">
                    <div className="flex flex-col items-center gap-2">
                        <a
                            href="#"
                            className="flex flex-col items-center gap-2 font-medium"
                        >
                            <div className="flex h-8 w-8 items-center justify-center rounded-md">
                                <GalleryVerticalEnd className="size-6" />
                            </div>
                            <span className="sr-only">Tonjoo.</span>
                        </a>
                        <h1 className="text-xl font-bold">Reset your password</h1>
                        <div className="text-center text-sm">
                            Have remembered your password?{" "}
                            <Link href="/login" className="underline underline-offset-4">
                                Login
                            </Link>
                        </div>
                    </div>
                    <div className="flex flex-col gap-6">
                        <div className="grid gap-2">
                            <InputWithError
                                label="Email"
                                type="email"
                                placeholder="m@example.com"
                                error={errors?.errors?.email}
                                readOnly
                                {...register('email')}
                            />
                            <InputWithError
                                label="Password"
                                type="password"
                                placeholder="password"
                                error={errors?.errors?.password}
                                {...register('password')}
                            />
                            <InputWithError
                                label="Password Confirmation"
                                type="password"
                                placeholder="password confirmation"
                                error={errors?.errors?.password_confirmation}
                                {...register('password_confirmation')}
                            />
                        </div>
                        <div>
                            <Button type="submit" className="w-full mb-2">
                                Reset Password
                            </Button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    )
}
