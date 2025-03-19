import { useEffect } from "react";
import { useDispatch } from "react-redux";
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import { Head } from "@inertiajs/react";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import AvailableSitesForm from "./includes/AvailableSitesForm";
import TapHead from "../../_component/TapHead";

export default ({data}) => {

    const dispatch = useDispatch();
    useEffect(() => {
        dispatch(setBreadcrumbs([['Option'], ['Available Sites', route('cms.option.available-sites.index')], ['Edit']]));
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Edit Available Sites
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title="Edit Available Sites" />
            <AvailableSitesForm initialData={data} tipe="update" />
        </ContentLayout>
    )
}