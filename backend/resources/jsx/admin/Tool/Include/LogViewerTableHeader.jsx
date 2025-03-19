export default function LogViewerTableHeader({ datas, params, filterHandler }) {

    const selectFileChangeHandler = (e) => {
        let l = e.target.value
        filterHandler({ l })
    }

    return (
        <div className="row align-items-center mb-3">
            <div className="col-sm-12 col-md-12">
                <div className="row row-action separator justify-content-end align-items-center">
                    <div className="col-auto d-flex">
                        <div className="d-flex align-items-center text-muted ">
                            <span className="mr-2">
                                <span>Show</span>
                            </span>
                            <select 
                                defaultValue={params.l}
                                onChange={selectFileChangeHandler} 
                                className="form-control form-control-sm" placeholder="File"
                            >
                                {
                                    datas.files.map((file, i) => (
                                        <option
                                            key={i}
                                            value={file.value}
                                        >
                                            {file.label} 
                                        </option>
                                    ))
                                }
                            </select>
                        </div>
                        {
                            (datas.current_file) && (
                                <a
                                    className="btn btn-sm btn-default ml-2"
                                    href={`?dl=${datas.encrypted_current_file}`}
                                >
                                    <span className="ph ph-download"></span>
                                    Download Log File
                                </a>
                            )
                        }
                    </div>

                    <div className="col-auto column-button">
                        <a className="btn btn-sm btn-outline-danger" id="delete-log"
                            href={`?del=${datas.encrypted_current_file}`}>
                            <span className="ph ph-trash"></span>
                            Delete Log File
                        </a>
                        {
                            (datas.files?.length > 1) && (
                                <a className="btn btn-sm btn-outline-danger ml-2" id="delete-all-log" href="?delall=true">
                                    <span className="ph ph-trash"></span>
                                    Delete all files
                                </a>
                            )
                        }
                    </div>

                </div>
            </div >
        </div >
    )
}