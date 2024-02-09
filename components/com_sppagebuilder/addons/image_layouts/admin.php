<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
    'type' => 'content',
    'addon_name' => 'image_layouts',
    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT'),
    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_DESC'),
    'category' => 'Media',
    'icon' => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M13.6.1H.7C.4.1.2.3.2.6v12.9c0 .3.2.5.5.5h12.9c.3 0 .5-.2.5-.5V.7c0-.3-.2-.6-.5-.6zM9.8 2.8c.9 0 1.6.7 1.6 1.6 0 .9-.7 1.6-1.6 1.6-.9 0-1.6-.7-1.6-1.6 0-.9.7-1.6 1.6-1.6zm2.1 8.9c-.1.2-.3.3-.5.3H2.8c-.2 0-.3-.1-.4-.2-.1-.1-.1-.3-.1-.5l2.2-6.5c0-.2.2-.4.5-.4.2 0 .4.1.5.3l1.8 3.6 1.6-1.6c.1-.1.3-.1.5-.1s.3.1.4.3l2.2 4.3c0 .2 0 .4-.1.5z" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M31 18H1c-.6 0-1 .4-1 1s.4 1 1 1h30c.6 0 1-.4 1-1s-.5-1-1-1zM31 24H1c-.6 0-1 .4-1 1s.4 1 1 1h30c.6 0 1-.4 1-1s-.5-1-1-1zM31 10H19c-.6 0-1 .4-1 1s.4 1 1 1h12c.6 0 1-.4 1-1s-.5-1-1-1zM13 30H1c-.6 0-1 .4-1 1s.4 1 1 1h12c.6 0 1-.4 1-1s-.4-1-1-1zM19 5h12c.6 0 1-.4 1-1s-.4-1-1-1H19c-.6 0-1 .4-1 1s.4 1 1 1z" fill="currentColor"/></svg>',
    'settings' => [
        'general' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'fields' => [
                'image_preset_thumb' => [
                    'type' => 'thumbnail',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LAYOUT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_STYLE_DESC'),
                    'columns' => 3,
                    'values' => [
                        'collage' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><rect opacity="0.1" x="10" y="10" width="71" height="47" rx="4" fill="currentColor"/><path opacity="0.2" d="M55.664 25.741L36 57h36.673c2.338 0 3.778-2.556 2.566-4.555L59.068 25.769a2 2 0 00-3.404-.028z" fill="currentColor"/><path opacity="0.2" d="M40.046 33.868L26 57h31L43.481 33.896c-.765-1.308-2.65-1.323-3.435-.028z" fill="currentColor"/><path opacity="0.3" d="M26.5 22a5.506 5.506 0 00-5.5 5.5 5.504 5.504 0 005.5 5.5 5.504 5.504 0 005.5-5.5c0-3.033-2.467-5.5-5.5-5.5z" fill="currentColor"/><rect opacity="0.2" x="61" y="16" width="59" height="62" rx="4" fill="currentColor"/><rect x="69" y="28" width="45" height="6" rx="3" fill="#fff"/><rect opacity="0.5" x="70" y="41" width="41" height="3" rx="1.5" fill="#fff"/><rect opacity="0.5" x="70" y="49" width="22" height="3" rx="1.5" fill="#fff"/><rect x="70" y="60" width="25" height="7" rx="3.5" fill="#fff"/></svg>'],
                        'inline' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><rect opacity="0.1" x="11" y="10" width="110" height="50" rx="4" fill="currentColor"/><path opacity="0.2" d="M84.44 25.549L59 60h58L92.536 25.62c-1.972-2.771-6.076-2.808-8.096-.071z" fill="currentColor"/><path opacity="0.2" d="M61.362 34.377L42 60h46L69.394 34.448c-1.976-2.712-6.009-2.748-8.032-.07z" fill="currentColor"/><rect opacity="0.3" x="11" y="66" width="91" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="11" y="75" width="49" height="3" rx="1.5" fill="currentColor"/><path opacity="0.3" d="M31.127 19C28.3 19 26 21.25 26 24.014c0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/></svg>'],
                        'stack' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><rect opacity="0.1" x="10" y="10" width="110" height="70" rx="4" fill="currentColor"/><path opacity="0.2" d="M84.981 16.666L59 42h58L92.028 16.732a5 5 0 00-7.047-.066z" fill="currentColor"/><path opacity="0.2" d="M61.912 23.027L42 42h46L68.877 23.092a5 5 0 00-6.965-.065z" fill="currentColor"/><rect opacity="0.3" x="20" y="49" width="77" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="20" y="58" width="49" height="3" rx="1.5" fill="currentColor"/><rect opacity="0.6" x="20" y="67" width="25" height="7" rx="3.5" fill="currentColor"/><path opacity="0.3" d="M30.127 17C27.3 17 25 19.25 25 22.014c0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/></svg>'],
                        'poster' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><path d="M25.127 14C22.3 14 20 16.25 20 19.014c0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="#E5E9EF"/><path opacity="0.2" d="M87.44 53.549L62 88h58L95.536 53.62c-1.972-2.771-6.076-2.808-8.096-.071z" fill="currentColor"/><path opacity="0.2" d="M54.362 62.377L35 88h46L62.394 62.448c-1.976-2.712-6.009-2.748-8.032-.07z" fill="currentColor"/><rect opacity="0.2" x="21" y="20" width="89" height="50" rx="4" fill="currentColor"/><rect x="34" y="34" width="62" height="4" rx="2" fill="#fff"/><rect opacity="0.5" x="42" y="43" width="46" height="3" rx="1.5" fill="#fff"/><rect x="53" y="52" width="25" height="7" rx="3.5" fill="#fff"/></svg>'],
                        'card' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><rect opacity="0.1" x="10" y="10" width="59" height="68" rx="4" fill="currentColor"/><path opacity="0.2" d="M47.664 46.741L28 78h36.673c2.338 0 3.778-2.556 2.566-4.555L51.068 46.769a2 2 0 00-3.404-.028z" fill="currentColor"/><path opacity="0.2" d="M32.046 54.868L18 78h31L35.481 54.896c-.765-1.308-2.65-1.323-3.435-.028z" fill="currentColor"/><path opacity="0.3" d="M26.5 22a5.506 5.506 0 00-5.5 5.5 5.504 5.504 0 005.5 5.5 5.504 5.504 0 005.5-5.5c0-3.033-2.467-5.5-5.5-5.5z" fill="currentColor"/><rect opacity="0.3" x="79" y="25" width="41" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="79" y="34" width="41" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="79" y="43" width="22" height="4" rx="2" fill="currentColor"/><rect opacity="0.6" x="79" y="59" width="25" height="7" rx="3.5" fill="currentColor"/></svg>'],
                        'overlap' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><rect opacity="0.1" x="10" y="10" width="59" height="68" rx="4" fill="currentColor"/><path opacity="0.2" d="M47.664 46.741L28 78h36.673c2.338 0 3.778-2.556 2.566-4.555L51.068 46.769a2 2 0 00-3.404-.028z" fill="currentColor"/><path opacity="0.2" d="M32.046 54.868L18 78h31L35.481 54.896c-.765-1.308-2.65-1.323-3.435-.028z" fill="currentColor"/><path opacity="0.3" d="M26.5 22a5.506 5.506 0 00-5.5 5.5 5.504 5.504 0 005.5 5.5 5.504 5.504 0 005.5-5.5c0-3.033-2.467-5.5-5.5-5.5z" fill="currentColor"/><rect opacity="0.6" x="60" y="21" width="60" height="6" rx="3" fill="currentColor"/><rect opacity="0.6" x="60" y="30" width="39" height="6" rx="3" fill="currentColor"/><rect opacity="0.3" x="77" y="44" width="41" height="3" rx="1.5" fill="currentColor"/><rect opacity="0.3" x="77" y="52" width="22" height="3" rx="1.5" fill="currentColor"/><rect opacity="0.6" x="77" y="63" width="25" height="7" rx="3.5" fill="currentColor"/></svg>'],
                    ],
                    'std' => 'collage',
                ],

                'image_separator' => [
                    'type' => 'separator',
                ],

                'image' => [
                    'type' => 'media',
                    'std' => ['src' => 'https://sppagebuilder.com/addons/image_layouts/image_layouts_default.jpg'],
                ],

                'image_alt_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALT_TEXT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALT_TEXT_DESC'),
                    'std' => 'Alt Text',
                    'inline' => true,
                ],

                'image_border_radius' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                    'max' => 100,
                ],

                'image_options_separator' => [
                    'type' => 'separator',
                ],

                'image_container_column' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_IMG_CONTAINER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_IMG_CONTAINER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                    ],
                    'depends' => [
                        ['image_preset_thumb', '=', 'card'],
                    ],
                ],

                'image_strech' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_STREACH'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_STREACH_DESC'),
                    'std' => 1,
                    'depends' => [
                        ['image_preset_thumb', '!=', 'collage'],
                    ],
                ],

                'image_order_option' => [
                    'type' => 'buttons',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_ORDER_OPTIONS'),
                    'values' => [
                        ['label' => 'Desktop', 'value' => 'desktop'],
                        ['label' => 'Tablet', 'value' => 'tablet'],
                        ['label' => 'Mobile', 'value' => 'mobile'],
                    ],
                    'std' => 'desktop',
                    'depends' => [
                        ['image_preset_thumb', '!=', 'inline'],
                        ['image_preset_thumb', '!=', 'poster'],
                    ],
                ],

                'image_desktop_order' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_DESK_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_DESK_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [
                        ['image_preset_thumb', '!=', 'inline'],
                        ['image_preset_thumb', '!=', 'poster'],
                        ['image_order_option', '=', 'desktop'],
                    ],
                ],

                'image_tab_order_land' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_TAB_LAND_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_TAB_LAND_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [
                        ['image_preset_thumb', '!=', 'inline'],
                        ['image_preset_thumb', '!=', 'poster'],
                        ['image_order_option', '=', 'tablet'],
                    ],
                ],

                'image_tab_order' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_TAB_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_TAB_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [
                        ['image_preset_thumb', '!=', 'inline'],
                        ['image_preset_thumb', '!=', 'poster'],
                        ['image_order_option', '=', 'tablet'],
                    ],
                ],

                'image_mob_order_land' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_MOB_LAND_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_MOB_LAND_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [
                        ['image_preset_thumb', '!=', 'inline'],
                        ['image_preset_thumb', '!=', 'poster'],
                        ['image_order_option', '=', 'mobile'],
                    ],
                ],

                'image_mob_order' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_MOB_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_IMG_MOB_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [
                        ['image_preset_thumb', '!=', 'inline'],
                        ['image_preset_thumb', '!=', 'poster'],
                        ['image_order_option', '=', 'mobile'],
                    ],
                ],

                'click_url_separator' => [
                    'type' => 'separator',
                ],

                'click_url' => [
                    'type' => 'link',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                    'std' => 'https://www.joomshaper.com',
                ],

                'link_apear_in_title' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_TITLE_URL'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_TITLE_URL_DESC'),
                    'std' => 1,
                    'depends' => [['image_preset_thumb', '=', 'poster']],
                ],

            ],
        ],

        'content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'depends' => [['image_preset_thumb', '!=', 'inline']],
            'fields' => [
                'text_content' => [
                    'type' => 'editor',
                    'std' => 'Non quam lacus suspendisse faucibus interdum posuere lorem ipsum. Ultricies integer quis auctor elit sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Consectetur purus ut faucibus pulvinar elementum integer. Nunc non blandit massa enim nec. Et tortor consequat id porta nibh venenatis.',
                ],

                'text_content_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
                        'font' => 'text_content_font_family',
                        'size' => 'text_content_fontsize',
                        'line_height' => 'text_content_lineheight',
                        'letter_spacing' => 'text_content_letterspace',
                        'uppercase' => 'text_content_font_style.uppercase',
                        'italic' => 'text_content_font_style.italic',
                        'underline' => 'text_content_font_style.underline',
                        'weight' => 'text_content_font_style.weight',
                    ],
                ],

                'text_content_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                ],

                'content_spacing_separator' => [
                    'type' => 'separator',
                ],

                'text_content_padding' => [
                    'type' => 'padding',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'responsive' => true,
                ],

                'text_content_margin' => [
                    'type' => 'margin',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'responsive' => true,
                ],

                'content_ordering_separator' => [
                    'type' => 'separator',
                    'depends' => [['image_preset_thumb', '!=', 'poster']],
                ],

                'content_desktop_order' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_DESK_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_DESK_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [['image_preset_thumb', '!=', 'poster']],
                ],

                'content_tab_order_land' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_TAB_LAND_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_TAB_LAND_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [['image_preset_thumb', '!=', 'poster']],
                ],

                'content_tab_order' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_TAB_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_TAB_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [['image_preset_thumb', '!=', 'poster']],
                ],

                'content_mob_order_land' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_MOB_LAND_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_MOB_LAND_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [['image_preset_thumb', '!=', 'poster']],
                ],

                'content_mob_order' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_MOB_ORDER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_MOB_ORDER_DESC'),
                    'values' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10,
                        11 => 11,
                        12 => 12,
                    ],
                    'depends' => [['image_preset_thumb', '!=', 'poster']],
                ],

                'content_text_align' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TEXT_ALIGN'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_TEXT_ALIGN_DESC'),
                    'values' => [
                        'left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'responsive' => true,
                    'std' => 'left',
                    'depends' => [['image_preset_thumb', '!=', 'poster']],
                ],

                'content_vertical_align' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_VERT_ALIGN'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_VERT_ALIGN_DESC'),
                    'values' => [
                        'top' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TOP'),
                        'center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
                        'bottom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOTTOM'),
                    ],
                    'std' => 'center',
                    'depends' => [['image_preset_thumb', '=', 'collage']],
                ],
            ],
        ],

        'title' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
            'depends' => [['image_preset_thumb', '!=', 'inline']],
            'fields' => [
                'title' => [
                    'type' => 'textarea',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                    'std' => 'Introducing <br> <strong>IMAGE LAYOUTS ADDON</strong>',
                ],

                'heading_selector' => [
                    'type' => 'headings',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
                    'std' => 'h3',
                ],

                'title_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
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
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                ],

                'title_background' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                ],

                'title_spacing_separator' => [
                    'type' => 'separator',
                ],

                'title_padding' => [
                    'type' => 'padding',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'responsive' => true,
                    'std' => ['xl' => '0px 0px 0px 0px', 'lg' => '0px 0px 0px 0px', 'md' => '0px 0px 0px 0px', 'sm' => '0px 0px 0px 0px', 'xs' => '0px 0px 0px 0px'],
                ],

                'title_margin' => [
                    'type' => 'margin',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'responsive' => true,
                    'std' => ['xl' => '0px 0px 15px 0px', 'lg' => '0px 0px 15px 0px', 'md' => '0px 0px 15px 0px', 'sm' => '0px 0px 15px 0px', 'xs' => '0px 0px 15px 0px'],
                ],
            ]
        ],

        'button' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
            'fields' => [
                'button_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
                    'std' => 'Learn More',
                ],

                'button_url' => [
                    'type' => 'link',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                ],

                'button_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
                        'font' => 'btn_font_family',
                        'size' => 'btn_fontsize',
                        'letter_spacing' => 'btn_letterspace',
                        'weight' => 'btn_font_style.weight',
                        'italic' => 'btn_font_style.italic',
                        'underline' => 'btn_font_style.underline',
                        'uppercase' => 'btn_font_style.uppercase',
                    ],
                ],

                'button_type' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE_DESC'),
                    'values' => [
                        'default' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DEFAULT'),
                        'primary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PRIMARY'),
                        'secondary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SECONDARY'),
                        'success' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUCCESS'),
                        'info' => Text::_('COM_SPPAGEBUILDER_GLOBAL_INFO'),
                        'warning' => Text::_('COM_SPPAGEBUILDER_GLOBAL_WARNING'),
                        'danger' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DANGER'),
                        'dark' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DARK'),
                        'link' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                        'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'std' => 'custom',
                ],

                'link_button_padding_bottom' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_PADDING_BOTTOM'),
                    'max' => 100,
                    'std' => '',
                    'depends' => [['button_type', '=', 'link']],
                ],

                'button_appearance' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
                    'values' => [
                        '' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
                        'outline' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
                    ],
                    'std' => '',
                    'depends' => [['button_type', '!=', 'link']],
                ],

                'button_shape' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
                    'values' => [
                        'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
                        'square' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
                        'round' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
                    ],
                    'std'   => 'rounded',
                    'depends' => [['button_type', '!=', 'link']],
                ],

                'button_size' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
                    'values' => [
                        '' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
                        'lg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
                        'xlg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
                        'sm' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
                        'xs' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
                        'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'inline' => true,
                    'std' => '',
                ],

                'button_padding' => [
                    'type' => 'padding',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'responsive' => true,
                    'std' => ['xl' => '8px 22px 10px 22px', 'lg' => '8px 22px 10px 22px', 'md' => '8px 22px 10px 22px', 'sm' => '8px 22px 10px 22px', 'xs' => '8px 22px 10px 22px'],
                    'depends' => [['button_size', '=', 'custom']],
                ],

                'button_block' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
                    'values' => [
                        '' => Text::_('JNO'),
                        'sppb-btn-block' => Text::_('JYES'),
                    ],
                    'std' => '',
                    'depends' => [['button_type', '!=', 'link']],
                ],

                'button_icon_separator' => [
                    'type'   => 'separator',
                ],

                'button_icon' => [
                    'type' => 'icon',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
                ],

                'button_icon_position' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
                    'values' => [
                        'left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'std' => 'left',
                ],

                'button_margin_separator' => [
                    'type'   => 'separator',
                ],

                'button_margin_top' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
                    'std' => ['xl' => 20, 'lg' => 20, 'md' => 20, 'sm' => 20, 'xs' => 20],
                    'responsive' => true,
                    'max' => 400,
                ],

                'button_style_tab_separator' => [
                    'type' => 'separator',
                    'depends' => [['button_type', '=', 'custom']],
                ],

                'button_style_tab' => [
                    'type'   => 'buttons',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                    ],
                    'std'    => 'hover',
                    'tabs'    => true,
                    'depends' => [['button_type', '=', 'custom']],
                ],

                'button_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['button_style_tab', '=', 'normal'],
                        ['button_type', '=', 'custom']
                    ],
                ],

                'button_background_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => '#EF6D00',
                    'depends' => [
                        ['button_style_tab', '=', 'normal'],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '!=', 'gradient'],
                    ],
                ],

                'button_background_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                    'std' => [
                        "color" => "#3366FF",
                        "color2" => "#0037DD",
                        "deg" => "45",
                        "type" => "linear",
                    ],
                    'depends' => [
                        ['button_style_tab', '=', 'normal'],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '=', 'gradient'],
                    ],
                ],

                'button_color_hover' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['button_style_tab', '=', 'hover'],
                        ['button_type', '=', 'custom'],
                    ],
                ],

                'button_background_color_hover' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => '#de6906',
                    'depends' => [
                        ['button_style_tab', '=', 'hover'],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '!=', 'gradient'],
                    ],
                ],

                'button_background_gradient_hover' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                    'std' => [
                        "color" => "#0037DD",
                        "color2" => "#3366FF",
                        "deg" => "45",
                        "type" => "linear",
                    ],
                    'depends' => [
                        ['button_style_tab', '=', 'hover'],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '=', 'gradient'],
                    ],
                ],

                // link style
                'link_button_color_tab' => [
                    'type'   => 'buttons',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                    ],
                    'std'    => 'hover',
                    'tabs'    => true,
                    'depends' => [['button_type', '=', 'link']],
                ],

                'link_button_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['link_button_color_tab', '=', 'normal'],
                        ['button_type', '=', 'link'],
                    ],
                ],

                'link_button_border_width' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                    'max' => 30,
                    'depends' => [
                        ['link_button_color_tab', '=', 'normal'],
                        ['button_type', '=', 'link'],
                    ],
                ],

                'link_button_border_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                    'std' => '',
                    'depends' => [
                        ['link_button_color_tab', '=', 'normal'],
                        ['button_type', '=', 'link'],
                    ],
                ],

                'link_button_hover_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
                    'std' => '',
                    'depends' => [
                        ['link_button_color_tab', '=', 'hover'],
                        ['button_type', '=', 'link'],
                    ],
                ],

                'link_button_border_hover_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                    'std' => '',
                    'depends' => [
                        ['link_button_color_tab', '=', 'hover'],
                        ['button_type', '=', 'link'],
                    ],
                ],
            ],
        ],

        'lightbox' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OPEN_LIGHTBOX'),
            'depends' => [['image_preset_thumb', '=', 'inline']],
            'fields' => [
                'open_in_lightbox' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OPEN_LIGHTBOX'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OPEN_LIGHTBOX_DESC'),
                    'std' => 0,
                    'is_header' => 1,
                ],

                'image_overlay_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OVERLAY'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OVERLAY_DESC'),
                    'std' => 'rgba(41, 14, 98, 0.5)',
                    'depends' => [['open_in_lightbox', '!=', 0]],
                ],

                'lightbox_icon_bg' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_OVERLAY_LIGHTBOX_BG'),
                    'std' => '',
                    'depends' => [['open_in_lightbox', '!=', 0]],
                ],
            ],
        ],

        'video' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_POPUP_VIDEO'),
            'depends' => [['image_preset_thumb', '=', 'card']],
            'fields' => [
                'popup_video_on_image' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_VIDEO_POPUP'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_VIDEO_POPUP_DESC'),
                    'std' => 0,
                    'is_header' => 1,
                ],

                'popup_video_src' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_VIDEO_POPUP_SRC'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_VIDEO_POPUP_SRC_DESC'),
                    'std' => 'https://www.youtube.com/watch?v=BWLRMBrKH_c',
                    'depends' => [['popup_video_on_image', '=', 1]],
                ],
            ],
        ],

        'caption' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_CAPTION'),
            'depends' => [['image_preset_thumb', '=', 'inline']],
            'fields' => [
                'caption' => [
                    'type' => 'textarea',
                    'std' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.'
                ],

                'caption_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
                        'font' => 'caption_font_family',
                        'size' => 'caption_fontsize',
                        'line_height' => 'caption_lineheight',
                        'letter_spacing' => 'caption_letterspace',
                        'uppercase' => 'caption_font_style.uppercase',
                        'italic' => 'caption_font_style.italic',
                        'underline' => 'caption_font_style.underline',
                        'weight' => 'caption_font_style.weight',
                    ],
                ],

                'caption_text_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                ],

                'caption_background' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                ],

                'caption_padding_separator' => [
                    'type' => 'separator',
                ],

                'caption_padding' => [
                    'type' => 'padding',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'responsive' => true,
                ],

                'caption_postion' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                    'values' => [
                        'no-caption' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CAPTION_NO'),
                        'caption-below' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CAPTION_BELOW'),
                        'caption-overlay' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CAPTION_OVERLAY'),
                        'caption-overlay-on-over' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CAPTION_OVERLAY_HOVER'),
                    ],
                    'std' => 'caption-below',
                ],
            ],
        ],

        'wrapper' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER'),
            'depends' => [['image_preset_thumb', '!=', 'inline']],
            'fields' => [
                'wrapper_border' => [
                    'type' => 'margin',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),

                ],

                'wrapper_border_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                ],

                'wrapper_border_radius' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS_DESC'),
                    'max' => 100,
                ],

                'wrapper_color_type' => [
                    'type' => 'buttons',
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'), 'value' => 'color'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'), 'value' => 'gradient'],
                    ],
                    'std' => 'color',
                ],

                'wrapper_background' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_DESC'),
                    'std' => '',
                    'depends' => [['wrapper_color_type', '=', 'color']],
                ],

                'wrapper_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                    'std' => [
                        "color" => "rgba(38, 51, 159, 0.95)",
                        "color2" => "rgba(61, 59, 136, 0.95)",
                        "deg" => "225",
                        "type" => "linear",
                    ],
                    'depends' => [['wrapper_color_type', '=', 'gradient']],
                ],

                'wrapper_backdrop_filter' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_DESC'),
                    'values' => [
                        'blur' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_BLUR'),
                        'brightness' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_BRIGHTNESS'),
                        'contrast' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_CONTRAST'),
                        'grayscale' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_GRAYSCALE'),
                        'invert' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_INVERT'),
                        'opacity' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_OPACITY'),
                        'sepia' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_SEPIA'),
                        'saturate' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_SATURATE'),
                    ],
                    'std' => '',
                ],

                'wrapper_backdrop_filter_value' => [
                    'type'  => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_VALUE'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_VALUE_DESC'),
                    'max'   => 100,
                    'depends' => [['wrapper_backdrop_filter', '!=', '']]
                ],

                'wrapper_box_shadow' => [
                    'type' => 'boxshadow',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOXSHADOW'),
                    'std' => '0 0 0 0 #fff',
                ],

                'wrapper_spacing_separator' => [
                    'type' => 'separator',
                ],

                'wrapper_padding' => [
                    'type' => 'padding',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
                    'std' => '',
                    'responsive' => true,
                ],

                'wrapper_margin' => [
                    'type' => 'margin',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
                    'std' => '',
                    'responsive' => true,
                ],
            ],
        ],
    ],
]);
