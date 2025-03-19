import { usePage } from '@inertiajs/react';
import Contentlayout from '../../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../../_component/SectionHeader';
import { PasswordForm, UserInformationForm } from '../../../admin/User/Profile/Edit';

function Profile({}) {

    const { dashboard } = usePage().props.auth
    
    return (
        <>
            <PasswordForm submitRouteName='dashboard.profile.password' />
            <UserInformationForm submitRouteName='dashboard.profile.edit' user={dashboard} />
        </>
    )
}

export default (props) => {
    return (
        <Contentlayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Profile
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <Profile {...props} />
        </Contentlayout>
    )
}