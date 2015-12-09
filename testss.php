<?php

$sql="select * from m_terim";

function getir($sql){
	$conn = oci_connect("yeni3", "yeni3", "//10.6.30.11/mykdb");
	
	$s = oci_parse($conn, $sql);
	$res=oci_execute($s);
	oci_fetch_all($s, $res);

	return $res;
	oci_close($conn);
}

function isle($sql){
	$conn = oci_connect("yeni3", "yeni3", "//10.6.30.11/mykdb");
	
	$s = oci_parse($conn, $sql);
	$res=oci_execute($s);
	oci_fetch_all($s, $res);

	return $res;
	oci_close($conn);
}

$a=getir($sql);

print_r($a[TERIM_ID]);

for($i=0;$i<$a[TERIM_ID];$i++){
	echo $row[TERIM_ID][$i]." - ".$row[TERIM_ADI][$i]." - ".$row[TERIM_ACIKLAMA][$i]."<br>";
} 

?>