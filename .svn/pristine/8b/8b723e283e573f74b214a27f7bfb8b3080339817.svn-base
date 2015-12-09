<?php
// Deny direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport( 'joomla.filesystem.folder' );
jimport( 'joomla.filesystem.file' );
jimport( 'joomla.filesystem.archive' );
		
/**
 * This is the helper file of the installer
 * during the installation process 
 **/

class caclInstaller{
	
	var $backendPath;
	var $frontendPath;
	var $successMsg;
	var $failedMsg;
	var $front;
		
	function caclInstaller(){
		$this->backendPath   = JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_community_acl' . DS;
		$this->frontendPath  = JPATH_ROOT . DS . 'components' . DS . 'com_community_acl' . DS;	
		$this->front 		 = JPATH_ROOT . DS . 'components' . DS . 'com_community_acl' . DS;
	}
	
	function getAutoSubmitFunction()
	{
		ob_start();
		?>
		<script type="text/javascript">
		var i=3;
	
		function countDown()  
		{
			if(i >= 0)
			{
				document.getElementById("timer").innerHTML = i;
				i = i-1;
				var c = window.setTimeout("countDown()", 1000);
			}
			else 
			{
				document.getElementById("installSuccesMsg").innerHTML = "Successfully Installed.";
				
			}
		}
		
		window.addEvent('domready', function() { 
			countDown();
		});
		
		</script>
		<?php
		$autoSubmit = ob_get_contents();
		@ob_end_clean();
		
		return $autoSubmit;
	}
	
	function checkRequirements(){
		$this->backendPath   = JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_community_acl' . DS;
		$this->frontendPath  = JPATH_ROOT . DS . 'components' . DS . 'com_community_acl' . DS;
	
		$status	= true;
	
		$html = '';		
		$message = '';
		
		$html .= '<h3>'.JText::_('CHECKING REQUIREMENTS'). '</h3><br/>';			
		$html .= '<div style="width:100%; float:left;">' . JText::_('USER REGISTRATION PLUGIN') . '</div>';
		if(!file_exists($this->frontendPath.'cb_plg_cacl_userreg.zip'))
		{
			$html .= "<p style=\"color:red\" >Please uninstall and re-install Commmunity ACL - cb_plg_cacl_userreg.zip was not uploaded properly!</p>";
			$status = false;
		}
		else
		{
			$html .= "<p style=\" color: green\"> cb_plg_cacl_userreg.zip file uploaded successfully</p>";
		}
		
		
		$html .= '<div style="width:100%; float:left;">' . JText::_('USER SYNC PLUGIN') . '</div>';
		if(!file_exists($this->frontendPath.'plug_cbcacl_usersync.zip'))
		{
			$html .= "<p style=\"color:red\" >Please uninstall and re-install Commmunity ACL - plug_cbcacl_usersync.zip was not uploaded properly!</p>";
			$status = false;
		}
		else
		{
			$html .= "<p style=\" color: green\"> plug_cbcacl_usersync.zip file uploaded successfully</p>";
		}
		
		
		$html .= '<div style="width:100%; float:left;">' . JText::_('JOOMLA PATCH') . '</div>';
		if(!file_exists($this->frontendPath.'joomla_patch.zip'))
		{
			$html .= "<p style=\"color:red\" >Please uninstall and re-install Commmunity ACL - joomla_patch.zip was not uploaded properly!</p>";
			$status = false;
		}
		else
		{
			$html .= "<p style=\" color: green\"> joomla_patch.zip file uploaded successfully</p>";
		}
		
		$html .= '<div style="width:100%; float:left;">' . JText::_('Community ACL PLUGIN') . '</div>';
		if(!file_exists($this->frontendPath.'plg_community_acl.zip'))
		{
			$html .= "<p style=\"color:red\" >Please uninstall and re-install Commmunity ACL - plg_community_acl.zip was not uploaded properly!</p>";
			$status = false;
		}
		else
		{  
			$html .= "<p style=\" color: green\"> plg_community_acl.zip file uploaded successfully</p>";    
		}
		
		$link = rtrim( JURI::root() , '/' ) . '/administrator/index.php?option=com_community_acl&task=install&step=2';
		$message .= $html;
		$message .= "<input type=\"button\" class=\"button-next\" onclick=\"window.location = '". $link ."'\" value=\"Next\"/>";
		
		return $message;
	}
	
