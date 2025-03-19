import { useEffect, useState } from "react";
import { Head, useForm } from "@inertiajs/react";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import PostForm, { defaultData } from "../../_component/PostForm";
import { NewsPage, PostWithSlider, defaultTemplateMetaData } from "./Include/page-template-metabox";
import { useDispatch } from "react-redux";
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import TapHead from "../../_component/TapHead";

export default function Create({ users, templates, taxonomies }) {
  const { data, setData, errors, post: store } = useForm({
    ...defaultData,
    term: {
      post_category: [],
      post_tag: []
    },
    meta: { 
      ...defaultData.meta,
      ...defaultTemplateMetaData,
    },
  });
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
    store(route("cms.post.store"))
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
    
    if (data.meta.page_template === 'news-page') {
      setAfterContentPost('')
      setAfterContentBox(<NewsPage date={data.meta.release_date} setDate={(date) => formDataChangeHandler('meta.release_date', date)} />)
    } else if(data.meta.page_template === 'post-with-slider') {
      setAfterContentPost(<PostWithSlider data={data.meta.slider_content} setData={(v) => formDataChangeHandler('meta.meta_slider', v)} />)
      setAfterContentBox('')
    } else {
      setAfterContentPost('')
      setAfterContentBox('')
    }
  }, [data.meta.page_template]);

  useEffect(() => {
    setData({...data, slug: data.title.toSlug()})
  }, [data.title])

  const dispatch = useDispatch()
  useEffect(() => {
    dispatch(setBreadcrumbs([['Post', route('cms.post')], ['Create']]))
  }, [])


  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>Add New Post</SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Add New Post" />

      <PostForm
        data={data}
        formDataChangeHandler={formDataChangeHandler}
        errors={errors}
        saveHandler={saveAttempt}
        users={users}
        templates={templates}
        taxonomies={taxonomies}
        post_type={'post'}
        afterContentPost={afterContentPost}
        afterContentBox={afterContentBox}
      />
    </ContentLayout>
  );
}
