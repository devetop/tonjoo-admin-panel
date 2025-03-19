import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../../_component/SectionHeader";
import TagForm from "./Includes/TagForm";
import { useDispatch } from "react-redux";
import { useEffect } from 'react'
import { setBreadcrumbs, setActiveSidebarMenu } from "../../../_redux/slices/LayoutSlice";
import TapHead from "../../../_component/TapHead";

export default function Create({ tags }) {
  const { data, setData, errors, post } = useForm({ name: "" });

  const saveAttempt = (e) => {
    e.preventDefault();
    post(route("cms.post.tag.store"));
  };

  const dispatch = useDispatch()
  useEffect(() => {
    dispatch(setActiveSidebarMenu('cms.post.tag.index'))
    dispatch(setBreadcrumbs([['Post', route('cms.post')], ['Tag', route('cms.post.tag.index')], ['Create']]))
  }, [])

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>Add New Post Tag</SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Add New Post Tag" />

      <TagForm
        data={data}
        setData={setData}
        errors={errors}
        tags={tags}
        cancelUrl={route("cms.post.tag.index")}
        onSubmit={saveAttempt}
      />
    </ContentLayout>
  );
}
