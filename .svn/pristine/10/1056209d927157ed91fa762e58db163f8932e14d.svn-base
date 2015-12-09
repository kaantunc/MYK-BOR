<?php
$kac_gun_kala_hatirlatilacak=7;

$tarih=date ("d-m-y",strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " +".$kac_gun_kala_hatirlatilacak." day"));
echo $tarih."<br>";
$conn = oci_connect('yeni5', 'yeni5', '10.6.30.11/MYKDB');


$sql = oci_parse($conn, "select * from M_TASLAK_MESLEK where SON_GORUS_TARIHI='".$tarih."'");
oci_execute($sql);
while ($row = oci_fetch_array($sql)){
	bildirim_olusturByStandartYeterlilik($row["STANDART_ID"],2);
}

$sql = oci_parse($conn, "select * from M_STANDART_REVIZYON where SON_GORUS_TARIHI='".$tarih."'");
oci_execute($sql);
while ($row = oci_fetch_array($sql)){
	bildirim_olusturByStandartYeterlilik($row["STANDART_ID"],2,true);
}

$sql = oci_parse($conn, "select * from M_TASLAK_YETERLILIK where SON_GORUS_TARIHI='".$tarih."'");
oci_execute($sql);
while ($row = oci_fetch_array($sql)){
	bildirim_olusturByStandartYeterlilik($row["YETERLILIK_ID"],1);
}

$sql = oci_parse($conn, "select * from M_YETERLILIK_REVIZYON where SON_GORUS_TARIHI='".$tarih."'");
oci_execute($sql);
while ($row = oci_fetch_array($sql)){
	bildirim_olusturByStandartYeterlilik($row["YETERLILIK_ID"],1,true);
}

$sql = oci_parse($conn, "select YETKI_ID,ADI,YETKI_TURU, TO_CHAR (BITIS_TARIHI , 'dd.mm.yyyy') as TARIH from M_YETKI where BITIS_TARIHI='".$tarih."'");
oci_execute($sql);
while ($row = oci_fetch_array($sql)){
	bildirim_olusturByYetki($row["YETKI_ID"],$row["YETKI_TURU"],iconv("ISO-8859-9","UTF-8//TRANSLIT",$row["ADI"]),$row["TARIH"]);
}



function bildirim_olusturByStandartYeterlilik($id,$tip,$rev){
	global $conn;
	global $tarih;
	
	if ($tip==1){
		if($rev){
			$sql = oci_parse($conn, "select YETERLILIK_ADI,SEVIYE_ID, TO_CHAR (SON_GORUS_TARIHI , 'dd.mm.yyyy') as TARIH,REVIZYON_NO,SEKTOR_ID from M_YETERLILIK join M_YETERLILIK_REVIZYON using(yeterlilik_id) where SON_GORUS_TARIHI='".$tarih."' AND yeterlilik_id=$id");
			oci_execute($sql);
			$row = oci_fetch_array($sql);
			$metin=iconv("ISO-8859-9","UTF-8//TRANSLIT",$row["YETERLILIK_ADI"])." (".$row["SEVIYE_ID"].". Seviye) ".$row["REVIZYON_NO"].". revizyonunun görüş süresi ".$row["TARIH"]." tarihinde dolacaktır.";
			$link="index.php?option=com_yeterlilik_taslak_yeni&view=taslak_revizyon&yeterlilik_id=".$id;
			bildirimKaydet($row["SEVIYE_ID"],$tip,$metin,$link);
		} else {
			$sql = oci_parse($conn, "select YETERLILIK_ADI,SEVIYE_ID, TO_CHAR (SON_GORUS_TARIHI , 'dd.mm.yyyy') as TARIH,SEKTOR_ID from M_YETERLILIK join M_TASLAK_YETERLILIK using(yeterlilik_id) where SON_GORUS_TARIHI='".$tarih."' AND yeterlilik_id=$id");
			oci_execute($sql);
			$row = oci_fetch_array($sql);
			$metin=iconv("ISO-8859-9","UTF-8//TRANSLIT",$row["YETERLILIK_ADI"])." (".$seviye.". Seviye)  taslağının görüş süresi ".$row["TARIH"]." tarihinde dolacaktır.";
			$link="index.php?option=com_yeterlilik_taslak_yeni&view=taslak_revizyon&yeterlilik_id=".$id;
			bildirimKaydet($row["SEVIYE_ID"],$tip,$metin,$link);
		}
	} else {
		if($rev){
			$sql = oci_parse($conn, "select STANDART_ADI,SEVIYE_ID, TO_CHAR (SON_GORUS_TARIHI , 'dd.mm.yyyy') as TARIH,REVIZYON_NO,SEKTOR_ID from M_MESLEK_STANDARTLARI join M_STANDART_REVIZYON using(standart_id) where SON_GORUS_TARIHI='".$tarih."' AND STANDART_ID=$id");
			oci_execute($sql);
			$row = oci_fetch_array($sql);
			$metin=iconv("ISO-8859-9","UTF-8//TRANSLIT",$row["STANDART_ADI"])." (".$row["SEVIYE_ID"].". Seviye) ".$row["REVIZYON_NO"].". revizyonunun görüş süresi ".$row["TARIH"]." tarihinde dolacaktır.";
			$link="index.php?option=com_meslek_std_taslak&view=taslak_revizyon&standart_id=".$id;
			bildirimKaydet($row["SEVIYE_ID"],$tip,$metin,$link);
		} else {
			$sql = oci_parse($conn, "select STANDART_ADI,SEVIYE_ID, TO_CHAR (SON_GORUS_TARIHI , 'dd.mm.yyyy') as TARIH,SEKTOR_ID from M_MESLEK_STANDARTLARI join M_TASLAK_MESLEK using(standart_id) where SON_GORUS_TARIHI='".$tarih."' AND STANDART_ID=$id");
			oci_execute($sql);
			$row = oci_fetch_array($sql);
			$metin=iconv("ISO-8859-9","UTF-8//TRANSLIT",$row["STANDART_ADI"])." (".$row["SEVIYE_ID"].". Seviye) taslağının görüş süresi ".$row["TARIH"]." tarihinde dolacaktır.";
			$link="index.php?option=com_meslek_std_taslak&view=taslak_revizyon&standart_id=".$id;
			bildirimKaydet($row["SEVIYE_ID"],$tip,$metin,$link);
		}
		
	}
	
//	echo $metin."-".$link."<br>";
	
}

