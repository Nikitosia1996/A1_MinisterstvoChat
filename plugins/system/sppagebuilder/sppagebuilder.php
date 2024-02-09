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
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Version;

JLoader::register('SppagebuilderHelper', JPATH_ADMINISTRATOR . '/components/com_sppagebuilder/helpers/sppagebuilder.php');
// JLoader::register('SppagebuilderHelperIntegrations', JPATH_ADMINISTRATOR . '/components/com_sppagebuilder/helpers/integrations.php');

require_once JPATH_ROOT . '/components/com_sppagebuilder/helpers/integration-helper.php';
require_once JPATH_ROOT . '/components/com_sppagebuilder/helpers/autoload.php';
require_once JPATH_ROOT . '/components/com_sppagebuilder/helpers/route.php';
require_once JPATH_ROOT . '/components/com_sppagebuilder/helpers/constants.php';

BuilderAutoload::loadClasses();
BuilderAutoload::loadHelperClasses();

class  plgSystemSppagebuilder extends CMSPlugin
{

	protected $autoloadLanguage = true;

	function onBeforeRender()
	{
		$app = Factory::getApplication();

		if ($app->isClient('administrator'))
		{
			$integration = self::getIntegration();

			if (!$integration)
			{
				return;
			}

			$input = $app->input;
			$option = $input->get('option', '', 'STRING');
			$view = $input->get('view', '', 'STRING');
			$id = $input->get($integration['id_alias'], 0, 'INT');
			$layout = $input->get('layout', '', 'STRING');

			if (!($option == 'com_' . $integration['group'] && $view == $integration['view']))
			{
				return;
			}

			SppagebuilderHelper::loadAssets('css');
			$doc = Factory::getDocument();
			$doc->addScript(Uri::root(true) . '/plugins/system/sppagebuilder/assets/js/init.js?' . SppagebuilderHelper::getVersion(true));

			$pagebuilder_enabled = 0;

			if ($page_content = self::getPageContent($option, $view, $id))
			{
				$page_content = ApplicationHelper::preparePageData($page_content);
				$pagebuilder_enabled = (int) $page_content->active;
			}

			$integration_element = '.adminform';

			if ($option == 'com_content')
			{
				$integration_element = '.adminform';
			}
			else if ($option == 'com_k2')
			{
				$integration_element = '.k2ItemFormEditor';
			}

			$doc->addScriptdeclaration('var spIntergationElement="' . $integration_element . '";');
			$doc->addScriptdeclaration('var spPagebuilderEnabled=' . $pagebuilder_enabled . ';');
		}
		else
		{
			$input  = $app->input;
			$option = $input->get('option', '', 'STRING');
			$view   = $input->get('view', '', 'STRING');
			$task   = $input->get('task', '', 'STRING');
			$id     = $input->get('id', 0, 'INT');
			$pageName = '';

			if ($option == 'com_content' && $view == 'article')
			{
				$pageName = "{$view}-{$id}.css";
			}
			elseif ($option == 'com_j2store' && $view == 'products' && $task == 'view')
			{
				$pageName = "article-{$id}.css";
			}
			elseif ($option == 'com_k2' && $view == 'item')
			{
				$pageName = "item-{$id}.css";
			}
			elseif ($option == 'com_sppagebuilder' && $view == 'page')
			{
				$pageName = "{$view}-{$id}.css";
			}

			$file_path  = JPATH_ROOT . '/media/sppagebuilder/css/' . $pageName;
			$file_url   = Uri::base(true) . '/media/sppagebuilder/css/' . $pageName;

			if (file_exists($file_path))
			{
				$doc = Factory::getDocument();
				$doc->addStyleSheet($file_url);
			}
		}
	}


