import { useState } from "react";
import { Head, Link, router } from "@inertiajs/react";
import ContentLayout from "../../_component/ContentLayout";
import {
  SectionHeader,
  SectionTitle,
} from "../../_component/SectionHeader";
import TableMaster from "../../_component/TableMaster";
import Button from "../../_component/Button";
import ProductsTable from "./Include/ProductsTable";
import ProductsTableHeader from "./Include/ProductsTableHeader";
import TapHead from "../../_component/TapHead";

export default function Index({ products, filters }) {
  const searchParams = new URLSearchParams(
    new URL(window.location.href).search
  );

  const [search, setSearch] = useState(searchParams.get("search") || "");
  const [params, setParams] = useState({
    search: searchParams.get("search") || "",
    perPage: searchParams.get("perPage") || "10",
    page: searchParams.get("page") || "1",
    status: searchParams.get('status') || "all",
    author: searchParams.get('author'),
    tag: searchParams.get('tag'),
    category: searchParams.get('category'),
  });

  const isFilterClearable = 
    (params.search && params.search.trim()) ||
    (params.perPage && params.perPage !== "10") ||
    (params.page && params.page !== "1") ||
    (params.status && params.status !== "all") ||
    (params.author && params.author.trim());

  const clearFilterHandler = () => {
    router.get(route('cms.page'))
  }

  const filterHandler = (newValue) => {
    router.get(
      route(`cms.product`),
      {
        ...params,
        ...newValue,
        ...{
          page: newValue.page ? newValue.page : 1
        }
      },
      {
        preserveScroll: true,
      }
    );

    setParams({
      ...params,
      ...newValue,
    });
  };

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>
            Product
            <Link href={route("cms.product.create")}>
              <Button size="sm" color="primary" className="ml-2">
                Add New
              </Button>
            </Link>
          </SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Product" />

        <TableMaster
          paginator={products}
          params={params}
          filterHandler={filterHandler}
          tableHeader={
            <ProductsTableHeader
              params={params}
              search={search}
              setSearch={setSearch}
              filters={filters}
              filterHandler={filterHandler}
              clearFilterHandler={clearFilterHandler}
              isFilterClearable={isFilterClearable}
            />
          }
          table={<ProductsTable products={products}/>}
        />
    </ContentLayout>
  );
}
