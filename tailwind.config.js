/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
      backgroundImage : {
        subscribeBg : "url('/public/img/bg-subscribe.png')"
      }
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}

