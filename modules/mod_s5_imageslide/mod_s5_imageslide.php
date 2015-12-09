<?php
/**
* @title		Shape 5 Image Slide
* @version		1.0
* @package		Joomla
* @website		http://www.shape5.com
* @copyright	Copyright (C) 2009 Shape 5 LLC. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/


// no direct access
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.mootools');
$LiveSite = JURI::root();

$pretext		= $params->get( 'pretext', '' );
$tween_time		= $params->get( 'tween_time', '' );
$s5_rotate		= $params->get( 's5_rotate', '' );
$s5_arrowshide	= $params->get( 's5_arrowshide', '' );
$s5_stopplayhide	= $params->get( 's5_stopplayhide', '' );
$s5_chooseimage	= $params->get( 's5_chooseimage', '' );
$s5_thumbnailhide	= $params->get( 's5_thumbnailhide', '' );
$height		        = $params->get( 'height', '' );
$width   		= $params->get( 'width', '' );
$picture1		= $params->get( 'picture1', '' );
$picture1link		= $params->get( 'picture1link', '' );
$picture1target		= $params->get( 'picture1target', '' );
$picture2		= $params->get( 'picture2', '' );
$picture2link		= $params->get( 'picture2link', '' );
$picture2target		= $params->get( 'picture2target', '' );
$picture3		= $params->get( 'picture3', '' );
$picture3link		= $params->get( 'picture3link', '' );
$picture3target		= $params->get( 'picture3target', '' );
$picture4		= $params->get( 'picture4', '' );
$picture4link		= $params->get( 'picture4link', '' );
$picture4target		= $params->get( 'picture4target', '' );
$picture5		= $params->get( 'picture5', '' );
$picture5link		= $params->get( 'picture5link', '' );
$picture5target		= $params->get( 'picture5target', '' );
$picture6		= $params->get( 'picture6', '' );
$picture6link		= $params->get( 'picture6link', '' );
$picture6target		= $params->get( 'picture6target', '' );
$picture7		= $params->get( 'picture7', '' );
$picture7link		= $params->get( 'picture7link', '' );
$picture7target		= $params->get( 'picture7target', '' );
$picture8		= $params->get( 'picture8', '' );
$picture8link		= $params->get( 'picture8link', '' );
$picture8target		= $params->get( 'picture8target', '' );
$picture9		= $params->get( 'picture9', '' );
$picture9link		= $params->get( 'picture9link', '' );
$picture9target		= $params->get( 'picture9target', '' );
$picture10		= $params->get( 'picture10', '' );
$picture10link		= $params->get( 'picture10link', '' );
$picture10target	= $params->get( 'picture10target', '' );
$display_time   	= $params->get( 'display_time', '' );
$s5_imageslidestyle = $params->get( 's5_imageslidestyle', '' );


jimport( 'joomla.application.component.view');

require(JModuleHelper::getLayoutPath('mod_s5_imageslide'));

?>
