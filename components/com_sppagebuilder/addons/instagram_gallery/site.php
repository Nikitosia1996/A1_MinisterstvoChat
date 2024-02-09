<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

//no direct access
defined('_JEXEC') or die('restricted access');
define('FACEBOOK_URI', 'https://graph.facebook.com/v7.0');

use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Http\Http;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\HTML\Helpers\StringHelper;

class SppagebuilderAddonInstagram_gallery extends SppagebuilderAddons
{
	public static $assets = array();

	/**
	 * The addon frontend render method.
	 * The returned HTML string will render to the frontend page.
	 *
	 * @return  string  The HTML string.
	 * @since   1.0.0
	 */
	public function render()
	{
		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
		$heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';
		$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$count = (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : 0;
		$show_stats = (isset($this->addon->settings->show_stats) && $this->addon->settings->show_stats) ? $this->addon->settings->show_stats : array();
		$thumb_per_row  = (isset($this->addon->settings->thumb_per_row) && $this->addon->settings->thumb_per_row) ? $this->addon->settings->thumb_per_row : 4;

		$layout_type  = (isset($this->addon->settings->layout_type) && $this->addon->settings->layout_type) ? $this->addon->settings->layout_type : 'default';

		$output = '';
		$output .= '<div class="sppb-addon sppb-addon-instagram-gallery ' . $class . ' layout-' . $layout_type . '">';

		if ($title)
		{
			$output .= '<div class="sppb-addon-instagram-text-wrap">';
			$output .= '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>';
			$output .= '</div>'; //.sppb-addon-instagram-text-wrap
		}

		$media = $this->getMedias();

		if (!empty($media->media->data))
		{
			$items = $media->media->data;
		}
		elseif (!empty($media->data))
		{
			$items = $media->data;
		}

		$total_items = 0;

		if (!empty($items))
		{
			$total_items = count($items);
		}

		if (empty($items))
		{
			$output .= '<p class="alert alert-warning">' . Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_ERORR') . '</p>';
		}
		else
		{
			$output .= '<ul class="sppb-instagram-images">';
			foreach ($items as $item)
			{
				$image_url = isset($item->media_url) ? $item->media_url : Uri::root() . 'components/com_sppagebuilder/addons/instagram_gallery/assets/images/instagram-logo.png';

				if ($item->media_type === 'VIDEO')
				{
					$image_url = $item->thumbnail_url;
				}

				if ($layout_type === 'classic')
				{
					$output .= '<li class="sppb-instagram-image">';
					$output .= '<div class="sppb-instagram-classic-content-wrap">';
					if (in_array('author', $show_stats) && isset($media->name))
					{
						$output .= '<div class="addon-instagram-item-author-wrap">';
						$author_image = (isset($media->profile_picture_url) && $media->profile_picture_url) ? $media->profile_picture_url : false;

						$author_name = false;

						if (isset($media->name) && $media->name)
						{
							$author_name = $media->name;
						}

						$output .= '<div class="addon-instagram-author-info">';

						if ($author_image)
						{
							$output .= '<a class="instagram-author-image" href="https://www.instagram.com/' . $item->username . '/" target="_blank" rel="noopener noreferrer"><img src="' . $author_image . '" alt="' . $author_name  . '" loading="lazy"></a>';
						}

						$output .= '<div class="instagram-author-meta-content">';

						if ($author_name)
						{
							$output .= '<a href="https://www.instagram.com/' . $item->username . '/" target="_blank" rel="noopener noreferrer">' . $author_name . '</a>';
						}

						$output .= '<span>' . ((new DateTime($item->timestamp))->format('F j, Y')) . '</span>';
						$output .= '</div>'; //.instagram-author-meta-content
						$output .= '</div>'; //.addon-instagram-author-info
						$output .= '<a class="instagram-redirect-link" href="https://www.instagram.com/' . $item->username . '/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram" aria-hidden="true" title="' . Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_REDIRECT') . '"></i><span class="sppb-sr-only">' . Text::_('COM_SPPAGEBUILDER_ADDON_INSTAGRAM_REDIRECT') . '</span></a>';
						$output .= '</div>'; //.addon-instagram-item-author-wrap
					}

					$output .= (!empty($image_url)) ? '<a class="sppb-instagram-gallery-btn" href="' . $image_url . '">' : '';
					$output .= '<div class="addon-instagram-image-wrap">';
					$output .= '<img class="instagram-image sppb-img-responsive" src="' . $image_url . '" alt="" loading="lazy">';
					$output .= '</div>'; //.addon-instagram-image-wrap

					if (in_array('likes', $show_stats) || in_array('comments', $show_stats) || in_array('caption', $show_stats))
					{

						$output .= '<div class="addon-instagram-classic-meta-content">';
						if (in_array('likes', $show_stats) || in_array('comments', $show_stats))
						{
							// get stats
							$likes = (isset($item->like_count) && $item->like_count) ? $item->like_count : 0;
							$comments = (isset($item->comments_count) && $item->comments_count) ? $item->comments_count : 0;

							$output .= '<div class="addon-instagram-item-info">';
							if (in_array('likes', $show_stats))
							{
								$output .= '<span class="addon-instagram-item-likes"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="intagram-like-number">' . $likes . '</span></span>';
							}
							if (in_array('comments', $show_stats))
							{
								$output .= '<span class="addon-instagram-item-comments"><i class="fa fa-comment-o" aria-hidden="true"></i><span class="intagram-comment-number">' . $comments . '</span></span>';
							}
							$output .= '</div>'; //.addon-instagram-item-info
						}
						if (in_array('caption', $show_stats))
						{
							$caption_txt = (isset($item->caption) && $item->caption) ? $item->caption : false;

							if ($caption_txt)
							{
								$output .= '<div class="addon-instagram-caption">';
								$output .= '<p>';

								if (isset($item->username))
								{
									$output .= '<strong>' . $item->username . '</strong>';
								}

								$output .= StringHelper::truncate(strip_tags($caption_txt), 100) . '</p>';
								$output .= '</div>'; //.addon-instagram-item-info
							}
						}
						$output .= '</div>'; //.addon-instagram-classic-meta-content
					}
					$output .= (!empty($image_url)) ? '</a>' : '';
					$output .= '</div>'; //.sppb-instagram-classic-content-wrap
					$output .= '</li>'; //.sppb-instagram-image
				}
				else
				{
					$output .= '<li class="sppb-instagram-image">';
					$output .= (!empty($image_url)) ? '<a class="sppb-instagram-gallery-btn" href="' . $image_url . '">' : '';
					$output .= '<div class="addon-instagram-item-wrap">';
					if (in_array('likes', $show_stats) || in_array('comments', $show_stats) || in_array('author', $show_stats) || in_array('caption', $show_stats))
					{
						$output .= '<div class="addon-instagram-item-overlay">';
						$output .= '<div class="addon-instagram-meta-content">';
						if (in_array('likes', $show_stats) || in_array('comments', $show_stats))
						{
							// get stats
							$likes = (isset($item->like_count) && $item->like_count) ? $item->like_count : 0;
							$comments = (isset($item->comments_count) && $item->comments_count) ? $item->comments_count : 0;

							$output .= '<div class="addon-instagram-item-info">';
							if (in_array('likes', $show_stats))
							{
								$output .= '<span class="addon-instagram-item-likes"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="intagram-like-number">' . $likes . '</span></span>';
							}
							if (in_array('comments', $show_stats))
							{
								$output .= '<span class="addon-instagram-item-comments"><i class="fa fa-comment-o" aria-hidden="true"></i><span class="intagram-comment-number">' . $comments . '</span></span>';
							}
							$output .= '</div>'; //.addon-instagram-item-info
						}
						if (in_array('caption', $show_stats))
						{
							$caption_txt = (isset($item->caption) && $item->caption) ? $item->caption : false;

							if ($caption_txt)
							{
								$output .= '<div class="addon-instagram-caption">';
								$output .= '<p>' .  StringHelper::truncate(strip_tags($caption_txt), 100) . '</p>';
								$output .= '</div>'; //.addon-instagram-caption
							}
						}
						$output .= '</div>'; //.addon-instagram-meta-content
						$output .= '</div>'; //.addon-instagram-item-overlay
					}

					$output .= '<div class="addon-instagram-image-wrap">';
					$output .= '<img class="instagram-image sppb-img-responsive" src="' . $image_url . '" alt="" loading="lazy">';
					$output .= '</div>'; //.addon-instagram-image-wrap

					$output .= '</div>'; //.addon-instagram-item-wrap

					$output .= (!empty($image_url)) ? '</a>' : '';
					$output .= '</li>'; //.sppb-instagram-image
				}
			}

			$output .= '</ul>'; //.sppb-instagram-images
		}

		$output .= '</div>'; //.sppb-addon-instagram-gallery
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

		$thumb_per_row  = (isset($settings->thumb_per_row) && $settings->thumb_per_row) ? $settings->thumb_per_row : 4;
		$layout_type  = (isset($settings->layout_type) && $settings->layout_type) ? $settings->layout_type : 'default';

		$width = round((100 / $thumb_per_row), 4);

		$css = '';

		if ($thumb_per_row)
		{
			$widthObject = AddonHelper::initDeviceObject();
			$widthObject->xl = null;
			$widthObject->lg = null;
			$widthObject->md = '50';
			$widthObject->sm = '100';
			$widthObject->xs = '100';

			if ($thumb_per_row > 3)
			{
				$widthObject->md = 100 / $thumb_per_row;
			}

			$settings->dummy_item_plain_width = $width;
			$settings->dummy_item_object_width = $widthObject;
			$settings->dummy_item_height = 'auto';

			$itemStyle = $cssHelper->generateStyle('.sppb-instagram-images .sppb-instagram-image', $settings, ['dummy_item_plain_width' => 'width', 'dummy_item_height' => 'height'], ['dummy_item_plain_width' => '%', 'dummy_item_height' => false]);

			if ($layout_type === 'classic')
			{
				$itemStyle .= $cssHelper->generateStyle('.sppb-instagram-images .sppb-instagram-image', $settings, ['dummy_item_plain_width' => 'flex: 0 0 %s'], '%');
			}

			$itemStyle .= $cssHelper->generateStyle('.sppb-instagram-images .sppb-instagram-image', $settings, ['dummy_item_object_width' => ['width', 'flex: 0 0 %s']], '%');

			return $itemStyle;
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
	 * Attach inline javascript.
	 *
	 * @return 	string
	 * @since 	1.0.0
	 */
	public function js()
	{
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$js = 'jQuery(function($){
				$("' . $addon_id . ' .sppb-instagram-gallery-btn").magnificPopup({
					type: "image",
					gallery: {
						enabled: true
					  },
				});
			});
			';

		return $js;
	}

	/**
	 * Get the instagram medias using the token and userID.
	 *
	 * @return 	string
	 * @since 	1.0.0
	 */
	private function getMedias()
	{
		$cParams = ComponentHelper::getParams('com_sppagebuilder');
		$igToken = json_decode($cParams->get('ig_token', '{}'));

		$item_resource 	= (isset($this->addon->settings->item_resource) && $this->addon->settings->item_resource) ? $this->addon->settings->item_resource : 'userid';
		$user_id 		= isset($igToken->igId) ? $igToken->igId : '';
		$hashtag 	  	= (isset($this->addon->settings->hashtag) && $this->addon->settings->hashtag) ? $this->addon->settings->hashtag : '';
		$hashtag_type 	= (isset($this->addon->settings->hashtag_type) && $this->addon->settings->hashtag_type) ? $this->addon->settings->hashtag_type : 'top';
		$access_token 	= isset($igToken->accessToken) ? $igToken->accessToken : '';
		$limit 			= (isset($this->addon->settings->limit) && $this->addon->settings->limit) ? $this->addon->settings->limit : 4;

		$http = new Http;

		if ($item_resource === 'userid')
		{
			$fields = ['id', 'caption', 'children', 'comments_count', 'like_count', 'media_type', 'media_url', 'thumbnail_url', 'username', 'timestamp'];
			$url = FACEBOOK_URI . '/' . $user_id . '?fields=media.limit(' . $limit . '){' . implode(',', $fields) . '},profile_picture_url,name&access_token=' . $access_token;
		}
		elseif ($item_resource === 'hashtag')
		{
			$hashtagUrl = FACEBOOK_URI . '/ig_hashtag_search?user_id=' . $user_id . '&q=' . $hashtag . '&access_token=' . $access_token;
			$igHashtagId = '';

			try
			{
				$hashtagResponse = $http->get($hashtagUrl);
				$hashtagBody = json_decode($hashtagResponse->body);

				if ($hashtagResponse->code !== 200)
				{
					throw new Exception($hashtagBody->error->message);
				}

				$igHashtagId = $hashtagBody->data[0]->id;
			}
			catch (Exception $e)
			{
				$this->error[] = $e->getMessage();
				return;
			}

			$fields = ['id', 'caption', 'comments_count', 'like_count', 'media_type', 'media_url', 'timestamp'];

			if ($hashtag_type === 'recent')
			{
				$url = FACEBOOK_URI . '/' . $igHashtagId . '/recent_media?user_id=' . $user_id . '&fields=' . implode(',', $fields) . '&limit=' . $limit . '&media_type=IMAGE&access_token=' . $access_token;
			}
			else
			{
				$url = FACEBOOK_URI . '/' . $igHashtagId . '/top_media?user_id=' . $user_id . '&fields=' . implode(',', $fields) . '&limit=' . $limit . '&media_type=IMAGE&access_token=' . $access_token;
			}
		}

		try
		{
			$response = $http->get($url);
			$body = json_decode($response->body);

			if ($response->code !== 200)
			{
				throw new Exception($body->error->message);
			}
		}
		catch (Exception $e)
		{
			// echo '<p class="alert alert-warning"><strong>Instagram Error:</strong> ' . $e->getMessage() . '</p>';
			return;
		}

		return $body;
	}
}
