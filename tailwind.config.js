/*

Tailwind - The Utility-First CSS Framework

Welcome to the Tailwind config file. This is where you can customize
Tailwind specifically for your project. Don't be intimidated by the
length of this file. It's really just a big JavaScript object and
we've done our very best to explain each section.

View the full documentation at https://tailwindcss.com.

*/

const plugin = require('tailwindcss/plugin');
const defaultTheme = require('tailwindcss/defaultTheme');
const stageDefaults = require('./resources/assets/stage-defaults');
const ciColors = require('./resources/assets/colors');

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
    defaultLineHeights: true,
    // standardFontWeights: true
  },
  purge: {
    content: [
      './index.php',
      './app/**/*.php',
      './config/defaults.php',
      './resources/views/**/*.php',
      './resources/assets/scripts/**/*.js',
    ],
    options: {
      whitelist: [],
      whitelistPatterns: [
        /^z(-.*)?$/,
        /^bg(-.*)?$/,
        /^text(-.*)?$/,
        /^placeholder(-.*)?$/,
        /^border(-.*)?$/,
        /^opacity(-.*)?$/,
        /^flex(-.*)?$/,
        /^h(-.*)?$/,
        /^w(-.*)?$/,
        /^min(-.*)?$/,
        /^max(-.*)?$/,
        /^p[a-z]{0,1}(-.*)?$/,
        /^m[a-z]{0,1}(-.*)?$/,
      ],
    },
  },
  theme: {
    ...stageDefaults,

    extend: {
      ...stageDefaults.extend,

      colors: {
        ...stageDefaults.extend.colors,

        ...ciColors,

        ...{
          body: `var(--color-body, ${ciColors['ibb-gray'][500]})`,

          link: 'var(--color-link, currentColor)',
          hover: 'var(--color-hover)',

          copy: `var(--color-copy, ${ciColors['ibb-gray'][500]})`,
          heading: `var(--color-heading, ${ciColors['ibb-blue'][500]})`,

          primary: 'var(--color-primary)',
          secondary: 'var(--color-secondary)',
        },
      },

      fontFamily: {
        ...stageDefaults.extend.fontFamily,

        sans: ['"Open Sans"', 'Inter', ...defaultTheme.fontFamily.sans],

        ...theme => ({
          heading: `var(--heading-font-family, ${theme('fontFamily.sans')})`,
          copy: `var(--heading-font-family, ${theme('fontFamily.sans')})`,
        }),
      },
    },

    customForms: theme => ({
      default: {
        input: {
          borderRadius: theme('borderRadius.sm'),
          backgroundColor: theme('colors.gray.200'),
          '&:focus': {
            backgroundColor: theme('colors.white'),
          },
        },
        select: {
          borderRadius: theme('borderRadius.sm'),
          boxShadow: theme('boxShadow.default'),
        },
        checkbox: {
          width: theme('spacing.6'),
          height: theme('spacing.6'),
        },
      },
    }),
  },

  /*
  |-----------------------------------------------------------------------------
  | Variants                 https://tailwindcss.com/docs/configuration#variants
  |-----------------------------------------------------------------------------
  |
  | Here is where you control which variants are generated and what variants are
  | generated for each of those variants.
  |
  | Currently supported variants:
  |   - responsive
  |   - hover
  |   - focus
  |   - active
  |   - group-hover
  |
  | To disable a module completely, use `false` instead of an array.
  |
  */

  variants: {
    backgroundColor: ({ after }) => after(['focus-within']),
    borderCollapse: false,
    borderColor: ({ after }) => after(['focus-within']),
    // opacity: ['responsive'],
    // outline: ['focus'],
    // fill: [],
    // stroke: [],
  },

  corePlugins: {
    container: false,
  },

  /*
  |-----------------------------------------------------------------------------
  | Plugins                                https://tailwindcss.com/docs/plugins
  |-----------------------------------------------------------------------------
  |
  | Here is where you can register any plugins you'd like to use in your
  | project. Tailwind's built-in `container` plugin is enabled by default to
  | give you a Bootstrap-style responsive container component out of the box.
  |
  | Be sure to view the complete plugin documentation to learn more about how
  | the plugin system works.
  |
  */

  plugins: [
    require('@tailwindcss/ui'),
    require('tailwindcss-wordpress'),
    // require('@tailwindcss/aspect-ratio'),
    require('tailwindcss-aspect-ratio'),
    // require('@tailwindcss/forms'),
    plugin(function({ addUtilities }) {
      const newUtilities = {
        '.scroll-smooth': {
          'scroll-behavior': 'smooth',
        },
        '@media (prefers-reduced-motion)': {
          '.scroll-smooth': {
            'scroll-behavior': 'auto',
          },
        },
      };

      addUtilities(newUtilities, ['responsive', 'hover']);
    }),
  ],
};
