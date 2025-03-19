export default function WorkerCronHistoryTable({ crons }) {
    return (
        <table
            cellSpacing="0"
            className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
            width="100%"
        >
            <thead>
                <tr>
                    <th width="60%">Nama Cron</th>
                    <th>Last execution</th>
                </tr>
            </thead>
            <tbody>
                {crons.data.map((cron, i) => (
                    <tr key={i}>
                        <td>{cron.name}</td>
                        <td>{cron.time}</td>
                    </tr>
                ))}
            </tbody>
        </table>
    )
}