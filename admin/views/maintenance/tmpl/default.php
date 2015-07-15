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
function quickiconBar( $link, $image, $title, $text = "" ) {
    ?>
    <div style="float:left;">
    <div class="icon-bar">
        <a href="<?php echo $link; ?>">
            <div class="iconimage">
                <div class="rsg2-icon"><img src="<?php echo JURI_SITE;?>/administrator/components/com_rsgallery2/images/<?php echo $image;?>" alt="alternate text" /></div>
                <div class="rsg2-text">
                    <span class="maint-title"><?php echo $title;?></span>
                    <span class="maint-text"><?php echo $text;?></span></div>
            </div>
        </a>
    </div>
    </div>
    <div class='rsg2-clr'>&nbsp;</div>
}

?>

<form action="<?php echo JRoute::_('index.php?option=com_rsgallery2&view=maintenance'); ?>" method="post" name="adminForm" id="adminForm">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>

		<div id="rsg2-thisform">
		<div id='cpanel'>
			<p>
				<?php
				$link = 'index.php?option=com_rsgallery2&amp;rsgOption=maintenance&amp;task=consolidateDB';
				quickiconBar( $link, 'blockdevice.png',
					JText::_('COM_RSGALLERY2_MAINT_CONSOLDB'), JText::_('COM_RSGALLERY2_MAINT_CONSOLDB_TXT') );
				?>
				<br>
				<br>
				<br>
				<br>
			</p>
			<p>
				<?php
				$link = 'index.php?option=com_rsgallery2&amp;rsgOption=maintenance&amp;task=regenerateThumbs';
				quickiconBar( $link, 'menu.png',
					JText::_('COM_RSGALLERY2_MAINT_REGEN'), JText::_('COM_RSGALLERY2_MAINT_REGEN_TXT') );
				?>
				<br>
				<br>
				<br>
				<br>
			</p>
			<p>
				<?php
				$link = 'index.php?option=com_rsgallery2&amp;rsgOption=maintenance&amp;task=optimizeDB';
				quickiconBar( $link, 'db_optimize.png', JText::_('COM_RSGALLERY2_MAINT_OPTDB'),
					JText::_('COM_RSGALLERY2_MAINT_OPTDB_TXT') );
				?>
				<br>
				<br>
				<br>
				<br>
			</p>
		</div>
		<div class='rsg2-clr'>&nbsp;</div>
		</div>





		<table width="500">
		<tr>
			<td>
			<table class="adminform">
				<tr>
					<td valign="top" width="300"><p><?php echo JText::_('COM_RSGALLERY2_SELECT_GALLERIES_TO_REGENERATE_THUMBNAILS_FROM')?></p></td>
					<td valign="top">
						<fieldset>
						<legend><?php echo JText::_('COM_RSGALLERY2_SELECT_GALLERY')?></legend>
						<?php echo $lists['gallery_dropdown'];?>
						</fieldset>
						<p>
							<?php echo JText::sprintf('COM_RSGALLERY2_NEW_WIDTH_DISPLAY', $rsgConfig->get('image_width'))?>
							<br>
							<?php echo JText::sprintf('COM_RSGALLERY2_NEW_WIDTH_THUMB', $rsgConfig->get('thumb_width'))?>
						</p>
					</td>
					<td width="10">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
			</table>
			</td>
		</tr>
		</table>




        <div>
			<input type="hidden" name="option" value="com_rsg2" />
			<input type="hidden" name="rsgOption" value="maintenance" />

            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </div>
</form>

