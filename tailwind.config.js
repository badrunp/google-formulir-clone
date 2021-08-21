module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      borderWidth:{
        '10': '10px',
        '11': '11px',
        '12': '12px',
      }
    },
  },
  variants: {
    extend: {
      transform: ['hover', 'group-hover'],
      rotate: ['hover', 'group-hover'],
      borderWidth: ['hover', 'focus']
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
