<?php
@header('Content-Type: text/xml');  
@header("Cache-Control: ");
@header("Pragma: ");

$mySqlConn = mysql_connect("10.6.30.10", "root", "Myk*%MykBor!*/") or die(mysql_error());
mysql_select_db("web", $mySqlConn) or die (mysql_error());

mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");

mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
	
$sql=mysql_query("select distinct meskod,yetname,seviye_id from yeterlilik where meskod <> '' order by yetname, seviye_id",$mySqlConn);
echo '<?xml version="1.0" encoding="utf-8"?>';
echo "<tumListe>
";
while ($yetInfo=mysql_fetch_array($sql)){
	echo "
	<item>
		<meslekKodu>".$yetInfo[0]."</meslekKodu>
		<meslekAdi>".$yetInfo[1]." (Seviye ".$yetInfo[2].")</meslekAdi>
	</item>
	";
}
echo "</tumListe>";

?>