import React, { useEffect, useState } from 'react'
import { Head, router } from '@inertiajs/react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader'
import TableMaster from '../../_component/TableMaster';
import LogViewerTable from './Include/LogViewerTable';
import LogViewerTableHeader from './Include/LogViewerTableHeader';
import { useDispatch } from 'react-redux';
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice'
import TapHead from '../../_component/TapHead';

function tableMasterVarsFactory(routeName) {
    const searchParams = new URLSearchParams(
        new URL(window.location.href).search
    );

    const [params, setParams] = useState({
        l: searchParams.get("l"),
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
        filterHandler,
    }
}

function LogViewer({data}) {
    const {
        params,
        filterHandler,
    } = tableMasterVarsFactory('cms.tool.log-viewer')

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Tools'], ['Log Viewer']]))
    }, [])

    return (
        <div className="card">
            <div className="card-body">
                <TableMaster
                    paginator={data.pagination}
                    params={params}
                    filterHandler={filterHandler}
                    tableHeader={
                        <LogViewerTableHeader 
                            datas={data}
                            params={params}
                            filterHandler={filterHandler}
                        />
                    }
                    table={
                        <LogViewerTable datas={data} />
                    }
                    showPaginationBeforeTable={true}
                />
            </div>
        </div>
    )
}

export default (props) => (
    <ContentLayout
        sectionHeader={
            <SectionHeader>
                <SectionTitle>
                    Log Viewer
                </SectionTitle>
            </SectionHeader>
        }
    >
        <TapHead title='Log Viewer' />
        <LogViewer {...props} />
    </ContentLayout>
)