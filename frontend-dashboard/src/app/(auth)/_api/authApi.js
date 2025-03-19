import { serviceClient } from "@/lib/axios";
import { validationTransformError } from "@/helper";
import { createApi } from "@reduxjs/toolkit/query/react";

export const authApi = createApi({
  reducerPath: 'authApi',
  baseQuery: async (args) => serviceClient()(args),
  endpoints(builder) {
    return {
      getCsrf: builder.query({
        query: () => ({ url: '/sanctum/csrf-cookie', method: 'get' })
      }),
      postLogin: builder.mutation({
        query: ({ payload }) => ({ url: '/login', data: payload, method: 'post' }),
        transformErrorResponse: validationTransformError
      }),
      postLogout: builder.mutation({
        query: () => ({ url: '/logout', method: 'post' }),
      }),
      postRegister: builder.mutation({
        query: (data) => ({ url: '/register', data, method: 'post' }),
        transformErrorResponse: validationTransformError
      }),
      postForgotPassword: builder.mutation({
        query: (data) => ({ url: '/forgot-password', data, method: 'post' }),
        transformErrorResponse: validationTransformError
      }),
      postResetPassword: builder.mutation({
        query: (data) => ({ url: '/reset-password', data, method: 'post' }),
        transformErrorResponse: validationTransformError
      }),
      getOAuthSsoUrl: builder.query({
        query: ({ driver, redirect }) => ({ url: `/oauth/login`, method: 'get', params: { driver, redirect } })
      }),
      postOAuthProfileUpdate: builder.mutation({
        query: (data) => ({
          url: '/oauth/profile/update',
          method: 'post',
          data,
        })
      }),
    }
  }
})

export const {
  useLazyGetCsrfQuery,
  usePostLoginMutation,
  usePostLogoutMutation,
  usePostRegisterMutation,
  usePostForgotPasswordMutation,
  usePostResetPasswordMutation,
  useLazyGetOAuthSsoUrlQuery,
  usePostOAuthProfileUpdateMutation,
} = authApi;