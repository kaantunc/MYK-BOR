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
 
class JElementS5Group extends JElement{
		/**
		* Element name
		*
		* @access       protected
		* @var          string
		*/
		var $_name = 'S5Group';
		
		function fetchElement($name, $value, &$node, $control_name){
			$cid 			= JRequest::getVar( 'cid', array(), '', 'array' );
			JArrayHelper::toInteger($cid, array());

			if( isset($cid[0]) && $cid[0] > 0){
				$db =& JFactory::getDBO();
				// Get the limited records
				$query = ' SELECT parent ' 
						.' FROM #__menu '
						.' WHERE `id` = '.$cid[0];
				$db->setQuery($query);
				$parent = $db->loadResult();
				// Make sure there aren't any errors
				if ($db->getErrorNum()) {
					echo $db->getErrorMsg();
					exit;
				}

				if($parent > 0){
					//silviu changes for keeping group default values - start
					$query = ' SELECT params ' 
							.' FROM #__menu '
							.' WHERE `id` = '.$cid[0];
					$db->setQuery($query);
					$params = $db->loadResult();
					// Make sure there aren't any errors
					if ($db->getErrorNum()) {
						echo $db->getErrorMsg();
						exit;
					}
					
					if($params != ''){
						$menu_params 	= new JParameter( $params );
						$group_param 	= $menu_params->get('s5_group_child');
					}
					//silviu changes for keeping group default values - end
					
					$html = '<tr>
								<td width="40%" class="paramlist_key"><span class="editlinktip"><label id="paramss5_group_child-lbl" for="paramss5_group_child">Group child items?</label></span></td>
								<td class="paramlist_value">
									<input type="radio" name="params[s5_group_child]" id="paramss5_group_child1" value="1" ';
									//silviu changes for keeping group default values - start
									$html .= $group_param == 1 ? 'checked="checked"' : '';
									$html .= ' />
									<label for="paramss5_group_child1">Yes</label>
								
									<input type="radio" name="params[s5_group_child]" id="paramss5_group_child0" value="0" ';
									//silviu changes for keeping group default values - start
									$html .= $group_param == 0 ? 'checked="checked"' : '';
									$html .= ' />									
									<label for="paramss5_group_child0">No</label>
								</td>
							</tr>';
				}else{
					$html = '<tr>
								<td width="40%" class="paramlist_key"><span class="editlinktip"><label id="paramss5_group_child-lbl" for="paramss5_group_child">Group child items?</label></span></td>
								<td class="paramlist_value">
									<input type="radio" name="params[s5_group_child]" id="paramss5_group_child1" value="1" disabled="disabled" />
									<label for="paramss5_group_child1">Yes</label>
								
									<input type="radio" name="params[s5_group_child]" id="paramss5_group_child0" value="0" checked="checked" disabled="disabled" />
									<label for="paramss5_group_child0">No</label><br />
									<p style="margin-left:5px; margin-top:2px!important;">Groupping disabled for first level items!</p>
								</td>
							</tr>
							<input type="hidden" name="params[s5_group_child]" value="0" />';
				}
			}else{
				$html = '';
			}
			
			return $html;
		}		
}
?>