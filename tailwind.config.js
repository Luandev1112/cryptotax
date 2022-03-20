const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
    mode: 'jit',
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    purge: {
        content: [
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './vendor/laravel/jetstream/**/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
            './vendor/filament/forms/resources/views/**/*.blade.php',
            './vendor/filament/tables/resources/views/**/*.blade.php',
            './vendor/wireui/wireui/resources/**/*.blade.php',
            './vendor/wireui/wireui/ts/**/*.ts',
            './vendor/wireui/wireui/src/View/**/*.php',
            './vendor/webcaravel/admin/resources/**/*.blade.php',
        ],
        safelist: [
            'bg-primary-1',
            'text-primary-400',
            'bottom-4',
            'right-4',
        ]
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ["'Poppins'", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: "#181C3A",
                    '50': '#525EB7',
                    '100': '#4854AD',
                    '200': '#3C4691',
                    '300': '#303874',
                    '400': '#242A57',
                    '500': '#181C3A',
                    '600': '#080912',
                    '700': '#000000',
                    '800': '#000000',
                    '900': '#000000'
                },
                secondary: {
                    DEFAULT: '#7A6CFF',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#E9E6FF',
                    '300': '#C4BEFF',
                    '400': '#9F95FF',
                    '500': '#7A6CFF',
                    '600': '#4734FF',
                    '700': '#1800FB',
                    '800': '#1300C3',
                },
                third: {
                    DEFAULT: '#EF7B45',
                    '50': '#FEF3EE',
                    '100': '#FCE6DB',
                    '200': '#F9CBB6',
                    '300': '#F5B090',
                    '400': '#F2966B',
                    '500': '#EF7B45',
                    '600': '#E85714',
                    '700': '#B44410',
                    '800': '#81300B',
                    '900': '#4D1D07'
                  },
                danger: {
                    DEFAULT: '#EF4444',
                    '50': '#FDEDED',
                    '100': '#FCDADA',
                    '200': '#F9B5B5',
                    '300': '#F58F8F',
                    '400': '#F26A6A',
                    '500': '#EF4444',
                    '600': '#E71414',
                    '700': '#B30F0F',
                    '800': '#800B0B',
                    '900': '#4C0707'
                },
                success: {
                    DEFAULT: '#00C928',
                    '50': '#82FF9B',
                    '100': '#6DFF8A',
                    '200': '#44FF6A',
                    '300': '#1CFF49',
                    '400': '#00F230',
                    '500': '#00C928',
                    '600': '#00911D',
                    '700': '#005912',
                    '800': '#002107',
                    '900': '#000000'
                },
                warning: {
                    DEFAULT: '#F59E0B',
                    '50': '#FCE4BB',
                    '100': '#FBDCA8',
                    '200': '#FACD81',
                    '300': '#F8BD59',
                    '400': '#F7AE32',
                    '500': '#F59E0B',
                    '600': '#C07C08',
                    '700': '#8A5906',
                    '800': '#543603',
                    '900': '#1E1401'
                },
                lightgreen: {
                    DEFAULT: '#EDFEEC',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#FFFFFF',
                    '300': '#FFFFFF',
                    '400': '#FFFFFF',
                    '500': '#EDFEEC',
                    '600': '#BBFBB7',
                    '700': '#88F881',
                    '800': '#56F64C',
                    '900': '#23F317'
                },
                lightpink: {
                    DEFAULT: '#FFF5F4',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#FFFFFF',
                    '300': '#FFFFFF',
                    '400': '#FFFFFF',
                    '500': '#FFF5F4',
                    '600': '#FFC2BC',
                    '700': '#FF8F84',
                    '800': '#FF5C4C',
                    '900': '#FF2914'
                },
                lightblue: {
                    DEFAULT: '#F7F6FE',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#FFFFFF',
                    '300': '#FFFFFF',
                    '400': '#FFFFFF',
                    '500': '#F7F6FE',
                    '600': '#CAC4F8',
                    '700': '#9D91F3',
                    '800': '#705FED',
                    '900': '#432CE8'
                },
                'bgcolor': "#F5F7FB",
                'bgcolor1': "#E1DFF9"
            },
            boxShadow: {
                '1': '0 0 21px 5px rgba(254, 218, 17, 0.58)',
                '2': '0 5px 10px 5px rgba(254, 218, 17, 0.67)',
                '3': '0 4px 8px 3px rgba(254, 218, 17, 0.67)'
            },

            spacing: {
                '18': '4.5rem',
                '22': '5.5rem',
                '26': '6.5rem',
                '30': '7.5rem',
                '34': '8.5rem',
                '38': '9.5rem',
                '42': '10.5rem',
                '46': '11.5rem',
                '50': '12.5rem',
                '54': '13.5rem',
                '58': '14.5rem',
                '62': '15.5rem',
                '66': '16.5rem',
                '70': '17.5rem',
                '74': '18.5rem',
                '78': '19.5rem',
                '82': '20.5rem',
                '86': '21.5rem',
                '90': '22.5rem',
                '94': '23.5rem',
                '98': '24.5rem',
                '102': '25.5rem',
                '106': '26.5rem',
                '110': '27.5rem',
                'xs': '28rem',
                'sm': '32rem',
                'md': '36rem',
                'ml': '40rem',
                'mxg': '44rem',
                'mlg': '48rem',
                'lg': '52rem',
                'xl': '60rem',
                '2xl': '72rem',
                '3xl': '80rem',
                '4xl': '96rem',
            },

            borderWidth: {
                '3': '3px',
                '5': '5px',
                '6': '6px',
                '7': '7px',
                '8': '8px',
            },
            fontSize: {
                md: '.9375rem',
                '2xs': '0.75rem',
                '2.5xl': '1.75rem',
                '3.5xl': '2rem',
                '4.5xl': '2.5rem',
                '5.5xl': '3.5rem',
                '6.5xl': ['4rem', '1.10'],
                '7.5xl': '5rem',
            },
            minWidth: {
                clg: '1200px',
                cmd: '400px'
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        plugin(function({ addBase, components, theme }) {
            addBase({
                'body': {
                    backgroundColor: theme('colors.bgcolor'),
                },
                '.trnstsn, a, button, input, textarea, select': {
                    transition: 'all 0.35s ease-in-out',

                },
                '.mobile-menu': {
                    '@screen md': {
                        display: 'flex !important'
                    }
                }
            })
        })
    ],
}
