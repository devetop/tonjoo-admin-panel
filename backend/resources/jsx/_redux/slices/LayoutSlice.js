import { createSlice } from '@reduxjs/toolkit';

const layoutSlice = createSlice({
    name: 'layout',
    initialState: {
        breadcrumbs: [],
        list_side_menu: [],
        active_sidebar_menu: '',
        alert: {
            type: null,
            message: null,
        }
    },
    reducers: {
        /**
         * @param { payload } [[label, link], [[label]]
         */
        setBreadcrumbs: (state, { payload }) => {
            state.breadcrumbs = payload;
        },
        setListSideMenu: (state, { payload }) => {
            state.list_side_menu = payload;
        },
        /**
         * @param { payload } current_route_name 
         */
        setActiveSidebarMenu: (state, { payload }) => {
            state.active_sidebar_menu = payload
        },
        /**
         * @param { payload } { type: string, message: type }
         */
        setAlert: (state, { payload }) => {
            state.alert = payload
        }
    }
})

export default layoutSlice
export const {
    setBreadcrumbs,
    setListSideMenu,
    setActiveSidebarMenu,
    setAlert,
} = layoutSlice.actions
export const layoutReducer = layoutSlice.reducer