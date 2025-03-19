import HeaderNav from "@frontend/js/Components/HeaderNav";
import AdminBar from "@frontend/js/Components/AdminBar";
import Subscription from "@frontend/js/Components/Subscription";

export default function AppLayout ({ auth, masthead, post, children }) {
  return (
    <>
        {/* Content Header (Page header) */}
        <HeaderNav />

        {/* Mast Head */}
        {masthead}

        {/* Main content */}
        {children}

        {/* Footer */}
        <Subscription />

        {/* Admin Bar */}
        {auth.admin && (
          <AdminBar user={auth.admin} post={post} />
        )}
    </>
  );
}
