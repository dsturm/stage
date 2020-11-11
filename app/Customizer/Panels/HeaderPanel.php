<?php

namespace Stage\Customizer\Panels;

use Kirki\Compatibility\Kirki;
use Kirki\Control\ReactSelect;
use Kirki\Panel;
use Kirki\Section;
use function Roots\asset;
use Stage\Customizer\Controls\LayoutControl;
use Stage\Customizer\Controls\RangeValueControl;
use Stage\Customizer\Controls\ToggleControl;
use Stage\Customizer\Customizer;
use function Stage\stage_get_default;
use function Stage\stage_get_fallback;
use function Stage\stage_get_fallback_template;
use WP_Customize_Manager;

class HeaderPanel
{
    // Set panel ID
    private static $panel = 'header';
    private static $config = 'header_conf';

    public function __construct()
    {

        /*
         * Set up config for panel
         */

        Kirki::add_config(
            self::$config,
            [
                'capability'     => 'edit_theme_options',
                'option_type'    => 'theme_mod',
                'disable_output' => false,
            ]
        );

        /*
         * Set up the panel
         */
        new Panel(
            self::$panel,
            [
                'priority'    => 20,
                'title'       => esc_attr__('Site Header & Menus', 'stage'),
                'description' => esc_attr__('Customize the main header and menus.', 'stage'),
            ]
        );

        /*
         * Init sections with fields
         */
        $this->layout();
        $this->typography();
        $this->colors();
    }

    public function layout()
    {
        // Set section & settings ID
        $section = self::$panel.'_layout';

        /*
         * Add Section and fields for Header Layout
         */
        new Section(
            $section,
            [
                'title'       => esc_attr__('Layout', 'stage'),
                'description' => esc_attr__('Adjust theme colors.', 'stage'),
                'panel'       => 'header',
                'type'        => 'expand',
                'priority'    => 10,
            ]
        );

        /*
         * Add Customizer settings & controls.
         *
         * @since 1.0
         * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager object.
         * @return void
         */
        add_action(
            'customize_register',
            function (WP_Customize_Manager $wp_customize) use ($section) {

                /*
                * Desktop: Layout options
                */
                $wp_customize->add_setting(
                    'header.desktop.layout',
                    [
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => stage_get_default('header.desktop.layout', true),
                        'transport'         => 'refresh', // Or postMessage.
                        'sanitize_callback' => function ($layout) {
                            return $layout;
                        },
                    ]
                );

                $wp_customize->add_control(
                    new LayoutControl(
                        $wp_customize,
                        'header.desktop.layout',
                        [
                            'type'    => 'layout',
                            'label'   => esc_html__('Header Layout', 'stage'),
                            'section' => $section,
                            'choices' => [
                                'horizontal-left'   => asset(
                                    'images/header-horizontal-left.svg',
                                    'stage'
                                )->uri(),
                                'horizontal-center' => asset(
                                    'images/header-horizontal-center.svg',
                                    'stage'
                                )->uri(),
                                'horizontal-right'  => asset(
                                    'images/header-horizontal-right.svg',
                                    'stage'
                                )->uri(),
                            ],
                        ]
                    )
                );

                /*
                * Desktop: Layout options
                */
                $wp_customize->add_setting(
                    'header.search.layout',
                    [
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => stage_get_default('header.search.layout', true),
                        'transport'         => 'refresh', // Or postMessage.
                        'sanitize_callback' => function ($layout) {
                            return $layout;
                        },
                    ]
                );

                $wp_customize->add_control(
                    new LayoutControl(
                        $wp_customize,
                        'header.search.layout',
                        [
                            'type'    => 'layout',
                            'label'   => esc_html__('Search Layout', 'stage'),
                            'section' => $section,
                            'choices' => [
                                'below-header' => asset(
                                    'images/header-horizontal-left.svg',
                                    'stage'
                                )->uri(),
                                'fullscreen'   => asset(
                                    'images/header-horizontal-center.svg',
                                    'stage'
                                )->uri(),
                            ],
                        ]
                    )
                );

                /*
                * Desktop: Header Position
                */
                $wp_customize->add_setting(
                    'header.desktop.position',
                    [
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => stage_get_default('header.desktop.position'),
                        'transport'         => 'refresh', // Or postMessage.
                        'sanitize_callback' => function ($layout) {
                            return $layout;
                        },
                    ]
                );

                $wp_customize->add_control(
                    new ReactSelect(
                        $wp_customize,
                        'header.desktop.position',
                        [
                            'label'   => esc_html__('Header Position', 'stage'),
                            'section' => $section,
                            'choices' => [
                                'default'          => esc_attr__('Default', 'stage'),
                                'sticky'           => esc_attr__('Fixed on top', 'stage'),
                                'sticky auto-hide' => esc_attr__('Auto hide while scrolling', 'stage'),
                            ],
                        ]
                    )
                );

                /*
                 * Desktop: Header Fullwidth
                 */
                $wp_customize->add_setting(
                    'header.desktop.fullwidth',
                    [
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => stage_get_default('header.desktop.fullwidth'),
                        'transport'         => 'refresh',
                        'sanitize_callback' => ['Stage\Customizer\Controls\ToggleControl', 'sanitize_toggle'],
                    ]
                );

                $wp_customize->add_control(
                    new ToggleControl(
                        $wp_customize,
                        'header.desktop.fullwidth',
                        [
                            'label'    => esc_html__('Fullwidth header', 'stage'),
                            'section'  => $section,
                            'settings' => 'header.desktop.fullwidth',
                            'type'     => 'toggle',
                        ]
                    )
                );

                /*
                 * Desktop: Header Fullwidth
                 */
                $wp_customize->add_setting(
                    'header.branding.show_tagline',
                    [
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => stage_get_default('header.branding.show_tagline'),
                        'transport'         => 'refresh',
                        'sanitize_callback' => ['Stage\Customizer\Controls\ToggleControl', 'sanitize_toggle'],
                    ]
                );

                $wp_customize->add_control(
                    new ToggleControl(
                        $wp_customize,
                        'header.branding.show_tagline',
                        [
                            'label'    => esc_html__('Show Tagline', 'stage'),
                            'section'  => $section,
                            'settings' => 'header.branding.show_tagline',
                            'type'     => 'toggle',
                        ]
                    )
                );

                /*
                 * Desktop: Header Horizontal Padding
                 */
                $wp_customize->add_setting(
                    'header.desktop.padding-x',
                    [
                        'type'       => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'default'    => stage_get_default('header.desktop.padding-x'),
                        'transport'  => 'refresh',
                    ]
                );

                $wp_customize->add_control(
                    new RangeValueControl(
                        $wp_customize,
                        'header.desktop.padding-x',
                        [
                            'type'        => 'range-value',
                            'section'     => $section,
                            'settings'    => 'header.desktop.padding-x',
                            'label'       => esc_html__('Horizontal Padding', 'stage'),
                            'input_attrs' => [
                                'min'    => '0',
                                'max'    => '12',
                                'step'   => '2',
                                'prefix' => '',
                                'suffix' => '',
                            ],
                        ]
                    )
                );

                /*
                 * Desktop: Header Vertical Padding
                 */
                $wp_customize->add_setting(
                    'header.desktop.padding-y',
                    [
                        'type'       => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'default'    => stage_get_default('header.desktop.padding-y'),
                        'transport'  => 'refresh',
                    ]
                );

                $wp_customize->add_control(
                    new RangeValueControl(
                        $wp_customize,
                        'header.desktop.padding-y',
                        [
                            'type'        => 'range-value',
                            'section'     => $section,
                            'settings'    => 'header.desktop.padding-y',
                            'label'       => esc_html__('Vertical Padding', 'stage'),
                            'input_attrs' => [
                                'min'    => '0',
                                'max'    => '10',
                                'step'   => '2',
                                'prefix' => '',
                                'suffix' => '',
                            ],
                        ]
                    )
                );

                $wp_customize->selective_refresh->add_partial(
                    'header.desktop.layout',
                    [
                        'selector'        => 'header.main-header > .header-wrap',
                        'settings'        => [
                            'header.desktop.layout',
                            'header.desktop.position',
                            'header.desktop.fullwidth',
                            'header.branding.show_tagline',
                            'header.desktop.padding-x',
                            'header.desktop.padding-y',
                        ],
                        'render_callback' => function () {
                            return stage_get_fallback_template(
                                'header.desktop.layout',
                                null,
                                [
                                    'layout'       => stage_get_fallback('header.desktop.layout'),
                                    'position'     => stage_get_fallback('header.desktop.position'),
                                    'fullwidth'    => stage_get_fallback('header.desktop.fullwidth'),
                                    'logo'         => get_custom_logo(),
                                    'site_name'    => get_bloginfo('name'),
                                    'site_tagline' => get_bloginfo('description'),
                                    'show_tagline' => stage_get_fallback('header.branding.show_tagline'),
                                ]
                            );
                        },
                    ]
                );
            }
        );
    }

