/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './api/**/*.php',
    './pages/**/*.php',
    './inc/**/*.php',
    './public/assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        ink: '#05070B',
        surface: '#0B0F19',
        accent: '#00D4FF',
        cta: '#22C55E',
      },
      fontFamily: {
        display: ['Manrope', 'sans-serif'],
        body: ['Inter', 'sans-serif'],
        mono: ['JetBrains Mono', 'monospace'],
      },
    },
  },
  plugins: [],
};
