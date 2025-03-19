import { createSlice } from "@reduxjs/toolkit";

const sessionSlice = createSlice({
    name: 'session',
    initialState: {
        user: null,
        userAdmin: null,
        isLoading: true,
    },
    reducers: {
        setUser: (state, { payload }) => {
            state.user = payload
        },
        setUserAdmin: (state, { payload }) => {
            state.userAdmin = payload
        },
        setIsLoading: (state, {payload}) => {
            state.isLoading = payload;
        }
    },
})

export const { 
    setUser,
    setUserAdmin,
    setIsLoading,
} = sessionSlice.actions
export const sessionReducer = sessionSlice.reducer