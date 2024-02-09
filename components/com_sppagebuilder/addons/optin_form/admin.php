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
	'addon_name' => 'optin_form',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_FORM'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_FORM_DESC'),
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M31.85 10.974L27.216 7.7V2.919A1.03 1.03 0 0026.333 2H6.032a1.03 1.03 0 00-.883.92v4.744l-4.818 3.31a.81.81 0 00-.331.588v17.47c.063.48.44.857.92.92h30.525c.405 0 .552-.479.552-.92v-17.47c0-.22.037-.441-.147-.588zm-4.634-1.508l3.163 2.17-3.163 2.39v-4.56zM6.62 3.47h19.125v11.696l-9.563 7.208-9.562-7.208V3.47zM5.15 9.43v4.634l-3.163-2.427 3.163-2.207zm-3.678 3.715L11.77 20.94 1.471 27.89V13.145zM3.237 28.48l9.783-6.583 2.61 1.986a.883.883 0 00.516.184c.147 0 .22-.074.367-.184l2.722-2.096 9.893 6.693H3.237zm27.289-.846l-10.077-6.767 10.077-7.723v14.49z" fill="currentColor"/><g opacity=".5" fill="currentColor"><path d="M10.298 8.252h3.31a.736.736 0 100-1.47h-3.31a.736.736 0 000 1.47zM10.298 11.562h11.769a.736.736 0 000-1.47h-11.77a.736.736 0 100 1.47zM22.802 14.137a.736.736 0 00-.735-.736h-11.77a.736.736 0 000 1.471h11.77c.406 0 .735-.329.735-.735z"/></g></svg>',
	'settings' => [
		'general' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GENERAL'),
			'fields' => [
				'platform' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_DESC'),
					'values' => [
						'mailchimp'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_MAILCHIMP'),
						'sendgrid'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_SENDGRID'),
						'sendinblue' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_SENDINBLUE'),
						'madmimi'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_MADMIMI'),
						'acymailing' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_ACYMAILING'),
					],
					'std' => 'mailchimp',
					'inline' => true,
				],

				'hide_name' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_HIDE_NAME_FIELD'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_HIDE_NAME_FIELD_DESC'),
					'values' => [
						0 => Text::_('JNO'),
						1 => Text::_('JYES'),
					],
					'std' => 0,
				],

				'add_sendgrid_list_ids' => [
					'type' 	 => 'select',
					'title'	 => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_ADD_SENDGRID_LIST_IDS'),
					'desc' 	 => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_ADD_SENDGRID_LIST_IDS_DESC'),
					'values' => [
						0 => Text::_('JNO'),
						1 => Text::_('JYES')
					],
					'std' 	  => 0,
					'depends' => ['platform' => 'sendgrid']
				],

				'acymailing_listids' => [
					'type'     => 'select',
					'title'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_ACYMAILING_LIST_ID'),
					'desc'     => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_ACYMAILING_LIST_ID_DESC'),
					'multiple' => true,
					'std'      => '',
					'values'   => SpPgaeBuilderBase::acymailingList(),
					'depends'  => ['platform' => 'acymailing']
				],

				'mailchimp_api' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_API_KEY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_API_KEY_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'mailchimp']
				],

				'mailchimp_listid' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_LISTID'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_LISTID_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'mailchimp']
				],

				'mailchimp_action' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_ACTION'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_ACTION_DESC'),
					'values' => [
						'subscribed' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_ACTION_SUBSCRIBED'),
						'pending'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MAILCHIMP_ACTION_PENDING'),
					],
					'std'     => 'subscribed',
					'depends' => ['platform' => 'mailchimp']
				],

				'sendgrid_api' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDGRID_API_KEY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDGRID_API_KEY_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'sendgrid']
				],

				'sendgrid_list_ids' => [
					'type'   => 'text',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDGRID_LIST_IDS'),
					'desc' 	 => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDGRID_LIST_IDS_DESC'),
					'std' 	 => '',
					'depends' =>  [['platform', '=', 'sendgrid'], ['add_sendgrid_list_ids', '=', 1]]
				],

				'sendinblue_api' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDINBLUE_API_KEY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDINBLUE_API_KEY_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'sendinblue']
				],

				'sendinblue_listid' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDINBLUE_LISTID'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_SENDINBLUE_LISTID_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'sendinblue']
				],

				'madmimi_user' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MADMIMI_USERNAME'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MADMIMI_USERNAME_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'madmimi']
				],

				'madmimi_api' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MADMIMI_API_KEY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MADMIMI_API_KEY_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'madmimi']
				],

				'madmimi_listname' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MADMINI_LISTNAME'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MADMINI_LISTNAME_DESC'),
					'std'     => '',
					'depends' => ['platform' => 'madmimi']
				],

				'alignment_separator' => [
					'type' => 'separator',
				],

				'alignment' => [
					'type'              => 'alignment',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
					'responsive'        => true,
					'available_options' => ['left', 'center', 'right'],
				],
			],
		],

		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'content' => [
					'type'  => 'editor',
					'std'   => 'Lorem Ipsum has been the industry standard dummy text ever since the when an unknown printer.'
				],

				'media_type' => [
					'type'   => 'radio',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPE'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_CHOOSE_TYPE_DESC'),
					'values' => [
						'img'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
						'icon' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
					],
					'std'	=> 'img',
					'inline' => true,
				],

				'image' => [
					'type'       => 'media',
					'depends'    => [['media_type', '!=', 'icon']],
					'show_input' => true,
				],

				'alt_text' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALT_TEXT'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALT_TEXT_DESC'),
					'depends'    => [['media_type', '!=', 'icon']],
				],

				'icon_name' => [
					'type'    => 'icon',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_NAME'),
					'depends' => [['media_type', '=', 'icon']]
				],

				'icon_size' => [
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_SIZE'),
					'std'         => ['xl' => 82, 'lg' => 82, 'md' => 82, 'sm' => 82, 'xs' => 82],
					'depends'     => [['media_type', '=', 'icon']]
				],

				'icon_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['media_type', '=', 'icon']]
				],

				'media_position' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_MEDIA_POSITION_DESC'),
					'values' => [
						'top'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_TOP'),
						'right'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
						'bottom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOTTOM'),
						'left'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
					],
					'inline'	=> true,
				],
			],
		],

		'custom_input' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_CUSTOM_INPUT_FIELD'),
			'fields' => [
				'custom_input' => [
					'type' => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_CUSTOM_INPUT_FIELD'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_CUSTOM_INPUT_FIELD_DESC'),
					'std' => 0,
					'is_header' => 1,
				],

				'custom_input_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_bgcolor' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_border_separator' => [
					'type' => 'separator',
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_border' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_border_style' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE'),
					'values' => [
						''       => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_NONE'),
						'solid'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_SOLID'),
						'double' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DOUBLE'),
						'dotted' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DOTTED'),
						'dashed' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DASHED'),
					],
					'std'     => 'solid',
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_border_side' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_POSITION'),
					'values' => [
						''        => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_POSITION_FULL'),
						'top-'    => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_POSITION_TOP'),
						'right-'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
						'bottom-' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOTTOM'),
						'left-'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
					],
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_bdr' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_padding_separator' => [
					'type' => 'separator',
					'depends' => [['custom_input', '=', 1]],
				],

				'custom_input_padding' => [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'responsive' => true,
					'depends' => [['custom_input', '=', 1]],
				],
			],
		],

		'recaptcha' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_SHOW_RECAPTCHA'),
			'fields' => [
				'recaptcha' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_SHOW_RECAPTCHA'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_SHOW_RECAPTCHA_DESC'),
					'std'   => 0,
					'is_header' => 1,
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
                    'std'     => 'gcaptcha',
                    'depends' => [['recaptcha', '=', 1]],
                ],

				'captcha_question' => [
                    'type'    => 'text',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_QUESTION'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_QUESTION_DESC'),
                    'std'     => '3 + 4 = ?',
                    'depends' => [
                        ['recaptcha', '=', '1'],
                        ['captcha_type', '=', 'default'],
                    ],
                ],

                'captcha_answer' => [
                    'type'    => 'text',
                    'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_ANSWER'),
                    'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_ANSWER_DESC'),
                    'std'     => '7',
                    'depends' => [
                        ['recaptcha', '=', '1'],
                        ['captcha_type', '=', 'default'],
                    ],
                ],
			],
		],

		'checkbox' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_SHOW_CHECKBOX'),
			'fields' => [
				'show_checkbox' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_SHOW_CHECKBOX'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_SHOW_CHECKBOX_DESC'),
					'std'   => 1,
					'is_header' => 1,
				],

				'checkbox_title' => [
					'type'    => 'textarea',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CHECKBOX_TITLE'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CHECKBOX_TITLE_DESC'),
					'std'     => 'I agree with the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and I declare that I have read the information that is required in accordance with <a href="http://eur-lex.europa.eu/legal-content/EN/TXT/?uri=uriserv:OJ.L_.2016.119.01.0001.01.ENG&amp;toc=OJ:L:2016:119:TOC" target="_blank">Article 13 of GDPR.</a>',
					'depends' => [['show_checkbox', '=', 1]],
				],
			],
		],

		'button' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
			'fields' => [
				'button_text' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
					'std' => 'Submit',
				],

				'button_url' => [
					'type'  => 'link',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_URL'),
				],

				'button_typography' => [
					'type'     => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font' => 'button_font_family',
						'letter_spacing' => 'button_letterspace',
						'weight' => 'button_fontstyle.weight',
						'italic' => 'button_fontstyle.italic',
						'underline' => 'button_fontstyle.underline',
						'uppercase' => 'button_fontstyle.uppercase',
					],
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
					'std'   => 'custom',
					'inline' => true,
				],

				'link_button_padding_bottom' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_PADDING_BOTTOM'),
					'max'     => 100,
					'std'     => '',
					'depends' => [['button_type', '=', 'link']]
				],

				'button_appearance' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
					'values' => [
						''         => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
						'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
						'outline'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
					],
					'depends' => [['type', '!=', 'link']]
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
					'std'   => 'rounded',
					'depends' => [['button_type', '!=', 'link']]
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
						'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
					],
				],

				'button_padding' => [
					'type'    => 'padding',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'responsive' => true,
					'depends' => [['button_size', '=', 'custom']]
				],

				'button_block' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
					'values' => [
						''               => Text::_('JNO'),
						'sppb-btn-block' => Text::_('JYES'),
					],
					'std'     => '',
					'depends' => [['button_type', '!=', 'link']]
				],

				'button_icon_separator' => [
					'type'   => 'separator',
				],

				'button_icon' => [
					'type'  => 'icon',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
				],

				'button_icon_position' => [
					'type'   => 'radio',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
					'values' => [
						'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					],
					'std' => 'left',
				],

				'button_margin_separator' => [
					'type'   => 'separator',
				],

				'button_margin_top' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
					'std'        => ['xl' => 20],
					'responsive' => true,
					'max'        => 400,
				],

				'button_style_tab_separator' => [
					'type' => 'separator',
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
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std'     => '#3366FF',
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
						"color"  => "#3366FF",
						"color2" => "#0037DD",
						"deg" => "45",
						"type" => "linear"
					],
					'depends' => [
						['button_style_tab', '=', 'normal'],
						['button_type', '=', 'custom'],
						['button_appearance', '=', 'gradient'],
					],
				],

				'button_color_hover' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std' => '#FFFFFF',
					'depends' => [
						['button_style_tab', '=', 'hover'],
						['button_type', '=', 'custom'],
					],
				],

				'button_background_color_hover' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std'     => '#0037DD',
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
						"color"  => "#0037DD",
						"color2" => "#3366FF",
						"deg" => "45",
						"type" => "linear"
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
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [
						['link_button_color_tab', '=', 'normal'],
						['button_type', '=', 'link'],
					],
				],

				'link_button_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'max'     => 30,
					'depends' => [
						['link_button_color_tab', '=', 'normal'],
						['button_type', '=', 'link'],
					],
				],

				'link_button_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'std'     => '',
					'depends' => [
						['link_button_color_tab', '=', 'normal'],
						['button_type', '=', 'link'],
					],
				],

				'link_button_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std'     => '',
					'depends' => [
						['link_button_color_tab', '=', 'hover'],
						['button_type', '=', 'link'],
					],
				],

				'link_button_border_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'std'     => '',
					'depends' => [
						['link_button_color_tab', '=', 'hover'],
						['button_type', '=', 'link'],
					],
				],

				'button_position_separator' => [
					'type' => 'separator',
				],

				'button_position' => [
					'type'	=> 'alignment',
					'title'	=> Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
				],
			],
		],

		'options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
			'fields' => [
				'grid' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_DESC'),
					'values' => [
						''         => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_FULL'),
						'6-6'      => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_6_6'),
						'5-7'      => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_5_7'),
						'8-4'      => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_8_4'),
						'2-10'     => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_2_10'),
						'ws-4-4-4' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_WIDESPACE_4_4_4'),
						'ws-2-8-2' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_WIDESPACE_2_8_2'),
						'ws-3-6-3' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_GRID_WIDESPACE_3_6_3'),
					],
				],

				'form_inline' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_FORM_INLINE'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_FORM_INLINE_DESC'),
					'std'   => 0,
				],

				'submit_btn_inside' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_INSIDE_SUBMIT'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_INSIDE_SUBMIT_DESC'),
					'std'   => 0,
				],

				'optin_type' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TYPE'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TYPE_DESC'),
					'values' => [
						'normal' => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TYPE_NORMAL'),
						'popup'  => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TYPE_POPUP'),
					],
					'std' => 'normal',
				],

				'optin_timein' => [
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TIMEIN'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TIMEIN_DESC'),
					'std'         => 2000,
					'max'		  => 5000,
					'inline' 	  => true,
					'depends'     => [['optin_type', '=', 'popup']],
				],

				'optin_timeout' => [
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TIMEOUT'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_TIMEOUT_DESC'),
					'std'         => 10000,
					'max'		  => 10000,
					'inline' 	  => true,
					'depends'     => [['optin_type', '=', 'popup']],
				],

				'optin_width' => [
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_WIDTH'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_WIDTH_DESC'),
					'std'         => 600,
					'max'		  => 1000,
					'inline' 	  => true,
					'depends'     => [['optin_type', '=', 'popup']],
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
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'title_margin_separator' => [
					'type' => 'separator',
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
