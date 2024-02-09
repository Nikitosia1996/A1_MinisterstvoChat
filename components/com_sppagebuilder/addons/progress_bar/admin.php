<?php
/**
 * @package SP Page Builder
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined ('_JEXEC') or die ('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
	'type'       => 'general',
	'addon_name' => 'progress_bar',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M27.938 4H4.062a1.062 1.062 0 000 2.123h23.876a1.062 1.062 0 100-2.123zM4.062 3a2.062 2.062 0 100 4.123h23.876a2.062 2.062 0 100-4.123H4.062z" fill="currentColor"/><rect x="2" y="3" width="7" height="4.123" rx="2.062" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M27.938 25.877H4.062a1.062 1.062 0 000 2.123h23.876a1.062 1.062 0 100-2.123zm-23.876-1a2.062 2.062 0 000 4.123h23.876a2.062 2.062 0 100-4.123H4.062z" fill="currentColor"/><rect x="2" y="24.877" width="14" height="4.123" rx="2.062" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M27.938 15.34H4.062a1.062 1.062 0 100 2.122h23.876a1.062 1.062 0 100-2.123zm-23.876-1a2.062 2.062 0 100 4.122h23.876a2.062 2.062 0 100-4.123H4.062z" fill="currentColor"/><rect x="2" y="14.339" width="20" height="4.123" rx="2.062" fill="currentColor"/></svg>',
	'settings' => [
		'progress_bar' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR'),
			'fields' => [
				'type' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_TYPE'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_TYPE_DESC'),
					'values' => [
						'sppb-progress-bar-primary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PRIMARY'),
						'sppb-progress-bar-success' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUCCESS'),
						'sppb-progress-bar-info'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_INFO'),
						'sppb-progress-bar-warning' => Text::_('COM_SPPAGEBUILDER_GLOBAL_WARNING'),
						'sppb-progress-bar-danger'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_DANGER'),
						'custom'                    => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
					],
					'std'   => 'custom',
				],

				'stripped' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_STRIPPED'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_STRIPPED_DESC'),
					'values' => [
						''                          => Text::_('JNO'),
						'sppb-progress-bar-striped' => Text::_('JYES'),
					],
				],

				'show_percentage' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_PERCENTAGE'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_SHOW_PERCENTAGE_DESC'),
					'std'   => 0,
				],

				'text_separator' => [
					'type'  => 'separator',
				],

				'text' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_TEXT_DESC'),
					'inline' => true,
				],

				'label_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'text_fontfamily',
						'size' => 'text_fontsize',
						'line_height' => 'text_lineheight',
						'weight' => 'text_fontweight',
					],
				],

				'text_color' => [
					'type'   => 'color',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends'=> [['type', '=', 'custom']],
				],

				'bar_separator' => [
					'type'  => 'separator',
				],

				'bar_height' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_HEIGHT'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_HEIGHT_DESC'),
					'std'   => 24,
					'min'   => 1,
					'max'   => 100,
					'info'	=> 'px',
				],

				'bar_background' => [
					'type'   => 'color',
					'std'    => 'rgba(51, 102, 255, 0.15)',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_BAR'),
					'depends'=> [['type', '=', 'custom']],
				],

				'progress_separator' => [
					'type'  => 'separator',
				],

				'progress' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_PROGRESS'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PROGRESS_BAR_PROGRESS_DESC'),
					'std'   => 60,
					'min'   => 1,
					'max'   => 100,
					'info'	=> '%',
				],

				'percentage_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'percentage_fontfamily',
						'size' => 'percentage_fontsize',
						'line_height' => 'percentage_lineheight',
						'weight' => 'percentage_fontweight',
					],
				],

				'progress_bar_background' => [
					'type'   => 'color',
					'std'    => '#3366FF',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends'=> [['type', '=', 'custom']],
				],

				'percentage_color' => [
					'type'   => 'color',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends'=> [['type', '=', 'custom']],
				],
			],
		],
	],
]);