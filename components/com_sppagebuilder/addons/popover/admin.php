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
	'addon_name' => 'popover',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M7.56168 13.5792V7.4095C7.56168 6.63105 8.16333 6 8.90551 6H19.6562C20.3983 6 21 6.63105 21 7.4095V15.8665C21 16.6449 20.3983 17.276 19.6562 17.276H11.0356C11.0537 17.4385 11.063 17.6039 11.063 17.7715C11.063 20.1069 9.25812 22 7.0315 22C4.80487 22 3 20.1069 3 17.7715C3 15.4361 4.80487 13.543 7.0315 13.543C7.21121 13.543 7.38818 13.5553 7.56168 13.5792ZM8.90551 7.4095H19.6562V15.8665H10.6317C10.2531 15.0808 9.64757 14.436 8.90551 14.0266V7.4095ZM7.25078 16.2404C7.30894 16.3014 7.34161 16.3842 7.34161 16.4704V17.4462H8.27196C8.3542 17.4462 8.43308 17.4805 8.49124 17.5415C8.5494 17.6025 8.58207 17.6852 8.58207 17.7715C8.58207 17.8578 8.5494 17.9405 8.49124 18.0015C8.43308 18.0625 8.3542 18.0968 8.27196 18.0968H7.34161V19.0726C7.34161 19.1588 7.30894 19.2416 7.25078 19.3026C7.19262 19.3636 7.11374 19.3979 7.0315 19.3979C6.94925 19.3979 6.87037 19.3636 6.81221 19.3026C6.75405 19.2416 6.72138 19.1588 6.72138 19.0726V18.0968H5.79104C5.70879 18.0968 5.62991 18.0625 5.57175 18.0015C5.51359 17.9405 5.48092 17.8578 5.48092 17.7715C5.48092 17.6852 5.51359 17.6025 5.57175 17.5415C5.62991 17.4805 5.70879 17.4462 5.79104 17.4462H6.72138V16.4704C6.72138 16.3842 6.75405 16.3014 6.81221 16.2404C6.87037 16.1794 6.94925 16.1452 7.0315 16.1452C7.11374 16.1452 7.19262 16.1794 7.25078 16.2404Z" fill="currentColor"/>
	</svg>',
	'settings' => [
		'content' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_CONTENT'),
            'fields' => [
				'background_image' => [
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_BACKGROUND_IMAGE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_BACKGROUND_IMAGE_DESC'),
					'type' => 'media',
					'std' => [
						'src' => 'https://sppagebuilder.com/images/addons/popover/image.webp',
						'height' => '',
						'width' => '',
					],
				],
				'background_image_width' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_BACKGROUND_IMAGE_WIDTH'),
                    'max' => 2000,
                    'min' => 0,
                    'responsive' => true,
                ],
                'background_image_height' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_BACKGROUND_IMAGE_HEIGHT'),
                    'max' => 2000,
                    'min' => 0,
                    'responsive' => true,
                ],
				'background_image_alt' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_BACKGROUND_IMAGE_ALT'),
					'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_BACKGROUND_IMAGE_ALT_DESC'),
					'std'   => '',
				],

				'border_radius' => [
                    'type' => 'advancedslider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RADIUS'),
                    'std' => 0,
                    'max' => 1200,
                ],
            ],
        ],

		'popover_items' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_ITEMS'),
            'fields' => [
				'sp_popover_item' => [
                    'type'  => 'repeatable',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_ITEMS'),
					'std' 	=> [
						[
							'title'	=> 'Title', 
							'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
							'image'	=>	['src'	=> 'https://sppagebuilder.com/images/addons/popover/inset.webp'],
							'marker_left'	=> 20, 
							'marker_top'	=> 63,
						],
						[
							'title'	=> 'Title', 
							'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
							'image'	=>	['src'	=> 'https://sppagebuilder.com/images/addons/popover/inset.webp'],
							'marker_left'	=> 40, 
							'marker_top'	=> 38,
						],
						[
							'title'	=> 'Title', 
							'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
							'image'	=>	['src'	=> 'https://sppagebuilder.com/images/addons/popover/inset.webp'],
							'marker_left'	=> 55, 
							'marker_top'	=> 40,
						],
						[
							'title'	=> 'Title', 
							'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
							'image'	=>	['src'	=> 'https://sppagebuilder.com/images/addons/popover/inset.webp'],
							'marker_left'	=> 41, 
							'marker_top'	=> 81,
						],
					],
                    'attr'  => [
                        'title' => [
                            'type'  => 'text',
                            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_TITLE'),
                            'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_TITLE_DESC'),
                            'std'   => '',
                        ],
                        'meta' => [
                            'type'  => 'text',
                            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_META'),
                            'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_META_DESC'),
                            'std'   => '',
                        ],
                        'content' => [
                            'type'  => 'textarea',
                            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_CONTENT'),
                            'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_CONTENT_DESC'),
                            'std'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                        ],
						'image' => [
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_IMAGE'),
                    		'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_IMAGE_DESC'),
							'type' => 'media',
							'std' => [
								'src' => '',
								'height' => '',
								'width' => '',
							],
						],
						'image_alt' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_IMAGE_ALT'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_IMAGE_ALT_DESC'),
							'std'   => '',
						],
						'link' => [
                            'type'  => 'link',
                            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_LINK'),
                            'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_LINK_DESC'),
                        ],
						'link_item_text' => [
                            'type'  => 'text',
                            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_LINK_TEXT'),
                            'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_LINK_DESC'),
							'std'	=> '',
                        ],
						'marker' => [
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_MARKER'),
							'fields' => [
								'marker_left' => [
									'type' => 'slider',
									'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_MARKER_LEFT'),
									'max' => 100,
									'min' => 0,
									'std' => 50,
								],
								'marker_top' => [
									'type' => 'slider',
									'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_MARKER_TOP'),
									'max' => 100,
									'min' => 0,
									'std' => 50,
								],
							],
						],
						'popover' => [
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_POPOVER'),
							'fields' => [
								'popover_position' => [
									'type' => 'select',
									'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_POPOVER_POSITION'),
									'values' => [
										'none' => 'None',
										'top' => 'Top',
										'bottom' => 'Bottom',
										'left' => 'Left',
										'right' => 'Right',
									],
									'std' => 'none',
								],
							],
						],
                    ],
                ],
			],
		],

		'display' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_DISPLAY'),
			'desc' 	=> 'Show or hide content fields without the need to delete the content itself.',
            'fields' => [
				'show_title' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_DISPLAY_SHOW_TITLE'),
					'std'     => 1,
				],
				'show_meta_text' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_DISPLAY_SHOW_META_TEXT'),
					'std'     => 1,
				],
				'show_content' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_DISPLAY_SHOW_CONTENT'),
					'std'     => 1,
				],
				'show_image' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_DISPLAY_SHOW_IMAGE'),
					'std'     => 1,
				],
				'show_link' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_DISPLAY_SHOW_LINK'),
					'std'     => 1,
				],
			],
		],

		'marker' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_MARKER'),
            'fields' => [
				'marker_mode' => [
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_MODE'),
					'values' => [
						'click'		=> 'Click',
						'hover'		=> 'Hover',
					],
					'std' => 'click',
				],
				'enable_marker_ripple_effect' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_RIPPLE_EFFECT'),
					'std'     => 0,
				],

				'marker_size' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_SIZE'),
                    'min' => 0,
					'std' => ['xl' => 32],
                    'responsive' => true,
                ],

				'marker_icon_size' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_ICON_SIZE'),
                    'min' => 0,
					'std' => ['xl' => 16],
                    'responsive' => true,
                ],

				'popover_style_tab' => [
					'type'   => 'buttons',
					'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
					],
					'std'    => 'normal',
					'tabs'    => true,
				],
				'marker_background_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_BG_COLOR'),
					'depends' => [['popover_style_tab', '=', 'normal']]
				],
				'marker_background_color_hover' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_BG_COLOR'),
					'depends' => [['popover_style_tab', '!=', 'normal']]
				],
				'marker_icon_color' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_ICON_COLOR'),
					'depends' => [['popover_style_tab', '=', 'normal']]
				],
				'marker_icon_color_hover' => [
					'type'  => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_MARKER_ICON_COLOR'),
					'depends' => [['popover_style_tab', '!=', 'normal']]
				],
			],
		],

		'popover' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_POPOVER'),
            'fields' => [
				'popover_position' => [
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_POPOVER_POSITION'),
					'values' => [
						'top' => 'Top',
						'bottom' => 'Bottom',
						'left' => 'Left',
						'right' => 'Right',
					],
					'std' => 'right',
				],

				'popover_background_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_POPOVER_BG_COLOR'),
					'std' => '#FFFFFF'
				],

				'popover_width' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_POPOVER_WIDTH'),
                    'max' => 2000,
                    'min' => 0,
                    'responsive' => true,
                ],

				'gap' => [
					'type'  => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_GAP'),
				],

				'popover_padding'	=> [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],
			],
		],

		'popover_title' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_TITLE'),
            'fields' => [
				'title_style' => [
					'type' => 'headings',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_TITLE_STYLE'),
					'std' => 'h3',
				],
				'title_decoration' => [
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_TITLE_DECORATION'),
					'values' => [
						'none'		=> 'None',
						'divider'	=> 'Divider',
						'bullet'	=> 'Bullet',
						'line'		=> 'Line',
					],
					'std' => 'none',
				],
				'title_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_TITLE_COLOR'),
				],

				'popover_title_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                ],

				'popover_title_padding'	=> [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],

				'popover_title_margin'	=> [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],
			],
		],

		'popover_meta' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_META'),
            'fields' => [
				'meta_alignment' => [
					'type' => 'select',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_META_ALIGNMENT'),
					'values' => [
						'above_title'		=> 'Above Title',
						'below_title'		=> 'Below Title',
						'below_content'		=> 'Below Content',
					],
					'std' => 'below_title',
				],
				'meta_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_META_COLOR'),
				],

				'popover_meta_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                ],

				'popover_meta_padding'	=> [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],

				'popover_meta_margin'	=> [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],
			],
		],

		'popover_text_content' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_TEXT_CONTENT'),
            'fields' => [
				'popover_content_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_META_COLOR'),
				],

				'popover_content_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                ],

				'popover_content_padding'	=> [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],

				'popover_content_margin'	=> [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],
			],
		],

		'popover_image' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_IMAGE'),
            'fields' => [
				'popover_image_width' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_IMAGE_WIDTH'),
                    'max' => 2000,
                    'min' => 0,
                    'responsive' => true,
                ],
                'popover_image_height' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_IMAGE_HEIGHT'),
                    'max' => 2000,
                    'min' => 0,
                    'responsive' => true,
                ],

				'popover_image_border_radius' => [
                    'type' => 'advancedslider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RADIUS'),
                    'std' => 0,
                    'max' => 1200,
                ],

				'popover_image_padding'	=> [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],
			],
		],

		'popover_link' => [
            'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_GROUP_LINK'),
            'fields' => [
				'link_text' => [
					'type'  => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_LINK_TEXT'),
					'std'   => 'Read More',
				],

				'popover_link_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POPOVER_SETTINGS_META_COLOR'),
				],

				'popover_link_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                ],

				'popover_link_padding'	=> [
					'type'       => 'padding',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],

				'popover_link_margin'	=> [
					'type'       => 'margin',
					'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'desc'       => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_DESC'),
					'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
					'responsive' => true
				],
			],
		],

		'title' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
            'fields' => [
                'title' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
                ],

                'heading_selector' => [
                    'type' => 'headings',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
                    'std' => 'h3',
                ],

                'title_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
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
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                ],

                'title_position' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                    'values' => [
                        'top' => 'Top',
                        'bottom' => 'Bottom',
                    ],
                    'std' => 'top',
                ],

                'title_margin_top' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_TOP'),
                    'max' => 400,
                    'responsive' => true,
                ],

                'title_margin_bottom' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
                    'max' => 400,
                    'responsive' => true,
                ],
            ],
        ],
	],
]);
