<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.event.plugin' );
jimport('joomla.application.component.view');
jimport('joomla.html.pane');

class  plgSystemS5FlexMenu extends JPlugin{
	
	var $_params;
	
	function plgSystemS5FlexMenu(& $subject){
		parent::__construct($subject);		
		$this->_plugin = JPluginHelper::getPlugin( 'system', 'S5FlexMenu' );
		$this->_params = new JParameter( $this->_plugin->params );
	}

 	function getSystemParams($path){
		$params	= null;
		$item	= $this->getModulesData();
		if(isset($item->params)){
			$params = new JParameter( $item->params );
		}	
		else{
			$params = new JParameter( "" );
		}	

		if (file_exists( $path )) {
			$xml =& JFactory::getXMLParser('Simple');
			if ($xml->loadFile($path)) {
				$document =& $xml->document;
				$params->setXML($document->getElementByPath('state/params'));						
			}
		}
		return $params->render('params');	
	}
	
	function getTemplateParams(){
		jimport('joomla.filesystem.path');
		
		$cid		= JRequest::getVar('cid', array(), 'method', 'array');
		$cid		= array(JFilterInput::clean(@$cid[0], 'cmd'));
		$template	= $cid[0];
		$client		=& JApplicationHelper::getClientInfo(JRequest::getVar('client', '0', '', 'int'));
		$tBaseDir	= JPath::clean($client->path.DS.'templates');

		$ini	= $client->path.DS.'templates'.DS.$template.DS.'params.ini';
		$xml	= $client->path.DS.'templates'.DS.$template.DS.'templateDetails.xml';

		jimport('joomla.filesystem.file');
		// Read the ini file
		if (JFile::exists($ini)) {
			$content = JFile::read($ini);
		} else {
			$content = null;
		}

		$params = new JParameter($content, $xml, 'template');
		return $params;	
	}
	
	function onAfterRender(){
		global $mainframe;
			
		if(!isset($this->_plugin)){
			return;
		}
		if(JRequest::getVar("option") == "com_menus" && JRequest::getVar("task") == "edit"){
			$path = JPATH_PLUGINS.DS.'system'.DS.'S5FlexMenu'.DS.'element'.DS.'S5FlexMenu.xml';
			$params	= $this->getSystemParams($path);
			JView::assignRef('params' , $params);
			$item = $this->getModulesData();
			ob_start();
			$pane = &JPane::getInstance('sliders', array('allowAllClose' => true));
			JView::assignRef('pane', $pane);
			
			echo $this->pane->startPanel(JText :: _('Parameters - S5 Flex Menu'), "S5SM-page");
			echo $params;
			echo $this->pane->endPanel();
					
			$thexml = ob_get_clean();
			$body = JResponse::getBody();
					
			$start_string = '<div id="menu-pane" class="pane-sliders">';		
			$body = str_replace($start_string, $start_string.$thexml, $body);
			JResponse::setBody($body);
		}
		
		if(JRequest::getVar("option") == "com_templates" && JRequest::getVar("task") == "edit"){			
			$path = JPATH_PLUGINS.DS.'system'.DS.'S5FlexMenu'.DS.'element'.DS.'S5FlexTemplate.xml';
			$params	= $this->getSystemParams($path);
			$template_params = $this->getTemplateParams();
			JView::assignRef('params' , $params);
			$item = $this->getModulesData();			
			$body = JResponse::getBody();
					
			$start_string = '<legend>Parameters</legend>';
			$body = str_replace($start_string, $start_string.$params, $body);
			JResponse::setBody($body);
		}
		
		return true;		
	}

	// for getItem
	function getModulesData(){
		$db =& JFactory::getDBO();
		$id = JRequest::getVar('cid', 0, '', 'array');
		$id = (int) $id[0];
		if($id == ""){ 
			$id = 0;
		}	
		$query = "SELECT * FROM #__menu WHERE id = ".$id;
		$db->setQuery($query);
		if($return = $db->loadObject()){
			return $return;
		}else{
			return array();
		}
	}
}
?>