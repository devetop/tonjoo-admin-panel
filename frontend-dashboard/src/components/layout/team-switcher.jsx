"use client"

import * as React from "react"

import {
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
} from "@/components/ui/sidebar"
import Image from "next/image"
import { FE_BASE_TITLE } from "@/config"

export function TeamSwitcher({
  teams
}) {
  return (
    (<SidebarMenu>
      <SidebarMenuItem>
        <SidebarMenuButton
          size="lg"
          className="data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground">
          <div
            className="flex aspect-square size-8 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground">
            <Image src={'/assets/images/tonjoo-favicon.webp'} width={30} height={30} alt="main logo images" />
          </div>
          <div className="grid flex-1 text-left text-sm leading-tight">
            <span className="truncate font-semibold">
              { FE_BASE_TITLE }
            </span>
            <span className="truncate text-xs">Dashboard</span>
          </div>
        </SidebarMenuButton>
      </SidebarMenuItem>
    </SidebarMenu>)
  );
}
