<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

//no direct access
defined('_JEXEC') or die('restricted access');

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Plugin\PluginHelper;

class SppagebuilderAddonOptin_form extends SppagebuilderAddons
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
		
		// get pageid
		$input 		= Factory::getApplication()->input;
		$page_id 	= $input->get('id', 0, 'INT');
		$settings = $this->addon->settings;
		if (is_array($page_id))
		{
			$page_id = $page_id[0];
		}

		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';
		$content = (isset($settings->content) && $settings->content) ? $settings->content : '';

		$grid = (isset($settings->grid) && $settings->grid) ? $settings->grid : '';
		$media_type = (isset($settings->media_type) && $settings->media_type) ? $settings->media_type : '';
		$image = (isset($settings->image) && $settings->image) ? $settings->image : '';
		$image_src = isset($image->src) ? $image->src : $image;
		$alt_text = (isset($settings->alt_text) && $settings->alt_text) ? $settings->alt_text : '';
		$icon_name = (isset($settings->icon_name) && $settings->icon_name) ? $settings->icon_name : '';
		$media_position = (isset($settings->media_position) && $settings->media_position) ? $settings->media_position : 'top';

		$form_inline = (isset($settings->form_inline) && $settings->form_inline) ? $settings->form_inline : '';

		$submit_btn_inside = (isset($settings->submit_btn_inside) && $settings->submit_btn_inside) ? $settings->submit_btn_inside : '';

		// Addon Options
		$show_checkbox      = (isset($settings->show_checkbox)) ? $settings->show_checkbox : 0;
		$recaptcha      	= (isset($settings->recaptcha)) ? $settings->recaptcha : 0;
		$captcha_type       = (isset($settings->captcha_type)) ? $settings->captcha_type : 'gcaptcha';
		$captcha_question   = (isset($settings->captcha_question) && $settings->captcha_question) ? $settings->captcha_question : '';
		$captcha_answer     = (isset($settings->captcha_answer) && $settings->captcha_answer) ? $settings->captcha_answer : '';
		$checkbox_title     = (isset($settings->checkbox_title) && $settings->checkbox_title) ? $settings->checkbox_title : '';

		$platform = (isset($settings->platform) && $settings->platform) ? $settings->platform : 'mailchimp';
		$hide_name = (isset($settings->hide_name)) ? $settings->hide_name : 0;

		$mailchimp_api 		= (isset($settings->mailchimp_api) && $settings->mailchimp_api) ? $settings->mailchimp_api : '';
		$sendgrid_api 		= (isset($settings->sendgrid_api) && $settings->sendgrid_api) ? $settings->sendgrid_api : '';
		$sendinblue_api 	= (isset($settings->sendinblue_api) && $settings->sendinblue_api) ? $settings->sendinblue_api : '';
		$madmimi_api 		= (isset($settings->madmimi_api) && $settings->madmimi_api) ? $settings->madmimi_api : '';

		$optin_type 		= (isset($settings->optin_type) && $settings->optin_type) ? $settings->optin_type : 'normal';

		$button_text 		= Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_FORM_SUBCSCRIBE');
	
		$button_class 		= (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : ' sppb-btn-success';

		$button_text 		= (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : '';
		$button_text_aria 		= (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : '';

		$button_class .= (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
		$button_class .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
		$button_class .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
		$button_class .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
		$button_class .= ' sppb-btn-custom';

		$button_icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
		$button_icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';

		$icon_arr = array_filter(explode(' ', $button_icon));
		if (count($icon_arr) === 1)
		{
			$button_icon = 'fa ' . $button_icon;
		}

		if ($button_icon_position == 'left')
		{
			$button_text = ($button_icon) ? '<i class="' . $button_icon . '" aria-hidden="true"></i> ' . $button_text : $button_text;
		}
		else
		{
			$button_text = ($button_icon) ? $button_text . ' <i class="' . $button_icon . '" aria-hidden="true"></i>' : $button_text;
		}

		$output  = '';

		// if cURL has't loaded or available in the server
		if (!extension_loaded('curl'))
		{
			$output  .= '<div class="sppb-addon sppb-addon-optin-forms sppb-alert sppb-alert-warning">';
			$output  .= '<p>' . Text::_('COM_SPPAGEBUILDER_GLOBAL_CURL_NOT_AVAILABLE') . '</p>';
			$output  .= '</div>';
			return $output;
		}

		// if selected platform hasn't api key inserted
		if (($platform == 'mailchimp' && $mailchimp_api == '') || ($platform == 'sendgrid' && $sendgrid_api == '') || ($platform == 'sendinblue' && $sendinblue_api == '') || ($platform == 'madmimi' && $madmimi_api == ''))
		{
			$output  .= '<div class="sppb-addon sppb-addon-optin-forms sppb-alert sppb-alert-warning">';
			$output  .= '<p>' . Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_FORM_EMPTY_API') . ' ' . $platform . '.</p>';
			$output  .= '</div>';
			return $output;
		}
		elseif ($platform == 'acymailing')
		{

			$acym_version = SpPgaeBuilderBase::getExtensionVersion(array('com_acymailing', 'com_acym'));

			if ($acym_version >= 6)
			{
				$acymailing_helper = rtrim(JPATH_ADMINISTRATOR, '/') . '/components/com_acym/helpers/helper.php';
			}
			else
			{
				$acymailing_helper = rtrim(JPATH_ADMINISTRATOR, '/') . '/components/com_acymailing/helpers/helper.php';
			}
			if (!file_exists($acymailing_helper))
			{ // if acymailing isn't installed
				$output  .= '<div class="sppb-addon sppb-addon-optin-forms sppb-alert sppb-alert-warning">';
				$output  .= '<p>' . Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_ACYMAILING_NOT_INSTALLED') . '</p>';
				$output  .= '</div>';
				return $output;
			}
			else
			{
				require_once $acymailing_helper;
			}
		}

		$info_wrap = '';
		$form_wrap = '';
		$raw_wrap  = '';
		switch ($grid)
		{
			case '6-6':
				$raw_wrap  = 'has-grid';
				$info_wrap = 'sppb-col-sm-6';
				$form_wrap = 'sppb-col-sm-6';
				break;
			case '5-7':
				$raw_wrap  = 'has-grid';
				$info_wrap = 'sppb-col-sm-5';
				$form_wrap = 'sppb-col-sm-7';
				break;
			case '8-4':
				$raw_wrap  = 'has-grid';
				$info_wrap = 'sppb-col-sm-8';
				$form_wrap = 'sppb-col-sm-4';
				break;
			case '2-10':
				$raw_wrap  = 'has-grid';
				$info_wrap = 'sppb-col-sm-2';
				$form_wrap = 'sppb-col-sm-10';
				break;

			default:
				$info_wrap = 'sppb-col-sm-12';
				$form_wrap = 'sppb-col-sm-12';
				break;
		}

		$output  .= '<div class="sppb-addon sppb-addon-optin-forms optintype-' . $optin_type . ' ' . $class . ' grid' . $grid . '">';
		$media = '';
		$media_class = '';
		if ($media_type == 'img')
		{
			$media_class .= ' sppb-optin-form-img';
			if ($image_src)
			{
				$media .= '<img class="sppb-img-responsive" src="' . $image_src . '" alt="' . $alt_text . '">';
			}
		}
		else
		{
			$media_class .= ' sppb-optin-form-icon';
			if ($icon_name)
			{
				$media_icon_arr = array_filter(explode(' ', $icon_name));
				if (count($media_icon_arr) === 1)
				{
					$icon_name = 'fa ' . $icon_name;
				}
				$media .= '<i class="fa ' . $icon_name . '" aria-hidden="true"></i>';
			}
		}

		if ($grid == 'ws-4-4-4')
		{
			$output .= '<div class="sppb-row justify-content-center">';
			$output .= '<div class="sppb-col-sm-4">';
		}
		elseif ($grid == 'ws-2-8-2')
		{
			$output .= '<div class="sppb-row justify-content-center">';
			$output .= '<div class="sppb-col-sm-8">';
		}
		elseif ($grid == 'ws-3-6-3')
		{
			$output .= '<div class="sppb-row justify-content-center">';
			$output .= '<div class="sppb-col-sm-6">';
		}

		$output .= '<div class="sppb-optin-form-box sppb-row ' . $raw_wrap . '">';

		$output .= '<div class="sppb-optin-form-info-wrap media-position-' . $media_position . ' ' . $info_wrap . '">';
		$output .= '<div class="sppb-optin-form-img-wrap ' . $media_class . '">' . $media . '</div>';
		if (isset($title) || isset($content))
		{
			$output .= '<div class="sppb-optin-form-details-wrap">';
		}
		if ($title)
		{
			$output .= '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>';
		}
		if ($content)
		{
			$output .= '<div class="sppb-optin-form-details">' . $content . '</div>';
		}
		if (isset($title) || isset($content))
		{
			$output .= '</div>'; //.sppb-optin-form-details-wrap
		}
		$output .= '</div>'; //.sppb-optin-form-info-wrap


		$output .= '<div class="sppb-optin-form-content ' . $form_wrap . '">';
		$forminline = ($form_inline) ? 'form-inline' : '';
		$button_inside = ($submit_btn_inside) ? 'submit-button-inside' : '';

		// if form-inline and button inline both are enable then add the column wrap and new grid for email and name field.
	    $col_wrap 	  = '';		
		$new_grid 	  = '';

		if ($forminline && $button_inside) {
			$col_wrap 	  = $hide_name ? 'sppb-col-sm-12' : 'sppb-col-sm-6';
			$new_grid 	  =  "<div class='sppb-row has-grid'>";
			$forminline   = '';
		}
		$output .= '<form class="sppb-optin-form ' . $forminline . ' ' . $button_inside . '">';				

		$output .= $new_grid;
		
		if (!$hide_name)
		{
			$output .= '<div class="sppb-form-group name-wrap ' . $col_wrap . '">';
			$output .= '<input type="text" name="fname" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME') . '" required="required" aria-label="name">';
			$output .= '</div>'; //.sppb-form-group
		}

		$output .= '<div class="sppb-form-group email-wrap ' .$col_wrap. '">';
		$output .= '<input type="email" name="email" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL') . '" required="required" aria-label="email">';
		$output .= '</div>'; //.sppb-form-group		
		$output .= ($new_grid) ? "</div>" : ''; //.sppb-row (for name and email fields when form-inline and button inside both are enabled) 
		
		// if form-inline and button inline both are enable then add the column wrap and new grid for recapcha and checkbox.		
		$col_wrap_recp_chckbpx = ($form_inline && $recaptcha && $show_checkbox) ? 'sppb-col-sm-6' : 'sppb-col-sm-12';
		
		$output .= $new_grid;

		if ($recaptcha && $captcha_type == 'default') {
			$output .= '<div class="sppb-form-group">';
			$output .= '<input type="text" name="captcha_question" class="sppb-form-control" placeholder="' . $captcha_question . '" required="required">';
			$output .= '</div>';
		}
	
		if ($recaptcha && $captcha_type !== 'igcaptcha' && $captcha_type !== 'default')
		{
			PluginHelper::importPlugin('captcha', 'recaptcha');
			Factory::getApplication()->triggerEvent('onInit', ['dynamic_recaptcha_' . $this->addon->id]);
			$recaptcha = Factory::getApplication()->triggerEvent('onDisplay', [null, 'dynamic_recaptcha_' . $this->addon->id, 'sppb-dynamic-recaptcha']);

			$output .= '<div class="sppb-form-group recaptcha-wrap ' .$col_wrap_recp_chckbpx. '">';
			$output .= (isset($recaptcha[0])) ? $recaptcha[0] : '<p class="sppb-alert sppb-alert-warning">' . Text::_('COM_SPPAGEBUILDER_RECAPTCHA_NOT_INSTALLED') . '</p>';
			$output .= '</div>'; //.sppb-form-group
		} elseif ($recaptcha && $captcha_type === 'igcaptcha') {
			PluginHelper::importPlugin('captcha', 'recaptcha_invisible');
			
			Factory::getApplication()->triggerEvent('onInit', ['invisible_recaptcha_' . $this->addon->id]);
			$recaptcha = Factory::getApplication()->triggerEvent('onDisplay', ['invisible_recaptcha_' . $this->addon->id, 'sppb-dynamic-recaptcha']);
            
			$output .= '<div class="sppb-form-group recaptcha-wrap ' .$col_wrap_recp_chckbpx. '">';
			$output .= (isset($recaptcha[0])) ? $recaptcha[0] : '<p class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_INVISIBLE_CAPTCHA_NOT_INSTALLED') . '</p>';
			$output .= '</div>'; //.sppb-form-group
		}

		if ($show_checkbox)
		{
			$output .= '<div class="sppb-form-group checkbox-wrap ' .$col_wrap_recp_chckbpx. '">';
			$output .= '<div class="sppb-form-check ">';
			$output .= '<input class="sppb-form-check-input" type="checkbox" name="agreement" id="agreement" required="required">';
			$output .= '<label class="sppb-form-check-label" for="agreement">' . $checkbox_title  . '</label>';
			$output .= '</div>';
			$output .= '</div>';
		}

		$output .= ($new_grid) ? '</div>' : '';
        $button_position_style = (!$form_inline && !$hide_name) ? 'style=top:7vh' : "";
		if ($platform == 'acymailing')
		{
			$output .= '<input type="hidden" name="acymversion" value="' . $acym_version . '">';
		}

		if ($recaptcha && $captcha_type == 'default') {
			$output .= '<input type="hidden" name="captcha_answer" value="' . md5($captcha_answer) . '">';
		}

		$output .= '<input type="hidden" name="captcha_type" value="' . $captcha_type . '">';
		$output .= '<input type="hidden" name="platform" value="' . $platform . '">';
		$output .= '<input type="hidden" name="hidename" value="' . $hide_name . '">';
		$output .= '<input type="hidden" name="pageid" value="' . $page_id . '">';
		$output .= '<input type="hidden" name="addonId" value="' . $this->addon->id . '">';

		$output .= '<div class="button-wrap" '.$button_position_style.'>';
		$output .= '<button type="submit" id="btn-' . $this->addon->id . '" class="sppb-btn' . $button_class . '" aria-label="' . strip_tags($button_text_aria) . '"><i class="fa" aria-hidden="true"></i> ' . $button_text . '</button>';
		$output .= '</div>'; //.button-wrap

		$output .= '</form>';
		$output .= '<div style="display:none;margin-top:10px;" class="sppb-optin-form-status"></div>';
		$output .= '</div>'; //.sppb-optin-form-content

		$output .= '</div>'; //.sppb-optin-form-box

		if (($grid == 'ws-4-4-4') || ($grid == 'ws-2-8-2') || ($grid == 'ws-3-6-3'))
		{
			$output .= '</div>'; //sppb-offset
			$output .= '</div>'; //sppb-row
		}

		$output .= '</div>'; //.sppb-addon-optin-forms
		return $output;
	}

	/**
	 * Get ajax data.
	 *
	 * @return 	string
	 * @since	1.0.0
	 */
	public static function getAjax()
	{

		$input = Factory::getApplication()->input;
		//inputs
		$inputs = $input->get('data', array(), 'ARRAY');

		foreach ($inputs as $input)
		{
			if ($input['name'] == 'email')
			{
				$email = $input['value'];
			}
			if ($input['name'] == 'hidename')
			{
				$hidename	= $input['value'];
			}
			if ($input['name'] == 'fname')
			{
				$name	= $input['value'];
			}
			if ($input['name'] == 'platform')
			{
				$platform		= $input['value'];
			}
			if ($input['name'] == 'acymversion')
			{
				$acymversion	= $input['value'];
			}

			if ($input['name'] == 'captcha_question') {
				$captcha_question = $input['value'];
			}

			if ($input['name'] == 'captcha_answer') {
				$captcha_answer = $input['value'];
				$showcaptcha = true;
			}

			if ($input['name'] == 'g-recaptcha-response')
			{
				$recaptcha = $input['value'];
				$showcaptcha = true;
			}
			if ($input['name'] == 'pageid')
			{
				$pageid		= $input['value'];
			}
			if ($input['name'] == 'addonId')
			{
				$addonId		= $input['value'];
			}

			if ($input['name'] == 'captcha_type') {
				$captcha_type = $input['value'];
			}

			if ($input['name'] == 'view_type')
			{
				$view_type		= $input['value'];
			}

			if ($input['name'] == 'module_id')
			{
				$module_id		= $input['value'];
			}
		}

		// get addon infos
		if ($view_type == 'module')
		{
			$page_info 		= self::getPageInfoById($module_id, $view_type, 'new');
			if (empty($page_info))
			{ // if old version of module
				$page_info 	= self::getPageInfoById($module_id, $view_type);
				$page_text 	= json_decode($page_info->params);
			}
			else
			{ // if new version of module
				$page_text 			= new stdClass();
				$page_text->content = $page_info->content ?? $page_info->text;
			}

			$addon_info = self::getAddonSettingByPageInfo($page_text->content, $addonId);
		}
		else
		{
			$page_info 	= self::getPageInfoById($pageid, $view_type);
			$addon_info = self::getAddonSettingByPageInfo($page_info->content ?? $page_info->text, $addonId);
		}

		$output = array();
		$output['status'] = false;

		if (isset($showcaptcha) && $showcaptcha)
		{
			if($captcha_type !== 'default') {
				if ($recaptcha == '') {
					$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_INVALID_CAPTCHA') . '</span>';
					return json_encode($output);
				}

				if ($captcha_type == 'igcaptcha') {
					PluginHelper::importPlugin('captcha', 'recaptcha_invisible');
					$output['gcaptchaId'] = 'invisible_recaptcha_' . $addonId;
					$output['gcaptchaType'] = 'invisible';
				} else {
					PluginHelper::importPlugin('captcha', 'recaptcha');
					$output['gcaptchaId'] = 'dynamic_recaptcha_' . $addonId;
					$output['gcaptchaType'] = 'dynamic';
				}
				
				$res = Factory::getApplication()->triggerEvent('onCheckAnswer', [$recaptcha]);
				// if module then verify gcaptcha
				if ($view_type == 'module') {
					$res = ($recaptcha != null || strlen($recaptcha) != 0) ? array(true) : array(false);
				}
				if (!$res[0]) {
					$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_INVALID_CAPTCHA') . '</span>';
					return json_encode($output);
				}
			} else if (md5($captcha_question) != $captcha_answer) {
				$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_WRONG_CAPTCHA') . '</span>';
				return json_encode($output);
			}
		}

		// valited email address
		if ($email)
		{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_INVALID_EMAIL');
				$output['status'] = false;
				return json_encode($output);
			}
		}

		// if hide name field then set value NULL
		if ($hidename)
		{
			$name = '';
		}

		if ($platform == 'mailchimp')
		{
			//mailchimp get crecentials
			$mcapi 			= (isset($addon_info->mailchimp_api) && $addon_info->mailchimp_api) ? $addon_info->mailchimp_api : '';
			$mclistid 		= (isset($addon_info->mailchimp_listid) && $addon_info->mailchimp_listid) ? $addon_info->mailchimp_listid : '';
			$mcaction 		= (isset($addon_info->mailchimp_action) && $addon_info->mailchimp_action) ? $addon_info->mailchimp_action : '';

			$memberId = md5(strtolower($email));
			$dataCenter = substr($mcapi, strpos($mcapi, '-') + 1);
			$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $mclistid . '/members/' . $memberId;
			$json = json_encode([
				'email_address' => $email,
				'status'        => $mcaction, // "subscribed","unsubscribed","cleaned","pending"
				'merge_fields'  => [
					'FNAME'     => $name,
					'LNAME'     => ''
				]
			]);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $mcapi);
			curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			$result = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$err = curl_error($ch);
			curl_close($ch);

			//$response = json_decode($result)->status;
			// if curl error
			if ($err)
			{
				$output['content'] = 'cURL error: ' . $err;
				$output['status'] = false;
				return json_encode($output);
			}

			// store the status message based on response code
			if ($httpCode == 200)
			{
				if ($mcaction == 'pending')
				{
					$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_PENDING');
				}
				else
				{
					$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_CONFIRMED');
				}
				$output['status'] = true;
			}
			else
			{
				switch ($httpCode)
				{
					case 214: // if success
						$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_EXIST');
						$output['status'] = false;
						break;
					default:
						$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_ERROR');
						$output['status'] = false;
						break;
				} // if got response
			}
		}
		elseif ($platform == 'sendgrid')
		{
			//sendgrid get crecentials
			$sgapi 		= (isset($addon_info->sendgrid_api) && $addon_info->sendgrid_api) ? $addon_info->sendgrid_api : '';
			$listIds    = (isset($addon_info->sendgrid_list_ids) && $addon_info->sendgrid_list_ids) ? array_map('trim',explode(',',$addon_info->sendgrid_list_ids)) : [];
		
			$input_data = json_encode([ "contacts" =>[
				[
					'email' => $email,
					'first_name' => $name,
					'last_name' => ''
				]],
			    "list_ids" => $listIds				
			]);

			$access_api = array(
				"Content-Type: application/json",
				"Authorization: Bearer " . $sgapi,
				"cache-control: no-cache"
			);

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "https://api.sendgrid.com/v3/marketing/contacts");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_ENCODING, '');
			curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
			curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, CURLOPT_SSL_VERIFYPEER);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($curl, CURLOPT_POSTFIELDS, $input_data);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $access_api);

			$result = curl_exec($curl);
		
			$err = curl_error($curl);
			curl_close($curl);
			$result_decode = json_decode($result);
		
			// if curl error
			if ($err)
			{
				$output['content'] = 'cURL error: ' . $err;
				$output['status'] = false;
				return json_encode($output);
			}

			if (!empty($result_decode->errors)) 
			{

				if (count($result_decode->errors) > 0) 
				{
					$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_ERROR');
					$output['status'] = false;
					return json_encode($output);
				}

			}
			else
			{
				$output['status'] = true;
				$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_CONFIRMED');
				return json_encode($output);
			}
		}
		
		if ($platform == 'sendinblue')
		{ // if sendinblue
			//sendinBlue get crecentials
			$sbapi 			  = (isset($addon_info->sendinblue_api) && $addon_info->sendinblue_api) ? $addon_info->sendinblue_api : '';
			$sblistid 		 = (isset($addon_info->sendinblue_listid) && $addon_info->sendinblue_listid) ? $addon_info->sendinblue_listid : '';

			$data_input = array(
				'email'         => $email,
				'updateEnabled' => true,
				'attributes'    => array('LASTNAME' => $name),
				'listIds'       => [(int) $sblistid],
			);

			$ch             = curl_init('https://api.sendinblue.com/v3/contacts');
			$auth_header    = 'api-key: ' . $sbapi;
			$content_header = "Content-Type:application/json";
			$timeout        = 30000; //default timeout: 30 secs

			if ($timeout != '' && ($timeout <= 0 || $timeout > 60000))
			{
				throw new \Exception('value not allowed for timeout');
			}

			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{
				// Windows only over-ride
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			}
			curl_setopt($ch, CURLOPT_HTTPHEADER, array($auth_header, $content_header));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 30000);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_input));
			$data = curl_exec($ch);
			$err      = curl_error($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			curl_close($ch);

			if ($err)
			{
				$output['content'] = 'cURL error: ' . $err;
				$output['status']  = false;

				return json_encode($output);
			}

			if ($httpcode == 201)
			{
				$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_CONFIRMED');
				$output['status']  = true;
			}

			if ($httpcode == 204)
			{
				$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_UPDATED');
				$output['status']  = true;
			}

			if ($httpcode == 400)
			{
				$output['content'] = json_decode($data)->message;
				$output['status']  = false;
			}

			if ($httpcode == 401)
			{
				$output['content'] = json_decode($data)->message;
				$output['status']  = false;
			}

			if ($httpcode == 500)
			{
				$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_ERROR');
				$output['status']  = false;
			}
		}

		elseif ($platform == 'madmimi')
		{ // if madmimi
			//madmimi get crecentials
			$mmuname 		= (isset($addon_info->madmimi_user) && $addon_info->madmimi_user) ? $addon_info->madmimi_user : '';
			$mmapi 			= (isset($addon_info->madmimi_api) && $addon_info->madmimi_api) ? $addon_info->madmimi_api : '';
			$mmlistname 	= (isset($addon_info->madmimi_listname) && $addon_info->madmimi_listname) ? $addon_info->madmimi_listname : '';

			$user = array('email' => $email, 'firstName' => $name, 'add_list' => $mmlistname);
			$authenticate = array('username' => $mmuname, 'api_key' => $mmapi);
			// generate CSV
			$csv = "";
			$keys = array_keys($user);
			foreach ($keys as $key => $value)
			{
				$value = self::escape_for_csv($value);
				$csv .= $value . ",";
			}
			$csv = substr($csv, 0, -1);
			$csv .= "\n";
			foreach ($user as $key => $value)
			{
				$value = self::escape_for_csv($value);
				$csv .= $value . ",";
			}
			$csv = substr($csv, 0, -1);
			$csv .= "\n";

			$options = array('csv_file' => $csv) + $authenticate;
			// do reqiest
			$request_options = http_build_query($options);
			$url = 'https://api.madmimi.com/audience_members';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Expect:"));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $request_options);
			$result = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);

			// if curl error
			if ($result === false && $err)
			{
				$output['content'] = 'cURL error: ' . $err;
				$output['status'] = false;
				return json_encode($output);
			}

			if (is_numeric($result))
			{
				$output['status'] = true;
				$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_CONFIRMED');
			}
			else
			{
				$output['status'] = false;
				$output['content'] = $result;
				return json_encode($output);
			}
		}
		elseif ($platform == 'acymailing')
		{ // if AcyMailing
			// if acymailing isn't installed
			if ($acymversion >= 6)
			{
				$acymailing_helper = rtrim(JPATH_ADMINISTRATOR, '/') . '/components/com_acym/helpers/helper.php';
			}
			else
			{
				$acymailing_helper = rtrim(JPATH_ADMINISTRATOR, '/') . '/components/com_acymailing/helpers/helper.php';
			}
			// include acymailing helper
			if (!include_once($acymailing_helper))
			{
				$output['status'] = false;
				$output['content'] = Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_ACYMAILING_NOT_INSTALLED');
				return json_encode($output);
			}

			$acymailing_listids 	= (isset($addon_info->acymailing_listids) && $addon_info->acymailing_listids) ? $addon_info->acymailing_listids : '';

			$user_info = new stdClass();
			$user_info->email = $email;
			$user_info->name = $name;

			if ($acymversion >= 6)
			{ // if version is more than or equal 6

				$userClass = acym_get('class.user');
				$user = $userClass->getOneByEmail($user_info->email);

				if(isset($user))
				{
					$output['status'] 	= false;
					$output['content'] 	= Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_DUPLICATE_USER');
					return json_encode($output);
				}
				$userId = $userClass->save($user_info); // this function will return you the ID of the user inserted in the AcyMailing table

				if (!is_int($userId))
				{
					return false;
				}

				// if selected all list
				if ((is_array($acymailing_listids) && in_array('', $acymailing_listids)) || $acymailing_listids == '')
				{
					$acy_list_class = acym_get('class.list');
					$acy_lists = $acy_list_class->getAll();

					$acymailing_listids = array();
					foreach ($acy_lists as $key => $acy_list)
					{
						$acymailing_listids[$key] = $acy_list->listid ?? $acy_list->id;
					}
				}		
				if (empty($acymailing_listids) || empty($userId))
				{
					$output['status'] 	= false;
					$output['content'] 	= Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_ERROR');
				}

				//$newSubscription = array();
				if (!empty($acymailing_listids))
				{
					$output['status'] = true;
					$results = $userClass->subscribe($userId, $acymailing_listids);
				}
			}
			else
			{ // for version less than or equal 5
				$subscriberClass = acymailing_get('class.subscriber');
				$subid = $subscriberClass->save($user_info); //this function will return you the ID of the user inserted in the AcyMailing table

				// if selected all list
				if ((is_array($acymailing_listids) && in_array('', $acymailing_listids)) || $acymailing_listids == '')
				{
					$acy_list_class = acymailing_get('class.list');
					$acy_lists = $acy_list_class->getLists();

					$acymailing_listids = array();
					foreach ($acy_lists as $key => $acy_list)
					{
						$acymailing_listids[$key] = $acy_list->listid;
					}
				}

				$userClass = acymailing_get('class.subscriber');
				$new_subscription = array();
				if (!empty($acymailing_listids))
				{
					foreach ($acymailing_listids as $listId)
					{
						$newList = array();
						$newList['status'] = 1;
						$new_subscription[$listId] = $newList;
					}
				}
				if (empty($new_subscription) || empty($subid))
				{
					$output['status'] 	= false;
					$output['content'] 	= Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_ERROR');
				}
				if ($userClass->subid($subid))
				{
					$subid = $userClass->subid($subid);
				}
				$results = $userClass->saveSubscription($subid, $new_subscription);
			}

			if (isset($results) && $results)
			{
				$output['status'] 	= true;
				$output['content'] 	= Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_CONFIRMED');
			}
			else
			{
				$output['status'] 	= false;
				$output['content'] 	= Text::_('COM_SPPAGEBUILDER_ADDON_OPTIN_PLATFORM_EMAIL_ERROR');
			}
		}

		return json_encode($output);
	}

	/**
	 * Escape variables for CSV.
	 *
	 * @param	string 	$s
	 * @return 	void
	 */
	public static function escape_for_csv($s)
	{
		// Watch out! We may have quotes! So quote them.
		$s = str_replace('"', '""', $s);

		return preg_match('/,/', $s) || preg_match('/"/', $s) || preg_match("/\n/", $s)
			? '"' . $s . '"'
			: $s;
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
	 * @return 	array
	 * @since 	1.0.0
	 */
	public function scripts()
	{
		return array(Uri::base(true) . '/components/com_sppagebuilder/assets/js/jquery.magnific-popup.min.js');
	}

	/**
	 * Get Page Information By ID.
	 *
	 * @param 	int 	$pageid
	 * @param 	string 	$view_type
	 * @param 	string 	$version
	 *
	 * @return 	object
	 * @since 	1.0.0
	 */
	public static function getPageInfoById($pageid, $view_type = 'page', $version = '')
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select(array('a.*'));
		if ($view_type == 'module')
		{
			if ($version == 'new')
			{
				$query->from($db->quoteName('#__sppagebuilder', 'a'));
				$query->where($db->quoteName('a.extension_view') . " = " . $db->quote('module'));
				$query->where($db->quoteName('a.view_id') . " = " . $db->quote((int) $pageid));
			}
			else
			{
				$query->from($db->quoteName('#__modules', 'a'));
				$query->where($db->quoteName('a.id') . " = " . $db->quote((int) $pageid));
			}
		}
		else if ($view_type == 'article')
		{
			$query->from($db->quoteName('#__sppagebuilder', 'a'));
			$query->where($db->quoteName('a.view_id') . " = " . $db->quote((int) $pageid));
		}
		else
		{
			$query->from($db->quoteName('#__sppagebuilder', 'a'));
			$query->where($db->quoteName('a.id') . " = " . $db->quote((int) $pageid));
		}

		$db->setQuery($query);
		$result = $db->loadObject();

		return $result;
	}

	/**
	 * Get addon settins by page information.
	 *
	 * @param 	string 	$pageContent
	 * @param 	int 	$addonId
	 *
	 * @return 	object
	 * @since 	1.0.0
	 */
	public static function getAddonSettingByPageInfo($pageContent, $addonId)
	{
		$addonInfo = false;
		$pageContent = json_decode($pageContent);

		foreach ($pageContent as $key => $row)
		{
			foreach ($row->columns as $key => $column)
			{
				foreach ($column->addons as $key => $addon)
				{
					if($addon->name == 'module' && !empty($addon->settings) && !empty($addon->settings->id)) {
						$pageInfo 		= self::getPageInfoById($addon->settings->id, 'module', 'new');

						if (empty($pageInfo))
						{ // if old version of module
							$pageInfo 	= self::getPageInfoById($addon->settings->id, 'module');
							$pageText 	= json_decode($pageInfo->params);
						}
						else
						{ // if new version of module
							$pageText 			= new stdClass();
							$pageText->content = $pageInfo->content ?? $pageInfo->text;
						}

						$addonInfo = self::getAddonSettingByPageInfo($pageText->content, $addonId);

						continue;
					}

					if ($addon->id == $addonId)
					{
						$addonInfo = $addon->settings;
						break;
					}
				}
			}
		}

		return $addonInfo;
	}

	/**
	 * Attach inline javascript.
	 *
	 * @return 	string
	 * @since	1.0.0
	 */
	public function js()
	{
		$optin_timein 	= (isset($this->addon->settings->optin_timein) && $this->addon->settings->optin_timein) ? $this->addon->settings->optin_timein : 0;
		$optin_timeout 	= (isset($this->addon->settings->optin_timeout) && $this->addon->settings->optin_timeout) ? $this->addon->settings->optin_timeout : 0;

		$addon_id = '#sppb-addon-' . $this->addon->id;
		$js = 'jQuery(function($){

			var addonId 				= $("' . $addon_id . '"),
					prentSectionId	= addonId.parent().closest("section");

			if($("' . $addon_id . '").find(".optintype-popup").length !== 0 && $("body:not(.layout-edit)").length !== 0){
					//prentSectionId.hide();
					$("' . $addon_id . '").hide();
			}

			if($("' . $addon_id . '").find(".optintype-popup").length !== 0 && $("body:not(.layout-edit)").length !== 0){
				//var parentSection 	= $("' . $addon_id . '").parent().closest("section"),
				var addonWidth 			= addonId.parent().outerWidth(),
						optin_timein		= ' . $optin_timein . ',
						optin_timeout		= ' . $optin_timeout . ',
						prentSectionId	= ".com-sppagebuilder:not(.layout-edit) #" + addonId.attr("id");

					window.addEventListener("load", () => {	
					setTimeout(() => {
						$("' . $addon_id . '").show();
						$.magnificPopup.open({
							
							items: {
								src: "<div class=\"sppb-optin-form-popup-wrap\" \">"+$(addonId)[0].outerHTML + "</div>"
								//src: "<div style=\"width:+"addonWidth"+\">" + $(addonId)[0].outerHTML + "</div>"
							},
							type: "inline",
									mainClass: "mfp-fade",
									disableOn: function() {
									return true;
								},
							callbacks: {
								open: () => {
									if(optin_timeout){
									setTimeout(() => {	
										$("' . $addon_id . '").magnificPopup("close");
									}, optin_timeout);
									}
								},
								
								close: () => {
									$("#sppb-addon-wrapper-' . $this->addon->id . '").hide();
								}
							}
						});
					}, optin_timein);
				}); //window
			};
		})';

		return $js;
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
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$buttonLayout = new FileLayout('addon.css.button', $layout_path);
		$settings = $this->addon->settings;
		$cssHelper = new CSSHelper($addon_id);

		$settings->optin_width = $settings->optin_width ?? '500';

		$custom_input = (isset($settings->custom_input) && $settings->custom_input) ? $settings->custom_input : '';
		$border_position = (isset($settings->custom_input_border_side) && $settings->custom_input_border_side) ? $settings->custom_input_border_side : '';

		$css = '';

		$iconStyle = $cssHelper->generateStyle('.sppb-optin-form-icon', $settings, ['icon_size' => 'font-size', 'icon_color' => 'color'], ['icon_color' => false]);

		$cssHelper->setID('.sppb-optin-form-popup-wrap > ' . $addon_id, true);
		$optinWidth = $cssHelper->generateStyle(':self', $settings, ['optin_width' => 'width']);
		$cssHelper->setID($addon_id);

		if ($custom_input)
		{
			$customInputStyleProps = [
				'custom_input_bgcolor'          => 'background-color',
				'custom_input_color'            => 'color',
				'custom_input_border'           => 'border:none; border-' . $border_position . 'width',
				'custom_input_border_color'     => 'border-' . $border_position . 'color',
				'custom_input_border_style'     => 'border-' . $border_position . 'style',
				'custom_input_bdr'              => 'border-radius',
				'custom_input_padding'          => 'padding'
			];
	
			$inputUnits = [
				'custom_input_color'            => false,
				'custom_input_bgcolor'          => false,
				'custom_input_border_style'     => false,
				'custom_input_border_color'     => false
			];
	
			$customInputStyle = $cssHelper->generateStyle('.sppb-optin-form input', $settings, $customInputStyleProps, $inputUnits, ['custom_input_padding' => 'spacing']);
	
			$css .= $customInputStyle;

			$placeholderColor = $cssHelper->generateStyle('.sppb-optin-form input::placeholder', $settings, ['custom_input_color' => 'opacity:1;color'], ['custom_input_color' => false]);
			$css .= $placeholderColor;
	
			$css .= $buttonLayout->render(array('addon_id' => $addon_id, 'options' => $settings, 'id' => 'btn-' . $this->addon->id));
	
			$customPadding = $cssHelper->generateStyle('.sppb-optin-form input', $settings, ['custom_input_padding' => 'padding'], ['padding' => true], ['custom_input_padding' => 'spacing']);
	
			$css .= $iconStyle;
			$css .= $optinWidth;
			$css .= $customPadding;
		}

		$options = new stdClass;
		$options->button_type = (isset($settings->button_type) && $settings->button_type) ? $settings->button_type : '';
		$options->button_shape = (isset($settings->button_shape) && $settings->button_shape) ? $settings->button_shape : '';
		$options->button_color = (isset($settings->button_color) && $settings->button_color) ? $settings->button_color : '';
		$options->button_border_width = (isset($settings->button_border_width) && $settings->button_border_width) ? $settings->button_border_width : '';
		$options->button_color_hover = (isset($settings->button_color_hover) && $settings->button_color_hover) ? $settings->button_color_hover : '';
		$options->button_background_color = (isset($settings->button_background_color) && $settings->button_background_color) ? $settings->button_background_color : '';
		$options->button_background_color_hover = (isset($settings->button_background_color_hover) && $settings->button_background_color_hover) ? $settings->button_background_color_hover : '';
		$options->button_fontstyle = (isset($settings->fontstyle) && $settings->fontstyle) ? $settings->fontstyle : '';
		$options->button_font_style = (isset($settings->font_style) && $settings->font_style) ? $settings->font_style : '';
		$options->button_padding = (isset($settings->button_padding) && $settings->button_padding) ? $settings->button_padding : '';
		$options->button_padding_original = (isset($settings->button_padding_original) && $settings->button_padding_original) ? $settings->button_padding_original : '';
		$options->fontsize = isset($settings->fontsize_original) ? $settings->fontsize_original : ($settings->fontsize ?? null);
		$options->button_size = isset($settings->button_size) ? $settings->button_size : null;
		$options->font_family = isset($settings->font_family) ? $settings->font_family : null;
		$options->button_typography = isset($settings->button_typography) ? $settings->button_typography : null;

		// Button Type Link
		$options->link_button_color = (isset($settings->link_button_color) && $settings->link_button_color) ? $settings->link_button_color : '';
		$options->link_border_color = (isset($settings->link_border_color) && $settings->link_border_color) ? $settings->link_border_color : '';
		$options->link_button_border_width = (isset($settings->link_button_border_width) && $settings->link_button_border_width) ? $settings->link_button_border_width : '';
		$options->link_button_padding_bottom = (isset($settings->link_button_padding_bottom) && gettype($settings->link_button_padding_bottom) == 'string') ? $settings->link_button_padding_bottom : '';

		// Link Hover
		$options->link_button_hover_color = (isset($settings->link_button_hover_color) && $settings->link_button_hover_color) ? $settings->link_button_hover_color : '';
		$options->link_button_border_hover_color = (isset($settings->link_button_border_hover_color) && $settings->link_button_border_hover_color) ? $settings->link_button_border_hover_color : '';

		$options->button_letterspace = (isset($settings->letterspace) && $settings->letterspace) ? $settings->letterspace : '';
		$options->button_background_gradient = (isset($settings->button_background_gradient) && $settings->button_background_gradient) ? $settings->button_background_gradient : new stdClass();
		$options->button_background_gradient_hover = (isset($settings->button_background_gradient_hover) && $settings->button_background_gradient_hover) ? $settings->button_background_gradient_hover : new stdClass();

		//Form Box Alignment
		$settings->alignment = CSSHelper::parseAlignment($settings, 'alignment');
		$alignmentStyle = $cssHelper->generateStyle('.sppb-addon-optin-forms', $settings, ['alignment' => 'text-align'], false);
		$css .= $alignmentStyle;

		$settings->button_position = CSSHelper::parseAlignment($settings, 'button_position');
		$alignmentStyle = $cssHelper->generateStyle('.button-wrap', $settings, ['button_position' => 'text-align'], false);
		$css .= $alignmentStyle;
		
		$iconStyle = $cssHelper->generateStyle('.sppb-btn i', $settings, ['icon_margin' => 'margin'], false, ['icon_margin' => 'spacing']);
		
		$css .= $buttonLayout->render(array('addon_id' => $addon_id, 'options' => $options, 'id' => 'btn-' . $this->addon->id));
		
		$css .= $iconStyle;

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
			var grid = data.grid || "";
			var info_wrap = "";
			var form_wrap = "";
			var raw_wrap  = "";
			switch (grid) {
				case "6-6":
					raw_wrap  = "has-grid";
					info_wrap = "sppb-col-sm-6";
					form_wrap = "sppb-col-sm-6";
					break;
				case "5-7":
					raw_wrap  = "has-grid";
					info_wrap = "sppb-col-sm-5";
					form_wrap = "sppb-col-sm-7";
					break;
				case "8-4":
					raw_wrap  = "has-grid";
					info_wrap = "sppb-col-sm-8";
					form_wrap = "sppb-col-sm-4";
					break;
				case "2-10":
					raw_wrap  = "has-grid";
					info_wrap = "sppb-col-sm-2";
					form_wrap = "sppb-col-sm-10";
					break;

				default:
					info_wrap = "sppb-col-sm-12";
					form_wrap = "sppb-col-sm-12";
					break;
			}

			var media = "";
			var mediaObj = "";
			if (typeof data.image !== "undefined" && typeof data.image.src !== "undefined") {
				mediaObj = data.image
			} else {
				mediaObj = {src: data.image}
			}
			var media_class = "";
			let icon_arr = (typeof data.icon_name !== "undefined" && data.icon_name) ? data.icon_name.split(" ") : "";
			let icon_name = icon_arr.length === 1 ? "fa "+data.icon_name : data.icon_name;

			if(data.media_type == "img"){
				media_class = " sppb-optin-form-img";
				if(mediaObj.src && mediaObj.src.indexOf("https://") == -1 && mediaObj.src.indexOf("http://") == -1){
					media = \'<img class="sppb-img-responsive" src="\' + pagebuilder_base + mediaObj.src + \'" alt="\' + data.alt_text + \'">\';
				} else if(mediaObj.src){
					media = \'<img class="sppb-img-responsive" src="\' + mediaObj.src + \'" alt="\' + data.alt_text + \'">\';
				}
			} else{
				media_class = " sppb-optin-form-icon";
				if(data.icon_name){
					media = \'<i class="\' + icon_name + \'"></i>\';
				}
			}
			var forminline = (data.form_inline) ? "form-inline" : "";
			var button_inside = (data.submit_btn_inside) ? "submit-button-inside" : "";

			var button_text = Joomla.Text._("COM_SPPAGEBUILDER_ADDON_OPTIN_FORM_SUBCSCRIBE");
			var use_custom_button = data.button_type ;
			var button_class = (data.button_type) ? " sppb-btn-" + data.button_type : " sppb-btn-success";
	
			button_text = (data.button_text) ? data.button_text : "";
			let btn_icon_arr = (typeof data.button_icon !== "undefined" && data.button_icon) ? data.button_icon.split(" ") : "";
			let btn_icon_name = btn_icon_arr.length === 1 ? "fa "+data.button_icon : data.button_icon;

			if(use_custom_button == "custom") {
				button_class += (data.button_size) ? " sppb-btn-" + data.button_size : "";
				button_class += (data.button_shape) ? " sppb-btn-" + data.button_shape: " sppb-btn-rounded";
				button_class += (data.button_appearance) ? " sppb-btn-" + data.button_appearance : "";
				button_class += (data.button_block) ? " " + data.button_block : "";
				button_class += " sppb-btn-custom";
				var button_icon = (data.button_icon) ? data.button_icon : false;
				var button_icon_position = (data.button_icon_position) ? data.button_icon_position: "left";
	
				if(button_icon_position == "left") {
					button_text = (button_icon) ? \'<i class="\' + btn_icon_name + \'"></i> \' + button_text : button_text;
				} else {
					button_text = (button_icon) ? button_text + \' <i class="\' + btn_icon_name + \'"></i>\' : button_text;
				}
			}

			var button_fontstyle = data.button_fontstyle || "";

		#>
		<style type="text/css">';
		//Title
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
		$output .= $lodash->unit('font-size', '.sppb-optin-form-icon', 'data.icon_size', 'px');
		$output .= $lodash->color('color', '.sppb-optin-form-icon', 'data.icon_color');

		//Custom Input
		$output .= '<# if (data.custom_input) { #>';
		$output .= $lodash->color('background-color', '.sppb-optin-form input', 'data.custom_input_bgcolor');
		$output .= $lodash->color('color', '.sppb-optin-form input', 'data.custom_input_color');
		// Custom input border less
		$output .= '<# if (data.custom_input_borderless) { #>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-optin-form input { border:none; }';
		$output .= '<# } else {#>';
		$output .= '#sppb-addon-{{ data.id }} .sppb-optin-form input { border:none; }';
		$output .= $lodash->unit('border-{{ data.custom_input_border_side }}width', '.sppb-optin-form input', 'data.custom_input_border', 'px');
		$output .= $lodash->border('border-{{ data.custom_input_border_side }}color', '.sppb-optin-form input', 'data.custom_input_border_color');
		$output .= $lodash->border('border-{{ data.custom_input_border_side }}style', '.sppb-optin-form input', 'data.custom_input_border_style');
		$output .= '<# } #>';

		$output .= $lodash->unit('border-radius', '.sppb-optin-form input', 'data.custom_input_bdr', 'px', false);
		$output .= $lodash->spacing('padding', '.sppb-optin-form input', 'data.custom_input_padding');
		$output .= $lodash->color('color', '.sppb-optin-form input::placeholder ', 'data.custom_input_color');
		$output .= '#sppb-addon-{{ data.id }} .sppb-optin-form input::placeholder { opacity: 1; }';
		$output .= '<# } #>';

		// Width
		$output .= '<# if (data.optin_width) { #>';
		$output .= $lodash->unit('width', '.sppb-optin-form-popup-wrap > #sppb-addon-{{ data.id }}', 'data.optin_width', 'px', false);
		$output .= '<# } else {#>';
		$output .= '.sppb-optin-form-popup-wrap > #sppb-addon-{{ data.id }} { width: 500px; }';
		$output .= '<# } #>';

		// Button Typography Fallbacks
		$buttonTypographyFallbacks = [
			'font'           => 'data.button_font_family',
			'letter_spacing' => 'data.button_letterspace',
			'weight'         => 'data.button_fontstyle?.weight',
			'italic'         => 'data.button_fontstyle?.italic',
			'underline'      => 'data.button_fontstyle?.underline',
			'uppercase'      => 'data.button_fontstyle?.uppercase',
		];

		$output .= $lodash->typography('#btn-{{ data.id }}.sppb-btn-custom', 'data.button_typography', $buttonTypographyFallbacks);
		$output .= $lodash->unit('font-size', '#btn-{{ data.id }}.sppb-btn-custom', 'data.fontsize', 'px');
		$output .= $lodash->spacing('padding', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_padding');
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_color_hover');

		// Custom button type
		$output .= '<# if (data.button_type == "custom") { #>';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_color');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color_hover');
		
		$output .= '<# if (data.button_appearance == "outline") { #>';
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color_hover');
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { background-color: transparent; }';
		$output .= '<# } else if(data.button_appearance == "3d"){ #>';
		$output .= $lodash->border('border-bottom-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= '<# } else if(data.button_appearance == "gradient"){ #>';
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { border: none; }';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom ', 'data.button_background_gradient');
		$output .= $lodash->color('background-image', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_gradient_hover');
		$output .= '<# } #>';
		$output .= '<# } #>'; // end custom button type if block

		$output .= $lodash->spacing('padding', '.sppb-optin-form input', 'data.custom_input_padding');
		$output .= $lodash->spacing('padding', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_padding');
		$output .= $lodash->unit('font-size', '#btn-{{ data.id }}.sppb-btn-custom', 'data.fontsize', 'px');
		$output .= $lodash->alignment('text-align', '.sppb-addon-optin-forms', 'data.alignment');
		$output .= $lodash->alignment('text-align', '.button-wrap', 'data.button_position');
		$output .= '
		</style>
		<div class="sppb-addon sppb-addon-optin-forms grid{{ grid }} {{data.class}}">
			<# if(grid == "ws-4-4-4"){ #>
				<div class="sppb-row justify-content-center">
				<div class="sppb-col-sm-4">
			<# } else if(grid == "ws-2-8-2"){ #>
				<div class="sppb-row justify-content-center">
				<div class="sppb-col-sm-8">
			<# } else if(grid == "ws-3-6-3"){ #>
				<div class="sppb-row justify-content-center">
				<div class="sppb-col-sm-6">
			<# } #>
			<div class="sppb-optin-form-box sppb-row {{ raw_wrap }}">
			
				<div class="sppb-optin-form-info-wrap media-position-{{ data.media_position || "top" }} {{ info_wrap }}">
					<div class="sppb-optin-form-img-wrap {{ media_class }}">
					{{{ media }}}
					</div>
					<# if(data.title || data.content){ #>
						<div class="sppb-optin-form-details-wrap">
					<# } #>
						<# if(data.title) { #>
							<{{ data.heading_selector || "h3" }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ data.heading_selector || "h3" }}>
						<# } #>
						<# if(data.content) { #>
							<div id="addon-text-{{data.id}}" class="sppb-optin-form-details sp-editable-content" data-id={{data.id}} data-fieldName="content">{{{ data.content }}}</div>
						<# } #>
					<# if(data.title || data.content){ #>
						</div>
					<# } #>
				</div>
	
				<# // if form-inline and button inline both are enable then add the column wrap and new grid for email and name field.
	    		let col_wrap 	 = " ";	
				let inline 	 	 = (forminline && button_inside) ? " " : forminline;
				
				if (forminline && button_inside) {
					col_wrap     = (data.hide_name) ? "sppb-col-sm-12" : "sppb-col-sm-6";
				}
				#>
							
				<div class="sppb-optin-form-content {{ form_wrap }}">
					<form class="sppb-optin-form {{ inline }} {{button_inside}}">
						<# 
						if (forminline && button_inside) { #>
							<div class="row has-grid">					
						<# }
						if (!data.hide_name) { #>
							<div class="sppb-form-group name-wrap {{ col_wrap }}">
								<input type="text" name="fname" class="sppb-form-control" placeholder="{{ Joomla.Text._(\'COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME\') }}" required="required">
							</div>
						<# } #>
	
						<div class="sppb-form-group email-wrap {{ col_wrap }}">
							<input type="email" name="email" class="sppb-form-control" placeholder="{{ Joomla.Text._(\'COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL\') }}" required="required">
						</div>

						<# if (forminline && button_inside) { #>
							</div>
						<# } #>
						
						<# let col_wrap_recp_chckbpx = (forminline && data.recaptcha && data.show_checkbox) ? "sppb-col-sm-6" : "sppb-col-sm-12";
							if (forminline && button_inside) { #>
								<div class="sppb-row has-grid">	
						<#  }     
						let isCaptchaEnabled = [true, "true", 1, "1"].includes(data.recaptcha);	
						#>

						<# if(isCaptchaEnabled && data.captcha_type === "default") { #>
							<div class="sppb-form-group">
								<input type="text" name="captcha_question" class="sppb-form-control" placeholder="{{ data.captcha_question }}" required="required">
							</div>
						<# } #>

						<# if(isCaptchaEnabled && data.captcha_type !== "igcaptcha" && data.captcha_type !== "default"){ #>
							<div class="sppb-row">
								<div class="sppb-form-group recaptcha-wrap {{ col_wrap_recp_chckbpx }}">
									<img src="components/com_sppagebuilder/assets/images/captcha.png" >
								</div>
							</div>
						<# } #>

						<# if(isCaptchaEnabled && data.captcha_type === "igcaptcha"){ #>
							<div class="sppb-row">
								<div class="sppb-form-group recaptcha-wrap {{ col_wrap_recp_chckbpx }}">
									<img src="components/com_sppagebuilder/assets/images/captcha-2.png" >
								</div>
							</div>
						<# } #>
						
						<# if (data.show_checkbox) { #>
							<div class="sppb-form-group checkbox-wrap {{ col_wrap_recp_chckbpx }}">
								<div class="sppb-form-check">
									<input class="sppb-form-check-input" type="checkbox" name="agreement" id="agreement" required="required">
									<label class="sppb-form-check-label" for="agreement">{{{ data.checkbox_title }}}</label>
								</div>
							</div>
						<# } #>

						<# if (forminline && button_inside) { #>
							</div>
						<# } #>

						<# let button_position_style = (!forminline && !data.hide_name) ? "style=top:7vh;" : ""; #>
					
						<div class="button-wrap" {{ button_position_style }} >
							<button type="submit" id="btn-{{ data.id }}" class="sppb-btn {{ button_class }}"><i class="fa"></i> {{{ button_text }}}</button>
						</div>
	
					</form>
					<div style="display:none;margin-top:10px;" class="sppb-optin-form-status"></div>
				</div>
	
			</div>
			<# if((grid == "ws-4-4-4") || (grid == "ws-2-8-2") || (grid == "ws-3-6-3")){ #>
				</div>
				</div>
			<# } #>
		</div>
		';

		return $output;
	}
}
