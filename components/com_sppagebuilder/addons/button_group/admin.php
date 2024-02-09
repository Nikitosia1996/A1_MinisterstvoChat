<?php

/**
 * @package SP Page Builder
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
    'type'       => 'general',
    'addon_name' => 'button_group',
    'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON_GROUP'),
    'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON_GROUP_DESC'),
    'category'   => 'Content',
    'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 13a1 1 0 011-1h10a1 1 0 110 2H11a1 1 0 01-1-1z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M5 7c-1.648 0-3 1.352-3 3v8c0 1.648 1.352 3 3 3h3a1 1 0 110 2H5c-2.752 0-5-2.248-5-5v-8c0-2.752 2.248-5 5-5h22c2.752 0 5 2.248 5 5v8c0 2.752-2.248 5-5 5h-3a1 1 0 110-2h3c1.648 0 3-1.352 3-3v-8c0-1.648-1.352-3-3-3H5z" fill="currentColor"/><path opacity=".5" d="M16 17c-2.75 0-5 2.25-5 5s2.25 5 5 5 5-2.25 5-5-2.25-5-5-5zm2 5.625h-1.375V24c0 .375-.25.625-.625.625s-.625-.25-.625-.625v-1.375H14c-.375 0-.625-.25-.625-.625s.25-.625.625-.625h1.375V20c0-.375.25-.625.625-.625s.625.25.625.625v1.375H18c.375 0 .625.25.625.625s-.25.625-.625.625z" fill="currentColor"/></svg>',
    'settings' => [
        'buttons' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTONS'),
            'fields' => [
                'sp_button_group_item' => [
                    'type' => 'repeatable',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTONS'),
                    'attr'  => [
                        'button' => [
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
                            'fields' => [
                                'title' => [
                                    'type'  => 'text',
                                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT'),
                                    'desc'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT_DESC'),
                                    'std'   => 'Button'
                                ],

                                'url' => [
                                    'type'         => 'link',
                                    'title'        => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL'),
                                    'desc'         => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL_DESC'),
                                ],

                                'typography' => [
                                    'type'     => 'typography',
                                    'title'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                                    'fallbacks' => [
                                        'font' => 'font_family',
                                        'size' => 'fontsize',
                                        'letter_spacing' => 'letterspace',
                                        'weight' => 'font_style.weight',
                                        'italic' => 'font_style.italic',
                                        'underline' => 'font_style.underline',
                                        'uppercase' => 'font_style.uppercase',
                                    ],
                                ],

                                'type' => [
                                    'type'   => 'select',
                                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE'),
                                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE_DESC'),
                                    'values' => [
                                        'default'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_DEFAULT'),
                                        'primary'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PRIMARY'),
                                        'secondary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SECONDARY'),
                                        'success'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUCCESS'),
                                        'info'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_INFO'),
                                        'warning'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WARNING'),
                                        'danger'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_DANGER'),
                                        'dark'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_DARK'),
                                        'link'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                                        'custom'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                                    ],
                                    'inline' => true,
                                    'std' => 'primary'
                                ],

                                'link_button_padding_bottom' => [
                                    'type'    => 'slider',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_PADDING_BOTTOM'),
                                    'max'     => 100,
                                    'depends' => [['type', '=', 'link']],
                                ],

                                'appearance' => [
                                    'type'   => 'select',
                                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
                                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
                                    'values' => [
                                        ''         => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
                                        'outline'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
                                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
                                    ],
                                    'inline' => true,
                                    'std'     => 'flat',
                                    'depends' => [['type', '!=', 'link']]
                                ],

                                'shape' => [
                                    'type'   => 'radio',
                                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
                                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
                                    'values' => [
                                        'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
                                        'square'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
                                        'round'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
                                    ],
                                    'std'     => 'rounded',
                                ],

                                'size' => [
                                    'type'   => 'select',
                                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
                                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
                                    'values' => [
                                        ''    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
                                        'lg'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
                                        'xlg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
                                        'sm'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
                                        'xs'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
                                        'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                                    ],
                                ],

                                'button_padding' => [
                                    'type'    => 'padding',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
                                    'responsive' => true,
                                    'depends' => [['size', '=', 'custom']]
                                ],

                                'block' => [
                                    'type'   => 'select',
                                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
                                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
                                    'values' => [
                                        ''               => Text::_('JNO'),
                                        'sppb-btn-block' => Text::_('JYES'),
                                    ],
                                ],
                            ],
                        ],

                        // Icon
                        'icon' => [
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                            'fields' => [
                                'icon' => [
                                    'type'  => 'icon',
                                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                                    'desc'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
                                ],

                                'icon_position' => [
                                    'type'   => 'select',
                                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                                    'values' => [
                                        'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                                    ],
                                    'std'     => 'left'
                                ],
                            ],
                        ],

                        // Custom Style
                        'style' => [
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                            'depends' => [['type', '=', 'custom']],
                            'fields' => [
                                'style_tab' => [
                                    'type'   => 'buttons',
                                    'values' => [
                                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                                    ],
                                    'std'    => 'normal',
                                    'tabs'    => true,
                                ],

                                'color' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_COLOR_DESC'),
                                    'std'     => '#fff',
                                    'depends' => [['style_tab', '!=', 'hover']],
                                ],

                                'color_hover' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                                    'std'     => '#fff',
                                    'depends' => [['style_tab', '=', 'hover']],
                                ],

                                'background_color' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                                    'std'     => '#444444',
                                    'depends' => [
                                        ['appearance', '!=', 'gradient'],
                                        ['style_tab', '!=', 'hover'],
                                    ],
                                ],

                                'background_color_hover' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
                                    'std'     => '#222',
                                    'depends' => [
                                        ['appearance', '!=', 'gradient'],
                                        ['style_tab', '=', 'hover'],
                                    ],
                                ],

                                'background_gradient' => [
                                    'type'  => 'gradient',
                                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                                    'std'   => [
                                        "color"  => "#3366FF",
                                        "color2" => "#0037DD",
                                        "deg"    => "45",
                                        "type"   => "linear"
                                    ],
                                    'depends' => [
                                        ['appearance', '=', 'gradient'],
                                        ['style_tab', '!=', 'hover'],
                                    ],
                                ],

                                'background_gradient_hover' => [
                                    'type'  => 'gradient',
                                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                                    'std'   => [
                                        "color"  => "#0037DD",
                                        "color2" => "#3366FF",
                                        "deg"    => "45",
                                        "type"   => "linear"
                                    ],
                                    'depends' => [
                                        ['appearance', '=', 'gradient'],
                                        ['style_tab', '=', 'hover'],
                                    ],
                                ],
                            ],
                        ],

                        // Link Style
                        'link_style' => [
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                            'depends' => [['type', '=', 'link']],
                            'fields' => [
                                'link_style_tab' => [
                                    'type'   => 'buttons',
                                    'values' => [
                                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                                    ],
                                    'std'    => 'normal',
                                    'tabs'    => true,
                                ],

                                'link_button_color' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                                    'depends' => [['link_style_tab', '!=', 'hover']],
                                ],

                                'link_button_border_width' => [
                                    'type'    => 'slider',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                                    'max'     => 30,
                                    'depends' => [['link_style_tab', '!=', 'hover']],
                                ],

                                'link_border_color' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                                    'depends' => [['link_style_tab', '!=', 'hover']],
                                ],

                                //Link Hover
                                'link_button_hover_color' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                                    'depends' => [['link_style_tab', '=', 'hover']],
                                ],

                                'link_button_border_hover_color' => [
                                    'type'    => 'color',
                                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                                    'depends' => [['link_style_tab', '=', 'hover']],
                                ],
                            ],
                        ],
                    ],
                ],

                'margin_separator' => [
                    'type'       => 'separator',
                ],

                'margin' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_GAP'),
                    'responsive' => true,
                    'max'        => 100,
                    'std'        => ['xl' => 5],
                ],

                'alignment_separator' => [
                    'type'       => 'separator',
                ],

                'alignment' => [
                    'type'              => 'alignment',
                    'title'             => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
                    'responsive'        => true,
                    'available_options' => ['left', 'center', 'right'],
                    'std'               => [
                        'xl' => 'center', 'lg' => '', 'md' => '', 'sm' => '',  'xs' => ''
                    ],
                ],
            ],
        ],
    ],
]);
