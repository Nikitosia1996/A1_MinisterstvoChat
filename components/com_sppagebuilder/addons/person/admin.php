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
	'addon_name' => 'person',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M19.418 14.634h-6.836C9.504 14.634 7 16.772 7 19.4v9.648c0 .526.5.953 1.116.953h15.768C24.5 30 25 29.573 25 29.047v-9.648c0-2.627-2.504-4.765-5.582-4.765z" fill="currentColor"/><path d="M16 2c-3.23 0-5.86 2.57-5.86 5.73 0 2.144 1.21 4.016 2.997 4.998a5.925 5.925 0 002.863.733c1.04 0 2.016-.267 2.863-.733 1.787-.982 2.996-2.854 2.996-4.998C21.86 4.57 19.231 2 16 2z" fill="currentColor"/></svg>',
	'settings' => [
		'layout' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_STYLE'),
			'fields' => [
				'person_style_preset' => [
					'type' => 'thumbnail',
					'title' => '',
					'columns'   => 3,
					'values'    => [
						'default' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h86v88H0z"/><rect opacity="0.1" x="9" y="9" width="68" height="43" rx="4" fill="currentColor"/><path opacity="0.5" d="M45.99 28.805h-5.98c-2.694 0-4.885 1.87-4.885 4.169v8.442c0 .46.437.834.977.834h13.796c.54 0 .977-.374.977-.834v-8.442c0-2.299-2.191-4.17-4.884-4.17z" fill="currentColor"/><path d="M43 17.75c-2.827 0-5.127 2.25-5.127 5.014 0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/><rect opacity="0.6" x="9" y="60" width="32" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="9" y="67" width="49" height="3" rx="1.5" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="11" cy="78" r="2"/><circle cx="18" cy="78" r="2"/><circle cx="25" cy="78" r="2"/></g></svg>'],
						'layout1' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 88"><path fill="currentColor" fill-opacity="0.1" d="M0 0h86v88H0z"/><rect opacity="0.1" x="9" y="9" width="68" height="53" rx="4" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="18" cy="53" r="2"/><circle cx="25" cy="53" r="2"/><circle cx="32" cy="53" r="2"/></g><path opacity="0.5" d="M45.99 28.805h-5.98c-2.694 0-4.885 1.87-4.885 4.169v8.442c0 .46.437.834.977.834h13.796c.54 0 .977-.374.977-.834v-8.442c0-2.299-2.191-4.17-4.884-4.17z" fill="currentColor"/><path d="M43 17.75c-2.827 0-5.127 2.25-5.127 5.014 0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/><rect opacity="0.6" x="16" y="68" width="32" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="16" y="75" width="52" height="3" rx="1.5" fill="currentColor"/></svg>'],
						'layout2' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h86v88H0z"/><rect opacity="0.1" x="9" y="9" width="68" height="70" rx="4" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="18" cy="70" r="2"/><circle cx="25" cy="70" r="2"/><circle cx="32" cy="70" r="2"/></g><path opacity="0.5" d="M45.99 28.805h-5.98c-2.694 0-4.885 1.87-4.885 4.169v8.442c0 .46.437.834.977.834h13.796c.54 0 .977-.374.977-.834v-8.442c0-2.299-2.191-4.17-4.884-4.17z" fill="currentColor"/><path d="M43 17.75c-2.827 0-5.127 2.25-5.127 5.014 0 1.876 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/><rect opacity="0.6" x="16" y="54" width="32" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="16" y="61" width="52" height="3" rx="1.5" fill="currentColor"/></svg>'],
						'layout3' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h86v88H0z"/><rect opacity="0.1" x="9" y="9" width="68" height="70" rx="4" fill="currentColor"/><rect opacity="0.6" x="27" y="38" width="32" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="19" y="45" width="49" height="3" rx="1.5" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="36" cy="56" r="2"/><circle cx="43" cy="56" r="2"/><circle cx="50" cy="56" r="2"/></g></svg>'],
						'layout4' => ['svg' => '<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 88"><path opacity="0.2" fill="currentColor" fill-opacity="0.3" d="M0 0h86v88H0z"/><rect opacity="0.1" x="9" y="9" width="68" height="70" rx="4" fill="currentColor"/><g opacity="0.5" fill="currentColor"><circle cx="42" cy="50" r="2"/><circle cx="49" cy="50" r="2"/><circle cx="56" cy="50" r="2"/></g><path opacity="0.5" d="M28.866 40.055h-5.982c-2.693 0-4.884 1.87-4.884 4.169v8.442c0 .46.437.834.977.834h13.796c.54 0 .977-.374.977-.834v-8.442c0-2.299-2.191-4.17-4.884-4.17z" fill="currentColor"/><path d="M25.875 29c-2.827 0-5.127 2.25-5.127 5.014 0 1.875 1.058 3.513 2.621 4.373.742.408 1.596.641 2.506.641.91 0 1.764-.233 2.505-.64 1.563-.86 2.622-2.498 2.622-4.374 0-2.765-2.3-5.014-5.127-5.014z" fill="currentColor"/><rect opacity="0.6" x="40" y="34" width="22" height="4" rx="2" fill="currentColor"/><rect opacity="0.3" x="40" y="41" width="29" height="3" rx="1.5" fill="currentColor"/></svg>'],
					],
					'std' => 'default',
				],
			],
		],

		'person' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON'),
			'fields' => [
				'name' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_NAME'),
					'placeholder' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_NAME'),
					'std'         => 'John Doe',
				],

				'title_link' => [
					'type'  => 'link',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADING_USE_LINK_DESC'),
				],

				'name_typography' => [
					'type'     => 'typography',
					'title'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'name_font_family',
						'size' => 'name_fontsize',
						'line_height' => 'name_lineheight',
						'letter_spacing' => 'name_letterspace',
						'uppercase' => 'name_font_style.uppercase',
						'italic' => 'name_font_style.italic',
						'underline' => 'name_font_style.underline',
						'weight' => 'name_font_style.weight',
					],
				],

				'name_color' => [
					'type'      => 'color',
					'title'    	=> Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'designation_separator' => [
					'type'        => 'separator'
				],

				'designation' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESIGNATION'),
					'placeholder' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESIGNATION'),
					'std'         => 'Creative Director',
				],

				'designation_typography' => [
					'type'     => 'typography',
					'title'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'designation_font_family',
						'size' => 'designation_fontsize',
						'line_height' => 'designation_lineheight',
						'letter_spacing' => 'designation_letterspace',
						'uppercase' => 'designation_font_style.uppercase',
						'italic' => 'designation_font_style.italic',
						'underline' => 'designation_font_style.underline',
						'weight' => 'designation_font_style.weight',
					],
				],

				'designation_color' => [
					'type'      => 'color',
					'title'    	=> Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'designation_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'responsive' => true,
				],

				'email' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_EMAIL'),
					'placeholder' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_EMAIL'),
				],

				'intro_separator' => [
					'type'        => 'separator'
				],

				'introtext' => [
					'type'    => 'textarea',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_INTROTEXT'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_INTROTEXT_DESC'),
					'depends' => [['person_style_preset', '!=', 'layout3']],
				],

				'intro_typography' => [
					'type'     => 'typography',
					'title'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'introtext_font_family',
						'size' => 'introtext_fontsize',
						'line_height' => 'introtext_lineheight',
						'letter_spacing' => 'introtext_letterspace',
						'uppercase' => 'introtext_font_style.uppercase',
						'italic' => 'introtext_font_style.italic',
						'underline' => 'introtext_font_style.underline',
						'weight' => 'introtext_font_style.weight',
					],
				],

				'introtext_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR')
				],

				'alignment_separator' => [
					'type' => 'separator',
				],

				'alignment' => [
					'type' => 'alignment',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
					'responsive' => true,
					'available_options' => ['left', 'center', 'right'],
				],
			],
		],

		'image' => [
			'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
			'fields' => [
				'image' => [
					'type'      => 'media',
					'title'     => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
					'hideTitle' => true,
					'format'    => 'image',
					'std'       => ['src' => 'https://sppagebuilder.com/addons/person/person1.jpg']
				],

				'image_border_radius' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RADIUS'),
					'std'   => 0,
					'max'   => 400
				],
			]
		],

		'background' => [
			'title'	=> Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_CONTENT_BACKGROUND'),
			'depends'    => [
				['person_style_preset', '!=', 'default'],
				['person_style_preset', '!=', 'layout2'],
				['person_style_preset', '!=', 'layout3'],
			],
			'fields' => [
				'name_desig_padding' => [
					'type'    => 'padding',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'std'     => ['xl' => '15px 0px 15px 15px', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'depends' => [['person_style_preset', '=', 'layout1']],
					'responsive' => true,
				],

				'name_desig_bg' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
					'std'     => '#FFFFFF',
					'depends' => [['person_style_preset', '=', 'layout1']]
				],

				'person_content_bg' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
					'std'     => '#FFFFFF',
					'depends' => [['person_style_preset', '=', 'layout4']]
				],

				'person_content_padding' => [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'std'        => ['xl' => '15px 15px 15px 15px', 'lg' => '15px 15px 15px 15px', 'md' => '15px 15px 15px 15px', 'sm' => '15px 15px 15px 15px', 'xs' => '15px 15px 15px 15px'],
					'responsive' => true,
					'depends'    => [['person_style_preset', '=', 'layout4']],
				],
			],
		],

		'overlay' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY'),
			'depends' => [['person_style_preset', '!=', 'layout4']],
			'fields' => [
				'content_overlay_type' => [
					'type'    => 'radio',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY'),
					'values'  => [
						'color' => 'Color',
						'gradient' => 'Gradient',
					],
					'std' => 'gradient',
					'is_header' => 1,
				],

				'content_overlay_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [
						['content_overlay_type', '!=', 'gradient']
					],
				],

				'content_overlay_backdrop_filter' => [
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_DESC'),
					'values' => [
						'blur' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_BLUR'),
						'brightness' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_BRIGHTNESS'),
						'contrast' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_CONTRAST'),
						'grayscale' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_GRAYSCALE'),
						'invert' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_INVERT'),
						'opacity' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_OPACITY'),
						'sepia' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_SEPIA'),
						'saturate' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_SATURATE'),
					],
					'std' => '',
					'depends' => [
						['person_style_preset', '!=', 'layout1'],
						['person_style_preset', '!=', 'default'],
						['content_overlay_type', '!=', 'gradient']
					],
				],

				'content_overlay_backdrop_filter_value' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_VALUE'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE_LAYOUTS_WRAPPER_BACKDROP_FILTER_VALUE_DESC'),
					'max'   => 100,
					'depends' => [
						['person_style_preset', '!=', 'layout1'],
						['person_style_preset', '!=', 'default'],
						['content_overlay_backdrop_filter', '!=', '']
					]
				],

				'content_overlay_gradient' => [
					'type'  => 'gradient',
					'std'   => [
						"color"  => "rgba(127, 0, 255, 0.8)",
						"color2" => "rgba(225, 0, 255, 0.7)",
						"deg"    => "45",
						"type"   => "linear"
					],
					'depends' => [
						['content_overlay_type', '=', 'gradient']
					],
				],
			],
		],

		'social' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SOCIAL'),
			'fields' => [
				'facebook' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_FACEBOOK'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_FACEBOOK_DESC'),
					'placeholder' => 'https://www.facebook.com/username',
					'std'         => 'https://www.facebook.com/joomshaper',
				],

				'twitter' => [
					'type'        => 'text',
					'title'       => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_TWITTER'),
					'desc'        => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_TWITTER_DESC'),
					'placeholder' => 'https://twitter.com/username',
					'std'         => 'https://twitter.com/joomshaper',
				],

				'youtube' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_YOUTUBE'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_YOUTUBE_DESC'),
				],

				'linkedin' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_LINKEDIN'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_LINKEDIN_DESC'),
				],

				'pinterest' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_PINTEREST'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_PINTEREST_DESC'),
				],

				'flickr' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_FLICKR'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_FLICKR_DESC'),
				],

				'dribbble' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DRIBBBLE'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_DRIBBBLE_DESC'),
				],

				'behance' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_BEHANCE'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_BEHANCE_DESC'),
				],

				'instagram' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_INSTAGRAM'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_INSTAGRAM_DESC'),
				],

				'social_icon_color_separator' => [
					'type' => 'separator',
				],

				'social_icon_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'social_icon_hover_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER'),
				],

				'social_icon_fontsize_separator' => [
					'type' => 'separator',
				],

				'social_icon_fontsize' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
					'max'   => 200,
				],

				'social_icon_margin' => [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'responsive' => true,
				],

				'social_position' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
					'values' => [
						'before' => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_BEFORE_INTROTEXT'),
						'after'  => Text::_('COM_SPPAGEBUILDER_ADDON_PERSON_AFTER_INTROTEXT'),
					],
					'std'     => 'after',
					'depends' => [['person_style_preset', '!=', 'layout3']],
				],
			],
		],
	],
]);
