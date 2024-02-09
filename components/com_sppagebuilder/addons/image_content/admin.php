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
	'addon_name' => 'image_content',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CONTENT'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CONTENT_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.084 15.049l-3.24-3.24-4.65 4.648h25.611L19.24 6.892l-8.156 8.157zm8.253-8.254zm9.703 9.897zM11.084 12.22l6.84-6.84a1.862 1.862 0 012.633 0l9.898 9.898a1.862 1.862 0 01-1.317 3.18H2.862a1.862 1.862 0 01-1.317-3.18l4.982-4.981a1.862 1.862 0 012.633 0l1.924 1.923z" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M31 25a1 1 0 01-1 1H2a1 1 0 110-2h28a1 1 0 011 1zM19 30a1 1 0 01-1 1H2a1 1 0 110-2h16a1 1 0 011 1z" fill="currentColor"/><path d="M7.789 5.544a2.772 2.772 0 100-5.544 2.772 2.772 0 000 5.544z" fill="currentColor"/></svg>',
	'settings' => [
		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'text' => [
					'type' => 'editor',
					'std' => "The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not-quite-tuned-in radio station rises and for a while drowns out the patter. These are the sounds encountered by.<br /><br />NASA’s Cassini spacecraft as it dove through the gap between Saturn and its innermost ring on April 26, the first of 22 such encounters before it will plunge into Saturn’s atmosphere in September."
				],

				'text_typography' => [
					'type' => 'typography',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
				],

				'content_padding' => [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'std'        => [
						'xl' => '120px 0 120px 50px',
						'lg' => '80px 0 80px 40px',
						'md' => '80px 0 80px 40px',
						'sm' => '20px 0 40px 0px',
						'xs' => '20px 0 40px 0px'
					],
					'responsive' => true
				],

				'image_separator' => [
					'type' => 'separator',
				],

				'image' => [
					'type'  => 'media',
					'std'   => ['src' => 'https://sppagebuilder.com/addons/carousel/carousel-bg.jpg']
				],

				'image_alignment' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
					'values' => [
						'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					],
					'std' => 'left',
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
					'type'      => 'typography',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font'           => 'title_font_family',
						'size'           => 'title_fontsize',
						'line_height'    => 'title_lineheight',
						'letter_spacing' => 'title_letterspace',
						'uppercase'      => 'title_font_style.uppercase',
						'italic'         => 'title_font_style.italic',
						'underline'      => 'title_font_style.underline',
						'weight'         => 'title_font_style.weight',
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

		'button_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
			'fields' => [
				'button_text' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
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
						'size' => 'button_fontsize',
						'letter_spacing' => 'button_letterspace',
						'weight' => 'button_font_style.weight',
						'italic' => 'button_font_style.italic',
						'underline' => 'button_font_style.underline',
						'uppercase' => 'button_font_style.uppercase',
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
			],
		],
	],
]);
