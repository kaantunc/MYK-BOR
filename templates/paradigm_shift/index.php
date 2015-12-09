<?php

$menu = & JSite::getMenu();
$isFrontpage = $menu->getActive() == $menu->getDefault();

require('vertex/cms_core_functions.php');
s5_restricted_access_call();
/*
-----------------------------------------
Paradigm Shift - June 2011 - Shape 5 Club Design
-----------------------------------------
Site:      shape5.com
Email:     contact@shape5.com
@license:  Copyrighted Commercial Software
@copyright (C) 2011 Shape 5 LLC

*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php s5_language_call(); ?>>
<head>

<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/paradigm_shift/js/jquery-1.7.1.min.js"></script><script type="text/javascript" src="<?php echo $LiveSiteUrl;?>includes/js/DataTables-1.9.0/media/js/jquery.dataTables.js"></script><script type="text/javascript" src="<?php echo $LiveSiteUrl;?>modules/mod_s5_box/js/jquery.no.conflict.js"></script>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/paradigm_shift/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/jquery.maskedinput-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/lang/validate-tr.js"></script>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/paradigm_shift/js/jquery.tooltip.pack.js"></script>

<link type="text/css" href="<?php echo $LiveSiteUrl;?>templates/paradigm_shift/css/jquery.tooltip.css" rel="stylesheet">

<script type="text/javascript">
jQuery(function(){
	jQuery(".menuRowInner .module_round_box_outer").each(
		function(index){
			if((index+1) % 3 != 0)
				jQuery(this).addClass("menuRowItem");
		}
	);
});
</script>
<script type="text/javascript">

jQuery(function(){

	var rowsPerPageSelectHtml = '<div class="rowsPerPageDiv">Sayfadaki satır sayısı:'+
	'<select id="rowsPerPageSelect">'+
	'<option selected="selected">10</option>'+
	'<option>20</option>'+
	'<option>50</option>'+
	'<option>100</option>'+
	'<option value="99999">Tümü</option>'+
'</select></div>'+
'<div style="clear: right"></div>';
	
	jQuery(rowsPerPageSelectHtml).insertAfter('table.sortable');
	
	jQuery("#rowsPerPageSelect").change(function(){
	    var elem = jQuery(this);
	    var tableClasses = jQuery("table.sortable").attr("class").split(" ");
		for(var i = 0; i<tableClasses.length;i++ ){
			if(tableClasses[i].indexOf("paginate")!=-1)
				jQuery("table.sortable").removeClass(tableClasses[i]);
		}
		jQuery("table.sortable").addClass("paginate-" + elem.val());
		tablePaginater.init();
	});
});

//jQuery(function(){
//	jQuery(".icBtnsWrapper a").tooltip({ 
//	    delay: 0, 
//	    showURL: false,
//	})
//});

// push footer to bottom
//jQuery(function(){
//	var height = jQuery(window).height() 
//		- jQuery("#s5_menu_login_wrap").height() 
//		- jQuery("#s5_header_area1").height()
//		- jQuery("#s5_footer_area1").height()
//		- 71;
//	
//	var s5_columns_wrapElem =  jQuery("#s5_columns_wrap");
//	var s5_center_areaElem = jQuery("#s5_center_area");
//	
//	if(s5_center_areaElem.height() < height)
//		s5_columns_wrapElem.css("height", height)
//});
</script>

<script type="text/javascript">
jQuery(function(){
jQuery(".icBtnsWrapper a").tooltip({ 
    delay: 0, 
    showURL: false
});

var nomenu = '<?php echo $_GET['nomenu']; ?>';
	if(nomenu == 1){
		jQuery("#s5_menu_login_wrap").hide();
		jQuery(".menuRow").hide();
	}
});

</script>

<?php s5_head_call(); ?>

<?php

// It is recommended that you do not edit below this line.
///////////////////////////////////////////////////////////////////////////////////////
require("vertex/parameters.php");
require("vertex/general_functions.php");
require("vertex/module_calcs.php");

// Mobile device settings
if ($s5_mobile_device_enable_disable == "enabled") {
	require("vertex/mobile_device_detect.php");
	mobile_device_detect();
	if(isset($_GET['switch'])){
		$mobile = $_GET['switch']; // should be either 1 for true or empty for false
		setcookie('switch',$_GET['switch']); // set a cookie
		if(isset($_SERVER['HTTP_REFERER'])){ // if the referer is set send the user there
			header('Location:'.$_SERVER['HTTP_REFERER']);
			exit;
		}
	}else if(isset($_COOKIE['switch'])){ // if the cookie is set use it
		$mobile = $_COOKIE['switch'];
	}else{ // else use the function to detect if it's a mobile or not
		$mobile = mobile_device_detect();
	}
}
if ($s5_mobile_device_enable_disable == "disabled") {
	$mobile = false;}

if ($mobile==true) {
	require("vertex/mobile_device_menu.php");}
?>

<meta http-equiv="Content-Type" content="text/html;" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<?php if($mobile==true){ ?>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=1;" />
<meta name="apple-touch-fullscreen" content="YES" />
<?php } ?>

<?php if ($mobile == false && $s5_show_menu == "show") { require("vertex/call_menu.php"); } ?>
<?php require("vertex/css_and_js.php"); ?>

<style type="text/css"> 

.s5_highlight, .s5_scrolltotop, .moduletable h3, a, #s5_button_wrap2 .s5_ts_active a, .componentheading, #comments a, #s5_middle_menu_wrap a, #cboxContent h3, .contentpagetitle, .contentheading, .module_round_box .menu #current a, .module_round_box .menu #current a, h2, h4, div.s5_accordion_menu_element #current a, #current span.s5_accordion_menu_left a.mainlevel, .add_to_cart .button, a.readon, #s5_login, #s5_register, a.readmore-link, a.comments-link {
color:#<?php echo $s5_highlight ?>;
}

#s5_center_area .s5_h3_first{
color:#FFFFFF;
}

.s5_highlight_line, .button, #s5_nav li.active {
background-color:#<?php echo $s5_highlight ?>;
}

#s5_nav li.mainMenuParentBtnFocused {
background-color:#FFFFFF;
-webkit-box-shadow:none;
-moz-box-shadow:none;
box-shadow:none;
}

#s5_nav li.mainMenuParentBtnFocused .S5_parent_subtext {
color:#333333;
}

#s5_nav li.mainMenuParentBtnFocused a {
color:#000000;
}

/*#s5_top_row1_area1, #s5_bottom_row3_area1, #s5_top_row1_wrap, #s5_bottom_row3_wrap {
behavior: url(<?php echo $s5_directory_path ?>/css/PIE.htc);
background: #<?php echo $s5_highlight ?>; /* Old browsers */
background: -moz-linear-gradient(top, #<?php echo change_Color($s5_highlight,'-26'); ?> 0%, #<?php echo $s5_highlight ?> 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#<?php echo change_Color($s5_highlight,'-26'); ?>), color-stop(100%,#<?php echo $s5_highlight ?>)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #<?php echo change_Color($s5_highlight,'-26'); ?> 0%,#<?php echo $s5_highlight ?> 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #<?php echo change_Color($s5_highlight,'-26'); ?> 0%,#<?php echo $s5_highlight ?> 100%); /* Opera11.10+ */
background: -ms-linear-gradient(top, #<?php echo change_Color($s5_highlight,'-26'); ?> 0%,#<?php echo $s5_highlight ?> 100%); /* IE10+ */
background: linear-gradient(top, #<?php echo change_Color($s5_highlight,'-26'); ?> 0%,#<?php echo $s5_highlight ?> 100%); /* W3C */
-pie-background: linear-gradient(top, #<?php echo change_Color($s5_highlight,'-26'); ?> 0%,#<?php echo $s5_highlight ?> 100%); /* W3C */
}*/

#s5_top_row1_wrap a, #s5_bottom_row3_wrap a {
color:#<?php echo change_Color($s5_highlight,'-120'); ?>;
}

.button:hover {
background:#<?php echo change_Color($s5_highlight,'-26'); ?>;
}

#s5_nav li a {
color:#000000;
}

body {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 

<?php if ($browser == "ie7" || $browser == "ie8") { ?>
#s5_login, #s5_register, .s5_scrolltotop, .readon, a.readon, a.readmore-link, a.comments-link {
padding-top:2px;
border:solid 1px #C8C7C7;
position:relative;
}
.s5_highlight_line {
margin-bottom:-1px;
}
<?php } ?>

<?php if ($browser == "ie7") { ?>
#s5_search_wrap #mod_search_searchword {
margin-top:2px;
}
#s5_search_wrap .button {
margin-top:2px;
vertical-align:top;
}
#fontControls {
margin-top:2px;
}
#s5_accordion_menu h3 {
margin-bottom:0px;
}
#s5_accordion_menu h3.s5_am_not_parent {
margin-bottom:9px;
}
<?php } ?>

