import { useState, useEffect } from "react";
import Button from "../../../_component/Button";
import CodeMirror from "@uiw/react-codemirror";
import { html } from "@codemirror/lang-html";
import { okaidia } from '@uiw/codemirror-theme-okaidia';
import DatePicker from "../../../_component/DatePicker";

export const defaultTemplateMetaData = {
  slider_content: null,
  release_date: null
};

export function NewsPage({date, setDate}) {
  return (
    <div className="card">
      <div className="card-header border-bottom-0 pb-0">
        <h6 className="card-title mb-0">Release Date</h6>
      </div>
      <div className="card-body">
        <DatePicker value={date} setValue={setDate} />
      </div>
    </div>
  );
}

export function PostWithSlider({data, setData}) {
  const [sliders, setSliders] = useState(data || []);

  const addSliderHandler = () => {
    setSliders([...sliders, ""]);
  };

  const removeSliderHandler = (i) => {
    let newSliders = [...sliders]
    newSliders = newSliders.filter((_, si) => si !== i)
    setSliders(newSliders);
  };

  const codeMirrorChangeHandler = (value, index) => {
    let newSliders = [...sliders]
    newSliders = newSliders.map((v, i) => {
      if(i === index) {
        return value;
      }
      return v;
    })
    setSliders(newSliders)
  };

  useEffect(() => {
    setData(sliders)
  }, [sliders])

  return (
    <div className="card">
      <div className="card-header">
        <h6>Slider Content</h6>
        <Button type="button" color="primary" className="ml-3" onClick={addSliderHandler}>
          Add New Slider
        </Button>
      </div>
      <div className="card-body">
        {sliders.map((slider, i) => (
          <div key={i}>
            <h6>Slider Content #{i + 1}</h6>
            <div
              className="d-flex justify-content-between align-items-start"
              style={{ gap: "1em" }}
            >
              <CodeMirror
                value={sliders[i]}
                className="flex-grow-1"
                height="200px"
                tabsize="2"
                highlightdifferences="true"
                linenumbers="true"
                theme={okaidia}
                extensions={[html()]}
                onChange={(value) => codeMirrorChangeHandler(value, i)}
              />
              <Button color="danger" className="ml-3" onClick={() => removeSliderHandler(i)}>
                <i className="ph ph-trash"></i>
              </Button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}
