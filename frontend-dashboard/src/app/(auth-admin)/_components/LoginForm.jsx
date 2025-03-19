"use client"

import { GalleryVerticalEnd } from "lucide-react"

import { cn } from "@/lib/utils"
import { Button } from "@/components/ui/button"
import { useForm } from "react-hook-form"
import { InputWithError } from "../../../components/molecules/InputWithError"
import Link from "next/link"

export function LoginForm({
  className,
  onSubmit,
  errors,
  ...props
}) {

  const { handleSubmit, register } = useForm({
    defaultValues: {
      email: '',
      password: '',
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
            <h1 className="text-2xl font-bold">Login as Admin</h1>
          </div>
          <div className="flex flex-col gap-6">
            <div className="grid gap-2">
              <InputWithError
                isVertical={true}
                label="Email"
                type="email"
                placeholder="m@example.com"
                error={errors?.errors?.email}
                {...register('email')}
              />
              <InputWithError
                isVertical={true}
                label="Password"
                type="password"
                placeholder="password"
                error={errors?.errors?.password}
                {...register('password')}
              />
            </div>
            <div>
              <Button type="submit" className="w-full mb-2">
                Login
              </Button>
              <Link href={'/login'}>
                <Button type="button" variant="outline" className="w-full">
                  Login as User
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </form>
    </div>
  )
}
