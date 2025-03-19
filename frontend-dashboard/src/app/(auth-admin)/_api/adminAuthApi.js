import { serviceClient } from "@/lib/axios";
import { validationTransformError } from "@/helper";
import { createApi } from "@reduxjs/toolkit/query/react";

export const adminAuthApi = createApi({
  reducerPath: 'admin.authApi',
  baseQuery: async (args) => serviceClient()(args),
  endpoints(builder) {
    return {
      getCsrf: builder.query({
        query: () => ({ url: '/sanctum/csrf-cookie', method: 'get' })
      }),
      postLogin: builder.mutation({
        query: ({ payload }) => ({ url: '/admin/login', data: payload, method: 'post' }),
        transformErrorResponse: validationTransformError
      }),
      postLogout: builder.mutation({
        query: () => ({ url: '/admin/logout', method: 'post' }),
      }),
    }
  }
})

export const {
  useLazyGetCsrfQuery,
  usePostLoginMutation,
  usePostLogoutMutation,
} = adminAuthApi;