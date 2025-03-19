import { useSelector } from 'react-redux';
import AlertModal, { AllPagesAlertModal } from './AlertModal';
import Layout from './Layout';

function ContentLayout ({ sectionHeader, children }) {

  const alert = useSelector(state => state.layout.alert);

  return (
    <>
        {/* Content Header (Page header) */}
        {sectionHeader}

        {/* Main content */}
        <section className="content">
            <div className="container-fluid">
                <div className="mw-1200px">

                    <AllPagesAlertModal type={'success'} />
                    <AllPagesAlertModal type={'error'} />
                    <AllPagesAlertModal type={'warning'} />
                    <AlertModal type={alert.type} message={alert.message} />

                    {children}

                </div>
            </div>
        </section>
    </>
  );
}

export default (props) => (
  <Layout {...props}>
    <ContentLayout {...props} />
  </Layout>
)