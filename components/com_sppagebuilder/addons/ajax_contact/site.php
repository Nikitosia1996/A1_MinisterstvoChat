<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Session\Session;

// No direct access
defined('_JEXEC') or die('Restricted access');

class SppagebuilderAddonAjax_contact extends SppagebuilderAddons
{
	public static $salt   = '3a1q3ko70zwa2lxnui73qk3hm7g2xq6oe7bi0ydk0eulifabjb';
	/**
	 * The addon frontend render method.
	 * The returned HTML string will render to the frontend page.
	 *
	 * @return  string  The HTML string.
	 * @since   1.0.0
	 */
	public function render()
	{
		// CSRF token
		HTMLHelper::_('jquery.token');

		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

		// Addon options
		$recipient_email    = (isset($settings->recipient_email) && $settings->recipient_email) ? $settings->recipient_email : '';
		$from_email         = (isset($settings->from_email) && $settings->from_email) ? $settings->from_email : '';
		$from_name          = (isset($settings->from_name) && $settings->from_name) ? $settings->from_name : '';
		$show_phone         = (isset($settings->show_phone) && $settings->show_phone) ? $settings->show_phone : '';
		$formcaptcha        = (isset($settings->formcaptcha) && $settings->formcaptcha) ? $settings->formcaptcha : '';
		$captcha_type       = (isset($settings->captcha_type)) ? $settings->captcha_type : 'default';
		$captcha_question   = (isset($settings->captcha_question) && $settings->captcha_question) ? $settings->captcha_question : '';
		$captcha_answer     = (isset($settings->captcha_answer) && $settings->captcha_answer) ? $settings->captcha_answer : '';
		$button_text        = Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SEND');
		$use_custom_button  = (isset($settings->use_custom_button) && $settings->use_custom_button) ? $settings->use_custom_button : 0;
		$show_checkbox      = (isset($settings->show_checkbox) && $settings->show_checkbox) ? $settings->show_checkbox : 0;
		$checkbox_title     = (isset($settings->checkbox_title) && $settings->checkbox_title) ? $settings->checkbox_title : '';
		$button_class       = (isset($settings->button_type) && $settings->button_type) ? ' sppb-btn-' . $settings->button_type : ' sppb-btn-success';
		$button_text = (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SEND');
		$button_aria_text = (isset($settings->button_text) && $settings->button_text) ? $settings->button_text : Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SEND');

		$name_input_col = (isset($settings->name_input_col) && $settings->name_input_col) ? ' sppb-col-sm-' . $settings->name_input_col : ' sppb-col-sm-12';
		$email_input_col = (isset($settings->email_input_col) && $settings->email_input_col) ? ' sppb-col-sm-' . $settings->email_input_col : ' sppb-col-sm-12';
		$captcha_input_col = (isset($settings->captcha_input_col) && $settings->captcha_input_col) ? ' sppb-col-sm-' . $settings->captcha_input_col : ' sppb-col-sm-12';
		$subject_input_col = (isset($settings->subject_input_col) && $settings->subject_input_col) ? ' sppb-col-sm-' . $settings->subject_input_col : ' sppb-col-sm-12';
		$phone_input_col = (isset($settings->phone_input_col) && $settings->phone_input_col) ? ' sppb-col-sm-' . $settings->phone_input_col : ' sppb-col-sm-12';
		$message_input_col = (isset($settings->message_input_col) && $settings->message_input_col) ? ' sppb-col-sm-' . $settings->message_input_col : ' sppb-col-sm-12';

		$show_label = (isset($settings->show_label) && $settings->show_label) ? $settings->show_label : false;

		if ($use_custom_button) {
			$button_class .= (isset($settings->button_size) && $settings->button_size) ? ' sppb-btn-' . $settings->button_size : '';
			$button_class .= (isset($settings->button_shape) && $settings->button_shape) ? ' sppb-btn-' . $settings->button_shape : ' sppb-btn-rounded';
			$button_class .= (isset($settings->button_appearance) && $settings->button_appearance) ? ' sppb-btn-' . $settings->button_appearance : '';
			$button_class .= (isset($settings->button_block) && $settings->button_block) ? ' ' . $settings->button_block : '';
			$button_icon = (isset($settings->button_icon) && $settings->button_icon) ? $settings->button_icon : '';
			$button_icon_position = (isset($settings->button_icon_position) && $settings->button_icon_position) ? $settings->button_icon_position : 'left';

			$icon_arr = array_filter(explode(' ', $button_icon));

			if (count($icon_arr) === 1) {
				$button_icon = 'fa ' . $button_icon;
			}

			if ($button_icon_position === 'left') {
				$button_text = ($button_icon) ? '<span class="' . $button_icon . '" aria-hidden="true"></span> ' . $button_text : $button_text;
			} else {
				$button_text = ($button_icon) ? $button_text . ' <span class="' . $button_icon . '" aria-hidden="true"></span>' : $button_text;
			}
		}

		$output = '<div class="sppb-addon sppb-addon-ajax-contact ' . $class . '">';

		if ($title) {
			$output .= '<' . $heading_selector . ' class="sppb-addon-title">' . $title . '</' . $heading_selector . '>';
		}

		$output .= '<div class="sppb-ajax-contact-content">';
		$output .= '<form class="sppb-ajaxt-contact-form">';
		$output .= '<div class="sppb-row">';

		$output .= '<div class="sppb-form-group ' . $name_input_col . '">';
		if ($show_label) {
			$output .= '<label for="name">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME') . '</label>';
		}
		$output .= '<input type="text" name="name" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME') . '" required="required">';
		$output .= '</div>';

