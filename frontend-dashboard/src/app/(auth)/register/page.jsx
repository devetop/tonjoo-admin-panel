"use client"

import { usePageTitle } from '@/hooks/usePageTitle'
import { usePathname, useRouter } from 'next/navigation'
import { useEffect } from 'react'
import { useSelector } from 'react-redux'
import { usePostRegisterMutation } from '../_api/authApi'
import { RegisterForm } from './_components/RegisterForm'

export default function PageLogin() {

  usePageTitle('Sign up')

  const router = useRouter();
  const pathname = usePathname();
  const user = useSelector(state => state.session.user);
  const [postRegister, { error: errors }] = usePostRegisterMutation();

  const formOnSubmitHandler = (payload) => {
    postRegister({ payload })
  };

  useEffect(() => {
    if (user) {
      router.push('/dashboard')
    }
  }, [user, pathname]);

  return (
    <div className="flex min-h-svh flex-col items-center justify-center gap-6 bg-background p-6 md:p-10">
      <div className="w-full max-w-sm">
        <RegisterForm
          onSubmit={formOnSubmitHandler}
          errors={errors}
        />
      </div>
    </div>
  )
}