	function onAfterRender()
	{
		$app = Factory::getApplication();

		if ($app->isClient('administrator'))
		{
			$integration = self::getIntegration();

			if (!$integration)
			{
				return;
			}

			$input = $app->input;
			$option = $input->get('option', '', 'STRING');
			$view = $input->get('view', '', 'STRING');
			$layout = $input->get('layout', '', 'STRING');
			$id = $input->get($integration['id_alias'], 0, 'INT');

			if (!($option === 'com_' . $integration['group'] && $view === $integration['view']))
			{
				return;
			}

			if (isset($integration['frontend_only']) && $integration['frontend_only'])
			{
				return;
			}

			// Page Builder state
			$pagebuilder_enabled = 0;
			$viewId = 0;
			$language = "*";

			if ($page_content = self::getPageContent($option, $view, $id))
			{
				$page_content = ApplicationHelper::preparePageData($page_content);
				$viewId = $page_content->id;
				$pagebuilder_enabled = $page_content->active;
				$language = $page_content->language;
			}

			// Add script
			$body = $app->getBody();

			$frontendEditorLink = 'index.php?option=com_sppagebuilder&view=form&tmpl=component&layout=edit&extension=com_content&extension_view=article&id=' . $viewId;
			$backendEditorLink = 'index.php?option=com_sppagebuilder&view=editor&extension=com_content&extension_view=article&article_id=' . $id . '&tmpl=component#/editor/' . $viewId;

			if ($language && $language !== '*' && Multilanguage::isEnabled())
			{

				$frontendEditorLink .= '&lang=' . $language;
				$backendEditorLink .= '&lang=' . $language;
			}

			$frontendEditorLink = str_replace('/administrator', '', SppagebuilderHelperRoute::buildRoute($frontendEditorLink));

			if (!$viewId || !$pagebuilder_enabled)
			{
				$dashboardHTML = '<div class="sp-pagebuilder-alert sp-pagebuilder-alert-info">' . Text::_('Save the article first for getting the editor!') . '</div>';
			}
			else
			{
				$dashboardHTML = '<a href="' . $backendEditorLink . '" class="sp-pagebuilder-button-outline">Edit with Backend Editor</a><a href="' . $frontendEditorLink . '" class="sp-pagebuilder-button">Edit with Frontend Editor</a>';
			}

			if ($option === 'com_k2')
			{
				$body = str_replace('<div class="k2ItemFormEditor">', '<div class="builder-integrations"><div class="builder-integration-toggler"><span class="builder-integration-button builder-integration-button-joomla" action-switch-builder data-action="editor" role="button">Joomla Editor</span><span class="builder-integration-button builder-integration-button-editor" action-switch-builder data-action="sppagebuilder" role="button">Edit with SP Page Builder</span></div></div><div class="builder-integration-component pagebuilder-' . str_replace('_', '-', $option) . '" style="display: none;"></div><div class="k2ItemFormEditor">', $body);
			}
			else
			{
				$body = str_replace('<fieldset class="adminform">', '<div class="builder-integrations"><div class="builder-integration-toggler"><span class="builder-integration-button builder-integration-button-joomla" action-switch-builder data-action="editor" role="button">Joomla Editor</span><span class="builder-integration-button builder-integration-button-editor" action-switch-builder data-action="sppagebuilder" role="button"><span class="builder-svg-icon"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 24"><path d="M17.718 13.306c.658-.668 1.814-.642 2.476 0 .677.66.655 1.747 0 2.414a43.761 43.761 0 0 1-2.11 2.04C13.586 21.77 7.932 24.178 1.77 23.977.82 23.95.019 23.223.019 22.271c0-.901.804-1.736 1.75-1.707 1.943.062 3.406-.062 5.206-.507a20.241 20.241 0 0 0 2.072-.635c.171-.062.341-.128.51-.197l.224-.098c.292-.131.584-.267.872-.408a22.872 22.872 0 0 0 3.225-1.96c.075-.054.146-.109.221-.16l-.086.066c.105-.08.21-.16.314-.244a32.013 32.013 0 0 0 1.703-1.463c.58-.533 1.137-1.09 1.688-1.652Zm-9.886-.843c.562-.292 1.1-.628 1.609-1.002a.32.32 0 0 0 .128-.258.312.312 0 0 0-.136-.253L5.411 8.123a.331.331 0 0 0-.47.092.312.312 0 0 0-.047.167l.015 4.716a.311.311 0 0 0 .127.25.33.33 0 0 0 .281.056 11.07 11.07 0 0 0 2.515-.941ZM15.356 9.699 4.213 1.39 2.806.343.27.843c-.527.879-.134 1.772.622 2.334 3.712 2.767 7.427 5.54 11.143 8.308.52.387 1.04.773 1.557 1.16.751.561 1.96.113 2.394-.612.528-.88.127-1.773-.629-2.334Z" fill="currentColor"/><path d="M7.098 17.74c1.093-.243 2.17-.7 3.17-1.177 2.08-.988 4.007-2.41 5.444-4.184.299-.368.513-.714.513-1.207 0-.42-.192-.92-.513-1.207-.632-.565-1.871-.748-2.477 0-.55.683-1.17 1.31-1.852 1.87-.116.096-.236.191-.352.286.273-.194-.288.23 0 0-.8.564-1.635 1.072-2.526 1.495-.19.091-.381.175-.572.259-.124.054-.412.138.13-.051-.093.033-.183.073-.272.11-.277.105-.558.207-.843.298-.253.08-.512.16-.774.219-.894.197-1.504 1.251-1.224 2.101.3.908 1.19 1.4 2.148 1.189ZM2.86.38A1.753 1.753 0 0 0 1.774 0C.824 0 .023.78.023 1.707V22.22c0 .923.804 1.707 1.75 1.707.952 0 1.752-.78 1.752-1.707V.875L2.859.38Z" fill="currentColor"/></svg></span> SP Page Builder</span></div></div><div class="builder-integration-component pagebuilder-' . str_replace('_', '-', $option) . '" style="display: none;">' . $dashboardHTML . '</div><fieldset class="adminform">', $body);
			}

			// Page Builder fields
			$body = str_replace('</form>', '<input type="hidden" id="jform_attribs_sppagebuilder_content" name="jform[attribs][sppagebuilder_content]"></form>' . "\n", $body);
			$body = str_replace('</form>', '<input type="hidden" id="jform_attribs_sppagebuilder_article_id" name="jform[attribs][sppagebuilder_article_id]" value="' . $id . '"></form>' . "\n", $body);
			$body = str_replace('</form>', '<input type="hidden" id="jform_attribs_sppagebuilder_active" name="jform[attribs][sppagebuilder_active]" value="' . $pagebuilder_enabled . '"></form>' . "\n", $body);

			$app->setBody($body);
		}
	}

