<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');
/**
 * 
 */
class rsg2ModelMaintenance extends  JModelList
{
//    protected $text_prefix = 'COM_RSG2';


//    protected function removeImageReferences ()
    protected function removeImageReferences ()
    {
        $msg = "RemoveImageReferences: ";

        $msg = $msg . PurgeTable ('#__rsgallery2_acl', COM_RSG2_PURGED_TABLE_RSGALLERY2_ACL);
        $msg = $msg . PurgeTable ('#__rsgallery2_files', COM_RSG2_PURGED_IMAGE_ENTRIES_FROM_DATABASE);
        $msg = $msg . PurgeTable ('#__rsgallery2_cats', COM_RSG2_PURGED_TABLE_RSGALLERY2_CATS);
        $msg = $msg . PurgeTable ('#__rsgallery2_galleries', COM_RSG2_PURGED_GALLERIES_FROM_DATABASE);
        $msg = $msg . PurgeTable ('#__rsgallery2_config', COM_RSG2_PURGED_TABLE_RSGALLERY2_CONFIG);
        $msg = $msg . PurgeTable ('#__rsgallery2_comments', COM_RSG2_PURGED_TABLE_RSGALLERY2_COMMENTS);

        return msg;
    }

    /**
     * Deletes all Tables of RSG2 in preparation of of deinstall/reinstall
     * @return string $msg
     */
    protected function removeAllTables ()
    { 
		$msg = "RemoveAllTables: ";
		
		$msg = $msg . DropTable ('#__rsgallery2_acl', COM_RSG2_DROPED_TABLE___RSGALLERY2_ACL);
		$msg = $msg . DropTable ('#__rsgallery2_files', COM_RSG2DROPED_TABLE___RSGALLERY2_FILES);
		$msg = $msg . DropTable ('#__rsgallery2_cats', COM_RSG2_DROPED_TABLE___RSGALLERY2_CATS);
		$msg = $msg . DropTable ('#__rsgallery2_galleries', COM_RSG2DROPED_TABLE___RSGALLERY2_GALLERIES);
		$msg = $msg . DropTable ('#__rsgallery2_config', COM_RSG2DROPED_TABLE___RSGALLERY2_CONFIG);
		$msg = $msg . DropTable ('#__rsgallery2_comments', COM_RSG2DROPED_TABLE___RSGALLERY2_COMMENTS);
				
		return msg;
	}


    /**
     * Removes one table from RSG2
     * @param string $TableId
     * @param string $successMsg
     * @return string bool success or error message
     */
    private function PurgeTable ($TableId, $successMsg)
    {
        // ToDo: Throws .... \Jdatabaseexception ....

        $msg = "Purge table failure: ";

        $db = JFactory::getDbo();
        $db->truncateTable($TableId);
        $db->execute();

        if($db->getErrorMsg()){
            $msf = $msg . $db->getErrorMsg();
        }
        else{
            $msg = $successMsg;
        }

        return $msg;
    }

    /**
     * Removes one table from RSG2
     * @param string $TableId
     * @param string $successMsg
     * @return string bool success or error message
     */
    private function DropTable ($TableId, $successMsg)
    {
        // ToDo: Throws .... \Jdatabaseexception ....

        $msg = "Drop table failure: ";

        $db = JFactory::getDbo();
        $db->dropTable($TableId, true);
        $db->execute();

        if($db->getErrorMsg()){
            $msf = $msg . $db->getErrorMsg();
        }
        else{
            $msg = $successMsg;
        }

        return $msg;
    }

}