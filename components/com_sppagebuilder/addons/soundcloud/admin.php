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
    'addon_name' => 'soundcloud',
    'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_SOUNDCLOUD'),
    'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_SOUNDCLOUD_DESC'),
    'category'   => 'Media',
    'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M31.536 17.71c-.7-1.74-2.752-3.263-5.112-3.296a9.442 9.442 0 00-3.266-5.41 8.847 8.847 0 00-6.619-1.946.999.999 0 00-.888.993v16.61a1.01 1.01 0 001.006 1.005h9.86c3.791 0 6.638-3.94 5.02-7.955zm-5.02 5.957h-8.863V9.002a6.881 6.881 0 014.246 1.554 7.448 7.448 0 012.687 5.048c.057.6.63 1.01 1.207.883 1.84-.399 3.465.915 3.891 1.972 1.08 2.688-.78 5.208-3.168 5.208zM13.74 24.667V10.564c0-1.322-2-1.324-2 0v14.103c0 1.322 2 1.323 2 0z" fill="currentColor"/><path opacity=".5" d="M9.825 24.667V14.41c0-1.323-2-1.324-2 0v10.256c0 1.322 2 1.323 2 0z" fill="currentColor"/><path d="M5.913 24.667V14.41c0-1.323-2-1.324-2 0v10.256c0 1.322 2 1.323 2 0z" fill="currentColor"/><path opacity=".5" d="M2 24.667v-7.692c0-1.323-2-1.324-2 0v7.692c0 1.322 2 1.323 2 0z" fill="currentColor"/></svg>',
    'settings' => [
        'content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'fields' => [
                'embed' => [
                    'type'  => 'textarea',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_SOUNDCLOUD_EMBED'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_SOUNDCLOUD_EMBED_DESC'),
                    'std'   => '<iframe width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/28830162&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',
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
                    'type'   => 'typography',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
