import { Head, useForm, usePage } from '@inertiajs/react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import TextInput from '../../_component/TextInput';
import ImageInput from '../../_component/ImageInput';
import SelectInput from '../../_component/SelectInput';
import ReactCodeMirror from '@uiw/react-codemirror';
import { okaidia } from '@uiw/codemirror-theme-okaidia';
import { html } from '@codemirror/lang-html';
import { useDispatch } from 'react-redux';
import { useEffect } from 'react';
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice';
import TapHead from '../../_component/TapHead';

function HtmlInput({ name, label, data, setData, errors }) {
    return (
        <div className="mb-3">
            <label htmlFor={name} className="form-label">{label}</label>
            <ReactCodeMirror
                value={data[name] || ''}
                id={name}
                className="flex-grow-1"
                height="200px"
                tabsize="2"
                highlightdifferences="true"
                linenumbers="true"
                theme={okaidia}
                extensions={[html()]}
                onChange={(value) => setData({
                    ...data,
                    [name]: value
                })}
            />
            {
                errors && errors[name] && (
                    <p className="text-danger">{errors[name]}</p>
                )
            }
        </div>
    )
}

function CustomScriptCss({ data, setData, errors }) {
    return (
        <div className="card">
            <div className="card-header">
                <h5 className="card-title">
                    Custom Script/CSS
                </h5>
            </div>
            <div className="card-body">
                <HtmlInput
                    name="header_script"
                    label={
                        <span>Header Script <span style={{ fontSize: '.8em' }}>Please use Tag {'<script></script>'}</span></span>
                    }
                    data={data} setData={setData} errors={errors}
                />

                <HtmlInput
                    name="header_css"
                    label={
                        <span>Header CSS <span style={{ fontSize: '.8em' }}>Please Use Tag {'<style> or <Link>'}</span></span>
                    }
                    data={data} setData={setData} errors={errors}
                />

                <HtmlInput
                    name="footer_script"
                    label={
                        <span>Footer Script <span style={{ fontSize: '.8em' }}>Please use Tag {'<script></script>'}</span></span>
                    }
                    data={data} setData={setData} errors={errors}
                />

                <HtmlInput
                    name="footer_css"
                    label={
                        <span>Footer CSS <span style={{ fontSize: '.8em' }}>Please Use Tag {'<style> or <Link>'}</span></span>
                    }
                    data={data}
                    setData={setData}
                />
            </div>
        </div>
    )
}

function HomePage({ data, onChange, errors }) {

    const { homePageTypes } = usePage().props

    return (
        <div className="card">
            <div className="card-header">
                <h5 className="card-title mb-0">
                    Home Page
                </h5>
            </div>
            <div className="card-body">
                <SelectInput
                    label="Type"
                    name="home_page_type"
                    value={data.home_page_type}
                    onChangeHandler={onChange}
                    error={errors.home_page_type}
                    options={homePageTypes}
                />
            </div>
        </div>
    )
}

function Website({ data, onChange, errors }) {
    return (
        <div className="card">
            <div className="card-header">
                <h5 className="card-title mb-0">Website</h5>
            </div>
            <div className="card-body">
                <TextInput
                    label="Title"
                    name="web_title"
                    required={true}
                    value={data.web_title}
                    onChangeHandler={onChange}
                    error={errors.web_title}
                />

                <TextInput
                    type="textarea"
                    label="Description"
                    name="web_description"
                    required={true}
                    value={data.web_description}
                    onChangeHandler={onChange}
                    error={errors.web_description}
                />

                <ImageInput
                    label="Favicon"
                    name="favicon"
                    onChangeHandler={onChange}
                    error={errors.favicon}
                    defaultImgUrl={data.old_favicon_old}
                    defaultFilename={data.favicon}
                />
            </div>
        </div>
    )
}

function TermOfServiceNPrivacyPolicy({data, onChange, errors}) {
    return (
        <div className="card">
            <div className="card-header">
                <h5 className="card-title mb-0">Term of Service & Privacy Policy</h5>
            </div>
            <div className="card-body">
                <TextInput
                    type="textarea"
                    label="Terms of Service"
                    name="web_terms_of_service"
                    value={data.web_terms_of_service}
                    onChangeHandler={onChange}
                    error={errors.web_terms_of_service}
                />

                <TextInput
                    type="textarea"
                    label="Privacy Policy"
                    name="web_privacy_policy"
                    value={data.web_privacy_policy}
                    onChangeHandler={onChange}
                    error={errors.web_privacy_policy}
                />
            </div>
        </div>
    )
}

function General({ generals, isCmsEnabled }) {

    const { data, setData, post, errors } = useForm({
        ...generals,
    })

    const onChangeHandler = (e) => {
        switch (e.target.type) {
            case 'file':
                setData(e.target.name, e.target.files[0])
                return;
            default:
                setData(e.target.name, e.target.value)
                return;
        }
    }
    const onSubmitHandler = (e) => {
        e.preventDefault()
        post(route('cms.option.general.store'))
    }

    return (
        <form onSubmit={onSubmitHandler}>
            <div className="row justify-content-center">
                <div className="col-12 col-lg-9 mb-lg-0 mb-3">
                    <Website
                        data={data}
                        onChange={onChangeHandler}
                        errors={errors}
                    />

                    <TermOfServiceNPrivacyPolicy
                        data={data}
                        onChange={onChangeHandler}
                        errors={errors}
                    />

                    {
                        isCmsEnabled && (
                            <HomePage
                                data={data}
                                onChange={onChangeHandler}
                                errors={errors}
                            />
                        )
                    }

                    <CustomScriptCss
                        data={data}
                        setData={setData}
                        errors={errors}
                    />
                </div>
                <div className="col-12 col-lg-3">
                    <div className="card">
                        <div className="card-header">
                            <h5 className="card-title mb-0">Action</h5>
                        </div>
                        <div className="card-body">
                            <div className="row">
                                <div className="col-12">
                                    <button type="submit" className="btn btn-primary w-100">
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Options'], ['General']]))
    }, [])

    return (
        <ContentLayout sectionHeader={
            <SectionHeader>
                <SectionTitle>
                    Manage General
                </SectionTitle>
            </SectionHeader>
        }>
            <TapHead title='Manage General' />
            <General {...props} />
        </ContentLayout>
    )
}