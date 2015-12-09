<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'TEMPLATEPATH', dirname(__FILE__) );
/*
-----------------------------------------
Elegance - September 2009 Shape 5 Club Template
-----------------------------------------
Site:      www.shape5.com
Email:     contact@shape5.com
@license:  Copyrighted Commercial Software
@copyright (C) 2009 Shape 5

*/
// Template Configuration    

	$s5_menu = $this->params->get ("xml_s5_menu"); 
	$s5_body_width = $this->params->get ("xml_s5_body_width");
	$s5_left_width = $this->params->get ("xml_s5_left_width");
	$s5_right_width = $this->params->get ("xml_s5_right_width");
	$s5_mainmodulewidth = $this->params->get ("xml_s5_mainmodulewidth");
	$s5_insetwidth = $this->params->get ("xml_s5_insetwidth");
	$s5_tooltips = $this->params->get ("xml_s5_tooltips");
	$s5_lytebox = $this->params->get ("xml_s5_lytebox");
	$s5_headerback  = $this->params->get ("xml_s5_headerback");

	$s5_login = $this->params->get ("xml_s5_login");
	$s5_register  = $this->params->get ("xml_s5_register");	
	$s5_twitter = $this->params->get ("xml_s5_twitter");
	$s5_rss = $this->params->get ("xml_s5_rss");
	$s5_backcolor = $this->params->get ("xml_s5_backcolor");	
	$s5_urlforSEO = $this->params->get ("xml_s5_seourl");
	
	$s5_color = $this->params->get ("xml_s5_color");


////////////////////////  DO NOT EDITBELOW THIS  ////////////////////////
// Middle content calculations
if (!$this->countModules("left") && !$this->countModules("right")) { $s5_mainbody_width = (($s5_body_width) - 39); }
else if ($this->countModules("left") && !$this->countModules("right")) { $s5_mainbody_width = $s5_body_width - ($s5_left_width + 52);}
else if (!$this->countModules("left") && $this->countModules("right")) { $s5_mainbody_width = $s5_body_width - ($s5_right_width + 52);}
else if ($this->countModules("left") && $this->countModules("right")) { $s5_mainbody_width = $s5_body_width - (($s5_left_width + $s5_right_width) + 66); }

$s5_smmodulewidth = ($s5_body_width - $s5_mainmodulewidth) - 10;
$s5_insetmainwidth = ($s5_mainbody_width - $s5_insetwidth) - 65;

// advert 1, 2, and 3 collapse calculations 
if ($this->countModules("advert1") && $this->countModules("advert2")  && $this->countModules("advert3")) { $advert="33"; }
else if ($this->countModules("advert1") && $this->countModules("advert2") && !$this->countModules("advert3")) { $advert="50"; }
else if ($this->countModules("advert1") && !$this->countModules("advert2") && $this->countModules("advert3")) { $advert="50"; }
else if (!$this->countModules("advert1") && $this->countModules("advert2") && $this->countModules("advert3")) { $advert="50"; }
else if ($this->countModules("advert1") && !$this->countModules("advert2") && !$this->countModules("advert3")) { $advert="100"; }
else if (!$this->countModules("advert1") && $this->countModules("advert2") && !$this->countModules("advert3")) { $advert="100"; }
else if (!$this->countModules("advert1") && !$this->countModules("advert2") && $this->countModules("advert3")) { $advert="100"; }

// advert 4, 5, and 6 collapse calculations 
if ($this->countModules("advert4") && $this->countModules("advert5")  && $this->countModules("advert6")) { $advert2="33"; }
else if ($this->countModules("advert4") && $this->countModules("advert5") && !$this->countModules("advert6")) { $advert2="50"; }
else if ($this->countModules("advert4") && !$this->countModules("advert5") && $this->countModules("advert6")) { $advert2="50"; }
else if (!$this->countModules("advert4") && $this->countModules("advert5") && $this->countModules("advert6")) { $advert2="50"; }
else if ($this->countModules("advert4") && !$this->countModules("advert5") && !$this->countModules("advert6")) { $advert2="100"; }
else if (!$this->countModules("advert4") && $this->countModules("advert5") && !$this->countModules("advert6")) { $advert2="100"; }
else if (!$this->countModules("advert4") && !$this->countModules("advert5") && $this->countModules("advert6")) { $advert2="100"; }

