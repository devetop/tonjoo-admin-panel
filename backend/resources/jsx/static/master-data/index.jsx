import { useEffect, useState } from 'react'
import { useDispatch } from 'react-redux'
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader'
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice';
import { Head, Link, router } from '@inertiajs/react';
import TableMaster from '../../_component/TableMaster';
import PostsTableHeader from '../../admin/Post/Include/PostsTableHeader';
import MasterDataTable from './include/MasterDataTable';
import TapHead from '../../_component/TapHead';

function tableMasterVarsFactory() {
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
        router.get('')
    }

    const filterHandler = (newValue) => {
        router.get(
            '',
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

function MasterData({ pegawai }) {
    const {
        params,
        search,
        setSearch,
        isFilterClearable,
        clearFilterHandler,
        filterHandler,
    } = tableMasterVarsFactory()

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Post']]))
    }, [])

    return (
        <TableMaster
            paginator={pegawai}
            params={params}
            filterHandler={filterHandler}
            tableHeader={
                <PostsTableHeader
                    params={params}
                    search={search}
                    setSearch={setSearch}
                    filterHandler={filterHandler}
                    clearFilterHandler={clearFilterHandler}
                    isFilterClearable={isFilterClearable}
                />
            }
            table={<MasterDataTable pegawai={pegawai} />}
        />
    );
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Master Data']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Master Data
                        <Link href='/jsx/master-data/create' className='ml-2 btn btn-sm btn-primary'>
                            Add New
                        </Link>
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Master Data' />
            <MasterData {...props} />
        </ContentLayout>
    )
}