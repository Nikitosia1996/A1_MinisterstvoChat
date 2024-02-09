<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonAnimated_number extends SppagebuilderAddons
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

		$number = (isset($settings->number) && $settings->number) ? $settings->number : 0;
		$duration = (isset($settings->duration) && $settings->duration) ? $settings->duration : 0;
		$format = (isset($settings->use_number_format) && $settings->use_number_format) ? $settings->use_number_format : 0;
		$counter_title = (isset($settings->counter_title) && $settings->counter_title) ? $settings->counter_title : '';
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$number_position = (isset($settings->number_position) && $settings->number_position) ? 'animated-number-position-' . $settings->number_position : '';

		$output  = '<div class="sppb-addon sppb-addon-animated-number ' . $class . ' ' . $number_position . '">';
		$output .= '<div class="sppb-addon-content">';
		$output .= '<div class="sppb-animated-number" data-format="'. $format .'" data-digit="' . $number . '" data-duration="' . $duration . '">0</div>';

		if ($counter_title)
		{
			$output .= '<div class="sppb-animated-number-title">' . $counter_title . '</div>';
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
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$settings = $this->addon->settings;
		$cssHelper = new CSSHelper($addon_id);

		$number_before_after_text = (isset($settings->number_before_after_text) && $settings->number_before_after_text) ? $settings->number_before_after_text : '';
		$number_before_after_text_position = (isset($settings->number_before_after_text_position) && $settings->number_before_after_text_position) ? $settings->number_before_after_text_position : '';

		$css = '';

		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');

		$alignmentStyle = $cssHelper->generateStyle('.sppb-addon.sppb-addon-animated-number', $settings, ['alignment' => 'text-align'], false);
		$numberStyle = $cssHelper->generateStyle('.sppb-animated-number', $settings, ['color' => 'color'], false);

		$numberTypographyFallbacks = [
			'font'        => 'number_font_family',
			'size'        => 'font_size',
			'line_height' => 'line_height',
			'weight'      => 'number_font_wight',
		];

		$numberTypography = $cssHelper->typography('.sppb-animated-number', $settings, 'number_typography', $numberTypographyFallbacks);
		$titleStyle = $cssHelper->generateStyle('.sppb-animated-number-title', $settings, ['title_color' => 'color', 'title_margin' => 'margin'], ['title_color' => false, 'title_margin' => false], ['title_margin' => 'spacing']);

		$numberTitleTypographyFallbacks = [
			'font'        => 'title_font_family',
			'size'        => 'title_font_size',
			'line_height' => 'title_line_height',
			'weight'      => 'title_fontstyle.weight',
			'italic'      => 'title_fontstyle.italic',
			'underline'   => 'title_fontstyle.underline',
			'uppercase'   => 'title_fontstyle.uppercase',
		];

		$numberTitleTypography = $cssHelper->typography('.sppb-animated-number-title', $settings, 'title_typography', $numberTitleTypographyFallbacks);

		$css .= $alignmentStyle;
		$css .= $numberStyle;
		$css .= $numberTypography;
		$css .= $titleStyle;
		$css .= $numberTitleTypography;

		if ($number_before_after_text_position === 'right')
		{
			if ($number_before_after_text)
			{
				$css .= $addon_id . ' .sppb-animated-number::after {';
				$css .= 'content:"' . $number_before_after_text . '";';
				$css .= 'display: inline-block;';
				$css .= '}';
			}
		}
		else
		{
			if ($number_before_after_text)
			{
				$css .= $addon_id . ' .sppb-animated-number::before {';
				$css .= 'content:"' . $number_before_after_text . '";';
				$css .= 'display: inline-block;';
				$css .= '}';
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
		$lodash = new Lodash('#sppb-addon-{{ data.id }}');
		$output = '
		<#
			var addonId = "sppb-addon-" + data.id;
			var number_position = (!_.isEmpty(data.number_position) && data.number_position) ? "animated-number-position-"+data.number_position : "";
		#>
		<style type="text/css">
			<# if(data.number_before_after_text_position == "right") { #>
				#{{ addonId }} .sppb-animated-number::after{
					content:"{{data.number_before_after_text}}";
				}
			<# } else { #>
				#{{ addonId }} .sppb-animated-number::before{
					content:"{{data.number_before_after_text}}";
				}
			<# } #>
			';

		// global
		$output .= $lodash->alignment('text-align', '.sppb-addon-animated-number', 'data.alignment');

		// number
		$numberTypographyFallbacks = [
			'font'           => 'data.number_font_family',
			'size'           => 'data.font_size',
			'line_height'    => 'data.line_height',
			'weight'         => 'data.number_font_wight'
		];

		$output .= $lodash->color('color', '.sppb-animated-number', 'data.color');
		$output .= $lodash->typography('.sppb-animated-number', 'data.number_typography', $numberTypographyFallbacks);

		// Title
		$titleTypographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_font_size',
			'line_height'    => 'data.title_line_height',
			'uppercase'      => 'data.title_fontstyle?.uppercase',
			'italic'         => 'data.title_fontstyle?.italic',
			'underline'      => 'data.title_fontstyle?.underline',
			'weight'         => 'data.title_fontstyle?.weight'
		];

		$output .= $lodash->spacing('margin', '.sppb-animated-number-title', 'data.title_margin');
		$output .= $lodash->color('color', '.sppb-animated-number-title', 'data.title_color');
		$output .= $lodash->typography('.sppb-animated-number-title', 'data.title_typography', $titleTypographyFallbacks);
		$output .= '
		</style>
		<div class="sppb-addon sppb-addon-animated-number {{ data.class }} {{number_position}}">
			<div class="sppb-addon-content">
				<div class="sppb-animated-number sp-inline-editable-element" data-id={{data.id}} data-fieldName="number" contenteditable="true" data-format="{{data.use_number_format}}"  data-digit="{{ data.number }}" data-duration="{{ data.duration }}">0</div>
				<# if(data.counter_title){ #>
					<div class="sppb-animated-number-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="counter_title" contenteditable="true"> {{{data.counter_title}}} </div>
				<# } #>
			</div>
		</div>';

		return $output;
	}
}
