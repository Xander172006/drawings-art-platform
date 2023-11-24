import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            backgroundImage: {
                'SearchBg': "url('https://www.desktopbackground.org/download/1280x720/2010/10/26/100997_blue-sky-cloud-anime-1920x1080-hd-wallpapers-and-free-stock-photo_1920x1080_h.jpg')"
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                mono: "'Courier New', Courier, monospace",
                anton: ['Anton', 'sans'],
                dancing: ['Dancing Script', 'cursive'],
                lobster: ['Lobster', 'sans'],
            },
        },
    },

    plugins: [forms],
};
