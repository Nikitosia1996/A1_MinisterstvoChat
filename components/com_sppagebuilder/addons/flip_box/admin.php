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
    'addon_name' => 'flip_box',
    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX'),
    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_DESC'),
    'category' => 'Content',
    'icon' => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M27 3a3 3 0 00-3-3H8a3 3 0 00-3 3v10.188a1 1 0 102 0V3a1 1 0 011-1h16a1 1 0 011 1v26a1 1 0 01-1 1H8a1 1 0 01-1-1v-6.906a1 1 0 10-2 0V29a3 3 0 003 3h16a3 3 0 003-3V3z" fill="currentColor"/><path d="M18.332 21.539c.039 0 .079-.002.117-.006C26.428 20.835 32 17.32 32 12.987c0-1.338-.217-2.348-1.33-3.556a1.334 1.334 0 00-1.963 1.805c.548.595.626.908.626 1.75 0 2.758-4.882 5.345-11.116 5.89a1.334 1.334 0 00.115 2.663zM13.021 21.475a1.335 1.335 0 00.144-2.66c-6.28-.69-10.498-3.4-10.498-5.495 0-1.05.182-1.377.758-2.255a1.335 1.335 0 00-2.229-1.464C.452 10.736 0 11.551 0 13.32c0 3.9 5.415 7.325 12.873 8.147.05.005.099.008.148.008z" fill="currentColor"/><path d="M16.217 19.955l2.83-3.77a1 1 0 011.79.459l.94 6.6a1 1 0 01-1.59.94l-3.77-2.83a1 1 0 01-.2-1.399z" fill="currentColor"/></svg>',
    'settings' => [
        'front' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_FRONT'),
            'fields' => [
                'front_text' => [
                    'type' => 'textarea',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_TEXT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_TEXT_DESC'),
                    'std' => '<i class="fa fa-signal" style="font-size:25px;background-color:#fff;display:inline-block;color:#007BF8;width:60px;height:60px;line-height:60px;border-radius: 50%;" aria-hidden="true"></i><h2>Product Design</h2>'
                ],

                'front_bgcolor' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                ],

                'front_textcolor' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT'),
                    'std' => '#FFFFFF',
                ],

                'front_bgimg' => [
                    'type' => 'media',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                    'std' => ['src' => 'https://sppagebuilder.com/addons/flipbox/flipbox-bg-1.jpg']
                ],

                'text_align' => [
                    'type' => 'alignment',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
                    'responsive' => true,
                    'available_options' => ['left', 'center', 'right'],
                    'std' => [
                        'xl' => 'left',
                        'lg' => '',
                        'md' => '',
                        'sm' => '',
                        'xs' => '',
                    ],
                ],
            ],
        ],

        'back' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_BACK'),
            'fields' => [
                'flip_text' => [
                    'type' => 'textarea',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_FLIP_TEXT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_FLIP_TEXT_DESC'),
                    'std' => '<h3>Product Design</h3><p>Successful businesses have many things in common, today we’ll look at the big ‘R’of recognitional advertising network may help.</p><p>Recognition can be illustrated by two individuals entering a crowded room at a party.</p>'
                ],

                'back_bgcolor' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => '#2E3B3E',
                ],

                'back_textcolor' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT'),
                    'std' => '#FFFFFF',
                ],

                'back_bgimg' => [
                    'type' => 'media',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                ],
            ],
        ],

        'flip_options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
            'fields' => [
                'flip_bhave' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_FLIP_BHAVE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_FLIP_BHAVE_DESC'),
                    'values' => [
                        'hover' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_FLIP_BHAVE_HOVER'),
                        'click' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_FLIP_BHAVE_CLICK'),
                    ],
                    'std' => 'hover',
                    'inline' => true,
                ],

                'flip_style' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_STYLE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_STYLE_DESC'),
                    'values' => [
                        'rotate_style' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_ROTATE_STYLE'),
                        'slide_style' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_SLIDE_STYLE'),
                        'fade_style' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_FADE_STYLE'),
                        'threeD_style' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_3D_STYLE'),
                    ],
                    'std' => 'flat_style',
                    'inline' => true,
                ],

                'rotate' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_ROTATE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_ROTATE_DESC'),
                    'values' => [
                        'flip_top' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_FROM_TOP'),
                        'flip_bottom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOTTOM'),
                        'flip_left' => Text::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_FROM_LEFT'),
                        'flip_right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'std' => 'flip_right',
                    'inline' => true,
                    'depends' => [['flip_style', '!=', 'fade_style']],
                ],

                'height' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_HEIGHT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIPBOX_HEIGHT_DESC'),
                    'std' => '',
                    'responsive' => true,
                    'max' => 1000,
                ],
            ],
        ],
    ],
]);
