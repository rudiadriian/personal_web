/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Penting untuk tombol Dark/Light mode nanti
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'], // Kita pakai font Inter agar modern
        },
      },
    },
    plugins: [],
  }
