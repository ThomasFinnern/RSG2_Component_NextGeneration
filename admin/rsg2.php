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

$Rsg2DebugActive = false; // ToDo: $rsgConfig->get('debug');
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
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller	= JControllerLegacy::getInstance('Rsg2');
$input = JFactory::getApplication()->input; 
$task = $input->get('task');
$controller->execute($task);
$controller->redirect();

if($Rsg2DebugActive)
{
	//$Delim = "\n";
	$Delim = " ";
    // show active task
    $DebTxt = "==> base.rsg2.php".$Delim ."----------".$Delim;
    $DebTxt = $DebTxt . "\$task: $task".$Delim;
    //$DebTxt = $DebTxt . "\$option: $option".$Delim;
    //$DebTxt = $DebTxt . "\$catid: $catid".$Delim;
    //$DebTxt = $DebTxt . "\$firstCid: $firstCid".$Delim;
    $DebTxt = $DebTxt . "\$id: $id".$Delim;
    //$DebTxt = $DebTxt . "\$rsgOption: $rsgOption".$Delim;

    JLog::add($DebTxt); //, JLog::DEBUG);
}




