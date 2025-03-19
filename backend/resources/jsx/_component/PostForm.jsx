import { useState, useEffect } from "react";
import { Link } from "@inertiajs/react";
import classNames from "classnames";
import TextInput from "./TextInput";
import TextEditorInput from "./TextEditorInput";
import SelectInput from "./SelectInput";
import ImageInput from "./ImageInput";
import TaxonomyEditor from "./TaxonomyEditor";

export const defaultData = {
  title: "",
  content: "",
  status: "draft",
  author_id: "",
  slug: "",
  meta: {
    sub_title: "",
    meta_title: "",
    meta_description: "",
    page_template: "default",
  },
};

function SlugTextInput({ formDataChangeHandler, data, id, error }) {
  const [isValid, setIsValid] = useState(null);
  const [_error, _setError] = useState(null);

  const onChangeHandler = (value) => {
    window.axios
      .post(route("cms.post.slug-validation"), {
        slug: value,
        id,
      })
      .then(({data}) => {
        if (data.status === 'ok') {
          setIsValid(true)
          _setError(null)
        } else {
          setIsValid(false)
          _setError(data.error);
        }
      });
    formDataChangeHandler(value);
  };

  useEffect(() => {
    data &&  onChangeHandler(data)
  }, [data])

  return (
    <TextInput
      label="Slug"
      name="slug"
      value={data}
      inputClassName={classNames({
        "is-valid": isValid === true,
        "is-invalid": isValid === false,
      })}
      onChangeHandler={(e) => onChangeHandler(e.target.value)}
      error={_error || error}
    />
  );
}

export default function PostForm({
  data,
  users,
  errors,
  templates,
  post_type,
  taxonomies = [],
  withoutContent = false,
  saveHandler,
  afterContentBox,
  afterContentPost,
  formDataChangeHandler,
}) {
  return (
    <form onSubmit={saveHandler}>
      <div className="row justify-content-center">
        <div className="col-lg-9 mb-lg-0 mb-3">
          <div className="card">
            <div className="card-body">
              <div className="col">
                <TextInput
                  label="Title"
                  name="title"
                  value={data.title}
                  onChangeHandler={(e) =>
                    formDataChangeHandler("title", e.target.value)
                  }
                  error={errors.title}
                />
                <SlugTextInput
                  id={data.id}
                  data={data.slug}
                  error={errors.slug}
                  formDataChangeHandler={(v) =>
                    formDataChangeHandler("slug", v)
                  }
                />
                <TextInput
                  label="Sub Title"
                  name="meta.sub_title"
                  value={data.meta.sub_title}
                  onChangeHandler={(e) =>
                    formDataChangeHandler("meta.sub_title", e.target.value)
                  }
                  error={errors.meta?.sub_title}
                />
                {
                  data?.permalink && (
                    <div className="form-group mb-3">
                      <label className="control-label" htmlFor="slug">
                        Permalink :{" "}
                        <Link
                          className="text-sm"
                          href={data.permalink}
                          title="View Page"
                        >
                          {data.permalink}
                        </Link>
                      </label>
                    </div>
                  )
                }
                {
                  withoutContent 
                  ? ''
                  : (
                    <TextEditorInput
                      className="mb-0"
                      label="Content"
                      name="content"
                      placeholder="Content"
                      value={data.content}
                      onChangeHandler={(value) =>
                        formDataChangeHandler("content", value)
                      }
                      error={errors.content}
                    />
                  )
                }
              </div>
            </div>
          </div>

          <div className="card">
            <div className="card-header">
              <div className="h5 mb-0">SEO</div>
            </div>
            <div className="card-body">
              <div className="col">
                <TextInput
                  label="Meta Title"
                  name="meta.meta_title"
                  value={data.meta.meta_title}
                  onChangeHandler={(e) =>
                    formDataChangeHandler("meta.meta_title", e.target.value)
                  }
                  error={errors.meta?.meta_title}
                  inputProps={{ maxLength: 150 }}
                />
                <TextInput
                  className="mb-0"
                  label="Meta Description"
                  name="meta.meta_description"
                  value={data.meta.meta_description}
                  onChangeHandler={(e) =>
                    formDataChangeHandler(
                      "meta.meta_description",
                      e.target.value
                    )
                  }
                  error={errors.meta?.meta_description}
                  inputProps={{ maxLength: 150 }}
                />
              </div>
            </div>
          </div>

          { !!afterContentPost && afterContentPost }

        </div>
        <div className="col-lg-3">
          <div className="card mb-3">
            <div className="card-header">
              <h5 className="card-title mb-0">Action</h5>
            </div>
            <div className="card-body">
              <div className="row">
                <div className="col">
                  <Link
                    href={route(`cms.${post_type || "post"}`)}
                    className="btn btn-default w-100"
                  >
                    Cancel
                  </Link>
                </div>
                <div className="col">
                  <button className="btn btn-primary w-100" type="submit">
                    Save
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div className="card mb-3">
            <div className="card-body ">
              <SelectInput
                showChooseOption={false}
                label="Status"
                name="status"
                value={data.status}
                onChangeHandler={(e) =>
                  formDataChangeHandler("status", e.target.value)
                }
                error={errors.status}
                options={[
                  {
                    value: "publish",
                    text: "Publish",
                  },
                  {
                    value: "draft",
                    text: "Draft",
                  },
                ]}
              />

              {
                users?.length && (
                  <SelectInput
                    label="Author"
                    name="author"
                    value={data.author_id}
                    onChangeHandler={(e) =>
                      formDataChangeHandler("author_id", e.target.value)
                    }
                    error={errors.author_id}
                    options={users?.map((user) => ({
                      value: user.id,
                      text: user.name,
                    }))}
                  />
                )
              }

              <ImageInput
                className={templates?.length > 1 ? 'mb-3' : ''}
                defaultImgUrl={data.featured_image}
                name="meta.featured_image"
                label="Featured Image (960 x 720)"
                value={data.meta.featured_image}
                onChangeHandler={(e) =>
                  formDataChangeHandler(
                    "meta.featured_image",
                    e.target.files[0]
                  )
                }
                error={errors.meta?.featured_image}
              />

              {
                templates?.length > 1 && (
                  <SelectInput
                    showChooseOption={false}
                    className="mb-0"
                    label="Page Template"
                    name="meta.page_template"
                    value={data.meta.page_template}
                    onChangeHandler={(e) =>
                      formDataChangeHandler("meta.page_template", e.target.value)
                    }
                    error={errors['meta.page_template']}
                    options={templates.map((template) => ({
                      value: template,
                      text: template,
                    }))}
                  />
                )
              }
            </div>
          </div>

          {taxonomies.map((taxonomy, i) => (
            <TaxonomyEditor
              key={i}
              taxonomy={taxonomy}
              data={data}
              taxonomyChangeHandler={formDataChangeHandler}
            />
          ))}

          {afterContentBox}
        </div>
      </div>
    </form>
  );
}
