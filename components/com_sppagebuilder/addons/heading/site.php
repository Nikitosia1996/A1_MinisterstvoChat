<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonHeading extends SppagebuilderAddons
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

		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h2';
		$title_icon = (isset($settings->title_icon) && $settings->title_icon) ? $settings->title_icon : '';
		$title_icon_position = (isset($settings->title_icon_position) && $settings->title_icon_position) ? $settings->title_icon_position : 'before';

		$output = '';

		list($link, $target) = AddonHelper::parseLink($settings, 'title_link', [
			'url' => 'title_link',
			'new_tab' => 'link_new_tab'
		]);

		if ($title)
		{
			$output .= '<div class="sppb-addon sppb-addon-header' . $class . '">';
			$output .= !empty($link) ? '<a ' . $target . ' href="' . $link . '">' : '';
			$output .= '<' . $heading_selector . ' class="sppb-addon-title">';

			if ($title_icon)
			{
				$icon_arr = array_filter(explode(' ', $title_icon));

				if (count($icon_arr) === 1)
				{
					$title_icon = 'fa ' . $title_icon;
				}
			}

			if ($title_icon && $title_icon_position === 'before')
			{
				$output .= '<span class="' . $title_icon . ' sppb-addon-title-icon" aria-hidden="true"></span> ';
			}

			$output .= nl2br($title);

			if ($title_icon && $title_icon_position === 'after')
			{
				$output .= ' <span class="' . $title_icon . ' sppb-addon-title-icon" aria-hidden="true"></span>';
			}

			$output .= '</' . $heading_selector . '>';
			$output .= !empty($link) ? '</a>' : '';
			$output .= '</div>';
		}

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

		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h2';
		$title_icon = (isset($settings->title_icon) && $settings->title_icon) ? $settings->title_icon : '';

		$css = '';

		$colorType = (isset($settings->title_color->type) && $settings->title_color->type) ? $settings->title_color->type : '';

		$settings->plain_title_color = CSSHelper::parseColor($settings, 'title_color');

		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');
		$settings->title_text_shadow = CSSHelper::parseBoxShadow($settings, 'title_text_shadow', true);

		$headingTypographyFallbacks = [
			'font'           => 'title_font_family',
			'size'           => 'title_fontsize',
			'line_height'    => 'title_lineheight',
			'letter_spacing' => 'title_letterspace',
			'uppercase'      => 'title_font_style.uppercase',
			'italic'         => 'title_font_style.italic',
			'underline'      => 'title_font_style.underline',
			'weight'         => 'title_font_style.weight',
		];

		$headingTypography = $cssHelper->typography('.sppb-addon-header .sppb-addon-title', $settings, 'heading_typography', $headingTypographyFallbacks);
		$css .= $headingTypography;

		/**
		 * We've passed the font family here for the heading addon.
		 * As the the other typography field's are handled by the
		 * addon's global CSS settings.
		 */
		$titleProps = [
			'title_margin'         => 'margin',
			'title_padding'        => 'padding',
			'plain_title_color'    	   => $colorType != "solid" ? '-webkit-background-clip: text; -webkit-text-fill-color: transparent; background-image' : 'color',
			'title_text_shadow'	  => 'text-shadow'
		];

		$units = ['title_margin' => false, 'title_padding' => false, 'plain_title_color' => false, 'title_text_shadow' => false];
		$modifiers = ['title_margin' => 'spacing', 'title_padding' => 'spacing'];

		$titleStyle = $cssHelper->generateStyle('.sppb-addon-header .sppb-addon-title', $settings, $titleProps, $units, $modifiers);
		$alignment = $cssHelper->generateStyle('.sppb-addon.sppb-addon-header', $settings, ['alignment' => 'text-align'], false);

		$css .= $alignment;
		$css .= $titleStyle;

		if (!empty($settings->title_font_family))
		{
			$cssHelper->loadGoogleFont($settings->title_font_family);
		}

		if ($title_icon)
		{
			$iconColorStyle = $cssHelper->generateStyle($heading_selector . '.sppb-addon-title .sppb-addon-title-icon', $settings, ['title_icon_color'  => 'color', 'title_icon_color'  => '-webkit-text-fill-color'], ['title_icon_color' => false]);
			$css .= $iconColorStyle;
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
		$output = '<style type="text/css">';

		$headingTypographyFallbacks = [
			'font'                  => 'data.title_font_family',
			'size'                  => 'data.title_fontsize',
			'line_height'           => 'data.title_lineheight',
			'letter_spacing'        => 'data.title_letterspace',
			'custom_letter_spacing' => 'data?.custom_letterspacing',
			'uppercase'             => 'data.title_font_style?.uppercase',
			'italic'                => 'data.title_font_style?.italic',
			'underline'             => 'data.title_font_style?.underline',
			'weight'                => 'data.title_font_style?.weight'
		];

		$output .= $lodash->color('color', '.sppb-addon-title', 'data.title_color');
		$output .= $lodash->color('color', '.sppb-addon-title-icon', 'data.title_icon_color');
		$output .= $lodash->unit('-webkit-text-fill-color', '.sppb-addon-title-icon', 'data.title_icon_color', '', false);

		$output .= $lodash->spacing('margin', '.sppb-addon-title', 'data.title_margin');
		$output .= $lodash->spacing('padding', '.sppb-addon-title', 'data.title_padding');
		$output .= $lodash->alignment('text-align', '.sppb-addon-header', 'data.alignment');
		$output .= $lodash->typography('.sppb-addon-header .sppb-addon-title', 'data.heading_typography', $headingTypographyFallbacks);
		$output .= $lodash->textShadow('.sppb-addon-title', 'data.title_text_shadow');
		
		$output .= '   
		</style>
        <div class="sppb-addon sppb-addon-header {{ data.class}}">
            <#
			let heading_selector = data.heading_selector || "h2";
			const isMenu = _.isObject(data.title_link) && data.title_link.type === "menu" && data.title_link?.menu;
			const isPage = _.isObject(data.title_link) && data.title_link.type === "page" && data.title_link?.page;
			const isUrl = _.isObject(data.title_link) && data.title_link.type === "url" && data.title_link?.url;
			const isOldUrl = _.isString(data.title_link) && data.title_link !== "";
			
			let rel="";

            if (isMenu || isPage || isUrl || isOldUrl) { 
				const urlObj = _.isObject(data.title_link) ? data.title_link : window.getSiteUrl(data.title_link, data.link_new_tab === 1 ? "_blank" : "");
				const {url, page, menu, type, new_tab, nofollow, noopener, noreferrer} = urlObj;
				const target = new_tab ? "_blank": "";
				
				rel += nofollow ? "nofollow": "";
				rel += noopener ? " noopener": "";
				rel += noreferrer ? " noreferrer": "";
			
				let newUrl = "";
				if(type === "url") newUrl = url;
				if(type === "menu") newUrl = menu;
				if(type === "page") newUrl = page ? `index.php?option=com_sppagebuilder&view=page&id=${page}` : "";
				
				#>
				
				<a href=\'{{ newUrl }}\' target=\'{{ target }}\' rel=\'{{ rel }}\'>
				<# } #>
                <{{ heading_selector }} class="sppb-addon-title">
                <#
                let icon_arr = (typeof data.title_icon !== "undefined" && data.title_icon) ? data.title_icon.split(" ") : "";
                let icon_name = icon_arr.length === 1 ? "fa "+data.title_icon : data.title_icon;
                
                if(data.title_icon && data.title_icon_position == "before"){ #><span class="{{ icon_name }} sppb-addon-title-icon"></span>
                <# } #>
                <span style="white-space: pre-wrap;" class="sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{{ data.title }}}</span>
                <# if(data.title_icon && data.title_icon_position == "after"){ #> <span class="{{ icon_name }} sppb-addon-title-icon"></span> <# } #>
                </{{ heading_selector }}>
            <# if(!_.isEmpty(data.title_link) || data.title_link?.url){ #></a><# } #>
        </div>
        ';

		return $output;
	}
}