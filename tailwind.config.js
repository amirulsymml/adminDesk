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
            colors: {
                blue: '#206bc4',
                azure: '#4299e1',
                indigo: '#4263eb',
                purple: '#ae3ec9',
                pink: '#d6336c',
                red: '#d63939',
                orange: '#f76707',
                yellow: '#f59f00',
                lime: '#74b816',
                green: '#2fb344',
                teal: '#0ca678',
                cyan: '#17a2b8',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