	function installJoomla_Plugin(){
		
		$db =& JFactory::getDBO();
		$this->frontendPath	   	= JPATH_ROOT . DS . 'components' . DS . 'com_community_acl' . DS;
		$this->backendPath   	= JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_community_acl' . DS;

		$html = '';		
		$status = false;
		$html .= '<div id="timer" style="display:none"></div>';
		$html .= '<div id="installSuccesMsg" style="width:100%; float:left;">'.JText::_('Extracting Files...');
		$plg_cacl_zip			= $this->frontendPath . 'plg_community_acl.zip';
		
		$link = rtrim( JURI::root() , '/' ) . '/administrator/index.php?option=com_community_acl&task=install&step=3';		
		$html .= "";
		$message = "";
		$message .= "<br/>";
		$autoSubmit = "";
		#Unzip and Install Joomla! Plugin - (Frontend)
		$plg_destination 		= JPATH_ROOT . DS ."plugins/system/";
		//$plg_destination 		= $this->frontendPath;
		if( caclInstaller::extractArchive( $plg_cacl_zip , $plg_destination ) )
		{
			$autoSubmit .= caclInstaller::getAutoSubmitFunction();
			$message .= $autoSubmit.$html;
			
			//Inject the Insert query into DB
			$query = "SELECT element FROM #__plugins WHERE `element` = 'community_acl'";
			$db->setQuery( $query );
			$element = $db->loadResult();
			if($element){ //it exists
				#- Delete the record
				$query = "DELETE FROM #__plugins WHERE `element` = 'community_acl'";
				$db->setQuery( $query );
				$db->query();				
			}
			#- Insert record into DB
			$query = "INSERT INTO `#__plugins` 
						(`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, 
							`iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) 
								VALUES
									('', 'System - Community ACL', 'community_acl', 'system', 0,
										 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '')";
			$db->setQuery( $query );
			$db->query();
			$status = true;	
					
		}
		else
		{
			$html .= "<br/>";
			$errorMsg .= "<p style=\"color: red\">Plugin installation Failed! Please use the supplied install files to manually install this Joomla! plugin. This is a plugin that is required by Community ACL.</p>";
			$message .= $html.$errorMsg;			
		}
		$inputbox = "</div><table width=\"100%\" border=\"0\"><tr><td><input type=\"button\" class=\"button-next\" onclick=\"window.location = '". $link ."'\" value=\"Next\"/>
						</td></tr></table>";
		
		$message .= $inputbox;
		
		return $message;
	}
			
