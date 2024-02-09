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

class SppagebuilderAddonBefore_after extends SppagebuilderAddons
{
    /**
     * The addon frontend render method.
     * The returned HTML string will render to the frontend page.
     *
     * @return  string  The HTML string.
     * @since   5.0.0
     */
    public function render()
    {
        $settings = $this->addon->settings;

        $class = (isset($settings->class) && $settings->class) ? $settings->class : '';
        $title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$title_position = (isset($settings->title_position) && $settings->title_position) ? $settings->title_position : 'top';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

        // before image options
        $before_image = (isset($settings->before_image) && $settings->before_image) ? $settings->before_image : '';

        $before_image_src = isset($before_image->src) ? $before_image->src : $before_image;

        // before_image 2x
        $before_image_2x = (isset($settings->before_image_2x) && $settings->before_image_2x) ? $settings->before_image_2x : '';
        $before_image_2x_src = isset($before_image_2x->src) ? $before_image_2x->src : $before_image_2x;
        $before_image_2x_src = ctype_space($before_image_2x_src) ? "" : $before_image_2x_src;
        $before_image_2x_srcset = empty($before_image_2x_src) ? "" : 'srcset="' . $before_image_2x_src . ' 2x"';

        $before_image_alt_text = (isset($settings->before_image_alt_text) && $settings->before_image_alt_text) ? $settings->before_image_alt_text : '';

        // Lazy image loading
        $before_image_placeholder = $before_image_src === '' ? false : $this->get_image_placeholder($before_image_src);

        $before_image_dimension = '';

        if ($before_image_placeholder) {
            $before_image_dimension = $this->get_image_dimension($before_image_src);
            $before_image_dimension = !empty($before_image_dimension) ? \implode(' ', $before_image_dimension) : '';
        }

        if (strpos($before_image_src, "http://") !== false || strpos($before_image_src, "https://") !== false) {
            $before_image_src = $before_image_src;
        } else {
            $original_src = Uri::base(true) . '/' . $before_image_src;
            $before_image_src = SppagebuilderHelperSite::cleanPath($original_src);
        }

        // after image options
        $after_image = (isset($settings->after_image) && $settings->after_image) ? $settings->after_image : '';

        $after_image_src = isset($after_image->src) ? $after_image->src : $after_image;

        // after_image 2x
        $after_image_2x = (isset($settings->after_image_2x) && $settings->after_image_2x) ? $settings->after_image_2x : '';
        $after_image_2x_src = isset($after_image_2x->src) ? $after_image_2x->src : $after_image_2x;
        $after_image_2x_src = ctype_space($after_image_2x_src) ? "" : $after_image_2x_src;
        $after_image_2x_srcset = empty($after_image_2x_src) ? "" : 'srcset="' . $after_image_2x_src . ' 2x"';

        $after_image_alt_text = (isset($settings->after_image_alt_text) && $settings->after_image_alt_text) ? $settings->after_image_alt_text : '';

        // Lazy image loading
        $after_image_placeholder = $after_image_src === '' ? false : $this->get_image_placeholder($after_image_src);

        $after_image_dimension = '';

        if ($after_image_placeholder) {
            $after_image_dimension = $this->get_image_dimension($after_image_src);
            $after_image_dimension = !empty($after_image_dimension) ? \implode(' ', $after_image_dimension) : '';
        }

        if (strpos($after_image_src, "http://") !== false || strpos($after_image_src, "https://") !== false) {
            $after_image_src = $after_image_src;
        } else {
            $original_src = Uri::base(true) . '/' . $after_image_src;
            $after_image_src = SppagebuilderHelperSite::cleanPath($original_src);
        }

        // Options
        $orientation = (isset($settings->orientation) && $settings->orientation) ? $settings->orientation : 'horizontal';
        $title_before = (isset($settings->title_before) && $settings->title_before) ? $settings->title_before : '';
        $title_after = (isset($settings->title_after) && $settings->title_after) ? $settings->title_after : '';
        $text_horizontal_position = (isset($settings->text_horizontal_position) && $settings->text_horizontal_position) ? $settings->text_horizontal_position : 'center';
        $text_vertical_position = (isset($settings->text_vertical_position) && $settings->text_vertical_position) ? $settings->text_vertical_position : 'center';
        $icon = (isset($settings->icon) && $settings->icon) ? $settings->icon : 'default';

        $text_position = $orientation === 'horizontal' ? $text_horizontal_position : $text_vertical_position;

        $separator_orientation_class = $orientation === 'horizontal' ? 'sppb-separator-horizontal' : 'sppb-separator-vertical';
        $image_orientation_class = $orientation === 'horizontal' ? 'sppb-before-after-image-horizontal' : 'sppb-before-after-image-vertical';

        $arrow_chevron = '<svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <path d="M743.3 512L598.5 656.8l-36.2-36.2L670.9 512 562.3 403.4l36.2-36.2L743.3 512zM425.5 656.8l36.2-36.2L353.1 512l108.6-108.6-36.2-36.2L280.7 512l144.8 144.8z"/>
                </svg>';

        $arrow_default = '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12H21M3 12L7 8M3 12L7 16M21 12L17 16M21 12L17 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>';

        $icon_content = $icon === 'default' ? $arrow_default : $arrow_chevron;


        $output = '';
        $output .= '<div class="sppb-addon ' . $class . '">';
        $output .= ($title && $title_position != 'bottom') ? '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>' : '';
        $output .= '<div class="sppb-before-after-wrapper">
                        <div class="sppb-before-after-image sppb-image-before ' . $image_orientation_class . '">
                            <img class="' . ($before_image_placeholder ? ' sppb-element-lazy" data-large="' . $before_image_src  . '" loading="lazy" ' . $before_image_dimension . ' ' : '') . '" src="' . ($before_image_placeholder ? $before_image_placeholder : $before_image_src) . '" draggable="false" ' . $before_image_2x_srcset . ' alt=' . $before_image_alt_text . ' />   
                        </div>
                        <div class="sppb-before-after-image sppb-image-after ' . $image_orientation_class . '">
                        <img class="' . ($after_image_placeholder ? ' sppb-element-lazy" data-large="' . $after_image_src  . '" loading="lazy" ' . $after_image_dimension . ' ' : '') . '" src="' . ($after_image_placeholder ? $after_image_placeholder : $after_image_src) . '" draggable="false" ' . $after_image_2x_srcset . ' alt=' . $after_image_alt_text . ' />   
                        </div>
            
                        <div class="sppb-before-after-separator ' . $separator_orientation_class . '">' . $icon_content . '</div>
                    ';

        if (!empty($title_before)) {
            $output .= '<div class="sppb-before-title ' . $orientation . ' ' . $text_position .  '">' . $title_before . '</div>';
        }

        if (!empty($title_after)) {
            $output .= '<div class="sppb-after-title ' . $orientation . ' ' . $text_position . '">' . $title_after . '</div>';
        }

        $output .= '</div>';
        $output .= ($title && $title_position === 'bottom') ? '<' . $heading_selector . ' class="sppb-addon-title" style="display: block;">' . $title . '</' . $heading_selector . '>' : '';
        $output .= '</div>';

        return $output;
    }

