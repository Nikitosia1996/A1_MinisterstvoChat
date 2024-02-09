<?php

use Joomla\CMS\Editor\Editor;
use Joomla\CMS\Factory;
use Joomla\CMS\Version;

$version = new Version();
$JoomlaVersion = (float) $version->getShortVersion();

/** @var CMSApplication */
$app = Factory::getApplication();
$input = $JoomlaVersion < 4 ? $app->input : $app->getInput();
$content = $input->get('system_editor_data', '', 'raw');

$config = $JoomlaVersion < 4 ? Factory::getConfig() : $app->getConfig();

$type = $config->get('editor');
$editor = Editor::getInstance($type);
$exclude = ['pagebreak', 'readmore'];

?>

<?php echo $editor->display('content', $content, '100%', '600', '', '30', $exclude); ?>