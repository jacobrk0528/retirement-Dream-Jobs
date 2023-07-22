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
            'sm': {'max': '500px'}, // Phones
            'md': {'max': '904px', 'min': '500px'}, // Tablets
            'md2': {'max': '600px'}, // smaller devices and Down
            'lg': {'min': '905px'}, // Laptops
          },
        },
      },
    plugins: [],
  }
