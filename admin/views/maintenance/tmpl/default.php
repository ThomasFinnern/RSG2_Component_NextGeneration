<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

JHtml::_('behavior.tooltip');

global $Rsg2DebugActive;

// public static $extension = 'COM_RSG2';

$doc = JFactory::getDocument();
$doc->addStyleSheet (JURI::root(true)."/administrator/components/com_rsg2/css/Maintenance.css");

 /**
  * Used by showCP to generate buttons
  * @param string $link URL for button link
  * @param string $image Image name for button image
  * @param $title
  * @param string $text Text to show in button
  */
function quickiconBarOrg( $link, $image, $title, $text = "" ) {
    ?>
    <div style="float:left;">
		<div class="rsg2-icon-bar">
			<a href="<?php echo $link; ?>">
				<div class="icon-image">
					<div class="rsg2-icon">
						<?php echo JHtml::image('administrator/components/COM_RSG2/images/'.$image, $text); ?>						
					</div>
					<div class="rsg2-text">
						<span class="maint-title"><?php echo $title;?></span>
						<span class="maint-text"><?php echo $text;?></span>
					</div>
				</div>
			</a>
		</div>
    </div>
    <!--div class='rsg2-clr'>&nbsp;</div-->
<?php
}

function quickiconBar01( $link, $image, $title, $text = "" ) {
    ?>
		<div class="rsg2-icon-bar">
			<a href="<?php echo $link; ?>">
			
					<div class="rsg2-icon">
						<?php echo JHtml::image('administrator/components/COM_RSG2/images/'.$image, $text); ?>						
					</div>
					<span class="rsg2-text">
						<span class="maint-title"><?php echo $title;?></span>
						<span class="maint-text"><?php echo $text;?></span>
					</span>
				
			</a>
		</div>
<?php
}

function quickiconBar( $link, $image, $title, $text = "" ) {
    ?>
		<div class="rsg2-icon-bar">
			<a href="<?php echo $link; ?>">
			
					<div class="rsg2-icon">
						<?php echo JHtml::image('administrator/components/COM_RSG2/images/'.$image, $text); ?>
					</div>
					<span class="rsg2-text">
						<span class="maint-title"><?php echo $title;?></span>
						<span class="maint-text"><?php echo $text;?></span>
					</span>
				
			</a>
		</div>
<?php
}
?>

<form action="<?php echo JRoute::_('index.php?option=com_rsg2&view=maintenance'); ?>"
      method="post" name="adminForm" id="adminForm">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>

        <div class="row-fluid grey-background">
            <div class="container-fluid grey-background">
				<div class="row span6 rsg2-container-icon-set">
					<div class="icons-panel repair">
						<div class="row-fluid">
							<div class="icons-panel-title repairZone">
								<h3>
									<?php echo JText::_('COM_RSG2_REPAIR');?>
								</h3>
							</div>
					
						<?php
							$link = 'index.php?option=com_rsg2&amp;task=consolidateDB';
							quickiconBar( $link, 'blockdevice.png',
								JText::_('COM_RSG2_MAINT_CONSOLDB'), JText::_('COM_RSG2_MAINT_CONSOLDB_TXT') );
						
						?>
						<?php
							$link =  'index.php?option=com_rsg2&amp;task=regenerateThumbs';
							quickiconBar( $link, 'menu.png',
								JText::_('COM_RSG2_MAINT_REGEN'), JText::_('COM_RSG2_MAINT_REGEN_TXT') );
						?>
						<?php
							$link = 'index.php?option=com_rsg2&amp;task=optimizeDB';
							quickiconBar( $link, 'db_optimize.png', JText::_('COM_RSG2_MAINT_OPTDB'),
								JText::_('COM_RSG2_MAINT_OPTDB_TXT') );
						?>
						<?php
							$link = 'index.php?option=com_rsg2&amp;task=config_dumpVars';
							quickiconBar( $link, 'menu.png', JText::_('COM_RSG2_CONFIG_MINUS_VIEW'),
									JText::_('COM_RSG2_CONFIG_MINUS_VIEW_TXT'));
							
						?>
						</div>
					</div>
				</div>
									
			<?php
				if( ($Rsg2DebugActive) AND ( $this->UserIsRoot ) ){
			?>
			
				<div class="row-fluid span6 rsg2_container_icon_set">
					<div class="icons-panel danger">
						<div class="row-fluid">
							<div class="icons-panel-title dangerZone">
								<h3>
									<?php echo JText::_('COM_RSG2_DANGER_ZONE');?>
								</h3>
							</div>
							<div class='icons-panel-info'>
								<strong>
									<?php echo JText::_('COM_RSG2_C_DEBUG_ON');?>
								</strong>
							</div>

						<?php
							$link = 'index.php?option=com_rsgallery2&amp;task=config_rawEdit';
							quickiconBar( $link, 'menu.png', JText::_('COM_RSG2_CONFIG_MINUS_RAW_EDIT'),
									JText::_('COM_RSG2_CONFIG_MINUS_RAW_EDIT_TXT')  );
						?>
						<?php
							$link = 'index.php?option=com_rsgallery2&amp;task=purgeEverything';
							quickiconBar( $link, 'media_DelItems.png', JText::_('COM_RSG2_PURGEDELETE_EVERYTHING') ,
									JText::_('COM_RSG2_PURGEDELETE_EVERYTHING_TXT') );
						?>
						<?php
							$link = 'index.php?option=com_rsgallery2&amp;task=reallyUninstall';
							quickiconBar( $link, 'db_DelItems.png', JText::_('COM_RSG2_C_REALLY_UNINSTALL') ,
									JText::_('COM_RSG2_C_REALLY_UNINSTALL_TXT') );
						?>
						</div>
					</div>
				<?php
					}
				?>
                </div>
            </div>

            <!--div class='rsg2-clr'>&nbsp;</div -->

        </div>

        <div>
			<input type="hidden" name="option" value="com_rsg2" />
			<input type="hidden" name="rsgOption" value="maintenance" />

            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </div>
</form>
