import { serviceClient } from "@/lib/axios";
import { validationTransformError } from "@/helper";
import { createApi } from "@reduxjs/toolkit/query/react";

export const dashboardProductApi = createApi({
  reducerPath: 'dashboardProductApi',
  baseQuery: async (args) => serviceClient()(args),
  tagTypes: ['dashboard.product', 'dashboard.product.category', 'dashboard.product.category.select', 'dashboard.product.tag.select'],
  endpoints(builder) {
    return {
      getProductPaginate: builder.query({
        query: ({ params }) => ({ url: '/product/mine', method: 'get', params }),
        providesTags: () => [
          {type: 'dashboard.product', id: 'list' }
        ]
      }),
      getProductFilter: builder.query({
        query: () => ({ url: '/product/filter', method: 'get' }),
        transformResponse: (res) => res?.data,
        providesTags: () => [
          {type: 'dashboard.product.category', id: 'list'}
        ]
      }),
      // TAG
      getProductTagSelect: builder.query({
        query: () => ({ url: '/product/tag/select', method: 'get' }),
        providesTags: () => [
          {type: 'dashboard.product.tag.select', id: 'list'}
        ],
      }),
      /// Product Category
      getProductCategorySelect: builder.query({
        query: () => ({ url: '/product/category/select', method: 'get' }),
        providesTags: () => [
          {type: 'dashboard.product.category.select', id: 'list'}
        ],
      }),
      getProductCategoryPaginate: builder.query({
        query: ({ params }) => ({ url: '/product/category', method: 'get', params }),
        transformResponse: (res) => res?.data?.categories,
        providesTags: () => [
          {type: 'dashboard.product.category', id: 'list'}
        ],
      }),
      postCreateProductCategory: builder.mutation({
        query: ({ data }) => ({ url: '/product/category', method: 'post', data }),
        transformErrorResponse: validationTransformError,
        invalidatesTags: [
          {type: 'dashboard.product.category', id: 'list'}
        ],
      }),
      getEditProductCategory: builder.query({
        query: ({id}) => ({ url: `/product/category/${id}/edit`, method: 'get' }),
        transformResponse: (res) => res?.data,
        providesTags: (_, __, {id}) => [
          {type: 'dashboard.product.category', id}
        ]
      }),
      postUpdateProductCategory: builder.mutation({
        query: ({ id, data }) => ({ url: `/product/category/${id}`, method: 'post', data: {...data, _method: 'put'} }),
        transformErrorResponse: validationTransformError,
        invalidatesTags: (_, __, {id}) => [
          {type: 'dashboard.product.category', id: id},
          {type: 'dashboard.product.category', id: 'list'}
        ],
      }),
      postDeleteProductCategory: builder.mutation({
        query: ({id}) => ({ url: `/product/category/${id}`, method: 'delete' }),
        invalidatesTags: (_, __, {id}) => [
          {type: 'dashboard.product.category', id},
          {type: 'dashboard.product.category', id: 'list'}
        ],
      })
    }
  }
})

export const {
  useGetProductPaginateQuery,
  useGetProductFilterQuery,
  useGetProductCategoryPaginateQuery,
  usePostCreateProductCategoryMutation,
  useGetEditProductCategoryQuery,
  useLazyGetEditProductCategoryQuery,
  usePostUpdateProductCategoryMutation,
  usePostDeleteProductCategoryMutation,
  useGetProductCategorySelectQuery,
  useGetProductTagSelectQuery,
} = dashboardProductApi;