		$output .= '<div class="sppb-form-group ' . $email_input_col . '">';
		if ($show_label) {
			$output .= '<label for="email">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL') . '</label>';
		}
		$output .= '<input type="email" name="email" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL') . '" required="required">';
		$output .= '</div>';

		if (!empty($show_phone)) {
			$output .= '<div class="sppb-form-group ' . $phone_input_col . '">';
			if ($show_label) {
				$output .= '<label for="phone">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_PHONE') . '</label>';
			}
			$output .= '<input type="text" name="phone" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_PHONE') . '" required="required">';
			$output .= '</div>';
		}

		$output .= '<div class="sppb-form-group ' . $subject_input_col . '">';
		if ($show_label) {
			$output .= '<label for="subject">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SUBJECT') . '</label>';
		}
		$output .= '<input type="text" name="subject" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SUBJECT') . '" required="required">';
		$output .= '</div>';

		

		$output .= '<div class="sppb-form-group ' . $message_input_col . '">';
		if ($show_label) {
			$output .= '<label for="message">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_MESSAGE') . '</label>';
		}
		$output .= '<textarea name="message" rows="5" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_MESSAGE') . '" required="required"></textarea>';
		$output .= '</div>';

		if ($formcaptcha && $captcha_type == 'default') {
			$output .= '<div class="sppb-form-group ' . $captcha_input_col . '">';
			if ($show_label) {
				$output .= '<label for="captcha_question">' . $captcha_question . '</label>';
			}
			$output .= '<input type="text" name="captcha_question" class="sppb-form-control" placeholder="' . $captcha_question . '" required="required">';
			$output .= '</div>';
		}

		$output .= '</div>';

		$hidden_value = array(
				'recipient_email'   => base64_encode($recipient_email),
				'from_email' 		=> base64_encode($from_email),
				'from_name'			=> base64_encode($from_name)
			);
		$hidden_json   		= json_encode($hidden_value);
		$hidden_base64 		= base64_encode($hidden_json);

		$encrypted_salt_key = md5(self::$salt . $hidden_base64);

		$output .= '<input type="hidden" name="form_id" value="' . $hidden_base64 . ':' . $encrypted_salt_key . '" >';
		
		$output .= '<input type="hidden" name="addon_id" value="' . $this->addon->id . '">';

		if ($formcaptcha && $captcha_type == 'default') {
			$output .= '<input type="hidden" name="captcha_answer" value="' . md5($captcha_answer) . '">';
		} elseif ($formcaptcha && $captcha_type == 'gcaptcha') {
			PluginHelper::importPlugin('captcha', 'recaptcha');
			
			Factory::getApplication()->triggerEvent('onInit', ['dynamic_recaptcha_' . $this->addon->id]);
			$recaptcha = Factory::getApplication()->triggerEvent('onDisplay', array(null, 'dynamic_recaptcha_' . $this->addon->id, 'sppb-dynamic-recaptcha'));
		

			$output .= (isset($recaptcha[0])) ? $recaptcha[0] : '<p class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_CAPTCHA_NOT_INSTALLED') . '</p>';
		} elseif ($formcaptcha && $captcha_type == 'igcaptcha') {
			PluginHelper::importPlugin('captcha', 'recaptcha_invisible');
			
			Factory::getApplication()->triggerEvent('onInit', ['invisible_recaptcha_' . $this->addon->id]);
			$recaptcha = Factory::getApplication()->triggerEvent('onDisplay', ['invisible_recaptcha_' . $this->addon->id, 'sppb-dynamic-recaptcha']);
            

			$output .= (isset($recaptcha[0])) ? $recaptcha[0] : '<p class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_INVISIBLE_CAPTCHA_NOT_INSTALLED') . '</p>';
		}

		if ($show_checkbox) {
			$output .= '<div class="sppb-form-group">';
			$output .= '<div class="sppb-form-check">';
			$output .= '<input class="sppb-form-check-input" type="checkbox" name="agreement" id="agreement-' . $this->addon->id . '" required="required">';
			$output .= '<label class="sppb-form-check-label" for="agreement-' . $this->addon->id . '">' . $checkbox_title  . '</label>';
			$output .= '</div>';
			$output .= '</div>';
		}

		$output .= '<input type="hidden" name="captcha_type" value="' . $captcha_type . '">';
		$output .= '<div class="sppb-form-button">';
		$output .= '<button type="submit" id="btn-' . $this->addon->id . '" aria-label="' . strip_tags($button_aria_text) . '" class="sppb-btn' . $button_class . '">' . $button_text . '</button>';
		$output .= '</div>';
		$output .= '</form>';
		$output .= '<div style="display:none;margin-top:10px;" class="sppb-ajax-contact-status"></div>';

		$output .= '</div>';

		$output .= '</div>';

		return $output;
	}

	/**
	 * Get ajax value.
	 *
	 * @return  void
	 * @since   1.0.0
	 */
	public static function getAjax()
	{

		// If cache isn't enable      
		if (!Factory::getConfig()->get('caching') && !PluginHelper::getPlugin('system', 'cache')) {
			// Check CSRF
			Session::checkToken() or die('Restricted Access');
		}

		// include page builder page model
		require_once JPATH_BASE . '/components/com_sppagebuilder/models/page.php';

		$input = Factory::getApplication()->input;
		$viewid = $input->get('id', 0, 'INT');

		$mail = Factory::getMailer();
		$message = '';
		$showcaptcha = false;

		//inputs
		$inputs = $input->get('data', array(), 'ARRAY');

		foreach ($inputs as $input) {

			if ($input['name'] == 'form_id') {
				$data 				= $input['value'];
				$hidden_data 		= explode(':', $data);
				$encrypted_salt_key = md5(self::$salt . $hidden_data[0]);

				if ($encrypted_salt_key === $hidden_data[1]) {
					$decrypted_data = json_decode(base64_decode($hidden_data[0]));
					$recipient 		= base64_decode($decrypted_data->recipient_email);
					$from_email 	= base64_decode($decrypted_data->from_email);
					$from_name 		= base64_decode($decrypted_data->from_name);
				} else {
					die('Restricted Access');
				}
			}

			if ($input['name'] == 'captcha_type') {
				$captcha_type = $input['value'];
			}

			if ($input['name'] == 'view_type') {
				$view_type        = $input['value'];
			}

			if ($input['name'] == 'addon_id') { 
				$addon_id = $input['value'];
			}

			if ($input['name'] == 'module_id') {
				$module_id        = $input['value'];
			}

			if ($input['name'] == 'email') {
				$email = $input['value'];
			}

			if ($input['name'] == 'name') {
				$name = $input['value'];
			}

			if ($input['name'] == 'subject') {
				$subject = $input['value'];
			}

			if ($input['name'] == 'phone') {
				$phone = $input['value'];
			}

			if ($input['name'] == 'message') {
				$message = nl2br($input['value']);
			}

			if ($input['name'] == 'captcha_question') {
				$captcha_question = $input['value'];
			}

			if ($input['name'] == 'captcha_answer') {
				$captcha_answer = $input['value'];
				$showcaptcha = true;
			}

			if ($input['name'] == 'g-recaptcha-response') {
				$gcaptcha = $input['value'];
				$showcaptcha = true;
			}

			if ($input['name'] == 'agreement') {
				$agreement = $input['value'];
			}
		}

		// get addon infos
		if ($view_type == 'module') {
			$item_data = new stdClass();
			$page_info = self::getPageInfoById($module_id, $view_type, 'new');

			if (empty($page_info)) // if old version of module
			{
				$page_info       = self::getPageInfoById($module_id, $view_type);
				$item_data->text = json_encode(json_decode($page_info->params)->content);
			} else // if new version of module
			{
				$item_data->text = $page_info->text;
			}
		} elseif ($view_type == 'article') {
			$item_data = new stdClass();
			$item_data = self::getPageInfoById($viewid, $view_type);
		} else {
			$model = new SppagebuilderModelPage();
			$item_data = $model->getItem($viewid);
		}

		$output = array();
		$output['status'] = false;
		$output['gcaptchaId'] = '';

		// Match has addon id
		if (self::verifyAddon($item_data->content ?? $item_data->text, $addon_id) == false) {
			$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FAILED') . '</span>';
			return json_encode($output);
		}

		if ($showcaptcha) {
			if ($captcha_type == 'gcaptcha' || $captcha_type == 'igcaptcha') {
				if ($gcaptcha == '') {
					$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_INVALID_CAPTCHA') . '</span>';
					return json_encode($output);
				} else {
					if ($captcha_type == 'igcaptcha') {
						PluginHelper::importPlugin('captcha', 'recaptcha_invisible');
						$output['gcaptchaId'] = 'invisible_recaptcha_' . $addon_id;
						$output['gcaptchaType'] = 'invisible';
					} else {
						PluginHelper::importPlugin('captcha', 'recaptcha');
						$output['gcaptchaId'] = 'dynamic_recaptcha_' . $addon_id;
						$output['gcaptchaType'] = 'dynamic';
					}
					
					$res = Factory::getApplication()->triggerEvent('onCheckAnswer', [$gcaptcha]);
					// if module then verify gcaptcha
					if ($view_type == 'module') {
						$res = ($gcaptcha != null || strlen($gcaptcha) != 0) ? array(true) : array(false);
					}
					if (!$res[0]) {
						$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_INVALID_CAPTCHA') . '</span>';
						return json_encode($output);
					}
				}
			} else {
				if (md5($captcha_question) != $captcha_answer) {
					$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_WRONG_CAPTCHA') . '</span>';
					return json_encode($output);
				}
			}
		}

		// Get sender UP
		$senderip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

		// Subject Structure
		$site_name = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
		$mailSubject   = $subject . ' | ' . $site_name;

		// Message structure
		$mailBody = '<div>';

		if (isset($name) && $name) {
			$mailBody .= '<p><strong>' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME') . '</strong>: ' . $name . '</p>';
		}

		$mailBody .= '<p><strong>' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL') . '</strong>: ' . $email . '</p>';

		if (isset($phone) && $phone) {
			$mailBody .= '<p><strong>' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_PHONE') . '</strong>: ' . $phone . '</p>';
		}

		if (isset($message) && $message) {
			$mailBody .= '<p><strong>' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_MESSAGE') . '</strong>: ' . $message . '</p>';
		}

		if (isset($agreement) && $agreement) {
			$mailBody .= '<p><strong>' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_TAC') . '</strong>: ' . Text::_('JYES') . '</p>';
		} else {
			$mailBody .= '<p><strong>' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_TAC') . '</strong>: ' . Text::_('JNO') . '</p>';
		}

		$mailBody .= '<p><strong>' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SENDER_IP') . '</strong>: ' . $senderip . '</p>';
		$mailBody .= '</div>';

		$config = Factory::getConfig();

		$senderMail = $config->get('mailfrom');
		$senderName = $config->get('fromname');

		// $sender = array( $email, $name );

		if (!empty($from_email)) {
			$senderMail = $from_email;
			$senderName = $from_name;
		}

		if (empty($senderMail) && empty($senderName))
		{
			$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FAILED') . '</span>';
		}

		if (empty($recipient))
		{
			$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FAILED') . '</span>';
		}

		$isHtmlMode = true;
		$attachment = $cc = $bcc = null;
		
		if ($mail->sendMail($senderMail, $senderName, $recipient, $mailSubject, $mailBody, $isHtmlMode, $cc, $bcc, $attachment, $email, $name)) {
			$output['status'] = true;
			$output['content'] = '<span class="sppb-text-success">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SUCCESS') . '</span>';
		} else {
			$output['content'] = '<span class="sppb-text-danger">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FAILED') . '</span>';
		}

		return json_encode($output);
	}

	/**
	 * Get page by ID.
	 *
	 * @param 	int 	$the page ID.
	 * @param 	string $view_type
	 * @param 	string $version
	 *
	 * @return 	void
	 * @since 	1.0.0
	 */
	public static function getPageInfoById($item_id, $view_type = 'page', $version = '')
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select(array('a.*'));

		if ($view_type == 'module') {
			if ($version == 'new') {
				$query->from($db->quoteName('#__sppagebuilder', 'a'));
				$query->where($db->quoteName('a.extension_view') . " = " . $db->quote('module'));
				$query->where($db->quoteName('a.view_id') . " = " . $db->quote((int) $item_id));
			} else {
				$query->from($db->quoteName('#__modules', 'a'));
				$query->where($db->quoteName('a.id') . " = " . $db->quote((int) $item_id));
			}
		} else if ($view_type == 'article') {
			$query->from($db->quoteName('#__sppagebuilder', 'a'));
			$query->where($db->quoteName('a.view_id') . " = " . $db->quote((int) $item_id));
		} else {
			$query->from($db->quoteName('#__sppagebuilder', 'a'));
			$query->where($db->quoteName('a.id') . " = " . $db->quote((int) $item_id));
		}

		$db->setQuery($query);
		$result = $db->loadObject();

		return $result;
	}

	public function css()
	{
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$layout_path = JPATH_ROOT . '/components/com_sppagebuilder/layouts';
		$css_path = new FileLayout('addon.css.button', $layout_path);
		$cssHelper = new CSSHelper($addon_id);
		$css = '';

		$use_custom_button = (isset($settings->use_custom_button) && $settings->use_custom_button) ? $settings->use_custom_button : 0;

		if ($use_custom_button) {
			$css .= $css_path->render(array('addon_id' => $addon_id, 'options' => $this->addon->settings, 'id' => 'btn-' . $this->addon->id));
		}

		$inputProps = [
			'field_bg_color' => 'background',
			'field_color' => 'color',
			'field_font_size' => 'font-size',
			'field_border_color' => 'border-color',
			'field_border_width' => 'border-width',
			'field_border_radius' => 'border-radius',
			'field_padding' => 'padding',
			'input_height' => 'height',
		];

		$inputUnits = [
			'field_bg_color' => false,
			'field_color' => false,
			'field_border_color' => false,
			'field_padding' => false,
			'field_border_width' => false
		];

		$modifiers = ['field_padding' => 'spacing'];

		$fieldStyle = $cssHelper->generateStyle(
			'.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)',
			$settings,
			$inputProps,
			$inputUnits,
			$modifiers
		);

		$inputPropsTextArea = [
			'field_bg_color' => 'background',
			'field_color' => 'color',
			'field_font_size' => 'font-size',
			'field_border_color' => 'border-color',
			'field_border_width' => 'border-width',
			'field_border_radius' => 'border-radius',
			'field_padding' => 'padding',
			'textarea_height' => 'height',
		];
		$fieldTextAreaStyle = $cssHelper->generateStyle(
			'.sppb-ajaxt-contact-form div.sppb-form-group textarea',
			$settings,
			$inputPropsTextArea,
			$inputUnits,
			$modifiers
		);

		$fieldMarginStyle = $cssHelper->generateStyle('.sppb-ajaxt-contact-form div.sppb-form-group', $settings, ['field_margin' => 'margin'], false, ['field_margin' => 'spacing']);

		$fieldHoverStyle = $cssHelper->generateStyle(
			".sppb-ajaxt-contact-form .sppb-form-group input:hover,
			.sppb-ajaxt-contact-form .sppb-form-group input:active,
			.sppb-ajaxt-contact-form .sppb-form-group input:focus,
			.sppb-ajaxt-contact-form .sppb-form-group textarea:hover,
			.sppb-ajaxt-contact-form .sppb-form-group textarea:active,
			.sppb-ajaxt-contact-form .sppb-form-group textarea:focus",
			$settings,
			[
				'field_hover_bg_color' => 'background',
				'field_focus_border_color' => 'border-color'
			],
			false
		);

		$placeholderStyle = $cssHelper->generateStyle('.sppb-ajaxt-contact-form .sppb-form-group input::placeholder,.sppb-ajaxt-contact-form .sppb-form-group textarea::placeholder', $settings, ['field_placeholder_color' => 'color'], false);
		$hoverPlaceholderStyle = $cssHelper->generateStyle('.sppb-ajaxt-contact-form .sppb-form-group input:hover::placeholder,.sppb-ajaxt-contact-form .sppb-form-group textarea:hover::placeholder', $settings, ['field_hover_placeholder_color' => 'color'], false);
		$buttonStyle = $cssHelper->generateStyle('.sppb-btn span', $settings, ['button_icon_margin' => 'margin'], false, ['button_icon_margin' => 'spacing']);
		$buttonPositionStyle = $cssHelper->generateStyle('.sppb-form-button', $settings, ['button_position' => 'text-align'], false);

		$css .= $fieldMarginStyle;
		$css .= $fieldStyle;
		$css .= $fieldTextAreaStyle;
		$css .= $fieldHoverStyle;
		$css .= $placeholderStyle;
		$css .= $hoverPlaceholderStyle;
		$css .= $buttonStyle;
		$css .= $buttonPositionStyle;

		return $css;
	}

	public static function verifyAddon($pageContent, $addonId)
	{
		$addonInfo = false;
		$pageContent = json_decode($pageContent);

		foreach ($pageContent as $key => $row) {
			foreach ($row->columns as $key => $column) {
				foreach ($column->addons as $key => $addon) {

					// if direct addon
					if (($addon->id == $addonId) && ($addon->name == 'ajax_contact')) {
						return true;
						break;
					}

					// if has inner array
					if (isset($addon->columns) && count($addon->columns) && $addon->columns) {
						foreach ($addon->columns as $key => $inner_column) {
							foreach ($inner_column->addons as $key => $inner_addon) {
								if (($inner_addon->id == $addonId) && ($inner_addon->name == 'ajax_contact')) {
									return true;
									break;
								}
							}
						}
					} // END:: has inner columns

					// if repeatable addon (tab, accordion)
					$inner_items = 'sp_' . $addon->name . '_item';
					if (isset($addon->settings->$inner_items) && count($addon->settings->$inner_items) && $addon->settings->$inner_items) {
						foreach ($addon->settings->$inner_items as $inner_item) {
							if (isset($inner_item->content) && is_array($inner_item->content) && !empty($inner_item->content)) {
								foreach ($inner_item->content as $inner_addon) {
									if (($inner_addon->id == $addonId) && ($inner_addon->name == 'ajax_contact')) {
										return true;
										break;
									}
								}
							}
						}
					} // END:: repeatable addon (tab, accordion)

				}
			}
		}
		return false;
	}

	public static function getTemplate()
	{
		$lodash = new Lodash('#sppb-addon-{{ data.id }}');
		$output = '
		<#
		var classList = "";

		if (!_.isEmpty(data.button_type) && data.button_type !== undefined) {
			classList += " sppb-btn-"+data.button_type;
		} else {
			classList += " sppb-btn-success";
		}
		
		if (data.button_size !== undefined) {
			classList += " sppb-btn-"+data.button_size;
		}
		if (!_.isEmpty(data.button_shape) && data.button_shape !== undefined) {
			classList += " sppb-btn-"+data.button_shape;
		} else {
			classList += " sppb-btn-rounded";
		}
		if(!_.isEmpty(data.button_appearance)) {
			classList += " sppb-btn-"+data.button_appearance;
		}
		if (data.button_block !== undefined) {
			classList += " " + data.button_block;
		}
		var modern_font_style = false;
		var button_fontstyle = data.button_fontstyle || "";
		var button_font_style = data.button_font_style || "";

        var button_padding = "";
        var button_padding_sm = "";
        var button_padding_xs = "";

        if(data.button_padding){
            if(_.isObject(data.button_padding)){
                if(data.button_padding.md.trim() !== ""){
                    button_padding = data.button_padding.md.split(" ").map(item => {
                        if(_.isEmpty(item)){
                            return "0";
                        }
                        return item;
                    }).join(" ")
                }

                if(data.button_padding.sm.trim() !== ""){
                    button_padding_sm = data.button_padding.sm.split(" ").map(item => {
                        if(_.isEmpty(item)){
                            return "0";
                        }
                        return item;
                    }).join(" ")
                }

                if(data.button_padding.xs.trim() !== ""){
                    button_padding_xs = data.button_padding.xs.split(" ").map(item => {
                        if(_.isEmpty(item)){
                            return "0";
                        }
                        return item;
                    }).join(" ")
                }
            } else {
                if(data.button_padding.trim() !== ""){
                    button_padding = data.button_padding.split(" ").map(item => {
                        if(_.isEmpty(item)){
                                return "0";
                        }
                        return item;
                    }).join(" ")
                }
            }
        }
		#>
		<style type="text/css">';
		$output .= '
			#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-{{ data.button_type }} {
				letter-spacing: {{ data.button_letterspace }};
				<# if(_.isObject(button_font_style) && button_font_style.underline) { #>
					text-decoration: underline;
					<# modern_font_style = true #>
				<# } #>

				<# if(_.isObject(button_font_style) && button_font_style.italic) { #>
					font-style: italic;
					<# modern_font_style = true #>
				<# } #>

				<# if(_.isObject(button_font_style) && button_font_style.uppercase) { #>
					text-transform: uppercase;
					<# modern_font_style = true #>
				<# } #>

				<# if(_.isObject(button_font_style) && button_font_style.weight) { #>
					font-weight: {{ button_font_style.weight }};
					<# modern_font_style = true #>
				<# } #>

				<# if(!modern_font_style) { #>
					<# if(_.isArray(button_fontstyle)) { #>
						<# if(button_fontstyle.indexOf("underline") !== -1){ #>
							text-decoration: underline;
						<# } #>
						<# if(button_fontstyle.indexOf("uppercase") !== -1){ #>
							text-transform: uppercase;
						<# } #>
						<# if(button_fontstyle.indexOf("italic") !== -1){ #>
							font-style: italic;
						<# } #>
						<# if(button_fontstyle.indexOf("lighter") !== -1){ #>
							font-weight: lighter;
						<# } else if(button_fontstyle.indexOf("normal") !== -1){#>
							font-weight: normal;
						<# } else if(button_fontstyle.indexOf("bold") !== -1){#>
							font-weight: bold;
						<# } else if(button_fontstyle.indexOf("bolder") !== -1){#>
							font-weight: bolder;
						<# } #>
					<# } #>
				<# } #>
			}

			';

		// Link
		$output .= ' <# if (data.button_type == "link") { #>';
		$output .= $lodash->unit('border-bottom-width', '#btn-{{ data.id }}.sppb-btn-link', 'data.link_button_border_width', 'px', false);
		$output .= $lodash->unit('padding-bottom', '#btn-{{ data.id }}.sppb-btn-link', 'data.link_button_padding_bottom', 'px', false);
		$output .= '<# } #>';

		// Custom
		$output .= '<# if (data.button_type == "custom") { #>';
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color');

		// Outline
		$output .= '<# if(data.button_appearance == "outline") { #>';
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color_hover');

		// 3D
		$output .= '<# } else if (data.button_appearance == "3d") { #>';
		$output .= $lodash->border('border-bottom-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color_hover');
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_color');

		// Gradient
		$output .= '<# } else if (data.button_appearance == "gradient") { #>';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom', 'data.button_background_gradient');
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-custom { border: none; }';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_gradient_hover');

		// Hover
		$output .= ' <# } else { #>';
		$output .= $lodash->color('background-color', '#btn-{{ data.id }}.sppb-btn-custom:hover', 'data.button_background_color');
		$output .= '<# } #>';

		$output .= '<# } #>';

		// Textarea
		$output .= $lodash->color('color', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.field_color');
		$output .= $lodash->unit('background', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.field_bg_color', '', false);
		$output .= $lodash->unit('font-size', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.field_font_size', 'px', false);
		$output .= $lodash->unit('border-radius', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.field_border_radius', 'px', false);
		$output .= $lodash->border('border-color', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.field_border_color');
		$output .= $lodash->border('border-width', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.field_border_width');
		$output .= $lodash->spacing('padding', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.field_padding');
		$output .= '#sppb-addon-{{ data.id }} .sppb-ajaxt-contact-form div.sppb-form-group textarea { transition:.35s; }';

		$output .= $lodash->color('color', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.field_color');
		$output .= $lodash->unit('background', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.field_bg_color', '', false);
		$output .= $lodash->unit('font-size', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.field_font_size', 'px', false);
		$output .= $lodash->unit('border-radius', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.field_border_radius', 'px', false);
		$output .= $lodash->border('border-color', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.field_border_color');
		$output .= $lodash->border('border-width', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.field_border_width');
		$output .= $lodash->spacing('padding', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.field_padding');
		$output .= '#sppb-addon-{{ data.id }} .sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input) { transition:.35s; }';

		$output .= $lodash->unit('height', '.sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input)', 'data.input_height', 'px');
		$output .= $lodash->unit('height', '.sppb-ajaxt-contact-form div.sppb-form-group textarea', 'data.textarea_height', 'px');

		$output .= $lodash->unit('margin', '.sppb-ajaxt-contact-form div.sppb-form-group', 'data.field_margin', '');

		$output .= $lodash->color('color', '.sppb-ajaxt-contact-form .sppb-form-group input::placeholder, .sppb-ajaxt-contact-form .sppb-form-group textarea::placeholder', 'data.field_placeholder_color');
		$output .= '#sppb-addon-{{ data.id }} .sppb-ajaxt-contact-form .sppb-form-group input::placeholder, #sppb-addon-{{ data.id }} .sppb-ajaxt-contact-form .sppb-form-group textarea::placeholder { opacity: 1; }';

		$output .= $lodash->color('color', '.sppb-ajaxt-contact-form .sppb-form-group input:hover::placeholder, .sppb-ajaxt-contact-form .sppb-form-group textarea:hover::placeholder', 'data.field_hover_placeholder_color');
		$output .= '#sppb-addon-{{ data.id }} .sppb-ajaxt-contact-form .sppb-form-group input:hover::placeholder, #sppb-addon-{{ data.id }} .sppb-ajaxt-contact-form .sppb-form-group textarea:hover::placeholder { opacity: 1; }';

		$output .= $lodash->unit('background', '.sppb-ajaxt-contact-form .sppb-form-group input:hover, .sppb-ajaxt-contact-form .sppb-form-group input:active, .sppb-ajaxt-contact-form .sppb-form-group input:focus, .sppb-ajaxt-contact-form .sppb-form-group textarea:hover, .sppb-ajaxt-contact-form .sppb-form-group textarea:active,.sppb-ajaxt-contact-form .sppb-form-group textarea:focus', 'data.field_hover_bg_color', '', false);
		$output .= $lodash->color('color', '.sppb-ajaxt-contact-form .sppb-form-group input:hover, .sppb-ajaxt-contact-form .sppb-form-group input:active, .sppb-ajaxt-contact-form .sppb-form-group input:focus, .sppb-ajaxt-contact-form .sppb-form-group textarea:hover, .sppb-ajaxt-contact-form .sppb-form-group textarea:active,.sppb-ajaxt-contact-form .sppb-form-group textarea:focus', 'data.field_hover_color');
		$output .= $lodash->border('border-color', '.sppb-ajaxt-contact-form .sppb-form-group input:hover, .sppb-ajaxt-contact-form .sppb-form-group input:active, .sppb-ajaxt-contact-form .sppb-form-group input:focus, .sppb-ajaxt-contact-form .sppb-form-group textarea:hover, .sppb-ajaxt-contact-form .sppb-form-group textarea:active,.sppb-ajaxt-contact-form .sppb-form-group textarea:focus', 'data.field_focus_border_color');

		// Title
		$titleTypographyFallbacks = [
			'font'           => 'data.title_font_family',
			'size'           => 'data.title_fontsize',
			'line_height'    => 'data.title_lineheight',
			'letter_spacing' => 'data.title_letterspace',
			'weight'         => 'data.title_font_style?.weight',
			'italic'         => 'data.title_font_style?.italic',
			'underline'      => 'data.title_font_style?.underline',
			'uppercase'      => 'data.title_font_style?.uppercase',
		];

		$output .= $lodash->typography('.sppb-addon-title', 'data.title_typography', $titleTypographyFallbacks);

		// link
		$output .= '<# if (data.button_type == "link") { #>';
		$output .= $lodash->color('color', '#btn-{{ data.id }}.sppb-btn-link', 'data.link_button_color');
		$output .= $lodash->border('border-color', '#btn-{{ data.id }}.sppb-btn-link', 'data.link_border_color');
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-link { text-decoration: none; }';
		$output .= '#sppb-addon-{{ data.id }} #btn-{{ data.id }}.sppb-btn-link { border-radius: 0; }';

		// Hover
		$output .= '<# if (data.link_button_status == "hover" && "#btn-{{ data.id }} .sppb-btn-link:focus") { #>';
		$output .= $lodash->color('color', '#btn-{{ data.id }} .sppb-btn-link:hover', 'data.link_button_hover_color');
		$output .= $lodash->border('border-color', '#btn-{{ data.id }} .sppb-btn-link:hover', 'data.link_button_border_hover_color');
		$output .= '<# } #>';
		$output .= '<# } #>';

		// Custom
		$output .= '<# if(data.button_type == "custom") { #>';
		$output .= $lodash->spacing('padding', '#btn-{{ data.id }} .sppb-btn-custom', 'data.button_padding');
		$output .= $lodash->unit('font-size', '#btn-{{ data.id }} .sppb-btn-custom', 'data.fontsize');
		$output .= $lodash->color('color', '#btn-{{ data.id }} .sppb-btn-custom', 'data.button_color');
		$output .= '<# } #>';
		$output .= $lodash->spacing('margin', '.sppb-btn span', 'data.button_icon_margin');
		$output .= $lodash->alignment('text-align', '.sppb-btn-align', 'data.button_position');
		$output .= '
        </style>
		<div class="sppb-addon sppb-addon-ajax-contact {{ data.class }}">
			<# if( !_.isEmpty( data.title ) ){ #><{{ data.heading_selector }} class="sppb-addon-title sp-inline-editable-element" data-id={{data.id}} data-fieldName="title" contenteditable="true">{{ data.title }}</{{ data.heading_selector }}><# } #>
			<div class="sppb-ajax-contact-content">
				<form class="sppb-ajaxt-contact-form">
					<div class="sppb-row">
						<div class="sppb-form-group sppb-col-sm-{{ data.name_input_col || 12 }}">
							<# if(data.show_label){ #>
								<label for="name">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME') . '</label>
							<# } #>
							<input type="text" name="name" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_NAME') . '" required="required">
						</div>

						<div class="sppb-form-group sppb-col-sm-{{ data.email_input_col || 12 }}">
							<# if(data.show_label){ #>
								<label for="email">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL') . '</label>
							<# } #>
							<input type="email" name="email" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_EMAIL') . '" required="required">
                        </div>
                        
                        <# if(data.hasOwnProperty("show_phone") && Number(data.show_phone) !== 0) { #>
                            <div class="sppb-form-group sppb-col-sm-{{ data.phone_input_col || 12 }}">
                                <# if(data.show_label){ #>
                                    <label for="subject">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_PHONE') . '</label>
                                <# } #>
                                <input type="text" name="phone" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_PHONE') . '" required="required">
                            </div>
                        <# } #>

						<div class="sppb-form-group sppb-col-sm-{{ data.subject_input_col || 12 }}">
							<# if(data.show_label){ #>
								<label for="subject">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SUBJECT') . '</label>
							<# } #>
							<input type="text" name="subject" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SUBJECT') . '" required="required">
                        </div>

						<div class="sppb-form-group sppb-col-sm-{{ data.message_input_col || 12 }}">
							<# if(data.show_label){ #>
								<label for="message">' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_MESSAGE') . '</label>
							<# } #>
							<textarea name="message" rows="5" class="sppb-form-control" placeholder="' . Text::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_MESSAGE') . '" required="required"></textarea>
						</div>

						<# 
								const isCaptchaEnabled = [true, "true", 1, "1"].includes(data.formcaptcha);
						#>

						<# if(isCaptchaEnabled && data.captcha_type == "default") { #>
							<div class="sppb-form-group sppb-col-sm-{{ data.captcha_input_col || 12 }}">
								<# if(data.show_label){ #>
									<label for="captcha_question">{{ data.captcha_question }}</label>
								<# } #>
								<input type="text" name="captcha_question" class="sppb-form-control" placeholder="{{ data.captcha_question }}" required="required">
							</div>
						<# } #>
					</div>
                    <# if(isCaptchaEnabled && data.captcha_type == "gcaptcha"){ #>
                        <div class="sppb-row">
                            <div class="sppb-form-group sppb-col-sm-12">
                                <img src="components/com_sppagebuilder/assets/images/captcha.png" >
                            </div>
                        </div>
					<# } #>
                    <# if(isCaptchaEnabled && data.captcha_type == "igcaptcha"){ #>
                        <div class="sppb-row">
                            <div class="sppb-form-group sppb-col-sm-12">
                                <img src="components/com_sppagebuilder/assets/images/captcha-2.png" >
                            </div>
                        </div>
					<# } #>
                    <# if(data.show_checkbox){ #>
                        <div class="sppb-row">
                            <div class="sppb-form-group sppb-col-sm-12">
                                <div class="sppb-form-check">
                                    <input class="sppb-form-check-input" type="checkbox" id="agreement" required="required">
                                    <label class="sppb-form-check-label" for="agreement">{{{ data.checkbox_title }}}</label>
                                </div>
                            </div>
                        </div>
                    <# }
                        let iconLeft = "";
                        let iconRight = "";

                        let icon_arr = (typeof data.button_icon !== "undefined" && data.button_icon) ? data.button_icon.split(" ") : "";
                        let icon_name = icon_arr.length === 1 ? "fa "+data.button_icon : data.button_icon;
                                    
                        if(data.button_icon_position == "left" && !_.isEmpty(data.button_icon)){
                            iconLeft = \'<span class="\' + icon_name + \'"></span>\';
                        } else {
                            iconRight = \'<span class="\' + icon_name + \'"></span>\';
                        }
                    #>
					<# let button_text = !_.isEmpty(data.button_text) ? data.button_text : "'.  Text::_("COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SEND").'";#>
                    <div class="sppb-row">
                        <div class="sppb-col-sm-12 sppb-btn-align">
                            <button type="button" id="btn-{{ data.id }}" class="sppb-btn {{classList}}">{{{iconLeft}}} {{ button_text }} {{{iconRight}}}</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>';

		return $output;
	}
}