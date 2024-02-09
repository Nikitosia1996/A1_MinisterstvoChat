<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;

class SppagebuilderAddonSocial_share extends SppagebuilderAddons
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
		$doc = Factory::getDocument();

		// Options
		$class 	 			= (isset($this->addon->settings->class) && $this->addon->settings->class) ? ' ' . $this->addon->settings->class : '';
		$class 				.= (isset($this->addon->settings->social_style) && $this->addon->settings->social_style) ? ' sppb-social-share-style-' 	. str_replace('_', '-', $this->addon->settings->social_style) : '';
		$heading_selector 	= (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';
		$title 				= (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$show_social_names 	= (isset($this->addon->settings->show_social_names) && $this->addon->settings->show_social_names) ? $this->addon->settings->show_social_names : '';
		$show_socials 		= (isset($this->addon->settings->show_socials) && $this->addon->settings->show_socials) ? $this->addon->settings->show_socials : [];

		$uri = Uri::getInstance();
		$current_url = $uri->toString();
		$page_title = $doc->getTitle();

		// Assign col
		$share_col = 'sppb-col-sm-12';
		$icons_col = 'sppb-col-sm-12';

		$output  = '';
		$output .= '<div class="sppb-addon sppb-addon-social-share' . $class . '">';
		$output .= '<div class="sppb-social-share">';
		$output .= ($title) ? '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>' : '';

		$output .= '<div class="sppb-social-share-wrap sppb-row">';

		$output .= '<div class="sppb-social-items-wrap ' . $icons_col . '">';
		$output .= '<ul>';

		if (\in_array('facebook', $show_socials)) {
			$output .= '<li class="sppb-social-share-facebook">';
			$output .= '<a onClick="window.open(\'http://www.facebook.com/sharer.php?u=' . $current_url . '\',\'Facebook\',\'width=600,height=300,left=\'+(screen.availWidth/2-300)+\',top=\'+(screen.availHeight/2-150)+\'\'); return false;" href="http://www.facebook.com/sharer.php?u=' . $current_url . '">';
			$output .= '<i class="fab fa-facebook-f" aria-hidden="true"></i>';
			if ($show_social_names) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_FACEBOOK') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (\in_array('twitter', $show_socials)) {
			//twitter
			$output .= '<li class="sppb-social-share-twitter">';
			$output .= '<a onClick="window.open(\'http://twitter.com/share?url=' . urlencode($current_url) . '&amp;text=' . str_replace(" ", "%20", $page_title) . '\',\'Twitter share\',\'width=600,height=300,left=\'+(screen.availWidth/2-300)+\',top=\'+(screen.availHeight/2-150)+\'\'); return false;" href="http://twitter.com/share?url=' . $current_url . '&amp;text=' . str_replace(" ", "%20", $page_title) . '">';
			$output .= '<i class="fab fa-twitter" aria-hidden="true"></i>';
			if ($show_social_names) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_TWITTER') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (\in_array('linkedin', $show_socials)) {
			//linkedin
			$output .= '<li class="sppb-social-share-linkedin">';
			$output .= '<a onClick="window.open(\'http://www.linkedin.com/shareArticle?mini=true&url=' . $current_url . '\',\'Linkedin\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $current_url . '" >';
			$output .= '<i class="fab fa-linkedin" aria-hidden="true"></i>';
			if ($show_social_names) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_LINKEDIN') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (in_array('pinterest', $show_socials)) {
			$output .= '<li class="sppb-social-share-pinterest">';
			$output .= '<a onClick="window.open(\'http://pinterest.com/pin/create/button/?url=' . $current_url . '&amp;description=' . $page_title . '\',\'Pinterest\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://pinterest.com/pin/create/button/?url=' . $current_url . '&amp;description=' . $page_title . '" >';
			$output .= '<i class="fab fa-pinterest" aria-hidden="true"></i>';
			if ($show_social_names == 1) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_PINTEREST') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (in_array('thumblr', $show_socials)) {
			$output .= '<li class="sppb-social-share-thumblr">';
			$output .= '<a onClick="window.open(\'http://tumblr.com/share?s=&amp;v=3&amp;t=' . $page_title . '&amp;u=' . $current_url . '\',\'Thumblr\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://tumblr.com/share?s=&amp;v=3&amp;t=' . $page_title . '&amp;u=' . $current_url . '" >';
			$output .= '<i class="fab fa-tumblr"></i>';
			if ($show_social_names == 1) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_THUMBLR') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (in_array('getpocket', $show_socials)) {
			$output .= '<li class="sppb-social-share-getpocket">';
			$output .= '<a onClick="window.open(\'https://getpocket.com/save?url=' . $current_url . '\',\'Getpocket\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="https://getpocket.com/save?url=' . $current_url . '" >';
			$output .= '<i class="fab fa-get-pocket" aria-hidden="true"></i>';
			if ($show_social_names == 1) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_GETPOCKET') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (in_array('reddit', $show_socials)) {
			$output .= '<li class="sppb-social-share-reddit">';
			$output .= '<a onClick="window.open(\'http://www.reddit.com/submit?url=' . $current_url . '\',\'Reddit\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://www.reddit.com/submit?url=' . $current_url . '" >';
			$output .= '<i class="fab fa-reddit" aria-hidden="true"></i>';
			if ($show_social_names == 1) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_REDDIT') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (in_array('vk', $show_socials)) {
			$output .= '<li class="sppb-social-share-vk">';
			$output .= '<a onClick="window.open(\'http://vk.com/share.php?url=' . $current_url . '\',\'Vk\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://vk.com/share.php?url=' . $current_url . '" >';
			$output .= '<i class="fab fa-vk" aria-hidden="true"></i>';
			if ($show_social_names == 1) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_VK') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (in_array('xing', $show_socials)) {
			$output .= '<li class="sppb-social-share-xing">';
			$output .= '<a onClick="window.open(\'https://www.xing.com/spi/shares/new?cb=0&url=' . $current_url . '\',\'Xing\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="https://www.xing.com/spi/shares/new?cb=0&url=' . $current_url . '" >';
			$output .= '<i class="fab fa-xing" aria-hidden="true"></i>';
			if ($show_social_names == 1) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_XING') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		if (in_array('whatsapp', $show_socials)) {
			$output .= '<li class="sppb-social-share-whatsapp">';
			$output .= '<a href="whatsapp://send?text=' . $current_url . '" >';
			$output .= '<i class="fab fa-whatsapp" aria-hidden="true"></i>';
			if ($show_social_names == 1) {
				$output .= '<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_WHATSAPP') . '</span>';
			}
			$output .= '</a>';
			$output .= '</li>';
		}

		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
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
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$cssHelper = new CSSHelper($addon_id);

		$social_style 	= (isset($this->addon->settings->social_style) && $this->addon->settings->social_style) ? $this->addon->settings->social_style : '';

		$css = '';

		$settings->social_border_color = !empty($settings->social_border_color) ? $settings->social_border_color : "transparent";

		$socialStyle = $cssHelper->generateStyle(
			'.sppb-social-share-wrap ul li a',
			$settings,
			[
				'background_color' => \in_array($social_style, ['custom']) ? 'background' : null,
				'icon_color' => \in_array($social_style, ['custom']) ? 'color' : null,
				'social_border_width' => 'border-style: solid;border-width',
				'social_border_color' => 'border-color',
				'social_border_radius' => \in_array($social_style, ['custom', 'solid']) ? 'border-radius' : null,
			],
			['background_color' => false, 'icon_color' => false,  'social_border_color' => false]
		);
		$socialHoverStyle = $cssHelper->generateStyle('.sppb-social-share-wrap ul li a:hover', $settings, ['background_hover_color' => \in_array($social_style, ['custom']) ? 'background' : null, 'icon_hover_color' => \in_array($social_style, ['custom']) ? 'color' : null, 'social_border_hover_color' => 'border-color'], false);
		$iconAlignment = $cssHelper->generateStyle('.sppb-social-share-wrap', $settings, ['icon_align' => 'text-align'], false);

		$css .= $socialStyle;
		$css .= $iconAlignment;
		$css .= $socialHoverStyle;

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
		$uri = Uri::getInstance();
		$current_url = $uri->toString();
		$page_title = Factory::getDocument()->getTitle();

		$output = '
			<#
				let current_url = "' . $current_url . '"
				let page_title = "' . $page_title . '"
				let share_col = "sppb-col-sm-12"
				let icons_col = "sppb-col-sm-12"
				let totalShareText = "' . Text::_("COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_TOTAL_SHARES") . '"
				data.social_border_color = !_.isEmpty(data.social_border_color) ? data.social_border_color : "transparent"
				let sShareClass = data.class || ""
					sShareClass += (!_.isEmpty(data.social_style))? " sppb-social-share-style-"+data.social_style.replace("_","-"):""
			#>';

		$output .= '
			<style type="text/css">
				#sppb-addon-{{ data.id }} .sppb-social-share-wrap ul li a {
					<# if ( data.background_color && data.social_style == "custom" ) {#>
					background-color: {{ data.background_color }};
					<# } #>
					<# if ( data.icon_color && data.social_style == "custom" ) {#>
						color: {{ data.icon_color }};
					<# } #>
					<# if ( data.social_border_width ){ #>
						border-style: solid;
					<# } #>
				
				}

				#sppb-addon-{{ data.id }}  .sppb-social-share-wrap ul li a:hover {
					<# if( data.background_hover_color && data.social_style == "custom" ) { #>
						background-color: {{ data.background_hover_color }};
					<# } #>
					<# if( data.icon_hover_color && data.social_style == "custom" ) { #>
						color: {{ data.icon_hover_color }};
					<# } #>
					
				}';

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

		// Title
		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);
		$output .= $lodash->unit('border-width', '.sppb-social-share-wrap ul li a', 'data.social_border_width', 'px', false);
		$output .= $lodash->unit('border-color', '.sppb-social-share-wrap ul li a', 'data.social_border_color', '', false);
		$output .= $lodash->unit('border-color', '.sppb-social-share-wrap ul li a:hover', 'data.social_border_hover_color', '', false);
		$output .= $lodash->unit('border-radius', '.sppb-social-share-wrap ul li a', 'data.social_border_radius', 'px', false);
		$output .= $lodash->alignment('text-align', '.sppb-social-share-wrap', 'data.icon_align');

		$output .= '
			</style>

			<div class="sppb-addon sppb-addon-social-share {{ sShareClass }}">
				<div class="sppb-social-share">
					<# if( !_.isEmpty( data.title ) ){ #><{{ data.heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{{ data.title }}}</{{ data.heading_selector }}><# } #>
					<div class="sppb-social-share-wrap sppb-row">

					<div class="sppb-social-items-wrap {{ icons_col }}">
						<ul>
						<# if(_.indexOf(data.show_socials, "facebook") != "-1") { #>
							<li class="sppb-social-share-facebook">
							  <a onClick="window.open(\'http://www.facebook.com/sharer.php?u={{ current_url }}\',\'Facebook\',\'width=600,height=300,left=\'+(screen.availWidth/2-300)+\',top=\'+(screen.availHeight/2-150)+\'\'); return false;" href="http://www.facebook.com/sharer.php?u={{current_url}}">
									<i class="fab fa-facebook-f"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_FACEBOOK') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "twitter") != "-1") { #>
							<li class="sppb-social-share-twitter">
							  <a onClick="window.open(\'http://twitter.com/share?url={{ current_url }}&amp;text={{ page_title }}\',\'Twitter share\',\'width=600,height=300,left=\'+(screen.availWidth/2-300)+\',top=\'+(screen.availHeight/2-150)+\'\'); return false;" href="http://twitter.com/share?url={{ current_url }}&amp;text={{ page_title }}">
									<i class="fab fa-twitter"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_TWITTER') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "linkedin") != "-1") { #>
							<li class="sppb-social-share-linkedin">
							  <a onClick="window.open(\'http://www.linkedin.com/shareArticle?mini=true&url={{ current_url }}\',\'Linkedin\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url={{ current_url }}">
									<i class="fab fa-linkedin"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_LINKEDIN') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "pinterest") != "-1") { #>
							<li class="sppb-social-share-pinterest">
							  <a onClick="window.open(\'http://pinterest.com/pin/create/button/?url={{ current_url }}&amp;description={{ page_title }}\',\'Pinterest\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://pinterest.com/pin/create/button/?url={{ current_url }}&amp;description={{ page_title }}">
									<i class="fab fa-pinterest"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_PINTEREST') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "thumblr") != "-1") { #>
							<li class="sppb-social-share-thumblr">
							  <a onClick="window.open(\'http://tumblr.com/share?s=&amp;v=3&amp;t={{ page_title }}&amp;u={{ current_url }}\',\'Thumblr\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://tumblr.com/share?s=&amp;v=3&amp;t={{ page_title }}&amp;u={{ current_url }}">
									<i class="fab fa-tumblr"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_THUMBLR') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "getpocket") != "-1") { #>
							<li class="sppb-social-share-getpocket">
							  <a onClick="window.open(\'https://getpocket.com/save?url={{ current_url }}\',\'Getpocket\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="https://getpocket.com/save?url={{ current_url }}">
									<i class="fab fa-get-pocket"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_GETPOCKET') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "reddit") != "-1") { #>
							<li class="sppb-social-share-reddit">
							  <a onClick="window.open(\'http://www.reddit.com/submit?url={{ current_url }}\',\'Reddit\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://www.reddit.com/submit?url={{ current_url }}">
									<i class="fab fa-reddit"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_REDDIT') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "vk") != "-1") { #>
							<li class="sppb-social-share-vk">
							  <a onClick="window.open(\'http://vk.com/share.php?url={{ current_url }}\',\'Vk\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="http://vk.com/share.php?url={{ current_url }}">
									<i class="fab fa-vk"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_VK') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "xing") != "-1") { #>
							<li class="sppb-social-share-xing">
							  <a onClick="window.open(\'https://www.xing.com/spi/shares/new?cb=0&url={{ current_url }}\',\'Xing\',\'width=585,height=666,left=\'+(screen.availWidth/2-292)+\',top=\'+(screen.availHeight/2-333)+\'\'); return false;" href="https://www.xing.com/spi/shares/new?cb=0&url={{ current_url }}">
									<i class="fab fa-xing"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_XING') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>

						<# if(_.indexOf(data.show_socials, "whatsapp") != "-1") { #>
							<li class="sppb-social-share-whatsapp">
							  <a href="whatsapp://send?text={{ current_url }}">
									<i class="fab fa-whatsapp"></i>
									<# if ( data.show_social_names != 0 ) { #>
										<span class="sppb-social-share-title">' . Text::_('COM_SPPAGEBUILDER_ADDON_SOCIALSHARE_WHATSAPP') . '</span>
									<# } #>
							  </a>
						  </li>
						<# } #>
						</ul>
					</div>

					</div>
				</div>
			</div>
			';

		return $output;
	}
}
