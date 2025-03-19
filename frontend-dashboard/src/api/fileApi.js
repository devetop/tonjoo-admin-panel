import { validationTransformError } from "@/helper";
import { serviceClient } from "@/lib/axios";
import { createApi } from "@reduxjs/toolkit/query/react";

export const fileApi = createApi({
    reducerPath: 'fileApi',
    baseQuery: async (args) => serviceClient()(args),
    endpoints(builder) {
        return {
            postPublicFile: builder.mutation({
                query: ({data, publicPath = '/file/example'}) => ({url: `/file${publicPath}`, method: 'post', data}),
                transformErrorResponse: validationTransformError,
            }),
            postPrivateFile: builder.mutation({
                query: ({data, privatePath = 'private/file/example'}) => ({ url: `/file/private/${privatePath}`, method: 'post', data }),
                transformErrorResponse: validationTransformError,
            })
        }
    }
})

export const {
    usePostPublicFileMutation,
    usePostPrivateFileMutation,
} = fileApi