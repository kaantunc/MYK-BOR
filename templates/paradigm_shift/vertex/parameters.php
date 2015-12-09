<?php

//Template Specific Funcions Here:

$s5_facebook  = $this->params->get ("xml_s5_facebook");	
$s5_twitter = $this->params->get ("xml_s5_twitter");
$s5_rss = $this->params->get ("xml_s5_rss");	
$s5_highlight = $this->params->get ("xml_s5_highlight");

//


$s5_fonts = $this->params->get ("xml_s5_fonts");
$s5_font_resizer = $this->params->get ("xml_s5_font_resizer");
$s5_fixed_fluid = $this->params->get ("xml_s5_fixed_fluid");
$s5_body_width = $this->params->get ("xml_s5_body_width");
$s5_left_width = $this->params->get ("xml_s5_left_width"); 
$s5_left_inset_width = $this->params->get ("xml_s5_left_inset_width"); 
$s5_right_width = $this->params->get ("xml_s5_right_width");
$s5_right_inset_width = $this->params->get ("xml_s5_right_inset_width");
$s5_show_menu = $this->params->get ("xml_s5_show_menu");   
$menu_name = $this->params->get ("s5_menu_type");     
$s5_top_row1_calculation = $this->params->get ("xml_s5_top_row1_calculation");   
$s5_top_row1_manual_widths = $this->params->get ("xml_s5_top_row1_manual_widths");  
$s5_top_row2_calculation = $this->params->get ("xml_s5_top_row2_calculation");   
$s5_top_row2_manual_widths = $this->params->get ("xml_s5_top_row2_manual_widths"); 
$s5_top_row3_calculation = $this->params->get ("xml_s5_top_row3_calculation");   
$s5_top_row3_manual_widths = $this->params->get ("xml_s5_top_row3_manual_widths"); 
$s5_above_columns_calculation = $this->params->get ("xml_s5_above_columns_calculation");   
$s5_above_columns_manual_widths = $this->params->get ("xml_s5_above_columns_manual_widths");
$s5_below_columns_calculation = $this->params->get ("xml_s5_below_columns_calculation");   
$s5_below_columns_manual_widths = $this->params->get ("xml_s5_below_columns_manual_widths");
$s5_middle_top_calculation = $this->params->get ("xml_s5_middle_top_calculation");   
$s5_middle_top_manual_widths = $this->params->get ("xml_s5_middle_top_manual_widths"); 
$s5_above_body_calculation = $this->params->get ("xml_s5_above_body_calculation");   
$s5_above_body_manual_widths = $this->params->get ("xml_s5_above_body_manual_widths"); 
$s5_middle_bottom_calculation = $this->params->get ("xml_s5_middle_bottom_calculation");   
$s5_middle_bottom_manual_widths = $this->params->get ("xml_s5_middle_bottom_manual_widths");
$s5_below_body_calculation = $this->params->get ("xml_s5_below_body_calculation");   
$s5_below_body_manual_widths = $this->params->get ("xml_s5_below_body_manual_widths"); 
$s5_bottom_row1_calculation = $this->params->get ("xml_s5_bottom_row1_calculation");   
$s5_bottom_row1_manual_widths = $this->params->get ("xml_s5_bottom_row1_manual_widths");  
$s5_bottom_row2_calculation = $this->params->get ("xml_s5_bottom_row2_calculation");   
$s5_bottom_row2_manual_widths = $this->params->get ("xml_s5_bottom_row2_manual_widths"); 
$s5_bottom_row3_calculation = $this->params->get ("xml_s5_bottom_row3_calculation");   
$s5_bottom_row3_manual_widths = $this->params->get ("xml_s5_bottom_row3_manual_widths"); 
$s5_mobile_device_enable_disable = $this->params->get ("xml_s5_mobile_device_enable_disable"); 
$s5_mobile_device_menu_subs = $this->params->get ("xml_s5_mobile_device_menu_subs");
$s5_mobile_device_menu_title = $this->params->get ("xml_s5_mobile_device_menu_title"); 
$s5_mobile_device_login = $this->params->get ("xml_s5_mobile_device_login"); 
$s5_mobile_device_register = $this->params->get ("xml_s5_mobile_device_register"); 
$s5_mobile_device_pc_text = $this->params->get ("xml_s5_mobile_device_pc_text"); 
$s5_multibox = $this->params->get ("xml_s5_multibox");
$s5_multioverlay = $this->params->get ("xml_s5_multioverlay");
$s5_multicontrols = $this->params->get ("xml_s5_multicontrols");
$s5_tooltips = $this->params->get ("xml_s5_tooltips"); 
$s5_moover = $this->params->get ("xml_s5_moover");
$s5_thirdparty = $this->params->get ("xml_s5_thirdparty");
$s5_urlforSEO = $this->params->get ("xml_s5_seourl");
$s5_show_frontpage = $this->params->get ("xml_s5_frontpage");
$s5_register = $this->params->get ("xml_s5_register");
$s5_login = $this->params->get ("xml_s5_login");
$s5_loginout = $this->params->get ("xml_s5_loginout");
$s5_ie6plugin = $this->params->get ("xml_s5_ie6plugin");
$s5_scrolltotop = $this->params->get ("xml_s5_scrolltotop");
$s5_lr_tab1_text = $this->params->get ("xml_s5_lr_tab1_text");
$s5_lr_tab2_text = $this->params->get ("xml_s5_lr_tab2_text");
$s5_lr_tab1_text = str_replace(" ","&nbsp;",$s5_lr_tab1_text);
$s5_lr_tab2_text = str_replace(" ","&nbsp;",$s5_lr_tab2_text);	
$s5_lr_tab1_height = $this->params->get ("xml_s5_lr_tab1_height");
$s5_lr_tab2_height = $this->params->get ("xml_s5_lr_tab2_height");
$s5_lr_tab1_top_percent = $this->params->get ("xml_s5_lr_tab1_vp");
$s5_lr_tab2_top_percent = $this->params->get ("xml_s5_lr_tab2_vp");
$s5_lr_tab1_class =  $this->params->get ("xml_s5_lr_tab1_class");	
$s5_lr_tab2_class = $this->params->get ("xml_s5_lr_tab2_class");
$s5_lr_tab1_left_right = $this->params->get ("xml_s5_lr_tab1_left_right");	
$s5_lr_tab2_left_right = $this->params->get ("xml_s5_lr_tab2_left_right");
$s5_lr_tab_border = $this->params->get ("xml_s5_lr_tab_border");
$s5_lr_tab_color = $this->params->get ("xml_s5_lr_tab_color");
$s5_lr_tab_font = $this->params->get ("xml_s5_lr_tab_font");
$s5_lr_tab1_click = $this->params->get ("xml_s5_lr_tab1_click");
$s5_lr_tab2_click = $this->params->get ("xml_s5_lr_tab2_click");		
?>