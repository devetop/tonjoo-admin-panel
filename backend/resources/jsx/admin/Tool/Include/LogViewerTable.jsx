import { useState } from "react";

function TableRow({ log }) {

    const [isLogVisible, setIsLogVisible] = useState(false)

    return (
        <tr onClick={() => setIsLogVisible(!isLogVisible)}>
            <td className={`text-${log.level_class}`}>
                <span className={`fa fa-${log.level_img}`} aria-hidden="true"></span>
                &nbsp;{log.level}
            </td>
            <td className="text">{log.context}</td>
            <td className="date">{log.date}</td>
            <td className="text">
                <div>
                    <div className="align-items-center d-flex justify-content-between">
                        <span>
                            {log.text}
                            {
                                (log?.in_file) && (
                                    <>
                                        <br />
                                        {log.in_file}
                                    </>
                                )
                            }
                        </span>
                        {
                            (log?.stack) && (
                                <button type="button" className="btn btn-default btn-sm">
                                    <span className="ph ph-caret-down"></span>
                                </button>
                            )
                        }
                    </div>
                    {
                        (log?.stack) && (
                            <div 
                                className="stack"
                                style={{
                                    display: (isLogVisible) ? 'block' : 'none',
                                    whiteSpace: 'pre-wrap',
                                }}
                            >
                                {log.stack?.trim()}
                            </div>
                        )
                    }
                </div>
            </td>
        </tr>
    )
}

export default function LogViewerTable({ datas }) {
    return (
        <table
            cellSpacing="0"
            className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
            width="100%"
        >
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Context</th>
                    <th>Date</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                {
                    datas.logs?.map((log, i) => {
                        return <TableRow log={log} key={i} />
                    })
                }
            </tbody>
        </table>
    )
}