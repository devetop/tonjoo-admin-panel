import { useEffect, useState } from "react";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import { useDispatch } from "react-redux";
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import TableMaster from "../../_component/TableMaster";
import { Head, Link, router } from "@inertiajs/react";
import Button from "../../_component/Button";
import MediaTable from "./Include/MediaTable";
import MediaTableHeader from "./Include/MediaTableHeader";
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
    });

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
        filterHandler,
    }
}

function Index({ posts }) {

    const {
        params,
        search,
        setSearch,
        filterHandler,
    } = tableMasterVarsFactory('cms.media')

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Media']]))
    }, [])

    return (
        <div className="card">
            <div className="card-body">

                <TableMaster
                    paginator={posts}
                    params={params}
                    filterHandler={filterHandler}
                    tableHeader={
                        <MediaTableHeader 
                            search={search} 
                            setSearch={setSearch} 
                            filterHandler={filterHandler} 
                        />
                    }
                    table={
                        <MediaTable posts={posts} />
                    }
                />

            </div>
        </div>
    );
}

export default (props) => (
    <ContentLayout sectionHeader={
        (
            <SectionHeader>
                <SectionTitle>
                    Media
                    <Link href={route("cms.media.create")}>
                        <Button size="sm" color="primary" className="ml-2">
                            Add New
                        </Button>
                    </Link>
                </SectionTitle>
            </SectionHeader>
        )
    }>
        <TapHead title="Media" />
        <Index {...props} />
    </ContentLayout>
)