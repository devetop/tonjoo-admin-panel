"use client"

import NavUserActions from "@/app/dashboard/_components/NavUserActions";
import { AppSidebar } from "@/components/layout/app-sidebar"
import Header from "@/components/layout/header";
import Loading from "@/components/layout/loading";
import {
  SidebarInset,
  SidebarProvider,
} from "@/components/ui/sidebar"
import { NavigationMenus } from "@/config/navigation-config";
import { setIsLoading } from "@/lib/redux/slices/session-slice";
import { usePathname, useRouter } from "next/navigation";
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";


export default function DashboardLayout({ children }) {

  const dispatch = useDispatch()
  const pathname = usePathname()
  const router = useRouter()
  const { user, isLoading } = useSelector(state => state.session);

  useEffect(() => {
    if (!user) {
      dispatch(setIsLoading(false))
      router.push(`/login?redirect=${pathname}`)
    }
  }, [pathname, isLoading, user])

  if (!user || isLoading) {
    return <Loading />
  }

  return (
    (
      <SidebarProvider>
        <AppSidebar sidebarItems={NavigationMenus.dashboard} />
        <SidebarInset>
          <Header user={user} actions={<NavUserActions />} />
          <div className="flex-1 p-4 pt-2">
            {children}
          </div>
        </SidebarInset>
      </SidebarProvider>
    )
  );
}
