export default function PostsTable({ posts }) {
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
          </tr>
        ))}
      </tbody>
    </table>
  );
}
 