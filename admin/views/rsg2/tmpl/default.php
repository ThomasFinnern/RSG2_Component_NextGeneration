<?php // no direct access
defined( '_JEXEC' ) or die();

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
	<!--div class="span2 "-->
    <div style="float:left;">
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
	<?php
}

/**
  * Used by showCP to generate buttons.  
  * Uses icomoon font to display the main icon of the button
  * @param string $link URL for button link
  * @param string $imageClass Class name for icomoon image
  * @param string $text Text to show in button
  */
function RsgIconMoonButton( $link, $imageClass, $text, $addClass='') {
	?>
	<!--div class="span2 "-->
    <div style="float:left;">
		<div class="iconMoon">
			<a href="<?php echo $link; ?>">
				<div class="iconMoonImage<?php echo ' '.$addClass; ?>">

					<!--span class="<?php echo $imageClass ?>" style="font-size:40px;"> </span-->
					<span class="<?php echo $imageClass ?>" style="font-size:40px;"></span>
					<!-- i class="icon-search"  style="font-size:24px;></i -->
					
				</div>
				<?php echo $text; ?>
			</a>
		</div>
	</div>
    <?php
}

/**
 * Used by showCP to generate buttons
 * @param string $link URL for button link
 * @param string $image Image name for button image
 * @param string $text Text to show in button
 */
function RsgDebugButton($link, $image, $text ) {
    RsgButton( $link, $image, $text, "debugicon");
}

/**
 * Used by showCP to generate buttons
 * @param string $link URL for button link
 * @param string $image Image name for button image
 * @param string $text Text to show in button
 */
function RsgIconMoonDebugButton($link, $image, $text ) {
    RsgIconMoonButton( $link, $image, $text, "debugicon");
}

function DisplayInfoGalleries ($infoGalleries) {

    // exit if no data given
    if (count($infoGalleries) == 0)
    {
        echo JText::_('COM_RSGALLERY2_NO_NEW_GALLERIES');
        return;
    }

    // Header ----------------------------------

    echo '<table class="table table-striped table-condensed">';
    echo '    <caption>'.JText::_('COM_RSGALLERY2_MOST_RECENTLY_ADDED_GALLERIES').'</caption>';
    echo '    <thead>';
    echo '        <tr>';
    echo '            <th>'.JText::_('COM_RSGALLERY2_GALLERY').'</th>';
    echo '            <th>'.JText::_('COM_RSGALLERY2_USER').'</th>';
    echo '            <th>'.JText::_('COM_RSGALLERY2_ID').'</th>';
    echo '        </tr>';
    echo '    </thead>';

        //--- data ----------------------------------

    echo '    <tbody>';

    foreach ($infoGalleries as $GalleryInfo) {

        echo '        <tr>';
        echo '            <td>' . $GalleryInfo['name'] . '</td>';
        echo '            <td>' . $GalleryInfo['user'] . '</td>';
        echo '            <td>' . $GalleryInfo['id'] . '</td>';
        echo '        </tr>';
    }
    echo '    </tbody>';

    //--- footer ----------------------------------
    echo '</table>';

    return;
}

function DisplayInfoImages ($infoImages) {

    // exit if no data given
    if (count($infoImages) == 0)
    {
        echo JText::_('COM_RSGALLERY2_NO_NEW_IMAGES');
        return;
    }

    // Header ----------------------------------

    echo '<table class="table table-striped table-condensed">';
    echo '    <caption>'.JText::_('COM_RSGALLERY2_MOST_RECENTLY_ADDED_ITEMS').'</caption>';
    echo '    <thead>';
    echo '        <tr>';
    echo '            <th>'.JText::_('COM_RSGALLERY2_FILENAME').'</th>';
    echo '            <th>'.JText::_('COM_RSGALLERY2_GALLERY').'</th>';
    echo '            <th>'.JText::_('COM_RSGALLERY2_DATE').'</th>';
    echo '            <th>'.JText::_('COM_RSGALLERY2_USER').'</th>';
    echo '        </tr>';
    echo '    </thead>';

    //--- data ----------------------------------

    echo '    <tbody>';

	foreach ($infoImages as $ImgInfo) {

        echo '        <tr>';
        echo '            <td>' . $ImgInfo['name'] . '</td>';
        echo '            <td>' . $ImgInfo['gallery'] . '</td>';
        echo '            <td>' . $ImgInfo['date'] . '</td>';
        echo '            <td>' . $ImgInfo['user'] . '</td>';
        echo '        </tr>';
    }
    echo '    </tbody>';

    //--- footer ----------------------------------
    echo '</table>';

	return;
}


