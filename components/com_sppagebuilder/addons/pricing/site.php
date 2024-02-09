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

class SppagebuilderAddonPricing extends SppagebuilderAddons
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
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'div';

		//Options
		$price_position = (isset($settings->price_position) && $settings->price_position) ? $settings->price_position : 'before';
		$price = (isset($settings->price) && $settings->price) ? $settings->price : '';
		$price_symbol = (isset($settings->price_symbol) && $settings->price_symbol) ? $settings->price_symbol : '';
		$duration = (isset($settings->duration) && $settings->duration) ? $settings->duration : '';
		$pricing_content = (isset($settings->pricing_content) && $settings->pricing_content) ? $settings->pricing_content : '';
		$button_text = (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : '';
		$button_url = (isset($settings->button_url) && $settings->button_url) ? $settings->button_url : '';
		$button_classes = (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
		$button_classes .= (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : '';
		$button_classes .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
		$button_classes .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
		$button_classes .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
		$button_icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
		$button_icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';
		$button_position = (isset($settings->button_position) && $settings->button_position) ? $settings->button_position : '';

		$featured = (isset($settings->featured) && $settings->featured) ? $settings->featured : '';

		list($button_url, $button_target) = AddonHelper::parseLink($settings, 'button_url', ['url' => 'button_url', 'new_tab' => 'button_target']);
		$button_attribs = (isset($button_target) && $button_target) ? ' rel="noopener noreferrer" ' . $button_target : '';
		$button_attribs .= (isset($button_url) && $button_url) ? ' href="' . $button_url . '"' : '';

		$icon_arr = array_filter(explode(' ', $button_icon));
		if (count($icon_arr) === 1)
		{
			$button_icon = 'fa ' . $button_icon;
		}

		if ($button_icon_position == 'left')
		{
			$button_text = ($button_icon) ? '<i class="' . $button_icon . '" aria-hidden="true"></i> ' . $button_text : $button_text;
		}
		else
		{
			$button_text = ($button_icon) ? $button_text . ' <i class="' . $button_icon . '" aria-hidden="true"></i>' : $button_text;
		}

		$button_output = ($button_text) ? '<a' . $button_attribs . ' id="btn-' . $this->addon->id . '" class="sppb-btn' . $button_classes . '">' . $button_text . '</a>' : '';

		$pricesymbol = ($price_symbol) ? '<span class="sppb-pricing-price-symbol">' . $price_symbol . '</span>' : '';

		//Output
		$output  = '<div class="sppb-addon sppb-addon-pricing-table ' . $class . '">';
		$output .= '<div class="sppb-pricing-box ' . $featured . '">';
		$output .= '<div class="sppb-pricing-header">';

		$output .= ($title) ? '<' . $heading_selector . ' class="sppb-addon-title sppb-pricing-title">' . $title . '</' . $heading_selector . '>' : '';
		if ($price_position == 'after')
		{
			$output .= '<div class="sppb-pricing-price-container">';
			$output .= ($price) ? '<span class="sppb-pricing-price">' . $pricesymbol . $price . '</span>' : '';
			$output .= ($duration) ? '<span class="sppb-pricing-duration">' . $duration . '</span>' : '';
			$output .= '</div>';
		}
		$output .= '</div>';

		if ($pricing_content)
		{
			$output .= '<div class="sppb-pricing-features">';
			$output .= '<ul>';

			$features = explode("\n", $pricing_content);

			foreach ($features as $feature)
			{
				$output .= '<li>' . $feature . '</li>';
			}

			$output .= '</ul>';
			$output .= '</div>';
		}

		if ($price_position == 'before')
		{
			$output .= '<div class="sppb-pricing-price-container">';
			$output .= ($price) ? '<span class="sppb-pricing-price after">' . $pricesymbol . $price . '</span>' : '';
			$output .= ($duration) ? '<span class="sppb-pricing-duration">' . $duration . '</span>' : '';
			$output .= '</div>';
		}

		$output .= '<div class="sppb-pricing-footer">';
		$output .= $button_output;
		$output .= '</div>';
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
		$cssHelper = new CSSHelper($addon_id);

		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');
		$priceStyle = $cssHelper->generateStyle('.sppb-pricing-price', $settings, ['price_color' => 'color'], false);
		$priceTypographyStyle = $cssHelper->typography('.sppb-pricing-title', $settings, 'title_typography', ['font' => 'title_font_family', 'size' => 'title_fontsize', 'line_height' => 'title_lineheight', 'letter_spacing' => 'title_letterspace', 'uppercase' => 'title_font_style.uppercase', 'italic' => 'title_font_style.italic', 'underline' => 'title_font_style.underline', 'weight' => 'title_font_style.weight']);
		$priceFontStyle = $cssHelper->typography('.sppb-pricing-price', $settings, 'price_typography', ['font' => 'price_font_family', 'size' => 'price_font_size', 'weight' => 'price_font_weight']);
		$priceSymbolStyle = $cssHelper->generateStyle('.sppb-pricing-price-symbol', $settings, ['price_symbol_color' => 'color', 'price_symbol_alignment' => 'vertical-align', 'price_symbol_font_size' => 'font-size'], ['price_symbol_color' => false, 'price_symbol_alignment' => false]);
		$durationStyle = $cssHelper->generateStyle('.sppb-pricing-duration', $settings, ['duration_color' => 'color', 'duration_font_size' => 'font-size'], ['duration_color' => false]);
		$pricingContentStyle = $cssHelper->generateStyle('.sppb-pricing-features ul li', $settings, ['pricing_content_gap' => 'margin-bottom']);
		$pricingContentFontStyle = $cssHelper->typography('.sppb-pricing-features', $settings, 'pricing_content_typography', ['font' => 'pricing_content_font_family', 'size' => 'pricing_content_font_size']);
		$pricingContentParentStyle = $cssHelper->generateStyle('.sppb-pricing-features', $settings, ['pricing_content_margin_bottom' => 'margin-bottom']);
		$priceContainerStyle = $cssHelper->generateStyle(
			'.sppb-pricing-price-container',
			$settings,
			[
				'price_margin_bottom'       => 'margin-bottom',
				'price_padding_bottom'      => 'padding-bottom',
				'price_border_bottom'       => 'border-style: solid; border-width: 0 0 %s',
				'price_border_bottom_color' => 'border-color',
			],
			['price_border_bottom_color' => false]
		);

		$settings->pricing_hover_boxshadow = CSSHelper::parseBoxShadow($settings, 'pricing_hover_boxshadow');

		$pricingHoverStyle = $cssHelper->generateStyle('&:hover', $settings, ['pricing_hover_bg' => 'background-color', 'pricing_hover_scale' => 'transform: scale(%s)', 'pricing_hover_boxshadow' => 'box-shadow'], false);
		$pricingHoverColorStyle = $cssHelper->generateStyle('&:hover .sppb-pricing-header .sppb-pricing-duration,&:hover .sppb-pricing-header .sppb-pricing-price,&:hover .sppb-pricing-header .sppb-addon-title,&:hover .sppb-pricing-features ul li', $settings, ['pricing_hover_color' => 'color'], false);
		$pricingHoverBorderColorStyle = $cssHelper->generateStyle('&:hover', $settings, ['pricing_hover_border_color' => 'border-color'], false);

		$settings->pricing_transition_duration = '0.4s';
		$pricingTransitionDurationStyle = $cssHelper->generateStyle(':self', $settings, ['pricing_transition_duration' => "transition"], false);
		$priceAlignment = $cssHelper->generateStyle('.sppb-addon-pricing-table', $settings, ['alignment' => 'text-align'], false);
		$css = '';
		$css .= $priceStyle;
		$css .= $durationStyle;
		$css .= $priceAlignment;
		$css .= $priceFontStyle;
		$css .= $priceSymbolStyle;
		$css .= $pricingHoverStyle;
		$css .= $priceContainerStyle;
		$css .= $pricingContentStyle;
		$css .= $priceTypographyStyle;
		$css .= $pricingHoverColorStyle;
		$css .= $pricingContentFontStyle;
		$css .= $pricingContentParentStyle;
		$css .= $pricingHoverBorderColorStyle;
		$css .= $pricingTransitionDurationStyle;

		// Button css
		$layoutPath = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$buttonLayout = new FileLayout('addon.css.button', $layoutPath);
		$css .= $buttonLayout->render(array('addon_id' => $addon_id, 'options' => $settings, 'id' => 'btn-' . $this->addon->id));

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
			let price_position = data.price_position || "before";

			var heading_selector = data.heading_selector || "div";

			let price_symbol = "";
			if(data.price_symbol){
				price_symbol = \'<span class="sppb-pricing-price-symbol">\'+data.price_symbol+\'</span>\';
			}

			let buttonText = "";

			const isMenu = _.isObject(data.button_url) && data.button_url.type === "menu" && data.button_url?.menu;
			const isPage = _.isObject(data.button_url) && data.button_url.type === "page" && data.button_url?.page;
			const isUrl = _.isObject(data.button_url) && data.button_url.type === "url" && data.button_url?.url;
			const isOldUrl = _.isString(data.button_url) && data.button_url !== "";

			const urlObj = _.isObject(data.button_url) ? data.button_url : window.getSiteUrl(data?.button_url || "", data?.button_target || "");
			const {url, page, menu, type, new_tab, nofollow, noopener, noreferrer} = urlObj;
			const target = new_tab ? "_blank" : "";
			
			let rel="";
			rel += nofollow ? "nofollow" : "";
			rel += noreferrer ? " noreferrer" : "";
			rel += noopener ? " noopener" : "";
		
			let newUrl = "";
			if(type === "url") newUrl = url;
			if(type === "menu") newUrl = menu;
			if(type === "page") newUrl = page ? `index.php?option=com_sppagebuilder&view=page&id=${page}` : "";

			let buttonAttribs = (new_tab)? " target=\"_blank\"":"";
			buttonAttribs += (isMenu || isPage || isUrl || isOldUrl)? " href=\""+ newUrl +"\"":"";
			buttonAttribs += (rel)? " rel=\""+ rel +"\"": "";

			let buttonClasses = (data.button_size)? " sppb-btn-"+ data.button_size : "";
			buttonClasses += (data.button_type)? " sppb-btn-"+ data.button_type : ""
			buttonClasses += (data.button_shape)? " sppb-btn-"+ data.button_shape : ""
			buttonClasses += (data.button_appearance)? " sppb-btn-"+ data.button_appearance : ""
			buttonClasses += (data.button_block)? " "+ data.button_block : ""

			let icon_arr = (typeof data.button_icon !== "undefined" && data.button_icon) ? data.button_icon.split(" ") : "";
			let icon_name = icon_arr.length === 1 ? "fa "+data.button_icon : data.button_icon;

			if ( data.button_icon_position == "left" ) {
				buttonText = ( data.button_icon )? ` <i class="${icon_name}"></i> ` + data.button_text : data.button_text
			} else {
				buttonText = ( data.button_icon )? data.button_text + ` <i class="${icon_name}"></i> ` : data.button_text
			}

			let buttonOutput = (buttonText)? "<a" + buttonAttribs + " id=\"btn-" + data.id + "\" class=\"sppb-btn"+ buttonClasses + "\">"+ buttonText +"</a>":""
			
			var modern_font_style = false;
			var button_fontstyle = data.button_fontstyle || "";
			var button_font_style = data.button_font_style || "";

			
		#>
		<style type="text/css"> ';

		$output .= '
				#sppb-addon-{{ data.id }} .sppb-pricing-header .sppb-pricing-duration,
				#sppb-addon-{{ data.id }} .sppb-pricing-header .sppb-pricing-price,
				#sppb-addon-{{ data.id }} .sppb-pricing-header .sppb-addon-title,
				#sppb-addon-{{ data.id }} .sppb-pricing-features ul li,
				#sppb-addon-{{ data.id }} .sppb-pricing-price-container,
				#sppb-addon-{{ data.id }} {
					transition:.4s;
				}
			<# if(data.price_border_bottom || data.price_border_bottom_color) { #>
				#sppb-addon-{{ data.id }} .sppb-pricing-price-container {
					border-style: solid;
					border-width:0 0 0 0;		
				}
			<# } #>';

		$output .= $lodash->unit('margin-bottom', '.sppb-pricing-price-container', 'data.price_margin_bottom', 'px');
		$output .= $lodash->unit('padding-bottom', '.sppb-pricing-price-container', 'data.price_padding_bottom', 'px');
		$output .= $lodash->unit('border-bottom-width', '.sppb-pricing-price-container', 'data.price_border_bottom', 'px');
		$output .= $lodash->border('border-color', '.sppb-pricing-price-container', 'data.price_border_bottom_color');
		$output .= $lodash->color('color', '.sppb-pricing-price', 'data.price_color');
		$output .= $lodash->unit('font-size', '.sppb-pricing-price', 'data.price_font_size', 'px');
		$output .= $lodash->unit('line-height', '.sppb-pricing-price', 'data.price_font_size', 'px');
		$output .= $lodash->unit('font-weight', '.sppb-pricing-price', 'data.price_font_weight');
		$output .= $lodash->color('color', '.sppb-pricing-price-symbol', 'data.price_symbol_color');
		$output .= $lodash->unit('vertical-align', '.sppb-pricing-price-symbol', 'data.price_symbol_alignment');
		$output .= $lodash->unit('font-size', '.sppb-pricing-price-symbol', 'data.price_symbol_font_size', 'px');
		$output .= $lodash->unit('line-height', '.sppb-pricing-price-symbol', 'data.price_symbol_font_size', 'px');
		$output .= $lodash->color('color', '.sppb-pricing-duration', 'data.duration_color');
		$output .= $lodash->unit('font-size', '.sppb-pricing-duration', 'data.duration_font_size', 'px');
		$output .= $lodash->unit('line-height', '.sppb-pricing-duration', 'data.duration_font_size', 'px');
		$output .= $lodash->unit('margin-bottom', '.sppb-pricing-features ul li', 'data.pricing_content_gap', 'px');
		$output .= $lodash->unit('margin-bottom', '.sppb-pricing-features', 'data.pricing_content_margin_bottom', 'px');

		$output .= '<# if (data.button_type == "custom") { #>';
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_color');
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= $lodash->spacing('padding', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_padding');

		$output .= '<# if (data.button_appearance == "outline") { #>';
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= '<# } else if (data.button_appearance == "3d") { #>';
		$output .= $lodash->border('border-bottom-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } else if (data.button_appearance == "gradient") { #>';
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { border: none; }';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_gradient');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_gradient_hover');
		$output .= '<# } else { #>';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } #>';
		$output .= '<# } #>';

		$buttonTypographyFallbacks = [
			'font'           => 'data.button_font_family',
			'letter_spacing' => 'data.button_letterspace',
			'weight'         => 'data.button_fontstyle?.weight',
			'italic'         => 'data.button_fontstyle?.italic',
			'underline'      => 'data.button_fontstyle?.underline',
			'uppercase'      => 'data.button_fontstyle?.uppercase',
		];

		$output .= $lodash->typography('#btn-{{ data.id }}.sppb-btn-{{ data.button_type }}', 'data.button_typography', $buttonTypographyFallbacks);

		$titleFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-pricing-title', 'data.title_typography', $titleFallbacks);

		$priceContentFallbacks = [
			'font'   => 'data.price_font_family',
			'size'   => 'data.price_font_size',
			'weight' => 'data.price_font_weight',
		];

		$output .= $lodash->typography('.sppb-pricing-price', 'data.price_typography', $priceContentFallbacks);

		$priceFeaturesFallbacks = [
			'font' => 'data.pricing_content_font_family',
			'size' => 'data.pricing_content_font_size',
		];

		$output .= $lodash->typography('.sppb-pricing-features', 'data.pricing_content_typography', $priceFeaturesFallbacks);
		$output .= $lodash->transform('scale', '&:hover', 'data.pricing_hover_scale');
		$output .= $lodash->boxShadow('&:hover', 'data.pricing_hover_boxshadow');
		$output .= $lodash->color('background-color', '&:hover', 'data.pricing_hover_bg');
		$output .= $lodash->color('color', '&:hover .sppb-pricing-header .sppb-pricing-duration, &:hover .sppb-pricing-header .sppb-pricing-price, &:hover .sppb-pricing-header .sppb-addon-title, &:hover .sppb-pricing-features ul li', 'data.pricing_hover_color');
		$output .= $lodash->border('border-color', '&:hover', 'data.pricing_hover_border_color');

		$output .= $lodash->alignment('text-align', '.sppb-addon-pricing-table', 'data.alignment');
		$output .= '
		</style>

		<div class="sppb-addon sppb-addon-pricing-table {{ data.class }}">
			<div class="sppb-pricing-box {{ data.featured }}">
				<div class="sppb-pricing-header">
					<# if( data.title ) { #>
						<{{ heading_selector }} class="sppb-addon-title sppb-pricing-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{{ data.title }}}</{{ heading_selector }}>
					<# } #>
					<# if( price_position == "after" ) { #>
						<div class="sppb-pricing-price-container">
							<# if( data.price ) { #>
								<span class="sppb-pricing-price">{{{ price_symbol }}}{{{ data.price }}}</span>
							<# } #>
							<# if( data.duration ) { #>
								<span class="sppb-pricing-duration">{{ data.duration }}</span>
							<# } #>
						</div>
					<# } #>
				</div>

				<# if(data.pricing_content) { #>
					<div class="sppb-pricing-features">
						<ul>
							<# let pContentArray = data.pricing_content?.split("\n") #>
							<# _.each(pContentArray,function(item,index){ #>
								<# if(item) { #> <li>{{{ item }}}</li><# } #>
							<# }) #>
						</ul>
					</div>
				<# } #>
				<# if( price_position == "before" ) { #>
					<div class="sppb-pricing-price-container">
						<# if( data.price ) { #>
							<span class="sppb-pricing-price">{{{ price_symbol }}}{{{ data.price }}}</span>
						<# } #>
						<# if( data.duration ) { #>
							<span class="sppb-pricing-duration">{{ data.duration }}</span>
						<# } #>
					</div>
				<# } #>
				<div class="sppb-pricing-footer">{{{ buttonOutput }}}</div>
			</div>
		</div>
		';

		return $output;
	}
}