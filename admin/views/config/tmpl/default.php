<?php // no direct access
defined( '_JEXEC' ) or die; ?>
<?php echo 'content rsg2: config default ....'; ?>

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
			
			<!-- a href="#" data-toggle="tooltip" title="first tooltip">hover over me</a>
			<span class="description hasTip" title="Test">?</span -->

			<h5>Bootstrap tabs in Joomla! 3.0</h5>
			<br />
			<br />

			<h3>Bootstrap tabs in Joomla! 3.1</h3>
			
			<?php // This renders the beginning of the tabs code. ?>
			<?php echo JHtml::_('bootstrap.startTabSet', 'ID-Tabs-J31-Group', $this->tabsOptionsJ31);?>
			
			
			<?php // Open the first tab ?>
			<?php echo JHtml::_('bootstrap.addTab', 'ID-Tabs-J31-Group', 'tab1_j31_id', JText::_('Konfiguration')); ?>
			<!-- ?php echo $this->loadTemplate('config');?-->
			<?php // This is the closing tag of the first tab ?>
			<?php echo JHtml::_('bootstrap.endTab');?>
			
			
			<?php // The second tab ?>
			<?php echo JHtml::_('bootstrap.addTab', 'ID-Tabs-J31-Group', 'tab2_j31_id', JText::_('Bilder')); ?>
			<!--?php echo $this->loadTemplate('images');?-->
			<?php echo JHtml::_('bootstrap.endTab');?>
			
			<?php // The second tab ?>
			<?php echo JHtml::_('bootstrap.addTab', 'ID-Tabs-J31-Group', 'tab3_j31_id', JText::_('Anzeige')); ?>
			<!--?php echo $this->loadTemplate('view');?-->
			<?php echo JHtml::_('bootstrap.endTab');?>
			
			<?php // The second tab ?>
			<?php echo JHtml::_('bootstrap.addTab', 'ID-Tabs-J31-Group', 'tab4_j31_id', JText::_('Meine Gallerien')); ?>
			<!--?php echo $this->loadTemplate('mygalleries');?-->
			<?php echo JHtml::_('bootstrap.endTab');?>
			
			<?php // The second tab ?>
			<?php echo JHtml::_('bootstrap.addTab', 'ID-Tabs-J31-Group', 'tab5_j31_id', JText::_('Wartung')); ?>
			<!--?php echo $this->loadTemplate('maintenance');?-->
			<?php echo JHtml::_('bootstrap.endTab');?>
			
			<?php // The second tab ?>
			<?php echo JHtml::_('bootstrap.addTab', 'ID-Tabs-J31-Group', 'tab6_j31_id', JText::_('Template')); ?>
			<!--?php echo $this->loadTemplate('template');?-->
			<?php echo JHtml::_('bootstrap.endTab');?>
			
			
			<?php // This renders the end part of the tabs code. ?>
			<?php echo JHtml::_('bootstrap.endTabSet');?>
		</div>
	</div>
    <div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>	
</form>
