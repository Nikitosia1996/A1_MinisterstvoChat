<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct access
defined('_JEXEC') or die('resticted access');

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\Helpers\StringHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Version;

class SppagebuilderAddonArticles_scroller extends SppagebuilderAddons
{

	public function render()
	{
		$app = Factory::getApplication();

		$version = new Version();
		$JoomlaVersion = $version->getShortVersion();

		if ($app->isClient('administrator')) {
			return ''; // prevent from loading in the admin view
		}

		$settings = $this->addon->settings;

		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$carousel_type = (isset($settings->carousel_type) && $settings->carousel_type) ? $settings->carousel_type : 0;
		$number_of_items = (isset($settings->number_of_items)) ? $settings->number_of_items : 3;
		$number_of_items_tab = (isset($settings->number_of_items_tab)) ? $settings->number_of_items_tab : 2;
		$number_of_items_mobile = (isset($settings->number_of_items_mobile)) ? $settings->number_of_items_mobile : 1;
		$move_slide = (isset($settings->move_slide)) ? $settings->move_slide : 1;
		$slide_speed = (isset($settings->slide_speed)) ? $settings->slide_speed : 500;
		$carousel_autoplay = (isset($settings->carousel_autoplay)) ? $settings->carousel_autoplay : 0;
		$carousel_touch = (isset($settings->carousel_touch)) ? $settings->carousel_touch : 0;
		$carousel_arrow = (isset($settings->carousel_arrow)) ? $settings->carousel_arrow : 0;
		$carousel_indicators = (isset($settings->carousel_indicators)) ? $settings->carousel_indicators : 1;
		$carousel_content_align = (isset($settings->carousel_content_align)) ? ' ' . $settings->carousel_content_align : ' sppb-text-left';

		// Addon options
		$resource 		= (isset($settings->resource) && $settings->resource) ? $settings->resource : 'article';
		$catid 			= (isset($settings->catid) && $settings->catid) ? $settings->catid : 0;
		$k2catid 		= (isset($settings->k2catid) && $settings->k2catid) ? $settings->k2catid : 0;
		$article_scroll_limit = (isset($settings->article_scroll_limit) && $settings->article_scroll_limit) ? $settings->article_scroll_limit : 12;
		$ordering 		= (isset($settings->ordering) && $settings->ordering) ? $settings->ordering : 'latest';
		$thumb_size 	= (isset($settings->thumb_size) && $settings->thumb_size) ? $settings->thumb_size : 'image_thumbnail';
		$show_intro 	= (isset($settings->show_intro)) ? $settings->show_intro : 1;
		$intro_limit 	= (isset($settings->intro_limit)) ? $settings->intro_limit : 100;
		$addon_style 	= (isset($settings->addon_style)) ? $settings->addon_style : 'ticker';
		$ticker_heading = (isset($settings->ticker_heading)) ? $settings->ticker_heading : 'Breaking News';

		$show_shape		= (isset($settings->show_shape)) ? $settings->show_shape : 0;
		$show_shape_class = ($show_shape) ? 'shape-enabled-need-extra-padding' : '';
		$heading_shape 	= (isset($settings->heading_shape)) ? $settings->heading_shape : 'arrow';
		$ticker_date_time = (isset($settings->ticker_date_time)) ? $settings->ticker_date_time : 0;
		$ticker_date_hour = (isset($settings->ticker_date_hour)) ? $settings->ticker_date_hour : 0;

		$ticker_date_time_class = ($ticker_date_time) ? 'date-wrapper-class' : '';
		$ticker_date_hour_class = ($ticker_date_hour) ? 'hour-wrapper-class' : '';

		$image_bg = (isset($settings->image_bg)) ? $settings->image_bg : 0;
		$image_bg_class = ($image_bg) ? 'article-image-as-bg' : '';
		$overlap_date_text = (isset($settings->overlap_date_text)) ? $settings->overlap_date_text : 0;
		$overlap_date_text_class = ($overlap_date_text) ? 'date-text-overlay' : '';

		$output   = '';

		// Include k2 helper
		$k2helper 		= JPATH_ROOT . '/components/com_sppagebuilder/helpers/k2.php';
		$article_helper = JPATH_ROOT . '/components/com_sppagebuilder/helpers/articles.php';
		$isk2installed  = self::isComponentInstalled('com_k2');

		if ($resource === 'k2') {
			if ($isk2installed == 0) {
				$output .= '<p class="alert alert-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_ERORR_K2_NOTINSTALLED') . '</p>';
				return $output;
			} elseif (!\file_exists($k2helper)) {
				$output .= '<p class="alert alert-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_K2_HELPER_FILE_MISSING') . '</p>';
				return $output;
			} else {
				require_once $k2helper;
			}

