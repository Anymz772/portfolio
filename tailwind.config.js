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
                background: '#1f1f1f',
                foreground: '#f5f5f5',
                card: {
                    DEFAULT: '#2a2a2a',
                    foreground: '#f5f5f5',
                },
                primary: {
                    DEFAULT: '#5eecc8',
                    foreground: '#142820',
                },
                secondary: {
                    DEFAULT: '#333333',
                    foreground: '#f5f5f5',
                },
                muted: {
                    DEFAULT: '#333333',
                    foreground: '#a3a3a3',
                },
                accent: {
                    DEFAULT: '#3d4544',
                    foreground: '#f5f5f5',
                },
                border: 'rgba(255, 255, 255, 0.1)',
                input: 'rgba(255, 255, 255, 0.14)',
                ring: '#5eecc8',
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Sora', 'Poppins', ...defaultTheme.fontFamily.sans],
                mono: ['ui-monospace', 'SFMono-Regular', ...defaultTheme.fontFamily.mono],
            },
            borderRadius: {
                '4xl': '2rem',
            },
            animation: {
                'fade-in': 'fadeIn 0.3s ease-out',
                'border-pan': 'borderPan 6s linear infinite',
                'float-particle': 'floatParticle 8s ease-in-out infinite',
                'caret-blink': 'caretBlink 1s step-end infinite',
            },
            keyframes: {
                fadeIn: {
                    from: { opacity: '0', transform: 'translateY(-8px)' },
                    to: { opacity: '1', transform: 'translateY(0)' },
                },
                borderPan: {
                    '0%': { backgroundPosition: '0% 50%' },
                    '100%': { backgroundPosition: '200% 50%' },
                },
                floatParticle: {
                    '0%, 100%': { transform: 'translateY(0) scale(1)', opacity: '0.35' },
                    '50%': { transform: 'translateY(-40px) scale(1.3)', opacity: '0.9' },
                },
                caretBlink: {
                    '0%, 45%': { opacity: '1' },
                    '50%, 95%': { opacity: '0' },
                },
            },
            boxShadow: {
                primary: '0 0 45px -8px rgba(94, 236, 200, 0.6)',
                'primary-sm': '0 0 30px -6px rgba(94, 236, 200, 0.5)',
            },
        },
    },

    plugins: [forms],
};
