import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // Set output directory
        rollupOptions: {
            input: {
                main: 'resources/js/app.js', // Main entry point for JS
                css: 'resources/css/app.css', // Main entry point for CSS
            },
            output: {
                entryFileNames: 'js/app.js', // Force the JS file to be named app.js
                chunkFileNames: 'js/[name].js', // Keep chunk files as [name].js (for any code splitting)
                assetFileNames: ({ name }) => {
                    if (name && name.endsWith('.css')) {
                        return 'css/app.css'; // Force CSS to be named app.css
                    }
                    return 'assets/[name][extname]'; // Default for other assets
                },
            },
        },
    },
});
