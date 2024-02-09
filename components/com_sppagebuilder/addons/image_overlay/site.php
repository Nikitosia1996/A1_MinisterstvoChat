<?php

/**
 * @package SP Page Builder
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Layout\FileLayout;

//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonImage_overlay extends SppagebuilderAddons
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
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$title_icon = (isset($settings->title_icon) && $settings->title_icon) ? $settings->title_icon : '';

		$title_icon_arr = array_filter(explode(' ', $title_icon));

		if (count($title_icon_arr) === 1)
		{
			$title_icon = 'fa ' . $title_icon;
		}

		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h4';

		list($titleLink, $titleTarget) = AddonHelper::parseLink($settings, 'title_link', ['url' => 'title_link', 'new_tab' => 'title_link_new_window']);

		// Subtitle Options
		$sub_title = (isset($settings->sub_title) && $settings->sub_title) ? $settings->sub_title : '';
		$subtitle_heading_selector = (isset($settings->subtitle_heading_selector) && $settings->subtitle_heading_selector) ? $settings->subtitle_heading_selector : 'div';
		$sub_title_icon = (isset($settings->sub_title_icon) && $settings->sub_title_icon) ? $settings->sub_title_icon : '';
		$subt_icon_arr = array_filter(explode(' ', $sub_title_icon));

		if (count($subt_icon_arr) === 1)
		{
			$sub_title_icon = 'fa ' . $sub_title_icon;
		}

		// Title subtitle position
		$title_subtitle_position = (isset($settings->title_subtitle_position) && $settings->title_subtitle_position) ? $settings->title_subtitle_position : 'top-left';
		$show_content_on_hover = (isset($settings->show_content_on_hover) && $settings->show_content_on_hover) ? $settings->show_content_on_hover : '';

		// Background Image Options
		$image = (isset($settings->image) && $settings->image) ? $settings->image : '';
		$image_src = isset($image->src) ? $image->src : $image;

		$background_image_animation = (isset($settings->background_image_animation) && $settings->background_image_animation) ? $settings->background_image_animation : '';
		$image_link = '';

		if (strpos($image_src, "http://") !== false || strpos($image_src, "https://") !== false)
		{
			$image_link = $image_src;
		}
		else
		{
			$image_link = Uri::base() . $image_src;
		}

		$image_in_lightbox = (isset($settings->image_in_lightbox) && $settings->image_in_lightbox) ? $settings->image_in_lightbox : 0;

		// Overlay options
		$overlay_hover_type = (isset($settings->overlay_hover_type) && $settings->overlay_hover_type) ? $settings->overlay_hover_type : '';
		$overlay_type = (isset($settings->overlay_type) && $settings->overlay_type) ? $settings->overlay_type : '';
		$overlay_mode = (isset($settings->overlay_mode) && $settings->overlay_mode) ? $settings->overlay_mode : '';

		// Button options
		$btn_class = '';
		$btn_class .= (isset($settings->type) && $settings->type) ? ' sppb-btn-' . $settings->type : '';
		$btn_class .= (isset($settings->size) && $settings->size) ? ' sppb-btn-' . $settings->size : '';
		$btn_class .= (isset($settings->block) && $settings->block) ? ' ' . $settings->block : '';
		$btn_class .= (isset($settings->shape) && $settings->shape) ? ' sppb-btn-' . $settings->shape : ' sppb-btn-rounded';
		$btn_class .= (isset($settings->appearance) && $settings->appearance) ? ' sppb-btn-' . $settings->appearance : '';
		$text = (isset($settings->text) && $settings->text) ? $settings->text : '';
		$icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
		$icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';

		list($btn_url, $btn_target) = AddonHelper::parseLink($settings, 'url', ['url' => 'url', 'new_tab' => 'target']);

		$attribs = (isset($btn_target) && $btn_target) ? ' ' . $btn_target . '' : '';
		$attribs .= (!empty($btn_url)) ? ' href="' . $btn_url . '"' : '';
		$attribs .= ' id="btn-' . $this->addon->id . '"';



		$icon_arr = array_filter(explode(' ', $icon));

		if (count($icon_arr) === 1)
		{
			$icon = 'fas ' . $icon;
		}

		if ($icon_position == 'left')
		{
			$text = ($icon) ? '<i class="' . $icon . '" aria-hidden="true"></i> ' . $text : $text;
		}
		else
		{
			$text = ($icon) ? $text . ' <i class="' . $icon . '" aria-hidden="true"></i>' : $text;
		}

		$output = '';

		$output  .= '<div class="sppb-addon sppb-addon-overlay-image ' . $class . ' image-effect-' . $background_image_animation . ' ' . ($show_content_on_hover ? 'overlay-show-content-on-hover' : '') . '">';
		$output  .= '<div class="sppb-addon-overlay-image-content title-subtitle-' . $title_subtitle_position . '">';

		if (($title || $sub_title) && $title_subtitle_position)
		{
			$output .= '<div class="overlay-image-title">';
			$output .= '<' . $heading_selector . ' class="sppb-addon-title">';

			if ($titleLink)
			{
				$output .= '<a href="' . $titleLink . '" ' . $titleTarget . '>';
			}

			if ($title_icon)
			{
				$output .= '<i class="' . $title_icon . '" aria-hidden="true"></i>';
			}

			$output .= $title;

			if ($titleLink)
			{
				$output .= '</a>';
			}

			$output .= '</' . $heading_selector . '>';

			if ($sub_title)
			{
				$output .= '<' . $subtitle_heading_selector . ' class="sppb-addon-subtitle">';
				if ($sub_title_icon)
				{
					$output .= '<i class="' . $sub_title_icon . '" aria-hidden="true"></i>';
				}
				$output .= $sub_title;
				$output .= '</' . $subtitle_heading_selector . '>';
			}

			if ($text)
			{
				$output .= '<div class="overlay-image-button-wrap">';
				$output .= '<a' . $attribs . ' class="sppb-btn ' . $btn_class . '">' . $text . '</a>';
				$output .= '</div>';
			}
			$output .= '</div>';
		}

		$output  .= '<div class="overlay-background-image-wrapper">';
		$output  .= '<div class="overlay-background-image" style="background-image:url(' . $image_link . ');"></div>';

		if ($image_in_lightbox && $title_subtitle_position !== 'center-center' && $image_link)
		{
			$output .= '<a class="sppb-magnific-popup sppb-addon-image-overlay-icon" data-popup_type="image" data-mainclass="mfp-no-margins mfp-with-zoom" href="' . $image_link . '">+</a>';
		}

		$output  .= '</div>';

		if ($overlay_type !== 'none' || $overlay_hover_type !== 'none' || $overlay_mode === 'hover')
		{
			$output  .= '<div class="overlay-background-style"></div>';
		}

		$output  .= '</div>';
		$output  .= '</div>';

		return $output;
	}

	/**
	 * Attach external scripts.
	 *
	 * @return 	array
	 * @since 	1.0.0
	 */
	public function scripts()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/jquery.magnific-popup.min.js');
	}

	/**
	 * Attach external stylesheets.
	 *
	 * @return 	array
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

		$css = '';

		$global_border_radius = (isset($settings->global_border_radius) && $settings->global_border_radius) ? $settings->global_border_radius : '';
		$overlay_type = (isset($settings->overlay_type) && $settings->overlay_type) ? $settings->overlay_type : '';

		if ($global_border_radius)
		{
			$settings->dummy_overflow = 'hidden';
			$selfStyle = $cssHelper->generateStyle(':self', $settings, ['dummy_overflow' => 'overflow'], false);
			$css .= $selfStyle;
		}

		$titleStyle = $cssHelper->generateStyle('.sppb-addon-title a', $settings, ['title_text_color' => 'color'], false);
		$titleStyle .= $cssHelper->generateStyle('.sppb-addon-title', $settings, ['title_margin' => 'margin'], false, ['title_margin' => 'spacing']);
		$subtitleFontStyle = $cssHelper->typography('.sppb-addon-subtitle', $settings, 'sub_title_typography', [
			'font'           => 'sub_title_font_family',
			'size'           => 'sub_title_fontsize',
			'letter_spacing' => 'sub_title_letterspace',
			'uppercase'      => 'sub_title_font_style.uppercase',
			'italic'         => 'sub_title_font_style.italic',
			'underline'      => 'sub_title_font_style.underline',
			'weight'         => 'sub_title_font_style.weight',
		]);
		$subtitleStyle = $cssHelper->generateStyle('.sppb-addon-subtitle', $settings, ['sub_title_margin' => 'margin', 'sub_title_text_color' => 'color'], false, ['sub_title_margin' => 'spacing']);
		$imageStyle = $cssHelper->generateStyle('.sppb-addon-overlay-image-content', $settings, ['image_height' => 'height']);
		$iconStyle = $cssHelper->generateStyle('.sppb-addon-image-overlay-icon', $settings, ['lightbox_icon_bg' => 'background'], false);

		$props = [];

		if ($overlay_type !== 'none')
		{
			if ($overlay_type === 'color')
			{
				$props = ['overlay_color' => 'background'];
			}
			elseif ($overlay_type === 'gradient')
			{
				$settings->overlay_gradient = CSSHelper::parseColor($settings, 'overlay_gradient');
				$props = ['overlay_gradient' => 'background'];
			}
		}
		else
		{
			$settings->overlay_transparent = 'transparent';
			$props = ['overlay_transparent' => 'background'];
		}

		$overlayStyle = $cssHelper->generateStyle('.overlay-background-style', $settings, $props, false);
		$overlay_hover_type = (isset($settings->overlay_hover_type) && $settings->overlay_hover_type) ? $settings->overlay_hover_type : '';

		$overlayHoverStyle = '';

		if ($overlay_hover_type !== 'none')
		{
			if ($overlay_hover_type === 'color')
			{
				$overlayHoverStyle .= $cssHelper->generateStyle('.sppb-addon-overlay-image-content:hover .overlay-background-style', $settings, ['overlay_hover_color' => 'background'], false);
			}
			elseif ($overlay_hover_type === 'gradient')
			{
				$settings->dummy_overlay_opacity = '0.8';
				$overlayHoverStyle .= $cssHelper->generateStyle('.sppb-addon-overlay-image-content:hover .overlay-background-style', $settings, ['dummy_overlay_opacity' => 'opacity']);

				$settings->overlay_hover_gradient = CSSHelper::parseColor($settings, 'overlay_hover_gradient');
				$overlayHoverStyle .= $cssHelper->generateStyle('.overlay-background-style::after', $settings, ['overlay_hover_gradient' => 'background'], false);

				$settings->dummy_hover_after_opacity = '1';
				$overlayHoverStyle .= $cssHelper->generateStyle('.sppb-addon-overlay-image-content:hover .overlay-background-style::after', $settings, ['dummy_hover_after_opacity' => 'opacity'], false);
			}
		}
		else
		{
			$settings->overlay_hover_transparent = 'transparent';
			$overlayHoverStyle = $cssHelper->generateStyle('.sppb-addon-overlay-image-content:hover .overlay-background-style', $settings, ['overlay_hover_transparent' => 'background'], false);
		}

		$buttonStyle = $cssHelper->generateStyle('.overlay-image-button-wrap', $settings, ['button_margin' => 'margin'], false, ['button_margin' => 'spacing']);
		$contentStyle = $cssHelper->generateStyle('.sppb-addon-overlay-image-content', $settings, ['content_padding' => 'padding'], false, ['content_padding' => 'spacing']);

		$css .= $iconStyle;
		$css .= $titleStyle;
		$css .= $imageStyle;
		$css .= $buttonStyle;
		$css .= $contentStyle;
		$css .= $overlayStyle;
		$css .= $subtitleStyle;
		$css .= $subtitleFontStyle;
		$css .= $overlayHoverStyle;

		// Button styles
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$buttonLayout = new FileLayout('addon.css.button', $layout_path);
		$options = new stdClass;
		$options->button_type = (isset($settings->type) && $settings->type) ? $settings->type : '';
		$options->button_appearance = (isset($settings->appearance) && $settings->appearance) ? $settings->appearance : '';
		$options->button_color = (isset($settings->color) && $settings->color) ? $settings->color : '';
		$options->button_color_hover = (isset($settings->color_hover) && $settings->color_hover) ? $settings->color_hover : '';
		$options->button_background_color = (isset($settings->background_color) && $settings->background_color) ? $settings->background_color : '';
		$options->button_background_color_hover = (isset($settings->background_color_hover) && $settings->background_color_hover) ? $settings->background_color_hover : '';
		$options->button_fontstyle = (isset($settings->fontstyle) && $settings->fontstyle) ? $settings->fontstyle : '';
		$options->button_font_style = (isset($settings->font_style) && $settings->font_style) ? $settings->font_style : '';
		$options->button_padding = isset($settings->button_padding) ? $settings->button_padding : '';
		$options->button_padding_original = (isset($settings->button_padding_original) && $settings->button_padding_original) ? $settings->button_padding_original : '';
		$options->fontsize = (isset($settings->fontsize) && $settings->fontsize) ? $settings->fontsize : '';
		$options->button_letterspace = (isset($settings->letterspace) && $settings->letterspace) ? $settings->letterspace : '';
		$options->button_background_gradient = (isset($settings->background_gradient) && $settings->background_gradient) ? $settings->background_gradient : new stdClass();
		$options->button_background_gradient_hover = (isset($settings->background_gradient_hover) && $settings->background_gradient_hover) ? $settings->background_gradient_hover : new stdClass();
		$options->button_typography = !empty($settings->typography) ? $settings->typography : null;

		$css .= $buttonLayout->render(array('addon_id' => $addon_id, 'options' => $options, 'id' => 'btn-' . $this->addon->id));

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
			var img = {}
			if (typeof data.image !== "undefined" && typeof data.image.src !== "undefined") {
				img = data.image
			} else {
				img = {src: data.image}
			}
			
			let image_link = "";
			if(img.src.indexOf("http://") == 0 || img.src.indexOf("https://") == 0){
				image_link = img.src;
			} else {
				image_link = pagebuilder_base + img.src;
			}

			let overlay_color = (!_.isEmpty(data.overlay_color) && data.overlay_color) ? data.overlay_color : \'rgba(0, 91, 234, 0.5)\';

			var modern_font_style = false;
			var classList = "";
			classList += " sppb-btn-"+data.type;
			classList += " sppb-btn-"+data.size;
			classList += " sppb-btn-"+data.shape;
			if(!_.isEmpty(data.appearance)){
				classList += " sppb-btn-"+data.appearance;
			}

			classList += " "+data.block;

		#>
	<style type="text/css">';

		// Title
		$titleTypographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight',
		];

		// Title
		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);
		$output .= $lodash->color('color', '.sppb-addon-title a', 'data.title_color');
		$output .= $lodash->spacing('margin', '.sppb-addon-title', 'data.title_margin');

		// Subtitle
		$subtitleTypographyFallbacks = [
			'font'           => 'data.sub_title_font_family',
			'size'           => 'data.sub_title_fontsize',
			'letter_spacing' => 'data.sub_title_letterspace',
			'uppercase'      => 'data.sub_title_font_style?.uppercase',
			'italic'         => 'data.sub_title_font_style?.italic',
			'underline'      => 'data.sub_title_font_style?.underline',
			'weight'         => 'data.sub_title_font_style?.weight',
		];

		// Subtitle 
		$output .= $lodash->typography('.sppb-addon-subtitle', 'data.sub_title_typography', $subtitleTypographyFallbacks);
		$output .= $lodash->color('color', '.sppb-addon-subtitle', 'data.sub_title_text_color');
		$output .= $lodash->spacing('margin', '.sppb-addon-subtitle', 'data.sub_title_margin');
		$output .= $lodash->unit('font-size', '.sppb-addon-subtitle', 'data.sub_title_fontsize', 'px');

		$output .= $lodash->unit('background', '.sppb-addon-image-overlay-icon', 'data.lightbox_icon_bg', '', false);
		$output .= $lodash->spacing('padding', '.sppb-addon-overlay-image-content', 'data.content_padding');
		$output .= $lodash->spacing('margin', '.overlay-image-button-wrap', 'data.button_margin');
		$output .= $lodash->unit('height', '.sppb-addon-overlay-image-content', 'data.image_height', 'px');

		// Button
		$buttonTypographyFallbacks = [
			'font'           => 'data.font_family',
			'size'           => 'data.fontsize',
			'letter_spacing' => 'data.letterspace',
			'uppercase'      => 'data.font_style?.uppercase',
			'italic'         => 'data.font_style?.italic',
			'underline'      => 'data.font_style?.underline',
			'weight'         => 'data.font_style?.weight',
		];

		// Button
		$output .= $lodash->typography('#btn-{{ data.id }}', 'data.typography', $buttonTypographyFallbacks);

		// custom
		$output .= '<# if (data.type == "custom") { #>';
		$output .= $lodash->unit('font-size', '#btn-{{ data.id }}.sppb-btn-custom', 'data.fontsize', 'px');
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.color');
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.background_color_hover');
		$output .= $lodash->spacing('padding', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_padding');

		$output .= '<# if (data.appearance == "outline") { #>';
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.background_color');
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.background_color_hover');
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { background-color: transparent; }';
		$output .= '<# } else if (data.appearance == "3d") { #>';
		$output .= $lodash->border('border-bottom-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.background_color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.background_color');
		$output .= '<# } else if (data.appearance == "gradient") { #>';
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { border: none; }';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.background_gradient');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.background_gradient_hover');
		$output .= '<# } else { #>';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.background_color');
		$output .= '<# } #>';

		$output .= '<# } #>';

		$output .= '<# if (data.overlay_type !== "none") { #>';
		$output .= '<# if (data.overlay_type=="color") { #>';
		$output .= $lodash->color('background-color', '.sppb-addon-overlay-image-content .overlay-background-style', 'data.overlay_color');
		$output .= '<# } else if (data.overlay_type=="gradient") { #>';
		$output .= $lodash->color('background-color', '.sppb-addon-overlay-image-content .overlay-background-style', 'data.overlay_gradient');
		$output .= '<# } #>';
		$output .= '<# } else { #>';
		$output .= '#sppb-addon-{{ data.id }} .overlay-background-style { background: transparent; }';
		$output .= '<# } #>';

		$output .= '<# if (data.overlay_hover_type !== "none") { #>';
		$output .= '<# if (data.overlay_hover_type=="color") { #>';
		$output .= $lodash->color('background-color', '.sppb-addon-overlay-image-content:hover .overlay-background-style', 'data.overlay_hover_color');
		$output .= '#sppb-addon-{{ data.id }} .sppb-addon-overlay-image-content:hover .overlay-background-style { background-image: none; }';
		$output .= '<# } else if (data.overlay_hover_type == "gradient") { #>';
		$output .= $lodash->color('background-color', '.sppb-addon-overlay-image-content:hover .overlay-background-style', 'data.overlay_hover_gradient');
		$output .= '#sppb-addon-{{ data.id }} .sppb-addon-overlay-image-content:hover .overlay-background-style { opacity:.8; }';
		$output .= '#sppb-addon-{{ data.id }} .sppb-addon-overlay-image-content:hover .overlay-background-style::after { opacity:1; }';
		$output .= '.sppb-addon-overlay-image-content:hover .overlay-background-style { background-image: none; }';
		$output .= '<# } #>';
		$output .= '<# } else { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-addon-overlay-image-content:hover  .overlay-background-style { background: transparent; }';
		$output .= '<# } #>';

		$output .= '
		<# if(image_link){ #>
			#sppb-addon-{{ data.id }} .overlay-background-image {
				background-image:url("{{image_link}}");
			}
		<# } #>
		<# if (data.global_border_radius) { #>
			#sppb-addon-{{ data.id }} {
				overflow:hidden;
			}
		<# } #>
		</style>
		
		
		<div class="sppb-addon sppb-addon-overlay-image {{data.class}} image-effect-{{data.background_image_animation}} {{data.show_content_on_hover ? "overlay-show-content-on-hover" : ""}}">
		<div class="sppb-addon-overlay-image-content title-subtitle-{{data.title_subtitle_position}}">
		<#
		if((data.title || data.sub_title) && data.title_subtitle_position){
			let title_icon_arr = (typeof data.title_icon !== "undefined" && data.title_icon) ? data.title_icon.split(" ") : "";
			let title_icon_name = title_icon_arr.length === 1 ? "fa "+data.title_icon : data.title_icon;
		#>
			<div class="overlay-image-title">
				<{{data.heading_selector}} class="sppb-addon-title">
					<# 
					const isUrlObject_title = _.isObject(data.title_link) && (!!data.title_link.url || !!data.title_link.menu || !!data.title_link.page);
					const isUrlString_title = _.isString(data.title_link) && data.title_link !== "";

					if(isUrlObject_title || isUrlString_title ){
						const isTarget = data.title_link_new_window ? "_blank": "";

					    const urlObj = data?.title_link?.url ? data.title_link : window.getSiteUrl(data.title_link, isTarget);
						const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;
                        const target = new_tab ? "_blank" : "";
						
						let rel="";
                        rel += nofollow ? "nofollow" : "";
                        rel += noopener ? " noopener" : "";
                        rel += noreferrer ? " noreferrer" : "";

						const title_url = (type === "url" && url) || (type === "menu" && urlObj.menu) || (type === "page"  && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page);
						#>

						<a href=\'{{title_url}}\' target="{{target}}" rel="{{rel}}"  >
					<# } #>
					<# if(data.title_icon){
					#>
						<i class="{{title_icon_name}}"></i>
					<# } #>
					<span class="sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{{data.title}}}</span>
					<# if(isUrlObject_title || isUrlString_title){ #>
						</a>
					<# } #>
				</{{data.heading_selector}}>
				<{{data.subtitle_heading_selector}} class="sppb-addon-subtitle">
					<#
					let sub_icon_arr = (typeof data.sub_title_icon !== "undefined" && data.sub_title_icon) ? data.sub_title_icon.split(" ") : "";
					let sub_icon_name = sub_icon_arr.length === 1 ? "fa "+data.sub_title_icon : data.sub_title_icon;

					if(data.sub_title_icon){
					#>
						<i class="{{sub_icon_name}}"></i>
					<# } #>
					<span class="sp-inline-editable-element" data-id={{data.id}} data-fieldName="sub_title" contenteditable="true">{{{data.sub_title}}}</span>
					
				</{{data.subtitle_heading_selector}}>
			<# if(data.text){
				let icon_arr = (typeof data.button_icon !== "undefined" && data.button_icon) ? data.button_icon.split(" ") : "";
				let icon_name = icon_arr.length === 1 ? "fa " + data.button_icon : data.button_icon;
			#>
				<div class="overlay-image-button-wrap">
					<# 
					 const isUrlObject_button = _.isObject(data?.url) && (!!data?.url?.url || !!data?.url?.menu || !!data?.url?.page);
					 const isUrlString_button = _.isString(data?.url) && data?.url !== "";
					  
					 let button_url;
					 let button_target;
					 let button_rel="";
					
					 if(isUrlObject_button || isUrlString_button){
						const isTarget = data.target ? "_blank": "";

					    const urlObj = data?.url?.url ? data.url : window.getSiteUrl(data.url, isTarget);
						const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;
						button_url = ( type === "url" && url) || (type === "menu" && urlObj.menu) || (type === "page" && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id="+ urlObj.page); 
                        button_target = new_tab ? "_blank" : "";
						
                        button_rel += nofollow ? "nofollow" : "";
                        button_rel += noopener ? " noopener" : "";
                        button_rel += noreferrer ? " noreferrer" : "";

					}

					#>
					<a href=\'{{ button_url }}\' id="btn-{{ data.id }}" target="{{ button_target }}" rel="{{button_rel}}" class="sppb-btn {{ classList }}"><# if(data.button_icon_position == "left" && !_.isEmpty(data.button_icon)) {
					#><i class="{{ icon_name }}"></i><# } #> {{ data.text }}<# if(data.button_icon_position == "right" && !_.isEmpty(data.button_icon)) { #> <i class="{{ icon_name }}"></i><# } #></a>
				</div>
			<# } #>
			</div>
		<# } #>
		<div class="overlay-background-image-wrapper">
		<div class="overlay-background-image"></div>
		<# if(data.image_in_lightbox && data.title_subtitle_position !== "center-center" && image_link){ #>
			<a class="sppb-magnific-popup sppb-addon-image-overlay-icon" data-popup_type="image" data-mainclass="mfp-no-margins mfp-with-zoom" href=\'{{image_link}}\'>+</a>
		<# } #>
		</div>
		<# if(data.overlay_type!="none" || data.overlay_hover_type !== "none" || data.overlay_mode === "hover"){ #>
			<div class="overlay-background-style"></div>
		<# } #>
		</div>
		</div>
		';

		return $output;
	}
}
