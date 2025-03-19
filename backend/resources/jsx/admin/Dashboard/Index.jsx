import { useEffect } from "react"
import { useDispatch } from "react-redux"
import { setActiveSidebarMenu, setBreadcrumbs } from "../../_redux/slices/LayoutSlice"
import ContentLayout from "../../_component/ContentLayout"
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader"
import { Head } from "@inertiajs/react"
import TapHead from "../../_component/TapHead"

export default function Index({auth}) {
    
    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Dashboard']]))
        dispatch(setActiveSidebarMenu('cms.dashboard.index'))
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
            <TapHead title="Dashboard" />

            <div className="row">
                <div className="col-12">

                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-subtitle my-3">Welcome {auth.admin.name}!</h5>
                        </div>
                    </div>

                </div>
            </div>

        </ContentLayout>
    )
}