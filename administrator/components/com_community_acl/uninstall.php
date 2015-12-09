<?php
defined('_JEXEC') or die('Restricted access');

function com_uninstall() {
	$db	=& JFactory::getDBO();
	
	$result = @chmod (JPATH_SITE. "/modules/mod_mainmenu/legacy.php", 0666);
	if ($result)
		$result = @unlink(JPATH_SITE. "/modules/mod_mainmenu/legacy.php");
	if ($result)
		$result = @rename(JPATH_SITE ."/administrator/components/com_community_acl/backup/legacy.php", JPATH_SITE. "/modules/mod_mainmenu/legacy.php");
	if (!$result)
		echo '<font color="#FF0000">Error: Unable restore from backup FE menu module</font><br/>';
	
	$result = @chmod (JPATH_SITE. "/modules/mod_mainmenu/helper.php", 0666);
	if ($result)
		$result = @unlink(JPATH_SITE. "/modules/mod_mainmenu/helper.php");
	if ($result)
		$result = @rename(JPATH_SITE ."/administrator/components/com_community_acl/backup/mod_mainmenu_helper.php", JPATH_SITE. "/modules/mod_mainmenu/helper.php");
	if (!$result)
		echo '<font color="#FF0000">Error: Unable restore from backup FE menu module</font><br/>';
	
	$result = @chmod (JPATH_SITE. "/administrator/modules/mod_menu/helper.php", 0666);
	if ($result)
		$result = @unlink(JPATH_SITE. "/administrator/modules/mod_menu/helper.php");
	if ($result)
		$result = @rename(JPATH_SITE ."/administrator/components/com_community_acl/backup/mod_menu_helper.php", JPATH_SITE. "/administrator/modules/mod_menu/helper.php");
	if (!$result)
		echo '<font color="#FF0000">Error: Unable restore from backup BE menu module</font><br/>';
	
	$result = @chmod (JPATH_SITE. "/libraries/joomla/application/module/helper.php", 0666);
	if ($result)
		$result = @unlink(JPATH_SITE. "/libraries/joomla/application/module/helper.php");
	if ($result)
		$result = @rename(JPATH_SITE ."/administrator/components/com_community_acl/backup/module_helper.php", JPATH_SITE. "/libraries/joomla/application/module/helper.php");
	if (!$result)
		echo '<font color="#FF0000">Error: Unable restore from backup FE module handler</font><br/>';
		
	$result_cb = @unlink(JPATH_SITE . "/components/com_comprofiler/plugin/user/plug_caclplugin/cacl_usersync.php" );
	if (!$result_cb)
		echo '<font color="#FF0000">Error: Unable remove cACL plugin for Community Builder</font><br/>';
		
	$result = @unlink(JPATH_SITE . "/components/com_comprofiler/plugin/user/plug_caclplugin/cacl_usersync.xml" );
	if (!$result)
		echo '<font color="#FF0000">Error: Unable remove XML-file of cACL plugin for Community Builder </font><br/>';
		
	$result = @rmdir(JPATH_SITE . "/components/com_comprofiler/plugin/user/plug_caclplugin" );
	if (!$result)
		echo '<font color="#FF0000">Error: Unable remove dir of cACL plugin for Community Builder</font><br/>';
	
	$db->setQuery("DELETE FROM `#__comprofiler_plugin` WHERE `element` = 'cacl_usersync' AND `type` = 'user' AND `folder` = 'plug_caclplugin' ");
	if ($result_cb) {
		$db->query();
		if ($db->getErrorNum()) {
 			$msg .= '<font color="#FF0000">Error: Unable delete DB row:<br/>'. $db->stderr() .'</font><br/>';
		}
	}
	
	
	$result_pl = @unlink( JPATH_SITE . "/plugins/system/community_acl.php" );
	if (!$result_pl)
		echo '<font color="#FF0000">Error: Unable remove cACL system plugin</font><br/>';
		
   	$result = @unlink( JPATH_SITE . "/plugins/system/community_acl.xml" );
	if (!$result)
		echo '<font color="#FF0000">Error: Unable remove XML-file of cACL system plugin</font><br/>';
		
	$result = @unlink( JPATH_SITE . "/language/en-GB/en-GB.plg_system_community_acl.ini" );
	if (!$result)
		echo '<font color="#FF0000">Error: Unable remove language file of cACL system plugin</font><br/>';
		
	if ($result_pl) {
		$db->setQuery("DELETE FROM `#__plugins` WHERE `element` = 'community_acl'");
		$db->query(); 
		if ($db->getErrorNum()) {
			$msg .= '<font color="#FF0000">Error: Unable delete DB row:<br/>'. $db->stderr() .'</font><br/>';
		}	
	}
		
	return true;

}		
?>