// contentbottom 1, 2, and 3 collapse calculations 
if ($this->countModules("contentbottom1") && $this->countModules("contentbottom2")  && $this->countModules("contentbottom3")) { $contentbottom="33"; }
else if ($this->countModules("contentbottom1") && $this->countModules("contentbottom2") && !$this->countModules("contentbottom3")) { $contentbottom="50"; }
else if ($this->countModules("contentbottom1") && !$this->countModules("contentbottom2") && $this->countModules("contentbottom3")) { $contentbottom="50"; }
else if (!$this->countModules("contentbottom1") && $this->countModules("contentbottom2") && $this->countModules("contentbottom3")) { $contentbottom="50"; }
else if ($this->countModules("contentbottom1") && !$this->countModules("contentbottom2") && !$this->countModules("contentbottom3")) { $contentbottom="100"; }
else if (!$this->countModules("contentbottom1") && $this->countModules("contentbottom2") && !$this->countModules("contentbottom3")) { $contentbottom="100"; }
else if (!$this->countModules("contentbottom1") && !$this->countModules("contentbottom2") && $this->countModules("contentbottom3")) { $contentbottom="100"; }

//user1 and 2 calculations
if ($this->countModules("user1") && $this->countModules("user2")) { $user23="50"; }
else if (!$this->countModules("user1") && $this->countModules("user2")) { $user23="100";  }
else if ($this->countModules("user1") && !$this->countModules("user2")) { $user23="100";  }

//user3, 4, 5, 6 and 7 calculations
if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7")) { $bottom4="20"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="25"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="25"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7")) { $bottom4="25"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7")) { $bottom4="25"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5")  && $this->countModules("user6") && $this->countModules("user7")) { $bottom4="25"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7")) { $bottom4="33";  }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="33";  }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="33";  }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && $this->countModules("user7")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="33";  }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && $this->countModules("user7")) { $bottom4="33";  }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="50"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7")) { $bottom4="50"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7")) { $bottom4="50"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="50"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="50"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="50"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && $this->countModules("user7")) { $bottom4="50"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7")) { $bottom4="100"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7")) { $bottom4="100"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6") && !$this->countModules("user7")) { $bottom4="100"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6") && !$this->countModules("user7")) { $bottom4="100"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6") && $this->countModules("user7")) { $bottom4="100"; }


if (($s5_menu  == "1") || ($s5_menu  == "3") || ($s5_menu  == "4")){ 
require( TEMPLATEPATH.DS."s5_no_moo_menu.php");}
else if ($s5_menu  == "2")  {
require( TEMPLATEPATH.DS."s5_suckerfish.php");}
$menu_name = $this->params->get ("xml_menuname");


if ($s5_urlforSEO  == ""){ 
$LiveSiteUrl = JURI::root();}
if ($s5_urlforSEO  != ""){ 
$LiveSiteUrl = "$s5_urlforSEO/";}
//$mainframe->addCustomHeadTag('<script src="'.$LiveSiteUrl.'administrator/components/com_chronocontact/js/jquery-1.4.1.js" type="text/javascript"></script>');


$document = &JFactory::getDocument();
$document->addScript( $LiveSiteUrl.'/templates/elegance/js/jquery-1.4.2.min.js' );
$document->addScript( $LiveSiteUrl.'/templates/elegance/js/jquery.validate.min.js' );
$document->addScript( $LiveSiteUrl.'/templates/elegance/js/jquery.maskedinput-1.3.min.js' );
$document->addScript( $LiveSiteUrl.'/templates/elegance/js/lang/validate-tr.js' );

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<jdoc:include type="head" />
<meta http-equiv="Content-Type" content="text/html; <?php echo "_ISO"; ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />


	
<?php if ($s5_color  == "1") { ?>
<link href="<?php echo $LiveSiteUrl;?>templates/elegance/css/default.css" rel="stylesheet" type="text/css" media="screen" />
<?php } ?>
<?php if ($s5_color  == "2") { ?>
<link href="<?php echo $LiveSiteUrl;?>templates/elegance/css/dark.css" rel="stylesheet" type="text/css" media="screen" />
<?php } ?>

