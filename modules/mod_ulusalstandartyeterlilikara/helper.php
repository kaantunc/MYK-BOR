<?php
/**
 * Helper class for Hello World! module
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class modUlusalStandartYeterlilikAraHelper
{
	function getMeslekStandartSektorleri()
	{
		$db  = &JFactory::getOracleDBO();
		$sql = "SELECT *
						FROM pm_sektorler  
						WHERE sektor_durum=?";
		
		$params = array ("1");//aktif sektorler
		return $db->prep_exec($sql, $params);
	}
	
}
?>
