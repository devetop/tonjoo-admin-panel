import { useState } from "react";
import { confirmAndNavigate, formatTanggalIndo } from "../../../_helper";

function TextToggler({ text }) {
    const [isLong, setIsLong] = useState(false)

    return (
        <div style={{position: 'relative'}}>
            { isLong ? text : text.slice(0, 200) + ' ...' }
            <button className="btn btn-default btn-sm" onClick={() => setIsLong(!isLong)} style={{
                position: 'absolute',
                top: 0,
                right: 0
            }}>
                <i className={`ph ph-caret-${isLong ? 'up' : 'down'}`}></i>
            </button>
        </div>
    )
}

export default function WorkerCronFailedTable({ jobs }) {

    const onSyncHandler = (jobId) => {
        confirmAndNavigate('Are you sure to synchronize this failed cron?', route('cms.tool.worker.job-retry', { id: jobId, job_type: 'failed-job' }))
    }

    const onDeleteHandler = (jobId) => {
        confirmAndNavigate('Are you sure to delete this failed cron?', route('cms.tool.worker.job-destroy', { id: jobId, job_type: 'failed-job' }))
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
                    <th>Uuid</th>
                    <th>Connection</th>
                    <th>Queue</th>
                    <th>Payload</th>
                    <th>Execution</th>
                    <th>Failed at</th>
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
                        <td>{job.uuid}</td>
                        <td>{job.connection}</td>
                        <td>{job.queue}</td>
                        <td>
                            <TextToggler text={job.payload} />
                        </td>
                        <td>
                            <TextToggler text={job.exception} />
                        </td>
                        <td>{formatTanggalIndo(job.failed_at)}</td>
                        <td>
                            <div className="d-flex justify-content-center align-items-center" style={{ gap: '.5em' }}>
                                <button
                                    onClick={() => onSyncHandler(job.id)}
                                    className="icon-retry btn btn-sm btn-light">
                                    <i title="Retry" className="fas fa-sync"></i>
                                </button>

                                <button
                                    onClick={() => onDeleteHandler(job.id)}
                                    className="icon-delete btn btn-sm btn-danger">
                                    <i title="Trash" className="fas fa-trash text-white"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    )
}