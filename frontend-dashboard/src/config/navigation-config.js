import {
  File,
  Gauge,
  Settings,
  SquareChartGantt,
} from "lucide-react"

export const NavigationMenus = {
  dashboard: [
    {
      title: "Dashboard",
      url: "/dashboard",
      icon: Gauge,
    },
    {
      title: "Products",
      url: "/dashboard/products",
      icon: SquareChartGantt,
      isActive: true,
      items: [
        {
          title: "Create",
          url: "/dashboard/products/create",
        },
        {
          title: "List",
          url: "/dashboard/products",
        },
      ],
    },
    {
      title: 'Settings',
      url: '/dashboard/setting',
      icon: Settings
    },
  ],
  admin: [
    {
      title: 'Dashboard',
      url: '/admin',
      icon: Gauge
    },
    {
      title: "Products",
      icon: SquareChartGantt,
      isActive: true,
      items: [
        {
          title: "Create",
          url: "/admin/products/create",
        },
        {
          title: "List",
          url: "/admin/products",
        },
        {
          title: "Category",
          url: "/admin/products/categories",
        },
      ],
    },
    {
      title: 'Files',
      url: '/admin/file',
      icon: File
    }
  ]
}