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
	'addon_name' => 'clients',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENTS'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENTS_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M26.7 16.7h-2.3c.2.6.4 1.3.4 2.1v8.8c0 .3-.1.6-.1.9h3.8c1.4 0 2.6-1.2 2.6-2.6v-4.8c-.1-2.4-2-4.4-4.4-4.4zM7.3 18.8c0-.7.1-1.4.4-2.1H5.3C2.9 16.7 1 18.6 1 21v4.8c0 1.4 1.2 2.6 2.6 2.6h3.8c-.1-.3-.1-.6-.1-.9v-8.7z" fill="currentColor"/><path d="M23 28.4H9v-9.6c0-2.4 1.9-4.3 4.3-4.3h5.3c2.4 0 4.3 1.9 4.3 4.3v9.6h.1zm-12-2h10v-7.6c0-1.3-1-2.3-2.3-2.3h-5.3c-1.3 0-2.3 1-2.3 2.3v7.6H11zM16 13.4c-.9 0-1.8-.2-2.5-.7-1.6-.9-2.7-2.7-2.7-4.5C10.8 5.3 13.1 3 16 3c2.9 0 5.2 2.3 5.2 5.2 0 1.9-1 3.6-2.7 4.5-.7.5-1.6.7-2.5.7zM16 5c-1.8 0-3.2 1.4-3.2 3.2 0 1.2.6 2.2 1.6 2.8 1 .5 2.2.5 3.1 0 1-.6 1.6-1.6 1.6-2.8C19.2 6.4 17.8 5 16 5z" fill="currentColor"/><path opacity=".5" d="M6.9 7.9C4.7 7.9 3 9.6 3 11.7c0 2.1 1.7 3.9 3.9 3.9.5 0 1.1-.1 1.5-.3.8-.4 1.5-1 1.9-1.7.3-.5.5-1.2.5-1.8-.1-2.2-1.8-3.9-3.9-3.9zM25.1 7.9c-2.1 0-3.9 1.7-3.9 3.9 0 .7.2 1.3.5 1.8.4.8 1.1 1.4 1.9 1.7.5.2 1 .3 1.5.3 2.1 0 3.9-1.7 3.9-3.9 0-2.1-1.7-3.8-3.9-3.8z" fill="currentColor"/></svg>',
	'settings' => [
		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'sp_clients_item' => [
					'type'	=> 'repeatable',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
					'attr'  => [
						'title' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
							'std'   => 'Client 1'
						],

						'image' => [
							'type'   => 'media',
							'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
							'format' => 'image',
							'std'    => [
								'src'    => 'https://sppagebuilder.com/addons/clients/client1.png',
								'width'  => '',
								'height' => ''
							],
						],

						'url' => [
							'type'  => 'link',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
							'mediaType' => 'attachment',
						],
					],
				],

				'alignment' => [
					'type'              => 'alignment',
					'responsive'        => true,
					'available_options' => ['left', 'center', 'right'],
					'std'               => [
						'xl' => 'left',
						'lg' => '',
						'md' => '',
						'sm' => '',
						'xs' => '',
					]
				]
			],
		],

		'options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
			'fields' => [
				'create_carousel' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENTS_MAKE_CAROUSEL'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENTS_MAKE_CAROUSEL_DESC'),
					'std'   => 0,
				],

				'carousel_autoplay' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY_DESC'),
					'std'     => 0,
					'depends' => [['create_carousel', '=', 1]],
				],

				'carousel_arrow' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS_DESC'),
					'std'     => 1,
					'depends' => [['create_carousel', '=', 1]],
				],

				'carousel_bullet' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS_DESC'),
					'std'     => 1,
					'depends' => [['create_carousel', '=', 1]],
				],

				'carousel_item_number' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_NUMBER'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_NUMBER_DESC'),
					'min'        => 1,
					'max'        => 8,
					'responsive' => true,
					'std' => [
						'xl' => 1,
					],
					'depends'    => [['create_carousel', '=', 1]],
				],

				'carousel_margin' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_MARGIN'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_MARGIN_DESC'),
					'std'     => 20,
					'depends' => [['create_carousel', '=', 1]],
				],


				'carousel_speed' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED_DESC'),
					'std'     => 2000,
					'depends' => [['create_carousel', '=', 1]],
				],

				'carousel_interval' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_INTERVAL'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CAROUSEL_INTERVAL_DESC'),
					'std'     => 3500,
					'depends' => [['create_carousel', '=', 1]],
				],

				'count' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENTS_COUNT'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENTS_COUNT_DESC'),
					'values' => [
						'sppb-col-sm-12' => 1,
						'sppb-col-sm-6'  => 2,
						'sppb-col-sm-4'  => 3,
						'sppb-col-sm-3'  => 4,
						'sppb-col-sm-2'  => 6,
					],
					'std'     => 'sppb-col-sm-3',
					'inline'  => true,
					'depends' => [['create_carousel', '!=', 1]]
				]
			]
		],

		'advanced' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADVANCED'),
			'fields' => [
				'add_css_filder' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_FILTER'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_FILTER_DESC'),
					'values' => [
						'grayscale' => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_FILTER_GRAYSCALE'),
						'opacity'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_FILTER_OPACITY'),
					],
					'std'      => 'grayscale',
					'multiple' => true,
				],

				'grayscale_value' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_FILTER_GRAYSCALE'),
					'min'     => 0,
					'max'     => 100,
					'std'     => '0',
					'depends' => [['add_css_filder', '!=', '']]
				],

				'opacity_value' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_FILTER_OPACITY'),
					'min'     => 0,
					'max'     => 100,
					'std'     => 100,
					'depends' => [['add_css_filder', '!=', '']]
				],

				'remove_filter' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_REMOVE_FILTER'),
					'std'     => 0,
					'depends' => [['add_css_filder', '!=', '']]
				],

				'scale_on_hover' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_SCALE_ON_HOVER'),
					'std'   => 0,
					'group' => [
						'scale_value'
					],
				],

				'scale_value' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLIENT_IMG_SCALE_VALUE'),
					'min'     => 0.1,
					'max'     => 5,
					'step'    => 0.1,
					'std'     => 0,
					'depends' => [['scale_on_hover', '=', 1]]
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
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
			]
		]
	],
]);
