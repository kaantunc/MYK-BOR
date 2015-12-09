<?php
/**
 * jSecure Authentication components for Joomla!
 * jSecure Authentication extention prevents access to administration (back end)
 * login page without appropriate access key.
 *
 * @author      $Author: Ajay Lulia $
 * @copyright   Joomla Service Provider - 2010
 * @package     jSecure2.0.1
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     $Id: controller.php  $
 */
	
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class jsecureControllerjsecure extends JController
{
	function display(){
	  	parent::display();
	}
    
	function help(){
	 	$view   = $this->getView('help','html');
	 	$view->display();
	}

	function save(){
		$result = $this->saveDetails();
		
 		if($result){
 			$link = 'index.php?option=com_jsecure';
 			$msg  = 'Details Has Been Saved';
 			$this->setRedirect($link,$msg);
 	    }
 	}
 	
 	function saveDetails(){	
 		
		jimport('joomla.filesystem.file');	
		
		$option		= JRequest::getVar('option', '', '', 'cmd');
		$post       = JRequest::get( 'post' );
		
		$basepath   = JPATH_ADMINISTRATOR .'/components/com_jsecure';
		$configFile	= $basepath.'/params.php';
		
		$xml	    = $basepath.'/com_jsecure.xml';
		
		require_once($configFile);
		
		// Read the ini file
		if (JFile::exists($configFile)) {
			$content = JFile::read($configFile);
		} else {
			$content = null;
		}

		$config = new JRegistry('JSecureConfig');

		$config_array = array();
		$config_array['publish']	                      = JRequest::getVar('publish', 0, 'post', 'int');
		$config_array['enableMasterPassword'] = JRequest::getVar('enableMasterPassword', 0, 'post', 'int');
		$config_array['master_password']       = JRequest::getVar('master_password', '', 'post', 'string');
		$config_array['passkeytype']	             = JRequest::getVar('passkeytype', 'url', 'post', 'string');
		$config_array['key']                          = JRequest::getVar('key', '', 'post', 'string');
		$config_array['options']                     = JRequest::getVar('options', 0, 'post', 'string'); 
		$config_array['custom_path']				 = JRequest::getVar('custom_path', '', 'post', 'string');
		$config_array['sendemail']				 = JRequest::getVar('sendemail', 0, 'post', 'string');
		$config_array['sendemaildetails']		 = JRequest::getVar('sendemaildetails', '3', 'post', 'string');
		$config_array['emailid']					 = JRequest::getVar('emailid', '', 'post', 'string');
		$config_array['emailsubject']				 = JRequest::getVar('emailsubject', '', 'post', 'string');
		$config_array['iptype']	                     = JRequest::getVar('iptype', 0, 'post', 'int');
		$config_array['iplist']                        = JRequest::getVar('iplist', '', 'post', 'string');
		$config_array['mpsendemail']			 = JRequest::getVar('mpsendemail', 0, 'post', 'int');
		$config_array['mpemailsubject']			 = JRequest::getVar('mpemailsubject', '', 'post', 'string');
		$config_array['mpemailid']				 = JRequest::getVar('mpemailid', '', 'post', 'string');
		
		$oldValue = new JSecureConfig();
		if($config_array['key'] == ''){
			
			$config_array['key'] = $oldValue->key;			
		} else {
			$keyvalue = $config_array['key'];
			$config_array['key'] = md5(base64_encode($config_array['key']));
		}

		if($config_array['master_password'] == ''){
			
			$config_array['master_password'] = $oldValue->master_password;			
		} else {
			$masterkeyvalue = $config_array['master_password'];
			$config_array['master_password'] = md5(base64_encode($config_array['master_password']));
		}
	
		$modifiedFieldName	=$this->checkModifiedFieldName($config_array, $oldValue, $JSecureCommon, $keyvalue, $masterkeyvalue);
		
		$config->loadArray($config_array);
		
		$fname = JPATH_COMPONENT_ADMINISTRATOR.DS.'params.php';
		
		if (JFile::write($fname, $config->toString('PHP', 'JSecureConfig', array('class' => 'JSecureConfig')))) 
			$msg = JText::_('The Configuration Details have been updated');
		 else 
			$msg = JText::_('ERRORCONFIGFILE');
	
		$JSecureConfig		  = new JSecureConfig();
		
		if($JSecureConfig->mpsendemail != '0')
			$result	= $this->sendmail($JSecureConfig, $modifiedFieldName);

		return true;
 	}

	function checkModifiedFieldName($newValue, $oldValue, $JSecureCommon, $keyvalue=null, $masterkeyvalue=null){

	$basepath   = JPATH_ADMINISTRATOR .'/components/com_jsecure';
	$commonFile	= $basepath.'/common.php';
	require_once($commonFile);
	
		foreach($newValue as $key){
			$currentKeyName =  key($newValue);
		
			if(isset($oldValue)){
			 
			 if(array_key_exists($currentKeyName, $oldValue)){
				$result=($newValue[$currentKeyName] == $oldValue->$currentKeyName) ? '1' : '0';
				
				if(!$result){
					
					switch($currentKeyName){
					
						case 'key':
						
							$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $keyvalue . '<br/>') : '<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $keyvalue . '<br/>';
							break;

						case 'master_password':
							
							$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $masterkeyvalue . '<br/>') : '<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $masterkeyvalue . '<br/>';
							break;
						
						case 'iplist':
							$IP     = explode("\n",$newValue[$currentKeyName]);
							$iplist = implode(", ",$IP);
							$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $iplist . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $iplist . '<br/>');
							break;
						
						case 'enableMasterPassword':
						$val = ($newValue[$currentKeyName] !=0) ? $enableMasterPassword[1] :  $enableMasterPassword[0];
						
						$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>');
						break;

						case 'passkeytype':
						$val = ($newValue[$currentKeyName] !=0) ? $passkeytype[1] :  $passkeytype[0];
						
						$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>');
						break;

						case 'options':
						$val = ($newValue[$currentKeyName] !=0) ? $options[1] :  $options[0];
						
						$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>');
						break;

						case 'sendemail':
						$val = ($newValue[$currentKeyName] !=0) ? $sendemail[1] :  $sendemail[0];
						
						$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>');
						break;

						case 'sendemaildetails':
							if($newValue[$currentKeyName] ==1)
								$val = $sendemaildetails[1];
							else if($newValue[$currentKeyName] == 2)
								$val = $sendemaildetails[2];
							else if($newValue[$currentKeyName] == 3)
								$val = $sendemaildetails[3];

						$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>');
						break;

						case 'iptype':
						$val = ($newValue[$currentKeyName] !=0) ? $iptype[1] :  $iptype[0];
						
						$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>');
						break;


						case 'mpsendemail':
						$val = ($newValue[$currentKeyName] !=0) ? $mpsendemail[1] :  $mpsendemail[0];
						
						$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $val . '<br/>');
						break;
						default:
						echo 'default';	
							$ModifiedValue = ($ModifiedValue != '') ? ($ModifiedValue . $JSecureCommon[$currentKeyName] . ' = ' . $newValue[$currentKeyName] . '<br/>') : ('<br/>' . $JSecureCommon[$currentKeyName] . ' = ' . $newValue[$currentKeyName] . '<br/>');
							
							break;
					}

				}	
				next($newValue);
			 }
		  }
		}
	  return $ModifiedValue;
   }
	
	function sendmail($JSecureConfig, $fieldName){
		 $config   = new JConfig();

		 $to        = $JSecureConfig->mpemailid;	
		 $to        = ($to) ? $to :  $config->mailfrom;
		 
		 if($to){
			$fromEmail  = $config->mailfrom;
			$fromName  = $config->fromname;
			$subject      = $JSecureConfig->mpemailsubject;
			$body         = JText::_( 'BODY_MESSAGE_FOR_MODIFIED_FIELDNAME:' ) .$_SERVER['REMOTE_ADDR'] . "<br/>" ;
			$body		.= $fieldName ;  

			JUtility::sendMail($fromEmail, $fromName, $to, $subject, $body,1);
		 }	
	}

	function isMasterLogged(){
		
		jimport('joomla.filesystem.file');	

		$basepath   = JPATH_ADMINISTRATOR .'/components/com_jsecure';
		$configFile	 = $basepath.'/params.php';
		
		require_once($configFile);
		
		$JSecureConfig = new JSecureConfig();
		
		if($JSecureConfig->enableMasterPassword == '0')
			return true;
		
		$session = JFactory::getSession();
		
		return $session->get('jsecure_master_logged', false);

	}

	function auth(){
	 	$view   = $this->getView('auth','html');
	 	$view->display();
	}

	function login(){
		
		jimport('joomla.filesystem.file');	

		$basepath   = JPATH_ADMINISTRATOR .'/components/com_jsecure';
		$configFile	= $basepath.'/params.php';
		
		require_once($configFile);
		
		$JSecureConfig = new JSecureConfig();

		$master_password = md5(base64_encode(JRequest::getCmd('master_password')));
		
		$ret_master_password = md5(base64_encode(JRequest::getCmd('ret_master_password')));
		
		if($master_password != $ret_master_password) {
			JError::raiseWarning(500, JText::_('MATCH_PASSWORD_ERROR'));
			$this->setRedirect('index.php?option=com_jsecure&view=auth');
			return false;
		}

		if($JSecureConfig->master_password == $master_password )
		{
			$session = JFactory::getSession();
			$session->set('jsecure_master_logged', true);
			
			$this->setRedirect('index.php?option=com_jsecure', JText::_('LOGIN_OK'));
			return true;
		} else {
			JError::raiseWarning(500, JText::_('LOGIN_ERROR'));
			$this->setRedirect('index.php?option=com_jsecure&view=auth');
			return false;
		}
	}

}