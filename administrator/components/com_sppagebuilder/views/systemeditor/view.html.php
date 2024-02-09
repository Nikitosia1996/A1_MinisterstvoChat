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
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

class SppagebuilderViewSystemeditor extends HtmlView
{
	public function display($tpl = null)
	{
		$app = Factory::getApplication();
		$user = Factory::getUser();

		$isAuthorised = $user->authorise('core.admin', 'com_sppagebuilder') || $user->authorise('core.manage', 'com_sppagebuilder') || $user->authorise('core.edit', 'com_sppagebuilder');

		if (!$isAuthorised)
		{
			$app->enqueueMessage(Text::_('COM_SPPAGEBUILDER_ERROR_EDIT_PERMISSION'), 'error');
			return;
		}

		parent::display($tpl);
	}
}
