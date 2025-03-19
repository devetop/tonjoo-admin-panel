import { CLIENT_CONFIGS } from '@/config';
import { createSlice } from '@reduxjs/toolkit';

const layoutSlice = createSlice({
    name: 'slices.layout',
    initialState: {
        config: {},
        error: {
            message: '',
            status: ''
        }
    },
    reducers: {
        /**
         * @param { payload } [[label, link], [[label]]
         */
        setConfig: (state, { payload }) => {
            state.config = payload
        },
        setError: (state, { payload }) => {
            state.error = payload
        }
    }
})

export default layoutSlice
export const {
    setConfig,
    setError,
} = layoutSlice.actions
export const layoutReducer = layoutSlice.reducer