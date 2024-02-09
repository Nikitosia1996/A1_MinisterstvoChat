<?php

/**
 * @package SP Page Builder
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('resticted aceess');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig([
	'type'       => 'content',
	'addon_name' => 'articles_scroller',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SCROLLER'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SCROLLER_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M15.29.718a1 1 0 011.42 0l4.532 4.579c.625.631.178 1.703-.71 1.703h-9.063c-.889 0-1.336-1.072-.711-1.703L15.289.718zM16.71 31.282a1 1 0 01-1.42 0l-4.532-4.579c-.625-.631-.178-1.703.71-1.703h9.064c.888 0 1.335 1.072.71 1.703l-4.531 4.579z" fill="currentColor"/><g opacity=".5" fill="currentColor"><path d="M2 16a1 1 0 011-1h26a1 1 0 110 2H3a1 1 0 01-1-1zM2 11a1 1 0 011-1h26a1 1 0 110 2H3a1 1 0 01-1-1zM2 21a1 1 0 011-1h12a1 1 0 110 2H3a1 1 0 01-1-1z"/></g></svg>',
	'settings' => [
		'source' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_SOURCE'),
			'fields' => [
				'addon_style' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_STYLE'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_STYLE_DESC'),
					'values' => [
						'ticker'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_TICKER'),
						'scroller' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER'),
						'carousel' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_CAROUSEL'),
					],
					'std' => 'ticker',
				],

				'resource' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_DESC'),
					'values' => [
						'article' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_ARTICLE'),
						'k2'      => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_K2'),
					],
					'std' => 'article',
				],

				'catid' => [
					'type'     => 'category',
					'title'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID'),
					'desc'     => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID_DESC'),
					'multiple' => true,
					'depends'  => [['resource', '=', 'article']],
				],

				'k2catid' => [
					'type'     => 'select',
					'title'    => Text::_('COM_SPPAGEBUILDER_ADDON_K2_CATID'),
					'desc'     => Text::_('COM_SPPAGEBUILDER_ADDON_K2_CATID_DESC'),
					'values'   => SpPgaeBuilderBase::k2CatList(),
					'multiple' => true,
					'depends'  => [['resource', '=', 'k2']],
				],

				'ordering' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_DESC'),
					'values' => [
						'latest'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_LATEST'),
						'oldest'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_OLDEST'),
						'hits'     => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_POPULAR'),
						'featured' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_FEATURED'),
					],
					'std' => 'latest',
				],
				'thumb_size' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ARTICLE_ADDON_THUMB_SIZE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ARTICLE_ADDON_THUMB_SIZE_DESC'),
                    'values' => [
                        'image_thumbnail' => Text::_('COM_SPPAGEBUILDER_ARTICLE_ADDON_THUMB_SIZE_THUMBNAIL'),
                        'image_small' => Text::_('COM_SPPAGEBUILDER_ARTICLE_ADDON_THUMB_SIZE_SMALL'),
                        'image_medium' => Text::_('COM_SPPAGEBUILDER_ARTICLE_ADDON_THUMB_SIZE_MEDIUM'),
                        'image_large' => Text::_('COM_SPPAGEBUILDER_ARTICLE_ADDON_THUMB_SIZE_LARGE'),
                        'featured_image' => Text::_('COM_SPPAGEBUILDER_ARTICLE_ADDON_THUMB_SIZE_FEATURED_IMAGE'),
                    ],
                    'depends' => [['resource', '!=', 'k2']],
                    'std' => 'image_thumbnail',
                ],
				'article_scroll_limit' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT_DESC'),
					'min'   => 1,
					'max'   => 100,
					'std'   => 12
				],

				// Scroller options
				'scroller_options_separator' => [
					'type' => 'separator',
				],

				'number_of_items' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARTICLES_NUMBER'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARTICLES_NUMBER_DESC'),
					'min'	  => 1,
					'max'	  => 48,
					'std'     => 3,
					'depends' => [['addon_style', '!=', 'ticker']],
				],

				// Carousel
				'carousel_separator_starts' => [
					'type' => 'separator',
					'depends' => [['addon_style', '=', 'carousel']],
				],

				'carousel_type' => [
					'type' => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_RESPONSIVE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_RESPONSIVE_DESC'),
					'std' => 0,
					'depends' => [['addon_style', '=', 'carousel']],
				],

				'number_of_items_tab' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARTICLES_NUMBER_TAB'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARTICLES_NUMBER_TAB_DESC'),
					'min'	  => 1,
					'max'	  => 48,
					'std'     => 2,
					'depends' => [
						['addon_style', '=', 'carousel'],
						['carousel_type', '=', 1],
					],
				],

				'number_of_items_mobile' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARTICLES_NUMBER_MOB'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARTICLES_NUMBER_MOB_DESC'),
					'min'	  => 1,
					'max'	  => 48,
					'std'     => 1,
					'depends' => [
						['addon_style', '=', 'carousel'],
						['carousel_type', '=', 1],
					],
				],

				'gap' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_EMPTY_SPACE_GAP'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_EMPTY_SPACE_GAP_DESC'),
					'std'        => ['xl' => 15],
					'responsive' => true,
					'depends' => [
						['addon_style', '=', 'carousel'],
						['carousel_type', '=', 1],
					],
				],

				'carousel_separator_ends' => [
					'type' => 'separator',
					'depends' => [['addon_style', '=', 'carousel']],
				],

				'move_slide' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_MOVE_ARTICLES'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_MOVE_ARTICLES_DESC'),
					'min'	  => 1,
					'max'	  => 16,
					'std'     => 1,
					'depends' => [
						['addon_style', '!=', 'ticker'],
						['addon_style', '!=', 'carousel'],
					],
				],

				'slide_speed' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_SPEED'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_SPEED_DESC'),
					'min'	  => 100,
					'max'	  => 5000,
					'std'   => 500,
				],

				'carousel_autoplay' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_AUTOPLAY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_AUTOPLAY_DESC'),
					'std'     => 0,
					'depends' => [['addon_style', '=', 'carousel']],
				],

				'carousel_touch' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ENABLE_DRAGGING'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_CAROUSEL_DRAG_DESC'),
					'std'     => 0,
					'depends' => [
						['addon_style', '=', 'carousel'],
					],
				],

				'carousel_arrow' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ENABLE_ARROW_CONTROLLERS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ENABLE_ARROW_CONTROLLERS_DESC'),
					'std'     => 0,
					'depends' => [
						['addon_style', '=', 'carousel'],
					],
				],

				'carousel_indicators' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ENABLE_INDICATORS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ENABLE_INDICATORS_DESC'),
					'std'     => 1,
					'depends' => [
						['addon_style', '=', 'carousel'],
					],
				],

				'image_bg' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_IMAGE_BG'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_IMAGE_BG_DESC'),
					'values' => [
						0 => Text::_('NO'),
						1 => Text::_('YES')
					],
					'std'     => 0,
					'depends' => [
						['addon_style', '!=', 'ticker'],
						['addon_style', '!=', 'carousel'],
					],
				],
			],
		],

		// scroller type
		'scroller_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER'),
			'depends' => [['addon_style', '=', 'scroller']],
			'fields' => [
				'overlap_date_text' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT_DESC'),
					'values' => [
						0 => Text::_('NO'),
						1 => Text::_('YES')
					],
					'std'     => 0,
				],

				'overlap_text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT_COLOR'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT_COLOR_DESC'),
					'depends' => [['overlap_date_text', '!=', 0]],
				],

				'overlap_text_font_size' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT_SIZE'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT_SIZE_DESC'),
					'max'     => 200,
					'depends' => [['overlap_date_text', '!=', 0]],
				],

				'overlap_text_right' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT_RIGHT'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_OVERLAP_TEXT_RIGHT_DESC'),
					'depends' => [['overlap_date_text', '!=', 0]],
				],

				'right_title_font_size' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_TITLE_SIZE'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_TITLE_SIZE_DESC'),
					'max'     => 200,
					'std'     => '',
					'depends' => [['overlap_date_text', '!=', 0]],
				],

				'text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_TEXT_COLOR'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_TEXT_COLOR_DESC'),
				],

				'item_bottom_gap' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_SPACING'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_BOTTOM_GAP_DESC'),
					'max'     => 200,
					'std'     => 1,
				],
			],
		],

		// Ticker
		'ticker_heading' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING'),
			'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING_DESC'),
			'depends' => [['addon_style', '=', 'ticker']],
			'fields' => [
				'ticker_heading' => [
					'type'    => 'text',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING_DESC'),
					'std'     => 'Breaking News',
				],

				'show_shape' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_SHAPE'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_SHAPE_DESC'),
					'values' => [
						0 => Text::_('NO'),
						1 => Text::_('YES')
					],
					'std' => 1,
				],

				'heading_shape' => [
					'type'   => 'select',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING_SHAPE'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING_SHAPE_DESC'),
					'values' => [
						'arrow'         => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_ARROW_SHAPE'),
						'slanted-left'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_SLANTED_L_SHAPE'),
						'slanted-right' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_SLANTED_R_SHAPE')
					],
					'std'     => 'arrow',
					'depends' => [['show_shape', '!=', 0]],
				],

				'ticker_date_time' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_DATE_TIME'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_DATE_TIME_DESC'),
					'values' => [
						0 => Text::_('NO'),
						1 => Text::_('YES')
					],
					'std'     => 0,
				],

				'ticker_date_hour' => [
					'type'   => 'checkbox',
					'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HOUR'),
					'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HOUR_DESC'),
					'values' => [
						0 => Text::_('NO'),
						1 => Text::_('YES')
					],
					'std'     => 0,
				],

				'border_radius' => [
					'type'    => 'slider',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_BORDER_RADIUS'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_BORDER_RADIUS_DESC'),
					'std'     => 0,
				],

				'arrow_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARROW_COLOR'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_ARROW_COLOR_DESC'),
				],
			],
		],

		'carousel_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_CAROUSEL'),
			'depends' => [['addon_style', '=', 'carousel']],
			'fields' => [
				// Title
				'carousel_title_separator' => [
					'type' => 'separator',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
				],

				// @todo: implement typography on the frontend
				'carousel_title_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font'           => 'carousel_title_font_family',
						'size'           => 'carousel_title_font_size',
						'weight'         => 'carousel_title_font_weight',
					],
				],

				'carousel_title_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'carousel_title_margin' => [
					'type'    => 'margin',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'responsive' => true,
				],

				// Date
				'carousel_date_separator' => [
					'type' => 'separator',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DATE'),
				],

				// @todo: implement typography on the frontend
				'carousel_date_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font'           => 'carousel_date_font_family',
						'size'           => 'carousel_date_font_size',
						'weight'         => 'carousel_date_font_weight',
					],
				],

				'carousel_date_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				// Text
				'carousel_text_separator' => [
					'type' => 'separator',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT'),
				],

				// @todo: implement typography on the frontend
				'carousel_text_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font'           => 'carousel_text_font_family',
						'size'           => 'carousel_text_font_size',
						'weight'         => 'carousel_text_font_weight',
					],
				],

				'carousel_text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['addon_style', '=', 'carousel']],
				],

				// Category
				'carousel_category_separator' => [
					'type' => 'separator',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CATEGORY'),
				],

				'carousel_category_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font' => 'carousel_category_font_family',
						'size' => 'carousel_category_font_size',
						'weight' => 'carousel_category_font_weight',
					],
				],

				'carousel_category_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
				],

				'carousel_category_margin' => [
					'type'    => 'margin',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'responsive' => true,
				],

				// Content
				'carousel_content_separator' => [
					'type'    => 'separator',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
				],

				'carousel_content_bg' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
				],

				'carousel_content_padding' => [
					'type'    => 'padding',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CONTENT_PADDING'),
					'responsive' => true,
				],

				'carousel_content_separator' => [
					'type' => 'separator',
				],

				'carousel_content_align' => [
					'type'    => 'alignment',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
					'values' => [
						'sppb-text-left'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'sppb-text-center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'sppb-text-right'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					],
				],
			],
		],

		'options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
			'fields' => [
				// @todo: implement typography on the frontend
				'ticker_heading_typography' => [
					'type'     => 'typography',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks'   => [
						'font' => 'heading_date_font_family',
						'size' => 'ticker_heading_fontsize',
						'letter_spacing' => 'heading_letter_spacing',
						'weight' => 'ticker_heading_font_weight',
					],
				],

				// ticker or scroller
				'heading_date_separator' => [
					'type' => 'separator',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING_DATE'),
					'depends'    => [['addon_style', '!=', 'carousel']],
				],

				'left_text_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_LEFT_TEXT_COLOR_DESC'),
					'depends' => [['addon_style', '!=', 'carousel']],
				],

				'left_side_bg' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_LEFT_BG_DESC'),
					'depends' => [['addon_style', '!=', 'carousel']],
				],

				'ticker_heading_width' => [
					'type'       => 'slider',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_TICKER_HEADING_WIDTH_DESC'),
					'max'        => 100,
					'responsive' => true,
					'depends'    => [['addon_style', '!=', 'carousel']],
				],

				'content_separator' => [
					'type' => 'separator',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
					'depends'    => [['addon_style', '!=', 'carousel']],
				],

				'title_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_TITLE_COLOR_DESC'),
					'std'     => '',
					'depends' => [['addon_style', '!=', 'carousel']],
				],

				'content_bg' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_CONTENT_BG_DESC'),
					'depends' => [['addon_style', '!=', 'carousel']],
				],

				'content_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font' => 'content_font_family',
						'size' => 'content_fontsize',
						'weight' => 'content_title_font_weight',
					],
					'depends' => [['addon_style', '!=', 'carousel']],
				],

				'show_intro_separator' => [
					'type' => 'separator',
					'depends' => [['addon_style', '!=', 'ticker']],
				],

				'show_intro' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_INTRO'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_INTRO_DESC'),
					'std'     => 1,
					'depends' => [['addon_style', '!=', 'ticker']],
				],

				'intro_limit' => [
					'type'    => 'number',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_INTRO_LIMIT'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_INTRO_LIMIT_DESC'),
					'std'     => 100,
					'depends' => [
						['addon_style', '!=', 'ticker'],
						['show_intro', '!=', 0],
					]
				],

				'border_separator' => [
					'type' => 'separator',
				],

				'border_size' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_BORDER_SIZE_DESC'),
					'std'   => 0,
				],

				'border_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_SCROLLER_BORDER_COLOR_DESC'),
				],
			],
		],
	],
]);
