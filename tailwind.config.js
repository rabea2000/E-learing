/** @type {import('tailwindcss').Config} */
export default {
  // tell tailwind where it can find the css utilty 
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

