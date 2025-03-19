import { useEffect } from "react";
import { useDispatch } from "react-redux";
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import Button from "../../_component/Button";
import { Head, Link } from "@inertiajs/react";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import AvailableSitesForm from "./includes/AvailableSitesForm";
import TapHead from "../../_component/TapHead";

export default (props) => {

    const dispatch = useDispatch();
    useEffect(() => {
        dispatch(setBreadcrumbs([['Option'], ['Available Sites', route('cms.option.available-sites.index')], ['Create']]));
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Add New Available Sites
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title="Add New Available Sites" />
            <AvailableSitesForm />
        </ContentLayout>
    )
}