<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

JHtml::_('behavior.tooltip');

global $Rsg2DebugActive;

/**
  * Used by showCP to generate buttons
  * @param string $link URL for button link
  * @param string $image Image name for button image
  * @param string $text Text to show in button
  * @param string $addClass additional class id
  */
function RsgButton( $link, $image, $text, $addClass='' ) {
	?>
	<div class="span2 ">
		<div class="rsg2_icon_container">
			<div class="rsg2icon<?php echo ' '.$addClass; ?>">
				<a href="<?php echo $link; ?>">
					<div class="iconimage">
						<?php echo JHtml::image('administrator/components/COM_RSG2/images/'.$image, $text); ?>
					</div>
					<?php echo $text; ?>
				</a>
			</div>
		</div>
	</div>
	<!--div class="span1">
	</div-->
	<?php
}

/**
  * Used by showCP to generate buttons
 * @param $Id
 * @param string $link URL for button link
 * @param string $image Image name for button image
 * @param string $text Text to show in button
  */
function RsgDebugButton($Id, $link, $image, $text ) {
	RsgButton( $link, $image, $text, "debugicon");
}	

// public static $extension = 'COM_RSG2';

$canDo = $this->getActions ();

$doc = JFactory::getDocument();
//$doc->addStyleSheet ("administrator/components/COM_RSG2/admin.rsgallery2.css");
//$doc->addStyleSheet (JURI::root(true)."/administrator/components/COM_RSG2/admin.rsgallery2.css");
//$doc->addStyleSheet (JURI::root(true)."/administrator/components/com_rsg2/css/admin.rsg2.01.old.css");
$doc->addStyleSheet (JURI::root(true)."/administrator/components/com_rsg2/css/admin.rsg2.css");


?>

