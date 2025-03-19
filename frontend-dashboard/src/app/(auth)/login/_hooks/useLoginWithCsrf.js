import { useDispatch } from "react-redux";
import { setIsLoading, setUser } from "@/lib/redux/slices/session-slice";
import { useLazyGetCsrfQuery, usePostLoginMutation } from "@/app/(auth)/_api/authApi";

export default function useLoginWithCsrf() {
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
      dispatch(setUser(user))
    } catch (error) {
      // console.error('Error during login:', error);
    } finally {
      dispatch(setIsLoading(false))
    }
  };

  return { loginWithCsrf, data, errors: error, isLoading };
}