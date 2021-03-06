<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class Yeterlilik_TaslakModelOnayli_Taslak_Listele extends JModel {
	
    function getTaslaklar($db){
		$user = & JFactory::getUser();
    	$userId = $user->getOracleUserId();
    	$isSektorSorumlusu = (FormFactory::checkAclGroupId($user->id, YET_SEKTOR_SORUMLUSU_GROUP_ID));
    	
    	if ($isSektorSorumlusu){
    		$sektor	 = FormFactory::getSorumluSektorId ($userId, YET_SEKTOR_TIPI);
    		$sqlPart = "";
    		
    		if (count($sektor) > 0){
	    		$sqlPart .= "m_yeterlilik.sektor_id IN ( ";
	    		 
	    		for ($i = 0; $i < count($sektor); $i++){
	    			$sqlPart .= $sektor[$i];
	    		
	    			if ($i != count($sektor)-1){
	    				$sqlPart .= ",";
	    			}
	    		} 
	    		 
	    		$sqlPart .= ") ";
			}
    		
    		$params = array ();
    	}else{
    		$sqlPart = " USER_ID = ? ";
    		$params = array($userId);
    	}
    	
    	if ($sqlPart != ""){
    		$sql = "SELECT DISTINCT 
    							m_yeterlilik.YETERLILIK_ID, 
    							m_yeterlilik.YETERLILIK_ADI, 
    							SEVIYE_ADI, 
    							YETERLILIK_BASLANGIC AS BASLANGIC_TARIHI_FORMATTED, 
    							YETERLILIK_SUREC_DURUM_ADI, 
    							m_yeterlilik.YETERLILIK_SUREC_DURUM_ID, 
    							m_yeterlilik.SEKTOR_ID, 
    							SEKTOR_ADI,
    							SON_TASLAK_PDF  
						FROM m_yeterlilik, 
							 m_taslak_yeterlilik,
							 pm_seviye, 
							 pm_yeterlilik_surec_durum, 
							 pm_sektorler, 
							 m_yetki_yeterlilik,
							 m_kurulus_yetki, 
							 m_yetki
						WHERE m_yeterlilik.YETERLILIK_ID = m_yetki_yeterlilik.YETERLILIK_ID
							AND m_yetki_yeterlilik.YETKI_ID = m_kurulus_yetki.YETKI_ID
							AND m_yetki_yeterlilik.YETKI_ID = m_yetki.YETKI_ID
							AND m_yetki.ETKIN = 1
							AND m_taslak_yeterlilik.yeterlilik_id = m_yeterlilik.yeterlilik_id
							AND m_yeterlilik.YETERLILIK_SUREC_DURUM_ID = pm_yeterlilik_surec_durum.YETERLILIK_SUREC_DURUM_ID
							AND m_yeterlilik.SEKTOR_ID = pm_sektorler.SEKTOR_ID 
							AND m_yeterlilik.seviye_id = pm_seviye.seviye_id
							AND yeterlilik_durum_id = ".PM_YETERLILIK_DURUMU__ULUSAL_YETERLILIK." 
		    				AND ".$sqlPart;
    		
			$taslaklar = $db->prep_exec($sql, $params);
    	}else{
    		$taslaklar = null;
    	}
		return $taslaklar;
    }
   
}
?>
