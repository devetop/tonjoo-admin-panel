"use client"

import { usePageTitle } from '@/hooks/usePageTitle'
import { usePathname, useRouter } from 'next/navigation'
import { useEffect } from 'react'
import { useSelector } from 'react-redux'
import useAdminLoginWithCsrf from '../_hooks/useAdminLoginWithCsrf'
import { LoginForm } from '../_components/LoginForm'

export default function PageLoginAsAdmin() {

  usePageTitle('Login')

  const router = useRouter();
  const pathname = usePathname();
  const user = useSelector(state => state.session.userAdmin);
  const { loginWithCsrf, errors } = useAdminLoginWithCsrf();

  const formOnSubmitHandler = (payload) => {
    loginWithCsrf({ payload })
  };

  useEffect(() => {
    if (user) {
      router.push('/admin')
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
