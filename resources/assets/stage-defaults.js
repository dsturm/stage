const defaultTheme = require('tailwindcss/defaultTheme');
const { theme } = require('tailwindcss/stubs/defaultConfig.stub');

const sizes = {
  xs: '20rem',
  sm: '30rem',
  md: '40rem',
  lg: '50rem',
  xl: '60rem',
  '2xl': '70rem',
  '3xl': '80rem',
  '4xl': '90rem',
  '5xl': '100rem',
  '1/2': '50%',
  '1/3': '33.33333%',
  '2/3': '66.66667%',
  '1/4': '25%',
  '3/4': '75%',
  '1/5': '20%',
  '2/5': '40%',
  '3/5': '60%',
  '4/5': '80%',
  '1/6': '16.66667%',
  '2/6': '33.33334%',
  '3/6': '50%',
  '4/6': '66.66668%',
  '5/6': '83.33333%',
  '1/12': '8.33333%',
  '2/12': '16.66667%',
  '3/12': '25%',
  '4/12': '33.33333%',
  '5/12': '41.66667%',
  '6/12': '50%',
  '7/12': '58.33333%',
  '8/12': '66.66667%',
  '9/12': '75%',
  '10/12': '83.33333%',
  '11/12': '91.66667%',
  full: '100%',
  half: '50%',
  auto: 'auto',
  none: 'none',
  ...defaultTheme.spacing,
};

