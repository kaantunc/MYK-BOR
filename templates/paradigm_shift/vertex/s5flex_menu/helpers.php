<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.base.tree');
jimport('joomla.utilities.simplexml');
jimport( 'joomla.application.module.helper' );

/** 
 * mod_mainmenu Helper class
 *
 * @static
 * @package		Joomla 
 * @subpackage	Menus
 * @since		1.5
 */
class S5modMainMenuHelper
{

 	function S5buildXML($params){
	
		global $Itemid;
 		//$menu 		= new S5JMenuTree($params);
		$user 			= & JFactory::getUser();
		$Itemid 		= JRequest::getInt('Itemid');//intval( $Itemid );
		$active_class_id= 0;
		
		//directly call the menu function to not rewrite the mainmenu content
		$path = JPATH_ROOT.DS.'includes'.DS.'menu.php';
		if(file_exists($path))
		{
			require_once $path;

			// Create a JPathway object
			$client = "site";
			$classname = 'JMenu'.ucfirst($client);
			$options = array();
			$instance = new $classname($options);
		}
		$items = $instance;
		//$items = &JSite::getMenu();

		// Get Menu Items
		$rows = $items->getItems('menutype', $params->get('s5_menu_type'));
		$maxdepth = $params->get('s5_maxdepth',10);

		// Build Menu Tree root down (orphan proof - child might have lower id than parent)
		$user =& JFactory::getUser();
		$ids = array();
		$ids[0] = true;
		$last = null;
		$unresolved = array();
		// pop the first item until the array is empty if there is any item							

		if(is_array($rows)){
			$parent_items = array();
			$child_items = array();
			foreach($rows as $row_row => $row){
				//check menu access level
				if($row->access == 1 && $user->id == 0){
					unset($rows[$row_row]);
					continue;
				}
				if($row->access == 2 && $user->gid != 25){
					unset($rows[$row_row]);
					continue;
				}
				
				//check parent first
				if($row->parent == 0){
					$parent_items[$row->id] = $row;
	
					//generate the active parent id
					if($Itemid == $row->id){
						$active_class_id = $row->id;
					}
				}elseif($row->parent > 0){
					$child_depth = count($row->tree);
					if($child_depth > 1){
						$child_items[$child_depth][$row->tree[$child_depth-2]][$row->id] = $row;
					}else{
						$child_items[$child_depth][$row->tree[$child_depth-1]][$row->id] = $row;					
					}
					
					//generate the active parent id
					if($Itemid == $row->id){
						$active_class_id = $row->tree[0];
					}
				}
			}

			//create the layout
			if(!empty($parent_items)){
				$display = "<ul id='s5_nav' class='menu'>";
				foreach($parent_items as $prow => $pitem){
					$parent_subtext			= "";
			
					$S5_menu_items_params 	= new JParameter( $pitem->params );
					$S5_subtext				= $S5_menu_items_params->get('s5_subtext');					
					$S5_subtext_def			= $S5_menu_items_params->get('s5_subtext_def');
					$S5_child_columns		= $S5_menu_items_params->get('s5_columns', 1);//s5_child_columns
					
					
					
					$iParams = new JParameter($pitem->params);
					// Handle SSL links
					$iSecure = $iParams->def('secure', 0);
					
					if ($iParams->get('menu_image') && $iParams->get('menu_image') != -1) {
						switch ($iParams->get('menu_images_align', 0)){
							case 0 : 
							$imgalign='align="left"';
							break;
							
							case 1 :
							$imgalign='align="right"';
							break;
							
							default :
							$imgalign='align="left"';
							break;
						}
						
						$image = '<span class="s5_img_span"><img src="'.JURI::base(true).'/images/stories/'.$iParams->get('menu_image').'" '.$imgalign.' alt="'.$pitem->alias.'" /></span>';
						/*if($tmp->ionly){
							 $tmp->name = null;
						 }*/					
					} else {
						$image = null;
					}
					

					//generate the item link
					$router 	= JSite::getRouter();
					if ($pitem->home == 1) {
						$pitem->url = JURI::root();		
					}
					
					else if ($pitem->type != "url" && $pitem->type != "separator") {
						$pitem->url = $router->getMode() == JROUTER_MODE_SEF ? 'index.php?Itemid='.$pitem->id : $pitem->link.'&Itemid='.$pitem->id;
						//$pitem->url = $pitem->link;
						$pitem->url = JRoute::_($pitem->url, true, $iSecure);
					}
					
					else if ($pitem->type == "url") {
						$pitem->url = $pitem->link;//$router->getMode() == JROUTER_MODE_SEF ? 'index.php?Itemid='.$pitem->id : $pitem->link.'';
					}

					else if ($pitem->type == "separator") {
						$pitem->url = $pitem->link.'javascript:;';//$router->getMode() == JROUTER_MODE_SEF ? 'index.php?Itemid='.$pitem->id : $pitem->link.'javascript:;';
					}	
					
					else {
						$pitem->url = $router->getMode() == JROUTER_MODE_SEF ? 'index.php?Itemid='.$pitem->id : $pitem->link.'&Itemid='.$pitem->id;
						//$pitem->url = $pitem->link;
						$pitem->url = JRoute::_($pitem->url, true, $iSecure);
					}
		
					//generate the active class
					if($active_class_id == $pitem->id){
						$class_active = "class='active'";
					}else{
						$class_active = "";				
					}

					
					
					switch ($pitem->browserNav){
						default:
						case 0:
							// _top
							$link_format = '<a href="'.$pitem->url.'">'.$pitem->name.'</a>';
							if($S5_subtext != ""){
								$parent_subtext = "<span onclick='window.document.location.href=\"$pitem->url\"' class='S5_parent_subtext'>".$S5_subtext."</span>";
							}else{
								$parent_subtext = "";
							}
							break;
						case 1:
							// _blank
							$link_format = '<a href="'.$pitem->url.'" target="_blank">'.$pitem->name.'</a>';
							if($S5_subtext != ""){
								$parent_subtext = "<span onclick='window.open(\"$pitem->url\")' class='S5_parent_subtext'>".$S5_subtext."</span>";
							}else{
								$parent_subtext = "";
							}
							break;
						case 2:
							// window.open
							$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';//.$this->_params->get('window_open');
							
							if($S5_subtext != ""){
								$parent_subtext = "<span onclick='window.open(\"$pitem->url\"), ".$attribs."' class='S5_parent_subtext'>".$S5_subtext."</span>";
							}else{
								$parent_subtext = "";
							}
			
							// hrm...this is a bit dickey
							$link 			= str_replace('index.php', 'index2.php', $pitem->url);
							$link_format 	= '<a href="'.$link.'" onclick="window.open(this.href,\'targetWindow\',\''.$attribs.'\');return false;">'.$pitem->name.'</a>';
							break;
					}					
					
					$display .= "<li ".$class_active."><span class='s5_level1_span1'><span class='s5_level1_span2'>$image".$link_format.$parent_subtext."</span></span>";
					//display the child limit the maxdepth
					if(isset($child_items[2][$prow])){
						$display .= S5modMainMenuHelper::getChildItems($prow, $child_items, $maxdepth, 2, $S5_child_columns, $pitem->params);
					}
					$display .= "</li>";				
				}
				$display .= "</ul>";			
			}
			//silviu extra code - end		
			echo $display;
		}else{
			echo "";
		}
	}

