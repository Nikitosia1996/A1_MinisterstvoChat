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

class SppagebuilderAddonFlip_box extends SppagebuilderAddons
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
		//get data
		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$front_text = (isset($settings->front_text) && $settings->front_text) ? $settings->front_text : '';
		$flip_text = (isset($settings->flip_text) && $settings->flip_text) ? $settings->flip_text : '';
		$rotate = (isset($settings->rotate) && $settings->rotate) ? $settings->rotate : 'flip_right';
		$flip_bhave = (isset($settings->flip_bhave) && $settings->flip_bhave) ? $settings->flip_bhave : 'hover';
		

		//Flip Style
		$flip_style = (isset($settings->flip_style) && $settings->flip_style) ? $settings->flip_style : 'rotate_style';

		if ($flip_style != '')
		{
			if ($flip_style === 'slide_style')
			{
				$flip_style = 'slide-flipbox';
			}
			elseif ($flip_style === 'fade_style')
			{
				$flip_style = 'fade-flipbox';
			}
			elseif ($flip_style === 'threeD_style')
			{
				$flip_style = 'threeD-flipbox';
			}
		}

		$output = '';
		$output .= '<div class="sppb-addon sppb-addon-sppb-flibox ' . $class . ' ' . $flip_style . ' ' . $rotate . ' flipon-' . $flip_bhave . '">';

		if ($flip_style == 'threeD-flipbox')
		{

			$output .= '<div class="threeD-content-wrap">';
			$output .= '<div class="threeD-item">';
			$output .= '<div class="threeD-flip-front">';
			$output .= '<div class="threeD-content-inner">';
			$output .= $front_text;
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="threeD-flip-back">';
			$output .= '<div class="threeD-content-inner">';
			$output .= $flip_text;
			$output .= '</div>';
			$output .= '</div >';
			$output .= '</div>'; //.threeD-item
			$output .= '</div>'; //.threeD-content-wrap
		}
		else
		{

			$output .= '<div class="sppb-flipbox-panel">';
			$output .= '<div class="sppb-flipbox-front flip-box">';
			$output .= '<div class="flip-box-inner">';
			$output .= $front_text;
			$output .= '</div>'; //.flip-box-inner
			$output .= '</div>'; //.front
			$output .= '<div class="sppb-flipbox-back flip-box">';
			$output .= '<div class="flip-box-inner">';
			$output .= $flip_text;
			$output .= '</div>'; //.flip-box-inner
			$output .= '</div>'; //.back
			$output .= '</div>'; //.sppb-flipbox-panel
		}
		$output .= '</div>'; //.sppb-addon-sppb-flibox
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
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$settings = $this->addon->settings;
		$cssHelper = new CSSHelper($addon_id);
		$css = '';

		$flipProps = ['height' => 'height'];
		$flipStyle = $cssHelper->generateStyle('.sppb-flipbox-panel, .threeD-item', $settings, $flipProps);

		// Front style
		$front_bgimg = isset($settings->front_bgimg) && $settings->front_bgimg ? $settings->front_bgimg : '';
		$front_bgimg_src = isset($front_bgimg->src) ? $front_bgimg->src : $front_bgimg;

		if ($front_bgimg_src)
		{
			if (preg_match("@^https?:\/\/@", $front_bgimg_src))
			{
				$front_bgimg = $front_bgimg_src;
			}
			else
			{
				$front_bgimg = Uri::root() . $front_bgimg_src;
			}

			$settings->front_bg_image = $front_bgimg;
		}

		$frontProps = ['front_bg_image' => 'background-image: url(%s)', 'front_textcolor' => 'color'];

		$frontStyle = $cssHelper->generateStyle('.sppb-flipbox-front, .threeD-flip-front', $settings, $frontProps, false);
		$frontBgStyle = $cssHelper->generateStyle('.threeD-flip-front:before, .sppb-flipbox-front.flip-box:before', $settings, ['front_bgcolor' => 'background-color'], false);

		// Back style
		$back_bgimg = isset($settings->back_bgimg) && $settings->back_bgimg ? $settings->back_bgimg : '';
		$back_bgimg_src = isset($back_bgimg->src) ? $back_bgimg->src : $back_bgimg;

		if ($back_bgimg_src)
		{
			if (preg_match("@^https?:\/\/@", $back_bgimg_src))
			{
				$back_bgimg = $back_bgimg_src;
			}
			else
			{
				$back_bgimg = Uri::root() . $back_bgimg_src;
			}

			$settings->back_bg_image = $back_bgimg;
		}

		$backProps = ['back_bg_image' => 'background-image: url(%s)', 'back_textcolor' => 'color'];

		$backStyle = $cssHelper->generateStyle('.sppb-flipbox-back, .threeD-flip-back', $settings, $backProps, false);
		$backBgStyle = $cssHelper->generateStyle('.threeD-flip-back:before, .sppb-flipbox-back.flip-box:before', $settings, ['back_bgcolor' => 'background-color'], false);

		$settings->text_align = $cssHelper->parseAlignment($settings, 'text_align');
		$textAlign = $cssHelper->generateStyle('.sppb-addon-sppb-flibox', $settings, ['text_align' => 'text-align'], false);

		$css .= $textAlign;
		$css .= $flipStyle;
		$css .= $frontStyle;
		$css .= $frontBgStyle;
		$css .= $backStyle;
		$css .= $backBgStyle;

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
        
            var flip_style = (data.flip_style) ? data.flip_style : "rotate_style";

            if (flip_style != "") {
                if (flip_style == "slide_style") {
                    flip_style = "slide-flipbox";
                } else if (flip_style == "fade_style") {
                    flip_style = "fade-flipbox";
                } else if (flip_style == "threeD_style") {
                    flip_style = "threeD-flipbox";
                }
            }

            var border_styles = (data.border_styles) ? data.border_styles : "";

            var flip_styles = "";

            if(_.isArray(border_styles)) {
                if(border_styles.indexOf("border_radius") !== -1){
                    flip_styles += "border-radius: 8px;";
                }

                if(border_styles.indexOf("dashed") !== -1){
                    flip_styles += "border-style: dashed;";
                } else if(border_styles.indexOf("solid") !== -1){
                    flip_styles += "border-style: solid;";
                } else if(border_styles.indexOf("dotted") !== -1){
                    flip_styles += "border-style: dotted;";
                }

                if(border_styles.indexOf("dashed") !== -1 || border_styles.indexOf("solid") !== -1 || border_styles.indexOf("dotted") !== -1){
                    flip_styles += "border-width: 2px;";
                    flip_styles += "border-color:"+data.border_color+";";
                }
            }

            var frontImg = {}
            if (typeof data.front_bgimg !== "undefined" && typeof data.front_bgimg.src !== "undefined") {
                frontImg = data.front_bgimg
            } else {
                frontImg = {src: data.front_bgimg}
            }

            let front_bgimg = "";
            if (_.isObject(frontImg) && frontImg.src != undefined) {
                if(frontImg.src.indexOf("http://") !== -1 || frontImg.src.indexOf("https://") !== -1){
                    front_bgimg = frontImg.src;
                } else {
                    front_bgimg = pagebuilder_base + frontImg.src;
                }
            }

            var backImg = {}
            if (typeof data.back_bgimg !== "undefined" && typeof data.back_bgimg.src !== "undefined") {
                backImg = data.back_bgimg
            } else {
                backImg = {src: data.back_bgimg}
            }

            let back_bgimg = "";
            if (_.isObject(backImg) && backImg.src != undefined) {
                if(backImg.src.indexOf("http://") !== -1 || backImg.src.indexOf("https://") !== -1){
                    back_bgimg = backImg.src;
                } else {
                    back_bgimg = pagebuilder_base + backImg.src;
                }
            }
        #>
        <style type="text/css">
            #sppb-addon-{{ data.id }} .sppb-flipbox-panel,
            #sppb-addon-{{ data.id }} .threeD-item{
                {{ flip_styles }}
            }

            #sppb-addon-{{ data.id }} .sppb-flipbox-front,
            #sppb-addon-{{ data.id }} .threeD-flip-front{
                background-image: url({{ front_bgimg }});
            }

            #sppb-addon-{{ data.id }} .sppb-flipbox-back,
            #sppb-addon-{{ data.id }} .threeD-flip-back{
                background-image: url({{ back_bgimg }});
            }';
		$output .= $lodash->color('color', '.sppb-flipbox-front, .threeD-flip-front', 'data.front_textcolor');
		$output .= $lodash->color('color', '.sppb-flipbox-back, .threeD-flip-back', 'data.back_textcolor');
		$output .= $lodash->color('background-color', '.threeD-flip-front:before, .sppb-flipbox-front.flip-box:before', 'data.front_bgcolor');
		$output .= $lodash->color('background-color', '.threeD-flip-back:before, .sppb-flipbox-back.flip-box:before', 'data.back_bgcolor');
		$output .= $lodash->unit('height', '.sppb-flipbox-panel, .threeD-item', 'data.height', 'px');
		$output .= $lodash->alignment('text-align', '.sppb-addon-sppb-flibox', 'data.text_align');
		$output .= '</style>
        <div class="sppb-addon sppb-addon-sppb-flibox {{ data.class }} {{ flip_style }} {{ data.rotate }} flipon-{{ data.flip_bhave }}">
            <# if (flip_style == "threeD-flipbox") { #>
                <div class="threeD-content-wrap">
                    <div class="threeD-item">
                        <div class="threeD-flip-front">
                            <div class="threeD-content-inner sp-inline-editable-element" data-id={{data.id}} data-fieldName="front_text" contenteditable="true">{{{ data.front_text }}}</div>
                        </div>
                        <div class="threeD-flip-back">
                            <div class="threeD-content-inner sp-inline-editable-element" data-id={{data.id}} data-fieldName="flip_text" contenteditable="true">{{{ data.flip_text }}}</div>
                        </div >
                    </div>
                </div>
            <# } else { #>
                <div class="sppb-flipbox-panel">
                    <div class="sppb-flipbox-front flip-box">
                        <div class="flip-box-inner sp-inline-editable-element" data-id={{data.id}} data-fieldName="front_text" contenteditable="true">{{{ data.front_text }}}</div>
                    </div>
                    <div class="sppb-flipbox-back flip-box">
                        <div class="flip-box-inner sp-inline-editable-element" data-id={{data.id}} data-fieldName="flip_text" contenteditable="true">{{{ data.flip_text }}}</div>
                    </div>
                </div>
            <# } #>
        </div>
        ';

		return $output;
	}
}
