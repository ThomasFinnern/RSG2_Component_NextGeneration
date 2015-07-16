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
					<div class="rsg2-icon">
						<!--img src="<?php echo JURI_SITE;?>/administrator/components/COM_RSG2/images/<?php echo $image;?>" alt="alternate text" /-->
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
    <div class='rsg2-clr'>&nbsp;</div>
<?php
}
?>

<form action="<?php echo JRoute::_('index.php?option=COM_RSG2&view=maintenance'); ?>"
      method="post" name="adminForm" id="adminForm">

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
                    $link = 'index.php?option=COM_RSG2&amp;rsgOption=maintenance&amp;task=consolidateDB';
                    quickiconBar( $link, 'blockdevice.png',
                        JText::_('COM_RSG2_MAINT_CONSOLDB'), JText::_('COM_RSG2_MAINT_CONSOLDB_TXT') );
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>
                </p>
                <p>
                    <?php
                    $link = 'index.php?option=COM_RSG2&amp;rsgOption=maintenance&amp;task=regenerateThumbs';
                    quickiconBar( $link, 'menu.png',
                        JText::_('COM_RSG2_MAINT_REGEN'), JText::_('COM_RSG2_MAINT_REGEN_TXT') );
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>
                </p>
                <p>
                    <?php
                    $link = 'index.php?option=COM_RSG2&amp;rsgOption=maintenance&amp;task=optimizeDB';
                    quickiconBar( $link, 'db_optimize.png', JText::_('COM_RSG2_MAINT_OPTDB'),
                        JText::_('COM_RSG2_MAINT_OPTDB_TXT') );
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>
                </p>
            </div>
            <div class='rsg2-clr'>&nbsp;</div>



        </div>

        <div>
			<input type="hidden" name="option" value="com_rsg2" />
			<input type="hidden" name="rsgOption" value="maintenance" />

            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </div>
</form>

