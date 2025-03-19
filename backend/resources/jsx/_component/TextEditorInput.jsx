import { useRef } from 'react'
import { Editor } from "@tinymce/tinymce-react";
import classNames from "classnames";
/**
 * Komponen Input digunakan untuk input teks dengan label terkait.
 *
 * @param {string} label - Label yang akan ditampilkan di atas input.
 * @param {string} name - Nama data yang sedang diinput, juga digunakan untuk id, harus unik.
 * @param {string} value - Nilai input saat ini.
 * @param {function} onChangeHandler - Fungsi yang akan dipanggil ketika nilai input berubah, params 1 id harus unik, params 2 text value dari input.
 * @param {string} index - index untuk pembeda data di array.
 * @param {string} error - respon error dari validasi.
 * @param {object} inputProps - props untuk input.
 * @returns {JSX.Element} Komponen Input yang telah di-render.
 */
export default function TextEditorInput({
  label,
  name,
  size = "md",
  value,
  onChangeHandler,
  index = null,
  error = null,
  editorHeight = 400,
  inputProps,
  ...props
}) {
  const editorRef = useRef(null)
  return (
    <div
      className={classNames(props.className, {
        "form-group-sm": size === "sm",
        "form-group": size === "md"
      })}
    >
      <label
        htmlFor={`${name}-${index}`}
        className={classNames("control-label", {
          "mb-0": size === "sm",
        })}
      >
        {label}
      </label>

      <Editor
        tinymceScriptSrc={'/assets/backend/plugins/tinymce/tinymce.min.js'}
        // apiKey=''
        onInit={(evt, editor) => editorRef.current = editor}
        value={value || ""}
        onEditorChange={(value) => onChangeHandler(value, index)}
        name={name}
        init={{
          height: editorHeight,

          relative_urls: false,
          convert_urls: true,
          remove_script_host: false,

          plugins: 'code wordcount link textcolor directionality table charmap lists visualblocks paste',
          paste_as_text: true,
          image_title: true,
          image_caption: true,
          branding: false,
          menubar: false,
          toolbar: 'formatselect bold italic underline strikethrough |  superscript subscript ltr rtl | ' +
              'alignleft aligncenter alignright alignjustify bullist numlist | ' +
              'cut copy paste undo redo | link | removeformat | visualblocks | code',
          block_formats: 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;Div=div;Blockquote=blockquote'
        }}
      />
      <div className={classNames('invalid-feedback', {
          "d-block": !!error
        })}>{error}</div>
    </div>
  );
}
