import ProductForm from "@/app/dashboard/products/_components/ProductForm";
import MenuBreadcrumb from "@/components/menu-breadcrumb";

export default function ProductCreate() {

    const breadcrumbItems = [
        { label: "Dashboard", path: "/dashboard" },
        { label: "Products", path: "/dashboard/products" },
        { label: "Create", path: "/dashboard/products/create" },
    ];

    return (
        <>
            <div className='flex justify-between items-center '>
                <div className='flex items-center space-x-3'>
                    <div className='text-h5 font-bold tracking-tight'>
                        Tambah Product
                    </div>
                </div>
                <MenuBreadcrumb items={breadcrumbItems} />
            </div>
            <ProductForm />
        </>
    )
}