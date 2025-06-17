import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173, // atau port lainnya yang kamu pakai
        origin: 'http://192.168.1.6:5173', // tambahkan origin agar CORS sesuai
        cors: true, // AKTIFKAN CORS
        hmr: {
            host: '192.168.1.6', // IP kamu
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});