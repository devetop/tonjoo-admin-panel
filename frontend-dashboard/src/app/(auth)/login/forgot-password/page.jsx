"use client"

import { usePageTitle } from '@/hooks/usePageTitle'
import { usePostForgotPasswordMutation } from '../../_api/authApi'
import { ForgotPasswordForm } from './_components/ForgotPasswordForm';
import { toast } from 'sonner';

export default function PageLogin() {

  usePageTitle('Forgot Password')

  const [postForgotPassword, { error: errors }] = usePostForgotPasswordMutation();

  const formOnSubmitHandler = (payload) => {
    postForgotPassword(payload)
      .unwrap()
      .then((res) => {
        res.success && toast.success(res.message);
      })
  };

  return (
    <div className="flex min-h-svh flex-col items-center justify-center gap-6 bg-background p-6 md:p-10">
      <div className="w-full max-w-sm">
        <ForgotPasswordForm
          onSubmit={formOnSubmitHandler}
          errors={errors}
        />
      </div>
    </div>
  )
}
