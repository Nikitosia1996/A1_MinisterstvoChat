<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

// No direct access
defined('_JEXEC') or die('resticted access');

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Version;

class SppagebuilderAddonArticles extends SppagebuilderAddons
{

	public function render()
	{
		$page_view_name = isset($_GET['view']);
		$app = Factory::getApplication();

		$version = new Version();
		$JoomlaVersion = $version->getShortVersion();

		if ($app->isClient('administrator'))
		{
			return ''; // prevent from loading in the admin view
		}

		$settings = $this->addon->settings;


		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$style = (isset($settings->style) && $settings->style) ? $settings->style : 'panel-default';
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

		// Addon options
		$resource 		= (isset($settings->resource) && $settings->resource) ? $settings->resource : 'article';
		$catid 			= (isset($settings->catid) && $settings->catid) ? $settings->catid : [];
		$tagids 		= (isset($settings->tagids) && $settings->tagids) ? $settings->tagids : array();
		$k2catid 		= [];
		if ((isset($settings->k2catid) && $settings->k2catid))
		{
			if (is_array($settings->k2catid))
			{
				$k2catid = $settings->k2catid;
			}
			else
			{
				$k2catid = [$settings->k2catid];
			}
		}
		$include_subcat = (isset($settings->include_subcat)) ? (int) $settings->include_subcat : 1;
		$post_type 		= (isset($settings->post_type) && $settings->post_type) ? $settings->post_type : '';
		$ordering 		= (isset($settings->ordering) && $settings->ordering) ? $settings->ordering : 'latest';
		$thumb_size 	= (isset($settings->thumb_size) && $settings->thumb_size) ? $settings->thumb_size : 'image_thumbnail';
		$limit 			= (isset($settings->limit) && $settings->limit) ? (int) $settings->limit : 3;

		$previous_columns = (isset($settings->columns) && !is_object($settings->columns)) ? (int) $settings->columns : 3;
		$columns_lg = (isset($settings->columns_original->xl) && $settings->columns_original->xl) ? (int) $settings->columns_original->xl : $previous_columns;
		$columns_md = (isset($settings->columns_original->lg) && $settings->columns_original->lg) ? (int) $settings->columns_original->lg : 3;
		$columns_sm = (isset($settings->columns_original->md) && $settings->columns_original->md) ? (int) $settings->columns_original->md : 3;
		$columns_xs = (isset($settings->columns_original->sm) && $settings->columns_original->sm) ? (int) $settings->columns_original->sm : 3;
		$columns = (isset($settings->columns_original->xs) && $settings->columns_original->xs) ? (int) $settings->columns_original->xs : 3;

		$show_intro 	= (isset($settings->show_intro)) ? (int) $settings->show_intro : 1;
		$intro_limit 	= (isset($settings->intro_limit) && $settings->intro_limit) ? (int) $settings->intro_limit : 200;
		$hide_thumbnail = (isset($settings->hide_thumbnail)) ? (int) $settings->hide_thumbnail : 0;
		$show_author 	= (isset($settings->show_author)) ? (int) $settings->show_author : 1;
		$show_tags 		= (isset($settings->show_tags)) ? (int) $settings->show_tags : 1;
		$show_category 	= (isset($settings->show_category)) ? (int) $settings->show_category : 1;
		$show_date 		= (isset($settings->show_date)) ? (int) $settings->show_date : 1;
		$show_readmore 	= (isset($settings->show_readmore)) ? (int) $settings->show_readmore : 1;
		$readmore_text 	= (isset($settings->readmore_text) && $settings->readmore_text) ? $settings->readmore_text : 'Read More';
		$link_articles 	= (isset($settings->link_articles)) ? (int) $settings->link_articles : 0;	
		$link_catid 	= (isset($settings->link_catid)) ? (int) $settings->link_catid : 0;
		$link_k2catid 	= (isset($settings->link_k2catid)) ? (int) $settings->link_k2catid : 0;
		$show_custom_field 	= (isset($settings->show_custom_field)) ? $settings->show_custom_field : 0;
		
		$show_date_text 		 	  = (isset($settings->show_date_text)) ? $settings->show_date_text : '';
		$show_last_modified_date 	  = (isset($settings->show_last_modified_date)) ? $settings->show_last_modified_date : 0;
		$show_last_modified_date_text = (isset($settings->show_last_modified_date_text)) ? $settings->show_last_modified_date_text : '';
		$article_modified_date 	 	  = ComponentHelper::getParams('com_content')->get('show_modify_date');
		$article_created_date 	 	  = ComponentHelper::getParams('com_content')->get('show_publish_date');

		$all_articles_btn_text   = (!empty($settings->all_articles_btn_text) && $settings->all_articles_btn_text) ? $settings->all_articles_btn_text : 'See all posts';
		$all_articles_btn_class  = (!empty($settings->all_articles_btn_size) && $settings->all_articles_btn_size) ? ' sppb-btn-' . $settings->all_articles_btn_size : '';
		$all_articles_btn_class .= (!empty($settings->all_articles_btn_type) && $settings->all_articles_btn_type) ? ' sppb-btn-' . $settings->all_articles_btn_type : ' sppb-btn-default';
		$all_articles_btn_class .= (!empty($settings->all_articles_btn_shape) && $settings->all_articles_btn_shape) ? ' sppb-btn-' . $settings->all_articles_btn_shape : ' sppb-btn-rounded';
		$all_articles_btn_class .= (!empty($settings->all_articles_btn_appearance) && $settings->all_articles_btn_appearance) ? ' sppb-btn-' . $settings->all_articles_btn_appearance : '';
		$all_articles_btn_class .= (!empty($settings->all_articles_btn_block) && $settings->all_articles_btn_block) ? ' ' . $settings->all_articles_btn_block : '';
		$all_articles_btn_icon   = (!empty($settings->all_articles_btn_icon) && $settings->all_articles_btn_icon) ? $settings->all_articles_btn_icon : '';
		$all_articles_btn_icon_position = (!empty($settings->all_articles_btn_icon_position) && $settings->all_articles_btn_icon_position) ? $settings->all_articles_btn_icon_position : 'left';

		$output   = '';
		//include k2 helper
		$k2helper 		= JPATH_ROOT . '/components/com_sppagebuilder/helpers/k2.php';
		$article_helper = JPATH_ROOT . '/components/com_sppagebuilder/helpers/articles.php';
		$isk2installed  = self::isComponentInstalled('com_k2');

		if ($resource === 'k2')
		{
			if ($isk2installed == 0)
			{
				$output .= '<p class="alert alert-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_ERORR_K2_NOTINSTALLED') . '</p>';
				return $output;
			}
			elseif (!file_exists($k2helper))
			{
				$output .= '<p class="alert alert-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_K2_HELPER_FILE_MISSING') . '</p>';
				return $output;
			}
			else
			{
				require_once $k2helper;
			}

