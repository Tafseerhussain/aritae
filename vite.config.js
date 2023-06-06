import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/theme.scss',
                'resources/sass/app.scss',
                'resources/sass/responsive.scss',
                'resources/sass/call.scss',
                'resources/js/app.js',
                'resources/sass/admin.scss',
            ],
            refresh: true,
        }),
    ],
});
