<?php
defined('_JEXEC') or die;

class Rsg2Helper
{
/*
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_rsg2';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_rsg2.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_rsg2', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
*/

	public static function addSubmenu($vName = 'rsg2')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_MENU_CONTROL_PANEL'),
			'index.php?option=com_rsg2&view=rsg2',
			$vName == 'rsg2'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_MENU_GALLERIES'),
			'index.php?option=com_rsg2&view=galleries',
			$vName == 'galleries'
		);
		
		/*
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_MENU_BATCH_UPLOAD'),
			'index.php?option=com_rsg2&view=uploadBatch',
			$vName == 'uploadBatch'
		);
		*/
		
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_MENU_UPLOAD'),
			'index.php?option=com_rsg2&view=upload',
			$vName == 'uploadSingle'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_MENU_IMAGES'),
			'index.php?option=com_rsg2&view=images',
			$vName == 'images'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_SUMMARY_TREE_VIEW'),
			'index.php?option=com_rsg2&view=summarytreeview',
			$vName == 'summarytreeview'
		);

		if($vName=='configRaw')
		{
			JHtmlSidebar::addEntry(
				JText::_('COM_RSGALLERY2_MAINTENANCE'),
				'index.php?option=com_rsg2&view=summarytreeview',
				false
			);

		}
				
/*		
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_rsg2',
			$vName == 'categories'
		);

/*		
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_rsg2',
			$vName == 'categories'
		);

/*		if ($vName == 'categories')
		{
			JToolbarHelper::title(
				JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE', JText::_('com_rsg2')),
				'folios-categories');
		}
/*		
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_SUBMENU_PREVIEW'),
			'index.php?option=com_rsg2&view=preview',
			$vName == 'preview'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_RSGALLERY2_SUBMENU_PREVIEW'),
			'index.php?option=com_rsg2&view=preview',
			$vName == 'preview'
		);
*/		
	}
}