<?php if($this->countModules('inset')) { ?>
	<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/s5_effects.js"></script>
<?php } ?>
<script type="text/javascript">//<![CDATA[
document.write('<link href="<?php echo $LiveSiteUrl;?>templates/elegance/css/editor.css" rel="stylesheet" type="text/css" media="screen" />');
//]]></script>
<?php 
// Disable lytebox when VM is loaded 
if (JRequest::getVar('option') == 'com_virtuemart' ) { 
 } else { ?>
<?php if ($s5_lytebox  == "yes") { ?>
<link href="<?php echo $LiveSiteUrl;?>templates/elegance/css/lytebox.css" rel="stylesheet" type="text/css" media="screen" />
<?php } ?>
<?php } ?>

<link href="<?php echo $LiveSiteUrl;?>templates/elegance/css/suckerfish.css" rel="stylesheet" type="text/css" media="screen" />

<?php 
// Disable lytebox when VM is loaded 
if (JRequest::getVar('option') == 'com_virtuemart' ) { 
 } else { ?>
<?php if ($s5_lytebox  == "yes") { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/lytebox.js"></script>
<?php } ?>
<?php } ?>

<?php
$br = strtolower($_SERVER['HTTP_USER_AGENT']); // what browser.
if(ereg("msie 6", $br)) {
$is_ie6 = "yes";
} 
else {
$is_ie6 = "no";
}

$br = strtolower($_SERVER['HTTP_USER_AGENT']); // what browser.
if(ereg("msie 7", $br)) {
$is_ie7 = "yes";
} 
else {
$is_ie7 = "no";
}
if(ereg("msie 8", $br)) {
$is_ie8 = "yes";
} 
else {
$is_ie8 = "no";
}
?>
	
<?php if ($is_ie6 == "yes" || $is_ie7 == "yes" || $is_ie8 == "yes") { ?>	
<?php if (($s5_menu  == "1") || ($s5_menu  == "2") || ($s5_menu  == "3") || ($s5_menu  == "4")) { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/IEsuckerfish.js"></script>
<?php } ?>	
<?php } ?>	

<style type="text/css"> 
.s5_wrap {width:<?php echo ($s5_body_width);?>px;}
.s5_wrap2 {width:<?php echo ($s5_body_width) + 30;?>px;}

#s5_headermid { width:<?php echo ($s5_body_width) - 26;?>px;}
.s5_w_modbm { width:<?php echo ($s5_body_width) - 6;?>px;}
.s5_mb_m_inner {width:<?php echo ($s5_mainbody_width) + 25;?>px;}
.s5_mb_btm {width:<?php echo ($s5_mainbody_width) + 25;?>px;}
.s5_mb_bbm {width:<?php echo ($s5_mainbody_width) + 25;?>px;}
.s5_mb_mr {width:<?php echo ($s5_mainbody_width) + 33;?>px;}
.s5_btm {width:<?php echo ($s5_body_width) + 25;?>px;}
.s5_bbm {width:<?php echo ($s5_body_width) + 25;?>px;}
.s5_m_inner {width:<?php echo ($s5_body_width) + 25;?>px;}

.s5_blackmods_tm, .s5_blackmods_tbm, .s5_lightmods_tm {width:<?php echo ($s5_mainbody_width) + 25;?>px;}
.s5_blackmodsoutter {width:<?php echo ($s5_mainbody_width) + 31;?>px;}
.s5_whitemodsoutter {width:<?php echo ($s5_mainbody_width) + 31;?>px;}
.s5_w_modbm_whmods {width:<?php echo ($s5_mainbody_width) + 27;?>px;}

.s5_bblack_outter {width:<?php echo ($s5_body_width) - 2;?>px;}
.s5_bblack_tm  {width:<?php echo ($s5_body_width) - 11;?>px;}
.s5_bblack_bm  {width:<?php echo ($s5_body_width) - 8;?>px;}

#s5_breadcrumbmiddle {width:<?php echo ($s5_body_width) - 6;?>px;}

#s5_footermiddle {width:<?php echo ($s5_body_width) - 20;?>px;}



<?php if($this->countModules('inset')) { ?>
.s5_mainmiddletm {width:<?php echo (($s5_mainbody_width) + 6) - $s5_insetwidth;?>px;}
.s5_mainmiddleinnerwrap {width:<?php echo (($s5_mainbody_width) + 12) - $s5_insetwidth;?>px;}
.s5_mainmiddletbm {width:<?php echo (($s5_mainbody_width) + 6) - $s5_insetwidth;?>px;}
<?php } else {?>	
.s5_mainmiddletm {width:<?php echo ($s5_mainbody_width) + 17;?>px;}
.s5_mainmiddleinnerwrap {width:<?php echo ($s5_mainbody_width) + 23;?>px;}
.s5_mainmiddletbm {width:<?php echo ($s5_mainbody_width) + 17;?>px;}
<?php }	?>

