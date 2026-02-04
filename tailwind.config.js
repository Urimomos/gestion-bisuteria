/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'brand-crema': '#FDF2D0',
        'brand-negro': '#1A1A1A',
        'brand-dorado': '#D4AF37',
      },
    },
  },
  plugins: [],
}