<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

//no direct access
defined('_JEXEC') or die('restricted access');

HTMLHelper::_('jquery.framework');
HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

?>
<form action="<?php echo Route::_('index.php?option=com_sppagebuilder&view=page&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<?php echo $this->form->renderField('title'); ?>
	<?php echo $this->form->renderFieldset('permissions'); ?>
	<?php echo $this->form->renderField('id'); ?>
	<input type="hidden" name="task" value="item.edit" />
	<?php echo HTMLHelper::_('form.token'); ?>
</form>