const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/filament/**/*.blade.php',
        './resources/views/livewire/**/*.blade.php'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Barlow', ...defaultTheme.fontFamily.sans ]
            },
            colors: {
                danger: colors.rose,
                success: colors.green,
                warning: colors.yellow,
                primary: {
                    light: '#211F2A',
                    default: '#292E38',
                    dark: '#181C23',
                    accent: '#2F3541',
                    ...colors.amber
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
