import { Head, Link, useForm } from '@inertiajs/react'
import ContentLayout from '../../../_component/ContentLayout'
import { SectionHeader, SectionTitle } from '../../../_component/SectionHeader'
import { useEffect } from 'react'
import { useDispatch } from 'react-redux'
import { setActiveSidebarMenu, setBreadcrumbs } from '../../../_redux/slices/LayoutSlice'
import TextInput from '../../../_component/TextInput';
import TapHead from '../../../_component/TapHead'

function Create() {

    const {data, setData, post, errors} = useForm()

    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }

    const saveAttempt = () => {
        post(route('cms.role.store'))
    }

    return (
        <div className="row justify-content-center">
            <div className="col-lg-9 mb-lg-0 mb-3">
                <div className="card">
                    <div className="card-header">
                        <h5 className="card-title mb-0">Role Information</h5>
                    </div>

                    <div className="card-body">
                        
                        <TextInput
                            label="Name"
                            name="name"
                            value={data.name}
                            onChangeHandler={onChangeHandler}
                            required={true}
                            error={errors.name}
                        />

                    </div>
                </div>
            </div>
            <div className="col-lg-3">
                <div className="card">
                    <div className="card-header">
                        <h5 className="card-title mb-0">Action</h5>
                    </div>
                    <div className="card-body">
                        <div className="row">
                            <div className="col">
                                <Link href={route('cms.role')} className='btn btn-default w-100'>
                                    Cancel
                                </Link>
                            </div>
                            <div className="col">
                                <button className="btn btn-primary w-100" onClick={saveAttempt}>
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
        dispatch(setActiveSidebarMenu('cms.role'))
        dispatch(setBreadcrumbs([['User', route('cms.user')], ['Role', route('cms.role')], ['Add New']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Add New Role
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Add New Role' />
            <Create {...props} />
        </ContentLayout>
    )
}