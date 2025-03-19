import { useState, useEffect } from "react";
import Button from "../../../_component/Button";
import ImageInput from "../../../_component/ImageInput";
import TextInput from "../../../_component/TextInput";
import TextEditorInput from "../../../_component/TextEditorInput";
import SelectInput from "../../../_component/SelectInput";
import CodeMirror from "@uiw/react-codemirror";
import { html } from "@codemirror/lang-html";
import { okaidia } from '@uiw/codemirror-theme-okaidia';

export const defaultTemplateMetaData = {
  about_us: {
    section1: null,
    section2: null,
    section3: null,
  },
  slider_content: null,
  additional_info: null,
  list_post: null,
  content_html: '',
};

/**
 * == Slider Gallery
 */

const defaultSliderFormData = {
  title: "",
  image_desktop: null,
  image_desktop_url: null,
  image_mobile: null,
  image_mobile_url: null,
};

function SliderForm({ setSlider, slider, index, errors, deleteHandler }) {
  const [data, setData] = useState({
    ...defaultSliderFormData,
    ...slider,
  });

  useEffect(() => {
    setSlider(index, data)
  }, [data]);

  return (
    <div className="card mb-3">
      <div className="card-header">
        <div className="w-100 d-flex justify-content-between align-items-center">
          <h6 className="mb-0">Slider #{index+1}</h6>
          <div>
            <Button
              color="danger"
              onClick={() => deleteHandler(index)}
            >
              <i className="ph ph-trash"></i>
            </Button>
          </div>
        </div>
      </div>
      <div className="card-body row">
        <div className="col-12">
          <TextInput
            label="Title"
            value={data.title}
            onChangeHandler={(e) =>
              setData({
                ...data,
                title: e.target.value,
              })
            }
            error={errors.meta?.slider_gallery[index]?.title}
          />
        </div>
        <div className="col-12 col-md-6">
          <ImageInput
            className="mb-3"
            defaultImgUrl={data.image_desktop_url}
            label="Image Desktop"
            value={data.image_desktop}
            onChangeHandler={(e) =>
              setData({
                ...data,
                image_desktop: e.target.files[0],
              })
            }
            error={errors.meta?.slider_gallery[index]?.image_desktop}
          />
        </div>
        <div className="col-12 col-md-6">
          <ImageInput
            defaultImgUrl={data.image_mobile_url}
            label="Image Mobile"
            value={data.image_mobile}
            onChangeHandler={(e) =>
              setData({
                ...data,
                image_mobile: e.target.files[0],
              })
            }
            error={errors.meta?.slider_gallery[index]?.image_mobile}
          />
        </div>
      </div>
    </div>
  );
}

export function SliderGallery({ data, setData, errors }) {
  const [sliders, setSliders] = useState(data || []);

  const addSliderHandler = () => {
    setSliders([...sliders, defaultSliderFormData]);
  }

  const deleteHandler = (index) => {
    setSliders([...sliders.filter((_, i) => i !== index)]);
  }

  const setSlider = (index, slider) => {
    let newSlider = [...sliders];
    newSlider[index] = slider;
    setSliders(newSlider);
  }

  useEffect(() => {
    setData(sliders);
  }, [sliders]);
  
  return (
    <div className="card">
      <div className="card-header">
        <div className="w-100 d-flex justify-content-between align-items-center">
          <h5 className="mb-0">Sliders List</h5>
          <Button 
            color="primary"
            type="button" 
            onClick={addSliderHandler}
          >
            Add New Slider
          </Button>
        </div>
      </div>
      <div className="card-body">
        {sliders.map((slider, i) => (
          <SliderForm
            key={i}
            setSlider={setSlider}
            deleteHandler={deleteHandler}
            slider={slider}
            index={i}
            errors={errors}
          />
        ))}
      </div>
    </div>
  );
}


/**
 * == Page With Additional Info
 */

export function PageWithAdditionalInfo({data, setData, error}) {
  return (
    <div className="card">
      <div className="card-body">
        <TextEditorInput
          className="mb-0"
          label="Additional Info"
          placeholder="Additional Info"
          value={data}
          onChangeHandler={(value) => setData(value) }
          error={error}
        />
      </div>
    </div>
  )
}

/**
 * == List Post
 */

export function ListPost({data, setData, posts}) {
  const postsOption = posts.map((post) => ({ value: post.id, text: post.title }))
  const [postsId, setPostsId] = useState(data || [])

  const onChangeHandler = (id, i) => {
    let newPostsId = [...postsId];
    newPostsId = newPostsId.map((d, _i) => (_i === i) ? ({post_id: id}) : d)
    setPostsId(newPostsId)
  }

  const addInput = () => {
    setPostsId([...postsId, {post_id: posts[0].id || 0}])
  }

  const deleteHandler = (_, i) => {
    setPostsId([...postsId.filter((_, _i) => _i !== i)])
  }

  useEffect(() => {
    setData(postsId)
  }, [postsId])

  return (
    <div className="card">
      <div className="card-header">
        <div className="d-flex justify-content-between align-items-center">
          <h5 className="mb-0">Posts List</h5>
          <div>
            <Button color="primary" onClick={addInput}>Add New Post</Button>
          </div>
        </div>
      </div>
      <div className="card-body">
        {postsId.map((post, i) => (
          <div className="d-flex" key={i}>
            <div className="w-100">
              <SelectInput
                showChooseOption={false}
                label="Post List"
                value={post.post_id}
                onChangeHandler={(e) => onChangeHandler(e.target.value, i)}
                options={postsOption}
              />
            </div>
            <div className="d-flex align-items-center justify-content-center p-2" style={{marginTop: 13}}>
              <Button 
                onClick={() => deleteHandler(post.post_id, i)} 
                size="sm"
                color="danger"
              >
                <i className="ph ph-trash"></i>
              </Button>
            </div>
          </div>
        ))}
      </div>
    </div>
  )
}

/**
 * == Content Html
 */

export function ContentHtml({data, setData}) {
  return (
    <div className="card">
      <div className="card-header">
        <h5 className="mb-0">Content HTML</h5>
      </div>
      <div className="card-body">
        <CodeMirror
          value={data || ''}
          className="flex-grow-1"
          height="200px"
          tabsize="2"
          highlightdifferences="true"
          linenumbers="true"
          theme={okaidia}
          extensions={[html()]}
          onChange={(value) => setData(value)}
        />
      </div>
    </div>
  )
}