</style>
<!--[if IE]>
	<style type="text/css"> 
	#s5box_one{
		padding-left: 25px; 
		padding-top: 15px; 
		padding-right: 25px; 
		padding-bottom: 15px;
	}
	
	#s5_navv ul li.s5_menubottom, #s5_fm_ul0 ul li.s5_menubottom, #s5_navv ul li.s5_menubottom:hover, #s5_fm_ul0 ul li.s5_menubottom:hover {
	background:none;
	filter:
	progid:dximagetransform.microsoft.alphaimageloader(src='<?php echo $LiveSiteUrl;?>templates/elegance/images/default/Shape5_elegance_menubottom.png', sizingmethod='crop');}

	#s5_navv ul li.s5_menutop, #s5_navv ul li.s5_menutop:hover {
	background:none;
	filter:
	progid:dximagetransform.microsoft.alphaimageloader(src='<?php echo $LiveSiteUrl;?>templates/elegance/images/default/Shape5_elegance_menutop.png', sizingmethod='crop');}

	</style>
<![endif]-->

<?php if ($is_ie6 == "yes") { ?>
<!--[if IE 6]>
<?php if ($s5_color  == "1") { ?>
	<?php include("templates/elegance/iestyles.php"); ?>
<?php } ?>
<?php if ($s5_color  == "2") { ?>
	<?php include("templates/elegance/iestylesdark.php"); ?>
<?php } ?>
<![endif]-->
<?php } ?>

<?php if ($is_ie7 == "yes") {?>
<style type="text/css"> 
.button {padding-left: 5px; padding-right: 5px; margin-left: 15px;padding-bottom: 5px; padding-top: 2px;}
</style>
<?php } ?>


</head>
<body style="background:<?php echo $s5_backcolor; ?> url(<?php echo $s5_headerback; ?>) repeat-x;">


<!-- Header -->
<div class="s5_wrap">

	<div id="s5_headerleft"></div>
	<div id="s5_headermid">
		<div id="s5_headerglow">
			<div id="s5_headleft" <?php if ($is_ie6 == "yes") { ?>style="height:124px;"<?php } ?>>		
				<div id="s5_topmenu">
					<?php if($this->countModules('top')) { ?>
						<jdoc:include type="modules" name="top" style="xhtml" />	
					<?php } ?>
				</div>
				<div style="clear:both;"></div>
				<div id="s5_logo" style="cursor:pointer;" onclick="window.document.location.href='index.php'"></div>	
			
				
			</div>
			<div id="s5_headright">
<?php //echo 'count: ' .$this->countModules('toprightleft'); 
	if($this->countModules('toprightleft')) { ?>
				<div style="float:left">
				<jdoc:include type="modules" name="toprightleft" style="xhtml" />
				</div>
			<?php } ?>
				<?php
				$user =& JFactory::getUser();

				
				if ($s5_register  != "" && $user->guest) { ?>
				<div id="s5_register" class="s5box_two">
				<?php
					echo $s5_register;
				?>
				</div>
				<?php } ?>
				<?php if ($s5_login != "") { ?>
				<div id="s5_login" class="s5box_one">
				<?php
				if($user->guest)
					echo $s5_login;
				else
					echo 'Çıkış';
					?>
				</div>
				<?php } ?>
			<div style="clear:both;"></div>
		
				<?php if($this->countModules('search')) { ?>	
					<div id="s5_topgradsearch">
						<jdoc:include type="modules" name="search" style="xhtml" />	
					</div>
				<?php } ?>	
			</div>
			
				<div style="clear:both;"></div>
			<?php if (($s5_menu  == "1") || ($s5_menu  == "2") || ($s5_menu  == "3") || ($s5_menu  == "4")) { ?>	
			<div style="padding:0;margin-bottom:-3px;">
			<!-- Start Menu -->
				<div id="s5_menu">
					<div id="s5_navv">
								<?php mosShowListMenu($menu_name);	?>
								<?php if ($s5_menu  == "1") { ?>
									<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/s5_no_moo_menu.js"></script>																		
								<?php } ?>
								<?php if ($s5_menu  == "3") { ?>
									<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/s5_fading_no_moo_menu.js"></script>																		
								<?php } ?>	
								<?php if ($s5_menu  == "4") { ?>
									<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/s5_scroll_down_no_moo_menu.js"></script>																		
								<?php } ?>	
					</div>	
				</div>
			<!-- End Menu -->
			</div>
			<?php } ?>	
		</div>
	</div>
	<div id="s5_headerright"></div>
		<div style="clear:both;"></div>
	
	<div class="s5_leftshadow"></div>
	<div class="s5_rightshadow"></div>

