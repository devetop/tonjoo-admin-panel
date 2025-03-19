import { useState, useEffect } from "react";
import { useDispatch } from 'react-redux'
import { Head, Link, router } from "@inertiajs/react";
import ContentLayout from "../../_component/ContentLayout";
import {
  SectionHeader,
  SectionTitle,
} from "../../_component/SectionHeader";
import TableMaster from "../../_component/TableMaster";
import Button from "../../_component/Button";
import PostsTable from "./Include/PostsTable";
import PostsTableHeader from "./Include/PostsTableHeader";
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import TapHead from "../../_component/TapHead";

function tableMasterVarsFactory(routeName) {
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
    router.get(route(routeName))
  }

  const filterHandler = (newValue) => {
    router.get(
      route(routeName),
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

  return {
    params,
    search,
    setSearch,
    isFilterClearable,
    clearFilterHandler,
    filterHandler,
  }
}

export default function Index({ posts, filters }) {
  const {
    params,
    search,
    setSearch,
    isFilterClearable,
    clearFilterHandler,
    filterHandler,
  } = tableMasterVarsFactory('cms.post')

  const dispatch = useDispatch()
  useEffect(() => {
    dispatch(setBreadcrumbs([['Post']]))
  }, [])

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>
            Post
            <Link href={route("cms.post.create")}>
              <Button size="sm" color="primary" className="ml-2">
                Add New
              </Button>
            </Link>
          </SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Post" />

        <TableMaster
          paginator={posts}
          params={params}
          filterHandler={filterHandler}
          tableHeader={
            <PostsTableHeader
              params={params}
              search={search}
              setSearch={setSearch}
              filters={filters}
              filterHandler={filterHandler}
              clearFilterHandler={clearFilterHandler}
              isFilterClearable={isFilterClearable}
            />
          }
          table={<PostsTable posts={posts} />}
        />
    </ContentLayout>
  );
}