    /**
     * Generate the CSS string for the frontend page.
     *
     * @return 	string 	The CSS string for the page.
     * @since 	5.0.0
     */
    public function css()
    {
        $settings = $this->addon->settings;
        $addon_id = '#sppb-addon-' . $this->addon->id;
        $cssHelper = new CSSHelper($addon_id);

        $border_radius = (isset($settings->border_radius) && $settings->border_radius) ? $settings->border_radius : 0;

        if ($border_radius) {
            $border_radius = explode(" ", $settings->border_radius);
        }

        $css = '';

        if (is_array($border_radius) && (count($border_radius) > 2)) {
            $css .= $cssHelper->generateStyle(
                '.sppb-before-after-wrapper',
                $settings,
                [
                    'border_radius' => 'border-radius',
                ],
                [
                    'border_radius' => false
                ],
                [
                    'border_radius' => 'spacing'
                ]
            );
        } else {
            $css .= $cssHelper->generateStyle(
                '.sppb-before-after-wrapper',
                $settings,
                [
                    'border_radius' => 'border-radius',
                ]
            );
        }

        $css .= $cssHelper->generateStyle(
            '.sppb-before-after-wrapper, img',
            $settings,
            [
                'container_width' => ['width', 'max-width'],
                'container_height' => 'height'
            ]
        );

        $css .= $cssHelper->typography('.sppb-before-title, .sppb-after-title', $settings, 'typography');

        $settings->text_shadow = $cssHelper->parseBoxShadow($settings, 'text_shadow', true);

        $textProps = [
            'text_margin'         => 'margin',
            'text_padding'        => 'padding',
            'text_color'           => 'color',
            'text_bg_color'           => 'background-color',
            'text_shadow'      => 'text-shadow'
        ];

        $units = ['text_margin' => false, 'text_padding' => false, 'text_color' => false, 'text_bg_color' => false, 'text_shadow' => false];
        $modifiers = ['text_margin' => 'spacing', 'text_padding' => 'spacing'];

        $css .= $cssHelper->generateStyle('.sppb-before-title, .sppb-after-title', $settings, $textProps, $units, $modifiers);
        $css .= $cssHelper->generateStyle('.sppb-before-after-separator > svg', $settings, ['separator_color' => 'color'], false);
        $css .= $cssHelper->generateStyle('.sppb-before-after-separator > svg', $settings, ['icon_size' => ['height', 'width']]);
        $css .= $cssHelper->generateStyle('.sppb-image-before.sppb-before-after-image-horizontal', $settings, ['separator_color' => 'border-right-color'], false);
        $css .= $cssHelper->generateStyle('.sppb-image-before.sppb-before-after-image-vertical', $settings, ['separator_color' => 'border-bottom-color'], false);

        return $css;
    }

