import { useEffect } from "react"
import { useDispatch } from "react-redux"
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice"
import ContentLayout from "../../_component/ContentLayout"
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader"
import { Head, Link } from "@inertiajs/react"
import MasterDataForm from "./include/MasterDataForm"
import TapHead from "../../_component/TapHead"

function AddMasterData() {

    return (
        <MasterDataForm />
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Master Data', '/jsx/master-data'], ['Add']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Add Master Data
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Add Master Data' />
            <AddMasterData {...props} />
        </ContentLayout>
    )
}