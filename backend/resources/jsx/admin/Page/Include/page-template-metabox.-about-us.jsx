import { useEffect, useState } from "react";
import ImageInput from "../../../_component/ImageInput";
import TextInput from "../../../_component/TextInput";
import classNames from "classnames";
import TextEditorInput from "../../../_component/TextEditorInput";

// # Section 1 / core values
function Section1CardForm({ data, onChange, index, errors, showDelete, onDeleteHandler, onAddHandler }) {
    return (
        <div className="card">
            <div className="card-header">
                <div className="d-flex justify-content-between align-items-center">
                    <h3 className="card-title"># {index + 1}</h3>
                    <div className="d-flex" style={{ gap: '1em' }}>
                        {
                            showDelete && (
                                <button type="button" className="btn btn-sm btn-outline-danger" onClick={() => onDeleteHandler(index)}>
                                    <i className="fas fa-minus"></i>
                                </button>
                            )
                        }
                        <button type="button" className="btn btn-sm btn-outline-primary" onClick={onAddHandler}>
                            <i className="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div className="card-body">
                <div className="row">
                    <div className="col-12 col-lg-auto">
                        <ImageInput
                            defaultImgUrl={data.image_url}
                            name="image_file"
                            label="Icon Images"
                            value={data.image_file}
                            onChangeHandler={onChange}
                            error={errors?.[`meta.about_us.section1.cards.${index}.image_file`]}
                        />
                    </div>
                    <div className="col-12 col-lg">
                        <div className="mb-3">
                            <TextInput
                                label={`Title`}
                                name={`title`}
                                value={data.title}
                                onChangeHandler={onChange}
                                error={errors?.[`meta.about_us.section1.cards.${index}.title`]}
                            />
                        </div>
                        <div className="mb-3">
                            <TextInput
                                label={`Description`}
                                name={`description`}
                                value={data.description}
                                onChangeHandler={onChange}
                                error={errors?.[`meta.about_us.section1.cards.${index}.description`]}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

const defaultCardSection1FormData = {
    image_url: '',
    image_file: '',
    title: '',
    description: '',
}

function Section1({ data, setData, errors }) {
    const [expand, setExpand] = useState(true);

    const [header, setHeader] = useState(data?.header || {
        title: '',
        subtitle: ''
    })
    const [cards, setCards] = useState(data?.cards || [
        defaultCardSection1FormData,
    ]);

    const headerFormOnChangeHandler = (e) => {
        setHeader({
            ...header,
            [e.target.name]: e.target.value
        })
    }

    const cardFormOnChangeHandler = (index, e) => {
        let newCards = [...cards];

        newCards[index] = {
            ...newCards[index],
            [e.target.name]:
                e.target.type == 'file'
                    ? e.target.files[0]
                    : e.target.value

        };

        setCards(newCards);
    }

    const cardFormOnAddHandler = () => {
        setCards([
            ...cards,
            {
                ...defaultCardSection1FormData,
            }
        ])
    }

    const cardFormOnDeleteHandler = (index) => {
        const newCards = [...cards]
        newCards.splice(index, 1)
        setCards(newCards)
    }

    useEffect(() => {
        setData({ header, cards });
    }, [header, cards])

    return (
        <>
            <div className="card">
                <div className="card-header">
                    <div className="d-flex justify-content-between align-items-center">
                        <h3 className="card-title">
                            Care Values
                        </h3>
                        <div>
                            <button className="btn btn-sm btn-default" type="button" onClick={() => setExpand(!expand)}>
                                {
                                    expand ? <i className="ph ph-caret-up"></i> : <i className="ph ph-caret-down"></i>
                                }
                            </button>
                        </div>
                    </div>
                </div>
                <div className={classNames('card-body', {
                    'd-none': !expand,
                })}>
                    <div className="card">
                        <div className="card-header">
                            <h4 className="card-title">Header Text</h4>
                        </div>
                        <div className="card-body">
                            <TextInput
                                className="mb-3"
                                label="Title"
                                name="title"
                                value={header.title}
                                onChangeHandler={headerFormOnChangeHandler}
                                error={errors?.['meta.about_us.section1.header.title']}
                            />

                            <TextInput
                                className="mb-3"
                                label="Subtitle"
                                name="subtitle"
                                value={header.subtitle}
                                onChangeHandler={headerFormOnChangeHandler}
                                error={errors?.['meta.about_us.section1.header.subtitle']}
                            />
                        </div>
                    </div>

                    {
                        cards.map((card, i) => (
                            <Section1CardForm
                                key={i}
                                data={card}
                                index={i}
                                onChange={(e) => cardFormOnChangeHandler(i, e)}
                                errors={errors}
                                showDelete={cards.length > 1}
                                onDeleteHandler={cardFormOnDeleteHandler}
                                onAddHandler={cardFormOnAddHandler}
                            />
                        ))
                    }
                </div>
            </div>
        </>
    )
}

// # Section 2 / teams
function Section2CardForm({ data, onChange, index, errors, showDelete, onDeleteHandler, onAddHandler }) {
    return (
        <div className="card">
            <div className="card-header">
                <div className="d-flex justify-content-between align-items-center">
                    <h3 className="card-title"># {index + 1}</h3>
                    <div className="d-flex" style={{ gap: '1em' }}>
                        {
                            showDelete && (
                                <button type="button" className="btn btn-sm btn-outline-danger" onClick={() => onDeleteHandler(index)}>
                                    <i className="fas fa-minus"></i>
                                </button>
                            )
                        }
                        <button type="button" className="btn btn-sm btn-outline-primary" onClick={onAddHandler}>
                            <i className="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div className="card-body">
                <div className="row">
                    <div className="col-12 col-lg-auto">
                        <ImageInput
                            defaultImgUrl={data.image_url}
                            name="image_file"
                            label="Icon Images"
                            value={data.image_file}
                            onChangeHandler={onChange}
                            error={errors?.[`meta.about_us.section2.cards.${index}.image_file`]}
                        />
                    </div>
                    <div className="col-12 col-lg">
                        <TextInput
                            className="mb-3"
                            label="Name"
                            name="name"
                            value={data.name}
                            onChangeHandler={onChange}
                            error={errors?.[`meta.about_us.section2.cards.${index}.name`]}
                        />

                        <TextInput
                            className="mb-3"
                            label="Job Title"
                            name="job_title"
                            value={data.job_title}
                            onChangeHandler={onChange}
                            error={errors?.[`meta.about_us.section2.cards.${index}.job_title`]}
                        />

                        <TextInput
                            className="mb-3"
                            label="Facebook"
                            name="social_fb"
                            value={data.social_fb}
                            onChangeHandler={onChange}
                            error={errors?.[`meta.about_us.section2.cards.${index}.social_fb`]}
                        />

                        <TextInput
                            className="mb-3"
                            label="Twitter / X"
                            name="social_x"
                            value={data.social_x}
                            onChangeHandler={onChange}
                            error={errors?.[`meta.about_us.section2.cards.${index}.social_x`]}
                        />

                        <TextInput
                            className="mb-3"
                            label="Linkedin"
                            name="social_in"
                            value={data.social_in}
                            onChangeHandler={onChange}
                            error={errors?.[`meta.about_us.section2.cards.${index}.social_in`]}
                        />
                    </div>
                </div>
            </div>
        </div>
    )
}

const defaultCardSection2FormData = {
    image_url: '',
    image_file: '',
    name: '',
    job_title: '',
    social_fb: '',
    social_x: '',
    social_in: ''
}

function Section2({ data, setData, errors }) {
    const [expand, setExpand] = useState(true);

    const [header, setHeader] = useState(data?.header || {
        title: '',
        subtitle: ''
    })

    const [cards, setCards] = useState(data?.cards || [
        defaultCardSection2FormData,
    ]);


    const headerFormOnChangeHandler = (e) => {
        setHeader({
            ...header,
            [e.target.name]: e.target.value
        })
    }

    const cardFormOnChangeHandler = (index, e) => {
        let newCards = [...cards];

        newCards[index] = {
            ...newCards[index],
            [e.target.name]:
                e.target.type == 'file'
                    ? e.target.files[0]
                    : e.target.value

        };

        setCards(newCards);
    }

    const cardFormOnAddHandler = () => {
        setCards([
            ...cards,
            {
                ...defaultCardSection2FormData,
            }
        ])
    }

    const cardFormOnDeleteHandler = (index) => {
        const newCards = [...cards]
        newCards.splice(index, 1)
        setCards(newCards)
    }

    useEffect(() => {
        setData({ header, cards });
    }, [header, cards])


    return (
        <>
            <div className="card">
                <div className="card-header">
                    <div className="d-flex justify-content-between align-items-center">
                        <h3 className="card-title">
                            Teams
                        </h3>
                        <div>
                            <button className="btn btn-sm btn-default" type="button" onClick={() => setExpand(!expand)}>
                                {
                                    expand ? <i className="ph ph-caret-up"></i> : <i className="ph ph-caret-down"></i>
                                }
                            </button>
                        </div>
                    </div>
                </div>
                <div className={classNames('card-body', {
                    'd-none': !expand,
                })}>
                    <div className="card">
                        <div className="card-header">
                            <h4 className="card-title">Header Text</h4>
                        </div>
                        <div className="card-body">
                            <TextInput
                                className="mb-3"
                                label="Title"
                                name="title"
                                value={header.title}
                                onChangeHandler={headerFormOnChangeHandler}
                                error={errors?.['meta.about_us.section2.header.title']}
                            />

                            <TextInput
                                className="mb-3"
                                label="Subtitle"
                                name="subtitle"
                                value={header.subtitle}
                                onChangeHandler={headerFormOnChangeHandler}
                                error={errors?.['meta.about_us.section2.header.subtitle']}
                            />
                        </div>
                    </div>

                    {
                        cards.map((card, i) => (
                            <Section2CardForm
                                key={i}
                                data={card}
                                index={i}
                                onChange={(e) => cardFormOnChangeHandler(i, e)}
                                errors={errors}
                                showDelete={cards.length > 1}
                                onAddHandler={cardFormOnAddHandler}
                                onDeleteHandler={cardFormOnDeleteHandler}
                            />
                        ))
                    }
                </div>
            </div>
        </>
    )
}

// # Section 3 / theme
function Section3CardForm({ data, onChange, index, errors, showDelete, onDeleteHandler, onAddHandler }) {
    return (
        <div className="card">
            <div className="card-header">
                <div className="d-flex justify-content-between align-items-center">
                    <h3 className="card-title"># {index + 1}</h3>
                    <div className="d-flex" style={{ gap: '1em' }}>
                        {
                            showDelete && (
                                <button type="button" className="btn btn-sm btn-outline-danger" onClick={() => onDeleteHandler(index)}>
                                    <i className="fas fa-minus"></i>
                                </button>
                            )
                        }
                        <button type="button" className="btn btn-sm btn-outline-primary" onClick={onAddHandler}>
                            <i className="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div className="card-body">
                <ImageInput
                    className="mb-3"
                    defaultImgUrl={data.image_url}
                    name="image_file"
                    label="Icon Images"
                    value={data.image_file}
                    onChangeHandler={onChange}
                    error={errors?.[`meta.about_us.section3.cards.${index}.image_file`]}
                />

                <TextInput
                    className="mb-3"
                    label="Title"
                    name="title"
                    value={data.title}
                    onChangeHandler={onChange}
                    error={errors?.[`meta.about_us.section3.cards.${index}.title`]}
                />

                <TextEditorInput
                    className="mb-3"
                    label="Content"
                    name="content"
                    placeholder="Content"
                    value={data.content}
                    onChangeHandler={v => onChange(v, 'text-editor')}
                    error={errors?.[`meta.about_us.section3.cards.${index}.content`]}
                    editorHeight={200}
                />
            </div>
        </div>
    )
}

const defaultCardSection3FormData = {
    image_url: '',
    image_file: '',
    title: '',
    content: ''
}

function Section3({ data, setData, errors }) {
    const [expand, setExpand] = useState(true);

    const [header, setHeader] = useState(data?.header || {
        title: '',
        subtitle: ''
    })

    const [cards, setCards] = useState(data?.cards || [
        defaultCardSection3FormData,
    ]);


    const headerFormOnChangeHandler = (e) => {
        setHeader({
            ...header,
            [e.target.name]: e.target.value
        })
    }

    const cardFormOnChangeHandler = (index, e, type) => {
        let newCards = [...cards];

        if (type == 'text-editor') {
            newCards[index] = {
                ...newCards[index],
                content: e
            }
        } else {
            newCards[index] = {
                ...newCards[index],
                [e.target.name]:
                    e.target.type == 'file'
                        ? e.target.files[0]
                        : e.target.value

            };
        }

        setCards(newCards);
    }

    const cardFormOnAddHandler = () => {
        setCards([
            ...cards,
            {
                ...defaultCardSection2FormData,
            }
        ])
    }

    const cardFormOnDeleteHandler = (index) => {
        const newCards = [...cards]
        newCards.splice(index, 1)
        setCards(newCards)
    }

    useEffect(() => {
        setData({ header, cards });
    }, [header, cards])


    return (
        <>
            <div className="card">
                <div className="card-header">
                    <div className="d-flex justify-content-between align-items-center">
                        <h3 className="card-title">
                            Theme
                        </h3>
                        <div>
                            <button className="btn btn-sm btn-default" type="button" onClick={() => setExpand(!expand)}>
                                {
                                    expand ? <i className="ph ph-caret-up"></i> : <i className="ph ph-caret-down"></i>
                                }
                            </button>
                        </div>
                    </div>
                </div>
                <div className={classNames('card-body', {
                    'd-none': !expand,
                })}>
                    <div className="card">
                        <div className="card-header">
                            <h4 className="card-title">Header Text</h4>
                        </div>
                        <div className="card-body">
                            <TextInput
                                className="mb-3"
                                label="Title"
                                name="title"
                                value={header.title}
                                onChangeHandler={headerFormOnChangeHandler}
                                error={errors?.['meta.about_us.section3.header.title']}
                            />

                            <TextInput
                                className="mb-3"
                                label="Subtitle"
                                name="subtitle"
                                value={header.subtitle}
                                onChangeHandler={headerFormOnChangeHandler}
                                error={errors?.['meta.about_us.section3.header.title']}
                            />
                        </div>
                    </div>

                    {
                        cards.map((card, i) => (
                            <Section3CardForm
                                key={i}
                                data={card}
                                index={i}
                                onChange={(e, type) => cardFormOnChangeHandler(i, e, type)}
                                errors={errors}
                                showDelete={cards.length > 1}
                                onAddHandler={cardFormOnAddHandler}
                                onDeleteHandler={cardFormOnDeleteHandler}
                            />
                        ))
                    }
                </div>
            </div>
        </>
    )
}


export function AboutUsForm({ data, setData, errors }) {
    return (
        <>
            <Section1
                setData={(v) => setData('meta.about_us.section1', v)}
                data={data?.section1}
                errors={errors}
            />

            <Section2
                setData={(v) => setData('meta.about_us.section2', v)}
                data={data?.section2}
                errors={errors}
            />

            <Section3
                setData={(v) => setData('meta.about_us.section3', v)}
                data={data?.section3}
                errors={errors}
            />
        </>
    )
}