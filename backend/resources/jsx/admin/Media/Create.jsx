import { Head, useForm } from "@inertiajs/react"
import ContentLayout from "../../_component/ContentLayout"
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader"
import MediaForm from "./Include/MediaForm"
import { useEffect } from "react"
import { useDispatch } from "react-redux"
import { setActiveSidebarMenu, setBreadcrumbs } from "../../_redux/slices/LayoutSlice"
import TapHead from "../../_component/TapHead"

function Create() {
    const {data, setData, post, errors} = useForm({
        title: '',
        media_image: null,
        status: '',
        author_id: '',
    })

    const saveHandler = (e) => {
        e.preventDefault()
        post(route('cms.media.store'))
    }

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Media', route('cms.media')], ['Create']]))
    }, [])

    return (
        <MediaForm 
            type="create"
            data={data}
            setData={setData}
            saveHandler={saveHandler}
            errors={errors} 
        />
    )
}

export default (...props) => (
    <ContentLayout
        sectionHeader={
            <SectionHeader>
                <SectionTitle>
                    Add New Media
                </SectionTitle>
            </SectionHeader>
        }
    >
        <TapHead title="Add New Media" />

        <Create {...props} />
    </ContentLayout>
)