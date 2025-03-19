import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";

export default function TagTable({ tags }) {
  const { delete: destroy } = useForm();

  const deleteHandler = (tag) => {
    Swal.fire({
      title: `Delete Post Tag`,
      text: `Are you sure want to delete this Post Tag?`,
      icon: "question",
      showCancelButton: true,
    }).then((result) => {
      if (!result.value) return;

      destroy(
        route(`cms.product.tag.destroy`, {
          tag: tag.id,
        })
      );
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
          <th width="100" className="text-center">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        {tags.data.map((tag, i) => (
          <tr key={i}>
            <td>{tag.name}</td>
            <td className="text-center">
              <Link
                href={route(`cms.product.tag.edit`, {
                  tag: tag.id,
                })}
                title="Edit"
                className="btn btn-xs btn-link"
              >
                <i className="ph ph-pencil" />
              </Link>
              <Link className="btn btn-xs btn-link">
                <i
                  role="button"
                  className="ph ph-trash mr-1"
                  onClick={() => deleteHandler(tag)}
                ></i>
              </Link>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}