	function getChildItems($parent_id, $child_items, $maxdepth, $current_depth, $parent_item_columns, $parent_params){
		$display_c = "";
		if($current_depth <= $maxdepth){
			if(isset($child_items[$current_depth][$parent_id]) && !empty($child_items[$current_depth][$parent_id])){
				//retrieve the parent params
				$S5_parent_items_params = new JParameter( $parent_params );
				$s5_group_child			= $S5_parent_items_params->get('s5_group_child', 0);
				
				//split the child items content regarding the parent param
				//count all the child items
				$all_child_items = count($child_items[$current_depth][$parent_id]);
				
				//generate the number of ul and the wifth of the ul and the child records per row
				$ul_number 				= $parent_item_columns;
				$ul_width  				= 100/intval($ul_number);
				$child_records_per_row = $all_child_items > 0 ? ceil($all_child_items/$parent_item_columns) : 0;

				if( $child_records_per_row > 0 ){
					//display the child items grouped or not
					if($s5_group_child == 0){
						//not grouped means <ul><li>content</li></ul>
						$display_c = "<ul style='float:left;'>";//  style='width:".$ul_width."%;
					}else{
						//grouped means <div><span>content</span></div>
						$display_c = "<div class='S5_grouped_child_item'>";
					}
					
					$child_per_row 	= 0;
					$current_i		= 0;
					
					foreach($child_items[$current_depth][$parent_id] as $crow => $citem){
						
						$S5_menu_items_params 	= new JParameter( $citem->params );
						$S5_child_columns		= $S5_menu_items_params->get('s5_columns', 1);//s5_child_columns
						$S5_load_mod 			= $S5_menu_items_params->get('s5_load_mod');
					
						//display the child content grouped or not
						if($s5_group_child == 0){
							//not grouped means <ul><li>content</li></ul>
							$display_c .= "<li>".S5modMainMenuHelper::getMenuContent($citem);
						}else{
							//grouped means <div><span>content</span></div>
							//if we have child items for this span grouped item, add a new class to know that child exists and display it in JS file
							if(isset($child_items[$current_depth+1][$crow])){
								$display_c .= "<span class='grouped_sub_parent_item'>".S5modMainMenuHelper::getMenuContent($citem);
							}else{
								$display_c .= "<span>".S5modMainMenuHelper::getMenuContent($citem);							
							}
						}
						
						//display the child items only if the content is not a module position
						if($S5_load_mod == 0 || !isset($S5_load_mod)){
							if(isset($child_items[$current_depth+1][$crow])){
								$display_c .= S5modMainMenuHelper::getChildItems($crow, $child_items, $maxdepth, $current_depth+1, $S5_child_columns, $citem->params);
							}
						}
												
						//display the child content grouped or not
						if($s5_group_child == 0){
							//not grouped means <ul><li>content</li></ul>
							$display_c .= "</li>";
						}else{
							//grouped means <div><span>content</span></div>
							$display_c .= "</span>";
						}
						
						//set a new ul if we reach the child per row limit
						if( $child_per_row == $child_records_per_row - 1 && $all_child_items > $child_records_per_row && $current_i < $all_child_items-1 ){
							$child_per_row = 0;
							
							//display the child content grouped or not
							if($s5_group_child == 0){
								//not grouped means <ul><li>content</li></ul>
								$display_c .= "</ul>";
								$display_c .= "<ul style='float:left;'>";// style='width:".$ul_width."%;'
							}else{
								//grouped means <div><span>content</span></div>
								$display_c .= "</div>";
								$display_c .= "<div class='S5_grouped_child_item'>";// style='width:".$ul_width."%;'
							}							
						}else{
							$child_per_row++;
						}
						$current_i++;
					}
					
					//display the child content grouped or not
					if($s5_group_child == 0){
						//not grouped means <ul><li>content</li></ul>
						$display_c .= "</ul>";
					}else{
						//grouped means <div><span>content</span></div>
						$display_c .= "</div>";
					}
				}else{
					$display_c = "";				
				}
			}
			return $display_c;
		}else{
			return "";
		}
	}

/*	function getChildItems($parent_id, $child_items, $maxdepth, $current_depth, $parent_item_columns){
		if($current_depth <= $maxdepth){
			if(isset($child_items[$current_depth][$parent_id]) && !empty($child_items[$current_depth][$parent_id])){
				$display_c = "<ul>";
				foreach($child_items[$current_depth][$parent_id] as $crow => $citem){
				
					$S5_menu_items_params 	= new JParameter( $citem->params );
					$s5_child_columns		= $S5_menu_items_params->get('s5_child_columns');	
									
					$display_c .= "<li>".S5modMainMenuHelper::getMenuContent($citem);
					//$display_c .= "<li><a href='#'>".$citem->name."</a>";
					
					if(isset($child_items[$current_depth+1][$crow])){
						$display_c .= S5modMainMenuHelper::getChildItems($crow, $child_items, $maxdepth, $current_depth+1, $s5_child_columns);
					}
					
					$display_c .= "</li>";
				}
				$display_c .= "</ul>";
			}
			return $display_c;
		}else{
			return "";
		}
	}*/
	
