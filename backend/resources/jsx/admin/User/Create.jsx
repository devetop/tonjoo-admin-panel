import { Head, useForm } from '@inertiajs/react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import { useEffect } from 'react';
import { useDispatch } from 'react-redux';
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice';
import TextInput from '../../_component/TextInput';
import TapHead from '../../_component/TapHead';

function Create() {

    const { data, setData, post, errors } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    })

    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }

    const onSubmitHandler = (e) => {
        e.preventDefault()

        post(route('cms.user.store'))
    }

    return (
        <div className="row justify-content-center">
            <div className="col-12 col-lg-9 mb-lg-0 mb-3">

                <div className="card">
                    <div className="card-header">
                        <h5 className="card-title mb-0">User Information</h5>
                    </div>

                    <div className="card-body">
                        <form onSubmit={onSubmitHandler} id='form-user'>

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

                        </form>
                    </div>
                </div>

            </div>
            <div className="col-12 col-lg-3">
                <div className="card">
                    <div className="card-header">
                        <h5 className="card-title mb-0">Action</h5>
                    </div>
                    <div className="card-body">
                        <div className="row">
                            <div className="col">
                                <a href={route('cms.user')} className="btn btn-default w-100">
                                    Cancel
                                </a>
                            </div>
                            <div className="col">
                                <button type="submit" form="form-user" className="btn btn-primary w-100">
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

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['User', route('cms.user')], ['Create']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Add New User
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Add New User' />
            <Create {...props} />
        </ContentLayout>
    )
}