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
    'type' => 'content',
    'addon_name' => 'articles',
    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES'),
    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_DESC'),
    'category' => 'Content',
    'icon' => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path opacity=".5" d="M11.643 9.571h-.603L8.138 1.246A.363.363 0 007.804 1h-1.63a.363.363 0 00-.335.246L2.937 9.57h-.58c-.2 0-.357.179-.357.358v.714c0 .2.156.357.357.357h3.036a.367.367 0 00.357-.357v-.714a.384.384 0 00-.357-.358h-.536l.58-1.785h3.08l.604 1.785h-.514c-.2 0-.357.179-.357.358v.714c0 .2.156.357.357.357h3.036a.367.367 0 00.357-.357v-.714a.384.384 0 00-.357-.358zm-5.76-3.28l.938-2.769c.09-.357.157-.647.179-.78 0 .155.045.446.156.78l.938 2.768h-2.21z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M30 16a1 1 0 01-1 1H3a1 1 0 110-2h26a1 1 0 011 1zM30 23a1 1 0 01-1 1H3a1 1 0 110-2h26a1 1 0 011 1zM16 30a1 1 0 01-1 1H3a1 1 0 110-2h12a1 1 0 011 1zM30 9a1 1 0 01-1 1H16a1 1 0 110-2h13a1 1 0 011 1zM30 2a1 1 0 01-1 1H16a1 1 0 110-2h13a1 1 0 011 1z" fill="currentColor"/></svg>',
    'settings' => [
        'source' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CONTENT'),
            'fields' => [
                'resource' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_DESC'),
                    'values' => [
                        'article' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_ARTICLE'),
                        'k2' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_K2'),
                    ],
                    'std' => 'article',
                ],

                'catid' => [
                    'type' => 'category',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID_DESC'),
                    'multiple' => true,
                    'depends' => [['resource', '=', 'article']],
                ],

                'tagids' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_TAGS'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_TAGS_DESC'),
                    'values' => SpPgaeBuilderBase::getArticleTags(),
                    'multiple' => true,
                    'depends' => [['resource', '=', 'article']],
                ],

                'k2catid' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_K2_CATID'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_K2_CATID_DESC'),
                    'values' => SpPgaeBuilderBase::k2CatList(),
                    'multiple' => true,
                    'depends' => [['resource', '=', 'k2']],
                    'inline' => true,
                ],

                'post_type' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_DESC'),
                    'values' => [
                        '' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_ALL'),
                        'standard' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_STANDARD'),
                        'audio' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_AUDIO'),
                        'video' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_VIDEO'),
                        'gallery' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_GALLERY'),
                        'link' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_LINK'),
                        'quote' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_QUOTE'),
                        'status' => Text::_('COM_SPPAGEBUILDER_ADDON_POST_TYPE_STATUS'),
                    ],
                    'depends' => [['resource', '=', 'article']],
                ],

                'ordering' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_DESC'),
                    'values' => [
                        'latest' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_LATEST'),
                        'oldest' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_OLDEST'),
                        'hits' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_POPULAR'),
                        'featured' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_FEATURED'),
                        'alphabet_asc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_ALPHABET_ASC'),
                        'alphabet_desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_ALPHABET_DESC'),
                        'random' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_RANDOM'),
                    ],
                    'std' => 'latest',
                ],

                'include_subcat' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_INCLUDE_SUBCATEGORIES'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_INCLUDE_SUBCATEGORIES_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 1,
                ],
            ],
        ],

        'options' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_OPTIONS'),
            'fields' => [
                'limit' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT_DESC'),
                    'min' => 1,
                    'std' => 3,
                ],

                'columns' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_COLUMNS'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_COLUMNS_DESC'),
                    'min' => 1,
                    'max' => 6,
                    'std' => ['xl' => 3],
                    'responsive' => true,
                ],

                'intro_limit' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_INTRO_LIMIT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_INTRO_LIMIT_DESC'),
                    'std' => 200,
                ],

                'show_intro' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_INTRO'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_INTRO_DESC'),
                    'std' => '1',
                ],

                'show_custom_field' => [
                    'type'  => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CUSTOM_FIELD'),
                    'desc'  => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CUSTOM_FIELD_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 1,
                ],

                'hide_thumbnail' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HIDE_THUMBNAIL'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HIDE_THUMBNAIL_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 0,
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
                    'depends' => [
                        ['resource', '!=', 'k2'],
                        ['post_type', '!=', 'audio'], 
                        ['post_type', '!=', 'video'], 
                        ['post_type', '!=', 'gallery'],
                        ['post_type', '!=', 'link'],
                        ['post_type', '!=', 'quote'],
                        ['post_type', '!=', 'status'],
                        ['hide_thumbnail', '=', 0],
                    ],
                    'std' => 'image_thumbnail',
                ],

                'show_author' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_AUTHOR'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_AUTHOR_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 1,
                ],

                'show_tags' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_TAGS'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_TAGS_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 1,
                ],

                'show_category' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 1,
                ],

                'show_date' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 1,
                ],

                'show_date_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE_TEXT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE_TEXT_DESC'),
                    'std' => '',
                    'inline' => true,
                    'depends' => [['show_date', '=', '1']],
                ],

                'show_last_modified_date' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_LAST_MODIFIED_DATE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_LAST_MODIFIED_DATE_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 0,
                ],

                'show_last_modified_date_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_LAST_MODIFIED_DATE_TEXT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_LAST_MODIFIED_DATE_TEXT_DESC'),
                    'std' => '',
                    'inline' => true,
                    'depends' => [['show_last_modified_date', '=', '1']],
                ],

                'show_readmore' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_READMORE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_READMORE_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 1,
                ],

                'readmore_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_READMORE_TEXT'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_READMORE_TEXT_DESC'),
                    'std' => 'Read More',
                    'inline' => true,
                    'depends' => [['show_readmore', '=', '1']],
                ],
            ],
        ],

        'button' => [
            'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON'),
            'fields' => [
                'link_articles' => [
                    'type' => 'checkbox',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ALL_ARTICLES_BUTTON'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ALL_ARTICLES_BUTTON_DESC'),
                    'values' => [
                        1 => Text::_('COM_SPPAGEBUILDER_YES'),
                        0 => Text::_('COM_SPPAGEBUILDER_NO'),
                    ],
                    'std' => 0,
                    'is_header' => true,
                ],

                'link_catid' => [
                    'type' => 'category',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID_DESC'),
                    'depends' => [
                        ['resource', '=', 'article'],
                        ['link_articles', '=', '1']
                    ],
                ],

                'link_k2catid' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_ADDON_K2_CATID'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_ADDON_K2_CATID_DESC'),
                    'values' => SpPgaeBuilderBase::k2CatList(),
                    'depends' => [
                        ['resource', '=', 'k2'],
                        ['link_articles', '=', '1']
                    ],
                ],

                'all_articles_btn_text' => [
                    'type' => 'text',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LABEL'),
                    'std' => 'See all posts',
                    'inline' => true,
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_url' => [
                    'type' => 'link',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_typography' => [
                    'type' => 'typography',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TYPOGRAPHY'),
                    'fallbacks' => [
                        'font' => 'all_articles_btn_font_family',
                        'letter_spacing' => 'all_articles_btn_letterspace',
                        'weight' => 'all_articles_btn_font_style.weight',
                        'italic' => 'all_articles_btn_font_style.italic',
                        'underline' => 'all_articles_btn_font_style.underline',
                        'uppercase' => 'all_articles_btn_font_style.uppercase',
                    ],
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_type' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_STYLE_DESC'),
                    'values' => [
                        'default' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DEFAULT'),
                        'primary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PRIMARY'),
                        'secondary' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SECONDARY'),
                        'success' => Text::_('COM_SPPAGEBUILDER_GLOBAL_SUCCESS'),
                        'info' => Text::_('COM_SPPAGEBUILDER_GLOBAL_INFO'),
                        'warning' => Text::_('COM_SPPAGEBUILDER_GLOBAL_WARNING'),
                        'danger' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DANGER'),
                        'dark' => Text::_('COM_SPPAGEBUILDER_GLOBAL_DARK'),
                        'link' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LINK'),
                        'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'std' => 'custom',
                    'inline' => true,
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_link_padding_bottom' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_PADDING_BOTTOM'),
                    'max' => 100,
                    'std' => '',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                    ],
                ],

                'all_articles_btn_appearance' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_DESC'),
                    'values' => [
                        '' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_FLAT'),
                        'gradient' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_GRADIENT'),
                        'outline' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_APPEARANCE_OUTLINE'),
                    ],
                    'std' => '',
                    'inline' => true,
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_shape' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_DESC'),
                    'values' => [
                        'rounded' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUNDED'),
                        'square' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_SQUARE'),
                        'round' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SHAPE_ROUND'),
                    ],
                    'std' => 'rounded',
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_size' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DESC'),
                    'values' => [
                        '' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_DEFAULT'),
                        'lg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_LARGE'),
                        'xlg' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_XLARGE'),
                        'sm' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_SMALL'),
                        'xs' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_SIZE_EXTRA_SAMLL'),
                        'custom' => Text::_('COM_SPPAGEBUILDER_GLOBAL_CUSTOM'),
                    ],
                    'inline' => true,
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_padding' => [
                    'type' => 'padding',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_PADDING'),
                    'responsive' => true,
                    'std' => ['xl' => '8px 22px 10px 22px', 'lg' => '8px 22px 10px 22px', 'md' => '8px 22px 10px 22px', 'sm' => '8px 22px 10px 22px', 'xs' => '8px 22px 10px 22px'],
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_size', '=', 'custom'],
                    ],
                ],

                'all_articles_btn_block' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_BLOCK'),
                    'values' => [
                        '' => Text::_('JNO'),
                        'sppb-btn-block' => Text::_('JYES'),
                    ],
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '!=', 'link'],
                    ],
                ],

                'all_articles_btn_icon_separator' => [
                    'type' => 'separator',
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_icon' => [
                    'type' => 'icon',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_ICON'),
                    'desc' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_ICON_DESC'),
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_icon_position' => [
                    'type' => 'select',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_POSITION'),
                    'values' => [
                        'left' => Text::_('COM_SPPAGEBUILDER_GLOBAL_LEFT'),
                        'right' => Text::_('COM_SPPAGEBUILDER_GLOBAL_RIGHT'),
                    ],
                    'std' => 'left',
                    'depends' => [
                        ['link_articles', '=', '1'],
                    ],
                ],

                'all_articles_btn_status_separator' => [
                    'type' => 'separator',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'custom'],
                    ],
                ],

                'all_articles_btn_status' => [
                    'type' => 'buttons',
                    'std' => 'normal',
                    'values' => [
                        ['label' => 'Normal', 'value' => 'normal'],
                        ['label' => 'Hover', 'value' => 'hover'],
                    ],
                    'tabs' => true,
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'custom'],
                    ],
                ],

                'all_articles_btn_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'custom'],
                        ['all_articles_btn_status', '=', 'normal'],
                    ],
                ],

                'all_articles_btn_background_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
                    'std' => '#3366FF',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_appearance', '!=', 'gradient'],
                        ['all_articles_btn_type', '=', 'custom'],
                        ['all_articles_btn_status', '=', 'normal'],
                    ],
                ],

                'all_articles_btn_background_gradient' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
                    'std' => [
                        "color" => "#3366FF",
                        "color2" => "#0037DD",
                        "deg" => "45",
                        "type" => "linear",
                    ],
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_appearance', '=', 'gradient'],
                        ['all_articles_btn_type', '=', 'custom'],
                        ['all_articles_btn_status', '=', 'normal'],
                    ],
                ],

                'all_articles_btn_color_hover' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
                    'std' => '#FFFFFF',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'custom'],
                        ['all_articles_btn_status', '=', 'hover'],
                    ],
                ],

                'all_articles_btn_background_color_hover' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
                    'std' => '#0037DD',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_appearance', '!=', 'gradient'],
                        ['all_articles_btn_type', '=', 'custom'],
                        ['all_articles_btn_status', '=', 'hover'],
                    ],
                ],

                'all_articles_btn_background_gradient_hover' => [
                    'type' => 'gradient',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BACKGROUND_COLOR'),
                    'std' => [
                        "color" => "#0037DD",
                        "color2" => "#3366FF",
                        "deg" => "45",
                        "type" => "linear",
                    ],
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_appearance', '=', 'gradient'],
                        ['all_articles_btn_type', '=', 'custom'],
                        ['all_articles_btn_status', '=', 'hover'],
                    ],
                ],

                // link button
                'all_articles_btn_link_separator' => [
                    'type' => 'separator',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                    ],
                ],

                'all_articles_btn_link_status' => [
                    'type' => 'buttons',
                    'std' => 'normal',
                    'values' => [
                        ['label' => 'Normal', 'value' => 'normal'],
                        ['label' => 'Hover', 'value' => 'hover'],
                    ],
                    'tabs' => true,
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                    ],
                ],

                'all_articles_btn_link_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_COLOR'),
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                        ['all_articles_btn_link_status', '!=', 'hover'],
                    ],
                ],

                'all_articles_btn_link_border_width' => [
                    'type' => 'slider',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_WIDTH'),
                    'max' => 30,
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                        ['all_articles_btn_link_status', '!=', 'hover'],
                    ],
                ],

                'all_articles_btn_link_border_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                    'std' => '',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                        ['all_articles_btn_link_status', '!=', 'hover'],
                    ],
                ],

                //Link Hover
                'all_articles_btn_link_hover_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_TEXT_COLOR'),
                    'std' => '',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                        ['all_articles_btn_link_status', '=', 'hover'],
                    ],
                ],

                'all_articles_btn_link_border_hover_color' => [
                    'type' => 'color',
                    'title' => Text::_('COM_SPPAGEBUILDER_GLOBAL_BORDER_COLOR'),
                    'std' => '',
                    'depends' => [
                        ['link_articles', '=', '1'],
                        ['all_articles_btn_type', '=', 'link'],
                        ['all_articles_btn_link_status', '=', 'hover'],
                    ],
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
                        'font' => 'font_family',
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

                'title_margin_separator' => [
                    'type' => 'separator',
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
