import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";

export default function CategoryTable({ categories }) {
  const { delete: destroy } = useForm();

  const deleteHandler = (category) => {
    Swal.fire({
      title: `Delete Product Category`,
      text: `Are you sure want to delete this Product Category?`,
      icon: "question",
      showCancelButton: true,
    }).then((result) => {
      if (result.value) {
        destroy(
          route(`cms.product.category.destroy`, {
            category: category.id,
          })
        );
      }
    });
  };

  return (
    <table
      cellSpacing="0"
      className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
      width="100%"
    >
      <thead>
        <tr>
          <th>Name</th>
          <th>Parent Category</th>
          <th width="100" className="text-center">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        {categories.data.map((category, i) => (
          <tr key={i}>
            <td>{category.name}</td>
            <td>{category.parent_term?.name}</td>
            <td className="text-center">
              <Link
                href={route(`cms.product.category.edit`, {
                  category: category.id,
                })}
                title="Edit"
                className="btn btn-xs btn-link"
              >
                <i className="ph ph-pencil" />
              </Link>
              {category.child_terms?.length === 0 && (
                <Link className="btn btn-xs btn-link">
                  <i
                    role="button"
                    className="ph ph-trash mr-1"
                    onClick={() => deleteHandler(category)}
                  ></i>
                </Link>
              )}
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}