    /**
     * Load external scripts.
     *
     * @return 	array
     * @since 	5.0.0
     */
    public function scripts()
    {
        return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/addons/before_after.js');
    }


    /**
     * Generate the lodash template string for the frontend editor.
     *
     * @return 	string 	The lodash template string.
     * @since 	5.0.0
     */
    public static function getTemplate()
    {
        $lodash = new Lodash('#sppb-addon-{{ data.id }}');
        $output = '<style type="text/css">';

        $output .= $lodash->unit(
            'width',
            '.sppb-before-after-wrapper, img',
            'data.container_width',
            'px'
        );

        $output .= $lodash->unit(
            'max-width',
            '.sppb-before-after-wrapper, img',
            'data.container_width',
            'px'
        );

        $output .= $lodash->unit(
            'height',
            '.sppb-before-after-wrapper, img',
            'data.container_height',
            'px'
        );

        $output .= $lodash->typography('.sppb-before-title, .sppb-after-title', 'data.typography');

        $output .= $lodash->spacing('padding', '.sppb-before-title, .sppb-after-title', 'data.text_padding');
        $output .= $lodash->spacing('margin', '.sppb-before-title, .sppb-after-title', 'data.text_margin');

        $output .= $lodash->textShadow('.sppb-before-title, .sppb-after-title', 'data.text_shadow');

        $output .= $lodash->color('background-color', '.sppb-before-title, .sppb-after-title', 'data.text_bg_color');
        $output .= $lodash->color('color', '.sppb-before-title, .sppb-after-title', 'data.text_color');

        $output .= $lodash->color('color', '.sppb-before-after-separator > svg', 'data.separator_color');
        $output .= $lodash->unit('height', '.sppb-before-after-separator > svg', 'data.icon_size', 'px');
        $output .= $lodash->unit('width', '.sppb-before-after-separator > svg', 'data.icon_size', 'px');
        $output .= $lodash->border('border-right-color', '.sppb-image-before.sppb-before-after-image-horizontal', 'data.separator_color');
        $output .= $lodash->border('border-bottom-color', '.sppb-image-before.sppb-before-after-image-vertical', 'data.separator_color');

        $output .= '<# if((data.border_radius + "").split(" ").length < 2) { #>';
        $output .= $lodash->unit('border-radius', '.sppb-before-after-wrapper', 'data.border_radius', 'px');
        $output .= '<# } else { #>';
        $output .= '#sppb-addon-{{data.id}} .sppb-before-after-wrapper {
			{{window.getSplitRadius(data.border_radius)}}
		}';
        $output .= '<# } #>';

