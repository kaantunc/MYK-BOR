<?php
/**
* @copyright    Copyright (C) 2009 Open Source Matters. All rights reserved.
* @license      GNU/GPL
*/
 
// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();
 
/**
 * Renders a multiple item select element 
 * using SQL result and explicitly specified params
 *
 */
 
class JElementS5Text extends JElement{
		/**
		* Element name
		*
		* @access       protected
		* @var          string
		*/
		var $_name = 'S5_text';
		
		function fetchElement($name, $value, &$node, $control_name){			
			$db = & JFactory::getDBO();
			$db->setQuery($node->attributes('sql'));
			$name = $node->attributes('name');
			
			if(JRequest::getVar("option") == "com_templates" && JRequest::getVar("task") == "edit"){
				$sql = "select template from #__templates_menu where client_id=0";
				$db->setQuery($sql);
				$db->query();
				$template = $db->loadResult();										
				$template_path = JPATH_SITE.DS."templates".DS.$template.DS."params.ini";				
				$template_params = new JParameter(JFile::read($template_path));				
				
				$duration = $template_params->get('s5_duration') == "" ? "500" : $template_params->get('s5_duration');
				$hide_delay = $template_params->get('s5_hide_delay') == "" ? "500" : $template_params->get('s5_hide_delay');
				$opacity = $template_params->get('s5_opacity') == "" ? "100" : $template_params->get('s5_opacity');
				$maxdepth = $template_params->get('s5_maxdepth') == "" ? "10" : $template_params->get('s5_maxdepth');
				
				if($name == "s5_duration"){
					return '<input type="text" class="text_area" value="'.$duration.'" id="paramss5_duration" name="params[s5_duration]">';
				}elseif($name == "s5_hide_delay"){
					return '<input type="text" class="text_area" value="'.$hide_delay.'" id="paramss5_hide_delay" name="params[s5_hide_delay]">';
				}elseif($name == "s5_opacity"){
					return '<input type="text" class="text_area" value="'.$opacity.'" id="paramss5_opacity" name="params[s5_opacity]">';
				}elseif($name == "s5_maxdepth"){
					return '<input type="text" class="text_area" value="'.$maxdepth.'" id="paramss5_maxdepth" name="params[s5_maxdepth]">';
				}
				
			}
		}
}
?>