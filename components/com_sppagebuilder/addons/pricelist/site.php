<?php

/**
 * @package SP Page Builder
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Uri\Uri;

// No direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonPricelist extends SppagebuilderAddons
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

		// Options
		$text = (isset($settings->text) && $settings->text) ? $settings->text : '';

		$price_position = (isset($settings->price_position) && $settings->price_position) ? $settings->price_position : 'right-to-title';
		$price = (isset($settings->price) && $settings->price) ? $settings->price : '$20.00';
		$discount_price = (isset($settings->discount_price) && $settings->discount_price) ? $settings->discount_price : '';
		$add_line = (isset($settings->add_line) && $settings->add_line) ? $settings->add_line : 0;
		$line_style = (isset($settings->line_style) && $settings->line_style) ? $settings->line_style : 'solid';
		$line_position = (isset($settings->line_position) && $settings->line_position) ? $settings->line_position : 'center';

		$add_number_or_image = (isset($settings->add_number_or_image) && $settings->add_number_or_image) ? $settings->add_number_or_image : 0;
		$number_or_image_left = (isset($settings->number_or_image_left) && $settings->number_or_image_left) ? $settings->number_or_image_left : 'image';
		$image = (isset($settings->image) && $settings->image) ? $settings->image : '';
		$image_src = isset($image->src) ? $image->src : $image;
		$image_width = (isset($image->width) && $image->width) ? $image->width : '';
		$image_height = (isset($image->height) && $image->height) ? $image->height : '';

		$image_tag = (isset($settings->image_tag) && $settings->image_tag) ? $settings->image_tag : '';
		$image_tag_text = (isset($settings->image_tag_text) && $settings->image_tag_text) ? $settings->image_tag_text : '';
		$image_tag_radius = (isset($settings->image_tag_radius) && $settings->image_tag_radius) ? $settings->image_tag_radius : '';
		$number_text = (isset($settings->number_text) && $settings->number_text) ? $settings->number_text : 1;

		// Lazy load image
		$placeholder = $image_src == '' ? false : $this->get_image_placeholder($image_src);

		if (strpos($image_src, "http://") !== false || strpos($image_src, "https://") !== false)
		{
			$image = $image_src;
		}
		else
		{
			$image = Uri::base() . $image_src;
		}

		$content_alignment = '';

		if ($price_position == "content-bottom")
		{
			$content_alignment = 'sppb-text-alignment';
		}

		$split_price = preg_split("/[\.]+/", $price);
		$price_text = '';
		$price_zero = '';

		if ($split_price)
		{
			$price_text = isset($split_price[0]) ? $split_price[0] : '';
			$price_zero = isset($split_price[1]) ? '.' . $split_price[1] : '';
		}

		$dis_split_price = preg_split("/[\.]+/", $discount_price);
		$dis_price_text = '';
		$dis_price_zero = '';

		if ($dis_split_price)
		{
			$dis_price_text = isset($dis_split_price[0]) ? $dis_split_price[0] : '';
			$dis_price_zero = isset($dis_split_price[1]) ? '.' . $dis_split_price[1] : '';
		}

		// Building price
		$price_output = '';
		$dis_price_output = '';
		$line_style_output = '';
		$discount_class = '';

		if ($price_position && $discount_price)
		{
			$discount_class = 'discounted-price';
		}

		if ($price_position && $price)
		{
			$price_output = '<span class="pricelist-price ' . $discount_class . '">' . $price_text . '<span class="pricelist-point-zero">' . $price_zero . '</span></span>';
		}

		if ($price_position && $discount_price)
		{
			$dis_price_output = '<span class="pricelist-price">' . $dis_price_text . '<span class="pricelist-point-zero">' . $dis_price_zero . '</span></span>';
		}

		if ($add_line && $line_style)
		{
			if ($line_position == 'title-bottom')
			{
				$line_style_output .= '<span class="pricelist-line title-bottom"><span class="pricelist-line-style-' . $line_style . '"></span></span>';
			}
			else
			{
				$line_style_output .= '<span class="pricelist-line"><span class="pricelist-line-style-' . $line_style . '"></span></span>';
			}
		}

		//Output
		$output  = '';
		$output  .= '<div class="sppb-addon sppb-addon-pricelist ' . $class . '">';

		if ($add_number_or_image)
		{
			$output  .= '<div class="pricelist-left-image">';

			if ($number_or_image_left == 'image')
			{
				$alt_text = ($title) ? $title : '';
				$output  .= '<img ' . ($placeholder ? 'class="sppb-element-lazy"' : '') . ' src="' . ($placeholder ? $placeholder : $image) . '" alt="' . $alt_text . '" ' . ($placeholder ? 'data-large="' . $image . '"' : '') . ' ' . ($image_width ? 'width="' . $image_width . '"' : '') . ' ' . ($image_height ? 'height="' . $image_height . '"' : '') . ' loading="lazy">';

				if ($image_tag && $image_tag_text)
				{
					$tag_class = ($image_tag_radius) ? 'tag-radius' : '';
					$output  .= '<span class="pricelist-tag ' . $tag_class . '">' . $image_tag_text . '</span>';
				}
			}
			else
			{
				$output  .= '<div class="pricelist-left-number">';
				$output  .= $number_text;
				$output  .= '</div>';
			}
			$output  .= '</div>';
		}

		$output .= '<div class="pricelist-text-content ' . $content_alignment . '">';

		if ($title)
		{
			$output .= '<div class="sppb-addon-title" style="display: block;">';
			$output .= '<span class="pricelist-title-content">';
			$output .= '<span class="pricelist-title">' . $title;

			if ($price_position == 'with-title')
			{
				$output .= '<span class="pricelist-price-with-title">' . $price_output . ' ' . $dis_price_output . '</span>';
			}

			$output .= '</span>';

			if ($line_position != 'title-bottom' && $price_position == 'right-to-title')
			{
				$output .=  $line_style_output;
			}

			if ($price_position == 'right-to-title')
			{
				$output .= '<span class="pricelist-price-content">' . $price_output . ' ' . $dis_price_output . '</span>';
			}

			$output .= '</span>';
			$output .= '</div>';
		}

		if ($line_position == 'title-bottom')
		{
			$output .= $line_style_output;
		}

		$output .= '<div class="sppb-addon-content">';
		$output .= $text;
		$output .= '</div>';

		if ($price_position == 'content-bottom')
		{
			$output .= '<span class="pricelist-price-content bottom-of-content">' . $price_output . ' ' . $dis_price_output . '</span>';
		}

		if ($line_position != 'title-bottom' && $price_position == 'content-bottom')
		{
			$output .=  $line_style_output;
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
		$css = '';
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$cssHelper = new CSSHelper($addon_id);


		$priceListTypographyStyle = $cssHelper->typography(
			'.sppb-addon-content',
			$settings,
			'content_typography',
			[
				'font'           => 'text_font_family',
				'size'           => 'text_fontsize',
				'line_height'    => 'text_lineheight',
				'weight'         => 'text_fontweight',
			]
		);

		$lineProps = [
			'line_size' => $settings->add_line ? 'border-bottom-width' : null,
			'line_color' => $settings->add_line ? 'border-bottom-color' : null,
		];
		$lineStyle = $cssHelper->generateStyle('.pricelist-line span', $settings, $lineProps, ['line_color' => false]);
		$lineBottomProps = [
			'line_top_gap' => $settings->add_line && $settings->line_position === 'title-bottom' ? 'margin-top' : null,
			'line_bottom_gap' => $settings->add_line && $settings->line_position === 'title-bottom' ? 'margin-bottom' : null,
		];
		$linePositionStyle = $cssHelper->generateStyle('.pricelist-line', $settings, ['line_position' => $settings->add_line ? ['-webkit-box-align', '-ms-flex-align', 'align-items'] : null,], false);
		$lineBottomStyle = $cssHelper->generateStyle('.pricelist-line.title-bottom', $settings, $lineBottomProps);
		$priceContentStyle = $cssHelper->generateStyle('.pricelist-price-content.bottom-of-content', $settings, ['price_top_gap' => 'margin-top', 'price_bottom_gap' => 'margin-bottom']);
		$priceTitleTypographyStyle = $cssHelper->typography('.pricelist-price-content.bottom-of-content', $settings, 'title_typography', [
			'font'           => 'font_family',
			'size'           => 'title_fontsize',
			'line_height'    => 'title_lineheight',
			'letter_spacing' => 'title_letterspace',
			'uppercase'      => 'title_font_style.uppercase',
			'italic'         => 'title_font_style.italic',
			'underline'      => 'title_font_style.underline',
			'weight'         => 'title_font_style.weight',
		]);
		$zeroPositionStyle = $cssHelper->generateStyle('.pricelist-point-zero', $settings, ['zero_position' => 'vertical-align'], false);
		$discountPriceStyle = $cssHelper->generateStyle('.pricelist-price.discounted-price', $settings, ['discount_price_position' => 'vertical-align'], false);
		$priceStyle = $cssHelper->generateStyle('.pricelist-price-content', $settings, ['price_color' => 'color',], false);
		$priceTypographyStyle = $cssHelper->typography(
			'.pricelist-price-content',
			$settings,
			'price_typography',
			[
				'font'           => 'price_font_family',
				'size'           => 'price_fontsize',
				'weight'         => 'price_fontweight',
			]
		);
		$contentPositionStyle = $cssHelper->generateStyle('.sppb-text-alignment', $settings, ['content_position' => 'text-align'], false);
		$positionMap = ['left' => 'flex-start', 'right' => 'flex-end', 'center' => 'center'];

		if (!empty($settings->content_position_original))
		{
			if (\is_object($settings->content_position_original))
			{
				$settings->content_position_alt = \json_decode(\json_encode($settings->content_position_original));

				foreach ($settings->content_position_original as $key => $position)
				{
					$settings->content_position_alt->$key = isset($positionMap[$position]) ? $positionMap[$position] : '';
				}
			}
		}

		$titlePositionStyle = $cssHelper->generateStyle('.pricelist-title-content', $settings, ['content_position_alt' => 'justify-content'], false);
		$tagStyle = $cssHelper->generateStyle(
			'.pricelist-tag',
			$settings,
			[
				'image_tag_bg' => $settings->image_tag ? 'background-color' : null,
				'image_tag_radius' => $settings->image_tag ? 'border-radius' : null,
				'image_tag_top_margin' => $settings->image_tag ? 'top' : null,
				'image_tag_left_margin' => $settings->image_tag ? 'left' : null
			],
			['image_tag_bg' => false]
		);

		if ($settings->add_number_or_image)
		{
			$numberOrImageStyle = $cssHelper->generateStyle('.pricelist-left-image', $settings, ['image_width' => ['-ms-flex: 0 0 %s', 'flex: 0 0 %s', 'max-width'], 'image_gutter' => 'padding-right'], ['image_width' => '%']);
			$settings->image_width = AddonUtils::parseDeviceData($settings->image_width, SpPgaeBuilderBase::$defaultDevice);

			if (!isset($settings->image_width))
			{
				$settings->image_width = 15;
			}

			$settings->content_width = 100 - (int) $settings->image_width;
			$imageWidthGutterStyle = $cssHelper->generateStyle('.pricelist-text-content', $settings, ['content_width' => ['-ms-flex: 0 0 %s', 'flex: 0 0 %s', 'max-width: %s'], 'image_gutter' => 'padding-left'], ['content_width' => '%']);

			$css .= $numberOrImageStyle;
			$css .= $imageWidthGutterStyle;
		}

		$imageBorderRadiusStyle = $cssHelper->generateStyle('.pricelist-left-number,.pricelist-left-image img', $settings, ['image_border_radius' => 'border-radius']);
		$numberStyle = $cssHelper->generateStyle(
			'.pricelist-left-number',
			$settings,
			[
				'number_bg_color'       => 'background-color',
				'number_color'          => 'color',
				'number_top_padding'    => 'padding-top',
				'number_bottom_padding' => 'padding-bottom',
			],
			['number_bg_color' => false, 'number_color' => false]
		);
		$numberTypographyStyle = $cssHelper->typography(
			'.pricelist-left-number',
			$settings,
			'number_typography',
			[
				'font'           => 'number_font_family',
				'size'           => 'number_fontsize',
				'italic'         => 'number_fontstyle',
				'weight'         => 'number_fontweight',
			]
		);

		$css .= $tagStyle;
		$css .= $lineStyle;
		$css .= $priceStyle;
		$css .= $numberStyle;
		$css .= $lineBottomStyle;
		$css .= $zeroPositionStyle;
		$css .= $linePositionStyle;
		$css .= $priceContentStyle;
		$css .= $titlePositionStyle;
		$css .= $discountPriceStyle;
		$css .= $contentPositionStyle;
		$css .= $priceTypographyStyle;
		$css .= $numberTypographyStyle;
		$css .= $imageBorderRadiusStyle;
		$css .= $priceListTypographyStyle;
		$css .= $priceTitleTypographyStyle;

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
			let split_price = _.split(data.price, ".");
			let price_text = "";
			let price_zero = "";
			if(split_price){
				price_text = !_.isEmpty(split_price[0]) ? split_price[0] : "";
				price_zero = !_.isEmpty(split_price[1]) ? "."+split_price[1] : "";
			}

			let dis_split_price = _.split(data.discount_price, ".");
			let dis_price_text = "";
			let dis_price_zero = "";
			if(dis_split_price){
				dis_price_text = !_.isEmpty(dis_split_price[0]) ? dis_split_price[0] : "";
				dis_price_zero = !_.isEmpty(dis_split_price[1]) ? "."+dis_split_price[1] : "";
			}

			let discount_class = "";
			let price_output = "";
			let dis_price_output = "";
			let line_style_output = "";
			
			if(data.price_position && data.discount_price){
				discount_class = "discounted-price";
			}
			if(data.price_position && data.price){
				price_output = \'<span class="pricelist-price \' + discount_class + \'">\'+ price_text + \'<span class="pricelist-point-zero">\'+price_zero+\'</span></span>\';
			}
			if(data.price_position && data.discount_price){
				dis_price_output = \'<span class="pricelist-price">\'+dis_price_text+\'<span class="pricelist-point-zero">\'+dis_price_zero+\'</span></span>\';
			}
			if(data.add_line && data.line_style){
				if(data.line_position == "title-bottom"){
					line_style_output += \'<span class="pricelist-line title-bottom"><span class="pricelist-line-style-\'+data.line_style+\'"></span></span>\';
				} else {
					line_style_output += \'<span class="pricelist-line"><span class="pricelist-line-style-\'+data.line_style+\'"></span></span>\';
				}
			}

			let content_alignment = "";
			if(data.price_position == "content-bottom"){
				content_alignment = "sppb-text-alignment";
			}
		#>
		<style type="text/css">';
		// Content
		$contentTypographyFallbacks = [
			'font'           => 'data.text_font_family',
			'size'           => 'data.text_fontsize',
			'line_height'    => 'data.text_lineheight',
			'weight'         => 'data.text_fontweight',
		];
		$output .= $lodash->typography('.sppb-addon-content', 'data.content_typography', $contentTypographyFallbacks);
		$output .= $lodash->unit('border-bottom-width', '.pricelist-line span', 'data.line_size', 'px');

		$output .= '<# if (data.add_line || data.price_position) { #>';
		$output .= $lodash->border('border-bottom-width', '.pricelist-line span', 'data.line_size');
		$output .= $lodash->border('border-bottom-color', '.pricelist-line span', 'data.line_color');
		$output .= $lodash->unit('-webkit-box-align', '.pricelist-line', 'data.line_position', false);
		$output .= $lodash->unit('-ms-flex-align', '.pricelist-line', 'data.line_position', false);
		$output .= $lodash->unit('align-items', '.pricelist-line', 'data.line_position', false);
		$output .= '<# if (data.line_position == "title-bottom") { #>';
		$output .= $lodash->unit('margin-top', '.pricelist-line.title-bottom', 'data.line_top_gap', 'px');
		$output .= $lodash->unit('margin-bottom', '.pricelist-line.title-bottom', 'data.line_bottom_gap', 'px');
		$output .= '<# } #>';
		$output .= '<# } #>';

		$output .= '<# if (data.price_top_gap || data.price_bottom_gap) { #>';
		$output .= '#sppb-addon-{{data.id}} .pricelist-price-content.bottom-of-content { display: block; }';
		$output .= $lodash->unit('margin-top', '.pricelist-price-content.bottom-of-content', 'data.price_top_gap', 'px');
		$output .= $lodash->unit('margin-bottom', '.pricelist-price-content.bottom-of-content', 'data.price_bottom_gap', 'px');
		$output .= $lodash->unit('font-family', '.pricelist-price-content.bottom-of-content', 'data.font_family', '');
		$output .= '<# } #>';

		$output .= '<# if (data.add_number_or_image) { #>';
		$output .= $lodash->flex('-ms-flex', '.pricelist-left-image', 'data.image_width', '%');
		$output .= $lodash->flex('flex', '.pricelist-left-image', 'data.image_width', '%');
		$output .= $lodash->unit('max-width', '.pricelist-left-image', 'data.image_width', '%');
		$output .= $lodash->unit('padding-right', '.pricelist-left-image', 'data.image_gutter', 'px');

		$output .= $lodash->flex('-ms-flex', '.pricelist-text-content', '(100 - data.image_width)', '%');
		$output .= $lodash->flex('flex', '.pricelist-text-content', '(100 - data.image_width)', '%');
		$output .= $lodash->unit('max-width', '.pricelist-text-content', '(100 - data.image_width)', '%');
		$output .= $lodash->unit('padding-left', '.pricelist-text-content', 'data.image_gutter', 'px');
		$output .= '<# } #>';


		$output .= $lodash->color('color', '.pricelist-price-content', 'data.price_color');


		$output .= '<# if (data.number_text && data.number_or_image_left=="number") { #>';
		$output .= $lodash->color('background-color', '.pricelist-left-number', 'data.number_bg_color');
		$output .= $lodash->color('color', '.pricelist-left-number', 'data.number_color');
		$output .= $lodash->unit('padding-top', '.pricelist-left-number', 'data.number_top_padding', 'px');
		$output .= $lodash->unit('padding-bottom', '.pricelist-left-number', 'data.number_bottom_padding', 'px');
		$output .= '<# } #>';
		$output .= $lodash->color('color', '.pricelist-price.discounted-price', 'data.discount_price_color');
		$output .= '<# if (data.discount_price_position) { #>';
		$output .= $lodash->unit('vertical-align', '.pricelist-price.discounted-price ', 'data.discount_price_position', '', false);
		$output .= '<# } #>';
		$output .= $lodash->unit('border-radius', '.pricelist-left-number, .pricelist-left-image img', 'data.image_border_radius', '%');
		$output .= $lodash->unit('border-radius', '.pricelist-tag', 'data.image_tag_radius', 'px');
		$output .= $lodash->unit('top', '.pricelist-tag', 'data.image_tag_top_margin', 'px');
		$output .= $lodash->unit('left', '.pricelist-tag', 'data.image_tag_left_margin', 'px');
		$output .= $lodash->color('background-color', '.pricelist-tag', 'data.image_tag_bg');
		$output .= $lodash->flexAlignment('.pricelist-title-content', 'data.content_position');
		$output .= '<# if (data.zero_position) { #>';
		$output .= $lodash->unit('vertical-align', '.pricelist-point-zero', 'data.zero_position', '', false);
		$output .= '<# } #>';

		// Title
		$titleTypographyFallbacks = [
			'font'           => 'data.font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight',
		];
		$output .= $lodash->typography('.pricelist-title-content', 'data.title_typography', $titleTypographyFallbacks);

		// Price
		$priceTypographyFallbacks = [
			'font'           => 'data.price_font_family',
			'size'           => 'data.price_fontsize',
			'weight'         => 'data.price_fontweight',
		];
		$output .= $lodash->typography('.pricelist-price-content', 'data.price_typography', $priceTypographyFallbacks);
		// Number
		$numberTypographyFallbacks = [
			'font'           => 'data.number_font_family',
			'size'           => 'data.number_fontsize',
			'italic'         => 'data.number_fontstyle',
			'weight'         => 'data.number_fontweight',
		];
		$output .= $lodash->typography('.pricelist-left-number', 'data.number_typography', $numberTypographyFallbacks);
		$output .= '
		
		</style>
		
		<div class="sppb-addon sppb-addon-pricelist {{data.class}}">
		<# if(data.add_number_or_image){ #>
			<div class="pricelist-left-image">
				<# if(data.number_or_image_left=="image") {
					var priceListImg = {}
					if (typeof data.image !== "undefined" && typeof data.image.src !== "undefined") {
						priceListImg = data.image
					} else {
						priceListImg = {src: data.image}
					}
					if(priceListImg.src.indexOf("http://") == -1 && priceListImg.src.indexOf("https://") == -1){ #>
						<img class="sppb-img-responsive" src=\'{{ pagebuilder_base + priceListImg.src }}\'>
					<# } else { #>
						<img class="sppb-img-responsive" src=\'{{ priceListImg.src }}\'>
					<# }
					if(data.image_tag && data.image_tag_text){ 
						let tag_class = "";
						if (data.image_tag_radius !== undefined && data.image_tag_radius) {
							tag_class = "tag-radius";
						}; 
					#>
						<span class="pricelist-tag {{tag_class}}">{{data.image_tag_text}}</span>
					<# }
				} else { #>
					<div class="pricelist-left-number">
						{{data.number_text}}
					</div>
				<# } #>
			</div>
		<# } #>
		<div class="pricelist-text-content {{content_alignment}}">
		<# if (data.title) { #>
			<div class="sppb-addon-title" style="display: block;">
				<span class="pricelist-title-content">
					<span class="pricelist-title">
					<span class="sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{{data.title}}}</span>
					<# if(data.price_position=="with-title"){ #>
						<span class="pricelist-price-with-title">{{{price_output}}} {{{dis_price_output}}}</span>
					<# } #>
					</span>
					<# if(data.line_position !== "title-bottom" && data.price_position=="right-to-title"){ #>
						{{{line_style_output}}}
					<# } #>
					<# if(data.price_position=="right-to-title"){ #>
						<span class="pricelist-price-content">{{{price_output}}} {{{dis_price_output}}}</span>
					<# } #>
				</span>
			</div>
		<# } #>

		<# if (data.line_position == "title-bottom") { #>
			{{{line_style_output}}}
		<# } #>

		<div class="sppb-addon-content sp-editable-content" id="addon-text-{{data.id}}" data-id={{data.id}} data-fieldName="text">
			{{{data.text}}}
		</div>

		<# if (data.price_position=="content-bottom") { #>
			<span class="pricelist-price-content bottom-of-content">{{{price_output}}} {{{dis_price_output}}}</span>
		<# } #>

		<# if(data.line_position !== "title-bottom" && data.price_position=="content-bottom"){ #>
			{{{line_style_output}}}
		<# } #>

		</div>
		</div>';
		return $output;
	}
}
