"use client"

import * as React from "react"

import { NavMain } from "@/components/layout/nav-main"
import { TeamSwitcher } from "@/components/layout/team-switcher"
import {
  Sidebar,
  SidebarContent,
  SidebarHeader,
  SidebarRail,
} from "@/components/ui/sidebar"
import { dashboardTypeConfig } from "@/config/dashboard-type-config"

export function AppSidebar({
  sidebarItems = [],
  ...props
}) {
  return (
    (<Sidebar collapsible="icon" {...props}>
      <SidebarHeader>
        <TeamSwitcher teams={dashboardTypeConfig} />
      </SidebarHeader>
      <SidebarContent>
        <NavMain items={sidebarItems} />
      </SidebarContent>
      <SidebarRail />
    </Sidebar>)
  );
}
