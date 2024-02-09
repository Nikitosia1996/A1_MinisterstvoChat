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
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Http\Http;
use Joomla\CMS\Uri\Uri;

class SppagebuilderAddonFlickr extends SppagebuilderAddons
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

		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? ' ' . $this->addon->settings->class : '';
		$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';
		$count = (isset($this->addon->settings->count) && $this->addon->settings->count) ? $this->addon->settings->count : 0;
		$api_code = (isset($this->addon->settings->api) && $this->addon->settings->api) ? $this->addon->settings->api : '2fc5721d612333f915b8ab6c9def835f';
		$images = $this->getImages();

		// Output
		$output  = '<div class="sppb-addon sppb-addon-flickr ' . $class . '">';
		$output .= ($title) ? '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>' : '';
		$output .= '<div class="sppb-addon-content">';
		$output .= '<ul class="sppb-flickr-gallery">';

		if ($api_code === '2fc5721d612333f915b8ab6c9def835f')
		{
			for ($i = 0; $i < $count; $i++)
			{
				$output .= '<li>';
				$output .= '<a target="_blank" rel="noopener noreferrer" href="' . str_replace('_m', '_b', $images[$i]->media->m) . '" class="sppb-flickr-gallery-btn">';
				$output .= '<img class="sppb-img-responsive" src="' . str_replace('_m', '_q', $images[$i]->media->m) . '" alt="' . $images[$i]->title . '" loading="lazy">';
				$output .= '</a>';
				$output .= '</li>';
			}
		}
		else
		{
			foreach ($images as $image)
			{
				$image_url = "https://farm" . $image->farm . ".staticflickr.com/" . $image->server . "/" . $image->id . "_" . $image->secret . "_b.jpg";

				$output .= '<li>';
				$output .= '<a target="_blank" rel="noopener noreferrer" href="' . $image_url . '" class="sppb-flickr-gallery-btn">';
				$output .= '<img class="sppb-img-responsive" src="' . substr_replace($image_url, "_q", -6, 2) . '" alt="' . $image->title . '" loading="lazy">';
				$output .= '</a>';
				$output .= '</li>';
			}
		}

		$output .= '</ul>';
		$output .= '</div>';
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
		$addon_id    = '#sppb-addon-' . $this->addon->id;
		$cssHelper = new CSSHelper($addon_id);

		$thumb_per_row  = (isset($this->addon->settings->thumb_per_row) && $this->addon->settings->thumb_per_row) ? $this->addon->settings->thumb_per_row : 4;
		$width = round((100 / $thumb_per_row), 2);
		$settings->flickr_thumbnail_width = $width;

		$css = '';

		if ($thumb_per_row)
		{
			$thumbStyle = $cssHelper->generateStyle('.sppb-flickr-gallery li', $settings, ['flickr_thumbnail_width' => 'height: auto; width: %s'], '%');
			$css .= $thumbStyle;
		}

		return $css;
	}

	/**
	 * Attach external stylesheets.
	 *
	 * @return 	array
	 * @since 	1.0.0
	 */
	public function stylesheets()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/css/magnific-popup.css');
	}

	/**
	 * Attach external scripts.
	 *
	 * @return 	void
	 * @since 	1.0.0
	 */
	public function scripts()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/jquery.magnific-popup.min.js');
	}

	/**
	 * Attach inline JavaScript.
	 *
	 * @return 	void
	 * @since 	1.0.0
	 */
	public function js()
	{
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$js = 'jQuery(function($){
			$("' . $addon_id . ' ul li").magnificPopup({
				delegate: "a",
				type: "image",
				mainClass: "mfp-no-margins mfp-with-zoom",
				gallery:{
					enabled:true
				},
				image: {
					verticalFit: true
				},
				zoom: {
					enabled: true,
					duration: 300
				}
			});
		})';

		return $js;
	}

	/**
	 * Get images for flickr gallery.
	 *
	 * @return 	array
	 * @since 	1.0.0
	 */
	private function getImages()
	{

		$cache_path = JPATH_CACHE . '/com_sppagebuilder/addons/addon-' . $this->addon->id;
		$cache_file = $cache_path . '/flickr.json';

		if (!Folder::exists($cache_path))
		{
			Folder::create($cache_path, 0755);
		}

		if (File::exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 30)))
		{
			$images = file_get_contents($cache_file);
		}
		else
		{
			$id = (isset($this->addon->settings->id) && $this->addon->settings->id) ? $this->addon->settings->id : '35591378@N03';
			$api_code = (isset($this->addon->settings->api) && $this->addon->settings->api) ? $this->addon->settings->api : '2fc5721d612333f915b8ab6c9def835f';
			$count = (isset($this->addon->settings->count) && $this->addon->settings->count) ? $this->addon->settings->count : 0;

			if ($api_code == '2fc5721d612333f915b8ab6c9def835f')
			{
				$api = 'https://api.flickr.com/services/feeds/photos_public.gne?id=' . $id . '&format=json&nojsoncallback=1';
			}
			else
			{
				$api = 'https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $api_code . '&user_id=' . $id . '&per_page=' . $count . '&format=json&nojsoncallback=1';
			}

			$http = new Http;

			$imagesResponse = $http->get($api);
			$images = $imagesResponse->body;

			if ($imagesResponse->code !== 200)
			{
				// throw new Exception($imagesResponse->error->message);
			}

			if (!empty($images))
			{
				File::write($cache_file, $images);
			}
		}

		$json = json_decode($images);

		if (isset($json->photos->photo))
		{
			return $json->photos->photo;
		}
		elseif (isset($json->items))
		{
			return $json->items;
		}

		return array();
	}
}
