<?php
/**
 * $ModDesc
 * 
 * @version		$Id: helper.php $Revision
 * @package		modules
 * @subpackage	$Subpackage.
 * @copyright	Copyright (C) Dec 2009 LandOfCoder.com <@emai:landofcoder@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */
// no direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__).DS.'helper.php';

$list = modLofArticlesSrollerHelper::getList( $params );
// split pages following the max items display on each page.
$maxItemsPerRow = (int)$params->get( 'max_items_per_row', 3 );
$maxPages = (int)$params->get( 'max_items_per_page', 3 );
$pages = array_chunk( $list, $maxPages  );
$totalPages = count($pages);
// calculate width of each row.
$itemWidth = 100/$maxItemsPerRow -0.1;

$tmp = $params->get( 'module_height', 'auto' );
$moduleHeight   =  ( $tmp=='auto' ) ? 'auto' : (int)$tmp.'px';
$tmp = $params->get( 'module_width', 'auto' );
$moduleWidth    =  ( $tmp=='auto') ? 'auto': (int)$tmp.'px';
$openTarget 	= $params->get( 'open_target', '_parent' ); 
$class 			= !$params->get( 'navigator_pos', 0 ) ? '':'lof-'.$params->get( 'navigator_pos', 0 );
$class .= ' '. ($params->get('display_button','horizontal')=='horizontal'?'lof-horizontal':'lof-vertical'); 
$thumbWidth    = (int)$params->get( 'thumbnail_width', 180 );
$thumbHeight   = (int)$params->get( 'thumbnail_height', 60 );
$thumbnailAlignment = $params->get( 'thumbnail_alignment', '' );	
$displayButton = trim($params->get( 'display_button', '' ));
$itemLayout = trim($params->get('item_layout',''));
// $itemLayout = dirname(__FILE__).DS.'tmpl'.DS.'_item'.DS.($itemLayout?$itemLayout.".php":'image.php');
$theme		    =  $params->get( 'theme', '' ); 
$showReadmore = $params->get( 'show_readmore', '1' );
$showTitle = $params->get( 'show_title', '1' );
$showDate = $params->get( 'show_date', '0' );
modLofArticlesSrollerHelper::loadMediaFiles( $params, $module );
$itemLayoutPath = modLofArticlesSrollerHelper::getItemLayoutPath($module->module, $theme, $itemLayout  );
if( !empty($theme) ){
	$layout = trim($theme).DS.'default';
	require( JModuleHelper::getLayoutPath($module->module, $layout ) );
} else {
	require( JModuleHelper::getLayoutPath($module->module) );
}

?>
<?php if( $totalPages  > 1 ): ?>
<script type="text/javascript">
var _lofmain =  $('lofarticlessroller<?php echo $module->id; ?>'); 
var object = new LofScroller( _lofmain,
							  { 
								  fxObject:{
									transition:<?php echo $params->get( 'effect', 'Sine.easeInOut' );?>,  
									duration:<?php echo (int)$params->get('duration', '700')?>
								  },
								  startItem:<?php echo (int)$params->get('start_item',0);?>,
								  interval:<?php echo (int)$params->get('interval', '3000'); ?>,
								  direction :'<?php echo $params->get('layout_style','opacity');?>', 
								  navItemHeight:<?php echo $params->get('navitem_height', 32) ?>,
								  navItemWidth:<?php echo $params->get('navitem_width', 32) ?>,
								  navItemsDisplay:<?php echo $params->get('max_items_display', 3) ?>,
								  navPos:'<?php echo $params->get( 'navigator_pos', 0 ); ?>'
							  } );
<?php if( $displayButton ): ?>
	object.registerButtonsControl( 'click', {next:_lofmain.getElement('.lof-next'),
											 previous:_lofmain.getElement('.lof-previous')} );
<?php endif; ?>
	object.start( <?php echo $params->get('auto_start',1)?>, null );	
</script>
<?php endif; ?>

