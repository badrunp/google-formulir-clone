module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {
      transform: ['hover', 'group-hover'],
      rotate: ['hover', 'group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
