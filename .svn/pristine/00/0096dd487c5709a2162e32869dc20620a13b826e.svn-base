<?php
/**
@version 1.0: mod_S5_tabshow
Author: Shape 5 - Professional Template Community
Available for download at www.shape5.com
Copyright Shape 5 LLC
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$pretext		= $params->get( 'pretext', '' );
$buttonheight	= $params->get( 's5_buttonheight', '' );
$lineheight		= $params->get( 's5_lineheight', '' );
$text1line		= $params->get( 'text1line', '' );
$text2line		= $params->get( 'text2line', '' );
$text3line		= $params->get( 'text3line', '' );
$text4line		= $params->get( 'text4line', '' );
$text5line		= $params->get( 'text5line', '' );
$text6line		= $params->get( 'text6line', '' );
$text7line		= $params->get( 'text7line', '' );
$text8line		= $params->get( 'text8line', '' );
$text9line		= $params->get( 'text9line', '' );
$text10line		= $params->get( 'text10line', '' );
$s5_buttoncolor = $params->get( 's5_buttoncolor', '' );
$s5_hoverimage = $params->get( 's5_hoverimage', '' );
$s5_hovercolor = $params->get( 's5_hovercolor', '' );
$s5_buttonimage = $params->get( 's5_buttonimage', '' );
$width  = $params->get( 's5_width', '' );

$s5_aligncolumn = $params->get( 's5_aligncolumn', '' );
$s5_fontcolor = $params->get( 's5_fontcolor', '' );
$s5_javascript = $params->get( 's5_javascript', '' );
$s5_mootoolsmouse = $params->get( 's5_mootoolsmouse', '' );
$s5_effectsani = $params->get( 's5_effectsani', '' );
$s5_effectmouse = $params->get( 's5_effectmouse', '' );
$s5_buttoncolumnwidth = ($width) - 10;

$LiveSite = JURI::base();

$s5_ts_ifvisible2 = 0;
if ($text1line != "" && $text2line == "" && $text3line == "" && $text4line == "" && $text5line == "" && $text6line == "" && $text7line == "" && $text8line == "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 1;
}
if ($text1line != "" && $text2line != "" && $text3line == "" && $text4line == "" && $text5line == "" && $text6line == "" && $text7line == "" && $text8line == "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 2;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line == "" && $text5line == "" && $text6line == "" && $text7line == "" && $text8line == "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 3;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line != "" && $text5line == "" && $text6line == "" && $text7line == "" && $text8line == "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 4;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line != "" && $text5line != "" && $text6line == "" && $text7line == "" && $text8line == "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 5;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line != "" && $text5line != "" && $text6line != "" && $text7line == "" && $text8line == "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 6;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line != "" && $text5line != "" && $text6line != "" && $text7line != "" && $text8line == "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 7;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line != "" && $text5line != "" && $text6line != "" && $text7line != "" && $text8line != "" && $text9line == "" && $text10line == "")  {
$s5_ts_ifvisible2 = 8;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line != "" && $text5line != "" && $text6line != "" && $text7line != "" && $text8line != "" && $text9line != "" && $text10line == "")  {
$s5_ts_ifvisible2 = 9;
} 
if ($text1line != "" && $text2line != "" && $text3line != "" && $text4line != "" && $text5line != "" && $text6line != "" && $text7line != "" && $text8line != "" && $text9line != "" && $text10line != "")  {
$s5_ts_ifvisible2 = 10;
} 


$buttonwidth = ($s5_ts_ifvisible2 * 125);

echo "<script language=\"javascript\" type=\"text/javascript\" >var s5_ts_ifvisible2 = ".$s5_ts_ifvisible2.";</script>";

?>

	
<script type="text/javascript" src="<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/s5_effects.js"></script>	

<?php if ($pretext != "") { ?>
<br />
<?php echo $pretext ?>
<br /><br />
<?php } ?>


<?php
$br = strtolower($_SERVER['HTTP_USER_AGENT']); // what browser.
if(ereg("msie 6", $br)) {
$iss_ie6 = "yes";
} 
else {
$iss_ie6 = "no";
}

$br = strtolower($_SERVER['HTTP_USER_AGENT']); // what browser.
if(ereg("msie 7", $br)) {
$iss_ie7 = "yes";
} 
else {
$iss_ie7 = "no";
}
?>

<script type="text/javascript">//<![CDATA[
    document.write('<link href="<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/styles.css" rel="stylesheet" type="text/css" media="screen" />');
//]]></script>


<?php if ($iss_ie6 == "yes") { ?>
<style>

ul li.active_ts_c span.s5_tabstart {
	background:none;
	filter:
	progid:dximagetransform.microsoft.alphaimageloader(src='<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/s5_tab_show_tl_a.png', sizingmethod='crop');}

ul li.active_ts_c span.s5_tabend {
	background:none;
	filter:
	progid:dximagetransform.microsoft.alphaimageloader(src='<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/s5_tab_show_tr_a.png', sizingmethod='crop');}


</style>
<?php } ?>


<?php if ($s5_javascript == "mootools") { ?>
<script type="text/javascript" src="<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/mootoolsv11.js"></script>
<script type="text/javascript" src="<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/iCarousel.js"></script>
<script language="javascript" type="text/javascript" >
window.addEvent("domready", function() {
	var s5Carousel = new iCarousel("s5_button_content2", {
		idPrevious: "s5_button_previous2",
		idNext: "",
		idToggle: "",
		item: {
			klass: "s5_button_item2",
			size: <?php echo ($width) + 35 ?>},
		animation: {
			type: "scroll",
			duration: 1000,
			amount: 1 }
	});
	<?php if ($text1line != "") { ?>
	$("copy_thumb0").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(0)});<?php } ?>	 
	<?php if ($text2line != "") { ?>
	$("copy_thumb1").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(1)});<?php } ?>	 
	<?php if ($text3line != "") { ?>
	$("copy_thumb2").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(2)});<?php } ?>	 
	<?php if ($text4line != "") { ?>
	$("copy_thumb3").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(3)});<?php } ?>	 
	<?php if ($text5line != "") { ?>
	$("copy_thumb4").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(4)});<?php } ?>	 
	<?php if ($text6line != "") { ?>
	$("copy_thumb5").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(5)});<?php } ?>	 
	<?php if ($text7line != "") { ?>
	$("copy_thumb6").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(6)});<?php } ?>	 
	<?php if ($text8line != "") { ?>
	$("copy_thumb7").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(7)});<?php } ?>	 
	<?php if ($text9line != "") { ?>
	$("copy_thumb8").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(8)});<?php } ?>	 
	<?php if ($text10line != "") { ?>
	$("copy_thumb9").addEvent("<?php if ($s5_mootoolsmouse == "click") { ?>click<?php } else {?>mouseover<?php }?>", function(event){new Event(event).stop();s5Carousel.goTo(9)});<?php } ?>
});	
</script>
<?php } ?>	 

<?php if ($s5_javascript == "s5effects") { ?>
<?php if ($s5_effectsani == "snap") { ?>
<script type="text/javascript" src="<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/s5_effects_snap.js"></script>
<?php } ?>	

<?php if ($s5_effectsani == "fade") { ?>
<script type="text/javascript" src="<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/s5_effects_fade.js"></script>
<?php } ?>	
<?php } ?>	 


		


<div style="width:<?php echo ($width) + 10?>px;height:32px;position:relative;top:8px;z-index:2;padding-left:4px;">
	<div class="s5_button_topleft" onmouseover="s5_thumbnailleft_sa();" onmouseout="s5_goleftstop_sa();"></div>
	<div id="s5_button_frame2" style="width:<?php echo ($width) - 34 ?>px;">  
		<div id="s5_itemsinner" style="position:absolute;width:<?php echo ($buttonwidth)?>px;">
			<ul id="s5navfs2">  	 
			<?php if ($text1line != "") { ?>
				 <li class="active_ts_c" id="copy_thumb0" style="color:<?php echo $s5_fontcolor ?>;" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy1();"<?php } ?> <?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb0op();shiftOpacity_ts2('s5_button_item_copy_1');<?php } ?>s5_tabshowhover_copy1();s5copy_thumb0();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#" ><?php echo $text1line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>  
			<?php if ($text2line != "") { ?>
				<li class="nonactive_ts_c" id="copy_thumb1" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy2();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb1op();shiftOpacity_ts2('s5_button_item_copy_2');<?php } ?>s5_tabshowhover_copy2();s5copy_thumb1();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text2line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text3line != "") { ?>
				<li class="nonactive_ts_c" id="copy_thumb2" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy3();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb2op();shiftOpacity_ts2('s5_button_item_copy_3');<?php } ?>s5_tabshowhover_copy3();s5copy_thumb2();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text3line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text4line != "") { ?> 
				<li class="nonactive_ts_c" id="copy_thumb3" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy4();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb3op();shiftOpacity_ts2('s5_button_item_copy_4');<?php } ?>s5_tabshowhover_copy4();s5copy_thumb3();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text4line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text5line != "") { ?>
				<li class="nonactive_ts_c" id="copy_thumb4" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy5();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb4op();shiftOpacity_ts2('s5_button_item_copy_5');<?php } ?>s5_tabshowhover_copy5();s5copy_thumb4();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text5line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text6line != "") { ?>
				<li class="nonactive_ts_c" id="copy_thumb5" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy6);"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb5op();shiftOpacity_ts2('s5_button_item_copy_6');<?php } ?>s5_tabshowhover_copy6();s5copy_thumb5();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#" ><?php echo $text6line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text7line != "") { ?> 
				<li class="nonactive_ts_c" id="copy_thumb6" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy7();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb6op();shiftOpacity_ts2('s5_button_item_copy_7');<?php } ?>s5_tabshowhover_copy7();s5copy_thumb6();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text7line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text8line != "") { ?>
				<li class="nonactive_ts_c" id="copy_thumb7" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy8();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb7op();shiftOpacity_ts2('s5_button_item_copy_8');<?php } ?>s5_tabshowhover_copy8();s5copy_thumb7();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text8line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text9line != "") { ?>
				<li class="nonactive_ts_c" id="copy_thumb8" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy9();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb8op();shiftOpacity_ts2('s5_button_item_copy_9');<?php } ?>s5_tabshowhover_copy9();s5copy_thumb8();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text9line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			<?php if ($text10line != "") { ?>
				<li class="nonactive_ts_c" id="copy_thumb9" <?php if ($s5_javascript == "mootools") { ?><?php if ($s5_mootoolsmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="s5_tabshowhover_copy10();"<?php } ?><?php if ($s5_javascript == "s5effects") { ?><?php if ($s5_effectmouse == "click") { ?>onclick<?php } else {?>onmouseover<?php }?>="<?php if ($s5_effectsani == "fade") { ?>s5copy_thumb9op();shiftOpacity_ts2('s5_button_item_copy_10');<?php } ?>s5_tabshowhover_copy10();s5copy_thumb9();"<?php } ?>><span class="s5_tabstart"></span><span class="s5_tabmiddle"><a href="#"><?php echo $text10line ?></a></span><span class="s5_tabend"></span></li>  
			<?php } ?>
			</ul>  
		</div>
     </div>  
	 <div class="s5_button_topright" onmouseover="s5_thumbnailright_sa();" onmouseout="s5_gorightstop_sa();"></div>
</div>

<script type="text/javascript">
var s5_javascriptnumber = <?php echo ($buttonwidth)?>;

var s5_javascriptleft = <?php echo ($buttonwidth) - 200;?>; 

</script>

<script type="text/javascript" src="<?php echo $LiveSite;?>/modules/mod_s5_tabshow2/s5_tabshow2/s5_tabshowbuttons.js"></script>

<div id="s5_buttonswrap_ts2" style="width:<?php echo ($width) + 17 ?>px;">
</div>
<div style="clear:both;<?php if ($iss_ie6 == "yes") { ?>margin-bottom:-14px;<?php } ?>"></div>
<?php 
$innerpadding = 4;
$innerpadding2 = 10;
$innermargin = 22;
$widthinner = ($width) - 20;?>


<div id="s5_tabshow_left2" style="width:<?php echo ($width) + 0 ?>px;<?php if ($iss_ie6 == "yes") { ?>margin-bottom:-7px;<?php } ?>">
<div id="s5_tabshow_right2" style="width:<?php echo ($width) + 5 ?>px;">
	<div style="width:<?php echo $width ?>px; overflow:hidden;">
	 <div id="s5_button2" style="width:<?php echo $width ?>px; ">  
	     <ul id="s5_button_content2" <?php if ($s5_javascript == "mootools") { ?><?php if ($iss_ie6 == "yes" || $iss_ie7 == "yes") { ?>	style="margin-left:40px;"<?php } ?><?php } ?>  <?php if ($s5_javascript == "s5effects") { ?>style="margin-left:<?php if ($iss_ie6 == "yes" || $iss_ie7 == "yes") { ?>10<?php } else {?>-30<?php } ?>px;"<?php } ?>>  
			<?php if ($text1line != "") { ?>
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_1" style="left:0px;display:block;"<?php } ?>><div style="width:<?php echo ($width) ?>px; margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">
				<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">
				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_1' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div> </li> 
	
			<?php } ?>
			<?php if ($text2line != "") { ?>		 
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_2" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px;margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">				
				<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;"><?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_2' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text3line != "") { ?>        
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_3" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px;margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">	
<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_3' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text4line != "") { ?>        
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_4" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px; margin-right:<?php echo ($innermargin) ?>px;padding-right:<?php echo ($innerpadding) ?>px;">	
<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_4' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text5line != "") { ?>        
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_5" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px;margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">
<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_5' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text6line != "") { ?>        
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_6" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px;margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">
<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_6' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text7line != "") { ?>        
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_7" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px;margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">
<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_7' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text8line != "") { ?>		
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_8" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px;margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">	
<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_8' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text9line != "") { ?>		
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_9" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px;margin-right:<?php echo ($innermargin) ?>px; padding-right:<?php echo ($innerpadding) ?>px;">
<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;">				<?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_9' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?></div></div></li>  
			<?php } ?>
			<?php if ($text10line != "") { ?>		
				<li class="s5_button_item2" <?php if ($s5_javascript == "s5effects") { ?>id="s5_button_item_copy_10" style="<?php if ($s5_effectsani == "fade") { ?>opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?><?php } ?>left:0px;display:none;"<?php } ?>><div style="width:<?php echo ($width) ?>px; margin-right:<?php echo ($innermargin) ?>px;padding-right:<?php echo ($innerpadding) ?>px;">	
				<div style="width:<?php echo ($widthinner) ?>px;padding:<?php echo ($innerpadding2) ?>px;margin-top:<?php echo ($innerpadding2) ?>px;"><?php
$myblurb_modules = &JModuleHelper::getModules( 's5_tabc_10' );
foreach ($myblurb_modules as $myblurb) {
$_options = array( 'style' => 'xhtml' );
echo JModuleHelper::renderModule( $myblurb, $_options );
} ?>
</div></div></li>  
			<?php } ?>
	     </ul>  
	 </div>
	</div>
</div>
</div>

<div id="s5_tabshow_bottomleft2"></div>
<div id="s5_tabshow_bottommiddle2" style="width:<?php echo ($width) + 3 ?>px;"></div>
<div id="s5_tabshow_bottomright2"></div>
<div style="clear:both;height:13px;"></div>

