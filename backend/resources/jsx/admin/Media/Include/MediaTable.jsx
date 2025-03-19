import { Link, useForm } from "@inertiajs/react";
import Swal from "sweetalert2";
import CopyToClipboardText from "../../../_component/CopyToClipboardText";

export default function MediaTable({ posts }) {

    const { delete: destroy } = useForm()

    const deleteHandler = (mediaId) => {
        Swal.fire({
            title: "Delete Media",
            text: "Are you sure want to delete this Media?",
            icon: "question",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                destroy(route(`cms.media.delete`, mediaId));
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Url</th>
                    <th>Last Update</th>
                    <th>Status</th>
                    <th width="300" className="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                {
                    posts.data.map((post, i) => (
                        <tr key={i}>
                            <td>{post.title}</td>
                            <td className="table-user">
                                <img src={post.thumbnail_image} className="img-responsive rounded border" id="media-thumbnail" alt="Media Image" width="100" />
                            </td>
                            <td>
                                <CopyToClipboardText text={post.thumbnail_image} />
                            </td>
                            <td>{post.forhuman_updated_at}</td>
                            <td>{post.status}</td>
                            <td>
                                <div className="d-flex gap-1 justify-content-center align-item-center text-xs">
                                    <Link href={route('cms.media.edit', post.id)}>
                                        <i className="ph ph-pencil"></i> Edit
                                    </Link>
                                    <span onClick={() => deleteHandler(post.id)} className="text-danger" role="button">
                                        <i className="ph ph-trash"></i> Delete
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