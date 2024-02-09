<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Uri\Uri;

/**
 * Flip box pro addon class.
 *
 * @since 4.0.0
 */
class SppagebuilderAddonFlip_box_pro extends SppagebuilderAddons
{
    /**
     * The addon frontend render method.
     * The returned HTML string will render to the frontend page.
     *
     * @return  string  The HTML string.
     * @since   4.0.0
     */
    public function render()
    {
        $settings = $this->addon->settings;
        $class = (isset($settings->class) && $settings->class) ? $settings->class : '';

        // front content
        $front_add_icon = (isset($settings->front_add_icon) && $settings->front_add_icon) ? $settings->front_add_icon : 0;
        $front_icon = (isset($settings->front_icon) && $settings->front_icon) ? $settings->front_icon : "";

        $front_add_title = (isset($settings->front_add_title) && $settings->front_add_title) ? $settings->front_add_title : 0;
        $front_title = (isset($settings->front_title) && $settings->front_title) ? $settings->front_title : "";

        $front_add_paragraph = (isset($settings->front_add_paragraph) && $settings->front_add_paragraph) ? $settings->front_add_paragraph : 0;
        $front_paragraph = (isset($settings->front_paragraph) && $settings->front_paragraph) ? $settings->front_paragraph : "";

        // back content
        $back_add_icon = (isset($settings->back_add_icon) && $settings->back_add_icon) ? $settings->back_add_icon : 0;
        $back_icon = (isset($settings->back_icon) && $settings->back_icon) ? $settings->back_icon : "";

        $back_add_title = (isset($settings->back_add_title) && $settings->back_add_title) ? $settings->back_add_title : 0;
        $back_title = (isset($settings->back_title) && $settings->back_title) ? $settings->back_title : "";

        $back_add_paragraph = (isset($settings->back_add_paragraph) && $settings->back_add_paragraph) ? $settings->back_add_paragraph : 0;
        $back_paragraph = (isset($settings->back_paragraph) && $settings->back_paragraph) ? $settings->back_paragraph : "";

        // front button options
        $front_add_button = (isset($settings->front_add_button) && $settings->front_add_button) ? $settings->front_add_button : 0;
        $front_show_button = $settings->flip_behavior == "click" && $front_add_button && (isset($settings->front_button_text) && trim($settings->front_button_text));
        $front_button_text = (isset($settings->front_button_text) && trim($settings->front_button_text)) ? $settings->front_button_text : "";
        $front_btn_class = '';
        $front_btn_class .= (isset($settings->front_button_type) && $settings->front_button_type) ? ' sppb-btn-' . $settings->front_button_type : '';
        $front_btn_class .= (isset($settings->front_button_size) && $settings->front_button_size) ? ' sppb-btn-' . $settings->front_button_size : '';
        $front_btn_class .= (isset($settings->front_shape) && $settings->front_shape) ? ' sppb-btn-' . $settings->front_shape : ' sppb-btn-rounded';
        $front_btn_class .= (isset($settings->front_appearance) && $settings->front_appearance) ? ' sppb-btn-' . $settings->front_appearance : '';
        $front_btn_class .= (isset($settings->front_block) && $settings->front_block) ? ' ' . $settings->front_block : '';

        $front_btn_icon = (isset($settings->front_flip_box_icon) && $settings->front_flip_box_icon) ? $settings->front_flip_box_icon : '';
        $front_btn_icon_position = (isset($settings->front_flip_box_button_icon_position) && $settings->front_flip_box_button_icon_position) ? $settings->front_flip_box_button_icon_position : 'left';

        list($btn_link, $front_btn_link_target) = AddonHelper::parseLink($settings, 'front_flip_box_button_link', ['url' => 'front_flip_box_button_link', 'new_tab' => 'btn_target']);


        $front_attribs = (isset($front_btn_link_target) && $front_btn_link_target) ? $front_btn_link_target : '';
        $front_attribs .= (!empty($btn_link)) ? ' href="' . $btn_link . '"' : '';
        $front_attribs .= ' id="btn-' . $this->addon->id . '"';


        $front_icon_arr = array_filter(explode(' ', $front_btn_icon));

        $front_btn_icon = $front_btn_icon;
        if (count($front_icon_arr) === 1) {
            $front_btn_icon = 'fas ' . $front_btn_icon;
        }

        if ($front_btn_icon_position === 'left') {
            $front_button_text = ($front_btn_icon) ? '<i class="' . $front_btn_icon . '" aria-hidden="true"></i> ' . $front_button_text : $front_button_text;
        } else {
            $front_button_text = ($front_btn_icon) ? $front_button_text . ' <i class="' . $front_btn_icon . '" aria-hidden="true"></i>' : $front_button_text;
        }

        // back button options
        $back_add_button = (isset($settings->back_add_button) && $settings->back_add_button) ? $settings->back_add_button : 0;
        $back_show_button = $back_add_button && (isset($settings->back_button_text) && trim($settings->back_button_text));
        $back_button_text = (isset($settings->back_button_text) && trim($settings->back_button_text)) ? $settings->back_button_text : "";
        $back_btn_class = '';
        $back_btn_class .= (isset($settings->back_button_type) && $settings->back_button_type) ? ' sppb-btn-' . $settings->back_button_type : '';
        $back_btn_class .= (isset($settings->back_button_size) && $settings->back_button_size) ? ' sppb-btn-' . $settings->back_button_size : '';
        $back_btn_class .= (isset($settings->back_shape) && $settings->back_shape) ? ' sppb-btn-' . $settings->back_shape : ' sppb-btn-rounded';
        $back_btn_class .= (isset($settings->back_appearance) && $settings->back_appearance) ? ' sppb-btn-' . $settings->back_appearance : '';
        $back_btn_class .= (isset($settings->back_block) && $settings->back_block) ? ' ' . $settings->back_block : '';

        $back_btn_icon = (isset($settings->back_flip_box_icon) && $settings->back_flip_box_icon) ? $settings->back_flip_box_icon : '';
        $back_btn_icon_position = (isset($settings->back_flip_box_button_icon_position) && $settings->back_flip_box_button_icon_position) ? $settings->back_flip_box_button_icon_position : 'left';

        list($btn_link, $back_btn_link_target) = AddonHelper::parseLink($settings, 'back_flip_box_button_link', ['url' => 'back_flip_box_button_link', 'new_tab' => 'btn_target']);


        $back_attribs = (isset($back_btn_link_target) && $back_btn_link_target) ? $back_btn_link_target : '';
        $back_attribs .= (!empty($btn_link)) ? ' href="' . $btn_link . '"' : '';
        $back_attribs .= ' id="btn-' . $this->addon->id . '"';


        $back_icon_arr = array_filter(explode(' ', $back_btn_icon));
        $back_btn_icon = $back_btn_icon;

        if (count($back_icon_arr) === 1) {
            $back_btn_icon = 'fas ' . $back_btn_icon;
        }

        if ($back_btn_icon_position === 'left') {
            $back_button_text = ($back_btn_icon) ? '<i class="' . $back_btn_icon . '" aria-hidden="true"></i> ' . $back_button_text : $back_button_text;
        } else {
            $back_button_text = ($back_btn_icon) ? $back_button_text . ' <i class="' . $back_btn_icon . '" aria-hidden="true"></i>' : $back_button_text;
        }


        $rotate = (isset($settings->rotate) && $settings->rotate) ? $settings->rotate : 'flip_right';
        // Flip Behavior
        $flip_behavior = (isset($settings->flip_behavior) && $settings->flip_behavior) ? $settings->flip_behavior : 'hover';
        //Flip Style
        $flip_style = (isset($settings->flip_style) && $settings->flip_style) ? $settings->flip_style : 'rotate_style';

        if ($flip_style != "") {
            if ($flip_style == "slide_style") {
                $flip_style = "slide-flipbox";
            } else if ($flip_style == "fade_style") {
                $flip_style = "fade-flipbox";
            } else if ($flip_style == "threeD_style") {
                $flip_style = "threeD-flipbox";
            }
        }


        $output = '';
        $output .= '<div class="sppb-addon sppb-addon-sppb-flibox ' . $class . ' ' . $flip_style . ' ' . $rotate . ' flipon-' . $flip_behavior . '">';

        if ($flip_style == 'threeD-flipbox') {
            $output .= '<div class="threeD-content-wrap">';
            $output .= '<div class="threeD-item">';
            $output .= '<div class="threeD-flip-front">';
            $output .= '<div class="threeD-content-inner">';
            if ($front_add_icon) {
                $output .= '<div class="sppb-flipbox-front-icon" data-fieldName="front_icon">
                <i class="';
                $output .= $front_icon;
                $output .= '"></i>
                </div>';
            }

            if ($front_add_title) {
                $output .= '<div class="sppb-flipbox-front-title" data-fieldName="front_title">';
                $output .= $front_title;
                $output .= '</div>';
            }

            if ($front_add_paragraph) {
                $output .= '<div class="sppb-flipbox-front-paragraph" data-fieldName="front_paragraph">';
                $output .= $front_paragraph;
                $output .= '</div>';
            }

            if ($front_show_button) {
                $output .= '<div class="sppb-flipbox-front-button" data-fieldName="front_button">';
                $output .= '<a ' . $front_attribs . ' class="sppb-btn ' . $front_btn_class . '">' . $front_button_text . '</a>';
                $output .= '</div>';
            }
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="threeD-flip-back">';
            $output .= '<div class="threeD-content-inner">';
            if ($back_add_icon) {
                $output .= '<div class="sppb-flipbox-back-icon" data-fieldName="back_icon">
                <i class="';
                $output .= $back_icon;
                $output .= '"></i>
                </div>';
            }

            if ($back_add_title) {
                $output .= '<div class="sppb-flipbox-back-title" data-fieldName="back_title">';
                $output .= $back_title;
                $output .= '</div>';
            }

            if ($back_add_paragraph) {
                $output .= '<div class="sppb-flipbox-back-paragraph" data-fieldName="back_paragraph">';
                $output .= $back_paragraph;
                $output .= '</div>';
            }

            if ($back_show_button) {
                $output .= '<div class="sppb-flipbox-back-button" data-fieldName="back_button">';
                $output .= '<a ' . $back_attribs . ' class="sppb-btn ' . $back_btn_class . '">' . $back_button_text . '</a>';
                $output .= '</div>';
            }
            $output .= '</div>';
            $output .= '</div >';
            $output .= '</div>'; //.threeD-item
            $output .= '</div>'; //.threeD-content-wrap
        } else {

            $output .= '<div class="sppb-flipbox-panel">';
            $output .= '<div class="sppb-flipbox-front flip-box">';
            $output .= '<div class="flip-box-inner">';
            if ($front_add_icon) {
                $output .= '<div class="sppb-flipbox-front-icon" data-fieldName="front_icon">
                <i class="';
                $output .= $front_icon;
                $output .= '"></i>
                </div>';
            }

            if ($front_add_title) {
                $output .= '<div class="sppb-flipbox-front-title" data-fieldName="front_title">';
                $output .= $front_title;
                $output .= '</div>';
            }

            if ($front_add_paragraph) {
                $output .= '<div class="sppb-flipbox-front-paragraph" data-fieldName="front_paragraph">';
                $output .= $front_paragraph;
                $output .= '</div>';
            }

            if ($front_show_button) {
                $output .= '<div class="sppb-flipbox-front-button" data-fieldName="front_title">';
                $output .= '<a ' . $front_attribs . ' class="sppb-btn ' . $front_btn_class . '">' . $front_button_text . '</a>';
                $output .= '</div>';
            }
            $output .= '</div>'; //.flip-box-inner
            $output .= '</div>'; //.front
            $output .= '<div class="sppb-flipbox-back flip-box">';
            $output .= '<div class="flip-box-inner">';
            if ($back_add_icon) {
                $output .= '<div class="sppb-flipbox-back-icon" data-fieldName="back_icon">
                <i class="';
                $output .= $back_icon;
                $output .= '"></i>
                </div>';
            }

            if ($back_add_title) {
                $output .= '<div class="sppb-flipbox-back-title" data-fieldName="back_title">';
                $output .= $back_title;
                $output .= '</div>';
            }

            if ($back_add_paragraph) {
                $output .= '<div class="sppb-flipbox-back-paragraph" data-fieldName="back_paragraph">';
                $output .= $back_paragraph;
                $output .= '</div>';
            }

            if ($back_show_button) {
                $output .= '<div class="sppb-flipbox-back-button" data-fieldName="back_title">';
                $output .= '<a ' . $back_attribs . ' class="sppb-btn ' . $back_btn_class . '">' . $back_button_text . '</a>';
                $output .= '</div>';
            }
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
     * @since 	4.0.0
     */
    public function css()
    {
        $addon_id = '#sppb-addon-' . $this->addon->id;
        $settings = $this->addon->settings;
        $cssHelper = new CSSHelper($addon_id);
        $css = '';

        $flip_style = (isset($settings->flip_style) && $settings->flip_style) ? $settings->flip_style : 'rotate_style';

        if ($flip_style != "") {
            if ($flip_style == "slide_style") {
                $flip_style = "slide-flipbox";
            } else if ($flip_style == "fade_style") {
                $flip_style = "fade-flipbox";
            } else if ($flip_style == "threeD_style") {
                $flip_style = "threeD-flipbox";
            }
        }

        $border_styles = isset($settings->border_styles) && ($settings->border_styles) ? $settings->border_styles : "";

        $flip_styles = "";

        if (is_array($border_styles)) {
            if (in_array('border_radius', $border_styles)) {
                $flip_styles .= "border-style: dashed;";
            }

            if (in_array('dashed', $border_styles)) {
                $flip_styles .= "border-style: solid;";
            }

            if (in_array('dotted', $border_styles)) {
                $flip_styles .= "border-style: dotted;";
            }

            if (in_array('border_radius', $border_styles) || in_array('dashed', $border_styles) || in_array('dotted', $border_styles)) {
                $flip_styles .= "border-width: 2px;";
                $flip_styles .= "border-color:" . $settings->border_color . ";";
            }
        }

        $css .= ' #sppb-addon-{{ data.id }} .sppb-flipbox-panel,
       #sppb-addon-{{ data.id }} .threeD-item{' . $flip_styles . '}';

        // Front BG style
        $front_bg_type = (isset($settings->front_bg_type) && ($settings->front_bg_type)) ? $settings->front_bg_type : "color";
        $front_bg_inner_type = (isset($settings->front_bg_type) && ($settings->front_bg_inner_type)) ? $settings->front_bg_inner_type : "none";

        $frontBgProps = '';
        $frontBgStyle = '';

        if ($front_bg_type == "color") {
            if ($front_bg_inner_type == "color") {
                $frontBgProps = ['front_bg_color' => 'background: %s'];
                $frontBgStyle = $cssHelper->generateStyle('.sppb-flipbox-front, .threeD-flip-front', $settings, $frontBgProps, false);
            }
            if ($front_bg_inner_type == "gradient") {
                $settings->front_bg_gradient = CSSHelper::parseColor($settings, 'front_bg_gradient');
                $frontBgProps = ['front_bg_gradient' => 'background: %s'];
                $frontBgStyle = $cssHelper->generateStyle('.sppb-flipbox-front, .threeD-flip-front', $settings, $frontBgProps, false);
            }
        }

        $frontImg = array();
        $front_bgimg = "";
        if ($front_bg_type == "image") {
            if (isset($settings->front_bgimg) && isset($settings->front_bgimg->src)) {
                $frontImg = $settings->front_bgimg;
            } else {
                $frontImg = array('src' => $settings->front_bgimg);
            }

            $front_bgimg_src = isset($frontImg->src) ? $frontImg->src : $front_bgimg;

            if ($front_bgimg_src) {
                if (preg_match("@^https?:\/\/@", $front_bgimg_src)) {
                    $front_bgimg = $front_bgimg_src;
                } else {
                    $front_bgimg = Uri::root() . $front_bgimg_src;
                }

                $settings->front_bg_image = $front_bgimg;
            }

            $frontBgProps = ['front_bg_image' => 'background-image: url(%s)'];

            $frontBgStyle = $cssHelper->generateStyle('.sppb-flipbox-front, .threeD-flip-front', $settings, $frontBgProps, false);
        }

        // Back BG style
        $back_bg_type = (isset($settings->back_bg_type) && ($settings->back_bg_type)) ? $settings->back_bg_type : "color";
        $back_bg_inner_type = (isset($settings->back_bg_type) && ($settings->back_bg_inner_type)) ? $settings->back_bg_inner_type : "none";

        $backBgProps = '';
        $backBgStyle = '';

        if ($back_bg_type == "color") {
            if ($back_bg_inner_type == "color") {
                $backBgProps = ['back_bg_color' => 'background: %s'];
                $backBgStyle = $cssHelper->generateStyle('.sppb-flipbox-back, .threeD-flip-back', $settings, $backBgProps, false);
            }
            if ($back_bg_inner_type == "gradient") {
                $settings->back_bg_gradient = CSSHelper::parseColor($settings, 'back_bg_gradient');
                $backBgProps = ['back_bg_gradient' => 'background: %s'];
                $backBgStyle = $cssHelper->generateStyle('.sppb-flipbox-back, .threeD-flip-back', $settings, $backBgProps, false);
            }
        }

        $backImg = array();
        $back_bgimg = "";
        if ($back_bg_type == "image") {
            if (isset($settings->back_bgimg) && isset($settings->back_bgimg->src)) {
                $backImg = $settings->back_bgimg;
            } else {
                $backImg = array('src' => $settings->back_bgimg);
            }

            $back_bgimg_src = isset($backImg->src) ? $backImg->src : $back_bgimg;

            if ($back_bgimg_src) {
                if (preg_match("@^https?:\/\/@", $back_bgimg_src)) {
                    $back_bgimg = $back_bgimg_src;
                } else {
                    $back_bgimg = Uri::root() . $back_bgimg_src;
                }

                $settings->back_bg_image = $back_bgimg;
            }

            $backBgProps = ['back_bg_image' => 'background-image: url(%s)'];

            $backBgStyle = $cssHelper->generateStyle('.sppb-flipbox-back, .threeD-flip-back', $settings, $backBgProps, false);
        }


        // radius
        $front_border_radius = explode(" ", $settings->front_flip_box_radius);
        $frontBorderRadius = '';
        if (count($front_border_radius) > 2) {
            $frontBorderRadius = $cssHelper->generateStyle('.sppb-flipbox-front, .threeD-flip-front', $settings, ['front_flip_box_radius' => 'border-radius'], ['front_flip_box_radius' => false]);
        } else {
            $frontBorderRadius = $cssHelper->generateStyle('.sppb-flipbox-front, .threeD-flip-front', $settings, ['front_flip_box_radius' => 'border-radius']);
        }

        $back_border_radius = explode(" ", $settings->back_flip_box_radius);
        $backBorderRadius = '';
        if (count($back_border_radius) > 2) {
            $backBorderRadius = $cssHelper->generateStyle('.sppb-flipbox-back, .threeD-flip-back', $settings, ['back_flip_box_radius' => 'border-radius'], ['back_flip_box_radius' => false]);
        } else {
            $backBorderRadius = $cssHelper->generateStyle('.sppb-flipbox-back, .threeD-flip-back', $settings, ['back_flip_box_radius' => 'border-radius']);
        }

        // color
        $frontTitleColor = $cssHelper->generateStyle('.sppb-flipbox-front-title', $settings, ['front_title_text_color' => 'color'], false);
        $backTitleColor = $cssHelper->generateStyle('.sppb-flipbox-back-title', $settings, ['back_title_text_color' => 'color'], false);
        $frontParagraphColor = $cssHelper->generateStyle('.sppb-flipbox-front-paragraph', $settings, ['front_paragraph_text_color' => 'color'], false);
        $backParagraphColor = $cssHelper->generateStyle('.sppb-flipbox-back-paragraph', $settings, ['back_paragraph_text_color' => 'color'], false);

        $frontIconColor = '';
        if (isset($settings->front_global_background_type) && $settings->front_global_background_type == "color") {
            $frontIconColor = $cssHelper->generateStyle('.sppb-flipbox-front-icon', $settings, ['front_flip_box_icon_color' => 'color'], false);
        } else if ($settings->front_global_background_type == "gradient") {
            $frontIconColor = $cssHelper->generateStyle('.sppb-flipbox-back-icon', $settings, ['front_flip_box_icon_gradient' => 'color'], false);
        }

        $backIconColor = '';
        if (isset($settings->back_global_background_type) && $settings->back_global_background_type == "color") {
            $backIconColor = $cssHelper->generateStyle('.sppb-flipbox-back-icon', $settings, ['back_flip_box_icon_color' => 'color'], false);
        } else if (isset($settings->back_global_background_type) && $settings->back_global_background_type == "gradient") {
            $settings->back_flip_box_icon_gradient = CSSHelper::parseColor($settings, 'back_flip_box_icon_gradient');
            $backIconColor = $cssHelper->generateStyle('.sppb-flipbox-back-icon', $settings, ['back_flip_box_icon_gradient' => 'color'], false);
        }

        // typography
        $frontTitleTypo = $cssHelper->typography('.sppb-flipbox-front-title', $settings, 'front_title_typography');
        $backTitleTypo = $cssHelper->typography('.sppb-flipbox-back-title', $settings, 'back_title_typography');
        $frontParagraphTypo = $cssHelper->typography('.sppb-flipbox-front-paragraph', $settings, 'front_paragraph_typography');
        $backParagraphTypo = $cssHelper->typography('.sppb-flipbox-back-paragraph', $settings, 'back_paragraph_typography');

        $frontIconSize = $cssHelper->generateStyle('.sppb-flipbox-front-icon', $settings, ['front_icon_size' => 'font-size'], 'px');
        $backIconSize = $cssHelper->generateStyle('.sppb-flipbox-back-icon', $settings, ['back_icon_size' => 'font-size'], 'px');

        // margin and padding
        $frontIconMargin = $cssHelper->generateStyle('.sppb-flipbox-front-icon', $settings, ['front_flip_box__margin' => 'margin'], false);
        $backIconMargin = $cssHelper->generateStyle('.sppb-flipbox-back-icon', $settings, ['back_flip_box__margin' => 'margin'], false);
        $frontIconPadding = $cssHelper->generateStyle('.sppb-flipbox-front-icon', $settings, ['front_flip_box__padding' => 'padding'], false);
        $backIconPadding = $cssHelper->generateStyle('.sppb-flipbox-back-icon', $settings, ['front_flip_box__padding' => 'padding'], false);

        // front button
        $css .= $cssHelper->typography('.sppb-flipbox-front-button .sppb-btn', $settings, 'front_flip_box_button_typography');
        if (isset($settings->front_button_size) && $settings->front_button_size == "custom") {
            $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn', $settings, ['front_button_padding' => 'padding'], false);
        }
        $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn', $settings, ['front_button_margin' => 'margin'], false);
        if (isset($settings->front_block) && $settings->front_block == "sppb-btn-block") {
            $css .= '#sppb-addon-' . $settings->id .  ' .sppb-flipbox-front-button .sppb-btn {display: block;}';
        }

        // custom style
        if (isset($settings->front_button_type) && $settings->front_button_type == "custom") {
            $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn', $settings, ['front_flip_box_button_color' => 'color'], false);
            $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn:hover', $settings, ['front_flip_box_button_color_hover' => 'color'], false);

            if (isset($settings->front_appearance) && $settings->front_appearance == "outline") {
                $css .= '#sppb-addon-{{ data.id }} .sppb-flipbox-front-button .sppb-btn {background-color: transparent;}';
                $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn', $settings, ['front_flip_box_button_bg_color' => 'border-color'], false);
                $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn:hover', $settings, ['front_flip_box_button_bg_color_hover' => 'border-color'], false);
            } else if (isset($settings->front_appearance) && $settings->front_appearance == "gradient") {
                $settings->front_flip_box_button_bg_gradient = CSSHelper::parseColor($settings, 'front_flip_box_button_bg_gradient');
                $settings->front_flip_box_button_gradient_bg_hover = CSSHelper::parseColor($settings, 'front_flip_box_button_gradient_bg_hover');

                $css .= '#sppb-addon-{{ data.id }} .sppb-btn {border: none;}';
                $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn', $settings, ['front_flip_box_button_bg_gradient' => 'background-color'], false);
                $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn:hover', $settings, ['front_flip_box_button_gradient_bg_hover' => 'background-color'], false);
            } else {
                $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn', $settings, ['front_flip_box_button_bg_color' => 'background-color'], false);
                $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn:hover', $settings, ['front_flip_box_button_bg_color_hover' => 'background-color'], false);
            }
        }

        // front link
        if (isset($settings->front_button_type) && $settings->front_button_type == "link") {
            $css .= '#sppb-addon-{{ data.id }} .sppb-btn {padding: 0; border-width: 0; text-decoration: none; border-radius: 0;}';
            $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn', $settings, ['front_flip_box_button_color' => 'color'], false);
            $css .= $cssHelper->generateStyle('.sppb-flipbox-front-button .sppb-btn:hover, .sppb-btn:focus', $settings, ['front_flip_box_button_color_hover' => 'color'], false);
        }

        // back button
        $css .= $cssHelper->typography('.sppb-flipbox-back-button .sppb-btn', $settings, 'back_flip_box_button_typography');
        if (isset($settings->back_button_size) && $settings->back_button_size == "custom") {
            $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn', $settings, ['back_button_padding' => 'padding'], false);
        }
        $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn', $settings, ['back_button_margin' => 'margin'], false);
        if (isset($settings->back_block) && $settings->back_block == "sppb-btn-block") {
            $css .= '#sppb-addon-' . $settings->id .  ' .sppb-flipbox-back-button .sppb-btn {display: block;}';
        }

        // custom style
        if (isset($settings->back_button_type) && $settings->back_button_type == "custom") {
            $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn', $settings, ['back_flip_box_button_color' => 'color'], false);
            $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn:hover', $settings, ['back_flip_box_button_color_hover' => 'color'], false);

            if (isset($settings->back_appearance) && $settings->back_appearance == "outline") {
                $css .= '#sppb-addon-{{ data.id }} .sppb-flipbox-back-button .sppb-btn {background-color: transparent;}';
                $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn', $settings, ['back_flip_box_button_bg_color' => 'border-color'], false);
                $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn:hover', $settings, ['back_flip_box_button_bg_color_hover' => 'border-color'], false);
            } else if (isset($settings->back_appearance) && $settings->back_appearance == "gradient") {
                $settings->back_flip_box_button_bg_gradient = CSSHelper::parseColor($settings, 'back_flip_box_button_bg_gradient');
                $settings->back_flip_box_button_gradient_bg_hover = CSSHelper::parseColor($settings, 'back_flip_box_button_gradient_bg_hover');

                $css .= '#sppb-addon-{{ data.id }} .sppb-btn {border: none;}';
                $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn', $settings, ['back_flip_box_button_bg_gradient' => 'background-color'], false);
                $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn:hover', $settings, ['back_flip_box_button_gradient_bg_hover' => 'background-color'], false);
            } else {
                $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn', $settings, ['back_flip_box_button_bg_color' => 'background-color'], false);
                $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn:hover', $settings, ['back_flip_box_button_bg_color_hover' => 'background-color'], false);
            }
        }

        // back link
        if (isset($settings->back_button_type) && $settings->back_button_type == "link") {
            $css .= '#sppb-addon-{{ data.id }} .sppb-btn {padding: 0; border-width: 0; text-decoration: none; border-radius: 0;}';
            $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn', $settings, ['back_flip_box_button_color' => 'color'], false);
            $css .= $cssHelper->generateStyle('.sppb-flipbox-back-button .sppb-btn:hover, .sppb-btn:focus', $settings, ['back_flip_box_button_color_hover' => 'color'], false);
        }

        // others
        $flipProps = ['height' => 'height'];
        $flipStyle = $cssHelper->generateStyle('.sppb-flipbox-panel, .threeD-item', $settings, $flipProps);

        $settings->text_align = $cssHelper->parseAlignment($settings, 'text_align');
        $textAlign = $cssHelper->generateStyle('.sppb-addon-sppb-flibox', $settings, ['text_align' => 'text-align'], false);

        $css .= $textAlign;
        $css .= $flipStyle;
        $css .= $frontBgStyle;
        $css .= $backBgStyle;
        $css .= $backBgStyle;
        $css .= $frontBorderRadius;
        $css .= $backBorderRadius;
        $css .= $frontIconColor;
        $css .= $backIconColor;
        $css .= $frontTitleColor;
        $css .= $backTitleColor;
        $css .= $frontParagraphColor;
        $css .= $backParagraphColor;
        $css .= $frontTitleTypo;
        $css .= $backTitleTypo;
        $css .= $frontParagraphTypo;
        $css .= $backParagraphTypo;
        $css .= $frontIconSize;
        $css .= $backIconSize;
        $css .= $frontIconMargin;
        $css .= $backIconMargin;
        $css .= $frontIconPadding;
        $css .= $backIconPadding;

        return $css;
    }

    /**
     * Generate the lodash template string for the frontend editor.
     *
     * @return 	string 	The lodash template string.
     * @since 	4.0.0
     */
    public static function getTemplate()
    {
        $lodash = new Lodash('#sppb-addon-{{ data.id }}');
        $output = '
        <#
            let flip_style = (data.flip_style) ? data.flip_style : "rotate_style";

            let front_bg_type = (data.front_bg_type) ? data.front_bg_type : "color";
            let front_bg_inner_type = (data.front_bg_inner_type) ? data.front_bg_inner_type : "none";
            let front_bg_color = (data.front_bg_color) ? data.front_bg_color : "";
            let front_bg_gradient = (data.front_bg_gradient) ? data.front_bg_gradient : "";
            let front_flip_box_radius = (data.front_flip_box_radius) ? data.front_flip_box_radius : 0;

            // background type settings
            let flip_front_bg_color = "";
            if (front_bg_type == "color") {
                if (front_bg_inner_type == "color") {
                    flip_front_bg_color = front_bg_color;
                }
                if (front_bg_inner_type == "gradient") {
                    flip_front_bg_color = front_bg_gradient;
                }
            }

            let frontImg = {}
            let front_bgimg = "";
            if (data.front_bg_type == "image") {
                if (typeof data.front_bgimg !== "undefined" && typeof data.front_bgimg.src !== "undefined") {
                    frontImg = data.front_bgimg
                } else {
                    frontImg = {src: data.front_bgimg}
                }
    
                
                if (_.isObject(frontImg) && frontImg.src != undefined) {
                    if(frontImg.src.indexOf("http://") !== -1 || frontImg.src.indexOf("https://") !== -1){
                        front_bgimg = frontImg.src;
                    } else {
                        front_bgimg = pagebuilder_base + frontImg.src;
                    }
                }
            } 

            let back_bg_type = (data.back_bg_type) ? data.back_bg_type : "color";
            let back_bg_inner_type = (data.back_bg_inner_type) ? data.back_bg_inner_type : "none";
            let back_bg_color = (data.back_bg_color) ? data.back_bg_color : "";
            let back_bg_gradient = (data.back_bg_gradient) ? data.back_bg_gradient : "";
            let back_flip_box_radius = (data.back_flip_box_radius) ? data.back_flip_box_radius : 0;

            let flip_back_bg_color = "";
            if (back_bg_type == "color") {
                if (back_bg_inner_type == "color") {
                    flip_back_bg_color = back_bg_color;
                }
                if (back_bg_inner_type == "gradient") {
                    flip_back_bg_color = back_bg_gradient;
                }
            }

            let backImg = {};
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

            if (flip_style != "") {
                if (flip_style == "slide_style") {
                    flip_style = "slide-flipbox";
                } else if (flip_style == "fade_style") {
                    flip_style = "fade-flipbox";
                } else if (flip_style == "threeD_style") {
                    flip_style = "threeD-flipbox";
                }
            }

            let border_styles = (data.border_styles) ? data.border_styles : "";

            let flip_styles = "";

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

            let front_icon_color = "";
            if(data.front_global_background_type == "color") {
               front_icon_color = data.front_flip_box_icon_color;
            } else if(data.front_global_background_type == "gradient") {
                front_icon_color = data.front_flip_box_icon_gradient;
            }

            let back_icon_color = "";
            if(data.back_global_background_type == "color") {
               back_icon_color = data.back_flip_box_icon_color;
            } else if(data.back_global_background_type == "gradient") {
                back_icon_color = data.back_flip_box_icon_gradient;
            }

            // front button
            let classListFront = " sppb-btn-" + data.front_button_type;
			classListFront += " sppb-btn-" + data.front_button_size;
			classListFront += " sppb-btn-" + data.front_shape;

			if (!_.isEmpty(data.front_appearance)) {
				classListFront += " sppb-btn-"+data.front_appearance;
			}
		
            const isMenuBtnFront = _.isString(data.front_flip_box_button_link?.menu) && data.front_flip_box_button_link.type === "menu" && data.front_flip_box_button_link?.menu;
			const isPageBtnFront = _.isString(data.front_flip_box_button_link?.page) && data.front_flip_box_button_link.type === "page" && data.front_flip_box_button_link?.page;

			const isObjectBtnFront = _.isObject(data.front_flip_box_button_link) && ((data.front_flip_box_button_link.type === "url" && data.front_flip_box_button_link?.url !== "") ||  isMenuBtnFront || isPageBtnFront);
			
			let urlObjBtnFront = {};
			let urlBtnFront = "";
			let targetBtnFront = "";
			let relBtnFront = "";
			
			urlObjBtnFront = isObjectBtnFront ? data.front_flip_box_button_link : window.getSiteUrl(data.front_flip_box_button_link, data?.btn_target);

			if(urlObjBtnFront.type === "url") {	
				urlBtnFront = urlObjBtnFront.url;
			}

			if(urlObjBtnFront.type === "menu") {
				urlBtnFront = urlObjBtnFront.menu || "";
			}
				
			if(urlObjBtnFront.type === "page") {
				urlBtnFront = urlObjBtnFront.page ? `index.php?option=com_sppagebuilder&view=page&id=${urlObjBtnFront.page}` : "";
			}

			targetBtnFront = urlObjBtnFront.new_tab ? "_blank": "";
			relBtnFront += urlObjBtnFront.nofollow ? "nofollow": "";
			relBtnFront += urlObjBtnFront.noopener ? " noopener": "";
			relBtnFront += urlObjBtnFront.noreferrer ? " noreferrer": "";

            // back button
            let classListBack = " sppb-btn-" + data.back_button_type;
			classListBack += " sppb-btn-" + data.back_button_size;
			classListBack += " sppb-btn-" + data.back_shape;

			if (!_.isEmpty(data.back_appearance)) {
				classListBack += " sppb-btn-"+data.back_appearance;
			}
		
            const isMenuBtnBack = _.isString(data.back_flip_box_button_link?.menu) && data.back_flip_box_button_link.type === "menu" && data.back_flip_box_button_link?.menu;
			const isPageBtnBack = _.isString(data.back_flip_box_button_link?.page) && data.back_flip_box_button_link.type === "page" && data.back_flip_box_button_link?.page;

			const isObjectBtnBack = _.isObject(data.back_flip_box_button_link) && ((data.back_flip_box_button_link.type === "url" && data.back_flip_box_button_link?.url !== "") ||  isMenuBtnBack || isPageBtnBack);
			
			let urlObjBtnBack = {};
			let urlBtnBack = "";
			let targetBtnBack = "";
			let relBtnBack = "";
			
			urlObjBtnBack = isObjectBtnBack ? data.back_flip_box_button_link : window.getSiteUrl(data.back_flip_box_button_link, data?.btn_target);

			if(urlObjBtnBack.type === "url") {	
				urlBtnBack = urlObjBtnBack.url;
			}

			if(urlObjBtnBack.type === "menu") {
				urlBtnBack = urlObjBtnBack.menu || "";
			}
				
			if(urlObjBtnBack.type === "page") {
				urlBtnBack = urlObjBtnBack.page ? `index.php?option=com_sppagebuilder&view=page&id=${urlObjBtnBack.page}` : "";
			}

			targetBtnBack = urlObjBtnBack.new_tab ? "_blank": "";

            relBtnBack += urlObjBtnBack.nofollow ? "nofollow": "";
			relBtnBack += urlObjBtnBack.noopener ? " noopener": "";
			relBtnBack += urlObjBtnBack.noreferrer ? " noreferrer": "";

        #>
        <style type="text/css">
            #sppb-addon-{{ data.id }} .sppb-flipbox-panel,
            #sppb-addon-{{ data.id }} .threeD-item{
                {{ flip_styles }}
            }

            <# if (data.front_bg_type == "image"){ #>
                #sppb-addon-{{ data.id }} .sppb-flipbox-front,
                #sppb-addon-{{ data.id }} .threeD-flip-front{
                    background-image: url({{ front_bgimg }});
                }
           <# } #>

           <# if (data.back_bg_type == "image"){ #>
           #sppb-addon-{{ data.id }} .sppb-flipbox-back,
           #sppb-addon-{{ data.id }} .threeD-flip-back{
               background-image: url({{ back_bgimg }});
           }
        <# } #>
        ';

