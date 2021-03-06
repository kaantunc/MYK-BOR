<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class SinavViewSinav_Yetki_Yeterlilik_Ara extends JView
{
	function display($tpl = null)
	{

		$user =& JFactory::getUser();
		if($user->get('guest')){
        	global $mainframe;
        	$mainframe->redirect('index.php?option=com_user&view=login',JText::_('LOGIN_DESCRIPTION'));
        }
        $user_id =  $user->getOracleUserId ();
		$model = &$this->getModel();
		
		$db = & JFactory::getOracleDBO();
		
		$getData = JRequest::get( 'get' );
		
		$kurulus = $model->KuruluslariGetir();
		$yeterlilik = $model->YeterlilikGetir();
		
		$this->assignRef('kurulus'  , $kurulus);
		$this->assignRef('yeterlilik'  , $yeterlilik);
		/*$yetki_yeterlilik = $model->getYetkiYeterlilik($db, $user_id);
		
		$this->assignRef('yetki_yeterlilik'  , $yetki_yeterlilik);*/
		
		parent::display($tpl);
	}	
}
?>
