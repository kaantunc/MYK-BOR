<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class TOOLBAR_kimport {
  function _NEW() {
    JToolBarHelper::title( JText::_( 'KImport' ),'generic.png' );	  
    JToolBarHelper::save();
    //JToolBarHelper::apply();
    //JToolBarHelper::cancel();
  }
  
  function _DEFAULT() {
    JToolBarHelper::title( JText::_( 'KImport' ), 'generic.png' );
    JToolBarHelper::publishList();
    JToolBarHelper::unpublishList();
    JToolBarHelper::editList();
    JToolBarHelper::deleteList();
    JToolBarHelper::addNew();
  }
}
?>