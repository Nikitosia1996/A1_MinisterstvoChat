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
    'addon_name' => 'timeline',
    'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_TIMELINE'),
    'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_TIMELINE_DESC'),
    'category'   => 'Content',
    'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M17.23 25.846h2.462c.739 0 1.231.492 1.231 1.23 0 .74-.492 1.232-1.23 1.232H17.23v2.461C17.23 31.508 16.738 32 16 32c-.739 0-1.23-.492-1.23-1.23v-9.847h-2.462c-.739 0-1.231-.492-1.231-1.23 0-.74.492-1.232 1.23-1.232h2.462V6.155h-2.461c-.739 0-1.231-.492-1.231-1.23 0-.74.492-1.232 1.23-1.232h2.462V1.231C14.77.492 15.261 0 16 0c.738 0 1.23.492 1.23 1.23v9.847h2.462c.739 0 1.231.492 1.231 1.23 0 .74-.492 1.232-1.23 1.232H17.23v12.307z" fill="currentColor"/><path d="M7.385 1.23H1.23C.492 1.23 0 1.724 0 2.463v4.923c0 .738.492 1.23 1.23 1.23h6.155c.738 0 1.23-.492 1.23-1.23V2.462c0-.739-.492-1.231-1.23-1.231z" fill="currentColor"/><path opacity=".5" d="M30.77 8.615h-6.155c-.738 0-1.23.493-1.23 1.231v4.923c0 .739.492 1.231 1.23 1.231h6.154c.739 0 1.231-.492 1.231-1.23V9.845c0-.738-.492-1.23-1.23-1.23zM7.385 16H1.23C.492 16 0 16.492 0 17.23v4.924c0 .738.492 1.23 1.23 1.23h6.155c.738 0 1.23-.492 1.23-1.23V17.23c0-.739-.492-1.231-1.23-1.231z" fill="currentColor"/><path d="M30.77 23.385h-6.155c-.738 0-1.23.492-1.23 1.23v4.924c0 .738.492 1.23 1.23 1.23h6.154c.739 0 1.231-.492 1.231-1.23v-4.924c0-.738-.492-1.23-1.23-1.23z" fill="currentColor"/></svg>',
    'settings' => [
        'items' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
            'fields' => [
                'sp_timeline_items' => [
                    'type' => 'repeatable',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
                    'attr'  => [
                        'title' => [
                            'type'  => 'text',
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                            'std'   => 'Timeline Item Title',
                        ],

                        'content' => [
                            'type'  => 'editor',
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
                            'std'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                        ],

                        'date' => [
                            'type'  => 'text',
                            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DATE'),
                            'std'   => '12 June 2030',
                        ],
                    ],
                ],
            ],
        ],

        'options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
            'fields' => [
                'options_tab' => [
                    'type'   => 'buttons',
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'), 'value' => 'typography'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'), 'value' => 'color'],
                    ],
                    'std'    => 'typography',
                    'tabs'    => true,
                ],

                'item_title_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                    'depends' => [
                        ['options_tab', '!=', 'color']
                    ],
                ],

                'item_content_typography' => [
                    'type'      => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
                    'depends' => [
                        ['options_tab', '!=', 'color']
                    ],
                ],

                'item_date_typography' => [
                    'type'      => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TIMELINE_DATE'),
                    'depends' => [
                        ['options_tab', '!=', 'color']
                    ],
                ],

                'bar_color' => [
                    'type'   => 'color',
                    'std'    => '#3366FF',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TIMELINE_BAR_COLOR'),
                    'depends' => [
                        ['options_tab', '=', 'color']
                    ],
                ],

                'background_color' => [
                    'type'   => 'color',
                    'std'    => '#FFFFFF',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'depends' => [
                        ['options_tab', '=', 'color']
                    ],
                ],

                'item_title_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                    'depends' => [
                        ['options_tab', '=', 'color']
                    ],
                ],

                'item_content_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
                    'depends' => [
                        ['options_tab', '=', 'color']
                    ],
                ],

                'item_date_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TIMELINE_DATE'),
                    'depends' => [
                        ['options_tab', '=', 'color']
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
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                ],

                'title_margin_separator' => [
                    'type' => 'separator',
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
