import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";

export default function ProductTable({ products }) {
  const { delete: destroy } = useForm();

  const deleteHandler = (post) => {
    Swal.fire({
      title: "Delete Product",
      text: "Are you sure want to delete this Product?",
      icon: "question",
      showCancelButton: true,
    }).then((result) => {
      if (result.value) {
        destroy(route(`cms.product.delete`, post.id));
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
          <th>Title</th>
          <th>Author</th>
          <th width={140}>Categories</th>
          <th width={140}>Tags</th>
          <th>Status</th>
          <th width="100" className="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        {products.data.map((product, i) => (
          <tr key={i}>
            <td>{product.title}</td>
            <td>
              {product.author.name}
            </td>
            <td>
              {product.terms
                .filter((term) => term.taxonomy.name === "product_category")
                .map((cat, i) => (
                  <span key={i}>{(i > 0 ? ", " : "") + cat.name}</span>
                ))}
            </td>
            <td>
              {product.terms
                .filter((term) => term.taxonomy.name === "product_tag")
                .map((tag, i) => (
                  <span key={i}>{(i > 0 ? ", " : "") + tag.name}</span>
                ))}
            </td>
            <td>
              {product.status}
            </td>
            <td className="text-center">
              <Link
                href={route(`cms.product.edit`, product.id)}
                title="Edit"
                className="btn btn-xs btn-link"
              >
                <i className="ph ph-pencil" />
              </Link>
              {product.status === "draft" && (
                <Link className="btn btn-xs btn-link">
                  <i
                    className="ph ph-trash mr-1"
                    onClick={() => deleteHandler(product)}
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
 