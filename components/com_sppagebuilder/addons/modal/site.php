<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

// No direct access
defined('_JEXEC') or die('Restricted access');

/** @todo: need to update. */
class SppagebuilderAddonModal extends SppagebuilderAddons
{
	/**
	 * The addon frontend render method.
	 * The returned HTML string will render to the frontend page.
	 *
	 * @return  string  The HTML string.
	 * @since   1.0.0
	 */
	public function render()
	{
		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';

		// Options
		$modal_selector = (isset($settings->modal_selector) && $settings->modal_selector) ? $settings->modal_selector : '';
		$button_text = (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : '';
		$button_class = (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : ' sppb-btn-default';
		$button_class .= (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
		$button_class .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
		$button_class .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
		$button_class .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
		$button_icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
		$button_icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';

		$icon_arr = array_filter(explode(' ', $button_icon));

		if (count($icon_arr) === 1) {
			$button_icon = 'fa ' . $button_icon;
		}

		if ($button_icon_position === 'left') {
			$button_text = ($button_icon) ? '<i class="' . $button_icon . '" aria-hidden="true"></i> ' . $button_text : $button_text;
		} else {
			$button_text = ($button_icon) ? $button_text . ' <i class="' . $button_icon . '" aria-hidden="true"></i>' : $button_text;
		}

		$selector_image = (isset($settings->selector_image) && $settings->selector_image) ? $settings->selector_image : '';
		$selector_image_src = isset($selector_image->src) ? $selector_image->src : $selector_image;
		$selector_image_width = (isset($selector_image->width) && $selector_image->width) ? $selector_image->width : '';
		$selector_image_height = (isset($selector_image->height) && $selector_image->height) ? $selector_image->height : '';

		$selector_icon_name = (isset($settings->selector_icon_name) && $settings->selector_icon_name) ? $settings->selector_icon_name : '';

		$modal_unique_id = 'sppb-modal-' . $this->addon->id;
		$modal_content_type = (isset($settings->modal_content_type) && $settings->modal_content_type) ? $settings->modal_content_type : 'text';
		$modal_content_text = (isset($settings->modal_content_text) && $settings->modal_content_text) ? $settings->modal_content_text : '';
		$modal_content_image = (isset($settings->modal_content_image) && $settings->modal_content_image) ? $settings->modal_content_image : '';
		$modal_content_image_src = isset($modal_content_image->src) ? $modal_content_image->src : $modal_content_image;
		$modal_content_video_url = (isset($settings->modal_content_video_url) && $settings->modal_content_video_url) ? $settings->modal_content_video_url : '';
		$selector_text = (isset($settings->selector_text) && $settings->selector_text) ? $settings->selector_text : '';
		$show_ripple_effect = (isset($settings->show_ripple_effect) && $settings->show_ripple_effect) ? $settings->show_ripple_effect : '';

		$modal_content_image_alt_text = (isset($settings->modal_content_image_alt_text) && $settings->modal_content_image_alt_text) ? $settings->modal_content_image_alt_text : '';
		$selector_image_alt_text = (isset($settings->selector_image_alt_text) && $settings->selector_image_alt_text) ? $settings->selector_image_alt_text : '';

		if ($modal_content_type === 'text') {
			$mfg_type = 'inline';
		} else if ($modal_content_type === 'video') {
			$mfg_type = 'iframe';
		} else if ($modal_content_type === 'image') {
			$mfg_type = 'image';
		}

		$output = '';

		$output .= '<div class="sppb-addon ' . $class . '">';

		if ($modal_content_type === 'text') {
			$url = '#' . $modal_unique_id;
			$output .= '<div id="' . $modal_unique_id . '" class="mfp-hide white-popup-block">';
			$output .= '<div class="modal-inner-block">';
			$output .= $modal_content_text;
			$output .= '</div>';
			$output .= '</div>';
			$attribs = 'data-popup_type="inline" data-mainclass="mfp-no-margins mfp-with-zoom"';
		} else if ($modal_content_type === 'video') {
			$url = $modal_content_video_url;
			$attribs = 'data-popup_type="iframe" data-mainclass="mfp-no-margins mfp-with-zoom"';
		} else {

			if(empty($modal_content_image_alt_text)) {
				$url_part_of_content = explode('/', $modal_content_image_src);
				$modal_content_image_alt_text = end($url_part_of_content);
			}

			$url = '#' . $modal_unique_id;
			$output .= '<div id="' . $modal_unique_id . '" class="mfp-hide popup-image-block">';
			$output .= '<div class="modal-inner-block">';
			$output .= '<img class="mfp-img" src="' . $modal_content_image_src . '" alt="' . $modal_content_image_alt_text . '">';
			$output .= '</div>';
			$output .= '</div>';
			$attribs = 'data-popup_type="inline" data-mainclass="mfp-no-margins mfp-with-zoom"';
		}

		if ($modal_selector === 'image') {
			if ($selector_image_src) {
				//Lazyload image
				$placeholder = $selector_image_src == '' ? false : $this->get_image_placeholder($selector_image_src);

				$url_part_of_button = explode('/', $selector_image_src);
				if ($selector_text) {
					$alt_for_button = $selector_text;
				} else {
					$alt_for_button = end($url_part_of_button);
				}

				if(empty($selector_image_alt_text)) {
					$selector_image_alt_text = $alt_for_button;
				}
				
				$image_link = '';
				if (strpos($selector_image_src, "http://") !== false || strpos($selector_image_src, "https://") !== false) {
					$image_link = $selector_image_src;
				} else {
					$image_link = Uri::base() . $selector_image_src;
				}
				$output .= '<a class="sppb-modal-selector sppb-magnific-popup" ' . $attribs . ' href="' . $url . '" id="' . $modal_unique_id . '-selector">
				<img ' . ($placeholder ? 'class="sppb-element-lazy"' : '') . ' src="' . ($placeholder ? $placeholder : $image_link) . '" alt="' . $selector_image_alt_text . '" ' . ($placeholder ? 'data-large="' . $image_link . '"' : '') . ' ' . ($selector_image_width ? 'width="' . $selector_image_width . '"' : '') . ' ' . ($selector_image_height ? 'height="' . $selector_image_height . '"' : '') . ' loading="lazy" />';
				$output  .= ($selector_text) ? '<span class="text">' . $selector_text . '</span>' : '';
				if ($show_ripple_effect) {
					$output  .= '<span class="sppb-ripple-effect"></span>';
				}
				$output  .= '</a>';
			}
		} else if ($modal_selector === 'icon') {
			if ($selector_icon_name) {
				$select_icon = explode(' ', $selector_icon_name);
				if (count($select_icon) === 1) {
					$selector_icon_name = 'fa ' . $selector_icon_name;
				}
				$output  .= '<a class="sppb-modal-selector sppb-magnific-popup" href="' . $url . '" ' . $attribs . ' id="' . $modal_unique_id . '-selector">';
				$output  .= '<span class="sppb-modal-icon-wrap">';
				$output  .= '<i class="' . $selector_icon_name . '" aria-hidden="true"></i>';
				if ($show_ripple_effect) {
					$output  .= '<span class="sppb-ripple-effect"></span>';
				}
				$output  .= '</span>';
				$output  .= ($selector_text) ? '<span class="text">' . $selector_text . '</span>' : '';
				$output  .= '</a>';
			}
		} else {
			$output .= '<a class="sppb-btn ' . $button_class . ' sppb-magnific-popup sppb-modal-selector" ' . $attribs . ' href="' . $url . '" id="' . $modal_unique_id . '-selector">' . $button_text . '</a>';
		}

		$output .= '</div>';

		return $output;
	}

	/**
	 * Add scripts to the document.
	 *
	 * @return	array 	The list of scripts.
	 * @since 	1.0.0
	 */
	public function scripts()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/jquery.magnific-popup.min.js');
	}

	/**
	 * Add stylesheets to the document.
	 *
	 * @return	array 	The list of stylesheets.
	 * @since 	1.0.0
	 */
	public function stylesheets()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/css/magnific-popup.css');
	}

	/**
	 * Generate the CSS string for the frontend page.
	 *
	 * @return 	string 	The CSS string for the page.
	 * @since 	1.0.0
	 */
	public function css()
	{
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$settings = $this->addon->settings;
		$cssHelper = new CSSHelper($addon_id);


		$modal_content_type = (isset($settings->modal_content_type) && $settings->modal_content_type) ? $settings->modal_content_type : 'text';

		$selector_style	= '';
		$modal_size  = (isset($settings->modal_popup_width) && $settings->modal_popup_width) ? 'max-width: ' . $settings->modal_popup_width . 'px;' : '';
		$modal_size .= (isset($settings->modal_popup_height) && $settings->modal_popup_height) ? ' height: ' . $settings->modal_popup_height . 'px;' : '';

		$modal_selector = (isset($settings->modal_selector) && $settings->modal_selector) ? $settings->modal_selector : '';
		$selector_icon_name = (isset($settings->selector_icon_name) && $settings->selector_icon_name) ? $settings->selector_icon_name : '';
		$selector_image = (isset($settings->selector_image) && $settings->selector_image) ? $settings->selector_image : '';
		$selector_style	.= (isset($settings->selector_margin_top) && $settings->selector_margin_top) ? 'margin-top:' . (int) $settings->selector_margin_top .'px;' : '';
		$selector_style	.= (isset($settings->selector_margin_bottom) && $settings->selector_margin_bottom) ? 'margin-bottom:' . (int) $settings->selector_margin_bottom .'px;' : '';
		$css = '';

		if( $modal_selector == 'icon' || $modal_selector == 'image' ) {
			if($selector_icon_name || $selector_image) {
				$selector_text_style	= (isset($settings->selector_text_size) && $settings->selector_text_size) ? 'font-size:' . $settings->selector_text_size .'px;' : '';
				$selector_text_style	.= (isset($settings->selector_text_weight) && $settings->selector_text_weight) ? 'font-weight:' . $settings->selector_text_weight .';' : '';
				$selector_text_style	.= (isset($settings->selector_text_margin) && trim($settings->selector_text_margin)) ? 'margin:' . $settings->selector_text_margin .';' : '';
				$selector_text_style	.= (isset($settings->selector_text_color) && $settings->selector_text_color) ? 'color:' . $settings->selector_text_color .';' : '';

				if($selector_text_style) {
					$css .= $addon_id . ' .sppb-modal-selector span.text {';
					$css .= $selector_text_style;
					$css .= '}';
				}

				$selector_text_style_sm	= (isset($settings->selector_text_size_sm) && $settings->selector_text_size_sm) ? 'font-size:' . $settings->selector_text_size_sm .'px;' : '';
				if($selector_text_style_sm){
					$css .= '@media (min-width: 768px) and (max-width: 991px) {';
						$css .= $addon_id . ' .sppb-modal-selector span.text {';
							$css .= $selector_text_style_sm;
						$css .= '}';
					$css .= '}';
				}
				$selector_text_style_xs	= (isset($settings->selector_text_size_xs) && $settings->selector_text_size_xs) ? 'font-size:' . $settings->selector_text_size_xs .'px;' : '';
				if($selector_text_style_xs){
					$css .= '@media (max-width: 767px) {';
						$css .= $addon_id . ' .sppb-modal-selector span.text {';
							$css .= $selector_text_style_xs;
						$css .= '}';
					$css .= '}';
				}
			}
		}

		if ($modal_selector == 'icon') {
			if ($selector_icon_name) {

				$settings->selector_icon_color = CssHelper::parseColor($settings, 'selector_icon_color');

				$selectorStyleProps = [
					'selector_icon_border_width' => 'border-style:solid;border-width',
					'selector_icon_border_radius' => 'border-radius',
					'selector_icon_background' => 'background-color',
					'selector_icon_border_color' => 'border-color',
					'selector_icon_padding' => 'padding',
					'selector_icon_color' => 'color',
					'selector_margin_top' => 'margin-top',
					'selector_margin_bottom' => 'margin-bottom'
				];

				$selectorUnits = ['selector_icon_background' => false, 'selector_icon_border_color' => false, 'selector_icon_color' => false];

				$iconSelectorStyle = $cssHelper->generateStyle('.sppb-modal-selector span', $settings, $selectorStyleProps, $selectorUnits, null, null, false, 'display:inline-block;line-height:1;');

				$iconStyleProps = [
					'selector_icon_size' => ['font-size', 'width', 'height', 'line-height']
				];

				$iconStyle = $cssHelper->generateStyle('.sppb-modal-selector span > i', $settings, $iconStyleProps);

				$css .= $iconStyle;
				$css .= $iconSelectorStyle;
			}
		} else {
			$selectorStyle = $cssHelper->generateStyle('.sppb-modal-selector', $settings, ['selector_margin_top' => 'margin-top', 'selector_margin_bottom' => 'margin-bottom']);
			$css .= $selectorStyle;
		}

		if ($modal_content_type != 'video' && $modal_size) {
			if ($modal_content_type == 'image') {
				$cssHelper->setID('#sppb-modal-' . $this->addon->id . '.popup-image-block img');

				$popupImage = $cssHelper->generateStyle(':self', $settings, ['modal_popup_width' => 'max-width', 'modal_popup_height' => 'height']);
				$css .= $popupImage;

				$cssHelper->setID($addon_id);
			} else {
				$cssHelper->setID('#sppb-modal-' . $this->addon->id . '.white-popup-block');

				$popupImage = $cssHelper->generateStyle(':self', $settings, ['modal_popup_width' => 'max-width', 'modal_popup_height' => 'height', 'modal_popup_overflow' => 'overflow-y'], ['modal_popup_overflow' => false]);
				$css .= $popupImage;

				$cssHelper->setID($addon_id);
			}
		}

		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');
		$css .= $cssHelper->generateStyle(':self', $settings, ['alignment' => 'text-align'], false);
		// Button css
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css_path = new FileLayout('addon.css.button', $layout_path);
		$css .= $css_path->render(array('addon_id' => $addon_id, 'options' => $settings, 'id' => 'sppb-modal-' . $this->addon->id . '-selector'));

		return $css;
	}

	/**
	 * Generate the lodash template string for the frontend editor.
	 *
	 * @return 	string 	The lodash template string.
	 * @since 	1.0.0
	 */
	public static function getTemplate()
	{

		$lodash = new Lodash('#sppb-addon-{{ data.id }}');
		$output = '
	    <#
	    let modalContentType = data.modal_content_type || "text"
		let buttonIconPosition = data.button_icon_position || "left"
		let modalUniqueId = "sppb-modal-"+ data.id
		let modalUrl = "#" + modalUniqueId
		let attribs = \'data-popup_type="inline" data-mainclass="mfp-no-margins mfp-with-zoom"\'

		let buttonClass = ( data.button_type )? "sppb-btn-" + data.button_type : "sppb-btn-default"
			buttonClass += ( data.button_size )? " sppb-btn-" + data.button_size : ""
			buttonClass += ( data.button_shape )? " sppb-btn-" + data.button_shape : " sppb-btn-rounded"
			buttonClass += ( data.button_appearance )? " sppb-btn-" + data.button_appearance : ""
			buttonClass += ( data.button_block )? " " + data.button_block : ""

	    #>

		<style type="text/css">';

		$output .= $lodash->alignment('text-align', '', 'data.alignment');

		$buttonTypographyFallbacks = [
			'font'           => 'data.button_font_family',
			'size'           => 'data.button_fontsize',
			'letter_spacing' => 'data.button_letterspace',
			'weight'         => 'data.button_font_style?.weight',
			'italic'         => 'data.button_font_style?.italic',
			'underline'      => 'data.button_font_style?.underline',
			'uppercase'      => 'data.button_font_style?.uppercase',
		];

		$output .= $lodash->typography('#sppb-modal-{{ data.id }}-selector.sppb-btn-{{ data.button_type }}', 'data.button_typography', $buttonTypographyFallbacks);

		$output .= '<# if(data.button_type == "custom") { #>';
		$output .= $lodash->color('color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom', 'data.button_color');
		$output .= $lodash->color('background-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= $lodash->color('color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom:hover', 'data.button_color_hover');
		$output .= $lodash->spacing('padding', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom', 'data.button_padding');

		$output .= '<# if (data.button_appearance == "outline") { #>';
		$output .= $lodash->border('border-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom', 'data.button_background_color');
		$output .= $lodash->border('border-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= '<# } else if(data.button_appearance == "3d") { #>';
		$output .= $lodash->border('border-bottom-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom', 'data.button_background_color_hover');
		$output .= $lodash->color('background-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } else if(data.button_appearance == "gradient") { #>';
		$output .= '#sppb-addon-{{ data.id }} #sppb-modal-{{ data.id }}-selector.sppb-btn-custom { border: none; }';
		$output .= $lodash->color('background-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom', 'data.button_background_gradient');
		$output .= $lodash->color('background-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom:hover', 'data.button_background_gradient_hover');
		$output .= '<# } else { #>';
		$output .= $lodash->color('background-color', '#sppb-modal-{{ data.id }}-selector.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } #>';
		$output .= '<# } #>';

		$output .= '<# if (modalContentType == "image") { #>';
		$output .= $lodash->unit('max-width', '#sppb-modal-{{ data.id }} .popup-image-block', 'data.modal_popup_width', 'px');
		$output .= $lodash->unit('height', '#sppb-modal-{{ data.id }} .popup-image-block', 'data.modal_popup_height', 'px');
		$output .= '<# } else if (modalContentType == "text") { #>';
		$output .= $lodash->unit('max-width', '#sppb-modal-{{ data.id }} .white-popup-block', 'data.modal_popup_width', 'px');
		$output .= $lodash->unit('height', '#sppb-modal-{{ data.id }} .white-popup-block', 'data.modal_popup_height', 'px');
		$output .= '<# } #>';

		$output .= '<# if( data.modal_selector == "icon") { #>';

		$output .= $lodash->color('color', '.sppb-modal-selector span', 'data.selector_icon_color');
		$output .= $lodash->color('background-color', '.sppb-modal-selector span', 'data.selector_icon_background');
		$output .= $lodash->border('border-color', '.sppb-modal-selector span', 'data.selector_icon_border_color');
		$output .= '<# if(!_.isEmpty(data.selector_icon_border_color)) { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-modal-selector span { border-style:solid;}';
		$output .= '<# } #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-modal-selector span { display:inline-block; line-height:1;}';

		$output .= $lodash->unit('border-width', '.sppb-modal-selector span', 'data.selector_icon_border_width', 'px');
		$output .= $lodash->unit('border-radius', '.sppb-modal-selector span', 'data.selector_icon_border_radius', 'px');
		$output .= $lodash->unit('padding', '.sppb-modal-selector span', 'data.selector_icon_padding', 'px');

		$output .= $lodash->unit('font-size', '.sppb-modal-selector span > i', 'data.selector_icon_size', 'px');
		$output .= $lodash->unit('width', '.sppb-modal-selector span > i', 'data.selector_icon_size', 'px');
		$output .= $lodash->unit('height', '.sppb-modal-selector span > i', 'data.selector_icon_size', 'px');
		$output .= $lodash->unit('line-height', '.sppb-modal-selector span > i', 'data.selector_icon_size', 'px');

		$output .= '<# } #>';

		$output .= ' <# if( (data.modal_selector == "icon" || data.modal_selector == "image") && (data.selector_icon_name || data.selector_image)) { #>';
		$output .= $lodash->unit('font-size', 'sppb-modal-selector span.text', 'data.selector_text_size', 'px');
		$output .= $lodash->unit('font-weight', 'sppb-modal-selector span.text', 'data.selector_text_weight');
		$output .= $lodash->color('color', 'sppb-modal-selector span.text', 'data.selector_text_color');
		$output .= $lodash->spacing('margin', 'sppb-modal-selector span.text', 'data.selector_text_margin');
		$output .= '<# } #>';

		$output .= '
		<# if( (data.modal_selector == "icon" || data.modal_selector == "image") && (data.selector_icon_name || data.selector_image)) { #>
			#sppb-addon-{{ data.id }} .sppb-modal-selector span.text {
				font-weight: {{ data.selector_text_weight }};
				margin: {{ data.selector_text_margin }};
				color: {{ data.selector_text_color }};
			}';

		$output .= $lodash->unit('font-size', '.sppb-modal-selector span.text', 'data.selector_text_size', 'px');
		$output .= '<# } #>';

		$output .= '
	    </style>
		<div class="sppb-addon {{ data.class }}">
		<# if( modalContentType == "text") { #>
			<div id="{{ modalUniqueId }}" class="mfp-hide white-popup-block">
				<div class="modal-inner-block">
					{{{ data.modal_content_text }}}
				</div>
			</div>
	    <#
		} else if( modalContentType == "video") {
			modalUrl = data.modal_content_video_url
			attribs = \'data-popup_type="iframe" data-mainclass="mfp-no-margins mfp-with-zoom"\'
		} else {
	    #>
			<div id="{{ modalUniqueId }}" class="mfp-hide popup-image-block">
				<div class="modal-inner-block">
					<#
					var modal_content_image_alt_text = data.modal_content_image_alt_text || "";

					var modal_content_image = {}
					if (typeof data.modal_content_image !== "undefined" && typeof data.modal_content_image.src !== "undefined") {
						modal_content_image = data.modal_content_image
					} else {
						modal_content_image = {src: data.modal_content_image}
					}
					if(modal_content_image.src && modal_content_image.src.indexOf("https://") == -1 && modal_content_image.src.indexOf("http://") == -1){
					#>
						<img style="max-width: {{ data.modal_popup_width }}px; height: {{ data.modal_popup_height }}px" class="mfp-img" src=\'{{ pagebuilder_base + modal_content_image.src }}\' alt=\'{{modal_content_image_alt_text}}\' >
					<# } else { #>
						<img style="max-width: {{ data.modal_popup_width }}px; height: {{ data.modal_popup_height }}px" class="mfp-img" src=\'{{ modal_content_image.src }}\' alt=\'{{modal_content_image_alt_text}}\' >
					<# } #>
				</div>
			</div>
	    <# } #>

	    
			<#
			var selector_image = {}
			if (typeof data.selector_image !== "undefined" && typeof data.selector_image.src !== "undefined") {
				selector_image = data.selector_image
			} else {
				selector_image = {src: data.selector_image}
			}

			var selector_image_alt_text = data.selector_image_alt_text || "";

			if(data.modal_selector == "image") {
			#>
				<a class="sppb-modal-selector sppb-magnific-popup" {{{ attribs }}} href=\'{{ modalUrl }}\' id="{{ modalUniqueId }}-selector">
					<# if(selector_image.src && selector_image.src.indexOf("https://") == -1 && selector_image.src.indexOf("http://") == -1){ #>
						<img src=\'{{ pagebuilder_base + selector_image.src }}\' alt=\'{{selector_image_alt_text}}\' >
					<# } else { #>
						<img src=\'{{ selector_image.src }}\' alt=\'{{selector_image_alt_text}}\' >
					<# } #>
					<# if(data.selector_text){ #>
						<span class="text">{{ data.selector_text }}</span>
					<# } #>
				</a>
			<# } else if (data.modal_selector == "icon"){
				let select_icon_arr = (typeof data.selector_icon_name !== "undefined" && data.selector_icon_name) ? data.selector_icon_name.split(" ") : "";
				let select_icon_name = select_icon_arr.length === 1 ? "fa "+data.selector_icon_name : data.selector_icon_name;
			#>
				<a class="sppb-modal-selector sppb-magnific-popup" href=\'{{ modalUrl }}\' {{{ attribs }}} id="{{ modalUniqueId }}-selector">
					<span class="sppb-modal-icon-wrap">
						<i class="{{ select_icon_name }}"></i>
						<# if(data.show_ripple_effect) { #>
							<span class="sppb-ripple-effect"></span>
						<# } #>
					</span>
					<# if(data.selector_text){ #>
						<span class="text">{{ data.selector_text }}</span>
					<# } #>
				</a>
			<# } else {
				let btn_icon_arr = (typeof data.button_icon !== "undefined" && data.button_icon) ? data.button_icon.split(" ") : "";
				let btn_icon_name = btn_icon_arr.length === 1 ? "fa "+data.button_icon : data.button_icon;
			#>
				<a class="sppb-btn {{ buttonClass }} sppb-magnific-popup sppb-modal-selector" {{{ attribs }}} href=\'{{ modalUrl }}\' id="{{ modalUniqueId }}-selector"><# if( buttonIconPosition == "left" && data.button_icon ) { #> <i class="{{ btn_icon_name }}"></i><# } #> {{ data.button_text }} <# if( buttonIconPosition == "right" && data.button_icon ) { #> <i class="{{ btn_icon_name }}"></i><# } #></a>
			<# } #>
	    </div>';

		return $output;
	}
}
