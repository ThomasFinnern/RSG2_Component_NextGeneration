<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('text');

class JFormFieldRsgImageView extends JFormFieldText {

    protected $type = 'JFormFieldText';
	
	protected function getName() 
	{
		return (string) $this->element['name'];
	}
	
	
}