<form action="<?php echo JRoute::_('index.php?option=com_rsg2&view=rsg2'); ?>" method="post" name="adminForm" id="adminForm">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
	
	<div class="row greybackground">
		<div class="span8">
			<div class="row-fluid">
				<?php
					if ( $canDo->get('core.admin') ){
						$link = 'index.php?option=com_rsg2&amp;view=config';
						RsgButton( $link, 'config.png',  JText::_('COM_RSG2_CONFIGURATION') );
					}

					$link = 'index.php?option=com_rsg2&amp;view=galleries';
					RsgButton( $link, 'categories.png', JText::_('COM_RSG2_MANAGE_GALLERIES') );

					$link = 'index.php?option=com_rsg2&amp;view=uploadBatch';
					RsgButton( $link, 'upload_zip.png', JText::_('COM_RSG2_BATCH_UPLOAD') );

					$link = 'index.php?option=com_rsg2&amp;view=uploadSingle';
					RsgButton( $link, 'upload.png', JText::_('COM_RSG2_UPLOAD') );

					$link = 'index.php?option=com_rsg2&amp;view=images';
					RsgButton( $link, 'mediamanager.png', JText::_('COM_RSG2_MANAGE_IMAGES') );

					if ( $canDo->get('core.admin') ){
						/*
						$link = 'index.php?option=COM_RSG2&task=consolidate_db';
						RsgButton( $link, 'dbrestore.png', JText::_('COM_RSG2_CONSOLIDATE_DATABASE') );
						*/
						$link = 'index.php?option=COM_RSG2&rsgOption=maintenance';
						RsgButton( $link, 'maintenance.png', JText::_('COM_RSG2_MAINTENANCE'));

						$link = 'index.php?option=COM_RSG2&rsgOption=installer';
						RsgButton( $link, 'template.png', JText::_('COM_RSG2_TEMPLATE_MANAGER'));
					} 

			// if debug is on, display advanced options
			if( ($Rsg2DebugActive) AND ( $canDo->get('core.admin') ) ){ 
				?>
			</div>
			<div class="row-fluid">
				<div class="rsg2-cpanelDebug">
					<div class="row">
						<div class="DangerZone">
							<h3>
								<?php echo JText::_('COM_RSG2_DANGER_ZONE');?>
							</h3>
						</div>
						<div class='rsg2-DebugHeader'>
							<strong>
								<?php echo JText::_('COM_RSG2_C_DEBUG_ON');?>
							</strong>
						</div>
					</div>
					<div class="row">
						<?php
							$link = 'index.php?option=COM_RSG2&task=purgeEverything';
							RsgDebugButton( 'purgeEverything', $link, 'media_DelItems.png', JText::_('COM_RSG2_PURGEDELETE_EVERYTHING') );

							$link = 'index.php?option=COM_RSG2&task=reallyUninstall';
							RsgDebugButton( 'reallyUninstall', $link, 'db_DelItems.png', JText::_('COM_RSG2_C_REALLY_UNINSTALL') );

							$link = 'index.php?option=COM_RSG2&task=config_rawEdit';
							RsgDebugButton( 'config_rawEdit', $link, 'menu.png', JText::_('COM_RSG2_CONFIG_MINUS_RAW_EDIT') );

							//Moved Migration Options: only show when debug is on since there are only test migration options and four Joomla 1.0.x options.
							/*
							$link = 'index.php?option=COM_RSG2&rsgOption=maintenance&task=showMigration';
							RsgDebugButton( 'showMigration', $link, 'dbrestore.png', JText::_('COM_RSG2_MIGRATION_OPTIONS') );
							*/
							$link = 'index.php?option=COM_RSG2&task=config_dumpVars';
							RsgDebugButton( 'config_dumpVars', $link, 'menu.png', JText::_('COM_RSG2_CONFIG_MINUS_VIEW') );
						?>
					</div>
				</div>
				<?php 
					} 
				?>
			</div>
		</div>
		
		<div class="span4">
			<div class="row">
				<div class="rsg2logo">
					<img src="<?php echo JUri::root(true);?>/administrator/components/com_rsgallery2/images/rsg2-logo.png" align="middle" alt="RSGallery2 logo"/><br>
					<strong><?php echo JText::_('COM_RSG2_INSTALLED_VERSION');?></strong><br>
					<strong><?php echo JText::_('COM_RSG2_LICENSE')?>:</strong><br>
					<a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">GNU GPL</a><br>
				</div>
				<br>
			</div>

			<div class="row">

		<?php
			echo JHtml::_('bootstrap.startAccordion', 'slide-example', array('active' => 'slide1', 'toggle' => 'false' ));
			echo JHtml::_('bootstrap.addSlide', 'slide-example', JText::_('COM_RSG2_GALLERIES'), 'slide1');
		?>

					<strong><?php echo JText::_('COM_RSG2_GALLERY'); ?></strong>
					<strong><?php echo JText::_('COM_RSG2_USER'); ?></strong>
					<strong><?php echo JText::_('COM_RSG2_ID'); ?></strong>

				<?php // echo galleryUtils::latestCats();
					// galleryUtils::latestCats();
					echo "latest cats"						
				?>

				
				
		<?php
			echo JHtml::_('bootstrap.endSlide');
			echo JHtml::_('bootstrap.endAccordion');
			
			echo JHtml::_('bootstrap.startAccordion', 'slide-example2', array('active' => 'slide2'));
			echo JHtml::_('bootstrap.addSlide', 'slide-example2', JText::_('COM_RSG2_IMAGES'), 'slide2');
		?>

		<?php echo JText::_('COM_RSG2_MOST_RECENTLY_ADDED_ITEMS'); ?>
		<strong><?php echo JText::_('COM_RSG2_FILENAME');?></strong>
					<strong><?php echo JText::_('COM_RSG2_GALLERY');?></strong>
					<strong><?php echo JText::_('COM_RSG2_DATE'); ?></strong>
					<strong><?php echo JText::_('COM_RSG2_USER'); ?></strong>
				<?php 
				//galleryUtils::latestImages();
				echo "latest images"						
				?>
		<?php
			echo JHtml::_('bootstrap.endSlide');
			echo JHtml::_('bootstrap.endAccordion');
			
			echo JHtml::_('bootstrap.startAccordion', 'slide-example3', array('active' => 'slide1'));
			echo JHtml::_('bootstrap.addSlide', 'slide-example3', JText::_('COM_RSG2_CREDITS'), 'slide3');
		?>

			<div id='rsg2-credits'>
			------------------
		<?php			
			echo $this->Credits;
		?>
			------------------
			</div>
			
		<?php
			echo JHtml::_('bootstrap.endSlide');
			echo JHtml::_('bootstrap.endAccordion');
		?>
		</div>
				
	</div>
    <div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>	
</form>

