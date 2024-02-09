<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Uri\Uri;

class SppagebuilderAddonLottie extends SppagebuilderAddons
{

	public function render()
	{
		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		//Options
		$lottie_url = (isset($settings->lottie_url) && $settings->lottie_url) ? $settings->lottie_url : '';
		$lottie_file = (isset($settings->lottie_file) && $settings->lottie_file) ? $settings->lottie_file : '';

		$src_file = (isset($settings->source) && $settings->source == "internal") ? $lottie_file : $lottie_url;


		$loop = isset($settings->loop)  ? $settings->loop : 0;
		$autoplay = isset($settings->autoplay) ? $settings->autoplay : 0;
		$speed = isset($settings->speed) ? $settings->speed : 1;
		$mode = (isset($settings->mode) && $settings->mode) ? $settings->mode : 'none';
		$renderer = (isset($settings->renderer) && $settings->renderer) ? $settings->renderer : 'svg';
		$hover_out = (isset($settings->hover_out) && $settings->hover_out) ? $settings->hover_out : 'default';
		$direction = (isset($settings->direction) && $settings->direction) ? $settings->direction : 'forward';

		$start = !empty($settings->frame_start) ? $settings->frame_start : '';
		$end = !empty($settings->frame_end) ? $settings->frame_end : '';
		$viewport_top = !empty($settings->viewport_top) ? $settings->viewport_top : 0;
		$viewport_bottom = !empty($settings->viewport_bottom) ? $settings->viewport_bottom : 0;

		$output 	 = '<div class="sppb-addon-lottie">';
		$output 	.= '<div class="sppb-addon-content">';
		$output 	.= '<div id="sppb-addon-lottie-player-' . $this->addon->id . '" class="lottie-player" data-autoplay="' . $autoplay . '" data-loop="' . $loop . '" data-mode="' . $mode . '" data-renderer="'. $renderer .'" data-hover_out="' . $hover_out . '" src="' . $src_file . '"  background="transparent" data-direction="' . $direction . '" data-speed="' . $speed . '" data-frame_start="' . $start . '" data-frame_end="' . $end . '" data-viewport_top="' . $viewport_top . '" data-viewport_bottom="' . $viewport_bottom . '"></div>';
		$output 	.= '</div>';
		$output 	.= '</div>';

		return $output;
	}

	public function css()
	{
		$settings = $this->addon->settings;
		$addon_id = "#sppb-addon-lottie-player-" . $this->addon->id;
		$cssHelper = new CSSHelper($addon_id);
		$css = '';
		$style = $cssHelper->generateStyle(':self', $settings, ['width' => 'width', 'height' => 'height'], 'px');
		$css = $style;

		return $css;
	}

	public function scripts()
	{
		return [
			Uri::base(true) . '/components/com_sppagebuilder/assets/js/lottie.min.js',
			Uri::base(true) . '/components/com_sppagebuilder/assets/js/lottie-addon.js'
		];
	}

	public static function getTemplate()
	{
		$lodash = new Lodash('#sppb-addon-lottie-{{ data.id }}');
		$output = '
		<#
			let lottie_url = (typeof data.lottie_url !== "undefined" && data.lottie_url) ? data.lottie_url : "";
			let lottie_file = (typeof data.lottie_file !== "undefined" && data.lottie_file) ? data.lottie_file : "";
			let src_file = (typeof data.source !== "undefined" && data.source == "internal") ? lottie_file : lottie_url;
		#>';
		$output .= '<style type="text/css">';
		$output .= $lodash->unit('width', "#sppb-addon-lottie-player-{{ data.id }}", 'data?.width', "{{ data?.width?.unit }}");
		$output .= $lodash->unit('height', "#sppb-addon-lottie-player-{{ data.id }}", 'data?.height', "{{data?.height?.unit}}");
		$output .= '</style>';
		$output .= '
		<div class="sppb-addon-lottie-wrapper">
			<div class="sppb-addon-content">
				<div id="sppb-addon-lottie-{{ data.id }}" class="sppb-addon-lottie {{data.class}}">
					<# if(src_file) {#>
						<div 
						class="lottie-player"
						id="sppb-addon-lottie-player-{{ data.id }}"  
						src=\'{{src_file}}\' 
						background="transparent" 
						data-external = true
						data-autoplay = {{ data.autoplay }}
						data-loop = {{ data.loop }}
						data-mode = {{ data.mode }}
						data-renderer = {{ data.renderer }}
						data-hover_out = {{ data.hover_out }}
						data-viewport_top = {{(data.viewport_top != undefined && data.viewport_top) ? data.viewport_top : 0}}
						data-viewport_bottom = {{(data.viewport_bottom != undefined && data.viewport_bottom) ? data.viewport_bottom : 0}}
						data-direction="{{(data.direction != undefined && data.direction) ? data.direction : "forward" }}" 
						data-speed="{{(data.speed != undefined && data.speed) ? data.speed : 1}}" 
						data-frame_start="{{(data.frame_start != undefined && data.frame_start) ? data.frame_start : ""}}" 
						data-frame_end="{{(data.frame_end != undefined && data.frame_end) ? data.frame_end : ""}}" 
						></div>
					<# } else { #>
						<div class="lottie-player" src="https://assets8.lottiefiles.com/packages/lf20_v92o72md.json"
						id="sppb-addon-lottie-player-{{ data.id }}"
						data-autoplay = {{ data.autoplay }}
						data-loop = {{ data.loop }}
						data-mode = {{ data.mode }}
						data-renderer = {{ data.renderer }}
						data-hover_out = {{ data.hover_out }}
						data-viewport_top = {{(data.viewport_top != undefined && data.viewport_top) ? data.viewport_top : 0}}
						data-viewport_bottom = {{(data.viewport_bottom != undefined && data.viewport_bottom) ? data.viewport_bottom : 0}}
						data-direction="{{(data.direction != undefined && data.direction) ? data.direction : "forward" }}" 
						data-speed="{{(data.speed != undefined && data.speed) ? data.speed : 1}}" 
						data-frame_start="{{(data.frame_start != undefined && data.frame_start) ? data.frame_start : ""}}" 
						data-frame_end="{{(data.frame_end != undefined && data.frame_end) ? data.frame_end : ""}}"></div>
					<# } #>
				</div>
			</div>
		</div>
		';

		return $output;
	}
}
