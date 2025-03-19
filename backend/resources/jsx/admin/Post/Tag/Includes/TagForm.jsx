import { Link } from "@inertiajs/react";
import Button from "../../../../_component/Button"; 
import TextInput from "../../../../_component/TextInput"; 

export default function TagForm({ data, setData, errors, onSubmit, cancelUrl = '/' }) {
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
