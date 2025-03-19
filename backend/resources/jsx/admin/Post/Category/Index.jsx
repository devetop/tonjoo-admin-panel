import { useEffect, useState } from 'react';
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
import { useDispatch } from 'react-redux';
import { setBreadcrumbs } from '../../../_redux/slices/LayoutSlice';
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
      route(`cms.post.category.index`),
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

  const dispatch = useDispatch()
  useEffect(() => {
    dispatch(setBreadcrumbs([['Post', route('cms.post')], ['Category']]))
  }, [])

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>
            Post Category
            <Link href={route("cms.post.category.create")}>
              <Button size="sm" color="primary" className="ml-2">
                Add New
              </Button>
            </Link>
          </SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Post Category" />

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
