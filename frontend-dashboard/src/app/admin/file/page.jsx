"use client"

import PrivateUpload from "@/app/admin/file/_components/PrivateUpload";
import PublicUpload from "@/app/admin/file/_components/PublicUpload";
import MenuBreadcrumb from "@/components/menu-breadcrumb";


export default function FilePage() {
    const breadcrumbs = [
        { label: 'Dashboard', path: '/dashboard' },
        { label: 'File', path: '/dashboard/file' }
    ];

    return (
        <div>
            <div className='flex justify-between items-center '>
                <div className='flex items-center space-x-3'>
                    <div className='text-h5 font-bold tracking-tight'>
                        File
                    </div>
                </div>
                <MenuBreadcrumb items={breadcrumbs} />
            </div>

            <div className="flex gap-6 mt-6">
                <PrivateUpload />
                <PublicUpload />
            </div>
        </div>
    )
}