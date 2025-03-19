import { Link } from "@inertiajs/react";
import classNames from "classnames";
import { confirmAndNavigate } from '../../../_helper'

export default function WorkerCronNav({ type}) {

    const jobType = (type == 'queue-pending') ? 'job' : 'failed-job';
    const onRetryAllHandler=() => {
        confirmAndNavigate('Are you sure want to retry all job?', route('cms.tool.worker.job-retry', { id: 'all', job_type: jobType }))
    }
    const onDeleteAllHandler= () => {
        confirmAndNavigate('Are you sure want to delete all job?', route('cms.tool.worker.job-destroy', { id: 'all', job_type: jobType }))
    }

    return (
        <div className="row align-items-center mb-3">
            <div className="col-md-6">
                <div className="list-status">
                    <ul>
                        <li className={classNames({ active: type === 'list-cron' })}>
                            <Link href={route('cms.tool.worker.cron')}>List Cron</Link>
                        </li>
                        <li className={classNames({ active: type === 'cron-history' })}>
                            <Link href={route('cms.tool.worker.history-cron')}>Cron History</Link>
                        </li>
                        <li className={classNames({ active: type === 'queue-pending' })}>
                            <Link href={route('cms.tool.worker.job')}>Queue Pending</Link>
                        </li>
                        <li className={classNames({ active: type === 'queue-failed' })}>
                            <Link href={route('cms.tool.worker.failed-job')}>Queue Failed</Link>
                        </li>
                    </ul>
                </div>
            </div>
            <div className="col-md-6">
                {
                    (type === 'queue-pending' || type === 'queue-failed') && (
                        <div className="d-flex justify-content-end">
                            <button
                                onClick={onRetryAllHandler}
                                className="btn btn-default btn-sm mr-2"
                            >
                                <i title="Retry" className="fas fa-sync mr-1"></i>
                                Retry All
                            </button>

                            <button
                                onClick={onDeleteAllHandler}
                                className="btn btn-outline-danger btn-sm"
                            >
                                <i title="Trash" className="fas fa-trash mr-1"></i>
                                Delete All
                            </button>
                        </div>
                    )
                }
            </div>
        </div>
    )
}