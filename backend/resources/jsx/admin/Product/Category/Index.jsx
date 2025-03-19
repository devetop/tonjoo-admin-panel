import { useState } from 'react';
import { Head, Link, router } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import {
  SectionHeader,
  SectionTitle,
} from "../../../_component/SectionHeader";
import TableMaster from "../../../_component/TableMaster";
import Button from "../../../_component/Button";
import CategoryTable from './Includes/CategoryTable';
import TaxonomyTableHeader from '../../../_component/TaxonomyTableHeader';
import TapHead from '../../../_component/TapHead';

export default function Index({ categories }) {
  const searchParams = new URLSearchParams(
    new URL(window.location.href).search
  );

  const [search, setSearch] = useState(searchParams.get("search") || "");
  const [params, setParams] = useState({
    search: searchParams.get("search") || "",
    perPage: searchParams.get("perPage") || "10",
    page: searchParams.get("page") || "1",
  });

  const filterHandler = (newValue) => {
    router.get(
      route(`cms.product.category.index`),
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
            Product Category
            <Link href={route("cms.product.category.create")}>
              <Button size="sm" color="primary" className="ml-2">
                Add New
              </Button>
            </Link>
          </SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Product Category" />

      <TableMaster
        paginator={categories}
        params={params}
        filterHandler={filterHandler}
        tableHeader={<TaxonomyTableHeader search={search} setSearch={setSearch} filterHandler={filterHandler} />}
        table={<CategoryTable categories={categories} />}
      />
    </ContentLayout>
  );
}