module.exports = {
  extend: {
    screens: {
      xxl: '1600px',
    },

    colors: {
      inherit: 'inherit',

      body: 'var(--color-body)',

      link: 'var(--color-link, currentColor)',
      hover: 'var(--color-hover)',

      copy: 'var(--color-copy)',
      heading: 'var(--color-heading)',

      primary: 'var(--color-primary)',
      secondary: 'var(--color-secondary)',

      black: 'var(--color-black)',
      white: 'var(--color-white)',

      gray: {
        100: 'var(--color-gray-100)',
        200: 'var(--color-gray-200)',
        300: 'var(--color-gray-300)',
        400: 'var(--color-gray-400)',
        500: 'var(--color-gray-500)',
        600: 'var(--color-gray-600)',
        700: 'var(--color-gray-700)',
        800: 'var(--color-gray-800)',
        900: 'var(--color-gray-900)',
      },

      red: {
        light: 'var(--color-red-light)',
        default: 'var(--color-red)',
        dark: 'var(--color-red-dark)',
      },

      green: {
        light: 'var(--color-green-light)',
        default: 'var(--color-green)',
        dark: 'var(--color-green-dark)',
      },

      blue: {
        light: 'var(--color-blue-light)',
        default: 'var(--color-blue)',
        dark: 'var(--color-blue-dark)',
      },
    },

    fontFamily: {
      heading: 'var(--heading-font-family)',
      copy: 'var(--copy-font-family)',
      // sans: [
      //   'Inter',
      //   'system-ui',
      //   'BlinkMacSystemFont',
      //   '-apple-system',
      //   'Segoe UI',
      //   'Roboto',
      //   'Oxygen',
      //   'Ubuntu',
      //   'Cantarell',
      //   'Fira Sans',
      //   'Droid Sans',
      //   'Helvetica Neue',
      //   'sans-serif',
      // ],
      // serif: [
      //   'Constantia',
      //   'Lucida Bright',
      //   'Lucidabright',
      //   'Lucida Serif',
      //   'Lucida',
      //   'DejaVu Serif',
      //   'Bitstream Vera Serif',
      //   'Liberation Serif',
      //   'Georgia',
      //   'serif',
      // ],
    },

    spacing: {
      half: '50%',
      full: '100%',
      'half-block-spacing': 'calc(var(--block-spacing, 0) / 2)',
      'block-spacing': 'var(--block-spacing, 0)',
      gutter: 'var(--gutter, 0)',
    },

    width: {
      screen: '100vw',
      'half-screen': '50vw',
      ...sizes,
    },

    height: {
      screen: '100vh',
      'half-screen': '50vh',
      ...sizes,
    },

    minWidth: {
      screen: '100vw',
      'half-screen': '50vw',
      ...sizes,
    },

    minHeight: {
      screen: '100vh',
      'half-screen': '50vh',
      ...sizes,
    },

    maxWidth: {
      screen: '100vw',
      'half-screen': '50vw',
      ...sizes,
    },

    maxHeight: {
      screen: '100vh',
      'half-screen': '50vh',
      ...sizes,
    },

    opacity: {
      '10': '10',
      '90': '.9',
    },

    borderRadius: {
      inherit: 'inherit',
    },

    flexGrow: {
      '2': 2,
      '3': 3,
      '4': 4,
      '5': 5,
    },

    fill: {
      none: 'none',
    },

    inset: {
      ...sizes,
    },

    zIndex: {
      '-1': '-1',
      1: '1',
      2: '2',
      3: '3',
      4: '4',
      5: '5',
    },

    // aspectRatio: {
    //   21: '21',
    // },
  },

  /*
    |-----------------------------------------------------------------------------
    | Default Sizes                                                 Stage Specific
    |-----------------------------------------------------------------------------
    |
    | By default the sizes scale is shared by the height, width, max-height, etc.
    | utilities and extends the spacing. so the above configuration would generate
    | classes like .w-2, .h-3, .max-w-1/3, .max-h-6, etc.
    |
    */

  sizes,

  /*
    |-----------------------------------------------------------------------------
    | Fonts                                    https://tailwindcss.com/docs/fonts
    |-----------------------------------------------------------------------------
    |
    | Class name: .font-{name}
    | CSS property: font-family
    |
    */

  /*
    |-----------------------------------------------------------------------------
    | Font sizes                         https://tailwindcss.com/docs/text-sizing
    |-----------------------------------------------------------------------------
    |
    | Class name: .text-{size}
    | CSS property: font-size
    |
    */

  fontSize: {
    xs: 'var(--font-size-xs)', // 12px
    sm: 'var(--font-size-sm)', // 14px
    base: 'var(--font-size-base)', // 16px
    lg: 'var(--font-size-lg)', // 18px
    xl: 'var(--font-size-xl)', // 20px
    '2xl': 'var(--font-size-2-xl)', // 24px
    '3xl': 'var(--font-size-3-xl)', // 30px
    '4xl': 'var(--font-size-4-xl)', // 36px
    '5xl': 'var(--font-size-5-xl)', // 48px
  },

  /*
    |-----------------------------------------------------------------------------
    | Letter Spacing                   https://tailwindcss.com/letter-spacing.html
    |-----------------------------------------------------------------------------
    |
    | Class name: .tracking-{size}
    | CSS property: letter-spacing
    |
    */

  letterSpacing: {
    tighter: '-0.05em',
    tight: '-0.025em',
    normal: '0',
    wide: '0.025em',
    wider: '0.1em',
    widest: '0.2em',
  },

  /*
    |-----------------------------------------------------------------------------
    | Line Height                         https://tailwindcss.com/line-height.html
    |-----------------------------------------------------------------------------
    |
    | Class name: .leading-{size}
    | CSS property: line-height
    |
    */

  lineHeight: {
    none: '1',
    tight: '1.25',
    snug: '1.375',
    normal: '1.5',
    relaxed: '1.625',
    loose: '2',
  },

  /*
    |-----------------------------------------------------------------------------
    | Padding                                https://tailwindcss.com/docs/padding
    |-----------------------------------------------------------------------------
    |
    | Class name: .p{side?}-{size}
    |
    */

  padding: theme => ({
    initial: 'initial',
    ...theme('spacing'),
  }),

  /*
    |-----------------------------------------------------------------------------
    | Margin                                  https://tailwindcss.com/docs/margin
    |-----------------------------------------------------------------------------
    |
    | Extended spacing
    | Class name: .m{side?}-{size}
    |
    */

  margin: (theme, { negative }) => ({
    auto: 'auto',
    ...theme('spacing'),
    ...negative(theme('spacing')),
  }),

  /*
    |-----------------------------------------------------------------------------
    | Aspect Ratio Plugin       https://github.com/webdna/tailwindcss-aspect-ratio
    |-----------------------------------------------------------------------------
    |
    | Class name: .aspect-ratio-{name}
    |
    */

  aspectRatio: {
    square: [1, 1],
    '16/9': [16, 9],
    '2/3': [2, 3],
    '3/2': [3, 2],
    '3/4': [3, 4],
    '4/3': [4, 3],
    '21/9': [21, 9],
  },
};