	function installPatch_files(){
		
		$html = '';
		
		$this->frontendPath	   	= JPATH_ROOT . DS . 'components' . DS . 'com_community_acl' . DS;
		$this->backendPath   	= JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_community_acl' . DS;
		$html .= '<div id="timer" style="display:none"></div>';
		$html .= '<div id="installSuccesMsg"><div id="timer"></div><div style="width:100%; float:left;">'.JText::_('Extracting Files...').'</div><br/>';
					
		#Unzip and Patch Files
		#Unzip Joomla Patch for Administrator
		$plg_destination 		= JPATH_ROOT . "/administrator/modules/mod_menu/";
		$joomla_patch_zip       = $this->frontendPath. "joomla_patch_administrator.zip";
		$html .= '<div style="width:100%; float:left;">'.JText::_('Patching Mod_menu...').'</div><br/>';	
		$autoSubmit = '';
		$message = '';
		$errorMsg = '';
		
		if( caclInstaller::extractArchive( $joomla_patch_zip , $plg_destination )){
			$autoSubmit .= caclInstaller::getAutoSubmitFunction();
			$message .= $autoSubmit.$html;
			
				#move the file over
				$plg_destination 		= JPATH_ROOT . "/administrator/modules/mod_menu/";
				$filename       		= JPATH_ROOT . "/administrator/modules/mod_menu/joomla_patch_administrator/helper.php";
				if(caclInstaller::moveFile($filename, $plg_destination)){
					$autoSubmit .= caclInstaller::getAutoSubmitFunction();
					$message = $autoSubmit.$html;
				}
				else{
					$errorMsg .= "<p style='color:red'>Unable to move Helper.php file over to mod_menu</p>";
					$message .= $html.$errorMsg;
				}				
		}else{
			$errorMsg = "<p style='color:red'>Unable to patch Mod_menu - Please manually patch helper.php file located at this path:".$joomla_patch_zip." using the file located in the zip file: joomla_patch_administrator.zip </p>";
			$message = $html.$errorMsg;
		}
		
		#Unzip Joomla Patch for Modules
		#Check to make that Mod_mainmenu exists first of all.		
		if(file_exists(JPATH_ROOT . "modules/mod_mainmenu/helper.php")){
			#Unzip and Patch the Libraries
			$plg_destination 		= JPATH_ROOT . "/libraries/joomla/application/module/";
			$joomla_patch_zip 		= $this->frontendPath."joomla_patch_libraries.zip";	
			$html = '<div style="width:100%; float:left;">'.JText::_('Patching Library modules...').'</div><br/>';		
			if( caclInstaller::extractArchive( $joomla_patch_zip , $plg_destination )){
				$autoSubmit .= caclInstaller::getAutoSubmitFunction();
				$message = $autoSubmit.$html;
				#move the file over
				$plg_destination 		= JPATH_ROOT . "/libraries/joomla/application/module/";
				$filename       		= JPATH_ROOT . "/libraries/joomla/application/module/joomla_patch_libraries/helper.php";
				if(caclInstaller::moveFile($filename, $plg_destination)){
					$autoSubmit .= caclInstaller::getAutoSubmitFunction();
					$message = $autoSubmit.$html;
				}
				else{
					$errorMsg .= "<p style='color:red'>Unable to move Helper.php file over to mod_mainmenu</p>";
					$message .= $html.$errorMsg;
				}	
			}else{
				$errorMsg .= "<p style='color:red'>Unable to patch libraries</p>";
				$message .= $html.$errorMsg;
			}
			
			#Unzip and Patch the Modules
			$plg_destination 		= JPATH_ROOT . "/modules/mod_mainmenu/";
			$joomla_patch_zip = $this->frontendPath."joomla_patch_modules.zip";
			$html = '<div style="width:100%; float:left;">'.JText::_('Patching Main menu module...').'</div><br/>';		
			if( caclInstaller::extractArchive( $joomla_patch_zip , $plg_destination )){
				$autoSubmit .= caclInstaller::getAutoSubmitFunction();
				$message = $autoSubmit.$html;
				#move the file over
				$plg_destination 		= JPATH_ROOT . "/modules/mod_mainmenu/";
				$filename       		= JPATH_ROOT . "/modules/mod_mainmenu/joomla_patch_libraries/helper.php";
				if(caclInstaller::moveFile($filename, $plg_destination)){
					$autoSubmit .= caclInstaller::getAutoSubmitFunction();
					$message = $autoSubmit.$html;
				}
				else{
					$errorMsg .= "<p style='color:red'>Unable to move Helper.php file over to mod_mainmenu</p>";
					$message .= $html.$errorMsg;
				}
				#-Legacy file
				$filename       		= JPATH_ROOT . "/modules/mod_mainmenu/joomla_patch_libraries/legacy.php";
				if(caclInstaller::moveFile($filename, $plg_destination)){
					$autoSubmit .= caclInstaller::getAutoSubmitFunction();
					$message = $autoSubmit.$html;
				}
				else{
					$errorMsg .= "<p style='color:red'>Unable to move Legacy.php file over to mod_mainmenu</p>";
					$message .= $html.$errorMsg;
				}				
				
			}else{
				$errorMsg .= "<p style='color:red'>Unable to patch Mod_mainmenu</p>";
				$message .= $html.$errorMsg;
			}
			$message .= "</div>";			
		}else{
			$errorMsg .= "</div><p style='color:blue'>Community ACL can not find the Joomla! mod_mainmenu module to patch. Will this cause issues for your installation? NO! - 
			This just means that any menus you disallow will be visible to your users - they will however not have access to the what you have blocked the user from doing.</p><p style='color:green'>It is safe to continue forward.</p>";
			$message .= $errorMsg;		
			
		}		
		$link = rtrim( JURI::root() , '/' ) . '/administrator/index.php?option=com_community_acl&task=install&step=4';
		$inputbox = "</div><div><table width=\"100%\" border=\"0\"><tr><td><input type=\"button\" class=\"button-next\" onclick=\"window.location = '". $link ."'\" value=\"Next\"/>
						</td></tr></table></div>";
		return $message.$inputbox;
	}
	
