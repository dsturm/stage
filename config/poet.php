<?php

use Illuminate\Support\Arr;

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Here you may specify the post types to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'post' => [
        'wp_block' => [
            '_builtin'            => false,
            'show_in_menu'        => true,
            'show_in_graphql'     => true,
            'graphql_single_name' => 'WpBlock',
            'graphql_plural_name' => 'WpBlocks',
            'menu_icon'           => 'dashicons-layout',
        ],
        'job' => [
            'enter_title_here' => __('Enter job position', 'stage'),
            'menu_position'    => 20,
            'menu_icon'        => 'data:image/svg+xml;base64,'.base64_encode('<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'),
            'supports'         => ['title', 'editor', 'author', 'revisions', 'thumbnail'],
            'rewrite'          => ['permastruct' => '/job/%postname%-%post_id%'],
            'show_in_feed'     => true,
            'show_in_rest'     => true,
            'show_in_graphql'  => true,
            'has_archive'      => true,
            'block_editor'     => false,
            'labels'           => [
                'singular' => _nx('Job', 'Jobs', 1, 'CPT label', 'stage'),
                'plural'   => _nx('Job', 'Jobs', 2, 'CPT label', 'stage'),
                'add_new'  => __('Add New', 'sage'),
            ],
            'admin_cols' => [
            'job_category' => ['taxonomy' => 'job_category'],
            'city' => [
                'meta_key' => 'location',
                'function' => function () {
                    echo Arr::get(get_post_meta(get_the_id(), 'location'), '0.city');
                },
            ],
            'job_start' => ['title_icon'  => 'dashicons-calendar-alt', 'meta_key' => 'job_start', 'date_format' => 'd.m.Y'],
            'application_end' => ['title_icon'  => 'dashicons-calendar-alt', 'meta_key' => 'application_end', 'date_format' => 'd.m.Y'],
            ],
        ],
        'event' => [
            // 'enter_title_here' => __('Enter event title', 'stage'),
            'menu_position'    => 20,
            'menu_icon'        => 'data:image/svg+xml;base64,'.base64_encode('<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>'),
            'supports'         => ['title', 'editor', 'author', 'revisions', 'thumbnail'],
            'rewrite'          => ['permastruct' => '/event/%postname%-%post_id%'],
            'show_in_feed'     => true,
            'show_in_rest'     => true,
            'show_in_graphql'  => true,
            'has_archive'      => true,
            'block_editor'     => false,
            'labels'           => [
                'singular' => _nx('Event', 'Events', 1, 'CPT label', 'stage'),
                'plural'   => _nx('Event', 'Events', 2, 'CPT label', 'stage'),
                'add_new'  => __('Add New', 'sage'),
            ],
            'admin_cols' => [
            'event_category' => ['taxonomy' => 'event_category'],
            'event_start' => ['title_icon'  => 'dashicons-calendar-alt', 'meta_key' => 'event_start', 'date_format' => 'd.m.Y H:i'],
            'event_end' => ['title_icon'  => 'dashicons-calendar-alt', 'meta_key' => 'event_end', 'date_format' => 'd.m.Y H:i'],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Here you may specify the taxonomies to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'taxonomy' => [
        'job_category' => [
            'links' => ['job'],
            'labels'           => [
                'singular' => _nx('Job Category', 'Job Categories', 1, 'CPT label', 'stage'),
                'plural'   => _nx('Job Category', 'Job Categories', 2, 'CPT label', 'stage'),
            ],
            // 'meta_box' => 'radio',
        ],
        'job_type' => [
            'links' => ['job'],
            'labels'           => [
                'singular' => _nx('Job Type', 'Job Types', 1, 'CPT label', 'stage'),
                'plural'   => _nx('Job Type', 'Job Types', 2, 'CPT label', 'stage'),
            ],
            // 'meta_box' => 'radio',
        ],
        'company' => [
            'links' => ['job'],
            'labels'           => [
                'singular' => _nx('Company', 'Companies', 1, 'CPT label', 'stage'),
                'plural'   => _nx('Company', 'Companies', 2, 'CPT label', 'stage'),
            ],
            // 'meta_box' => 'radio',
        ],
        'event_category' => [
            'links' => ['event'],
            'labels'           => [
                'singular' => _nx('Event Category', 'Event Categories', 1, 'CPT label', 'stage'),
                'plural'   => _nx('Event Category', 'Event Categories', 2, 'CPT label', 'stage'),
            ],
            'meta_box' => 'radio',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Blocks
    |--------------------------------------------------------------------------
    |
    | Here you may specify the block types to be registered by Poet and
    | rendered using Blade.
    |
    | Blocks are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the block `sage/accordion`, your block view would be located at:
    |   ↪ `views/blocks/accordion.blade.php`
    |
    | Block views have the following variables available:
    |   ↪ $data    – An object containing the block data.
    |   ↪ $content – A string containing the InnerBlocks content.
    |                Returns `null` when empty.
    |
    */

    'block' => [
        // 'sage/accordion',
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block categories to be registered by Poet for use
    | in the editor.
    |
    */

    'categories' => [
        // 'cta' => [
        //     'title' => 'Call to Action',
        //     'icon' => 'star-filled',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor Palette
    |--------------------------------------------------------------------------
    |
    | Here you may specify the color palette registered in the Gutenberg
    | editor.
    |
    | A color palette can be passed as an array or by passing the filename of
    | a JSON file containing the palette.
    |
    | If a color is passed a value directly, the slug will automatically be
    | converted to Title Case and used as the color name.
    |
    | If the palette is explicitly set to `true` – Poet will attempt to
    | register the palette using the default `palette.json` filename generated
    | by <https://github.com/roots/palette-webpack-plugin>
    |
    */

    'palette' => [
        // 'red' => '#ff0000',
        // 'blue' => '#0000ff',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Menu
    |--------------------------------------------------------------------------
    |
    | Here you may specify admin menu item page slugs you would like moved to
    | the Tools menu in an attempt to clean up unwanted core/plugin bloat.
    |
    | Alternatively, you may also explicitly pass `false` to any menu item to
    | remove it entirely.
    |
    */

    'menu' => [
        // 'gutenberg',
    ],

];
