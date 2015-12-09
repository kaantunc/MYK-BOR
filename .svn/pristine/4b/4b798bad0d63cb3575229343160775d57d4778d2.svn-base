<?php
@header('Content-Type: text/xml');  
@header("Cache-Control: ");
@header("Pragma: ");
echo '<?xml version="1.0" encoding="utf-8"?>
';
echo "<adayBilgileri>
";
$meslekKodu=substr($_GET["meslekKodu"],0,4);
		$kullaniciBilgileri=array();
		$kullaniciBilgileri[]=array("1001","sgkWsdlUser","s1g2k3wsdl"); 
		
		/*
 		if (!array_search(array($_GET["kurumKodu"],$_GET["kullaniciKodu"],$_GET["sifre"]), $kullaniciBilgileri)){
 			$returnArray["durum"]	= 2; 			
			$returnArray["sonucMesaji"]	= "Kurum kulanıcı bilgeleri hatalı.";
 			$hata=1;
 		}
		*/
		if ($kullaniciBilgileri[0][0]!=$_GET["kurumKodu"] or $kullaniciBilgileri[0][1]!=$_GET["kullaniciKodu"] or $kullaniciBilgileri[0][2]!=$_GET["sifre"]){
			$returnArray["hataKodu"]	= 2;
			$returnArray["sonucMesaji"]	= "Kurum kulanıcı bilgeleri hatalı.";		
			$hata=1;
		}
		if ($hata!=1){
			$mySqlConn = mysql_connect("10.6.30.10", "root", "Myk*%MykBor!*/") or die(mysql_error());
			mysql_select_db("web", $mySqlConn) or die (mysql_error());
			
			mysql_query("SET NAMES utf8");
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
				
			$sql=mysql_query("select yetkod,yetname,meskod from yeterlilik where meskod like '".$meslekKodu."%'",$mySqlConn);
			
			while ($yetInfo=mysql_fetch_array($sql)){
                                $yetkod=$yetInfo[yetkod];
				$myRow.=substr($yetkod,strpos($yetkod,"Y")+1,6).",";
			}
			if($myRow!=""){
				$row=file_get_contents("http://portal.myk.gov.tr/index.php?option=com_oracon&format=raw&tckn=".$_GET["tcKimlikNo"]."&yn=".$myRow);
				$row = json_decode(substr($row,1,-1),true);
			}
			
			$returnArray = array();
			
			if ($row){			
				$sql=mysql_query("select meskod from yeterlilik where yetkod like '%".substr($row[BELGENO],0,6)."%' limit 0,1",$mySqlConn);
				$row2=mysql_fetch_array($sql);
				$returnArray["hataKodu"]						= 0;
				$returnArray["sonucMesaji"]						= "Belirtilen kişi ve mesleğe ait Yeterlilik Belgesi Mesleki Yeterlilik Kurumu bilgileri mevcuttur.";
				$returnArray["tcKimlikNo"]					= $row[TCKIMLIKNO];
				$returnArray["meslekKodu"]					= $meslekKodu;
				$returnArray["meslekKoduEk"]					= substr($row2[0],5,2);
				$returnArray["belgenin_Alindigi_Kurum_Adi"]	= $row[BELGELENDIRME_KURULUSU];
				$returnArray["belgeNo"]						= $row[BELGENO];
				$returnArray["belgeVerilmeTarihi"]			= $row[BELGE_DUZENLEME_TARIHI];
				$returnArray["belgeBitisTarihi"]			= $row[GECERLILIK_TARIHI];
			} else {
				$returnArray["hataKodu"]						= 1;
				$returnArray["sonucMesaji"]						= "Belirtilen kişi ve mesleğe ait Yeterlilik Belgesi Mesleki Yeterlilik Kurumu veritabanında bulunamamıştır.";
			}
		}
		
		foreach($returnArray as $key=>$value){
			echo "<".$key.">".$value."</".$key.">
			";
		}

echo "</adayBilgileri>";

?>