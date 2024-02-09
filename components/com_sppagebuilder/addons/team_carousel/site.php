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

class SppagebuilderAddonTeam_carousel extends SppagebuilderAddons
{

	public function render()
	{
		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? ' ' . $settings->class : '';
		$team_carousel_layout = (isset($settings->team_carousel_layout) && $settings->team_carousel_layout) ? $settings->team_carousel_layout : 'layout1';
		$carousel_autoplay = (isset($settings->carousel_autoplay) && $settings->carousel_autoplay) ? $settings->carousel_autoplay : 0;
		$carousel_speed = (isset($settings->carousel_speed) && $settings->carousel_speed) ? $settings->carousel_speed : 2500;
		$carousel_interval = (isset($settings->carousel_interval) && $settings->carousel_interval) ? $settings->carousel_interval : 4500;
		$carousel_margin = (isset($settings->carousel_margin) && $settings->carousel_margin) ? $settings->carousel_margin : 0;
		$carousel_item_number_xl = (isset($settings->carousel_item_number_xl) && $settings->carousel_item_number_xl) ? $settings->carousel_item_number_xl : 3;
		$carousel_item_number_lg = (isset($settings->carousel_item_number_lg) && $settings->carousel_item_number_lg) ? $settings->carousel_item_number_lg : 3;
		$carousel_item_number_md = (isset($settings->carousel_item_number_md) && $settings->carousel_item_number_md) ? $settings->carousel_item_number_md : 3;
		$carousel_item_number_sm = (isset($settings->carousel_item_number_sm) && $settings->carousel_item_number_sm) ? $settings->carousel_item_number_sm : 3;
		$carousel_item_number_xs = (isset($settings->carousel_item_number_xs) && $settings->carousel_item_number_xs) ? $settings->carousel_item_number_xs : 1;
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


		$output  = '<div class="sppb-addon sppb-carousel-extended' . $class . ' sppb-team-carousel-' . $team_carousel_layout . '" data-left-arrow="' . $left_arrow . '" data-right-arrow="' . $right_arrow . '" data-arrow="' . $carousel_arrow . '" data-dots="' . $carousel_bullet . '" data-team-layout="' . $team_carousel_layout . '" data-autoplay="' . $carousel_autoplay . '" data-speed="' . $carousel_speed . '" data-interval="' . $carousel_interval . '" data-margin="' . $carousel_margin . '" data-item-number-xl="' . $carousel_item_number_xl . '" data-item-number-lg="' . $carousel_item_number_lg . '" data-item-number-md="' . $carousel_item_number_md . '" data-item-number-sm="' . $carousel_item_number_sm . '" data-item-number-xs="' . $carousel_item_number_xs . '">';

		if (isset($settings->sp_team_carousel_item) && is_array($settings->sp_team_carousel_item))
		{
			foreach ($settings->sp_team_carousel_item as $item_key => $carousel_item)
			{
				$carousel_img = isset($carousel_item->team_carousel_img) && $carousel_item->team_carousel_img ? $carousel_item->team_carousel_img : '';
				$carousel_img_src = isset($carousel_img->src) ? $carousel_img->src : $carousel_img;
				$personProfileLink = '';

				if (isset($carousel_item->person_profile_link))
				{
					$personProfileLink = EditorUtils::stringifyLinkItem($carousel_item->person_profile_link);
				}

				$content = '';
				$content .= '<div class="sppb-carousel-extended-team-content' . ($team_carousel_layout ? ' sppb-carousel-' . $team_carousel_layout : '') . '">';

				if ($team_carousel_layout == 'layout2')
				{
					$content .= '<div class="sppb-carousel-extended-item-overlay"></div>';
				}

				$content .= '<div class="sppb-carousel-extended-team-content-wrap">';

				if (isset($carousel_item->person_name))
				{
					$content .= '<div class="sppb-carousel-extended-team-name">';

					if (!empty($personProfileLink->url))
					{
						$content .= '<a href="' . $personProfileLink->url . '" ' . $personProfileLink->attributes . '>';
					}

					$content .= $carousel_item->person_name;

					if (!empty($personProfileLink->url))
					{
						$content .= '</a>';
					}

					$content .= '</div>';
				}

				if (isset($carousel_item->person_designation))
				{
					$content .= '<div class="sppb-carousel-extended-team-designation">';
					$content .= $carousel_item->person_designation;
					$content .= '</div>';
				}
				if (isset($carousel_item->team_carousel_item) && is_array($carousel_item->team_carousel_item))
				{
					$content .= '<ul class="sppb-carousel-extended-team-social-icon">';

					foreach ($carousel_item->team_carousel_item as $inner_item_key => $inner_item_value)
					{
						$socialUrl = EditorUtils::stringifyLinkItem($inner_item_value->social_url);
						$innerItemTitle = $inner_item_value->title ?? '';
						$content .= '<li>';
						$content .= '<a href="' . $socialUrl->url . '" ' . $socialUrl->attributes . ' aria-label="' . $innerItemTitle . '" >';
						$content .= !empty($inner_item_value->social_icon) ? '<i class="' . $inner_item_value->social_icon . '" aria-hidden="true" title="' . $innerItemTitle . '"></i>' : $innerItemTitle;
						$content .= '</a>';
						$content .= '</li>';
					}

					$content .= '</ul>';
				}
				$content .= '</div>';
				$content .= '</div>';

				$output .= '<div class="sppb-carousel-extended-item">';

				if ($team_carousel_layout == 'layout1')
				{
					if ($personProfileLink)
					{
						$output .= '<a href="' . $personProfileLink->url . '" ' . $personProfileLink->attributes . '>';
					}

					$output .= '<img src="' . $carousel_img_src . '" alt="' . (isset($carousel_item->person_name) ? $carousel_item->person_name : '') . '">';

					if ($personProfileLink)
					{
						$output .= '</a>';
					}

					$output .= $content;
				}
				elseif ($team_carousel_layout == 'layout2')
				{
					if ($personProfileLink)
					{
						$output .= '<a href="' . $personProfileLink->url . '" ' . $personProfileLink->attributes . '>';
					}

					$output .= '<img src="' . $carousel_img_src . '" alt="' . (isset($carousel_item->person_name) ? $carousel_item->person_name : '') . '">';

					if ($personProfileLink)
					{
						$output .= '</a>';
					}

					$output .= $content;
				}
				else
				{
					$output .= '<div class="sppb-carousel-extended-team-wrap">';
					$output .= '<div class="sppb-carousel-extended-team-img">';

					if ($personProfileLink)
					{
						$output .= '<a href="' . $personProfileLink->url . '" ' . $personProfileLink->attributes . '>';
					}

					$output .= '<img src="' . $carousel_img_src . '" alt="' . (isset($carousel_item->person_name) ? $carousel_item->person_name : '') . '">';

					if ($personProfileLink)
					{
						$output .= '</a>';
					}

					$output .= '</div>';
					$output .= $content;
					$output .= '</div>';
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
		$cssHelper =  new CSSHelper($addon_id);
		$css = '';

		$contentLayoutColorStyle = $cssHelper->generateStyle('.sppb-carousel-extended-team-content.sppb-carousel-layout1', $settings, ['content_bg_color' => 'background'], false);
		$contentWrapColorStyle = $cssHelper->generateStyle('.sppb-team-carousel-layout3 .sppb-carousel-extended-team-wrap', $settings, ['content_bg_color' => 'background'], false);
		$css .= $contentLayoutColorStyle;
		$css .= $contentWrapColorStyle;
		//Arrow Style
		$carousel_arrow = (isset($settings->carousel_arrow) && $settings->carousel_arrow) ? $settings->carousel_arrow : 1;

		if ($carousel_arrow)
		{
			$arrowStyle = '';
			$arrowStyleProps = [
				'arrow_height'        => ['height', 'line-height'],
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
				'arrow_border_color'  => false,
			];
			$arrowStyle .= $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control', $settings, $arrowStyleProps, $arrowStyleUnits);
			$arrowStyle .= $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control', $settings, ['arrow_position_verti' => 'margin-top', 'arrow_position_hori' => ['margin-left', 'margin-right']], ['arrow_position_verti' => '%', 'arrow_position_hori' => 'px']);

			$arrowHoverStyle = '';
			$arrowHoverStyleProps = [
				'arrow_hover_background'    => 'background',
				'arrow_hover_color'         => 'color',
				'arrow_hover_border_color'  => 'border-color'
			];
			$arrowHoverStyleUnits = [
				'arrow_hover_background'    => false,
				'arrow_hover_color'         => false,
				'arrow_hover_border_color'  => false,
			];
			$arrowHoverStyle .= $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control:hover', $settings, $arrowHoverStyleProps, $arrowHoverStyleUnits);
			$arrowHoverStyle .= $cssHelper->generateStyle('.sppb-carousel-extended-nav-control .nav-control:hover', $settings, ['arrow_position_verti' => 'margin-top', 'arrow_position_hori' => ['margin-left', 'margin-right']], ['arrow_position_verti' => '%', 'arrow_position_hori' => 'px']);

			$css .= $arrowStyle;
			$css .= $arrowHoverStyle;
		}

		$css .= $cssHelper->generateStyle('.sppb-carousel-extended-nav-control', $settings, ['arrow_height' => 'top: -%s']);
		//Bullet Style
		$carousel_bullet = (isset($settings->carousel_bullet) && $settings->carousel_bullet) ? $settings->carousel_bullet : 1;
		if ($carousel_bullet)
		{
			$bulletStyleProps = [
				'bullet_height'        => ['height', 'line-height'],
				'bullet_width'         => 'width',
				'bullet_background'    => 'background',
				'bullet_color'         => 'color',
				'bullet_font_size'     => 'font-size',
				'bullet_border_width'  => 'border-style: solid;border-width',
				'bullet_border_color'  => 'border-color',
				'bullet_border_radius' => 'border-radius'
			];
			$bulletStyleUnits = [
				'bullet_background'    => false,
				'bullet_color'         => false,
				'bullet_border_color'  => false,
			];

			$css .= $cssHelper->generateStyle('.sppb-carousel-extended-dots ul li', $settings, $bulletStyleProps, $bulletStyleUnits);
			$css .= $cssHelper->generateStyle('.sppb-carousel-extended-dots', $settings, ['bullet_position_verti'  => 'bottom', 'bullet_position_hori' => 'left'], ['bullet_position_verti'  => '%', 'bullet_position_hori' => 'px']);
			$css .= $cssHelper->generateStyle('.sppb-carousel-extended-dots ul li:hover span, .sppb-carousel-extended-dots ul li.active span', $settings, ['bullet_active_background'  => 'background'], false);
		}

		//Overlay
		$settings->overlay_gradient = CSSHelper::parseColor($settings, 'overlay_gradient');
		$css .= $cssHelper->generateStyle('.sppb-carousel-extended-item-overlay', $settings, ['overlay_gradient' => 'background'], false);

		//Content name style
		$nameStyle = $cssHelper->generateStyle('.sppb-carousel-extended-team-name, sppb-carousel-extended-team-name a', $settings, ['content_name_text_color' => 'color', 'content_name_margin' => 'margin'], ['content_name_text_color' => false, 'content_name_margin' => false], ['content_name_margin' => 'spacing']);
		$nameTypographyStyle = $cssHelper->typography('.sppb-carousel-extended-team-name, sppb-carousel-extended-team-name a', $settings, 'name_typography');

		//Content designation style
		$designationStyle = $cssHelper->generateStyle('.sppb-carousel-extended-team-designation', $settings, ['content_designation_text_color' => 'color'], false);
		$designationTypographyStyle = $cssHelper->typography('.sppb-carousel-extended-team-designation', $settings, 'designation_typography');

		$css .= $nameStyle;
		$css .= $nameTypographyStyle;
		$css .= $designationStyle;
		$css .= $designationTypographyStyle;

		//Social icon style        
		$socialStyleProps = [
			'social_fontsize'      => 'font-size',
			'social_text_color'    => 'color',
			'social_width'         => 'width',
			'social_height'        => 'height',
			'social_border_width'  => 'border-style:solid;border-width',
			'social_border_color'  => 'border-color',
			'social_border_radius' => 'border-radius'
		];
		$socialStyleUnits = [
			'social_text_color'    => false,
			'social_border_color'  => false
		];

		$socialStyle = $cssHelper->generateStyle('.sppb-carousel-extended-team-social-icon a', $settings, $socialStyleProps, $socialStyleUnits);
		$socialHoverStyle = $cssHelper->generateStyle('.sppb-carousel-extended-team-social-icon a:hover', $settings, ['social_hover_color' => 'color'], ['social_hover_color' => false]);
		$socialMarginStyle = $cssHelper->generateStyle('.sppb-carousel-extended-team-social-icon li ', $settings, ['social_margin' => 'margin'], ['social_margin' => false], ['social_margin' => 'spacing']);

		$css .= $socialStyle;
		$css .= $socialHoverStyle;
		$css .= $socialMarginStyle;

		return $css;
	}

	public static function getTemplate()
	{

		$lodash = new Lodash('#sppb-addon-{{ data.id }}');
		$output = '
        <style  type="text/css">';

		$output .= $lodash->color('background-color', '.sppb-carousel-extended-item-overlay', 'data.overlay_gradient');
		$output .= $lodash->color('background-color', '.sppb-carousel-extended-team-content.sppb-carousel-layout1', 'data.content_bg_color');
		$output .= $lodash->color('background-color', '.sppb-team-carousel-layout3 .sppb-carousel-extended-team-wrap', 'data.content_bg_color');

		// Name
		$nameTypographyFallbacks = [
			'font'           => 'data.content_name_font_family',
			'size'           => 'data.content_name_fontsize',
			'line_height'    => 'data.content_name_lineheight',
			'letter_spacing' => 'data.content_name_letterspace',
			'uppercase'      => 'data.content_name_font_style?.uppercase',
			'italic'         => 'data.content_name_font_style?.italic',
			'underline'      => 'data.content_name_font_style?.underline',
			'weight'         => 'data.content_name_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-carousel-extended-team-name, .sppb-carousel-extended-team-name a', 'data.name_typography', $nameTypographyFallbacks);
		$output .= $lodash->color('color', '.sppb-carousel-extended-team-name, .sppb-carousel-extended-team-name a', 'data.content_name_text_color');
		$output .= $lodash->spacing('margin', '.sppb-carousel-extended-team-name, .sppb-carousel-extended-team-name a', 'data.content_name_margin');

		// Designation
		$designationTypographyFallbacks = [
			'font'           => 'data.content_designation_font_family',
			'size'           => 'data.content_designation_fontsize',
			'line_height'    => 'data.content_designation_lineheight',
			'letter_spacing' => 'data.content_designation_letterspace',
			'uppercase'      => 'data.content_designation_font_style?.uppercase',
			'italic'         => 'data.content_designation_font_style?.italic',
			'underline'      => 'data.content_designation_font_style?.underline',
			'weight'         => 'data.content_designation_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-carousel-extended-team-designation', 'data.designation_typography', $designationTypographyFallbacks);
		$output .= $lodash->color('color', '.sppb-carousel-extended-team-designation', 'data.content_designation_text_color');

		$output .= $lodash->spacing('margin', '.sppb-carousel-extended-team-social-icon li', 'data.social_margin');
		// Icon Normal
		$output .= $lodash->unit('font-size', '.sppb-carousel-extended-team-social-icon a', 'data.social_fontsize', 'px');
		$output .= $lodash->unit('width', '.sppb-carousel-extended-team-social-icon a', 'data.social_width', 'px');
		$output .= $lodash->unit('height', '.sppb-carousel-extended-team-social-icon a', 'data.social_height', 'px');
		$output .= $lodash->unit('line-height', '.sppb-carousel-extended-team-social-icon a', 'data.social_height', 'px');
		$output .= $lodash->unit('border-width', '.sppb-carousel-extended-team-social-icon a', 'data.social_border_width', 'px');
		$output .= $lodash->unit('border-radius', '.sppb-carousel-extended-team-social-icon a', 'data.social_border_radius', 'px');
		$output .= '#sppb-addon-{{ data.id }} .sppb-carousel-extended-team-social-icon a { <# if(data.social_border_width) { #> border-style: solid; <# } #> } ';
		$output .= $lodash->border('border-color', '.sppb-carousel-extended-team-social-icon a', 'data.social_border_color');
		$output .= $lodash->color('color', '.sppb-carousel-extended-team-social-icon a', 'data.social_text_color');
		// Icon Hover
		$output .= $lodash->color('color', '.sppb-carousel-extended-team-social-icon a:hover', 'data.social_hover_color');

		$output .= '<# if (data.carousel_arrow) { #>';
		$output .= $lodash->unit('height', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_height', 'px', false);
		$output .= $lodash->unit('line-height', '.sppb-carousel-extended-nav-control .nav-control', '(data.arrow_height)-(data.arrow_border_width)', 'px', false);
		$output .= $lodash->unit('border-width', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_width', 'px', false);
		$output .= $lodash->unit('border-radius', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_radius', 'px', false);
		$output .= $lodash->unit('font-size', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_font_size', 'px', false);
		$output .= $lodash->unit('margin-top', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_verti', '%');
		$output .= $lodash->unit('margin-left', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_hori', 'px');
		$output .= $lodash->unit('margin-right', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_position_hori', 'px');
		$output .= $lodash->unit('width', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_width', 'px', false);
		// Normal
		$output .= $lodash->color('background-color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_background');
		$output .= $lodash->color('color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_color');
		$output .= $lodash->border('border-color', '.sppb-carousel-extended-nav-control .nav-control', 'data.arrow_border_color');
		$output .= '#sppb-addon-{{ data.id }} .sppb-carousel-extended-nav-control .nav-control { border-style: solid;}';
		$output .= $lodash->unit('top', '.sppb-carousel-extended-nav-control', 'data.arrow_height', 'px', false, '-');
		// Hover
		$output .= $lodash->color('background-color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_background');
		$output .= $lodash->color('color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_color');
		$output .= $lodash->border('border-color', '.sppb-carousel-extended-nav-control .nav-control:hover', 'data.arrow_hover_border_color');
		$output .= '<# } #>';

		// Bullet
		$output .= '<# if (data.carousel_bullet) { #>';
		$output .= $lodash->unit('bottom', '.sppb-carousel-extended-dots', 'data.bullet_position_verti', '%');
		$output .= $lodash->unit('left', '.sppb-carousel-extended-dots', 'data.bullet_position_hori', 'px');

		$output .= $lodash->unit('height', '.sppb-carousel-extended-dots ul li', 'data.bullet_height', 'px');
		$output .= $lodash->unit('line-height', '.sppb-carousel-extended-dots ul li', '(data.bullet_height)-(data.bullet_border_width)', 'px');
		$output .= $lodash->unit('border-width', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_width', 'px');
		$output .= $lodash->unit('border-radius', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_radius', 'px');
		$output .= $lodash->unit('width', '.sppb-carousel-extended-dots ul li', 'data.bullet_width', 'px');
		$output .= $lodash->color('background-color', '.sppb-carousel-extended-dots ul li', 'data.bullet_background');
		$output .= $lodash->color('color', '.sppb-carousel-extended-dots ul li', 'data.bullet_border_color');
		$output .= '#sppb-addon-{{ data.id }} .sppb-carousel-extended-dots ul li { <# if (data.bullet_border_width) { #> border-style: solid; <# } #> }';
		$output .= $lodash->color('background-color', '.sppb-carousel-extended-dots ul li:hover span, .sppb-carousel-extended-dots ul li.active span', 'data.bullet_active_background');
		$output .= '<# } #>';

		$output .= '
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
        #>
            <div class="sppb-addon sppb-carousel-extended {{data.class}} sppb-team-carousel-{{data.team_carousel_layout}}" data-left-arrow="{{left_arrow}}" data-right-arrow="{{right_arrow}}" data-arrow="{{data.carousel_arrow}}" data-dots="{{data.carousel_bullet}}" data-team-layout="{{data.team_carousel_layout}}" data-autoplay="{{data.carousel_autoplay}}" data-speed="{{data.carousel_speed}}" data-interval="{{data.carousel_interval}}" data-margin="{{data.carousel_margin}}" data-item-number-xl="{{carousel_item_number_xl || 3}}" data-item-number-lg="{{carousel_item_number_lg || 3}}" data-item-number-md="{{carousel_item_number_md || 3}}" data-item-number-sm="{{carousel_item_number_sm || 2}}" data-item-number-xs="{{carousel_item_number_xs || 1}}">
                <# if(_.isArray(data.sp_team_carousel_item)){
                    _.each(data.sp_team_carousel_item, function(carousel_item){
						const profileLink = carousel_item.person_profile_link;
						const isUrlObject = _.isObject(profileLink) && ( !!profileLink?.url || !!profileLink?.page || !!profileLink?.menu);
						const isUrlString = _.isString(profileLink) && profileLink !== "";

						let target;
						let profileHref;
						let rel;
					
						if(isUrlObject || isUrlString){
							const urlObj = profileLink?.url ? profileLink : window.getSiteUrl(profileLink);
							const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;

							const profileUrl = (type === "url" && url) || (type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page)  && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
							target = new_tab ? `target="_blank"` : "";

							let relData="";
							relData += nofollow ? "nofollow" : "";
							relData += noopener ? " noopener" : "";
							relData += noreferrer ? " noreferrer" : "";

							rel = `rel="${relData}"`;
						
							profileHref = profileUrl ? `href=${profileUrl}`: "";
						}

                        let content = "";
                        content += `<div class="sppb-carousel-extended-team-content sppb-carousel-${data.team_carousel_layout}">`;
                        var carouselImg = {}
                        if (typeof carousel_item.team_carousel_img !== "undefined" && typeof carousel_item.team_carousel_img.src !== "undefined") {
                            carouselImg = carousel_item.team_carousel_img
                        } else {
                            carouselImg = {src: carousel_item.team_carousel_img}
                        }
                        if(data.team_carousel_layout == "layout2"){
                            content += `<div class="sppb-carousel-extended-item-overlay"></div>`;
                        } 
                        content += `<div class="sppb-carousel-extended-team-content-wrap">`;
                            if(carousel_item.person_name){
                                content += `<div class="sppb-carousel-extended-team-name">`;
                                if(!!profileHref){
                                    content += `<a ${profileHref} ${target} ${rel} >`;
                                }
                                content += `${carousel_item.person_name}`;
                                if(!!profileHref){
                                    content += `</a>`;
                                }
                                content += `</div>`;
                            } 
                            if(carousel_item.person_designation) {
                                content += `<div class="sppb-carousel-extended-team-designation">${carousel_item.person_designation}</div>`;
                            }
                            if( _.isArray(carousel_item.team_carousel_item)){
                                content += `<ul class="sppb-carousel-extended-team-social-icon">`;
                                    _.each(carousel_item.team_carousel_item, function(inner_item_value){
										const socialUrl = inner_item_value.social_url;
										const isUrlObject = _.isObject(socialUrl) && ( !!socialUrl?.url || !!socialUrl?.page || !!socialUrl?.menu);
										const isUrlString = _.isString(socialUrl) && socialUrl !== "";

										let socialTarget;
										let socialHref;
										let socialRel;
									
										if(isUrlObject || isUrlString){
											const urlObj = socialUrl?.url ? socialUrl : window.getSiteUrl(socialUrl);
											const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;

											const profileUrl = (type === "url" && url) || (type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page)  && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
											socialTarget = new_tab ? `target="_blank"` : "";

											let relData="";
											relData += nofollow ? "nofollow" : "";
											relData += noopener ? " noopener" : "";
											relData += noreferrer ? " noreferrer" : "";

											socialRel = `rel="${relData}"`;
										
											socialHref = profileUrl ? `href=${profileUrl}`: "";
										}
										
                                        content += `<li>`;
                                        content += `<a ${socialHref} ${socialRel} ${socialTarget} aria-label="${inner_item_value.title}"><i class="${inner_item_value.social_icon}" aria-hidden="true" title="${inner_item_value.title}"></i></a>`;
                                        content += `</li>`;
                                    })
                                content += `</ul>`;
                            }
                        content += `</div>`;
                        content += `</div>`;
                		#>
                        <div class="sppb-carousel-extended-item">
                            <#
                            if(data.team_carousel_layout == "layout1"){
                                if(carouselImg.src && carouselImg.src.indexOf("http://") == -1 && carouselImg.src.indexOf("https://") == -1){

                                if(profileHref){
                                #>
                                    <a {{profileHref}} {{target}} {{rel}} >
                                <# } #>
                                    <img src=\'{{ pagebuilder_base + carouselImg.src }}\' alt="{{ carousel_item.person_name }}">
                                <# if(profileHref){ #>
                                    </a>
                                <# } #>
                                <# } else if(carouselImg.src){
                                    if(profileHref){
                                #>
                                        <a {{profileHref}} {{target}} {{rel}} >
                                    <# } #>
                                    <img src=\'{{ carouselImg.src }}\' alt="{{ carousel_item.person_name }}">
                                    <# if(profileHref){ #>
                                        </a>
                                    <# } #>
                                <# } #>
                                {{{content}}}
                            <# } else if(data.team_carousel_layout == "layout2") {
                                if(carouselImg.src && carouselImg.src.indexOf("http://") == -1 && carouselImg.src.indexOf("https://") == -1){
                                if(profileHref){
                                #>
                                    <a {{profileHref}} {{target}} {{rel}} >
                                <# } #>
                                    <img src=\'{{ pagebuilder_base + carouselImg.src }}\' alt="{{ carousel_item.person_name }}">
                                <# if(profileHref){ #>
                                    </a>
                                <# } #>
                                <# } else if(carouselImg.src){
                                    if(profileHref){
                                    #>
                                        <a {{profileHref}} {{target}} {{rel}} >
                                    <# } #>
                                    <img src=\'{{ carouselImg.src }}\' alt="{{ carousel_item.person_name }}">
                                    <# if(profileHref){ #>
                                        </a>
                                    <# } #>
                                <# } #>
                                    {{{content}}}
                            <# } else { #>
                                <div class="sppb-carousel-extended-team-wrap">
                                    <div class="sppb-carousel-extended-team-img">
                                        <# if(carouselImg.src && carouselImg.src.indexOf("http://") == -1 && carouselImg.src.indexOf("https://") == -1){
                                            if(profileHref){
                                            #>
                                                <a {{profileHref}} {{target}} {{rel}} >
                                            <# } #>
                                            <img src=\'{{ pagebuilder_base + carouselImg.src }}\' alt="{{ carousel_item.person_name }}">
                                            <# if(profileHref){ #>
                                                </a>
                                            <# } #>
                                        <# } else if(carouselImg.src){
                                            if(profileHref){
                                            #>
                                                <a {{profileHref}} {{target}} {{rel}} >
                                            <# } #>
                                            <img src=\'{{ carouselImg.src }}\' alt="{{ carousel_item.person_name }}">
                                            <# if(profileHref){ #>
                                                </a>
                                            <# } #>
                                        <# } #>
                                    </div>
                                    {{{content}}}
                                </div>
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
