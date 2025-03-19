import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../../_component/SectionHeader";
import CategoryForm from "./Includes/CategoryForm";
import TapHead from "../../../_component/TapHead";

export default function Edit({ category, categories }) {
  const { data, setData, errors, put } = useForm({ ...category });

  const saveAttempt = (e) => {
    e.preventDefault();

    put(
      route("cms.post.category.update", {
        category: category.id,
      })
    );
  };

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>Edit Category Post</SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Edit Category Post" />

      <CategoryForm
        data={data}
        setData={setData}
        errors={errors}
        categories={categories}
        onSubmit={saveAttempt}
        cancelUrl={route("cms.post.category.index")}
      />
    </ContentLayout>
  );
}
