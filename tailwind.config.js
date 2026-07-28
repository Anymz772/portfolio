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
                dark: '#0D0D0D',
                'dark-secondary': '#1A1A1A',
                'dark-card': '#141414',
                accent: '#00D9A6',
                'accent-dark': '#00b88d',
                'text-primary': '#F5F5F5',
                'text-secondary': '#A0A0A0',
                glass: 'rgba(255, 255, 255, 0.03)',
                'glass-border': 'rgba(255, 255, 255, 0.06)',
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Sora', 'Poppins', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
