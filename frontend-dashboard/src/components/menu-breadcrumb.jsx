import React from 'react'
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import Link from 'next/link';

export default function MenuBreadcrumb({ items }) {
  return (
    <div className="px-4 py-2">
      <Breadcrumb>
        <BreadcrumbList>
          {items.map((item, index) => {
            const isLast = index === items.length - 1;
            return (
              <div key={item.label} className="flex items-center">
                {index > 0 && <BreadcrumbSeparator className={'mr-2'} />}
                <BreadcrumbItem>
                  {isLast ? (
                    <BreadcrumbPage>{item.label}</BreadcrumbPage>
                  ) : (
                    <Link href={item.path || "#"}>
                      {item.label}
                    </Link>
                  )}
                </BreadcrumbItem>
              </div>
            );
          })}
        </BreadcrumbList>
      </Breadcrumb>
    </div>
  )
}
