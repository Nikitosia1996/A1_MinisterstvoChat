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
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

class SppagebuilderAddonCountdown extends SppagebuilderAddons
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
		// Options
		$class 	 			= (isset($this->addon->settings->class) && $this->addon->settings->class) ? ' ' . $this->addon->settings->class : '';
		$title 				= (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$heading_selector 	= (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';

		$output  = '';
		$output .= '<div class="sppb-addon sppb-addon-countdown ' . $class . '">';
		$output .= '<div class="countdown-text-wrap">';
		$output .= ($title) ? '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>' : '';
		$output .= '</div>';
		$output .= "<div class='sppb-countdown-timer sppb-row'></div>";
		$output .= '</div>';

		return $output;
	}

	/**
	 * Attach the required scripts.
	 *
	 * @return 	array
	 * @since 	1.0.0
	 */
	public function scripts()
	{
		return [Uri::root(true) . '/components/com_sppagebuilder/assets/js/jquery.countdown.min.js'];
	}

	/**
	 * Write inline JavaScript.
	 *
	 * @return 	string
	 * @since 	1.0.0
	 */
	public function js()
	{
		$date 		  			= HTMLHelper::_('date', $this->addon->settings->date, 'Y/m/d');
		$time 		  			= $this->addon->settings->time;
		$finish_text 			= addslashes($this->addon->settings->finish_text);

		$js = "jQuery(function($){
			var addon_id = '#sppb-addon-'+'" . $this->addon->id . "';
			$( addon_id +' .sppb-addon-countdown .sppb-countdown-timer').each(function () {
					var cdDateFormate = '" . $date . "' + ' ' + '" . $time . "';
					$(this).countdown(cdDateFormate, function (event) {
							$(this).html(event.strftime('<div class=\"sppb-countdown-days sppb-col-xs-6 sppb-col-sm-3 sppb-text-center\"><span class=\"sppb-countdown-number\">%-D</span><span class=\"sppb-countdown-text\">%!D: ' + '" . Text::_('COM_SPPAGEBUILDER_DAY') . "' + ',' + '" . Text::_('COM_SPPAGEBUILDER_DAYS') . "' + ';</span></div><div class=\"sppb-countdown-hours sppb-col-xs-6 sppb-col-sm-3 sppb-text-center\"><span class=\"sppb-countdown-number\">%H</span><span class=\"sppb-countdown-text\">%!H: ' + '" . Text::_('COM_SPPAGEBUILDER_HOUR') . "' + ',' + '" . Text::_('COM_SPPAGEBUILDER_HOURS') . "' + ';</span></div><div class=\"sppb-countdown-minutes sppb-col-xs-6 sppb-col-sm-3 sppb-text-center\"><span class=\"sppb-countdown-number\">%M</span><span class=\"sppb-countdown-text\">%!M:' + '" . Text::_('COM_SPPAGEBUILDER_MINUTE') . "' + ',' + '" . Text::_('COM_SPPAGEBUILDER_MINUTES') . "' + ';</span></div><div class=\"sppb-countdown-seconds sppb-col-xs-6 sppb-col-sm-3 sppb-text-center\"><span class=\"sppb-countdown-number\">%S</span><span class=\"sppb-countdown-text\">%!S:' + '" . Text::_('COM_SPPAGEBUILDER_SECOND') . "' + ',' + '" . Text::_('COM_SPPAGEBUILDER_SECONDS') . "' + ';</span></div>'))
							.on('finish.countdown', function () {
									$(this).html('<div class=\"sppb-countdown-finishedtext-wrap sppb-col-xs-12 sppb-col-sm-12 sppb-text-center\"><h3 class=\"sppb-countdown-finishedtext\">' + '" . $finish_text . "' + '</h3></div>');
							});
					});
			});
		})";
		return $js;
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

		// Counter
		$use_border = (isset($settings->counter_user_border) && $settings->counter_user_border) ? 1 : 0;

		$counterStyle = '';

		if ($use_border)
		{
			$counterStyle = $cssHelper->generateStyle('.sppb-countdown-number, .sppb-countdown-finishedtext', $settings, ['counter_border_width' => 'border-width', 'counter_border_style' => 'border-style', 'counter_border_color' => 'border-color'], ['counter_border_style' => false, 'counter_border_color' => false]);
		}

		$css = '';

		$countdownNumberTypographyFallbacks = [
			'font'   => 'counter_text_font_family',
			'size'   => 'counter_font_size',
			'weight' => 'counter_text_font_weight',
		];
		$countdownNumberTypography = $cssHelper->typography('.sppb-countdown-number', $settings, 'counter_text_typography', $countdownNumberTypographyFallbacks);

		$countdownNumberProps = [
			'counter_border_radius'    => 'border-radius',
			'counter_height'           => 'height',
			'counter_height'           => 'line-height',
			'counter_width'            => 'width',
			'counter_text_color'       => 'color',
			'counter_background_color' => 'background-color',
			'label_margin'             => 'margin'
		];

		$countdownNumberUnit = [
			'counter_background_color' => false,
			'counter_text_color'       => false,
			'label_margin_original'    => false
		];

		$countdownNumber = $cssHelper->generateStyle('.sppb-countdown-number, .sppb-countdown-finishedtext', $settings, $countdownNumberProps, $countdownNumberUnit, ['label_margin' => 'spacing'], null);
		$countdownText = $cssHelper->generateStyle('.sppb-countdown-text', $settings, ['label_color' => 'color', 'label_margin' => 'margin'], ['label_color' => false, 'label_margin' => false], ['label_margin' => 'spacing']);

		// Label typography fallback
		$countdownTextTypographyFallbacks = [
			'font'           => 'label_font_family',
			'size'           => 'label_font_size',
			'uppercase'      => 'label_font_style?.uppercase',
			'italic'         => 'label_font_style?.italic',
			'underline'      => 'label_font_style?.underline',
			'weight'         => 'label_font_style?.weight'
		];

		$countdownTextTypography = $cssHelper->typography('.sppb-countdown-text', $settings, 'label_typography', $countdownTextTypographyFallbacks);

		$titleTextTypographyFallbacks = [
			'font'           => 'label_font_family',
			'size'           => 'label_font_size',
			'uppercase'      => 'label_font_style?.uppercase',
			'italic'         => 'label_font_style?.italic',
			'underline'      => 'label_font_style?.underline',
			'weight'         => 'label_font_style?.weight'
		];

		$titleTextTypography = $cssHelper->typography('.sppb-addon-title', $settings, 'title_typography', $titleTextTypographyFallbacks);

		$css .= $countdownNumber;
		$css .= $countdownText;
		$css .= $countdownTextTypography;
		$css .= $countdownNumberTypography;
		$css .= $titleTextTypography;
		$css .= $counterStyle;

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
		$output  = '<style type="text/css">';

		// Title typography fallbacks.
		$titleTypographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight'
		];
		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);

		// Counter typography fallback
		$counterTypographyFallbacks = [
			'font'           => 'data.counter_text_font_family',
			'size'           => 'data.counter_font_size',
			'weight'         => 'data.counter_text_font_weight'
		];
		$output .= $lodash->typography('.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_text_typography', $counterTypographyFallbacks);
		$output .= $lodash->unit('height', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_height', 'px');
		$output .= $lodash->unit('line-height', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_height', 'px');
		$output .= $lodash->unit('width', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_width', 'px');
		$output .= $lodash->unit('border-radius', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_border_radius', 'px');
		$output .= $lodash->color('color', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_text_color');
		$output .= $lodash->color('background-color', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_background_color');
		$output .= '<# if(data.counter_user_border) { #>';
		$output .= $lodash->unit('border-width', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_border_width', 'px');
		$output .= $lodash->unit('border-style', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_border_style', '', false);
		$output .= $lodash->unit('border-color', '.sppb-countdown-number, .sppb-countdown-finishedtext', 'data.counter_border_color', '', false);
		$output .= '<# } #>';

		// Labels typography fallback
		$labelsTypographyFallbacks = [
			'font'           => 'data.label_font_family',
			'size'           => 'data.label_font_size',
			'uppercase'      => 'data.label_font_style?.uppercase',
			'italic'         => 'data.label_font_style?.italic',
			'underline'      => 'data.label_font_style?.underline',
			'weight'         => 'data.label_font_style?.weight'
		];
		$output .= $lodash->typography('.sppb-countdown-text', 'data.label_typography', $labelsTypographyFallbacks);
		$output .= $lodash->spacing('margin', '.sppb-countdown-text', 'data.label_margin');
		$output .= $lodash->color('color', '.sppb-countdown-text', 'data.label_color');

		$output .=
			'</style>
		<div class="sppb-addon sppb-addon-countdown {{ data.class }}">
			<div class="countdown-text-wrap">
				<# if( !_.isEmpty( data.title ) ){ #><{{ data.heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ data.heading_selector }}><# } #>
			</div>
			<div class="sppb-countdown-timer sppb-row" data-date="{{ data.date }}" data-time="{{ data.time }}" data-finish-text="{{ data.finish_text }}"></div>
		</div>
		';

		return $output;
	}
}
