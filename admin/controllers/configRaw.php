<?php
defined('_JEXEC') or die;

global $Rsg2DebugActive;

if ($Rsg2DebugActive)
{
	// Include the JLog class.
	jimport('joomla.log.log');

	// identify active file
	JLog::add('==> ctrl.configRaw.php ');
}



jimport('joomla.application.component.controllerform');

class Rsg2ControllerConfigRaw extends JControllerForm
{
	
}

