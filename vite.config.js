import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/registration.js',
                'resources/js/meterJs/meterapp.js',
                'resources/js/meterlistener.js',
                'resources/js/dashboard/chart.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
            port: 8080,
        },
    },
});
