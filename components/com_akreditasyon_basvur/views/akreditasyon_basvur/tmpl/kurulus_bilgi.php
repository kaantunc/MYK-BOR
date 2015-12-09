
<form
	onsubmit="return validate('ChronoContact_akreditasyon_basvuru_t4')"
	action=""
	enctype="multipart/form-data" method="post"
	id="ChronoContact_akreditasyon_basvuru_t4"
	name="ChronoContact_akreditasyon_basvuru_t4">

<input type="hidden" name="evrak_id" value="<?php echo $this->evrak_id?>" />
<input type='hidden' id="updated" value='0' name='updated'/>

<?php 
echo $this->pageTree;
?>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h1 class="contentheading">A. Kuruluşa Ait Bilgiler</h1>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h3 class="contentheading">1.İletişim Bilgileri</h3>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Adı</label>
    <input class="cf_inputbox required" maxlength="150" size="30"  id="text_1" name="ad" type="text" value="<?php echo $this->kurulus["KURULUS_ADI"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Yetkilisi</label>
    <input class="cf_inputbox" maxlength="150" size="30"  id="text_4" name="yetkili" type="text" value="<?php echo $this->kurulus["KURULUS_YETKILISI"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Yetkili Unvanı</label>
    <input class="cf_inputbox" maxlength="150" size="30"  id="text_5" name="unvan" type="text" value="<?php echo $this->kurulus["KURULUS_YETKILI_UNVANI"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h1 class="contentheading"></h1>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textarea">
    <label class="cf_label" style="width: 150px;">Adresi</label>
    <textarea class="cf_inputbox" rows="3" id="text_3" title="" cols="30" name="adres" disabled = "disabled"><?php echo $this->kurulus["KURULUS_ADRESI"];?></textarea>
    
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Posta Kodu</label>
    <input class="cf_inputbox numeric" maxlength="150" size="30"  id="text_7" name="posta_kodu" type="text" value="<?php echo $this->kurulus["KURULUS_POSTA_KODU"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_placeholder"><?php 
	$data = $this->pm_il;
?>
<label class="cf_label" style="width:150px;">Şehir</label>
<select id="sehir" class="cf_inputbox" name="sehir" title="" size="1" disabled="disabled">
<option value="Seçiniz">Seçiniz</option>
<?php
if(isset($data)){
	foreach ($data as $row){
		if ($row["IL_ID"] != 0 ){
			if ($this->kurulus["KURULUS_SEHIR"] == $row["IL_ID"])
				$selected = 'selected="selected"';
			else 
				$selected = '';
		
			echo "<option ".$selected." value='".$row['IL_ID']."'>".$row['IL_ADI']."</option>";
		}
	}
}
?>
</select></div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h1 class="contentheading"></h1>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Telefon</label>
    <input class="cf_inputbox numeric" maxlength="150" size="30"  id="text_9" name="telefon" type="text" value="<?php echo $this->kurulus["KURULUS_TELEFON"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Faks</label>
    <input class="cf_inputbox numeric" maxlength="150" size="30"  id="text_10" name="faks" type="text" value="<?php echo $this->kurulus["KURULUS_FAKS"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">E-Posta</label>
    <input class="cf_inputbox e-mail" maxlength="150" size="30"  id="text_11" name="eposta" type="text" value="<?php echo $this->kurulus["KURULUS_EPOSTA"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_textbox">
    <label class="cf_label" style="width: 150px;">Web</label>
    <input class="cf_inputbox url" maxlength="150" size="30"  id="text_12" name="web" type="text" value="<?php echo $this->kurulus["KURULUS_WEB"];?>" disabled = "disabled"/>
  
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h1 class="contentheading"></h1>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_placeholder"><?php 
	$data = $this->pm_il;
?>

<label class="cf_label" style='width:150px;'>Varsa faaliyette bulunduğu diğer iller</label>
<select id="list" name="iller[]" size="10" title="" style='width:150px;' multiple="multiple" disabled="disabled">
	<?php
	if(isset($data)){
		foreach ($data as $row){
			if ($row["IL_ID"] != 0){
					$selected = '';
					for ($i = 0; $i < count($this->iller); $i++){
						if ($this->iller[$i] == $row["IL_ID"]){
							$selected = 'selected="selected"';
							break;
						}
					}

				echo "<option ".$selected." value='".$row['IL_ID']."'>".$row['IL_ADI']."</option>";
			}
		}
	}
	?>
</select></div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_heading">
  	<h3 class="contentheading">2.Kuruluşun Statüsü</h3>
  </div>
  <div class="cfclear">&nbsp;</div>
</div>

<div class="form_item">
  <div class="form_element cf_placeholder"><?php 
$data = $this->pm_kurulus_statu;
?>
<label class="cf_label" style="width:150px;">Statüsü</label>
<select id="statu" class="cf_inputbox" name="statu" title="" size="1" disabled="disabled">
<option value="Seçiniz">Seçiniz</option>
<?php
if(isset($data)){
foreach ($data as $row){
  if ($this->kurulus["KURULUS_STATU_ID"] == $row["KURULUS_STATU_ID"])
     $selected = 'selected="selected"';
  else 
     $selected = '';

  echo "<option ".$selected." value='".$row['KURULUS_STATU_ID']."'> ".$row['KURULUS_STATU_ADI']."</option>";
}
}
?>
</select></div>
  <div class="cfclear">&nbsp;</div>
</div>

</form>
