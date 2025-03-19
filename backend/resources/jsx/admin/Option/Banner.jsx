import { useEffect } from 'react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import { useDispatch } from 'react-redux';
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice';
import { Head, useForm } from '@inertiajs/react';
import TextInput from '../../_component/TextInput';
import ReactCodeMirror from '@uiw/react-codemirror';
import { html } from '@codemirror/lang-html';
import { okaidia } from '@uiw/codemirror-theme-okaidia';
import TapHead from '../../_component/TapHead';

const defaultBannerData = {
    name: '',
    content: '',
}

function BannerCard({ index, data, onChange, error, onDelete }) {
    return (
        <div className="row mb-3">
            <div className="col-10">
                <TextInput
                    label="Name"
                    name="name"
                    required={true}
                    value={data['name']}
                    onChangeHandler={(e) => {
                        onChange(index, {
                            ...data,
                            name: e.target.value,
                        })
                    }}
                    index={index}
                    error={error?.name}
                />

                <ReactCodeMirror
                    value={data['content'] || ''}
                    id={`content-${index}`}
                    className="flex-grow-1 mb-3"
                    height="200px"
                    tabsize="2"
                    highlightdifferences="true"
                    linenumbers="true"
                    theme={okaidia}
                    extensions={[html()]}
                    onChange={(value) => onChange(index, {
                        ...data,
                        content: value
                    })}
                />
                {
                    error && error['content'] && (
                        <p className="text-danger">{error['content']}</p>
                    )
                }

            </div>
            <div className="col-2 text-center">
                <button 
                    className="btn btn-sm btn-danger" 
                    type='button' 
                    onClick={() => onDelete(index)}
                >
                    <i className="ph ph-trash"></i>
                </button>
            </div>
        </div>
    )
}

function Banner({ banners }) {

    const { data, setData, post, errors } = useForm(banners)

    const addBannerHandler = () => {
        setData([...data, defaultBannerData])
    }
    const onDeleteHandler = (index) => {
        setData(data.filter((_, i) => i !== index))
    }
    const onChangeHandler = (index, newValue) => {
        let _data = [...data]
        _data[index] = newValue
        setData(_data)
    }
    const onSubmitHandler = (e) => {
        e.preventDefault()
        post(route('cms.option.banner.store'))
    }

    return (
        <form onSubmit={onSubmitHandler}>
            <div className="row justify-content-center">
                <div className="col-lg-9 mb-lg-0 mb-3">
                    <div className="card">
                        <div className="card-header">
                            <div className="row align-items-center">
                                <div className="col-8">
                                    <label className="control-label text-left">Banner Image</label>
                                </div>
                                <div className="col-4 d-flex justify-content-end">
                                    <button type='button' className='btn btn-primary' onClick={addBannerHandler}>
                                        Add Banner
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div className="card-body">
                            {
                                data.map((banner, i) => (
                                    <BannerCard
                                        key={i}
                                        index={i}
                                        data={banner}
                                        onChange={onChangeHandler}
                                        onDelete={onDeleteHandler}
                                        errors={errors[i]}
                                    />
                                ))
                            }
                        </div>
                    </div>
                </div>
                <div className="col-lg-3">
                    <div className="card">
                        <div className="card-header">
                            <h5 className="card-title mb-0">Action</h5>
                        </div>
                        <div className="card-body">
                            <button type="submit" className="btn btn-primary w-100">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form >
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Options'], ['Banner']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Manage Banner
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Manage Banner' />
            <Banner {...props} />
        </ContentLayout>
    )
}