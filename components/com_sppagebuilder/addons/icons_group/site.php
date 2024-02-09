<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonIcons_group extends SppagebuilderAddons
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

		// Addon Options
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$icon_items = (isset($settings->sp_icons_group_item) && $settings->sp_icons_group_item) ? $settings->sp_icons_group_item : '';

		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$title_position = (isset($settings->title_position) && $settings->title_position) ? $settings->title_position : 'top';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h2';
		$title_icon = (isset($settings->title_icon) && $settings->title_icon) ? $settings->title_icon : '';
		$title_icon_position = (isset($settings->title_icon_position) && $settings->title_icon_position) ? $settings->title_icon_position : 'before';

		$output = '';
		$output .= '<div class="sppb-addon sppb-addon-icons-group ' . $class . ' ' . ($title_position ? 'icons-group-title-postion-' . $title_position : '') . '">';

		if ($title)
		{
			$output .= '<' . $heading_selector . ' class="sppb-addon-title">';
			if ($title_icon)
			{
				$icon_arr = array_filter(explode(' ', $title_icon));
				if (count($icon_arr) === 1)
				{
					$title_icon = 'fa ' . $title_icon;
				}
			}
			if ($title_icon && $title_icon_position == 'before')
			{
				$output .= '<span class="' . $title_icon . '" aria-hidden="true"></span> ';
			}
			$output .= $title;
			if ($title_icon && $title_icon_position == 'after')
			{
				$output .= ' <span class="' . $title_icon . '" aria-hidden="true"></span>';
			}
			$output .= '</' . $heading_selector . '>';
		}

		$output .= '<ul class="sppb-icons-group-list">';

		if (is_array($icon_items) && count($icon_items) > 0)
		{
			foreach ($icon_items as $key => $icon_item)
			{
				$key++;

				$icon_class = (isset($icon_item->icon_class) && $icon_item->icon_class !== '') ? ' ' . $icon_item->icon_class : '';
				$title = (isset($icon_item->title) && $icon_item->title) ? $icon_item->title : 'Icon group item';

				$icon_id = $this->addon->id . $key;
				list($link, $target) = AddonHelper::parseLink($icon_item, 'icon_link', ['url' => 'icon_link', 'new_tab' => 'link_open_new_window']);

				$output .= '<li id="icon-' . $icon_id . '" class="' . $icon_class . '">';

				if (!empty($link))
				{
					$output .= '<a href="' . $link . '" aria-label="' . strip_tags($title) . '" ' . $target . '>';
				}

				if (isset($icon_item->label_position) && !empty($icon_item->show_label) && $icon_item->label_position == 'top')
				{
					$output .= '<span class="sppb-icons-label-text">' . (isset($icon_item->label_text) ? $icon_item->label_text : '') . '</span>';
				}

				if (isset($icon_item->icon_name))
				{
					$icon_arr2 = array_filter(explode(' ', $icon_item->icon_name));

					if (count($icon_arr2) === 1)
					{
						$icon_item->icon_name = 'fa ' . $icon_item->icon_name;
					}

					$output .= '<i class="' . $icon_item->icon_name . ' " aria-hidden="true" title="' . $title . '"></i>';
				}

				if (isset($icon_item->label_position) && !empty($icon_item->show_label) && $icon_item->label_position == 'right')
				{
					$output .= '<span class="sppb-icons-label-text right">&nbsp;' . (isset($icon_item->label_text) ? $icon_item->label_text : '') . '</span>';
				}

				if (isset($icon_item->label_position) && !empty($icon_item->show_label) && $icon_item->label_position == 'bottom')
				{
					$output .= '<span class="sppb-icons-label-text">' . (isset($icon_item->label_text) ? $icon_item->label_text : '') . '</span>';
				}

				if (!empty($link))
				{
					$output .= '</a>';
				}

				$output .= '</li>';
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
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$settings = $this->addon->settings;
		$cssHelper = new CSSHelper($addon_id);

		$styles = [];

		foreach ($settings->sp_icons_group_item as $key => $addon_item)
		{
			$key++;
			$icon_id = $this->addon->id . $key;
			$css = '';

			$iconStyle = '';

			list($link) = AddonHelper::parseLink($addon_item, 'icon_link', [
				'new_tab' => 'link_open_new_window',
				'url' => 'icon_link'
			]);

			if (!empty($link))
			{
				$iconStyle .= $cssHelper->generateStyle(
					".sppb-icons-group-list li#icon-" . $icon_id . " a",
					$addon_item,
					[
						'height' => 'height',
						'padding' => 'padding',
						'width' => 'width',
						'color' => 'color',
						'background' => 'background-color',
						'border_color' => 'border-color',
						'border_style' => 'border-style',
						'border_width' => 'border-width',
						'border_radius' => 'border-radius'
					],
					['color' => false, 'background' => false, 'border_color' => false, 'border_style' => false],
					['padding' => 'spacing']
				);
			}
			else
			{
				$iconStyle .= $cssHelper->generateStyle(
					".sppb-icons-group-list li#icon-" . $icon_id . "",
					$addon_item,
					[
						'height' => 'height',
						'padding' => 'padding',
						'width' => 'width',
						'color' => 'color',
						'background' => 'background-color',
						'border_color' => 'border-color',
						'border_style' => 'border-style',
						'border_width' => 'border-width',
						'border_radius' => 'border-radius'
					],
					['color' => false, 'background' => false, 'border_color' => false, 'border_style' => false],
					['padding' => 'spacing']
				);
			}

			$itemDisplayStyle = $cssHelper->generateStyle(" .sppb-icons-group-list li#icon-" . $icon_id, $settings, ['item_display' => 'display', 'size' => 'font-size'], ['item_display' => false]);
			$iconHoverStyle = $cssHelper->generateStyle(".sppb-icons-group-list li#icon-" . $icon_id . " a:hover", $addon_item, ['hover_color' => 'color', 'hover_background' => 'background', 'hover_border_color' => 'border-color'], false);
			$iconMarginStyle = $cssHelper->generateStyle(".sppb-icons-group-list li#icon-" . $icon_id . " a", $settings, ['margin' => 'margin']);
			$fontStyle = $cssHelper->generateStyle(".sppb-icons-group-list li#icon-" . $icon_id . " a", $settings, ['size' => 'font-size']);
			$labelStyle = $cssHelper->generateStyle(".sppb-icons-group-list li#icon-" . $icon_id . " .sppb-icons-label-text", $addon_item, ['label_margin' => 'margin'], false, ['label_margin' => 'spacing']);
			$labelFontStyle = $cssHelper->typography(
				".sppb-icons-group-list li#icon-" . $icon_id . " .sppb-icons-label-text",
				$addon_item,
				'label_typography',
				[
					'size'           => 'label_size',
					'line_height'    => 'label_lineheight',
					'letter_spacing' => 'label_letterspace',
					'uppercase'      => 'label_font_style.uppercase',
					'italic'         => 'label_font_style.italic',
					'underline'      => 'label_font_style.underline',
					'weight'         => 'label_font_style.weight',
				]
			);

			$css .= $cssHelper->generateStyle(".sppb-icons-group-list li", $settings, ["margin" => "margin"]);
			$css .= $cssHelper->generateStyle(".sppb-icons-group-list", $settings, ["margin" => "margin: -%s"]);

			$css .= $fontStyle;
			$css .= $iconStyle;
			$css .= $labelStyle;
			$css .= $itemDisplayStyle;
			$css .= $labelFontStyle;
			$css .= $iconHoverStyle;
			$css .= $iconMarginStyle;

			$styles[$key] = $css;
		}


		$styles_explode = implode("\n", $styles);

		// Alignment style
		$settings->icon_alignment = $cssHelper->parseAlignment($settings, 'icon_alignment');
		$styles_explode .= $cssHelper->generateStyle('.sppb-addon-icons-group', $settings, ['icon_alignment' => 'text-align'], false);

		$titleStyle = $cssHelper->generateStyle('.sppb-addon-title', $settings, ['title_margin' => 'margin', 'title_text_transform' => 'text-transform', 'title_padding' => 'padding'], false, ['title_margin' => 'spacing', 'title_padding' => 'spacing']);
		$styles_explode .= $titleStyle;



		return $styles_explode;
	}

	/**
	 * Generate the lodash template string for the frontend editor.
	 *
	 * @return 	string 	The lodash template string.
	 * @since 	1.0.0
	 */
	public static function getTemplate()
	{

		$lodash = new Lodash('#sppb-addon-{{data.id}}');
		$output = '

        <style type="text/css">';

		$output .= $lodash->alignment('text-align', '.sppb-addon-icons-group', 'data.icon_alignment');

		$output .= '
        <#
            _.each (data.sp_icons_group_item, function(addon_item, key) {
                key ++;
                var icon_id = data.id + key;
        #>';
		$output .= $lodash->unit('margin', '.sppb-icons-group-list', 'data.margin', 'px', false, '-');
		$output .= $lodash->unit('font-size', '.sppb-icons-group-list li#icon-{{icon_id}} i', 'data.size', 'px');
		$output .= $lodash->unit('margin', '.sppb-icons-group-list li#icon-{{icon_id}}', 'data.margin', 'px');
		$output .= $lodash->unit('display', '.sppb-icons-group-list li#icon-{{icon_id}}', 'data.item_display');
		$output .= $lodash->spacing('margin', '.sppb-addon-title', 'data.title_margin');
		$output .= $lodash->spacing('padding', '.sppb-addon-title', 'data.title_padding');


		// Title
		$titleTypographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight',
		];

		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);

		$output .= '<# 
		const {icon_link} = addon_item;
		const isUrlObject_title = _.isObject(icon_link) && (!!icon_link.url || !!icon_link.menu || !!icon_link.page);
		const isUrlString_icon = _.isString(icon_link) && icon_link !== "";
		const isUrlString_title = _.isString(data.title_link) && data.title_link !== "";

		if(isUrlObject_title || isUrlString_icon || isUrlString_title){
			const urlObj = icon_link?.url ? icon_link : window.getSiteUrl(icon_link, addon_item.link_open_new_window);
			const {url, new_tab, nofollow, type, noopener, noreferrer} = urlObj;
			const target = new_tab ? "_blank" : "";
			
			let rel = "";
			rel += nofollow ? "nofollow": "";
			rel += noopener ? " noopener": "";
			rel += noreferrer ? " noreferrer": "";
			
			const title_url = (type === "url" && url) || (type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page)  && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";

			if(title_url) { #>';
		$output .= $lodash->color('color', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.color');
		$output .= $lodash->color('background-color', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.background');
		$output .= $lodash->border('border-color', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.border_color');
		$output .= $lodash->border('border-style', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.border_style');
		$output .= $lodash->unit('width', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.width', 'px');
		$output .= $lodash->unit('height', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.height', 'px');
		$output .= $lodash->unit('border-width', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.border_width', 'px');
		$output .= $lodash->unit('font-size', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'data.size', 'px');
		$output .= $lodash->unit('border-radius', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.border_radius', 'px');
		$output .= $lodash->spacing('padding', '.sppb-icons-group-list li#icon-{{icon_id}} a', 'addon_item.padding');
		$output .= $lodash->color('color', '.sppb-icons-group-list li#icon-{{icon_id}} a:hover', 'addon_item.hover_color');
		$output .= $lodash->color('background-color', '.sppb-icons-group-list li#icon-{{icon_id}} a:hover', 'addon_item.hover_background');
		$output .= $lodash->border('border-color', '.sppb-icons-group-list li#icon-{{icon_id}} a:hover', 'addon_item.hover_border_color');
		$output .=	'<# }} else {
		#>';
		$output .= $lodash->color('color', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.color');
		$output .= $lodash->color('background-color', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.background');
		$output .= $lodash->border('border-color', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.border_color');
		$output .= $lodash->border('border-style', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.border_style');
		$output .= $lodash->unit('width', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.width', 'px');
		$output .= $lodash->unit('height', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.height', 'px');
		$output .= $lodash->unit('border-width', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.border_width', 'px');
		$output .= $lodash->unit('font-size', '.sppb-icons-group-list li#icon-{{icon_id}}', 'data.size', 'px');
		$output .= $lodash->unit('border-radius', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.border_radius', 'px');
		$output .= $lodash->spacing('padding', '.sppb-icons-group-list li#icon-{{icon_id}}', 'addon_item.padding');
		$output .= $lodash->color('color', '.sppb-icons-group-list li#icon-{{icon_id}}:hover', 'addon_item.hover_color');
		$output .= $lodash->color('background-color', '.sppb-icons-group-list li#icon-{{icon_id}}:hover', 'addon_item.hover_background');
		$output .= $lodash->border('border-color', '.sppb-icons-group-list li#icon-{{icon_id}}:hover', 'addon_item.hover_border_color');
		$output .= '<# } #>';
		// label
		$output .= $lodash->unit('font-size', '.sppb-icons-group-list li#icon-{{icon_id}} .sppb-icons-label-text', 'addon_item.label_size', 'px');
		$output .= $lodash->unit('line-height', '.sppb-icons-group-list li#icon-{{icon_id}} .sppb-icons-label-text', 'addon_item.label_lineheight', 'px');
		$output .= $lodash->unit('letter-spacing', '.sppb-icons-group-list li#icon-{{icon_id}} .sppb-icons-label-text', 'addon_item.label_letterspace', '', false);
		$output .= $lodash->unit('font-weight', '.sppb-icons-group-list li#icon-{{icon_id}} .sppb-icons-label-text', 'addon_item.label_font_style?.weight', '', false);
		$output .= $lodash->spacing('margin', '.sppb-icons-group-list li#icon-{{icon_id}} .sppb-icons-label-text', 'addon_item.label_margin');
		$output .= $lodash->typography('.sppb-icons-group-list li#icon-{{icon_id}} .sppb-icons-label-text', 'addon_item.label_typography', [
			'size'           => 'addon_item.label_size',
			'line_height'    => 'addon_item.label_lineheight',
			'letter_spacing' => 'addon_item.label_letterspace',
			'uppercase'      => 'addon_item.label_font_style?.uppercase',
			'italic'         => 'addon_item.label_font_style?.italic',
			'underline'      => 'addon_item.label_font_style?.underline',
			'weight'         => 'addon_item.label_font_style?.weight',
		]);
		$output .= ' <# }) #>
		
        </style>

            <#
                let contentClass = (!_.isEmpty(data.class) && data.class) ? data.class : "";
                let icon_items = (!_.isEmpty(data.sp_icons_group_item) && data.sp_icons_group_item) ? data.sp_icons_group_item : "";
                let alignment = (!_.isEmpty(data.icon_alignment) && data.icon_alignment) ? \' \' + data.icon_alignment : "";
            #>
                <div class="sppb-addon sppb-addon-icons-group {{contentClass}} {{(data.title_position ? "icons-group-title-postion-"+data.title_position : "")}}">

                <#
                let heading_selector = data.heading_selector || "h2";
				if (!_.isEmpty(data.title)) {
                #>
                <{{ heading_selector }} class="sppb-addon-title">
                <#
                let icon_title_arr = (typeof data.title_icon !== "undefined" && data.title_icon) ? data.title_icon.split(" ") : "";
                let icon_title_name = icon_title_arr.length === 1 ? "fa "+data.title_icon : data.title_icon;

                if(data.title_icon && data.title_icon_position == "before"){ #><span class="{{ icon_title_name }}"></span> <# } #>
                    <span class="sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{{ data.title }}}</span>
                <# if(data.title_icon && data.title_icon_position == "after"){ #> <span class="{{ icon_title_name }}"></span><# } #>
                </{{ heading_selector }}>
				<# } #>	
                <ul class="sppb-icons-group-list">
                <# _.each (icon_items, function(icon_item, key) {
                    key ++;
                    let icon_class = (!_.isEmpty(icon_item.icon_class) && icon_item.icon_class !== "") ? icon_item.icon_class : " ";
                    let icon_id = data.id + key;
                #>

                    <li id="icon-{{icon_id}}" class="{{icon_class}}">

					<#
					const {icon_link} = icon_item;
					const isUrlObject_title = _.isObject(icon_link) && (!!icon_link.url || !!icon_link.menu || !!icon_link.page);
					const isUrlString = _.isString(icon_link) && icon_link !== "";
					const isUrlString_title = _.isString(data.title_link) && data.title_link !== "";
					
					if(isUrlObject_title || isUrlString_title || isUrlString){

					    const urlObj = icon_link?.url ? icon_link : window.getSiteUrl(icon_link, icon_item.link_open_new_window);
						const {url, new_tab, nofollow, noopener, noreferrer, type} = urlObj;
                        const target = new_tab ? "_blank" : "";

						let rel = "";
						rel += nofollow ? "nofollow": "";
						rel += noopener ? " noopener": "";
						rel += noreferrer ? " noreferrer": "";
						
						const title_url = (type === "url" && url) || (type === "menu" && urlObj.menu) || ( (type === "page" && !!urlObj.page)  && "index.php/component/sppagebuilder/index.php?option=com_sppagebuilder&view=page&id=" + urlObj.page) || "";
                    	#>
				      <# if(title_url) { #>
						 <a href=\'{{title_url}}\' target="{{target}}" rel=\'{{rel}}\'>
						<# } #>
                    <# } #>

					<#
                    if (!_.isEmpty(icon_item.label_position) && icon_item.show_label !== 0 && icon_item.label_position == "top") {
                    #>
                        <span class="sppb-icons-label-text">{{icon_item.label_text}}</span>
                    <# }
                    if (!_.isEmpty(icon_item.icon_name)) {
                        let icon_arr2 = (typeof icon_item.icon_name !== "undefined" && icon_item.icon_name) ? icon_item.icon_name.split(" ") : "";
                        let icon_name2 = icon_arr2.length === 1 ? "fa "+icon_item.icon_name : icon_item.icon_name;
                    #>
                        <i class="{{icon_name2}} "></i>
                    <# }
                    if (!_.isEmpty(icon_item.label_position) && icon_item.show_label !== 0 && icon_item.label_position == "right") {
                    #>
                        <span class="sppb-icons-label-text right">{{icon_item.label_text}}</span>
                    <# }
                    if (!_.isEmpty(icon_item.label_position) && icon_item.show_label !== 0 && icon_item.label_position == "bottom") {
                    #>
                        <span class="sppb-icons-label-text">{{icon_item.label_text}}</span>
                    <# }
                    if (icon_item.icon_link) {
                    #>
                        </a>
                    <# } #>

                    </li>
                <# }) #>
                </ul>
                </div>
                ';
		return $output;
	}
}
