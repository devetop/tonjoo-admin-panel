import classNames from "classnames";
import ReactSelect from "react-select";
/**
 * Komponen Input digunakan untuk input teks dengan label terkait.
 *
 * @param {string} label - Label yang akan ditampilkan di atas input.
 * @param {string} name - Nama data yang sedang diinput, juga digunakan untuk id, harus unik.
 * @param {string} value - Nilai input saat ini.
 * @param {function} onChangeHandler - Fungsi yang akan dipanggil ketika nilai input berubah, params 1 id harus unik, params 2 event dari input.
 * @param {string} index - index untuk pembeda data di array.
 * @param {string} error - respon error dari validasi.
 * @param {object} inputProps - props untuk input.
 * @param {object[]} options - option select.
 * @returns {JSX.Element} Komponen Input yang telah di-render.
 */
export default function SelectInput({
  label,
  name,
  size = "md",
  value,
  onChangeHandler,
  index = null,
  error = null,
  inputProps,
  options = [],
  showChooseOption = true,
  required = false,
  ...props
}) {
  return (
    <div
      className={classNames(props.className, {
        "mb-1 input-group-sm": size === "sm",
        "form-group": size === "md",
      })}
    >
      <label
        htmlFor={`${name}-${index}`}
        className={classNames("control-label", {
          "mb-0": size === "sm",
        })}
      >
        {label} {required && <span className="text-danger">*</span>}
      </label>
      <select
        type="text"
        id={`${name}-${index}`}
        className={classNames("form-control", {
          "is-invalid": !!error,
        })}
        name={name}
        value={value || ""}
        onChange={(e) => onChangeHandler(e, index)}
        required={required}
        {...inputProps}
      >
        {showChooseOption && <option value={''} disabled={!!value}>Choose {label}</option>}
        {options.map((option, i) => (
          <option key={i} value={option.value}>
            {option.text}
          </option>
        ))}
      </select>
      <div className="invalid-feedback">{error}</div>
    </div>
  );
}

export function SelectInput2({ options, value, onChangeHandler, error, disabled }) {

  const defaultValue = options.includes(value) ? value : options.find((opt) => opt.value == value);

  return (
    <>
      <ReactSelect
        options={options}
        defaultValue={defaultValue}
        onChange={onChangeHandler}
        isClearable={true}
        isDisabled={disabled}
        styles={{
          control: (styles) => ({
            ...styles, borderColor: error ? 'var(--danger)' : 'var(--input-border, #ced4da)'
          })
        }}
      />
      {
        error && (
          <p className="text-danger mb-0">{error}</p>
        )
      }
    </>
  )
}
