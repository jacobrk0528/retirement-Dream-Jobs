/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
        extend: {
          screens: {
            'sm': {'max': '889px'},  // Small screens, up to 889px
            'lg': {'min': '890px'},  // Large screens, starting from 890px
          },
        },
      },
    plugins: [],
  }
