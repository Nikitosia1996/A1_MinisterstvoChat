<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
    'type'       => 'content',
    'addon_name' => 'social_share',
    'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_SHARE'),
    'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_SHARE_DESC'),
    'category'   => 'Media',
    'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M24.5 2a3.5 3.5 0 100 7 3.5 3.5 0 000-7zM19 5.5a5.5 5.5 0 1111 0 5.5 5.5 0 01-11 0zM6.5 12.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zM1 16a5.5 5.5 0 1111 0 5.5 5.5 0 01-11 0zM24.5 23a3.5 3.5 0 100 7 3.5 3.5 0 000-7zM19 26.5a5.5 5.5 0 1111 0 5.5 5.5 0 01-11 0z" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M9.521 17.762a1 1 0 011.367-.361l10.246 5.97a1 1 0 01-1.007 1.728l-10.245-5.97a1 1 0 01-.361-1.367zM21.479 7.261a1 1 0 01-.36 1.368l-10.23 5.97a1 1 0 01-1.008-1.728l10.23-5.97a1 1 0 011.368.36z" fill="currentColor"/></svg>',
    'settings' => [
        'content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'fields' => [
                'show_socials' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_DESC'),
                    'values' => [
                        'facebook'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_FACEBOOK'),
                        'twitter'   => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_TWITTER'),
                        'linkedin'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_LINKEDIN'),
                        'pinterest' => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_PINTEREST'),
                        'thumblr'   => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_THUMBLR'),
                        'getpocket' => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_GETPOCKET'),
                        'reddit'    => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_REDDIT'),
                        'vk'        => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_VK'),
                        'xing'      => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_XING'),
                        'whatsapp'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_WHATSAPP'),
                    ],
                    'multiple' => true,
                    'std'      => [
                        'facebook',
                        'twitter',
                        'linkedin',
                        'pinterest',
                        'thumblr',
                        'getpocket',
                        'reddit',
                        'vk',
                    ],
                ],

                'show_social_names' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_SHOW_NAME'),
                    'values' => [
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                        2 => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_MEDIA_MAJOR_SITES'),
                        1 => Text::_('COM_SPPAGEBUILDER_ALL'),
                    ],
                    'std' => 0,
                    'inline' => true,
                ],

                'social_style' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_STYLE'),
                    'values' => [
                        'simple'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_STYLE_SIMPLE'),
                        'solid'   => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_STYLE_SOLID'),
                        'colored' => Text::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_STYLE_COLORED'),
                        'custom'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'std' => 'solid',
                    'inline' => true,
                ],

                'social_border_radius' => [
                    'type'  => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                    'std'   => ['xl' => 4, 'lg' => 4, 'md' => 4, 'sm' => 4, 'xs' => 4],
                    'depends' => [
                        ['social_style', '!=', 'simple'],
                        ['social_style', '!=', 'colored'],
                    ],
                ],

                'icon_align_separator' => [
                    'type' => 'separator',
                ],

                'icon_align' => [
                    'type'              => 'alignment',
                    'title'             => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
                    'responsive'        => true,
                    'available_options' => ['left', 'center', 'right'],
                    'std'                => ['xl' => 'left', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                ],
            ],
        ],

        'color' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
            'depends' => [
                ['social_style', '=', 'custom'],
            ],
            'fields' => [
                'color_tab' => [
                    'type'   => 'buttons',
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                    ],
                    'std'    => 'normal',
                    'tabs'    => true,
                ],

                'icon_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'    => '#FFFFFF',
                    'depends' => [
                        ['color_tab', '!=', 'hover'],
                        ['social_style', '=', 'custom'],
                    ],
                ],

                'background_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'    => '#4378f8',
                    'depends' => [
                        ['color_tab', '!=', 'hover'],
                        ['social_style', '=', 'custom'],
                    ],
                ],

                'social_border_width' => [
                    'type'    => 'slider',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                    'std'     => 0,
                    'depends' => [
                        ['color_tab', '!=', 'hover'],
                        ['social_style', '=', 'custom'],
                    ],
                ],

                'social_border_color' => [
                    'type'    => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                    'depends' => [
                        ['color_tab', '!=', 'hover'],
                        ['social_style', '=', 'custom'],
                    ],
                ],

                // Hover
                'icon_hover_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'    => '#FFFFFF',
                    'depends' => [
                        ['color_tab', '=', 'hover'],
                        ['social_style', '=', 'custom'],
                    ],
                ],

                'background_hover_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'    => '#2055d4',
                    'depends' => [
                        ['color_tab', '=', 'hover'],
                        ['social_style', '=', 'custom'],
                    ],
                ],

                'social_border_hover_color' => [
                    'type'    => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                    'depends' => [
                        ['color_tab', '=', 'hover'],
                        ['social_style', '=', 'custom'],
                    ],
                ],
            ],
        ],

        'title' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
            'fields' => [
                'title' => [
                    'type'  => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
                ],

                'heading_selector' => [
                    'type'   => 'headings',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
                    'std'   => 'h3',
                ],

                'title_typography' => [
                    'type'     => 'typography',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks'   => [
                        'font' => 'title_font_family',
                        'size' => 'title_fontsize',
                        'line_height' => 'title_lineheight',
                        'letter_spacing' => 'title_letterspace',
                        'uppercase' => 'title_font_style.uppercase',
                        'italic' => 'title_font_style.italic',
                        'underline' => 'title_font_style.underline',
                        'weight' => 'title_font_style.weight',
                    ],
                ],

                'title_text_color' => [
                    'type'   => 'color',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                ],

                'title_margin_top' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
                    'max'        => 400,
                    'responsive' => true,
                ],

                'title_margin_bottom' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
                    'max'        => 400,
                    'responsive' => true,
                ],
            ],
        ],
    ],
]);
