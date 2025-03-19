import { Link, router, useForm, usePage } from '@inertiajs/react';
import SelectInput from '../../../_component/SelectInput';
import AlertModal from '../../../_component/AlertModal';

function RolesList() {

    const { user, role_user } = usePage().props

    const onDeleteHandler = (role_id) => {
        router.delete(route('cms.user.delete-role-user', {
            user: user.id,
            role: role_id
        }), {
            preserveScroll: true,
        })
    }

    return (
        <>
            <h6 className='font-weight-bold'>Role List</h6>

            <table className='table table-bordered'>
                <tbody>
                    <tr>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </tbody>
                <tbody>
                    {
                        role_user.map((role, i) => (
                            <tr key={i}>
                                <td>{role.name}</td>
                                <td>
                                    <button className="btn btn-sm btn-neutral text-danger" onClick={() => onDeleteHandler(role.id)}>
                                        <i className="ph ph-trash mr-1"></i>
                                        <span>Delete</span>
                                    </button>

                                </td>
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </>
    )
}

export default function UserEditRoleForm() {

    const { roles, user } = usePage().props
    const { data, setData, post, errors, reset } = useForm({
        user_id: user.id,
        role_id: ''
    })

    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }
    const onSubmitHandler = (e) => {
        e.preventDefault()
        post(route('cms.user.create-role-user'), {
            preserveScroll: true,
            onFinish: () => {
                reset()
            },
        })
    }

    return (
        <div className="card">
            <div className="card-header">
                <h5 className="card-title mb-0">
                    Add User Role
                </h5>
            </div>
            <div className="card-body">

                <AlertModal type={'success'} flash_name={'custom.create_role_user-success'} />
                <AlertModal type={'danger'} flash_name={'custom.create_role_user-error'} />

                <form onSubmit={onSubmitHandler}>
                    <SelectInput
                        label="Role Name"
                        name="role_id"
                        value={data.role_id}
                        onChangeHandler={onChangeHandler}
                        error={errors.role_id}
                        options={roles.map((role) => ({
                            text: role.name,
                            value: role.id
                        }))}
                        required={true}
                    />

                    <button type='submit' className="btn btn-primary">
                        Save
                    </button>

                    <hr />
                </form>
                <RolesList />
            </div>
        </div>
    )
}