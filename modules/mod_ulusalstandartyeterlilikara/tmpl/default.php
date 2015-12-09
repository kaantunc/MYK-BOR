<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe = &JFactory::getApplication();
$limit = $mainframe->getUserStateFromRequest( "limit", 'limit', $mainframe->getCfg('list_limit') );
$limitstart = $mainframe->getUserStateFromRequest( "$option.limitstart", 'limitstart', 0 );
?>
<div style="">
	<input type="radio" id="meslekStandardiYeterlilikRadioButton1"
		name="meslekStandardiYeterlilikRadioButton"
		class="required meslekStandardiYeterlilikRadioButton" value="meslek" checked="" onchange="tipSeviye()"/>Meslek
	Standardı
	<input type="radio" id="meslekStandardiYeterlilikRadioButton2"
		name="meslekStandardiYeterlilikRadioButton"
		class="required meslekStandardiYeterlilikRadioButton" value="yeterlilik"  onchange="tipSeviye()"/>Yeterlilik
		<br>
		<input type="checkbox" id="meslekStandardiYeterlilikCheckboxButton" name="meslekStandardiYeterlilikCheckboxButton"   onchange="tipSeviye()" value="1"> Taslak ve Öntaslaklardan da getir
<br />
</div>

<div>
	<select style="float:left;margin:2px;" class="required"
		id="meslekStandardiYeterlilikAra_SektorSelect" onchange="sektor();">
		<?php
		echo "<option value=''>Bir Sektör Seçiniz</option>";
		foreach($meslekStandartSektorleri as $sektor){
			echo "<option value='".$sektor["SEKTOR_ID"]."'>".$sektor["SEKTOR_ADI"]."</option>";
		}
		?>
	</select>
</div>

<div id="seviye" style="">
</div>

<div id="standart" style="float:left;">
</div>

<div id="sorgulaButton">
</div>

<div id="listeTablosu" style="width: 580px; padding:10px; height:325px; overflow: auto;">
</div>
<div id="aktarButon" style="margin-top:10px; margin-left: auto; margin-right: auto;"></div>


<script>
function tipSeviye(){
    var rtip= jQuery('input[name=meslekStandardiYeterlilikRadioButton]:checked').val()
    var taslak= jQuery('input[name=meslekStandardiYeterlilikCheckboxButton]:checked').val()
    var sektor=jQuery('#meslekStandardiYeterlilikAra_SektorSelect').val();
    if (sektor){
        seviyeAl(sektor,rtip,taslak);
    }
}

function sektor(){
    var rtip= jQuery('input[name=meslekStandardiYeterlilikRadioButton]:checked').val()
    var taslak= jQuery('input[name=meslekStandardiYeterlilikCheckboxButton]:checked').val()
    seviyeAl(jQuery('#meslekStandardiYeterlilikAra_SektorSelect').val(),rtip,taslak);
}

function seviyeAl(veri,stip,taslak){
    if (veri){
        jQuery("#seviye").html("Bekleyiniz...");
        jQuery("#standart").html("");
        jQuery("#sorgulaButton").html("");
    //    var sendData = "sektorID="+veri;
        var url = 'index.php?option=com_ajax&task=getStandartSeviye&format=raw';
            
        var seviyeIcerik="";
    	jQuery.post(
            url,{sektorID:veri,tip:stip,taslak:taslak}, function(data) {
                if(data['success']){
                    var gelenIcerik = data['array'];
                    var adet = gelenIcerik.length;
                    
                     seviyeIcerik='<select class="required" style="margin:2px;" id="meslekStandardiYeterlilikAra_SeviyeSelect" onchange="standartListele(jQuery(\'#meslekStandardiYeterlilikAra_SeviyeSelect\').val(),jQuery(\'#meslekStandardiYeterlilikAra_SektorSelect\').val(),jQuery(\'input[name=meslekStandardiYeterlilikRadioButton]:checked\').val(),jQuery(\'input[name=meslekStandardiYeterlilikCheckboxButton]:checked\').val());";>'
                    +'<option value=\"\">Seviye Seçiniz</option>';
                    for(var i=0;i<adet;i++){
                        seviyeIcerik=seviyeIcerik + '<option value="'+gelenIcerik[i]["SEVIYE_ID"]+'">'+gelenIcerik[i]["SEVIYE_ADI"]+'</option>';
                    }
                    seviyeIcerik=seviyeIcerik+'</select>';
                    jQuery("#seviye").html(seviyeIcerik);
                }else{
                    if (stip=="meslek"){
                        ne="Meslek Standartı";
                    } else {
                        ne="Ulusal Yeterlilik";
                    }
                    alert("Seçtiğiniz sektörde henüz "+ne+" yok.")
                
                }
        	},"json"
        );
    } else {
        jQuery("#seviye").html("Sektör seçmediniz.");
        jQuery("#standart").html("");
        jQuery("#sorgulaButton").html("");
        
    }
}