<?php if ($browser == "ie8") { ?>
#s5_center_area .module_round_box, #s5_component_wrap, #s5_center_area .moduletable, #s5_center_area .module_round_box-plain, #s5_center_area .module_round_box .s5_mod_h3, #s5_center_area .module_round_box-dark, #s5_center_area .module_round_box-dark .s5_mod_h3, #s5_center_area .module_round_box-medium, #s5_center_area .module_round_box-medium .s5_mod_h3 {
behavior: url(<?php echo $s5_directory_path ?>/css/PIE.htc);
position:relative;
}
.mainParentBtn a {
display:block;
}
.isim-goster{
top: 25px;
}
<?php } ?>

<?php if ($browser == "ie9") { ?>
#s5_accordion_menu h3 {
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#ffffff', EndColorStr='#F2F0F0'); /* IE9 */
}
#s5_menu_login_wrap, #s5_footer_area1 {
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#fcfcfc', EndColorStr='#e0e0e0'); /* IE9 */
}
#s5_top_row1_area1, #s5_bottom_row3_area1, #s5_top_row1_wrap, #s5_bottom_row3_wrap {
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#<?php echo change_Color($s5_highlight,'-26'); ?>', EndColorStr='#<?php echo $s5_highlight ?>'); /* IE9 */
}
.isim-goster{
top: 25px;
}
<?php } ?>

<?php if ($browser == "ie7" || $browser == "ie8" || $browser == "ie9") { ?>
.s5_lr_tab_inner {writing-mode: bt-rl;filter: flipV flipH;}
<?php } ?>