			$items = [];
			if (is_array($k2catid))
			{
				foreach($k2catid as $catId)
				{
					$itemsById = SppagebuilderHelperK2::getItems($limit, $ordering, $catId, $include_subcat);
					$items = array_merge($items, $itemsById);
				}
			}
		}
		else
		{
			require_once $article_helper;
			$items = SppagebuilderHelperArticles::getArticles($limit, $ordering, $catid, $include_subcat, $post_type, $tagids);
		}

		if (!count($items))
		{
			$output .= '<p class="alert alert-warning">' . Text::_('COM_SPPAGEBUILDER_NO_ITEMS_FOUND') . '</p>';
			return $output;
		}

		if (count((array) $items))
		{
			$output  .= '<div class="sppb-addon sppb-addon-articles ' . $class . '">';

			if ($title)
			{
				$output .= '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>';
			}

			$output .= '<div class="sppb-addon-content">';
			$output	.= '<div class="sppb-row">';

			foreach ($items as $key => $item)
			{
				$output .= '<div class="sppb-col-xs-' . round(12 / $columns_xs) . ' sppb-col-sm-' . round(12 / $columns_sm) . ' sppb-col-md-' . round(12 / $columns_md) . ' sppb-col-lg-' . round(12 / $columns_lg) . ' sppb-col-' . round(12 / $columns) . '">';
				$output .= '<div class="sppb-addon-article">';

				if (!$hide_thumbnail)
				{
					$image = '';
					if ($resource === 'k2')
					{
						if (isset($item->image_medium) && $item->image_medium)
						{
							$image = $item->image_medium;
						}
						elseif (isset($item->image_large) && $item->image_large)
						{
							$image = $item->image_medium;
						}
					}
					else
					{
						$image = $item->{$thumb_size} ?? $item->image_thumbnail;
					}

					if ($resource !== 'k2' && $item->post_format === 'gallery')
					{
						if (count((array) $item->imagegallery->images))
						{
							$output .= '<div class="sppb-carousel sppb-slide" data-sppb-ride="sppb-carousel">';
							$output .= '<div class="sppb-carousel-inner">';
							foreach ($item->imagegallery->images as $key => $gallery_item)
							{
								$active_class = '';
								if ($key == 0)
								{
									$active_class = ' active';
								}
								if (isset($gallery_item['thumbnail']) && $gallery_item['thumbnail'])
								{
									$output .= '<div class="sppb-item' . $active_class . '">';
									$output .= '<img src="' . $gallery_item['thumbnail'] . '" alt="">';
									$output .= '</div>';
								}
								elseif (isset($gallery_item['full']) && $gallery_item['full'])
								{
									$output .= '<div class="sppb-item' . $active_class . '">';
									$output .= '<img src="' . $gallery_item['full'] . '" alt="">';
									$output .= '</div>';
								}
							}
							$output	.= '</div>';

							$output	.= '<a class="left sppb-carousel-control" role="button" data-slide="prev" aria-label="' . Text::_('COM_SPPAGEBUILDER_ARIA_PREVIOUS') . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a>';
							$output	.= '<a class="right sppb-carousel-control" role="button" data-slide="next" aria-label="' . Text::_('COM_SPPAGEBUILDER_ARIA_NEXT') . '"><i class="fa fa-angle-right" aria-hidden="true"></i></a>';

							$output .= '</div>';
						}
						elseif (isset($item->image_thumbnail) && $item->image_thumbnail)
						{
							//Lazyload image
							$placeholder = $item->image_thumbnail == '' ? false : $this->get_image_placeholder($item->image_thumbnail);

							//Get image ALT text
							$img_obj = json_decode($item->images);
							$img_obj_helix = json_decode($item->attribs);

							$img_blog_op_alt_text = (isset($img_obj->image_intro_alt) && $img_obj->image_intro_alt) ? $img_obj->image_intro_alt : "";
							$img_helix_alt_text = (isset($img_obj_helix->helix_ultimate_image_alt_txt) && $img_obj_helix->helix_ultimate_image_alt_txt) ? $img_obj_helix->helix_ultimate_image_alt_txt : "";
							$img_alt_text = "";

							if ($img_helix_alt_text)
							{
								$img_alt_text = $img_helix_alt_text;
							}
							else if ($img_blog_op_alt_text)
							{
								$img_alt_text = $img_blog_op_alt_text;
							}
							else
							{
								$img_alt_text = $item->title;
							}

							$output .= '<a href="' . $item->link . '" itemprop="url"><img class="sppb-img-responsive' . ($placeholder && $page_view_name != 'form' ? ' sppb-element-lazy' : '') . '" src="' . ($placeholder && $page_view_name != 'form' ? $placeholder : $item->image_thumbnail) . '" alt="' . $img_alt_text . '" itemprop="thumbnailUrl" ' . ($placeholder && $page_view_name != 'form' ? 'data-large="' . $image . '"' : '') . '  loading="lazy"></a>';
						}
					}
					elseif ($resource != 'k2' &&  $item->post_format == 'video' && isset($item->video_src) && $item->video_src)
					{
						$output .= '<div class="entry-video embed-responsive embed-responsive-16by9">';
						$output .= '<object class="embed-responsive-item" style="width:100%;height:100%;" data="' . $item->video_src . '">';
						$output .= '<param name="movie" value="' . $item->video_src . '">';
						$output .= '<param name="wmode" value="transparent" />';
						$output .= '<param name="allowFullScreen" value="true">';
						$output .= '<param name="allowScriptAccess" value="always"></param>';
						$output .= '<embed src="' . $item->video_src . '" type="application/x-shockwave-flash" allowscriptaccess="always"></embed>';
						$output .= '</object>';
						$output .= '</div>';
					}
					elseif ($resource != 'k2' && $item->post_format == 'audio' && isset($item->audio_embed) && $item->audio_embed)
					{
						$output .= '<div class="entry-audio embed-responsive embed-responsive-16by9">';
						$output .= $item->audio_embed;
						$output .= '</div>';
					}
					elseif ($resource != 'k2' && $item->post_format == 'link' && isset($item->link_url) && $item->link_url)
					{
						$output .= '<div class="entry-link">';
						$output .= '<a target="_blank" rel="noopener noreferrer" href="' . $item->link_url . '"><h4>' . $item->link_title . '</h4></a>';
						$output .= '</div>';
					}
					else
					{
						if (isset($image) && $image)
						{
							//Lazyload image
							$default_placeholder = $image == '' ? false : $this->get_image_placeholder($image);

							//Get image ALT text
							$img_obj = json_decode($item->images);
							$img_obj_helix = json_decode($item->attribs);

							$img_blog_op_alt_text = (isset($img_obj->image_intro_alt) && $img_obj->image_intro_alt) ? $img_obj->image_intro_alt : "";
							$img_helix_alt_text = (isset($img_obj_helix->helix_ultimate_image_alt_txt) && $img_obj_helix->helix_ultimate_image_alt_txt) ? $img_obj_helix->helix_ultimate_image_alt_txt : "";
							$img_alt_text = "";

							if ($img_helix_alt_text)
							{
								$img_alt_text = $img_helix_alt_text;
							}
							else if ($img_blog_op_alt_text)
							{
								$img_alt_text = $img_blog_op_alt_text;
							}
							else
							{
								$img_alt_text = $item->title;
							}

							$output .= '<a class="sppb-article-img-wrap" href="' . $item->link . '" itemprop="url"><img class="sppb-img-responsive' . ($default_placeholder && $page_view_name != 'form' ? ' sppb-element-lazy' : '') . '" src="' . ($default_placeholder && $page_view_name != 'form' ? $default_placeholder : $image) . '" alt="' . $img_alt_text . '" itemprop="thumbnailUrl" ' . ($default_placeholder && $page_view_name != 'form' ? 'data-large="' . $image . '"' : '') . ' loading="lazy"></a>';
						}
					}
				}

				$output .= '<div class="sppb-article-info-wrap">';
				$output .= '<h3><a href="' . $item->link . '" itemprop="url">' . $item->title . '</a></h3>';

				if ($show_author || $show_category || $show_date || $show_tags)
				{
					$output .= '<div class="sppb-article-meta">';

					if ($show_date)
					{
						$date 	   = ($article_created_date) ? HTMLHelper::_('date', $item->publish_up, 'DATE_FORMAT_LC3') : '<p class="alert alert-warning">' . Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_LAST_CREATED_DATE_WARNING_MESSAGE') . '</p>';

						$date_text = ($show_date_text) ? '<b>' . Text::_($show_date_text) . ': </b>' : '';

						$output .= '<span class="sppb-meta-date" itemprop="datePublished">' . $date_text . $date . '</span>';
					}

					if ($show_last_modified_date) 
					{
						$modify_date = ($article_modified_date) ? HTMLHelper::_('date', $item->modified, 'DATE_FORMAT_LC3') : '<p class="alert alert-warning">' . Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_LAST_MODIFIED_DATE_WARNING_MESSAGE') . '</p>';

						$modify_text = ($show_last_modified_date_text) ? '<b>' . Text::_($show_last_modified_date_text) . ': </b>' : '';

						$output .= '<span class="sppb-meta-date" itemprop="datePublished">' . $modify_text . $modify_date . '</span>';
					}

					if ($show_category)
					{
						if ($resource == 'k2')
						{
							$item->catUrl = urldecode(Route::_(K2HelperRoute::getCategoryRoute($item->catid . ':' . urlencode($item->category_alias))));
						}
						else
						{
							$item->catUrl = Route::_(version_compare($JoomlaVersion, '4.0.0', '>=') ? Joomla\Component\Content\Site\Helper\RouteHelper::getCategoryRoute($item->catslug) : ContentHelperRoute::getCategoryRoute($item->catslug));
						}
						$output .= '<span class="sppb-meta-category"><a href="' . $item->catUrl . '" itemprop="genre">' . $item->category . '</a></span>';
					}

					if ($show_author)
					{
						$author = ($item->created_by_alias ?  $item->created_by_alias :  $item->username);
						$output .= '<span class="sppb-meta-author" itemprop="name">' . $author . '</span>';
					}

					if ($show_tags)
					{
						$item->tagLayout = new FileLayout('joomla.content.tags');
						$output .= $item->tagLayout->render($item->tags->itemTags);
					}

					$output .= '</div>';
				}
				
				if ($show_custom_field)
				{

					if ((float) $JoomlaVersion >= 4)
					{
						JLoader::registerAlias('FieldsHelper', 'Joomla\Component\Fields\Administrator\Helper\FieldsHelper');
					}
					else
					{
						JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
					}
				
					// 🚨 Alert: Do not add “FieldsHelper” as a namespace as  Joomla 3 doesn’t support it. 
					$custom_fields = FieldsHelper::getFields('com_content.article',$item);
			
					$output .= FieldsHelper::render(
								'com_content.article',
								'fields.render',
								array(
									'context' => 'com_content.article',
									'item'    => $item,
									'fields'  => $custom_fields,
								)
							);
				}


				if ($show_intro)
				{
					$output .= '<div class="sppb-article-introtext">' . mb_substr(strip_tags($item->introtext), 0, $intro_limit, 'UTF-8') . '...</div>';
				}							

				if ($show_readmore)
				{
					$output .= '<a class="sppb-readmore" href="' . $item->link . '" itemprop="url">' . $readmore_text . '</a>';
				}

				$output .= '</div>'; //.sppb-article-info-wrap

				$output .= '</div>';
				$output .= '</div>';
			}

			$output  .= '</div>';

			// See all link
			if ($link_articles)
			{

				$icon_arr = array_filter(explode(' ', $all_articles_btn_icon));
				if (count($icon_arr) === 1)
				{
					$all_articles_btn_icon = 'fa ' . $all_articles_btn_icon;
				}

				if ($all_articles_btn_icon_position == 'left')
				{
					$all_articles_btn_text = ($all_articles_btn_icon) ? '<i class="' . $all_articles_btn_icon . '" aria-hidden="true"></i> ' . $all_articles_btn_text : $all_articles_btn_text;
				}
				else
				{
					$all_articles_btn_text = ($all_articles_btn_icon) ? $all_articles_btn_text . ' <i class="' . $all_articles_btn_icon . '" aria-hidden="true"></i>' : $all_articles_btn_text;
				}

				if ($resource == 'k2')
				{
					if (!empty($link_k2catid))
					{
						$output  .= '<a href="' . urldecode(Route::_(K2HelperRoute::getCategoryRoute($link_k2catid))) . '" " id="btn-' . $this->addon->id . '" class="sppb-btn' . $all_articles_btn_class . '">' . $all_articles_btn_text . '</a>';
					}
				}
				else
				{				
					list($link, $new_tab) = AddonHelper::parseLink($settings, 'all_articles_btn_url', ['url' => 'link', 'new_tab' => 'target']);

					$hrefValue = !empty($link) ? $link : ( !empty($link_catid) ? Route::_(version_compare($JoomlaVersion, '4.0.0', '>=') ? Joomla\Component\Content\Site\Helper\RouteHelper::getCategoryRoute($link_catid) : ContentHelperRoute::getCategoryRoute($link_catid)) : '');

					$output  .= '<a href="' . $hrefValue . '" ' . $new_tab . ' id="btn-' . $this->addon->id . '" class="sppb-btn' . $all_articles_btn_class . '">' . $all_articles_btn_text . '</a>';
				}
			}

			$output  .= '</div>';
			$output  .= '</div>';
		}

		return $output;
	}

	public function css()
	{
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css_path = new FileLayout('addon.css.button', $layout_path);

		$options = new stdClass;
		$options->button_type = (isset($this->addon->settings->all_articles_btn_type) && $this->addon->settings->all_articles_btn_type) ? $this->addon->settings->all_articles_btn_type : '';
		$options->button_appearance = (isset($this->addon->settings->all_articles_btn_appearance) && $this->addon->settings->all_articles_btn_appearance) ? $this->addon->settings->all_articles_btn_appearance : '';
		$options->button_color = (isset($this->addon->settings->all_articles_btn_color) && $this->addon->settings->all_articles_btn_color) ? $this->addon->settings->all_articles_btn_color : '';
		$options->button_color_hover = (isset($this->addon->settings->all_articles_btn_color_hover) && $this->addon->settings->all_articles_btn_color_hover) ? $this->addon->settings->all_articles_btn_color_hover : '';
		$options->button_background_color = (isset($this->addon->settings->all_articles_btn_background_color) && $this->addon->settings->all_articles_btn_background_color) ? $this->addon->settings->all_articles_btn_background_color : '';
		$options->button_background_color_hover = (isset($this->addon->settings->all_articles_btn_background_color_hover) && $this->addon->settings->all_articles_btn_background_color_hover) ? $this->addon->settings->all_articles_btn_background_color_hover : '';
		$options->button_fontstyle = (isset($this->addon->settings->all_articles_btn_font_style) && $this->addon->settings->all_articles_btn_font_style) ? $this->addon->settings->all_articles_btn_font_style : '';
		$options->button_font_style = (isset($this->addon->settings->all_articles_btn_font_style) && $this->addon->settings->all_articles_btn_font_style) ? $this->addon->settings->all_articles_btn_font_style : '';
		$options->button_letterspace = (isset($this->addon->settings->all_articles_btn_letterspace) && $this->addon->settings->all_articles_btn_letterspace) ? $this->addon->settings->all_articles_btn_letterspace : '';

		return $css_path->render(array('addon_id' => $addon_id, 'options' => $options, 'id' => 'btn-' . $this->addon->id));
	}

	static function isComponentInstalled($component_name)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select('a.enabled');
		$query->from($db->quoteName('#__extensions', 'a'));
		$query->where($db->quoteName('a.name') . " = " . $db->quote($component_name));
		$db->setQuery($query);
		$is_enabled = $db->loadResult();
		return $is_enabled;
	}
}
