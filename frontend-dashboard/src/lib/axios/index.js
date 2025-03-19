import axios from 'axios';
import { getPersistedStateData } from '../../helper';
export const clientApi = () => {
  const instance = axios.create({
    baseURL: '/api',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
    },
    withCredentials: true,
    withXSRFToken: true,
  });

  let isLogoutLoading = false;
  instance.interceptors.response.use(
    (response) => {
      return response;
    },
    (error) => {
      return Promise.reject(error);

      let redirect = window.location.pathname;
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams) {
        const redirectParam = urlParams.get('redirect');
        if (redirectParam) {
          redirect = redirectParam;
        }
      }

      if (
        error?.response?.data?.message === 'Unauthenticated.' &&
        error?.response?.status === 401
      ) {
        if (isLogoutLoading) return;

        // Menentukan URL login berdasarkan tipe user
        const parsedData = getPersistedStateData();
        const authState = parsedData?.auth
          ? JSON.parse(parsedData.auth)
          : null;

        // Menggunakan userAdmin == true untuk menentukan halaman login yang sesuai
        const isAdmin = !!authState?.userAdmin;
        const loginUrl =
          isAdmin
            ? `/admin/403?redirect=${redirect}` // Untuk admin
            : `/dashboard/403?redirect=${redirect}`; // Untuk tipe pengguna lainnya (default)

        window.location.href = loginUrl;
        
        isLogoutLoading = false;
      }

      if (
        error?.response?.data?.message ===
        'Your account is inactive.' &&
        error?.response?.status === 403
      ) {
        if (isLogoutLoading) return;

        const redirect_url = `${window.location.protocol}//${window.location.hostname
          }${window.location.port ? ':' + window.location.port : ''
          }/dashboard/login?redirect=${redirect}`;

        const logoutRelawan = instance.post('/relawan/logout');
        const logoutAdmin = instance.post('/logout');
        /**
         * @todo redirect ke halaman 403, jangan langsung logout, bikin bingung user.
         */
        Promise.all([logoutRelawan, logoutAdmin])
          .finally(() => {
            localStorage.removeItem('persist:root');
            setTimeout(() => {
              window.location.href = redirect_url;
              isLogoutLoading = false;
            }, 5000);
            isLogoutLoading = false;
          })
          .catch((error) => {
            console.error(error);
          });

        isLogoutLoading = true;
      }

      return Promise.reject(error);
    }
  );

  return instance;
};

export const serviceClient =
  ({ baseUrl } = { baseUrl: '' }) =>
    async ({ url, method, data, params }) => {
      try {
        const result = await clientApi()({
          url: baseUrl + url,
          method,
          data,
          params,
          headers:
            data instanceof FormData
              ? { 'Content-Type': 'multipart/form-data' }
              : undefined,
        });
        return { data: result.data };
      } catch (axiosError) {
        const err = axiosError;
        return {
          error: {
            status: err.response?.status,
            data: err.response?.data || err.message,
          },
        };
      }
    };
