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
	'addon_name' => 'image_carousel',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CAROUSEL'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CAROUSEL_DESC'),
	'category'   => 'Slider',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M22 5H10v21h12V5zM10 3a2 2 0 00-2 2v21a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H10z" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M23.721 17.693l-3.493 3.636a3.693 3.693 0 01-5.69-.443 1.693 1.693 0 00-2.66-.148L9.752 23.16 8.25 21.84l2.127-2.422a3.693 3.693 0 015.801.322 1.693 1.693 0 002.608.203l3.494-3.636 1.442 1.386zM17.5 9a1.5 1.5 0 100 3 1.5 1.5 0 000-3zM14 10.5a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0zM6 7a1 1 0 00-1-1H1a1 1 0 000 2h3v15H1a1 1 0 100 2h4a1 1 0 001-1V7zm20 17a1 1 0 001 1h4a1 1 0 100-2h-3V8h3a1 1 0 100-2h-4a.996.996 0 00-1 1v17z" fill="currentColor"/></svg>',
	'settings' => [
		'general' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'image_carousel_layout' => [
					'type'    => 'thumbnail',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LAYOUT'),
					'columns' => 4,
					'values'  => [
						'layout1' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><path opacity="0.1" fill="currentColor" d="M14 12h102v58H14z"/><g opacity="0.5" fill="currentColor"><circle cx="58" cy="79" r="2"/><circle cx="65" cy="79" r="2"/><circle cx="72" cy="79" r="2"/></g><path opacity="0.5" d="M81.537 30L52 70h58L81.537 30z" fill="currentColor"/><path opacity="0.5" d="M58.426 39L35 70h46L58.426 39z" fill="currentColor"/><path d="M34.127 24C31.3 24 29 26.25 29 29.014c0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/></svg>'],
						'layout2' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><g opacity="0.5" fill="currentColor"><circle cx="58" cy="79" r="2"/><circle cx="65" cy="79" r="2"/><circle cx="72" cy="79" r="2"/></g><path opacity="0.1" fill="currentColor" d="M13.049 12h32.505v58H13.049z"/><path opacity="0.5" d="M23.32 46l11.748 24H12l11.32-24z" fill="currentColor"/><path opacity="0.5" d="M32.281 52l9.078 18H23.534l8.747-18z" fill="currentColor"/><path opacity="0.1" fill="currentColor" d="M49.748 12h32.505v58H49.748z"/><path opacity="0.5" d="M63.02 48l-9.078 22h17.825L63.02 48z" fill="currentColor"/><path opacity="0.5" d="M71.981 41L60.233 70h23.068l-11.32-29z" fill="currentColor"/><path d="M65.281 22c-2.205 0-4 1.794-4 4a4.003 4.003 0 004 4 4.003 4.003 0 004-4c0-2.206-1.794-4-4-4z" fill="currentColor"/><path opacity="0.1" fill="currentColor" d="M86.446 12h32.505v58H86.446z"/><path opacity="0.5" d="M99.718 52l-9.077 18h17.825l-8.748-18z" fill="currentColor"/><path opacity="0.5" d="M108.68 47L96.932 70H120l-11.32-23z" fill="currentColor"/></svg>'],
						'layout3' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><g opacity="0.5" fill="currentColor"><circle cx="58" cy="79" r="2"/><circle cx="65" cy="79" r="2"/><circle cx="72" cy="79" r="2"/></g><path opacity="0.1" fill="currentColor" d="M35 12h62v58H35z"/><path opacity="0.5" d="M74.389 36L53 70h42L74.389 36z" fill="currentColor"/><path opacity="0.5" d="M58.787 44L43 70h31L58.787 44z" fill="currentColor"/><path d="M57 22c-2.206 0-4 1.794-4 4a4.003 4.003 0 004 4 4.003 4.003 0 004-4c0-2.206-1.794-4-4-4z" fill="currentColor"/><g opacity="0.5"><path opacity="0.2" fill="currentColor" d="M104 16h16v51h-16z"/></g><g opacity="0.5"><path opacity="0.2" fill="currentColor" d="M28 16H12v51h16z"/></g></svg>'],
						'layout4' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h131v88H0z"/><g opacity="0.5" fill="currentColor"><circle cx="58" cy="79" r="2"/><circle cx="65" cy="79" r="2"/><circle cx="72" cy="79" r="2"/></g><path opacity="0.1" fill="currentColor" d="M94 13h24v57H94zM67 13h24v57H67zM40 13h23v57H40zM12 13h24v57H12z"/></svg>'],
					],
					'std' => 'layout3',
				],

				'image_carousel_separator' => [
					'type'  => 'separator',
				],

				'sp_image_carousel_item' => [
					'type'  => 'repeatable',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEMS'),
					'std'   => [
						['image_carousel_img' => 'https://sppagebuilder.com/addons/image_carousel/image-carousel-default.jpg'],
						['image_carousel_img' => 'https://sppagebuilder.com/addons/image_carousel/image-carousel-default.jpg'],
						['image_carousel_img' => 'https://sppagebuilder.com/addons/image_carousel/image-carousel-default.jpg'],
						['image_carousel_img' => 'https://sppagebuilder.com/addons/image_carousel/image-carousel-default.jpg'],
						['image_carousel_img' => 'https://sppagebuilder.com/addons/image_carousel/image-carousel-default.jpg'],
						['image_carousel_img' => 'https://sppagebuilder.com/addons/image_carousel/image-carousel-default.jpg']
					],

					'attr' => [
						'title' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_ADMIN_LABEL'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADMIN_LABEL_DESC'),
							'std'   => 'Carousel Item Tittle',
						],

						'item_title' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_TITLE_DESC'),
						],

						'item_subtitle' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUB_TITLE'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_SUBTITLE_DESC'),
						],

						'item_description' => [
							'type'  => 'textarea',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_DESCRIPTION_DESC'),
						],

						'image_carousel_img' => [
							'type'  => 'media',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_IMAGE_DESC'),
							'std'   => ['src' => 'https://sppagebuilder.com/addons/js_slideshow/slideshow-default-bg.jpg']
						],

						'image_carousel_img_link' => [
							'type'  => 'link',
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_URL'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_URL_DESC'),
						],
					],
				],
			],
		],

		'title' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE_SUB_TITLE'),
			'fields' => [
				'content_title_typography' => [
					'type'      => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font'           => 'content_title_font_family',
						'size'           => 'content_title_fontsize',
						'line_height'    => 'content_title_lineheight',
						'letter_spacing' => 'content_title_letterspace',
						'uppercase'      => 'content_title_font_style.uppercase',
						'italic'         => 'content_title_font_style.italic',
						'underline'      => 'content_title_font_style.underline',
						'weight'         => 'content_title_font_style.weight',
					],
				],

				'content_title_text_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'title_margin_separator' => [
					'type'  => 'separator',
				],

				'content_title_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'max'        => 400,
					'responsive' => true,
				],

				'sub_title_margin_separator' => [
					'type'  => 'separator',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUB_TITLE'),
				],

				'content_subtitle_typography' => [
					'type'      => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font'           => 'content_subtitle_font_family',
						'size'           => 'content_subtitle_fontsize',
						'line_height'    => 'content_subtitle_lineheight',
						'letter_spacing' => 'content_subtitle_letterspace',
						'uppercase'      => 'content_subtitle_font_style.uppercase',
						'italic'         => 'content_subtitle_font_style.italic',
						'underline'      => 'content_subtitle_font_style.underline',
						'weight'         => 'content_subtitle_font_style.weight',
					],
				],

				'content_subtitle_text_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],
			],
		],

		'content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
			'fields' => [
				'description_typography' => [
					'type'      => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font'           => 'description_font_family',
						'size'           => 'description_fontsize',
						'line_height'    => 'description_lineheight',
						'letter_spacing' => 'description_letterspace',
						'uppercase'      => 'description_font_style.uppercase',
						'italic'         => 'description_font_style.italic',
						'underline'      => 'description_font_style.underline',
						'weight'         => 'description_font_style.weight',
					],
				],

				'description_text_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'carousel_overlay_separator' => [
					'type'  => 'separator',
				],

				'carousel_overlay' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY_DESC'),
					'std'   => 0,
				],

				'overlay_gradient' => [
					'type'  => 'gradient',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std'   => [
						"color"  => "rgba(59, 25, 208, 0.5)",
						"color2" => "rgba(255, 79, 226, 0.5)",
						"deg"    => "125",
						"type"   => "linear"
					],
					'depends' => [['carousel_overlay', '=', 1]]
				],

				'description_margin_separator' => [
					'type'  => 'separator',
				],

				'description_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
					'max'        => 400,
					'responsive' => true,
				],
			],
		],

		'options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
			'fields' => [
				'carousel_height' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_PRO_HEIGHT_DESC'),
					'min'        => 100,
					'max'        => 1500,
					'std'        => 500,
					'responsive' => true,
				],

				'carousel_item_number' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_NUMBER'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_NUMBER_DESC'),
					'min'        => 1,
					'max'        => 15,
					'std'        => ['xl' => 3],
					'responsive' => true,
					'depends'    => [
						['image_carousel_layout', '!=', 'layout1'],
						['image_carousel_layout', '!=', 'layout3']
					],
				],

				'carousel_margin' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_MARGIN'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_MARGIN_DESC'),
					'std'     => 15,
					'depends' => [['image_carousel_layout', '!=', 'layout1']],
				],

				'carousel_center_padding' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CAROUSEL_CENTER_PAD'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CAROUSEL_CENTER_PAD_DESC'),
					'std'        => ['xl' => 180],
					'min'        => 0,
					'max'        => 500,
					'responsive' => true,
					'depends'    => [
						['image_carousel_layout', '!=', 'layout1'],
						['image_carousel_layout', '!=', 'layout2']
					],
				],

				// todo: move somewhere else
				'item_content_verti_align' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_VERT_ALIGN'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUT_CONT_VERT_ALIGN_DESC'),
					'values' => [
						'top'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_TOP'),
						'middle' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MIDDLE'),
						'bottom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOTTOM'),
					],
					'std' => 'middle',
				],

				'item_content_hori_align' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONT_HORI_ALIGNMENT'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONT_HORI_ALIGNMENT_DESC'),
					'values' => [
						'left'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'right'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					],
					'std' => 'center',
				],

				'carousel_autoplay_separator' => [
					'type'  => 'separator',
				],

				'carousel_autoplay' => [
					'type'  => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY_DESC'),
					'std'   => 0,
				],

				'carousel_interval' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_INTERVAL'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CAROUSEL_INTERVAL_DESC'),
					'std'   => 4500,
					'depends' => [['carousel_autoplay', '=', 1]],
				],

				'carousel_speed' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED_DESC'),
					'std'   => 2500,
				],

				'carousel_fade' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_FADE'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_FADE_DESC'),
					'std'     => 0,
					'depends' => [['image_carousel_layout', '=', 'layout1']],
				],

				// Bullets
				'carousel_bullet_separator' => [
					'type' => 'separator',
				],

				'carousel_bullet' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS_DESC'),
					'std'     => 1,
				],

				'bullet_position_verti' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION_DESC'),
					'min'        => -100,
					'max'        => 100,
					'responsive' => true,
					'depends' => [['carousel_bullet', '=', 1]],
				],

				'bullet_position_hori' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION_DESC'),
					'min'        => -2000,
					'max'        => 2000,
					'responsive' => true,
					'depends' => [['carousel_bullet', '=', 1]],
				],

				'bullet_height' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'max' => 100,
					'min' => 0,
					'std' => 12,
					'depends' => [['carousel_bullet', '=', 1]],
				],

				'bullet_width' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'max' => 100,
					'min' => 0,
					'std' => 12,
					'depends' => [['carousel_bullet', '=', 1]],
				],

				'bullet_style' => [
					'type' => 'buttons',
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal_bullet'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ACTIVE'), 'value' => 'active_bullet'],
					],
					'std' => 'normal_bullet',
					'depends' => [['carousel_bullet', '=', 1]],
				],

				'bullet_background' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => '#dbdbdb',
					'depends' => [['carousel_bullet', '=', 1], ['bullet_style', '=', 'normal_bullet']],
				],

				'bullet_border_width' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'max' => 20,
					'depends' => [['carousel_bullet', '=', 1], ['bullet_style', '=', 'normal_bullet']],
				],

				'bullet_border_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['carousel_bullet', '=', 1], ['bullet_style', '=', 'normal_bullet']],
				],

				'bullet_active_background' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => '#373bff',
					'depends' => [['carousel_bullet', '=', 1], ['bullet_style', '=', 'active_bullet']],
				],

				'bullet_border_radius_separator' => [
					'type' => 'separator',
					'depends' => [['carousel_bullet', '=', 1]],
				],

				'bullet_border_radius' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS_DESC'),
					'max' => 100,
					'depends' => [['carousel_bullet', '=', 1]],
				],

				// Arrows
				'carousel_arrow_separator' => [
					'type' => 'separator',
				],

				'carousel_arrow' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS_DESC'),
					'std'     => 1,
				],

				'arrow_position_verti' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION_DESC'),
					'min'        => -100,
					'max'        => 100,
					'responsive' => true,
					'depends' => [['carousel_arrow', '=', 1]],
				],

				'arrow_position_hori' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION_DESC'),
					'min'        => -200,
					'max'        => 200,
					'responsive' => true,
					'depends' => [['carousel_arrow', '=', 1]],
				],

				'arrow_icon' => [
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_ARROWS_ICON'),
					'values' => [
						'angle' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_ARROWS_ICON_ANGLE'),
						'long_arrow' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_ARROWS_ICON_LONG_ARROW'),
					],
					'std' => 'long_arrow',
					'depends' => [['carousel_arrow', '=', 1]],
				],

				'arrow_style' => [
					'type' => 'buttons',
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal_arrow'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover_arrow'],
					],
					'std' => 'normal_arrow',
					'depends' => [['carousel_arrow', '=', 1]],
				],

				'arrow_height' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'std' => '',
					'max' => 200,
					'min' => 10,
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
					'std' => 50,
				],

				'arrow_width' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'std' => '',
					'max' => 200,
					'min' => 10,
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
					'std' => 52,
				],

				'arrow_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std' => '#fff',
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
				],

				'arrow_background' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => '#373bff',
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
				],

				'arrow_font_size' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
					'min' => 0,
					'max' => 100,
					'std' => 24,
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
				],

				'arrow_border_width' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
					'min' => 0,
					'max' => 20,
				],

				'arrow_border_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'std' => '#373bff',
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
				],

				'arrow_border_radius' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'normal_arrow'],
					],
					'max' => 1000,
					'min' => 0,
					'std' => '0',
				],

				'arrow_hover_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std' => '',
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'hover_arrow'],
					],
				],

				'arrow_hover_background' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'std' => '',
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'hover_arrow'],
					],
				],

				'arrow_hover_border_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'std' => '',
					'depends' => [
						['carousel_arrow', '=', 1],
						['arrow_style', '=', 'hover_arrow'],
					],
				],
			],
		],
	],
]);
