const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                sky: colors.sky,
                cyan: colors.cyan,
            },
            animation: {
                'spin-slow': 'spin 5s linear infinite',
                'ping-slow': 'ping 5s cubic-bezier(1, 1, 0.2, 1) infinite',

            },
            keyframes: {
                spin: {
                    to:{
                        transform: 'rotate(-360deg)'
                    }
                }
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
