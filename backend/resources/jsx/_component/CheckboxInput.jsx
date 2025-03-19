import classNames from "classnames";

export default function CheckboxInput({
  label,
  name,
  value,
  onChangeHandler,
  index = null,
  labelClassName = null,
}) {
  return (
    <div className="custom-control custom-checkbox" style={{zIndex: 0}}>
      <input
        className="custom-control-input"
        type="checkbox"
        id={index + "_checkbox"}
        onChange={(e) => onChangeHandler(e, index)}
        name={name}
        checked={value ? 'checked' : ''}
      />
      <label
        htmlFor={index + "_checkbox"}
        className={classNames('custom-control-label', labelClassName)}
      >
        {label}
      </label>
    </div>
  )
}