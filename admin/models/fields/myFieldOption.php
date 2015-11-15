<?php
/**
 * Do the Joomla! security check and get the FormHelper to load the class
 */
defined('_JEXEC') or die('Restricted Access');

JFormHelper::loadFieldClass('list');

class JFormFieldMyCustomField extends JFormFieldList
{
    /**
     * Element name
     *
     * @var     string
     */
    public  $type = 'MyCustomField';

    /**
     * getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        // Create an array for our options
        $options = array();
        // Add our options to the array
        $options[] = array("value" => 1, "text" => "1");
        $options[] = array("value" => 1, "text" => "1)";
        return $options;
    }
}