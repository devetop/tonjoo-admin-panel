import { Head } from '@inertiajs/react';
import ContentLayout from '../../_component/ContentLayout';
import { SectionHeader, SectionTitle } from '../../_component/SectionHeader';
import TapHead from '../../_component/TapHead';

function Dashboard({auth}) {
    return (
        <div className="row">
            <div className="col-12">

                <div className="card">
                    <div className="card-body">
                        <h5 className="card-subtitle my-3">Welcome {auth.dashboard.name}!</h5>
                    </div>
                </div>

            </div>
        </div>
    )
}

export default (props) => {
    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Dashboard
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title='Dashboard' />
            <Dashboard {...props} />
        </ContentLayout>
    )
}