        // title
		$typographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight'
		];
		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $typographyFallbacks);

        $output .= '</style>';

        $output .= '<# 
        // before image options
        let before_image = (!_.isEmpty(data.before_image) && data.before_image) ? data.before_image : "";

        let before_image_src = "";
        
        if (_.isObject(data.before_image)) {
            before_image_src = before_image.src || "";
        } else {
            before_image_src = before_image;
        }

        let before_image_alt_text = (!_.isEmpty(data.before_image_alt_text) && data.before_image_alt_text) ? data.before_image_alt_text : "";

        if (before_image_src.includes("http://") || before_image_src.includes("https://")) {
            before_image_src = before_image_src;
        } else {
            before_image_src = pagebuilder_base + before_image_src;
        }

        // after image options
        let after_image = (!_.isEmpty(data.after_image) && data.after_image) ? data.after_image : "";

        let after_image_src = "";
        
        if (_.isObject(data.after_image)) {
            after_image_src = after_image.src || "";
        } else {
            after_image_src = after_image;
        }

        let after_image_alt_text = (!_.isEmpty(data.after_image_alt_text) && data.after_image_alt_text) ? data.after_image_alt_text : "";

        if (after_image_src.includes("http://") !== false || after_image_src.includes("https://") !== false) {
            after_image_src = after_image_src;
        } else {
            after_image_src = pagebuilder_base + after_image_src;
        }

        // Options
        let orientation = (!_.isEmpty(data.orientation) && data.orientation) ? data.orientation : "horizontal";
        let title_before = (!_.isEmpty(data.title_before) && data.title_before) ? data.title_before : "";
        let title_after = (!_.isEmpty(data.title_after) && data.title_after) ? data.title_after : "";
        let text_horizontal_position = (!_.isEmpty(data.text_horizontal_position) && data.text_horizontal_position) ? data.text_horizontal_position : "center";
        let text_vertical_position = (!_.isEmpty(data.text_vertical_position) && data.text_vertical_position) ? data.text_vertical_position : "center";
        let icon = (!_.isEmpty(data.icon) && data.icon) ? data.icon : "default";
        let title_position = (!_.isEmpty(data.title_position) && data.title_position) ? data.title_position : "top";
        let heading_selector = (!_.isEmpty(data.heading_selector) && data.heading_selector) ? data.heading_selector : "h3";

        let text_position = orientation === "horizontal" ? text_horizontal_position : text_vertical_position;

        let separator_orientation_class = orientation === "horizontal" ? "sppb-separator-horizontal" : "sppb-separator-vertical";
        let image_orientation_class = orientation === "horizontal" ? "sppb-before-after-image-horizontal" : "sppb-before-after-image-vertical";
        #>';

        $output .= '<div class="sppb-addon {{ data.class }}">
                        <# if( !_.isEmpty( data.title ) && title_position != "bottom" ){ #><{{ heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ heading_selector }}><# } #>
                        <div class="sppb-before-after-wrapper">
                            <div class="sppb-before-after-image sppb-image-before {{image_orientation_class}}">
                                <img src=\'{{before_image_src}}\' draggable="false" alt="{{before_image_alt_text}}" />   
                            </div>
                            <div class="sppb-before-after-image sppb-image-after {{image_orientation_class}}">
                                <img src=\'{{after_image_src}}\' draggable="false" alt="{{after_image_alt_text}}" />
                            </div>
                
                            <div class="sppb-before-after-separator {{separator_orientation_class}}">
                                <# if(icon === "default") { #>
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 12H21M3 12L7 8M3 12L7 16M21 12L17 16M21 12L17 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <# } #>

                                <# if(icon === "chevron") { #>
                                    <svg fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M743.3 512L598.5 656.8l-36.2-36.2L670.9 512 562.3 403.4l36.2-36.2L743.3 512zM425.5 656.8l36.2-36.2L353.1 512l108.6-108.6-36.2-36.2L280.7 512l144.8 144.8z"/>
                                    </svg>
                                <# } #>
                            </div>

                            <# if(!_.isEmpty(title_before)) { #>
                                <div class="sppb-before-title  {{orientation}} {{text_position}}">{{title_before}}</div>
                            <# } #>

                            <# if(!_.isEmpty(title_after)) { #>
                                <div class="sppb-after-title  {{orientation}} {{text_position}}">{{title_after}}</div>
                            <# } #>
                        </div>

                        <# if( !_.isEmpty( data.title ) && title_position == "bottom" ){ #><{{ heading_selector }} class="sppb-addon-title" style="display: block;">{{ data.title }}</{{ heading_selector }}><# } #>
                    </div>';

        return $output;
    }
}
