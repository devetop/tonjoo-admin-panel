"use client"

import { usePostResetPasswordMutation } from "@/app/(auth)/_api/authApi"
import { useParams } from "next/navigation"
import { ResetPasswordForm } from "./_components/ResetPasswordForm"
import { toast } from "sonner"

export default function PasswordResetPage() {
    const { token } = useParams()

    const [resetPassword, { error }] = usePostResetPasswordMutation()

    const formOnSubmitHandler = (payload) => {
        resetPassword({
            token, 
            ...payload
        })
            .unwrap()
            .then((res) => {
                res.is_success && toast.success(res.message);
            })
    }

    return (
        <div className="flex min-h-svh flex-col items-center justify-center gap-6 bg-background p-6 md:p-10">
            <div className="w-full max-w-sm">
                <ResetPasswordForm
                    onSubmit={formOnSubmitHandler}
                    errors={error}
                />
            </div>
        </div>
    )
}