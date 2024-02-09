<?php

/**
 * @package SP Page Builder
 * @author JoomShaper https: //www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http: //www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('restricted access');

use Joomla\CMS\Language\Text;

SpAddonsConfig::addonConfig(
    [
        'type' => 'repeatable',
        'addon_name' => 'js_slideshow',
        'category' => 'Slider',
        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER'),
        'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_DESC'),
        'icon' => '<svg viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" fill-rule="evenodd" clip-rule="evenodd" d="M17.656 10.518a1.138 1.138 0 1 0 0 2.276 1.138 1.138 0 0 0 0-2.276ZM15 11.656a2.656 2.656 0 1 1 5.312 0 2.656 2.656 0 0 1-5.312 0ZM10 27a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm12 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm-6.636-9.909c.885.842 1.854 1.306 2.88 1.345 1.014.038 1.939-.343 2.738-.91 1.563-1.108 2.888-3.095 3.906-5.067l-1.776-.918c-.985 1.906-2.13 3.533-3.287 4.354-.561.398-1.06.56-1.505.543-.433-.017-.96-.207-1.578-.796-1.163-1.106-2.319-1.737-3.458-1.923-1.157-.188-2.186.101-3.042.63-1.648 1.018-2.698 2.941-3.185 4.318l1.886.666c.42-1.19 1.265-2.612 2.35-3.282.511-.316 1.058-.457 1.67-.358.628.102 1.432.477 2.4 1.398Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M9 8h14v11H9V8ZM7 8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V8Zm-2.193 2.591A1 1 0 1 0 3.193 9.41L.236 13.444a1.246 1.246 0 0 0 0 1.46l2.703 3.687a1 1 0 1 0 1.613-1.182L2.18 14.174l2.626-3.583ZM16 27a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM27.409 9.193a1 1 0 0 1 1.398.216l2.957 4.035c.315.43.315 1.03 0 1.46l-2.703 3.687a1 1 0 1 1-1.613-1.182l2.371-3.235-2.626-3.583a1 1 0 0 1 .216-1.398Z" fill="currentColor"/></svg>',
        'settings' => [
            'content' => [
                'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
                'fields' => [
                    'slideshow_items' => [
                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEMS'),
                        'type'  => 'repeatable',
                        'std'   => [
                            [
                                'slider_img' => ['src' => 'https://sppagebuilder.com/addons/js_slideshow/slideshow-default-bg.jpg'],
                                'content_alignment'     => 'center',
                                'slider_bg_options' => 'bg_image',
                                'slideshow_inner_items' => [
                                    [
                                        'title_content_title'       => 'THE AMAZING SLIDESHOW ADDON!',
                                        'content_type'              => 'title_content',
                                        'title_heading_selector'    => 'h2',
                                        'content_color'             => '#fff',
                                        'content_animation_type'    => 'slide',
                                        'animation_slide_direction' => 'top',
                                        'animation_duration'        => 800,
                                        'animation_delay'           => 1000,
                                        'animation_slide_from'      => 100,
                                        'animation_timing_function' => 'ease',
                                    ],
                                    [
                                        'content_text'     => '<br>Want to make your website more attractive? Get a stunning hero <br>section with the Slideshow addon in SP Page Builder Pro. <br>It\'s easy, fast, and gorgeous.<br><br>',
                                        'content_type'     => 'text_content',
                                        'content_color'    => '#fff',
                                        'content_fontsize' => [
                                            'xl' => 20,
                                            'lg' => 20,
                                            'md' => 20,
                                            'sm' => 16,
                                            'xs' => 14,
                                        ],
                                        'content_animation_type'    => 'slide',
                                        'animation_slide_direction' => 'top',
                                        'animation_duration'        => 800,
                                        'animation_delay'           => 1000,
                                        'animation_slide_from'      => 100,
                                        'animation_timing_function' => 'ease',
                                    ],
                                    [
                                        'btn_content'               => 'LEARN MORE',
                                        'content_type'              => 'btn_content',
                                        'content_color'             => '#fff',
                                        'content_animation_type'    => 'slide',
                                        'animation_slide_direction' => 'top',
                                        'animation_duration'        => 800,
                                        'animation_delay'           => 1000,
                                        'animation_slide_from'      => 100,
                                        'animation_timing_function' => 'ease',
                                    ],
                                ],
                            ],
                            [
                                'slider_img' => ['src' => 'https://sppagebuilder.com/addons/js_slideshow/slideshow-default-bg.jpg'],
                                'content_alignment'     => 'center',
                                'slideshow_inner_items' => [
                                    [
                                        'title_content_title'       => 'THE AMAZING SLIDESHOW ADDON!',
                                        'content_type'              => 'title_content',
                                        'title_heading_selector'    => 'h2',
                                        'content_color'             => '#fff',
                                        'content_animation_type'    => 'slide',
                                        'animation_slide_direction' => 'top',
                                        'animation_duration'        => 800,
                                        'animation_delay'           => 1000,
                                        'animation_slide_from'      => 100,
                                        'animation_timing_function' => 'ease',
                                    ],
                                    [
                                        'content_text'     => '<br>Want to make your website more attractive? Get a stunning hero <br>section with the Slideshow addon in SP Page Builder Pro. <br>It’s easy, fast, and gorgeous.<br><br>',
                                        'content_type'     => 'text_content',
                                        'content_color'    => '#fff',
                                        'content_fontsize' => [
                                            'xl' => 20,
                                            'lg' => 20,
                                            'md' => 20,
                                            'sm' => 16,
                                            'xs' => 14,
                                        ],
                                        'content_animation_type'    => 'slide',
                                        'animation_slide_direction' => 'top',
                                        'animation_duration'        => 800,
                                        'animation_delay'           => 1000,
                                        'animation_slide_from'      => 100,
                                        'animation_timing_function' => 'ease',
                                    ],
                                    [
                                        'btn_content'               => 'LEARN MORE',
                                        'content_type'              => 'btn_content',
                                        'content_color'             => '#fff',
                                        'content_animation_type'    => 'slide',
                                        'animation_slide_direction' => 'top',
                                        'animation_duration'        => 800,
                                        'animation_delay'           => 1000,
                                        'animation_slide_from'      => 100,
                                        'animation_timing_function' => 'ease',
                                    ],
                                ],
                            ],
                        ],

                        'attr' =>  [
                            'content' => [
                                'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
                                'fields' => [
                                    //Admin label
                                    'title' => [
                                        'type'  => 'text',
                                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
                                        'std'   => 'Item number 1',
                                    ],

                                    'slider_bg_options' => [
                                        'type'   => 'buttons',
                                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_BACKGROUND_TYPE'),
                                        'values' => [
                                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'), 'value' => 'bg_image'],
                                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_VIDEO'), 'value' => 'bg_video'],
                                        ],
                                        'std'    => 'bg_image',
                                        'tabs' => true,
                                    ],

                                    'slider_img' => [
                                        'type'  => 'media',
                                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                                        'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_BACKGROUND_IMAGE_DESC'),
                                        'std'   => ['src' => 'https://sppagebuilder.com/addons/js_slideshow/slideshow-default-bg.jpg'],
                                        'depends' => [['slider_bg_options', '!=', 'bg_video']],
                                    ],

                                    'enable_youtube_vimeo' => [
                                        'type'    => 'checkbox',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_YTUBE_VIMEO_VIDEO'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_YTUBE_VIMEO_VIDEO_DESC'),
                                        'std' => 0,
                                        'depends' => [['slider_bg_options', '!=', 'bg_image']],
                                    ],

                                    'youtube_vimeo_url' => [
                                        'type'    => 'text',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_YTUBE_VIMEO_VIDEO_SRC'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_YTUBE_VIMEO_VIDEO_SRC_DESC'),
                                        'depends' => [
                                            ['slider_bg_options', '!=', 'bg_image'],
                                            ['enable_youtube_vimeo', '!=', 0],
                                        ],
                                    ],

                                    'slider_video' => [
                                        'type'    => 'media',
                                        'format'  => 'video',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_VIDEO'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_BACKGROUND_VIDEO_DESC'),
                                        'depends' => [
                                            ['slider_bg_options', '!=', 'bg_image'],
                                            ['enable_youtube_vimeo', '!=', 1],
                                        ],
                                    ],

                                    'video_volume_btn' => [
                                        'type'    => 'checkbox',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_VOLUME_ICON'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_VOLUME_ICON_DESC'),
                                        'depends' => [['slider_bg_options', '!=', 'bg_image']],
                                        'std' => 0,
                                    ],

                                    'slider_overlay_separator' => [
                                        'type' => 'separator',
                                    ],

                                    'slider_overlay_options' => [
                                        'type'   => 'buttons',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_OVERLAY'),
                                        'values' => [
                                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'), 'value' => 'color_overlay'],
                                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'), 'value' => 'gradient_overlay'],
                                        ],
                                        'std'    => 'color_overlay',
                                        'tabs' => true,
                                    ],

                                    'slider_bg_overlay' => [
                                        'type'    => 'color',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_OVERLAY_DESC'),
                                        'depends' => [['slider_overlay_options', '=', 'color_overlay']],
                                    ],

                                    'slider_bg_gradient_overlay' => [
                                        'type' => 'gradient',
                                        'std'  => [
                                            "color"  => "#00ad75",
                                            "color2" => "#8700fc",
                                            "deg"    => "45",
                                            "type"   => "linear"
                                        ],
                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_GD_OVERLAY_DESC'),
                                        'depends' => [['slider_overlay_options', '=', 'gradient_overlay']],
                                    ],

                                    'item_content_separator' => [
                                        'type'  => 'separator',
                                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTENT_GLOBAL_OPTIONS'),
                                    ],

                                    'image_in_column' => [
                                        'type'  => 'checkbox',
                                        'title' => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_IMAGE_IN_COLUMN'),
                                        'desc'  => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_IMAGE_IN_COLUMN_DESC'),
                                        'std'   => 0,
                                    ],
                                    
                                    'image_column_width' => [
                                        'type'    => 'select',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_IMAGE_COLUMN_WIDTH'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_IMAGE_COLUMN_WIDTH_DESC'),
                                        'depends' => [
                                            ['image_in_column', '!=', 0],
                                        ],
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
                                        'std'        => ['xl' => 6],
                                        'responsive' => true,
                                    ],

                                    'image_column_reverse' => [
                                        'type'    => 'checkbox',
                                        'title'   => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_IMAGE_COLUMN_REVERSE'),
                                        'desc'    => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_IMAGE_COLUMN_REVERSE_DESC'),
                                        'std'     => 0,
                                        'depends' => [
                                            ['image_in_column', '!=', 0],
                                        ],
                                    ],
            
                                    'image_content_alignment' => [
                                        'type'   => 'select',
                                        'title'  => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_IMG_CONTENT_ALIGNMENT'),
                                        'values' => [
                                            'left'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                                            'center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
                                            'right'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                                        ],
                                        'std'     => 'left',
                                        'depends' => [
                                            ['image_in_column', '!=', 0],
                                        ],
                                    ],
            
                                    'content_alignment' => [
                                        'type'   => 'select',
                                        'title'  => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_CONTENT_ALIGNMENT'),
                                        'values' => [
                                            'left'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                                            'center' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CENTER'),
                                            'right'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                                        ],
                                        'std' => 'center',
                                    ],

                                    'slideshow_item_padding' => [
                                        'type'       => 'padding',
                                        'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                                        'std'        => '',
                                        'responsive' => true,
                                    ],

                                    'slideshow_item_margin' => [
                                        'type'       => 'margin',
                                        'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                                        'std'        => '',
                                        'responsive' => true,
                                    ],
            
                                    'icon_display_block' => [
                                        'type'  => 'checkbox',
                                        'title' => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_ICON_DISPLAY_BLOCK'),
                                        'desc'  => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_ICON_DISPLAY_BLOCK_DESC'),
                                        'std'   => 0,
                                    ],
                                ],
                            ],

                            'inner_items' =>  [
                                'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ITEMS'),
                                'fields' => [
                                    'slideshow_inner_items' => [
                                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTENTS'),
                                        'type'  => 'repeatable',
                                        'attr'  => [
                                            'general' => [
                                                'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GENERAL'),
                                                'fields' => [
                                                    'content_type' => [
                                                        'type'   => 'select',
                                                        'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPE'),
                                                        'values' => [
                                                            'title_content' => Text::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
                                                            'text_content'  => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_CONTENT_TEXT'),
                                                            'image_content' => Text::_('COM_SPPAGEBUILDER_ADDON_IMAGE'),
                                                            'btn_content'   => Text::_('COM_SPPAGEBUILDER_ADDON_BUTTON'),
                                                            'icon_content'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON_NAME'),
                                                        ],
                                                        'std'     => 'title_content',
                                                    ],

                                                    // Title Type
                                                    'title_content_title' => [
                                                        'type'    => 'textarea',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                                                        'std'     => 'The Amazing Slideshow Addon!',
                                                        'depends' => [['content_type', '=', 'title_content']],
                                                    ],

                                                    'title_heading_selector' => [
                                                        'type' => 'headings',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
                                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
                                                        'std'     => 'h2',
                                                        'depends' => [['content_type', '=', 'title_content']],
                                                    ],

                                                    // Content Type
                                                    'content_text' => [
                                                        'type'    => 'editor',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_TEXT_CONTENT'),
                                                        'std'     => 'Lorem ipsum dolor sit amet, ne eam iusto sapientem persecuti, id noster volumus nec.',
                                                        'depends' => [['content_type', '=', 'text_content']],
                                                    ],

                                                    'content_class' => [
                                                        'type'    => 'text',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CUSTOME_CLASS'),
                                                    ],

                                                    // Image Type
                                                    'image_content' => [
                                                        'type'    => 'media',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_IMAGE'),
                                                        'std' => ['src' => ''],
                                                        'depends' => [['content_type', '=', 'image_content']],
                                                    ],

                                                    // Icon Type
                                                    'icon_content' => [
                                                        'type'    => 'icon',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                                                        'std'     => 'fa-cogs',
                                                        'depends' => [['content_type', '=', 'icon_content']],
                                                    ],

                                                    // Button Type
                                                    'btn_content' => [
                                                        'type'    => 'text',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
                                                        'std'     => 'Learn More',
                                                        'depends' => [['content_type', '=', 'btn_content']],
                                                    ],

                                                    'button_url' => [
                                                        'type'    => 'link',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_URL'),
                                                        'depends' => [['content_type', '=', 'btn_content']],
                                                    ],

                                                    'button_icon_separator' => [
                                                        'type' => 'separator',
                                                        'depends' => [['content_type', '=', 'btn_content']],
                                                    ],

                                                    'button_icon' => [
                                                        'type'    => 'icon',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                                                        'depends' => [['content_type', '=', 'btn_content']],
                                                    ],

                                                    'button_icon_position' => [
                                                        'type'   => 'select',
                                                        'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                                                        'values' => [
                                                            'left'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                                                            'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                                                        ],
                                                        'std' => 'left',
                                                        'depends' => [['content_type', '=', 'btn_content']],
                                                    ],

                                                    'button_icon_margin' => [
                                                        'type'    => 'margin',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                                                        'responsive' => true,
                                                        'std'        => '',
                                                        'depends' => [['content_type', '=', 'btn_content']],
                                                    ],

                                                    'style_separator' => [
                                                        'type' => 'separator',
                                                    ],

                                                    'content_typography' => [
                                                        'type'      => 'typography',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                                                        'fallbacks' => [
                                                            'font'           => 'content_font_family',
                                                            'size'           => 'content_fontsize',
                                                            'line_height'    => 'content_lineheight',
                                                            'letter_spacing' => 'content_letterspacing',
                                                            'custom_letter_spacing' => 'custom_letterspacing',
                                                            'uppercase'      => 'content_font_style.uppercase',
                                                            'italic'         => 'content_font_style.italic',
                                                            'underline'      => 'content_font_style.underline',
                                                            'weight'         => 'content_font_style.weight',
                                                        ],
                                                        'depends' => [['content_type', '!=', 'image_content']],
                                                    ],

                                                    'content_color' => [
                                                        'type'    => 'color',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                                                        'std'     => '#fff',
                                                        'depends' => [['content_type', '!=', 'image_content']],
                                                    ],

                                                    'button_hover_color' => [
                                                        'type'    => 'color',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR_HOVER'),
                                                        'std'     => '#fff',
                                                        'depends' => [['content_type', '=', 'btn_content']]
                                                    ],

                                                    'content_background' => [
                                                        'type'    => 'color',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                                                        'std'     => '',
                                                        'depends' => [['content_type', '!=', 'btn_content']],
                                                    ],

                                                    'image_content_style_separator' => [
                                                        'type' => 'separator',
                                                        'depends' => [['content_type', '=', 'image_content']],
                                                    ],

                                                    'image_content_width' => [
                                                        'type'    => 'slider',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
                                                        'max'        => 2000,
                                                        'responsive' => true,
                                                        'std'        => ['xl' => 400, 'sm' => ''],
                                                        'depends' => [['content_type', '=', 'image_content']],
                                                    ],

                                                    'image_content_height' => [
                                                        'type'    => 'slider',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
                                                        'max'        => 2000,
                                                        'responsive' => true,
                                                        'std'        => ['xl' => 385, 'sm' => ''],
                                                        'depends' => [['content_type', '=', 'image_content']],
                                                    ],

                                                    // Button style
                                                    'button_background_options' => [
                                                        'type'   => 'select',
                                                        'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                                                        'std'    => 'color_bg',
                                                        'values' => [
                                                            'color_bg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                                                            'color_gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT'),
                                                        ],
                                                        'depends' => [['content_type', '=', 'btn_content']]
                                                    ],

                                                    'button_background_color' => [
                                                        'type'    => 'color',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                                                        'std'     => '#444444',
                                                        'depends' => [
                                                            ['content_type', '=', 'btn_content'],
                                                            ['button_background_options', '=', 'color_bg'],
                                                        ],
                                                    ],

                                                    'button_background_gradient' => [
                                                        'type'  => 'gradient',
                                                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                                                        'std'   => [
                                                            "color"  => "#B4EC51",
                                                            "color2" => "#429321",
                                                            "deg"    => "45",
                                                            "type"   => "linear"
                                                        ],
                                                        'depends' => [
                                                            ['content_type', '=', 'btn_content'],
                                                            ['button_background_options', '=', 'color_gradient'],
                                                        ]
                                                    ],

                                                    'button_background_color_hover' => [
                                                        'type'    => 'color',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_HOVER'),
                                                        'std'     => '#222',
                                                        'depends' => [
                                                            ['content_type', '=', 'btn_content'],
                                                            ['button_background_options', '=', 'color_bg'],
                                                        ]
                                                    ],

                                                    'button_background_gradient_hover' => [
                                                        'type'  => 'gradient',
                                                        'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_GRADIENT_HOVER'),
                                                        'std'   => [
                                                            "color"  => "#429321",
                                                            "color2" => "#B4EC51",
                                                            "deg"    => "45",
                                                            "type"   => "linear"
                                                        ],
                                                        'depends' => [
                                                            ['content_type', '=', 'btn_content'],
                                                            ['button_background_options', '=', 'color_gradient'],
                                                        ]
                                                    ],

                                                    'title_separator' => [
                                                        'type' => 'separator',
                                                    ],

                                                    'title' => [
                                                        'type'  => 'text',
                                                        'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
                                                        'std'   => 'The Amazing Slideshow Addon!',
                                                    ],
                                                ],
                                            ],

                                            'style' => [
                                                'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                                                'fields' => [
                                                    'content_text_shadow' => [
                                                        'type'   => 'boxshadow',
                                                        'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_SHADOW'),
                                                        'config' => ['spread' => false],
                                                        'std' => '0 0 0 #ffffff',
                                                        'depends' => [['content_type', '!=', 'image_content']],
                                                    ],

                                                    'btn_box_shadow' => [
                                                        'type'    => 'boxshadow',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BOXSHADOW'),
                                                        'std' => '0 0 0 0 #ffffff',
                                                        'depends' => [
                                                            ['content_type', '!=', 'text_content'],
                                                            ['content_type', '!=', 'icon_content'],
                                                            ['content_type', '!=', 'title_content'],
                                                        ],
                                                    ],

                                                    'content_border_separator' => [
                                                        'type' => 'separator',
                                                        'depends' => [['content_type', '!=', 'image_content']],
                                                    ],

                                                    'content_border' => [
                                                        'type'    => 'margin',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                                                        'std'     => '',
                                                    ],

                                                    'content_border_color' => [
                                                        'type'    => 'color',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                                                        'std'     => '',
                                                    ],

                                                    'button_hover_border_color' => [
                                                        'type'    => 'color',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR_HOVER'),
                                                        'std'     => '#fff',
                                                        'depends' => [['content_type', '=', 'btn_content']]
                                                    ],

                                                    'content_border_radius' => [
                                                        'type'    => 'slider',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                                                        'std'     => '',
                                                    ],

                                                    'content_spacing_separator' => [
                                                        'type' => 'separator',
                                                    ],

                                                    'content_padding' => [
                                                        'type'       => 'padding',
                                                        'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                                                        'std'        => '',
                                                        'responsive' => true,
                                                    ],

                                                    'content_margin' => [
                                                        'type'       => 'margin',
                                                        'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                                                        'std'        => '',
                                                        'responsive' => true,
                                                    ],
                                                ],
                                            ],

                                            'animation' => [
                                                'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ANIMATION'),
                                                'fields' => [
                                                    'content_animation_type' => [
                                                        'type'   => 'select',
                                                        'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPE'),
                                                        'values' => [
                                                            'slide'        => 'Slide',
                                                            'rotate'       => 'Rotate',
                                                            'text-animate' => 'Text Animate',
                                                            'zoom'         => 'Zoom',
                                                        ],
                                                        'std' => 'slide'
                                                    ],

                                                    'animation_slide_direction' => [
                                                        'type'   => 'select',
                                                        'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_SLIDE_DIRECTION'),
                                                        'values' => [
                                                            'top'    => 'Top',
                                                            'right'  => 'Right',
                                                            'bottom' => 'Bottom',
                                                            'left'   => 'Left',
                                                        ],
                                                        'std' => 'bottom',
                                                        'depends' => [
                                                            ['content_animation_type', '!=', 'rotate'],
                                                            ['content_animation_type', '!=', 'zoom'],
                                                        ],
                                                    ],

                                                    'animation_duration' => [
                                                        'type'    => 'number',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ANIMATION_DURATION'),
                                                        'std' => 800,
                                                    ],

                                                    'animation_delay' => [
                                                        'type'    => 'number',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ANIMATION_DELAY'),
                                                        'std' => 1000,
                                                    ],

                                                    'animation_slide_from' => [
                                                        'type'    => 'slider',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_SLIDE_FROM'),
                                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_SLIDE_FROM_DESC'),
                                                        'min' => -100,
                                                        'max' => 100,
                                                        'std' => '100',
                                                        'depends' => [['content_animation_type', '=', 'slide']],
                                                    ],

                                                    'animation_rotate_from' => [
                                                        'type'    => 'slider',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_ROTATE_FROM'),
                                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_ROTATE_FROM_DESC'),
                                                        'max' => 360,
                                                        'std' => '360',
                                                        'depends' => [['content_animation_type', '=', 'rotate']],
                                                    ],

                                                    'animation_rotate_to' => [
                                                        'type'    => 'slider',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_ROTATE_TO'),
                                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_ROTATE_TO_DESC'),
                                                        'max' => 360,
                                                        'std' => '0',
                                                        'depends' => [['content_animation_type', '=', 'rotate']],
                                                    ],

                                                    'animation_timing_function' => [
                                                        'type'    => 'select',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_TIMINIG_FUNCTION'),
                                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_TIMINIG_FUNCTION_DESC'),
                                                        'values' => [
                                                            'ease'         => 'Ease',
                                                            'ease-in'      => 'Ease In',
                                                            'ease-out'     => 'Ease Out',
                                                            'ease-in-out'  => 'Ease In Out',
                                                            'linear'       => 'Linear',
                                                            'cubic-bezier' => 'Cubic Bezier',
                                                        ],
                                                        'std' => 'ease',
                                                        'depends' => [['content_animation_type', '!=', 'zoom']],
                                                    ],

                                                    'animation_cubic_bezier_value' => [
                                                        'type'    => 'text',
                                                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_CUBIC_BEZIER'),
                                                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_ANIMATION_CUBIC_BEZIER_DESC'),
                                                        'std' => '0,0.46,0,0.63',
                                                        'depends' => [
                                                            ['content_animation_type', '!=', 'width'],
                                                            ['content_animation_type', '!=', 'zoom'],
                                                            ['animation_timing_function', '=', 'cubic-bezier'],
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

                    'content_container_separator' => [
                        'type' => 'separator',
                    ],

                    'content_container_option' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTAINER_OPTION'),
                        'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTAINER_OPTION_DESC'),
                        'values' => [
                            'bootstrap' => Text::_('Bootstrap'),
                            'custom'    => Text::_('Custom'),
                        ],
                        'std' => 'bootstrap',
                    ],

                    'content_container_width' => [
                        'type'       => 'slider',
                        'title'      => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_CONTAINER'),
                        'desc'       => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ITEM_CONTAINER_DESC'),
                        'std'        => ['xl' => 75],
                        'max'        => 100,
                        'responsive' => true,
                        'depends'    => [['content_container_option', '=', 'custom']],
                    ],

                    'content_vertical_alignment' => [
                        'type'  => 'checkbox',
                        'title' => Text::_('COM_SPPAGEBUILDER_JS_SLIDER_CONTENT_VERTICAL_ALIGNMENT'),
                        'std'   => 1,
                    ],
                ],
            ],

            'options' => [
                'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
                'fields' => [
                    'height' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_HEIGHT'),
                        'values' => [
                            'full'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_WIN_HEIGHT'),
                            'custom' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CUS_HEIGHT'),
                        ],
                        'std'     => 'full'
                    ],

                    'custom_height' => [
                        'type'       => 'slider',
                        'title'      => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
                        'max'        => 4000,
                        'std'        => ['xl' => 900, 'lg' => 900, 'md' => 900, 'sm' => 600, 'xs' => 350],
                        'responsive' => true,
                        'depends'    => [['height', '!=', 'full']]
                    ],

                    'slider_animation_separator' => [
                        'type' => 'separator',
                    ],

                    'slider_animation' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ANIMATION'),
                        'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ANIMATION_DESC'),
                        'values' => [
                            'slide'  => 'Slide',
                            'stack'  => 'Stack',
                            'clip'   => 'Clip',
                            'bubble' => 'Bubble',
                            'fade'   => 'Fade',
                            '3D'     => '3D',
                        ],
                        'std'     => 'slide'
                    ],

                    'slide_vertically' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_VERTICALLY'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_VERTICALLY_DESC'),
                        'std'     => 0,
                        'depends' => [['slider_animation', '=', 'stack']]
                    ],

                    'three_d_rotate' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_3D_ROTATE'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_3D_ROTATE_DESC'),
                        'max'     => 90,
                        'min'     => -90,
                        'std'     => 15,
                        'depends' => [['slider_animation', '=', '3D']]
                    ],

                    'autoplay' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_AUTOPLAY'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_AUTOPLAY_DESC'),
                        'std'     => 0,
                    ],

                    'pause_on_hover' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_PAUSE'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_PAUSE_DESC'),
                        'std'     => 0,
                        'depends' => [['autoplay', '=', 1]]
                    ],

                    'interval' => [
                        'type'    => 'number',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_INTERVAL'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_INTERVAL_DESC'),
                        'std'     => 5,
                    ],

                    'speed' => [
                        'type'    => 'number',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SPEED'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SPEED_DESC'),
                        'std'     => 800,
                    ],

                    'timer' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_TIMER'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_TIMER_DESC'),
                        'std'     => 1,
                    ],

                    'timer_bg_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TIMER_BG_COLOR'),
                        'std'     => '',
                    ],

                    'timer_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TIMER_COLOR'),
                        'std'     => '',
                    ],

                    'timer_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TIMER_WIDTH'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TIMER_WIDTH_DESC'),
                        'min'        => 1,
                        'max'        => 100,
                        'responsive' => true,
                        'step'       => .1,
                        'std'        => ['md' => ''],
                        'depends' => [['timer', '=', 1]],
                    ],

                    'timer_top_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TIMER_TOP_GAP'),
                        'min'        => 0,
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['md' => ''],
                        'depends' => [['timer', '=', 1]],
                    ],

                    'timer_left_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TIMER_LEFT_GAP'),
                        'min'        => 0,
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['md' => ''],
                        'depends' => [['timer', '=', 1]],
                    ],

                    // counter
                    'slide_counter' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_NUMBER'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_NUMBER_DESC'),
                        'std'     => 0,
                    ],


                    'slide_counter_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_NUMBER_COLOR'),
                        'depends' => [['slide_counter', '=', 1]]
                    ],

                    'slide_counter_fontsize' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_NUMBER_FONTSIZE'),
                        'min'        => 5,
                        'max'        => 100,
                        'responsive' => true,
                        'std'        => ['xl' => 22],
                        'depends' => [['slide_counter', '=', 1]]
                    ],

                    'slide_counter_fontfamily' => [
                        'type'    => 'fonts',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_NUMBER_FONTFAMILY'),
                        'depends' => [['slide_counter', '=', 1]]
                    ],
                    'slide_counter_bg_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_NUMBER_BG'),
                        'depends' => [['slide_counter', '=', 1]]
                    ],
                    'slide_counter_padding' => [
                        'type'    => 'padding',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_NUMBER_PADDING'),
                        'responsive' => true,
                        'std'        => '0px 0px 0px 0px',
                        'depends' => [['slide_counter', '=', 1]]
                    ],

                    'slide_counter_gap_bottom' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_NUMBER_GAP_BOTTOM'),
                        'min'        => 0,
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 20],
                        'depends' => [['slide_counter', '=', 1]]
                    ],

                    'slide_counter_gap_left' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_NUMBER_GAP_LEFT'),
                        'min'        => 0,
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 20],
                        'depends' => [['slide_counter', '=', 1]]
                    ],

                    'class' => [
                        'type'    => 'text',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
                        'std'     => '',
                    ],
                ],
            ],

            'bullets_options' => [
                'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_CONTROLLERS'),
                'fields' => [
                    'dot_controllers' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_CONTROLLERS'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_CONTROLLERS_DESC'),
                        'std'     => 1,
                        'is_header' => 1,
                    ],

                    'dot_controllers_style' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_STYLE'),
                        'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_STYLE_DESC'),
                        'values' => [
                            'dot'        => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_STYLE_DOT'),
                            'line'       => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_STYLE_LINE'),
                            'with_image' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_IMAGE_WITH'),
                            'with_text'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_WITH_TEXT'),
                        ],
                        'std'     => 'dot',
                        'depends' => [['dot_controllers', '!=', 0]],
                    ],

                    'line_indecator' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_LINE_INDECATOR'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_LINE_INDECATOR_DESC'),
                        'std'     => 1,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'line'],
                        ]
                    ],

                    'dot_controllers_position' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                        'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_POSITION_DESC'),
                        'values' => [
                            'bottom_center'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_BOTTOM_CENTER'),
                            'bottom_left'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_BOTTOM_LEFT'),
                            'bottom_right'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_BOTTOM_RIGHT'),
                            'vertical_left'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_VERTI_LEFT'),
                            'vertical_right' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_VERTI_RIGHT'),
                        ],
                        'std'     => 'bottom_center',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                        ],
                    ],

                    'dot_controllers_margin_separator_start' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                        ],
                    ],

                    'dot_controllers_bottom_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_DOT_POSITION_FROM_BOTTOM'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controllers_position', '!=', 'vertical_left'],
                            ['dot_controllers_position', '!=', 'vertical_right'],
                        ],
                    ],

                    'dot_controllers_left_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_DOT_POSITION_FROM_LEFT'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controllers_position', '!=', 'bottom_center'],
                            ['dot_controllers_position', '!=', 'bottom_right'],
                            ['dot_controllers_position', '!=', 'vertical_right'],
                        ],
                    ],

                    'dot_controllers_right_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_DOT_POSITION_FROM_RIGHT'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controllers_position', '!=', 'bottom_center'],
                            ['dot_controllers_position', '!=', 'bottom_left'],
                            ['dot_controllers_position', '!=', 'vertical_left'],
                        ],
                    ],

                    'dot_controllers_margin_separator_end' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                        ],
                    ],

                    'dot_controller_style_option' => [
                        'type'   => 'buttons',
                        'std'    => 'dot_normal',
                        'values' => [
                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'dot_normal'],
                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ACTIVE'), 'value' => 'dot_active'],
                        ],
                        'tabs'    => true,
                        'depends' => [['dot_controllers_style', '!=', 'with_text']]
                    ],

                    'dot_ctlr_height' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
                        'max' => 100,
                        'std' => 18,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ],
                    ],

                    'dot_ctlr_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
                        'max' => 100,
                        'std' => 18,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ],
                    ],

                    'dot_ctlr_bg_separator' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ]
                    ],

                    'dot_ctlr_bg' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                        'std'     => '',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ]
                    ],

                    'dot_ctlr_border_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                        'std'     => '',
                        'max'     => 20,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ]
                    ],

                    'dot_ctlr_border_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                        'std'     => '',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ]
                    ],

                    'dot_ctlr_border_radius' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS_DESC'),
                        'max' => 100,
                        'std' => 18,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ],
                    ],

                    'dot_ctlr_margin_separator' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ]
                    ],

                    'dot_ctlr_margin' => [
                        'type'    => 'margin',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_MARGIN'),
                        'std'     => '',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_normal'],
                        ]
                    ],

                    'dot_ctlr_hover_height' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
                        'std'     => '',
                        'max'     => 100,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_active'],
                        ]
                    ],

                    'dot_ctlr_hover_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
                        'std'     => '',
                        'max'     => 100,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_active'],
                        ]
                    ],

                    'dot_ctlr_center_bg_separator' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_active'],
                        ]
                    ],

                    'dot_ctlr_center_bg' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                        'std'     => '',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controllers_style', '!=', 'with_image'],
                            ['dot_controller_style_option', '=', 'dot_active'],
                        ]
                    ],

                    'dot_ctlr_hover_border_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                        'std'     => '',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '!=', 'with_text'],
                            ['dot_controller_style_option', '=', 'dot_active'],
                        ]
                    ],

                    //Text thumbnail style
                    'text_thumb_ctlr_wrap_separator_start' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ]
                    ],

                    'text_thumb_ctlr_wrap_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TEXT_THUMB_WIDTH'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TEXT_THUMB_WIDTH_DESC'),
                        'max'        => 100,
                        'responsive' => true,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_ctlr_wrap_bg' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TEXT_THUMB_BG'),
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_ctlr_wrap_padding' => [
                        'type'    => 'padding',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TEXT_THUMB_PADDING'),
                        'responsive' => true,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_ctlr_individual_width_start' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ]
                    ],

                    'text_thumb_ctlr_individual_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TEXT_THUMB_ITEM_WIDTH'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_TEXT_THUMB_ITEM_WIDTH_DESC'),
                        'max'        => 500,
                        'responsive' => true,
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_number_separator' => [
                        'type'    => 'separator',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_NUMBER'),
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ]
                    ],

                    // @todo: need to work on the frontend
                    'text_thumb_number_typography' => [
                        'type'    => 'typography',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                        'fallbacks'   => [
                            'font' => 'text_thumb_number_font_family',
                            'size' => 'text_thumb_number_font_size',
                            'weight' => 'text_thumb_number_font_weight',
                        ],
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_number_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_title_separator' => [
                        'type'    => 'separator',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TITLE'),
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ]
                    ],

                    // @todo: need to work on the frontend
                    'text_thumb_title_typography' => [
                        'type'    => 'typography',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                        'fallbacks'   => [
                            'font' => 'text_thumb_title_font_family',
                            'size' => 'text_thumb_title_font_size',
                            'line_height' => 'text_thumb_title_lineheight',
                            'weight' => 'text_thumb_title_font_weight',
                        ],
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_title_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_subtitle_separator' => [
                        'type'    => 'separator',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUB_TITLE'),
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ]
                    ],

                    // @todo: need to work on the frontend
                    'text_thumb_subtitle_typography' => [
                        'type'    => 'typography',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                        'fallbacks'   => [
                            'font' => 'text_thumb_subtitle_font_family',
                            'size' => 'text_thumb_subtitle_font_size',
                            'weight' => 'text_thumb_subtitle_font_weight',
                        ],
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                        ],
                    ],

                    'text_thumb_subtitle_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'depends' => [
                            ['dot_controllers', '!=', 0],
                            ['dot_controllers_style', '=', 'with_text'],
                            ['text_thumb_cont_style', '=', 'thumb_subtitle'],
                        ],
                    ],
                ],
            ],

            // Arrow options
            'arrow_options' => [
                'title' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_ARROWS'),
                'fields' => [
                    'arrow_controllers' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_ARROWS'),
                        'desc'    => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_SHOW_ARROWS_DESC'),
                        'std'     => 1,
                        'is_header' => 1,
                    ],

                    'arrow_on_hover' => [
                        'type'    => 'checkbox',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_ON_HOVER'),
                        'std'     => 0,
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    'arrow_controllers_style' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_STYLE'),
                        'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_STYLE_DESC'),
                        'values' => [
                            'spread' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_STYLE_SPREAD'),
                            'along'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_STYLE_ALONG_WITH'),
                        ],
                        'std'     => 'spread',
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    'arrow_controllers_content' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_CONTENT'),
                        'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_CONTENT_DESC'),
                        'values' => [
                            'text_only'      => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_CONTENT_TEXT'),
                            'icon_only'      => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_CONTENT_ICON'),
                            'long_arrow'     => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_LONG_ARROW'),
                            'icon_with_text' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROWS_CONTENT_ICON_TEXT'),
                        ],
                        'std'     => 'icon_only',
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    'arrow_controllers_position' => [
                        'type'   => 'select',
                        'title'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_POSITION'),
                        'desc'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_POSITION_DESC'),
                        'values' => [
                            'bottom_center' => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_BOTTOM_CENTER'),
                            'bottom_left'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_BOTTOM_LEFT'),
                            'bottom_right'  => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_CONTROLLERS_BOTTOM_RIGHT'),
                        ],
                        'std'     => 'bottom_center',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_controllers_style', '!=', 'spread'],
                        ],
                    ],

                    'arrow_controllers_bottom_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_POSITION_FROM_BOTTOM'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_controllers_style', '!=', 'spread'],
                            ['arrow_controllers_position', '!=', ''],
                        ],
                    ],

                    'arrow_controllers_left_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_POSITION_FROM_LEFT'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_controllers_style', '!=', 'spread'],
                            ['arrow_controllers_position', '=', 'bottom_left'],
                        ],
                    ],

                    'arrow_controllers_right_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_POSITION_FROM_RIGHT'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_controllers_style', '!=', 'spread'],
                            ['arrow_controllers_position', '=', 'bottom_right'],
                        ],
                    ],

                    'arrow_spread_controllers_left_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_POSITION_FROM_LEFT'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_controllers_style', '=', 'spread'],
                        ],
                    ],

                    'arrow_spread_controllers_right_gap' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_ADDON_JS_SLIDER_ARROW_POSITION_FROM_RIGHT'),
                        'max'        => 2500,
                        'responsive' => true,
                        'std'        => ['xl' => 50],
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_controllers_style', '=', 'spread'],
                        ],
                    ],

                    'arrow_ctlr_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_WIDTH'),
                        'max'        => 300,
                        'responsive' => true,
                        'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    'arrow_ctlr_height' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_HEIGHT'),
                        'max'        => 300,
                        'responsive' => true,
                        'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    'arrow_ctlr_font_size' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_FONT_SIZE'),
                        'max'        => 100,
                        'responsive' => true,
                        'std'        => ['xl' => '', 'lg' => '', 'md' => '', 'sm' => '', 'xs' => ''],
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    // Style
                    'arrow_style_separator' => [
                        'type'    => 'separator',
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    'arrow_style' => [
                        'type'   => 'buttons',
                        'std'    => 'arrow_normal',
                        'values' => [
                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_NORMAL'), 'value' => 'arrow_normal'],
                            ['label' => Text::_('COM_SPPAGEBUILDER_GLOBAL_HOVER'), 'value' => 'arrow_hover'],
                        ],
                        'tabs'    => true,
                        'depends' => [['arrow_controllers', '!=', 0]],
                    ],

                    'arrow_ctlr_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'std'     => '',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_hover'],
                        ]
                    ],

                    'arrow_ctlr_background' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                        'std'     => '',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_hover'],
                        ]
                    ],

                    'arrow_ctlr_border_separator' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_hover'],
                        ],
                    ],

                    'arrow_ctlr_border_width' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                        'std'     => '',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_hover'],
                        ]
                    ],

                    'arrow_ctlr_border_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                        'std'     => '',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_hover'],
                        ]
                    ],

                    'arrow_ctlr_border_radius' => [
                        'type'    => 'slider',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_RADIUS'),
                        'std' => '50',
                        'max' => 300,
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_hover'],
                        ],
                    ],

                    //Arrow hover
                    'arrow_ctlr_hover_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                        'std'     => '',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_normal'],
                        ]
                    ],

                    'arrow_ctlr_hover_background' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND'),
                        'std'     => '',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_normal'],
                        ]
                    ],

                    'arrow_ctlr_hover_border_color_separator' => [
                        'type'    => 'separator',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_normal'],
                        ]
                    ],

                    'arrow_ctlr_hover_border_color' => [
                        'type'    => 'color',
                        'title'   => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                        'std'     => '',
                        'depends' => [
                            ['arrow_controllers', '!=', 0],
                            ['arrow_style', '!=', 'arrow_normal'],
                        ]
                    ],
                ],
            ],
        ],
    ]
);
