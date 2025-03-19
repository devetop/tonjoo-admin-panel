import { Head, Link, router } from "@inertiajs/react"
import TableMaster from '../../_component/TableMaster';
import UserTable from "./Include/UserTable";
import { useDispatch } from "react-redux";
import { useEffect, useState } from "react";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import UserTableHeader from "./Include/UserTableHeader";
import AlertModal from "../../_component/AlertModal";
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

function Index({ users }) {

    const {
        params,
        search,
        setSearch,
        isFilterClearable,
        clearFilterHandler,
        filterHandler,
    } = tableMasterVarsFactory('cms.user')

    const [downloadBatchFilename, setDownloadBatchFilename] = useState(null);

    return (
        <div className="card">
            <div className="card-body">

                {
                    downloadBatchFilename && (
                        <AlertModal type='success' message={
                            <p className="mb-0">Selesai. File export dapat didownload pada tautan berikut <a href={route('cms.user.export.download', {filename: downloadBatchFilename})}>download</a></p>
                        } />
                    )
                }

                <TableMaster
                    paginator={users}
                    filterHandler={filterHandler}
                    params={params}
                    table={
                        <UserTable users={users} />
                    }
                    tableHeader={
                        <UserTableHeader
                            clearFilterHandler={clearFilterHandler}
                            filterHandler={filterHandler}
                            isFilterClearable={isFilterClearable}
                            search={search}
                            setSearch={setSearch}
                            setDownloadBatchFilename={setDownloadBatchFilename}
                        />
                    }
                />

            </div>
        </div>
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['User', route('cms.user')], ['List']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        User
                        <Link href={route('cms.user.create')} className="ml-2 btn btn-primary btn-sm">
                            Add New
                        </Link>
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Add New User' />
            <Index {...props} />
        </ContentLayout>
    )
}