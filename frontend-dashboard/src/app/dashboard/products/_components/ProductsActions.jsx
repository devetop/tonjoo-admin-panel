import Link from "next/link";
import ProductFilterAction from "./ProductFilterAction";
import { Button } from "@/components/ui/button";
import { useGetProductCategorySelectQuery, useGetProductFilterQuery, useGetProductTagSelectQuery } from "../_api/dashboardProductApi";
import Loading from "@/components/layout/loading";

export default function ProductsActions() {
    const { isLoading, data: categoryData, isError, error } = useGetProductCategorySelectQuery();
    const {data: tagData} = useGetProductTagSelectQuery();

    console.log(categoryData);
    

    if (isLoading) {
        return <Loading />;
    }

    // if (isError) {
    //     throw error;
    // }

    return (
        <div className="flex gap-2">
            <ProductFilterAction name={'category'} options={categoryData?.data} />
            <ProductFilterAction name={'tag'} options={tagData?.data} />
        </div>
    )
}