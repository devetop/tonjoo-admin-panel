import { configureStore } from '@reduxjs/toolkit'
import { layoutReducer } from './slices/LayoutSlice'

export const store = configureStore({
    reducer: {
        layout: layoutReducer
    }
})