<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JApplicationHelper::getPath( 'toolbar_html' ) );
switch($task)
{
  case 'edit':
  case 'add':
    TOOLBAR_kimport::_NEW();
    break;
  
  default:
    TOOLBAR_kimport::_NEW();
    break;
}
?>