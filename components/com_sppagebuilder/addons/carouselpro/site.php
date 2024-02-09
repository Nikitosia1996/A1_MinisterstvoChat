<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

/**
 * Carousel Pro addon class
 * 
 * @since 1.0.0
 */
class SppagebuilderAddonCarouselpro extends SppagebuilderAddons
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

		//Addons option
		$autoplay = (isset($settings->autoplay) && $settings->autoplay) ? 1 : 0;
		$controllers = (isset($settings->controllers) && $settings->controllers) ? $settings->controllers : 0;
		$arrows = (isset($settings->arrows) && $settings->arrows) ? $settings->arrows : 0;

		$carousel_autoplay = ($autoplay) ? ' data-sppb-ride="sppb-carousel"' : '';
		$interval = (isset($settings->interval) && $settings->interval) ? ((int) $settings->interval * 1000) : 5000;
		if ($autoplay == 0) {
			$interval = 'false';
		}
		//Container & Column
		$full_container = (isset($settings->full_container) && $settings->full_container) ? $settings->full_container : '';
		$content_column = (isset($settings->content_column) && $settings->content_column) ? $settings->content_column : '';
		$textColumn  = '';
		$imageColumn = '';
		if ($content_column) {
			$textColumn  = $content_column;
			$imageColumn = (12 - $content_column);
		} else {
			$textColumn  = 6;
			$imageColumn = 6;
		}
		//Arrow style
		$arrow_position = (isset($settings->arrow_position)) ? $settings->arrow_position : 'default';
		$arrow_icon     = (isset($settings->arrow_icon)) ? $settings->arrow_icon : 'chevron';
		$left_arrow  = '';
		$right_arrow = '';
		if ($arrow_icon == 'angle_double') {
			$left_arrow  = 'fa-angle-double-left';
			$right_arrow = 'fa-angle-double-right';
		} elseif ($arrow_icon == 'arrow') {
			$left_arrow  = 'fa-arrow-left';
			$right_arrow = 'fa-arrow-right';
		} elseif ($arrow_icon == 'arrow_circle') {
			$left_arrow  = 'fa-arrow-circle-o-left';
			$right_arrow = 'fa-arrow-circle-o-right';
		} elseif ($arrow_icon == 'long_arrow') {
			$left_arrow  = 'fa-long-arrow-left';
			$right_arrow = 'fa-long-arrow-right';
		} elseif ($arrow_icon == 'angle') {
			$left_arrow  = 'fa-angle-left';
			$right_arrow = 'fa-angle-right';
		} else {
			$left_arrow  = 'fa-chevron-left';
			$right_arrow = 'fa-chevron-right';
		}

		//Item Height
		$carousel_height = (isset($settings->carousel_height) && $settings->carousel_height) ? $settings->carousel_height : '';

		//Output start
		$output = '';
		$output  .= '<div id="sppb-carousel-' . $this->addon->id . '" data-interval="' . $interval . '" class="sppb-carousel sppb-carousel-pro sppb-slide' . $class . '"' . $carousel_autoplay . '>';

		if ($controllers) {
			$output .= '<ol class="sppb-carousel-indicators">';
			foreach ($settings->sp_carouselpro_item as $key1 => $value) {
				$output .= '<li data-sppb-target="#sppb-carousel-' . $this->addon->id . '" ' . (($key1 == 0) ? ' class="active"' : '') . '  data-sppb-slide-to="' . $key1 . '"></li>' . "\n";
			}
			$output .= '</ol>';
		}

		$output .= '<div class="sppb-carousel-inner">';

		if (isset($settings->sp_carouselpro_item) && count((array) $settings->sp_carouselpro_item)) {
			foreach ($settings->sp_carouselpro_item as $key => $value) {
				$bg_image = (isset($value->bg) && $value->bg) ? $value->bg : '';
				$bg_image_src = isset($bg_image->src) ? $bg_image->src : $bg_image;

				$bg_class = $bg_image_src ? ' sppb-item-has-bg' : '';
				$video = (isset($value->video) && $value->video) ? $value->video : '';

				$item_image = (isset($value->image) && $value->image) ? $value->image : '';
				$item_image_src = isset($item_image->src) ? $item_image->src : $item_image;

				$bg_http_check = '';
				$bg_image_style = '';
				if ($bg_image_src) {
					if (strpos($bg_image_src, "http://") !== false || strpos($bg_image_src, "https://") !== false) {
						$bg_http_check = ($bg_image_src) ? $bg_image_src : '';
						$bg_image_style = ($bg_image_src) ? 'style="background-image: url(' . $bg_image_src . '); background-repeat: no-repeat; background-position: center center; background-size: cover;"' : '';
					} else {
						$bg_http_check = ($bg_image_src) ? Uri::base() . $bg_image_src : '';
						$bg_image_style = ($bg_image_src) ? 'style="background-image: url(' . Uri::base() . '/' . $bg_image_src . '); background-repeat: no-repeat; background-position: center center; background-size: cover;"' : '';
					}
				}
				$alt_text = (isset($value->title) && $value->title) ? $value->title : '';

				$output  .= '<div id="sppb-item-' . $this->addon->id . $key . '" class="sppb-item' . $bg_class . (($key == 0) ? ' active' : '') . ' carousel-item-' . ($key + 1) . '" ' . ($carousel_height ? $bg_image_style : '') . '
				>';

				if (!$carousel_height) {
					$output  .= ($bg_http_check) ? '<img class="sppb-carousel-pro-bg-image" src="' . $bg_http_check . '" alt="' . $alt_text . '">' : '';
				}

				$output  .= '<div class="sppb-carousel-item-inner">';
				$output  .= '<div class="sppb-carousel-pro-inner-content">';
				$output  .= '<div>';

				if (!$full_container) {
					$output  .= '<div class="sppb-container">';
				}

				$output  .= '<div class="sppb-row">';
				$output  .= '<div class="sppb-col-sm-' . $textColumn . ' sppb-col-xs-12">';
				$output  .= '<div class="sppb-carousel-pro-text">';

				if ((isset($value->title) && $value->title) || (isset($value->content) && $value->content)) {
					$output  .= (isset($value->title) && $value->title) ? '<h2>' . $value->title . '</h2>' : '';
					$output  .= (isset($value->content) && $value->content) ? '<div class="sppb-carousel-pro-content">' . $value->content . '</div>' : '';
					if (isset($value->button_text) && $value->button_text) {
						$button_class = (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : ' sppb-btn-default';
						$button_class .= (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
						$button_class .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
						$button_class .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
						$button_class .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
						$button_icon = (isset($value->button_icon) && $value->button_icon) ? $value->button_icon : '';
						$button_icon_position = (isset($value->button_icon_position) && $value->button_icon_position) ? $value->button_icon_position : 'left';

						list($link, $target) = AddonHelper::parseLink($value, 'button_url', [
							'url' => 'button_url',
							'new_tab' => 'button_target'
						]);

						$icon_arr = array_filter(explode(' ', $button_icon));

						if (count($icon_arr) === 1) {
							$button_icon = 'fa ' . $button_icon;
						}

						if ($button_icon_position == 'left') {
							$value->button_text = ($button_icon) ? '<i aria-hidden="true" aria-label="' . Text::_('COM_SPPAGEBUILDER_ARIA_BUTTON_TEXT') . '" class="' . $button_icon . '" aria-hidden="true"></i> ' . $value->button_text : $value->button_text;
						} else {
							$value->button_text = ($button_icon) ? $value->button_text . ' <i aria-hidden="true" aria-label="' . Text::_('COM_SPPAGEBUILDER_ARIA_BUTTON_TEXT') . '" class="' . $button_icon . '" aria-hidden="true"></i>' : $value->button_text;
						}

						$href = !empty($link) ? 'href="' . $link . '"' : "";

						$output  .= (isset($value->button_text)) ? '<a ' . $href . ' ' . $target . ' id="btn-' . ($this->addon->id . $key) . '" class="sppb-btn' . $button_class . '">' . $value->button_text . '</a>' : '';
					}
				}

				$output  .= '</div>';
				$output  .= '</div>';
				$output  .= '<div class="sppb-col-sm-' . $imageColumn . ' sppb-col-xs-12">';
				$output  .= '<div class="sppb-text-right">';

				if ($video) {

					$video = parse_url($video);

					switch ($video['host']) {
						case 'youtu.be':
							$id = trim($video['path'], '/');
							$src = '//www.youtube.com/embed/' . $id;
							break;

						case 'www.youtube.com':
						case 'youtube.com':
							parse_str($video['query'], $query);
							$id = $query['v'];
							$src = '//www.youtube.com/embed/' . $id;
							break;

						case 'vimeo.com':
						case 'www.vimeo.com':
							$id = trim($video['path'], '/');
							$src = "//player.vimeo.com/video/{$id}";
					}

					$output .= '<div class="sppb-embed-responsive sppb-embed-responsive-16by9">';
					$output .= '<iframe class="sppb-embed-responsive-item" src="' . $src . '" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
					$output .= '</div>';
				} else {
					$output  .= ($item_image_src) ? '<img class="sppb-img-reponsive" src="' . $item_image_src . '" alt="' . (isset($value->title) ? $value->title : '') . '">' : '';
				}


				$output  .= '</div>'; //.sppb-text-right
				$output  .= '</div>'; //.sppb-col-xs-12
				$output  .= '</div>'; //.sppb-row
				if (!$full_container) {
					$output  .= '</div>'; //.sppb-container
				}

				$output  .= '</div>'; //no class
				$output  .= '</div>'; //.sppb-carousel-pro-inner-content

				$output  .= '</div>'; //.sppb-carousel-item-inner
				$output  .= '</div>'; //.sppb-item
			}
		}

		$output	.= '</div>'; //.sppb-carousel-inner

		if ($arrows) {
			if ($arrow_position !== 'default') {
				$output  .= '<div class="sppb-container sppb-carousel-pro-arrow-' . $arrow_position . '">';
				$output  .= '<div class="sppb-row">';
				$output  .= '<div class="sppb-col-12">';
			}

			$output	.= '<a href="#sppb-carousel-' . $this->addon->id . '" class="sppb-carousel-arrow left sppb-carousel-control" data-slide="prev" aria-label="' . Text::_('COM_SPPAGEBUILDER_ARIA_PREVIOUS') . '"><i class="fa ' . $left_arrow . '" aria-hidden="true"></i></a>';
			$output	.= '<a href="#sppb-carousel-' . $this->addon->id . '" class="sppb-carousel-arrow right sppb-carousel-control" data-slide="next" aria-label="' . Text::_('COM_SPPAGEBUILDER_ARIA_NEXT') . '"><i class="fa ' . $right_arrow . '" aria-hidden="true"></i></a>';

			if ($arrow_position !== 'default') {
				$output  .= '</div>';
				$output  .= '</div>';
				$output  .= '</div>';
			}
		}

		$output .= '</div>'; //.sppb-carousel-pro

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

		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css = '';

		//Item Height
		$carouselHeight = $cssHelper->generateStyle('.sppb-carousel-pro .sppb-item', $settings, ['carousel_height' => 'height']);
		$css .= $carouselHeight;

		//Arrow Style
		$arrowStyleProps = [
			'arrow_color' => 'color',
			'arrow_font_size'     => 'font-size'
		];

		$arrowStyleUnits = ['arrow_color' => false];
		//Arrow hover style
		$arrowStyleHoverProps = ['arrow_hover_color' => 'color'];
		$arrowStyleHoverUnits = ['arrow_hover_color' => false];

		$arrow_position = (isset($settings->arrow_position)) ? $settings->arrow_position : 'default';

		if ($arrow_position != 'default') {
			$arrowStyleProps = [
				'arrow_height'        => ['height', 'line-height'],
				'arrow_width'         => 'width',
				'arrow_color'         => 'color',
				'arrow_background'    => 'background-color',
				'arrow_margin'        => 'margin',
				'arrow_border_width'  => 'border-style: solid;border-width',
				'arrow_border_color'  => 'border-color',
				'arrow_border_radius' => 'border-radius'
			];

			$arrowStyleUnits = [
				'arrow_background'   => false,
				'arrow_border_color' => false,
				'arrow_margin'       => false,
				'arrow_color'        => false
			];

			//Arrow hover style
			$arrowStyleHoverProps = [
				'arrow_hover_background'    => 'background-color',
				'arrow_hover_color'         => 'color',
				'arrow_hover_border_color'  => 'border-color',
			];

			$arrowStyleHoverUnits = [
				'arrow_hover_background'    => false,
				'arrow_hover_color'         => false,
				'arrow_hover_border_color'  => false,
			];

			$arrowStyle = $cssHelper->generateStyle('.sppb-carousel-pro .sppb-carousel-control', $settings, $arrowStyleProps, $arrowStyleUnits);
			$css .= $arrowStyle;

			$arrowStyleHover = $cssHelper->generateStyle('.sppb-carousel-pro .sppb-carousel-control:hover', $settings, $arrowStyleHoverProps, $arrowStyleHoverUnits);
			$css .= $arrowStyleHover;
		} else {
			$arrowStyleHover = $cssHelper->generateStyle('.sppb-carousel-pro .sppb-carousel-control:hover', $settings, $arrowStyleHoverProps, $arrowStyleHoverUnits);
			$css .= $arrowStyleHover;

			$arrowStyle = $cssHelper->generateStyle('.sppb-carousel-pro .sppb-carousel-control', $settings, $arrowStyleProps, $arrowStyleUnits);
			$css .= $arrowStyle;
		}

		foreach ($settings->sp_carouselpro_item as $key => $value) {

			$uniqid = '#sppb-item-' . $this->addon->id . $key . ' ';

			$options = new stdClass;
			$options->button_type = (isset($settings->button_type) && $settings->button_type) ? $settings->button_type : '';
			$options->button_appearance = (isset($settings->button_appearance) && $settings->button_appearance) ? $settings->button_appearance : '';
			$options->button_color = (isset($settings->button_color) && $settings->button_color) ? $settings->button_color : '';
			$options->button_color_hover = (isset($settings->button_color_hover) && $settings->button_color_hover) ? $settings->button_color_hover : '';
			$options->button_background_color = (isset($settings->button_background_color) && $settings->button_background_color) ? $settings->button_background_color : '';
			$options->button_background_color_hover = (isset($settings->button_background_color_hover) && $settings->button_background_color_hover) ? $settings->button_background_color_hover : '';
			$options->button_padding = (isset($settings->button_padding) && $settings->button_padding) ? $settings->button_padding : '';
			$options->button_size = !empty($settings->button_size) ? $settings->button_size : null;
			$options->button_typography = !empty($settings->button_typography) ? $settings->button_typography : null;

			// Buttons style
			$css_path = new FileLayout('addon.css.button', $layout_path);
			$css .= $css_path->render(array('addon_id' => $addon_id, 'options' => $options, 'id' => 'btn-' . ($this->addon->id . $key)));
			// Title Margin
			$itemTitleMarginStyle = $cssHelper->generateStyle($uniqid  . '.sppb-carousel-pro-text h2', $value, ['title_margin' => 'margin'], ['title_margin' => false], ['title_margin' => 'spacing']);
			$css .= $itemTitleMarginStyle;

			// Content Margin
			$itemContentMarginStyle = $cssHelper->generateStyle($uniqid . '.sppb-carousel-pro-text .sppb-carousel-pro-content', $value, ['content_margin' => 'margin'], ['content_margin' => false], ['content_margin' => 'spacing']);
			$css .= $itemContentMarginStyle;
		}

		//Item Style
		$itemStyle = $cssHelper->generateStyle('.sppb-carousel-inner > .sppb-item', $settings, ['speed' => ['-webkit-transition-duration', 'transition-duration'], 'item_padding' => 'padding'], ['speed' => 'ms'], ['item_padding' => 'spacing']);
		$css .= $itemStyle;

		// Title
		$titleTypography = $cssHelper->typography('.sppb-carousel-pro-text h2', $settings, 'item_title_typography');
		$css .= $titleTypography;

		// Title Color 
		$itemTitleColorStyle = $cssHelper->generateStyle('.sppb-carousel-pro-text h2', $settings, ['item_title_color' => 'color'], ['item_title_color' => false]);
		$css .= $itemTitleColorStyle;

		// Content
		$contentTypography = $cssHelper->typography('.sppb-carousel-pro-text .sppb-carousel-pro-content', $settings, 'item_content_typography');
		$css .= $contentTypography;

		// Content Color
		$itemContentColorStyle = $cssHelper->generateStyle('.sppb-carousel-pro-text .sppb-carousel-pro-content', $settings, ['item_title_content' => 'color'], ['item_title_content' => false]);
		$css .= $itemContentColorStyle;

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
		let interval = data.interval ? parseInt(data.interval) * 1000 : 5000;
		let autoplay = data.autoplay ? \'data-sppb-ride="sppb-carousel"\' : "";
		if (data.autoplay == 0)
		{
			interval = "false";
		}
		
		#>
		<style type="text/css">';
		// Hover
		$output .= $lodash->color('color', '.sppb-carousel-pro .sppb-carousel-control:hover', 'data.arrow_hover_color');
		// Normal
		$output .= $lodash->color('color', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_color');
		$output .= $lodash->unit('font-size', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_font_size', 'px', false);
		$output .= $lodash->unit('height', '.sppb-carousel-pro .sppb-item', 'data.carousel_height', 'px');

		$output .= '<# if (data.arrow_position != "default") { #>';
		// Hover
		$output .= $lodash->color('color', '.sppb-carousel-pro .sppb-carousel-control:hover', 'data.arrow_hover_color');
		$output .= $lodash->border('border-color', '.sppb-carousel-pro .sppb-carousel-control:hover', 'data.arrow_hover_border_color');
		$output .= $lodash->color('background-color', '.sppb-carousel-pro .sppb-carousel-control:hover', 'data.arrow_hover_background');

		$output .= $lodash->unit('height', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_height', 'px', false);
		$output .= $lodash->unit('width', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_width', 'px', false);
		$output .= $lodash->unit('border-radius', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_border_radius', 'px', false);
		$output .= $lodash->unit('border-width', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_border_width', 'px', false);
		$output .= $lodash->unit('line-height', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_height', 'px', false);
		$output .= $lodash->color('background-color', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_background');
		$output .= $lodash->color('color', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_color');
		$output .= $lodash->border('border-color', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_border_color');
		$output .= $lodash->spacing('margin', '.sppb-carousel-pro .sppb-carousel-control', 'data.arrow_margin');
		$output .= '<# if(!_.isEmpty(data.arrow_border_width) && data.arrow_border_width) { #>';
		$output .= 'border-style: solid;';
		$output .= '<# } else { #>';
		$output .= 'border-style: none;';
		$output .= '<# } #>';

		$output .= '<# } #>';

		$output .= $lodash->typography('.sppb-btn-{{ data.button_type }}', 'data.button_typography');
		$output .= '
			#sppb-addon-{{ data.id }} .sppb-carousel-inner > .sppb-item{
				-webkit-transition-duration: {{ data.speed }}ms;
				transition-duration: {{ data.speed }}ms;
			}

		<# _.each(data.sp_carouselpro_item, function (carousel_item, key){ #>';

		$output .= $lodash->spacing('margin', '.sppb-carousel-pro-text h2', 'carousel_item.title_margin');
		$output .= $lodash->spacing('margin', '.sppb-carousel-pro-text .sppb-carousel-pro-content', 'carousel_item.content_margin');
		$output .= $lodash->color('color', '.sppb-carousel-pro-text h2', 'data.item_title_color');
		$output .= $lodash->color('color', '.sppb-carousel-pro-text .sppb-carousel-pro-content', 'data.item_title_content');
		$output .= $lodash->typography('.sppb-carousel-pro-text h2', 'data.item_title_typography');
		$output .= $lodash->typography('.sppb-carousel-pro-text .sppb-carousel-pro-content', 'data.item_content_typography');

		$output .= '<# if (data.button_type == "custom") { #>';
		$output .= $lodash->color('color', '.sppb-btn-custom', 'data.button_color');
		$output .= $lodash->color('color', '.sppb-btn-custom:hover', 'data.button_color_hover');
		$output .= $lodash->color('background-color', '.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= $lodash->spacing('padding', '.sppb-btn-custom', 'data.button_padding');

		$output .= '<# if (data.button_appearance == "outline") { #>';
		$output .= $lodash->border('border-color', '.sppb-btn-custom', 'data.button_background_color');
		$output .= $lodash->border('border-color', '.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= '<# } else if (data.button_appearance == "3d") { #>';
		$output .= $lodash->border('border-bottom-color', '.sppb-btn-custom', 'data.button_background_color_hover');
		$output .= $lodash->color('background-color', '.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } else if(data.button_appearance == "gradient"){ #>';
		$output .= $lodash->color('background-color', '.sppb-btn-custom', 'data.button_background_gradient');
		$output .= $lodash->color('background-color', '.sppb-btn-custom:hover', 'data.button_background_gradient_hover');
		$output .= '<# } else { #>';
		$output .= $lodash->color('background-color', '.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } #>';

		$output .= '<# } #>';
		$output .= ' <# }); #>';

		$output .= $lodash->spacing('padding', '.sppb-carousel-inner > .sppb-item', 'data.item_padding');


		$output .= '
			<#

			#>
			<# _.each (data.sp_carouselpro_item, function(carousel_item, key) { 
					let carouselBg = {}
					if (carousel_item?.bg?.src !== undefined) {
						carouselBg = carousel_item.bg;
					} else {
						carouselBg = {src: carousel_item.bg};
					}		
			#>
					#sppb-addon-{{ data.id }} .sppb-carousel-pro .item-{{ data.id }}-{{ key }} {
						<# if(carouselBg.src){
							if(carouselBg.src.indexOf("http://") == 0 || carouselBg.src.indexOf("https://") == 0){ #>
								background: url({{ carouselBg.src }});
							<# } else { #>
								background: url({{ pagebuilder_base + carouselBg.src }});
							<# }
						} #>
						background-repeat: no-repeat;
						background-size: cover;
						background-position: center center;
					}
				<# })
			#>

		</style>
		<#
			let content_column = (!_.isEmpty(data.content_column) && data.content_column) ? data.content_column : "";
			let textColumn = "";
			let imageColumn = "";
			if (content_column)
			{
				textColumn = content_column;
				imageColumn = (12 - content_column);
			}
			else
			{
				textColumn = 6;
				imageColumn = 6;
			} 
			let arrow_icon = (!_.isEmpty(data.arrow_icon)) ? data.arrow_icon : "angle";
			let left_arrow ="";
			let right_arrow = "";
			if(arrow_icon=="angle_double"){
				left_arrow ="fa-angle-double-left";
				right_arrow = "fa-angle-double-right";
			} else if(arrow_icon=="arrow"){
				left_arrow ="fa-arrow-left";
				right_arrow = "fa-arrow-right";
			} else if(arrow_icon=="arrow_circle"){
				left_arrow ="fa-arrow-circle-o-left";
				right_arrow = "fa-arrow-circle-o-right";
			} else if(arrow_icon=="long_arrow"){
				left_arrow ="fa-long-arrow-left";
				right_arrow = "fa-long-arrow-right";
			} else if(arrow_icon=="angle"){
				left_arrow ="fa-angle-left";
				right_arrow = "fa-angle-right";
			} else{
				left_arrow ="fa-chevron-left";
				right_arrow = "fa-chevron-right";
			}
			if(!data.arrow_position){
				data.arrow_position = "default"
			}
		#>
		<div id="sppb-carousel-{{data.id}}" class="sppb-carousel sppb-carousel-pro sppb-slide {{ data.class }}" data-interval="{{ interval }}" {{{ autoplay }}}>
			<# if (data.controllers) { #>
				<ol class="sppb-carousel-indicators">
				<# _.each(data.sp_carouselpro_item, function (carousel_item, key) { #>
					<# let active = (key == 0) ? "active" : ""; #>
					<li data-sppb-target="#sppb-carousel-{{ data.id }}"  class="{{ active }}"  data-sppb-slide-to="{{ key }}"></li>
				<# }); #>
				</ol>
			<# } #>
			<div class="sppb-carousel-inner">
				<#
				_.each(data.sp_carouselpro_item, function (carousel_item, key){
					var carouselBg = {}
					if (typeof carousel_item.bg !== "undefined" && typeof carousel_item.bg.src !== "undefined") {
						carouselBg = carousel_item.bg
					} else {
						carouselBg = {src: carousel_item.bg}
					}

					var classNames = (key == 0) ? "active" : "";
					classNames += (carouselBg.src) ? " sppb-item-has-bg" : "";

				#>
					<div class="sppb-item {{ classNames }} item-{{ data.id }}-{{ key }}" id="sppb-item-{{  data.id  }}{{ key }}">
					<# if(_.isObject(data.carousel_height)){
						if(carouselBg.src){ #>
							<img class="sppb-carousel-pro-bg-image" src=\'{{ carouselBg.src }}\' alt="{{ carousel_item.title }}">
						<# }
					} #>
						<div class="sppb-carousel-item-inner">
							<div>
								<div>
								<# if(!data.full_container){ #>
									<div class="sppb-container">
								<# } #>
									<div class="sppb-row">
										<div class="sppb-col-sm-{{textColumn}} sppb-col-xs-12">
											<div class="sppb-carousel-pro-text">
												<# if(carousel_item.title || carousel_item.content) { #>
													<# if(carousel_item.title) { #>
														<h2 class="sp-editable-content" id="addon-title-{{data.id}}-{{key}}" data-id={{data.id}} data-fieldName="sp_carouselpro_item-{{key}}-title">{{ carousel_item.title }}</h2>
													<# } #>
													<# if(carousel_item.content) { #>
														<div class="sppb-carousel-pro-content sp-editable-content" id="addon-content-{{data.id}}-{{key}}" data-id={{data.id}} data-fieldName="sp_carouselpro_item-{{key}}-content">{{{ carousel_item.content }}}</div>
													<# } #>
													<# if(carousel_item.button_text) { #>
														<#
															var btnClass = "";
															btnClass += data.button_type ? " sppb-btn-" + data.button_type : " sppb-btn-default" ;
															btnClass += data.button_size ? " sppb-btn-" + data.button_size : "" ;
															btnClass += data.button_shape ? " sppb-btn-" + data.button_shape : " sppb-btn-rounded" ;
															btnClass += data.button_appearance ? " sppb-btn-" + data.button_appearance : "" ;
															btnClass += data.button_block ? " " + data.button_block : "" ;
															var button_text = carousel_item.button_text;

															let icon_arr = (typeof carousel_item.button_icon !== "undefined" && carousel_item.button_icon) ? carousel_item.button_icon.split(" ") : "";
															let icon_name = icon_arr.length === 1 ? "fa "+carousel_item.button_icon : carousel_item.button_icon;
					
															if(carousel_item.button_icon_position == "left"){
																button_text = (carousel_item.button_icon) ? \'<i class="\'+icon_name+\'"></i> \'+carousel_item.button_text : carousel_item.button_text ;
															}else{
																button_text = (carousel_item.button_icon) ? carousel_item.button_text+\' <i class="\'+icon_name+\'"></i>\' : carousel_item.button_text ;
															}
														#>
													 <#
														const {button_url} =  carousel_item;
														const isUrlObject = _.isObject(button_url) &&  (!!button_url.url || !!button_url.menu || !!button_url.page);
														const isUrlString = _.isString(button_url) && button_url !== "";
														
														let href = "";
														let target = "";
														let rel = "";
														let relData="";
													   
														if(isUrlObject || isUrlString){
														   const urlObj = button_url?.url ? button_url : window.getSiteUrl(button_url, data.button_target);
														   const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;
								
														    const buttonUrl = (type === "url" && url) || (type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page)  && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
															target = new_tab ? `target=_blank` : "";
															relData += nofollow ? "nofollow" : "";
															relData += noopener ? " noopener" : "";
															relData += noreferrer ? " noreferrer" : "";

															rel = `rel="${relData}"`;
				
															href= buttonUrl? `href=${buttonUrl}` : "";
															
														   } #>
														   <a {{href}} {{target}} rel=\'{{rel}}\' id="btn-{{ data.id + "" + key}}" class="sppb-btn{{ btnClass }}">{{{ button_text }}}</a>
													<# } #>
												<# } #>
											</div>
										</div>
										<div class="sppb-col-sm-{{imageColumn}} sppb-col-xs-12">
											<div class="sppb-text-right">
											<# if(carousel_item.video) { #>
												<#
													var video = parseUrl(carousel_item.video),
														src = "";

													if (video.host == "youtu.be") {
														var id = video["path"].replace("/", "");
														src = "//www.youtube.com/embed/"+id;
													} else if(video.host == "www.youtube.com" || video.host == "youtube.com"){
														var id = video["query"].replace("v=", "");
														src = "//www.youtube.com/embed/"+id;
													} else if (video.host == "vimeo.com" || video.host == "www.vimeo.com") {
														var id = video["path"].replace("/", "");
														src = "//player.vimeo.com/video/"+id;
													}
												#>
												<div class="sppb-embed-responsive sppb-embed-responsive-16by9">
													<iframe class="sppb-embed-responsive-item" src=\'{{ src }}\' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
												</div>
											<# } else {
												var carouselItemImg = {}
												if (typeof carousel_item.image !== "undefined" && typeof carousel_item.image.src !== "undefined") {
													carouselItemImg = carousel_item.image
												} else {
													carouselItemImg = {src: carousel_item.image}
												}
												if(carouselItemImg.src){
													if(carouselItemImg.src && carouselItemImg.src.indexOf("https://") == -1 && carouselItemImg.src.indexOf("http://") == -1){
											#>
														<img class="sppb-img-reponsive" src=\'{{ pagebuilder_base + carouselItemImg.src }}\' alt="{{ carousel_item.title }}">
													<# } else if(carouselItemImg.src){ #>
														<img class="sppb-img-reponsive" src=\'{{ carouselItemImg.src }}\' alt="{{ carousel_item.title }}">
													<# }
												}
											} #>
											</div>
										</div>
										</div>
									<# if(!data.full_container){ #>
									</div>
									<# } #>
								</div>
							</div>
						</div>
					</div>
				<# }); #>
			</div>
			<# if(data.arrows) {
				if(data.arrow_position!=="default") { #>
					<div class="sppb-container sppb-carousel-pro-arrow-{{data.arrow_position}}">
					<div class="sppb-row">
					<div class="sppb-col-12">
				<# } #>
					<a href="#sppb-carousel-{{ data.id }}" class="sppb-carousel-arrow left sppb-carousel-control" data-slide="prev"><i class="fa {{left_arrow}}
					"></i></a>
					<a href="#sppb-carousel-{{ data.id }}" class="sppb-carousel-arrow right sppb-carousel-control" data-slide="next"><i class="fa {{right_arrow}}"></i></a>
				<# if(data.arrow_position!=="default") { #>
					</div>
					</div>
					</div>
				<# }
			} #>
		</div>
		';

		return $output;
	}
}
