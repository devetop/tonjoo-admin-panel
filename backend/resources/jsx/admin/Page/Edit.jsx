import { useEffect } from "react";
import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import PostForm from "../../_component/PostForm";
import { ContentHtml, defaultTemplateMetaData, ListPost, PageWithAdditionalInfo, SliderGallery } from './Include/page-template-metabox';
import { AboutUsForm } from "./Include/page-template-metabox.-about-us";
import TapHead from "../../_component/TapHead";

export default function Edit({ users, templates, post, posts }) {
  const { data, setData, errors, post: save } = useForm({ ...post });

  const formDataChangeHandler = (name, value) => {
    const nameArr = name.split(".");

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

    if (nameArr.length === 3 && nameArr[0] === 'meta') {
      setData({
        ...data,
        meta: {
          ...data.meta,
          [nameArr[1]]: {
            ...data.meta?.[nameArr[1]],
            [nameArr[2]]: value
          },
        },
      });

      return;
    }

    setData(name, value);
  };

  const saveAttempt = (e) => {
    e.preventDefault();
    save(route("cms.page.update", data.id))
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

  const afterContentPost = () => {
    switch (data.meta.page_template) {
      case 'about-us':
        return (
          <AboutUsForm 
            setData={formDataChangeHandler}
            data={data.meta?.about_us}
            errors={errors}
          />
        )
      case 'content-html':
        return (
          <ContentHtml
            setData={(v) => formDataChangeHandler('meta.content_html', v)}
            data={data.meta.content_html}
          />
        )
      case 'list-post':
        return (
          <ListPost
            setData={(v) => formDataChangeHandler('meta.list_post', v)}
            data={data.meta.list_post}
            posts={posts}
          />
        );
      case 'page-with-additional-info':
        return (
          <PageWithAdditionalInfo
            setData={(v) => formDataChangeHandler('meta.additional_info', v)}
            data={data.meta.additional_info}
            error={errors.meta?.additional_info}
          />
        );
      case 'slider-gallery':
        return (
          <SliderGallery
            setData={(v) => formDataChangeHandler('meta.slider_content', v)}
            data={data.meta.slider_content}
            errors={errors}
          />
        )
      default:
        return '';
    }
  }

  const afterContentBox = () => {
    switch (data.meta.page_template) {
      default:
        return '';
    }
  }

  useEffect(() => {
    setData({ ...data, slug: data.title.toSlug() })
  }, [data.title])

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>Edit Page</SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Edit Page" />

      <PostForm
        data={data}
        formDataChangeHandler={formDataChangeHandler}
        errors={errors}
        saveHandler={saveAttempt}
        users={users}
        templates={templates}
        post_type={'page'}
        afterContentPost={afterContentPost()}
        afterContentBox={afterContentBox()}
        withoutContent={['about-us', 'our-team', 'contact-us'].includes(data.meta.page_template)}
      />
    </ContentLayout>
  );
}
