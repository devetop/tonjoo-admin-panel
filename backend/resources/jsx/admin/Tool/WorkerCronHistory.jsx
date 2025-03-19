import { useEffect, useState } from 'react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import { useDispatch } from 'react-redux';
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice'
import { Head } from '@inertiajs/react';
import WorkerCronNav from './Include/WorkerCronNav';
import TableMaster from '../../_component/TableMaster';
import WorkerCronHistoryTable from './Include/WorkerCronHistoryTable';
import TapHead from '../../_component/TapHead';

function tableMasterVarsFactory(routeName) {
    const searchParams = new URLSearchParams(
        new URL(window.location.href).search
    );

    const [params, setParams] = useState({
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

function WorkerCronHistory({ historyCrons: crons }) {
    const {
        params,
        filterHandler,
    } = tableMasterVarsFactory('cms.tool.worker.history-cron')

    return (
        <div className="card">
            <div className="card-body">

                <WorkerCronNav type='cron-history' />

                <TableMaster
                    paginator={crons}
                    params={params}
                    filterHandler={filterHandler}
                    showPaginationBeforeTable={true}
                    table={<WorkerCronHistoryTable crons={crons} />}
                />

            </div>
        </div>
    )
}

export default (props) => {
    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Tools'], ['Cron History']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Cron History
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Cron History' />
            <WorkerCronHistory {...props} />
        </ContentLayout>
    )
}