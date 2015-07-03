<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class rsg2ModelImages extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.           
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		$query
			->select('*')
			->from('#__rsgallery2_files');
		
		return $query;
	}
	
	public function getParentGalleryName($id)
	{
		//// Create a new query object.           
		//$db = JFactory::getDBO();
		//$query = $db->getQuery(true);
		
		//$query
		//	->select('*')
		//	->from('#__rsgallery2_files');
	
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		//$sql = 'SELECT `name` FROM `#__rsgallery2_galleries` WHERE `id` = '. (int) $id;
		$query
			->select('name')
			->from('#__rsgallery2_galleries');
			->where('`id` = '. (int) $id);
		
		$db->setQuery($sql);
		$db->execute();

		// loadObjectstdClass(), loadObjectList,loadObject or any 
		// other methods you can use for fetching based on list or 
		// single row. ? any way the result return as array. ?
		
		// http://docs.joomla.org/Accessing_the_database_using_JDatabase/2.5#The_Query
		// http://docs.joomla.org/Selecting_data_using_JDatabase
		$name = $db->loadResult();

		return $name;
	}
	
    /**
     * This function will retrieve the data of the 5 last uploaded images
     */    
	 
	List with Name, gallery name, date , user name 
	 
    static function latestImages($count) {
		
		$lastweek  = mktime (0, 0, 0, date("m"),    date("d") - 7, date("Y"));
		$lastweek = date("Y-m-d H:m:s", $lastweek);
		
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
				
		//$query = 'SELECT * FROM `#__rsgallery2_files` WHERE (`date` >= '. $database->quote($lastweek) 
		//	.' AND `published` = 1) ORDER BY `id` DESC LIMIT 0,5';
						
		$query
			->select('*')
			->from($db->quoteName('#__rsgallery2_files'));
			->where($db->quoteName(`id`).' = '. (int) $id);
			->order()
			->setLimit('10');		

		$database->setQuery($query);
		$rows = $database->loadObjectList();
		
		if (count($rows) > 0) {
			foreach ($rows as $row) {
				?>
				<tr>
					<td><?php echo $row->name;?></td>
					<td><?php echo galleryUtils::getCatnameFromId($row->gallery_id);?></td>
					<td><?php echo $row->date;?></td>
					<td><?php echo galleryUtils::genericGetUsername($row->userid);?></td>
				</tr>
				<?php
			}
		} else {
			echo "<tr><td colspan=\"4\">".JText::_('COM_RSGALLERY2_NO_NEW_ENTRIES')."</td></tr>";
		}
    }
    
	
	
	
	
	
	
	
	
}