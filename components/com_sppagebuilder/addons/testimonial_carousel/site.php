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

class SppagebuilderAddonTestimonial_carousel extends SppagebuilderAddons
{

    public function render()
    {
        $settings = $this->addon->settings;

        $class = (isset($settings->class) && $settings->class) ? ' ' . $settings->class : '';
        $testimonial_carousel_layout = (isset($settings->testimonial_carousel_layout) && $settings->testimonial_carousel_layout) ? $settings->testimonial_carousel_layout : '';
        $carousel_autoplay = (isset($settings->carousel_autoplay) && $settings->carousel_autoplay) ? $settings->carousel_autoplay : 0;
        $carousel_speed = (isset($settings->carousel_speed) && $settings->carousel_speed) ? $settings->carousel_speed : 1500;
        $carousel_interval = (isset($settings->carousel_interval) && $settings->carousel_interval) ? $settings->carousel_interval : 4500;
        $carousel_margin = (isset($settings->carousel_margin) && $settings->carousel_margin) ? $settings->carousel_margin : 0;
        $carousel_item_number_xl = (isset($settings->carousel_item_number_original->xl) && $settings->carousel_item_number_original->xl) ? $settings->carousel_item_number_original->xl : 3;
        $carousel_item_number_lg = (isset($settings->carousel_item_number_original->lg) && $settings->carousel_item_number_original->lg) ? $settings->carousel_item_number_original->lg : 3;
        $carousel_item_number_md = (isset($settings->carousel_item_number_original->md) && $settings->carousel_item_number_original->md) ? $settings->carousel_item_number_original->md : 3;
        $carousel_item_number_sm = (isset($settings->carousel_item_number_original->sm) && $settings->carousel_item_number_original->sm) ? $settings->carousel_item_number_original->sm : 3;
        $carousel_item_number_xs = (isset($settings->carousel_item_number_original->xs) && $settings->carousel_item_number_original->xs) ? $settings->carousel_item_number_original->xs : 1;
        $carousel_bullet = (isset($settings->carousel_bullet) && $settings->carousel_bullet) ? $settings->carousel_bullet : 0;

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

        //Quote icon
        $quote_icon = '';
        if (isset($settings->show_quote_icon) && $settings->show_quote_icon)
        {
            $quote_icon .= '<div class="sppb-testimonial-carousel-icon">';
            $quote_icon .= '<i class="fa fa-quote-left" aria-hidden="true"></i>';
            $quote_icon .= '</div>';
        }

        //Output
        $output = '<div class="sppb-addon sppb-carousel-extended' . $class . ' sppb-testimonial-carousel-' . $testimonial_carousel_layout . '"
		data-left-arrow="' . $left_arrow . '"
		data-right-arrow="' . $right_arrow . '"
		data-arrow="' . $carousel_arrow . '"
		data-dots="' . $carousel_bullet . '"
		data-testi-layout="' . $testimonial_carousel_layout . '"
		data-autoplay="' . $carousel_autoplay . '"
		data-speed="' . $carousel_speed . '"
		data-interval="' . $carousel_interval . '"
		data-margin="' . $carousel_margin . '"
		data-item-number-xl="' . $carousel_item_number_xl . '"
		data-item-number-lg="' . $carousel_item_number_lg . '"
		data-item-number-md="' . $carousel_item_number_md . '"
		data-item-number-sm="' . $carousel_item_number_sm . '"
		data-item-number-xs="' . $carousel_item_number_xs . '">';

        if (isset($settings->sp_testimonial_carousel_item) && is_array($settings->sp_testimonial_carousel_item))
        {
            foreach ($settings->sp_testimonial_carousel_item as $item_key => $carousel_item)
            {
                $uniqId = 'sppb-testi-' . $this->addon->id . '-carousel-item-key-' . $item_key;
                $client_details = '';

                $carousel_img = isset($carousel_item->testimonial_carousel_img) && $carousel_item->testimonial_carousel_img ? $carousel_item->testimonial_carousel_img : '';
                $carousel_img_src = isset($carousel_img->src) ? $carousel_img->src : $carousel_img;

                $client_details .= '<div class="sppb-testimonial-carousel-content-wrap">';
                if ($carousel_img_src)
                {
                    $client_details .= '<div class="sppb-testimonial-carousel-img-wrap">';
                    $client_details .= '<img src="' . $carousel_img_src . '" alt="' . (isset($carousel_item->client_name) ? $carousel_item->client_name : '') . '">';
                    $client_details .= '</div>';
                }

                $client_details .= '<div class="sppb-testimonial-carousel-name-designation">';
                if (isset($carousel_item->client_name))
                {
                    $client_details .= '<div class="sppb-testimonial-carousel-name">';
                    $client_details .= $carousel_item->client_name;
                    $client_details .= '</div>';
                }

                if (isset($carousel_item->client_desgination))
                {
                    $client_details .= '<div class="sppb-testimonial-carousel-designation">';
                    $client_details .= $carousel_item->client_desgination;
                    $client_details .= '</div>';
                }
                $client_details .= '</div>';
                $client_details .= '</div>';

                $rating = '';
                if (isset($carousel_item->show_rating) && $carousel_item->show_rating)
                {
                    $rating .= '<div class="sppb-testimonial-carousel-client-rating rating-key-' . $item_key . '"><span class="sppb-testimonial-carousel-rating"></span></div>';
                }

                $output .= '<div id="' . $uniqId . '" class="sppb-carousel-extended-item">';
                if ($testimonial_carousel_layout == 'testi_layout1')
                {
                    $output .= $quote_icon;
                }

                if ($testimonial_carousel_layout == 'testi_layout2')
                {
                    $output .= $client_details;
                };

                $output .= '<div class="sppb-testimonial-carousel-item-content">';
                if ($testimonial_carousel_layout == 'testi_layout2' || $testimonial_carousel_layout == 'testi_layout3')
                {
                    $output .= $rating;
                };

                if (isset($carousel_item->client_message))
                {
                    $output .= '<div class="sppb-testimonial-carousel-message">';
                    $output .= $carousel_item->client_message;
                    $output .= '</div>';
                }

                if ($testimonial_carousel_layout == 'testi_layout1')
                {
                    $output .= $rating;
                };
                $output .= '</div>';
                if ($testimonial_carousel_layout == 'testi_layout1' || $testimonial_carousel_layout == 'testi_layout3')
                {
                    $output .= $client_details;
                };

                if ($testimonial_carousel_layout == 'testi_layout2')
                {
                    $output .= $quote_icon;
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

    public function css()
    {
        $settings = $this->addon->settings;
        $addon_id = '#sppb-addon-' . $this->addon->id;
        $cssHelper = new CSSHelper($addon_id);

        $css = '';

        $settings->arrow_border_width = (isset($settings->arrow_border_width) && $settings->arrow_border_width) ? $settings->arrow_border_width : 0;
        $settings->bullet_border_width = (isset($settings->bullet_border_width) && $settings->bullet_border_width) ? $settings->bullet_border_width : 0;

        $testimonial_carousel_layout = (isset($settings->testimonial_carousel_layout) && $settings->testimonial_carousel_layout) ? $settings->testimonial_carousel_layout : '';
        //Arrow Style
        $carousel_arrow = (isset($settings->carousel_arrow) && $settings->carousel_arrow) ? $settings->carousel_arrow : 1;

        $settings->arrow_line_height = (isset($settings->arrow_height) && $settings->arrow_height) ? (int) $settings->arrow_height - (int) $settings->arrow_border_width : null;

        if ($carousel_arrow)
        {
            $carouselArrowProps = [
                'arrow_height' => 'height',
                'arrow_line_height' => 'line-height',
                'arrow_width' => 'width',
                'arrow_background' => 'background',
                'arrow_color' => 'color',
                'arrow_font_size' => 'font-size',
                'arrow_border_width' => 'border-style: solid; border-width',
                'arrow_border_color' => 'border-color',
                'arrow_border_radius' => 'border-radius',
                'arrow_position_verti' => 'margin-top',
                'arrow_position_hori' => ['margin-left', 'margin-right'],
            ];
            $carouselArrowUnits = [
                'arrow_background' => false,
                'arrow_color' => false,
                'arrow_border_color' => false,
                'arrow_position_verti' => '%',
                'arrow_position_hori' => 'px',
            ];

            $carouselArrowHoverProps = [
                'arrow_hover_background' => 'background',
                'arrow_hover_color' => 'color',
                'arrow_hover_border_color' => 'border-color',
            ];
            $carouselArrowHoverUnits = [
                'arrow_hover_background' => false,
                'arrow_hover_color' => false,
                'arrow_hover_border_color' => false,
            ];
            $arrowStyle = '';
            $arrowStyle .= $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control', $settings, $carouselArrowProps, $carouselArrowUnits);
            $arrowHoverStyle = $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control:hover', $settings, $carouselArrowHoverProps, $carouselArrowHoverUnits);

            $css .= $arrowStyle;
            $css .= $arrowHoverStyle;
        }
        //Bullet Style
        $carousel_bullet = (isset($settings->carousel_bullet) && $settings->carousel_bullet) ? $settings->carousel_bullet : 1;

        $settings->bullet_line_height = (isset($settings->bullet_height) && $settings->bullet_height) ? (($settings->bullet_height) - ($settings->bullet_border_width)) : "";

        if ($carousel_bullet)
        {
            $carouselBulletProps = [
                'bullet_width' => 'width',
                'bullet_background' => 'background',
                'bullet_height' => 'height',
                'bullet_line_height' => 'line-height',
                'bullet_color' => 'color',
                'bullet_font_size' => 'font-size',
                'bullet_border_width' => 'border-style: solid; border-width',
                'bullet_border_color' => 'border-color',
                'bullet_border_radius' => 'border-radius',
            ];

            $carouselBulletUnits = [
                'bullet_background' => false,
                'bullet_color' => false,
                'bullet_border_color' => false,
            ];

            $carouselBulletHoverProps = [
                'bullet_active_background' => 'background',
            ];

            $carouselBulletHoverUnits = [
                'bullet_active_background' => false,
            ];

            $bulletStyle = '';
            $bulletStyle .= $cssHelper->generateStyle('.sppb-carousel-extended-dots ul li', $settings, $carouselBulletProps, $carouselBulletUnits);
            $bulletStyle .= $cssHelper->generateStyle('.sppb-carousel-extended-dots', $settings, ['bullet_position_verti' => 'bottom', 'bullet_position_hori' => 'left'], ['bullet_position_verti' => '%', 'bullet_position_hori' => 'px']);
            $bulletHoverStyle = $cssHelper->generateStyle('.sppb-carousel-extended-dots ul li:hover span, .sppb-carousel-extended-dots ul li.active span', $settings, $carouselBulletHoverProps, $carouselBulletHoverUnits);

            $css .= $bulletStyle;
            $css .= $bulletHoverStyle;
        }

        //Avatar style
        $avatar_layout = (isset($settings->avatar_layout) && $settings->avatar_layout) ? $settings->avatar_layout : '';
        $settings->content_alignment = $cssHelper->parseAlignment($settings, 'content_alignment');
        $settings->content_alignment_wrap = $cssHelper->parseAlignment($settings, 'content_alignment', false);
        $margin = '';
        if ($testimonial_carousel_layout !== 'testi_layout3')
        {
            if ($avatar_layout == 'avatar_layout1')
            {
                $margin = 'margin-right';
            }
            elseif ($avatar_layout == 'avatar_layout2')
            {
                $margin = 'margin-left';
            }
            elseif ($avatar_layout == 'avatar_layout3')
            {
                $margin = 'margin-bottom';
            }
            elseif ($avatar_layout == 'avatar_layout4')
            {
                $margin = 'margin-top';
            }
        }

        $avatarStyleProps = [
            'avatar_height' => 'height',
            'avatar_width' => 'width',
            'avatar_gap' => $margin,
        ];

        $avatarStyle = $cssHelper->generateStyle('.sppb-testimonial-carousel-img-wrap', $settings, $avatarStyleProps);
        $css .= $avatarStyle;

        if (!empty($settings->content_alignment_wrap) && is_object($settings->content_alignment_wrap))
        {
            $css .= $addon_id . ' .sppb-testimonial-carousel-img-wrap {';
            if ($settings->content_alignment_wrap->xl == "left" /*|| $settings->content_alignment_wrap->lg == "left" || $settings->content_alignment_wrap->md == "left" || $settings->content_alignment_wrap->sm == "left" || $settings->content_alignment_wrap->xs == "left"*/)
            {
                $css .= 'margin-right: auto;';
            }
            elseif ($settings->content_alignment_wrap->xl == "right" && $testimonial_carousel_layout == 'testi_layout3' && $avatar_layout != 'avatar_layout1'/*|| $settings->content_alignment_wrap->lg == "right" || $settings->content_alignment_wrap->md == "right" || $settings->content_alignment_wrap->sm == "right" || $settings->content_alignment_wrap->xs == "right"*/)
            {
                $css .= 'margin-left: auto;';
            }
            elseif ($settings->content_alignment_wrap->xl == "center" /*|| $settings->content_alignment_wrap->lg == "center" || $settings->content_alignment_wrap->md == "center" || $settings->content_alignment_wrap->sm == "center" || $settings->content_alignment_wrap->xs == "center"*/)
            {
                $css .= 'margin-left: auto;';
                $css .= 'margin-right: auto;';
            }
            $css .= '}';
        }

        $avatarBorderRadiusStyle = $cssHelper->generateStyle('.sppb-testimonial-carousel-img-wrap img', $settings, ['avatar_border_radius' => 'border-radius']);
        $css .= $avatarBorderRadiusStyle;

        if ($testimonial_carousel_layout == 'testi_layout3')
        {
            // $css .= $cssHelper->generateStyle('.sppb-testimonial-carousel-content-wrap', $settings, ['content_alignment_wrap' => 'align-items'], false);
            $css .= $addon_id . ' .sppb-testimonial-carousel-content-wrap {';
            $css .= 'align-items: initial;';
            $css .= 'flex-direction: column;';
            $css .= '}';
        }
        else
        {
            if ($avatar_layout == 'avatar_layout2')
            {
                $css .= $addon_id . ' .sppb-testimonial-carousel-content-wrap {';
                $css .= 'flex-direction: row-reverse;';
                $css .= '}';
                $css .= $addon_id . ' .sppb-testimonial-carousel-name-designation {';
                $css .= 'text-align: right;';
                $css .= '}';
            }
            elseif ($avatar_layout == 'avatar_layout3')
            {
                // $css .= $cssHelper->generateStyle('.sppb-testimonial-carousel-content-wrap', $settings, ['content_alignment_wrap' => 'align-items'], false);
                $css .= $addon_id . ' .sppb-testimonial-carousel-content-wrap {';
                $css .= 'align-items: initial;';
                $css .= 'flex-direction: column;';
                $css .= '}';
            }
            elseif ($avatar_layout == 'avatar_layout4')
            {
                // $css .= $cssHelper->generateStyle('.sppb-testimonial-carousel-content-wrap', $settings, ['content_alignment_wrap' => 'align-items'], false);
                $css .= $addon_id . ' .sppb-testimonial-carousel-content-wrap {';
                $css .= 'align-items: initial;';
                $css .= 'flex-direction: column-reverse;';
                $css .= '}';
            }

            if ($avatar_layout == 'avatar_layout1')
            {
                $css .= $addon_id . ' .sppb-testimonial-carousel-name-designation {';
                $css .= 'text-align: left;';
                $css .= '}';
            }
        }

        //Quote icon style
        if ($testimonial_carousel_layout == 'testi_layout1')
        {
            $margin = 'margin-bottom';
        }
        elseif ($testimonial_carousel_layout == 'testi_layout2')
        {
            $margin = 'margin-top';
        }

        $quoteStyleProps = [
            'quote_icon_size' => 'font-size',
            'quote_icon_color' => 'color',
            'quote_icon_gap' => $margin,
        ];

        $quoteStyleUnits = [
            'quote_icon_color' => false,
        ];

        $quoteStyle = $cssHelper->generateStyle('.sppb-testimonial-carousel-icon', $settings, $quoteStyleProps, $quoteStyleUnits);
        $css .= $quoteStyle;

        //Rating style
        $marginRating = '';
        if ($testimonial_carousel_layout == 'testi_layout1' || $testimonial_carousel_layout == 'testi_layout3')
        {
            $marginRating = 'margin-bottom';
        }
        elseif ($testimonial_carousel_layout == 'testi_layout2')
        {
            $marginRating = 'margin-top';
        }
        $ratingStyle = $cssHelper->generateStyle('.sppb-testimonial-carousel-rating', $settings, ['rating_size' => 'font-size', 'rating_color' => 'color', 'rating_gap' => $marginRating], ['rating_color' => false]);

        $css .= $ratingStyle;

        if (isset($settings->sp_testimonial_carousel_item) && is_array($settings->sp_testimonial_carousel_item))
        {
            foreach ($settings->sp_testimonial_carousel_item as $item_key => $carousel_item)
            {
                $uniqId = '#sppb-testi-' . $this->addon->id . '-carousel-item-key-' . $item_key;
                $css .= $uniqId . '.sppb-carousel-extended-item .sppb-testimonial-carousel-rating:before {';
                $css .= 'width:' . ((20 * $carousel_item->client_rating) - 2) . '%';
                $css .= '}';
            }
        }

        //Name style
        $nameTypographyStyle = $cssHelper->typography('.sppb-testimonial-carousel-name', $settings, 'name_typography', [
            'font'           => 'name_font_family',
            'size'           => 'name_fontsize',
            'line_height'    => 'name_lineheight',
            'letter_spacing' => 'name_letterspace',
            'uppercase'      => 'name_font_style.uppercase',
            'italic'         => 'name_font_style.italic',
            'underline'      => 'name_font_style.underline',
            'weight'         => 'name_font_style.weight',
        ]);

        $css .= $nameTypographyStyle;

        $nameStyle = $cssHelper->generateStyle('.sppb-testimonial-carousel-name', $settings, ['name_text_color' => 'color', 'name_margin' => 'margin'], ['name_text_color' => false, 'name_margin' => false]);
        $css .= $nameStyle;

        //Designation style
        $designationStyle = $cssHelper->generateStyle('.sppb-testimonial-carousel-designation', $settings, ['designation_text_color' => 'color'], false);
        $css .= $designationStyle;

        $designationTypographyStyle = $cssHelper->typography('.sppb-testimonial-carousel-designation ', $settings, 'title_typography', [
            'font' => 'designation_font_family',
            'size' => 'designation_fontsize',
            'line_height' => 'designation_lineheight',
            'letter_spacing' => 'designation_letterspace',
            'uppercase' => 'designation_font_style.uppercase',
            'italic' => 'designation_font_style.italic',
            'underline' => 'designation_font_style.underline',
            'weight' => 'designation_font_style.weight',
        ]);

        $css .= $designationTypographyStyle;

        //Message style
        $itemContentProps = [
            'message_margin_bottom' => ($testimonial_carousel_layout == 'testi_layout3') ? 'margin-bottom' : null,
            'message_background' => ($testimonial_carousel_layout == 'testi_layout3') ? 'background' : null,
            'message_border_radius' => ($testimonial_carousel_layout == 'testi_layout3') ? 'border-radius' : null,
            'message_padding' => ($testimonial_carousel_layout == 'testi_layout3') ? 'padding' : null,
        ];

        $css .= $cssHelper->generateStyle('.sppb-testimonial-carousel-item-content', $settings, $itemContentProps, ['message_background' => false, 'message_padding' => false], ['message_padding' => 'spacing']);

        $messageStyleProps = [
            'message_text_color' => 'color',
            'message_margin_top' => 'margin-top',
            'message_margin_bottom' => ($testimonial_carousel_layout != 'testi_layout3') ? 'margin-bottom' : null,
        ];

        $messageStyleUnits = [
            'message_text_color' => false,
        ];

        $messageStyle = $cssHelper->generateStyle('.sppb-testimonial-carousel-message', $settings, $messageStyleProps, $messageStyleUnits);
        $css .= $messageStyle;

        $messageTypographyFallbacks = [
            'font' => 'message_font_family',
            'size' => 'message_fontsize',
            'line_height' => 'message_lineheight',
            'letter_spacing' => 'message_letterspace',
            'uppercase' => 'message_font_style.uppercase',
            'italic' => 'message_font_style.italic',
            'underline' => 'message_font_style.underline',
            'weight' => 'message_font_style.weight',
        ];

        $messageTypography = $cssHelper->typography('.sppb-testimonial-carousel-message', $settings, 'message_typography', $messageTypographyFallbacks);
        $css .= $messageTypography;

        $arrowHeightStyle = $cssHelper->generateStyle('.sppb-carousel-extended-nav-control', $settings, ['arrow_height' => 'top: -%s']);
        $css .= $arrowHeightStyle;

        //Item style
        $itemStyle = $cssHelper->generateStyle('.sppb-carousel-extended-item', $settings, ['content_alignment' => 'text-align', 'content_background' => 'background', 'content_padding' => 'padding', 'content_border_radius' => 'border-radius'], ['content_background' => false, 'content_padding' => false, 'content_alignment' => false], ['content_padding' => 'spacing']);
        $css .= $itemStyle;

        return $css;
    }

    public static function getTemplate()
    {
        $lodash = new Lodash('#sppb-addon-{{ data.id }}');
        $output = '
		<style  type="text/css">';

        $output .= '<# if (data.carousel_arrow) { #>';
        $output .= $lodash->unit('margin-top', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_verti', '%');
        $output .= $lodash->unit('margin-left', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_hori', 'px');
        $output .= $lodash->unit('margin-right', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_hori', 'px');
        $output .= $lodash->unit('font-size', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_font_size', 'px', false);
        $output .= $lodash->unit('border-radius', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_radius', 'px', false);
        $output .= $lodash->unit('width', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_width', 'px', false);
        //normal
        $output .= $lodash->border('border-color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_color');
        $output .= $lodash->color('color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_color');
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_background');
        // hover
        $output .= $lodash->border('border-color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_border_color');
        $output .= $lodash->color('color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_color');
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_background');
        $output .= '<# if (data.arrow_height) { #>';
        $output .= $lodash->unit('height', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_height', 'px', false);
        $output .= '<# let lineHeight = data.arrow_height - ((data.arrow_border_width != undefined) ? data.arrow_border_width : 0);#>';
        $output .= $lodash->unit('line-height', '.sppb-carousel-extended-nav-control .nav-control', 'lineHeight', 'px', false);
        $output .= '<# } #>';
        $output .= '<# if (data.arrow_border_width) { #>';
        $output .= $lodash->unit('border-width', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_width', 'px', false);
        $output .= '#sppb-addon-{{ data.id }} .sppb-carousel-extended-nav-control .nav-control { border-style: solid; }';
        $output .= '<# } #>';
        $output .= $lodash->unit('top', '.sppb-carousel-extended-nav-control', 'data.arrow_height', 'px', false, '-');
        $output .= '<# } #>';

        // Bullet
        $output .= '<# if (data.carousel_bullet) { #>';
        $output .= $lodash->unit('bottom', '.sppb-carousel-extended-dots', 'data.bullet_position_verti', '%');
        $output .= $lodash->unit('left', '.sppb-carousel-extended-dots', 'data.bullet_position_hori', 'px');
        $output .= ' <# if (data.bullet_height) { #>';
        $output .= $lodash->unit('height', '.sppb-carousel-extended-dots ul li', 'data.bullet_height', 'px', false);
        $output .= $lodash->unit('line-height', '.sppb-carousel-extended-dots ul li', '(data.bullet_height)-(data.bullet_border_width)', 'px', false);
        $output .= '<# } #>';
        $output .= ' <# if (data.bullet_height) { #>';
        $output .= $lodash->unit('border-width', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_width', 'px', false);
        //$output .= '#sppb-addon-{{ data.id }} .sppb-carousel-extended-dots ul li { border-style: solid; }';
        $output .= '<# } #>';
        $output .= $lodash->unit('border-radius', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_radius', 'px', false);
        $output .= $lodash->unit('width', '.sppb-carousel-extended-dots ul li', 'data.bullet_width', 'px', false);
        $output .= $lodash->border('border-color', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_color');
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-dots ul li', 'data.bullet_background');
        $output .= $lodash->color('background-color', '.sppb-carousel-extended-dots ul li:hover span, .sppb-carousel-extended-dots ul li.active span', 'data.bullet_active_background');
        $output .= '<# } #>';

        $output .= $lodash->unit('border-radius', '.sppb-testimonial-carousel-item-content', 'data.content_border_radius', 'px');
        $output .= $lodash->unit('height', '.sppb-testimonial-carousel-img-wrap', 'data.avatar_height', 'px');
        $output .= $lodash->unit('width', '.sppb-testimonial-carousel-img-wrap', 'data.avatar_width', 'px');
        $output .= $lodash->unit('border-radius', '.sppb-testimonial-carousel-img-wrap img', 'data.avatar_border_radius', 'px', false);

        $output .= $lodash->unit('font-size', '.sppb-testimonial-carousel-icon', 'data.quote_icon_size', 'px');
        $output .= $lodash->color('color', '.sppb-testimonial-carousel-icon', 'data.quote_icon_color');

        $output .= $lodash->unit('font-size', '.sppb-testimonial-carousel-rating', 'data.rating_size', 'px');
        $output .= $lodash->color('color', '.sppb-testimonial-carousel-rating', 'data.rating_color');

        $output .= '<# if (data.testimonial_carousel_layout === "testi_layout1") { #>';
        $output .= $lodash->unit('margin-bottom', '.sppb-testimonial-carousel-rating', 'data.quote_icon_gap', 'px');
        $output .= '<# } #>';

        $output .= '<# if (data.testimonial_carousel_layout === "testi_layout1" ||  data.testimonial_carousel_layout === "testi_layout3") { #>';
        $output .= $lodash->unit('margin-bottom', '.sppb-testimonial-carousel-icon', 'data.quote_icon_gap', 'px');
        $output .= $lodash->unit('margin-bottom', '.sppb-testimonial-carousel-rating', 'data.rating_gap', 'px');
        $output .= '<# } #>';
        $output .= '<# if (data.testimonial_carousel_layout === "testi_layout2") { #>';
        $output .= $lodash->unit('margin-top', '.sppb-testimonial-carousel-icon', 'data.quote_icon_gap', 'px');
        $output .= $lodash->unit('margin-top', '.sppb-testimonial-carousel-rating', 'data.rating_gap', 'px');
        $output .= '<# } #>';

        $output .= '<# if (data.content_alignment === "sppb-text-left" || (_.isObject(data.content_alignment) && data.content_alignment.xl === "left")) {#>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-img-wrap { margin-right:auto;}';
        $output .= '<# } else if ((data.testimonial_carousel_layout != "testi_layout3" && data.avatar_layout == "avatar_layout1" && data.content_alignment == "sppb-text-right") || ((_.isObject(data.content_alignment) && data.content_alignment.xl == "right") && data.testimonial_carousel_layout != "testi_layout3" && data.avatar_layout == "avatar_layout1")) {#>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-img-wrap { margin-left:auto;}';
        $output .= '<# } else if ((data.testimonial_carousel_layout == "testi_layout3" && data.content_alignment == "sppb-text-right") || ((_.isObject(data.content_alignment) && data.content_alignment.xl == "right") && data.testimonial_carousel_layout == "testi_layout3")) {#>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-img-wrap { margin-left:auto;}';
        $output .= '<# } else if (data.content_alignment == "sppb-text-center" || (_.isObject(data.content_alignment) && data.content_alignment.xl == "center")) {#>';
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-img-wrap { margin-left:auto; margin-right:auto;}';
        $output .= '<# } #>';

        $output .= '<# if (data.testimonial_carousel_layout != "testi_layout3") { #>';
        $output .= '<# if (data.avatar_layout == "avatar_layout1") { #>';
        $output .= $lodash->unit('margin-right', '.sppb-testimonial-carousel-img-wrap', 'data.avatar_gap', 'px');
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-name-designation { text-align: left; }';
        $output .= '<# } #>';

        $output .= '<# if (data.avatar_layout == "avatar_layout2") { #>';
        $output .= $lodash->unit('margin-left', '.sppb-testimonial-carousel-img-wrap', 'data.avatar_gap', 'px');
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-content-wrap { flex-direction: row-reverse; }';
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-name-designation { text-align: right;}';
        $output .= '<# } #>';

        $output .= '<# if (data.avatar_layout == "avatar_layout3") { #>';
        $output .= $lodash->unit('margin-bottom', '.sppb-testimonial-carousel-img-wrap', 'data.avatar_gap', 'px');
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-content-wrap { align-items: initial; flex-direction: column;}';
        $output .= '<# } #>';

        $output .= '<# if (data.avatar_layout == "avatar_layout4") { #>';
        $output .= $lodash->unit('margin-top', '.sppb-testimonial-carousel-img-wrap', 'data.avatar_gap', 'px');
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-content-wrap { align-items: initial; flex-direction: column-reverse;}';
        $output .= '<# } #>';
        $output .= '<# } #>';

        $output .= '<# if (data.testimonial_carousel_layout == "testi_layout3") { #>';
        $output .= $lodash->unit('border-radius', '.sppb-testimonial-carousel-item-content', 'data.message_border_radius', 'px');
        $output .= $lodash->color('background-color', '.sppb-testimonial-carousel-item-content', 'data.message_background');
        $output .= $lodash->unit('margin-bottom', '.sppb-testimonial-carousel-item-content', 'data.message_margin_bottom', 'px');
        $output .= $lodash->spacing('padding', '.sppb-testimonial-carousel-item-content', 'data.message_padding');
        $output .= '#sppb-addon-{{ data.id }} .sppb-testimonial-carousel-content-wrap { align-items: initial; flex-direction: column;}';
        $output .= '<# } #>';

        $nameTypographyFallbacks = [
            'font' => 'data.name_font_family',
            'size' => 'data.name_fontsize',
            'line_height' => 'data.name_lineheight',
            'letter_spacing' => 'data.name_letterspace',
            'uppercase' => 'data.name_font_style?.uppercase',
            'italic' => 'data.name_font_style?.italic',
            'underline' => 'data.name_font_style?.underline',
            'weight' => 'data.name_font_style?.weight',
        ];

        $output .= $lodash->typography('.sppb-testimonial-carousel-name', 'data.name_typography', $nameTypographyFallbacks);
        $output .= $lodash->color('color', '.sppb-testimonial-carousel-name', 'data.name_text_color');
        $output .= $lodash->spacing('margin', '.sppb-testimonial-carousel-name', 'data.name_margin');

        $messageTypographyFallbacks = [
            'font' => 'data.message_font_family',
            'size' => 'data.message_fontsize',
            'line_height' => 'data.message_lineheight',
            'letter_spacing' => 'data.message_letterspace',
            'uppercase' => 'data.message_font_style?.uppercase',
            'italic' => 'data.message_font_style?.italic',
            'underline' => 'data.message_font_style?.underline',
            'weight' => 'data.message_font_style?.weight',
        ];

        $output .= $lodash->typography('.sppb-testimonial-carousel-message', 'data.message_typography', $messageTypographyFallbacks);
        $output .= $lodash->color('color', '.sppb-testimonial-carousel-message', 'data.message_text_color');
        $output .= $lodash->unit('margin-top', '.sppb-testimonial-carousel-message', 'data.message_margin_top', 'px');
        
        $output .= '<# if (data.testimonial_carousel_layout !== "testi_layout3") { #>';
        $output .= $lodash->unit('margin-bottom', '.sppb-testimonial-carousel-message', 'data.message_margin_bottom', 'px');
        $output .= '<# } #>';

        $titleTypographyFallbacks = [
            'font' => 'data.designation_font_family',
            'size' => 'data.designation_fontsize',
            'line_height' => 'data.designation_lineheight',
            'letter_spacing' => 'data.designation_letterspace',
            'uppercase' => 'data.designation_font_style?.uppercase',
            'italic' => 'data.designation_font_style?.italic',
            'underline' => 'data.designation_font_style?.underline',
            'weight' => 'data.designation_font_style?.weight',
        ];

        $output .= $lodash->typography('.sppb-testimonial-carousel-designation', 'data.title_typography', $titleTypographyFallbacks);
        $output .= $lodash->color('color', '.sppb-testimonial-carousel-designation', 'data.designation_text_color');

        $output .= $lodash->color('background-color', '.sppb-carousel-extended-item', 'data.content_background');
        $output .= $lodash->spacing('padding', '.sppb-carousel-extended-item', 'data.content_padding');
        $output .= $lodash->alignment('text-align', '.sppb-carousel-extended-item', 'data.content_alignment');

        $output .= '
			<# if(_.isArray(data.sp_testimonial_carousel_item)){
				_.each(data.sp_testimonial_carousel_item, function(carousel_item, caro_index){
					const uniqId = `#sppb-testi-${data.id}-carousel-item-key-${caro_index}`;
			#>
					{{uniqId}}.sppb-carousel-extended-item .sppb-testimonial-carousel-rating:before {
						width:{{(20 * carousel_item.client_rating)-2}}%;
					}
				<# })
			} #>
		</style>
		<#
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
		let carousel_item_number_sm = 2;
		let carousel_item_number_xs = 1;
		if (_.isObject(data.carousel_item_number))
		{
			carousel_item_number_xl = data.carousel_item_number.xl
			carousel_item_number_lg = data.carousel_item_number.lg
			carousel_item_number_md = data.carousel_item_number.md
			carousel_item_number_sm = data.carousel_item_number.sm
			carousel_item_number_xs = data.carousel_item_number.xs
		}

		let quote_icon = "";
		if (data.show_quote_icon)
		{
			quote_icon += `<div class="sppb-testimonial-carousel-icon">`;
			quote_icon += `<i class="fa fa-quote-left" aria-hidden="true"></i>`;
			quote_icon += `</div>`;
		}

		#>
			<div class="sppb-addon sppb-carousel-extended {{data.class}} sppb-testimonial-carousel-{{data.testimonial_carousel_layout}}"
				data-left-arrow="{{left_arrow}}"
				data-right-arrow="{{right_arrow}}"
				data-arrow="{{data.carousel_arrow}}"
				data-dots="{{data.carousel_bullet}}"
				data-testi-layout="{{data.testimonial_carousel_layout}}"
				data-autoplay="{{data.carousel_autoplay}}"
				data-speed="{{data.carousel_speed}}"
				data-interval="{{data.carousel_interval}}"
				data-margin="{{data.carousel_margin}}"
				data-item-number-xl="{{carousel_item_number_xl || 3}}"
				data-item-number-lg="{{carousel_item_number_lg || 3}}"
				data-item-number-md="{{carousel_item_number_md || 3}}"
				data-item-number-sm="{{carousel_item_number_sm || 3}}"
				data-item-number-xs="{{carousel_item_number_xs || 1}}">
				<# if(_.isArray(data.sp_testimonial_carousel_item)){
					_.each(data.sp_testimonial_carousel_item, function(carousel_item, caro_index){
					const uniqId= `sppb-testi-${data.id}-carousel-item-key-${caro_index}`;
					let client_details = "";
					var carouselImg = {}
					if (typeof carousel_item.testimonial_carousel_img !== "undefined" && typeof carousel_item.testimonial_carousel_img.src !== "undefined") {
						carouselImg = carousel_item.testimonial_carousel_img
					} else {
						carouselImg = {src: carousel_item.testimonial_carousel_img}
					}
					client_details += `<div class="sppb-testimonial-carousel-content-wrap">`;
						if(carouselImg.src){
							client_details += `<div class="sppb-testimonial-carousel-img-wrap">`;
							client_details += `<img src=${carouselImg.src} alt=${carousel_item.client_name}>`;
							client_details += `</div>`;
						}
						client_details += `<div class="sppb-testimonial-carousel-name-designation">`;
							if(carousel_item.client_name){
								client_details += `<div class="sppb-testimonial-carousel-name">`;
								client_details += `${carousel_item.client_name}`;
								client_details += `</div>`;
							}
							if(carousel_item.client_desgination){
								client_details += `<div class="sppb-testimonial-carousel-designation">`;
								client_details += `${carousel_item.client_desgination}`;
								client_details += `</div>`;
							}
						client_details += `</div>`;
					client_details += `</div>`;

					let rating = "";
					if(carousel_item.show_rating){
						rating += `<div class="sppb-testimonial-carousel-client-rating"><span class="sppb-testimonial-carousel-rating"></span></div>`;
					}
				#>
						<div id="{{uniqId}}" class="sppb-carousel-extended-item">
							<# if(data.testimonial_carousel_layout == "testi_layout1"){ #>
								{{{quote_icon}}}
							<# }

							if(data.testimonial_carousel_layout == "testi_layout2"){
							#>
								{{{client_details}}}
							<# } #>

							<div class="sppb-testimonial-carousel-item-content">
							<# if(data.testimonial_carousel_layout == "testi_layout2" || data.testimonial_carousel_layout == "testi_layout3"){ #>
								{{{rating}}}
							<# }

							if(carousel_item.client_message) {
							#>
								<div class="sppb-testimonial-carousel-message">
									{{carousel_item.client_message}}
								</div>
							<# }

							if(data.testimonial_carousel_layout == "testi_layout1"){
							#>
								{{{rating}}}
							<# } #>
							</div>

							<# if(data.testimonial_carousel_layout == "testi_layout1" || data.testimonial_carousel_layout == "testi_layout3"){ #>
								{{{client_details}}}
							<# }

							if(data.testimonial_carousel_layout == "testi_layout2"){
							#>
								{{{quote_icon}}}
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
