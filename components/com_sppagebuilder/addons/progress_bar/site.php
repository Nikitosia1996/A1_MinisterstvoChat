<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonProgress_bar extends SppagebuilderAddons
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
		$class .= (isset($settings->shape) && $settings->shape) ? 'sppb-progress-' . $settings->shape : '';
		$type = (isset($settings->type) && $settings->type) ? $settings->type : '';
		$progress = (isset($settings->progress) && $settings->progress) ? $settings->progress : '';
		$text = (isset($settings->text) && $settings->text) ? $settings->text : '';
		$stripped = (isset($settings->stripped) && $settings->stripped) ? $settings->stripped : '';
		$show_percentage = (isset($settings->show_percentage) && $settings->show_percentage) ? $settings->show_percentage : 0;

		// Output
		$output	= "";
		$output .= '<div class="sppb-addon ' . $class . '">';
		$output .= ($show_percentage) ? '<div class="sppb-progress-label clearfix">' .  $text . '<span>' . (int) $progress . '%</span></div>' : '';
		$output .= '<div class="sppb-progress">';
		$output .= '<div class="sppb-progress-bar ' . $type . ' ' . $stripped . '" role="progressbar" aria-valuenow="' . (int) $progress . '" aria-valuemin="0" aria-valuemax="100" data-width="' . (int) $progress . '%">';

		if (!$show_percentage)
		{
			$output .= ($text) ? $text : '';
		}

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
		$css = '';

		$type = (isset($settings->type) && $settings->type) ? $settings->type : '';

		$barStyle = $cssHelper->generateStyle('.sppb-progress', $settings, ['bar_height' => 'height']);
		$barLineHeightStyle = $cssHelper->generateStyle('.sppb-progress-bar', $settings, ['bar_height' => 'line-height']);
		$textStyle = $cssHelper->generateStyle('.sppb-progress-label', $settings, ['text_color' => 'color'], false);
		$textFontStyle = $cssHelper->typography('.sppb-progress-label', $settings, 'label_typography', ['font' => 'text_fontfamily', 'size' => 'text_fontsize', 'line_height' => 'text_lineheight', 'weight' => 'text_fontweight']);
		$percentStyle = $cssHelper->generateStyle('.sppb-progress-label > span', $settings, ['percentage_color' => 'color'], false);
		$percentFontStyle = $cssHelper->typography('.sppb-progress-label > span', $settings, 'percentage_typography', ['font' => 'percentage_fontfamily', 'size' => 'percentage_fontsize', 'line_height' => 'percentage_lineheight', 'weight' => 'percentage_fontweight']);

		if ($type === 'custom')
		{
			$customBarStyle = $cssHelper->generateStyle('.sppb-progress', $settings, ['bar_background' => "background-color"], false);
			$customBarBackgroundStyle = $cssHelper->generateStyle('.sppb-progress-bar', $settings, ['progress_bar_background' => "background-color"], false);

			$css .= $customBarStyle;
			$css .= $customBarBackgroundStyle;
		}

		$css .= $barStyle;
		$css .= $textStyle;
		$css .= $percentStyle;
		$css .= $textFontStyle;
		$css .= $percentFontStyle;
		$css .= $barLineHeightStyle;

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
				let show_percentage = data.show_percentage || 0
				let progressClass = (!_.isEmpty(data.shape)) ? "sppb-progress-"+data.shape:""
			#>

			<style type="text/css">';
		$output .= $lodash->unit('height', '.sppb-progress', 'data.bar_height', 'px', false);
		$output .= $lodash->unit('line-height', '.sppb-progress-bar', 'data.bar_height', 'px', false);
		$output .= '<# if(data.type == "custom") { #>';
		$output .= $lodash->color('color', '.sppb-progress-label', 'data.text_color');
		$output .= $lodash->color('color', '.sppb-progress-label span ', 'data.percentage_color');
		$output .= $lodash->color('background-color', '.sppb-progress', 'data.bar_background');
		$output .= $lodash->color('background-color', '.sppb-progress-bar', 'data.progress_bar_background');
		// Label
		$labelTypographyFallbacks = [
			'font'        => 'data.text_fontfamily',
			'size'        => 'data.text_fontsize',
			'line_height' => 'data.text_lineheight',
			'weight'      => 'data.text_fontweight',
		];
		$output .= $lodash->typography('.sppb-progress-label', 'data.label_typography', $labelTypographyFallbacks);

		// Percentage
		$percentageTypographyFallbacks = [
			'font'        => 'data.percentage_fontfamily',
			'size'        => 'data.percentage_fontsize',
			'line_height' => 'data.percentage_lineheight',
			'weight'      => 'data.percentage_fontweight',
		];

		$output .= $lodash->typography('.sppb-progress-label span', 'data.percentage_typography', $percentageTypographyFallbacks);
		$output .= '<# } #>';
		$output .= '
			</style>
			<div class="sppb-addon {{ data.class }}">
			<# if( show_percentage != 0 ) {#>
			<div class="sppb-progress-label clearfix">
				{{ data.text }}
				<span> {{ data.progress }}%</span>
			</div>
			<# } #>

			<div class="sppb-progress {{ progressClass }}">
			<div class="sppb-progress-bar {{ data.type }} {{ data.stripped }}" role="progressbar" aria-valuenow="{{ data.progress }}" aria-valuemin="0" aria-valuemax="100" data-width="{{ data.progress }}%">
				<# if(show_percentage == 0) { #>
					{{ data.text }}
				<# } #>
			</div>
			</div>
			</div>
			';

		return $output;
	}
}
