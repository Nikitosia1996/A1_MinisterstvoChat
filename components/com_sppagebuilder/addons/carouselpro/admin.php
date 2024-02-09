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
	'addon_name' => 'carouselpro',
	'category'   => 'Slider',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ADVANCED'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ADVANCED_DESC'),
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M27.9 19.5v-6.9c0-.5.5-.7.8-.4l3.1 3.5c.2.2.2.6 0 .8L28.7 20c-.3.2-.8-.1-.8-.5zM4.2 12.5v6.9c0 .5-.5.7-.8.4L.3 16.3c-.2-.2-.2-.6 0-.8L3.4 12c.3-.2.8.1.8.5z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M23 5H9v22h14V5zM9 3c-1.1 0-2 .9-2 2v22c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H9z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M21 21c0 .6-.4 1-1 1h-8c-.6 0-1-.4-1-1s.4-1 1-1h8c.6 0 1 .4 1 1zM17 24c0 .6-.4 1-1 1h-4c-.6 0-1-.4-1-1s.4-1 1-1h4c.6 0 1 .4 1 1z" fill="currentColor"/><g opacity=".5" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M25 12.2L20.9 16c-1.8 1.7-5 1.5-6.5-.4-.8-1-2.4-1.1-3.4-.2L8.6 18 7 16.8l2.5-2.5c1.8-1.8 5.1-1.7 6.6.3.8 1 2.4 1.1 3.3.2l4.1-3.8 1.5 1.2z"/><path d="M17.5 8c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5 1.5-.7 1.5-1.5S18.3 8 17.5 8zM14 9.5C14 7.6 15.6 6 17.5 6S21 7.6 21 9.5 19.4 13 17.5 13 14 11.4 14 9.5z"/></g></svg>',
	'settings' => [
		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'sp_carouselpro_item' => [
					'type' => 'repeatable',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEMS'),
					'attr'  => [
						'title' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_DESC'),
							'std'   => 'Carousel Item Title',
						],

						'title_margin' => [
							'type'       => 'margin',
							'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
							'std'        => ['xl' => '0px 0px 0px 0px', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
							'responsive' => true
						],

						'content_separator' => [
							'type' => 'separator',
						],

						'content' => [
							'type'  => 'editor',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
							'std'   => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.',
						],

						'content_margin' => [
							'type'       => 'margin',
							'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
							'std'        => ['xl' => '0px 0px 0px 0px', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
							'responsive' => true
						],

						'media_separator' => [
							'type' => 'separator',
						],

						'bg' => [
							'type'  => 'media',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_IMAGE'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ADVANCED_ITEM_BACKGROUND_IMAGE_DESC'),
						],

						'image' => [
							'type'  => 'media',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_IMAGE_DESC'),
						],

						'video' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_VIDEO'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ADVANCED_ITEM_VIDEO_DESC'),
						],

						//Button
						'button_separator' => [
							'type' => 'separator',
						],

						'button_text' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_TEXT_DESC'),
							'std'   => 'Button',
						],

						'button_url' => [
							'type'         => 'link',
							'title'        => Text::_('COM_SPPAGEBUILDER_GLOBAL_URL'),
							'desc'         => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL_DESC'),
							'depends'      => [['button_text', '!=', '']]
						],

						'button_icon' => [
							'type'    => 'icon',
							'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON'),
							'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
							'depends' => [['button_text', '!=', '']]
						],

						'button_icon_position' => [
							'type'   => 'select',
							'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_POSITION'),
							'values' => [
								'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
								'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
							],
							'depends' => [['button_text', '!=', '']]
						],
					],
				],
			],
		],

		'title_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE_OPTIONS'),
			'fields' => [
				'item_title_typography' => [
					'type'     => 'typography',
					'title'	 => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
				],

				'item_title_color' => [
					'type'   => 'color',
					'title'	 => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],
			],
		],

		'content_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT_OPTIONS'),
			'fields' => [
				'full_container' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_NO_CONTAINER'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_NO_CONTAINER_DESC'),
					'std'   => 0,
				],

				'item_content_separator' => [
					'type'  => 'separator',
				],

				'item_content_typography' => [
					'type'     => 'typography',
					'title'	 => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
				],

				'item_title_content' => [
					'type'   => 'color',
					'title'	 => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'content_column_separator' => [
					'type'  => 'separator',
				],

				'content_column' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTENT_COLUMN'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTENT_COLUMN_DESC'),
					'values' => [
						1  => 1,
						2  => 2,
						3  => 3,
						4  => 4,
						5  => 5,
						6  => 6,
						7  => 7,
						8  => 8,
						9  => 9,
						10 => 10,
						11 => 11,
						12 => 12,
					],
				],

				'item_padding_separator' => [
					'type'  => 'separator',
				],

				'item_padding' => [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ADVANCED_ITEM_PADDING'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],
			],
		],

		'button' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
			'fields' => [
				'button_typography' => [
					'type'     => 'typography',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
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
				],

				'link_button_padding_bottom' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_PADDING_BOTTOM'),
					'max'     => 100,
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
					'std' => ['xl' => '8px 22px 10px 22px', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'depends' => [['button_size', '=', 'custom']]
				],

				'button_block' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
					'values' => [
						''               => Text::_('JNO'),
						'sppb-btn-block' => Text::_('JYES'),
					],
					'depends' => [['button_type', '!=', 'link']]
				],

				'button_style_tab' => [
					'type' => 'buttons',
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover']
					],
					'std' => 'normal',
					'tabs' => true,
					'depends' => [['button_type', '=', 'custom']],
				],

				'button_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std' => '#FFFFFF',
					'depends' => [
						['button_type', '=', 'custom'],
						['button_style_tab', '=', 'normal'],
					],
				],

				'button_background_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => '#3366FF',
					'depends' => [
						['button_appearance', '!=', 'gradient'],
						['button_type', '=', 'custom'],
						['button_style_tab', '=', 'normal'],
					],
				],

				'button_background_gradient' => [
					'type' => 'gradient',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => [
						"color" => "#3366FF",
						"color2" => "#0037DD",
						"deg" => "45",
						"type" => "linear"
					],
					'depends' => [
						['button_appearance', '=', 'gradient'],
						['button_type', '=', 'custom'],
						['button_style_tab', '=', 'normal'],
					],
				],

				'button_color_hover' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std' => '#FFFFFF',
					'depends' => [
						['button_type', '=', 'custom'],
						['button_style_tab', '=', 'hover'],
					],
				],

				'button_background_color_hover' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => '#0037DD',
					'depends' => [
						['button_appearance', '!=', 'gradient'],
						['button_type', '=', 'custom'],
						['button_style_tab', '=', 'hover'],
					],
				],

				'button_background_gradient_hover' => [
					'type' => 'gradient',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => [
						"color" => "#0037DD",
						"color2" => "#3366FF",
						"deg" => "45",
						"type" => "linear"
					],
					'depends' => [
						['button_appearance', '=', 'gradient'],
						['button_type', '=', 'custom'],
						['button_style_tab', '=', 'hover'],
					],
				],

				// link button
				'link_button_style_tab' => [
					'type' => 'buttons',
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover']
					],
					'std' => 'normal',
					'tabs' => true,
					'depends' => [['button_type', '=', 'link']],
				],

				'link_button_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [
						['button_type', '=', 'link'],
						['link_button_style_tab', '=', 'normal'],
					]
				],

				'link_button_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'max'     => 30,
					'depends' => [
						['button_type', '=', 'link'],
						['link_button_style_tab', '=', 'normal'],
					]
				],

				'link_button_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'std'     => '',
					'depends' => [
						['button_type', '=', 'link'],
						['link_button_style_tab', '=', 'normal'],
					]
				],

				//Link Hover
				'link_button_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std'     => '',
					'depends' => [
						['button_type', '=', 'link'],
						['link_button_style_tab', '=', 'hover'],
					]
				],

				'link_button_border_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'std'     => '',
					'depends' => [
						['button_type', '=', 'link'],
						['link_button_style_tab', '=', 'hover'],
					]
				],
			],
		],

		'slider_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SLIDER_OPTIONS'),
			'fields' => [
				'carousel_height' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'max'        => 2500,
					'responsive' => true,
					'std'		 => ['xl' => 500]
				],

				'autoplay_separator' => [
					'type' => 'separator',
				],

				'autoplay' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_AUTOPLAY'),
					'values' => [
						1 => Text::_('JYES'),
						0 => Text::_('JNO'),
					],
					'std' => 1,
				],

				'interval' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_INTERVAL'),
					'std'     => 5,
					'depends' => [['autoplay', '=', 1]]
				],

				'speed' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SPEED'),
					'std'   => 600,
				],

				// Controllers
				'controllers_separator' => [
					'type' => 'separator',
				],

				'controllers' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTROLLERS'),
					'values' => [
						1 => Text::_('JYES'),
						0 => Text::_('JNO'),
					],
					'std' => 1,
				],

				// Arrows
				'arrows_separator' => [
					'type' => 'separator',
				],

				'arrows' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS_DESC'),
					'values' => [
						1 => Text::_('JYES'),
						0 => Text::_('JNO'),
					],
					'std' => 1,
				],

				'arrow_font_size' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
					'max'     => 100,
					'depends' => [['arrows', '=', 1]]
				],

				'arrow_position' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_PRO_ARROWS_POSITION'),
					'values' => [
						'default'       => 'Default',
						'bottom-left'   => Text::_('COM_SPPAGEBUILDER_ADDON_BOTTOM_LEFT'),
						'bottom-center' => Text::_('COM_SPPAGEBUILDER_ADDON_BOTTOM_CENTER'),
						'bottom-right'  => Text::_('COM_SPPAGEBUILDER_ADDON_BOTTOM_RIGHT'),
					],
					'std'     => 'default',
					'depends' => [['arrows', '=', 1]]
				],

				'arrow_height' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'max'     => 200,
					'min'     => 10,
					'depends' => [
						['arrows', '=', 1],
						['arrow_position', '!=', 'default'],
					],
				],

				'arrow_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'max'     => 200,
					'min'     => 10,
					'depends' => [
						['arrows', '=', 1],
						['arrow_position', '!=', 'default'],
					],
				],

				'arrow_icon_separator' => [
					'type' => 'separator',
					'depends' => [['arrows', '=', 1]],
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
					'std'     => 'chevron',
					'depends' => [['arrows', '=', 1]],
				],

				'arrow_margin' => [
					'type'    => 'margin',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'depends' => [['arrows', '=', 1], ['arrow_position', '!=', 'default']]
				],

				'arrow_style_separator' => [
					'type' => 'separator',
				],

				'arrow_style' => [
					'type'   => 'buttons',
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
					],
					'std'    => 'normal',
					'depends' => [['arrows', '=', 1]],
				],

				'arrow_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['arrows', '=', 1], ['arrow_style', '=', 'normal']]
				],

				'arrow_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['arrows', '=', 1], ['arrow_style', '=', 'normal'], ['arrow_position', '!=', 'default']]
				],

				'arrow_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'max'     => 20,
					'depends' => [['arrows', '=', 1], ['arrow_style', '=', 'normal'], ['arrow_position', '!=', 'default']]
				],

				'arrow_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['arrows', '=', 1], ['arrow_style', '=', 'normal'], ['arrow_position', '!=', 'default']]
				],

				'arrow_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['arrows', '=', 1], ['arrow_style', '=', 'hover']]
				],

				'arrow_hover_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['arrows', '=', 1], ['arrow_style', '=', 'hover'], ['arrow_position', '!=', 'default']]
				],

				'arrow_hover_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['arrows', '=', 1], ['arrow_style', '=', 'hover'], ['arrow_position', '!=', 'default']]
				],

				'arrow_border_radius_separator' => [
					'type' => 'separator',
					'depends' => [
						['arrows', '=', 1],
						['arrow_position', '!=', 'default'],
					],
				],

				'arrow_border_radius' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS_DESC'),
					'max'     => 1000,
					'depends' => [
						['arrows', '=', 1],
						['arrow_position', '!=', 'default'],
					],
				],
			],
		],
	],
]);
