import ContentLayout from "../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader";
import TextInput from "../../_component/TextInput";
import CheckboxInput from "../../_component/CheckboxInput";
import { Head, useForm } from "@inertiajs/react";
import TapHead from "../../_component/TapHead";

function EmailTester() {

    const { data, setData, post } = useForm({
        mail_to: 'test@gmail.com',
        set_error: false,
        mail_title: 'Percobaan kirim email',
        mail_body: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam vel neque molestiae temporibus nam voluptatum cupiditate similique doloribus officiis eum.'
    })

    const onSubmitHandler = (e) => {
        e.preventDefault()
        
        post(route('cms.tool.email-tester.tes'))
    }

    const formDataChangeHandler = (e) => {
        if (e.target.type == 'checkbox') {
            setData(e.target.name, e.target.checked)    
            return;
        }
        setData(e.target.name, e.target.value)
    }

    return (
        <div className="row">
            <div className="col-lg-9">
                <div className="card">
                    <div className="card-body">

                        <form id="form-send" onSubmit={onSubmitHandler}>
                            <TextInput
                                label="Email Tujuan"
                                name="mail_to"
                                value={data.mail_to}
                                onChangeHandler={formDataChangeHandler}
                                required={true}
                            />

                            <CheckboxInput
                                label="Simulasi Error"
                                name="set_error"
                                value={data.set_error}
                                onChangeHandler={formDataChangeHandler}
                            />

                            <TextInput
                                label="Judul"
                                name="mail_title"
                                value={data.mail_title}
                                onChangeHandler={formDataChangeHandler}
                                required={true}
                            />

                            <TextInput
                                type="textarea"
                                label="Deskripsi"
                                name="mail_body"
                                value={data.mail_body}
                                onChangeHandler={formDataChangeHandler}
                                required={true}
                            />
                        </form>

                    </div>
                </div>
            </div>
            <div className="col-lg-3">
                <div className="card">
                    <div className="card-header">
                        <h5 className="card-title mb-0">Action</h5>
                    </div>
                    <div className="card-body py-3">
                        <div className="row">
                            <div className="col-12">
                                <button type="submit" form="form-send" className="btn btn-primary w-100"><span>Send</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default (props) => (
    <ContentLayout
        sectionHeader={
            <SectionHeader>
                <SectionTitle>
                    Email Tester
                </SectionTitle>
            </SectionHeader>
        }
    >
        <TapHead title="Email Tester" />

        <EmailTester {...props} />
    </ContentLayout>
)