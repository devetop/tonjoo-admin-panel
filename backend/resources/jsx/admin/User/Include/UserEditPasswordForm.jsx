import { useForm, usePage } from "@inertiajs/react"
import TextInput from "../../../_component/TextInput"
import AlertModal from "../../../_component/AlertModal"

export default function UserEditPasswordForm() {
    const { user } = usePage().props

    const { data, setData, put, errors, reset } = useForm({
        _method: '_put',
        old_password: '',
        password: '',
        password_confirmation: '',
    })

    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }

    const onSubmitHandler = (e) => {
        e.preventDefault()

        put(route('cms.user.password', user.id), {
            onFinish: () => {
                reset()
            }
        })
    }

    return (
        <div className="card">
            <div className="card-header">
                <h5 className="card-title mb-0">
                    Password
                </h5>
            </div>
            <div className="card-body">
                <form onSubmit={onSubmitHandler}>

                    <AlertModal type='success' flash_name='custom.password-success' />

                    <TextInput
                        type="password"
                        label="Password"
                        name="password"
                        value={data.password}
                        onChangeHandler={onChangeHandler}
                        error={errors.password}
                        required={true}
                        inputProps={{ autoComplete: 'new-password' }}
                    />

                    <TextInput
                        type="password"
                        label="Confirm Password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        onChangeHandler={onChangeHandler}
                        error={errors.password_confirmation}
                        required={true}
                        inputProps={{ autoComplete: 'new-password' }}
                    />

                    <button type='submit' className="btn btn-primary">
                        Save
                    </button>

                </form>
            </div>
        </div>
    )
}