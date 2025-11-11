import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        https: true,
        host: '0.0.0.0',
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                    'resources/css/custom-login.css',
                    'resources/css/campus-market.css',
                    'resources/css/filament-login.css',],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
