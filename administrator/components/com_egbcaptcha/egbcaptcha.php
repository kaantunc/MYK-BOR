<?php
/**
 * Joomla! 1.5 component egbcaptcha
 *
 * @version $Id: egbcaptcha.php 2010-05-15 15:59:50 svn $
 * @author egbsystems
 * @package Joomla
 * @subpackage egbcaptcha
 * @license GNU/GPL
 *
 * Custom captcha For All Forms Developed by EGBSYSTEMS 
 *
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/*
 * Define constants for all pages
 */
define( 'COM_EGBCAPTCHA_DIR', 'images'.DS.'egbcaptcha'.DS );
define( 'COM_EGBCAPTCHA_BASE', JPATH_ROOT.DS.COM_EGBCAPTCHA_DIR );
define( 'COM_EGBCAPTCHA_BASEURL', JURI::root().str_replace( DS, '/', COM_EGBCAPTCHA_DIR ));

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Require the base controller
require_once JPATH_COMPONENT.DS.'helpers'.DS.'helper.php';

// Initialize the controller
$controller = new EgbcaptchaController( );

// Perform the Request task
$controller->execute( JRequest::getCmd('task'));
$controller->redirect();
?>