
<?php
$document = &JFactory::getDocument();
$document->addScript (SITE_URL.'includes/js/jquery-ui-1.8.18.custom/js/jquery-ui-1.8.18.custom.min.js');
$document->addScript (SITE_URL.'includes/js/jquery-ui-1.8.18.custom/js/jquery.ui.datepicker-tr.js');
$document->addStyleSheet (SITE_URL.'includes/js/jquery-ui-1.8.18.custom/css/smoothness/jquery-ui-1.8.18.custom.css');
$document->addScript( SITE_URL.'/components/com_meslek_std_taslak/js/jquery.lightbox_me.js' );
?>
<script>
function yardimDivAc(){
	jQuery("#yardimDiv").lightbox_me({
	    centered: true, 
	});
}
function kapat(){
    jQuery("#yardimDiv").trigger('close');;
}
</script>
<div id="yardimDiv" style="width:600px;  display:none;background-color:#fff;" align=center>
<table style="width:100%;padding:20px;text-align:justify"><tr><td>
<?php 
$_db = &JFactory::getOracleDBO();
if ($_GET["option"]==""){
	$option="bilesen is null";
} else {
	$option="bilesen='".$_GET["option"]."'";
}

if ($_GET["view"]==""){
	$viewpage="viewpage is null";
} else {
	$viewpage="viewpage='".$_GET["view"]."'";
}

if ($_GET["layout"]==""){
	$layout="layout is null";
} else {
	$layout="layout='".$_GET["layout"]."'";
}

$sql= "SELECT metin FROM m_yardim
WHERE $option
AND  $viewpage
AND  $layout";


$data = $_db->prep_exec_array($sql, array());

if ($data){
	echo nl2br($data[0]);
} else {
	echo "Bu sayfa hakkında yardım yoktur.";
}

?>
</td></tr></table>
</div>
