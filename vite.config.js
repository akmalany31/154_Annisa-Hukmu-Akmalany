import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                //'resource/css/themes/artshop/main.css',
                'resources/views/themes/artshop/assets/css/main.css',
                'resources/views/themes/artshop/assets/plugins/jqueryui/jquery-ui.css',
                'resources/views/themes/artshop/assets/js/main.js',
                'resources/views/themes/artshop/assets/plugins/jqueryui/jquery-ui.min.js',
            ],
            refresh: true,
        }),
    ],
});
