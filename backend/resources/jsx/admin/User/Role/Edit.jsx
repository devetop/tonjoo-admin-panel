import { SectionHeader, SectionTitle } from '../../../_component/SectionHeader';
import { setActiveSidebarMenu, setBreadcrumbs } from '../../../_redux/slices/LayoutSlice'
import ContentLayout from '../../../_component/ContentLayout';
import CheckboxInput from '../../../_component/CheckboxInput';
import { useDispatch } from 'react-redux';
import { useEffect, useState } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';
import TextInput from '../../../_component/TextInput';
import './edit.scss';
import classNames from 'classnames';
import TapHead from '../../../_component/TapHead';

function RoleItems({ capability, data, setData }) {

    const onChangeHandler = (isSelected, key) => {
        // parent changed
        if (capability.key === key) {
            const keys = [key, ...capability.childs.map((c) => c.key)];
            setData('permission', data.permission.filter((item) => !keys.includes(item)))
            if (isSelected) {
                setData('permission', [...data.permission, ...keys])
            }
            return;
        }

        if (isSelected) {
            setData('permission', [...data.permission, key])
        } else {
            setData('permission', data.permission.filter((item) => item !== key))
        }
    }

    return (
        <div className="role-items">
            <table className="checkboxContainer table table-bordered roleTable mb-4">
                <tbody>
                    <tr>
                        <th width="10">
                            <CheckboxInput 
                                index={capability.key} 
                                value={data.permission.includes(capability.key)}
                                onChangeHandler={(e) => onChangeHandler(e.target.checked, capability.key)} 
                            />
                        </th>
                        <th>
                            <label 
                                htmlFor={`${capability.key}_checkbox`}
                                className="form-label mb-0"
                                role='button'
                            >
                                {capability.name}
                            </label>
                        </th>
                    </tr>
                    {
                        capability.childs.map((c, i) => (
                            <tr key={i}>
                                <td>
                                    <CheckboxInput 
                                        index={c.key}
                                        value={data.permission.includes(c.key)}
                                        onChangeHandler={(e) => onChangeHandler(e.target.checked, c.key)} 
                                    />
                                </td>
                                <td>
                                    <label 
                                        htmlFor={`${c.key}_checkbox`} 
                                        className='font-weight-normal mb-0'
                                        role='button'
                                    >
                                        {c.name}
                                    </label>
                                </td>
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </div>
    )
}

function Edit({ context, contexts, role, capabilities }) {

    const [availablesCapabilities, setAvailablesCapabilities] = useState([]);
    const { data, setData, put } = useForm({
        context,
        name: role.name,
        permission: []
    })

    const onChangeHandler = (e) => {
        setData(e.target.name, e.target.value)
    }
    const saveAttempt = () => {
        put(route('cms.role.update', role.id), {
            data: {
                ...data,
                _method: 'put',
                permission: data.permission.map((p) => {
                    return p.replace(`${context}.`, '')
                })
            }
        })
    }

    useEffect(() => {
        const _capabilities = Object.keys(capabilities).map(key => ({
            key,
            name: capabilities[key].name,
            childs: Object.keys(capabilities[key].capabilities).map(childKey => ({
                parentKey: key,
                key: childKey,
                name: capabilities[key].capabilities[childKey].name
            }))
        }))
        setAvailablesCapabilities(_capabilities)
        setData('permission', role.permissions.map((item) => item.permission.replace(`${context}.`, '')))
    }, [])

    return (
        <div className="row justify-content-center">
            <div className="col-lg-9 mb-lg-0 mb-3">
                <div className="card">
                    <div className="card-header">
                        <div className="row">
                            <h5 className="card-title mb-0">Role Information</h5>
                        </div>
                    </div>

                    <div className="card-body">

                        <div className="row mb-2">
                            <div className="col-md-4">

                                <TextInput
                                    label="Name"
                                    name="name"
                                    value={data.name}
                                    onChangeHandler={onChangeHandler}
                                    required={true}
                                />

                            </div>
                        </div>

                        {
                            contexts.map((c, i) => (
                                <Link
                                    key={i}
                                    className={classNames('btn', 'btn-sm', 'mb-2', `btn-${(context == c.name) ? 'primary' : 'neutral'}`)} 
                                    href={
                                        route('cms.role.edit', {
                                            context: c.name,
                                            id: role.id
                                        })
                                    }
                                >
                                    {c.title}
                                </Link>
                            ))
                        }

                        <div className="role-wrap">
                            {
                                availablesCapabilities.map((ac, i) => (
                                    <RoleItems 
                                        key={i} 
                                        capability={ac}
                                        data={data}
                                        setData={setData}
                                    />
                                ))
                            }
                        </div>

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
                                <Link href={ route('cms.role') } className="btn btn-default w-100">
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
    const title = `Manage Role ${props.role.name}`;

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setActiveSidebarMenu('cms.role'))
        dispatch(setBreadcrumbs([
            ['User', route('cms.user')],
            ['Role', route('cms.role')],
            [title]
        ]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        {title}
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title={title} />
            <Edit {...props} />
        </ContentLayout>
    )
}