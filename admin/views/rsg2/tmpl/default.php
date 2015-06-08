<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

JHtml::_('behavior.tooltip');

global $Rsg2DebugActive;

/**
  * Used by showCP to generate buttons
  * @param string $link URL for button link
  * @param string $image Image name for button image
  * @param string $text Text to show in button
  */
function RsgButton( $link, $image, $text ) {
	?>
	<div class="debug_icon_container>
        <div class="rsgicon">
            <a href="<?php echo $link; ?>">
                <div class="iconimage">
                    <?php echo JHtml::image('administrator/components/COM_RSG2/images/'.$image, $text); ?>
                </div>
                <?php echo $text; ?>
            </a>
        </div>
	</div>
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
	?>
	<div class="debug_icon_container">
		<div class="debugicon">
			<a href="<?php echo $link; ?>" class="<?php echo $Id; ?>">
				<div class="iconimage">
					<?php echo JHtml::image('administrator/components/com_rsg2/images/'.$image, $text); ?>
				</div>
				<?php echo $text; ?>
			</a>
		</div>
	</div>
	<?php
}

// public static $extension = 'com_rsgallery2';

/**
 * Gets a list of the actions that can be performed.
 *
 * @param	int	$galleryId	The gallery ID.
 * @return	JObject
 */
function getActions($galleryId = 0) {
	$user	= JFactory::getUser();
	$result	= new JObject;

	if (empty($galleryId)) {
		$assetName = 'com_rsgallery2';
	} else {
		$assetName = 'com_rsgallery2.gallery.'.(int) $galleryId;
	}

	$actions = array(
		'core.admin', 'core.manage', 'core.create', 'core.delete', 'core.edit', 'core.edit.state', 'core.edit.own'
	);

	foreach ($actions as $action) {
		$result->set($action, $user->authorise($action, $assetName));
	}

	return $result;
}


$canDo = getActions ();

$doc = JFactory::getDocument();
//$doc->addStyleSheet ("administrator/components/com_rsgallery2/admin.rsgallery2.css");
$doc->addStyleSheet (JURI::root(true)."/administrator/components/com_rsgallery2/admin.rsgallery2.css");

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
	
		<div class="clearfix"> </div>
		<div class="span8">
            <div class="panel_area">
                <!--h4>Bootstrap in Joomla! 3.x</h4-->
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
                    if( ($Rsg2DebugActive) AND ( $canDo->get('core.admin') ) ){ ?>
                        <div id='rsg2-cpanelDebug'>
                            <div id='DangerZone'>
                                <h3>
                                    <?php echo JText::_('COM_RSG2_DANGER_ZONE');?>
                                </h3>
                            </div>
                            <br/>
                            <div id='rsg2-DebugHeader'>
                                <strong>
                                    <?php echo JText::_('COM_RSG2_C_DEBUG_ON');?>
                                </strong>
                            </div>
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
                    <?php } ?>
                </div>
            </div>
		</div>
	</div>
    <div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>	
</form>

