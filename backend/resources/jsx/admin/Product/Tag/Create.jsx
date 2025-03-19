import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../../_component/SectionHeader";
import TagForm from "./Includes/TagForm";
import TapHead from "../../../_component/TapHead";

export default function Create({ tags }) {
  const { data, setData, errors, post } = useForm({ name: "" });

  const saveAttempt = (e) => {
    e.preventDefault();
    post(route("cms.product.tag.store"));
  };

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>Add New Product Tag</SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Add New Product Tag" />

      <TagForm
        data={data}
        setData={setData}
        errors={errors}
        tags={tags}
        cancelUrl={route("cms.product.tag.index")}
        onSubmit={saveAttempt}
      />
    </ContentLayout>
  );
}