			$items = SppagebuilderHelperK2::getItems($article_scroll_limit, $ordering, $k2catid);
		} else {
			require_once $article_helper;
			$items = SppagebuilderHelperArticles::getArticles($article_scroll_limit, $ordering, $catid);
		}

		if (!count($items)) {
			$output .= '<p class="alert alert-warning">' . Text::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_NO_ITEMS_FOUND') . '</p>';

			return $output;
		}

		if (count((array) $items)) {
			$output  .= '<div class="sppb-addon sppb-addon-articles-' . $addon_style . ' ' . $class . '">';

			$output .= '<div class="sppb-addon-content">';

			if ($addon_style === 'scroller') {
				$output .= '<div class="sppb-article-scroller-wrap" data-articles="' . $number_of_items . '" data-move="' . $move_slide . '" data-speed="' . $slide_speed . '">';

				foreach ($items as $key => $item) {
					$intro_text = StringHelper::truncate($item->introtext, $intro_limit, true, false);
					$intro_text = str_replace('...', '', $intro_text);
					$image = '';

					if ($resource === 'k2') {
						if (isset($item->image_medium) && $item->image_medium) {
							$image = $item->image_medium;
						} elseif (isset($item->image_large) && $item->image_large) {
							$image = $item->image_medium;
						}
					} else {
						$image = $item->{$thumb_size} ?? $item->image_thumbnail;
					}

					$bg_style = "";

					if ($image_bg) {
						$bg_style = 'style="background-image: url(' . $image . ');background-size: cover; background-position: center center;"';
					}

					$output .= '<div class="sppb-articles-scroller-content">';
					$output .= '<a href="' . $item->link . '" class="sppb-articles-scroller-link" itemprop="url">';

					$output .= '<div class="sppb-articles-scroller-date-left-date-container ' . $image_bg_class . '" ' . $bg_style . '>';
					$output .= '<div class="sppb-articles-scroller-date-left-date">';
					$output .= '<div class="sppb-articles-scroller-meta-date-left ' . $overlap_date_text_class . '" itemprop="datePublished">';
					$output .= '<span class="sppb-articles-scroller-day">' . HTMLHelper::_('date', $item->publish_up, 'd') . '</span>';
					$output .= '<span class="sppb-articles-scroller-month">' . HTMLHelper::_('date', $item->publish_up, 'M') . '</span>';
					$output .= '</div>';
					$output .= '</div>'; //.sppb-articles-scroller-date-left-date

					$output .= '<div class="sppb-articles-scroller-date-left-content">';
					$output .= '<div class="sppb-addon-articles-scroller-title">' . $item->title . '</div>';
					$output .= '<div class="sppb-articles-scroller-introtext">' . $intro_text . '...</div>';
					$output .= '</div>'; //.sppb-articles-scroller-date-left-content
					$output .= '</div>'; //.sppb-articles-scroller-date-left-date-container

					$output .= '</a>';
					$output .= '</div>'; //.sppb-articles-scroller-content
				}

				$output .= '</div>'; //.sppb-article-scroller-wrap
			} else if ($addon_style === 'carousel') {
				$col_size = "";

				if (!$carousel_type) {
					$output .= '<div class="sppb-row">';
					$col_size = "sppb-col-md-4";
				}
				$output .= '<div class="sppb-articles-carousel-wrap" 
				data-type="' . $carousel_type . '"
				data-articles="' . $number_of_items . '"
				data-articles-tab="' . $number_of_items_tab . '"
				data-articles-mobile="' . $number_of_items_mobile . '"
				data-speed="' . $slide_speed . '" 
				data-autoplay="' . ($carousel_autoplay ? 'true' : 'false') . '"
				data-drag="' . ($carousel_touch ? 'true' : 'false') . '" 
				data-arrow="' . ($carousel_arrow ? 'true' : 'false') . '"
				data-pager="' . ($carousel_indicators ? 'true' : 'false') . '">';

				foreach ($items as $key => $item) {
					$intro_text = StringHelper::truncate($item->introtext, $intro_limit, true, false);
					$intro_text = str_replace('...', '', $intro_text);
					$image = '';

					if ($resource === 'k2') {
						if (isset($item->image_medium) && $item->image_medium) {
							$image = $item->image_medium;
						} elseif (isset($item->image_large) && $item->image_large) {
							$image = $item->image_medium;
						}
					} else {
						$image = $item->{$thumb_size} ?? $item->image_thumbnail;
					}

					$output .= '<div class="sppb-articles-carousel-column ' . $col_size . '">';

					$output .= '<div class="sppb-articles-carousel-img">';
					$output .= '<a href="' . $item->link . '" class="sppb-articles-carousel-img-link" itemprop="url">';
					$output .= '<img src="' . $image . '" alt="' . $item->title . '" />';
					$output .= '</a>';
					$output .= '</div>'; //.sppb-articles-carousel-img

					$output .= '<div class="sppb-articles-carousel-content' . $carousel_content_align . '">';

					$output .= '<div class="sppb-articles-carousel-meta" itemprop="datePublished">';
					$output .= '<span class="sppb-articles-carousel-meta-date" itemprop="datePublished">' . HTMLHelper::_('date', $item->publish_up, 'DATE_FORMAT_LC3') . '</span>';
					// $author = ( $item->created_by_alias ?  $item->created_by_alias :  $item->username);
					// $output .= '<span class="sppb-articles-carousel-meta-author" itemprop="name">' . $author . '</span>';
					$output .= '</div>'; //.sppb-articles-carousel-meta

					$output .= '<a href="' . $item->link . '" class="sppb-articles-carousel-link" itemprop="url">' . $item->title . '</a>';

					if ($show_intro) {
						$output .= '<div class="sppb-articles-carousel-introtext">' . $intro_text . '...</div>';
					}

					//Category
					if ($resource == 'k2') {
						$item->catUrl = urldecode(Route::_(K2HelperRoute::getCategoryRoute($item->catid . ':' . urlencode($item->category_alias))));
					} else {
						$item->catUrl = Route::_(version_compare($JoomlaVersion, '4.0.0', '>=') ? Joomla\Component\Content\Site\Helper\RouteHelper::getCategoryRoute($item->catslug) : ContentHelperRoute::getCategoryRoute($item->catslug));
					}

					$output .= '<span class="sppb-articles-carousel-meta-category"><a href="' . $item->catUrl . '" itemprop="genre">' . $item->category . '</a></span>';
					$output .= '</div>'; //.sppb-articles-carousel-content
					$output .= '</div>'; //.sppb-articles-carousel-column
				}

				if (!$carousel_type) {
					$output .= '</div>';
				}

				$output .= '</div>'; //.sppb-article-scroller-wrap
			} else {
				$output .= '<div class="sppb-articles-ticker-wrap" data-speed="' . $slide_speed . '">';
				$output .= '<div class="sppb-articles-ticker-heading">';
				$output .= $ticker_heading;

				if ($show_shape) {
					if ($heading_shape == 'slanted-left') {
						$output .= '<svg class="sppb-articles-ticker-shape-left" width="50" height="100%" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" shape-rendering="geometricPrecision">';
						$output .= '<path d="M0 50h50L25 0H0z" fill="#E91E63"/>';
						$output .= '</svg>';
					} elseif ($heading_shape == 'slanted-right') {
						$output .= '<svg class="sppb-articles-ticker-shape-right" width="50" height="100%" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" shape-rendering="geometricPrecision">';
						$output .= '<path d="M0 0h50L25 50H0z" fill="#E91E63"/>';
						$output .= '</svg>';
					} else {
						$output .= '<svg class="sppb-articles-ticker-shape-arrow" width="50" height="100%" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" shape-rendering="geometricPrecision">';
						$output .= '<path d="M0 0h25l25 25-25 25H0z" fill="#E91E63"/>';
						$output .= '</svg>';
					}
				}

				$output .= '</div>'; //.sppb-articles-ticker-heading
				$output .= '<div class="sppb-articles-ticker">';
				$output .= '<div class="sppb-articles-ticker-content">';

				foreach ($items as $key => $item) {
					$output .= '<div class="sppb-articles-ticker-text ' . $show_shape_class . '">';
					$output .= '<a href="' . $item->link . '">' . $item->title . '</a>';

					if ($ticker_date_time || $ticker_date_hour) {
						$output .= '<div class="ticker-date-time-content-wrap ' . $ticker_date_time_class . ' ' . $ticker_date_hour_class . '">';
						$output .= '<div class="ticker-date-time">';

						if ($ticker_date_time) {
							$output .= '<span class="ticker-date">' . HTMLHelper::_('date', $item->publish_up, 'd M') . '</span>';
						}

						if ($ticker_date_hour) {
							$output .= '<span class="ticker-hour">' . HTMLHelper::_('date', $item->publish_up, 'h:i:s A') . '</span>';
						}

						$output .= '</div>';
						$output .= '</div>';
					}

					$output .= '</div>'; //.sppb-articles-ticker-text
				}

				$output .= '</div>'; //.sppb-articles-ticker-content
				$output .= '<div class="sppb-articles-ticker-controller">';
				$output .= '<span class="sppb-articles-ticker-left-control"></span>';
				$output .= '<span class="sppb-articles-ticker-right-control"></span>';
				$output .= '</div>'; //.sppb-articles-ticker-controller
				$output .= '</div>'; //.sppb-articles-ticker
				$output .= '</div>'; //.sppb-articles-ticker-wrap
			}

			$output  .= '</div>';
			$output  .= '</div>';
		}


		return $output;
	}

	public function stylesheets()
	{
		$style_sheet = [
			Uri::base(true) . '/components/com_sppagebuilder/assets/css/jquery.bxslider.min.css',
			Uri::base(true) . '/components/com_sppagebuilder/assets/css/slick.css',
			Uri::base(true) . '/components/com_sppagebuilder/assets/css/slick-theme.css',
		];

		return $style_sheet;
	}

	public function css()
	{
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$cssHelper = new CSSHelper($addon_id);
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$image_bg = (isset($settings->image_bg) && $settings->image_bg) ? $settings->image_bg : 0;

		if (!isset($settings->gap)) {
			$settings->gap = 15;
		}

		if (isset($settings->heading_date_font_family) && $settings->heading_date_font_family) {
			$font_path = new FileLayout('addon.css.fontfamily', $layout_path);
			$font_path->render(array('font' => $settings->heading_date_font_family));
		}

		if (isset($settings->content_font_family) && $settings->content_font_family) {
			$font_path = new FileLayout('addon.css.fontfamily', $layout_path);
			$font_path->render(array('font' => $settings->content_font_family));
		}

		$arrowTickerStyle          = $cssHelper->generateStyle('.sppb-articles-ticker-left-control,.sppb-articles-ticker-right-control', $settings, ['arrow_color' => 'color'], false);
		$arrowLinkStyle            = $cssHelper->generateStyle('.sppb-articles-ticker-left-control a, .sppb-articles-ticker-right-control a', $settings, ['arrow_color' => 'color'], false);
		$headingLetterSpacingStyle = $cssHelper->generateStyle('.sppb-articles-scroller-meta-date-left .sppb-articles-scroller-day', $settings, ['heading_letter_spacing' => 'letter-spacing']);
		$tickerHeadingStyle        = $cssHelper->generateStyle('.sppb-articles-scroller-meta-date-left span.sppb-articles-scroller-day, .sppb-articles-ticker-heading', $settings, ['ticker_heading_fontsize' => 'font-size', 'ticker_heading_font_weight' => 'font-weight'], ['ticker_heading_font_weight' => false]);
		$contentFontSizeStyle      = $cssHelper->generateStyle('.sppb-articles-scroller-introtext,.sppb-articles-ticker-text a', $settings, ['content_fontsize' => 'font-size']);
		$rightTitleFontStyle       = $cssHelper->generateStyle('.sppb-addon-articles-scroller-title', $settings, ['right_title_font_size' => 'font-size', 'content_title_font_weight' => 'font-weight'], ['content_title_font_weight' => false]);

		// Carousel Content style
		// Date
		$carouselDateStyleProps = [
			'carousel_date_color' => 'color',
			'carousel_date_font_size' => 'font-size',
			'carousel_date_font_weight' => 'font-weight'
		];

		$carouselDateStyleUnits = [
			'carousel_date_color' => false,
			'carousel_date_font_weight' => false,
		];

		$carouselDateStyle = $cssHelper->generateStyle('.sppb-articles-carousel-meta-date',  $settings, $carouselDateStyleProps, $carouselDateStyleUnits);

		// Title
		$carouselTitleStyleProps = [
			'carousel_title_color' => 'color',
			'carousel_title_font_weight' => 'font-weight',
			'carousel_title_font_size' => 'font-size',
			'carousel_title_margin' => 'margin'
		];

		$carouselTitleStyleUnits = ['carousel_title_color' => false, 'carousel_title_margin' => false, 'carousel_title_font_weight' => false];
		$carouselTitleStyle = $cssHelper->generateStyle('.sppb-articles-carousel-link', $settings, $carouselTitleStyleProps, $carouselTitleStyleUnits, ['carousel_title_margin' => 'spacing']);

		// Text
		$carouselTextStyleProps = [
			'carousel_text_color' => 'color',
			'carousel_text_font_weight' => 'font-weight',
			'carousel_text_font_size' => 'font-size'
		];

		$carouselTextStyleUnits = [
			'carousel_text_color' => false,
			'carousel_text_font_weight' => false
		];

		$carouselTextStyle = $cssHelper->generateStyle('.sppb-articles-carousel-introtext', $settings, $carouselTextStyleProps, $carouselTextStyleUnits);

		// Category
		$carouselCategoryStyleProps = [
			'carousel_category_color'       => 'color',
			'carousel_category_font_weight' => 'font-weight',
			'carousel_category_font_size'   => 'font-size',
			'carousel_category_margin'      => 'margin'
		];

		$carouselCategoryStyleUnits = [
			'carousel_category_color'       => false,
			'carousel_category_font_weight' => false,
		];

		$carouselCategoryStyle = $cssHelper->generateStyle('.sppb-articles-carousel-meta-category a', $settings, $carouselCategoryStyleProps, $carouselCategoryStyleUnits, ['carousel_category_margin' => 'spacing']);

		// Area
		$carouselAreaStyleProps = [
			'carousel_content_bg'      => 'background',
			'border_size'              => 'border-style: solid;border-width',
			'border_color'             => 'border-color',
			'carousel_content_padding' => 'padding'
		];

		$carouselAreaStyleUnits = [
			'carousel_content_bg'      => false,
			'border_color'             => false,
			'carousel_content_padding' => false
		];

		$carouselAreaStyle = $cssHelper->generateStyle('.sppb-articles-carousel-content', $settings, $carouselAreaStyleProps, $carouselAreaStyleUnits, ['carousel_content_padding' => 'spacing']);

		//Start Css output
		$css = '';

		$css .= $arrowTickerStyle;
		$css .= $arrowLinkStyle;
		$css .= $tickerHeadingStyle;
		$css .= $headingLetterSpacingStyle;
		$css .= $rightTitleFontStyle;
		$css .= $contentFontSizeStyle;
		$css .= $carouselDateStyle;
		$css .= $carouselTitleStyle;
		$css .= $carouselTextStyle;
		$css .= $carouselCategoryStyle;
		$css .= $carouselAreaStyle;
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-date-left-content,.sppb-articles-ticker-text', $settings, ['content_font_family' => 'font-family'], false);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-date-left-date-container', $settings, ['border_size' => 'border-style: solid; border-left: 0;border-width', 'border_color' => 'border-color'], ['border_color' => false]);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-date-left-date,.sppb-articles-ticker-heading', $settings, ['heading_date_font_family' => 'font-family'], ['heading_date_font_family' => false]);
		$css .= $cssHelper->generateStyle('.sppb-articles-ticker', $settings, ['border_size' => 'border-style: solid; border-left: 0;border-width', 'border_color' => 'border-color', 'border_radius' => ['border-top-right-radius', 'border-bottom-right-radius']], ['border_color' => false]);
		$css .= $cssHelper->generateStyle('.sppb-articles-ticker-heading', $settings, ['border_radius' => ['border-top-left-radius', 'border-bottom-left-radius']]);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-content a', $settings, ['item_bottom_gap' => 'padding-bottom']);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-date-left-date, .sppb-articles-ticker-heading', $settings, ['left_side_bg' => 'background-color'], false);
		$css .= $cssHelper->generateStyle('.ticker-date-time', $settings, ['left_side_bg' => 'background'], false);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-introtext,.sppb-articles-ticker-modern-text', $settings, ['text_color' => 'color'], false);
		$css .= $cssHelper->generateStyle('.sppb-addon-articles-scroller-title,.sppb-articles-ticker-text a,.sppb-articles-ticker-ticker-modern-content a', $settings, ['title_color' => 'color'], false);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-meta-date-left span', $settings, ['left_text_color' => 'color'], false);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-date-left-content, .sppb-articles-ticker, .sppb-articles-ticker-ticker-modern-content', $settings, ['content_bg' => 'background-color'], false);
		$css .= $cssHelper->generateStyle('.sppb-articles-ticker-heading svg path', $settings, ['left_side_bg' => 'fill'], false);
		$css .= $cssHelper->generateStyle('.date-text-overlay .sppb-articles-scroller-month', $settings, ['overlap_text_color' => 'color', 'overlap_text_right' => 'right', 'overlap_text_font_size' => 'font-size'], ['overlap_text_color' => false]);

		if ($image_bg) {
			$css .= $addon_id . ' .sppb-articles-scroller-date-left-date-container > div{';
			$css .= 'background: transparent;position: relative;';
			$css .= '}';
		}


		$settings->heading_width = null;

		if (!empty($settings->ticker_heading_width)) {
			if (\is_object($settings->ticker_heading_width_original)) {
				$settings->heading_width = AddonHelper::initDeviceObject();

				foreach ($settings->ticker_heading_width_original as $key => $value) {
					if ($value) {
						$settings->heading_width->$key = 100 - (int) $value;
					}
				}
			} else {
				$settings->heading_width = 100 - (int) $settings->ticker_heading_width;
			}
		}

		$css .= $cssHelper->generateStyle('.sppb-addon-articles-carousel .slick-slide', $settings, ['gap' => 'padding: 0 %s']);
		$css .= $cssHelper->generateStyle('.sppb-addon-articles-carousel .slick-list', $settings, ['gap' => 'margin: 0 -%s']);

		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-date-left-date, .sppb-articles-ticker-heading', $settings, ['ticker_heading_width_original' => ['-ms-flex: 0 0 %s', 'flex: 0 0 %s']], ['ticker_heading_width_original' => '%']);
		$css .= $cssHelper->generateStyle('.sppb-articles-scroller-date-left-content, .sppb-articles-ticker', $settings, ['heading_width' => ['-ms-flex: 0 0 %s', 'flex: 0 0 %s']], ['heading_width' => '%']);

		return $css;
	}

	public function scripts()
	{
		HTMLHelper::_('script', 'components/com_sppagebuilder/assets/js/jquery.bxslider.min.js', [], ['defer' => true]);
		HTMLHelper::_('script', 'components/com_sppagebuilder/assets/js/slick.js', [], ['defer' => true]);
	}

	public function js()
	{
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$slide_speed = (isset($settings->slide_speed) && !empty($settings->slide_speed)) ? $settings->slide_speed : 500;
		$addon_style = (isset($settings->addon_style)) ? $settings->addon_style : 'ticker';
		$number_of_items = (isset($settings->number_of_items) && !empty($settings->number_of_items)) ? $settings->number_of_items : 3;
		$number_of_items_tab = (isset($settings->number_of_items_tab) && !empty($settings->number_of_items_tab)) ? $settings->number_of_items_tab : 2;
		$number_of_items_mobile = (isset($settings->number_of_items_mobile) && !empty($settings->number_of_items_mobile)) ? $settings->number_of_items_mobile : 1;
		$move_slide = (isset($settings->move_slide) && !empty($settings->move_slide)) ? $settings->move_slide : 1;
		$carousel_autoplay = (isset($settings->carousel_autoplay)) ? $settings->carousel_autoplay : 0;
		$carousel_touch = (isset($settings->carousel_touch)) ? $settings->carousel_touch : 0;
		$carousel_arrow = (isset($settings->carousel_arrow)) ? $settings->carousel_arrow : 0;
		$carousel_indicators = (isset($settings->carousel_indicators)) ? $settings->carousel_indicators : 1;
		$carousel_type = (isset($settings->carousel_type)) ? $settings->carousel_type : 0;

		if ($addon_style == 'ticker') {
			return '
				jQuery(function(){
					"use strict";
					jQuery("' . $addon_id . ' .sppb-articles-ticker-content").bxSlider({
						minSlides: 1,
						maxSlides: 1,
						mode: "vertical",
						speed: ' . $slide_speed . ',
						pager: false,
						prevText: "<i aria-hidden=\'true\' class=\'fa fa-angle-left\'></i>",
						nextText: "<i aria-hidden=\'true\' class=\'fa fa-angle-right\'></i>",
						nextSelector: "' . $addon_id . ' .sppb-articles-ticker-right-control",
						prevSelector: "' . $addon_id . ' .sppb-articles-ticker-left-control",
						auto: true,
						adaptiveHeight:true,
						autoHover: true,
						touchEnabled:false,
						autoStart:true,
					});
				});
			';
		} else if ($addon_style == 'carousel') {
			if (!$carousel_type) {
				return '
				jQuery(function(){
					jQuery("body").on("mousedown", ".bx-viewport a", function() {
						if(jQuery(this).attr("href") && jQuery(this).attr("href") != "#") {
							window.location = jQuery(this).attr("href");
						}
					});
				});
				jQuery(function () {
					"use strict";
					var widthMatch = jQuery(window).width();
					if(widthMatch < 481){
						jQuery("' . $addon_id . ' .sppb-articles-carousel-wrap").bxSlider({
							mode: "horizontal",
							slideSelector: "div.sppb-articles-carousel-column",
							minSlides: ' . $number_of_items_mobile . ',
							maxSlides: ' . $number_of_items_mobile . ',
							moveSlides: ' . $number_of_items_mobile . ',
							pager: ' . ($carousel_indicators ? 'true' : 'false') . ',
							controls: ' . ($carousel_arrow ? 'true' : 'false') . ',
							slideWidth: 1140,
							speed: ' . $slide_speed . ',
							auto: ' . ($carousel_autoplay ? 'true' : 'false') . ',
							nextText: "<i class=\'fa fa-angle-right\' aria-hidden=\'true\'></i>",
							prevText: "<i class=\'fa fa-angle-left\' aria-hidden=\'true\'></i>",
							autoHover: true,
							touchEnabled: ' . ($carousel_touch ? 'true' : 'false') . ',
							autoStart: true,
						});
					} else if(widthMatch < 992) {
						jQuery("' . $addon_id . ' .sppb-articles-carousel-wrap").bxSlider({
							mode: "horizontal",
							slideSelector: "div.sppb-articles-carousel-column",
							minSlides: ' . $number_of_items_tab . ',
							maxSlides: ' . $number_of_items_tab . ',
							moveSlides: ' . $number_of_items_tab . ',
							pager: ' . ($carousel_indicators ? 'true' : 'false') . ',
							controls: ' . ($carousel_arrow ? 'true' : 'false') . ',
							nextText: "<i class=\'fa fa-angle-right\' aria-hidden=\'true\'></i>",
							prevText: "<i class=\'fa fa-angle-left\' aria-hidden=\'true\'></i>",
							slideWidth: 1140,
							speed: ' . $slide_speed . ',
							auto: ' . ($carousel_autoplay ? 'true' : 'false') . ',
							autoHover: true,
							touchEnabled: ' . ($carousel_touch ? 'true' : 'false') . ',
							autoStart: true,
						});
					} else {
						jQuery("' . $addon_id . ' .sppb-articles-carousel-wrap").bxSlider({
							mode: "horizontal",
							slideSelector: "div.sppb-articles-carousel-column",
							minSlides: ' . $number_of_items . ',
							maxSlides: ' . $number_of_items . ',
							moveSlides: ' . $number_of_items . ',
							pager: ' . ($carousel_indicators? 'true' : 'false') . ',
							controls: ' . ($carousel_arrow ? 'true' : 'false') . ',
							nextText: "<i class=\'fa fa-angle-right\' aria-hidden=\'true\'></i>",
							prevText: "<i class=\'fa fa-angle-left\' aria-hidden=\'true\'></i>",
							slideWidth: 1140,
							speed: ' . $slide_speed . ',
							auto: ' . ($carousel_autoplay ? 'true' : 'false') . ',
							autoHover: true,
							touchEnabled: ' . ($carousel_touch ? 'true' : 'false') . ',
							autoStart: true,
						});
					}
				});
			';
			}
			return '
				jQuery(function(){
					"use strict";
					jQuery("' . $addon_id . ' .sppb-articles-carousel-wrap").not(".slick-initialized").slick({
						slidesToShow: ' . $number_of_items . ',
						slidesToScroll: ' . $number_of_items . ',
						autoplay: ' . ($carousel_autoplay ? 'true' : 'false') . ',
						arrows: ' . ($carousel_arrow ? 'true' : 'false') . ',
						draggable: ' . ($carousel_touch ? 'true' : 'false') . ',
						speed: ' . $slide_speed . ',
						nextArrow: "<i class=\'fa fa-angle-right\' aria-hidden=\'true\'></i>",
						prevArrow: "<i class=\'fa fa-angle-left\' aria-hidden=\'true\'></i>",
						dots: ' . ($carousel_indicators ? 'true' : 'false') . ',
						infinite: true,
						responsive: [
							{
							  breakpoint: 1320,
							  settings: {
								slidesToShow: ' . $number_of_items . ',
								slidesToScroll: ' . $number_of_items . ',
								infinite: true,
							  }
							},
							{
							  breakpoint: 1140,
							  settings: {
								slidesToShow: ' . $number_of_items_tab . ',
								slidesToScroll: ' . $number_of_items_tab . '
							  }
							},
							{
							  breakpoint: 720,
							  settings: {
								slidesToShow: ' . $number_of_items_mobile . ',
								slidesToScroll: ' . $number_of_items_mobile . '
							  }
							}
						  ]
					  });

				});
			';
		} else {
			return '
				jQuery(function(){
					"use strict";
					jQuery("' . $addon_id . ' .sppb-article-scroller-wrap").bxSlider({
						minSlides: ' . $number_of_items . ',
						mode: "vertical",
						speed: ' . $slide_speed . ',
						pager: false,
						controls: false,
						auto: true,
						moveSlides: ' . $move_slide . ',
						adaptiveHeight:true,
						touchEnabled:false,
						autoStart:true
					});
				});
			';
		}
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
