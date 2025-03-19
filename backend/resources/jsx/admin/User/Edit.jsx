import { Head } from '@inertiajs/react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import { useEffect } from 'react';
import { useDispatch } from 'react-redux';
import { setBreadcrumbs } from '../../_redux/slices/LayoutSlice';
import UserEditRoleForm from './Include/UserEditRoleForm';
import UserEditInformationForm from './Include/UserEditInformationForm';
import UserEditPasswordForm from './Include/UserEditPasswordForm';
import TapHead from '../../_component/TapHead';

function Edit() {

    return (
        <>
            <UserEditInformationForm />
            <UserEditPasswordForm />
            <UserEditRoleForm />
        </>
    )
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['User', route('cms.user')], ['Edit']]))
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Manage User
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Manage User' />
            <Edit {...props} />
        </ContentLayout>
    )
}