	/**
	 * Remove the Joomla! default template styles for the editor view.
	 *
	 * @return 	void
	 * @since 	4.1.0
	 */
	public function onBeforeCompileHead()
	{
		$app = Factory::getApplication();
		$input = $app->input;
		$option = $input->get('option');
		$view = $input->get('view', 'editor');

		$version = new Version();
		$JoomlaVersion = (float) $version->getShortVersion();


		if ($app->isClient('administrator') && $option === 'com_sppagebuilder' && $view === 'editor')
		{
			if ($JoomlaVersion < 4)
			{
				$headData = Factory::getDocument()->getHeadData();
				$stylesheets = $headData['styleSheets'];

				foreach ($stylesheets as $url => $value)
				{
					if (stripos($url, 'template.css') !== false)
					{
						unset($stylesheets[$url]);
					}
				}

				$headData['styleSheets'] = $stylesheets;

				Factory::getDocument()->setHeadData($headData);
			}
			else
			{
				$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
				$wa->disablePreset('template.atum.ltr');
				$wa->disablePreset('template.atum.rtl');
				$wa->disableStyle('template.atum.ltr');
				$wa->disableStyle('template.atum.rtl');
				$wa->disableStyle('template.active.language');
				$wa->disableStyle('template.user');
			}
		}
	}

	/**
	 * Enforce the application to use tmpl=component if there is not.
	 *
	 * @return	void
	 * @since 	4.1.0
	 */
	public function onAfterDispatch()
	{
		$app = Factory::getApplication();
		$input = $app->input;

		$option = $input->get('option');
		$view = $input->get('view', 'editor');
		$tmpl = $input->get('tmpl');

		if ($app->isClient('administrator') && $option === 'com_sppagebuilder' && $view === 'editor')
		{
			if ($tmpl !== 'component')
			{
				$input->set('tmpl', 'component');
			}
		}
	}

	private static function loadPageBuilderLanguage()
	{
		$lang = Factory::getLanguage();
		$lang->load('com_sppagebuilder', JPATH_ADMINISTRATOR, $lang->getName(), true);
		$lang->load('tpl_' . self::getTemplate(), JPATH_SITE, $lang->getName(), true);
		require_once JPATH_ROOT . '/administrator/components/com_sppagebuilder/helpers/language.php';
	}

	private static function getPageContent($extension = 'com_content', $extension_view = 'article', $view_id = 0)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('id', 'text', 'content', 'active', 'language', 'version')));
		$query->from($db->quoteName('#__sppagebuilder'));
		$query->where($db->quoteName('extension') . ' = ' . $db->quote($extension));
		$query->where($db->quoteName('extension_view') . ' = ' . $db->quote($extension_view));
		$query->where($db->quoteName('view_id') . ' = ' . $view_id);
		$db->setQuery($query);
		$result = $db->loadObject();

		if ($result)
		{
			return $result;
		}

		return false;
	}

	private static function getIntegration()
	{
		$app = Factory::getApplication();
		$option = $app->input->get('option', '', 'STRING');
		$group = str_replace('com_', '', $option);
		$integrations = BuilderIntegrationHelper::getIntegrations();

		if (!isset($integrations[$group]))
		{
			return false;
		}

		$integration = $integrations[$group];
		$name = $integration['name'];
		$enabled = PluginHelper::isEnabled($group, $name);

		if ($enabled)
		{
			return $integration;
		}

		return false;
	}

	private static function getTemplate()
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('template')));
		$query->from($db->quoteName('#__template_styles'));
		$query->where($db->quoteName('client_id') . ' = ' . $db->quote(0));
		$query->where($db->quoteName('home') . ' = ' . $db->quote(1));
		$db->setQuery($query);
		return $db->loadResult();
	}

	public function onExtensionAfterSave($option, $data)
	{
		if (($option === 'com_config.component') && ($data->element === 'com_sppagebuilder'))
		{
			$admin_cache = JPATH_ROOT . '/administrator/cache/sppagebuilder';

			if (\file_exists($admin_cache))
			{
				Folder::delete($admin_cache);
			}

			$site_cache = JPATH_ROOT . '/cache/sppagebuilder';

			if (\file_exists($site_cache))
			{
				Folder::delete($site_cache);
			}
		}
	}
}
