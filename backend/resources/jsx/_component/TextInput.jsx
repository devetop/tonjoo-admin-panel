import classNames from "classnames";
/**
 * Komponen Input digunakan untuk input teks dengan label terkait.
 *
 * @param {string} label - Label yang akan ditampilkan di atas input.
 * @param {string} name - Nama data yang sedang diinput, juga digunakan untuk id, harus unik.
 * @param {string} type - tipe input textarea|text|nummber|email|dll
 * @param {boolean} required - required
 * @param {string} value - Nilai input saat ini.
 * @param {function} onChangeHandler - Fungsi yang akan dipanggil ketika nilai input berubah, params 1 id harus unik, params 2 event dari input.
 * @param {string} index - index untuk pembeda data di array.
 * @param {string} error - respon error dari validasi.
 * @param {object} inputProps - props untuk input.
 * @returns {JSX.Element} Komponen Input yang telah di-render.
 */
export default function TextInput({
  label,
  name,
  type = "text",
  required = false,
  size = "md",
  value,
  onChangeHandler,
  index = null,
  error = null,
  inputProps,
  ...props
}) {
  return (
    <div
      className={classNames(props.className, {
        "mb-1 input-group-sm": size === "sm",
        "form-group": size === "md"
      })}
    >
      {
        label && (
          <label
            htmlFor={`${name}-${index}`}
            className={classNames("control-label", {
              "mb-0": size === "sm",
            })}
          >
            {label} {required && <span className="text-danger">*</span>}
          </label>
        )
      }
      {
        (type == 'textarea')
        ? (
          <textarea
            type={type}
            id={`${name}-${index}`}
            className={classNames(props?.inputClassName, 'form-control', {
              "is-invalid": !!error
            })}
            name={name}
            value={value || ""}
            onChange={(e) => onChangeHandler(e, index)}
            required={required}
            {...inputProps}
          />
        ) : (
          <input
            type={type}
            id={`${name}-${index}`}
            className={classNames(props?.inputClassName, 'form-control', {
              "is-invalid": !!error
            })}
            name={name}
            value={value || ""}
            onChange={(e) => onChangeHandler(e, index)}
            required={required}
            {...inputProps}
          />
        )
      }
      <div className="invalid-feedback">{error}</div>
    </div>
  );
}
