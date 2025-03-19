import CheckboxInput from "../../../_component/CheckboxInput";
import TextInput from "../../../_component/TextInput";

export const defaultMenuData = {
  class: "",
  display: "none",
  menus: [],
  name: "",
  url: "",
  is_inertia_link: true,
};

/**
 * Komponen Input digunakan untuk input teks dengan label terkait.
 *
 * @param {string} index - Index pembeda tiap card.
 * @param {string} cardTitle - Judul card.
 * @param {function} addSubMenuHandler - Handler untuk menambah submenu.
 * @param {function} onMinimizeHandler - Handler untuk minimize/maximize form.
 * @param {function} onDeleteHandler - Handler untuk menghapus menu/submenu.
 * @param {function} inputOnChangeHandler - Handler untuk menangani perubahan value input.
 * @param {object} menuData - Data menu.
 * @returns {JSX.Element} Komponen Input yang telah di-render.
 */
export default function MenuFormCard({
  index,
  cardTitle,
  addSubMenuHandler,
  onMinimizeHandler,
  onDeleteHandler,
  inputOnChangeHandler,
  moveHandler,
  menuData,
  children,
  ...props
}) {
  return (
    <div
      className="flex-grow-1 position-relative"
      style={{ left: 20, width: 400, ...props.style }}
    >
      <div className="card" style={{ borderRadius: 0, marginBottom: 8 }}>
        <div
          className="card-header d-flex"
          style={{ gap: ".5em", padding: ".5rem" }}
        >
          <div className="d-flex align-items-center" style={{ gap: ".5em" }}>
            <h6 className="mb-0">{cardTitle}</h6>
          </div>
          <div
            className="d-flex align-items-center flex-grow-1 justify-content-end"
            style={{ gap: ".5em" }}
          >
            <i
              role="button"
              className={`cursor-pointer ph ph-caret-${
                menuData.display == "block" ? "up" : "down"
              }`}
              onClick={() => onMinimizeHandler(index)}
            ></i>
          </div>
        </div>
        <div
          className="card-body collapse"
          style={{ display: menuData.display, padding: ".75rem" }}
        >
          <div>
            <div className="mb-2">
              <TextInput
                label="Label"
                name="name"
                size="sm"
                value={menuData.name}
                onChangeHandler={inputOnChangeHandler}
                index={index}
              />
            </div>
            <div className="mb-2">
              <TextInput
                label="Class"
                name="class"
                size="sm"
                value={menuData.class}
                onChangeHandler={inputOnChangeHandler}
                index={index}
              />
            </div>
            <div className="mb-2">
              <TextInput
                label="Url"
                name="url"
                size="sm"
                value={menuData.url}
                onChangeHandler={inputOnChangeHandler}
                index={index}
              />
            </div>
            <div className="mb-2">
              <p className="d-flex" style={{gap: '.5em'}}>
                <b>Move</b>
                <u className="text-primary" role="button" onClick={() => moveHandler(index, 'up-one')}>Up one</u>
                <u className="text-primary" role="button" onClick={() => moveHandler(index, 'down-one')}>Down one</u>
              </p>
            </div>
            <div className="mb-2">
              <CheckboxInput
                label="Is React Link"
                name="is_inertia_link"
                value={menuData.is_inertia_link}
                onChangeHandler={inputOnChangeHandler}
                index={index}
              />
            </div>
            <div className="mb-3 d-flex" style={{ gap: ".5em" }}>
              <u
                onClick={() => onDeleteHandler(index)}
                className="text-danger"
                role="button"
              >
                Remove
              </u>{" "}
              |
              <u
                onClick={() => addSubMenuHandler(index)}
                className="text-primary"
                role="button"
              >
                Add Submenu
              </u>{" "}
              |
              <u
                onClick={() => onMinimizeHandler(index)}
                className="text-primary"
                role="button"
              >
                Cancel
              </u>
            </div>
          </div>
        </div>
      </div>
      {children}
    </div>
  );
}
