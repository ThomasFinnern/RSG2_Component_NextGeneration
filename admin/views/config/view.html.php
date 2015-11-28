<?php

defined( '_JEXEC' ) or die;

//jimport ('joomla.html.html.bootstrap');
jimport('joomla.application.component.view');

class Rsg2ViewConfig extends JViewLegacy
{
	protected $item;
	protected $form;

	protected $cfgItems;
	
	public function display ($tpl = null)
	{
		$model      = $this->getModel();
		$this->cfgItems = $model->loadConfigData();

		$this->form = $this->get('Form');
		Rsg2Helper::addSubMenu('config'); 

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
				JError::raiseError(500, implode('<br />', $errors));
				return false;
		}

//        // Define tabs options for version of Joomla! 3.1
//        $this->tabsOptionsJ31 = array(
//            "active" => "tab1_j31_id" // It is the ID of the active tab.
//        );
        
        $this->addToolbar ();
		$this->sidebar = JHtmlSidebar::render ();
		
		parent::display ($tpl);
		
		// Set the document
		// $this->setDocument();		

        return;
	}

	protected function addToolbar ()
	{
        JToolBarHelper::title(JText::_('COM_RSGALLERY2_CONFIGURATION'), 'generic.png');

        // Disable main menu
        JFactory::getApplication()->input ->set ('hidemainmenu', true);
		
		/*
        JToolBarHelper::save();
        JToolBarHelper::cancel();
        JToolBarHelper::spacer();
		*/
	
		JToolBarHelper::apply('config.apply', 'JTOOLBAR_APPLY');
        JToolBarHelper::save('config.save', 'JTOOLBAR_SAVE');
        //JToolBarHelper::save2copy('config.save2copy');
        //JToolBarHelper::save2new('config.save2new');
		JToolBarHelper::cancel('config.cancel', 'JTOOLBAR_CANCEL');
	}

	/*
		 parameters

		Writes a custom option and task button for the button bar.

			@param string $task The task to perform (picked up by the switch($task) blocks.
			@param string $icon The config to display.
			@param string $iconOver The config to display when moused over.
			@param string $alt The alt text for the icon config.
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
	
	// COM_RSGALLERY2_GALLERY
    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument() 
    {
            $document = JFactory::getDocument();
            $document->setTitle(JText::_('COM_RSGALLERY2_CONFIGURATION'));
    }
	
}


