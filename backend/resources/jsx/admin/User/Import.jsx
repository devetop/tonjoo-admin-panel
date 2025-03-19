import { Head, useForm } from '@inertiajs/react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';
import { setBreadcrumbs, setActiveSidebarMenu } from '../../_redux/slices/LayoutSlice'
import classNames from 'classnames';
import TapHead from '../../_component/TapHead';

function Import() {

    const {
        setData: setFormData, 
        post: formPost,
        errors: formErrors
    } = useForm({
        excel: ''
    });
    const [uploadRes, setUploadRes] = useState({
        log_filepath: '',
        excel_filepath: '',
        logs_count: 0,
    });
    const [logs, setLogs] = useState({
        data: {
            logs: []
        },
        status: null,
    })

    const onSubmitHandler = (e) => {
        e.preventDefault();

        formPost(route('cms.user.import.upload'), {
            onSuccess: (res) => {
                const custom = res.props.flash.custom;
                setUploadRes({
                    ...uploadRes,
                    ...custom,
                });
            },
        })
    }

    useEffect(() => {
        if (logs.status === 'done') {
            return;
        }
    
        if (uploadRes.excel_filepath && uploadRes.log_filepath) {
            const timer = setTimeout(() => {
                fetch(route('cms.user.import.progress', uploadRes))
                    .then(res => res.json())
                    .then(res => {
                        setLogs(prevLogs => ({
                            ...prevLogs,
                            ...res,
                        }));
                        if (res.status === 'process') {
                            setUploadRes(prev => ({
                                ...prev,
                                logs_count: res.data.logs.length
                            }));
                        }
                    });
            }, 1000);
    
            return () => clearTimeout(timer);
        }
    }, [uploadRes, logs.status]);    

    return (
        <div className="card">
        <div className="card-header">
            <form onSubmit={onSubmitHandler}>
                <div className="form-group row">
                    <div className="col-12 col-md-2 col-lg-2">
                        <label htmlFor="importFileInput" className="control-label text-left font-weight-normal d-flex align-items-center">
                            Import File
                            <span className="required">*</span>
                        </label>
                    </div>
                    <div className="col-12 col-md-10 col-lg-10">
                        <div className="d-flex align-items-start">
                            <div className="input-wrap w-100">
                                <input type="file"
                                    className="form-control"
                                    id="importFileInput"
                                    onChange={(e) => setFormData('excel', e.target.files[0])}
                                />
                                {
                                    formErrors?.excel && (
                                        <div className="invalid-feedback" role="alert" style={{display: 'block'}}>
                                            {formErrors?.excel}
                                        </div>
                                    )
                                }
                            </div>
                            <button type="submit" className="btn btn-primary ml-3">
                                Import
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div className="form-group row mb-0">
                <div className="col-12 col-md-2 col-lg-2">
                    <label className="control-label text-left font-weight-normal d-flex align-items-center">
                        Import File
                    </label>
                </div>
                <div className="col-12 col-md-10 col-lg-10">
                    <div className="card shadow-none border bg-black ">
                        <div className="card-body p-3 overflow-auto" style={{height: 350}}>
                            {
                                logs.data.logs.map((log, i) => (
                                    <p className={classNames({
                                        'text-danger': log.level == 'error',
                                        'text-warning': log.level == 'warning'
                                    })} key={i}>{log?.level} {log?.text}</p>
                                ))
                            }
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['User', route('cms.user')], ['Import']]))
        dispatch(setActiveSidebarMenu('cms.user'));
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Import User
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Import User' />
            <Import {...props} />
        </ContentLayout>
    )
}