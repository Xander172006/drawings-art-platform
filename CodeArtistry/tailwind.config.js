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
                'SearchBg': "url('https://wallpapercave.com/wp/wp6112214.jpg')"
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
