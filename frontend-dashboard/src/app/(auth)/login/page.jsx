"use client"

import { LoginForm } from '@/app/(auth)/login/_components/LoginForm'
import useLoginWithCsrf from '@/app/(auth)/login/_hooks/useLoginWithCsrf'
import { usePageTitle } from '@/hooks/usePageTitle'
import { usePathname, useRouter } from 'next/navigation'
import { useEffect } from 'react'
import { useSelector } from 'react-redux'

export default function PageLogin() {

  usePageTitle('Login')

  const router = useRouter();
  const pathname = usePathname();
  const user = useSelector(state => state.session.user);
  const { loginWithCsrf, errors } = useLoginWithCsrf();

  const formOnSubmitHandler = (payload) => {
    loginWithCsrf({ payload })
  };

  useEffect(() => {
    if (user) {
      router.push('/dashboard')
    }
  }, [user, pathname]);

  return (
    <div className="flex min-h-svh flex-col items-center justify-center gap-6 bg-background p-6 md:p-10">
      <div className="w-full max-w-sm">
        <LoginForm
          onSubmit={formOnSubmitHandler}
          errors={errors}
        />
      </div>
    </div>
  )
}
