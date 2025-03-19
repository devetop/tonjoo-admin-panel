import { Head, useForm } from '@inertiajs/react';
import { useEffect } from "react";
import { useDispatch } from "react-redux";
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice";
import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import TextInput from "../../_component/TextInput";
import ImageInput from '../../_component/ImageInput';
import TapHead from '../../_component/TapHead';

function ThemeOptionsForm({ initialData }) {

    const { data, setData, errors, post } = useForm({ ...initialData })

    const inputOnChangeHandler = (e) => {
        if (e.target.type == 'file') {
            // console.log(e.target.files[0]);
            setData(e.target.name, e.target.files[0]);
            return;
        }

        setData(e.target.name, e.target.value);
    }

    const formOnSubmitHandler = () => {
        post(route('cms.option.general.store'))
    }

    return (
        <div className="row">
            <div className="col-lg-9">
                <div className="card">
                    <div className="card-body">
                        {
                            Object.keys(initialData).map((item, i) => {
                                const title = item.replaceAll('_', ' ').replace(/\b(\w)/g, (_, capture) => capture.toUpperCase())

                                if (item === 'web_logo' || item === 'web_logo_white') {
                                    return (
                                        <ImageInput
                                            key={i}
                                            label={title}
                                            name={item}
                                            onChangeHandler={inputOnChangeHandler}
                                            error={errors[item]}
                                            defaultImgUrl={data[item]}
                                            defaultFilename={data[item]}
                                            value={(typeof data[item] === 'string') ? null : data[item]}
                                        />
                                    );
                                }

                                return (
                                    <TextInput
                                        key={i}
                                        label={title}
                                        name={item}
                                        required={true}
                                        value={data[item]}
                                        onChangeHandler={inputOnChangeHandler}
                                        error={errors[item]}
                                    />
                                )
                            })
                        }
                    </div>

                </div>
            </div>

            <div className="col-lg-3">
                <div className="card mb-3">
                    <div className="card-header">
                        <h5 className="card-title mb-0">Action</h5>
                    </div>
                    <div className="card-body">
                        <div className="row">
                            <div className="col">
                                <button className="btn btn-primary w-100" onClick={formOnSubmitHandler}>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default function FrontendWebThemeOptions({ data }) {

    const dispatch = useDispatch();
    useEffect(() => {
        dispatch(setBreadcrumbs([['Option'], ['Edit Frontend Web Theme Options', route('cms.option.available-sites.index')], ['Edit']]));
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Edit Frontend Web Theme Options
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title="Edit Available Sites" />
            <ThemeOptionsForm initialData={data} />
        </ContentLayout>
    )
}