        // background and color
        $output .= $lodash->color('background-color', '.sppb-flipbox-front, .threeD-flip-front', 'flip_front_bg_color');
        $output .= $lodash->color('background-color', '.sppb-flipbox-back, .threeD-flip-back', 'flip_back_bg_color');
        $output .= $lodash->color('color', '.sppb-flipbox-front-title', 'data.front_title_text_color');
        $output .= $lodash->color('color', '.sppb-flipbox-back-title', 'data.back_title_text_color');
        $output .= $lodash->color('background-color', '.threeD-flip-front:before, .sppb-flipbox-front.flip-box:before', 'flip_front_bg_color');
        $output .= $lodash->color('background-color', '.threeD-flip-back:before, .sppb-flipbox-back.flip-box:before', 'flip_back_bg_color');
        $output .= $lodash->color('color', '.sppb-flipbox-front-paragraph', 'data.front_paragraph_text_color');
        $output .= $lodash->color('color', '.sppb-flipbox-back-paragraph', 'data.back_paragraph_text_color');
        $output .= $lodash->color('color', '.sppb-flipbox-front-icon', 'front_icon_color');
        $output .= $lodash->color('color', '.sppb-flipbox-back-icon', 'back_icon_color');

        // typography
        $output .= $lodash->typography('.sppb-flipbox-front-title', 'data.front_title_typography');
        $output .= $lodash->typography('.sppb-flipbox-back-title', 'data.back_title_typography');
        $output .= $lodash->typography('.sppb-flipbox-front-paragraph', 'data.front_paragraph_typography');
        $output .= $lodash->typography('.sppb-flipbox-back-paragraph', 'data.back_paragraph_typography');

