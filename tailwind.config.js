/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./accounts.auth/**/*.php",
    "./dashboard/**/*.php",
    "./bankbackend/**/*.php",
    "./*.php"
  ],
  theme: {
    extend: {
      textColor: ['visited']
    }
  },
  plugins: [],
}

