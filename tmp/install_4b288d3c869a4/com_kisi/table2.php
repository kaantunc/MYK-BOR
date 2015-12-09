<?php

/*****************************************************
*
*	JOS_PROPERTY_TYPES ICIN
*
*****************************************************/

defined('_JEXEC') or die('Restricted access');
class TableProperty_Types extends JTable
{
	  var $id = null;
	  var $property_name = null;
	  var $section = null;
	
	function __construct(&$db)
	{			
		parent::__construct( '#__property_types', 'id', $db );
	}
}
?>

  
  



