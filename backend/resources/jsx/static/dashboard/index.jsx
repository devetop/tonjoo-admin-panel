import { useEffect } from 'react'
import { useDispatch } from 'react-redux'
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader'
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice';
import { Head } from '@inertiajs/react';
import TapHead from '../../_component/TapHead';

function Dashboard() {
    return (
        <>
            <div className="card">
                <div className="card-body">
                    <h1 className="mb-0">Welcome to JSX Dashboard</h1>
                </div>
            </div>
        </>
    )
}

export default () => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Dashboard']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Dashboard
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Dashboard' />
            <Dashboard />
        </ContentLayout>
    )
}