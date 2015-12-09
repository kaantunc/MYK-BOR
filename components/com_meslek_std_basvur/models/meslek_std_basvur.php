<?php
defined('_JEXEC') or die('Restricted access');

class Meslek_Std_BasvurModelMeslek_Std_Basvur extends JModel {
	
	var $title 	  = "Meslek Standardı Başvuru Formu"; 
	var $pages 	  = array ("kurulus_bilgi","irtibat","faaliyet","kapsam","ek","basvuru_dokumani");
	var $pageNames= array ("Kuruluş Bilgileri","İrtibat Bilgileri", "Faaliyet Bilgileri","Standart Kapsamı", "Kişi Bilgi Eki", "Başvuru Dökümanı");
	
	function getMeslekValues ($evrak_id){	
		$db  = &JFactory::getOracleDBO();
		$sql = "SELECT 	seviye_id, 
						seviye_adi,
						sektor_id, 
						sektor_adi, 
						standart_id, 
						standart_adi,
						standart_tanimi, 
						yasal_duzenleme, 
						mevcut_calisma, 
						TO_CHAR (baslangic_tarihi, 'dd.mm.yyyy') as baslangic_tarihi, 
						TO_CHAR (bitis_tarihi, 'dd.mm.yyyy') as bitis_tarihi 
				FROM m_meslek_standartlari  
					JOIN m_meslek_stan_evrak USING (standart_id)  
					JOIN pm_seviye USING (seviye_id)  
					JOIN pm_sektorler USING (sektor_id)  
				WHERE evrak_id = ?";
		
		$params = array ($evrak_id);
		return $db->prep_exec($sql, $params);
	}
	
	function getBelgeBasvurular($userId){
		$db = &JFactory::getOracleDBO();
		
		$sql = "SELECT 	M_BASVURU.EVRAK_ID, M_BASVURU.USER_ID, TO_CHAR(BASVURU_TARIHI,'dd/mm/yyyy') as BASVURU_TARIHI,M_BASVURU.BASVURU_TIP_ID,BASVURU_DURUM_ADI AS DURUM,BASVURU_DURUM_ID AS DURUM_ID
				FROM M_BASVURU
        JOIN PM_BASVURU_DURUM USING(BASVURU_DURUM_ID)
		        WHERE M_BASVURU.BASVURU_TIP_ID = 1
		        AND M_BASVURU.USER_ID = ?";
		
		return $db->prep_exec($sql, array($userId));
	}
	
	function getBasvuruDurumu($evrak_id){
		$db = &JFactory::getOracleDBO();
		
		$sql = "SELECT 	M_BASVURU.EVRAK_ID, M_BASVURU.USER_ID, TO_CHAR(BASVURU_TARIHI,'dd/mm/yyyy') as BASVURU_TARIHI,M_BASVURU.BASVURU_TIP_ID,BASVURU_DURUM_ADI AS DURUM,BASVURU_DURUM_ID AS DURUM_ID
				FROM M_BASVURU
        JOIN PM_BASVURU_DURUM USING(BASVURU_DURUM_ID)
		        WHERE M_BASVURU.BASVURU_TIP_ID = 1
		        AND M_BASVURU.EVRAK_ID = ?";
		
		return $db->prep_exec($sql, array($evrak_id));
	}
	
	function ajaxBasvuruSil($post){
		$db = &JFactory::getOracleDBO();
		
		$sql="DELETE FROM M_BASVURU_SEKTOR WHERE EVRAK_ID = ?";
		$db->prep_exec($sql, array($post['evrakId']));
		
		$sql="DELETE FROM M_BASVURU WHERE EVRAK_ID=?";
		
		return $db->prep_exec($sql, array($post['evrakId']));
	}
	
	function getBasvuruDurumlari(){
		$_db = & JFactory::getOracleDBO();
		$sql = "SELECT BASVURU_DURUM_ID,BASVURU_DURUM_ADI FROM PM_BASVURU_DURUM";
		$data = $_db->prep_exec($sql,array());
		return $data;
	}

    function getAllKurulus($kurulus_durum,$kurulusId){
        $db = JFactory::getOracleDBO ();
        $sql = "SELECT DISTINCT M_KURULUS_EDIT.USER_ID AS USER_ID, M_KURULUS_EDIT.KURULUS_ADI AS KURULUS_ADI,
                M_KURULUS_EDIT.KURULUS_KISA_ADI AS KURULUS_KISA_ADI, M_KURULUS_EDIT.USER_ID AS KURULUS_ID,
                M_KURULUS_EDIT.KURULUS_EPOSTA AS KURULUS_EPOSTA
				FROM M_KURULUS
				  JOIN M_KURULUS_EDIT ON M_KURULUS.USER_ID = M_KURULUS_EDIT.USER_ID
				  WHERE M_KURULUS_EDIT.AKTIF = 1 AND M_KURULUS_EDIT.ONAY_BEKLEYEN = 0 AND M_KURULUS.USER_ID != ? AND M_KURULUS.KURULUS_DURUM_ID IN(".$kurulus_durum.")
				UNION
				SELECT DISTINCT USER_ID, KURULUS_ADI, KURULUS_KISA_ADI, USER_ID AS KURULUS_ID,
                KURULUS_EPOSTA
				FROM M_KURULUS
				  WHERE USER_ID NOT IN (SELECT USER_ID FROM M_KURULUS_EDIT WHERE AKTIF = 1) AND M_KURULUS.USER_ID != ? AND M_KURULUS.KURULUS_DURUM_ID IN(".$kurulus_durum.")
				  ORDER BY KURULUS_ADI ASC";
        $data = $db->prep_exec($sql, array($kurulusId,$kurulusId));

        if($data){
            return $data;
        }else{
            return false;
        }
    }
}
?>