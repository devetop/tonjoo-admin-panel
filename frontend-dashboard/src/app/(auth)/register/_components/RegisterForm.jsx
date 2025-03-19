"use client"

import { GalleryVerticalEnd } from "lucide-react"

import { cn } from "@/lib/utils"
import { Button } from "@/components/ui/button"
import { useForm } from "react-hook-form"
import { InputWithError } from "../../../../components/molecules/InputWithError"
import Link from "next/link"

export function RegisterForm({
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
            <h1 className="text-xl font-bold">Create an account</h1>
            <div className="text-center text-sm">
              Already have an account?{" "}
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
                error={errors?.errors?.password}
                {...register('password_confirmation')}
              />
            </div>
            <div>
              <Button type="submit" className="w-full mb-2">
                Register
              </Button>
            </div>
          </div>
        </div>
      </form>
      <div className="text-balance text-center text-xs text-muted-foreground [&_a]:underline [&_a]:underline-offset-4 hover:[&_a]:text-primary  ">
        By clicking Sign up, you agree to our <Link href="/register/terms-of-service">Terms of Service</Link>{" "}
        and <Link href="/register/privacy-policy">Privacy Policy</Link>.
      </div>
    </div>
  )
}
