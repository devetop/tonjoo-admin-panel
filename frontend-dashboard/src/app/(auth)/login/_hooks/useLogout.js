import { useDispatch } from "react-redux";
import { usePathname, useRouter } from "next/navigation";
import { setIsLoading, setUser } from "@/lib/redux/slices/session-slice";
import { usePostLogoutMutation } from "@/app/(auth)/_api/authApi";
import { dashboardProductApi } from "@/app/dashboard/products/_api/dashboardProductApi";

export default function useLogout() {
    const [postLogout] = usePostLogoutMutation()
    const dispatch = useDispatch()
    const router = useRouter()
    const pathname = usePathname()

    const logout = async () => {
        try {
            dispatch(setIsLoading(true))
            dispatch(setUser(null))

            // reset state
            dispatch(dashboardProductApi.util.resetApiState())

            await postLogout()
        } catch (error) {
            console.error('Error during login:', error)
        } finally {
            dispatch(setIsLoading(false))
            router.push('/login?redirect=' + pathname)
        }
    }

    return { logout }
}