<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

if ( ! defined('modS5MainMenuXMLCallbackDefined') ){ 

	function modS5MainMenuXMLCallback(&$node, $args){
			
		$user	= &JFactory::getUser();
		$menu	= &JSite::getMenu();
		$active	= $menu->getActive();
		$path	= isset($active) ? array_reverse($active->tree) : null;

		if (($args['end']) && ($node->attributes('level') >= $args['end']))
		{
			$children = &$node->children();
			foreach ($node->children() as $child)
			{
				if ($child->name() == 'ul') {
					$node->removeChild($child);
				}
			}
		}
	
		if ($node->name() == 'ul') {
			foreach ($node->children() as $child)
			{
				if ($child->attributes('access') > $user->get('aid', 0)) {
					$node->removeChild($child);
				}
			}
		}
	
		if (($node->name() == 'li') && isset($node->ul)) {
			$node->addAttribute('class', 'haschild');
			$children = $node->children();
			if ($node->attributes('level') == 1) {
				if ($children[0]->name() == 'a' or $children[0]->name() == 'span') {
					$children[0]->addAttribute('class', 'haschild');
				}
			} else {
				if ($children[0]->name() == 'a' or $children[0]->name() == 'span') {
					$children[0]->addAttribute('class', 'child');
				}
			}
			
		}
	
		if (isset($path) && in_array($node->attributes('id'), $path))
		{
			if ($node->attributes('class')) {
				$node->addAttribute('class', $node->attributes('class').'_active');
			} else {
				$node->addAttribute('class', 'active');
			}
		}
		else
		{
			if (isset($args['children']) && !$args['children'])
			{
				$children = $node->children();
				foreach ($node->children() as $child)
				{
					if ($child->name() == 'ul') {
						$node->removeChild($child);
					}
				}
			}
		}
	
		if (($node->name() == 'li') && ($id = $node->attributes('id'))) {
			if ($node->attributes('class')) {
				$node->addAttribute('class', $node->attributes('class'));
			} 
		}
	
		if (isset($path) && $node->attributes('id') == $path[0]) {
			$node->addAttribute('id', 'current');
		} else {
			$node->removeAttribute('id');
		}
		$node->removeAttribute('level');
		$node->removeAttribute('access');
	}
	
	define('modS5MainMenuXMLCallbackDefined', true);
}

//set the default S5flex menu params
/*$template_params->_raw = $template_params->_raw."
startLevel=0
showAllChildren=1
window_open=
show_whitespace=0
menu_images=1
menu_images_align=2
menu_images_link=1
expand_menu=1
activate_parent=1
full_active_id=1
menu_style=
";*/
$template_params->def('showAllChildren', 1);
$template_params->def('expand_menu', 1);
$template_params->def('startLevel',	0);
$template_params->def('window_open', "");
$template_params->def('show_whitespace', 0);
$template_params->def('menu_images', 1);
$template_params->def('menu_images_align', 2);
$template_params->def('menu_images_link', 1);
$template_params->def('activate_parent', 1);
$template_params->def('full_active_id',	1);
$template_params->def('menu_style',	"");
if($template_params->get('s5_maxdepth',0) > 0){
	$template_params->def('endLevel', $template_params->get('s5_maxdepth',1));
}else{
	$template_params->def('endLevel', 0);
}

require_once (JPATH_THEMES.DS.$app->getTemplate().DS."vertex/s5flex_menu".DS."module_helper.php");
require_once (JPATH_THEMES.DS.$app->getTemplate().DS."vertex/s5flex_menu".DS."helpers.php");
//S5modMainMenuHelper::S5render($template_params,'modS5MainMenuXMLCallback');
S5modMainMenuHelper::S5buildXML($template_params);

?>