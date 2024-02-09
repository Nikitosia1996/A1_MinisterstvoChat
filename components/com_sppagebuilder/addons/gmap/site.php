<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Version;

class SppagebuilderAddonGmap extends SppagebuilderAddons
{

	public function render()
	{
		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

		//Options
		$map = (isset($settings->map) && $settings->map) ? $settings->map : '';
		$infowindow  = (isset($settings->infowindow) && $settings->infowindow) ? $settings->infowindow : '';
		$gmap_api = (isset($settings->gmap_api) && $settings->gmap_api) ? $settings->gmap_api : '';
		$type = (isset($settings->type) && $settings->type) ? $settings->type : '';
		$zoom = (isset($settings->zoom) && $settings->zoom) ? $settings->zoom : '';
		$mousescroll = (isset($settings->mousescroll) && $settings->mousescroll) ? $settings->mousescroll : '';
		$show_controllers = (isset($settings->show_controllers) && $settings->show_controllers) ? $settings->show_controllers : 0;

		$multi_location = (isset($settings->multi_location) && $settings->multi_location) ? $settings->multi_location : 0;
		$location_addr = [];
		if (isset($settings->multi_location_items) && $multi_location !== 0)
		{
			foreach ($settings->multi_location_items as $key => $item)
			{
				$lat_long = explode(',', $item->location_item);
				$location_addr[] = array('address' => $item->location_popup_text, 'latitude' => $lat_long[0], 'longitude' => $lat_long[1]);
			}
		}
		$location_json = json_encode($location_addr);

		if ($map)
		{
			$map = explode(',', $map);
			$output  = '<div id="sppb-addon-map-' . $this->addon->id . '" class="sppb-addon sppb-addon-gmap ' . $class . '">';
			$output .= ($title) ? '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>' : '';
			$output .= '<div class="sppb-addon-content">';
			$output .= '<div id="sppb-addon-gmap-' . $this->addon->id . '" class="sppb-addon-gmap-canvas" data-lat="' . trim($map[0]) . '" data-lng="' . trim($map[1]) . '" data-location=\'' . base64_encode($location_json) . '\' data-maptype="' . $type . '" data-mapzoom="' . $zoom . '" data-mousescroll="' . $mousescroll . '" data-infowindow="' . base64_encode($infowindow) . '" data-show-controll=\'' . $show_controllers . '\'></div>';
			$output .= '</div>';
			$output .= '</div>';
			return $output;
		}

		return;
	}

	public function scripts()
	{
		$params = ComponentHelper::getParams('com_sppagebuilder');
		$gmap_api = $params->get('gmap_api', '');

		$version = new Version();
		$JoomlaVersion = (float) $version->getShortVersion();

		if ($JoomlaVersion > 4)
		{
			Factory::getDocument()->getWebAssetManager()->registerAndUseScript('gmap-api', "https://maps.googleapis.com/maps/api/js?key=" . $gmap_api, [], []);
		}
		else
		{
			HTMLHelper::_('script', "https://maps.googleapis.com/maps/api/js?key=" . $gmap_api, [], []);
		}
	
		return [
			Uri::base(true) . "/components/com_sppagebuilder/assets/js/gmap.js"
		];
	}

	public function css()
	{
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$cssHelper = new CSSHelper($addon_id);
		$settings = $this->addon->settings;
		$css = '';

		$height = $cssHelper->generateStyle('.sppb-addon-gmap-canvas', $settings, ['height' => 'height']);
		$css .= $height;

		$css .= $cssHelper->generateStyle('a>div>img', $settings, [], '', [], null, false, 'top:-15px!important;');

		return $css;
	}

	public static function getTemplate()
	{
		$lodash = new Lodash('#sppb-addon-{{ data.id }}');
		$output = '
		<#
			var map = data.map.split(",");

			var ConvertToBaseSixFour = {
				_keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
				encode: function(e) {
					var t = "";
					var n, r, i, s, o, u, a;
					var f = 0;
					e = ConvertToBaseSixFour._utf8_encode(e);
					while (f < e.length) {
						n = e.charCodeAt(f++);
						r = e.charCodeAt(f++);
						i = e.charCodeAt(f++);
						s = n >> 2;
						o = (n & 3) << 4 | r >> 4;
						u = (r & 15) << 2 | i >> 6;
						a = i & 63;
						if (isNaN(r)) {
							u = a = 64
						} else if (isNaN(i)) {
							a = 64
						}
						t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
					}
					return t
				},
				_utf8_encode: function(e) {
					e = e.replace(/rn/g, "n");
					var t = "";
					for (var n = 0; n < e.length; n++) {
						var r = e.charCodeAt(n);
						if (r < 128) {
							t += String.fromCharCode(r)
						} else if (r > 127 && r < 2048) {
							t += String.fromCharCode(r >> 6 | 192);
							t += String.fromCharCode(r & 63 | 128)
						} else {
							t += String.fromCharCode(r >> 12 | 224);
							t += String.fromCharCode(r >> 6 & 63 | 128);
							t += String.fromCharCode(r & 63 | 128)
						}
					}
					return t
				}
			};
			var infoText = (!_.isEmpty(data.infowindow)) ? ConvertToBaseSixFour.encode(data.infowindow) : "";

			let location_addr = {
				address: data.infowindow,
				latitude: map[0],
				longitude: map[1]
			};
			if(_.isObject(data.multi_location_items) && data.multi_location !== 0){
				_.each(data.multi_location_items, function(item){
					let latLong = _.split(item.location_item, ",");
					let mainObj = {
						address: item.location_popup_text,
						latitude: latLong[0],
						longitude: latLong[1]
					}
					location_addr = _.concat(location_addr, mainObj);
				})
			}
			let latiLongi = _.split(location_addr.location_item, ",");

			let location_json = JSON.stringify(location_addr);
			
		#>
		<style type="text/css">';
		$titleTypographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'uppercase'      => 'data.title_font_style?.uppercase',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'weight'         => 'data.title_font_style?.weight'
		];
		$output .= $lodash->unit('margin-bottom', '.sppb-addon-title', 'data.title_margin_bottom');
		$output .= $lodash->unit('margin-top', '.sppb-addon-title', 'data.title_margin_top');
		$output .= $lodash->color('color', '.sppb-addon-title', 'data.title_text_color');
		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);

		$output .= $lodash->unit('height', '.sppb-addon-gmap-canvas', 'data.height', 'px');
		$output .= '
		#sppb-addon-map-{{ data.id }} a>div>img{top:-15px!important;}
		</style>
		<div id="sppb-addon-map-{{ data.id }}" class="sppb-addon sppb-addon-gmap {{ data.class }}">
			<# if( !_.isEmpty( data.title ) ){ #><{{ data.heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ data.heading_selector }}><# } #>
			<div class="sppb-addon-content">
				<div id="sppb-addon-gmap-{{ data.id }}" class="sppb-addon-gmap-canvas" style="pointer-events: none;" data-location=\'{{ConvertToBaseSixFour.encode(location_json)}}\' data-lat="{{ map[0] }}" data-lng="{{ map[1] }}" data-maptype="{{ data.type }}" data-mapzoom="{{ data.zoom }}" data-mousescroll="{{ data.mousescroll }}" data-infowindow="{{ infoText }}" data-show-controll="{{data.show_controllers}}"></div>
			</div>
		</div>';

		return $output;
	}
}
