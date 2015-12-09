<?php
$conn = oci_connect ( 'portalbor', '!*MyK767879Bor+', '10.6.30.10/mykdb', 'TR8MSWIN1254' );

$sql = "SELECT 
M_BELGE_SORGU.TCKIMLIKNO,
M_BELGE_SORGU.AD,
M_BELGE_SORGU.SOYAD,
M_BELGE_SORGU.BELGENO,
M_BELGE_SORGU.YETERLILIK_ADI,
M_BELGE_SORGU.YETERLILIK_SEVIYESI,
M_BELGE_SORGU.SINAV_TARIHI,
M_BELGE_SORGU.BELGE_DUZENLEME_TARIHI,
M_BELGE_SORGU.BELGELENDIRME_KURULUSU,
M_BELGE_SORGU.IMZA_YETKILISI,
M_BELGE_SORGU.AKREDITASYON_NO
 FROM M_BELGE_SORGU LEFT JOIN M_YETERLILIK ON M_BELGE_SORGU.YETERLILIK_ID = M_YETERLILIK.YETERLILIK_ID WHERE 1=1 ";

if (isset($_GET["sektor"]) && $_GET["sektor"]!=""){
	$sql .= " AND M_YETERLILIK.SEKTOR_ID = ".$_GET["sektor"]." ";
}

if (isset($_GET["bastarih"]) && $_GET["bastarih"]!=""){
	$sql .= " AND  M_BELGE_SORGU.BELGE_DUZENLEME_TARIHI  >= '".$_GET["bastarih"]."' ";
}

if (isset($_GET["bittarih"]) && $_GET["bittarih"]!=""){
	$sql .= " AND M_BELGE_SORGU.BELGE_DUZENLEME_TARIHI  <= '".$_GET["bittarih"]."' ";
}

$sql .=" order by M_BELGE_SORGU.YETERLILIK_ADI,M_BELGE_SORGU.BELGE_DUZENLEME_TARIHI";
if ($_GET["o"]!=""){
	$sql .= ",".$_GET["o"];
	
	if ($_GET["ters"]!=""){
		$sql .=" desc";
	}
}


$s = oci_parse ( $conn, $sql );
$res = oci_execute ( $s );
oci_fetch_all ( $s, $res );

foreach ( $res as $a => $b ) {
	$i = 0;
	foreach ( $b as $c ) {
		
		$liste [$i] [$a] = $c;
		$i ++;
	}
}
function cleanData(&$str) {
	$str = preg_replace ( "/\t/", "\\t", $str );
	$str = preg_replace ( "/\r?\n/", "\\n", $str );
	if (strstr ( $str, '"' ))
		$str = '"' . str_replace ( '"', '""', $str ) . '"';
} 
// filename for download 

$filename = "belgeler_" . date('Ymd') . ".xls"; 

// Send Header
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=$filename "); // à¹à¸¥à¹‰à¸§à¸™à¸µà¹ˆà¸à¹‡à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œ
header("Content-Transfer-Encoding: binary ");

// XLS Data Cell

xlsBOF();
xlsWriteLabel(0,0,"TC KİMLİK NO");
xlsWriteLabel(0,1,"ADI");
xlsWriteLabel(0,2,"SOYADI");
xlsWriteLabel(0,3,"BELGE NO");
xlsWriteLabel(0,4,"YETERLİLİK ADI");
xlsWriteLabel(0,5,"YETERLİLİK SEVİYESİ");
xlsWriteLabel(0,6,"SINAV TARİHİ");
xlsWriteLabel(0,7,"BELGE DÜZENLEME TARİHİ");
xlsWriteLabel(0,8,"BELGELENDİRME KURULUSU");
xlsWriteLabel(0,9,"İMZA YETKİLİSİ");
xlsWriteLabel(0,10,"AKREDİTASYON NO");
$xlsRow = 1;
foreach($liste as $row) { 
	xlsWriteLabel($xlsRow,0,$row['TCKIMLIKNO']);
	xlsWriteLabel($xlsRow,1,$row['AD']);
	xlsWriteLabel($xlsRow,2,$row['SOYAD']);
	xlsWriteLabel($xlsRow,3,$row['BELGENO']);
	xlsWriteLabel($xlsRow,4,$row['YETERLILIK_ADI']);
	xlsWriteLabel($xlsRow,5,$row['YETERLILIK_SEVIYESI']);
	xlsWriteLabel($xlsRow,6,$row['SINAV_TARIHI']);
	xlsWriteLabel($xlsRow,7,$row['BELGE_DUZENLEME_TARIHI']);
	xlsWriteLabel($xlsRow,8,$row['BELGELENDIRME_KURULUSU']);
	xlsWriteLabel($xlsRow,9,$row['IMZA_YETKILISI']);
	xlsWriteLabel($xlsRow,10,$row['AKREDITASYON_NO']);
	$xlsRow++;
}

xlsEOF();

oci_close ( $conn );



function xlsBOF() {
	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
	return;
}

function xlsEOF() {
	echo pack("ss", 0x0A, 0x00);
	return;
}

function xlsWriteNumber($Row, $Col, $Value) {
	echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
	echo pack("d", $Value);
	return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
	$L = strlen($Value);
	echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
	echo $Value;
	return;
}

?>