</div>
<!-- End Header -->



<div style="clear:both;"></div>



<?php if($this->countModules('topleft') || $this->countModules('topright')) { ?>	
<!-- Top Modules -->
<div class="s5_wrap">
		<div class="s5_toplefrig">
				<?php if($this->countModules('topleft')) { ?>
					<div id="s5_topleft" style="width:<?php echo ($s5_mainmodulewidth);?>px;">
						<jdoc:include type="modules" name="topleft" style="round_box" />	
					</div>
				<?php } ?>
				
				<?php if($this->countModules('topright')) { ?>
				<div id="s5_topright" style="width:<?php echo ($s5_smmodulewidth) + 1;?>px;">
				<div class="s5_whitemodtl"></div>
				<div class="s5_whitemodtm" style="width:<?php echo ($s5_smmodulewidth) - 13;?>px;"></div>
				<div class="s5_whitemodtr"></div>
				<div style="clear:both;"></div>
				<div class="s5_whitemodleftwrap">
					<div class="s5_whitemodrightwrap" style="width:<?php echo ($s5_smmodulewidth) + 1;?>px;">
						<div class="s5_backmiddlemiddle_r" style="width:<?php echo ($s5_smmodulewidth) - 13;?>px;">
							<jdoc:include type="modules" name="topright" style="round_box" />	
						<div style="clear:both;"></div>
						
						</div>
					</div>
				</div>
				<div class="s5_whitemodtbl"></div>
				<div class="s5_whitemodtbm" style="width:<?php echo ($s5_smmodulewidth) - 13;?>px;"></div>
				<div class="s5_whitemodtbr"></div>
				<div style="clear:both;"></div>
				</div>
				<?php } ?>
				<div style="clear:both;"></div>
		</div>
</div>
<!-- End Top Modules -->
<?php } ?>






<div style="clear:both;"></div>

<div class="s5_wrap" <?php if ($is_ie6 == "yes") { ?>style="padding-left:29px;"<?php } ?>>	
<?php if($this->countModules('advert1') || $this->countModules('advert2') || $this->countModules('advert3')) { ?>	
<!-- Adverts -->	

<div class="s5_w_modwrap">
					<div class="s5_backmiddlemiddle2">
						<?php if($this->countModules('advert1')) { ?>	
						<div id="s5_advert1_<?php echo $advert; ?>">
							<jdoc:include type="modules" name="advert1" style="round_box" />	
						</div>
						<?php } ?>
						<?php if($this->countModules('advert2')) { ?>	
						<div id="s5_advert2_<?php echo $advert; ?>">	
							<jdoc:include type="modules" name="advert2" style="round_box" />
						</div>
						<?php } ?>
						<?php if($this->countModules('advert3')) { ?>	
						<div id="s5_advert3_<?php echo $advert; ?>">
							<jdoc:include type="modules" name="advert3" style="round_box" />
						</div>
						<?php } ?>		
					<div style="clear:both;"></div>		
					</div>
</div>
<div class="s5_w_modbl"></div>
<div class="s5_w_modbm"></div>
<div class="s5_w_modbr"></div>
<div style="clear:both;"></div>
	
<div class="s5_leftshadow" <?php if ($is_ie6 == "yes") { ?>style="margin-top:-12px;"<?php } ?>></div>
<div class="s5_rightshadow" <?php if ($is_ie6 == "yes") { ?>style="margin-top:-12px;"<?php } ?>></div>		

<!-- End Adverts -->
<?php } ?>	






<div style="clear:both;"></div>




