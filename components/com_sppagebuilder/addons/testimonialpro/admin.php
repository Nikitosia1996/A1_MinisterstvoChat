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
	'type'       => 'repeatable',
	'addon_name' => 'testimonialpro',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_DESC'),
	'category'   => 'Slider',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M12 3.329c0 .507.412.92.92.92h1.039v.394c0 .704-.485 1.3-1.144 1.464-.197.049-.364.21-.364.412V7.65c0 .203.165.37.367.348a3.384 3.384 0 003.007-3.355V.92a.92.92 0 00-.92-.919H12.92A.92.92 0 0012 .92v2.409zM16.8 3.329c0 .507.412.92.92.92h1.039v.394c0 .704-.485 1.3-1.144 1.464-.197.049-.364.21-.364.412V7.65c0 .203.165.37.367.348a3.384 3.384 0 003.007-3.355V.92a.92.92 0 00-.92-.919H17.72a.92.92 0 00-.92.92v2.409z" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M2 13c0-.552.464-1 1.037-1h25.926c.573 0 1.037.448 1.037 1s-.464 1-1.037 1H3.037C2.464 14 2 13.552 2 13zM2 17c0-.552.464-1 1.037-1h25.926c.573 0 1.037.448 1.037 1s-.464 1-1.037 1H3.037C2.464 18 2 17.552 2 17zM10 21a1 1 0 011-1h10a1 1 0 110 2H11a1 1 0 01-1-1z" fill="currentColor"/><circle opacity=".5" cx="10.5" cy="30.5" r="1.5" fill="currentColor"/><circle opacity=".5" cx="22.5" cy="30.5" r="1.5" fill="currentColor"/><circle cx="16.5" cy="30.5" r="1.5" fill="currentColor"/></svg>',
	'settings' => [
		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'sp_testimonialpro_item' => [
					'type' => 'repeatable',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_TESTIMONIALS'),
					'attr' => [
						'title' => [
							'type' => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NAME'),
							'std' => 'John Doe',
						],

						'designation' => [
							'type' => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DESIGNATION'),
						],

						'url' => [
							'type' => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_URL'),
						],

						'avatar' => [
							'type' => 'media',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_AVATAR'),
						],

						'message' => [
							'type' => 'editor',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MESSAGE'),
							'std' => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.'
						],
					],
				],

				'content_alignment_separator' => [
					'type' => 'separator',
				],

				'content_alignment' => [
					'type' => 'alignment',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
					'responsive' => true,
					'available_options' => ['left', 'center', 'right'],
					'std' => [
						'xl' => 'center',
						'lg' => '',
						'md' => '',
						'sm' => '',
						'xs' => '',
					],
				],
			],
		],

		'name_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NAME'),
			'fields' => [
				'name_typography' => [
					'type'	=> 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font' => 'name_font_family',
						'size' => 'name_font_size',
						'line_height' => 'name_line_height',
						'letter_spacing' => 'name_letterspace',
						'weight' => 'name_font_style.weight',
						'uppercase' => 'name_font_style.uppercase',
						'italic' => 'name_font_style.italic',
						'underline' => 'name_font_style.underline',
					],
				],

				'name_color' => [
					'type'      => 'color',
					'title'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],
			],
		],

		'designation_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DESIGNATION'),
			'fields' => [
				'designation_typography' => [
					'type'	=> 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font' => 'designation_font_family',
						'size' => 'designation_font_size',
						'line_height' => 'designation_line_height',
						'letter_spacing' => 'designation_letterspace',
						'weight' => 'designation_font_style.weight',
						'uppercase' => 'designation_font_style.uppercase',
						'italic' => 'designation_font_style.italic',
						'underline' => 'designation_font_style.underline',
					],
				],

				'designation_color' => [
					'type'      => 'color',
					'title'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],
			],
		],

		'message_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MESSAGE'),
			'fields' => [
				'content_typography' => [
					'type'	=> 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font' => 'content_font_family',
						'size' => 'content_fontsize',
						'line_height' => 'content_lineheight',
						'letter_spacing' => 'content_letterspace',
						'weight' => 'content_fontstyle.weight',
						'uppercase' => 'content_fontstyle.uppercase',
						'italic' => 'content_fontstyle.italic',
						'underline' => 'content_fontstyle.underline',
					],
				],

				'content_color' => [
					'type'      => 'color',
					'title'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],
			],
		],

		'avatar' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_AVATAR'),
			'fields' => [
				'avatar_width' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'std'        => ['xl' => 32],
					'min'        => 16,
					'max'        => 128,
					'responsive' => true,
				],

				'avatar_shape' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_SHAPE'),
					'values' => [
						'sppb-avatar-sqaure' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SQUARE'),
						'sppb-avatar-round'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_ROUNDED'),
						'sppb-avatar-circle' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CIRCLE'),
					],
					'std' => 'sppb-avatar-circle'
				],

				'avatar_on_top' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_AVATAR_ON_TOP'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_AVATAR_ON_TOP_DESC'),
					'values' => [
						1 => Text::_('JYES'),
						0 => Text::_('JNO'),
					],
					'std' => 1,
				],
			],
		],

		'quote' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_QUOTE_ICON'),
			'fields' => [
				'show_quote' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_QUOTE_ICON'),
					'values' => [
						1 => Text::_('JYES'),
						0 => Text::_('JNO'),
					],
					'std' => 1,
					'is_header' => 1,
				],

				'icon_size' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_SIZE'),
					'std'        => ['xl' => 48],
					'min'        => 10,
					'max'        => 200,
					'responsive' => true,
					'depends'    => [['show_quote', '=', 1]],
				],

				'icon_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std'     => '#EDEEF2',
					'depends' => [['show_quote', '=', 1]],
				],
			],
		],

		'carousel_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
			'fields' => [
				'autoplay' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_AUTOPLAY'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_AUTOPLAY_DESC'),
					'values' => [
						1 => Text::_('JYES'),
						0 => Text::_('JNO'),
					],
					'std' => 1,
				],

				'interval' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_INTERVAL'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_INTERVAL_DESC'),
					'std'     => 5,
					'depends' => [['autoplay', '=', 1]]
				],

				'speed' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_SPEED'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_SPEED_DESC'),
					'std'   => 600,
				],

				'controls_separator' => [
					'type' => 'separator',
				],

				'controls' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS_DESC'),
					'values' => [
						1 => Text::_('JYES'),
						0 => Text::_('JNO'),
					],
					'std' => 1,
				],

				'bullet_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['controls', '=', 1]],
				],

				'bullet_active_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_ACTIVE'),
					'depends' => [['controls', '=', 1]],
				],

				'arrow_controls_separator' => [
					'type' => 'separator',
				],

				'arrow_controls' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_SHOW_ARROWS'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_SHOW_ARROWS_DESC'),
					'std'   => 0,
				],

				'arrow_icon' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_ARROWS_ICON'),
					'values' => [
						'angle'        => 'Angle',
						'angle_double' => 'Angle Double',
						'arrow'        => 'Arrow',
						'arrow_circle' => 'Arrow Circle',
						'long_arrow'   => 'Long Arrow',
						'chevron'      => 'Chevron',
					],
					'std'     => 'bottom-left',
					'inline'	=> true,
					'depends' => [['arrow_controls', '=', 1]],
				],

				'arrow_height' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'max'     => 200,
					'min'     => 10,
					'depends' => [['arrow_controls', '=', 1]],
				],

				'arrow_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'max'     => 200,
					'min'     => 10,
					'depends' => [['arrow_controls', '=', 1]],
				],

				'arrow_font_size' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
					'max'     => 100,
					'depends' => [['arrow_controls', '=', 1]],
				],

				'tab_arrows_separator' => [
					'type' => 'separator',
				],

				'tab_arrows' => [
					'type'   => 'buttons',
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover']
					],
					'std'    => 'normal',
				],

				'arrow_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std'     => '',
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'normal']]
				],

				'arrow_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'normal']]
				],

				'arrow_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'max'     => 20,
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'normal']],
				],

				'arrow_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'std'     => '',
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'normal']]
				],

				'arrow_border_radius' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'max'     => 100,
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'normal']],
				],

				'arrow_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'hover']]
				],

				'arrow_hover_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'hover']]
				],

				'arrow_hover_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['controls', '=', 1], ['tab_arrows', '=', 'hover']]
				],

				// @todo: arrow_margin is not working
				'arrow_margin_separator' => [
					'type' => 'separator',
					'depends' => [['arrow_controls', '=', 1]],
				],

				'arrow_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'std'        => ['xl' => '5px 5px 0px 5px', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true,
					'depends' => [['arrow_controls', '=', 1]],
				],
			],
		],
	],
]);
