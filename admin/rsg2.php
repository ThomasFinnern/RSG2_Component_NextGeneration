<?php
/**
* This file contains the non-presentation processing for the Admin section of RSGallery.
* @version $Id: admin.rsgallery2.php 1085 2012-06-24 13:44:29Z mirjam $
* @package RSGallery2
* @copyright (C) 2003 - 2014 RSGallery2
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* RSGallery is Free Software
*/
defined('_JEXEC') or die;

/**
 * bool
 */
global $Rsg2DebugActive;
//Access check
/**
 * bool
 */
global $canAdmin;
/**
 * bool
 */
global $canManage;

// Set debug active from user configuration
require_once JPATH_COMPONENT.'/models/config.php';
$Rsg2DebugActive = rsg2ModelConfig::getDebugActive();

if ($Rsg2DebugActive)
{
	// Include the JLog class.
	jimport('joomla.log.log');

	// Get the date for log file name
	$date = JFactory::getDate()->format('Y-m-d');

	// Add the logger.
	JLog::addLogger(
		// Pass an array of configuration options
		array(
				// Set the name of the log file
				//'text_file' => substr($application->scope, 4) . ".log.php",
				'text_file' => 'rsg2.adm.log.'.$date.'.php',

				// (optional) you can change the directory
				'text_file_path' => 'logs'
		),
		JLog::ALL ^ JLog::DEBUG // leave out db messages
	);
	
	// start logging...
	JLog::add('Start rsgallery2.php in admin: debug active in RSGallery2'); //, JLog::DEBUG);
}

// import joomla controller library
jimport('joomla.application.component.controller');
 
//Access check
$canAdmin	= JFactory::getUser()->authorise('core.admin',	'com_rsg2');
$canManage	= JFactory::getUser()->authorise('core.manage',	'com_rsg2');
if (!$canManage) {
	$this->app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'));
	$this->app->redirect('index.php');
	return;
}

$controller	= JControllerLegacy::getInstance('Rsg2');
$input = JFactory::getApplication()->input; 
$task = $input->get('task');

if($Rsg2DebugActive)
{
	//$Delim = "\n";
	$Delim = " ";
	// show active task
	$DebTxt = "==> base.rsg2.php".$Delim ."----------".$Delim;

	if (strlen ($task)) {
		$DebTxt = $DebTxt . "\$task: '$task''" . $Delim;
	}
/*
	if (strlen ($option)) {
		$DebTxt = $DebTxt . "\$option: $option".$Delim;
	}
	if (strlen ($catid)) {
		$DebTxt = $DebTxt . "\$catid: $catid".$Delim;
	}
	if (strlen ($firstCid)) {
		$DebTxt = $DebTxt . "\$firstCid: $firstCid".$Delim;
	}
	if (strlen ($id)) {
		$DebTxt = $DebTxt . "\$id: $id".$Delim;
	}
	if (strlen ($rsgOption)) {
		$DebTxt = $DebTxt . "\$rsgOption: $rsgOption".$Delim;
	}
	if (strlen ($view)) {
		$DebTxt = $DebTxt . "\$rsgOption: $view".$Delim;
	}
*/

	JLog::add($DebTxt); //, JLog::DEBUG);
}

$controller->execute($task);
$controller->redirect();

// echo '<br>After every output <br><br><br>';

