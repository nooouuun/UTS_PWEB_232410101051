/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['inter var', ...defaultTheme.fontFamily.sans],
        },

        fontSize: {
            base: '1.125rem',
          },

        colors: {
            cream: '#fdf7ed',
            creamHover: '#f0e9de', 
            creamText: '#4a3f35'
        }
    },
  },
  plugins: [],
}

