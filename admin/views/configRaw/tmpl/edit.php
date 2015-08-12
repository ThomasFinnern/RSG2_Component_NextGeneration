<?php // no direct access
defined( '_JEXEC' ) or die; ?>

//JHtml::_('behavior.tooltip');
//JHtml::_('behavior.formvalidation');
//JHtml::_('behavior.keepalive');

JHtml::_('behavior.formvalidator');
JHtml::_('behavior.tooltip');


?>

<form action="<?php echo JRoute::_('index.php?option=com_rsg2&view=configRaw&layout=edit'); ?>"
          method="post" name="adminForm" id="adminForm"  class="form-validate">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
	
		<div class="clearfix"> </div>

		<h3>
			<?php echo JText::_('COM_RSG2_CONFIGURATION_VARIABLES');?>
		</h3>

		<div class="subheader">
			<strong>
				<?php echo JText::_('COM_RSG2_CONFIG_MINUS_RAW_EDIT_TXT');?>
			</strong>
		</div>
		<br>


		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid form-horizontal-desktop">
					<div class="adminformlist">
					<?php
                        $elements = array();
//                        $Idx = 0;
						foreach($this->items as $item) {
//							echo $item->name . "= '" . $item->value . "'". "<br>";

                            //joomla 3 dynamic fieldsets
                            //http://joomla.stackexchange.com/questions/5027/jformsetfield-s-add-field-to-fieldset

                            //$newfields = array(1, 2, 3, 4, 5)
                            $XmlText =
                                '<field name="' . $item->name . '" '
                                . 'type="text" '
                                . 'label="lbl_' . $item->name . '" '
                                . 'description="info: ' . $item->name . '" '
                                . 'class="inputbox " '
                                . 'size="30" '
                                . 'required="true" />';

//                            echo $item->name . ': '.  htmlspecialchars($XmlText) . '<BR>';

//                            $Idx += 1;
//                            if ($Idx > 5)
//                                break;

                            $NextItem =new SimpleXMLElement($XmlText);
                            $elements[] = $NextItem;
                        }

                        // ??? http://stackoverflow.com/questions/25835826/joomla-input-form-field-output
                        // joomla 3 dynamic fieldset renderField

                        $form->setFields($elements, 'newGroup');

/*
                        foreach ($this->form->getGroup('newGroup') as $field) {
                            echo $field->renderField($options);
                        }
*/
					?>
					</div>
				</div>
			</div>
		</div>


	</div>
    <div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>	
</form>
