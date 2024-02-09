<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http:   //www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http:   //www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
	'type'       => 'content',
	'addon_name' => 'lottie',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_DESC'),
	'category'   => 'Media',
	'icon'       => '<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.1 27.6c0 1.2 1 2.2 2.2 2.2h23.2c1.2 0 2.2-1 2.2-2.2V4.4c0-1.2-1-2.2-2.2-2.2H4.4c-1.2 0-2.2 1-2.2 2.2v23.2h-.1zm2.3 4.2c-2.3 0-4.2-1.9-4.2-4.2V4.4C.2 2 2 .2 4.4.2h23.2c2.3 0 4.2 1.9 4.2 4.2v23.2c0 2.3-1.9 4.2-4.2 4.2H4.4z" fill="currentColor"/><path opacity=".5" d="M23.5 7c-4.2 0-6.6 4.2-8.85 8.25C12.85 18.7 11.05 22 8.5 22c-.9 0-1.5.6-1.5 1.5S7.6 25 8.5 25c4.2 0 6.6-4.2 8.85-8.25 1.8-3.45 3.6-6.75 6.15-6.75.9 0 1.5-.6 1.5-1.5S24.4 7 23.5 7z" fill="currentColor"/></svg>',
	'settings' => [
		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_SOURCE'),
			'fields' => [
				'source' => [
					'type'   => 'radio',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_SOURCE'),
					'values' => [
						'internal' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_SOURCE_MEDIA'),
						'external' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_SOURCE_EXTERNAL'),
					],
					'std'   => 'internal',
				],

				'lottie_file' => [
					'type'  => 'media',
					'format' => 'attachment',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_FILE'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_FILE_DESC'),
					'std'   => 'https://assets8.lottiefiles.com/packages/lf20_fie6iq7l.json',
					'hide_preview' => true,
					'depends' => [['source', '=', 'internal']],
				],

				'lottie_url' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_URL'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_URL_DESC'),
					'std'   => 'https://assets8.lottiefiles.com/packages/lf20_fie6iq7l.json',
					'depends' => [['source', '=', 'external']],
				],

				'width' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'responsive' => true,
					'unit'       => true,
				],

				'height' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'responsive' => true,
					'unit'       => true,
				],
			],
		],

		'interactivity' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_INTERACTIVITY'),
			'fields' => [
				'mode' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_MODE'),
					'values' => [
						'viewport' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_MODE_VIEWPORT'),
						'click'    => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_MODE_ON_CLICK'),
						'hover'    => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_MODE_ON_HOVER'),
						'scroll'   => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_MODE_SCROLL'),
						'none' 	   => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_MODE_NONE'),
					],
					'std'    => 'none',
					'inline' => true,
				],

				'autoplay' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_AUTOPLAY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_AUTOPLAY_DESC'),
					'std'     => 0,
					'depends' => [
						['mode', '!=', 'scroll'],
						['mode', '!=', 'click'],
						['mode', '!=', 'hover']
					],
				],
				'loop' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_LOOP'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_LOOP_DESC'),
					'std'     => 0,
					'depends' => [['mode', '!=', 'scroll'], ['mode', '!=', 'hover']],
				],

				'hover_out' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_ON_HOVER_OUT'),
					'values' => [
						'default' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DEFAULT'),
						'reverse' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_ON_HOVER_OUT_REVERSE'),
						'pause'   => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_ON_HOVER_OUT_PAUSE'),
					],
					'std'     => 'default',
					'inline'  => true,
					'depends' => [['mode', '=', 'hover']],
				],

				'renderer' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_RENDERER'),
					'values' => [
						'svg'    => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_RENDERER_SVG'),
						'canvas' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_RENDERER_CANVAS'),
					],
					'std'    => 'svg',
					'inline' => true,
				],

				'speed' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_SPEED'),
					'min'     => 1,
					'max'     => 10,
					'step'    => 0.1,
					'std'     => 1,
					'depends' => [['mode', '!=', 'scroll']],
				],

				'viewport_top' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_VIEWPORT_TOP'),
					'depends' => [
						['mode', '!=', 'hover'],
						['mode', '!=', 'viewport'],
						['mode', '!=', 'click'],
						['mode', '!=', 'none']
					],
				],

				'viewport_bottom' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_VIEWPORT_BOTTOM'),
					'depends' => [
						['mode', '!=', 'hover'],
						['mode', '!=', 'viewport'],
						['mode', '!=', 'click'],
						['mode', '!=', 'none']
					],
				],

				'frame_start' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_START_POINT'),
				],

				'frame_end' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_END_POINT'),
				],

				'direction' => [
					'type'   => 'radio',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_DIRECTION'),
					'values' => [
						'forward'  => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_DIRECTION_FORWARD'),
						'backward' => Text::_('COM_SPPAGEBUILDER_ADDON_LOTTIE_DIRECTION_BACKWARD'),
					],
					'std'   => 'forward',
					'depends' => [
						['mode', '!=', 'hover'],
						['mode', '!=', 'scroll']
					],
				],
			]
		],
	],
]);
