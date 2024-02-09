<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonImage_layouts extends SppagebuilderAddons
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

		// Inline Layout
		$image_preset_thumb = (isset($settings->image_preset_thumb) && $settings->image_preset_thumb) ? $settings->image_preset_thumb : 'inline';

		$image = (isset($settings->image) && $settings->image) ? $settings->image : '';
		$image_src = isset($image->src) ? $image->src : $image;
		$image_width = (isset($image->width) && $image->width) ? $image->width : '';
		$image_height = (isset($image->height) && $image->height) ? $image->height : '';

		$alt_text = (isset($settings->image_alt_text) && $settings->image_alt_text) ? $settings->image_alt_text : '';
		$image_strech = (isset($settings->image_strech) && $settings->image_strech) ? ' image-fit' : '';
		$open_in_lightbox = (isset($settings->open_in_lightbox) && $settings->open_in_lightbox) ? $settings->open_in_lightbox : '';
		$image_overlay_color = (isset($settings->image_overlay_color) && $settings->image_overlay_color) ? $settings->image_overlay_color : '';

		$link_apear_in_title = (isset($settings->link_apear_in_title) && $settings->link_apear_in_title) ? $settings->link_apear_in_title : '';
		$caption = (isset($settings->caption) && $settings->caption) ? $settings->caption : '';
		$caption_postion = (isset($settings->caption_postion) && $settings->caption_postion) ? $settings->caption_postion : '';
		$image_container_column = (isset($settings->image_container_column) && $settings->image_container_column) ? (int) $settings->image_container_column : '';
		$popup_video_on_image = (isset($settings->popup_video_on_image) && $settings->popup_video_on_image) ? $settings->popup_video_on_image : '';
		$popup_video_src = (isset($settings->popup_video_src) && $settings->popup_video_src) ? $settings->popup_video_src : '';

		list($link, $target) = AddonHelper::parseLink($settings, 'click_url', ['url' => 'click_url', 'new_tab' => 'url_in_new_window']);



		// Lazy image size
		$image_link = '';
		if (strpos($image_src, "http://") !== false || strpos($image_src, "https://") !== false)
		{
			$image_link = $image_src;
		}
		else
		{
			$image_link = Uri::base() . $image_src;
		}
		// Lazy image loading
		$placeholder = $image_link == '' ? false : $this->get_image_placeholder($image_link);

		// Other Layout
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h4';
		$text_content = (isset($settings->text_content) && $settings->text_content) ? $settings->text_content : '';
		$content_text_align = (isset($settings->content_text_align) && $settings->content_text_align) ? ' sppb-text-alignment' : '';
		$content_vertical_align = (isset($settings->content_vertical_align) && $settings->content_vertical_align) ? $settings->content_vertical_align : '';

		$image_desktop_order = (isset($settings->image_desktop_order) && $settings->image_desktop_order != '') ? (int) $settings->image_desktop_order : '';
		$image_tab_order = (isset($settings->image_tab_order) && $settings->image_tab_order != '') ? (int) $settings->image_tab_order : '';
		$image_tab_order_land = (isset($settings->image_tab_order_land) && $settings->image_tab_order_land != '') ? (int) $settings->image_tab_order_land : '';
		$image_mob_order_land = (isset($settings->image_mob_order_land) && $settings->image_mob_order_land != '') ? (int) $settings->image_mob_order_land : '';
		$image_mob_order = (isset($settings->image_mob_order) && $settings->image_mob_order != '') ? (int) $settings->image_mob_order : '';

		$order_class = '';

		if ($image_desktop_order && $image_preset_thumb !== 'poster')
		{
			$order_class .= ' sppb-order-' . $image_desktop_order;
		}

		if ($image_tab_order_land && $image_preset_thumb !== 'poster')
		{
			$order_class .= ' sppb-order-lg-' . $image_tab_order_land;
		}

		if ($image_tab_order && $image_preset_thumb !== 'poster')
		{
			$order_class .= ' sppb-order-md-' . $image_tab_order;
		}

		if ($image_mob_order_land && $image_preset_thumb !== 'poster')
		{
			$order_class .= ' sppb-order-sm-' . $image_mob_order_land;
		}

		if ($image_mob_order && $image_preset_thumb !== 'poster')
		{
			$order_class .= ' sppb-order-xs-' . $image_mob_order;
		}

		$content_desktop_order = (isset($settings->content_desktop_order) && $settings->content_desktop_order != '') ? (int) $settings->content_desktop_order : '';
		$content_tab_order_land = (isset($settings->content_tab_order_land) && $settings->content_tab_order_land != '') ? (int) $settings->content_tab_order_land : '';
		$content_tab_order = (isset($settings->content_tab_order) && $settings->content_tab_order != '') ? (int) $settings->content_tab_order : '';
		$content_mob_order_land = (isset($settings->content_mob_order_land) && $settings->content_mob_order_land != '') ? (int) $settings->content_mob_order_land : '';
		$content_mob_order = (isset($settings->content_mob_order) && $settings->content_mob_order != '') ? (int) $settings->content_mob_order : '';
		$cont_order_class = '';

		if ($content_desktop_order && $image_preset_thumb !== 'poster')
		{
			$cont_order_class .= ' sppb-order-' . $content_desktop_order;
		}

		if ($content_tab_order_land && $image_preset_thumb !== 'poster')
		{
			$cont_order_class .= ' sppb-order-lg-' . $content_tab_order_land;
		}

		if ($content_tab_order && $image_preset_thumb !== 'poster')
		{
			$cont_order_class .= ' sppb-order-md-' . $content_tab_order;
		}

		if ($content_mob_order_land && $image_preset_thumb !== 'poster')
		{
			$cont_order_class .= ' sppb-order-sm-' . $content_mob_order_land;
		}

		if ($content_mob_order && $image_preset_thumb !== 'poster')
		{
			$cont_order_class .= ' sppb-order-xs-' . $content_mob_order;
		}

		$image_preset_class = '';

		if ($image_preset_thumb)
		{
			$image_preset_class = ' image-layout-preset-style-' . $image_preset_thumb;
		}

		if ($image_preset_thumb === 'poster')
		{
			$content_text_align = '';
		}

		// Button options
		$btnTextExist = property_exists($settings, 'btn_text');
		$buttonTextExist = property_exists($settings, 'button_text');

		if (!$buttonTextExist && $btnTextExist)
		{
			$settings->button_text = $settings->btn_text;
		}

		$btn_text = (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : '';

		$btn_class = '';
		$btn_class .= (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : '';
		$btn_class .= (isset($settings->btn_type) && $settings->btn_type) ? ' sppb-btn-' . $settings->btn_type : '';
		$btn_class .= (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
		$btn_class .= (isset($settings->btn_size) && $settings->btn_size) ? ' sppb-btn-' . $settings->btn_size : '';
		$btn_class .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
		$btn_class .= (isset($settings->btn_shape) && $settings->btn_shape) ? ' sppb-btn-' . $settings->btn_shape : ' sppb-btn-rounded';
		$btn_class .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
		$btn_class .= (isset($settings->btn_appearance) && $settings->btn_appearance) ? ' sppb-btn-' . $settings->btn_appearance : '';
		$btn_class .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
		$attribs = ' id="btn-' . $this->addon->id . '"';
		$btn_icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
		$btn_icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';

		list($buttonLink, $buttonTarget) = AddonHelper::parseLink($settings, 'button_url', ['url' => 'btn_url', 'new_tab' => 'btn_target']);

		$icon_arr = array_filter(explode(' ', $btn_icon));

		if (count($icon_arr) === 1)
		{
			$btn_icon = 'fas ' . $btn_icon;
		}

		if ($btn_icon_position === 'left')
		{
			$btn_text = ($btn_icon) ? '<i class="' . $btn_icon . '" aria-hidden="true"></i> ' . $btn_text : $btn_text;
		}
		else
		{
			$btn_text = ($btn_icon) ? $btn_text . ' <i class="' . $btn_icon . '" aria-hidden="true"></i>' : $btn_text;
		}

		// Output start
		$output = '';
		$output .= '<div class="sppb-addon-image-layouts' . $class . '">';
		$output .= '<div class="sppb-addon-content">';

		if ($image_preset_thumb === 'inline')
		{
			$output .= '<div class="sppb-image-layouts-inline">';
			$output .= '<div class="sppb-image-layouts-inline-img">';

			if ($link)
			{
				$output .= '<a href="' . $link . '" ' . $target . '>';
			}

			$output .= '<img class="sppb-img-responsive' . $image_strech . '' . ($placeholder ? ' sppb-element-lazy' : '') . '" src="' . ($placeholder ? $placeholder : $image_link) . '" alt="' . $alt_text . '" ' . ($placeholder ? 'data-large="' . $image_link . '"' : '') . ' ' . ($image_width ? 'width="' . $image_width . '"' : '') . ' ' . ($image_height ? 'height="' . $image_height . '"' : '') . ' loading="lazy">';

			if ($link)
			{
				$output .= '</a>';
			}

			if ($open_in_lightbox)
			{
				if ($image)
				{
					$output .= '<a class="sppb-magnific-popup sppb-addon-image-overlay-icon" data-popup_type="image" data-mainclass="mfp-no-margins mfp-with-zoom" href="' . $image_link . '">+</a>';
				}
				if ($image_overlay_color)
				{
					$output .= '<div class="sppb-addon-image-overlay">';
					$output .= '</div>';
				}
			}
			$output .= '</div>'; //.sppb-image-layouts-inline-img

			if ($caption && $caption_postion !== 'no-caption')
			{
				$output .= '<div class="sppb-addon-image-layout-caption ' . $caption_postion . '">';
				$output .= $caption;
				$output .= '</div>';
			}
			$output .= '</div>';
		}
		else
		{
			$output .= '<div class="sppb-addon-image-layout-wrap' . $image_preset_class . '">';

			if ($image_preset_thumb === 'card' || $image_preset_thumb === 'overlap' || $image_preset_thumb === 'collage')
			{
				$output .= '<div class="sppb-row">';
				$output .= '<div class="sppb-col-sm-' . ($image_container_column ? $image_container_column : 6) . '' . $order_class . '">';
			}

			$output .= '<div class="sppb-addon-image-layout-image' . $image_strech . '' . (($image_preset_thumb !== 'card' && $image_preset_thumb !== 'overlap' && $image_preset_thumb !== 'collage') ? $order_class : '') . '">';

			if ($link)
			{
				$output .= '<a href="' . $link . '" ' . $target . '>';
			}

			$output .= '<img class="sppb-img-responsive' . $image_strech . '' . ($placeholder ? ' sppb-element-lazy' : '') . '" src="' . ($placeholder ? $placeholder : $image_link) . '" alt="' . $alt_text . '" ' . ($placeholder ? 'data-large="' . $image_link . '"' : '') . ' ' . ($image_width ? 'width="' . $image_width . '"' : '') . ' ' . ($image_height ? 'height="' . $image_height . '"' : '') . ' loading="lazy">';

			if ($link)
			{
				$output .= '</a>';
			}

			if ($popup_video_on_image && $image_preset_thumb == 'card' && $popup_video_src)
			{
				$output .= '<a class="sppb-magnific-popup sppb-addon-image-overlay-icon" data-popup_type="iframe" data-mainclass="mfp-no-margins mfp-with-zoom" href="' . $popup_video_src . '">';
				$output .= '</a>';
				$output .= '<div class="sppb-addon-image-layouts-card-text-caption">';
				$output .= '<span class="image-layouts-card-text-caption-icon"><i class="fa fa-play"></i></span>';
				$output .= '<h4 class="image-layouts-card-text-caption-title">' . strip_tags($title) . '</h4>';
				$output .= '</div>';
			}

			$output .= '</div>'; //.sppb-addon-image-layout-image

			if ($image_preset_thumb === 'card' || $image_preset_thumb === 'overlap' || $image_preset_thumb === 'collage')
			{
				$output .= '</div>';
				$output .= '<div class="sppb-col-sm-' . ($image_container_column ? ($image_container_column == 12 ? 12 : 12 - $image_container_column) : 6) . '' . $cont_order_class . '' . ($image_preset_thumb === 'collage' ? ' collage-content-vertical-' . $content_vertical_align : '') . '">';
			}

			$output .= '<div class="sppb-addon-image-layout-content' . (($image_preset_thumb !== 'card' && $image_preset_thumb !== 'overlap' && $image_preset_thumb !== 'collage') ? $cont_order_class : '') . '' . $content_text_align . '' . (($content_desktop_order < $image_desktop_order) && $image_preset_thumb === 'collage' ? ' collage-content-right' : '') . '' . (($content_tab_order < $image_tab_order) && $image_preset_thumb === 'collage' ? ' collage-content-sm-right' : '') . '">';

			if ($title)
			{
				if ($image_preset_thumb === 'overlap')
				{
					$output .= '<div class="image-layout-tittle-wrap' . ($content_desktop_order < $image_desktop_order ? ' title-align-right' : '') . '' . ($content_tab_order < $image_tab_order ? ' title-align-sm-right' : '') . '">';
				}

				$output .= '<' . $heading_selector . ' class="sppb-image-layout-title">';

				if ($link_apear_in_title && $image_preset_thumb === 'poster')
				{
					if ($link)
					{
						$output .= '<a href="' . $link . '" ' . $target . '>';
					}
				}

				$output .= $title;

				if ($link_apear_in_title && $image_preset_thumb === 'poster')
				{
					if ($link)
					{
						$output .= '</a>';
					}
				}

				$output .= '</' . $heading_selector . '>';

				if ($image_preset_thumb === 'overlap')
				{
					$output .= '</div>';
				}
			}

			if ($text_content)
			{
				$output .= '<div class="sppb-addon-image-layout-text">';
				$output .= $text_content;
				$output .= '</div>';
			}

			if ($btn_text)
			{
				$output .= '<a href="' . $buttonLink . '" ' . $buttonTarget . ' ' . $attribs . ' class="sppb-btn ' . $btn_class . '">' . $btn_text . '</a>';
			}

			$output .= '</div>'; //.sppb-addon-image-layout-content

			if ($image_preset_thumb === 'card' || $image_preset_thumb === 'overlap' || $image_preset_thumb === 'collage')
			{
				$output .= '</div>';
				$output .= '</div>'; //.sppb-row
			}

			$output .= '</div>';
		}

		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	/**
	 * Load external scripts.
	 *
	 * @return 	array
	 * @since 	1.0.0
	 */
	public function scripts()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/jquery.magnific-popup.min.js');
	}

	/**
	 * Load external stylesheets.
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
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$cssHelper = new CSSHelper($addon_id);
		$image_preset_thumb = (isset($settings->image_preset_thumb) && $settings->image_preset_thumb) ? $settings->image_preset_thumb : '';
		$css = '';

		$imageBorderRadiusStyle = $cssHelper->generateStyle('.sppb-addon-image-layout-image .sppb-img-responsive, .sppb-image-layouts-inline-img .sppb-img-responsive, .sppb-addon-image-overlay', $settings, ['image_border_radius' => 'border-radius']);
		$imageOverlayStyle = $cssHelper->generateStyle('.sppb-addon-image-overlay', $settings, ['image_overlay_color' => 'background-color'], false);
		$lightBoxStyle = $cssHelper->generateStyle('.sppb-addon-image-overlay-icon', $settings, ['lightbox_icon_bg' => 'background'], false);
		$captionStyle = $cssHelper->generateStyle('.sppb-addon-image-layout-caption', $settings, ['caption_text_color' => 'color', 'caption_background' => 'background-color', 'caption_padding' => 'padding'], false, ['caption_padding' => 'spacing']);
		$captionFontStyle = $cssHelper->typography(
			'.sppb-addon-image-layout-caption',
			$settings,
			'caption_typography',
			[
				'font'           => 'caption_font_family',
				'size'           => 'caption_fontsize',
				'line_height'    => 'caption_lineheight',
				'letter_spacing' => 'caption_letterspace',
				'uppercase'      => 'caption_font_style.uppercase',
				'italic'         => 'caption_font_style.italic',
				'underline'      => 'caption_font_style.underline',
				'weight'         => 'caption_font_style.weight',
			]
		);

		$titleProps = ['title_text_color' => 'color'];

		if ($image_preset_thumb !== 'overlap')
		{
			$titleProps = array_merge($titleProps, ['title_margin' => 'margin', 'title_padding' => 'padding']);
		}
		else
		{
			$titleProps = array_merge($titleProps, ['title_background' => ['background', 'box-shadow: 12px 0 0 %1$s, -12px 0 0 %1$s']]);
		}

		$titleStyle = $cssHelper->generateStyle('.sppb-image-layout-title', $settings, $titleProps, false, ['title_margin' => 'spacing', 'title_padding' => 'spacing']);
		$titleFontStyle = $cssHelper->typography(
			'.sppb-image-layout-title',
			$settings,
			'title_typography',
			[
				'font'           => 'title_font_family',
				'size'           => 'title_fontsize',
				'line_height'    => 'title_lineheight',
				'letter_spacing' => 'title_letterspace',
				'uppercase'      => 'title_font_style.uppercase',
				'italic'         => 'title_font_style.italic',
				'underline'      => 'title_font_style.underline',
				'weight'         => 'title_font_style.weight',
			]
		);

		$textStyle = $cssHelper->generateStyle(
			'.sppb-addon-image-layout-text',
			$settings,
			[
				'text_content_color' => 'color',
				'text_content_margin' => 'margin',
				'text_content_padding' => 'padding'
			],
			false,
			['text_content_padding' => 'spacing', 'text_content_margin' => 'spacing']
		);
		$textFontStyle = $cssHelper->typography(
			'.sppb-addon-image-layout-text',
			$settings,
			'text_content_typography',
			[
				'font'           => 'text_content_font_family',
				'size'           => 'text_content_fontsize',
				'line_height'    => 'text_content_lineheight',
				'letter_spacing' => 'text_content_letterspace',
				'uppercase'      => 'text_content_font_style.uppercase',
				'italic'         => 'text_content_font_style.italic',
				'underline'      => 'text_content_font_style.underline',
				'weight'         => 'text_content_font_style.weight',
			]
		);

		$wrapper_color_type = (isset($settings->wrapper_color_type) && $settings->wrapper_color_type) ? $settings->wrapper_color_type : '';

		$settings->wrapper_background_gradient = CSSHelper::parseColor($settings, 'wrapper_gradient');
		$settings->wrapper_box_shadow = CSSHelper::parseBoxShadow($settings, 'wrapper_box_shadow');

		$wrapperProps = ['wrapper_border_radius' => 'border-radius'];
		$wrapperUnits = [
			'wrapper_background' => false,
			'wrapper_background_gradient' => false,
			'wrapper_margin' => false,
			'wrapper_padding' => false,
			'wrapper_box_shadow' => false,
		];
		$modifiers = ['wrapper_margin' => 'spacing', 'wrapper_padding' => 'spacing'];

		//Back Drop Filter
		if (isset($settings->wrapper_backdrop_filter) && $settings->wrapper_backdrop_filter)
		{
			$settings->wrapper_backdrop_filter = $settings->wrapper_backdrop_filter_webkit = CSSHelper::parseBackDropFilter($settings, 'wrapper_backdrop_filter', 'wrapper_backdrop_filter_value');

			$wrapperProps = array_merge($wrapperProps, ['wrapper_backdrop_filter' => 'backdrop-filter', 'wrapper_backdrop_filter_webkit' => '-webkit-backdrop-filter']);
			$wrapperUnits = array_merge($wrapperUnits, ['wrapper_backdrop_filter' => false, 'wrapper_backdrop_filter_webkit' => false]);
		}

		if ($wrapper_color_type === 'gradient')
		{
			$wrapperProps = array_merge($wrapperProps, ['wrapper_background_gradient' => 'background']);
		}
		else
		{
			$wrapperProps = array_merge($wrapperProps, ['wrapper_background' => 'background']);
		}

		if ($image_preset_thumb === 'poster')
		{
			$wrapperProps = array_merge($wrapperProps, ['wrapper_margin' => 'margin']);
		}

		$wrapperProps = array_merge($wrapperProps, ['wrapper_padding' => 'padding', 'wrapper_border' => 'border', 'wrapper_box_shadow' => 'box-shadow']);
		$wrapperStyle = $cssHelper->generateStyle('.sppb-addon-image-layout-content', $settings, $wrapperProps, $wrapperUnits, $modifiers);

		$textAlignStyle = $cssHelper->generateStyle('.sppb-text-alignment', $settings, ['content_text_align' => 'text-align'], false);

		$css .= $textStyle;
		$css .= $titleStyle;
		$css .= $wrapperStyle;
		$css .= $captionStyle;
		$css .= $textFontStyle;
		$css .= $lightBoxStyle;
		$css .= $titleFontStyle;
		$css .= $textAlignStyle;
		$css .= $captionFontStyle;
		$css .= $imageOverlayStyle;
		$css .= $imageBorderRadiusStyle;

		// Button style
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$buttonLayout = new FileLayout('addon.css.button', $layout_path);
		$options = new stdClass;

		$options->button_type = (isset($settings->button_type) && $settings->button_type) ? $settings->button_type : '';
		$options->button_appearance = (isset($settings->button_appearance) && $settings->button_appearance) ? $settings->button_appearance : '';
		$options->button_color = (isset($settings->button_color) && $settings->button_color) ? $settings->button_color : '';
		$options->button_color_hover = (isset($settings->button_color_hover) && $settings->button_color_hover) ? $settings->button_color_hover : '';
		$options->button_background_color = (isset($settings->button_background_color) && $settings->button_background_color) ? $settings->button_background_color : '';
		$options->button_background_color_hover = (isset($settings->button_background_color_hover) && $settings->button_background_color_hover) ? $settings->button_background_color_hover : '';
		$options->button_fontstyle = (isset($settings->button_fontstyle) && $settings->button_fontstyle) ? $settings->button_fontstyle : '';
		$options->button_font_style = (isset($settings->button_font_style) && $settings->button_font_style) ? $settings->button_font_style : '';
		$options->button_padding = isset($settings->button_padding) ? $settings->button_padding  : '';
		$options->button_typography = (isset($settings->button_typography) && $settings->button_typography) ? $settings->button_typography : '';
		$options->fontsize = (isset($settings->button_fontsize) && $settings->button_fontsize) ? $settings->button_fontsize : '';
		$options->button_letterspace = (isset($settings->button_letterspace) && $settings->button_letterspace) ? $settings->button_letterspace : '';
		$options->button_background_gradient = (isset($settings->button_background_gradient) && $settings->button_background_gradient) ? $settings->button_background_gradient : new stdClass();
		$options->button_background_gradient_hover = (isset($settings->button_background_gradient_hover) && $settings->button_background_gradient_hover) ? $settings->button_background_gradient_hover : new stdClass();

		if (!empty($settings->button_margin) && empty($settings->button_margin_top))
		{
			$settings->button_margin_top = $settings->button_margin;
		}

		$buttonMarginStyle = $cssHelper->generateStyle('.sppb-addon-image-layout-content .sppb-btn', $settings, ['button_margin_top' => 'margin-top']);

		$css .= $buttonMarginStyle;
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
			var modern_font_style = false;

			const isBtnTypeExist = data.hasOwnProperty("btn_type");
			const isButtonTypeExist = data.hasOwnProperty("button_type");
			if(!isButtonTypeExist && isBtnTypeExist) {
				data.button_type = data.btn_type;
			}

			const isBtnShapeExist = data.hasOwnProperty("btn_shape");
			const isButtonShapeExist = data.hasOwnProperty("button_shape");
			if(!isButtonShapeExist && isBtnShapeExist) {
				data.button_shape = data.btn_shape;
			}

			const isBtnSizeExist = data.hasOwnProperty("btn_size");
			const isButtonSizeExist = data.hasOwnProperty("button_size");
			if(!isButtonSizeExist && isBtnSizeExist) {
				data.button_size = data.btn_size;
			}


			var classList = "";
			classList += " sppb-btn-"+data.button_type;
			classList += " sppb-btn-"+data.button_size;
			classList += " sppb-btn-"+data.button_shape;

			if(!_.isEmpty(data.btn_appearance)){
				classList += " sppb-btn-"+data.btn_appearance;
			}
			if(!_.isEmpty(data.button_appearance)){
				classList += " sppb-btn-"+data.button_appearance;
			}
			if(!_.isEmpty(data.button_block)) {
				classList += " " + data.button_block;
			}

			var button_font_style = data.btn_font_style || data.button_font_style;
		#>
		<style type="text/css">';

		// button margin
		$output .= $lodash->unit('margin-top', '#btn-{{ data.id }}.sppb-btn-{{ data.type }}', 'data.button_margin_top', 'px');

		// Image Border Radius
		$output .= $lodash->unit('border-radius', '.sppb-addon-image-layout-image .sppb-img-responsive', 'data.image_border_radius', 'px', false);
		$output .= $lodash->unit('border-radius', '.sppb-image-layouts-inline-img .sppb-img-responsive', 'data.image_border_radius', 'px', false);
		$output .= $lodash->unit('border-radius', '.sppb-addon-image-overlay', 'data.image_border_radius', 'px', false);

		// Overlay
		$output .= $lodash->color('background-color', '.sppb-addon-image-overlay', 'data.image_overlay_color');
		$output .= $lodash->color('background-color', '.sppb-addon-image-overlay-icon', 'data.lightbox_icon_bg');

		// Backdrop Filter
		$output .= '<# if(data.wrapper_backdrop_filter) { ';
		$output .= 'let unit = (data.wrapper_backdrop_filter == "blur") ? "px" : "%";  #>';
		$output .= $lodash->backdrop_filter('{{data.wrapper_backdrop_filter}}', '.sppb-addon-image-layout-content', 'data.wrapper_backdrop_filter_value', '{{unit}}');
		$output .= '<# } #>';

		// Caption
		$output .= $lodash->color('color', '.sppb-addon-image-layout-caption', 'data.caption_text_color');
		$output .= $lodash->color('background-color', '.sppb-addon-image-layout-caption', 'data.caption_background');

		// Caption Typography
		$captionTypographyFallbacks = [
			'font'           => 'data.caption_font_family',
			'size'           => 'data.caption_fontsize',
			'line_height'    => 'data.caption_lineheight',
			'letter_spacing' => 'data.caption_letterspace',
			'uppercase'      => 'data.caption_font_style?.uppercase',
			'italic'         => 'data.caption_font_style?.italic',
			'underline'      => 'data.caption_font_style?.underline',
			'weight'         => 'data.caption_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-addon-image-layout-caption', 'data.caption_typography', $captionTypographyFallbacks);

		// Button Typography
		$btnTypographyFallbacks = [
			'font'           => 'data.btn_font_family',
			'size'           => 'data.btn_fontsize',
			'letter_spacing' => 'data.btn_letterspace',
			'weight'         => 'data.btn_font_style?.weight',
			'italic'         => 'data.btn_font_style?.italic',
			'underline'      => 'data.btn_font_style?.underline',
			'uppercase'      => 'data.btn_font_style?.uppercase',
		];

		$output .= $lodash->typography('#btn-{{ data.id }}.sppb-btn-{{ data.button_type }}', 'data.button_typography', $btnTypographyFallbacks);

		// Title Typography
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

		$output .= $lodash->typography('.sppb-image-layout-title', 'data.title_typography', $titleTypographyFallbacks);
		$output .= $lodash->color('color', '.sppb-image-layout-title', 'data.title_text_color');

		// Text Content Typography
		$textContentTypographyFallbacks = [
			'font'           => 'data.text_content_font_family',
			'size'           => 'data.text_content_fontsize',
			'line_height'    => 'data.text_content_lineheight',
			'letter_spacing' => 'data.text_content_letterspace',
			'uppercase'      => 'data.text_content_font_style?.uppercase',
			'italic'         => 'data.text_content_font_style?.italic',
			'underline'      => 'data.text_content_font_style?.underline',
			'weight'         => 'data.text_content_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-addon-image-layout-text', 'data.text_content_typography', $textContentTypographyFallbacks);
		$output .= $lodash->color('color', '.sppb-addon-image-layout-text', 'data.text_content_color');
		$output .= $lodash->spacing('padding', '.sppb-addon-image-layout-text', 'data.text_content_padding');
		$output .= $lodash->spacing('margin', '.sppb-addon-image-layout-text', 'data.text_content_margin');

		$output .= $lodash->spacing('margin', '.sppb-addon-image-layout-content .sppb-btn', 'data.button_margin');

		// alignment
		$output .= $lodash->alignment('text-align', '.sppb-text-alignment', 'data.content_text_align');

		// Not Overlap
		$output .= '<# if (data.image_preset_thumb !== "overlap") { #>';
		$output .= $lodash->spacing('margin', '.sppb-image-layout-title', 'data.title_margin');
		$output .= $lodash->spacing('padding', '.sppb-image-layout-title', 'data.title_padding');
		$output .= '<# } #>';

		// Overlap
		$output .= '<# if (data.image_preset_thumb == "overlap" && data?.title_background) { #>';
		$output .= $lodash->color('background-color', '.sppb-image-layout-title', 'data.title_background');
		$output .= '#sppb-addon-{{ data.id }} .sppb-image-layout-title { box-shadow: 12px 0 0 {{data.title_background}}, -12px 0 0 {{data.title_background}}; }';
		$output .= '<# } #>';

		// poster
		$output .= '<# if (data.image_preset_thumb == "poster") { #>';
		$output .= $lodash->spacing('margin', '.sppb-addon-image-layout-content', 'data.wrapper_margin');
		$output .= '<# } #>';

		$output .= '<# if (data.wrapper_box_shadow !== "0 0 0 0 #fff" && data.wrapper_box_shadow?.enabled !== undefined) { #>';
		$output .= $lodash->boxShadow('.sppb-addon-image-layout-content', 'data.wrapper_box_shadow');
		$output .= '<# } #>';
		$output .= '<# if (data.wrapper_color_type == "gradient") { #>';
		$output .= $lodash->color('background-color', '.sppb-addon-image-layout-content', 'data.wrapper_gradient');
		$output .= '<# } else { #>';
		$output .= '<# if(!_.isEmpty(data.wrapper_background)) { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-addon-image-layout-content {background: none;}';
		$output .= '<# } #>';
		$output .= $lodash->color('background-color', '.sppb-addon-image-layout-content', 'data.wrapper_background');
		$output .= '<# } #>';

		$output .= $lodash->border('border-width', '.sppb-addon-image-layout-content', 'data.wrapper_border');
		$output .= $lodash->border('border-color', '.sppb-addon-image-layout-content', 'data.wrapper_border_color');
		$output .= $lodash->spacing('padding', '.sppb-addon-image-layout-content', 'data.wrapper_padding');
		$output .= $lodash->unit('border-radius', '.sppb-addon-image-layout-content', 'data.wrapper_border_radius', 'px', false);

		// Custom
		$output .= '<# if (data.btn_type == "custom" || data.button_type == "custom") {
			const isBtnColorExist = data.hasOwnProperty("btn_color"); 
			const isButtonColorExist = data.hasOwnProperty("button_color"); 

			if(!isButtonColorExist && isBtnColorExist) {
				data.button_color = data.btn_color;
			}

			const isBtnColorHoverExist = data.hasOwnProperty("btn_color_hover"); 
			const isButtonColorHoverExist = data.hasOwnProperty("button_color_hover"); 

			if(!isButtonColorHoverExist && isBtnColorHoverExist) {
				data.button_color_hover = data.btn_color_hover;
			}

			const isBtnAppearanceExist = data.hasOwnProperty("btn_appearance"); 
			const isButtonAppearanceExist = data.hasOwnProperty("button_appearance"); 

			if(!isButtonAppearanceExist && isBtnAppearanceExist) {
				data.button_appearance = data.btn_appearance;
			}

			const isBtnBackgroundColorExist = data.hasOwnProperty("btn_background_color"); 
			const isButtonBackgroundColorExist = data.hasOwnProperty("button_background_color"); 

			if(!isButtonBackgroundColorExist && isBtnBackgroundColorExist) {
				data.button_background_color = data.btn_background_color;
			}

			const isBtnBackgroundColorHoverExist = data.hasOwnProperty("btn_background_color_hover"); 
			const isButtonBackgroundColorHoverExist = data.hasOwnProperty("button_background_color_hover"); 

			if(!isButtonBackgroundColorHoverExist && isBtnBackgroundColorHoverExist) {
				data.button_background_color_hover = data.btn_background_color_hover;
			}

			const isBtnBackgroundGradientExist = data.hasOwnProperty("btn_background_gradient"); 
			const isButtonBackgroundGradientExist = data.hasOwnProperty("button_background_gradient"); 

			if(!isButtonBackgroundGradientExist && isBtnBackgroundGradientExist) {
				data.button_background_gradient = data.btn_background_gradient;
			}

			const isBtnBackgroundGradientHoverExist = data.hasOwnProperty("btn_background_gradient_hover"); 
			const isButtonBackgroundGradientHoverExist = data.hasOwnProperty("button_background_gradient_hover"); 

			if(!isButtonBackgroundGradientExist && isBtnBackgroundGradientExist) {
				data.button_background_gradient_hover = data.btn_background_gradient_hover;
			}
			
			#>';
		$output .= $lodash->color('color', ' #btn-{{ data.id }}.sppb-btn-custom', 'data.button_color');
		$output .= $lodash->color('color', ' #btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_color_hover');
		$output .= $lodash->color('background-color', ' #btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= $lodash->unit('font-size', '#btn-{{ data.id }}.sppb-btn-custom', 'data.btn_fontsize', 'px');
		$output .= $lodash->spacing('padding', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_padding');
		$output .= '<# if (data.button_appearance == "outline") { #>';
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { background-color: transparent; }';
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= '<# } else if (data.button_appearance == "3d") { #>';
		$output .= $lodash->border('border-bottom-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color_hover');
		$output .= $lodash->color('background-color', ' #btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } else if (data.button_appearance == "gradient") { #>';
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { border:none; }';
		$output .= $lodash->color('background-color', ' #btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_gradient');
		$output .= $lodash->color('background-color', ' #btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_gradient_hover');
		$output .= '<# } else { #>';
		$output .= $lodash->color('background-color', ' #btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } #>';
		$output .= '<# } #>';

		$output .= '
			#sppb-addon-{{ data.id }} .sppb-addon-image-layout-content {
				<# if (_.trim(data.wrapper_border)) { #>
					border-style:solid;
				<# } #>
			}
		</style>

		<#

		let image_preset_thumb = (!_.isEmpty(data.image_preset_thumb) && data.image_preset_thumb) ? data.image_preset_thumb : "inline";
		let image_strech = (typeof data.image_strech !== undefined && data.image_strech) ? " image-fit" : "";
		
		let target = "";
		if(data.url_in_new_window){
			target = `target="_blank"`;
		}


		
		let content_text_align = (!_.isEmpty(data.content_text_align) && data.content_text_align) ?" sppb-text-alignment" : "";
		let content_vertical_align = (!_.isEmpty(data.content_vertical_align) && data.content_vertical_align) ? data.content_vertical_align : "";

		let image_desktop_order = (!_.isEmpty(data.image_desktop_order) && data.image_desktop_order != "") ? parseInt(data.image_desktop_order) : "";
		let image_tab_order_land = (!_.isEmpty(data.image_tab_order_land) && data.image_tab_order_land != "") ? parseInt(data.image_tab_order_land): "";
		let image_tab_order = (!_.isEmpty(data.image_tab_order) && data.image_tab_order != "") ? parseInt(data.image_tab_order): "";
		let image_mob_order_land = (!_.isEmpty(data.image_mob_order_land) && data.image_mob_order_land != "") ? parseInt(data.image_mob_order_land): "";
		let image_mob_order = (!_.isEmpty(data.image_mob_order) && data.image_mob_order != "") ? parseInt(data.image_mob_order): "";
		
		let order_class = "";
		if(image_desktop_order && image_preset_thumb !=="poster"){
			order_class +=" sppb-order-"+image_desktop_order;
		}
		if(image_tab_order_land && image_preset_thumb !=="poster"){
			order_class +=" sppb-order-lg-"+image_tab_order_land;
		}
		if(image_tab_order && image_preset_thumb !=="poster"){
			order_class +=" sppb-order-md-"+image_tab_order;
		}
		
		if(image_mob_order_land && image_preset_thumb !=="poster"){
			order_class +=" sppb-order-sm-"+image_mob_order_land;
		}

		if(image_mob_order && image_preset_thumb !=="poster"){
			order_class +=" sppb-order-xs-"+image_mob_order;
		}
		

		let content_desktop_order = (!_.isEmpty(data.content_desktop_order) && data.content_desktop_order !="") ? parseInt(data.content_desktop_order) : "";
		let content_tab_order_land = (!_.isEmpty(data.content_tab_order_land) && data.content_tab_order_land !="") ? parseInt(data.content_tab_order_land) : "";
		let content_tab_order = (!_.isEmpty(data.content_tab_order) && data.content_tab_order !="") ? parseInt(data.content_tab_order) : "";
		let content_mob_order_land = (!_.isEmpty(data.content_mob_order_land) && data.content_mob_order_land !="") ? parseInt(data.content_mob_order_land) : "";
		let content_mob_order = (!_.isEmpty(data.content_mob_order) && data.content_mob_order !="") ? parseInt(data.content_mob_order) : "";
		let cont_order_class ="";

		if(content_desktop_order && image_preset_thumb !=="poster"){
			cont_order_class +=" sppb-order-"+content_desktop_order;
		}
		if(content_tab_order_land && image_preset_thumb !=="poster"){
			cont_order_class +=" sppb-order-lg-"+content_tab_order_land;
		}
		if(content_tab_order && image_preset_thumb !=="poster"){
			cont_order_class +=" sppb-order-md-"+content_tab_order;
		}
		if(content_mob_order_land && image_preset_thumb !=="poster"){
			cont_order_class +=" sppb-order-sm-"+content_mob_order_land;
		}
		if(content_mob_order && image_preset_thumb !=="poster"){
			cont_order_class +=" sppb-order-xs-"+content_mob_order;
		}

		let image_preset_class = "";
		if(image_preset_thumb){
			image_preset_class =" image-layout-preset-style-"+image_preset_thumb;
		}
		if(image_preset_thumb ==="poster"){
			content_text_align = "";
		}


		/*** image layout link section ***/
		
		const {click_url} = data;
		const isUrlObject_click = _.isObject(click_url) && (!!click_url.url || !!click_url.menu || !!click_url.page) ;
		const isUrlString_click = _.isString(click_url) && click_url !== "";

		let clickTarget;
		let clickRel="";
		let clickUrl;

		if(isUrlObject_click || isUrlString_click){
			const isTarget = data.url_in_new_window ? "_blank" : "";
			const urlObj = click_url?.url ? click_url : window.getSiteUrl(click_url, isTarget);
			const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;

			clickTarget = new_tab ? "_blank" : "";
			
			clickRel += nofollow ? "nofollow" : "";
			clickRel += noopener ? " noopener" : "";
			clickRel += noreferrer ? " noreferrer" : "";
			
			clickUrl = (type === "url" && url) || ( type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page ) && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
		}

		const click_url_condition = (isUrlObject_click || isUrlString_click) && !!clickUrl;
		
		#>

		<div class="sppb-addon-image-layouts {{data.class}}">
		<div class="sppb-addon-content">
		<#
		var img = {}
		if (typeof data.image !== "undefined" && typeof data.image.src !== "undefined") {
			img = data.image
		} else {
			img = {src: data.image}
		}
		if(image_preset_thumb === "inline"){
		#>
		
			<div class="sppb-image-layouts-inline">
			<div class="sppb-image-layouts-inline-img">

			<# if(click_url_condition){ #>
				<a  href=\'{{clickUrl}}\' target="{{clickTarget}}" rel=\'{{clickRel}}\' >
			<# } #>

			<# if(img.src.indexOf("http://") == -1 && img.src.indexOf("https://") == -1){ #>
				<img class="sppb-img-responsive{{image_strech}}" src=\'{{ pagebuilder_base + img.src }}\' alt="{{data.image_alt_text}}">
			<# } else { #>
				<img class="sppb-img-responsive{{image_strech}}" src=\'{{ img.src }}\' alt="{{data.image_alt_text}}">
			<# } #>

			<# if(data.click_url){ #>
				</a>
			<# }
			
			if(data.open_in_lightbox){
				if(img.src){
			#>
					<a class="sppb-magnific-popup sppb-addon-image-overlay-icon" data-popup_type="image" data-mainclass="mfp-no-margins mfp-with-zoom" href="{{img.src}}">+</a>
				<# } 
				if(data.image_overlay_color) {
				#>
					<div class="sppb-addon-image-overlay">
					</div>
				<# } 
			} #>
			</div>

			<# if(data.caption && data.caption_postion !== "no-caption"){ #>
				<div class="sppb-addon-image-layout-caption sp-inline-editable-element {{data.caption_postion}}" data-id={{data.id}} data-fieldName="caption" contenteditable="true">
				{{{data.caption}}}
				</div>
			<# } #>
			</div>
		<# } else { #>
			<div class="sppb-addon-image-layout-wrap{{image_preset_class}}">
			<# if(image_preset_thumb === "card" || image_preset_thumb === "overlap" || image_preset_thumb === "collage"){ #>
				<div class="sppb-row">
				<div class="sppb-col-sm-{{(data.image_container_column ? data.image_container_column : 6)}}{{order_class}}">
			<# } #>
			
			<div class="sppb-addon-image-layout-image{{image_strech}}
			<# if(image_preset_thumb !== "card" && image_preset_thumb !== "overlap" && image_preset_thumb !== "collage"){ #>
				{{order_class}}
			<# } #>
			">

			<# if(click_url_condition){ #>
				<a  href=\'{{clickUrl}}\' target="{{clickTarget}}" rel=\'{{clickRel}}\' >
			<# } #>

			<# if(img.src.indexOf("http://") == -1 && img.src.indexOf("https://") == -1){ #>
				<img class="sppb-img-responsive{{image_strech}}" src=\'{{ pagebuilder_base + img.src }}\' alt="{{data.image_alt_text}}">
			<# } else { #>
				<img class="sppb-img-responsive{{image_strech}}" src=\'{{ img.src }}\' alt="{{data.image_alt_text}}">
			<# } #>

			<# if(data.click_url){ #>
				</a>
			<# }
			if(data.popup_video_on_image && data.image_preset_thumb === "card" && data.popup_video_src){
			#>
				<a class="sppb-magnific-popup sppb-addon-image-overlay-icon" data-popup_type="iframe" data-mainclass="mfp-no-margins mfp-with-zoom" href="{{data.popup_video_src}}"></a>
				<div class="sppb-addon-image-layouts-card-text-caption">
					<span class="image-layouts-card-text-caption-icon"><i class="fa fa-play"></i></span>
					<h4 class="image-layouts-card-text-caption-title">{{data.title.replace(/<\/?[^>]+(>|$)/g, "")}}</h4>
				</div>
			<# } #>
			</div>

			<# if(image_preset_thumb === "card" || image_preset_thumb === "overlap" || image_preset_thumb === "collage"){
				let collage_content_vertical = "";
				if(image_preset_thumb === "collage"){
					collage_content_vertical = " collage-content-vertical-"+content_vertical_align;
				}
			#>
				</div>
				<div class="sppb-col-sm-{{(data.image_container_column ? (data.image_container_column == 12 ? 12 : 12-data.image_container_column) : 6)}}{{cont_order_class}}{{collage_content_vertical}}">
			<# } #>
			<# 
				let collage_content_right = "";
				if((content_desktop_order < image_desktop_order) && image_preset_thumb === "collage") {
					collage_content_right = " collage-content-right";
				}
				let collage_content_sm_right = "";
				if((content_tab_order < image_tab_order) && image_preset_thumb === "collage") {
					collage_content_sm_right = " collage-content-sm-right";
				}
			#>
			<div class="sppb-addon-image-layout-content{{content_text_align}}{{collage_content_right}}{{collage_content_sm_right}} <# if(image_preset_thumb !== "card" && image_preset_thumb !== "overlap" && image_preset_thumb !== "collage") { #>{{cont_order_class}}<# } #>
			">
			<# if(data.title){
				let heading_selector = data.heading_selector || "h3";
				if(image_preset_thumb === "overlap"){
					let title_align_right = "";
					let title_align_sm_right = "";
					if(content_desktop_order < image_desktop_order){
						title_align_right = " title-align-right";
					}

					if(content_tab_order < image_tab_order) {
						title_align_sm_right = " title-align-sm-right";
					}
			#>
					<div class="image-layout-tittle-wrap{{title_align_right}}{{title_align_sm_right}}">
				<# } #>
					<{{heading_selector}} class="sppb-image-layout-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">
					<# if(data.link_apear_in_title && image_preset_thumb === "poster") { #>
						<# if(click_url_condition){ #>
							<a  href=\'{{clickUrl}}\' target="{{clickTarget}}" rel=\'{{clickRel}}\' >
						<# } #>
					<# } #>

						{{{data.title}}}

					<# if(data.link_apear_in_title && image_preset_thumb === "poster") { #>
						<# if(data.click_url){ #>
							</a>
						<# } #>
					<# } #>
					</{{heading_selector}}>
				<# if(image_preset_thumb === "overlap"){ #>
					</div>
				<# } #>
			<# }
			if(data.text_content){
			#>
				<div class="sppb-addon-image-layout-text sp-editable-content" data-id={{data.id}} data-fieldName="text_content">
					{{{data.text_content}}}
				</div>
			<# }
			
			const isBtnTextExist = data.hasOwnProperty("btn_text");
			const isButtonTextExist = data.hasOwnProperty("button_text");
			if(!isButtonTextExist && isBtnTextExist) data.button_text = data.btn_text;

			const isBtnTypeExist = data.hasOwnProperty("btn_type");
			const isButtonTypeExist = data.hasOwnProperty("button_type");
			if(!isButtonTypeExist && isBtnTypeExist) data.button_type = data.btn_type;

			const buttonText = data.button_text;

			if(_.trim(buttonText)){
				let icon_arr = (typeof data.btn_icon !== "undefined" && data.btn_icon) ? data.btn_icon.split(" ") : "";
				let button_icon_arr = (typeof data.button_icon !== "undefined" && data.button_icon) ? data.button_icon.split(" ") : "";

				const icon_name = icon_arr.length === 1 ? "fa "+data.btn_icon : data.btn_icon;
				const button_icon_name = button_icon_arr.length === 1 ? "fa "+data.button_icon : data.button_icon;

				const finial_icon_name = icon_name || button_icon_name;

				/**** button link section  ****/
				let buttonUrl;
				let buttonRel="";
				let buttonTarget;

				const {button_url} = data;
				const isUrlObject_url = _.isObject(button_url) && (!!button_url.url || !!button_url.menu || !!button_url.page) ;
				const isUrlString_url= _.isString(data.btn_url) && data.btn_url !== "";

				if(isUrlString_url || isUrlObject_url ){
					const urlObj = button_url?.url ? button_url : window.getSiteUrl(data.btn_url, data.btn_target);
					const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;

					buttonTarget = new_tab ? "_blank" : "";
					
                    buttonRel += nofollow ? "nofollow" : "";
                    buttonRel += noopener ? " noopener" : "";
                    buttonRel += noreferrer ? " noreferrer" : "";

					buttonUrl = (type === "url" && url) || ( type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page ) && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
				}

			#>
				<a href=\'{{ buttonUrl }}\' id="btn-{{ data.id }}" target="{{buttonTarget}}" rel=\'{{buttonRel}}\' class="sppb-btn {{ classList }}"><# if( (data.btn_icon_position == "left" || data.button_icon_position == "left" ) && !_.isEmpty(data.btn_icon || data.button_icon)) { #><i class="{{ finial_icon_name }}"></i> <# } #>{{ buttonText }}<# if( (data.btn_icon_position == "right" || data.button_icon_position == "right") && !_.isEmpty(data.btn_icon || data.button_icon)) { #> <i class="{{ finial_icon_name }}"></i><# } #></a>
			<# } #>
			</div>

			<# if(image_preset_thumb === "card" || image_preset_thumb === "overlap" || image_preset_thumb === "collage"){ #>
				</div>
				</div>
			<# } #>
			</div>
		<# } #>
		
		</div>
		</div>';

		return $output;
	}
}
