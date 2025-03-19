import { Head } from "@inertiajs/react";
import { LoginPanel } from "../../admin/Auth/Login";
import TapHead from "../../_component/TapHead";

export default function Login() {
    return (
        <>
            <TapHead title="Login" />

            <LoginPanel 
                submitRouteName={'dashboard.login-attempt'} 
                forgotPasswordRouteName={'dashboard.password.request'}
                sideTitle={'Laravel - Dashboard Inertia'}
                primaryColor="red"
            />
        </>
    )
}