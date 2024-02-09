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
	'addon_name' => 'table_advanced',
	'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED'),
	'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DESC'),
	'category'   => 'Content',
	'icon'       => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.27 4.27A4.333 4.333 0 014.332 3h23.334A4.333 4.333 0 0132 7.333v17.334A4.333 4.333 0 0127.667 29H4.333A4.333 4.333 0 010 24.667V7.333C0 6.184.457 5.082 1.27 4.27zM2 13.666v5.666h13v-5.666H2zm15 0v5.666h13v-5.666H17zm13-2V7.333A2.333 2.333 0 0027.667 5H4.333A2.333 2.333 0 002 7.333v4.334h28zm0 9.666H17V27L27.667 27A2.333 2.333 0 0030 24.667v-3.334zM15 27v-5.666H2v3.334A2.333 2.333 0 004.333 27H15z" fill="currentColor"/></svg>',
	'settings' => [
		// Table head
		'table_head' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TURNOFF_HEADER'),
			'fields' => [
				'turn_off_heading' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TURNOFF_HEADER'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TURNOFF_HEADER_DESC'),
					'std' => 0,
					'is_header' => 1,
				],

				'sp_table_advanced_item' => [
					'type'  => 'repeatable',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_HEAD'),
					'depends' => [['turn_off_heading', '=', 0]],
					'attr' => [
						'title' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
							'std'   => 'Column Header <th>'
						],

						'head_col_span' => [
							'type'  => 'number',
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DATA_COL_SPAN'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DATA_COL_SPAN_DESC'),
						],

						'content' => [
							'type'  => 'builder',
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TH_CONTENT'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TH_CONTENT_DESC'),
							'std'   => 'First Name'
						],
					],

					'std' => [
						['content' => 'First Name'],
						['content' => 'Last Name'],
						['content' => 'Countries'],
						['content' => 'Capitals'],
					],
				],
			],
		],

		// Table row
		'table_row' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_ROW'),
			'fields' => [
				'table_advanced_item' => [
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_ROW'),
					'type'  => 'repeatable',

					'attr' => [
						'title' => [
							'type'  => 'text',
							'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
							'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
							'std'   => 'Row Admin Label'
						],

						'inner_items' => [
							'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
							'fields' => [
								'table_advanced_item' => [
									'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DATA'),
									'type'  => 'repeatable',
									'attr'  => [
										'general' => [
											'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GENERAL'),
											'fields' => [
												'title' => [
													'type'  => 'text',
													'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
													'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
													'std'   => 'Column Data <td>'
												],
												'row_span' => [
													'type'  => 'number',
													'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DATA_ROW_SPAN'),
													'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DATA_ROW_SPAN_DESC'),
												],
												'col_span' => [
													'type'  => 'number',
													'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DATA_COL_SPAN'),
													'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_DATA_COL_SPAN_DESC'),
												],
												'content' => [
													'type'  => 'builder',
													'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TD_CONTENT'),
													'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TD_CONTENT_DESC'),
													'std'   => 'Jhon'
												],
												'td_inner_bg' => [
													'type'  => 'color',
													'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TD_INNER_BG'),
													'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TD_INNER_BG_DESC'),
													'std'   => ''
												],
											]
										]
									],
		
								],
							]
						]
					],

					'std' => [
						['table_advanced_item' => [['content' => 'Ronald'], ['content' => 'Curiel'], ['content' => 'USA'], ['content' => 'Washington, D.C.']]],
						['table_advanced_item' => [['content' => 'Roger'], ['content' => 'Morison'], ['content' => 'Sweden'], ['content' => 'Stockholm']]],
						['table_advanced_item' => [['content' => 'Luca'], ['content' => 'Jane'], ['content' => 'Russia'], ['content' => 'Moscow']]],
						['table_advanced_item' => [['content' => 'Marry'], ['content' => 'Chan'], ['content' => 'China'], ['content' => 'Beijing']]],
					],
				],
			],
		],

		// Header options
		'header_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_HEADER_OPTIONS'),
			'depends' => [['turn_off_heading', '=', 0]],
			'fields' => [
				'header_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'std' => '#fff',
				],

				'header_bg_options' => [
					'type'    => 'select',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'), 'value' => 'color_bg'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'), 'value' => 'gradient_bg'],
					],
					'std'     => 'color_bg',
				],

				'header_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
					'depends' => [['header_bg_options', '=', 'color_bg']],
					'std' => '#6c7ae0',
				],

				'header_gradient_bg' => [
					'type' => 'gradient',
					'std'  => [
						"color"  => "#00ad75",
						"color2" => "#8700fc",
						"deg"    => "45",
						"type"   => "linear"
					],
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_GRADIENT'),
					'depends' => [['header_bg_options', '=', 'gradient_bg']],
				],

				'header_border_separator' => [
					'type'    => 'separator',
				],

				'header_border' => [
					'type'    => 'margin',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
				],

				'header_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
				],

				'header_padding_separator' => [
					'type'    => 'separator',
				],

				'header_padding' => [
					'type'    => 'padding',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'depends' => [],
					'responsive' => true,
				],
			],
		],

		// Row options
		'row_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TABLE_STYLE'),
			'fields' => [
				'tr_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
				],

				'tr_second_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TR_SEC_BG'),
				],

				'tr_hover_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR_HOVER'),
				],

				'td_color_separator' => [
					'type'    => 'separator',
				],

				'td_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
				],

				'td_second_bg_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TD_SEC_BG'),
				],

				'td_spacing_separator' => [
					'type'    => 'separator',
				],

				'td_border' => [
					'type'    => 'margin',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
				],

				'td_border_color' => [
					'type'    => 'color',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [],
				],

				'td_spacing_separator' => [
					'type'    => 'separator',
				],

				'td_padding' => [
					'type'    => 'padding',
					'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'responsive' => true,
				],
			],
		],

		// Searchable
		'searchable_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SEARCHABLE'),
			'fields' => [
				'table_searchable' => [
					'type' => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SEARCHABLE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SEARCHABLE_DESC'),
					'std' => 0,
					'is_header' => 1,
				],

				'search_column_limit' => [
					'type' => 'text',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SEARCH_LIMIT'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SEARCH_LIMIT_DESC'),
					'std' => '1,2,3',
					'depends' => [['table_searchable', '!=', 0]],
				],

				'search_text_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['table_searchable', '=', 1]],
				],

				'search_bg_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['table_searchable', '=', 1]],
				],

				'search_border_separator' => [
					'type' => 'separator',
					'depends' => [['table_searchable', '=', 1]],
				],

				'search_border' => [
					'type' => 'margin',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'depends' => [['table_searchable', '=', 1]],
				],

				'search_border_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['table_searchable', '=', 1]],
				],

				'search_spacing_separator' => [
					'type' => 'separator',
					'depends' => [['table_searchable', '=', 1]],
				],

				'search_padding' => [
					'type' => 'padding',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'depends' => [['table_searchable', '=', 1]],
				],

				'search_margin_bottom' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN_BOTTOM'),
					'min' => 0,
					'max' => 100,
					'depends' => [['table_searchable', '=', 1]],
				],
			],
		],

		// Sortable
		'sortable_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SORTABLE'),
			'fields' => [
				'table_sortable' => [
					'type' => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SORTABLE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SORTABLE_DESC'),
					'std' => 0,
					'is_header' => 1,
					'depends' => [['turn_off_heading', '=', 0]],
				],

				'sort_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SORT_COLOR'),
					'depends' => [['turn_off_heading', '=', 0], ['table_sortable', '=', 1]],
				],

				'sort_margin_right' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_SORT_MARGIN_RIGHT'),
					'depends' => [['turn_off_heading', '=', 0], ['table_sortable', '=', 1]],
					'min' => '0',
					'max' => '200',
				],
			],
		],

		// Pagination
		'pagination' => [
			'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGINATION'),
			'fields' => [
				'table_pagination' => [
					'type' => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGI'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGI_DESC'),
					'std' => 0,
					'is_header' => 1,
				],

				'pagination_item' => [
					'type' => 'number',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGI_NUMBER'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGI_NUMBER_DESC'),
					'std' => 10,
					'depends' => [['table_pagination', '=', 1]],
				],

				// @todo: typography needs to fix on the frontend
				'pagi_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => ['font' => 'pagi_font_family'],
					'depends' => [['table_pagination', '=', 1]],
				],

				'pagi_color_tab' => [
					'type'   => 'buttons',
					'values' => [
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'normal'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'hover'],
						['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ACTIVE'), 'value' => 'active'],
					],
					'std'    => 'normal',
					'tabs'    => true,
					'depends' => [['table_pagination', '=', 1]],
				],

				'pagi_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'normal']],
				],

				'pagi_bg_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'normal']],
				],

				'pagi_border_separator' => [
					'type' => 'separator',
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'normal']],
				],

				'pagi_border_width' => [
					'type' => 'margin',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'normal']],
				],

				'pagi_border_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'normal']],
				],

				'pagi_border_radius' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
					'min' => 0,
					'max' => 200,
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'normal']],
				],

				// hover
				'pagi_hover_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'hover']],
				],

				'pagi_hover_bg_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'hover']],
				],

				'pagi_hover_border_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'hover']],
				],

				// active
				'pagi_active_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'active']],
				],

				'pagi_active_bg_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'active']],
				],

				'pagi_active_border_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
					'depends' => [['table_pagination', '=', 1], ['pagi_color_tab', '=', 'active']],
				],

				// Spacing
				'pagi_spacing_separator' => [
					'type' => 'separator',
					'depends' => [['table_pagination', '=', 1]],
				],

				'pagi_margin' => [
					'type' => 'slider',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGI_MARGIN_DESC'),
					'min' => 0,
					'max' => 50,
					'depends' => [['table_pagination', '=', 1]],
				],

				'pagi_padding' => [
					'type' => 'padding',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
					'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING_DESC'),
					'depends' => [['table_pagination', '=', 1]],
				],

				// Entries
				// @todo: typography needs to fix on the frontend
				'total_entries_separator' => [
					'type' => 'separator',
					'depends' => [['table_pagination', '=', 1]],
				],

				'total_entries' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TOTAL_ENTRY'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TOTAL_ENTRY_DESC'),
					'std' => 0,
					'depends' => [['table_pagination', '=', 1]],
				],

				'total_entries_typography' => [
					'type' => 'typography',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
					'fallbacks' => [
						'font' => 'total_entries_font_family',
						'size' => 'total_entries_fontsize',
						'uppercase' => 'total_entries_font_style.uppercase',
						'italic' => 'total_entries_font_style.italic',
						'underline' => 'total_entries_font_style.underline',
						'weight' => 'total_entries_font_style.weight',
					],
					'depends' => [
						['total_entries', '=', 1],
						['table_pagination', '=', 1],
					],
				],

				'total_entries_color' => [
					'type' => 'color',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
					'depends' => [
						['total_entries', '=', 1],
						['table_pagination', '=', 1],
					],
				],

				'total_entries_position' => [
					'type'    => 'checkbox',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TOTAL_ENTRY_POSITION'),
					'std' => 0,
					'depends' => [
						['table_pagination', '=', 1],
						['total_entries', '=', 1],
					],
				],

				'pagination_position' => [
					'type'    => 'select',
					'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGI_POSITION'),
					'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_PAGI_POSITION_DESC'),
					'depends' => [
						['table_pagination', '=', 1],
						['total_entries', '=', 0],
					],
					'values' => [
						'left-pagi'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
						'center-pagi' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
						'right-pagi'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
					],
					'std' => 'left-pagi',
				],
			],
		],

		// Other options
		'other_options' => [
			'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OTHER_OPTIONS'),
			'fields' => [
				'turn_off_responsive' => [
					'type' => 'checkbox',
					'title' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TURNOFF_RESPONSIVE'),
					'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_TABLE_ADVANCED_TURNOFF_RESPONSIVE_DESC'),
					'std' => 0,
				],

				'table_text_alignment' => [
					'type' => 'alignment',
					'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ALIGNMENT'),
					'available_options' => ['left', 'center', 'right'],
					'std' => 'left',
				],
			],
		],
	],
]);
