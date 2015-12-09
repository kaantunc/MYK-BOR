<?php
/**
 * Joomla! 1.5 component egbcaptcha
 *
 * @version $Id: controller.php 2010-05-15 15:59:50 svn $
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

jimport( 'joomla.application.component.controller' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );

/**
 * egbcaptcha Controller
 *
 * @package Joomla
 * @subpackage egbcaptcha
 */
class EgbcaptchaController extends JController {
    /**
     * Constructor
     * @access private
     * @subpackage egbcaptcha
     */
    function __construct() {
        //Get View
        if(JRequest::getCmd('view') == '') {
            JRequest::setVar('view', 'default');
        }
        $this->item_type = 'Default';
        parent::__construct();
    }
}
?>