function DisplayInfoRsgallery2 ($Rsg2Version)
{
    /*
        // Rsgallery Info area
        echo '<div class="row">';
    */
    // Logo

    echo '<row>';
    echo '<div class="rsg2logo-container">';
    echo '<div class="rsg2logo">';
    echo '  <img src="'.JUri::root(true).'/administrator/components/com_rsgallery2/images/rsg2-logo.png" align="middle" alt="RSGallery2 logo" />';
    echo '</div>';
    /**/
//    echo '<table class="table table-striped">';
    echo '<table class="table table-striped table-condensed">';
//    echo '<table class="table">';
//    echo '<table>';
//    echo '<table>';
    echo '    <tbody>';
    /**/
    /**/
    echo '        <tr>';
    echo '            <td>' . JText::_('COM_RSGALLERY2_INSTALLED_VERSION') . ': ' . '</td>';
    echo '            <td>';
    echo '                <a href="" target="_blank" title="' . JText::_('COM_RSGALLERY2_VIEW_CHANGE_LOG') . '": >' . $Rsg2Version . '</a>';
    echo '            </td>';
    echo '        </tr>';
    /**/
    // License
    echo '        <tr>';
    echo '            <td>' . JText::_('COM_RSGALLERY2_LICENSE') . ': ' . '</td>';
    echo '            <td>';
    echo '               <a href="http://www.gnu.org/copyleft/gpl.html" target="_blank" title="'.JText::_('COM_RSGALLERY2_JUMP_TO_GNU_ORG').'" >GNU GPL</a>';
    echo '            </td>';
    echo '        </tr>';
    /**/
    /**/
    // Forum
    echo '        <tr>';
    echo '            <td>' . JText::_('COM_RSGALLERY2_FORUM') . '</td>';
    echo '            <td>';
    echo '                <a href="http://www.rsgallery2.nl/" target="_blank" '.' title="'.JText::_('COM_RSGALLERY2_JUMP_TO_FORUM').'" >www.rsgallery2.nl</a>';
    echo '            </td>';
    echo '        </tr>';
    /**/
    // Documentation
    echo '        <tr>';
    echo '            <td>' . JText::_('COM_RSGALLERY2_DOCUMENTATION') . '</td>';
    echo '            <td>';
    echo '                <a href="http://joomlacode.org/gf/project/rsgallery2/frs/?action=FrsReleaseBrowse&frs_package_id=6273" target="_blank"';
    echo '                    title="'.JText::_('COM_RSGALLERY2_JUMP_TO_DOCUMENTATION').'" >'.JText::_('COM_RSGALLERY2_DOCUMENTATION').'</a>';
    echo '            </td>';
    echo '        </tr>';

    /**/
    echo '    </tbody>';
    echo '</table>';
    /**/
    echo '</div>';

    echo '</row>';

    echo '<br>';
    return;
}

