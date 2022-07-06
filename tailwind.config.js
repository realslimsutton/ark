const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        '/vendor/wire-elements/modal/resources/views/*.blade.php',
        './storage/framework/views/*.php'
    ],
    safelist: [
        'sm:max-w-md',
        'md:max-w-xl',
        'lg:max-w-2xl',
        'sm:max-w-sm',
        'sm:max-w-md'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Barlow', ...defaultTheme.fontFamily.sans ]
            },
            colors: {
                primary: {
                    light: '#211F2A',
                    default: '#292E38',
                    dark: '#181C23',
                    accent: '#2F3541'
                },
                secondary: {
                    light: '#DF204D',
                    dark: '#C5163F'
                },
                tertiary: {
                    light: '#6757D6',
                    dark: '#5644CA'
                }
            }
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ]
};
