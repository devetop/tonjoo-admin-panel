import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";

export default function RoleTable({ roles }) {

    const {delete: destroy} = useForm()
    const deleteHandler = (roleId) => {
        Swal.fire({
            title: "Delete Role",
            text: "Are you sure want to delete this Role?",
            icon: "question",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                destroy(route(`cms.role.delete`, roleId));
            }
        });
    }

    return (
        <table
            cellSpacing="0"
            className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
            width="100%"
        >
            <thead>
                <tr>
                    <th>Name</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                {
                    roles.data.map((role, i) => (
                        <tr key={i}>
                            <td>{role.name}</td>
                            <td>
                                <div className="d-flex text-sm" style={{gap: '1rem'}}>
                                    <Link href={route('cms.role.edit', role.id)}>
                                        <i className="ph ph-pencil mr-1"></i>
                                        Edit
                                    </Link>
                                    <span className="text-danger" role="button" onClick={() => deleteHandler(role.id)}>
                                        <i className="ph ph-trash mr-1"></i>
                                        Delete
                                    </span>
                                </div>
                            </td>
                        </tr>
                    ))
                }
            </tbody>
        </table>

    )
}