        $output .= $lodash->unit('font-size', '.sppb-flipbox-front-icon', 'data.front_icon_size', 'px');
        $output .= $lodash->unit('font-size', '.sppb-flipbox-back-icon', 'data.back_icon_size', 'px');

        // margin and padding
        $output .= $lodash->unit('margin', '.sppb-flipbox-front-icon', 'data.front_flip_box__margin');
        $output .= $lodash->unit('margin', '.sppb-flipbox-back-icon', 'data.back_flip_box__margin');
        $output .= $lodash->unit('padding', '.sppb-flipbox-front-icon', 'data.front_flip_box__padding');
        $output .= $lodash->unit('padding', '.sppb-flipbox-back-icon', 'data.back_flip_box__padding');

        // radius
        $output .= '<# if((data.front_flip_box_radius + "").split(" ").length < 2) { #>';
        $output .= $lodash->unit('border-radius', '.sppb-flipbox-front, .threeD-flip-front', 'data.front_flip_box_radius', 'px');
        $output .= '<# } else { #>';
        $output .= '#sppb-addon-{{data.id}} .sppb-flipbox-front, #sppb-addon-{{data.id}} .threeD-flip-front {
            {{window.getSplitRadius(data.front_flip_box_radius)}}
        }';
        $output .= '<# } #>';

        $output .= '<# if((data.back_flip_box_radius + "").split(" ").length < 2) { #>';
        $output .= $lodash->unit('border-radius', '.sppb-flipbox-back, .threeD-flip-back', 'data.back_flip_box_radius', 'px');
        $output .= '<# } else { #>';
        $output .= '#sppb-addon-{{data.id}} .sppb-flipbox-back, #sppb-addon-{{data.id}} .threeD-flip-back {
                {{window.getSplitRadius(data.back_flip_box_radius)}}
            }';
        $output .= '<# } #>';

        // front button
        $output .= $lodash->typography('.sppb-flipbox-front-button .sppb-btn', 'data.front_flip_box_button_typography');
        $output .= '<# if (data.front_button_size == "custom") { #>';
        $output .= $lodash->spacing('padding', '.sppb-flipbox-front-button .sppb-btn', 'data.front_button_padding');
        $output .= '<# } #>';
        $output .= $lodash->spacing('margin', '.sppb-flipbox-front-button .sppb-btn', 'data.front_button_margin');
        $output .= '<# if (data.front_block == "sppb-btn-block") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-flipbox-front-button .sppb-btn {display: block;}';
        $output .= '<# } #>';

        // custom style
        $output .= '<# if (data.front_button_type == "custom") { #>';
        $output .= $lodash->color('color', '.sppb-flipbox-front-button .sppb-btn', 'data.front_flip_box_button_color');
        $output .= $lodash->color('color', '.sppb-flipbox-front-button .sppb-btn:hover', 'data.front_flip_box_button_color_hover');

        $output .= '<# if (data.front_appearance == "outline") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-flipbox-front-button .sppb-btn {background-color: transparent;}';
        $output .= $lodash->unit('border-color', '.sppb-flipbox-front-button .sppb-btn', 'data.front_flip_box_button_bg_color', '', false);
        $output .= $lodash->unit('border-color', '.sppb-flipbox-front-button .sppb-btn:hover', 'data.front_flip_box_button_bg_color_hover', '', false);
        $output .= '<# } else if (data.front_appearance == "gradient") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-btn {border: none;}';
        $output .= $lodash->color('background-color', '.sppb-flipbox-front-button .sppb-btn', 'data.front_flip_box_button_bg_gradient');
        $output .= $lodash->color('background-color', '.sppb-flipbox-front-button .sppb-btn:hover', 'data.front_flip_box_button_gradient_bg_hover');
        $output .= '<# } else { #>';
        $output .= $lodash->color('background-color', '.sppb-flipbox-front-button .sppb-btn', 'data.front_flip_box_button_bg_color');
        $output .= $lodash->color('background-color', '.sppb-flipbox-front-button .sppb-btn:hover', 'data.front_flip_box_button_bg_color_hover');
        $output .= '<# } #>';
        $output .= '<# } #>';

        // link
        $output .= '<# if (data.front_button_type == "link") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-btn {padding: 0; border-width: 0; text-decoration: none; border-radius: 0;}';
        $output .= $lodash->color('color', '.sppb-flipbox-front-button .sppb-btn', 'data.front_flip_box_button_color');
        // $output .= $lodash->unit('border-color', '.sppb-flipbox-front-button .sppb-btn', 'data.link_btn_border_color', '', false);
        // $output .= $lodash->unit('border-bottom-width', '.sppb-flipbox-front-button .sppb-btn', 'data.link_btn_border_width', 'px');
        // $output .= $lodash->unit('padding-bottom', '.sppb-flipbox-front-button .sppb-btn', 'data.link_btn_padding_bottom', 'px');
        $output .= $lodash->color('color', '.sppb-flipbox-front-button .sppb-btn:hover, .sppb-btn:focus', 'data.front_flip_box_button_color_hover');
        // $output .= $lodash->unit('border-color', '.sppb-flipbox-front-button .sppb-btn:hover, .sppb-btn:focus', 'data.link_btn_border_hover_color', '', false);
        $output .= '<# } #>';
        // front button end

        // back button
        $output .= $lodash->typography('.sppb-flipbox-back-button .sppb-btn', 'data.back_flip_box_button_typography');
        $output .= '<# if (data.back_button_size == "custom") { #>';
        $output .= $lodash->spacing('padding', '.sppb-flipbox-back-button .sppb-btn', 'data.back_button_padding');
        $output .= '<# } #>';
        $output .= $lodash->spacing('margin', '.sppb-flipbox-back-button .sppb-btn', 'data.back_button_margin');
        $output .= '<# if (data.back_block == "sppb-btn-block") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-flipbox-back-button .sppb-btn {display: block;}';
        $output .= '<# } #>';

        // custom style
        $output .= '<# if (data.back_button_type == "custom") { #>';
        $output .= $lodash->color('color', '.sppb-flipbox-back-button .sppb-btn', 'data.back_flip_box_button_color');
        $output .= $lodash->color('color', '.sppb-flipbox-back-button .sppb-btn:hover', 'data.back_flip_box_button_color_hover');

        $output .= '<# if (data.back_appearance == "outline") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-flipbox-back-button .sppb-btn {background-color: transparent;}';
        $output .= $lodash->unit('border-color', '.sppb-flipbox-back-button .sppb-btn', 'data.back_flip_box_button_bg_color', '', false);
        $output .= $lodash->unit('border-color', '.sppb-flipbox-back-button .sppb-btn:hover', 'data.back_flip_box_button_bg_color_hover', '', false);
        $output .= '<# } else if (data.back_appearance == "gradient") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-btn {border: none;}';
        $output .= $lodash->color('background-color', '.sppb-flipbox-back-button .sppb-btn', 'data.back_flip_box_button_bg_color');
        $output .= $lodash->color('background-color', '.sppb-flipbox-back-button .sppb-btn:hover', 'data.back_flip_box_button_gradient_bg_hover');
        $output .= '<# } else { #>';
        $output .= $lodash->color('background-color', '.sppb-flipbox-back-button .sppb-btn', 'data.back_flip_box_button_bg_color');
        $output .= $lodash->color('background-color', '.sppb-flipbox-back-button .sppb-btn:hover', 'data.back_flip_box_button_bg_color_hover');
        $output .= '<# } #>';
        $output .= '<# } #>';

        // link
        $output .= '<# if (data.back_button_type == "link") { #>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-btn {padding: 0; border-width: 0; text-decoration: none; border-radius: 0;}';
        $output .= $lodash->color('color', '.sppb-flipbox-back-button .sppb-btn', 'data.back_flip_box_button_color');
        // $output .= $lodash->unit('border-color', '.sppb-flipbox-back-button .sppb-btn', 'data.link_btn_border_color', '', false);
        // $output .= $lodash->unit('border-bottom-width', '.sppb-flipbox-back-button .sppb-btn', 'data.link_btn_border_width', 'px');
        // $output .= $lodash->unit('padding-bottom', '.sppb-flipbox-back-button .sppb-btn', 'data.link_btn_padding_bottom', 'px');
        $output .= $lodash->color('color', '.sppb-flipbox-back-button .sppb-btn:hover, .sppb-btn:focus', 'data.back_flip_box_button_color_hover');
        // $output .= $lodash->unit('border-color', '.sppb-flipbox-back-button .sppb-btn:hover, .sppb-btn:focus', 'data.link_btn_border_hover_color', '', false);
        $output .= '<# } #>';
        // back button end

        $output .= $lodash->unit('height', '.sppb-flipbox-panel, .threeD-item', 'data.height', 'px');
        $output .= $lodash->alignment('text-align', '.sppb-addon-sppb-flibox', 'data.text_align');
        $output .= '</style>
        <div class="sppb-addon sppb-addon-sppb-flibox {{ data.class }} {{ flip_style }} {{ data.rotate }} flipon-{{ data.flip_behavior }}">
            <# if (flip_style == "threeD-flipbox") { #>
                <div class="threeD-content-wrap">
                    <div class="threeD-item">
                        <div class="threeD-flip-front">
                        <div class="threeD-content-inner" data-id={{data.id}}>
                        <# if(data.front_add_icon) { #>
                            <div class="sppb-flipbox-front-icon" data-fieldName="front_icon">
                                <i class="{{{data.front_icon}}}"></i>
                            </div>
                        <# } #>

                        <# if(data.front_add_title) { #>
                            <div class="sppb-flipbox-front-title" data-fieldName="front_text">
                            {{{ data.front_title }}}
                            </div>
                        <# } #>

                        <# if(data.front_add_paragraph) { #>
                            <div class="sppb-flipbox-front-paragraph" data-fieldName="front_paragraph">
                            {{{ data.front_paragraph }}}
                            </div>
                        <# } #>

                        <# if(data.flip_behavior == "click" && data.front_add_button && data.front_button_text && _.trim(data.front_button_text)){
                            let icon_arr_front = (typeof data.front_flip_box_icon !== "undefined" && data.front_flip_box_icon) ? data.front_flip_box_icon.split(" ") : "";
                            let icon_name_front = icon_arr_front.length === 1 ? "fa "+data.front_flip_box_icon : data.front_flip_box_icon;
                        #>
                            <div class="sppb-flipbox-front-button" data-fieldName="front_button">
                                <a href=\'{{ urlBtnFront }}\' target=\'{{ targetBtnFront }}\' rel=\'{{ relBtnFront }}\' id="btn-{{ data.id }}" class="sppb-btn {{ classListFront }}"><# if(data.back_flip_box_button_icon_position == "left" && !_.isEmpty(data.front_flip_box_icon)) { #><i class="{{ icon_name_front }}"></i> <# } #>{{ data.front_button_text }}<# if(data.front_flip_box_button_icon_position == "right" && !_.isEmpty(data.front_flip_box_icon)) { #> <i class="{{ icon_name_front }}"></i><# } #></a>
                            </div>
                        <# } #>
                        </div>
                        
                        </div>
                        <div class="threeD-flip-back">
                            <div class="threeD-content-inner" data-id={{data.id}}>
                                <# if(data.back_add_icon) { #>
                                    <div class="sppb-flipbox-back-icon" data-id={{data.id}} data-fieldName="back_icon">
                                    <i class="{{{data.back_icon}}}"></i>
                                    </div>
                                <# } #>

                                <# if(data.back_add_title) { #>
                                    <div class="sppb-flipbox-back-title" data-id={{data.id}} data-fieldName="flip_text">
                                    {{{ data.back_title }}}
                                    </div>
                                <# } #>

                                <# if(data.back_add_paragraph) { #>
                                    <div class="sppb-flipbox-back-paragraph" data-id={{data.id}} data-fieldName="flip_paragraph">
                                    {{{ data.back_paragraph }}}
                                    </div>
                                <# } #>

                                <# if(data.back_add_button && data.back_button_text && _.trim(data.back_button_text)){
                                    let icon_arr_back = (typeof data.back_flip_box_icon !== "undefined" && data.back_flip_box_icon) ? data.back_flip_box_icon.split(" ") : "";
                                    let icon_name_back = icon_arr_back.length === 1 ? "fa "+data.back_flip_box_icon : data.back_flip_box_icon;
                                #>
                                    <div class="sppb-flipbox-back-button" data-id={{data.id}} data-fieldName="back_button">
                                        <a href=\'{{ urlBtnBack }}\' target=\'{{ targetBtnBack }}\' rel=\'{{ relBtnBack }}\' id="btn-{{ data.id }}" class="sppb-btn {{ classListBack }}"><# if(data.back_flip_box_button_icon_position == "left" && !_.isEmpty(data.back_flip_box_icon)) { #><i class="{{ icon_name_back }}"></i> <# } #>{{ data.back_button_text }}<# if(data.back_flip_box_button_icon_position == "right" && !_.isEmpty(data.back_flip_box_icon)) { #> <i class="{{ icon_name_back }}"></i><# } #></a>
                                    </div>
                                <# } #>
                            </div>
                        </div>
                    </div>
                </div>
            <# } else { #>
                <div class="sppb-flipbox-panel">
                    <div class="sppb-flipbox-front flip-box">
                        <div class="flip-box-inner" data-id={{data.id}}>
                            <# if(data.front_add_icon) { #>
                                <div class="sppb-flipbox-front-icon" data-id={{data.id}} data-fieldName="front_icon">
                                    <i class="{{{data.front_icon}}}"></i>
                                </div>
                            <# } #>

                            <# if(data.front_add_title) { #>
                                <div class="sppb-flipbox-front-title" data-id={{data.id}} data-fieldName="front_text">
                                    {{{ data.front_title }}}
                                </div>
                            <# } #>

                            <# if(data.front_add_paragraph) { #>
                                <div class="sppb-flipbox-front-paragraph" data-id={{data.id}} data-fieldName="front_paragraph">
                                    {{{ data.front_paragraph }}}
                                </div>
                            <# } #>

                            <# if(data.flip_behavior == "click" && data.front_add_button && data.front_button_text && _.trim(data.front_button_text)){
                                let icon_arr_front = (typeof data.front_flip_box_icon !== "undefined" && data.front_flip_box_icon) ? data.front_flip_box_icon.split(" ") : "";
                                let icon_name_front = icon_arr_front.length === 1 ? "fa "+data.front_flip_box_icon : data.front_flip_box_icon;
                            #>
                                <div class="sppb-flipbox-front-button" data-id={{data.id}} data-fieldName="front_button">
                                    <a href=\'{{ urlBtnFront }}\' target=\'{{ targetBtnFront }}\' rel=\'{{ relBtnFront }}\' id="btn-{{ data.id }}" class="sppb-btn {{ classListFront }}"><# if(data.front_flip_box_button_icon_position == "left" && !_.isEmpty(data.front_flip_box_icon)) { #><i class="{{ icon_name_front }}"></i> <# } #>{{ data.front_button_text }}<# if(data.front_flip_box_button_icon_position == "right" && !_.isEmpty(data.front_flip_box_icon)) { #> <i class="{{ icon_name_front }}"></i><# } #></a>
                                </div>
                            <# } #>
                        </div>
                    </div>
                    <div class="sppb-flipbox-back flip-box">
                        <div class="flip-box-inner" data-id={{data.id}}>
                            <# if(data.back_add_icon) { #>
                                <div class="sppb-flipbox-back-icon" data-id={{data.id}} data-fieldName="back_icon">
                                <i class="{{{data.back_icon}}}"></i>
                                </div>
                            <# } #>

                            <# if(data.back_add_title) { #>
                                <div class="sppb-flipbox-back-title" data-id={{data.id}} data-fieldName="flip_text">
                                {{{ data.back_title }}}
                                </div>
                            <# } #>

                            <# if(data.back_add_paragraph) { #>
                                <div class="sppb-flipbox-back-paragraph" data-id={{data.id}} data-fieldName="flip_paragraph">
                                {{{ data.back_paragraph }}}
                                </div>
                            <# } #>

                            <# if(data.back_add_button && data.back_button_text && _.trim(data.back_button_text)){
                                let icon_arr_back = (typeof data.back_flip_box_icon !== "undefined" && data.back_flip_box_icon) ? data.back_flip_box_icon.split(" ") : "";
                                let icon_name_back = icon_arr_back.length === 1 ? "fa "+data.back_flip_box_icon : data.back_flip_box_icon;
                            #>
                                <div class="sppb-flipbox-back-button" data-id={{data.id}} data-fieldName="back_button">
                                    <a href=\'{{ urlBtnBack }}\' target=\'{{ targetBtnBack }}\' rel=\'{{ relBtnBack }}\' id="btn-{{ data.id }}" class="sppb-btn {{ classListBack }}"><# if(data.back_flip_box_button_icon_position == "left" && !_.isEmpty(data.back_flip_box_icon)) { #><i class="{{ icon_name_back }}"></i> <# } #>{{ data.back_button_text }}<# if(data.back_flip_box_button_icon_position == "right" && !_.isEmpty(data.back_flip_box_icon)) { #> <i class="{{ icon_name_back }}"></i><# } #></a>
                                </div>
                            <# } #>
                        </div>
                    </div>
                </div>
            <# } #>
        </div>
        ';

        return $output;
    }
}