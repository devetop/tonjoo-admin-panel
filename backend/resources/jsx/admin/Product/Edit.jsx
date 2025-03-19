import { useEffect, useState } from "react";
import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import PostForm from "../../_component/PostForm";
import { defaultTemplateMetaData } from "./Include/page-template-metabox";
import TapHead from "../../_component/TapHead";

export default function Edit({ users, templates, taxonomies, product }) {
  const { data, setData, errors, post: save } = useForm({...product});
  const [afterContentPost, setAfterContentPost] = useState('')
  const [afterContentBox, setAfterContentBox] = useState('')

  const formDataChangeHandler = (name, value) => {
    const nameArr = name.split(".");

    if (nameArr.length === 3 && nameArr[0] === 'term') {
      if (data.term[nameArr[1]].includes(value)) {
        // remove
        setData({
          ...data,
          term: {
            ...data.term,
            [nameArr[1]]: [...data.term[nameArr[1]]].filter((v) => v !== value)
          }
        });
      } else {
        // add
        setData({
          ...data,
          term: {
            ...data.term,
            [nameArr[1]]: [...data.term[nameArr[1]], value]
          }
        });
      }

      return;
    }
    
    if (nameArr.length === 2 && nameArr[0] === 'meta') {
      setData({
        ...data,
        meta: {
          ...data.meta,
          [nameArr[1]]: value,
        },
      });
      return;
    }

    setData(name, value);
  };

  const saveAttempt = (e) => {
    e.preventDefault();
    save(route("cms.product.update", data.id))
  };

  const resetMetaData = () => {
    setData({
      ...data,
      meta: {
        ...data.meta,
        ...defaultTemplateMetaData,
      }
    })
  }

  useEffect(() => {
    resetMetaData()
  }, [data.meta.page_template]);

  useEffect(() => {
    setData({...data, slug: data.title.toSlug()})
  }, [data.title])

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>Edit Product</SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Edit Product" />

      <PostForm
        data={data}
        formDataChangeHandler={formDataChangeHandler}
        errors={errors}
        saveHandler={saveAttempt}
        users={users}
        templates={templates}
        taxonomies={taxonomies}
        post_type={'product'}
        afterContentPost={afterContentPost}
        afterContentBox={afterContentBox}
      />
    </ContentLayout>
  );
}
