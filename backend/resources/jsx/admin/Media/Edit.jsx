import { Head, useForm } from "@inertiajs/react"
import ContentLayout from "../../_component/ContentLayout"
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader"
import MediaForm from "./Include/MediaForm"
import TapHead from "../../_component/TapHead";

function Edit(props) {
    const { post } = props[0];
    const { data, setData, post: save, errors } = useForm(post)

    const saveHandler = (e) => {
        e.preventDefault()

        save(route('cms.media.update', post.id))
    }

    return (
        <MediaForm
            type="edit"
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
                    Update Media
                </SectionTitle>
            </SectionHeader>
        }
    >
        <TapHead title="Update Media" />

        <Edit {...props} />
    </ContentLayout>
)