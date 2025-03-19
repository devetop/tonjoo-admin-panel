"use client"

import SomethingWentWrong from '@/components/molecules/SomethingWentWrong'
import { Button } from '@/components/ui/button'
import useAdminLogout from '../(auth-admin)/_hooks/useAdminLogout'

export default function ErrorPage({ error, reset }) {
  const { logout } = useAdminLogout()
  
  switch (error.status) {
    case 403:
      return (
        <div>
          <h1>{error?.data?.message}</h1>
        </div>
      )
    case 401:
      return (
        <div>
          <h1>{error?.data?.message}</h1>
          <Button size="xs" onClick={logout}>To Login Page</Button>
        </div>
      )
    default:
      return (
        <div>
          <SomethingWentWrong />
        </div>
      )
  }
}