    public function typography()
    {
        // Set section & settings ID
        $section = self::$panel.'_typography';

        new Section(
            $section,
            [
                'title'    => esc_attr__('Typography', 'stage'),
                'panel'    => 'header',
                'priority' => 30,
            ]
        );

        Kirki::add_field(
            self::$config,
            [
                'type'        => 'typography',
                'settings'    => $section,
                'label'       => esc_html__('Header Typo', 'stage'),
                'section'     => $section,
                'default'     => [
                    'font-family' => '',
                    'font-weight' => '',
                ],
                'choices'     => [
                    'fonts' => stage_get_default('global.typo.choices.fonts'),
                ],
                'priority'    => 10,
                'transport'   => 'auto',
                'input_attrs' => [
                    'font-family' => [
                        'data-sync-master' => 'global_typo_copy[font-family]',
                    ],
                    'font-weight' => [
                        'data-sync-master' => 'global_typo_copy[font-weight]',
                    ],
                ],
                'output'      => [
                    [
                        'choice'   => 'font-family',
                        'element'  => 'header.main-header',
                        'property' => '--copy-font-family',
                    ],
                    [
                        'choice'   => 'font-weight',
                        'element'  => 'header.main-header',
                        'property' => '--heading-font-weight',
                    ],
                ],
            ]
        );
    }

    public function colors()
    {
        // Set section & settings ID
        $section = self::$panel.'_colors';

        /*
         * Add Section and fields for Header Style
         */
        new Section(
            $section,
            [
                'title'    => esc_attr__('Colors', 'stage'),
                'panel'    => self::$panel,
                'priority' => 20,
            ]
        );
    }
}
