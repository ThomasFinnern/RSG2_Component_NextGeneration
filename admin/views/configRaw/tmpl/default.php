<?php // no direct access
defined( '_JEXEC' ) or die; ?>
<?php echo 'content rsg2: config raw ....<br>'; ?>

<!-- ?php echo $this->loadTemplate('config'); ? -->
<?php JHtml::_('behavior.tooltip');?>

<form action="<?php echo JRoute::_('index.php?option=com_rsg2&view=rsg2'); ?>" method="post" name="adminForm" id="adminForm">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
	
		<div class="clearfix"> </div>

		<div class="span8">
			
			<span class="description hasTip" title="Test">?</span>
			
			<div class="row-fluid">
				<div class="span6">
					<div class="row-fluid form-horizontal-desktop">
						<div class="adminformlist">
							<!--?php foreach($this->form->getFieldset('general') as $field):-->
							<!--?php foreach($this->form->getFieldset() as $field):
							?-->
								<!--div class="control-group">
										<div class="control-label"-->
											<!--?php echo $field->label; ?-->
									<!--/div-->
									<!--div class="controls"-->
										<!--?php echo $field->input; ?-->
									<!--/div-->
								<!--/div-->
							<!--?php endforeach; ?-->
							
							
							
							
							
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
