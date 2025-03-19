import { useDispatch } from "react-redux";
import { setIsLoading, setUserAdmin } from "@/lib/redux/slices/session-slice";
import { useLazyGetCsrfQuery, usePostLoginMutation } from "../_api/adminAuthApi";

export default function useAdminLoginWithCsrf() {
  const [postLogin, { data, error, isLoading }] = usePostLoginMutation();
  const [triggerGetCsrf] = useLazyGetCsrfQuery();

  const dispatch = useDispatch();

  const loginWithCsrf = async ({ payload }) => {
    try {
      dispatch(setIsLoading(true))
      // Get CSRF token
      await triggerGetCsrf()
      // Perform login
      const result = await postLogin({ payload }).unwrap();
      const user = result?.data?.user
      dispatch(setUserAdmin(user))
    } catch (error) {
      // console.error('Error during login:', error);
    } finally {
      dispatch(setIsLoading(false))
    }
  };

  return { loginWithCsrf, data, errors: error, isLoading };
}