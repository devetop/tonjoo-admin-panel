import { useEffect, useState } from "react";
import { useDispatch } from "react-redux"
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import { Head, Link, router } from "@inertiajs/react";
import TableMaster from "../../_component/TableMaster";
import Button from "../../_component/Button";
import AvailableSitesTableHeader from "./includes/AvailableSitesTableHeader";
import AvailavleSitesTable from "./includes/AvailableSitesTable";
import TapHead from "../../_component/TapHead";

function AvailableSites({ available_sites }) {
    const searchParams = new URLSearchParams(
        new URL(window.location.href).search
    );

    const [search, setSearch] = useState(searchParams.get("search") || "");
    const [params, setParams] = useState({
        search: searchParams.get("search") || "",
        perPage: searchParams.get("perPage") || "10",
        page: searchParams.get("page") || "1",
    });

    const isFilterClearable =
        (params.search && params.search.trim()) ||
        (params.perPage && params.perPage !== "10") ||
        (params.page && params.page !== "1") 

    const clearFilterHandler = () => {
        router.get(route('cms.option.available-sites.index'))
    }

    const filterHandler = (newValue) => {
        router.get(
            route(`cms.option.available-sites.index`),
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
        <TableMaster
            paginator={available_sites}
            params={params}
            filterHandler={filterHandler}
            tableHeader={
                <AvailableSitesTableHeader
                    search={search}
                    setSearch={setSearch}
                    filterHandler={filterHandler}
                    clearFilterHandler={clearFilterHandler}
                    isFilterClearable={isFilterClearable}
                />
            }
            table={<AvailavleSitesTable available_sites={available_sites} />}
        />
    )
}

export default (props) => {

    const dispatch = useDispatch();
    useEffect(() => {
        dispatch(setBreadcrumbs([['Option'], ['Available Sites']]));
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Available Sites
                        <Link href={route("cms.option.available-sites.create")}>
                            <Button size="sm" color="primary" className="ml-2">
                                Add New
                            </Button>
                        </Link>
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title="Available Sites" />
            <AvailableSites {...props} />
        </ContentLayout>
    )
}