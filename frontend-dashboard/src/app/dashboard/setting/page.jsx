import MenuBreadcrumb from '@/components/menu-breadcrumb';
import { Card, CardContent } from '@/components/ui/card';
import React from 'react'

export default function PageSetting() {
  const breadcrumbItems = [
    { label: "Dashboard", path: "/dashboard" },
    { label: "Settings", path: "/dashboard/settings" },
  ];
  return (
    <div>
      <div className='flex justify-between items-center '>
        <div className='flex items-center space-x-3'>
          <div className='text-h5 font-bold tracking-tight'>
            Settings
          </div>
        </div>
        <MenuBreadcrumb items={breadcrumbItems} />
      </div>
      <Card className='mt-6'>
        <CardContent className='p-6'>
          <p className='text-p2'>Settings</p>
        </CardContent>
      </Card>
    </div>
  )
}
