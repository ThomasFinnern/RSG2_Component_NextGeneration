<?php // no direct access
defined( '_JEXEC' ) or die; ?>

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

		<h3>
			<?php echo JText::_('COM_RSG2_CONFIGURATION_VARIABLES');?>
		</h3>

		<div class="subheader">
			<strong>
				<?php echo JText::_('COM_RSG2_CONFIG_MINUS_VIEW_TXT');?>
			</strong>
		</div>
		<br>
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid form-horizontal-desktop">
					<div class="adminformlist">
					<?php
						foreach($this->items as $item):
							echo $item->name . "= '" . $item->value . "'". "<br>";
						endforeach;
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