function bildirim_olusturByYetki($id,$turu,$adi,$tarih){
	global $conn;
	
	$metin=iconv("ISO-8859-9","UTF-8//TRANSLIT",$adi)." protokolunun süresi ".$tarih." tarihinde dolacaktır.";
	
	$sektorler=array();
//	echo "$id,$tip,$adi,$tarih<br>";
	if ($turu==1){
		$tip=2;
		$link="index.php?option=com_yetkilendirme_ms&layout=yeni&yetkilendirmeID=".$id;
		$sql = oci_parse($conn, "select sektor_id from m_yetki_standart join m_meslek_standartlari using (standart_id) where yetki_id=".$id."");
		oci_execute($sql);
		while ($row = oci_fetch_array($sql)){
			if (in_array($row["SEKTOR_ID"], $sektorler)===FALSE) {
				$sektorler[]=$row["SEKTOR_ID"];
			}			
		}
	}
	if ($turu==2){
		$tip=1;
		$link="index.php?option=com_yetkilendirme_yet&layout=yeni&protokolID=".$id;
		$sql = oci_parse($conn, "select sektor_id from m_yetki_yeterlilik join m_yeterlilikler using (yeterlilik_id) where yetki_id=".$id."");
		oci_execute($sql);
		while ($row = oci_fetch_array($sql)){
			if (in_array($row["SEKTOR_ID"], $sektorler, false)) {
				$sektorler[]=$row["SEKTOR_ID"];
			}			
		}
	}
	for($i=0;$i<count($sektorler);$i++){
		bildirimKaydet($sektorler[$i],$tip,$metin,$link);
	}
	
}

















function bildirimKaydet($sektor,$tip,$metin,$link){
	global $conn;
	$sql = oci_parse($conn, "select user_id from m_yetki_sektor_sorumlusu where sektor_id=".$sektor." and yetki_alani=".$tip);
	oci_execute($sql);
	while ($row = oci_fetch_array($sql)){
//		$sql3 = "select UYARI_ID_SEQ.nextval from dual";
//		$uyariId=oci_execute($sql3);
//		$uyariId = oci_fetch_array($sql3);

		$sql2 = oci_parse($conn, "INSERT INTO m_uyarilar
				(UYARI_ID,
				FROM_USER_ID,
				ACIKLAMA,
				LINK,
				TO_USER_ID,
				tarih)
				VALUES
				(UYARI_ID_SEQ.NEXTVAL,0,'".iconv("UTF-8", "ISO-8859-9//TRANSLIT",$metin)."','".$link."','".$row["USER_ID"]."',".time().")");
		oci_execute($sql2);
	}


}

