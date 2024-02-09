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
    'type' => 'content',
    'addon_name' => 'flip_box_pro',
    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_PRO'),
    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_PRO_DESC'),
    'category' => 'Content',
    'icon' => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M27 3a3 3 0 00-3-3H8a3 3 0 00-3 3v10.188a1 1 0 102 0V3a1 1 0 011-1h16a1 1 0 011 1v26a1 1 0 01-1 1H8a1 1 0 01-1-1v-6.906a1 1 0 10-2 0V29a3 3 0 003 3h16a3 3 0 003-3V3z" fill="currentColor"/><path d="M18.332 21.539c.039 0 .079-.002.117-.006C26.428 20.835 32 17.32 32 12.987c0-1.338-.217-2.348-1.33-3.556a1.334 1.334 0 00-1.963 1.805c.548.595.626.908.626 1.75 0 2.758-4.882 5.345-11.116 5.89a1.334 1.334 0 00.115 2.663zM13.021 21.475a1.335 1.335 0 00.144-2.66c-6.28-.69-10.498-3.4-10.498-5.495 0-1.05.182-1.377.758-2.255a1.335 1.335 0 00-2.229-1.464C.452 10.736 0 11.551 0 13.32c0 3.9 5.415 7.325 12.873 8.147.05.005.099.008.148.008z" fill="currentColor"/><path d="M16.217 19.955l2.83-3.77a1 1 0 011.79.459l.94 6.6a1 1 0 01-1.59.94l-3.77-2.83a1 1 0 01-.2-1.399z" fill="currentColor"/></svg>',
    'settings' => [
        'flip_box_basic_options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_PRO_GENERAL'),
            'fields' => [
                'flip_behavior' => [
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

                'text_align_starts' => [
                    'type' => 'separator',
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

        'flip_box_front_content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_FRONT'),
            'fields' => [
                // title
                'front_add_title' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                    'std' => 0,
                ],

                'front_title' => [
                    'type'  => 'text',
                    'title' => '',
                    'depends' => [
                        ['front_add_title', '=', 1],
                    ],
                ],

                'front_title_typography' => [
                    'type'     => 'typography',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'depends' => [
                        ['front_add_title', '=', 1],
                    ],
                ],

                'front_title_text_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['front_add_title', '=', 1],
                    ],
                ],

                'front_title_ends' => [
                    'type'     => 'separator',
                ],

                // paragraph
                'front_add_paragraph' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_PRO_PARAGRAPH'),
                    'std' => 0,
                ],

                'front_paragraph' => [
                    'type'  => 'textarea',
                    'title' => '',
                    'depends' => [
                        ['front_add_paragraph', '=', 1],
                    ],
                ],

                'front_paragraph_typography' => [
                    'type'     => 'typography',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'depends' => [
                        ['front_add_paragraph', '=', 1],
                    ],
                ],

                'front_paragraph_text_color' => [
                    'type'   => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['front_add_paragraph', '=', 1],
                    ],
                ],

                'front_paragraph_ends' => [
                    'type'     => 'separator',
                ],

                // icon
                'front_add_icon' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                    'std' => 0,
                ],

                'front_icon' => [
                    'type'      => 'icon',
                    'title'     => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_PRO_ICON_NAME'),
                    'std'       => 'fas fa-cogs',
                    'depends' => [
                        ['front_add_icon', '=', 1],
                    ],
                ],

                'front_icon_size' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_SIZE'),
                    'std'        => ['xl' => 36],
                    'max'        => 400,
                    'responsive' => true,
                    'depends' => [
                        ['front_add_icon', '=', 1],
                    ],
                ],

                'front_global_background_type' => [
                    'type'   => 'buttons',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NONE'), 'value' => 'none'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'), 'value' => 'color'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'), 'value' => 'gradient'],
                    ],
                    'std' => 'none',
                    'depends' => [
                        ['front_add_icon', '=', 1],
                    ],
                ],

                'front_flip_box_icon_color' => [
                    'type'   => 'color',
                    'title'  => 'Icon Color',
                    'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR_DESC'),
                    'depends' => [
                        ['front_global_background_type', '!=', 'none'],
                        ['front_global_background_type', '!=', 'gradient'],
                        ['front_add_icon', '=', 1],
                    ],
                ],

                'front_flip_box_icon_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                    'std' => [
                        "color" => "#00c6fb",
                        "color2" => "#005bea",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['front_global_background_type', '=', 'gradient'],
                        ['front_add_icon', '=', 1],
                    ],
                ],

                'front_flip_box__margin' => [
                    'type' => 'margin',
                    'title' => 'Margin',
                    'responsive' => true,
                    'std' => '',
                    'depends' => [
                        ['front_add_icon', '=', 1],
                    ],
                ],

                'front_flip_box__padding' => [
                    'type' => 'padding',
                    'title' => 'Padding',
                    'responsive' => true,
                    'std' => '',
                    'depends' => [
                        ['front_add_icon', '=', 1],
                    ],
                ],

                // button
                'front_add_button_starts' => [
                    'type'     => 'separator',
                    'depends' => [
                        ['flip_behavior', '=', 'click']
                    ],
                ],

                'front_add_button' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
                    'std' => 0,
                    'depends' => [
                        ['flip_behavior', '=', 'click']
                    ],
                ],

                'front_button_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
                    'std'  => 'Button',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                'front_flip_box_button_link' => [
                    'type' => 'link',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                'front_flip_box_button_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                // Button
                'front_button_type' => [
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
                        'custom'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                    'std'    => 'custom',
                ],

                'front_appearance' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
                    'values' => [
                        ''         => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
                        'outline'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
                    ],
                    'std'     => '',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '!=', 'link'],
                    ],
                ],

                'front_shape' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
                    'values' => [
                        'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
                        'square'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
                        'round'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
                    ],
                    'std'   => 'rounded',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '!=', 'link'],
                    ],
                ],

                'front_button_size' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
                    'values' => [
                        ''       => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
                        'lg'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
                        'xlg'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
                        'sm'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
                        'xs'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
                        'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'inline' => true,
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                    ],
                ],

                'front_button_padding' => [
                    'type'    => 'padding',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
                    'responsive' => true,
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                    ],
                ],

                'front_flip_box_button_icon_start' => [
                    'type' => 'separator',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                'front_flip_box_icon' => [
                    'type'  => 'icon',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                'front_flip_box_button_icon_position' => [
                    'type'       => 'margin',
                    'type'   => 'radio',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                    'values' => [
                        'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'std' => 'left',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                'front_flip_box_button_icon_ends' => [
                    'type' => 'separator',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                'front_button_margin' => [
                    'type'    => 'margin',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
                    'responsive' => true,
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                    ],
                ],

                'front_block' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
                    'values' => [
                        ''               => Text::_('JNO'),
                        'sppb-btn-block' => Text::_('JYES'),
                    ],
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '!=', 'link'],
                    ],
                ],

                'front_button_color_option_starts' => [
                    'type' => 'separator',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                    ],
                ],

                'front_button_color_option' => [
                    'type' => 'buttons',
                    'std' => 'normal',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                    ],
                    'tabs' => true,
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                    ],
                ],

                'front_flip_box_button_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                        ['front_button_color_option', '!=', 'hover'],
                    ],
                ],

                'front_flip_box_button_color_hover' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                        ['front_button_color_option', '=', 'hover'],
                    ],
                ],

                'front_flip_box_button_bg_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'     => '#3366FF',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                        ['front_appearance', '!=', 'gradient'],
                        ['front_button_color_option', '!=', 'hover'],
                    ],
                ],

                'front_flip_box_button_bg_color_hover' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'     => '#0037DD',
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                        ['front_appearance', '!=', 'gradient'],
                        ['front_button_color_option', '=', 'hover'],
                    ],
                ],

                'front_flip_box_button_bg_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => [
                        "color"  => "#3366FF",
                        "color2" => "#0037DD",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                        ['front_appearance', '=', 'gradient'],
                        ['front_button_color_option', '!=', 'hover'],
                    ],
                ],

                'front_flip_box_button_gradient_bg_hover' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => [
                        "color"  => "#0037DD",
                        "color2" => "#3366FF",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['flip_behavior', '=', 'click'],
                        ['front_add_button', '=', 1],
                        ['front_button_type', '=', 'custom'],
                        ['front_appearance', '=', 'gradient'],
                        ['front_button_color_option', '=', 'hover'],
                    ],
                ],
            ],
        ],

        'flip_box_back_content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_BACK'),
            'fields' => [
                // title
                'back_add_title' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                    'std' => 0,
                ],

                'back_title' => [
                    'type'  => 'text',
                    'title' => '',
                    'depends' => [
                        ['back_add_title', '=', 1],
                    ],
                ],

                'back_title_typography' => [
                    'type'     => 'typography',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'depends' => [
                        ['back_add_title', '=', 1],
                    ],
                ],

                'back_title_text_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['back_add_title', '=', 1],
                    ],
                ],

                'back_title_ends' => [
                    'type'     => 'separator',
                ],

                // paragraph
                'back_add_paragraph' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_PRO_PARAGRAPH'),
                    'std' => 0,
                ],

                'back_paragraph' => [
                    'type'  => 'textarea',
                    'title' => '',
                    'depends' => [
                        ['back_add_paragraph', '=', 1],
                    ],
                ],

                'back_paragraph_typography' => [
                    'type'     => 'typography',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'depends' => [
                        ['back_add_paragraph', '=', 1],
                    ],
                ],

                'back_paragraph_text_color' => [
                    'type'     => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['back_add_paragraph', '=', 1],
                    ],
                ],

                'back_paragraph_ends' => [
                    'type'     => 'separator',
                ],

                // icon
                'back_add_icon' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                    'std' => 0,
                ],

                'back_icon' => [
                    'type'      => 'icon',
                    'title'     => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_PRO_ICON_NAME'),
                    'std'       => 'fas fa-cogs',
                    'depends' => [
                        ['back_add_icon', '=', 1],
                    ],
                ],

                'back_icon_size' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_SIZE'),
                    'std'        => ['xl' => 36],
                    'max'        => 400,
                    'responsive' => true,
                    'depends' => [
                        ['back_add_icon', '=', 1],
                    ],
                ],

                'back_global_background_type' => [
                    'type'   => 'buttons',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NONE'), 'value' => 'none'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'), 'value' => 'color'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'), 'value' => 'gradient'],
                    ],
                    'std' => 'none',
                    'depends' => [
                        ['back_add_icon', '=', 1],
                    ],
                ],

                'back_flip_box_icon_color' => [
                    'type'   => 'color',
                    'title'  => 'Icon Color',
                    'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR_DESC'),
                    'depends' => [
                        ['back_global_background_type', '!=', 'none'],
                        ['back_global_background_type', '!=', 'gradient'],
                        ['back_add_icon', '=', 1],
                    ],
                ],

                'back_flip_box_icon_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                    'std' => [
                        "color" => "#00c6fb",
                        "color2" => "#005bea",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['back_global_background_type', '=', 'gradient'],
                        ['back_add_icon', '=', 1],
                    ],
                ],

                'back_flip_box__margin' => [
                    'type' => 'margin',
                    'title' => 'Margin',
                    'responsive' => true,
                    'std' => '',
                    'depends' => [
                        ['back_add_icon', '=', 1],
                    ],
                ],

                'back_flip_box__padding' => [
                    'type' => 'padding',
                    'title' => 'Padding',
                    'responsive' => true,
                    'std' => '',
                    'depends' => [
                        ['back_add_icon', '=', 1],
                    ],
                ],

                // Button
                'back_add_button_starts' => [
                    'type'     => 'separator',
                ],

                'back_add_button' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
                    'std' => 0,
                ],

                'back_button_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
                    'std'  => 'Button',
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                ],

                'back_flip_box_button_link' => [
                    'type' => 'link',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                    'desc' => 'Link',
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                ],

                'back_flip_box_button_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'depends' => [
                        ['front_add_button', '=', 1],
                    ],
                ],

                'back_button_type' => [
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
                        'custom'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                    'std'    => 'custom',
                ],

                'back_appearance' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
                    'values' => [
                        ''         => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
                        'outline'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
                    ],
                    'std'     => '',
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '!=', 'link'],
                    ],
                ],

                'back_shape' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
                    'values' => [
                        'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
                        'square'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
                        'round'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
                    ],
                    'std'   => 'rounded',
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '!=', 'link'],
                    ],
                ],

                'back_button_size' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
                    'values' => [
                        ''       => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
                        'lg'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
                        'xlg'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
                        'sm'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
                        'xs'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
                        'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                ],

                'back_button_padding' => [
                    'type'    => 'padding',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_size', '=', 'custom'],
                    ],
                    'responsive' => true,
                ],

                'back_flip_box_button_icon_start' => [
                    'type' => 'separator',
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                ],

                'back_flip_box_icon' => [
                    'type'  => 'icon',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                ],

                'back_flip_box_button_icon_position' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                    'values' => [
                        'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'std' => 'left',
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                ],

                'back_flip_box_button_icon_end' => [
                    'type' => 'separator',
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                ],

                'back_block' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
                    'values' => [
                        ''               => Text::_('JNO'),
                        'sppb-btn-block' => Text::_('JYES'),
                    ],
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '!=', 'link'],
                    ],
                ],

                'back_button_margin' => [
                    'type'    => 'margin',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
                    'depends' => [
                        ['back_add_button', '=', 1],
                    ],
                    'responsive' => true,
                ],

                'back_button_color_option_starts' => [
                    'type' => 'separator',
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                    ],
                ],

                'back_button_color_option' => [
                    'type' => 'buttons',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
                    ],
                    'std' => 'normal',
                    'tabs' => true,
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                    ],
                ],

                'back_flip_box_button_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                        ['back_appearance', '!=', 'gradient'],
                        ['back_button_color_option', '!=', 'hover'],
                    ],
                ],

                'back_flip_box_button_color_hover' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                        ['back_appearance', '!=', 'gradient'],
                        ['back_button_color_option', '=', 'hover'],
                    ],
                ],

                'back_flip_box_button_bg_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'     => '#3366FF',
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                        ['back_appearance', '!=', 'gradient'],
                        ['back_button_color_option', '!=', 'hover'],
                    ],
                ],

                'back_flip_box_button_bg_color_hover' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'     => '#0037DD',
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                        ['back_appearance', '!=', 'gradient'],
                        ['back_button_color_option', '=', 'hover'],
                    ],
                ],

                'back_flip_box_button_bg_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => [
                        "color"  => "#3366FF",
                        "color2" => "#0037DD",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                        ['back_appearance', '=', 'gradient'],
                        ['back_button_color_option', '!=', 'hover'],
                    ],
                ],

                'back_flip_box_button_gradient_bg_hover' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => [
                        "color"  => "#0037DD",
                        "color2" => "#3366FF",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['back_add_button', '=', 1],
                        ['back_button_type', '=', 'custom'],
                        ['back_appearance', '=', 'gradient'],
                        ['back_button_color_option', '=', 'hover'],
                    ],
                ],
            ],
        ],

        'flip_box_options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
            'fields' => [
                'flip_box_options_tabs' => [
                    'type' => 'buttons',
                    'std' => 'front',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                    'values' => [
                        ['label' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_FRONT'), 'value' => 'front'],
                        ['label' => Text::_('COM_SPPAGEBUILDER_ADDON_FLIP_BOX_BACK'), 'value' => 'back'],
                    ],
                    'tabs' => true,
                ],

                'front_bg_type' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPE'),
                    'std' => 'image',
                    'values' => [
                        'color' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'image' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                    ],
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'front'],
                    ],
                ],

                'front_bg_inner_type' => [
                    'type' => 'select',
                    'std' => 'none',
                    'values' => [
                        'none' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NONE'),
                        'color' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'),
                    ],
                    'depends' => [
                        ['front_bg_type', '=', 'color'],
                    ],
                ],

                'front_bg_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'front'],
                        ['front_bg_type', '=', 'color'],
                        ['front_bg_inner_type', '=', 'color'],
                    ],
                ],

                'front_bg_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std' => [
                        "color" => "#00c6fb",
                        "color2" => "#005bea",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'front'],
                        ['front_bg_type', '=', 'color'],
                        ['front_bg_inner_type', '=', 'gradient'],
                    ],
                ],

                'front_bgimg' => [
                    'type' => 'media',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                    'std' => ['src' => 'https://sppagebuilder.com/addons/flipbox/flipbox-bg-1.jpg'],
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'front'],
                    ],
                ],

                'front_flip_box_radius_separator' => [
                    'type' => 'separator',
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'front'],
                    ],
                ],

                'front_flip_box_radius' => [
                    'type' => 'advancedslider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RADIUS'),
                    'std' => 0,
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'front'],
                    ],
                ],

                // Back
                'back_bg_type' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPE'),
                    'std' => 'image',
                    'values' => [
                        'color' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'image' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                    ],
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'back'],
                    ],
                ],

                'back_bg_inner_type' => [
                    'type' => 'select',
                    'std' => 'none',
                    'values' => [
                        'none' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NONE'),
                        'color' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'),
                    ],
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'back'],
                        ['back_bg_type', '=', 'color'],
                    ],
                ],

                'back_bg_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'back'],
                        ['back_bg_type', '=', 'color'],
                        ['back_bg_inner_type', '=', 'color'],
                    ],
                ],
                'back_bg_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
                    'std' => [
                        "color" => "#00c6fb",
                        "color2" => "#005bea",
                        "deg" => "45",
                        "type" => "linear"
                    ],
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'back'],
                        ['back_bg_type', '=', 'color'],
                        ['back_bg_inner_type', '=', 'gradient'],
                    ],
                ],

                'back_bgimg' => [
                    'type' => 'media',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                    'std' => ['src' => 'https://sppagebuilder.com/addons/flipbox/flipbox-bg-1.jpg'],
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'back'],
                        ['back_bg_type', '=', 'image'],
                    ],
                ],

                'back_flip_box_radius_separator' => [
                    'type' => 'separator',
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'back'],
                    ],
                ],

                'back_flip_box_radius' => [
                    'type' => 'advancedslider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RADIUS'),
                    'std' => 0,
                    'depends' => [
                        ['flip_box_options_tabs', '=', 'back']
                    ],
                ],
            ],
        ],
    ],
]);