<?php if($s5_thirdparty == "enabled") { ?>
/* k2 stuff */
div.itemHeader h2.itemTitle, div.catItemHeader h3.catItemTitle, h3.userItemTitle a, #comments-form p, #comments-report-form p, #comments-form span, #comments-form .counter, #comments .comment-author, #comments .author-homepage,
#comments-form p, #comments-form #comments-form-buttons, #comments-form #comments-form-error, #comments-form #comments-form-captcha-holder {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 
<?php } ?>	
.s5_wrap{width:<?php echo $s5_body_width; echo $s5_fixed_fluid ?>;}	
</style>

</head>

<body id="s5_body">
<div id="s5_scrolltotop"></div>
<!-- Mobile version -->	
<?php if($mobile==true){ 
require("vertex/mobile_device_layout.php");
} ?>
<!-- End mobile version -->	


<!-- PC version -->	
<?php if($mobile==false){ ?>

	<!-- Fixed Tabs -->	
	<?php require("vertex/fixed_tabs.php"); ?>
	

	<!-- Header -->		

		<div id="s5_header_area1">		
		<div id="s5_header_area2">	
		<div id="s5_header_area_inner" class="s5_wrap">					
			<div id="s5_header_wrap">
			
				<?php if($s5_pos_logo == "published") { ?>
					<div id="s5_logo_module">
						<jdoc:include type="modules" name="logo" style="notitle" />
					</div>	
				<?php } else { ?>
					<div id="s5_logo" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'"></div>
				<?php } ?>
				
				<?php if($s5_pos_banner == "published") { ?>
					<div id="s5_pos_banner">
						<jdoc:include type="modules" name="banner" style="notitle" />
					</div>	
				<?php }?>
				
				
				<div style="float:right;width:320px;">
				
				<?php if ($s5_pos_search == "published" || $s5_rss  != "" || $s5_twitter  != "" || $s5_facebook  != "" || $s5_font_resizer == "yes") { ?>
					<div id="s5_font_icon_search_wrap">
					
						<?php if ($s5_pos_search == "published") { ?>
							<div id="s5_search_wrap">
								<?php s5_module_call('search','notitle'); ?>
							</div>
						<?php } ?>
					
						<?php if (($s5_rss  != "") || ($s5_twitter  != "") || ($s5_facebook  != "")) { ?>
							<div id="s5_header_icons">
								<?php if ($s5_rss  != "") { ?>
									<div id="s5_rss" onclick="window.open('<?php echo $s5_rss; ?>')"></div>
								<?php } ?>
								<?php if ($s5_twitter  != "") { ?>
									<div id="s5_twitter" onclick="window.open('<?php echo $s5_twitter; ?>')"></div>
								<?php } ?>
								<?php if ($s5_facebook  != "") { ?>
									<div id="s5_facebook" onclick="window.open('<?php echo $s5_facebook; ?>')"></div>
								<?php } ?>		
							</div>
						<?php } ?>
						
						<?php if($s5_font_resizer == "yes") { ?>
							<div id="fontControls">
							</div>
						<?php } ?>
						
					</div>
				<?php } ?>

				
				<?php if (($s5_login  != "") || ($s5_register  != "")) { ?>	
					<div id="s5_loginreg">
						<div class="isim-goster" style="">
							<jdoc:include type="modules" name="isimgoster" style="notitle" />
						</div>
						
						<div id="s5_logregtm">
							<?php if ($s5_register  != "") { ?>
							<?php  $user =& JFactory::getUser();   
							  $user_id = $user->get('id');   
							  if ($user_id) { } else {?>
							<div id="s5_register" class="s5box_register"><ul class="s5boxmenu"><li><span><span><?php echo $s5_register;?></span></span></li></ul></div>
							<?php } ?>
							<?php } ?>
							
							<?php if ($s5_login  != "") { ?>
							<div id="s5_login" class="s5box_login"><ul class="s5boxmenu"><li><span><span>
								<?php  $user =& JFactory::getUser();   
							  $user_id = $user->get('id');   
							  if ($user_id) { echo $s5_loginout; } else {?>
								<?php echo $s5_login;?>
								<?php } ?>
								</span></span></li></ul></div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				</div>
				
				<div style="clear:both; height:0px"></div>			
			</div>
		</div>
		</div>
		</div>
		
		<?php if ($s5_show_menu == "show" || $s5_login  != "" || $s5_register  != "") { ?>
		
			<div id="s5_menu_login_wrap">
			<div id="s5_menu_login_wrap_inner" class="s5_wrap">
			
				<?php if ($s5_show_menu == "show") { ?>
				<div id="s5_menu_wrap">
					<?php include("vertex/s5flex_menu/default.php"); ?>
				</div>
				<?php } ?>
			
			</div>
			</div>
			
			<div class="s5_highlight_line"></div>
			<div style="clear:both;height:0px"></div>
		
		<?php } ?>
		
	<!-- End Header -->	
		
	<div class="bodyInner">
	<!-- Top Row1 -->	
		<?php if ($s5_pos_top_row1_1 == "published" || $s5_pos_top_row1_2 == "published" || $s5_pos_top_row1_3 == "published" || $s5_pos_top_row1_4 == "published" || $s5_pos_top_row1_5 == "published" || $s5_pos_top_row1_6 == "published") { ?>
		
			<div id="s5_top_row1_area1">
			<div style="width:950px;margin:0 auto"><jdoc:include type="message" /></div>
			<div id="s5_top_row1_area2">
			<div id="s5_top_row1_area_inner" class="s5_wrap">

				<div id="s5_top_row1_wrap">
					<div id="s5_top_row1">
					<div id="s5_top_row1_inner">
					
						<?php if ($s5_pos_top_row1_1 == "published") { ?>
							<div id="s5_pos_top_row1_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_1_width ?>%">
								<?php s5_module_call('top_row1_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_2 == "published") { ?>
							<div id="s5_pos_top_row1_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_2_width ?>%">
								<?php s5_module_call('top_row1_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_3 == "published") { ?>
							<div id="s5_pos_top_row1_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_3_width ?>%">
								<?php s5_module_call('top_row1_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_4 == "published") { ?>
							<div id="s5_pos_top_row1_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_4_width ?>%">
								<?php s5_module_call('top_row1_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_5 == "published") { ?>
							<div id="s5_pos_top_row1_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_5_width ?>%">
								<?php s5_module_call('top_row1_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_6 == "published") { ?>
							<div id="s5_pos_top_row1_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_6_width ?>%">
								<?php s5_module_call('top_row1_6','round_box'); ?>
							</div>
						<?php } ?>
						
						<div style="clear:both; height:0px"></div>

					</div>
					</div>
				</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Top Row1 -->	
	
	<div id="s5_center_area">
	
	<?php if ($s5_pos_breadcrumb == "published") { ?>
		<div class="s5_wrap"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width + 12?>px"<?php }?>>
		<div id="s5_breadcrumb_wrap">
			<jdoc:include type="modules" name="breadcrumb" style="notitle" />
		</div>
		</div>
		<div style="clear:both;"></div>
	<?php } ?>
		
	<!-- Top Row2 -->	
		<?php if ($s5_pos_top_row2_1 == "published" || $s5_pos_top_row2_2 == "published" || $s5_pos_top_row2_3 == "published" || $s5_pos_top_row2_4 == "published" || $s5_pos_top_row2_5 == "published" || $s5_pos_top_row2_6 == "published") { ?>
		<div id="s5_top_row2_area1">
		<div id="s5_top_row2_area2">
		<div id="s5_top_row2_area_inner" class="s5_wrap"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width + 12?>px"<?php }?>>			
		
			<div id="s5_top_row2_wrap">
				<div id="s5_top_row2">
				<div id="s5_top_row2_inner">					
					<?php if ($s5_pos_top_row2_1 == "published") { ?>
						<div id="s5_pos_top_row2_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_1_width ?>%">
							<?php s5_module_call('top_row2_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_2 == "published") { ?>
						<div id="s5_pos_top_row2_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_2_width ?>%">
							<?php s5_module_call('top_row2_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_3 == "published") { ?>
						<div id="s5_pos_top_row2_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_3_width ?>%">
							<?php s5_module_call('top_row2_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_4 == "published") { ?>
						<div id="s5_pos_top_row2_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_4_width ?>%">
							<?php s5_module_call('top_row2_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_5 == "published") { ?>
						<div id="s5_pos_top_row2_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_5_width ?>%">
							<?php s5_module_call('top_row2_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_6 == "published") { ?>
						<div id="s5_pos_top_row2_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_6_width ?>%">
							<?php s5_module_call('top_row2_6','round_box'); ?>
						</div>
					<?php } ?>						
					<div style="clear:both; height:0px"></div>
				</div>
				</div>	
			</div>	
				
		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Top Row2 -->
	
	
	
	<!-- Top Row3 -->	
		<?php if ($s5_pos_top_row3_1 == "published" || $s5_pos_top_row3_2 == "published" || $s5_pos_top_row3_3 == "published" || $s5_pos_top_row3_4 == "published" || $s5_pos_top_row3_5 == "published" || $s5_pos_top_row3_6 == "published") { ?>
		<div id="s5_top_row3_area1">	
		<div id="s5_top_row3_area2">
		<div id="s5_top_row3_area_inner" class="s5_wrap"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width - 4?>px"<?php }?>>
		
			<div id="s5_top_row3_wrap">
				<div id="s5_top_row3">
				<div id="s5_top_row3_inner">
				
					<?php if ($s5_pos_top_row3_1 == "published") { ?>
						<div id="s5_pos_top_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_1_width ?>%">
							<?php s5_module_call('top_row3_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_2 == "published") { ?>
						<div id="s5_pos_top_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_2_width ?>%">
							<?php s5_module_call('top_row3_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_3 == "published") { ?>
						<div id="s5_pos_top_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_3_width ?>%">
							<?php s5_module_call('top_row3_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_4 == "published") { ?>
						<div id="s5_pos_top_row3_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_4_width ?>%">
							<?php s5_module_call('top_row3_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_5 == "published") { ?>
						<div id="s5_pos_top_row3_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_5_width ?>%">
							<?php s5_module_call('top_row3_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_6 == "published") { ?>
						<div id="s5_pos_top_row3_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_6_width ?>%">
							<?php s5_module_call('top_row3_6','round_box'); ?>
						</div>
					<?php } ?>						
					<div style="clear:both; height:0px"></div>

				</div>
				</div>
			</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Top Row3 -->	
		
		
		
	<!-- Center area -->	
		<?php if ($s5_frontpage == "yes" || $s5_pos_left_top == "published" || $s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_bottom == "published" || $s5_pos_right_top == "published" || $s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_bottom == "published" || $s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published" || $s5_pos_above_columns_1 == "published" ||  $s5_pos_above_columns_2 == "published" ||  $s5_pos_above_columns_3 == "published" ||  $s5_pos_above_columns_4 == "published" ||  $s5_pos_above_columns_5 == "published" ||  $s5_pos_above_columns_6 == "published" ||  $s5_pos_below_columns_1 == "published" ||  $s5_pos_below_columns_2 == "published" ||  $s5_pos_below_columns_3 == "published" ||  $s5_pos_below_columns_4 == "published" ||  $s5_pos_below_columns_5 == "published" ||  $s5_pos_below_columns_6 == "published") { ?>
		
		<div id="s5_center_area1">
		<div id="s5_center_area2">
		<div id="s5_center_area_inner" class="s5_wrap<?php if($isFrontpage == true){echo " frontpage";}?>"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width-4?>px"<?php }?>>
		
		<!-- Above Columns Wrap -->	
			<?php if ($s5_pos_above_columns_1 == "published" || $s5_pos_above_columns_2 == "published" || $s5_pos_above_columns_3 == "published" || $s5_pos_above_columns_4 == "published" || $s5_pos_above_columns_5 == "published" || $s5_pos_above_columns_6 == "published") { ?>
			<div id="s5_above_columns_wrap1">	
			<div id="s5_above_columns_wrap2">
			<div id="s5_above_columns_inner" class="s5_wrap"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width + 12?>px"<?php }?>>

					
						<?php if ($s5_pos_above_columns_1 == "published") { ?>
							<div id="s5_above_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_1_width ?>%">
								<?php s5_module_call('above_columns_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_2 == "published") { ?>
							<div id="s5_above_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_2_width ?>%">
								<?php s5_module_call('above_columns_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_3 == "published") { ?>
							<div id="s5_above_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_3_width ?>%">
								<?php s5_module_call('above_columns_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_4 == "published") { ?>
							<div id="s5_above_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_4_width ?>%">
								<?php s5_module_call('above_columns_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_5 == "published") { ?>
							<div id="s5_above_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_5_width ?>%">
								<?php s5_module_call('above_columns_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_6 == "published") { ?>
							<div id="s5_above_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_6_width ?>%">
								<?php s5_module_call('above_columns_6','round_box'); ?>
							</div>
						<?php } ?>						
						<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>
			<?php } ?>
		<!-- End Above Columns Wrap -->			
				
			<!-- Columns wrap, contains left, right and center columns -->	
			<div id="s5_columns_wrap"<?php if($isFrontpage == true){echo ' class="frontpage"';}?>>
			<div id="s5_columns_wrap_inner">
				
				<div id="s5_center_column_wrap">
				<div id="s5_center_column_wrap_inner"<?php if($isFrontpage == true){echo ' class="frontpage"';}?> style="margin-left:<?php echo $s5_center_column_margin_left ?>px; margin-right:<?php echo $s5_center_column_margin_right ?>px;">
					
					<?php if ($s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published") { ?>
					
						<div id="s5_middle_top_wrap">
							
							<div id="s5_middle_top">
							<div id="s5_middle_top_inner">
							
								<?php if ($s5_pos_middle_top_1 == "published") { ?>
									<div id="s5_pos_middle_top_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_1_width ?>%">
										<?php s5_module_call('middle_top_1','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_2 == "published") { ?>
									<div id="s5_pos_middle_top_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_2_width ?>%">
										<?php s5_module_call('middle_top_2','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_3 == "published") { ?>
									<div id="s5_pos_middle_top_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_3_width ?>%">
										<?php s5_module_call('middle_top_3','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_4 == "published") { ?>
									<div id="s5_pos_middle_top_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_4_width ?>%">
										<?php s5_module_call('middle_top_4','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_5 == "published") { ?>
									<div id="s5_pos_middle_top_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_5_width ?>%">
										<?php s5_module_call('middle_top_5','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_6 == "published") { ?>
									<div id="s5_pos_middle_top_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_6_width ?>%">
										<?php s5_module_call('middle_top_6','round_box'); ?>
									</div>
								<?php } ?>						
								<div style="clear:both; height:0px"></div>

							</div>
							</div>
						
						</div>

					<?php } ?>
					
					<?php if ($s5_frontpage == "yes" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>
						
						<div id="s5_component_wrap">
<div style="width:950px;margin:0 auto"><jdoc:include type="message" /></div>

						<div id="s5_component_wrap_inner">
						
							<?php if ($s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published") { ?>
						
								<div id="s5_above_body_wrap">
									
									<div id="s5_above_body">
									<div id="s5_above_body_inner">
									
										<?php if ($s5_pos_above_body_1 == "published") { ?>
											<div id="s5_pos_above_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_1_width ?>%">
												<?php s5_module_call('above_body_1','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_2 == "published") { ?>
											<div id="s5_pos_above_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_2_width ?>%">
												<?php s5_module_call('above_body_2','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_3 == "published") { ?>
											<div id="s5_pos_above_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_3_width ?>%">
												<?php s5_module_call('above_body_3','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_4 == "published") { ?>
											<div id="s5_pos_above_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_4_width ?>%">
												<?php s5_module_call('above_body_4','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_5 == "published") { ?>
											<div id="s5_pos_above_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_5_width ?>%">
												<?php s5_module_call('above_body_5','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_6 == "published") { ?>
											<div id="s5_pos_above_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_6_width ?>%">
												<?php s5_module_call('above_body_6','fourdivs'); ?>
											</div>
										<?php } ?>						
										<div style="clear:both; height:0px"></div>

									</div>
									</div>
								
								</div>

							<?php } ?>
									
							<?php if ($s5_frontpage == "yes") { ?>
							
								<?php s5_component_call(); ?>
								<div style="clear:both;height:0px"></div>
								
							<?php } ?>
							
							<?php if ($s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>
						
								<div id="s5_below_body_wrap">			
								
									<div id="s5_below_body">
									<div id="s5_below_body_inner">
									
										<?php if ($s5_pos_below_body_1 == "published") { ?>
											<div id="s5_pos_below_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_1_width ?>%">
												<?php s5_module_call('below_body_1','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_2 == "published") { ?>
											<div id="s5_pos_below_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_2_width ?>%">
												<?php s5_module_call('below_body_2','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_3 == "published") { ?>
											<div id="s5_pos_below_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_3_width ?>%">
												<?php s5_module_call('below_body_3','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_4 == "published") { ?>
											<div id="s5_pos_below_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_4_width ?>%">
												<?php s5_module_call('below_body_4','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_5 == "published") { ?>
											<div id="s5_pos_below_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_5_width ?>%">
												<?php s5_module_call('below_body_5','fourdivs'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_6 == "published") { ?>
											<div id="s5_pos_below_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_6_width ?>%">
												<?php s5_module_call('below_body_6','fourdivs'); ?>
											</div>
										<?php } ?>						
										<div style="clear:both; height:0px"></div>

									</div>
									</div>
								</div>

							<?php } ?>
							
						</div>
						</div>
						
					<?php } ?>
					
					<?php if ($s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published") { ?>
					
						<div id="s5_middle_bottom_wrap">
							
							<div id="s5_middle_bottom">
							<div id="s5_middle_bottom_inner">
							
								<?php if ($s5_pos_middle_bottom_1 == "published") { ?>
									<div id="s5_pos_middle_bottom_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_1_width ?>%">
										<?php s5_module_call('middle_bottom_1','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_2 == "published") { ?>
									<div id="s5_pos_middle_bottom_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_2_width ?>%">
										<?php s5_module_call('middle_bottom_2','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_3 == "published") { ?>
									<div id="s5_pos_middle_bottom_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_3_width ?>%">
										<?php s5_module_call('middle_bottom_3','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_4 == "published") { ?>
									<div id="s5_pos_middle_bottom_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_4_width ?>%">
										<?php s5_module_call('middle_bottom_4','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_5 == "published") { ?>
									<div id="s5_pos_middle_bottom_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_5_width ?>%">
										<?php s5_module_call('middle_bottom_5','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_6 == "published") { ?>
									<div id="s5_pos_middle_bottom_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_6_width ?>%">
										<?php s5_module_call('middle_bottom_6','round_box'); ?>
									</div>
								<?php } ?>						
								<div style="clear:both; height:0px"></div>

							</div>
							</div>
						
						</div>

					<?php } ?>
					
				</div>
				</div>
				<!-- Left column -->	
				<?php if($s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_top == "published" || $s5_pos_left_bottom == "published") { ?>
					<div id="s5_left_column_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
					<div id="s5_left_column_wrap_inner">
						<?php if($s5_pos_left_top == "published") { ?>
							<div id="s5_left_top_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
								<?php s5_module_call('left_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left == "published") { ?>
							<div id="s5_left_wrap" class="s5_float_left" style="width:<?php echo $s5_left_width ?>px">
								<?php s5_module_call('left','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_inset == "published") { ?>
							<div id="s5_left_inset_wrap" class="s5_float_left" style="width:<?php echo $s5_left_inset_width ?>px">
								<?php s5_module_call('left_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_bottom == "published") { ?>
							<div id="s5_left_bottom_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
								<?php s5_module_call('left_bottom','round_box'); ?>
							</div>
						<?php } ?>
					</div>
					</div>
				<?php } ?>
				<!-- End Left column -->	
				<!-- Right column -->	
				<?php if($s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_top == "published" || $s5_pos_right_bottom == "published") { ?>
					<div id="s5_right_column_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px; margin-left:-<?php echo $s5_right_column_width + $s5_left_column_width ?>px">
					<div id="s5_right_column_wrap_inner">
						<?php if($s5_pos_right_top == "published") { ?>
							<div id="s5_right_top_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px">
								<?php s5_module_call('right_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_inset == "published") { ?>
							<div id="s5_right_inset_wrap" class="s5_float_left" style="width:<?php echo $s5_right_inset_width ?>px">
								<?php s5_module_call('right_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right == "published") { ?>
							<div id="s5_right_wrap" class="s5_float_left" style="width:<?php echo $s5_right_width ?>px">
								<?php s5_module_call('right','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_bottom == "published") { ?>
							<div id="s5_right_bottom_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px">
								<?php s5_module_call('right_bottom','round_box'); ?>
							</div>
						<?php } ?>
					</div>
					</div>
				<?php } ?>
				<!-- End Right column -->	
			</div>
			</div>
			<!-- End columns wrap -->	
			
		<!-- Below Columns Wrap -->	
			<?php if ($s5_pos_below_columns_1 == "published" || $s5_pos_below_columns_2 == "published" || $s5_pos_below_columns_3 == "published" || $s5_pos_below_columns_4 == "published" || $s5_pos_below_columns_5 == "published" || $s5_pos_below_columns_6 == "published") { ?>
			<div id="s5_below_columns_wrap1">	
			<div id="s5_below_columns_wrap2">
			<div id="s5_below_columns_inner" class="s5_wrap"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width + 12?>px"<?php }?>>

					
						<?php if ($s5_pos_below_columns_1 == "published") { ?>
							<div id="s5_below_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_1_width ?>%">
								<?php s5_module_call('below_columns_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_2 == "published") { ?>
							<div id="s5_below_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_2_width ?>%">
								<?php s5_module_call('below_columns_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_3 == "published") { ?>
							<div id="s5_below_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_3_width ?>%">
								<?php s5_module_call('below_columns_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_4 == "published") { ?>
							<div id="s5_below_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_4_width ?>%">
								<?php s5_module_call('below_columns_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_5 == "published") { ?>
							<div id="s5_below_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_5_width ?>%">
								<?php s5_module_call('below_columns_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_6 == "published") { ?>
							<div id="s5_below_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_6_width ?>%">
								<?php s5_module_call('below_columns_6','round_box'); ?>
							</div>
						<?php } ?>						
						<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>
			<?php } ?>
		<!-- End Below Columns Wrap -->				
			
			
		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Center area -->	
	
	
	<!-- Bottom Row1 -->	
		<?php if ($s5_pos_bottom_row1_1 == "published" || $s5_pos_bottom_row1_2 == "published" || $s5_pos_bottom_row1_3 == "published" ) { ?>
			<div id="s5_bottom_row1_area1">
			<div id="s5_bottom_row1_area2">
			<div id="s5_bottom_row1_area_inner" style="width:946px;" class="s5_wrap<?php if($isFrontpage == true){echo " frontpage";}?>"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width -4?>px"<?php }?>>

				<div id="s5_bottom_row1_wrap">
					<div id="s5_bottom_row1">
					<div id="s5_bottom_row1_inner">
					
						<?php if ($s5_pos_bottom_row1_1 == "published") { ?>
							<!-- <div id="s5_pos_bottom_row1_1" class="bottom_row s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_1_width ?>%;<?php echo $s5_pos_bottom_row1_margin1;?>"> -->
							<div id="s5_pos_bottom_row1_1" class="bottom_row s5_float_left" style="width:306px;<?php echo $s5_pos_bottom_row1_margin1;?>">
								<?php s5_module_call('bottom_row1_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_bottom_row1_2 == "published") { ?>
							<!-- <div id="s5_pos_bottom_row1_2" class="bottom_row s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_2_width ?>%;<?php echo $s5_pos_bottom_row1_margin2;?>"> -->
							<div id="s5_pos_bottom_row1_2" class="bottom_row s5_float_left" style="width:306px;<?php echo $s5_pos_bottom_row1_margin2;?>">
								<?php s5_module_call('bottom_row1_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_bottom_row1_3 == "published") { ?>
							<!-- <div id="s5_pos_bottom_row1_3" class="bottom_row s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_3_width ?>%;<?php echo $s5_pos_bottom_row1_margin3;?>"> -->
							<div id="s5_pos_bottom_row1_3" class="bottom_row s5_float_left" style="width:306px;<?php echo $s5_pos_bottom_row1_margin3;?>">
								<?php s5_module_call('bottom_row1_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<div style="clear:both; height:0px"></div>

					</div>
					</div>
				</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Bottom Row1 -->	
		
		
	<!-- Bottom Row2 -->	
		<?php if ($s5_pos_bottom_row2_1 == "published" || $s5_pos_bottom_row2_2 == "published" || $s5_pos_bottom_row2_3 == "published") { ?>
		<div id="s5_bottom_row2_area1">
		<div id="s5_bottom_row2_area2">
		<div id="s5_bottom_row2_area_inner" style="width:946px;background:#FFFFFF" class="s5_wrap"<?php if ($s5_fixed_fluid == "px") { ?> style="width:<?php echo $s5_body_width ?>px"<?php }?>>			
		
			<div id="s5_bottom_row2_wrap">
				<div id="s5_bottom_row2">
				<div id="s5_bottom_row2_inner">					
					<?php if ($s5_pos_bottom_row2_1 == "published") { ?>
						<div id="s5_pos_bottom_row2_1" class="bottom_row s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_1_width ?>%;<?php echo $s5_pos_bottom_row2_margin1;?>">
							<?php s5_module_call('bottom_row2_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row2_2 == "published") { ?>
						<div id="s5_pos_bottom_row2_2" class="bottom_row s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_2_width ?>%;<?php echo $s5_pos_bottom_row2_margin2;?>">
							<?php s5_module_call('bottom_row2_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row2_3 == "published") { ?>
						<div id="s5_pos_bottom_row2_3" class="bottom_row s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_3_width ?>%;<?php echo $s5_pos_bottom_row2_margin3;?>">
							<?php s5_module_call('bottom_row2_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<div style="clear:both; height:0px"></div>
				</div>
				</div>	
			</div>	
				
		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Bottom Row2 -->
	
		
	<!-- Menu Row -->
	
	<div class="menuRow">
		<?php if($this->countModules('menu_row')){?>
		<div class="menuRowInner">
		<?php s5_module_call('menu_row','round_box'); ?>
		<div style="clear:both;"></div>
		</div>
		<?php }?>
	</div>
	
	<!-- End Menu Row -->
	
	</div>
	
	<!-- Bottom Row3 -->	
		<?php if ($s5_pos_bottom_row3_1 == "published" || $s5_pos_bottom_row3_2 == "published" || $s5_pos_bottom_row3_3 == "published") { ?>
		<div class="s5_highlight_line"></div>
		<div id="s5_bottom_row3_area1">	
		<div id="s5_bottom_row3_area2">
		<div id="s5_bottom_row3_area_inner" class="s5_wrap">
		
			<div id="s5_bottom_row3_wrap">
				<div id="s5_bottom_row3">
				<div id="s5_bottom_row3_inner">
				
					<?php if ($s5_pos_bottom_row3_1 == "published") { ?>
						<div id="s5_pos_bottom_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_1_width ?>%">
							<?php s5_module_call('bottom_row3_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row3_2 == "published") { ?>
						<div id="s5_pos_bottom_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_2_width ?>%">
							<?php s5_module_call('bottom_row3_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row3_3 == "published") { ?>
						<div id="s5_pos_bottom_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_3_width ?>%">
							<?php s5_module_call('bottom_row3_3','round_box'); ?>
						</div>
					<?php } ?>
									
					<div style="clear:both; height:0px"></div>

				</div>
				</div>
			</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Bottom Row3 -->
	
	<!-- Footer Area -->
		<div id="s5_footer_area1">
		<div id="s5_footer_area2">
		<div id="s5_footer_area_inner" class="s5_wrap">
			
			<?php if($s5_pos_bottom_menu) { ?>
				<div id="s5_bottom_menu_wrap">
					<?php s5_module_call('bottom_menu','notitle'); ?>
				</div>	
			<?php } ?>
			
			<?php if($s5_pos_footer == "published") { ?>
				<div id="s5_footer_module">
					<?php s5_module_call('footer','notitle'); ?>
				</div>	
			<?php } else { ?>
				<div id="s5_footer">
					<?php require("vertex/footer.php"); ?>
				</div>
			<?php } ?>
			
			<?php require("vertex/page_scroll.php"); ?>
			
			<div style="clear:both; height:0px"></div>
			
		</div>
		</div>
		</div>
	<!-- End Footer Area -->
	</div>
	<?php s5_module_call('debug','fourdivs'); ?>
	
	<!-- Page scroll, tooltips, multibox, and ie6 warning -->	
	
	<?php require("vertex/tooltips_and_multibox.php"); ?>
	<?php require("vertex/ie6_warning.php"); ?>

	
<?php } ?>
<!-- End pc version -->	

<script type="text/javascript">
if(typeof createTables == 'function')
	createTables();

if(typeof createPanels == 'function')
	createPanels();
/* Copyright (c) 2009 Mustafa OZCAN (http://www.mustafaozcan.net)
* Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
* and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
* Version: 1.0
* Requires: jquery.1.2.6+
*/
(function($) { $.fn.bestupper = function(settings) { var defaults = { ln: 'en', clear: true }, settings = $.extend({}, defaults, settings); this.each(function() { var $this = $(this); if ($this.is('textarea') || $this.is('input:text')) { $this.keypress(function(e) { var pressedKey = e.charCode == undefined ? e.keyCode : e.charCode; var str = String.fromCharCode(pressedKey); if (pressedKey < 97 || pressedKey > 122) { if (settings.ln == 'en' || !isTRChar(pressedKey)) return; } if (settings.ln == 'tr' && pressedKey == 105) str = '\u0130'; if (this.createTextRange) { window.event.keyCode = str.toUpperCase().charCodeAt(0); return; } else { var startpos = this.selectionStart; var endpos = this.selectionEnd; this.value = this.value.substr(0, startpos) + str.toUpperCase() + this.value.substr(endpos); this.setSelectionRange(startpos + 1, startpos + 1); return false; } }); if (settings.clear) { $this.blur(function(e) { if (settings.ln == 'tr') this.value = this.value.replace(/i/g, "\u0130"); this.value = this.value.replace(/^\s+|\s+$/g, "").replace(/\s{2,}/g, " ").toUpperCase(); }); } } }); }; function isTRChar(key) { var trchar = [231, 246, 252, 287, 305, 351]; for (var i = 0; i < trchar.length; i++) { if (trchar[i] == key) return true; } return false; } })(jQuery);
jQuery(document).ready(function (){
	jQuery("#satirEkle_ongorulenYeterlilik").click(function (){
		jQuery(".uppercase").bestupper({  ln: 'tr'});
		});
	jQuery("#satirEkle_meslek_standart").click(function (){
		jQuery(".uppercase").bestupper({  ln: 'tr'});
		});
jQuery(".uppercase").bestupper({  ln: 'tr'});
	
	jQuery(".tarihsecbuton").live("click",function (){
		jQuery('.DynarchCalendar-topCont').animate({
		    left: jQuery(window).width()/2		  
		  }, 100, function() {
		    // Animation complete.
		  });
	});
});
</script>
<!--Google Analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30473919-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--Google Analytics-->	
</body>
</html>