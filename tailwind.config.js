const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Inter', ...defaultTheme.fontFamily.sans ]
            },
            colors: {
                primary: {
                    light: '#211F2A',
                    dark: '#1B1A23'
                },
                secondary: {
                    light: '#6757D6',
                    dark: '#5644CA'
                }
            }
        }
    },
    plugins: [
        require('@tailwindcss/forms')
    ]
};
