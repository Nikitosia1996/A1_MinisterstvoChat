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

SpAddonsConfig::addonConfig(
	[
		'type'       => 'content',
		'addon_name' => 'instagram_gallery',
		'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GALLERY'),
		'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GALLERY_DESC'),
		'category'   => 'Media',
		'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.5 2A6.5 6.5 0 002 8.5v15A6.5 6.5 0 008.5 30h15a6.5 6.5 0 006.5-6.5v-15A6.5 6.5 0 0023.5 2h-15zM0 8.5A8.5 8.5 0 018.5 0h15A8.5 8.5 0 0132 8.5v15a8.5 8.5 0 01-8.5 8.5h-15A8.5 8.5 0 010 23.5v-15z" fill="currentColor"/><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M16.798 10.99a5 5 0 10-1.466 9.892 5 5 0 001.466-9.893zm-3.957-1.268a7 7 0 116.448 12.426A7 7 0 0112.84 9.722zM23.25 7.75a1 1 0 011-1h.016a1 1 0 110 2h-.016a1 1 0 01-1-1z" fill="currentColor"/></svg>',
		'settings'     => [
			'options' => [
				'title' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GALLERY_GROUP_OPTIONS'),
				'fields' => [
					'item_resource' => [
						'type'   => 'select',
						'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GET_IMAGES_BY'),
						'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GET_IMAGES_BY_DESC'),
						'values' => [
							'userid'  => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GET_IMAGES_BY_USERID'),
							'hashtag' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GET_IMAGES_BY_HASHTAG'),
						],
						'std' => 'userid',
						'inline' => true,
					],

					'hashtag' => [
						'type'    => 'text',
						'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GET_IMAGES_BY_HASHTAG'),
						'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_HASHTAG_DESC'),
						'inline' => true,
						'depends' => [['item_resource', '=', 'hashtag']],
					],

					'hashtag_type' => [
						'type'   => 'select',
						'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_HASHTAG_MEDIA_TYPE'),
						'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_HASHTAG_MEDIA_TYPE_DESC'),
						'values' => [
							'top'    => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_HASHTAG_MEDIA_TYPE_TOP'),
							'recent' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_HASHTAG_MEDIA_TYPE_RECENT'),
						],
						'std'     => 'top',
						'inline' => true,
						'depends' => [['item_resource', '=', 'hashtag']],
					],

					'limit' => [
						'type'  => 'slider',
						'title' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_ITEM_LIMIT'),
						'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_ITEM_LIMIT_DESC'),
						'min'	=> 1,
						'max'	=> 10,
						'std'   => 4
					],

					'thumb_per_row' => [
						'type'  => 'slider',
						'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_THUMB_PER_ROW'),
						'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_THUMB_PER_ROW_DESC'),
						'min'	=> 1,
						'max'	=> 10,
						'std'   => 4
					],

					'show_stats' => [
						'type'   => 'select',
						'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_SHOW_STATS'),
						'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_SHOW_STATS_DESC'),
						'values' => [
							'author'   => Text::_('COM_SPPAGEBUILDER_FIELD_CREATED_BY_LABEL'),
							'caption'  => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_SHOW_STATS_CAPTION'),
							'likes'    => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_SHOW_STATS_LIKES_COUNT'),
							'comments' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_SHOW_STATS_COMMENTS_COUNT'),
						],
						'multiple' => true,
					],

					'layout_type' => [
						'type'   => 'select',
						'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_LAYOUT_TYPE'),
						'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_LAYOUT_TYPE_DESC'),
						'values' => [
							'default' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_LAYOUT_TYPE_DEFAULT'),
							'classic' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_LAYOUT_TYPE_CLASSIC'),
						],
						'std' => 'default',
						'inline' => true,
					],
				],
			],

			'title' => [
				'title' => Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_GALLERY_GROUP_TITLE'),
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

					'title_text_color' => [
						'type'   => 'color',
						'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR'),
						'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR_DESC'),
						'inline' => true
					],
					
					'title_typography' => [
						'type'     => 'typography',
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
				],
			],
		],
	],
);
