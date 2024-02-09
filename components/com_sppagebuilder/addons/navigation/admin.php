<?php

/**
 * @package SP Page Builder
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
    'type'       => 'general',
    'addon_name' => 'navigation',
    'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST'),
    'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_DESC'),
    'category'   => 'Content',
    'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3 5.5A1.5 1.5 0 014.5 4h23a1.5 1.5 0 010 3h-23A1.5 1.5 0 013 5.5zM3 15.5A1.5 1.5 0 014.5 14h23a1.5 1.5 0 010 3h-23A1.5 1.5 0 013 15.5zM3 25.5A1.5 1.5 0 014.5 24h23a1.5 1.5 0 010 3h-23A1.5 1.5 0 013 25.5z" fill="currentColor"/></svg>',
    'settings' => [
        'items' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'fields' => [
                'sp_link_list_item' => [
                    'type'  => 'repeatable',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
                    'attr'  => [
                        'title' => [
                            'type'  => 'text',
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                            'std'   => 'Home',
                        ],

                        'url' => [
                            'type'  => 'link',
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                        ],

                        'icon' => [
                            'type'  => 'icon',
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                        ],

                        'active' => [
                            'type'  => 'checkbox',
                            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_ENABLE_ACTIVE'),
                            'std'   => 0
                        ],

                        'class' => [
                            'type'  => 'text',
                            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
                        ],
                    ],
                ],

                'scroll_to_separator' => [
                    'type' => 'separator',
                ],

                'scroll_to' => [
                    'type'  => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_ENABLE_SCROLL_TO'),
                    'std'   => 0
                ],

                'scroll_to_offset' => [
                    'type'    => 'slider',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_ENABLE_SCROLL_TO_OFFSET'),
                    'depends' => [
                        ['scroll_to', '=', 1],
                    ],
                    'max' => 2000,
                    'min' => -2000,
                ],

                'sticky_menu' => [
                    'type'  => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_ENABLE_STICKY'),
                    'std'   => 0
                ],

                'type' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_TYPE'),
                    'values' => [
                        'nav'  => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_TYPE_NAV'),
                        'list' => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_TYPE_LIST'),
                    ],
                    'std' => 'nav'
                ],

                'align_separator' => [
                    'type' => 'separator',
                ],

                'align' => [
                    'type'   => 'radio',
                    'style_property' => true,
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
                    'values' => [
                        'left'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
                        'right'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'std' => 'left',
                ],
            ],
        ],

        'style' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
            'fields' => [
                'link_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
                        'font'           => 'link_font_family',
                        'size'           => 'link_fontsize',
                        'line_height'    => 'link_lineheight',
                        'letter_spacing' => 'link_letterspace',
                        'uppercase'      => 'link_font_style.uppercase',
                        'italic'         => 'link_font_style.italic',
                        'underline'      => 'link_font_style.underline',
                        'weight'         => 'link_font_style.weight',
                    ],
                ],

                'style_tab_separator' => [
                    'type' => 'separator',
                ],

                'style_tab' => [
                    'type'   => 'buttons',
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ACTIVE'), 'value' => 'active'],
                    ],
                    'std'    => 'normal',
                    'tabs'    => true,
                ],

                'link_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'   => '#3366FF',
                    'depends' => [
                        ['style_tab', '=', 'normal'],
                    ],
                ],

                'link_bg' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'   => '#F5F5F5',
                    'depends' => [
                        ['style_tab', '=', 'normal'],
                    ],
                ],

                'link_color_hover' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'   => '#FFFFFF',
                    'depends' => [
                        ['style_tab', '=', 'hover'],
                    ],
                ],

                'link_bg_hover' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'   => '#3366FF',
                    'depends' => [
                        ['style_tab', '=', 'hover'],
                    ],
                ],

                'link_color_active' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'   => '#FFFFFF',
                    'depends' => [
                        ['style_tab', '=', 'active'],
                    ],
                ],

                'link_bg_active' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'   => '#3366FF',
                    'depends' => [
                        ['style_tab', '=', 'active'],
                    ],
                ],
            ],
        ],

        'link' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
            'fields' => [
                'link_padding' => [
                    'type'       => 'padding',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'std'        => ['xl' => '5px 15px 5px 15px', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                    'responsive' => true
                ],

                'link_margin' => [
                    'type'       => 'margin',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'responsive' => true
                ],

                'link_border_radius' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                    'std'        => 3,
                    'min'        => 0,
                    'max'        => 100,
                    'std'        => ['xl' => 4],
                    'responsive' => true
                ],
            ],
        ],

        'icon' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
            'fields' => [
                'icon_position' => [
                    'type'   => 'radio',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                    'values' => [
                        'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                        'top'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TOP'),
                    ],
                    'std' => 'left',
                ],

                'icon_size' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_SIZE'),
                    'max'        => 200,
                    'responsive' => true,
                ],

                'icon_margin' => [
                    'type'       => 'margin',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'responsive' => true
                ],
            ],
        ],

        'burger_menu' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_BURGER_MENU'),
            'fields' => [
                'responsive_menu' => [
                    'type'  => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LINK_LIST_BURGER_MENU'),
                    'std'   => 1,
                    'is_header' => 1,
                ],

                'responsive_menu_tab' => [
                    'type'   => 'buttons',
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ACTIVE'), 'value' => 'active'],
                    ],
                    'std'    => 'normal',
                    'tabs'    => true,
                    'depends' => [['responsive_menu', '=', 1]],
                ],

                'responsive_bar_color' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'     => '#3366FF',
                    'depends' => [
                        ['responsive_menu', '=', 1],
                        ['responsive_menu_tab', '!=', 'active'],
                    ],
                ],

                'responsive_bar_bg_active' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'     => '#3366FF',
                    'depends' => [
                        ['responsive_menu', '=', 1],
                        ['responsive_menu_tab', '=', 'active'],
                    ],
                ],

                'responsive_bar_bg' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'     => '#F5F5F5',
                    'depends' => [
                        ['responsive_menu', '=', 1],
                        ['responsive_menu_tab', '!=', 'active'],
                    ],
                ],

                'responsive_bar_color_active' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'     => '#FFFFFF',
                    'depends' => [
                        ['responsive_menu', '=', 1],
                        ['responsive_menu_tab', '=', 'active'],
                    ],
                ],
            ],
        ],
    ],
]);
