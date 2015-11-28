<?php
/**
 * @version		$Id: edit.php 60 2010-11-27 18:45:40Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

//JHtml::_('behavior.tooltip');
//JHtml::_('behavior.formvalidation');
//JHtml::_('behavior.keepalive');

JHtml::_('behavior.formvalidator');

?>

<form action="<?php echo JRoute::_('index.php?option=com_rsg2&view=gallery&layout=edit&id='.(int) $this->item->id); ?>" 
	  method="post" name="adminForm" id="adminForm"  class="form-validate">
    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'edit')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'edit',
            empty($this->item->id) ? JText::_('COM_RSGALLERY2_NEW', true) : JText::_('COM_RSGALLERY2_EDIT', true)); ?>
        <div class="row-fluid">
            <div class="span10">
                <div class="row-fluid form-horizontal-desktop">
                    <div class="adminformlist">
                        <?php foreach($this->form->getFieldset('gallery_1st_col') as $field):
						?>
							<div class="control-group">
									<div class="control-label">
										<?php echo $field->label; ?>
								</div>
								<div class="controls">
									<?php echo $field->input; ?>
								</div>
							</div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!--div class="span3">
                <div class="row-fluid form-horizontal-desktop">
                    <div class="adminformlist">
						<h4><?php echo JText::_('COM_RSGALLERY2_ITEM_PREVIEW')?></h4>
                        <?php foreach($this->form->getFieldset('gallery_2nd_col') as $field):
						?>
							<div class="control-group">
									<div class="control-label">
										<?php echo $field->label; ?>
								</div>
								<div class="controls">
									<?php echo $field->input; ?>
								</div>
							</div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <h4><?php echo JText::_('COM_RSGALLERY2_ITEM_PREVIEW')?></h4>
                        ToDo: Item preview<br>

                <h4><?php echo JText::_('COM_RSGALLERY2_PARAMETERS')?></h4>
                        ToDo: paramter not known<br>

                <h4><?php echo JText::_('COM_RSGALLERY2_LINKS_TO_IMAGE')?></h4>
                        ToDo: Links
            </div-->
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'misc', JText::_('COM_RSGALLERY2_PERMISSIONS', true)); ?>
        <div class="row-fluid form-horizontal-desktop">
            <div class="form-vertical">
                <?php echo $this->form->renderField('misc'); ?>
                Test 4
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>


        <?php echo JHtml::_('bootstrap.endTabSet'); ?>
    </div>


    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>