function standartListele(seviye,sektor,stip,taslak)
{
    if(seviye){
        jQuery("#standart").html("Bekleyiniz");
        jQuery("#sorgulaButton").html("");
        var url = 'index.php?option=com_ajax&task=getStandart&format=raw';        
        var seviyeIcerik="";
    	jQuery.post(
            url,{sektorID:sektor,seviyeID:seviye,tip:stip,taslak:taslak}, function(data) {
                if(data['success']){
                    var gelenIcerik = data['array'];
                    var adet = gelenIcerik.length;
                    
                    if (stip=="meslek"){
                        seviyeIcerik='<select class="required" style="margin:2px;" id="meslekStandardiYeterlilik_Select" onchange="buttonGoster(jQuery(\'#meslekStandardiYeterlilik_Select\').val());">'
                            +'<option value=\"\">Standart Seçiniz</option>';
                    } else {
                        seviyeIcerik='<select class="required" style="margin:2px;" id="meslekStandardiYeterlilik_Select" onchange="buttonGoster(jQuery(\'#meslekStandardiYeterlilik_Select\').val());">'
                             +'<option value=\"\">Yeterlilik Seçiniz</option>';
                    }
                    for(var i=0;i<adet;i++){
                        if (stip=="meslek"){
                            seviyeIcerik=seviyeIcerik + '<option value="'+gelenIcerik[i]["TASLAK_MESLEK_ID"]+'">'+gelenIcerik[i]["STANDART_ADI"]+'</option>';
                        } else {
                        	seviyeIcerik=seviyeIcerik + '<option value="'+gelenIcerik[i]["YETERLILIK_ID"]+'">'+gelenIcerik[i]["YETERLILIK_ADI"]+'</option>';
                        }
                    }
                    seviyeIcerik=seviyeIcerik+'</select>';
                    jQuery("#standart").html(seviyeIcerik);
                    
                    
                }else{
                    if (stip=="meslek"){
                        var ttip="Meslek Standartı";
                    } else {
                        var ttip="Yeterlilik";                      
                    }
                    alert("Seçtiğiniz seviyeye ait henüz hiç "+ttip+" yok.")
                
                }
        	},"json"
        );
    } else {
        jQuery("#standart").html("Seviye seçmediniz");
        jQuery("#sorgulaButton").html("");
    }
}
function buttonGoster(a){
    if(a){
        jQuery("#sorgulaButton").html('<input type="button" id="idsubmit" style="margin:2px;" onclick="sorgula(jQuery(\'#meslekStandardiYeterlilik_Select\').val(),jQuery(\'input[name=meslekStandardiYeterlilikRadioButton]:checked\').val(),jQuery(\'input[name=meslekStandardiYeterlilikCheckboxButton]:checked\').val())" value="Sorgula"/>');
    } else {
        jQuery("#sorgulaButton").html('Bir Standart Seçmediniz');
    }
}
function sorgula(standart,stip,taslak){
    jQuery("#listeTablosu").html("<center><br><br><br><br><br><br><br><br>Lütfen Bekleyiniz.<center>");
    jQuery("#aktarButon").html("");
    var url = 'index.php?option=com_ajax&task=getTerim&format=raw';        
    var listeTablosu="";
	jQuery.post(
        url,{standartYeterlilikID:standart,tip:stip,taslak:taslak}, function(data) {
            if(data['success']){
                var gelenIcerik = data['array'];
                var adet = gelenIcerik.length;
                
                listeTablosu=''
                +'<form id="terimForm"><table>'
                +'<tr><td style="font-weight:bold; text-align:center;">Seç</td><td style="font-weight:bold; text-align:center;">Terim</td><td style="font-weight:bold; text-align:center;">Açıklama</td></tr>';
                for(var i=0;i<adet;i++){
                    listeTablosu=listeTablosu + '<tr><td><input type="checkbox" name="terimId" value="'+gelenIcerik[i]["TERIM_ID"]+'"></td><td>'+gelenIcerik[i]["TERIM_ADI"]+'</td><td>'+gelenIcerik[i]["TERIM_ACIKLAMA"]+'</td></tr>';
                }
                listeTablosu=listeTablosu+'</table></form>';
                jQuery("#listeTablosu").html(listeTablosu);
                jQuery("#aktarButon").html('<center><input type="button" onclick="hepsiniSec(\'1\');" value="Hepsini Seç" style="margin:2px;"/><input type="button" onclick="hepsiniSec(\'0\')" value="Hiçbirini Seçme" style="margin:2px;"/><br><input type="button" onclick="kontrol();" value="Seçilen Terimleri Aktar" style="margin:2px;"/></center>');
                
                
                
            }else{
                if (tip=="meslek"){
                    var ttip="Meslek Standartına";
                } else {
                    var ttip="Yeterliliğe";                      
                }
                jQuery("#listeTablosuAra").html("<center><br><br><br><br><br><br><br><br>Seçtiğiniz "+ttip+" ait henüz hiç terim yok.<center>");
            
            }
    	},"json"
    );
}
function kontrol(){
    veriaktar((jQuery("input[name=terimId]:checked").map(function () {return this.value;}).get().join(",")));

}
</script>
