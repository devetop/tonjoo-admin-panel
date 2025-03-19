import { useForm, usePage } from "@inertiajs/react"
import TextInput from "../../../_component/TextInput"
import AlertModal from "../../../_component/AlertModal"

export default function UserEditInformationForm() {
    const { user } = usePage().props

    const { data, setData, put, errors } = useForm({
        _method: 'put',
        id: user.id,
        name: user.name,
        email: user.email,
    })

    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }

    const onSubmitHandler = (e) => {
        e.preventDefault()

        put(route('cms.user.update', user.id), {
            preserveScroll: true
        })
    }

    return (
        <div className="card">
            <div className="card-header">
                <h5 className="card-title mb-0">
                    User Information
                </h5>
            </div>
            <div className="card-body">

                <AlertModal type={'success'} flash_name={'custom.update-success'} />

                <form onSubmit={onSubmitHandler}>
                    <TextInput
                        label="Name"
                        name="name"
                        value={data.name}
                        onChangeHandler={onChangeHandler}
                        error={errors.name}
                        required={true}
                    />

                    <TextInput
                        type="email"
                        label="Email"
                        name="email"
                        value={data.email}
                        onChangeHandler={onChangeHandler}
                        error={errors.email}
                        required={true}
                        inputProps={{ autoComplete: 'username' }}
                    />

                    <button type='submit' className="btn btn-primary">
                        Save
                    </button>
                </form>
            </div>
        </div>
    )
}