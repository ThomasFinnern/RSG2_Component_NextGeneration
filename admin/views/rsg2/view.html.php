<?php

defined( '_JEXEC' ) or die;

jimport ('joomla.html.html.bootstrap');
jimport('joomla.application.component.view');

//require (JUri::root(true).'/administrator/components/com_rsg2/helpers/CreditsEnumaration.php');
//require ('helpers/CreditsEnumaration.php');
require_once JPATH_ADMINISTRATOR . '/components/com_rsg2/helpers/rsg2Common.php';
require_once JPATH_ADMINISTRATOR . '/components/com_rsg2/helpers/CreditsEnumaration.php';
require_once JPATH_ADMINISTRATOR . '/components/com_rsg2/models/images.php';
require_once JPATH_ADMINISTRATOR . '/components/com_rsg2/models/galleries.php';

class Rsg2ViewRsg2 extends JViewLegacy
{
	protected $Credits;
	// ToDo: Use other rights instead of core.admin -> IsRoot ?
	// core.admin is the permission used to control access to 
	// the global config
	protected $UserIsRoot; 
	protected $LastImages;
	protected $LastGalleries;
	protected $Rsg2Version;

	protected $form;
	protected $sidebar;

	//------------------------------------------------
	public function display ($tpl = null)
	{
		//--- get needed data ------------------------------------------
		
		// List of credits for rsgallery2 developers / translators
		$this->Credits = CreditsEnumaration::CreditsEnumarationText;
	
		// Check rights of user
		$this->UserIsRoot = $this->CheckUserIsRoot ();

		// fetch data of last galleries (within one week ?)
        //$this->LastImages = rsg2ModelImages::lastWeekImages(5);
        $this->LastImages = rsg2ModelImages::latestImages(5);

        //$this->LastGalleries = rsg2ModelGalleries::lastWeekGalleries(5);
        $this->LastGalleries = rsg2ModelGalleries::latestGalleries(5);

		// Get rsgallery2 component version 
		$this->Rsg2Version = rsg2Common::getRsg2ComponentVersion();
				
		$form = $this->get('Form');

		
		//--- begin to display --------------------------------------------
		
		
		Rsg2Helper::addSubMenu('rsg2');

		// Options button.
		if ($this->UserIsRoot) {
			JToolBarHelper::preferences('com_rsg2');
		}
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Assign the Data
		$this->form = $form;
        	
		//$this->addToolbar ();
		JToolBarHelper::title(JText::_('COM_RSG2_MENU_CONTROL_PANEL'), 'config');
		$this->sidebar = JHtmlSidebar::render ();

		parent::display ($tpl);

        return;
	}

	/**
	 * Checks if user has root status (is re.admin')
	 *
	 * @return	bool
	 */		
	function CheckUserIsRoot ()
	{
		$user = JFactory::getUser();
		$isRoot = $user->authorise('core.admin');
		return $isRoot;
	}	
	
    /**
     * Method to set up the document properties
     *
     * @return void
     *
    protected function setDocument() 
    {
            $document = JFactory::getDocument();
            $document->setTitle(JText::_('COM_RSG2_MENU_CONTROL_PANEL'));
    }
	*/
	
	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param	int	$galleryId	The gallery ID.
	 * @return	JObject
	 *
	function getActions($galleryId = 0) {
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($galleryId)) {
			$assetName = 'COM_RSG2';
		} else {
			$assetName = 'COM_RSG2.gallery.'.(int) $galleryId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.delete', 'core.edit', 'core.edit.state', 'core.edit.own'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
	*

	function Redirect2ControlCenter()
	{
	
		echo ('Redirect2ControlCenter');
	
		$link = 'index.php?option=com_rsg2&view=galleries';
		$this->setRedirect($link);
		$this->redirect();
	}
	function Redirect2Upload()
	{
		echo ('Redirect2Upload');
	
		$link = 'index.php?option=com_rsg2&view=upload';
		$this->setRedirect($link);
		$this->redirect();
	}
		
	function Redirect2Galleries()
	{
		echo ('Redirect2Galleries');
	
		$link = 'index.php?option=com_rsg2&view=galleries';
		$this->setRedirect($link);
		$this->redirect();
	}
		
	function Redirect2Images()
	{
		echo ('Redirect2Images');
	
		$link = 'index.php?option=com_rsg2&view=images';
		$this->setRedirect($link);
		$this->redirect();
	}
	*/	
	
	
	
	
/*		
Then in your controllerName controller you create a method:

function taskName()
{
    $this->setRedirect('index.php?option=com_SomeComponent&task=anotherController.anotherTask');
    $this->redirect();
}
*/
	

	/*
		 parameters

		Writes a custom option and task button for the button bar.

			@param string $task The task to perform (picked up by the switch($task) blocks.
			@param string $icon The image to display.
			@param string $iconOver The image to display when moused over.
			@param string $alt The alt text for the icon image.
			@param bool $listSelect True if required to check that a standard list item is checked. 

		public static function custom($task = '', $icon = '', $iconOver = '', $alt = '', $listSelect = true)
		{
				$bar = JToolbar::getInstance('toolbar');
		 
				// Strip extension.
				$icon = preg_replace('#\.[^.]*$#', '', $icon);
		 
				// Add a standard button.
				$bar->appendButton('Standard', $icon, $alt, $task, $listSelect);
		}	
	*/
}


