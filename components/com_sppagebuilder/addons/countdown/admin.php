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
	'addon_name' => 'countdown',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M16.853 4.627V2.285h1.142a1.142 1.142 0 100-2.285h-4.57a1.143 1.143 0 000 2.285h1.143v2.342a13.596 13.596 0 00-7.7 3.199l-.972-.971.343-.331A1.147 1.147 0 004.617 4.9L2.332 7.186A1.147 1.147 0 003.954 8.81l.332-.343.97.97a13.71 13.71 0 1011.597-4.809zM15.71 29.704a11.424 11.424 0 110-22.848 11.424 11.424 0 010 22.848z" fill="currentColor"/><path opacity=".5" d="M24.998 17.98c0-4.299-3.113-7.897-7.299-8.775-1.08-.227-1.986.69-1.986 1.795v5.575a2 2 0 01-1.323 1.882l-5.478 1.97c-1.051.379-1.605 1.564-.982 2.49 2.309 3.438 6.864 4.996 10.995 3.536 3.697-1.313 6.16-4.702 6.073-8.472z" fill="currentColor"/></svg>',
	'settings' => [
		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'date' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_DATE'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_DATE_DESC'),
					'placeholder' => '2030/06/12',
					'std'         => '2030/06/12',
				],

				'time' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_TIME'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_TIME_DESC'),
					'placeholder' => '20:23',
					'std'         => '20:23',
				],

				'finish_text' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_FINISHED_TEXT'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_FINISHED_TEXT_DESC'),
					'std'         => 'Finally we are here',
				],

				'counter_text_typography' => [
					'type'     => 'typography',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_NUMBERS'),
					'fallbacks'   => [
						'font' => 'counter_text_font_family',
						'size' => 'counter_font_size',
						'weight' => 'counter_text_font_weight',
					],
				],

				'label_typography_separator' => [
					'type' => 'separator',
				],

				'label_typography' => [
					'type'     => 'typography',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_LABELS'),
					'fallbacks'   => [
						'font' => 'label_font_family',
						'size' => 'label_font_size',
						'uppercase' => 'label_font_style.uppercase',
						'italic' => 'label_font_style.italic',
						'underline' => 'label_font_style.underline',
						'weight' => 'label_font_style.weight',
					],
				],

				'label_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_COUNTER_LABEL_MARGIN'),
					'responsive' => true,
				],
			],
		],

		'counter' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_COUNTER'),
			'fields' => [
				'counter_width' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'max'        => 500,
					'responsive' => true,
					'std'        => ['xl' => 80],
				],

				'counter_height' => [
					'type'        => 'slider',
					'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'placeholder' => '',
					'max'         => 500,
					'responsive'  => true,
					'std'         => ['xl' => 80],
				],

				'counter_text_color' => [
					'type'   => 'color',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_NUMBER_COLOR'),
					'std'    => '#FFFFFF',
				],

				'counter_background_color' => [
					'type'   => 'color',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std'    => '#3366FF',
				],

				'label_color' => [
					'type'   => 'color',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_COUTNDOWN_LABEL_COLOR'),
				],

				'counter_border_separator' => [
					'type' => 'separator',
				],

				'counter_user_border' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER'),
					'std'   => 0,
					'group' => [
						'counter_border_width',
						'counter_border_style',
						'counter_border_color'
					],
				],

				'counter_border_width' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'std'        => ['xl' => 1],
					'max'        => 500,
					'responsive' => true,
					'depends'    => ['counter_user_border' => 1],
				],

				'counter_border_style' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
					'values' => [
						'none'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_NONE'),
						'solid'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_SOLID'),
						'double' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DOUBLE'),
						'dotted' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DOTTED'),
						'dashed' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_STYLE_DASHED'),
					],
					'std'     => 'solid',
					'inline'  => true,
					'depends' => ['counter_user_border' => 1],
				],

				'counter_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std'     => '#E5E5E5',
					'depends' => ['counter_user_border' => 1],
				],

				'counter_border_radius_separator' => [
					'type' => 'separator',
				],

				'counter_border_radius' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'std'        => ['xl' => 4],
					'max'        => 500,
					'responsive' => true,
				],
			],
		],

		'title' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
			'fields' => [
				'title' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
				],

				'heading_selector' => [
					'type'   => 'headings',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
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
					'title'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'title_margin_top' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
					'max'        => 500,
					'responsive' => true,
				],

				'title_margin_bottom' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
					'max'        => 500,
					'responsive' => true,
				],
			],
		],
	],
]);