	function installCB_Plugin( ){
		$html = '';
		$message = '';
		$autoSubmit = '';
		$errorMsg = '';
		$db =& JFactory::getDBO();
		$this->frontendPath	   	= JPATH_ROOT . DS . 'components' . DS . 'com_community_acl' . DS;
		$this->backendPath   	= JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_community_acl' . DS;
		$html = '<div id="timer" style="display:none"></div>';
		$html .= '<div id="installSuccesMsg"><div id="timer"></div><div style="width:100%; float:left;">'.JText::_('Extracting Files...').'</div><br/>';
		
		$default_link = rtrim( JURI::root() , '/' ) . '/administrator/index.php?option=com_community_acl&task=install&step=5';
		$installCB_link = rtrim( JURI::root() , '/' ) . '/administrator/index.php?option=com_community_acl&task=install&step=4&installCB=yes';
		$installCB = JRequest::getVar('installCB');
		
		if($installCB != 'yes'){
			$autoSubmit .= caclInstaller::getAutoSubmitFunction();
			$html .= $autoSubmit;
		$html .="</div>
			<table><tr><td><h3>Would you like to install Community Builder Plugin?</h3></td></tr>
			<tr><td><input type=\"button\" id=\"btnYes\" name=\"btnYes\" value=\"Yes\" onclick=\"window.location='". $installCB_link ."'\" /></td>
			<td><input type=\"button\" id=\"btnNo\" name=\"btnNo\" value=\"No\" onclick=\"window.location='". $default_link ."'\" /></td></tr>
			</table>";
		}
		if($installCB == 'yes'){//Install CB Plugin
			$cb_plugin_zip		= $this->frontendPath . 'plug_cacl_userreg.zip';	
			#unzip Joomla File
			$destination 			= JPATH_ROOT . DS . 'components' . DS .'com_comprofiler/plugin/user/';
			$plg_destination 		= $destination;
							
			if( caclInstaller::extractArchive( $cb_plugin_zip , $plg_destination ) )
			{
				$autoSubmit .= caclInstaller::getAutoSubmitFunction();
				$message .= $autoSubmit.$html;
				
				//Inject the Insert query into DB
				$query = "SELECT element FROM #__comprofiler_plugin WHERE `element` = 'userreg'";
				$db->setQuery( $query );
				$element = $db->loadResult();
				if($element){ //it exists
					#- Delete the record
					$query = "DELETE FROM #__comprofiler_plugin WHERE `element` = 'userreg'";
					$db->setQuery( $query );
					$db->query();				
				}
				#- Insert record into DB
				$query = "INSERT INTO `#__comprofiler_plugin` 
							(`id`, `name`, `element`, `type`, `folder`, `backend_menu`, `access`, `ordering`, `published`, `iscore`, 
								`client_id`, `checked_out`, `checked_out_time`, `params`) 
									VALUES ('', 'Community ACL Registration Plugin', 'userreg', 
										'user', 'plug_cacl_userreg', '', 0, 99, 1, 0, 0, 0, '0000-00-00 00:00:00', '')";
				$db->setQuery( $query );
				$db->query();
			}
			else
			{
				$errorMsg .= "<p style='color:red'>Unable to extract plug_cacl_userreg.zip</p>";
				$message .= $html.$errorMsg;
			}
			
			#Patch the Plugin Authentication File
			$plugin_name		= $this->frontendPath . 'plug_redirect_acl.zip';
			$destination 		= JPATH_ROOT . DS . 'plugins/authentication/';
			if(caclInstaller::extractArchive($plugin_name, $destination)){
				$autoSubmit .= caclInstaller::getAutoSubmitFunction();
				$message = $autoSubmit.$html;
				//Inject the Insert query into DB
				$query = "SELECT element FROM #__plugin WHERE `element` = 'community_acl' AND `folder` = 'authentication'";
				$db->setQuery( $query );
				$element = $db->loadResult();
				if($element){ //it exists
					#- Delete the record
					$query = "DELETE FROM #__plugin WHERE `element` = 'community_acl' AND `folder` = 'authentication'";
					$db->setQuery( $query );
					$db->query();				
				}
				#- Insert record into DB
				$query = "INSERT INTO `#__plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
							('', 'User - Community ACL', 'community_acl', 'authentication', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '')";
				$db->setQuery( $query );
				$db->query();
			}else{
				$errorMsg .= "<p style='color:red'>Unable to extract plug_redirect_acl.zip</p>";
				$message .= $html.$errorMsg;
			}		
			
		$link = rtrim( JURI::root() , '/' ) . '/administrator/index.php?option=com_community_acl&task=install&step=5';
		$inputbox = "</div></div><div ><table width=\"100%\" border=\"0\"><tr><td><input type=\"button\" class=\"button-next\" onclick=\"window.location = '". $link ."'\" value=\"Next\"/>
						</td></tr></table></div>";		
		
		$message .= $inputbox;
		}						
		
		return $html.$message;				
	}
	
