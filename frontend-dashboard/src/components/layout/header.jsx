"use client"

import {
  SidebarTrigger,
} from "@/components/ui/sidebar"
import { NavUser } from "./nav-user"
import { Input } from "@/components/ui/input"
import { PanelLeft, Search } from "lucide-react"
import Notifications from "./Notifications"
import Messages from "./Messages"

export default function Header({ user, actions }) {
  return (
    <header className='flex justify-between h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12 border-b bg-sidebar'>
      <div className='flex items-center gap-2 px-4'>
        <SidebarTrigger className='-ml-1 text-white'>
          <PanelLeft />
        </SidebarTrigger>
      </div>
      <div className='flex items-center space-x-4 pr-4'>
        <div className='relative'>
          <div className="hidden sm:flex lg:w-64">
            <Input type="text" placeholder="Search" className='pl-8
        h-8 w-full bg-background shadow-none focus-visible:ring-2 focus-visible:ring-sidebar-ring' />
            <Search className="pointer-events-none absolute left-2 top-1/2 size-4 -translate-y-1/2 select-none opacity-50" />
          </div>
        </div>
        <Messages/>
        <Notifications/>
        <NavUser
          user={user}
          actions={actions}
        />
      </div>
    </header>
  )
}
