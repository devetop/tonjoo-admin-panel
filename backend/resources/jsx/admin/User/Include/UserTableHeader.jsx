import { useEffect, useState } from "react";
import SearchBar from "../../../_component/SearchBar";
import { Link } from "@inertiajs/react";

function ExportButton({setDownloadBatchFilename}) {
    const [isActive, setIsActive] = useState(false);
    const [title, setTitle] = useState('Export Page');
    const [isExporting, setIsExporting] = useState(false);
    const [exportBatchFilename, setExportBatchFilename] = useState('');
    const [isLinkReady, setIsLinkReady] = useState(false);

    const onChangeHandler = (e) => {
        setTitle(e.target.innerHTML)
        setIsActive(false)
    }

    const getIsExporting = (batchId) => {
        fetch(route('cms.user.export.progress', {batchId}))
            .then(res=>res.json())
            .then(res=>{
                setIsExporting(res.exporting)
                if (res.exporting) {
                    setTimeout(() => getIsExporting(batchId), 400);
                } else {
                    setIsLinkReady(true);
                    return false;
                }
            })
    }
    const onExportBatchHandler = () => {
        fetch(route('cms.user.export.batch', {filename: 'export-page'}))
            .then(res=>res.json())
            .then(res=>{
                setExportBatchFilename(res.filename)
                getIsExporting(res.batchId)
            })
    }

    useEffect(() => {
        if (isLinkReady) {
            setDownloadBatchFilename(exportBatchFilename);
            setIsLinkReady(false);
        }
    }, [isLinkReady])

    return (
        <div className="btn-group">
            {
                (title == 'Export Page')
                ? (
                    <a
                        className="btn btn-sm btn-default px-3"
                        href={route('cms.user.export.page', {filename: 'export-page'})}
                    >
                        {title}
                    </a>  
                ) : (
                    <button 
                        className="btn btn-sm btn-default" 
                        onClick={onExportBatchHandler}
                        disabled={isExporting}
                    >
                        { 
                            isExporting 
                                ? (
                                    <div className="spinner-border spinner-border-sm" role="status">
                                        <span className="sr-only">Loading...</span>
                                    </div>
                                ) : title
                        }
                    </button>
                )
            }
            <button
                type="button"
                className="btn btn-sm btn-default dropdown-toggle"
                onClick={() => setIsActive(!isActive)}
            >
            </button>
            <div
                className="dropdown-menu dropdown-menu-right"
                role="menu"
                style={{ top: 0, display: isActive ? 'block' : 'none' }}
            >
                <a className="dropdown-item" href="#" onClick={onChangeHandler}>
                    Export All
                </a>
                <a className="dropdown-item" href="#" onClick={onChangeHandler}>
                    Export Page
                </a>
            </div>
        </div>
    );
}

export default function UserTableHeader({search, setSearch, filterHandler, clearFilterHandler, isFilterClearable, setDownloadBatchFilename}) {
    return (
        <>
            <div className="d-flex justify-content-end align-items-center mb-3">
                <div>
                    <div className="row row-action separator justify-content-end align-items-center">
                        <div className="col-auto column-button">
                            <Link href={route('cms.user.import')} className="btn btn-sm btn-default px-3 mr-2">
                                Import
                            </Link>
                            
                            <ExportButton setDownloadBatchFilename={setDownloadBatchFilename} />
                        </div>
                        <div className="col-auto column-search">
                            <SearchBar
                                search={search}
                                setSearch={setSearch}
                                filterHandler={filterHandler}
                            />
                        </div>
                        <div className="col-auto column-filter">
                            <button className="btn btn-sm btn-default js-filter-btn">
                                <i className="icon ph ph-funnel" />
                                <i className="icon ph ph-x" style={{ display: "none" }} />
                            </button>

                            {
                                isFilterClearable && (
                                    <button
                                        className="btn btn-sm btn-default ml-2"
                                        onClick={clearFilterHandler}
                                    >
                                        <i className="icon ph ph-arrow-counter-clockwise" />
                                    </button>
                                )
                            }
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}