<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Layout\FileLayout;

//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonButton_group extends SppagebuilderAddons
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

		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? ' ' . $this->addon->settings->class : '';

		$output = '<div class="sppb-addon sppb-addon-button-group' . $class . '">';
		$output .= '<div class="sppb-addon-content">';

		if (isset($this->addon->settings->sp_button_group_item) && count((array) $this->addon->settings->sp_button_group_item)) {
			foreach ($this->addon->settings->sp_button_group_item as $key => $value) {
				if ($value->title || $value->icon) {
					list($link, $target) = AddonHelper::parseLink($value, 'url', [
						'new_tab' => 'target',
						'url' => 'url'
					]);

					$class = (isset($value->type) && $value->type) ? ' sppb-btn-' . $value->type : '';
					$class .= (isset($value->size) && $value->size) ? ' sppb-btn-' . $value->size : '';
					$class .= (isset($value->block) && $value->block) ? ' ' . $value->block : '';
					$class .= (isset($value->shape) && $value->shape) ? ' sppb-btn-' . $value->shape : ' sppb-btn-rounded';
					$class .= (isset($value->appearance) && $value->appearance) ? ' sppb-btn-' . $value->appearance : '';
					$attribs = (isset($value->target) && $value->target) ? ' rel="noopener noreferrer" target="' . $value->target . '"' : '';
					$attribs .= ' id="btn-' . ($this->addon->id . $key) . '"';
					$text = (isset($value->title) && $value->title) ? $value->title : '';
					$icon = (isset($value->icon) && $value->icon) ? $value->icon : '';
					$icon_position = (isset($value->icon_position) && $value->icon_position) ? $value->icon_position : 'left';

					$icon_arr = array_filter(explode(' ', $icon));

					if (count($icon_arr) === 1) {
						$icon = 'fa ' . $icon;
					}

					if ($icon_position === 'left') {
						$text = ($icon) ? '<i class="' . $icon . '" aria-hidden="true"></i> ' . $text : $text;
					} else {
						$text = ($icon) ? $text . ' <i class="' . $icon . '" aria-hidden="true"></i>' : $text;
					}

					$hrefTag = !empty($link) ? 'href="' . $link .'"' : '';

					$output .= '<a '. $hrefTag .' ' . $target . $attribs . ' class="sppb-btn ' . $class . '">' . $text . '</a>';
				}
			}
		}

		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generate the CSS string for the frontend page.
	 *
	 * @return 	string 	The CSS string for the page.
	 * @since 	1.0.0
	 */
	public function css()
	{
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$cssHelper = new CSSHelper($addon_id);
		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');

		$css = '';
		$groupStyle = $cssHelper->generateStyle('.sppb-addon-content', $settings, ['margin' => 'margin: -%s']);
		$groupStyle .= $cssHelper->generateStyle('.sppb-addon-content .sppb-btn', $settings, ['margin' => 'margin']);
		$alignmentStyle = $cssHelper->generateStyle('.sppb-addon.sppb-addon-button-group', $settings, ['alignment' => 'text-align'], false);

		$css .= $groupStyle;
		$css .= $alignmentStyle;

		// Buttons style
		if (isset($settings->sp_button_group_item) && count((array) $settings->sp_button_group_item)) {
			foreach ($settings->sp_button_group_item as $key => $value) {
				if ($value->title) {
					$buttonLayout = new FileLayout('addon.css.button', $layout_path);

					$options = new stdClass;
					$options->button_type = (isset($value->type) && $value->type) ? $value->type : '';
					$options->button_appearance = (isset($value->appearance) && $value->appearance) ? $value->appearance : '';
					$options->button_color = (isset($value->color) && $value->color) ? $value->color : '';
					$options->button_color_hover = (isset($value->color_hover) && $value->color_hover) ? $value->color_hover : '';
					$options->button_background_color = (isset($value->background_color) && $value->background_color) ? $value->background_color : '';
					$options->button_background_color_hover = (isset($value->background_color_hover) && $value->background_color_hover) ? $value->background_color_hover : '';
					$options->button_padding = (isset($value->button_padding) && $value->button_padding) ? $value->button_padding : '';

					if (isset($options->button_padding) && is_object($options->button_padding))
					{
						$options->button_padding = $cssHelper::generateMissingBreakPoints($options->button_padding);
					}

					$options->button_size = isset($value->size) ? $value->size : null;

					// Button Type Link
					$options->link_button_color = (isset($value->link_button_color) && $value->link_button_color) ? $value->link_button_color : '';
					$options->link_border_color = (isset($value->link_border_color) && $value->link_border_color) ? $value->link_border_color : '';
					$options->link_button_border_width = (isset($value->link_button_border_width) && $value->link_button_border_width) ? $value->link_button_border_width : '';
					$options->link_button_padding_bottom = (isset($value->link_button_padding_bottom) && gettype($value->link_button_padding_bottom) == 'string') ? $value->link_button_padding_bottom : '';

					// Link Hover
					$options->link_button_hover_color = (isset($value->link_button_hover_color) && $value->link_button_hover_color) ? $value->link_button_hover_color : '';
					$options->link_button_border_hover_color = (isset($value->link_button_border_hover_color) && $value->link_button_border_hover_color) ? $value->link_button_border_hover_color : '';

					$options->button_background_gradient = (isset($value->background_gradient) && $value->background_gradient) ? $value->background_gradient : new stdClass();
					$options->button_background_gradient_hover = (isset($value->background_gradient_hover) && $value->background_gradient_hover) ? $value->background_gradient_hover : new stdClass();
					$options->button_typography = !empty($value->typography) ? $value->typography : null;

					$selector_css = new FileLayout('addon.css.selector', $layout_path);
					$css .= $selector_css->render(
						[
							'options' => $value,
							'addon_id' => $addon_id,
							'selector' => '#btn-' . ($this->addon->id . $key)
						]
					);

					$css .= $buttonLayout->render(array('addon_id' => $addon_id, 'options' => $options, 'id' => 'btn-' . ($this->addon->id . $key)));
				}	
			}
		}

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
		$lodash = new Lodash('#sppb-addon-{{ data.id }} ');


		$output = '
		<#
			var addonId = data.id;
		#>
		<style type="text/css">';

		// global
		$output .= $lodash->alignment('text-align', '.sppb-addon-button-group .sppb-addon-content', 'data.alignment');

		$output .= $lodash->unit('margin', '.sppb-addon-button-group .sppb-addon-content', 'data.margin', 'px', true, '-');
		$output .= $lodash->unit('margin', '.sppb-addon-button-group .sppb-addon-content .sppb-btn', 'data.margin', 'px');

		$output .= ' <# _.each(data.sp_button_group_item, function(button, key) { #>';

		// Button typography
		$buttonTypographyFallbacks = [
			'font'           => 'button.font_family',
			'size'           => 'button.fontsize',
			'letter_spacing' => 'button.letterspace',
			'weight'         => 'button.font_style?.weight',
			'italic'         => 'button.font_style?.italic',
			'underline'      => 'button.font_style?.underline',
			'uppercase'      => 'button.font_style?.uppercase',
		];

		$output .= $lodash->typography('#btn-{{ addonId }}{{ key }}.sppb-btn-{{ button.type }}', 'button.typography', $buttonTypographyFallbacks);

		// Custom
		$output .= '<# if (button.type == "custom") { #>';
		$output .= $lodash->color('color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.color');
		$output .= $lodash->color('color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom:hover', 'button.color_hover');
		$output .= '<# if (button.appearance != "outline") { #>';
		$output .= $lodash->color('background-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom:hover', 'button.background_color_hover');
		$output .= '<# } #>';
		$output .= '<#  if(_.isObject(button.button_padding)) { ' . $lodash->generateMissingBreakPoints('button.button_padding') .' #>';
		$output .= $lodash->spacing('padding', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.button_padding');
		$output .= '<# } else { #>';
		$output .= $lodash->spacing('padding', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.button_padding');
		$output .= '<# } #>';
		$output .= $lodash->unit('font-size', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.fontsize', 'px');

		// Outline
		$output .= '<# if (button.appearance == "outline") { #>';
		$output .= $lodash->border('border-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.background_color');
		$output .= $lodash->border('border-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom:hover', 'button.background_color_hover');
		$output .= '#sppb-addon-{{ addonId }} #btn-{{ addonId }}{{ key }}.sppb-btn-custom { background-color: transparent; }';

		// 3D
		$output .= '<# } else if (button.appearance == "3d") { #>';
		$output .= $lodash->border('border-bottom-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.background_color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.background_color ');

		// Gradient
		$output .= '<# } else if (button.appearance == "gradient" && _.isObject(button.background_gradient) ) { #>';
		$output .= '#sppb-addon-{{ addonId }} #btn-{{ addonId }}{{ key }}.sppb-btn-custom { border: none; } ';
		$output .= $lodash->color('background-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.background_gradient');
		$output .= $lodash->color('background-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom:hover', 'button.background_gradient_hover');
		$output .= '<# } else { #>';
		$output .= $lodash->color('background-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-custom', 'button.background_color');
		$output .= '<# } #>';
		$output .= '<# } #>';

		// Link
		$output .= '<# if (button.type == "link") { #>';
		// Normal
		$output .= $lodash->color('color', '#btn-{{ addonId }}{{ key }}.sppb-btn-link', 'button.link_button_color');
		$output .= $lodash->border('border-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-link', 'button.link_border_color');
		$output .= $lodash->unit('border-bottom-width', '#btn-{{ addonId }}{{ key }}.sppb-btn-link', 'button.link_button_border_width', 'px', false);
		$output .= $lodash->unit('padding-bottom', '#btn-{{ addonId }}{{ key }}.sppb-btn-link', 'button.link_button_padding_bottom', 'px', false);
		$output .= '#sppb-addon-{{ addonId }} #btn-{{ addonId }}{{ key }}.sppb-btn-link { text-decoration: none; }';
		$output .= '#sppb-addon-{{ addonId }} #btn-{{ addonId }}{{ key }}.sppb-btn-link { border-radius: 0; }';

		// Hover
		$output .= '<# if (button.link_button_status == "hover") { #>';
		$output .= $lodash->color('color', '#btn-{{ addonId }}{{ key }}.sppb-btn-link:hover, #btn-{{ addonId }}{{ key }}.sppb-btn-link:focus', 'button.link_button_hover_color');
		$output .= $lodash->border('border-color', '#btn-{{ addonId }}{{ key }}.sppb-btn-link:hover, #btn-{{ addonId }}{{ key }}.sppb-btn-link:focus', 'button.link_button_border_hover_color');
		$output .= '<# } #>';
		$output .= '<# } #>';

		$output .= '<# }); #>';

		$output .= '
		</style>

		<div class="sppb-addon sppb-addon-button-group {{ data.class }}">
			<div class="sppb-addon-content">
				<#
				 _.each(data.sp_button_group_item, function(button, key){
					var classList = button.class;
					classList += " sppb-btn-"+button.type;
					classList += " sppb-btn-"+button?.size;
					classList += " sppb-btn-"+button?.shape;
					if(!_.isEmpty(button.appearance)){
						classList += " sppb-btn-"+button.appearance;
					}

					classList += " "+button.block;
					let icon_arr = (typeof button.icon !== "undefined" && button.icon) ? button.icon.split(" ") : "";
					let icon_name = icon_arr.length === 1 ? "fa "+button.icon : button.icon;

					/*** Button Link ****/
					const isUrlObject = _.isObject(button?.url) && ( !!button?.url?.url || !!button?.url?.page || !!button?.url?.menu);
					const isUrlString = _.isString(button?.url) && button?.url !== "";
					
					let href;
					let target;
					let rel;
					let relData="";

					if(isUrlObject || isUrlString ){
						const urlObj = button?.url?.url ? button?.url : window.getSiteUrl(button?.url, button?.target);
						const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;
						
						target = new_tab ? `target="_blank"` : "";
					
						relData += nofollow ? "nofollow" : "";
						relData += noopener ? " noopener" : "";
						relData += noreferrer ? " noreferrer" : "";

						rel = `rel="${relData}"`;
						
						const buttonUrl = (type === "url" && url) || ( type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page ) && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
						
						href = buttonUrl ? `href=${buttonUrl}` : "";
					}	
					
					#>
					<a {{href}} {{target}} {{rel}} id="btn-{{ addonId }}{{ key }}"  class="sppb-btn {{ classList }}"><# if(button.icon_position == "left" && !_.isEmpty(button.icon)) { #><i class="{{ icon_name }}"></i> <# } #><span class="sp-editable-content" data-id={{ data.id }} data-button-group-index={{ key }} data-fieldName="text" data-placeholder="Add text...">{{{ button.title }}}</span><# if(button.icon_position == "right" && !_.isEmpty(button.icon)) { #> <i class="{{ icon_name }}"></i><# } #></a>
				<# }); #>
			</div>
		</div>
		<# if(!data.sp_button_group_item.length){ #>
			<div class="sppb-empty-addon">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="140.1px" height="24.2px" viewBox="0 0 140.1 24.2" >
				<path class="st0" d="M19,13.5c-0.4-0.4-0.8-0.4-1.1,0.1c-0.9,1.1-1.9,2.1-2.9,3c-3.5,3-7.6,4.7-12.1,5.5
						c-0.6,0.1-0.8-0.1-0.8-0.7c0-0.9,0-1.9,0-2.8l0,0l0,0l0,0V5.5V4.9c0-0.2,0-0.4,0.3-0.5c0.4-0.3,0.7,0.2,1.1,0.5
						c3.4,2.4,6.8,4.9,10.2,7.3c0.5,0.3,0.5,0.5,0.1,0.9c-2.6,2.4-5.5,4.1-8.9,5.1c-1.2,0.3-1.2,0.3-1.2,1.6c0,0.5,0.1,0.6,0.6,0.5
						c1-0.2,2-0.5,2.9-0.8c3.7-1.4,6.8-3.5,9.4-6.5c0.6-0.7,0.6-0.6-0.1-1.2C11.1,7.9,5.9,4.2,0.7,0.5C0.6,0.4,0.4,0.3,0.3,0.4
						c-0.2,0-0.1,0.2-0.1,0.4c0,0.9,0,1.8,0,2.7c0,0.3,0,0.4,0,0.6v3.2l0,0v2.6v1.2V13v1.4v1.5l0,0l-0.1,4.3l0,0c0,0.3,0,0.5,0,0.7
						c0,0.8,0,1.7,0,2.5c0,0.4,0.1,0.6,0.6,0.6c2.1-0.1,4.1-0.4,6.1-1c5-1.5,9.1-4.2,12.5-8.1C19.9,14.2,19.9,14.2,19,13.5z"/>
				<path class="st1" d="M9.1,12.3c0.1-0.1,0.1-0.2,0-0.3c-1.2-0.9-2.4-1.7-3.5-2.5C5.4,9.4,5.3,9.2,5.2,9.3
						c-0.1,0-0.1,0.1-0.1,0.2v0.2v4.5C6.8,14.1,8.2,13.1,9.1,12.3z"/>
				</svg>
			</div>
		<# } #>
		';

		return $output;
	}
}