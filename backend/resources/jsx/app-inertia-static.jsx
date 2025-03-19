import '../bootstrap';
import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { Provider } from 'react-redux';
import { store } from './_redux/store'

const appName = import.meta.env.VITE_APP_NAME || import.meta.env.APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./static/${name}.jsx`, import.meta.glob('./static/**/*.jsx')),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <Provider store={store}>
                <App {...props} />
            </Provider>
        );
    },
    progress: {
        color: '#4B5563',
    },
});