// public static $extension = 'COM_RSG2';

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
            <div class="span7">
                <div class="row-fluid">
                    <?php
                        if ( $this->UserIsRoot ){
                            $link = 'index.php?option=com_rsg2&amp;view=config';
                            //RsgButton( $link, 'config.png',  JText::_('COM_RSGALLERY2_CONFIGURATION') );
                            RsgIconMoonButton( $link, 'icon-cog clsProperties',  JText::_('COM_RSGALLERY2_CONFIGURATION') );
                        }

                        $link = 'index.php?option=com_rsg2&amp;view=galleries';
                        //RsgButton( $link, 'categories.png', JText::_('COM_RSGALLERY2_MANAGE_GALLERIES') );
                        RsgIconMoonButton( $link, 'icon-images clsGalleries', JText::_('COM_RSGALLERY2_MANAGE_GALLERIES') );

                        $link = 'index.php?option=com_rsg2&amp;view=uploadBatch';
                        //RsgButton( $link, 'upload_zip.png', JText::_('COM_RSGALLERY2_BATCH_UPLOAD') );
                        RsgIconMoonButton( $link, 'icon-upload clsBatchUpload', JText::_('COM_RSGALLERY2_BATCH_UPLOAD') );

                        $link = 'index.php?option=com_rsg2&amp;view=uploadSingle';
                        //RsgButton( $link, 'upload.png', JText::_('COM_RSGALLERY2_UPLOAD') );
                        RsgIconMoonButton( $link, 'icon-upload clsUpload', JText::_('COM_RSGALLERY2_UPLOAD') );
/**/
                        $link = 'index.php?option=com_rsg2&amp;view=images';
                        //RsgButton( $link, 'mediamanager.png', JText::_('COM_RSGALLERY2_MANAGE_IMAGES') );
                        RsgIconMoonButton( $link, 'icon-image clsImages', JText::_('COM_RSGALLERY2_MANAGE_IMAGES') );
/**/					
                        if ( $this->UserIsRoot ){
                            /*
                            $link = 'index.php?option=com_rsg2&task=consolidate_db';
                            //RsgButton( $link, 'dbrestore.png', JText::_('COM_RSGALLERY2_CONSOLIDATE_DATABASE') );
                            RsgButton( $link, 'dbrestore.png', JText::_('COM_RSGALLERY2_CONSOLIDATE_DATABASE') );
                            */
							$link = 'index.php?option=com_rsg2&view=maintenance';
							//RsgButton( $link, 'maintenance.png', JText::_('COM_RSGALLERY2_MAINTENANCE'));
							RsgIconMoonButton( $link, 'icon-screwdriver clsMaintenance', JText::_('COM_RSGALLERY2_MAINTENANCE'));

							$link = 'index.php?option=com_rsg2&rsgOption=installer';
							//RsgButton( $link, 'template.png', JText::_('COM_RSGALLERY2_TEMPLATE_MANAGER'));
							RsgIconMoonButton( $link, 'icon-scissors clsTemplate', JText::_('COM_RSGALLERY2_TEMPLATE_MANAGER'));
						}
/**/
                    ?>
                </div>
                <div class="row-fluid">
                    <?php
