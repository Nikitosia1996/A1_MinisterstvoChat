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
	'addon_name' => 'team_carousel',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_TEAM_CAROUSEL'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_TEAM_CAROUSEL_DESC'),
	'category'   => 'Slider',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g opacity=".5" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 30.8c0-.6.4-1 1-1h6c.6 0 1 .4 1 1s-.4 1-1 1h-6c-.6 0-1-.4-1-1z"/><path d="M17.9 13.3h-3.8c-1.7 0-3.1 1.2-3.1 2.7v5.5c0 .3.3.5.6.5h8.8c.3 0 .6-.2.6-.5V16c0-1.4-1.4-2.7-3.1-2.7z"/></g><path fill-rule="evenodd" clip-rule="evenodd" d="M23 2.2H9V21h14V2.2zM9 .1C7.9.1 7 1 7 2.2V21c0 1.2.9 2.1 2 2.1h14c1.1 0 2-.9 2-2.1V2.2C25 1 24.1.1 23 .1H9zM9 26.8c0-.6.4-1 1-1h12c.6 0 1 .4 1 1s-.4 1-1 1H10c-.6 0-1-.4-1-1z" fill="currentColor"/><path d="M27.8 14.5v-7c0-.5.5-.7.8-.4l3.1 3.5c.2.2.2.6 0 .8l-3.1 3.5c-.3.3-.8 0-.8-.4zM4.1 7.5v6.9c0 .5-.5.7-.8.4L.2 11.3c-.2-.2-.2-.6 0-.8L3.3 7c.3-.2.8.1.8.5zM16 6.1c-1.8 0-3.3 1.5-3.3 3.3 0 1.2.7 2.3 1.7 2.9.5.3 1 .4 1.6.4.6 0 1.1-.2 1.6-.4 1-.6 1.7-1.6 1.7-2.9 0-1.8-1.5-3.3-3.3-3.3z" fill="currentColor"/></svg>',
	'settings' => [
		'carousel_layout_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_LAYOUTS'),
			'fields' => [
				'team_carousel_layout' => [
					'type'    => 'thumbnail',
					'columns' => 3,
					'values'  => [
						'layout1' => ['svg' => '<svg viewBox="0 0 86 88" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.2" d="M0 0h86v88H0V0z" fill="currentColor" fill-opacity="0.3"/><rect opacity="0.1" x="9" y="9" width="68" height="43" rx="4" fill="currentColor"/><path opacity="0.5" d="M45.99 28.805h-5.98c-2.694 0-4.885 1.87-4.885 4.169v8.442c0 .46.437.834.977.834h13.796c.54 0 .977-.374.977-.834v-8.442c0-2.299-2.191-4.17-4.884-4.17z" fill="currentColor"/><path d="M43 17.75c-2.827 0-5.127 2.25-5.127 5.014 0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/><rect opacity="0.6" x="9" y="60" width="32" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="9" y="67" width="49" height="3" rx="1.5" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="11" cy="78" r="2"/><circle cx="18" cy="78" r="2"/><circle cx="25" cy="78" r="2"/></g></svg>'],
						'layout2' => ['svg' => '<svg viewBox="0 0 86 88" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h86v88H0z"/><rect opacity="0.1" x="9" y="9" width="68" height="61" rx="4" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="36" cy="78" r="2"/><circle cx="43" cy="78" r="2"/><circle cx="50" cy="78" r="2"/></g><path opacity="0.5" d="M47.08 38.342h-8.302c-3.737 0-6.778 2.595-6.778 5.786v11.715c0 .639.607 1.157 1.356 1.157h19.146c.748 0 1.355-.518 1.355-1.157V44.128c0-3.19-3.04-5.786-6.778-5.786z" fill="currentColor"/><path d="M42.928 23c-3.923 0-7.114 3.122-7.114 6.958 0 2.603 1.468 4.876 3.637 6.07a7.195 7.195 0 003.477.889 7.195 7.195 0 003.477-.89c2.17-1.193 3.638-3.466 3.638-6.069 0-3.836-3.192-6.958-7.115-6.958z" fill="currentColor"/><rect opacity="0.6" x="26" y="42" width="32" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="16" y="49" width="52" height="3" rx="1.5" fill="currentColor"/></svg>'],
						'layout3' => ['svg' => '<svg viewBox="0 0 86 88" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h86v88H0z"/><rect opacity="0.1" x="9" y="20" width="33" height="44" rx="4" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="52" cy="56" r="2"/><circle cx="59" cy="56" r="2"/><circle cx="66" cy="56" r="2"/></g><path opacity="0.5" d="M28.866 42.055h-5.982c-2.693 0-4.884 1.87-4.884 4.169v8.442c0 .46.437.834.977.834h13.796c.54 0 .977-.374.977-.834v-8.442c0-2.299-2.191-4.17-4.884-4.17z" fill="currentColor"/><path d="M25.875 31c-2.827 0-5.127 2.25-5.127 5.014 0 1.875 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/><rect opacity="0.6" x="50" y="34" width="15" height="4" rx="2" fill="currentColor"/><rect opacity="0.6" x="50" y="26" width="26" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="50" y="43" width="20" height="3" rx="1.5" fill="currentColor"/></svg>'],
					],
					'std' => 'layout1',
				],

				'content_bg_separator' => [
					'type'  => 'separator',
				],

				'content_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [
						['team_carousel_layout', '!=', 'layout2']
					],
				],

				'overlay_gradient' => [
					'type'  => 'gradient',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY'),
					'std'   => [
						"color"  => "rgba(0, 169, 255, .9)",
						"color2" => "rgba(0, 47, 255, .9)",
						"deg"    => "125",
						"type"   => "linear"
					],
					'depends' => [
						['team_carousel_layout', '=', 'layout2']
					],
				],
			],
		],

		'items' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
			'fields' => [
				'sp_team_carousel_item' => [
					'type' => 'repeatable',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
					'std' => [
						[
							'team_carousel_img' => [
								'src' => 'https://sppagebuilder.com/addons/team_carousel/team1.jpg',
							],
							'person_name'        => 'John Doe',
							'person_designation' => 'Software Engineer',
							'team_carousel_item' => [
								[
									'title'       => 'Facebook',
									'social_icon' => 'fab fa-facebook-f',
									'social_url'  => 'https://facebook.com'
								],
								[
									'title'       => 'twitter',
									'social_icon' => 'fab fa-twitter',
									'social_url'  => 'https://twitter.com'
								],
								[
									'title'       => 'Linkedin',
									'social_icon' => 'fab fa-linkedin',
									'social_url'  => 'https://linkedin.com'
								],
							],
						],

						[
							'team_carousel_img' => [
								'src' => 'https://sppagebuilder.com/addons/team_carousel/team2.jpg',
							],
							'person_name'        => 'John Doe',
							'person_designation' => 'Software Engineer',
							'team_carousel_item' => [
								[
									'title'       => 'Facebook',
									'social_icon' => 'fab fa-facebook-f',
									'social_url'  => 'https://facebook.com'
								],
								[
									'title'       => 'twitter',
									'social_icon' => 'fab fa-twitter',
									'social_url'  => 'https://twitter.com'
								],
								[
									'title'       => 'Linkedin',
									'social_icon' => 'fab fa-linkedin',
									'social_url'  => 'https://linkedin.com'
								],
							],
						],

						[
							'team_carousel_img' => [
								'src' => 'https://sppagebuilder.com/addons/team_carousel/team3.jpg',
							],
							'person_name'        => 'John Doe',
							'person_designation' => 'Software Engineer',
							'team_carousel_item' => [
								[
									'title'       => 'Facebook',
									'social_icon' => 'fab fa-facebook-f',
									'social_url'  => 'https://facebook.com'
								],
								[
									'title'       => 'twitter',
									'social_icon' => 'fab fa-twitter',
									'social_url'  => 'https://twitter.com'
								],
								[
									'title'       => 'Linkedin',
									'social_icon' => 'fab fa-linkedin',
									'social_url'  => 'https://linkedin.com'
								],
							],
						],

						[
							'team_carousel_img' => [
								'src' => 'https://sppagebuilder.com/addons/team_carousel/team1.jpg',
							],
							'person_name'        => 'John Doe',
							'person_designation' => 'Software Engineer',
							'team_carousel_item' => [
								[
									'title'       => 'Facebook',
									'social_icon' => 'fab fa-facebook-f',
									'social_url'  => 'https://facebook.com'
								],
								[
									'title'       => 'twitter',
									'social_icon' => 'fab fa-twitter',
									'social_url'  => 'https://twitter.com'
								],
								[
									'title'       => 'Linkedin',
									'social_icon' => 'fab fa-linkedin',
									'social_url'  => 'https://linkedin.com'
								],
							],
						],

						[
							'team_carousel_img' => [
								'src' => 'https://sppagebuilder.com/addons/team_carousel/team2.jpg',
							],
							'person_name'        => 'John Doe',
							'person_designation' => 'Software Engineer',
							'team_carousel_item' => [
								[
									'title'       => 'Facebook',
									'social_icon' => 'fab fa-facebook-f',
									'social_url'  => 'https://facebook.com'
								],
								[
									'title'       => 'twitter',
									'social_icon' => 'fab fa-twitter',
									'social_url'  => 'https://twitter.com'
								],
								[
									'title'       => 'Linkedin',
									'social_icon' => 'fab fa-linkedin',
									'social_url'  => 'https://linkedin.com'
								],
							],
						],

						[
							'team_carousel_img' => [
								'src' => 'https://sppagebuilder.com/addons/team_carousel/team3.jpg',
							],
							'person_name'        => 'John Doe',
							'person_designation' => 'Software Engineer',
							'team_carousel_item' => [
								[
									'title'       => 'Facebook',
									'social_icon' => 'fab fa-facebook-f',
									'social_url'  => 'https://facebook.com'
								],
								[
									'title'       => 'twitter',
									'social_icon' => 'fab fa-twitter',
									'social_url'  => 'https://twitter.com'
								],
								[
									'title'       => 'Linkedin',
									'social_icon' => 'fab fa-linkedin',
									'social_url'  => 'https://linkedin.com'
								],
							],
						]
					],

					'attr' =>  [
						'person' => [
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON'),
							'fields' => [
								'title' => [
									'type'  => 'text',
									'title' => Text::_('COM_SPPAGEBUILDER_ADMIN_LABEL'),
									'desc'  => Text::_('COM_SPPAGEBUILDER_ADMIN_LABEL_DESC'),
								],

								'person_name' => [
									'type'  => 'text',
									'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_NAME'),
									'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_NAME_DESC'),
								],

								'person_profile_link' => [
									'type'         => 'link',
									'title'        => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
								],

								'team_carousel_img' => [
									'type'  => 'media',
									'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
									'std'   => [
										'src' => 'https://sppagebuilder.com/addons/team_carousel/team1.jpg',
									]
								],
								'person_designation' => [
									'type'  => 'text',
									'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESIGNATION'),
									'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESIGNATION_DESC'),
								],

								// Social
								'social_separator' => [
									'type'  => 'separator',
								],

								'team_carousel_item' => [
									'type'  => 'repeatable',
									'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SOCIAL'),
									'attr'  => [
										'social_links' => [
											'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SOCIAL'),
											'fields' => [
												'title' => [
													'type'  => 'text',
													'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
													'std'   => 'Facebook'
												],

												'social_url' => [
													'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
													'type' => 'link'
												],

												'social_icon' => [
													'type'  => 'icon',
													'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
													'std'   => 'fab fa-facebook-f'
												],
											],
										],
									],
								],
							],
						],
					],
				],
			],
		],

		'name_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_NAME_OPTIONS'),
			'fields' => [
				'name_typography' => [
					'type'     => 'typography',
					'title'	=> Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'content_name_font_family',
						'size' => 'content_name_fontsize',
						'line_height' => 'content_name_lineheight',
						'letter_spacing' => 'content_name_letterspace',
						'uppercase' => 'content_name_font_style.uppercase',
						'italic' => 'content_name_font_style.italic',
						'underline' => 'content_name_font_style.underline',
						'weight' => 'content_name_font_style.weight',
					],
				],

				'content_name_text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],
			],
		],

		'designation_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESIGNATION_OPTIONS'),
			'fields' => [
				'designation_typography' => [
					'type'     => 'typography',
					'title'	=> Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'content_designation_font_family',
						'size' => 'content_designation_fontsize',
						'line_height' => 'content_designation_lineheight',
						'letter_spacing' => 'content_designation_letterspace',
						'uppercase' => 'content_designation_font_style.uppercase',
						'italic' => 'content_designation_font_style.italic',
						'underline' => 'content_designation_font_style.underline',
						'weight' => 'content_designation_font_style.weight',
					],
				],

				'content_designation_text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],
			]
		],

		'social_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_SOCIAL_OPTIONS'),
			'fields' => [
				'social_fontsize' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
					'responsive' => true,
					'max' => 400,
				],

				'social_width' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'min' => 0,
					'max' => 200,
					'responsive' => true,
				],

				'social_height' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'min' => 0,
					'max' => 200,
					'responsive' => true,
				],

				'social_color_separator' => [
					'type' => 'separator',
				],

				'social_text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'social_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER'),
				],

				'social_border_separator' => [
					'type' => 'separator',
				],

				'social_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'min' => 0,
					'max' => 10,
				],

				'social_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
				],

				'social_border_radius' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS_DESC'),
					'min' => 0,
					'max' => 200,
				],

				'social_margin_separator' => [
					'type' => 'separator',
				],

				'social_margin' => [
					'type'        => 'margin',
					'title'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'max'        => 400,
					'responsive' => true
				],
			],
		],

		'carousel' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_OPTIONS'),
			'fields' => [
				'carousel_item_number' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_NUMBER'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_ITEM_NUMBER_DESC'),
					'min'        => 1,
					'max'        => 15,
					'responsive' => true,
					'std' 		 => ['xl' => 3],
				],

				'carousel_autoplay' => [
					'type'    	=> 'checkbox',
					'title'   	=> Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY'),
					'desc'    	=> Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY_DESC'),
					'std'  	  	=> 0
				],

				'carousel_interval' => [
					'type'    	=> 'slider',
					'title'   	=> Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_INTERVAL'),
					'desc'    	=> Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_CAROUSEL_INTERVAL_DESC'),
					'std' 	  	=> 4500
				],

				'carousel_speed' => [
					'type'    	=> 'slider',
					'title'   	=> Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED'),
					'desc'    	=> Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SPEED_DESC'),
					'std' 	  	=> 2500
				],

				'carousel_bullet' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_CONTROLLERS_DESC'),
					'std'     => 1,
				],

				'carousel_arrow' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_SHOW_ARROWS_DESC'),
					'std'     => 1,
				],
			],
		],

		'arrows_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_ARROWS_OPTIONS'),
			'fields' => [
				'arrow_position_verti' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION_DESC'),
					'min'        => -100,
					'max'        => 100,
					'responsive' => true,
				],

				'arrow_position_hori' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION_DESC'),
					'min'        => -200,
					'max'        => 200,
					'responsive' => true,
				],

				'arrow_icon' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_ARROWS_ICON'),
					'values' => [
						'angle'      => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_ARROWS_ICON_ANGLE'),
						'long_arrow' => Text::_('COM_SPPAGEBUILDER_ADDON_TESTIMONIAL_PRO_ARROWS_ICON_LONG_ARROW'),
					],
					'std'     => 'angle',
				],

				'arrow_height' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'max'     => 200,
					'min'     => 10,
					'std' 	  => 60,
				],

				'arrow_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'std'     => '',
					'max'     => 200,
					'min'     => 10,
					'std'     => 60,
				],

				'arrow_font_size' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
					'max'     => 100,
				],

				'arrow_color_separator' => [
					'type' => 'separator',
				],

				'arrow_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'arrow_hover_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER'),
				],

				'arrow_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
				],

				'arrow_hover_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_HOVER'),
				],

				'arrow_border_separator' => [
					'type' => 'separator',
				],

				'arrow_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'max'     => 20,
					'std'     => 0,
				],

				'arrow_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
				],

				'arrow_hover_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR_HOVER'),
				],

				'arrow_border_radius' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS_DESC'),
					'max'     => 100,
				],
			]
		],

		'bullets_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_CONTROLS_OPTIONS'),
			'fields' => [
				'bullet_position_verti' => [
					'type'    	 => 'slider',
					'title'   	 => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION'),
					'desc'    	 => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_VERTICAL_POSITION_DESC'),
					'min'        => -100,
					'max'        => 100,
					'responsive' => true,
				],

				'bullet_position_hori' => [
					'type'    	 => 'slider',
					'title'   	 => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION'),
					'desc'    	 => Text::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_CONTROLLER_HORI_POSITION_DESC'),
					'min'        => -2000,
					'max'        => 2000,
					'responsive' => true,
				],

				'bullet_height' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
					'max'     => 100,
					'min'     => 1,
					'std' => 4,
				],

				'bullet_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'max'     => 100,
					'min'     => 10,
					'std' => 25,
				],

				'bullet_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
				],

				'bullet_active_background' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_HOVER'),
				],

				// Border
				'bullet_border_separator' => [
					'type' => 'separator',
				],

				'bullet_border_width' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'max'     => 20,
					'std'     => 0,
				],

				'bullet_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
				],

				'bullet_border_radius' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'max'     => 100,
				],
			],
		],
	],
]);
