import { useEffect } from "react"
import ContentLayout from "../../../_component/ContentLayout"
import { SectionHeader, SectionTitle } from "../../../_component/SectionHeader"
import { useDispatch } from "react-redux"
import { setBreadcrumbs } from "../../../_redux/slices/LayoutSlice"
import { Head, useForm, usePage } from "@inertiajs/react"
import TextInput from "../../../_component/TextInput"
import AlertModal from "../../../_component/AlertModal"
import TapHead from "../../../_component/TapHead"

export function PasswordForm({submitRouteName = 'cms.profile.password'}) {

    const { data, setData, put, errors, reset } = useForm({
        method: '_put',
        old_password: '',
        password: '',
        password_confirmation: '',
    })
    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }
    const onSubmitHandler = (e) => {
        put(route(submitRouteName), {
            onSuccess: () => {
                reset()
            }
        })
    }

    return (
        <div className="card">
            <div className="card-header">
                <h3 className="card-title">
                    Password
                </h3>
            </div>
            <div className="card-body">

                <AlertModal type='success' flash_name={'custom.password-success'} />

                <TextInput
                    label="Current Password"
                    name="old_password"
                    type="password"
                    required={true}
                    value={data.old_password}
                    onChangeHandler={onChangeHandler}
                    error={errors.old_password}
                    inputProps={{ autoComplete: 'current-password' }}
                />

                <TextInput
                    label="New Password"
                    name="password"
                    type="password"
                    required={true}
                    value={data.password}
                    onChangeHandler={onChangeHandler}
                    error={errors.password}
                    inputProps={{ autoComplete: 'new-password' }}
                />

                <TextInput
                    label="Confirm New Password"
                    name="password_confirmation"
                    type="password"
                    required={true}
                    value={data.password_confirmation}
                    onChangeHandler={onChangeHandler}
                    error={errors.password_confirmation}
                    inputProps={{ autoComplete: 'new-password' }}
                />

                <div className="float-end">
                    <button className="btn btn-primary" onClick={onSubmitHandler}>
                        Change password
                    </button>
                </div>

            </div>
        </div>
    )
}

export function UserInformationForm({user = null, submitRouteName = 'cms.profile.update'}) {

    const { data, setData, put, errors } = useForm({
        method: '_put',
        name: user.name,
        email: user.email,
    })
    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }
    const onSubmitHandler = () => {
        put(route(submitRouteName))
    }

    return (
        <form className="mb-3">

            <div className="card">
                <div className="card-header">
                    <h3 className="card-title">
                        User information
                    </h3>
                </div>
                <div className="card-body">

                    <AlertModal type='success' flash_name={'custom.update-success'} />

                    <TextInput
                        label="Name"
                        name="name"
                        required={true}
                        value={data.name}
                        onChangeHandler={onChangeHandler}
                        error={errors.name}
                    />

                    <TextInput
                        type="email"
                        label="Email"
                        name="email"
                        required={true}
                        value={data.email}
                        onChangeHandler={onChangeHandler}
                        error={errors.email}
                    />

                    <div className="float-end">
                        <button type="button" className="btn btn-primary" onClick={onSubmitHandler}>
                            Save
                        </button>
                    </div>

                </div>

            </div>
        </form>
    )
}

function Edit() {

    const { admin } = usePage().props.auth

    return (
        <>
            <UserInformationForm user={admin} />
            <PasswordForm />
        </>
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([
            ['User', route('cms.profile.edit')],
            ['Profile'],
            ['Edit']]
        ))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Edit Profile
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title="Edit Profile" />
            <Edit {...props} />
        </ContentLayout>
    )
}