/*                        $link = 'index.php?option=com_rsg2&amp;view=images';
                        //RsgButton( $link, 'mediamanager.png', JText::_('COM_RSGALLERY2_MANAGE_IMAGES') );
                        RsgIconMoonButton( $link, 'icon-image clsImages', JText::_('COM_RSGALLERY2_MANAGE_IMAGES') );
*/
                        if ( $this->UserIsRoot ){
                            /*
                            $link = 'index.php?option=com_rsg2&task=consolidate_db';
                            //RsgButton( $link, 'dbrestore.png', JText::_('COM_RSGALLERY2_CONSOLIDATE_DATABASE') );
                            RsgButton( $link, 'dbrestore.png', JText::_('COM_RSGALLERY2_CONSOLIDATE_DATABASE') );
                            *
							$link = 'index.php?option=com_rsg2&view=maintenance';
							//RsgButton( $link, 'maintenance.png', JText::_('COM_RSGALLERY2_MAINTENANCE'));
							RsgIconMoonButton( $link, 'icon-screwdriver clsMaintenance', JText::_('COM_RSGALLERY2_MAINTENANCE'));

							$link = 'index.php?option=com_rsg2&rsgOption=installer';
							//RsgButton( $link, 'template.png', JText::_('COM_RSGALLERY2_TEMPLATE_MANAGER'));
							RsgIconMoonButton( $link, 'icon-scissors clsTemplate', JText::_('COM_RSGALLERY2_TEMPLATE_MANAGER'));
/**/						
						} 
					

			// if debug is on, display advanced options
			if( ($Rsg2DebugActive) AND ( $this->UserIsRoot ) ){ 
				?>
			</div>
			<div class="row-fluid">
				<div class="rsg2-cpanelDebug">
					<div class="row-fluid">
						<div class="DangerZone">
							<h3>
								<?php echo JText::_('COM_RSGALLERY2_DANGER_ZONE');?>
							</h3>
						</div>
						<div class='rsg2-DebugHeader'>
							<strong>
								<?php echo JText::_('COM_RSGALLERY2_C_DEBUG_ON');?>
							</strong>
						</div>
					</div>
					<div class="row-fluid">
						<?php
							$link = 'index.php?option=com_rsg2&task=purgeEverything';
							RsgDebugButton( $link, 'media_DelItems.png', JText::_('COM_RSGALLERY2_PURGEDELETE_EVERYTHING') );

							$link = 'index.php?option=com_rsg2&task=reallyUninstall';
							RsgDebugButton( $link, 'db_DelItems.png', JText::_('COM_RSGALLERY2_C_REALLY_UNINSTALL') );

							$link = 'index.php?option=com_rsg2&task=config_rawEdit';
							RsgDebugButton( $link, 'menu.png', JText::_('COM_RSGALLERY2_CONFIG_MINUS_RAW_EDIT') );

							//Moved Migration Options: only show when debug is on since there are only test migration options and four Joomla 1.0.x options.
							/*
							$link = 'index.php?option=com_rsg2&rsgOption=maintenance&task=showMigration';
							RsgDebugButton( $link, 'dbrestore.png', JText::_('COM_RSGALLERY2_MIGRATION_OPTIONS') );
							*/
							$link = 'index.php?option=com_rsg2&task=config_dumpVars';
							RsgDebugButton( $link, 'menu.png', JText::_('COM_RSGALLERY2_CONFIG_MINUS_VIEW') );
						?>
					</div>
				</div>
				<?php 
					} 
				?>
			</div>
		</div>
		
		<div class="span5">
        <?php
            DisplayInfoRsgallery2 ($this->Rsg2Version);
        ?>

			<div class="row">
         <?php
			echo JHtml::_('bootstrap.startAccordion', 'slide-example', array('active' => 'slide1', 'toggle' => 'false' ));
			echo JHtml::_('bootstrap.addSlide', 'slide-example', JText::_('COM_RSGALLERY2_GALLERIES'), 'slide1');

                // info about last uploaded galleries
                DisplayInfoGalleries ($this->LastGalleries);

			echo JHtml::_('bootstrap.endSlide');
			echo JHtml::_('bootstrap.endAccordion');
			
			echo JHtml::_('bootstrap.startAccordion', 'slide-example2', array('active' => 'slide2'));
			echo JHtml::_('bootstrap.addSlide', 'slide-example2', JText::_('COM_RSGALLERY2_IMAGES'), 'slide2');

                // info about last uploaded images
                DisplayInfoImages ($this->LastImages);

			echo JHtml::_('bootstrap.endSlide');
			echo JHtml::_('bootstrap.endAccordion');
			
			echo JHtml::_('bootstrap.startAccordion', 'slide-example3', array('active' => 'slide1'));
			echo JHtml::_('bootstrap.addSlide', 'slide-example3', JText::_('COM_RSGALLERY2_CREDITS'), 'slide3');
		?>

			<div id='rsg2-credits'>
		<?php			
			echo $this->Credits;
		?>
			</div>
			
		<?php
			echo JHtml::_('bootstrap.endSlide');
			echo JHtml::_('bootstrap.endAccordion');
		?>
		</div>
				
	</div>
	</div>
	
    <div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>	
</form>

