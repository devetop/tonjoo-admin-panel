import { Head, usePage } from '@inertiajs/react';
import Contentlayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import { PasswordForm, UserInformationForm } from '../../admin/User/Profile/Edit';
import TapHead from '../../_component/TapHead';

function Profile({}) {

    const { dashboard } = usePage().props.auth;

    return (
        <>
            <PasswordForm submitRouteName='dashboard.profile.password' />
            <UserInformationForm submitRouteName='dashboard.profile.update' user={dashboard} />
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
            <TapHead title='Dashboard' />

            <Profile {...props} />
        </Contentlayout>
    )
}