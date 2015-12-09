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
 
class JElementS5SQLMultiListXT extends JElement{
		/**
		* Element name
		*
		* @access       protected
		* @var          string
		*/
		var $_name = 'S5SQLMultiListXT';
		
		function fetchElement($name, $value, &$node, $control_name){						
			// Base name of the HTML control.
			$ctrl  = $control_name .'['. $name .']';
			
			// Construct the various argument calls that are supported.
			$attribs = ' '; 
			if($v = $node->attributes('size')){
				$attribs .= 'size="'.$v.'"';
			}
			
			if($v = $node->attributes('class')){
				$attribs .= 'class="'.$v.'"';
			}else{
				$attribs .= 'class="inputbox"';
			}
			
			if($m = $node->attributes('multiple')){
				$attribs .= ' multiple="multiple"';
				$ctrl .= '[]';
			}
			
			// Query items for list.
			$db = & JFactory::getDBO();
			$db->setQuery($node->attributes('sql'));
			$key = ($node->attributes('key_field') ? $node->attributes('key_field') : 'value');
			$val = ($node->attributes('value_field') ? $node->attributes('value_field') : $name);
			
			$options = array ();
			foreach ($node->children() as $option){
				$options[] = array($key=>$option->attributes('value'), $val=>$option->data());
			}
			
			$rows = $db->loadAssocList();
			foreach($rows as $row){
				$options[] = array($key=>$row[$key],$val=>$row[$val]);
			}
			if($options){
				if(JRequest::getVar("option") == "com_templates" && JRequest::getVar("task") == "edit"){
					$sql = "select template from #__templates_menu where client_id=0";
					$db->setQuery($sql);
					$db->query();
					$template = $db->loadResult();										
					$template_path = JPATH_SITE.DS."templates".DS.$template.DS."params.ini";				
					$template_params = new JParameter(JFile::read($template_path));					
					$menu_for_replace = $template_params->get('s5_menu_type');
					$duration = $template_params->get('s5_duration');
					
					$value = $menu_for_replace;
				}
				return JHTML::_('select.genericlist',$options, $ctrl, $attribs, $key, $val, $value, $control_name.$name);
			}
		}
}
?>