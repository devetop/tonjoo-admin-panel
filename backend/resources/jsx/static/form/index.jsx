import { useEffect } from 'react'
import { useDispatch } from 'react-redux'
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader'
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice';
import { Head, useForm } from '@inertiajs/react';
import PostForm from '../../_component/PostForm';
import TextInput from '../../_component/TextInput';
import TapHead from '../../_component/TapHead';

function Form() {
    const { data, setData, errors } = useForm({
        title: "",
        content: "",
        status: "draft",
        author_id: "",
        slug: "",
        meta: {
            sub_title: "",
            meta_title: "",
            meta_description: "",
            page_template: "default",

            template_data: "",
            template_data2: "",
        },
    });
    const formDataChangeHandler = (name, value) => {
        const nameArr = name.split(".");

        if (nameArr.length === 3 && nameArr[0] === 'term') {
            if (data.term[nameArr[1]].includes(value)) {
                // remove
                setData({
                    ...data,
                    term: {
                        ...data.term,
                        [nameArr[1]]: [...data.term[nameArr[1]]].filter((v) => v !== value)
                    }
                });
            } else {
                // add
                setData({
                    ...data,
                    term: {
                        ...data.term,
                        [nameArr[1]]: [...data.term[nameArr[1]], value]
                    }
                });
            }

            return;
        }

        if (nameArr.length === 2 && nameArr[0] === 'meta') {
            setData({
                ...data,
                meta: {
                    ...data.meta,
                    [nameArr[1]]: value,
                },
            });
            return;
        }

        setData(name, value);
    };
    const saveHandler = (e) => {
        e.preventDefault();
        console.log(data);
    }

    return (
        <>
            <PostForm
                data={data}
                formDataChangeHandler={formDataChangeHandler}
                errors={errors}
                templates={['default', 'template-1', 'template-2', 'template-3']}
                saveHandler={saveHandler}
                post_type={'page'}
                afterContentPost={
                    <>
                        {
                            (data.meta.page_template == 'template-1') && (
                                <div className="card">
                                    <div className="card-header">
                                        <h4 className="card-title">
                                            Template 1
                                        </h4>
                                    </div>
                                    <div className="card-body">
                                        <TextInput
                                            label="Data 1"
                                            value={data.meta.template_data}
                                            onChangeHandler={(e) =>
                                                formDataChangeHandler("meta.template_data", e.target.value)
                                            }
                                            error={errors.meta?.template_data}
                                        />

                                        <TextInput
                                            label="Data 2"
                                            value={data.meta.template_data2}
                                            onChangeHandler={(e) =>
                                                formDataChangeHandler("meta.template_data2", e.target.value)
                                            }
                                            error={errors.meta?.template_data}
                                        />
                                    </div>
                                </div>
                            )
                        }

                        {
                            (data.meta.page_template == 'template-2') && (
                                <div className="card">
                                    <div className="card-header">
                                        <h4 className="card-title">
                                            Template 2
                                        </h4>
                                    </div>
                                    <div className="card-body">

                                    </div>
                                </div>
                            )
                        }

                        {
                            (data.meta.page_template == 'template-3') && (
                                <div className="card">
                                    <div className="card-header">
                                        <h4 className="card-title">
                                            Template 3
                                        </h4>
                                    </div>
                                    <div className="card-body">

                                    </div>
                                </div>
                            )
                        }
                    </>
                }
                afterContentBox={<p>after content box</p>}
            />
        </>
    )
}

export default () => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Form']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Form
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title="Add New Page" />
            <Form />
        </ContentLayout>
    )
}