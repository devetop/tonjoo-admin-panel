import { persistReducer, persistStore } from "redux-persist"
import { configureStore, combineReducers } from "@reduxjs/toolkit"
import storage from "./storage"
import { layoutReducer } from "./slices/layout-slice"
import { sessionReducer } from "./slices/session-slice"
import { authApi } from "@/app/(auth)/_api/authApi"
import { dashboardProductApi } from "@/app/dashboard/products/_api/dashboardProductApi"
import { adminProductApi } from "@/app/admin/products/_api/adminProductApi"
import { fileApi } from "@/api/fileApi"
import { adminAuthApi } from "@/app/(auth-admin)/_api/adminAuthApi"

// mapping untuk rtk-query
const apis = [
    authApi,
    dashboardProductApi,

    adminAuthApi,
    adminProductApi,

    fileApi,
];

// mapping untuk register reducer rtk-query
const reducers = apis.reduce(function(bag, item) {
    bag[item.reducerPath] = item.reducer;
    return bag;
}, {})

// mapping untuk register middleware rtk-query
const middlewares = apis.map((item) => item.middleware)

const persistConfig = {
    key: 'root',
    storage: storage,
    whitelist: ['layout', 'session'],
}

const rootReducer = combineReducers({
    layout: layoutReducer,
    session: sessionReducer,

    ...reducers,
})

const persistedReducer = persistReducer(persistConfig, rootReducer)

const store = configureStore({
    reducer: persistedReducer,
    middleware: (getDefaultMiddleware) => 
        getDefaultMiddleware({
            serializableCheck: false,
        }).concat(middlewares)
})

const persistor = persistStore(store);
export { store, persistor };