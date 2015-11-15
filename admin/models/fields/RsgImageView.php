<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

class JFormFieldRsgImageView extends JFormField {

    protected $type = 'RsgImageView';


	protected function getTitle() 
	{
		return (string) $this->element['title'];
	}
	protected function getImgPath() 
	{
		return (string) $this->element['ImgPath'];
	}
	
	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 *
	 */
	protected function getInput()
	{
		$onclick = ' onclick="document.getElementById(\'' . $this->id . '\').value=\'0\';"';
		
		$markup = '';
		
		try
		{
			/*
			$markup = "'<input class="input-small" type="text" name="' '"
			. $this->name . '" id="' . $this->id . '" value="'
			. htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') 
			. '" readonly="readonly" /> <a class="btn" ' . $onclick 
			. '><i class="icon-refresh"></i> '
			. JText::_('COM_BANNERS_RESET_IMPMADE') . '</a>';
			/**/
			$markup = '<H3>RsgImageView</H3>';			
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}
		
		return $markup;
    }
}
