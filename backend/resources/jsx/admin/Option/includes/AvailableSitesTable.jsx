import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";

export default function AvailavleSitesTable({ available_sites }) {
  return (
    <table
      cellSpacing="0"
      className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
      width="100%"
    >
      <thead>
        <tr>
          <th>Name</th>
          <th>Site base url</th>
          <th>Is cors allowed</th>
          <th>Application token</th>
          <th width="100" className="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        {available_sites.data.map((item, i) => (
          <tr key={i}>
            <td>
                {item.name}
            </td>
            <td>
              {item.base_url}
            </td>
            <td className="text-center">
              {
                item.is_cors_allowed
                ? <i className="ph ph-check text-success"></i>
                : <i className="ph ph-x text-danger"></i>
              }
            </td>
            <td>
              {item.token}
            </td>
            <td className="text-center">
              <Link
                href={route('cms.option.available-sites.edit', item.id)}
                title="Edit"
                className="btn btn-xs btn-link"
              >
                <i className="ph ph-pencil" />
              </Link>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}
 