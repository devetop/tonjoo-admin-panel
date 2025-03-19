import { serviceClient } from "@/lib/axios";
import { validationTransformError } from "@/helper";
import { createApi } from "@reduxjs/toolkit/query/react";

export const adminProductApi = createApi({
  reducerPath: 'adminProductApi',
  baseQuery: async (args) => serviceClient()(args),
  tagTypes: ['admin.product', 'admin.product.category',],
  endpoints(builder) {
    return {
      // Product
      getProductPaginate: builder.query({
        query: ({ params }) => ({ url: '/product', method: 'get', params }),
        providesTags: [{ type: 'admin.product', id: 'list' }]
      }),
      getProductFilter: builder.query({
        query: () => ({ url: '/admin/product/filter', method: 'get' }),
        transformResponse: (res) => res?.data,
        providesTags: [{ type: 'admin.product.category', id: 'list' }]
      }),
      getProductCreate: builder.query({
        query: () => ({ url: '/admin/product/create', method: 'get' }),
        transformResponse: (res) => res?.data,
        providesTags: [{ type: 'admin.product.category', id: 'list' }]
      }),
      postProductCreate: builder.mutation({
        query: ({ data }) => ({ url: '/admin/product', method: 'post', data }),
        transformErrorResponse: validationTransformError,
        invalidatesTags: [{ type: 'admin.product', id: 'list' }],
      }),
      getProductEdit: builder.query({
        query: ({ id }) => ({ url: `/admin/product/${id}/edit`, method: 'get' }),
        providesTags: (_, __, { id }) => [
          { type: 'admin.product', id: 'list' },
          { type: 'admin.product', id },
        ],
        transformResponse: (res) => res?.data
      }),
      postProductUpdate: builder.mutation({
        query: ({ data, id }) => ({
          url: `/admin/product/${id}`, method: 'post', data: {
            _method: 'put',
            ...data
          }
        }),
        transformErrorResponse: validationTransformError,
        invalidatesTags: (_, __, { id }) => [
          { type: 'admin.product', id: 'list' },
          { type: 'admin.product', id },
        ]
      }),
      postProductDelete: builder.mutation({
        query: ({ id }) => ({
          url: `/admin/product/${id}`, method: 'post', data: { _method: 'delete' }
        }),
        invalidatesTags: (_, __, { id }) => [
          { type: 'admin.product', id: 'list' },
          { type: 'admin.product', id },
        ]
      }),
      // Product Category
      getProductCategoryPaginate: builder.query({
        query: ({ params }) => ({ url: '/admin/product/category', method: 'get', params }),
        transformResponse: (res) => res?.data?.categories,
        providesTags: [{ type: 'admin.product.category', id: 'list' }],
      }),
      postCreateProductCategory: builder.mutation({
        query: ({ data }) => ({ url: '/admin/product/category', method: 'post', data }),
        transformErrorResponse: validationTransformError,
        invalidatesTags: [{ type: 'admin.product.category', id: 'list' }],
      }),
      getEditProductCategory: builder.query({
        query: ({ id }) => ({ url: `/admin/product/category/${id}/edit`, method: 'get' }),
        transformResponse: (res) => res?.data,
        providesTags: (_, __, { id }) => [
          { type: 'admin.product.category', id }
        ]
      }),
      postUpdateProductCategory: builder.mutation({
        query: ({ id, data }) => ({ url: `/admin/product/category/${id}`, method: 'post', data: { ...data, _method: 'put' } }),
        transformErrorResponse: validationTransformError,
        invalidatesTags: (_, __, { id }) => [
          { type: 'admin.product.category', id },
          { type: 'admin.product.category', id: 'list' }
        ],
      }),
      postDeleteProductCategory: builder.mutation({
        query: ({ id }) => ({ url: `/admin/product/category/${id}`, method: 'delete' }),
        invalidatesTags: [
          { type: 'admin.product.category', id: 'list' }
        ],
      })
    }
  }
})

export const {
  // Product List
  useGetProductPaginateQuery,
  useGetProductFilterQuery,
  useGetProductCreateQuery,
  usePostProductCreateMutation,
  useGetProductEditQuery,
  usePostProductUpdateMutation,
  usePostProductDeleteMutation,
  // Product Category
  useGetProductCategoryPaginateQuery,
  usePostCreateProductCategoryMutation,
  useGetEditProductCategoryQuery,
  usePostUpdateProductCategoryMutation,
  usePostDeleteProductCategoryMutation,
} = adminProductApi;