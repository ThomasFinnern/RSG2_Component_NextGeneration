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
		//Control Panel
		JHtmlSidebar::addEntry(
			'<span class="icon-home-2" >  </span>'.
			JText::_('COM_RSGALLERY2_SUBMENU_CONTROL_PANEL'),
			'index.php?option=com_rsg2&view=rsg2',
			$vName == 'rsg2'
		);
	    //Galleries	
		JHtmlSidebar::addEntry(
			'<span class="icon-images" >  </span>'.
			JText::_('COM_RSGALLERY2_SUBMENU_GALLERIES'),
			'index.php?option=com_rsg2&view=galleries',
			$vName == 'galleries'
		);
		//Upload		
		JHtmlSidebar::addEntry(
			'<span class="icon-upload" > </span>'.
			JText::_('COM_RSGALLERY2_SUBMENU_UPLOAD'),
			'index.php?option=com_rsg2&view=upload',
			$vName == 'upload'
		);

		//Items /images
		JHtmlSidebar::addEntry(
			'<span class="icon-image" >  </span>'.
			JText::_('COM_RSGALLERY2_SUBMENU_IMAGES'),
			'index.php?option=com_rsg2&view=images',
			$vName == 'images'
		);
		// summary tree view		
		JHtmlSidebar::addEntry(		
			'<span class="icon-tree-2" >  </span>'.
			JText::_('COM_RSGALLERY2_SUMMARY_TREE_VIEW'),
			'index.php?option=com_rsg2&view=summarytreeview',
			$vName == 'summarytreeview'
		);

		if($vName=='configRaw')
		{
			'<span class="icon-tools" >  </span>'.
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