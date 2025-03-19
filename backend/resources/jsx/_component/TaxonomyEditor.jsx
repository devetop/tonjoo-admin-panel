import { useForm, usePage } from "@inertiajs/react";
import { useState } from "react";
import TextInput from "./TextInput";
import Button from "./Button";
import SelectInput from "./SelectInput";

function Term({ data, term, taxonomy, taxonomyChangeHandler }) {
  return (
    <li>
      <div className="checkbox checkbox-custom">
        <label>
          <input
            type="checkbox"
            name={`term.${term.term}.${term.id}`}
            checked={data.term[taxonomy.name].includes(term.id)}
            onChange={() =>
              taxonomyChangeHandler(
                `term.${taxonomy.name}.${term.term}`,
                term.id
              )
            }
          />
          <span className="icon"></span>
          {term.term}
        </label>
      </div>

      {term.child_terms && (
        <ul className="sub-checkbox-list">
          {term.child_terms?.map((term2, i) => (
            <Term
              key={i}
              data={data}
              term={term2}
              taxonomy={taxonomy}
              taxonomyChangeHandler={taxonomyChangeHandler}
            />
          ))}
        </ul>
      )}
    </li>
  );
}

function TermFormVisible({ taxonomy }) {
  const { data, setData, post, errors, reset } = useForm({
    parent_term_id: "",
    name: "",
  });

  const addTermAttempt = () => {
    post(route(`cms.${taxonomy.name.replace('_', '.')}.store`, {
      taxonomy: taxonomy.name,
      redirect_back: true
    }), {
      preserveScroll: true,
    })
    reset()
  };

  return (
    <div className="my-2">
      <TextInput
        label={`New ${taxonomy.title} Name`}
        name="name"
        value={data.name}
        onChangeHandler={(e) => setData("name", e.target.value)}
        size="sm"
        error={errors.name}
      />
      {
        taxonomy.name.includes('_category') && (
          <SelectInput
            label={`Parent ${taxonomy.title}`}
            name="parent_term_id"
            value={data.parent_term_id}
            onChangeHandler={(e) => setData("parent_term_id", e.target.value)}
            size="sm"
            error={errors.parent_term_id}
            options={taxonomy.terms.map((term) => ({
              text: term.name,
              value: term.id,
            }))}
          />
        )
      }
      <Button type="button" size="sm" className="mt-2" onClick={addTermAttempt}>
        Add New {taxonomy.title}
      </Button>
    </div>
  );
}

export default function TaxonomyEditor({
  taxonomy,
  data,
  taxonomyChangeHandler,
}) {
  const [termFormVisible, setTermFormVisible] = useState(false);

  return (
    <div className="card mb-3">
      <div className="card-header border-bottom-0 pb-0">
        <h5 className="card-title mb-0">{taxonomy.title}</h5>
      </div>
      <div className="card-body" style={{ padding: "0 8px" }}>
        <ul className="checkbox-list" style={{height: 150}}>
          {taxonomy.terms.map((term, i) => (
            <Term
              key={i}
              data={data}
              term={term}
              taxonomy={taxonomy}
              taxonomyChangeHandler={taxonomyChangeHandler}
            />
          ))}
        </ul>
      </div>
      <div className="card-footer bg-white border-top-0 pt-0">
        <span
          className="d-block"
          role="button"
          onClick={() => setTermFormVisible((cur) => !cur)}
        >
          Add {taxonomy.title}
        </span>

        {termFormVisible && <TermFormVisible taxonomy={taxonomy} />}
      </div>
    </div>
  );
}
