<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonAnimated_heading extends SppagebuilderAddons
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

		// Heading
		$heading_style = (isset($settings->heading_style) && $settings->heading_style) ? $settings->heading_style : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h2';

		// Highlighted options
		$heading_before_part = (isset($settings->heading_before_part) && $settings->heading_before_part) ? $settings->heading_before_part : '';
		$highlighted_text = (isset($settings->highlighted_text) && $settings->highlighted_text) ? $settings->highlighted_text : '';
		$heading_after_part = (isset($settings->heading_after_part) && $settings->heading_after_part) ? $settings->heading_after_part : '';
		$highlighted_shape = (isset($settings->highlighted_shape) && $settings->highlighted_shape) ? $settings->highlighted_shape : '';

		// Animation options
		$animated_text = (isset($settings->animated_text) && $settings->animated_text) ? $settings->animated_text : '';
		$text_animation_name = (isset($settings->text_animation_name) && $settings->text_animation_name) ? $settings->text_animation_name : '';
		$animated_text_chunk = '';

		if ($animated_text) {
			$animated_text_chunk = explode("\n", $animated_text);
		}

		$animated_text_class = '';

		if ($animated_text && $text_animation_name) {
			$animated_text_class = 'animated-heading-text ';

			switch ($text_animation_name) {
				case 'blinds':
					$animated_text_class .= 'letters animation-blinds';
					break;
				case 'delete-typing':
					$animated_text_class .= 'letters type';
					break;
				case 'flip':
					$animated_text_class .= 'text-animation-flip';
					break;
				case 'fade-in':
					$animated_text_class .= 'zoom';
					break;
				case 'loading-bar':
					$animated_text_class .= 'loading-bar';
					break;
				case 'scale':
					$animated_text_class .= 'letters scale';
					break;
				case 'slide':
					$animated_text_class .= 'letters scale';
					break;
				case 'push':
					$animated_text_class .= 'push';
					break;
				case 'wave':
					$animated_text_class .= 'letters animation-wave';
					break;
				default:
					$animated_text_class .= 'text-clip is-full-width';
					break;
			}
		}

		//Output start
		$output = '';

		$output .= '<div class="sppb-addon sppb-addon-animated-heading' . $class . '">';
		$output .= '<' . $heading_selector . ' class="sppb-addon-title ' . ($heading_style !== 'highlighted' ? $animated_text_class : '') . '">';
		$output .= ($heading_before_part) ? '<span class="animated-heading-before-part">' . $heading_before_part . '</span>' : '';

		if ($heading_style === 'highlighted') {
			if ($highlighted_text) {
				$output .= '<span class="animated-heading-highlighted-wrap">';
				$output .= '<span class="animated-heading-highlighted-text ' . ($highlighted_shape ? 'shape-' . $highlighted_shape : '') . '">';
				$output .= $highlighted_text;
				$output .= '</span>';

				if ($highlighted_shape === 'cross') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M497.4,23.9C301.6,40,155.9,80.6,4,144.4"></path>
						<path d="M14.1,27.6c204.5,20.3,393.8,74,467.3,111.7"></path>
					</svg>';
				} elseif ($highlighted_shape === 'bg-fill') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
					<path fill="none" stroke="#020202" stroke-width="150" stroke-miterlimit="10" d="M0 75h500"/>
					</svg>';
				} elseif ($highlighted_shape === 'square') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
					<path d="M44.22 0c2.46 51.77-2.05 99.72-13.51 143.84 50.37-7.64 316.96-30.55 469.29-5.09-16.41-40.58-21.99-71.11-23.34-127.29C378.38 22.92 97.06 34.37 0 22.92"/>
					</svg>';
				} elseif ($highlighted_shape === 'sharpe-zigzag') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
					<path d="M.23 139.83l28.27-19.78 25.43 19.79 28.27-19.77 22.6 19.79 29.68-19.78 25.44 19.79 25.44-19.78 28.27 19.79 26.85-19.77 26.84 19.8 24.04-19.79 24.01 19.8 22.62-19.78 22.61 19.8 22.61-19.78 24.02 19.79 24.03-19.78 24.02 19.8 22.62-19.79 21.19 19.79"/>
					</svg>';
				} elseif ($highlighted_shape === 'diagonal') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M13.5,15.5c131,13.7,289.3,55.5,475,125.5"></path>
					</svg>';
				} elseif ($highlighted_shape === 'top-botm-line') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M8.4,143.1c14.2-8,97.6-8.8,200.6-9.2c122.3-0.4,287.5,7.2,287.5,7.2"></path>
						<path d="M8,19.4c72.3-5.3,162-7.8,216-7.8c54,0,136.2,0,267,7.8"></path>
					</svg>';
				} elseif ($highlighted_shape === 'strikethrough') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M3,75h493.5"></path>
					</svg>';
				} elseif ($highlighted_shape === 'underline') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path>
					</svg>';
				} elseif ($highlighted_shape === 'dubl-underline') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M5,125.4c30.5-3.8,137.9-7.6,177.3-7.6c117.2,0,252.2,4.7,312.7,7.6"></path>
						<path d="M26.9,143.8c55.1-6.1,126-6.3,162.2-6.1c46.5,0.2,203.9,3.2,268.9,6.4"></path>
					</svg>';
				} elseif ($highlighted_shape === 'zigzag-underline') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
					</svg>';
				} elseif ($highlighted_shape == 'wave') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M3,146.1c17.1-8.8,33.5-17.8,51.4-17.8c15.6,0,17.1,18.1,30.2,18.1c22.9,0,36-18.6,53.9-18.6 c17.1,0,21.3,18.5,37.5,18.5c21.3,0,31.8-18.6,49-18.6c22.1,0,18.8,18.8,36.8,18.8c18.8,0,37.5-18.6,49-18.6c20.4,0,17.1,19,36.8,19 c22.9,0,36.8-20.6,54.7-18.6c17.7,1.4,7.1,19.5,33.5,18.8c17.1,0,47.2-6.5,61.1-15.6"></path>
					</svg>';
				} else {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
						<path d="M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7">
						</path>
					</svg>';
				}

				$output .= '</span>';
			}
		} else {
			$output .= '<span class="animated-text-words-wrapper">';

			if (is_array($animated_text_chunk)) {
				foreach ($animated_text_chunk as $key => $item) {
					$output .= '<span class="animated-text ' . ($key == 0 ? 'is-visible' : '') . '">' . $item . '</span>';
				}
			}

			$output .= '</span>';
		}

		$output .= ($heading_after_part) ? '<span class="animated-heading-after-part">' . $heading_after_part . '</span>' : '';
		$output .= '</' . $heading_selector . '>';
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

		// Css Output Start
		$css = '';

		$headingProps = [
			'heading_margin' => 'margin',
			'heading_padding' => 'padding',
			'heading_color' => 'color',
		];

		$headingUnit = [
			'heading_margin' => false,
			'heading_padding' => false,
			'heading_color' => false,
		];

		$modifier = [
			'heading_margin' => 'spacing',
			'heading_padding' => 'spacing',
		];

		$heading = $cssHelper->generateStyle('.sppb-addon-title', $settings, $headingProps, $headingUnit, $modifier);

		$headingTypography = $cssHelper->typography('.sppb-addon-title', $settings, 'heading_typography', [
			'font'           => 'heading_font_family',
			'size'           => 'heading_fontsize',
			'line_height'    => 'heading_lineheight',
			'letter_spacing' => 'heading_letterspace',
			'uppercase'      => 'heading_font_style.uppercase',
			'italic'         => 'heading_font_style.italic',
			'underline'      => 'heading_font_style.underline',
			'weight'         => 'heading_font_style.weight'
		]);

		$animatedTextProps = [
			'animated_text_color' => 'color'
		];

		$animatedTextUnit = [
			'animated_text_color' => false
		];

		$animatedText = $cssHelper->generateStyle('.animated-text-words-wrapper', $settings, $animatedTextProps, $animatedTextUnit);
		$animatedTextTypography = $cssHelper->typography('.animated-text-words-wrapper', $settings, 'animated_text_typography', [
			'font'           => 'animated_text_font_family',
			'size'           => 'animated_text_fontsize',
			'letter_spacing' => 'animated_text_letterspace',
			'uppercase'      => 'animated_text_font_style.uppercase',
			'italic'         => 'animated_text_font_style.italic',
			'underline'      => 'animated_text_font_style.underline',
			'weight'         => 'animated_text_font_style.weight',
		]);

		$highlightedText = $cssHelper->generateStyle('.animated-heading-highlighted-text', $settings, $animatedTextProps, $animatedTextUnit);
		$highlightedTextTypography = $cssHelper->typography('.animated-heading-highlighted-text', $settings, 'highlighted_typography', [
			'font'           => 'highlighted_font_family',
			'size'           => 'highlighted_fontsize',
			'letter_spacing' => 'highlighted_letterspace',
			'uppercase'      => 'highlighted_font_style.uppercase',
			'italic'         => 'highlighted_font_style.italic',
			'underline'      => 'highlighted_font_style.underline',
			'weight'         => 'highlighted_font_style.weight',
		]);

		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');

		$alignment = $cssHelper->generateStyle('.sppb-addon.sppb-addon-animated-heading .sppb-addon-title', $settings, ['alignment' => 'justify-content'], false);

		$css .= $alignment;

		$css .= $heading;
		$css .= $headingTypography;
		$css .= $animatedText;
		$css .= $animatedTextTypography;
		$css .= $highlightedText;
		$css .= $highlightedTextTypography;

		//Shape style
		$highlighted_shape = (isset($settings->highlighted_shape) && $settings->highlighted_shape) ? $settings->highlighted_shape : '';

		if ($highlighted_shape) {
			$css .= $addon_id . ' .animated-heading-highlighted-wrap svg path {';

			if (isset($settings->shape_width) && $settings->shape_width) {
				$css .= 'stroke-width: ' . $settings->shape_width . 'px;';
			}

			if (isset($settings->shape_radius) && $settings->shape_radius) {
				$css .= 'stroke-linecap: round;';
				$css .= 'stroke-linejoin: round;';
			}

			if (isset($settings->shape_color) && $settings->shape_color) {
				$css .= 'stroke: ' . $settings->shape_color . ';';
			}

			$css .= '}';
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
        <style type="text/css">
            <# if(data.highlighted_shape) { #>
                #sppb-addon-{{ data.id }} .animated-heading-highlighted-wrap svg path {
                    <# if(!_.isEmpty(data.shape_width) && data.shape_width) { #>
                        stroke-width: {{data.shape_width}}px;
                    <# }
                    if(data.shape_radius) {
                    #>
                        stroke-linecap: round;
                        stroke-linejoin: round;
                    <# }
                    if(!_.isEmpty(data.shape_color) && data.shape_color) {
                    #>
                        stroke: {{data.shape_color}};
                    <# } #>
                }
            <# } #>';

		// Global
		$output .= $lodash->alignment('text-align', '.sppb-addon-animated-heading', 'data.alignment');
		$output .= $lodash->flexAlignment('.animated-heading-text', 'data.alignment');
		// Heading
		$headingTypographyFallbacks = [
			'font'           => 'data.heading_font_family',
			'size'           => 'data.heading_fontsize',
			'line_height'    => 'data.heading_lineheight',
			'letter_spacing' => 'data.heading_letterspace',
			'uppercase'      => 'data.heading_font_style?.uppercase',
			'italic'         => 'data.heading_font_style?.italic',
			'underline'      => 'data.heading_font_style?.underline',
			'weight'         => 'data.heading_font_style?.weight'
		];
		$output .= $lodash->spacing('padding', '.sppb-addon-title', 'data.heading_padding');
		$output .= $lodash->spacing('margin', '.sppb-addon-title', 'data.heading_margin');
		$output .= $lodash->color('color', '.sppb-addon-title', 'data.heading_color');
		$output .= $lodash->typography('.sppb-addon-title', 'data.heading_typography', $headingTypographyFallbacks);

		// Animated text
		$animatedTextTypographyFallbacks = [
			'font'           => 'data.animated_text_font_family',
			'size'           => 'data.animated_text_fontsize',
			'letter_spacing' => 'data.animated_text_letterspace',
			'uppercase'      => 'data.animated_text_font_style?.uppercase',
			'italic'         => 'data.animated_text_font_style?.italic',
			'underline'      => 'data.animated_text_font_style?.underline',
			'weight'         => 'data.animated_text_font_style?.weight'
		];
		$output .= $lodash->color('color', '.animated-text-words-wrapper', 'data.animated_text_color');
		$output .= $lodash->typography('.animated-text-words-wrapper', 'data.animated_text_typography', $animatedTextTypographyFallbacks);

		// Highlighted
		$highlightedTypographyFallbacks = [
			'font'           => 'data.highlighted_text_font_family'
		];
		$output .= $lodash->color('color', '.animated-heading-highlighted-text', 'data.animated_text_color');
		$output .= $lodash->typography('.animated-heading-highlighted-text', 'data.highlighted_typography', $highlightedTypographyFallbacks);

		$output .= '
        </style>
        <# 
        let animated_text = (!_.isEmpty(data.animated_text) && data.animated_text) ? data.animated_text : "";

        let animated_text_chunk = "";
        if(animated_text){
            animated_text_chunk = _.split(animated_text, "\n");
        }

        let animated_text_class = "";
        if(animated_text && data.text_animation_name) {
            animated_text_class = "animated-heading-text ";
            if(data.text_animation_name == "blinds") {
                animated_text_class += "letters animation-blinds";
            } else if(data.text_animation_name == "delete-typing") {
                animated_text_class += "letters type";
            } else if(data.text_animation_name == "flip") {
                animated_text_class += "text-animation-flip";
            } else if(data.text_animation_name == "fade-in") {
                animated_text_class += "zoom";
            } else if(data.text_animation_name == "loading-bar") {
                animated_text_class += "loading-bar";
            } else if(data.text_animation_name == "scale") {
                animated_text_class += "letters scale";
            } else if(data.text_animation_name == "slide") {
                animated_text_class += "letters scale";
            } else if(data.text_animation_name == "push") {
                animated_text_class += "push";
            } else if(data.text_animation_name == "wave") {
                animated_text_class += "letters animation-wave";
            } else {
                animated_text_class += "text-clip is-full-width";
            }
        }
        #>

        <div class="sppb-addon sppb-addon-animated-heading {{data.class}}">
        <{{data.heading_selector}} class="sppb-addon-title {{animated_text_class}}">
        <# if(data.heading_before_part) { #>
            <span class="animated-heading-before-part sp-inline-editable-element" data-id={{data.id}} data-fieldName="heading_before_part" contenteditable="true">{{{data.heading_before_part}}}</span>
        <# }
        if(data.heading_style == "highlighted") {
            if(data.highlighted_text) {
            #>
                <span class="animated-heading-highlighted-wrap">
                    <span class="animated-heading-highlighted-text sp-inline-editable-element shape-{{data.highlighted_shape}}" data-id={{data.id}} data-fieldName="highlighted_text" contenteditable="true">
                        {{data.highlighted_text}}
                    </span>
                    <# if(data.highlighted_shape == "cross") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M497.4,23.9C301.6,40,155.9,80.6,4,144.4"></path>
                            <path d="M14.1,27.6c204.5,20.3,393.8,74,467.3,111.7"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "diagonal") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M13.5,15.5c131,13.7,289.3,55.5,475,125.5"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "strikethrough") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M3,75h493.5"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "top-botm-line") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M8.4,143.1c14.2-8,97.6-8.8,200.6-9.2c122.3-0.4,287.5,7.2,287.5,7.2"></path>
                            <path d="M8,19.4c72.3-5.3,162-7.8,216-7.8c54,0,136.2,0,267,7.8"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "underline") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "dubl-underline") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M5,125.4c30.5-3.8,137.9-7.6,177.3-7.6c117.2,0,252.2,4.7,312.7,7.6"></path>
                            <path d="M26.9,143.8c55.1-6.1,126-6.3,162.2-6.1c46.5,0.2,203.9,3.2,268.9,6.4"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "zigzag-underline") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "wave") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M3,146.1c17.1-8.8,33.5-17.8,51.4-17.8c15.6,0,17.1,18.1,30.2,18.1c22.9,0,36-18.6,53.9-18.6 c17.1,0,21.3,18.5,37.5,18.5c21.3,0,31.8-18.6,49-18.6c22.1,0,18.8,18.8,36.8,18.8c18.8,0,37.5-18.6,49-18.6c20.4,0,17.1,19,36.8,19 c22.9,0,36.8-20.6,54.7-18.6c17.7,1.4,7.1,19.5,33.5,18.8c17.1,0,47.2-6.5,61.1-15.6"></path>
                        </svg>
                    <# } else if (data.highlighted_shape == "bg-fill") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path fill="none" stroke="#020202" stroke-width="150" stroke-miterlimit="10" d="M0 75h500"/>
                        </svg>
                    <# } else if (data.highlighted_shape == "square") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M44.22 0c2.46 51.77-2.05 99.72-13.51 143.84 50.37-7.64 316.96-30.55 469.29-5.09-16.41-40.58-21.99-71.11-23.34-127.29C378.38 22.92 97.06 34.37 0 22.92"/>
                      </svg>
                    <# } else if (data.highlighted_shape == "sharpe-zigzag") { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M.23 139.83l28.27-19.78 25.43 19.79 28.27-19.77 22.6 19.79 29.68-19.78 25.44 19.79 25.44-19.78 28.27 19.79 26.85-19.77 26.84 19.8 24.04-19.79 24.01 19.8 22.62-19.78 22.61 19.8 22.61-19.78 24.02 19.79 24.03-19.78 24.02 19.8 22.62-19.79 21.19 19.79"/>
                      </svg>
                    <# } else { #>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7">
                            </path>
                        </svg>
                    <# } #>
                </span>
            <# }
        } else {
            #>
            <span class="animated-text-words-wrapper">
            <# if(_.isArray(animated_text_chunk)) {
                _.each(animated_text_chunk, function(item, key) { 
                    let visibleClass = "";
                    if(key==0) {
                        visibleClass = "is-visible";
                    }
            #>
                    <span class="animated-text {{visibleClass}}">{{item}}</span>
                <# })
            } #>
            </span>
        <# }
        if(data.heading_after_part) {
        #>
            <span class="animated-heading-after-part sp-inline-editable-element" data-id={{data.id}} data-fieldName="heading_after_part" contenteditable="true">{{{data.heading_after_part}}}</span>
        <# } #>
        </{{data.heading_selector}}>
        </div>
        ';

		return $output;
	}
}
