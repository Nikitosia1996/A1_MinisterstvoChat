<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Uri\Uri;

class SppagebuilderAddonPerson extends SppagebuilderAddons
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

		// Options
		$image = (isset($settings->image) && $settings->image) ? $settings->image : '';
		$image_src = isset($image->src) ? $image->src : $image;
		$image_width = (isset($image->width) && $image->width) ? $image->width : '';
		$image_height = (isset($image->height) && $image->height) ? $image->height : '';

		$name 				= (isset($settings->name) && $settings->name) ? $settings->name : '';
		$designation 	= (isset($settings->designation) && $settings->designation) ? $settings->designation : '';
		$email 				= (isset($settings->email) && $settings->email) ? $settings->email : '';
		$introtext 		= (isset($settings->introtext) && $settings->introtext) ? $settings->introtext : '';
		$facebook 		= (isset($settings->facebook) && $settings->facebook) ? $settings->facebook : '';
		$twitter 			= (isset($settings->twitter) && $settings->twitter) ? $settings->twitter : '';
		$google_plus 	= (isset($settings->google_plus) && $settings->google_plus) ? $settings->google_plus : '';
		$youtube 			= (isset($settings->youtube) && $settings->youtube) ? $settings->youtube : '';
		$linkedin 		= (isset($settings->linkedin) && $settings->linkedin) ? $settings->linkedin : '';
		$pinterest 		= (isset($settings->pinterest) && $settings->pinterest) ? $settings->pinterest : '';
		$flickr 			= (isset($settings->flickr) && $settings->flickr) ? $settings->flickr : '';
		$dribbble 		= (isset($settings->dribbble) && $settings->dribbble) ? $settings->dribbble : '';
		$behance 			= (isset($settings->behance) && $settings->behance) ? $settings->behance : '';
		$instagram 		= (isset($settings->instagram) && $settings->instagram) ? $settings->instagram : '';
		$social_position = (isset($settings->social_position) && $settings->social_position) ? $settings->social_position : '';
		$alignment 		= (isset($settings->alignment) && $settings->alignment) ? $settings->alignment : '';
		$person_style_preset 		= (isset($settings->person_style_preset) && $settings->person_style_preset) ? $settings->person_style_preset : '';
		$content_position = '';

		list($link, $target) = AddonHelper::parseLink($settings, 'title_link');

		if ($person_style_preset === 'layout1') {
			$content_position = 'person-content-position-bottom-left';
		} elseif ($person_style_preset === 'layout2') {
			$content_position = 'person-content-position-half-overlay';
		} elseif ($person_style_preset === 'layout3') {
			$content_position = 'person-content-position-full-overlay';
		}

		// Lazy image loading
		$placeholder = $image_src === '' ? false : $this->get_image_placeholder($image_src);

		if (strpos($image_src, "http://") !== false || strpos($image_src, "https://") !== false) {
			$image_src = $image_src;
		} else {
			if ($image_src) {
				$original_src = Uri::base(true) . '/' . $image_src;
				$image_src = SppagebuilderHelperSite::cleanPath($original_src);
			}
		}

		// Output start
		$output = '';
		$social_icons = '';

		if ($facebook || $twitter || $youtube || $linkedin || $pinterest || $flickr || $dribbble || $behance || $instagram) {
			$social_icons  	.= '<div class="sppb-person-social-icons">';
			$social_icons 	.= '<ul class="sppb-person-social">';

			if ($facebook) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $facebook . '" aria-label="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" title="Facebook"></i></a></li>';
			if ($twitter) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $twitter . '" aria-label="Twitter"><i class="fab fa-twitter" aria-hidden="true" title="Twitter"></i></a></li>';
			if ($youtube) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $youtube . '" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true" title="YouTube"></i></a></li>';
			if ($linkedin) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $linkedin . '" aria-label="LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true" title="LinkedIn"></i></a></li>';
			if ($pinterest) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $pinterest . '" aria-label="Pinterest"><i class="fab fa-pinterest" aria-hidden="true" title="Pinterest"></i></a></li>';
			if ($flickr) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $flickr . '" aria-label="Flickr"><i class="fab fa-flickr" aria-hidden="true" title="Flickr"></i></a></li>';
			if ($dribbble) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $dribbble . '" aria-label="Dribble"><i class="fab fa-dribbble" aria-hidden="true" title="Dribble"></i></a></li>';
			if ($behance) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $behance . '" aria-label="Behance"><i class="fab fa-behance" aria-hidden="true" title="Behance"></i></a></li>';
			if ($instagram) 		$social_icons .= '<li><a target="_blank" rel="noopener noreferrer" href="' . $instagram . '" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true" title="Instagram"></i></a></li>';

			$social_icons 	.= '</ul>';
			$social_icons 	.= '</div>';
		}

		$output  .= '<div class="sppb-addon sppb-addon-person ' . $class . ' ' . $content_position . '">';
		$output  .= '<div class="sppb-addon-content">';

		if ($person_style_preset == 'layout4') {
			$output  .= '<div class="sppb-row sppb-no-gutter">';
			$output  .= '<div class="sppb-col-sm-5">';
		}

		if ($image_src) {
			$output  .= '<div class="sppb-person-image ' . ($person_style_preset == 'layout4' ? 'person-layout-4' : '') . '">';
			$output  .= '<img class="sppb-img-responsive' . ($placeholder ? ' sppb-element-lazy' : '') . '" style="display: inline-block;" src="' . ($placeholder ? $placeholder : $image_src) . '" alt="' . $name . '" ' . ($placeholder ? 'data-large="' . $image_src . '"' : '') . ' ' . ($image_width ? 'width="' . $image_width . '"' : '') . ' ' . ($image_height ? 'height="' . $image_height . '"' : '') . ' loading="lazy">';
			if ($person_style_preset !== '') {
				if ($person_style_preset !== 'layout4') {
					$output  .= '<div class="person-content-show-on-hover">';
					$output  .= '<div class="person-content-hover-content-wrap">';
					if ($person_style_preset == 'layout1') {
						if ($social_position == 'before') $output .= $social_icons;
						if ($introtext) $output  .= '<div class="sppb-person-introtext">' . $introtext . '</div>';
						if ($social_position == 'after') $output .= $social_icons;
					}
					if ($person_style_preset == 'layout2' || $person_style_preset == 'layout3') {
						if ($name || $designation) {
							if ($name) {
								$person_name  = '<span class="sppb-person-name">' . $name . '</span>';
								$output .= !empty($link) ? '<a ' . $target . ' href="' . $link . '">' . $person_name . '</a>' : $person_name;
							}
							if ($designation) $output  .= '<span class="sppb-person-designation">' . $designation . '</span>';
							if ($social_icons) $output .= $social_icons;
						}
					}
					$output  .= '</div>';
					$output  .= '</div>';
				}
			}
			$output  .= '</div>'; //.sppb-person-image
		}

		if ($person_style_preset == 'layout4') {
			$output  .= '</div>';
			$output  .= '<div class="sppb-col-sm-7">';
			$output  .= '<div class="sppb-person-addon-content-wrap">';
		}

		if ($person_style_preset !== 'layout2' && $person_style_preset !== 'layout3') {
			if ($name || $designation || $email) {
				$output  .= '<div class="sppb-person-information">';
				if ($name) {
					$person_name  = '<span class="sppb-person-name">' . $name . '</span>';
					$output .= !empty($link) ? '<a ' . $target . ' href="' . $link . '">' . $person_name . '</a>' : $person_name;
				}
				if ($designation) $output  .= '<span class="sppb-person-designation">' . $designation . '</span>';
				if ($email) $output  .= '<a href="mailto:' . $email . '" class="sppb-person-email">' . $email . '</a>';
				$output  .= '</div>';
			}
		}

		if ($person_style_preset !== 'layout1' && $person_style_preset !== 'layout2' && $person_style_preset !== 'layout3') {
			if ($social_position == 'before') $output .= $social_icons;
			if ($introtext) $output  .= '<div class="sppb-person-introtext">' . $introtext . '</div>';
			if ($social_position == 'after') $output .= $social_icons;
		}

		if ($person_style_preset === 'layout4') {
			$output  .= '</div>';
			$output  .= '</div>';
			$output  .= '</div>';
		}

		$output  .= '</div>';
		$output  .= '</div>';

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

		$settings->content_overlay_color  = isset($settings->content_overlay_color) && $settings->content_overlay_color ? $settings->content_overlay_color : '';


		if (isset($settings->content_overlay_type)) {
			$settings->content_overlay_background_color = $settings->content_overlay_type === 'gradient'
				? CSSHelper::parseColor($settings, 'content_overlay_gradient')
				: $settings->content_overlay_color;
		}

		// Back Drop Filter
		if ((isset($settings->content_overlay_backdrop_filter) && $settings->content_overlay_backdrop_filter) && ($settings->person_style_preset == 'layout2' || $settings->person_style_preset == 'layout3')) {
			$settings->content_overlay_backdrop_filter = $settings->content_overlay_backdrop_filter_webkit = CSSHelper::parseBackDropFilter($settings, 'content_overlay_backdrop_filter', 'content_overlay_backdrop_filter_value');
		}

		$personStyle = $cssHelper->generateStyle('.person-content-show-on-hover', $settings, ['content_overlay_background_color' => 'background', 'content_overlay_backdrop_filter' => 'backdrop-filter', 'content_overlay_backdrop_filter_webkit' => '-webkit-backdrop-filter'], false);
		$personImageStyle = $cssHelper->generateStyle('.sppb-person-image img', $settings, ['image_border_radius' => 'border-radius']);
		$personPresetStyle = $cssHelper->generateStyle('.person-content-position-bottom-left .sppb-person-information', $settings, ['name_desig_bg' => 'background', 'name_desig_padding' => 'padding'], false, ['name_desig_padding' => 'spacing']);
		$nameStyle = $cssHelper->generateStyle('.sppb-person-name', $settings, ['name_color' => 'color'], false);
		$nameTypographyStyle = $cssHelper->typography(
			'.sppb-person-name',
			$settings,
			'name_typography',
			[
				'font'           => 'name_font_family',
				'size'           => 'name_fontsize',
				'line_height'    => 'name_lineheight',
				'letter_spacing' => 'name_letterspace',
				'uppercase'      => 'name_font_style.uppercase',
				'italic'         => 'name_font_style.italic',
				'underline'      => 'name_font_style.underline',
				'weight'         => 'name_font_style.weight',
			]
		);

		$designationStyle = $cssHelper->generateStyle(
			'.sppb-person-designation',
			$settings,
			['designation_color' => 'color', 'designation_margin' => 'margin'],
			['designation_color' => false, 'designation_margin' => false],
			['designation_margin' => 'spacing']
		);
		$designationTypographyStyle = $cssHelper->typography(
			'.sppb-person-designation',
			$settings,
			'designation_typography',
			[
				'font'           => 'designation_font_family',
				'size'           => 'designation_fontsize',
				'line_height'    => 'designation_lineheight',
				'letter_spacing' => 'designation_letterspace',
				'uppercase'      => 'designation_font_style.uppercase',
				'italic'         => 'designation_font_style.italic',
				'underline'      => 'designation_font_style.underline',
				'weight'         => 'designation_font_style.weight',
			]
		);

		$introTextStyle = $cssHelper->generateStyle('.sppb-person-introtext', $settings, ['introtext_color' => 'color'], false);
		$introTextTypographyStyle = $cssHelper->typography(
			'.sppb-person-introtext',
			$settings,
			'intro_typography',
			[
				'font'           => 'introtext_font_family',
				'size'           => 'introtext_fontsize',
				'line_height'    => 'introtext_lineheight',
				'letter_spacing' => 'introtext_letterspace',
				'uppercase'      => 'introtext_font_style.uppercase',
				'italic'         => 'introtext_font_style.italic',
				'underline'      => 'introtext_font_style.underline',
				'weight'         => 'introtext_font_style.weight',
			]
		);

		$socialIconStyle = $cssHelper->generateStyle('.sppb-person-social > li > a', $settings, ['social_icon_color' => 'color', 'social_icon_fontsize' => 'font-size'], ['social_icon_color' => false]);
		$socialIconMarginStyle = $cssHelper->generateStyle('.sppb-person-social > li', $settings, ['social_icon_margin' => 'margin'], false, ['social_icon_margin' => 'spacing']);
		$socialIconHoverStyle = $cssHelper->generateStyle('.sppb-person-social > li > a:hover', $settings, ['social_icon_hover_color' => 'color'], false);
		$contentStyle = $cssHelper->generateStyle('.sppb-person-addon-content-wrap', $settings, ['person_content_bg' => 'background-color', 'person_content_padding' => 'padding'], false, ['person_content_padding' => 'spacing']);

		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');

		$alignment = $cssHelper->generateStyle('.sppb-addon.sppb-addon-person', $settings, ['alignment' => 'text-align'], false);

		$css = '';
		$css .= $nameStyle;
		$css .= $personStyle;
		$css .= $contentStyle;
		$css .= $introTextStyle;
		$css .= $socialIconStyle;
		$css .= $designationStyle;
		$css .= $personImageStyle;
		$css .= $personPresetStyle;
		$css .= $nameTypographyStyle;
		$css .= $socialIconHoverStyle;
		$css .= $socialIconMarginStyle;
		$css .= $introTextTypographyStyle;
		$css .= $designationTypographyStyle;
		$css .= $alignment;

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
				<# 
				let gradient_color1 = (!_.isEmpty(data.content_overlay_gradient) && data.content_overlay_gradient.color) ? data.content_overlay_gradient.color : "rgba(127, 0, 255, 0.8)";
				let gradient_color2 = (!_.isEmpty(data.content_overlay_gradient) && data.content_overlay_gradient.color2) ? data.content_overlay_gradient.color2 : "rgba(225, 0, 255, 0.7)";
				let gradient_degree = (!_.isEmpty(data.content_overlay_gradient) && data.content_overlay_gradient.deg) ? data.content_overlay_gradient.deg : "";
				let gradient_type = (!_.isEmpty(data.content_overlay_gradient) && data.content_overlay_gradient.type) ? data.content_overlay_gradient.type : "linear";
				let gradient_radialPos = (!_.isEmpty(data.content_overlay_gradient) && data.content_overlay_gradient.radialPos) ? data.content_overlay_gradient.radialPos : "Center Center";
				let gradient_radial_angle1 = (!_.isEmpty(data.content_overlay_gradient) && data.content_overlay_gradient.pos) ? data.content_overlay_gradient.pos : "0";
				let gradient_radial_angle2 = (!_.isEmpty(data.content_overlay_gradient) && data.content_overlay_gradient.pos2) ? data.content_overlay_gradient.pos2 : "100";

				if(data.content_overlay_type !== "none") {
					if(data.content_overlay_color && data.content_overlay_type !== "gradient"){
				#>
						#sppb-addon-{{ data.id }} .person-content-show-on-hover {
							background:{{data.content_overlay_color}};
						}
					<# }
					if(data.content_overlay_gradient && data.content_overlay_type !== "color"){
					#>
						#sppb-addon-{{ data.id }} .person-content-show-on-hover {
							<# if(gradient_type !== "radial"){ #>
								background: -webkit-linear-gradient({{gradient_degree}}deg, {{gradient_color1}} {{gradient_radial_angle1}}%, {{gradient_color2}} {{gradient_radial_angle2}}%) transparent;
								background: linear-gradient({{gradient_degree}}deg, {{gradient_color1}} {{gradient_radial_angle1}}%, {{gradient_color2}} {{gradient_radial_angle2}}%) transparent;
							<# } else { #>
								background: -webkit-radial-gradient(at {{gradient_radialPos}}, {{gradient_color1}} {{gradient_radial_angle1}}%, {{gradient_color2}} {{gradient_radial_angle2}}%) transparent;
								background: radial-gradient(at {{gradient_radialPos}}, {{gradient_color1}} {{gradient_radial_angle1}}%, {{gradient_color2}} {{gradient_radial_angle2}}%) transparent;
							<# } #>
						}
					<# } #>
				<# } #>';

		$output .= $lodash->unit('border-radius', '.sppb-person-image img', 'data.image_border_radius', 'px', false);
		//Name Fallbacks
		$nameTypographyFallbacks = [
			'font'           => 'data.name_font_family',
			'size'           => 'data.name_fontsize',
			'line_height'    => 'data.name_lineheight',
			'letter_spacing' => 'data.name_letterspace',
			'uppercase'      => 'data.name_font_style?.uppercase',
			'italic'         => 'data.name_font_style?.italic',
			'underline'      => 'data.name_font_style?.underline',
			'weight'         => 'data.name_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-person-name', 'data.name_typography', $nameTypographyFallbacks);
		//Designation Fallbacks
		$designationTypographyFallbacks = [
			'font'           => 'data.designation_font_family',
			'size'           => 'data.designation_fontsize',
			'line_height'    => 'data.designation_lineheight',
			'letter_spacing' => 'data.designation_letterspace',
			'uppercase'      => 'data.designation_font_style?.uppercase',
			'italic'         => 'data.designation_font_style?.italic',
			'underline'      => 'data.designation_font_style?.underline',
			'weight'         => 'data.designation_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-person-designation', 'data.designation_typography', $designationTypographyFallbacks);
		//intro Fallbacks
		$introTypographyFallbacks = [
			'font'           => 'data.introtext_font_family',
			'size'           => 'data.introtext_fontsize',
			'line_height'    => 'data.introtext_lineheight',
			'letter_spacing' => 'data.introtext_letterspace',
			'uppercase'      => 'data.introtext_font_style?.uppercase',
			'italic'         => 'data.introtext_font_style?.italic',
			'underline'      => 'data.introtext_font_style?.underline',
			'weight'         => 'data.introtext_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-person-introtext', 'data.intro_typography', $introTypographyFallbacks);
		$output .= $lodash->color('color', '.sppb-person-name', 'data.name_color');
		$output .= $lodash->color('color', '.sppb-person-designation', 'data.designation_color');
		$output .= $lodash->color('color', '.sppb-person-social > li > a', 'data.social_icon_color');
		$output .= $lodash->color('color', '.sppb-person-social > li > a:hover', 'data.social_icon_hover_color');
		$output .= $lodash->unit('font-size', '.sppb-person-social > li > a', 'data.social_icon_fontsize', 'px');
		$output .= $lodash->spacing('margin', '.sppb-person-social > li', 'data.social_icon_margin');
		$output .= $lodash->spacing('margin', '.sppb-person-designation', 'data.designation_margin');
		$output .= '<# if (data.person_style_preset=="layout1") { #>';
		$output .= '<# if(data.name_desig_bg || data.name_desig_padding) { #>';
		$output .= $lodash->unit('background', '.person-content-position-bottom-left .sppb-person-information', 'data.name_desig_bg', '', false);
		$output .= $lodash->spacing('padding', '.person-content-position-bottom-left .sppb-person-information', 'data.name_desig_padding');
		$output .= '<# } #>';
		$output .= '<# } #>';
		$output .= '<# if (data.person_style_preset=="layout4") { #>';
		$output .= $lodash->unit('background', '.sppb-person-addon-content-wrap', 'data.person_content_bg', '', false);
		$output .= $lodash->spacing('padding', '.sppb-person-addon-content-wrap', 'data.person_content_padding');
		$output .= '<# } #>';

		// Backdrop Filter
		$output .= '<# if(data.content_overlay_backdrop_filter && (data.person_style_preset=="layout2" || data.person_style_preset=="layout3")) { ';
		$output .= 'let unit = (data.content_overlay_backdrop_filter == "blur") ? "px" : "%";  #>';
		$output .= $lodash->backdrop_filter('{{data.content_overlay_backdrop_filter}}', '.person-content-show-on-hover', 'data.content_overlay_backdrop_filter_value', '{{unit}}');
		$output .= '<# } #>';

		$output .= $lodash->alignment('text-align', '.sppb-addon.sppb-addon-person', 'data.alignment');

		$output .= '
			</style>
			<#
			let content_position = "";
			if(data.person_style_preset=="layout1"){
				content_position = "person-content-position-bottom-left";
			} else if(data.person_style_preset=="layout2"){
				content_position = "person-content-position-half-overlay";
			} else if(data.person_style_preset=="layout3"){
				content_position = "person-content-position-full-overlay";
			}

			let social_icon_list = "";
			if (!_.isEmpty(data.facebook)) {
				social_icon_list += `<li><a target="_blank" href="${data.facebook}"><i class="fab fa-facebook-f"></i></a></li>`;
			}
			if (!_.isEmpty(data.twitter)) {
				social_icon_list += `<li><a target="_blank" href="${data.twitter}"><i class="fab fa-twitter"></i></a></li>`;
			}
			if (!_.isEmpty(data.youtube)) {
				social_icon_list += `<li><a target="_blank" href="${data.youtube}"><i class="fab fa-youtube"></i></a></li>`;
			}
			if (!_.isEmpty(data.linkedin)) {
				social_icon_list += `<li><a target="_blank" href="${data.linkedin}"><i class="fab fa-linkedin-in"></i></a></li>`;
			}
			if (!_.isEmpty(data.pinterest)) {
				social_icon_list += `<li><a target="_blank" href="${data.pinterest}"><i class="fab fa-pinterest"></i></a></li>`;
			}
			if (!_.isEmpty(data.flickr)) {
				social_icon_list += `<li><a target="_blank" href="${data.flickr}"><i class="fab fa-flickr"></i></a></li>`;
			}
			if (!_.isEmpty(data.dribbble)) {
				social_icon_list += `<li><a target="_blank" href="${data.dribbble}"><i class="fab fa-dribbble"></i></a></li>`;
			}
			if (!_.isEmpty(data.behance)) {
				social_icon_list += `<li><a target="_blank" href="${data.behance}"><i class="fab fa-behance"></i></a></li>`;
			}
			if (!_.isEmpty(data.instagram)) {
				social_icon_list += `<li><a target="_blank" href="${data.instagram}"><i class="fab fa-instagram"></i></a></li>`;
			}

			// Link 			
			const isMenu   = _.isObject(data.title_link) && data.title_link.type === "menu" && data.title_link?.menu;
			const isPage   = _.isObject(data.title_link) && data.title_link.type === "page" && data.title_link?.page;
			const isUrl    = _.isObject(data.title_link) && data.title_link.type === "url" && data.title_link?.url;
			const isOldUrl = _.isString(data.title_link) && data.title_link !== "";

			let rel    = "";
			let newUrl = "";
			let target = ""

			let personName = `<span class="sppb-person-name sp-inline-editable-element" data-id=${data.id} data-fieldName="name" contenteditable="true">${data.name}</span>`;
			
			if (isMenu || isPage || isUrl || isOldUrl) { 
				const urlObj = _.isObject(data.title_link) ? data.title_link : window.getSiteUrl(data.title_link, data.link_new_tab === 1 ? "_blank" : "");
				const {url, page, menu, type, new_tab, nofollow, noopener, noreferrer} = urlObj;
				target = new_tab ? "_blank": "";
				
				rel += nofollow ? "nofollow": "";
				rel += noopener ? " noopener": "";
				rel += noreferrer ? " noreferrer": "";
			
				if(type === "url") newUrl = url;
				if(type === "menu") newUrl = menu;
				if(type === "page") newUrl = page ? `index.php?option=com_sppagebuilder&view=page&id=${page}` : "";

				personName = `<a href=${newUrl} target=${target} rel=${rel}>
								<span class="sppb-person-name sp-inline-editable-element" data-id=${data.id} data-fieldName="name" contenteditable="true">
									${data.name}
								</span>
							 </a>`;
			} 			
			#>
			<div class="sppb-addon sppb-addon-person {{ data.class}} {{content_position}}">
				<div class="sppb-addon-content">
				<# if(data.person_style_preset=="layout4"){ #>
					<div class="sppb-row sppb-no-gutter">
						<div class="sppb-col-sm-5">
				<# }
				var personImg = {}
				if (typeof data.image !== "undefined" && typeof data.image.src !== "undefined") {
					personImg = data.image
				} else {
					personImg = {src: data.image}
				}
				if(!_.isEmpty(personImg.src)) {
				#>
					<div class="sppb-person-image <# if(data.person_style_preset=="layout4"){ #> person-layout-4 <# } #>">
						<# if(personImg.src.indexOf("https://") == -1 && personImg.src.indexOf("http://") == -1){ #>
							<img class="sppb-img-responsive" style="display: inline-block;" src=\'{{ pagebuilder_base + personImg.src }}\' alt="{{ data.name }}">
						<# } else { #>
							<img class="sppb-img-responsive" style="display: inline-block;" src=\'{{ personImg.src }}\' alt="{{ data.name }}">
						<# } #>

						<# if(data.person_style_preset!=="") {
							if(data.person_style_preset!=="layout4"){
						#>
							<div class="person-content-show-on-hover">
							<div class="person-content-hover-content-wrap">
							<# if(data.person_style_preset=="layout1") { #>
								<# if(data.social_position == "after") { #>
									<# if(!_.isEmpty(data.introtext)) { #>
										<div class="sppb-person-introtext sp-inline-editable-element" data-id={{data.id}} data-fieldName="introtext" contenteditable="true">{{{ data.introtext }}}</div>
									<# } #>
								<# } #>
			
								<# if ( data.facebook || data.twitter || data.youtube || data.linkedin || data.pinterest || data.flickr || data.dribbble || data.behance || data.instagram ) { #>
									<div class="sppb-person-social-icons">
										<ul class="sppb-person-social">
											{{{social_icon_list}}}
										</ul>
									</div>
								<# } #>
			
								<# if(data.social_position == "before") { #>
									<# if(!_.isEmpty(data.introtext)) { #>
										<div class="sppb-person-introtext">{{{ data.introtext }}}</div>
									<# } #>
								<# } #>
							<# } #>													
							
							<# if(data.person_style_preset=="layout2" || data.person_style_preset=="layout3"){ #>
								<# if(data.name || data.designation){ #>
									<# if(!_.isEmpty(data.name)) { 	#>									
										{{{ personName }}}
									<# } #>
									<# if(!_.isEmpty(data.designation)) { #>
										<span class="sppb-person-designation sp-inline-editable-element" data-id={{data.id}} data-fieldName="designation" contenteditable="true">{{ data.designation}}</span>
									<# } #>
									<# if ( data.facebook || data.twitter || data.youtube || data.linkedin || data.pinterest || data.flickr || data.dribbble || data.behance || data.instagram ) { #>
										<div class="sppb-person-social-icons">
											<ul class="sppb-person-social">
												{{{social_icon_list}}}
											</ul>
										</div>
									<# } #>
								<# } #>
							<# } #>
							
							</div>
							</div>
							<# }
						} #>
					</div>
				<# }
				if(data.person_style_preset=="layout4"){
				#>
					</div>
					<div class="sppb-col-sm-7">
					<div class="sppb-person-addon-content-wrap">
				<# }
				if(data.person_style_preset!=="layout2" && data.person_style_preset!=="layout3"){
				#>
					<# if(data.name || data.designation || data.email ){ #>
						<div class="sppb-person-information">
							<# if(!_.isEmpty(data.name)) { #>
								{{{ personName }}}						
							<# } #>
							<# if(!_.isEmpty(data.designation)) { #>
								<span class="sppb-person-designation sp-inline-editable-element" data-id={{data.id}} data-fieldName="designation" contenteditable="true">{{ data.designation}}</span>
							<# } #>
							<# if(!_.isEmpty(data.email)) { #>
								<a href="mailto:{{ data.email}}" class="sppb-person-email">{{ data.email}}</a>
							<# } #>
						</div>
					<# } #>
				<# } #>

				<# if(data.person_style_preset!=="layout1" && data.person_style_preset!=="layout2" && data.person_style_preset!=="layout3") { #>
					<# if(data.social_position == "after") { #>
						<# if(!_.isEmpty(data.introtext)) { #>
							<div class="sppb-person-introtext sp-inline-editable-element" data-id={{data.id}} data-fieldName="introtext" contenteditable="true">{{{ data.introtext }}}</div>
						<# } #>
					<# } #>

					<# if ( data.facebook || data.twitter || data.youtube || data.linkedin || data.pinterest || data.flickr || data.dribbble || data.behance || data.instagram ) { #>
						<div class="sppb-person-social-icons">
						<ul class="sppb-person-social">
							{{{social_icon_list}}}
						</ul>
						</div>
					<# } #>

					<# if(data.social_position == "before") { #>
						<# if(!_.isEmpty(data.introtext)) { #>
							<div class="sppb-person-introtext">{{{ data.introtext }}}</div>
						<# } #>
					<# } #>
				<# }
				if(data.person_style_preset=="layout4"){
				#>
					</div>
					</div>
				</div>
				<# } #>
				</div>
			</div>
			';

		return $output;
	}
}