<!-- Main Body -->
<div class="s5_wrap2" style="padding-left:2px;">

	<?php if($this->countModules('breadcrumb')) { ?>
	<div style="position:relative;">
	<div id="s5_pathway">
	
		<div id="s5_breadcrumbleft"></div>
			<div id="s5_breadcrumbmiddle">
				<div id="s5_breadcrumbgrad">
					<div id="s5_homeicon"></div><div id="s5_breadcrumbs"><jdoc:include type="modules" name="breadcrumb" style="xhtml" /></div>
				</div>
			</div>
		<div id="s5_breadcrumbright"></div>
	</div>
	</div>
	<?php } ?>
	
	<?php if($this->countModules('left')) { ?>	
	<div id="s5_leftcolumn" style="width:<?php echo ($s5_left_width) + 1;?>px;">

		<div class="s5_whitemodtl"></div>
		<div class="s5_whitemodtm" style="width:<?php echo ($s5_left_width) - 13;?>px;"></div>
		<div class="s5_whitemodtr"></div>
		<div style="clear:both;"></div>
		<div class="s5_whitemodleftwrap">
			<div class="s5_whitemodrightwrap">
				<div class="s5_backmiddlemiddle_r" style="width:<?php echo ($s5_left_width) - 13;?>px;">	
					<?php if($this->countModules('breadcrumb')) { ?>
						<div style="height:23px;"></div>
					<?php } ?>
					<jdoc:include type="modules" name="left" style="round_box" />
				<div style="clear:both;"></div>
				</div>
			</div>
		</div>
		<div class="s5_whitemodtbl"></div>
		<div class="s5_whitemodtbm" style="width:<?php echo ($s5_left_width) - 13;?>px;"></div>
		<div class="s5_whitemodtbr"></div>
		<div style="clear:both;"></div>		
		
	</div>
	<?php } ?>
	
	<div style="float:left;">
	<div id="s5_mainbody">	
		<div id="s5_middlecolwrap">
			<div class="s5_mb_btl"></div>
			<div class="s5_mb_btm"></div>
				<div class="s5_mb_btr"></div>
				<div style="clear:both;"></div>
				<div class="s5_mb_ml">
					<div class="s5_mb_mr">
					<div class="s5_mb_m_inner">
					<?php if($this->countModules('breadcrumb')) { ?>
						<div style="height:15px;"></div>
					<?php } ?>
						<div style="float:left;">		
							<div style="clear: both;"></div>
							<div class="s5_mainmiddletl"></div>
							<div class="s5_mainmiddletm"></div>
							<div class="s5_mainmiddletr"></div>
								<div class="s5_mainmiddleinnerwrap">

									<div id="s5_getmaincolheight">
									<div class="s5_mainmiddle_padding">	
											<?php if($this->countModules('user1') || $this->countModules('user2')) { ?>	
												<div id="s5_positions">
													<?php if($this->countModules('user1')) { ?>	
														<div id="s5_user1_<?php echo $user23; ?>">
															<jdoc:include type="modules" name="user1" style="round_box" />
														</div>
													<?php } ?>
													<?php if($this->countModules('user2')) { ?>	
														<div id="s5_user2_<?php echo $user23; ?>">
															<jdoc:include type="modules" name="user2" style="round_box" />
														</div>
													<?php } ?>
												</div>
												<div style="clear:both;"></div>	
											<?php } ?>	
											<jdoc:include type="message" />
											<jdoc:include type="component" />					
										<div style="clear:both;"></div>	
									</div>
									</div>
								</div>
							<div class="s5_mainmiddletbl"></div>
							<div class="s5_mainmiddletbm"></div>
							<div class="s5_mainmiddletbr"></div>		
							<div style="clear:both;"></div>	
							
							
											
							
							
						</div>	
						<div style="float:right;">				
							<?php if($this->countModules('inset')) { ?>
							<div class="s5_mainmiddletl"></div>
							<div class="s5_mainmiddletm" style="width:<?php echo $s5_insetwidth; ?>px;"></div>
							<div class="s5_mainmiddletr"></div>
							<div class="s5_mainmiddleinnerwrap" style="width:<?php echo ($s5_insetwidth) + 6; ?>px;">
								<div id="s5_getinsetcolheight">
									<div class="s5_mainmiddle_padding">
										<jdoc:include type="modules" name="inset" style="round_box" />	
									</div>
								</div>
							</div>
							<div class="s5_mainmiddletbl"></div>
							<div class="s5_mainmiddletbm" style="width:<?php echo $s5_insetwidth; ?>px;"></div>
							<div class="s5_mainmiddletbr"></div>	
							<?php } ?>					
						</div>	
						<div style="clear:both;"></div>
						
					</div>
					</div>	
					<div style="clear:both;"></div>	
						
					
				</div>
			</div>
		</div>
		
	<div style="clear:both;"></div>
	<div class="s5_mb_bbl"></div>
	<div class="s5_mb_bbm"></div>
	<div class="s5_mb_bbr"></div>
	<div style="clear:both;"></div>
	
	<?php if($this->countModules('advert4') || $this->countModules('advert5') || $this->countModules('advert6')) { ?>	
	<div class="s5_blackmods_tl"></div>
	<div class="s5_blackmods_tm"></div>
	<div class="s5_blackmods_tr"></div>
	<div style="clear:both;"></div>
	<div class="s5_blackmodsoutter">
		<!-- Start User 1-3 -->
				<?php if($this->countModules('advert4')) { ?>	
					<div id="s5_advert4_<?php echo $advert2; ?>">
						<jdoc:include type="modules" name="advert4" style="round_box" />	
					</div>
				<?php } ?>
				<?php if($this->countModules('advert5')) { ?>	
					<div id="s5_advert5_<?php echo $advert2; ?>">	
						<jdoc:include type="modules" name="advert5" style="round_box" />
					</div>
				<?php } ?>
				<?php if($this->countModules('advert6')) { ?>	
					<div id="s5_advert6_<?php echo $advert2; ?>">
						<jdoc:include type="modules" name="advert6" style="round_box" />
					</div>
				<?php } ?>		
				<div style="clear:both;"></div>		
		<!-- EndUser 1-3 -->
	</div>
	<div class="s5_blackmods_tbl"></div>
	<div class="s5_blackmods_tbm"></div>
	<div class="s5_blackmods_tbr"></div>
	<div style="clear:both;"></div>
	<?php } ?>
	
	
	
	<?php if($this->countModules('contentbottom1') || $this->countModules('contentbottom2') || $this->countModules('contentbottom3')) { ?>	
	<div class="s5_lightmods_tl"></div>
	<div class="s5_lightmods_tm"></div>
	<div class="s5_lightmods_tr"></div>
	<div style="clear:both;"></div>
	<div class="s5_whitemodsoutter">
		<!-- Start User 1-3 -->
				<?php if($this->countModules('contentbottom1')) { ?>	
					<div id="s5_contentbottom1_<?php echo $contentbottom; ?>">
						<jdoc:include type="modules" name="contentbottom1" style="round_box" />	
					</div>
				<?php } ?>
				<?php if($this->countModules('contentbottom2')) { ?>	
					<div id="s5_contentbottom2_<?php echo $contentbottom; ?>">	
						<jdoc:include type="modules" name="contentbottom2" style="round_box" />
					</div>
				<?php } ?>
				<?php if($this->countModules('contentbottom3')) { ?>	
					<div id="s5_contentbottom3_<?php echo $contentbottom; ?>">
						<jdoc:include type="modules" name="contentbottom3" style="round_box" />
					</div>
				<?php } ?>	
				<div style="clear:both;"></div>		
		<!-- EndUser 1-3 -->
	</div>
	<div class="s5_w_modbl"></div>
	<div class="s5_w_modbm_whmods"></div>
	<div class="s5_w_modbr"></div>
	
	
	
	<div style="clear:both;"></div>
	<?php } ?>
	

