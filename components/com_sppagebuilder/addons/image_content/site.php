<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

class SppagebuilderAddonImage_content extends SppagebuilderAddons
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
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

		// Options
		$image = (isset($settings->image) && $settings->image) ? $settings->image : '';
		$image_src = isset($image->src) ? $image->src : $image;
		$image_alignment = (isset($settings->image_alignment) && $settings->image_alignment) ? $settings->image_alignment : '';
		$text = (isset($settings->text) && $settings->text) ? $settings->text : '';
		$button_text = (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : '';
		// $button_url = (isset($settings->button_url) && $settings->button_url) ? $settings->button_url : '';
		$button_classes = (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
		$button_classes .= (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : '';
		$button_classes .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
		$button_classes .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
		$button_classes .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
		$button_icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
		$button_icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';
		$button_position = (isset($settings->button_position) && $settings->button_position) ? $settings->button_position : '';
		// $button_attribs = (isset($settings->button_target) && $settings->button_target) ? ' rel="noopener noreferrer" target="' . $settings->button_target . '"' : '';
		// $button_attribs .= (isset($settings->button_url) && $settings->button_url) ? ' href="' . $settings->button_url . '"' : '';

		list($buttonLink, $buttonTarget) = AddonHelper::parseLink($settings, 'button_url', ['url' => 'button_url', 'new_tab' => 'button_target']);

		$icon_arr = array_filter(explode(' ', $button_icon));

		if (count($icon_arr) === 1) {
			$button_icon = 'fas ' . $button_icon;
		}

		if ($button_icon_position === 'left') {
			$button_text = ($button_icon) ? '<i class="' . $button_icon . '" aria-hidden="true"></i> ' . $button_text : $button_text;
		} else {
			$button_text = ($button_icon) ? $button_text . ' <i class="' . $button_icon . '" aria-hidden="true"></i>' : $button_text;
		}


		$button_output = !empty($button_text) ? '<a href="' . $buttonLink . '" ' . $buttonTarget . ' id="btn-' . $this->addon->id . '" class="sppb-btn' . $button_classes . '">' . $button_text . '</a>' : '';

		if ($image_alignment === 'left') {
			$content_class = ' sppb-col-sm-offset-6';
		} else {
			$content_class = '';
		}

		if ($image_src && $text) {

			$output  = '<div class="sppb-addon sppb-addon-image-content aligment-' . $image_alignment . ' clearfix ' . $class . '">';

			// Image
			if (strpos($image_src, 'http://') !== false || strpos($image_src, 'https://') !== false) {
				$output .= '<div class="sppb-image-holder" style="background-image: url(' . $image_src . ');" role="img" aria-label="' . strip_tags($title) . '">';
			} else {
				$output .= '<div class="sppb-image-holder" style="background-image: url(' . Uri::base(true) . '/' . $image_src . ');" role="img" aria-label="' . strip_tags($title) . '">';
			}
			$output .= '</div>';

			// Content
			$output .= '<div class="sppb-container">';
			$output .= '<div class="sppb-row">';

			if ($image_alignment === 'left') {
				$output .= '<div class="sppb-col-sm-6"></div>';
			}

			$output .= '<div class="sppb-col-sm-6' . $content_class . '">';
			$output .= '<div class="sppb-content-holder">';
			$output .= ($title) ? '<' . $heading_selector . ' class="sppb-image-content-title sppb-addon-title">' . $title . '</' . $heading_selector . '>' : '';
			$output .= ($text) ? '<p class="sppb-image-content-text">' . $text . '</p>' : '';

			$output .= $button_output;

			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';

			$output .= '</div>';

			return $output;
		}
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
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css_path = new FileLayout('addon.css.button', $layout_path);
		$settings = $this->addon->settings;
		$cssHelper = new CSSHelper($addon_id);
		$css = '';

		$imageContentStyle = $cssHelper->generateStyle('.sppb-addon-image-content .sppb-content-holder', $settings, ['content_padding' => 'padding'], false, ['content_padding' => 'spacing']);
		$textContentTypography = $cssHelper->typography('.sppb-image-content-text', $settings, 'text_typography', []);
		
		$css .= $imageContentStyle;
		$css .= $textContentTypography;
		$css .= $css_path->render(array('addon_id' => $addon_id, 'options' => $settings, 'id' => 'btn-' . $this->addon->id));
		
		$css .= $cssHelper->generateStyle('.sppb-btn', $settings, ['button_margin_top' => 'margin-top'], 'px');
		
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
			let content_class = "";
			let img = {}

			if (typeof data.image !== "undefined" && typeof data.image.src !== "undefined") {
				img = data.image
			} else {
				img = {src: data.image}
			}

			if (data.image_alignment == "left") {
				content_class = " sppb-col-sm-offset-6";
			}

			let button_text = data.button_text;
			let icon_arr = (typeof data.button_icon !== "undefined" && data.button_icon) ? data.button_icon.split(" ") : "";
			let icon_name = icon_arr.length === 1 ? "fa "+data.button_icon : data.button_icon;

			if (data.button_icon_position == "left" && data.button_icon) {
				button_text = \'<i class="\' + icon_name + \'"></i> \' + data.button_text;
			} else if(data.button_icon){
				button_text = data.button_text + \' <i class="\' + icon_name + \'"></i>\';
			}

			let button_classes = "";

			if (data.button_size) {
				button_classes = button_classes + " sppb-btn-" + data.button_size;
			}

			if (data.button_type) {
				button_classes = button_classes + " sppb-btn-" + data.button_type;
			}

			if (data.button_shape) {
				button_classes = button_classes + " sppb-btn-" + data.button_shape;
			} else {
				button_classes = button_classes + " sppb-btn-rounded";
			}

			if (data.button_appearance) {
				button_classes = button_classes + " sppb-btn-" + data.button_appearance;
			}
		#>
		<style type="text/css">';

		// image
		$output .= '<# if (img.src.indexOf("https://") == -1 && img.src.indexOf("https://") == -1) { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-image-holder {background-image: url({{ pagebuilder_base + img.src }});}';
		$output .= '<# } else { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-image-holder {background-image: url({{ img.src }});}';
		$output .= '<# } #>';

		// button start
		$buttonTypographyFallbacks = [
			'font'           => 'data.button_font_family',
			'size'           => 'data.button_fontsize',
			'letter_spacing' => 'data.button_letterspace',
			'uppercase'      => 'data.button_font_style?.uppercase',
			'italic'         => 'data.button_font_style?.italic',
			'underline'      => 'data.button_font_style?.underline',
			'weight'         => 'data.button_font_style?.weight'
		];
		$output .= $lodash->typography('.sppb-btn', 'data.button_typography', $buttonTypographyFallbacks);
		$output .= '<# if (data.button_size == "custom") { #>';
		$output .= $lodash->spacing('padding', '.sppb-btn', 'data.button_padding');
		$output .= '<# } #>';
		$output .= $lodash->unit('margin-top', '.sppb-btn', 'data.button_margin_top', 'px');
		$output .= '<# if (data.button_block == "sppb-btn-block") { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-btn {display: block;}';
		$output .= '<# } #>';

		// custom style
		$output .= '<# if (data.button_type == "custom") { #>';
		$output .= $lodash->color('color', '.sppb-btn', 'data.button_color');
		$output .= $lodash->color('color', '.sppb-btn:hover', 'data.button_color_hover');

		$output .= '<# if (data.button_appearance == "outline") { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-btn {background-color: transparent;}';
		$output .= $lodash->unit('border-color', '.sppb-btn', 'data.button_background_color', '', false);
		$output .= $lodash->unit('border-color', '.sppb-btn:hover', 'data.button_background_color_hover', '', false);
		$output .= '<# } else if (data.button_appearance == "gradient") { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-btn {border: none;}';
		$output .= $lodash->color('background-color', '.sppb-btn', 'data.button_background_gradient');
		$output .= $lodash->color('background-color', '.sppb-btn:hover', 'data.button_background_gradient_hover');
		$output .= '<# } else { #>';
		$output .= $lodash->color('background-color', '.sppb-btn', 'data.button_background_color');
		$output .= $lodash->color('background-color', '.sppb-btn:hover', 'data.button_background_color_hover');
		$output .= '<# } #>';
		$output .= '<# } #>';

		// link
		$output .= '<# if (data.button_type == "link") { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-btn {padding: 0; border-width: 0; text-decoration: none; border-radius: 0;}';
		$output .= $lodash->color('color', '.sppb-btn', 'data.link_button_color');
		$output .= $lodash->unit('border-color', '.sppb-btn', 'data.link_button_border_color', '', false);
		$output .= $lodash->unit('border-bottom-width', '.sppb-btn', 'data.link_button_border_width', 'px');
		$output .= $lodash->unit('padding-bottom', '.sppb-btn', 'data.link_button_padding_bottom', 'px');
		$output .= $lodash->color('color', '.sppb-btn:hover, .sppb-btn:focus', 'data.link_button_hover_color');
		$output .= $lodash->unit('border-color', '.sppb-btn:hover, .sppb-btn:focus', 'data.link_button_border_hover_color', '', false);
		$output .= '<# } #>';
		// button end

		// title
		$titleTypographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight'
		];
		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);

		// content
		$output .= $lodash->typography('.sppb-image-content-text', 'data.text_typography');
		$output .= $lodash->spacing('padding', '.sppb-addon-image-content .sppb-content-holder', 'data.content_padding');
		$output .= '
		</style>
		<div class="sppb-addon sppb-addon-image-content aligment-{{ data.image_alignment }} clearfix {{ data.class }}">
			<div class="sppb-image-holder"></div>
			<div class="sppb-container">
				<div class="sppb-row">
					<# if(data.image_alignment == "left") { #>
						<div class="sppb-col-sm-6"></div>
					<# } #>
					<div class="sppb-col-sm-6 {{ content_class }}">
						<div class="sppb-content-holder">
                            <# if (!_.isEmpty(data.title)) { #>
								<{{ data.heading_selector }} class="sppb-image-content-title sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ data.heading_selector }}>
							<# } #>
                            
							<# if (data.text) { #>
								<div id="addon-text-{{data.id}}" class="sppb-image-content-text sp-editable-content" data-id={{data.id}} data-fieldName="text">{{{ data.text }}}</div>
							<# } #>

						    <# if (button_text) { 
								const isMenuBtn = _.isString(data.button_url?.menu) && data.button_url.type === "menu" && data.button_url?.menu;
								const isPageBtn = _.isString(data.button_url?.page) && data.button_url.type === "page" && data.button_url?.page;
								const isObjectBtn = _.isObject(data.button_url) && ((data.button_url.type === "url" && data.button_url?.url !== "") ||  isMenuBtn || isPageBtn);
								
								let urlObjBtn = {};
								let urlBtn = "";
								let targetBtn= "";
								let relBtn = "";
			
								urlObjBtn = isObjectBtn ? data.button_url : window.getSiteUrl(data.button_url, data.btn_target);
								if(urlObjBtn.type === "url") {	
									urlBtn = urlObjBtn.url;
								}
								if(urlObjBtn.type === "menu") {
									urlBtn = urlObjBtn.menu || "";
								}
								
								if(urlObjBtn.type === "page") {
									urlBtn = urlObjBtn.page ? `index.php?option=com_sppagebuilder&view=page&id=${urlObjBtn.page}` : "";
								}
								targetBtn = urlObjBtn.new_tab ? "_blank": "";
								
								relBtn += urlObjBtn.nofollow ? "nofollow": "";
								relBtn += urlObjBtn.noopener ? " noopener": "";
								relBtn += urlObjBtn.noreferrer ? " noreferrer": "";
							
								#>

                                <a href=\'{{ urlBtn }}\' target=\'{{ targetBtn }}\' rel=\'{{ relBtn }}\' class="sppb-btn {{ button_classes }}">{{{ button_text }}}</a>
							<# } #>
						</div>
					</div>
				</div>
			</div>
		</div>
		';

		return $output;
	}
}
