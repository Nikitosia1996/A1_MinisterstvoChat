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
	'addon_name' => 'raw_html',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_RAW_HTML'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_RAW_HTML_DESC'),
	'category'   => 'General',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M31.058 14.944l-6.57-5.946a1.686 1.686 0 10-2.258 2.503l5.572 5.016-5.572 5.017a1.686 1.686 0 102.259 2.503l6.569-5.946a2.16 2.16 0 000-3.19v.043zM.706 18.09l6.57 5.947a1.686 1.686 0 102.258-2.503l-5.572-5.017 5.572-5.016a1.686 1.686 0 10-2.259-2.503L.706 14.944a2.16 2.16 0 000 3.19v-.043z" fill="currentColor"/><path d="M19.028 1.031a1.549 1.549 0 00-1.175.234 1.604 1.604 0 00-.673 1.008l-5.426 26.844c-.082.414 0 .844.229 1.197.228.353.584.6.99.686h.314c.356 0 .701-.122.98-.348.278-.226.473-.54.553-.894l5.427-26.844a1.627 1.627 0 00-.23-1.197 1.572 1.572 0 00-.99-.686z" fill="currentColor"/></svg>',
	'settings' => [
		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'html' => [
					'type'   => 'codeeditor',
					'syntax' => 'htmlmixed',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_RAW_HTML_HTML'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_RAW_HTML_HTML_DESC'),
					'std'    => '<p>Insert raw html here.<br/>Here is an example of hyper link <a href="https://www.joomshaper.com/">JoomShaper</a></p>',
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
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
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
