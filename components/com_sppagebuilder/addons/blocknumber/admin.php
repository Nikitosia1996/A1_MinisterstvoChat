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
	'addon_name' => 'blocknumber',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_BLOCKNUMBER'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_BLOCKNUMBER_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M32 4a1 1 0 01-1 1H12a1 1 0 110-2h19a1 1 0 011 1zM32 22.892a1 1 0 01-1 1H12a1 1 0 110-2h19a1 1 0 011 1zM23 9a1 1 0 01-1 1H12a1 1 0 110-2h10a1 1 0 011 1zM23 27.892a1 1 0 01-1 1H12a1 1 0 110-2h10a1 1 0 011 1z" fill="currentColor"/><path d="M3.485 12.108V4.652l-1.68.702L1 3.482l2.939-1.374h1.74v10H3.484zM4.086 28.171h3.671V30H1.13v-1.886l1.585-1.557c.21-.2.42-.405.629-.614.2-.21.386-.4.557-.572l.471-.471c.143-.143.248-.252.315-.329.276-.304.471-.571.585-.8A1.76 1.76 0 005.443 23a.91.91 0 00-.314-.7c-.2-.2-.481-.3-.843-.3s-.653.105-.872.314c-.21.2-.366.467-.471.8L1 22.314c.086-.295.219-.58.4-.857.181-.276.41-.519.686-.728.276-.22.6-.396.971-.529.381-.133.8-.2 1.257-.2.515 0 .976.076 1.386.229.41.142.752.342 1.029.6.285.257.504.561.657.914.152.352.228.733.228 1.143 0 .59-.138 1.138-.414 1.643-.267.495-.643.985-1.129 1.471l-2.057 2.029.072.142z" fill="currentColor"/></svg>',
	'settings' => [
		'heading' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_BLOCKNUMBER_HEADING'),
			'fields' => [
				'heading' => [
					'type'    => 'textarea',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_BLOCKNUMBER_HEADING'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_BLOCKNUMBER_HEADING_DESC'),
					'std'     => 'Block Number',
				],

				'heading_typography' => [
					'type'     => 'typography',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'heading_font_family',
						'size' => 'heading_fontsize',
						'line_height' => 'heading_lineheight',
						'letter_spacing' => 'heading_letterspace',
						'uppercase' => 'heading_font_style.uppercase',
						'italic' => 'heading_font_style.italic',
						'underline' => 'heading_font_style.underline',
						'weight' => 'heading_font_style.weight',
					],
				],

				'heading_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'heading_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'responsive' => true,
				],
			],
		],

		'number' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NUMBER'),
			'fields' => [
				'number' => [
					'type'    => 'number',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_NUMBER'),
					'std'     => '01',
				],

				'size' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_SIZE'),
					'std'        => ['xl' => 48],
					'max'        => '400',
					'responsive' => true,
				],

				'label_border' => [
					'type'	=> 'header',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER'),
					'group' => [
						'number_border_width',
						'number_border_style',
						'border_radius',
					]
				],

				'number_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
				],

				'number_border_style' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
					'values' => [
						'solid'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_SOLID'),
						'dashed' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DASHED'),
						'dotted' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DOTTED'),
						'double' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DOUBLE'),
						'groove' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_GROOVE'),
						'ridge'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_RIDGE'),
						'inset'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_INSET'),
						'outset' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_OUTSET'),
					],
					'std'     => 'solid',
					'inline' => true,
				],

				'border_radius' => [
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_RADIUS'),
					'std'         => 100,
					'placeholder' => '5',
					'max'         => '200',
				],

				'number_typography' => [
					'type'     => 'typography',
					'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'number_font_family',
						'size' => 'number_font_size',
						'uppercase' => 'number_font_style.uppercase',
						'italic' => 'number_font_style.italic',
						'underline' => 'number_font_style.underline',
						'weight' => 'number_font_style.weight',
					],
				],

				'color' => [
					'type'   => 'color',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
					'std'    => '#FFFFFF',
				],

				'background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
					'std'     => '#1D9C61',
				],

				'number_border_color' => [
					'type'   => 'color',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
				],

				'number_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'responsive' => true,
				],
			]
		],

		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'text' => [
					'type'    => 'editor',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_BLOCKNUMBER_TEXT'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_BLOCKNUMBER_TEXT_DESC'),
					'std'     => 'Lorem ipsum dolor sit amet consectetuer rutrum dignissim et neque id.',
				],

				'text_typography' => [
					'type'     => 'typography',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'text_font_family',
						'size' => 'text_fontsize',
						'line_height' => 'text_lineheight',
						'letter_spacing' => 'text_letterspace',
						'uppercase' => 'text_font_style.uppercase',
						'italic' => 'text_font_style.italic',
						'underline' => 'text_font_style.underline',
						'weight' => 'text_font_style.weight',
					],
				],

				'text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'alignment' => [
					'type' => 'radio',
					'style_property' => true,
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
					'values' => [
						'left'	 => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'right'	 => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
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
					'std'   => 'h3',
				],

				'title_typography' => [
					'type'     => 'typography',
					'title'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
					'max'         => 400,
					'responsive'  => true
				],

				'title_margin_bottom' => [
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
					'placeholder' => '10',
					'max'         => 400,
					'responsive'  => true
				],
			],
		],
	],
]);