</div>					
		
					
					
			
					
					
	<?php if($this->countModules('right')) { ?>	
	<div id="s5_rightcolumn" style="width:<?php echo ($s5_right_width) + 1;?>px;">

		<div class="s5_whitemodtl"></div>
		<div class="s5_whitemodtm" style="width:<?php echo ($s5_right_width) - 13;?>px;"></div>
		<div class="s5_whitemodtr"></div>
		<div style="clear:both;"></div>
		<div class="s5_whitemodleftwrap">
			<div class="s5_whitemodrightwrap">
				<div class="s5_backmiddlemiddle_r" style="width:<?php echo ($s5_right_width) - 13;?>px;">
						
					<?php if($this->countModules('breadcrumb')) { ?>
					<div style="height:23px;"></div>
					<?php } ?>
						<jdoc:include type="modules" name="right" style="round_box" />
				
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
		<div class="s5_whitemodtbl"></div>
		<div class="s5_whitemodtbm" style="width:<?php echo ($s5_right_width) - 13;?>px;"></div>
		<div class="s5_whitemodtbr"></div>
		<div style="clear:both;"></div>
	</div>	
	<?php } ?>
					
					
	<div style="clear:both;padding-bottom:17px;"></div>
	</div>	
</div>

<!-- End Main Body -->







