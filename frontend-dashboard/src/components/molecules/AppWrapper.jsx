"use client"

import { Provider } from "react-redux";
import { PersistGate } from "redux-persist/integration/react";
import { persistor, store } from "@/lib/redux/store";
import ConfigInitializer from "./ConfigInitiator";
import { CLIENT_CONFIGS } from "@/config";
import { Toaster } from "sonner";
import { Dialog } from "@radix-ui/react-dialog";

export default function AppWrapper({ children }) {
    return (
        <Provider store={store}>
            <PersistGate loading={null} persistor={persistor}>
                <ConfigInitializer configData={CLIENT_CONFIGS} />
                <Toaster richColors position="top-center" />
                <Dialog>
                    {children}
                </Dialog>
            </PersistGate>
        </Provider>
    )
}