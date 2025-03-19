import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import {
  SectionHeader,
  SectionTitle,
} from "../../../_component/SectionHeader";
import CategoryForm from "./Includes/CategoryForm";
import TapHead from "../../../_component/TapHead";

export default function Create({ categories }) {
  const {data, setData, errors, post} = useForm({
    name: '',
    parent_term_id: ''
  })

  const saveAttempt = (e) => {
    e.preventDefault();
    post(route('cms.product.category.store'))
  }

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>
            Add New Product Category
          </SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Menu" />
      
      <CategoryForm
        data={data} 
        setData={setData}
        errors={errors} 
        categories={categories} 
        onSubmit={saveAttempt}
        cancelUrl={route("cms.product.category.index")}
      />
    </ContentLayout>
  );
}
