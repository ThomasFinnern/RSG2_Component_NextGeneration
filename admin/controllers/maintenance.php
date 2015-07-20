<?php
defined('_JEXEC') or die;

global $Rsg2DebugActive;

if ($Rsg2DebugActive)
{
	// Include the JLog class.
	jimport('joomla.log.log');

	// identify active file
	JLog::add('==> ctrl.maintenanc.php ');
}


jimport('joomla.application.component.controlleradmin');

class Rsg2ControllerMaintenance extends JControllerAdmin
{
	function consolidateDB()
	{
		echo 'consolidateDB';
//        JFactory::getApplication()->enqueueMessage('consolidateDB', 'Notice');
//        $this->setRedirect('index.php?option=com_rsg2&amp;view=maintenance', 'consolidateDB', 'Notice');
        $this->setRedirect('index.php?option=com_rsg2&view=maintenance', 'consolidateDB', 'Notice');

    }
	function regenerateThumbs()
	{
		echo 'regenerateThumbs';
	}
	function optimizeDB()
	{
		echo 'optimizeDB';
	}
	function config_dumpVars()
	{
		echo 'config_dumpVars';
	}
	function config_rawEdit()
	{
		echo 'config_rawEdit';
	}
	function purgeEverything()
	{
		echo 'purgeEverything';
	}
	function reallyUninstall()
	{
		echo 'reallyUninstall';
	}
	
}


