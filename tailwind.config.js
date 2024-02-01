const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');
const typography = require('@tailwindcss/typography');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                green: {
                    '900': '#1a202c', // Substitua pelo seu valor hexadecimal desejado
                },
            },
            // ... outras extensões
        },
    },

    plugins: [forms, typography],
};
