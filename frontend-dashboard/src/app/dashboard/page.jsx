import MenuBreadcrumb from "@/components/menu-breadcrumb";
import { Card, CardContent } from "@/components/ui/card";

export default function Page() {
  const breadcrumbItems = [
    { label: "Dashboard", path: "/dashboard" },

  ];
  return (
    <div>
      <div className='flex justify-between items-center '>
        <div className='flex items-center space-x-3'>
          <div className='text-h5 font-bold tracking-tight'>
            Dashboard
          </div>
        </div>
        {/* <MenuBreadcrumb items={breadcrumbItems} /> */}
      </div>
      <Card className='mt-6'>
        <CardContent className='p-6'>
          <p className='text-p2'>Welcome</p>
        </CardContent>
      </Card>
    </div>
  );
}
