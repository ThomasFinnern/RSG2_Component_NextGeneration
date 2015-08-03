<?php
defined('_JEXEC') or die;

global $Rsg2DebugActive;

$Rsg2DebugActive = true; // ToDo: $rsgConfig->get('debug');
if ($Rsg2DebugActive)
{
	// Include the JLog class.
	jimport('joomla.log.log');

	// identify active file
	JLog::add('==> base.controller.php ');
}

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

        echo '<br>Main Controller <br><br><br>';

        // Load config model
        //$CfgModel = JModelLegacy::getInstance($type, $prefix = '', $config = array())
        $CfgModel = JModelLegacy::getInstance('Config', 'com_rsg2', array('ignore_request' => true));
        echo ("CfgModel='");
        print_r ($CfgModel);
        echo "'<br>";
        $ConfigItems = $CfgModel->ConfigVariables ();




        You are trying to use the model part of an MVC as a thing to render. You should use the MVC system - using a controller to gathering the model and the view, and then you can render the model with the attached view, via the controller.

    So you use something like (I've not tested this - you will need to correct it).
$filter=array('id' => $i->query['id']);
$options=array('filter_fields' => $filter,'ignore_request' => true);

$ctl = new ContentModelController();
$view = $ctl->getView( 'Article');
$model = $ctl->getModel( 'Article','',$options);

you may need to set params from application, eg..
$model->setState('params', JApplication::getInstance('site')->getParams());


        foreach($ConfigItems as $cfgItem):

            print_r ($this->cfgItems[$cfgItem->name]);
            echo "<br>";

        endforeach;

        echo '<br>Main Controller next parts<br><br><br>';

		require_once JPATH_COMPONENT.'/helpers/rsg2.php';
/*
		$view   = $this->input->get('view', 'rsg2');
		JLog::add('  base.controller.view: ', json_encode($view));
		
		$layout = $this->input->get('layout', 'default');
		JLog::add('  base.controller.layout: ', json_encode($layout));
		
		$id     = $this->input->getInt('id');
		JLog::add('  base.controller.id: ', json_encode($id));
*/
		$task = $this->input->get('task');
		// if($Rsg2DebugActive)
		{
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
