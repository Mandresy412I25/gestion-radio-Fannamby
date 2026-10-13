import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
    radio: {
        dark: '#0b0f14',
        panel: '#12181f',
        pink: '#ec4899',
        pinkdark: '#be185d',
        green: '#22c55e',
        greenlight: '#4ade80',
    },
},
        },
    },

    plugins: [forms],
};
