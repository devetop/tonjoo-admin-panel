import { Head, Link, router } from '@inertiajs/react'
import ContentLayout from '../../../_component/ContentLayout'
import { SectionHeader, SectionTitle } from '../../../_component/SectionHeader'
import { useEffect, useState } from 'react'
import { useDispatch } from 'react-redux'
import { setBreadcrumbs } from '../../../_redux/slices/LayoutSlice'
import TableMaster from '../../../_component/TableMaster'
import RoleTable from './Include/RoleTable'
import RoleTableHeader from './Include/RoleTableHeader'
import TapHead from '../../../_component/TapHead'

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


function Index({roles}) {
    const {
        params,
        search,
        setSearch,
        isFilterClearable,
        clearFilterHandler,
        filterHandler,
    } = tableMasterVarsFactory('cms.role')

    return (
        <TableMaster
            paginator={roles}
            params={params}
            filterHandler={filterHandler}
            tableHeader={
                <RoleTableHeader
                    filterHandler={filterHandler}
                    search={search}
                    setSearch={setSearch}
                />
            }
            table={
                <RoleTable roles={roles} />
            }
        />
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['User', route('cms.user')], ['Role'], ['List']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Role
                        <Link
                            href={route('cms.role.create')}
                            className='btn btn-sm btn-primary ml-2'
                        >
                            Add New
                        </Link>
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Role' />
            <Index {...props} />
        </ContentLayout>
    )
}