<?php // no direct access
defined( '_JEXEC' ) or die; ?>
<?php echo 'content rsg2: config default ....<br>'; ?>

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

			foreach($this->cfgItems as $cfgItem):

				print_r ($this->cfgItems[cfgItems->name]);
				echo "<br>";

			endforeach;


		</div>
	</div>
    <div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>	
</form>
