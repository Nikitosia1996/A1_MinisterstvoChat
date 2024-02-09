<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonNavigation extends SppagebuilderAddons
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
		$links = (isset($settings->sp_link_list_item) && $settings->sp_link_list_item) ? $settings->sp_link_list_item : array();
		$type = (isset($settings->type) && $settings->type) ? $settings->type : "nav";
		$align = (isset($settings->align) && $settings->align) ? $settings->align : "left";
		$icon_position = (isset($settings->icon_position) && $settings->icon_position) ? $settings->icon_position : 'left';
		$scroll_to = (isset($settings->scroll_to) && $settings->scroll_to) ? $settings->scroll_to : false;
		$scroll_to_offset = (isset($settings->scroll_to_offset)) ? $settings->scroll_to_offset : '';
		$sticky_menu = (isset($settings->sticky_menu) && $settings->sticky_menu) ? $settings->sticky_menu : false;
		$responsive_menu = (isset($settings->responsive_menu)) ? $settings->responsive_menu : true;
		$nav_type = "sppb-link-list-{$type}";
		$nav_align = " sppb-nav-align-{$align}";

		$data_offset = '';

		if ($scroll_to)
		{
			$data_offset = 'data-offset=' . $scroll_to_offset . '';
		}

		$output = '';

		$sticky_row_attr = '';

		if ($sticky_menu)
		{
			$sticky_row_attr = ' data-sticky-it="true"';
		}

		$responsive_menu_cls = '';

		if ($responsive_menu)
		{
			$responsive_menu_cls = ' sppb-link-list-responsive';
		}

		$output .= '<div class="sppb-link-list-wrap ' . $nav_type . $nav_align . $responsive_menu_cls . $class . '" ' . $sticky_row_attr . ' ' . $data_offset . '>';
		$output .= ($responsive_menu) ? '<div class="sppb-responsive-bars"><span class="sppb-responsive-bar"></span><span class="sppb-responsive-bar"></span><span class="sppb-responsive-bar"></span></div>' : '';
		$output .= '<ul>';

		if (count((array) $links))
		{
			foreach ($links as $key => $link)
			{
				if (isset($link->icon))
				{
					$icon_arr = array_filter(explode(' ', $link->icon));

					if (count($icon_arr) === 1)
					{
						$link->icon = 'fas ' . $link->icon;
					}
				}

				list($linkUrl, $target) = AddonHelper::parseLink($link, 'url');

				$icon = isset($link->icon) ? '<i class="' . $link->icon . '" aria-hidden="true"></i>' : '';
				$scroll_to_attr = ($scroll_to) ? ' data-scroll-to="true" ' : '';
				$active = (isset($link->active) && $link->active) ? ' sppb-active' : '';

				$title = (isset($link->title) && $link->title) ? $link->title : '';

				$link_text = '';

				if ($icon_position === 'right')
				{
					$link_text = $title . ' ' . $icon;
				}
				elseif ($icon_position === 'top')
				{
					$link_text = $icon . '<br />' . $title;
				}
				else
				{
					$link_text = $icon . ' ' . $title;
				}

				$output .= '<li class="' . (isset($link->class) ? $link->class : '') . $active . '"><a href="' . (isset($linkUrl) ? $linkUrl : '') . '" ' . $target . $scroll_to_attr . '>' . $link_text . '</a></li>';
			}
		}
		$output .= '</ul>';
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
		$icon_position = (isset($settings->icon_position) && $settings->icon_position) ? $settings->icon_position : 'left';
		$cssHelper = new CSSHelper($addon_id);
		$css = '';

		$linkProps = [
			'link_bg' => 'background-color',
			'link_color' => 'color',
			'link_margin' => 'margin',
			'link_padding' => 'padding',
			'link_border_radius' => 'border-radius'
		];
		$linkUnits = [
			'link_bg' => false,
			'link_color' => false,
			'link_margin' => false,
			'link_padding' => false
		];

		$linkModifiers = [
			'link_margin' => 'spacing',
			'link_padding' => 'spacing',
		];

		$static = '';

		if ($icon_position === 'top')
		{
			$static .= 'text-align: center;';
		}

		$linkStyle = $cssHelper->generateStyle('li a', $settings, $linkProps, $linkUnits, $linkModifiers, null, false, $static);
		$linkTypographyStyle = $cssHelper->typography('li a', $settings, 'link_typography', [
			'font'           => 'link_font_family',
			'size'           => 'link_fontsize',
			'line_height'    => 'link_lineheight',
			'letter_spacing' => 'link_letterspace',
			'uppercase'      => 'link_font_style.uppercase',
			'italic'         => 'link_font_style.italic',
			'underline'      => 'link_font_style.underline',
			'weight'         => 'link_font_style.weight',
		]);

		$linkHoverStyle = $cssHelper->generateStyle('li a:hover', $settings, ['link_bg_hover' => 'background-color', 'link_color_hover' => 'color'], false);

		$linkActiveStyle = $cssHelper->generateStyle(
			'li.sppb-active a',
			$settings,
			[
				'link_border_radius_active' => 'border-radius',
				'link_bg_active' => 'background-color',
				'link_color_active' => 'color'
			],
			[
				'link_bg_active' => false,
				'link_color_active' => false
			]
		);

		$linkIconStyle = $cssHelper->generateStyle('li a i', $settings, ['icon_size' => ['font-size', 'line-height'], 'icon_margin' => 'margin'], ['icon_margin' => false], ['icon_margin' => 'spacing']);
		$barsStyle = $cssHelper->generateStyle('.sppb-responsive-bars', $settings, ['responsive_bar_bg' => 'background-color'], false);
		$barItemStyle = $cssHelper->generateStyle('.sppb-responsive-bar', $settings, ['responsive_bar_color' => 'color'], false);
		$barsActiveStyle = $cssHelper->generateStyle('.sppb-responsive-bars.open', $settings, ['responsive_bar_bg_active' => 'background-color'], false);
		$barItemActiveStyle = $cssHelper->generateStyle('.sppb-responsive-bars.open .sppb-responsive-bar', $settings, ['responsive_bar_color_active' => 'color'], false);

		$css .= $linkStyle;
		$css .= $linkTypographyStyle;
		$css .= $linkHoverStyle;
		$css .= $linkActiveStyle;
		$css .= $linkIconStyle;
		$css .= $barsStyle;
		$css .= $barsActiveStyle;
		$css .= $barItemStyle;
		$css .= $barItemActiveStyle;

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
            let links = (typeof data.sp_link_list_item  !== "undefined" && data.sp_link_list_item) ? data.sp_link_list_item : [];
            let type = (typeof data.type !== "undefined" && data.type) ? data.type : "nav";
            let align = (typeof data.align !== "undefined" && data.align) ? data.align : "left";
            let icon_position = (typeof data.icon_position !== "undefined" && data.icon_position) ? data.icon_position : "left";
            let scroll_to = (typeof data.scroll_to !== "undefined" && data.scroll_to) ? data.scroll_to : false;
            let sticky_menu = (typeof data.sticky_menu !== "undefined" && data.sticky_menu) ? data.sticky_menu : false;
            let responsive_menu = (typeof data.responsive_menu !== "undefined") ? data.responsive_menu : true;

            let nav_type = "sppb-link-list-" + type;
            let nav_align = "sppb-nav-align-" + align;

            let sticky_row_attr = "";
            if (sticky_menu) {
                sticky_row_attr = \' data-sticky-it="true"\';
            }

            let responsive_menu_cls = "";
            if(responsive_menu) {
                responsive_menu_cls = "sppb-link-list-responsive";
            }
        #>
        <style type="text/css">';
		$typographyFallbacks = [
			'font'           => 'data.link_font_family',
			'size'           => 'data.link_fontsize',
			'line_height'    => 'data.link_lineheight',
			'letter_spacing' => 'data.link_letterspace',
			'uppercase'      => 'data.link_font_style?.uppercase',
			'italic'         => 'data.link_font_style?.italic',
			'underline'      => 'data.link_font_style?.underline',
			'weight'         => 'data.link_font_style?.weight'
		];

		$output .= $lodash->color('color', 'li a', 'data.link_color');
		$output .= $lodash->color('background-color', 'li a', 'data.link_bg');
		$output .= $lodash->color('color', 'li:not(.sppb-active) a:hover', 'data.link_color_hover');
		$output .= $lodash->color('background-color', 'li:not(.sppb-active) a:hover', 'data.link_bg_hover');
		$output .= $lodash->color('color', 'li.sppb-active a', 'data.link_color_active');
		$output .= $lodash->color('background-color', 'li.sppb-active a', 'data.link_bg_active');
		$output .= $lodash->spacing('margin', 'li a', 'data.link_margin');
		$output .= $lodash->spacing('padding', 'li a', 'data.link_padding');
		$output .= $lodash->unit('border-radius', 'li a', 'data.link_border_radius', 'px');
		$output .= $lodash->typography('li a', 'data.link_typography', $typographyFallbacks);

		// icon
		$output .= '<# if (icon_position == "top") { #>';
		$output .= '#sppb-addon-{{ data.id }} li a {text-align: center;}';
		$output .= '<# } #>';
		$output .= $lodash->unit('font-size', 'li a i', 'data.icon_size', 'px');
		$output .= $lodash->spacing('margin', 'li a i', 'data.icon_margin');

		// burger menu
		$output .= $lodash->color('background-color', '.sppb-responsive-bar', 'data.responsive_bar_color');
		$output .= $lodash->color('background-color', '.sppb-responsive-bars', 'data.responsive_bar_bg');
		$output .= $lodash->color('background-color', '.sppb-responsive-bars.open .sppb-responsive-bar', 'data.responsive_bar_color_active');
		$output .= $lodash->color('background-color', '.sppb-responsive-bars.open', 'data.responsive_bar_bg_active');

		$output .= '
        </style>
        <div class="sppb-link-list-wrap {{ nav_type }} {{ nav_align }} {{ responsive_menu_cls }} {{data.class}}" {{{ sticky_row_attr }}}>
            <# if(responsive_menu){ #>
                <div class="sppb-responsive-bars"><span class="sppb-responsive-bar"></span><span class="sppb-responsive-bar"></span><span class="sppb-responsive-bar"></span></div>
            <# } #>
            <ul>
            <#
            _.each(links, function(link, i) {
                let icon_arr = (typeof link.icon !== "undefined" && link.icon) ? link.icon.split(" ") : "";
                let icon_name = icon_arr.length === 1 ? "fa "+link.icon : link.icon;
                
                let icon = (typeof link.icon !== "undefined") ? \'<i class="\' + icon_name + \'"></i>\' : "";
                let scroll_to_attr = (scroll_to) ? \' data-scroll-to="true" \' : "";
                let active = (typeof link.active !== "undefined" && link.active) ? " sppb-active" : "";
                
                let title = (typeof link.title !== "undefined" && link.title) ? link.title : "";

                let link_text = "";
                if (icon_position == "right") {
                    link_text = title + " " + icon;
                } else if (icon_position == "top") {
                    link_text = icon + "<br />" + title;
                } else {
                    link_text = icon + " " + title;
                }
            #>
                <li class="{{ link.class }} {{ active }}">
				<# 
					const urlObj = _.isObject(link.url) ? link.url : window.getSiteUrl(link?.url, link?.target);
					const {url, menu, page, new_tab, nofollow, noopener, noreferrer, type} = urlObj;
					const target = new_tab ? "_blank" : "";
					
					let rel="";
					rel += nofollow ? "nofollow" : "";
					rel += noopener ? " noopener" : "";
					rel += noreferrer ? " noreferrer" : "";
				
					let newUrl = "";
					if(type === "url") newUrl = url;
					if(type === "menu") newUrl = menu || "";
					if(type === "page") newUrl = page ? `index.php?option=com_sppagebuilder&view=page&id=${page}` : "";
				#>
                    <a href=\'{{ newUrl }}\' target=\'{{ target }}\' rel=\'{{ rel }}\' {{{ scroll_to_attr }}}>{{{ link_text }}}</a>
                </li>
            <# }); #>
            </ul>
        </div>
        ';

		return $output;
	}
}
