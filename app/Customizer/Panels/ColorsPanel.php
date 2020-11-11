<?php

namespace Stage\Customizer\Panels;

use Kirki\Field\ReactColor;
use Stage\Customizer\Customizer;
use Stage\Customizer\Settings;
use function Stage\stage_get_default;

class ColorsPanel
{
    // Set panel ID
    private static $panel = 'colors';
    private static $config = 'colors_conf';

    public function __construct()
    {

        /*
         * Set up config for panel
         */
        Customizer::addConfig(
            self::$config,
            [
                'capability'     => 'edit_theme_options',
                'disable_output' => false,
            ]
        );

        /*
         * Set up the panel
         */
        Customizer::addPanel(
            self::$panel,
            [
                'priority'    => 30,
                'title'       => esc_attr__('Colors', 'stage'),
                'description' => esc_attr__('Customize your colors.', 'stage'),
            ]
        );

        /**
         * Init sections with fields.
         */
        $sections = [
            'global' => [
                'label' => esc_html('Global', 'stage'),
                'element' => ':root',
                'priority' => 10,
            ],
            'header' => [
                'label' => esc_html('Header', 'stage'),
                'element' => 'body > header',
                'priority' => 20,
            ],
            'footer' => [
                'label' => esc_html('Footer', 'stage'),
                'element' => 'body > footer',
                'priority' => 30,
            ],
        ];

        foreach ($sections as $section => $args) {
            $this->registerColors($section, $args);
        }
    }

    /**
     * Register Color Configs.
     *
     * @param $section
     * @param $args
     */
    public function registerColors($section, $args)
    {
        $default_key = $section.'.colors.';

        /*
         * Add Section and fields for Colors
         */
        Customizer::addSection($section.'_colors', [
            'title'       => sprintf(
            	/* translators: %s: Header */
                esc_html__('%s Colors', 'repack'),
                $args['label']
            ),
            'description' => esc_html__('Set color settings for your website', 'stage'),
            'panel'       => self::$panel,
        ]);

        /*
         * Main colors
         */
        Customizer::addField(
            self::$config,
            [
                'type'      => 'multicolor',
                'settings'  => $section.'_colors',
                'section'   => $section.'_colors',
                'choices'   => [
                    'primary'   => esc_html__('Primary Color', 'stage'),
                    'secondary' => esc_html__('Secondary Color', 'stage'),
                    'body'      => esc_html__('Default Background Color', 'stage'),
                    'copy'      => esc_html__('Default Text Color', 'stage'),
                    'heading'   => esc_html__('Default Heading Color', 'stage'),
                ],
                'default'   => [
                    'primary'   => stage_get_default($default_key.'primary'),
                    'secondary' => stage_get_default($default_key.'secondary'),
                    'body'      => stage_get_default($default_key.'body'),
                    'copy'      => stage_get_default($default_key.'copy'),
                    'heading'   => stage_get_default($default_key.'copy'),
                ],
                'input_attrs' => $section === 'global' ? [] : [
                    'primary'        => [
                        'data-sync-master' => 'global_colors[primary]',
                    ],
                    'secondary'       => [
                        'data-sync-master' => 'global_colors[secondary]',
                    ],
                    'body'        => [
                        'data-sync-master' => 'global_colors[body]',
                    ],
                    'copy'        => [
                        'data-sync-master' => 'global_colors[copy]',
                    ],
                    'heading'       => [
                        'data-sync-master' => 'global_colors[copy]',
                    ],
                ],
                'transport' => 'auto',
                'output'    => [
                    [
                        'choice'   => 'copy',
                        'element'  => $args['element'],
                        'property' => '--color-copy',
                        'context'  => [
                            'editor',
                            'front',
                        ],
                    ],
                    [
                        'choice'   => 'heading',
                        'element'  => $args['element'],
                        'property' => '--color-heading',
                        'context'  => [
                            'editor',
                            'front',
                        ],
                    ],
                    [
                        'choice'   => 'primary',
                        'element'  => $args['element'],
                        'property' => '--color-primary',
                        'context'  => [
                            'editor',
                            'front',
                        ],
                    ],
                    [
                        'choice'   => 'secondary',
                        'element'  => $args['element'],
                        'property' => '--color-secondary',
                        'context'  => [
                            'editor',
                            'front',
                        ],
                    ],
                    [
                        'choice'   => 'body',
                        'element'  => $args['element'],
                        'property' => '--color-body',
                        'context'  => [
                            'editor',
                            'front',
                        ],
                    ],
                ],
            ]
        );

        /*
         * Link Colors
         */
        Customizer::addField(
            self::$config,
            [
                'type'        => 'multicolor',
                'settings'    => $section.'_colors_links',
                'section'     => $section.'_colors',
                'choices'     => [
                    'link'  => esc_html__('Link Color', 'stage'),
                    'hover' => esc_html__('Hover & Focus Color', 'stage'),
                ],
                'default'     => [
                    'link'  => '',
                    'hover' => '',
                ],
                'input_attrs' => $section === 'global' ? [
                    'link'         => [
                        'data-sync-master' => 'global_colors[copy]',
                    ],
                    'hover'       => [
                        'data-sync-master' => 'global_colors[primary]',
                    ],
                ] : [
                    'link'         => [
                        'data-sync-master' => 'global_colors_links[link]',
                    ],
                    'hover'       => [
                        'data-sync-master' => 'global_colors_links[hover]',
                    ],
                ],
                'transport'   => 'auto',
                'output'      => [
                    [
                        'choice'   => 'link',
                        'element'  => $args['element'],
                        'property' => '--color-link',
                        'context'  => [
                            'editor',
                            'front',
                        ],
                    ],
                    [
                        'choice'   => 'hover',
                        'element'  => $args['element'],
                        'property' => '--color-hover',
                        'context'  => [
                            'editor',
                            'front',
                        ],
                    ],
                ],
            ]
        );

        /*
         * Color Palettes
         */
        foreach (Settings::getDefault('global.colors.palettes') as $palette => $shades) {
            foreach ($shades as $shade => $color) {
                $key = $palette;
                $key .= $shade !== 'default' ? '-'.$shade : '';

                new ReactColor(
                    [
                        'kirki_config' => self::$config,
                        'label'        => ucfirst($palette).' '.$shade,
                        'settings'     => $section.'_colors_'.$palette.'['.$shade.']',
                        'section'      => $section.'_colors',
                        'choices'      => [
                            'formComponent' => 'ChromePicker',
                        ],
                        'default' => stage_get_default("global.colors.palettes.$palette.$shade"),
                        'input_attrs' => $section != 'global' ? [
                            'data-sync-master' => 'global_colors_'.$palette.'['.$shade.']',
                        ] : [],
                        'disable_output' => false,
                        'gutenberg_support' => true,
                        'transport'   => 'auto',
                        'output'    => [
                            [
                                'element'  => $args['element'],
                                'property' => "--color-$key",
                                'context'  => [
                                    'editor',
                                    'front',
                                ],
                            ],
                        ],
                    ]
                );
            }
        }
    }
}
