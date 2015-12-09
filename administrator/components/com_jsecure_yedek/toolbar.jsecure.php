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
 * @version     $Id: toolbar.jsecure.php  $
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );

switch($task) {
	case 'help':
		TOOLBAR_jsecure::_help();
	break;
	default:
		TOOLBAR_jsecure::_DEFAULT();
	break;
}

?>