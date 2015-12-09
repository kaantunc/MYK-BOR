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
 
class JElementS5SQLMultiListX extends JElement{
		/**
		* Element name
		*
		* @access       protected
		* @var          string
		*/
		var $_name = 'S5SQLMultiListX';
		
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
			
			$key = "value";//($node->attributes('key_field') ? $node->attributes('key_field') : 'value');
			$val = "text";//($node->attributes('value_field') ? $node->attributes('value_field') : $name);			
			
			$options = array();
			for($i = 1; $i <= 40; $i++){
				$options[] = JHTML::_( 'select.option',  's5_menu'.$i, 's5_menu'.$i);
			}
			return JHTML::_('select.genericlist', $options, $ctrl, $attribs, $key, $val, $value, $control_name.$name);
		}		
}
?>