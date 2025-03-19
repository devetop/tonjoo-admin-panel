import laravel from 'laravel-vite-plugin';
import { defineConfig, loadEnv } from 'vite';
import inject from '@rollup/plugin-inject';
import { viteStaticCopy } from "vite-plugin-static-copy";
import react from '@vitejs/plugin-react';
import { resolve } from 'path';

export default defineConfig(({ mode, command }) => {
  const env = loadEnv(mode, process.cwd(), '');
  const baseUrl = env.APP_URL + (command === 'build' ? '' : '/build');

  return {
    define: {
      BASE_URL: JSON.stringify(baseUrl)
    },
    plugins: [
      laravel([
        // main
        'resources/js/app.js',
        'public/assets/frontend/app.js',
        // adminlte skins
        'resources/scss/adminlte.scss',
        'resources/scss/skins/skin-backend-1.scss',
        'resources/scss/skins/skin-backend-2.scss',
        'resources/scss/skins/skin-backend-3.scss',
        'resources/scss/skins/skin-backend-4.scss',
        'resources/scss/skins/skin-backend-5.scss',
        'resources/scss/skins/skin-backend-6.scss',
        'resources/scss/skins/skin-frontend-1.scss',
        'resources/scss/skins/skin-frontend-2.scss',
        'resources/scss/skins/skin-frontend-3.scss',
        'resources/scss/skins/skin-frontend-4.scss',
        'resources/scss/skins/skin-frontend-5.scss',
        // plugins
        'resources/plugins/additional-plugin.js',
        'resources/plugins/codemirror.js',
        'resources/plugins/fonts.css',
        // # Reactjs Inertia 
        'resources/jsx/app-inertia-admin.jsx',
        'resources/jsx/app-inertia-dashboard.jsx',
        'resources/jsx/app-inertia-static.jsx',
        'resources/frontend/js/app.jsx',
      ]),
      react(),
      viteStaticCopy({
        targets: [
          {
            src: 'resources/tap/img',
            dest: 'public/assets/backend/img'
          }
        ]
      }),
      inject({
        $: 'jquery',
        jQuery: 'jquery',
      }),
    ],
    resolve: {
      alias: {
        plugins: resolve(__dirname, 'public/assets/backend/plugins'),
        '@frontend': resolve(__dirname, 'resources/frontend/'),
      }
    },
    server: {
      // respond to all network requests (same as '0.0.0.0')
      host: true,
      // we need a strict port to match on PHP side
      strictPort: true,
      port: 5173,
      hmr: {
        // TODO: Is this the best way to achieve that? 🤔
        // Force the Vite client to connect via SSL
        // This will also force a "https://" URL in the hot file
        // protocol: 'wss',
        // The host where the Vite dev server can be accessed
        // This will also force this host to be written to the hot file
        host: `${process.env.DDEV_HOSTNAME || 'localhost'}`
      }
    }
  };
});
