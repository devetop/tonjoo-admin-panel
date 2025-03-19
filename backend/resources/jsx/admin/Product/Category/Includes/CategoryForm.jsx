import { Link } from "@inertiajs/react";
import Button from "../../../../_component/Button"; 
import TextInput from "../../../../_component/TextInput"; 
import SelectInput from "../../../../_component/SelectInput"; 

export default function CategoryForm({ data, setData, errors, categories, onSubmit, cancelUrl = '/' }) {
  return (
    <form onSubmit={onSubmit}>
      <div className="row justify-content-center">
        <div className="col-lg-9 mb-lg-0 mb-3">
          <div className="card">
            <div className="card-body">
              <TextInput
                  label="Name"
                  name="name"
                  value={data.name}
                  onChangeHandler={(e) =>
                    setData("name", e.target.value)
                  }
                  error={errors.name}
                />
              <SelectInput
                label={`Category Parent`}
                name="parent_term_id"
                value={data.parent_term_id}
                onChangeHandler={(e) =>
                  setData("parent_term_id", e.target.value)
                }
                error={errors.status}
                options={categories.map((category) => ({
                  value: category.id,
                  text: category.prefix_term,
                }))}
              />
            </div>
          </div>
        </div>
        <div className="col-lg-3">
          <div className="card">
            <div className="card-header">
              <h5 className="card-title mb-0">Action</h5>
            </div>
            <div className="card-body">
              <div className="row">
                <div className="col">
                  <Link
                    href={cancelUrl}
                    className="btn btn-warning w-100"
                  >
                    Cancel
                  </Link>
                </div>
                <div className="col">
                  <Button type="submit" className="w-100" color="primary">Save</Button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  );
}
