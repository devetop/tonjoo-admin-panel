import React from 'react';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Button } from '../ui/button';
import { Bell } from 'lucide-react';
import { Badge } from '../ui/badge';

export default function Notifications() {
  const count = 5;
  return (
    <div>
      <DropdownMenu>
        <DropdownMenuTrigger asChild>
          <div          
            className='relative text-sidebar-text cursor-pointer h-8 w-8 flex items-center'
            aria-label={`Notifications ${
              count ? `(${count} unread)` : ''
            }`}
          >
            <Bell className='h-6 w-6' />
            {count !== undefined && count > 0 && (
              <Badge
                variant='warning'
                className='absolute -top-2 -right-2 px-2 py-1 text-xs min-w-[20px] h-5'
              >
                {count > 99 ? '99+' : count}
              </Badge>
            )}
          </div>
        </DropdownMenuTrigger>
        <DropdownMenuContent
          className='w-[--radix-dropdown-menu-trigger-width] min-w-56 rounded-lg'
          side={'bottom'}
          align='end'
          sideOffset={4}
        >
          <DropdownMenuLabel className='p-0 font-normal'>
            <div className='flex items-center gap-2 px-1 py-1.5 text-left text-sm'>
              5 Notification
            </div>
          </DropdownMenuLabel>
          <DropdownMenuSeparator />
          <div className='flex items-center gap-2 px-1 py-1.5 text-left text-sm'>
              Notification
            </div>
        </DropdownMenuContent>
      </DropdownMenu>
    </div>
  );
}
