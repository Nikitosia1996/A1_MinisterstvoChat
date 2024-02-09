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

class SppagebuilderAddonImage_carousel extends SppagebuilderAddons
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
        $image_carousel_layout = (isset($settings->image_carousel_layout) && $settings->image_carousel_layout) ? $settings->image_carousel_layout : 'layout2';
        $carousel_autoplay = (isset($settings->carousel_autoplay) && $settings->carousel_autoplay) ? $settings->carousel_autoplay : 0;
        $carousel_speed = (isset($settings->carousel_speed) && $settings->carousel_speed) ? $settings->carousel_speed : 2500;
        $carousel_interval = (isset($settings->carousel_interval) && $settings->carousel_interval) ? $settings->carousel_interval : 4500;
        $carousel_margin = (isset($settings->carousel_margin) && $settings->carousel_margin) ? $settings->carousel_margin : 0;
        $carousel_center_padding_xl = (isset($settings->carousel_center_padding_xl) && is_numeric($settings->carousel_center_padding_xl)) ? $settings->carousel_center_padding_xl : 180;
        $carousel_center_padding_lg = (isset($settings->carousel_center_padding_lg) && is_numeric($settings->carousel_center_padding_lg)) ? $settings->carousel_center_padding_lg : 180;
        $carousel_center_padding_md = (isset($settings->carousel_center_padding_md) && is_numeric($settings->carousel_center_padding_md)) ? $settings->carousel_center_padding_md : 180;
        $carousel_center_padding_sm = (isset($settings->carousel_center_padding_sm) && is_numeric($settings->carousel_center_padding_sm)) ? $settings->carousel_center_padding_sm : 90;
        $carousel_center_padding_xs = (isset($settings->carousel_center_padding_xs) && is_numeric($settings->carousel_center_padding_xs)) ? $settings->carousel_center_padding_xs : 50;
        $carousel_item_number_xl = (isset($settings->carousel_item_number_xl) && $settings->carousel_item_number_xl) ? $settings->carousel_item_number_xl : 3;
        $carousel_item_number_lg = (isset($settings->carousel_item_number_lg) && $settings->carousel_item_number_lg) ? $settings->carousel_item_number_lg : 3;
        $carousel_item_number_md = (isset($settings->carousel_item_number_md) && $settings->carousel_item_number_md) ? $settings->carousel_item_number_md : 3;
        $carousel_item_number_sm = (isset($settings->carousel_item_number_sm) && $settings->carousel_item_number_sm) ? $settings->carousel_item_number_sm : 3;
        $carousel_item_number_xs = (isset($settings->carousel_item_number_xs) && $settings->carousel_item_number_xs) ? $settings->carousel_item_number_xs : 1;
        $carousel_height_xl = (isset($settings->carousel_height_xl) && $settings->carousel_height_xl) ? $settings->carousel_height_xl : 500;
        $carousel_height_lg = (isset($settings->carousel_height_lg) && $settings->carousel_height_lg) ? $settings->carousel_height_lg : 500;
        $carousel_height_md = (isset($settings->carousel_height_md) && $settings->carousel_height_md) ? $settings->carousel_height_md : 500;
        $carousel_height_sm = (isset($settings->carousel_height_sm) && $settings->carousel_height_sm) ? $settings->carousel_height_sm : 400;
        $carousel_height_xs = (isset($settings->carousel_height_xs) && $settings->carousel_height_xs) ? $settings->carousel_height_xs : 300;
        $carousel_bullet = (isset($settings->carousel_bullet) && $settings->carousel_bullet) ? $settings->carousel_bullet : 0;
        $carousel_overlay = (isset($settings->carousel_overlay) && $settings->carousel_overlay) ? $settings->carousel_overlay : 0;
        $carousel_fade = (isset($settings->carousel_fade) && $settings->carousel_fade) ? $settings->carousel_fade : 0;

        //Arrow style
        $carousel_arrow = (isset($settings->carousel_arrow) && $settings->carousel_arrow) ? $settings->carousel_arrow : 0;
        $arrow_icon = (isset($settings->arrow_icon) && $settings->arrow_icon) ? $settings->arrow_icon : 'angle';
        $left_arrow = '';
        $right_arrow = '';
        if ($arrow_icon == 'long_arrow')
        {
            $left_arrow = 'fa-long-arrow-left';
            $right_arrow = 'fa-long-arrow-right';
        }
        else
        {
            $left_arrow = 'fa-angle-left';
            $right_arrow = 'fa-angle-right';
        }

        //Output
        $output  = '<div class="sppb-addon sppb-carousel-extended' . $class . ' sppb-image-carousel-' . $image_carousel_layout . '" data-left-arrow="' . $left_arrow . '" data-right-arrow="' . $right_arrow . '" data-arrow="' . $carousel_arrow . '" data-dots="' . $carousel_bullet . '" data-image-layout="' . $image_carousel_layout . '" data-autoplay="' . $carousel_autoplay . '" data-speed="' . $carousel_speed . '" data-interval="' . $carousel_interval . '" data-margin="' . $carousel_margin . '" ' . (($image_carousel_layout == 'layout3' || $image_carousel_layout == 'layout4') ? '' : '') . ' ' . (($image_carousel_layout == 'layout3' || $image_carousel_layout == 'layout4') ? 'data-padding-xl="' . $carousel_center_padding_xl . '"' : '') . ' ' . (($image_carousel_layout == 'layout3' || $image_carousel_layout == 'layout4') ? 'data-padding-lg="' . $carousel_center_padding_lg . '"' : '') . ' ' . (($image_carousel_layout == 'layout3' || $image_carousel_layout == 'layout4') ? 'data-padding-md="' . $carousel_center_padding_md . '"' : '') . ' ' . (($image_carousel_layout == 'layout3' || $image_carousel_layout == 'layout4') ? 'data-padding-sm="' . $carousel_center_padding_sm . '"' : '') . ' ' . (($image_carousel_layout == 'layout3' || $image_carousel_layout == 'layout4') ? 'data-padding-xs="' . $carousel_center_padding_xs . '"' : '') . ' " data-height-xl="' . $carousel_height_xl . '" data-height-lg="' . $carousel_height_lg . '" data-height-md="' . $carousel_height_md . ' " data-height-sm="' . $carousel_height_sm . '" data-height-xs="' . $carousel_height_xs . '" data-item-number-xl="' . $carousel_item_number_xl . '" data-item-number-lg="' . $carousel_item_number_lg . '" data-item-number-md="' . $carousel_item_number_md . '" data-item-number-sm="' . $carousel_item_number_sm . '" data-item-number-xs="' . $carousel_item_number_xs . '"' . ($image_carousel_layout == 'layout1' && $carousel_fade ? ' data-fade="' . $carousel_fade . '"' : '') . '>';
        if (isset($settings->sp_image_carousel_item) && is_array($settings->sp_image_carousel_item))
        {
            foreach ($settings->sp_image_carousel_item as $item_key => $carousel_item)
            {
                $output .= '<div class="sppb-carousel-extended-item">';


                $image_carousel_img = isset($carousel_item->image_carousel_img) && $carousel_item->image_carousel_img ? $carousel_item->image_carousel_img : '';
                $image_carousel_img_src = isset($image_carousel_img->src) ? $image_carousel_img->src : $image_carousel_img;

                if (!empty($carousel_item->image_carousel_img_link))
                {
                    list($link, $target) = AddonHelper::parseLink($carousel_item, 'image_carousel_img_link', ['url' => 'image_carousel_img_link', 'new_tab' => 'link_open_new_window']);
                    
                    if (!empty($link))
                    {
                        $output .= '<a href="' . $link . '" ' . $target . '>';
                    }
                }

                $output .= '<img src="' . $image_carousel_img_src . '" alt="' . (isset($carousel_item->item_title) ? $carousel_item->item_title : '') . '">';

                if ($carousel_overlay)
                {
                    $output .= '<div class="sppb-carousel-extended-item-overlay"></div>';
                }

                if ($image_carousel_layout != '')
                {
                    $output .= '<div class="sppb-carousel-extended-content-wrap">';

                    if (isset($carousel_item->item_title))
                    {
                        $output .= '<div class="sppb-carousel-extended-heading">';
                        $output .= $carousel_item->item_title;
                        $output .= '</div>';
                    }

                    if (isset($carousel_item->item_subtitle))
                    {
                        $output .= '<div class="sppb-carousel-extended-subheading">';
                        $output .= $carousel_item->item_subtitle;
                        $output .= '</div>';
                    }

                    if (isset($carousel_item->item_description))
                    {
                        $output .= '<div class="sppb-carousel-extended-description">';
                        $output .= $carousel_item->item_description;
                        $output .= '</div>';
                    }

                    $output .= '</div>';
                }

                if (!empty($link))
                {
                    $output .= '</a>';
                }

                $output .= '</div>';
            }
        }

        $output .= '</div>';

        return $output;
    }

    public function scripts()
    {
        return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/sp_carousel.js');
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
        $image_carousel_layout = (isset($settings->image_carousel_layout) && $settings->image_carousel_layout) ? $settings->image_carousel_layout : '';
        $carousel_overlay = (isset($settings->carousel_overlay) && $settings->carousel_overlay) ? $settings->carousel_overlay : 0;
        $arrow_height = (isset($settings->arrow_height) && $settings->arrow_height) ? $settings->arrow_height : 0;
        $arrow_border_width = (isset($settings->arrow_border_width) && $settings->arrow_border_width) ? $settings->arrow_border_width : 0;

        $settings->arrow_height_new = $arrow_height - $arrow_border_width;

        //Arrow Style
        $carousel_arrow = (isset($settings->carousel_arrow) && $settings->carousel_arrow) ? $settings->carousel_arrow : 1;
        if ($carousel_arrow)
        {
            $carouselArrowPosition = $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control', $settings, ['arrow_position_verti' => 'margin-top', 'arrow_position_hori' => ['margin-left', 'margin-right']], ['arrow_position_verti' => '%', 'arrow_position_hori' => 'px']);
            $css .= $carouselArrowPosition;



            $arrowStyleProps = [
                'arrow_height_new'        => ['height', 'line-height'],
                'arrow_width'         => 'width',
                'arrow_background'    => 'background',
                'arrow_color'         => 'color',
                'arrow_font_size'     => 'font-size',
                'arrow_border_width'  => 'border-style: solid;border-width',
                'arrow_border_color'  => 'border-color',
                'arrow_border_radius' => 'border-radius'
            ];

            $arrowStyleUnits = [
                'arrow_background'    => false,
                'arrow_color'         => false,
                'arrow_border_color'  => false
            ];

            $arrowStyle = $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control', $settings, $arrowStyleProps,  $arrowStyleUnits);

            //Arrow hover style
            $arrowHoverStyleProps = [
                'arrow_hover_background'    => 'background',
                'arrow_hover_color'         => 'color',
                'arrow_hover_border_color'  => 'border-color'
            ];

            $arrowHoverStyleUnits = [
                'arrow_hover_background'    => false,
                'arrow_hover_color'         => false,
                'arrow_hover_border_color'  => false
            ];

            $arrowHoverStyle = $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control:hover', $settings, $arrowHoverStyleProps, $arrowHoverStyleUnits);

            $css .= $arrowStyle;
            $css .= $arrowHoverStyle;
        }
        //Bullet Style
        $carousel_bullet = (isset($settings->carousel_bullet) && $settings->carousel_bullet) ? $settings->carousel_bullet : 1;

        if ($carousel_bullet)
        {

            $bulletPositionStyle = $cssHelper->generateStyle('.sppb-carousel-extended-dots', $settings, ['bullet_position_verti' => 'bottom', 'bullet_position_hori' => 'left'], ['bullet_position_verti' => '%', 'bullet_position_hori' => 'px']);
            $css .= $bulletPositionStyle;

            $bulletStyleProps = [
                'bullet_height'        => ['height', 'line-height'],
                'bullet_width'         => 'width',
                'bullet_background'    => 'background',
                'bullet_border_radius' => 'border-radius',
                'bullet_border_width'  => 'border-style: solid; border-width',
                'bullet_border_color'  => 'border-color'

            ];
            $bulletStyleUnits = [
                'bullet_background'    => false,
                'bullet_border_color'  => false
            ];
            $bulletStyle = $cssHelper->generateStyle('.sppb-carousel-extended-dots ul li', $settings, $bulletStyleProps, $bulletStyleUnits);
            //Bullet hover style
            $bulletHoverStyleProps = [
                'bullet_active_background'    => 'background',
            ];
            $bulletHoverStyleUnits = [
                'bullet_active_background'    => false
            ];
            $bulletHoverStyle = $cssHelper->generateStyle('.sppb-carousel-extended-dots ul li:hover span, .sppb-carousel-extended-dots ul li.active span', $settings, $bulletHoverStyleProps, $bulletHoverStyleUnits);

            $css .= $bulletStyle;
            $css .= $bulletHoverStyle;
        }
        if ($carousel_overlay)
        {
            $settings->overlay_gradient = CSSHelper::parseColor($settings, 'overlay_gradient');
            $overlayStyle = $cssHelper->generateStyle('.sppb-carousel-extended-item-overlay', $settings, ['overlay_gradient' => 'background'], false);
            $css .= $overlayStyle;
        }

        //Content Alignment
        $item_content_verti_align = (isset($settings->item_content_verti_align) && $settings->item_content_verti_align) ? $settings->item_content_verti_align : "";
        $item_content_hori_align = (isset($settings->item_content_hori_align) && $settings->item_content_hori_align) ? $settings->item_content_hori_align : "";

        if ($item_content_verti_align || $item_content_hori_align)
        {
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-carousel-extended-content-wrap {';
            if ($item_content_verti_align === "top")
            {
                $css .= 'justify-content: flex-start;';
            }
            else if ($item_content_verti_align === "bottom")
            {
                $css .= 'justify-content: flex-end;';
            }
            if ($item_content_hori_align === "left")
            {
                $css .= 'align-items: flex-start;';
                $css .= 'text-align: left;';
            }
            else if ($item_content_hori_align === "right")
            {
                $css .= 'align-items: flex-end;';
                $css .= 'text-align: right;';
            }
            $css .= '}';
        }

        $titleTypographyFallbacks = [
            'font'           => 'content_title_font_family',
            'size'           => 'content_title_fontsize',
            'line_height'    => 'content_title_lineheight',
            'letter_spacing' => 'content_title_letterspace',
            'uppercase'      => 'content_title_font_style.uppercase',
            'italic'         => 'content_title_font_style.italic',
            'underline'      => 'content_title_font_style.underline',
            'weight'         => 'content_title_font_style.weight',
        ];

        $subtileTypographyFallbacks = [
            'font'           => 'content_subtitle_font_family',
            'size'           => 'content_subtitle_fontsize',
            'line_height'    => 'content_subtitle_lineheight',
            'letter_spacing' => 'content_subtitle_letterspace',
            'uppercase'      => 'content_subtitle_font_style.uppercase',
            'italic'         => 'content_subtitle_font_style.italic',
            'underline'      => 'content_subtitle_font_style.underline',
            'weight'         => 'content_subtitle_font_style.weight',
        ];

        $descriptionTypographyFallbacks = [
            'font'           => 'description_font_family',
            'size'           => 'description_fontsize',
            'line_height'    => 'description_lineheight',
            'letter_spacing' => 'description_letterspace',
            'uppercase'      => 'description_font_style.uppercase',
            'italic'         => 'description_font_style.italic',
            'underline'      => 'description_font_style.underline',
            'weight'         => 'description_font_style.weight',
        ];

        $titleTypographyStyle = $cssHelper->typography('.sppb-carousel-extended-heading', $settings, 'content_title_typography', $titleTypographyFallbacks);
        $subtileTypographyStyle = $cssHelper->typography('.sppb-carousel-extended-subheading', $settings, 'content_subtitle_typography', $subtileTypographyFallbacks);
        $descriptionTypographyStyle  = $cssHelper->typography('.sppb-carousel-extended-description', $settings, 'description_typography', $descriptionTypographyFallbacks);

        $titleStyle = $cssHelper->generateStyle('.sppb-carousel-extended-heading', $settings, ['content_title_text_color' => 'color', 'content_title_margin' => 'margin'], ['content_title_text_color' => false, 'content_title_margin' => false], ['content_title_margin' => 'spacing']);
        $subtileStyle = $cssHelper->generateStyle('.sppb-carousel-extended-subheading', $settings, ['content_subtitle_text_color' => 'color'], ['content_subtitle_text_color' => false]);
        $descriptionStyle  = $cssHelper->generateStyle('.sppb-carousel-extended-description', $settings, ['description_text_color' => 'color', 'description_margin' => 'margin'], ['description_text_color' => false, 'description_margin' => false], ['description_margin' => 'spcacing']);

        $css .= $titleStyle;
        $css .= $subtileStyle;
        $css .= $descriptionStyle;

        $css .= $titleTypographyStyle;
        $css .= $subtileTypographyStyle;
        $css .= $descriptionTypographyStyle;

        //Carousel transition speed
        $carousel_speed = (isset($settings->carousel_speed)) ? $settings->carousel_speed : 2500;

        if ($image_carousel_layout == 'layout3' || $image_carousel_layout == 'layout4')
        {
            $css .= '#sppb-addon-' . $this->addon->id . ' .sppb-carousel-extended-center .sppb-carousel-extended-item .sppb-addon-wrapper {';
            $css .= 'transition: all ' . $carousel_speed . 'ms ease 0s;';
            $css .= '}';
        }

        $arrowHeightStyle = $cssHelper->generateStyle('.sppb-carousel-extended-nav-control', $settings, ['arrow_height' => 'top: -%s']);

        $css .= $arrowHeightStyle;

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
        
        <style  type="text/css">

            <# if(data.image_carousel_layout == "layout3" || data.image_carousel_layout == "layout4"){ #>
                #sppb-addon-{{ data.id }} .sppb-carousel-extended-center .sppb-carousel-extended-item .sppb-addon-wrapper {
                    transition: all {{data.carousel_speed}}ms ease 0s;
                }
            <# }
            #>            

            <# if(data.item_content_verti_align || data.item_content_hori_align) { #>
                #sppb-addon-{{ data.id }} .sppb-carousel-extended-content-wrap {
                    <# if(data.item_content_verti_align === "top"){ #>
                        justify-content: flex-start;
                    <# } else if(data.item_content_verti_align === "bottom"){ #>
                        justify-content: flex-end;
                    <# } #>
                    <# if(data.item_content_hori_align === "left"){ #>
                        align-items: flex-start;
                        text-align: left;
                    <# } else if(data.item_content_hori_align === "right"){ #>
                        align-items: flex-end;
                        text-align: right;
                    <# } #>
                }
            <# } #>
            ';

        // Carousel Arrow
        $output .= ' <# if (data.carousel_arrow ){ #>';
        // Control
        $output .= $lodash->unit('width', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_width', 'px', false);
        $output .= $lodash->unit('height', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_height', 'px', false);
        $output .= $lodash->unit('line-height', '.sppb-carousel-extended-nav-control .nav-control', '(data.arrow_height)-(data.arrow_border_width)', 'px', false);
        $output .= $lodash->unit('font-size', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_font_size', 'px', false);
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_background');
        $output .= $lodash->color('color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_color');
        $output .= $lodash->border('border-color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_color');
        $output .= $lodash->unit('border-radius', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_radius', 'px', false);
        $output .= $lodash->unit('border-width', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_width', 'px', false);
        $output .= $lodash->unit('margin-top', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_verti', '%');
        $output .= $lodash->unit('margin-left', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_hori', 'px');
        $output .= $lodash->unit('margin-right', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_hori', 'px');
        $output .= $lodash->unit('top', '.sppb-carousel-extended-nav-control', 'data.arrow_height', 'px', false, '-');
        $output .= '#sppb-addon-{{ data.id }} .sppb-carousel-extended-nav-control .nav-control { border-style: solid; }';


        // Control Hover
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_background');
        $output .= $lodash->color('color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_color');
        $output .= $lodash->border('border-color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_border_color');

        $output .= '<# } #>';

        // Carousel bullet
        $output .= '<# if(data.carousel_bullet){ #>';

        //Bullet position
        $output .= $lodash->unit('bottom', '.sppb-carousel-extended-dots', 'data.bullet_position_verti', '%');
        $output .= $lodash->unit('left', '.sppb-carousel-extended-dots', 'data.bullet_position_hori', 'px');

        // Dots
        $output .= $lodash->unit('height', '.sppb-carousel-extended-dots ul li', 'data.bullet_height', 'px', false);
        $output .= $lodash->unit('line-height', '.sppb-carousel-extended-dots ul li', '(data.bullet_height)-(data.bullet_border_width)', 'px', false);
        $output .= $lodash->unit('border-width', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_width', 'px', false);
        $output .= '#sppb-addon-{{ data.id }} .sppb-carousel-extended-dots ul li { border-style: solid; }';
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-dots ul li', 'data.bullet_background');
        $output .= $lodash->unit('border-radius', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_radius', 'px', false);
        $output .= $lodash->unit('width', '.sppb-carousel-extended-dots ul li', 'data.bullet_width', 'px', false);
        $output .= $lodash->border('border-color', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_color');

        // hover
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-dots ul li:hover span, .sppb-carousel-extended-dots ul li.active span', 'data.bullet_active_background');
        $output .= '<# } #>';

        $output .= $lodash->color('background-color', '.sppb-carousel-extended-item-overlay', 'data.overlay_gradient');

        // Title
        $titleTypographyFallbacks = [
            'font'           => 'data.content_title_font_family',
            'size'           => 'data.content_title_fontsize',
            'line_height'    => 'data.content_title_lineheight',
            'letter_spacing' => 'data.content_title_letterspace',
            'uppercase'      => 'data.content_title_font_style?.uppercase',
            'italic'         => 'data.content_title_font_style?.italic',
            'underline'      => 'data.content_title_font_style?.underline',
            'weight'         => 'data.content_title_font_style?.weight',
        ];

        $output .= $lodash->typography('.sppb-carousel-extended-heading', 'data.content_title_typography', $titleTypographyFallbacks);
        $output .= $lodash->color('color', '.sppb-carousel-extended-heading', 'data.content_title_text_color');
        $output .= $lodash->spacing('margin', '.sppb-carousel-extended-heading', 'data.content_title_margin');

        // Sub Title
        $subtitleTypographyFallbacks = [
            'font'           => 'data.content_subtitle_font_family',
            'size'           => 'data.content_subtitle_fontsize',
            'line_height'    => 'data.content_subtitle_lineheight',
            'letter_spacing' => 'data.content_subtitle_letterspace',
            'uppercase'      => 'data.content_subtitle_font_style?.uppercase',
            'italic'         => 'data.content_subtitle_font_style?.italic',
            'underline'      => 'data.content_subtitle_font_style?.underline',
            'weight'         => 'data.content_subtitle_font_style?.weight',
        ];

        $output .= $lodash->typography('.sppb-carousel-extended-subheading', 'data.content_subtitle_typography', $subtitleTypographyFallbacks);
        $output .= $lodash->color('color', '.sppb-carousel-extended-subheading', 'data.content_subtitle_text_color');

        // Description
        $descriptionTypographyFallbacks = [
            'font'           => 'data.description_font_family',
            'size'           => 'data.description_fontsize',
            'line_height'    => 'data.description_lineheight',
            'letter_spacing' => 'data.description_letterspace',
            'uppercase'      => 'data.description_font_style?.uppercase',
            'italic'         => 'data.description_font_style?.italic',
            'underline'      => 'data.description_font_style?.underline',
            'weight'         => 'data.description_font_style?.weight',
        ];

        $output .= $lodash->typography('.sppb-carousel-extended-description', 'data.description_typography', $descriptionTypographyFallbacks);
        $output .= $lodash->spacing('margin', '.sppb-carousel-extended-description', 'data.description_margin');
        $output .= $lodash->color('color', '.sppb-carousel-extended-description', 'data.description_text_color');

        $output .= '
        </style>
        <#
        
        let carousel_height_xl = data.carousel_height.xl || 500;
        let carousel_height_lg = data.carousel_height.lg || 500;
        let carousel_height_md = data.carousel_height.md || 500;
        let carousel_height_sm = data.carousel_height.sm || 400;
        let carousel_height_xs = data.carousel_height.xs || 300;

        var left_arrow ="";
        var right_arrow = "";
        if(data.arrow_icon=="long_arrow"){
            left_arrow ="fa-long-arrow-left";
            right_arrow = "fa-long-arrow-right";
        } else {
            left_arrow ="fa-angle-left";
            right_arrow = "fa-angle-right";
        }
        
        let carousel_item_number_xl = 3;
        let carousel_item_number_lg = 3;
        let carousel_item_number_md = 3;
        let carousel_item_number_sm = 3;
        let carousel_item_number_xs = 1;
        if(_.isObject(data.carousel_item_number)){
            carousel_item_number_xl = data.carousel_item_number.xl
            carousel_item_number_lg = data.carousel_item_number.lg
            carousel_item_number_md = data.carousel_item_number.md
            carousel_item_number_sm = data.carousel_item_number.sm
            carousel_item_number_xs = data.carousel_item_number.xs
        }
        
        let carousel_center_padding_xl = +data.carousel_center_padding.xl ?? 180;
        let carousel_center_padding_lg = +data.carousel_center_padding.lg ?? 180;
        let carousel_center_padding_md = +data.carousel_center_padding.md ?? 180;
        let carousel_center_padding_sm = +data.carousel_center_padding.sm ?? 90;
        let carousel_center_padding_xs = +data.carousel_center_padding.xs ?? 50;
        #>
            <div class="sppb-addon sppb-carousel-extended {{data.class}} sppb-image-carousel-{{data.image_carousel_layout}}" 
            data-left-arrow="{{left_arrow}}" 
            data-right-arrow="{{right_arrow}}" 
            data-arrow="{{data.carousel_arrow}}" 
            data-dots="{{data.carousel_bullet}}" 
            data-image-layout="{{data.image_carousel_layout}}" 
            data-autoplay="{{data.carousel_autoplay}}" 
            data-speed="{{data.carousel_speed}}" 
            data-interval="{{data.carousel_interval}}" 
            data-margin="{{data.carousel_margin}}" 
            {{{(data.image_carousel_layout == "layout3" || data.image_carousel_layout == "layout4") ? `data-padding-xl="${carousel_center_padding_xl}"` : ""}}} 
            {{{(data.image_carousel_layout == "layout3" || data.image_carousel_layout == "layout4") ? `data-padding-lg="${carousel_center_padding_lg}"` : ""}}} 
            {{{(data.image_carousel_layout == "layout3" || data.image_carousel_layout == "layout4") ? `data-padding-md="${carousel_center_padding_md}"` : ""}}} 
            {{{(data.image_carousel_layout == "layout3" || data.image_carousel_layout == "layout4") ? `data-padding-sm="${carousel_center_padding_sm}"` : ""}}} 
            {{{(data.image_carousel_layout == "layout3" || data.image_carousel_layout == "layout4") ? `data-padding-xs="${carousel_center_padding_xs}"` : ""}}} 
            data-height-xl="{{carousel_height_xl}}" 
            data-height-lg="{{carousel_height_lg}}" 
            data-height-md="{{carousel_height_md}}" 
            data-height-sm="{{carousel_height_sm}}" 
            data-height-xs="{{carousel_height_xs}}" 
            data-item-number-xl="{{carousel_item_number_xl || 3}}"  
            data-item-number-lg="{{carousel_item_number_lg || 3}}" 
            data-item-number-md="{{carousel_item_number_md || 3}}" 
            data-item-number-sm="{{carousel_item_number_sm || 3}}" 
            data-item-number-xs="{{carousel_item_number_xs || 1}}" 
            {{{data.image_carousel_layout == "layout1" && data.carousel_fade ?  `data-fade="${data.carousel_fade}"` : ""}}}>
                <# if(_.isArray(data.sp_image_carousel_item)){
                    _.each(data.sp_image_carousel_item, function(carousel_item){
                    
                        var carouselImg = {}
                        if (typeof carousel_item.image_carousel_img !== "undefined" && typeof carousel_item.image_carousel_img.src !== "undefined") {
                            carouselImg = carousel_item.image_carousel_img
                        } else {
                            carouselImg = {src: carousel_item.image_carousel_img}
                        }
                #>
                        <div class="sppb-carousel-extended-item">
                            <#
                            const isUrlObj = _.isObject(carousel_item?.image_carousel_img_link) && (!!carousel_item?.image_carousel_img_link?.url || !!carousel_item?.image_carousel_img_link?.page || !!carousel_item?.image_carousel_img_link?.menu);
                            const isUrlString = _.isString(carousel_item?.image_carousel_img_link) && carousel_item?.image_carousel_img_link !== "";
                            
                            if(isUrlObj || isUrlString){
                                const isTarget = carousel_item?.link_open_new_window ? "_blank" : "";
                                const urlObj = carousel_item?.image_carousel_img_link?.url ?  carousel_item?.image_carousel_img_link : window.getSiteUrl(carousel_item?.image_carousel_img_link, isTarget);
                                const {url, new_tab, nofollow, noopener, noreferrer, type, } = urlObj;
                                const target = new_tab ? "_blank" : "";

                                let rel="";
								rel += nofollow ? "nofollow": "";
								rel += noopener ? " noopener": "";
								rel += noreferrer ? " noreferrer": "";
                                
                                const _url= (type === "url" && url) || (type === "menu" && urlObj.menu) || ((type === "page" && !!urlObj.page) && "index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
                            #>
                                <# if(_url){ #>
                                    <a href=\'{{_url}}\' target=\'{{target}}\' rel=\'{{rel}}\' >
                                <# }#>
                            <# }
                            if(carouselImg.src && carouselImg.src.indexOf("http://") == -1 && carouselImg.src.indexOf("https://") == -1){
                            #>
                                <img src=\'{{ pagebuilder_base + carouselImg.src }}\' alt="{{ carousel_item.item_title }}">
                            <# } else if(carouselImg.src){ #>
                                <img src=\'{{ carouselImg.src }}\' alt="{{ carousel_item.item_title }}">
                            <# }
                            if(data.carousel_overlay){
                            #>
                                <div class="sppb-carousel-extended-item-overlay"></div>
                            <# }
                            if(data.image_carousel_layout !== ""){
                            #>
                                <div class="sppb-carousel-extended-content-wrap">
                                
                                    <# if(carousel_item.item_title){ #>
                                        <div class="sppb-carousel-extended-heading">
                                            {{carousel_item.item_title}}
                                        </div>
                                    <# } 
                                    if(carousel_item.item_subtitle) { 
                                    #>
                                        <div class="sppb-carousel-extended-subheading">
                                            {{carousel_item.item_subtitle}}
                                        </div>
                                    <# } 
                                    if(carousel_item.item_description) {
                                    #>
                                        <div class="sppb-carousel-extended-description">
                                            {{{carousel_item.item_description}}}
                                        </div>
                                    <# } #>
                                </div>
                            <# }
                            if(isUrlObj || isUrlString){
                            #>
                                </a>
                            <# } #>
                        </div>
                    <#
                    })
                } #>
            </div>
        ';
        return $output;
    }
}