	function getMenuContent($S5row){
		//return "<li><a href='#'>".$row->name."</a></li>";
		//silviu module code - start
		$S5_menu_items_params 	= new JParameter( $S5row->params );
		$S5_load_mod 			= $S5_menu_items_params->get('s5_load_mod');
		$S5_subtext				= $S5_menu_items_params->get('s5_subtext');
		$S5_subtext_def			= $S5_menu_items_params->get('s5_subtext_def');
		
		//retrieve the parent params
		//$S5_parent_items_params = new JParameter( $parent_params );
		$s5_group_child			= $S5_menu_items_params->get('s5_group_child', 0);

		$S5_mod_array_orig		= $S5_menu_items_params->get('s5_position');
		if(!is_array($S5_mod_array_orig)){
			$S5_mod_array = array($S5_mod_array_orig);
		}else{
			$S5_mod_array 	= $S5_mod_array_orig;				
		}

		$tmp = $S5row;
		$iParams = new JParameter($tmp->params);
		// Handle SSL links
		$iSecure = $iParams->def('secure', 0);		

		if ($iParams->get('menu_image') && $iParams->get('menu_image') != -1) {
			switch ($iParams->get('menu_images_align', 0)){
				case 0 : 
				$imgalign='align="left"';
				break;
				
				case 1 :
				$imgalign='align="right"';
				break;
				
				default :
				$imgalign='align="left"';
				break;
			}
			
			$image = '<span class="s5_img_span"><img src="'.JURI::base(true).'/images/stories/'.$iParams->get('menu_image').'" '.$imgalign.' alt="'.$S5row->alias.'" /></span>';
			/*if($tmp->ionly){
				 $tmp->name = null;
			 }*/					
		} else {
			$image = null;
		}
		
		//recreate the menu content with link on it
		//after that remove the link so the module content won't have link on it
		$router 	= JSite::getRouter();
		if ($S5row->type != "url" && $S5row->type != "separator") {
			$S5row->url = $router->getMode() == JROUTER_MODE_SEF ? $S5row->link.'&Itemid='.$S5row->id : $S5row->link.'&Itemid='.$S5row->id;
			//$S5row->url = $S5row->link;
			$S5row->url = JRoute::_($S5row->url, true, $iSecure);
		}
		else if ($S5row->type == "url") {
			$S5row->url = $S5row->link;//$router->getMode() == JROUTER_MODE_SEF ? 'index.php?Itemid='.$S5row->id : $S5row->link.'';		
		}
		
		else if ($S5row->type == "separator") {
			$S5row->url = $S5row->link.'javascript:;';//$router->getMode() == JROUTER_MODE_SEF ? 'index.php?Itemid='.$S5row->id : $S5row->link.'javascript:;';
		}
		
		else {
			$S5row->url = $router->getMode() == JROUTER_MODE_SEF ? $S5row->link.'&Itemid='.$S5row->id : $S5row->link.'&Itemid='.$S5row->id;
			//$S5row->url = $S5row->link;
			$S5row->url = JRoute::_($S5row->url, true, $iSecure);
		}

		if(is_array($S5_mod_array) && !empty($S5_mod_array) && $S5_load_mod == '1'){

			if(is_array($S5_mod_array)){
				//if($group == 1){

				$s5_loaded_modules		= array();				
				//get the module content first
				foreach($S5_mod_array as $S5_position_value){
					//get all the modules for this position
					$all_position_modules 	= S5ModuleHelper::getModules($S5_position_value);

					if(is_array($all_position_modules) && !empty($all_position_modules)){
						foreach($all_position_modules as $s5_position_module){
							$s5_module_content = "";
							//$module = S5ModuleHelper::getModule( 'mod_login', 'Login Form' );
							if($s5_position_module->module == 'mod_custom'){
								$s5_module_content = S5ModuleHelper::getModule( 'custom', $s5_position_module->title );
							}else{
								$s5_module_content = S5ModuleHelper::getModule( strtolower(substr( $s5_position_module->module, 4, strlen($s5_position_module->module) )), $s5_position_module->title );
							}

							$attribs['style'] = 'xhtml';

							//$yj_load_mod ='LOAD MODULE OR MODULES HERE';
							$s5_loaded_modules[] = S5ModuleHelper::renderModule( $s5_module_content, $attribs );
						}
					}
				}
				
				switch ($tmp->browserNav){
					default:
					case 0:
						// _top
						 $link_format = '<a href="'.$S5row->url.'">'.$S5row->name.'</a>';
						 if($S5_subtext != ""){
							$S5row->name .= "<span onclick='window.document.location.href=\"$S5row->url\"' class='S5_subtext'>".$S5_subtext."</span>";//<br />
						 }
						break;
					case 1:
						// _blank
						$link_format = '<a href="'.$S5row->url.'" target="_blank">'.$S5row->name.'</a>';
						if($S5_subtext != ""){
							$S5row->name .= "<span onclick='window.open(\"$S5row->url\)' class='S5_subtext'>".$S5_subtext."</span>";//<br />
						}
						break;
					case 2:
						// window.open
						$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';//.$this->_params->get('window_open');
						
						if($S5_subtext != ""){
							$S5row->name .= "<span onclick='window.open(\"$S5row->url\), ".$attribs."' class='S5_subtext'>".$S5_subtext."</span>";//<br />
						}
		
						// hrm...this is a bit dickey
						$link 			= str_replace('index.php', 'index2.php', $S5row->url);
						$link_format 	= '<a href="'.$link.'" onclick="window.open(this.href,\'targetWindow\',\''.$attribs.'\');return false;">'.$S5row->name.'</a>';
						break;
				}				

				//recreate the menu content with link on it
				//after that remove the link so the module content won't have link on it
				$S5row->name 	= "<span class='S5_submenu_item'>".$image.$link_format;
	
				//display the subtext
				
				$S5row->name .= "</span>";//<br />


				if(is_array($s5_loaded_modules) && !empty($s5_loaded_modules)){
					//display the Joomla menu content
					$columns_group = $S5_menu_items_params->get('s5_columns');
		
					//display the child items grouped or not
					if($s5_group_child == 0){
						//not grouped means <ul><li>content</li></ul>
						$S5row->name .= "<ul style='float:left;'><li>";//  style='width:".$ul_width."%;
					}else{
						$S5row->name .= "<div class='S5_menu_module_parent_group'>";
						//	$S5row->name .= "<div class='S5_menu_module_parent'>";
						$S5row->name .= "<div class='S5_menu_module_group'>";
					}

					$k=0;
					$all_loaded_modules = count($s5_loaded_modules);
					$rows_group			= $columns_group > 0 ? ceil($all_loaded_modules/$columns_group) : 0;

					for($i=0; $i<$rows_group; $i++){
						
						//check to see if we still have modules content to display
						if(!empty($s5_loaded_modules)){

							$S5row->name .= "<div style='width:100%;'>";
							for($j=0; $j<$columns_group; $j++){ 
							
								if(isset($s5_loaded_modules[$k])){
									if($all_loaded_modules > $columns_group){
										$content_cell_width =  100/intval($columns_group);
									}else{
										$content_cell_width =  100/intval($all_loaded_modules);
									}
									$S5row->name .= "<div style='float:left; width:".$content_cell_width."%;'>".$s5_loaded_modules[$k]."</div>";
									//remove the displayed module content form the array
									unset($s5_loaded_modules[$k]);
									
									$k ++;
								}//end if
								
							}//end for
							$S5row->name .= "</div><div style='clear:both;'></div>";								

						}//end if
						
					}//end for
					//display the child items grouped or not
					if($s5_group_child == 0){
						//not grouped means <ul><li>content</li></ul>
						$S5row->name .= "</li></ul>";//  style='width:".$ul_width."%;
					}else{
						$S5row->name .= "</div>";
						$S5row->name .= "</div>";					
					}
				}else{
					//$S5row->name = "";
				}//end if
				//}
				//$S5row->name = str_replace(array('<ul>', '</ul>'), '', $S5row->name);
				//$S5row->name = str_replace(array('<li>', '</li>'), '', $S5row->name);
				//$S5row->name = str_replace(array('<p>', '</p>'), '', $S5row->name);
				//$S5row->name = preg_replace("/<ul(.*)>/", "", $S5row->name);
				//$S5row->name = preg_replace("/<li(.*)>/", "", $S5row->name);
				//$S5row->name = preg_replace("/<p(.*)>/", "<br />", $S5row->name);
				//new row to remove the link on the content if the content have module in it
				$S5row->module_content = 1;
				
				//$S5row->name = "<div class='S5_submenu_item'>".$S5row->name."</div>";
			
			}else{
				//display the Joomla menu content
				$columns_group = $S5_menu_items_params->get('s5_columns');

				switch ($tmp->browserNav){
					default:
					case 0:
						// _top
						 $link_format = '<a href="'.$S5row->url.'">'.$S5row->name.'</a>';
						 if($S5_subtext != ""){
							$S5row->name .= "<span onclick='window.document.location.href=\"$S5row->url\"' class='S5_subtext'>".$S5_subtext."</span>";//<br />
						 }
						break;
					case 1:
						// _blank
						$link_format = '<a href="'.$S5row->url.'" target="_blank">'.$S5row->name.'</a>';
						if($S5_subtext != ""){
							$S5row->name .= "<span onclick='window.open(\"$S5row->url\)' class='S5_subtext'>".$S5_subtext."</span>";//<br />
						}
						break;
					case 2:
						// window.open
						$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';//.$this->_params->get('window_open');
						
						if($S5_subtext != ""){
							$S5row->name .= "<span onclick='window.open(\"$S5row->url\), ".$attribs."' class='S5_subtext'>".$S5_subtext."</span>";//<br />
						}
		
						// hrm...this is a bit dickey
						$link 			= str_replace('index.php', 'index2.php', $S5row->url);
						$link_format 	= '<a href="'.$link.'" onclick="window.open(this.href,\'targetWindow\',\''.$attribs.'\');return false;">'.$S5row->name.'</a>';
						break;
				}

				//recreate the menu content with link on it
				//after that remove the link so the module content won't have link on it
				$S5row->name 	= $image.$link_format;
	
				//display the subtext
									
				$S5row->name .= "<div class='S5_menu_module_parent_group'>";
				//	$S5row->name .= "<div class='S5_menu_module_parent'>";
			
				$S5_module_to_load = $S5_mod_array;
				$S5_module_to_load2 = S5modMainMenuHelper::getModule($S5_module_to_load);														
				$module_menu_content = trim(S5ModuleHelper::renderModule($S5_module_to_load2, array( 'style' => "xhtml" )));								
				if(isset($S5_mod_with[0]) && $S5_mod_with[0] > 0){
					$S5row->name 	.= "<div class='S5_menu_module' style='width:".$S5_mod_with[0]."px;'>".$module_menu_content."</div>";
				}else{
					$S5row->name 	.= "<div class='S5_menu_module'>".$module_menu_content."</div>";
				}
	
				$S5row->name .= "</div>";
				
				//$S5row->name = str_replace(array('<ul>', '</ul>'), '', $S5row->name);
				//$S5row->name = str_replace(array('<li>', '</li>'), '', $S5row->name);
				//$S5row->name = str_replace(array('<p>', '</p>'), '', $S5row->name);
				//$S5row->name = preg_replace("/<ul(.*)>/", "", $S5row->name);
				//$S5row->name = preg_replace("/<li(.*)>/", "", $S5row->name);
				//$S5row->name = preg_replace("/<p(.*)>/", "<br />", $S5row->name);
				//new row to remove the link on the content if the content have module in it
				$S5row->module_content = 1;
				$S5row->name = "<span class='S5_submenu_item'>".$S5row->name."</span>";
			}
		}else{
			$temp = "";
			//$row->name = $links[$links_id];
			$window_case = "";
			
			switch ($tmp->browserNav){
				default:
				case 0:
					// _top
					 $link_format = '<a href="'.$S5row->url.'">'.$S5row->name.'</a>';
					 $window_case = "same";
					break;
				case 1:
					// _blank
					$link_format = '<a href="'.$S5row->url.'" target="_blank">'.$S5row->name.'</a>';
					$window_case = "new";
					break;
				case 2:
					// window.open
					$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';//.$this->_params->get('window_open');
					$window_case = "new_attrib";
	
					// hrm...this is a bit dickey
					$link 			= str_replace('index.php', 'index2.php', $S5row->url);
					$link_format 	= '<a href="'.$link.'" onclick="window.open(this.href,\'targetWindow\',\''.$attribs.'\');return false;">'.$S5row->name.'</a>';
					break;
			}			
			
			if($S5_subtext != ""){
				//display the subtext			
				if ($window_case == "new") {
				$temp = $image.$link_format."<span onclick='window.open(\"".$S5row->url."\")' class='S5_subtext'>".$S5_subtext."</span>";//<br />
				}
				else if ($window_case == "new_attrib") {
				$temp = $image.$link_format."<span onclick='window.open(\"".$S5row->url.", ".$attribs."\")' class='S5_subtext'>".$S5_subtext."</span>";//<br />
				}
				else {
				$temp = $image.$link_format."<span onclick='window.document.location.href=\"$S5row->url\"' class='S5_subtext'>".$S5_subtext."</span>";//<br />
				}
			}else{
				//$temp =  "<div>".$image.$row->name."</div>";
				$temp =  $image.$link_format;
			}
			$S5row->name = $temp;
			 //$row->name."\n"."<div class=\"subtext\">".$text."</div>";
			//new row to remove the link on the content if the content have module in it
			$S5row->module_content = 0;
			$S5row->name = "<span class='S5_submenu_item'>".$S5row->name."</span>";
		}

		//silviu module code - end
		return $S5row->name;
	}
}
?>