<?php if($this->countModules('user3') || $this->countModules('user4') || $this->countModules('user5') || $this->countModules('user6') || $this->countModules('user7')) { ?>
<!-- Bottom Modules -->
<div class="s5_wrap">
	<div class="s5_bblack_tl"></div>
	<div class="s5_bblack_tm"></div>
	<div class="s5_bblack_tr"></div>
	<div style="clear:both;"></div>
		<div class="s5_bblack_outter">
					
					<div class="s5_backmiddlemiddle" style="padding-left:8px;">		
							<?php if($this->countModules('user3')) { ?>	
								<div id="s5_user3_<?php echo $bottom4; ?>">
									<jdoc:include type="modules" name="user3" style="round_box" />
								</div>
							<?php } ?>
							<?php if($this->countModules('user4')) { ?>	
								<div id="s5_user4_<?php echo $bottom4; ?>">
									<jdoc:include type="modules" name="user4" style="round_box" />
								</div>
							<?php } ?>
							<?php if($this->countModules('user5')) { ?>	
								<div id="s5_user5_<?php echo $bottom4; ?>">
									<jdoc:include type="modules" name="user5" style="round_box" />
								</div>
							<?php } ?>
							<?php if($this->countModules('user6')) { ?>	
								<div id="s5_user6_<?php echo $bottom4; ?>">
									<jdoc:include type="modules" name="user6" style="round_box" />
								</div>
							<?php } ?>
							<?php if($this->countModules('user7')) { ?>	
								<div id="s5_user7_<?php echo $bottom4; ?>">
									<jdoc:include type="modules" name="user7" style="round_box" />
								</div>
							<?php } ?>
						<div style="clear:both;"></div>
					</div>
					
		</div>
	<div class="s5_bblack_bl"></div>
	<div class="s5_bblack_bm"></div>
	<div class="s5_bblack_br"></div>
	<div style="clear:both;"></div>

<div class="s5_leftshadow" <?php if ($is_ie6 == "yes") { ?>style="margin-top:-12px;"<?php } ?>></div>
<div class="s5_rightshadow" <?php if ($is_ie6 == "yes") { ?>style="margin-top:-12px;"<?php } ?>></div>		
</div>
<!-- End Bottom Modules -->

<?php } ?>







			
			
<div style="clear:both;"></div>




<!-- Footer -->

<div class="s5_wrap">
	<div id="s5_footerleft"></div>
		<div id="s5_footermiddle">
			<div id="s5_footerwrap">
				<?php if($this->countModules('bottom')) { ?>	
				<div id="s5_footermenu">
						<?php if ($is_ie6 == "yes") { ?>
						<div style="position:absolute;">
						<?php } ?>
							<jdoc:include type="modules" name="bottom" style="xhtml" />
						<?php if ($is_ie6 == "yes") { ?>
						</div>
						<?php } ?>
					<div style="clear:both;"></div>
				</div>
				<?php } ?>
				
				<div id="s5_footicons">
					<?php if ($s5_twitter  != "") { ?>
						<div id="s5_twitter" onclick="window.document.location.href='<?php echo $s5_twitter; ?>'"></div>
					<?php } ?>
					<?php if ($s5_rss  != "") { ?>
						<div id="s5_rss" onclick="window.document.location.href='<?php echo $s5_rss; ?>'"></div>
					<?php } ?>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div id="s5_footcopy">
				<?php include("templates/elegance/footer.php"); ?>
			</div>
		</div>
	<div id="s5_footerright"></div>


	


	

</div>
<!-- End Footer -->


		

<div style="height:30px;clear:both;"></div>


<?php if (($s5_menu  == "1") || ($s5_menu  == "2") || ($s5_menu  == "3") || ($s5_menu  == "4")) { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/s5_suckerfish.js"></script>
<?php } ?>
<?php if ($s5_tooltips  == "yes") { ?>
<script type="text/javascript" src="<?php echo $LiveSiteUrl;?>templates/elegance/js/tooltips.js"></script>
<?php } ?>
<?php if($this->countModules('debug')) { ?>
	<jdoc:include type="modules" name="debug" style="xhtml" />
<?php } ?> 

<?php if($this->countModules('inset')) { ?>
	<script type="text/javascript" language="javascript" >
		window.setTimeout('s5_load_pos()',1500);
	</script>
<?php } ?> 

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