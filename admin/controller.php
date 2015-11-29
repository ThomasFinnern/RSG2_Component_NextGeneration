<?php
defined('_JEXEC') or die;

/**
 *  @param bool
 */
global $Rsg2DebugActive;

// $Rsg2DebugActive = rsg2ModelConfig::getDebugActive();

/*
// Load config model
global $CfgModel;
//$CfgModel = JModelLegacy::getInstance($type, $prefix = '', $config = array())
//$CfgModel = JModelLegacy::getInstance('Config', 'com_rsg2', array('ignore_request' => true));
$CfgModel = JModelLegacy::getInstance('Config', 'rsg2Model');
$ConfigItems = $CfgModel->getConfigVariables ();

//        print_r (array_keys($ConfigItems));

echo "Items: <br>";

foreach(array_keys($ConfigItems) as $cfgKey):
    echo 'Name: '; // . $cfgItem->name;
    print_r ($cfgKey);
    echo ' Value: '; // . $cfgItem->value;
    print_r ($ConfigItems[$cfgKey]);
    echo "<br>";

endforeach;

echo '<br>Main Controller next parts<br><br><br>';
*/
/*
$Rsg2DebugActive = $CfgModel->getDebugActive();            // true; // ToDo: $rsgConfig->get('debug');
echo ' Rsg2DebugActive: '; // . $cfgItem->value;
print_r ($Rsg2DebugActive);
echo "<br>";
*/

// import Joomla controller library
jimport('joomla.application.component.controller');
 
class Rsg2Controller extends JControllerLegacy
{
	// protected $default_view = 'rsg2s';
    
    /**
     * display task
     * @param bool $cachable
     * @param bool $urlparams
     * @return $this
     */
	public function display($cachable = false, $urlparams = false)
	{

		if ($Rsg2DebugActive)
		{
			// identify active file
			JLog::add('==> base.controller.php ');
		}

/*
		// Load config model
		$CfgModel = JModelLegacy::getInstance('Config', 'rsg2Model');
		$ConfigItems = $CfgModel->getConfigVariables ();

//        print_r (array_keys($ConfigItems));

        echo "Items: <br>";
/*
        foreach(array_keys($ConfigItems) as $cfgKey):
            echo 'Name: '; // . $cfgItem->name;
            print_r ($cfgKey);
            echo ' Value: '; // . $cfgItem->value;
            print_r ($ConfigItems[$cfgKey]);
            echo "<br>";

        endforeach;
*/


        require_once JPATH_COMPONENT.'/helpers/rsg2.php';
/*
		$view   = $this->input->get('view', 'rsg2');
		JLog::add('  base.controller.view: ', json_encode($view));
		
		$layout = $this->input->get('layout', 'default');
		JLog::add('  base.controller.layout: ', json_encode($layout));
		
		$id     = $this->input->getInt('id');
		JLog::add('  base.controller.id: ', json_encode($id));
*/
		if($Rsg2DebugActive)
		{
			$task = $this->input->get('task');
			JLog::add('  base.controller.task: ', json_encode($task));
		}
		
/* ToDo:: Activate following: book extension entwickeln  page 208
		if ($view == 'rsg2' && $layout == 'edit' && !$this->checkEditId('com_rsg2.edit.rsgallery2', $id))
		{
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_rsg2&view=rsgallery2s', false));

			return false;
		}
*/
		parent::display($cachable);

		return $this;
	}

}
