import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";

export default function PostsTable({ posts }) {
  const { delete: destroy } = useForm();

  const deleteHandler = (post) => {
    Swal.fire({
      title: "Delete Content",
      text: "Are you sure want to delete this content?",
      icon: "question",
      showCancelButton: true,
    }).then((result) => {
      if (result.value) {
        destroy(route(`cms.post.delete`, post.id));
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
        {posts.data.map((post, i) => (
          <tr key={i}>
            <td>{post.title}</td>
            <td>
              {post.author.name}
            </td>
            <td>
              {post.terms
                .filter((term) => term.taxonomy.name === "post_category")
                .map((cat, i) => (
                  <span key={i}>{(i > 0 ? ", " : "") + cat.name}</span>
                ))}
            </td>
            <td>
              {post.terms
                .filter((term) => term.taxonomy.name === "post_tag")
                .map((tag, i) => (
                  <span key={i}>{(i > 0 ? ", " : "") + tag.name}</span>
                ))}
            </td>
            <td>
              {post.status}
            </td>
            <td className="text-center">
              <Link
                href={route(`cms.post.edit`, post.id)}
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
 