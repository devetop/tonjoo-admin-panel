"use client"

import SomethingWentWrong from '@/components/molecules/SomethingWentWrong'
import { Button } from '@/components/ui/button'
import useLogout from '../(auth)/login/_hooks/useLogout'

export default function ErrorPage({ error, reset }) {
  const { logout } = useLogout()

  switch (error.status) {
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