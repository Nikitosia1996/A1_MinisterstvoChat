<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');


use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

class SppagebuilderAddonClients extends SppagebuilderAddons
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
		$class = (isset($settings->class) && $settings->class) ? ' ' . $settings->class : '';
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		// $alignment = (isset($settings->alignment) && $settings->alignment) ? ' ' . $settings->alignment : '';
		$columns = (isset($settings->count) && $settings->count) ? $settings->count : 2;
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

		// Carousel
		$create_carousel = (isset($settings->create_carousel) && $settings->create_carousel) ? $settings->create_carousel : 0;
		$carousel_autoplay = (isset($settings->carousel_autoplay) && $settings->carousel_autoplay) ? $settings->carousel_autoplay : 0;
		$carousel_speed = (isset($settings->carousel_speed) && $settings->carousel_speed) ? $settings->carousel_speed : 2000;
		$carousel_interval = (isset($settings->carousel_interval) && $settings->carousel_interval) ? $settings->carousel_interval : 3500;
		$carousel_margin = (isset($settings->carousel_margin) && $settings->carousel_margin) ? $settings->carousel_margin : 20;

		$carousel_item_number_xl = !empty($settings->carousel_item_number_xl) ? $settings->carousel_item_number_xl : 5;
		$carousel_item_number_lg = !empty($settings->carousel_item_number_lg) ? $settings->carousel_item_number_lg : 4;
		$carousel_item_number_md = !empty($settings->carousel_item_number_md) ? $settings->carousel_item_number_md : 3;
		$carousel_item_number_sm = !empty($settings->carousel_item_number_sm) ? $settings->carousel_item_number_sm : 3;
		$carousel_item_number_xs = !empty($settings->carousel_item_number_xs) ? $settings->carousel_item_number_xs : 2;

		$carousel_bullet = (isset($settings->carousel_bullet) && $settings->carousel_bullet) ? $settings->carousel_bullet : 0;
		$carousel_arrow = (isset($settings->carousel_arrow) && $settings->carousel_arrow) ? $settings->carousel_arrow : 0;

		$output   = '';
		$output  = '<div class="sppb-addon sppb-addon-clients' . '' . $class . '' . ($create_carousel ? ' sppb-carousel-extended' : '') . '"  data-arrow="' . $carousel_arrow . '" data-left-arrow="fa-angle-left" data-right-arrow="fa-angle-right" data-dots="' . $carousel_bullet . '" data-autoplay="' . $carousel_autoplay . '" data-speed="' . $carousel_speed . '" data-interval="' . $carousel_interval . '" data-margin="' . $carousel_margin . '" data-item-number-xl="' . $carousel_item_number_xl . '" data-item-number-lg="' . $carousel_item_number_lg . '" data-item-number-md="' . $carousel_item_number_md . '" data-item-number-sm="' . $carousel_item_number_sm . '" data-item-number-xs="' . $carousel_item_number_xs . '">';

		if ($title && empty($create_carousel))
		{
			$output .= '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>';
		}

		if ($create_carousel)
		{
			if (isset($settings->sp_clients_item) && is_array($settings->sp_clients_item))
			{
				foreach ($settings->sp_clients_item as $item_key => $carousel_item)
				{
					$carousel_img = (isset($carousel_item->image) && $carousel_item->image) ? $carousel_item->image : '';
					$carousel_img_src = isset($carousel_img->src) ? $carousel_img->src : $carousel_img;

					list($url, $url_same_window) = AddonHelper::parseLink($carousel_item, "url", ['url' => 'url', 'new_tab' => 'url_same_window']);

					$output .= '<div class="sppb-carousel-extended-item">';

					if (isset($url) && $url) $output .= '<a ' . (isset($url_same_window) && $url_same_window ? $url_same_window : '') . ' rel="nofollow" href="' . $url . '">';

					$output .= '<img class="sppb-img-responsive sppb-addon-clients-image" src="' . $carousel_img_src . '" alt="' . ((isset($carousel_item->title) && $carousel_item->title) ? $carousel_item->title : '') . '" loading="lazy">';

					if (isset($url) && $url) $output .= '</a>';

					$output .= '</div>';
				}
			}
		}
		else
		{
			$output .= '<div class="sppb-addon-content">';
			$output .= '<div class="sppb-row">';

			foreach ($settings->sp_clients_item as $key => $value)
			{
				$client_img = (isset($value->image) && $value->image) ? $value->image : '';
				$client_img_src = isset($client_img->src) ? $client_img->src : $client_img;
				$client_img_width = (isset($client_img->width) && $client_img->width) ? $client_img->width : '';
				$client_img_height = (isset($client_img->height) && $client_img->height) ? $client_img->height : '';

				if ($client_img_src)
				{
					// Lazy image loading
					$client_img_src = (strpos($client_img_src, "http://") !== false || strpos($client_img_src, "https://") !== false) ? $client_img_src : Uri::base(true) . '/' . $client_img_src;

					$placeholder = $client_img_src == '' ? false : $this->get_image_placeholder($client_img_src);

					$target = '';
					$output .= '<div class="' . $columns . '">';

					list($url, $target) = AddonHelper::parseLink($value, 'url');

					if (!empty($url) && $url) $output .= '<a ' . $target . ' href="' . $url . '">';

					$output .= '<img class="sppb-img-responsive sppb-addon-clients-image' . ($placeholder ? ' sppb-element-lazy' : '') . '" src="' . ($placeholder ? $placeholder : $client_img_src) . '" alt="' . ((isset($value->title) && $value->title) ? $value->title : '') . '" ' . ($placeholder ? 'data-large="' . $client_img_src . '"' : '') . ' ' . ($client_img_width ? 'width="' . $client_img_width . '"' : '') . ' ' . ($client_img_height ? 'height="' . $client_img_height . '"' : '') . ' loading="lazy">';

					if (!empty($url) && $url) $output .= '</a>';

					$output .= '</div>';
				}
			}

			$output  .= '</div>';
			$output  .= '</div>';
		}

		$output  .= '</div>';

		return $output;
	}

	/**
	 * Add required script files for the addon.
	 *
	 * @return 	void
	 * @since 	1.0.0
	 */
	public function scripts()
	{
		HTMLHelper::_('jquery.framework');
		HTMLHelper::_('script', 'components/com_sppagebuilder/assets/js/sp_carousel.js', [], ['defer' => true]);
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
		$alignmentStyle = $cssHelper->generateStyle('.sppb-addon-clients', $settings, ['alignment' => 'text-align'], false);

		$css = '';
		$remove_filter = (isset($settings->remove_filter) && $settings->remove_filter) ? $settings->remove_filter : '';
		$scale_on_hover = (isset($settings->scale_on_hover) && $settings->scale_on_hover) ? $settings->scale_on_hover : '';
		$scale_value = (isset($settings->scale_value) && $settings->scale_value) ? $settings->scale_value : '';

		$filter_style = '';
		$filter_css = '';

		$filterStyle = '';

		if (isset($settings->add_css_filder) && is_array($settings->add_css_filder))
		{
			foreach ($settings->add_css_filder as $filter_key => $filter_value)
			{
				if ($filter_value == 'grayscale' && isset($settings->grayscale_value) && $settings->grayscale_value)
				{
					$filter_css .= 'grayscale(' . $settings->grayscale_value . '%) ';
				}

				if ($filter_value == 'opacity' && isset($settings->opacity_value) && $settings->opacity_value)
				{
					$filter_css .= 'opacity(' . $settings->opacity_value . '%)';
				}

				$filter_style = 'filter:' . $filter_css . ';';
			}
		}


		if ($filter_style)
		{
			$css .= $addon_id . ' .sppb-addon-clients-image {';
			$css .= $filter_style;
			$css .= '}';
		}

		if ($remove_filter)
		{
			$css .= $addon_id . ' .sppb-addon-clients-image:hover {';
			$css .= 'filter: none;';
			$css .= '}';
		}
		if ($scale_on_hover && $scale_value)
		{
			$css .= $addon_id . ' .sppb-addon-clients-image:hover {';
			$css .= 'transform: scale(' . $scale_value . ');';
			$css .= '}';
		}

		$css .= $alignmentStyle;
		return $css;
	}

	public static function getTemplate()
	{

		$lodash = new Lodash('#sppb-addon-{{ data.id }}');
		$output = '
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

		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);

		// alignment
		$output .= $lodash->alignment('text-align', '.sppb-addon-clients', 'data.alignment');

		$output .= '<# if (data.scale_on_hover) { #>';
		$output .= $lodash->transform('scale', '.sppb-addon-clients-image:hover', 'data.scale_value');
		$output .= '<# } #>';

		$output .= '
			<# 
			let filter_style = "";
			let filter_css = "";
			if(!_.isEmpty(data.add_css_filder) && _.isArray(data.add_css_filder)){
				_.each(data.add_css_filder, function(filter_value){
					if(filter_value == "grayscale" && !_.isEmpty(data.grayscale_value) && data.grayscale_value){
						filter_css += `grayscale(${data.grayscale_value}%) `;
					}
					
					if(filter_value == "opacity" && !_.isEmpty(data.opacity_value) && data.opacity_value){
						filter_css += `opacity(${data.opacity_value}%)`;
					}
					filter_style = `filter:${filter_css};`;
				})
			}
			
			if(data.add_css_filder != ""){
			#>
				#sppb-addon-{{ data.id }} .sppb-addon-clients-image {
					{{filter_style}}
				}
			<# }
			if(data.add_css_filder != "" && data.remove_filter){
			#>
				#sppb-addon-{{ data.id }} .sppb-addon-clients-image:hover {
					filter: none;
				}
			<# } #>
		</style>
		<# 

		let carousel_item_number_xl = 5;
		let carousel_item_number_lg = 4;
		let carousel_item_number_md = 3;
        let carousel_item_number_sm = 3;
        let carousel_item_number_xs = 2;
		
        if(_.isObject(data.carousel_item_number)){
			const {carousel_item_number} = data;
			const {xl, lg, md, sm, xs} = carousel_item_number;

			carousel_item_number_xl = parseInt(xl) ? xl : 5;
			carousel_item_number_lg = parseInt(lg) ? lg : 4;
            carousel_item_number_md = parseInt(md) ? md : 3;
            carousel_item_number_sm = parseInt(sm) ? sm : 3;
            carousel_item_number_xs = parseInt(xs) ? xs : 2;
		}
		let column_class  = data.count;
		#>
		<div class="sppb-addon sppb-addon-clients {{ data.class }} {{(data.create_carousel ? \' sppb-carousel-extended\' : \'\')}}" data-left-arrow="fa-angle-left" data-right-arrow="fa-angle-right" data-arrow="{{data.carousel_arrow}}" data-dots="{{data.carousel_bullet}}" data-autoplay="{{data.carousel_autoplay}}" data-speed="{{data.carousel_speed || 2000}}" data-interval="{{data.carousel_interval ||3500}}" data-margin="{{data.carousel_margin}}" data-item-number-xl="{{carousel_item_number_xl}}" data-item-number-lg="{{carousel_item_number_lg}}" data-item-number-md="{{carousel_item_number_md}}" data-item-number-sm="{{carousel_item_number_sm}}" data-item-number-xs="{{carousel_item_number_xs}}">
			<# if( !_.isEmpty( data.title )  && !data.create_carousel){ #><{{ data.heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ data.heading_selector }}><# } #>
			<# if(data.create_carousel) {
				if(typeof data.sp_clients_item !== "undefined" && _.isArray(data.sp_clients_item)){
					_.each(data.sp_clients_item, function(carousel_item){
						var carouselImg = {}
						if (typeof carousel_item.image !== "undefined" && typeof carousel_item.image.src !== "undefined") {
							carouselImg = carousel_item.image
						} else {
							carouselImg = {src: carousel_item.image}
						}
						
						#>
						<div class="sppb-carousel-extended-item">
						<# 
						const isMenu = _.isObject(carousel_item.url) && carousel_item.url.type === "menu" && carousel_item.url.menu;
						const isPage = _.isObject(carousel_item.url) && carousel_item.url.type === "page" && carousel_item?.url.page;
						const isUrl = _.isObject(carousel_item.url) && carousel_item.url.type === "url" && carousel_item?.url.url;
						const isOldUrl = _.isString(carousel_item.url) && carousel_item.url !== "";
							
						if(isMenu || isPage || isUrl || isOldUrl){
							const urlObj = _.isObject(carousel_item.url) ? carousel_item.url : window.getSiteUrl(carousel_item.url, carousel_item.url_same_window === 1 ? "_blank" : "");
							const {url, page, menu, type, new_tab, nofollow, noopener, noreferrer} = urlObj;
							const target = new_tab ? "_blank" : "";
							
							let relData = ""; 
							relData += nofollow ? "nofollow" : "";
							relData += noopener ? " noopener" : "";
							relData += noreferrer ? " noreferrer" : "";
							
							let newUrl = "";
							if(type === "url") newUrl = url;
							if(type === "menu") newUrl = menu;
							if(type === "page") newUrl = page ? `index.php?option=com_sppagebuilder&view=page&id=${page}` : "";
						#>
						<a href=\'{{ newUrl }}\' target=\'{{ target }}\' rel=\'{{ relData }}\' >
						<#
						}
						#>
							<# if(carouselImg.src && carouselImg.src.indexOf("https://") == -1 && carouselImg.src.indexOf("http://") == -1){ #>
								<img class="sppb-img-responsive sppb-addon-clients-image" src=\'{{ pagebuilder_base + carouselImg.src }}\' alt="{{ carousel_item.title }}">
							<# } else if(carouselImg.src){ #>
								<img class="sppb-img-responsive sppb-addon-clients-image" src=\'{{ carouselImg.src }}\' alt="{{ carousel_item.title }}">
							<# } #>
						<# if(isMenu || isPage || isUrl || isOldUrl){ #></a><# } #>
						</div>
					<# }); 
				}
			} else { #>
			<div class="sppb-addon-content">
				<div class="sppb-row">
					<# _.each(data.sp_clients_item, function(clients_item, key){
						var clientImg = {}
						if (typeof clients_item.image !== "undefined" && typeof clients_item.image.src !== "undefined") {
							clientImg = clients_item.image
						} else {
							clientImg = {src: clients_item.image}
						}
						if(clientImg.src){
					#>
							<div class="{{ column_class }}">
							<# 
								const isMenu = _.isObject(clients_item.url) && clients_item.url.type === "menu" && clients_item.url.menu;
								const isPage = _.isObject(clients_item.url) && clients_item.url.type === "page" && clients_item?.url.page;
								const isUrl = _.isObject(clients_item.url) && clients_item.url.type === "url" && clients_item?.url.url;
								const isOldUrl = _.isString(clients_item.url) && clients_item.url !== "";
							
								if(isMenu || isPage || isUrl || isOldUrl){
									const urlObj = _.isObject(clients_item.url) ? clients_item.url : window.getSiteUrl(clients_item.url, clients_item.url_same_window === 1 ? "_blank" : "");
									const {url, page, menu, type, new_tab, nofollow, noopener, noreferrer} = urlObj;
									const target = new_tab ? "_blank" : "";
									
									let relData = ""; 
									relData += nofollow ? "nofollow" : "";
									relData += noopener ? " noopener" : "";
									relData += noreferrer ? " noreferrer" : "";
									
									let newUrl = "";
									if(type === "url") newUrl = url;
									if(type === "menu") newUrl = menu;
									if(type === "page") newUrl = page ? `index.php?option=com_sppagebuilder&view=page&id=${page}` : "";
									#>

									<a href=\'{{ newUrl }}\' target=\'{{ target }}\' rel=\'{{ relData }}\' >
									<# } #>
									<# if(clientImg.src && clientImg.src.indexOf("https://") == -1 && clientImg.src.indexOf("http://") == -1){ #>
										<img class="sppb-img-responsive sppb-addon-clients-image" src=\'{{ pagebuilder_base + clientImg.src }}\' alt="{{ clients_item.title }}">
									<# } else if(clientImg.src){ #>
										<img class="sppb-img-responsive sppb-addon-clients-image" src=\'{{ clientImg.src }}\' alt="{{ clients_item.title }}">
									<# } #>
								<# if((_.isObject(clients_item?.url) && clients_item?.url?.url !== "") || (!_.isObject(clients_item?.url) && clients_item?.url !== "")){ #></a><# } #>
							</div>
						<# } #>
					<# }); #>
				</div>
			</div>
			<# } #>
		</div>
		';

		return $output;
	}
}
