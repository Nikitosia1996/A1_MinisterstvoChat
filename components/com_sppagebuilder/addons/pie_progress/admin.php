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
    'type'       => 'content',
    'addon_name' => 'pie_progress',
    'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS'),
    'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_DESC'),
    'category'   => 'Content',
    'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7 19.7c-1.7 0-3-1.3-3-3V7.6C7.3 8.1 3 12.7 3 18.3 3 24.2 7.8 29 13.7 29c2.8 0 5.4-1.1 7.5-3 1.7-1.7 2.8-3.9 3.2-6.2h-8.7v-.1zm10.7-1c-.1 3.3-1.5 6.4-3.9 8.7-2.4 2.3-5.5 3.6-8.9 3.6C6.7 31 1 25.3 1 18.3c0-7 5.7-12.7 12.7-12.7.5 0 1 .4 1 1v10.2c0 .6.4 1 1 1h9.8c.3 0 .5.1.7.3.2.1.2.4.2.6z" fill="currentColor"/><path opacity=".5" d="M17.8 1c-.5 0-1 .4-1 1v12.2c0 .5.4 1 1 1h11.8c.5 0 .9-.4 1-.9v-.4C30.5 6.7 24.8 1 17.8 1z" fill="currentColor"/></svg>',
    'settings' => [
        'progress' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS'),
            'fields' => [
                'percentage' => [
                    'type'  => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_PERCENTAGE'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_PERCENTAGE_DESC'),
                    'min'   => 1,
                    'max'   => 100,
                    'std'   => 75,
                    'info'  => '%',
                ],

                'percentage_font_size' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
                    'std'        => ['xl' => 24],
                    'responsive' => true,
                    'max'        => 400,
                    'info'       => 'px',
                ],

                'size' => [
                    'type'  => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_SIZE'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_SIZE_DESC'),
                    'min'   => 50,
                    'max'   => 1000,
                    'std'   => 110,
                    'info'  => 'px',
                ],

                'animation_duration' => [
                    'type'        => 'slider',
                    'title'       => Text::_('COM_SPPAGEBUILDER_ANIMATION_DURATION'),
                    'desc'        => Text::_('COM_SPPAGEBUILDER_ANIMATION_DURATION_DESC'),
                    'info'        => 'ms',
                ],

                'border_width' => [
                    'type'  => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_BORDER_WIDTH'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_BAR_WIDTH_DESC'),
                    'min'   => 1,
                    'max'   => 40,
                    'std'   => 10,
                    'info'  => 'px',
                ],

                'border_color' => [
                    'type'   => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_BAR'),
                    'std'    => 'rgba(51, 102, 255, 0.15)',
                ],

                'border_active_color' => [
                    'type'   => 'color',
                    'std'    => '#3366FF',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_PROGRESS'),
                ],

                'percentage_color' => [
                    'type'   => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_PIE_PROGRESS_PERCENTAGE'),
                    'std'    => '#3366FF',
                ],
            ],
        ],

        'icon' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
            'fields' => [
                'icon_name' => [
                    'type'  => 'icon',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                ],

                'icon_size' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_SIZE'),
                    'values' => [
                        'fa-fw'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE_STANDARD'),
                        'fa-lg fa-fw' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE_TINY'),
                        'fa-2x fa-fw' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE_SMALL'),
                        'fa-3x fa-fw' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE_MEDIUM'),
                        'fa-4x fa-fw' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE_LARGE'),
                        'fa-5x fa-fw' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE_EXTRA_LARGE'),
                    ],
                    'std'   => 'fa-3x fa-fw'
                ],
            ]
        ],

        'content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'fields' => [
                'text' => [
                    'type' => 'editor',
                    'std'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat.'
                ],

                'content_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
                    'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
                    'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                ],

                'title_margin_top' => [
                    'type'        => 'slider',
                    'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
                    'max'         => 400,
                    'responsive'  => true
                ],

                'title_margin_bottom' => [
                    'type'        => 'slider',
                    'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
                    'max'         => 400,
                    'responsive'  => true
                ],
            ],
        ],
    ],
]);
