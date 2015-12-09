<?php
/**
 * jSecure Authentication plugin for Joomla!
 * jSecure Authentication extention prevents access to administration (back end)
 * login page without appropriate access key.
 * 
 * @author      $Author: Ajay Lulia $
 * @copyright   Joomla Service Provider - 2010
 * @package     jSecure2.0.1
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     $Id: jsecure.class.php  $
*/

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class jsecure {
		
	function sendmail($JSecureConfig, $key){
		 $config   = new JConfig();
		 $to       = $JSecureConfig->emailid;	
	     $to       = ($to) ? $to :  $config->mailfrom;
		 if($to){
			$fromEmail = $config->mailfrom;
			$fromName  = $config->fromname;
			$subject   = $JSecureConfig->emailsubject;
			$body      = JText::_( 'BODY_MESSAGE:' ) .$_SERVER['REMOTE_ADDR'] . "<br/>";
			$body     .= JText::_( ' USING KEY:' ).$key;  

			JUtility::sendMail($fromEmail, $fromName, $to, $subject, $body,1);
		 }	
	}
	
	function checkUrlKey($JSecureConfig){
		
		$my =& JFactory::getUser();
		
		if((preg_match("/administrator\/*index.?\.php$/i", $_SERVER['PHP_SELF']))) {
			$sendemaildetails = $JSecureConfig->sendemaildetails;
			if(!$my->id && $JSecureConfig->key != md5(base64_encode($_SERVER['QUERY_STRING']))) {
					if($sendemaildetails == '2' || $sendemaildetails == '3'){
						$JSecureConfig->sendemail == '1' ? jsecure::sendmail($JSecureConfig,$_SERVER['QUERY_STRING']): '';
					}
					return false;
			} else {
				if($sendemaildetails == '1' || $sendemaildetails == '3'){
					$JSecureConfig->sendemail == '1' ? jsecure::sendmail($JSecureConfig,$_SERVER['QUERY_STRING']): '';
				}
				return true;
		    }
		}
	}
	
	function formAction($JSecureConfig){
							
		$oriKey           = JRequest::getVar('passkey','');
		$sendemaildetails = $JSecureConfig->sendemaildetails;
		$userkey          = md5(base64_encode(JRequest::getVar('passkey','')));
		$passkey          = $JSecureConfig->key;
		if($userkey != $passkey){
			if($sendemaildetails == '2' || $sendemaildetails == '3'){
				$JSecureConfig->sendemail == '1' ? jsecure::sendmail($JSecureConfig,$oriKey): '';
			}
			return false;
		} else {
			if($sendemaildetails == '1' || $sendemaildetails == '3'){
				$JSecureConfig->sendemail == '1' ? jsecure::sendmail($JSecureConfig,$oriKey): '';
			}
		  	return true;
		}
	}	

	function checkIps($JSecureConfig){
		$iptype = $JSecureConfig->iptype; //url key

		$iplist = $JSecureConfig->iplist;
		$IP = explode("\n",$iplist);
			switch($iptype){
				case 0:
					if(strlen(array_search($_SERVER['REMOTE_ADDR'],$IP))>0)
						return false;
					break;
				case 1:
					if(strlen(array_search($_SERVER['REMOTE_ADDR'],$IP))>0)
						return true;
					break;
				default:
					return true;
					break;
			}
			return true;
	}

	function displayForm(){
		$document =& JFactory::getDocument();
		$document->addStyleSheet(JURI::base()."plugins/system/jsecure/css/jsecure.css");
?>
		<link href='../plugins/system/jsecure/css/jsecure.css' rel='stylesheet' type='text/css' />
		<form name="key" action="index.php" method="POST">
		<table align="center" border="0">
		<tr>
			<td class="pad">
				<fieldset class="fieldset">
					<legend><?php echo JText::_( 'ADMINISTRATION_LOGIN' );?></legend>
					<table cellpadding="5" cellspacing="0" border="0" align="center" class="innerTable">
						<tr>
							<td><?php echo JText::_( 'ENTER_KEY_VALUE' );?></td>
						</tr>
						<tr>
							<td>
								<textarea name="passkey"></textarea>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input type="submit" name="submit" value="submit"/>
							</td>
						</tr>
					</table>
				</fieldset>
			</td>
		</tr>
		</table>
		</form>
<?php
	}
}
?>