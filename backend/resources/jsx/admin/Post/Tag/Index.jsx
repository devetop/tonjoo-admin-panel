import { useEffect, useState } from "react";
import { Head, Link, router } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../../_component/SectionHeader";
import TableMaster from "../../../_component/TableMaster";
import Button from "../../../_component/Button";
import TaxonomyTableHeader from "../../../_component/TaxonomyTableHeader";
import TagTable from "./Includes/TagTable";
import { useDispatch } from "react-redux";
import { setBreadcrumbs } from "../../../_redux/slices/LayoutSlice";
import TapHead from "../../../_component/TapHead";

export default function Index({ tags }) {
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
      route(`cms.post.tag.index`),
      {
        ...params,
        ...newValue,
        ...{
          page: newValue.page ? newValue.page : 1,
        },
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
    dispatch(setBreadcrumbs([['Post', route('cms.post')], ['Tag']]))
  }, [])

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>
            Post Tag
            <Link href={route("cms.post.tag.create")}>
              <Button size="sm" color="primary" className="ml-2">
                Add New
              </Button>
            </Link>
          </SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Tag" />

      <TableMaster
        paginator={tags}
        params={params}
        filterHandler={filterHandler}
        tableHeader={
          <TaxonomyTableHeader
            search={search}
            setSearch={setSearch}
            filterHandler={filterHandler}
          />
        }
        table={<TagTable tags={tags} />}
      />
    </ContentLayout>
  );
}
