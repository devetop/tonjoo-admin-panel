import { confirmAndNavigate, formatTanggalIndo } from "../../../_helper";

export default function WorkerCronPendingTable({ jobs }) {

    const onSyncHandler = (jobId) => {
        confirmAndNavigate('Are you sure want to retry this Queue?', route('cms.tool.worker.job-retry', { id: jobId, job_type: 'job' }))
    }
    const onDeleteHandler = (jobId) => {
        confirmAndNavigate('Are you sure want to delete this Queue?', route('cms.tool.worker.job-destroy', { id: jobId, job_type: 'job' }))
    }

    return (
        <table
            cellSpacing="0"
            className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
            width="100%"
        >
            <thead>
                <tr>
                    <th className="no-sort check-column" width="20">
                        <input type="checkbox" />
                    </th>
                    <th>Id</th>
                    <th>Queue</th>
                    <th>Payload</th>
                    <th>Attempts</th>
                    <th>Reserved At</th>
                    <th>Available At</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {jobs.data.map((job, i) => (
                    <tr key={i}>
                        <td className="check-column text-center">
                            <input type="checkbox" />
                        </td>
                        <td>{job.id}</td>
                        <td>{job.queue}</td>
                        <td>{job.payload}</td>
                        <td>{job.attempts}</td>
                        <td>{formatTanggalIndo(job.reserved_at)}</td>
                        <td>{formatTanggalIndo(job.available_at)}</td>
                        <td>{formatTanggalIndo(job.created_at)}</td>
                        <td>
                            <div className="d-flex justify-content-center align-items-center" style={{gap: '.5em'}}>
                                <button
                                    onClick={() => onSyncHandler(job.id)}
                                    className="icon-retry btn btn-sm btn-light"
                                >
                                    <i title="Retry" className="fas fa-sync"></i>
                                </button>
                                <a
                                    onClick={() => onDeleteHandler(job.id)}
                                    className="icon-delete btn btn-sm btn-danger"
                                >
                                    <i title="Trash" className="fas fa-trash text-white"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    )
}