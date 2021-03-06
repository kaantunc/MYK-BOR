<?php
// ver 05-02-2009
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.event.plugin' );

class plgAuthenticationCommunity_ACL extends JPlugin
{
	function plgAuthenticationCommunity_ACL(& $subject, $config) {
		parent::__construct($subject, $config);
	}

	function onAuthenticate($credentials, $referrer, $object){
		$id = $redirection = null;
		$db = JFactory::getDBO();
		
		
		// Check if user is valid // Quick
		$query = "SELECT id FROM #__users WHERE username = '{$credentials['username']}' ";
		$db->setQuery($query);
		$id = $db->loadResult();
		
		$query = "SELECT group_id, role_id FROM #__community_acl_users WHERE user_id = ". $id;
		$db->setQuery($query);
		$redirect = $db->loadObjectList();
		
		# -This person is a super administrator
		if(!$redirect)
			return;
			
		#Need to know if we are at the backend or the frontend
		$app =& JFactory::getApplication();
		
		$back_end = false;
		if($app->getName() != 'site') {
			$back_end = true;			
		} 
		$redirection = '';
		
		// Check to see if redirection exists for user
		if($id):
			# Check 1 - check if user has a redirect (if NOT move on)
			switch($back_end){
				case true; //Backend
					# Check 1 - User Redirect
					$query = "SELECT redirect_ADMIN FROM #__community_acl_users WHERE user_id = ". $id;
					$db->setQuery($query);
					$redirection = $db->loadResult();				
					if($redirection != '') : break; endif;
					
					# Check 2 - Role redirect
					$query = "SELECT redirect_ADMIN FROM #__community_acl_roles WHERE id = ". $redirect[0]->role_id;
					$db->setQuery($query);
					$redirection = $db->loadResult();					
					if($redirection != '') : break; endif;
					
					# Check 3 - Group redirect
					$query = "SELECT redirect_URL_ADMIN FROM #__community_acl_groups WHERE id = ". $redirect[0]->group_id;
					$db->setQuery($query);
					$redirection = $db->loadResult();					
					if($redirection != '') : break; endif;
					
					$redirection = ''; break;
					
				case false;
					#- Frontend User Redirect
					$query = "SELECT redirect_FRONT FROM #__community_acl_users WHERE user_id = ". $id;
					$db->setQuery($query);
					$redirection = $db->loadResult();
					if($redirection != '') : break; endif;
					
					# Check 2 - Role redirect
					$query = "SELECT redirect_FRONT FROM #__community_acl_roles WHERE id = ". $redirect[0]->role_id;
					$db->setQuery($query);
					$redirection = $db->loadResult();					
					if($redirection != '') : break; endif;
					
					# Check 3 - Group redirect
					$query = "SELECT redirect_URL_FRONT FROM #__community_acl_groups WHERE id = ". $redirect[0]->group_id;
					$db->setQuery($query);
					$redirection = $db->loadResult();					
					if($redirection != '') : break; endif;
					
					$redirection = ''; break;
				
				default:
					# Else do Nothing, let Joomla! handle rest through mod_login 
					$redirection = 'index.php'; break;			
			}

		endif;

		// Set SESSION var so that user can be redirected
		if($redirection):
			$session =& JFactory::getSession();
			$session->set('redirect', $redirection, 'cacl');
		endif;

		return true;
	}
}