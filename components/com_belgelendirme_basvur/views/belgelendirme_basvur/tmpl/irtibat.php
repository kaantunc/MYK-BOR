<?php 
$basvuru = $this->basvuru;
$durum = $this->durum;
$irtibat = $this->irtibat;
?>

<form
	onsubmit="return validate('ChronoContact_belgelendirme_basvuru_t3')"
	action="index.php?option=com_belgelendirme_basvur&amp;layout=irtibat&amp;task=belgelendirmeKaydet"
	enctype="multipart/form-data" method="post"
	id="ChronoContact_belgelendirme_basvuru_t3"
	name="ChronoContact_belgelendirme_basvuru_t3">

<input type="hidden" name="evrak_id" value="<?php echo $this->evrak_id?>" />

<?php 
echo '<h2><u>'.$this->kurulus['KURULUS_ADI'].' Sınav ve Belgelendirme Başvuru Formu</u></h2>';
echo $this->pageTree;
?>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h3 class="contentheading">3.Sınav ve Belgelendirme ile İlgili Süreçlerde Görev Alacak Birime İlişkin Bilgiler</h3>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Ad</label>
    <input class="cf_inputbox required" maxlength="150" size="30" 
    	id="text_1" name="birim_ad" type="text" value="<?php echo (isset($basvuru["GOREV_BIRIM_ADI"]))? $basvuru["GOREV_BIRIM_ADI"]:"";?>"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textarea">
    <label class="cf_label" style="width: 150px;">Adres</label>
    <textarea class="cf_inputbox required" rows="3" 
    	id="text_3" title="" cols="30" name="birim_adres"><?php echo (isset($basvuru["GOREV_BIRIM_ADRESI"]))? $basvuru["GOREV_BIRIM_ADRESI"]:"";?></textarea>
    
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Telefon</label>
    <input class="cf_inputbox required" maxlength="150" size="30"  
    	id="text_4" name="birim_telefon" type="text" value="<?php echo (isset($basvuru["GOREV_BIRIM_TELEFON"]))? $basvuru["GOREV_BIRIM_TELEFON"]:"";?>" />
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Faks</label>
    <input class="cf_inputbox required" maxlength="150" size="30"  
    	id="text_5" name="birim_faks" type="text" value="<?php echo (isset($basvuru["GOREV_BIRIM_FAKS"]))? $basvuru["GOREV_BIRIM_FAKS"]:"";?>" />
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">İnternet Adresi</label>
    <input class="cf_inputbox required url" maxlength="150" size="30"  
    	id="text_6" name="birim_web" type="text" value="<?php echo (isset($basvuru["GOREV_BIRIM_WEB"]))? $basvuru["GOREV_BIRIM_WEB"]:"";?>" />
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">E-posta</label>
    <input class="cf_inputbox required email" maxlength="150" size="30"  
    	id="text_7" name="birim_eposta" type="text" value="<?php echo (isset($basvuru["GOREV_BIRIM_EPOSTA"]))? $basvuru["GOREV_BIRIM_EPOSTA"]:"";?>" />
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h3 class="contentheading">4. İrtibat kurulacak kişi(ler) ve iletişim bilgileri</h3>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_placeholder"><div id="irtibat_panel_div" class="panel_main_div"></div></div>
  <div class="cfclear">&nbsp;</div>
</div>

<?php if($durum == 0 || $durum == 2 || $durum == 6 || $durum == 10 || $durum == 14){ ?>
<div class="form_item" style="padding-top: 25px;">
	<div class="form_element cf_button">
		<input value="Kaydet" name="kaydet" type="submit" />
	</div>
	<div class="cfclear">&nbsp;</div>
</div>
<?php }
else if($this->canEdit){
?>
<div class="form_item" style="padding-top: 25px;">
	<div class="form_element cf_button">
		<input value="Kaydet" name="kaydet" type="submit" />
	</div>
	<div class="cfclear">&nbsp;</div>
</div>
<?php   
}?>
</form>

<script type="text/javascript">
dPanels.irtibat_panel =  new Array("İrtibat Kurulacak Kişinin;", new Array("Adı Soyadı", "text", "required"), new Array("E-Posta", "text", "required email", "e-mail"), new Array("Telefon", "text", "irtibatTelFax required"), new Array("Faks", "text", "irtibatTelFax required"));

function createPanels(){
	var name	   = "irtibat_panel";
	var buttonName = "İrtibat";
	createAddIrtibatValues (name, buttonName);
}

function createAddIrtibatValues (name, buttonName){
	var arry = new Array ();
	<?php
	$data = $irtibat;	
	$panelCount = count($data);
	
	echo 'var panelCount ='. $panelCount.';'; 
	
	$c = 0;
	for ($i=0; $i< $panelCount; $i++) {
		$arrIrtibat = $data[$i];
		echo 'arry['.$c++.']= "'. $arrIrtibat["IRTIBAT_ID"] .'";';
		echo 'arry['.$c++.']= "'. FormFactory2::normalizeVariable ($arrIrtibat["IRTIBAT_KISI_ADI"]) .'";';
		echo 'arry['.$c++.']= "'. FormFactory2::normalizeVariable ($arrIrtibat["IRTIBAT_EPOSTA"]) .'";';
		echo 'arry['.$c++.']= "'. FormFactory2::normalizeVariable ($arrIrtibat["IRTIBAT_TELEFON"]) .'";';
		echo 'arry['.$c++.']= "'. FormFactory2::normalizeVariable ($arrIrtibat["IRTIBAT_FAKS"]) .'";';
		
	}
	?>

	var rowCount = 4;
	createNPanels(panelCount, name, buttonName);

	if (isset (arry))
		addPanelValues (arry, name, panelCount, rowCount);
}
jQuery("#ChronoContact_belgelendirme_basvuru_t3").validate();
jQuery("#text_4").mask("(999) 999-9999");
jQuery("#text_5").mask("(999) 999-9999");
jQuery("#text_6").live("keypress",function(){
	var url = jQuery(this).val();
	if(jQuery(this).val()=="http:/"){
		jQuery(this).val("http://");
		return;
	}
	var urlSplits = url.split("http://");
	if(urlSplits[1])
		jQuery(this).val("http://"+urlSplits[1]);
	else
		jQuery(this).val("http://"+urlSplits[0]);
	});
jQuery(document).ready(function (){	
	jQuery(".irtibatTelFax").live("focus",function (){
			jQuery(this).mask("(999) 999-9999");
		})
});
</script>
