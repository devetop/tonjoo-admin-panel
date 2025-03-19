import { useEffect, useRef, useState } from 'react'
import classNames from "classnames";

export default function ImageInput({defaultImgUrl, name, label, value, onChangeHandler, error, index, defaultFilename = '', ...props}) {
  const previewRef = useRef(null)
  const [filename, setFilename] = useState(defaultFilename)

  const currentImage = value ? URL.createObjectURL(value) : null;

  useEffect(() => {
    if (value) {
      setFilename(value.name);
    }

    return () => {
      setFilename(defaultFilename)
    }
  }, [value])

  return (
    <div className={props.className}>
      <label className="control-label mb-0" htmlFor="featured_image">
        {label || "Featured Image (960 x 720)"}
      </label>

      <div className="text-center py-4 px-2">
        <img
          ref={previewRef}
          src={currentImage || defaultImgUrl || "/images/no-image.png"}
          className="img-responsive rounded border"
          id={`desktop-thumbnail-${name}`}
          alt={label}
          width="200"
          style={{maxWidth: '100%'}}
        />
      </div>

      <div className="mt-3">
        <div className="custom-file">
          <input
            type="file"
            className={classNames(["form-control", "custom-file-input"], {
              "is-invalid": !!error
            })}
            id={name}
            name={name}
            onChange={(e) => {
              if(e.target.files[0] == undefined) {
                return;
              }

              onChangeHandler(e, index)

            }}
            accept=".jpg,.jpeg,.png,.gif,.webp"
          />
          <label
            className="custom-file-label word-wrap"
            htmlFor={name}
          >
            {filename}
          </label>
          <div className="invalid-feedback">
            {error}
          </div>
        </div>
      </div>
    </div>
  );
}
