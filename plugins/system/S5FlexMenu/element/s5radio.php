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
 
class JElementS5Radio extends JElement{
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
				$orientation = $template_params->get('s5_orientation') == "" ? "horizontal" : $template_params->get('s5_orientation');
				$effect = $template_params->get('s5_effect') == "" ? "2" : $template_params->get('s5_effect');				
				$return = "";
				$checked = '';
				
				if($name == "s5_orientation"){
					if($orientation == "horizontal"){					
						$checked = 'checked="checked"';
					}else{
						$checked = '';
					}
					$return .= '<input type="radio" '.$checked.' value="horizontal" id="paramss5_orientationhorizontal" name="params[s5_orientation]">';
					$return .= '<label for="paramss5_orientationhorizontal">Horizontal</label>';
					if($orientation == "vertical"){					
						$checked = 'checked="checked"';
					}else{
						$checked = '';
					}
					$return .= '<input type="radio" '.$checked.' value="vertical" id="paramss5_orientationvertical" name="params[s5_orientation]">';
					$return .= '<label for="paramss5_orientationvertical">Vertical</label>';
					
					return $return;
				}elseif($name == "s5_effect"){
					if($effect == "0"){					
						$checked = 'checked="checked"';
					}else{
						$checked = '';
					}
					$return .= '<input type="radio" '.$checked.' value="0" id="paramss5_effect0" name="params[s5_effect]">';
					$return .= '<label for="paramss5_effect0">slide</label>';
					if($effect == "1"){					
						$checked = 'checked="checked"';
					}else{
						$checked = '';
					}
					$return .= '<input type="radio" '.$checked.' value="1" id="paramss5_effect1" name="params[s5_effect]">';
					$return .= '<label for="paramss5_effect1">fade</label>';
					if($effect == "2"){					
						$checked = 'checked="checked"';
					}else{
						$checked = '';
					}
					$return .= '<input type="radio" '.$checked.' value="2" id="paramss5_effect2" name="params[s5_effect]">';
					$return .= '<label for="paramss5_effect2">slide &amp; fade</label>';
										
					return $return;
				}	
				
			}
		}
}
?>