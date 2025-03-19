import { useDispatch } from "react-redux";
import { usePathname, useRouter } from "next/navigation";
import { setIsLoading, setUserAdmin } from "@/lib/redux/slices/session-slice";
import { adminProductApi } from "@/app/admin/products/_api/adminProductApi";
import { usePostLogoutMutation } from "@/app/(auth)/_api/authApi";

export default function useAdminLogout() {
    const [postLogout] = usePostLogoutMutation()
    const dispatch = useDispatch()
    const router = useRouter()
    const pathname = usePathname()

    const logout = async () => {
        try {
            dispatch(setIsLoading(true))
            dispatch(setUserAdmin(null))

            // reset state
            dispatch(adminProductApi.util.resetApiState())

            await postLogout()
        } catch (error) {
            console.error('Error during login:', error)
        } finally {
            dispatch(setIsLoading(false))
            router.push('/login-as-admin?redirect=' + pathname)
        }
    }

    return { logout }
}