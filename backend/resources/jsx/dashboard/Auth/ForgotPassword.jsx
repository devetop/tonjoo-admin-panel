import { Head } from "@inertiajs/react";
import { ForgotPanel } from "../../admin/Auth/ForgotPassword";
import TapHead from "../../_component/TapHead";

export default function Login() {
    return (
        <>
            <TapHead title="Fogot Password" />

            <ForgotPanel
                submitRouteName={'dashboard.password.email'}
                sideTitle={'Laravel - Dashboard Inertia'}
                primaryColor="red"
            />
        </>
    )
}