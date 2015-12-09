<?php
/**
@version 1.0: mod_S5_imageslide
Author: Shape 5 - Professional Template Community
Available for download at www.shape5.com
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$LiveSite = JURI::root();
JHTML::_('behavior.mootools');
$mainframe = & JFactory::getDocument();

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



$tween_time = $tween_time*1000;
$display_time = $display_time*1000;


if ($picture1target == "1") {
$picture1target = "_blank"; }
if ($picture1target == "0") {
$picture1target = "_top"; }
if ($picture2target == "1") {
$picture2target = "_blank"; }
if ($picture2target == "0") {
$picture2target = "_top"; }
if ($picture3target == "1") {
$picture3target = "_blank"; }
if ($picture3target == "0") {
$picture3target = "_top"; }
if ($picture4target == "1") {
$picture4target = "_blank"; }
if ($picture4target == "0") {
$picture4target = "_top"; }
if ($picture5target == "1") {
$picture5target = "_blank"; }
if ($picture5target == "0") {
$picture5target = "_top"; }
if ($picture6target == "1") {
$picture6target = "_blank"; }
if ($picture6target == "0") {
$picture6target = "_top"; }
if ($picture7target == "1") {
$picture7target = "_blank"; }
if ($picture7target == "0") {
$picture7target = "_top"; }
if ($picture8target == "1") {
$picture8target = "_blank"; }
if ($picture8target == "0") {
$picture8target = "_top"; }
if ($picture9target == "1") {
$picture9target = "_blank"; }
if ($picture9target == "0") {
$picture9target = "_top"; }
if ($picture10target == "1") {
$picture10target = "_blank"; }
if ($picture10target == "0") {
$picture10target = "_top"; }

require(JModuleHelper::getLayoutPath('mod_s5_imageslide')); ?>


<?php if ($pretext != "") { ?>
<br />
<?php echo $pretext ?>
<br /><br />
<?php } ?>





