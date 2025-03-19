import { Link } from "@inertiajs/react";

export default function UserTable({ users }) {

  return (
    <table
      cellSpacing="0"
      className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
      width="100%"
    >
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th width="100" className="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        {users.data.map((user, i) => (
          <tr key={i}>
            <td>{user.name}</td>
            <td>{user.email}</td>
            <td className="text-center" width={100}>
              <Link href={route('cms.user.edit', user.id)}><i className="ph ph-pencil"></i> Edit</Link>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}
