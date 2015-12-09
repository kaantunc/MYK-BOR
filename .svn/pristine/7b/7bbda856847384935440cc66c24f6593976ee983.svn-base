<?php
	//S5 Flex menu start
	$app = & JFactory::getApplication();
	jimport('joomla.filesystem.file');	
	JHTML::_('behavior.mootools');
	
	$template_path = JPATH_THEMES.DS.$app->getTemplate().DS."params.ini";
	$template_params = new JParameter(JFile::read($template_path));

	$document =& JFactory::getDocument();
	$document->addScript($s5_directory_path."/js/s5_flex_menu.js");
	$document->addStyleSheet($s5_directory_path."/css/s5_flex_menu.css");

	$duration = $template_params->get('s5_duration') == "" ? "500" : $template_params->get('s5_duration');
	$hideDelay = $template_params->get('s5_hide_delay') == "" ? "500" : $template_params->get('s5_hide_delay');
	$opacity = $template_params->get('s5_opacity') == "" ? "100" : $template_params->get('s5_opacity');
	$orientation = $template_params->get('s5_orientation') == "" ? "horizontal" : $template_params->get('s5_orientation');
	$effect = $template_params->get('s5_effect') == "" ? "2" : $template_params->get('s5_effect');
	
	if ($effect == "3") {
	$duration = "0";
	$effect = "0";
	}

	if($effect == 0){
		$effect = "slide";
	}elseif($effect == 1){
		$effect = "fade";
	}elseif($effect == 2){
		$effect = "slide & fade";
	}
?>
	<script type="text/javascript">
		
		<?php if ($browser == "ie9") { ?>
        function s5_load_flex_menu() {
		<?php } ?>
		<?php if ($browser != "ie9") { ?>
        window.addEvent('domready', function() {
		<?php } ?>
            var myMenu = new MenuMatic({
                effect:"<?php echo $effect; ?>",
                duration:<?php echo $duration; ?>,
                physics: Fx.Transitions.Pow.easeOut,
                hideDelay:<?php echo $hideDelay; ?>,
                orientation:"<?php echo $orientation; ?>",
                tweakInitial:{x:0, y:0},
                <?php if($s5_language_direction == "1") { ?>
	                direction:{    x: 'left',    y: 'down' },
				<?php } ?>
                <?php if($s5_language_direction != "1") { ?>
    	            direction:{    x: 'right',    y: 'down' },
				<?php } ?>
                opacity:<?php echo $opacity; ?>
            });
        }<?php if ($browser != "ie9") { ?>);<?php } ?>
		
		<?php if ($browser == "ie9") { ?>
		window.setTimeout(s5_load_flex_menu,1000);
		<?php } ?>
		
    </script>    
	
<?php //S5 Flex menu end ?>