<?php

/**
 * @package SP Page Builder
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
    'type'       => 'content',
    'addon_name' => 'ajax_contact',
    'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT'),
    'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_DESC'),
    'category'   => 'Content',
    'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M10 30V2h3a1 1 0 100-2H5a1 1 0 100 2h3v28H5a1 1 0 100 2h8a1 1 0 100-2h-3z" fill="currentColor"/><g opacity=".5" fill="currentColor"><path d="M5 4a1 1 0 110 2H2v20h3a1 1 0 110 2H2a2 2 0 01-2-2V6a2 2 0 012-2h3zM30 4a2 2 0 012 2v20a2 2 0 01-2 2H13a1 1 0 110-2h17V6H13a1 1 0 110-2h17z"/></g></svg>',
    'settings' => [
        'content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'fields' => [
                'recipient_email' => [
                    'type'  => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_RECIPIENT_EMAIL'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_RECIPIENT_EMAIL_DESC'),
                    'std'   => 'email@yourdomain.com',
                ],

                'from_name' => [
                    'type'  => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FORM_NAME'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FORM_NAME_DESC'),
                ],

                'from_email' => [
                    'type'  => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FORM_EMAIL'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FORM_EMAIL_DESC'),
                ],

                'show_phone' => [
                    'type'   => 'checkbox',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SHOW_PHONE_FIELD'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SHOW_PHONE_FIELD_DESC'),
                    'values' => [
                        '0' => 'No',
                        '1' => 'Yes'
                    ],
                    'std' => '0',
                ],
            ],
        ],

        'style' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_FIELD'),
            'fields' => [
                'field_bg_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR')
                ],

                'field_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR')
                ],

                'field_placeholder_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PLACEHOLDER_COLOR')
                ],

                'input_height' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
                    'max'        => 200,
                    'responsive' => true,
                    'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                ],

                'field_font_size' => [
                    'type'  => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
                    'max'   => 200,
                ],

                'field_border_separator' => [
                    'type'  => 'separator',
                ],

                'field_border_width' => [
                    'type'  => 'margin',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                ],

                'field_border_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                ],

                'field_border_radius' => [
                    'type'  => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                    'max'   => 200,
                ],

                'field_spacing_separator' => [
                    'type'  => 'separator',
                ],

                'field_margin' => [
                    'type'       => 'margin',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                    'responsive' => true,
                    'std'        => ['xl' => '0px 0px 15px 0px', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                ],

                'field_padding' => [
                    'type'  => 'padding',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                ],
            ],
        ],

        'textarea_options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXTAREA'),
            'fields' => [
                'textarea_height' => [
                    'type'       => 'slider',
                    'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
                    'max'        => 1000,
                    'responsive' => true,
                    'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                ],

                'field_hover_bg_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_HOVER')
                ],

                'field_hover_placeholder_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER')
                ],

                'field_focus_border_color' => [
                    'type'  => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR_FOCUS')
                ],
            ],
        ],

        'recaptcha_options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_SHOW_RECAPTCHA'),
            'fields' => [
                'formcaptcha' => [
                    'type'   => 'checkbox',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SHOW_CAPTCHA'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SHOW_CAPTCHA_DESC'),
                    'values' => [
                        '0' => 'No',
                        '1' => 'Yes'
                    ],
                    'std' => '1',
                    'is_header' => true,
                ],

                'captcha_type' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_CAPTCHA_TYPE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_CAPTCHA_TYPE_DESC'),
                    'values' => [
                        'default'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_CAPTCHA_TYPE_DEFAULT'),
                        'gcaptcha'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_CAPTCHA_TYPE_GCHAPTCHA'),
                        'igcaptcha' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CAPTCHA_TYPE_INVISIBLE_GCHAPTCHA'),
                    ],
                    'std'     => 'default',
                    'depends' => ['formcaptcha' => '1'],
                ],

                'captcha_question' => [
                    'type'    => 'text',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_QUESTION'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_QUESTION_DESC'),
                    'std'     => '3 + 4 = ?',
                    'depends' => [
                        ['formcaptcha', '=', '1'],
                        ['captcha_type', '=', 'default'],
                    ],
                ],

                'captcha_input_col' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_INPUT_COL_SIZE'),
                    'values' => [
                        '3'  => '3',
                        '4'  => '4',
                        '5'  => '5',
                        '6'  => '6',
                        '7'  => '7',
                        '8'  => '8',
                        '9'  => '9',
                        '12' => '12',
                    ],
                    'std'     => '12',
                    'depends' => [
                        ['formcaptcha', '=', '1'],
                        ['captcha_type', '=', 'default'],
                    ],
                ],

                'captcha_answer' => [
                    'type'    => 'text',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_ANSWER'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_ANSWER_DESC'),
                    'std'     => '7',
                    'depends' => [
                        ['formcaptcha', '=', '1'],
                        ['captcha_type', '=', 'default'],
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
                    'title'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
                        'font' => 'title_font_family',
                        'size' => 'title_fontsize',
                        'line_height' => 'title_lineheight',
                        'letter_spacing' => 'title_letterspace',
                        'weight' => 'title_font_style.weight',
                        'italic' => 'title_font_style.italic',
                        'underline' => 'title_font_style.underline',
                        'uppercase' => 'title_font_style.uppercase',
                    ],
                ],

                'title_text_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
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

        'layout' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LAYOUT'),
            'fields' => [
                'name_input_col' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME_INPUT_COL_SIZE'),
                    'values' => [
                        '3'  => '3',
                        '4'  => '4',
                        '5'  => '5',
                        '6'  => '6',
                        '7'  => '7',
                        '8'  => '8',
                        '9'  => '9',
                        '12' => '12',
                    ],
                    'std' => '12'
                ],

                'email_input_col' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL_INPUT_COL_SIZE'),
                    'values' => [
                        '3'  => '3',
                        '4'  => '4',
                        '5'  => '5',
                        '6'  => '6',
                        '7'  => '7',
                        '8'  => '8',
                        '9'  => '9',
                        '12' => '12',
                    ],
                    'std' => '12'
                ],

                'subject_input_col' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SUBJECT_INPUT_COL_SIZE'),
                    'values' => [
                        '3'  => '3',
                        '4'  => '4',
                        '5'  => '5',
                        '6'  => '6',
                        '7'  => '7',
                        '8'  => '8',
                        '9'  => '9',
                        '12' => '12',
                    ],
                    'std' => '12'
                ],

                'phone_input_col' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_PHONE_INPUT_COL_SIZE'),
                    'values' => [
                        '3'  => '3',
                        '4'  => '4',
                        '5'  => '5',
                        '6'  => '6',
                        '7'  => '7',
                        '8'  => '8',
                        '9'  => '9',
                        '12' => '12',
                    ],
                    'std'     => '12',
                    'depends' => ['show_phone' => '1']
                ],

                'message_input_col' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_MESSAGE_INPUT_COL_SIZE'),
                    'values' => [
                        '3'  => '3',
                        '4'  => '4',
                        '5'  => '5',
                        '6'  => '6',
                        '7'  => '7',
                        '8'  => '8',
                        '9'  => '9',
                        '12' => '12',
                    ],
                    'std' => '12'
                ],

                'show_label' => [
                    'type'  => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SHOW_LABEL'),
                    'std'   => 0,
                ],

                'show_checkbox' => [
                    'type'  => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SHOW_CHECKBOX'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SHOW_CHECKBOX_DESC'),
                    'std'   => 1,
                    'group' => [
                        'checkbox_title'
                    ]
                ],

                'checkbox_title' => [
                    'type'    => 'textarea',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CHECKBOX_TITLE'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CHECKBOX_TITLE_DESC'),
                    'std'     => 'I agree with the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and I declare that I have read the information that is required in accordance with <a href="http://eur-lex.europa.eu/legal-content/EN/TXT/?uri=uriserv:OJ.L_.2016.119.01.0001.01.ENG&amp;toc=OJ:L:2016:119:TOC" target="_blank">Article 13 of GDPR.</a>',
                    'depends' => ['show_checkbox' => 1]
                ],
            ],
        ],

        'custom_button_options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_USE_BUTTON'),
            'fields' => [
                'use_custom_button' => [
                    'type'   => 'checkbox',
                    'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_USE_BUTTON'),
                    'values' => [
                        '0' => 'No',
                        '1' => 'Yes'
                    ],
                    'std' => 0,
                    'is_header' => true,
                ],

                'button_text' => [
                    'type'    => 'text',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT_DESC'),
                    'std'     => 'Send Message',
                    'depends' => ['use_custom_button' => 1]
                ],

                'button_typography' => [
                    'type' => 'typography',
                    'fallbacks' => [
                        'font' => 'button_font_family',
                        'letter_spacing' => 'button_letterspace',
                        'weight' => 'button_font_style.weight',
                        'italic' => 'button_font_style.italic',
                        'underline' => 'button_font_style.underline',
                        'uppercase' => 'button_font_style.uppercase',
                    ],
                    'depends' => ['use_custom_button' => 1]
                ],

                'button_type' => [
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
                    'std'     => 'success',
                    'depends' => ['use_custom_button' => 1]
                ],

                'button_appearance' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
                    'values' => [
                        ''         => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
                        'outline'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE')
                    ],
                    'std'     => '',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '!=', 'link'],
                    ]
                ],

                'button_shape' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
                    'values' => [
                        'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
                        'square'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
                        'round'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
                    ],
                    'std'     => 'rounded',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '!=', 'link'],
                    ]
                ],

                'button_size' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
                    'values' => [
                        ''    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
                        'lg'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
                        'xlg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
                        'sm'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
                        'xs'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
                        'custom'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'depends' => ['use_custom_button' => 1]
                ],

                'button_padding' => [
                    'type'    => 'padding',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_size', '=', 'custom'],
                    ],
                    'responsive' => true
                ],

                'button_block' => [
                    'type'   => 'radio',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
                    'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK_DESC'),
                    'values' => [
                        ''               => Text::_('JNO'),
                        'sppb-btn-block' => Text::_('JYES'),
                    ],
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '!=', 'link'],
                    ]
                ],

                'button_style_separator' => [
                    'type'    => 'separator',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                    ]
                ],

                // Style
                'button_style_state' => [
                    'type'   => 'radio',
                    'values' => [
                        'normal' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'),
                        'hover' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'),
                    ],
                    'std' => 'normal',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                    ]
                ],

                'button_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'    => '#ffffff',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                        ['button_style_state', '!=', 'hover'],
                    ]
                ],

                'button_color_hover' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'    => '#ffffff',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                        ['button_style_state', '=', 'hover'],
                    ]
                ],

                'button_background_color' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'    => '#444444',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '!=', 'gradient'],
                        ['button_style_state', '!=', 'hover'],
                    ]
                ],

                'button_background_color_hover' => [
                    'type'   => 'color',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'    => '#222222',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '!=', 'gradient'],
                        ['button_style_state', '=', 'hover'],
                    ]
                ],

                // Gradient
                'button_background_gradient' => [
                    'type'   => 'gradient',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'   => [
                        "color"  => "#B4EC51",
                        "color2" => "#429321",
                        "deg"    => "45",
                        "type"   => "linear"
                    ],
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '=', 'gradient'],
                        ['button_style_state', '!=', 'hover'],
                    ]
                ],

                'button_background_gradient_hover' => [
                    'type'   => 'gradient',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                    'std'   => [
                        "color"  => "#429321",
                        "color2" => "#B4EC51",
                        "deg"    => "45",
                        "type"   => "linear"
                    ],
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'custom'],
                        ['button_appearance', '=', 'gradient'],
                        ['button_style_state', '=', 'hover'],
                    ]
                ],

                // Link style button
                'link_style_button_separator' => [
                    'type'    => 'separator',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                    ]
                ],

                'link_style_button_state' => [
                    'type'   => 'radio',
                    'values' => [
                        'normal' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'),
                        'hover' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'),
                    ],
                    'std' => 'normal',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                    ]
                ],

                'link_button_color' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'std'     => '',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                        ['link_style_button_state', '!=', 'hover'],
                    ]
                ],

                'link_button_border_width' => [
                    'type'    => 'slider',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                    'max'     => 30,
                    'std'     => '',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                        ['link_style_button_state', '!=', 'hover'],
                    ]
                ],

                'link_border_color' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                        ['link_style_button_state', '!=', 'hover'],
                    ]
                ],

                'link_button_hover_color' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER'),
                    'std'     => '',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                        ['link_style_button_state', '=', 'hover'],
                    ]
                ],

                'link_button_border_hover_color' => [
                    'type'    => 'color',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR_HOVER'),
                    'std'     => '',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                        ['link_style_button_state', '=', 'hover'],
                    ]
                ],

                'link_button_padding_bottom_separator' => [
                    'type'    => 'separator',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                    ]
                ],

                'link_button_padding_bottom' => [
                    'type'    => 'slider',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_PADDING_BOTTOM'),
                    'max'     => 100,
                    'std'     => '',
                    'depends' => [
                        ['use_custom_button', '=', 1],
                        ['button_type', '=', 'link'],
                    ]
                ],

                // Button Icon
                'button_icon_separator' => [
                    'type'    => 'separator',
                    'depends' => [['use_custom_button', '=', 1]]
                ],

                'button_icon' => [
                    'type'    => 'icon',
                    'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
                    'depends' => [['use_custom_button', '=', 1]]
                ],

                'button_icon_position' => [
                    'type'   => 'select',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
                    'values' => [
                        'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'std'    => 'left',
                    'depends' => [['use_custom_button', '=', 1]]
                ],

                'button_icon_margin' => [
                    'type'    => 'margin',
                    'title'   => Text::_('COM_SPPAGEBUILDER_TAB_ICON_MARGIN'),
                    'depends' => [['use_custom_button', '=', 1]]
                ],

                // Button Alignment
                'button_position_separator' => [
                    'type'    => 'separator',
                    'depends' => [['use_custom_button', '=', 1]]
                ],

                'button_position' => [
                    'type'   => 'alignment',
                    'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
                    'std' => ['xl' => 'left', 'lg' => 'left', 'md' => 'left', 'sm' => 'left', 'xs' => 'left'],
                ],
            ],
        ],
    ],
]);
