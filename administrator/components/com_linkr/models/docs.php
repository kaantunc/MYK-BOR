<?php
defined('_JEXEC') or die;
jimport( 'joomla.application.component.model' );

/**
 * Bookmarks model for Linkr component
 * 
 * @package	Linkr
 * @author		Frank
 */
class LinkrModelDocs extends JModel
{
	function getTemplate()
	{
		global $mainframe;
		
		$tmpl	= $mainframe->getUserStateFromRequest( 'linkr.docs', 'about', '', 'word' );
		
		switch ( $tmpl )
		{
			case 'bookmarks':
				$template	= 'bookmarks';
				break;
			
			case 'related':
				$template	= 'related';
				break;
			
			default:
				$template	= 'faqs';
		}
		
		return $template;
	}
}
