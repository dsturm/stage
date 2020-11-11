<?php

/**
 * This file contains the defaults used by Stage
 * Overwrite them here or via the Customizer settings.
 */

use Stage\Tailwind\Facades\Tailwind;
use function Stage\stage_get_default;
use function Stage\stage_get_fallback;

return [

    /*
    |--------------------------------------------------------------------------
    | The theme defaults
    |--------------------------------------------------------------------------
    |
    | Sets the defaults for all settings in the Customizer
    | Used throughout the whole theme by using stage_get_default()
    |
    */

    /*
     * Stage Features
     */
    'features' => [
        'lazy'     => [
            'activate' => true,
        ],
        'loader'   => [
            'activate' => true,
        ],
        'infinity' => [
            'activate' => true,
        ],
        'gallery'  => [
            'activate' => true,
        ],
    ],

    /*
     * Global style defaults
     */
    'global'   => [
        // Adjust also in tailwind config
        'screens' => [
            'sm'  => '640px',
            'md'  => '768px',
            'lg'  => '1024px',
            'xl'  => '1280px',
            'xxl' => '1600px',
        ],

        // All colors are registered as wp-blocks colors.
        'colors'  => [
            'copy'      => '#3a3f41', // Tailwind::get('colors.ibb-gray.800', '#333333'),
            'heading'   => '#0067a4', // Tailwind::get('colors.ibb-blue.500', 'currentColor'),
            'primary'   => '#0067a4', // Tailwind::get('colors.ibb-blue.500', '#2b6cb0'),
            'secondary' => '#3db7cc', // Tailwind::get('colors.ibb-turquoise.500', '#2aadaf'),
            'light-gray' => '#f2f3f4', // Tailwind::get('colors.ibb-turquoise.500', '#2aadaf'),
            'body'      => '#fff', // Tailwind::get('colors.white', '#fff'),
            // 'link'  => 'currentColor',
            // 'hover' => '',

            'palettes' => [
                'ibb-blue' => [
                    'light'   => '#4d95bf', // Tailwind::get('colors.ibb-blue.400'),
                    'default' => '#0067a4', // Tailwind::get('colors.ibb-blue.500'),
                    'dark'    => '#005d94', // Tailwind::get('colors.ibb-blue.600'),
                ],
                'ibb-turquoise' => [
                    'light'   => '#77cddb', // Tailwind::get('colors.ibb-turquoise.400'),
                    'default' => '#3db7cc', // Tailwind::get('colors.ibb-turquoise.500'),
                    'dark'    => '#37a5b8', // Tailwind::get('colors.ibb-turquoise.600'),
                ],
                'ibb-salmon' => [
                    'light'   => '#f5ac9a', // Tailwind::get('colors.ibb-salmon.400'),
                    'default' => '#f1896e', // Tailwind::get('colors.ibb-salmon.500'),
                    'dark'    => '#d97b63', // Tailwind::get('colors.ibb-salmon.600'),
                ],
                'ibb-yellow' => [
                    'light'   => '#fcdb7a', // Tailwind::get('colors.ibb-yellow.400'),
                    'default' => '#fbcb41', // Tailwind::get('colors.ibb-yellow.500'),
                    'dark'    => '#e2b73b', // Tailwind::get('colors.ibb-yellow.600'),
                ],
                'ibb-gray' => [
                    'lightest'=> '#e0e2e4', // Tailwind::get('colors.ibb-gray.400'),
                    'light'   => '#a7aeb2', // Tailwind::get('colors.ibb-gray.400'),
                    'default' => '#818b91', // Tailwind::get('colors.ibb-gray.500'),
                    'dark'    => '#747d83', // Tailwind::get('colors.ibb-gray.600'),
                    'darkest' => '#3a3f41', // Tailwind::get('colors.ibb-gray.800'),
                ],
            ],
        ],

        // All font sizes are registered as wp-blocks font-sizes.
        'typo'    => [
            'heading' => [
                'fonts' => [
                    'font-family' => 'sans-serif',
                    'font-weight' => 'regular',
                ],
            ],
            'copy'    => [
                'fonts' => [
                    'font-family' => 'sans-serif',
                    'font-weight' => 'regular',
                ],
            ],
            'choices' => [
                'fonts' => [
                    'google' => ['popularity', 100],
                ],
            ],
            'sizes'   => [
                'xs'   => [
                    'value' => 'var(--font-size-xs)',
                    'name'  => __('Extra Small', 'stage'),
                    'px'    => '12',
                ],
                'sm'   => [
                    'value' => 'var(--font-size-sm)',
                    'name'  => __('Small', 'stage'),
                    'px'    => '14',
                ],
                'base' => [
                    'value' => 'var(--font-size-base)',
                    'name'  => __('Normal', 'stage'),
                    'px'    => '16',
                ],
                'lg'   => [
                    'value' => 'var(--font-size-lg)',
                    'name'  => __('Large', 'stage'),
                    'px'    => '18',
                ],
                'xl'   => [
                    'value' => 'var(--font-size-xl)',
                    'name'  => __('Extra Large', 'stage'),
                    'px'    => '20',
                ],
                '2-xl'  => [
                    'value' => 'var(--font-size-2xl)',
                    'name'  => __('XX Large', 'stage'),
                    'px'    => '24',
                ],
                '3-xl'  => [
                    'value' => 'var(--font-size-3xl)',
                    'name'  => __('3X Large', 'stage'),
                    'px'    => '30',
                ],
                '4-xl'  => [
                    'value' => 'var(--font-size-4xl)',
                    'name'  => __('4X Large', 'stage'),
                    'px'    => '36',
                ],
                '5-xl'  => [
                    'value' => 'var(--font-size-5xl)',
                    'name'  => __('5X Large', 'stage'),
                    'px'    => '48',
                ],
            ],
        ],
    ],

    /*
     * Body Settings
     */
    'body'     => [
        'classes' => [
            'app',
            'stage',
            'flex',
            'flex-col',
            'min-h-full',
            'antialiased',
            'bg-body',
            'font-sans',
            'text-copy',
        ],
    ],

    /*
     * Header Settings
     */
    'header'   => [
        'branding' => [
            'show_tagline' => false,
            'show_logo' => true,
        ],
        'colors'   => [
            'overwrite' => false,
        ],
        'typo'     => [
            'overwrite' => false,
        ],
        'mobile'   => [
            'position' => 'sticky',
            'layout'   => 'partials.header.off-canvas', // Template path.
        ],
        'desktop'  => [
            'position'  => 'sticky',
            'align'     => 'alignwide', // align, alignwide, alignscreen, alignfull
            'layout'    => 'partials.header.horizontal-left', // Template path.
            'open'      => 'click-open', // click-open or hover-open sub-menu.
            'padding-x' => '0',
            'padding-y' => '2',
        ],
        'search'   => [
            'layout' => 'partials.header.search.fullscreen',
        ],
    ],

    /*
     * Archives Settings
     * Allows overwriting CPTs
     */
    'archive'  => [
        'post'     => [
            'layout'  => 'partials.archive.grids.modern',
            'display' => [
                'sidebar'     => false,
                'thumbnail'   => true,
                'placeholder' => true,
                'headline'    => true,
                'meta'        => false,
                'excerpt'     => true,
                'tags'        => false,
            ],
        ],
        'product'  => [
            'layout'  => 'partials.archive.grids.masonry',
            'display' => [
                'sidebar'     => false,
                'thumbnail'   => true,
                'placeholder' => true,
                'headline'    => true,
                'meta'        => false,
                'excerpt'     => true,
                'tags'        => false,
            ],
        ],
        'job'  => [
            'layout'  => 'partials.archive.grids.masonry',
            'display' => [
                'sidebar'     => false,
                'thumbnail'   => false,
                'placeholder' => true,
                'headline'    => true,
                'meta'        => false,
                'excerpt'     => false,
                'tags'        => false,
            ],
        ],
        'event'  => [
            'layout'  => 'partials.archive.grids.masonry',
            'display' => [
                'sidebar'     => false,
                'thumbnail'   => false,
                'placeholder' => true,
                'headline'    => true,
                'meta'        => false,
                'excerpt'     => false,
                'tags'        => false,
            ],
        ],
        // Fallback defaults if non set for CPT
        'fallback' => [
            'layout'  => 'partials.archive.grids.masonry',
            'display' => [
                'sidebar'     => true,
                'thumbnail'   => true,
                'placeholder' => false,
                'headline'    => true,
                'meta'        => false,
                'excerpt'     => true,
                'tags'        => false,
            ],
        ],
    ],

    /*
     * Footer Settings
     */
    'footer'   => [
        'settings' => [
            'copyright' => sprintf(
            /* translators: %1$s is replaced with the current year, %2$s with the site name */
                esc_html__('&#169; Copyright %1$s, all rights reserved by %2$s.', 'stage'),
                date('Y'),
                get_bloginfo('name', 'display')
            ),
        ],
        'desktop'  => [
            'align' => stage_get_fallback('header.desktop.align', 'alignwide'),
        ],
    ],
];
