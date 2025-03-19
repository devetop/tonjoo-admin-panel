import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";

export default function PageTable({ posts }) {
  const { delete: destroy } = useForm();

  const deleteHandler = (post) => {
    Swal.fire({
      title: "Delete Page",
      text: "Are you sure want to delete this page?",
      icon: "question",
      showCancelButton: true,
    }).then((result) => {
      if (result.value) {
        destroy(route(`cms.page.delete`, post.id));
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
          <th>Status</th>
          <th width="100" className="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        {posts.data.map((post, i) => (
          <tr key={i}>
            <td>{post.title}</td>
            <td>
              {post.author.name}
            </td>
            <td>
              {post.status}
            </td>
            <td className="text-center">
              <Link
                href={route(`cms.page.edit`, post.id)}
                title="Edit"
                className="btn btn-xs btn-link"
              >
                <i className="ph ph-pencil" />
              </Link>
              {post.status === "draft" && (
                <Link className="btn btn-xs btn-link">
                  <i
                    className="ph ph-trash mr-1"
                    onClick={() => deleteHandler(post)}
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
 