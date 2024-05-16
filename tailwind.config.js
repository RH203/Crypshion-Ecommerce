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
      backgroundColor : {
        primaryBg : '#23A6F0',
        successBg : '#2DC071'
      },

      borderColor : {
        primary : '#23A6F0',
        success : '#2DC071'
      },

      textColor : {
        primary: '#23A6F0',
        success: '#2DC071'
      },



      backgroundImage : {
        subscribeBg : "url('/public/img/bg-subscribe.png')"
      }
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}