	function extractArchive( $source , $destination )
	{
		// Cleanup path
		$destination	= JPath::clean( $destination );
		$source			= JPath::clean( $source );
	
		return JArchive::extract( $source , $destination );
	}
	
	function moveFile( $source , $destination){
		//Cleanup path
		$destination  = JPath::clean( $destination );
		$source 	  = JPath::clean( $source );
		
		return JFile::move( $source, $destination );
	}
	
	function updateCACL_usersDB(){
		$db =& JFactory::getDBO();
		
		$query = "ALTER TABLE `#__community_acl_users` 
			ADD `redirect_FRONT` TEXT NOT NULL, 
			ADD `redirect_ADMIN` TEXT NOT NULL";
		$db->setQuery( $query );
		$db->query();
	}
	function updateCACL_tables(){
		
		# - UPDATES for Community ACL
		$db =& JFactory::getDBO();
		$query = "ALTER TABLE `#__community_acl_function_access` ADD `extra` tinyint(4) NOT NULL default '1'";
		$db->setQuery( $query );
		$db->query();
		
		$db->setQuery("ALTER TABLE `#__community_acl_config` CHANGE `value` `value` TEXT;"); 
		$db->query(); 
		
		$db->setQuery("ALTER TABLE `#__community_acl_function_access` ADD `extra` TINYINT( 4 ) DEFAULT '0' NOT NULL;"); 
		$db->query(); 
		
		$db->setQuery("ALTER TABLE `#__community_acl_groups` ADD `dosync` TINYINT( 4 ) DEFAULT '1' NOT NULL;"); 
		$db->query();
		
		$db->setQuery("ALTER TABLE `#__community_acl_roles` ADD `dosync` TINYINT( 4 ) DEFAULT '1' NOT NULL;"); 
		$db->query();
		
		$db->setQuery("ALTER TABLE `#__community_acl_functions` ADD `dosync` TINYINT( 4 ) DEFAULT '1' NOT NULL;"); 
		$db->query();
		
		$db->setQuery("ALTER TABLE `#__community_acl_roles` ADD ` redirect_FRONT ` TEXT NOT NULL , ADD ` redirect_ADMIN ` TEXT NOT NULL");
		$db->query();
		
		$db->setQuery("ALTER TABLE `#__community_acl_groups` ADD ` redirect_URL_FRONT ` TEXT NOT NULL , ADD `redirect_URL_ADMIN ` TEXT NOT NULL");
		$db->query();
			
	}
		
}
