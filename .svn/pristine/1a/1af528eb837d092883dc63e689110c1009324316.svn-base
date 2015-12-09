
<?php
$document = &JFactory::getDocument();
$document->addScript (SITE_URL.'includes/js/jquery-ui-1.8.18.custom/js/jquery-ui-1.8.18.custom.min.js');
$document->addScript (SITE_URL.'includes/js/jquery-ui-1.8.18.custom/js/jquery.ui.datepicker-tr.js');
$document->addStyleSheet (SITE_URL.'includes/js/jquery-ui-1.8.18.custom/css/smoothness/jquery-ui-1.8.18.custom.css');
$document->addScript( SITE_URL.'/components/com_meslek_std_taslak/js/jquery.lightbox_me.js' );
?>
<script>
function uyariDivAc(){
	jQuery("#uyarilarDiv").lightbox_me({
	    centered: true, 
	});
}
function tekrargosterme(id,satirId){
	jQuery("#uyariSatir-"+satirId).toggle(200);
	var url = 'index.php?option=com_ajax&task=uyariTekrarGosterme&format=raw';
 	jQuery.post(
        url,{id:id}, function(data) {
            if(data['success']){
			}
    	},"json"
    );
}
function tumbildirimleritemizle(id){
    jQuery("#notificationNumbersDiv").html('');
    jQuery("#notificationNumbersDiv").removeAttr("onclick");
    jQuery("#uyarilarDiv").trigger('close');;
    var url = 'index.php?option=com_ajax&task=uyariTumunuTemizle&format=raw';
 	jQuery.post(
        url,{id:id}, function(data) {
            if(data['success']){
			}
    	},"json"
    );
}
</script>
<style>
#bildirimlerTablosu tr td {padding:2px 2px 8px 2px}
</style>
<?php 
$userOracleId=JFactory::getUser()->getOracleUserId();
$_db = &JFactory::getOracleDBO();

$sql= "SELECT * FROM m_uyarilar
WHERE gormezden_gel is null and to_user_id = ".$userOracleId."
ORDER BY uyari_id desc";

//$params = array ($userOracleId);

$data = $_db->prep_exec($sql, array());
 foreach ($data as $satir){
 	$i++;
 	$icerik.="<tr id='uyariSatir-".$i."'><td><a href='".$satir["LINK"]."'>".$satir["ACIKLAMA"]."</a></td><td onclick='tekrargosterme(".$satir["UYARI_ID"].",".$i.");' style='cursor:pointer;color:red;' align=center>Tekrar Gösterme</td></tr>";
 }

if ($i>0){
	echo '

	<div id="uyarilarDiv" style="width:600px;  display:none;background-color:#fff;" align=center>
	<br><b>BİLDİRİMLER</b><br>
	<span onclick="tumbildirimleritemizle('.$satir["TO_USER_ID"].');" style="cursor:pointer;color:red;" align=center>Tüm Bildirimleri Temizle</span>
	<br>
	<table id="bildirimlerTablosu" style="margin:10px; font-size:10px;" cellspacing=1>
	'.$icerik.'
	</table>
	</div>
';
}
if($_SESSION["bildirim_gosterildi"]==""){
echo '
	<script>
		uyariDivAc();
	</script>
'; 
}
$_SESSION["bildirim_gosterildi"]="1";

if ($i>0){
echo '
<script>
jQuery("#notificationNumbersDiv").html('.$i.');
jQuery("#notificationNumbersDiv").attr("onclick","uyariDivAc();");
</script>
';
}
?>