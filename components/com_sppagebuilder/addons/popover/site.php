<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Uri\Uri;

//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonPopover extends SppagebuilderAddons
{

	/**
	 * The render method of the Popover addon.
	 *
	 * @return 	string
	 * @since 	5.1.0
	 */
	public function render()
	{
		$settings = $this->addon->settings;

		$addon_title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$addon_title_position = (isset($settings->title_position) && $settings->title_position) ? $settings->title_position : 'top';
		$addon_heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

		$output = "";

		$output .= '<div class="sppb-addon sppb-addon-popover">';
		$output .= ($addon_title && $addon_title_position != 'bottom') ? '<' . $addon_heading_selector . ' class="sppb-addon-title">' . $addon_title . '</' . $addon_heading_selector . '>' : '';
		$output .= '<div class="sppb-addon-content">
						<div id="sppb-popover-inline" class="sppb-inline">';

        // Common Settings
		$background_image_src = isset($settings->background_image->src) ? $settings->background_image->src : ($settings->background_image ?? '');
		$gap = isset($settings->gap) ? $settings->gap : 10;

		// Display
		$showTitle = isset($settings->show_title) ? $settings->show_title : true;
		$showContent = isset($settings->show_content) ? $settings->show_content : true;
		$showImage = isset($settings->show_image) ? $settings->show_image : true;
		$showLink = isset($settings->show_link) ? $settings->show_link : true;

		// Marker
		$markerMode = (isset($settings->marker_mode) && $settings->marker_mode) ? $settings->marker_mode : 'click';
		$enableMarkerRipple = isset($settings->enable_marker_ripple_effect) ? $settings->enable_marker_ripple_effect : false;

		// Popover
		$popoverPosition = empty($settings->popover_position) ? 'right' : $settings->popover_position;
		$popoverImageWithoutPadding = isset($settings->popover_image_without_padding) ? $settings->popover_image_without_padding : 1;
		$popoverImageBorder = !empty($settings->popover_image_border) ? $settings->popover_image_border : 'none';

		// Title
		$titleStyle = (isset($settings->title_style) && $settings->title_style) ? $settings->title_style : null;
		$titleDecoration = !empty($settings->title_decoration) ? $settings->title_decoration : 'none';
		$titleColor = !empty($settings->title_color) ? $settings->title_color : 'none';

		// Meta
		$metaAlignment = !empty($settings->meta_alignment) ? $settings->meta_alignment : 'below_title';

		// Link
		$linkText = !empty($settings->link_text) ? $settings->link_text : 'Read More';

		if (strpos($background_image_src, "http://") !== false || strpos($background_image_src, "https://") !== false) {
			$background_image_src = $background_image_src;
		} else {
			$original_src = Uri::base(true) . '/' . $background_image_src;
			$background_image_src = SppagebuilderHelperSite::cleanPath($original_src);
		}

		if ($background_image_src) {
			$alt = empty($settings->background_image_alt) ? '' : $settings->background_image_alt;
			$output .= '<picture>
			<img src="' . $background_image_src . '" alt="' . $alt . '" loading="eager">
			</picture>';
		}

		if (isset($settings->sp_popover_item) && is_array($settings->sp_popover_item) && count($settings->sp_popover_item)) {
			foreach ($settings->sp_popover_item as $key => $item) {
				// Marker
				$markerLeft = !isset($item->marker_left) ? 50 : $item->marker_left;
				$markerTop = !isset($item->marker_top) ? 50 : $item->marker_top;
				$markerClass = "";

				$rippleElement = $enableMarkerRipple ? '<span class="sppb-popover-ripple-effect"></span>' : '';
				$output .= '<button id="sppb-popover-marker" class="sppb-marker' . $markerClass . '" style="left: ' . $markerLeft . '%; top: ' . $markerTop . '%;" sppb-data="mode: ' . $markerMode . '" href="#"  aria-label="Open" aria-haspopup="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 17" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-width="2.621" d="M2.104 8.655h13.103M8.654 2.104v13.103"/></svg>' . $rippleElement . '</button>';

				// popover
				$popoverItemPosition = empty($item->popover_position) ? 'none' : $item->popover_position;
				$pos = $popoverItemPosition === 'none' ? $popoverPosition : $popoverItemPosition;

				$output .= '<div id="sppb-popover-content" sppb-data="pos: ' . $pos . '; mode: click; gap: ' . $gap . '" class="sppb-popover-wrap">
				<div class="sppb-popover-content-item">';

				// Image
				$image = empty($item->image) ? '' : $item->image;
				$image_src = isset($image->src) ? $image->src : $image;
				$image_width = (isset($image->width) && $image->width) ? $image->width : '';
				$image_height = (isset($image->height) && $image->height) ? $image->height : '';
				$imageWrapClass = "";
				$imageClass = "";

				if (!$popoverImageWithoutPadding) {
					$imageWrapClass .= ' sppb-padding';

					if ($popoverImageBorder === 'rounded') {
						$imageClass .= ' sppb-border-rounded';
					} else if ($popoverImageBorder === 'circle') {
						$imageClass .= ' sppb-border-circle';
					} else if ($popoverImageBorder === 'pill') {
						$imageClass .= ' sppb-border-pill';
					}
				}

				if ($image_src && $showImage) {
					$image_width ? 'width="' . $image_width . '"' : '';
					$image_height ? 'height="' . $image_height . '"' : '';
					$alt = empty($item->image_alt) ? '' : $item->image_alt;
					$output .= '<div class="sppb-card-media-top' . $imageWrapClass . '">
					<picture>
						<img src="' . $image->src . '" ' . $image_width . ' ' . $image_height . ' class="' . $imageClass . '" alt="' . $alt . '">
					</picture>
					</div>';
				}

				$output .= '<div class="sppb-card-body">';
				$metaElement = "";

				// Meta
				$meta = empty($item->meta) ? '' : $item->meta;

				if ($meta) {
					$metaElement = '<div class="sppb-popover-content-meta">' . $meta . '</div>';
				}

				if ($metaAlignment === 'above_title') {
					$output .= $metaElement;
				}

				// Title
				$title = empty($item->title) ? '' : $item->title;
				$titleClass = "";

				if ($titleDecoration) {
					switch ($titleDecoration) {
						case 'divider':
							$titleClass .= ' sppb-decoration-divider';
							break;
						case 'bullet':
							$titleClass .= ' sppb-decoration-bullet';
							break;
						case 'line':
							$titleClass .= ' sppb-decoration-line';
							break;
					}
				}

				if ($title && $showTitle) {
					if ($titleDecoration === 'line') {
						$backgroundColorClass = !empty($titleColor) && $titleColor === 'background' ? ' class="sppb-popover-text-background"' : '';
						$output .= '<' . $titleStyle . ' class="sppb-popover-content-title' . $titleClass . '"><span' . $backgroundColorClass . '>' . $title . '</span></' . $titleStyle . '>';
					} else {
						$titleClass .= !empty($titleColor) && $titleColor === 'background' ? ' sppb-popover-text-background' : '';
						$output .= '<' . $titleStyle . ' class="sppb-popover-content-title' . $titleClass . '">' . $title . '</' . $titleStyle . '>';
					}
				}

				if ($metaAlignment === 'below_title') {
					$output .= $metaElement;
				}

				// Content
				$content = empty($item->content) ? '' : $item->content;
				$contentClass = "";

				if ($content && $showContent) {
					$output .= '<div class="sppb-popover-content-text' . $contentClass . '"><p>' . $content . '</p></div>';
				}

				if ($metaAlignment === 'below_content') {
					$output .= $metaElement;
				}

				// Link
				list($href, $new_tab) = AddonHelper::parseLink($item, 'link', ['url' => 'link', 'new_tab' => 'target']);
				$linkItemText = empty($item->link_item_text) ? '' : $item->link_item_text;
				$hrefTag = !empty($href) ? 'href="' . $href . '"' : '';
				$linkClass = "";
				$linkWrapClass = "";

				if ($hrefTag && $showLink) {
					$text = empty($linkItemText) ? $linkText : $linkItemText;
					$output .= '<div class="sppb-popover-content-link-wrap' . $linkWrapClass . '">';
					$output .= '<a ' . $hrefTag . ' ' . $new_tab . ' class="sppb-popover-content-link' . $linkClass . '">' . $text . '</a>';
					$output .= '</div>';
				}

				$output .= '</div></div></div>';
			}
		}

		$output .= '</div> </div>';
		$output .= ($addon_title && $addon_title_position === 'bottom') ? '<' . $addon_heading_selector . ' class="sppb-addon-title" style="display: block;">' . $addon_title . '</' . $addon_heading_selector . '>' : '';
		$output .= '</div>'; //.sppb-addon-popover

		return $output;
	}

	/**
	 * The Popover addon's CSS stylings.
	 *
	 * @return 	string 	The CSS string.
	 * @since 	5.1.0
	 */
	public function css()
	{
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$cssHelper = new CSSHelper($addon_id);
		$css = "";

		$css .= $cssHelper->generateStyle(
			'.sppb-popover-content-item',
			$settings,
			[
				'popover_background_color' => 'background-color'
			],
			['popover_background_color' => false],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-popover-content-item .sppb-card-body',
			$settings,
			[
				'popover_padding' => 'padding',
			],
			['popover_padding' => false],
			['popover_padding' => 'spacing']
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-ripple-effect::before',
			$settings,
			[
				'marker_background_color' => 'background-color'
			],
			['marker_background_color' => false],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-ripple-effect::after',
			$settings,
			[
				'marker_background_color' => 'background-color'
			],
			['marker_background_color' => false],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-inline > picture img',
			$settings,
			[
				'background_image_width' => ['width', 'max-width'],
				'background_image_height' => 'height'
			],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img',
			$settings,
			[
				'popover_image_width' => ['width', 'max-width'],
				'popover_image_height' => 'height',
				'popover_image_padding' => 'padding',
			],
			['popover_image_padding' => false],
			['popover_image_padding' => 'spacing'],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-title',
			$settings,
			[
				'title_color' => 'color',
				'popover_title_margin'	=> 'margin',
				'popover_title_padding'	=> 'padding',
			],
			['title_color' => false, 'popover_title_padding' => false, 'popover_title_margin' => false],
			['popover_title_padding' => 'spacing', 'popover_title_margin' => 'spacing']
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-text',
			$settings,
			[
				'popover_content_margin'	=> 'margin',
				'popover_content_padding'	=> 'padding',
				'popover_content_color' => 'color'
			],
			['popover_content_color' => false, 'popover_content_margin' => false, 'popover_content_padding' => false],
			['popover_content_margin' => 'spacing', 'popover_content_padding' => 'spacing']
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-link-wrap > a',
			$settings,
			[
				'popover_link_color'	=> 'color',
			],
			[
				'popover_link_color' => false
			]
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-link-wrap',
			$settings,
			[
				'popover_link_margin'	=> 'margin',
				'popover_link_padding'	=> 'padding',
			],
			['popover_link_margin' => false, 'popover_link_padding' => false],
			['popover_link_margin' => 'spacing', 'popover_link_padding' => 'spacing']
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-meta',
			$settings,
			[
				'meta_color'	=> 'color',
				'popover_meta_margin'	=> 'margin',
				'popover_meta_padding'	=> 'padding',
			],
			['meta_color' => false, 'popover_meta_margin' => false, 'popover_meta_padding' => false],
			['popover_meta_margin' => 'spacing', 'popover_meta_padding' => 'spacing']
		);

		// Marker
		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-marker',
			$settings,
			[
				'marker_size' => ['width', 'height'],
				'marker_icon_color' => 'color',
				'marker_background_color' => 'background-color',
			],
			['marker_icon_color' => false, 'marker_background_color' => false],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-marker > svg',
			$settings,
			[
				'marker_icon_size' => ['width', 'height'],
			],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-marker:hover',
			$settings,
			[
				'marker_icon_color_hover' => 'color',
				'marker_background_color_hover'	=> 'background-color',
			],
			['marker_icon_color_hover' => false, 'marker_background_color_hover' => false],
		);

		$css .= $cssHelper->generateStyle(
			'.sppb-addon.sppb-addon-popover .sppb-popover-wrap',
			$settings,
			[
				'popover_width' => 'width',
			],
			'px',
			[],
			null,
			null,
			'max-width:1150px;'
		);

		// typography
		$css .= $cssHelper->typography('.sppb-popover-content-title', $settings, 'popover_title_typography');
		$css .= $cssHelper->typography('.sppb-popover-content-meta', $settings, 'popover_meta_typography');
		$css .= $cssHelper->typography('.sppb-popover-content-text > p', $settings, 'popover_content_typography');
		$css .= $cssHelper->typography('.sppb-popover-content-link-wrap > a', $settings, 'popover_link_typography');

		$border_radius = (isset($settings->border_radius) && $settings->border_radius) ? $settings->border_radius : 0;

		if ($border_radius) {
			$border_radius = explode(" ", $settings->border_radius);
		}

		if (is_array($border_radius) && (count($border_radius) > 2)) {
			$css .= $cssHelper->generateStyle(
				'.sppb-addon.sppb-addon-popover .sppb-inline > picture img',
				$settings,
				[
					'border_radius' => 'border-radius',
				],
				[
					'border_radius' => false
				],
				[
					'border_radius' => 'spacing'
				]
			);
		} else {
			$css .= $cssHelper->generateStyle(
				'.sppb-addon.sppb-addon-popover .sppb-inline > picture img',
				$settings,
				[
					'border_radius' => 'border-radius',
				]
			);
		}


		$popover_image_border_radius = (isset($settings->popover_image_border_radius) && $settings->popover_image_border_radius) ? $settings->popover_image_border_radius : 0;

		if ($popover_image_border_radius) {
			$popover_image_border_radius = explode(" ", $settings->popover_image_border_radius);
		}

		if (is_array($popover_image_border_radius) && (count($popover_image_border_radius) > 2)) {
			$css .= $cssHelper->generateStyle(
				'.sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img',
				$settings,
				[
					'popover_image_border_radius' => 'border-radius',
				],
				[
					'popover_image_border_radius' => false
				],
				[
					'popover_image_border_radius' => 'spacing'
				]
			);
		} else {
			$css .= $cssHelper->generateStyle(
				'.sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img',
				$settings,
				[
					'popover_image_border_radius' => 'border-radius',
				]
			);
		}

		return $css;
	}

	public function scripts()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/addons/popover.js');
	}

	/**
	 * Generate the lodash template string for the frontend editor.
	 *
	 * @return 	string 	The lodash template string.
	 * @since 	5.1.0
	 */
	public static function getTemplate()
	{
		$lodash = new Lodash('#sppb-addon-{{ data.id }}');

		$output = '<style type="text/css">';

		$output .= $lodash->color(
			'background-color',
			'.sppb-popover-content-item',
			'data.popover_background_color'
		);

		$output .= $lodash->spacing(
			'padding',
			'.sppb-popover-content-item',
			'data.popover_padding'
		);

		$output .= $lodash->color(
			'background-color',
			'.sppb-addon.sppb-addon-popover .sppb-popover-ripple-effect::before',
			'data.marker_background_color'
		);

		$output .= $lodash->color(
			'background-color',
			'.sppb-addon.sppb-addon-popover .sppb-popover-ripple-effect::after',
			'data.marker_background_color'
		);

		$output .= $lodash->unit(
			'height',
			'.sppb-addon.sppb-addon-popover .sppb-inline > picture img',
			'data.background_image_height',
			'px'
		);

		$output .= $lodash->unit(
			'width',
			'.sppb-addon.sppb-addon-popover .sppb-inline > picture img',
			'data.background_image_width',
			'px'
		);

		$output .= $lodash->unit(
			'max-width',
			'.sppb-addon.sppb-addon-popover .sppb-inline > picture img',
			'data.background_image_width',
			'px'
		);

		$output .= $lodash->unit(
			'height',
			'.sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img',
			'data.popover_image_height',
			'px'
		);

		$output .= $lodash->unit(
			'width',
			'.sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img',
			'data.popover_image_width',
			'px'
		);
		$output .= $lodash->unit(
			'max-width',
			'.sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img',
			'data.popover_image_width',
			'px'
		);

		$output .= $lodash->color(
			'color',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-title',
			'data.title_color'
		);

		$output .= $lodash->spacing(
			'padding',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-title',
			'data.popover_title_padding'
		);

		$output .= $lodash->spacing(
			'margin',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-title',
			'data.popover_title_margin'
		);

		$output .= $lodash->color(
			'color',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-text',
			'data.popover_content_color'
		);

		$output .= $lodash->unit(
			'margin-top',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-text',
			'data.content_margin_top'
		);

		$output .= $lodash->color(
			'color',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-link-wrap > a',
			'data.popover_link_color'
		);

		$output .= $lodash->spacing(
			'padding',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-link-wrap',
			'data.popover_content_padding'
		);

		$output .= $lodash->spacing(
			'margin',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-link-wrap',
			'data.popover_content_margin'
		);

		$output .= $lodash->color(
			'color',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-meta',
			'data.meta_color'
		);

		$output .= $lodash->spacing(
			'padding',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-meta',
			'data.popover_meta_padding'
		);

		$output .= $lodash->spacing(
			'margin',
			'.sppb-addon.sppb-addon-popover .sppb-popover-content-meta',
			'data.popover_meta_margin'
		);

		// Marker
		$output .= $lodash->color(
			'color',
			'.sppb-addon.sppb-addon-popover .sppb-marker',
			'data.marker_icon_color'
		);
		$output .= $lodash->color(
			'background-color',
			'.sppb-addon.sppb-addon-popover .sppb-marker',
			'data.marker_background_color'
		);

		$output .= $lodash->unit(
			'width',
			'.sppb-addon.sppb-addon-popover .sppb-marker',
			'data.marker_size',
			'px'
		);
		$output .= $lodash->unit(
			'height',
			'.sppb-addon.sppb-addon-popover .sppb-marker',
			'data.marker_size',
			'px'
		);
		$output .= $lodash->unit(
			'width',
			'.sppb-addon.sppb-addon-popover .sppb-marker > svg',
			'data.marker_icon_size',
			'px'
		);
		$output .= $lodash->unit(
			'height',
			'.sppb-addon.sppb-addon-popover .sppb-marker > svg',
			'data.marker_icon_size',
			'px'
		);

		$output .= $lodash->color(
			'color',
			'.sppb-addon.sppb-addon-popover .sppb-marker:hover',
			'data.marker_icon_color_hover'
		);
		$output .= $lodash->color(
			'background-color',
			'.sppb-addon.sppb-addon-popover .sppb-marker:hover',
			'data.marker_background_color_hover'
		);

		$output .= $lodash->unit(
			'width',
			'.sppb-addon.sppb-addon-popover .sppb-popover-wrap',
			'data.popover_width',
			'px'
		);

		// typography
		$output .= $lodash->typography('.sppb-popover-content-title', 'data.popover_title_typography');
		$output .= $lodash->typography('.sppb-popover-content-meta', 'data.popover_meta_typography');
		$output .= $lodash->typography('.sppb-popover-content-text > p', 'data.popover_content_typography');
		$output .= $lodash->typography('.sppb-popover-content-link-wrap > a', 'data.popover_link_typography');

		// title
		$typographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight'
		];
		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $typographyFallbacks);

		$output .= '<# if((data.border_radius + "").split(" ").length < 2) { #>';
		$output .= $lodash->unit('border-radius', '.sppb-addon.sppb-addon-popover .sppb-inline > picture img', 'data.border_radius', 'px');
		$output .= '<# } else { #>';
		$output .= '#sppb-addon-{{data.id}} .sppb-addon.sppb-addon-popover .sppb-inline > picture img {
			{{window.getSplitRadius(data.border_radius)}}	
		}';
		$output .= '<# } #>';

		$output .= '<# if((data.popover_image_border_radius + "").split(" ").length < 2) { #>';
		$output .= $lodash->unit('border-radius', '.sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img', 'data.popover_image_border_radius', 'px');
		$output .= '<# } else { #>';
		$output .= '#sppb-addon-{{data.id}} .sppb-addon.sppb-addon-popover .sppb-card-media-top > picture img {
			{{window.getSplitRadius(data.border_radius)}}
		}';;
		$output .= '<# } #>';

		$output .= '</style>';


		$output .= '
		<#
		var addon_title = (!_.isEmpty(data.title) && data.title) ? data.title : "";
		var addon_title_position = (!_.isEmpty(data.title_position) && data.title_position) ? data.title_position : "top";
		var addon_heading_selector = (!_.isEmpty(data.heading_selector) && data.heading_selector) ? data.heading_selector : "h3";

		// Common Settings
		var background_image_src = !_.isEmpty(data.background_image.src) ? data.background_image.src : data.background_image;
		var gap = !_.isEmpty(data.gap) ? data.gap : 10;

		// Display
		var showTitle = !_.isUndefined(data.show_title) ? !!data.show_title : true;
		var showContent = !_.isUndefined(data.show_content) ? !!data.show_content : true;
		var showImage = !_.isUndefined(data.show_image) ? !!data.show_image : true;
		var showLink = !_.isUndefined(data.show_link) ? !!data.show_link : true;

		// Marker
		var markerMode = (!_.isEmpty(data.marker_mode) && data.marker_mode) ? data.marker_mode : "click";
		var enableMarkerRipple = !_.isUndefined(data.enable_marker_ripple_effect) ? !!data.enable_marker_ripple_effect : false;

		// Popover
		var popoverPosition = _.isEmpty(data.popover_position) ? "right" : data.popover_position;
		var popoverImageWithoutPadding = !_.isEmpty(data.popover_image_without_padding) ? data.popover_image_without_padding : 1;
		var popoverImageBorder = !_.isEmpty(data.popover_image_border) ? data.popover_image_border : "none";

		// Title
		var titleStyle = (!_.isEmpty(data.title_style) && data.title_style) ? data.title_style : null;
		var titleDecoration = !_.isEmpty(data.title_decoration) ? data.title_decoration : "none";
		var titleColor = !_.isEmpty(data.title_color) ? data.title_color : "none";

		// Meta
		var metaAlignment = !_.isEmpty(data.meta_alignment) ? data.meta_alignment : "below_title";

		// Link
		var linkText = !_.isEmpty(data.link_text) ? data.link_text : "Read More";

		#>';

		$output .= '<div class="sppb-addon sppb-addon-popover">
						<# if( !_.isEmpty( data.title ) && addon_title_position != "bottom" ){ #><{{ addon_heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ addon_heading_selector }}><# } #>

						<div class="sppb-addon-content">
							<div id="sppb-popover-inline" class="sppb-inline">

							<# if (background_image_src) { 
								var alt = _.isEmpty(data.background_image_alt) ? "" : data.background_image_alt;

								#>
								<picture>
								<img src={{background_image_src}} alt={{alt}} loading="eager">
								</picture>
							<# } #>

							<# if (data?.sp_popover_item?.length > 0) {
								data.sp_popover_item.forEach((item) => {
									// Marker
									var markerLeft = item?.marker_left ?? 50;
									var markerTop = item?.marker_top ?? 50;
									var markerClass = "";
					
									var rippleElement = enableMarkerRipple ? "<span class=sppb-popover-ripple-effect></span>" : "";

									#>

									<button id="sppb-popover-marker" class="sppb-marker {{markerClass}}" style="left: {{markerLeft}}%; top: {{markerTop}}%;" sppb-data="mode: {{markerMode}}" href="#"  aria-label="Open" aria-haspopup="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 17" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-width="2.621" d="M2.104 8.655h13.103M8.654 2.104v13.103"/></svg> {{{rippleElement}}} </button>
					
									<#
									// popover
									var popoverItemPosition = _.isEmpty(item.popover_position) ? "none" : item.popover_position;
									var pos = popoverItemPosition === "none" ? popoverPosition : popoverItemPosition;

									#>
					
									<div id="sppb-popover-content" sppb-data="pos: {{pos}}; mode: click; gap: {{gap}}" class="sppb-popover-wrap">
									<div class="sppb-popover-content-item">
					
									<# 
									// Image
									var image = _.isEmpty(item.image) ? "" : item.image;
									var image_src = !_.isEmpty(image.src) ? image.src : image;
									var image_width = (!_.isEmpty(image.width) && image.width) ? image.width : "";
									var image_height = (!_.isEmpty(image.height) && image.height) ? image.height : "";
									var imageWrapClass = "";
									var imageClass = "";
				
					
									if (image_src && showImage) {
										alt = _.isEmpty(item.image_alt) ? "" : item.image_alt;

										#>
										<div class="sppb-card-media-top {{imageWrapClass}}">
										<picture>
											<img src={{image.src}} class={{imageClass}} alt={{alt}}>
										</picture>
										</div>
									<# } #>
					
									<div class="sppb-card-body">
									
									<#
									var metaElement = "";
					
									// Meta
									var meta = _.isEmpty(item.meta) ? "" : item.meta;
					
									if (meta) {
										metaElement = "<div class=sppb-popover-content-meta>" + meta + "</div>";
									}
					
									if (metaAlignment === "above_title") { #>
										{{{metaElement}}}
									<# } #>
					
									<#
									// Title
									var title = _.isEmpty(item.title) ? "" : item.title;
									var titleClass = "";
					
									if (titleDecoration) {
										switch (titleDecoration) {
											case "divider":
												titleClass += " sppb-decoration-divider";
												break;
											case "bullet":
												titleClass += " sppb-decoration-bullet";
												break;
											case "line":
												titleClass += " sppb-decoration-line";
												break;
										}
									}
					
									if (title && showTitle) {
										if (titleDecoration === "line") {
											var backgroundColorClass = !_.isEmpty(titleColor) && titleColor === "background" ? " class=sppb-popover-text-background" : "";

										#>
											<{{titleStyle}} class="sppb-popover-content-title {{titleClass}}"><span {{backgroundColorClass}}>{{title}}</span></ {{titleStyle}}>
										<# } else { 
											titleClass += !_.isEmpty(titleColor) && titleColor === "background" ? " sppb-popover-text-background" : "";

											#>
											<{{titleStyle}} class="sppb-popover-content-title {{titleClass}}">{{title}}</ {{titleStyle}}>
										<# }
									} #>
					
									<#
									if (metaAlignment === "below_title") { #>
										{{{metaElement}}}
									<# } #>
					
									<#
									// Content
									var content = _.isEmpty(item.content) ? "" : item.content;
									var contentClass = "";
					
									if (content && showContent) { #>
										<div class="sppb-popover-content-text {{contentClass}}"><p>{{{content}}}</p></div>
									<# }
					
									if (metaAlignment === "below_content") { #>
										{{{metaElement}}}
									<# }
					
									// Link
									const isUrlObject = _.isObject(data?.url) && ( !!data?.url?.url || !!data?.url?.page || !!data?.url?.menu);
									const isUrlString = _.isString(data?.url) && data?.url !== "";
						
									let href;
									let target;
									let rel;
									let relData="";
						
									if(isUrlObject || isUrlString ){
										const urlObj = data?.url?.url ? data?.url : window.getSiteUrl(data?.url, data?.target);			
										const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;
										
										target = new_tab ? `target="_blank"` : "";
						
										relData += nofollow ? "nofollow" : "";
										relData += noopener ? " noopener" : "";
										relData += noreferrer ? " noreferrer" : "";
						
										rel = `rel="${relData}"`;
										
										const buttonUrl = (type === "url" && url) || ( type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page ) && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
										
										href = buttonUrl ? `href=${buttonUrl}` : "";
									}

									var linkItemText = _.isEmpty(item.link_item_text) ? "" : item.link_item_text;
									var linkClass = "";
									var linkWrapClass = "";
					
									if (href && showLink) {
										var text = _.isEmpty(linkItemText) ? linkText : linkItemText;
										#>
										<div class="sppb-popover-content-link-wrap {{linkWrapClass}}">
										<a {{href}} {{target}} {{rel}} class="sppb-popover-content-link {{linkClass}}">{{text}}</a>
										</div>
									<# } #>
					
									</div>
									</div>
									</div>
								<# }) 
							}
							#>

							</div> 
						</div>
						<# if( !_.isEmpty( data.title ) && addon_title_position === "bottom" ){ #><{{ addon_heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ addon_heading_selector }}><# } #>
							
						</div>';


		return $output;
	}
}
