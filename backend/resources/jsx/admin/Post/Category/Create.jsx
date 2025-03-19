import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import {
  SectionHeader,
  SectionTitle,
} from "../../../_component/SectionHeader";
import CategoryForm from "./Includes/CategoryForm";
import { useDispatch } from "react-redux";
import { useEffect } from "react";
import { setActiveSidebarMenu, setBreadcrumbs } from "../../../_redux/slices/LayoutSlice";
import TapHead from "../../../_component/TapHead";

export default function Create({ categories }) {
  const {data, setData, errors, post} = useForm({
    name: '',
    parent_term_id: '',
    meta: {
      description: '',
    }
  })

  const saveAttempt = (e) => {
    e.preventDefault();
    post(route('cms.post.category.store'))
  }

  const dispatch = useDispatch()
  useEffect(() => {
    dispatch(setActiveSidebarMenu('cms.post.tag.index'))
    dispatch(setBreadcrumbs([['Post', route('cms.post')], ['Tag', route('cms.post.category.index')], ['Create']]))
  }, [])

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>
            Add New Post Category
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
        cancelUrl={route("cms.post.category.index")}
      />
    </ContentLayout>
  );
}
