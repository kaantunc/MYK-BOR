<html>
<head></head>
<body>


<?php
defined('_JEXEC') or die('Restricted access');

function getLastLine($db, $kredi_id, $property_id){
	
	$getLastLine = "SELECT `lineNo` FROM `#__property_values`
		WHERE `kredi_id` = $kredi_id AND
			`property_id` = $property_id
			ORDER BY lineNo DESC";
		
		$db->setQuery($getLastLine);
		$lastLine = $db->loadObjectList();
	
	return $lastLine[0]->lineNo;
	
}

function checkDuplicate($db, $kredi_id, $property_id, $lineNo, $edit_kredi_id){
	
	if(!$edit_kredi_id)
		return null;
	
		$checkDuplicate = "SELECT `id` FROM `#__property_values`
		WHERE `kredi_id` = $kredi_id AND
			`property_id` = $property_id
			AND `lineNo` = $lineNo;";
		
		$db->setQuery($checkDuplicate);
		$duplicates = $db->loadObjectList();
	
	return $duplicates;
}

function updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property){
			

		$db2 =& JFactory::getDBO();
		$query2 = 'SELECT * FROM #__property_types where section="'.$section.'" order by id asc; ';
		$db2->setQuery($query2);
		$propTypes = $db2->loadObjectList();
 		$propertyStartId=$propTypes[0]->id ;


 for($col=0; $col<$columnNo; $col++ )//her bir kolon için
 {
	$array=$_POST['input'.$inpName.'-'.($col+1)];
	for($i=0; $i<count($array); $i++)//herbir kolonun herbir elemanı için
	{
		$duplicates = checkDuplicate($db2, $row->id, $propertyStartId + $col, $i+1, $edit_kredi_id);
		
		if(!$duplicates){// add new row
		$property->id = 0; // to insert a new row
		$property->kredi_id = $row->id;
		$property->lineNo=($i+1);
		$property->property_value=$array[$i];
		$property->property_id = ($propertyStartId + $col);
		if($property->property_value != null)
		$property->store();
		}
		else{// change only value
			$property =& JTable::getInstance('property_values', 'Table');
			$property->id = $duplicates[0]->id;
			$property->property_value=$array[$i];
			$property->store();
		}
	}
	
 }
 
if(isset($_POST['input'.$inpName.'-'.($col+1)]))
checkDels($db2, $_POST['input'.$inpName.'-'.($col+1)], $row->id,
		$propertyStartId, $columnNo, $edit_kredi_id);
}

function updateRadioSection($section,$columnNo,$inpName,$row,$edit_kredi_id,
		$property, $property_id){

	$db2 =& JFactory::getDBO();
		$query2 = 'SELECT * FROM #__property_types where section="'.$section.'" order by id asc; ';
		$db2->setQuery($query2);
		$propTypes = $db2->loadObjectList();
 		$propertyStartId=$propTypes[0]->id ;

$textArray = array("Görünüs", "Performans","Fiyat","Hiz","Dayaniklilik",
		"Hatasizlik","Erisim Maliyeti","Erisim Kolayligi","Bakim Maliyeti",
		"Bakim Kolayligi","Kalitesi","Termin","CE Uyumlulugu");

for($i=0; $i<count($textArray); $i++)
{
		$duplicates = checkDuplicate($db2, $row->id, $property_id, $i+1, $edit_kredi_id);
		
		if(!$duplicates){// add new row
		$property->id = 0; // to insert a new row
		$property->kredi_id = $row->id;
		$property->lineNo=($i+1);
		$property->property_value=$textArray[$i];
		$property->property_id = $property_id;
		$property->store();
		}
		else{// change only value
			$property =& JTable::getInstance('property_values', 'Table');
			$property->id = $duplicates[0]->id;
			$property->property_value=$textArray[$i];
			$property->store();
		}
}
if(isset($_POST['input'.$inpName]))
$manualFieldCount = count($_POST['input'.$inpName]);
else
$manualFieldCount = 0;
/*if(isset($_POST['input'.$inpName])){
	$inputArray=$_POST['input'.$inpName];
	for($i=0; $i<count($inputArray); $i++)
	{
		$duplicates = checkDuplicate($db2, $row->id, $property_id, $i+1, $edit_kredi_id);
		
		if(!$duplicates){// add new row
			$property->id = 0; // to insert a new row
			$property->kredi_id = $row->id;
			$property->lineNo=($i+1+count($textArray));
			$property->property_value=$inputArray[$i];
			$property->property_id = $property_id;
			$property->store();
		}
		else{// change only value
			$property =& JTable::getInstance('property_values', 'Table');
			$property->id = $duplicates[0]->id;
			$property->property_value=$array[$i];
			$property->store();
		}
	}
}*/


//BURADA 2. ve 3. kolonu tamamen alıyor
for($col=1; $col<$columnNo; $col++ )
 {
	//$array=$_POST['input'.$inpName.'-'.($col)];
	for($i=0; $i<count($textArray)+$manualFieldCount; $i++)//herbir kolonun herbir elemanı için
	{		
		$duplicates = checkDuplicate($db2, $row->id, $propertyStartId + $col, $i+1, $edit_kredi_id);
		
		if(!$duplicates){// add new row
		$property->id = 0; // to insert a new row
		$property->kredi_id = $row->id;
		$property->lineNo=($i+1);
		//$property->property_value=$array[$i];
		$property->property_value=$_POST['input'.$inpName.'-'.($col).'-'.($i+1)];
		$property->property_id = ($propertyStartId + $col);
		if($property->property_value != null){
			if(isset($_POST['input'.$inpName]) && $i >= count($textArray)){
				if($_POST['input'.$inpName][$i - count($textArray)] != null)
					$property->store();
			}
			else
			$property->store();
		}
		}
		else{// change only value
			$property =& JTable::getInstance('property_values', 'Table');
			$property->id = $duplicates[0]->id;
			$property->property_value=$_POST['input'.$inpName.'-'.($col).'-'.($i+1)];
			$property->store();
		}
	}
	

	
 }
 
 $lastLineNo = getLastLine($db2, $row->id, $propertyStartId);
 
	for($i=0; $i<$manualFieldCount;$i++){
		
		$duplicates = checkDuplicate($db2, $row->id, $propertyStartId,count($textArray) + $i+1, $edit_kredi_id);
		
		if(!$duplicates){// add new row
			if($_POST['input'.$inpName][$i]==null)
				continue;
		$property->id = 0; // to insert a new row
		$property->kredi_id = $row->id;
		$property->lineNo=++$lastLineNo;
		//$property->property_value=$array[$i];
		$property->property_value=$_POST['input'.$inpName][$i];
		$property->property_id = $propertyStartId;
		$property->store();
		}
		else{// change only value
			$property =& JTable::getInstance('property_values', 'Table');
			$property->id = $duplicates[0]->id;
			$property->property_value=$_POST['input'.$inpName][$i];
			$property->store();
		}
	}
}

function checkDels($db, $delArray, $kredi_id, $propertyStartId, $columnNo, $edit_kredi_id){
		
	if(!$edit_kredi_id)
		return;
		
	foreach($delArray AS $item){
			
		$sqlDel = "DELETE FROM `#__property_values` WHERE
			`#__property_values`.`lineNo` = $item AND
			`kredi_id` = $kredi_id AND
			`property_id` BETWEEN ".($propertyStartId)." AND
				".($propertyStartId + $columnNo -1).";";
						
		$db->setQuery($sqlDel);
		$db->query();
		
		// update line numbers
		
		$sqlUpdateLineNo = "UPDATE `#__property_values`
			SET `lineNo` = `lineNo` - 1
			WHERE `lineNo` > $item";
						
		$db->setQuery($sqlUpdateLineNo);
		$db->query();
		
	}
}

require_once('components'.DS.'com_requestKredi'.DS.'table.php');//jos_kredi_kayitlari icin
require_once('components'.DS.'com_requestKredi'.DS.'table2.php');//jos_property_types icin
require_once('components'.DS.'com_requestKredi'.DS.'table3.php');//jos_property_values icin

$db =& JFactory::getDBO();
$query = "SELECT * FROM #__kredi_kayitlari";
$db->setQuery($query);
$rows = $db->loadObjectList();

$row =& JTable::getInstance('kredi_kayitlari', 'Table');


/*********************************************
 * KREDİ KAYITLARININ SABİT KISIMLARI İCİN    *
 *********************************************/

$edit_kredi_id = JRequest::getVar('edit_kredi_id');


if($edit_kredi_id){	

	$row->id=$edit_kredi_id;

}
else
	$row->id = 0;

$row->sirketUnvani = $_POST['text_4'];
$row->sirketAdresi = $_POST['text_6'];
$row->kurulus = $_POST['text_7'];
$row->vergiDaireNo = $_POST['text_8'];
$row->ticariSicilNo = $_POST['text_9'];
$row->sirketYetkilileri = $_POST['text_10'];
$row->cepTelefonu = $_POST['text_11'];
$row->telefon = $_POST['text_12'];
$row->faks = $_POST['text_13'];
$row->e_posta = $_POST['text_14'];
$row->webAdresi = $_POST['text_15'];
$row->marka = $_POST['text_16'];
$row->sinaiMulkiyet = $_POST['radio0'];
$row->hammaddeyeUzaklik = $_POST['select_25'];
$row->ulasim = $_POST['select_26'];
$row->enerji = $_POST['select_27'];
$row->su = $_POST['select_28'];
$row->arsaninOzellikleri = $_POST['select_29'];
$row->isGucu = $_POST['select_30'];
$row->yedekParca = $_POST['select_31'];
$row->atiklar = $_POST['select_32'];
$row->pazaraUzaklik = $_POST['select_33'];
$row->insanSagligi = $_POST['select_34'];
$row->ilaveTesvik = $_POST['select_35'];
$row->yerel = $_POST['text_56'];
$row->bolgesel = $_POST['text_57'];
$row->yurtGeneli = $_POST['text_58'];
$row->yurtdisi = $_POST['text_63'];
$row->toptanSatisOrani = $_POST['text_65'];
$row->perakendeSatisOrani = $_POST['text_66'];
$row->aylikYurticiCiro = $_POST['text_67'];
$row->aylikYurtdisiCiro = $_POST['text_68'];
$row->yillikYurticiCiro = $_POST['text_69'];
$row->yillikYurtdisiCiro = $_POST['text_70'];
$row->yurticiPerakendeMagaza = $_POST['text_74'];
$row->yurtdisiPerakendeMagaza = $_POST['text_72'];
$row->yurticiToptanDistributor = $_POST['text_73'];
$row->yurticiToptanBayi = $_POST['text_80'];
$row->yurticiSatisPersoneli = $_POST['text_82'];
$row->yurticiFranchising = $_POST['text_71'];
$row->yurticiDigerMusteri = $_POST['text_81'];//
$row->iKCalisanSayisi = $_POST['text_75'];
$row->iKUstYoneticiSayisi = $_POST['text_76'];
$row->iKAraKademeYonetici = $_POST['text_77'];
$row->iKIsciSayisi = $_POST['text_78'];
$row->iKDenetciSayisi = $_POST['text_79'];
$row->field_26_1 = $_POST['text_83'];
$row->field_26_2 = $_POST['text_84'];
$row->field_26_3 = $_POST['text_85'];
$row->field_28_1 = $_POST['text_88'];
$row->field_28_2 = $_POST['text_89'];
$row->field_28_3 = $_POST['text_90'];
$row->field_28_4 = $_POST['text_91'];
$row->field_29a_1_1 = $_POST['inputG29-2-0'];
$row->field_29a_1_2 = $_POST['inputG29-3-0'];
$row->field_29a_2_1 = $_POST['inputG29-2-1'];
$row->field_29a_2_2 = $_POST['inputG29-3-1'];
$row->field_29a_3_1 = $_POST['inputG29-2-2'];
$row->field_29a_3_2 = $_POST['inputG29-3-2'];
$row->field_29a_4_1 = $_POST['inputG29-2-3'];
$row->field_29a_4_2 = $_POST['inputG29-3-3'];
$row->field_29a_5_1 = $_POST['inputG29-2-4'];
$row->field_29a_5_2 = $_POST['inputG29-3-4'];
$row->field_29a_6_1 = $_POST['inputG29-2-5'];
$row->field_29a_6_2 = $_POST['inputG29-3-5'];
$row->field_29a_7_1 = $_POST['inputG29-2-6'];
$row->field_29a_7_2 = $_POST['inputG29-3-6'];
$row->field_29a_8_1 = $_POST['inputG29-2-7'];
$row->field_29a_8_2 = $_POST['inputG29-3-7'];
$row->field_29a_9_1 = $_POST['inputG29-2-8'];
$row->field_29a_9_2 = $_POST['inputG29-3-8'];
$row->field_29a_10_1 = $_POST['inputG29-2-9'];
$row->field_29a_10_2 = $_POST['inputG29-3-9'];
$row->field_29a_11_1 = $_POST['inputG29-2-10'];
$row->field_29a_11_2 = $_POST['inputG29-3-10'];
$row->field_29a_12_1 = $_POST['inputG29-2-11'];
$row->field_29a_12_2 = $_POST['inputG29-3-11'];
$row->field_29a_13_1 = $_POST['inputG29-2-12'];
$row->field_29a_13_2 = $_POST['inputG29-3-12'];
$row->field_29a_14_1 = $_POST['inputG29-2-13'];
$row->field_29a_14_2 = $_POST['inputG29-3-13'];
$row->field_29a_15_1 = $_POST['inputG29-2-14'];
$row->field_29a_15_2 = $_POST['inputG29-3-14'];
$row->field_29b_1_1 = $_POST['inputG29-2-16'];
$row->field_29b_1_2 = $_POST['inputG29-3-16'];
$row->field_29b_2_1 = $_POST['inputG29-2-17'];
$row->field_29b_2_2 = $_POST['inputG29-3-17'];
$row->field_29b_3_1 = $_POST['inputG29-2-18'];
$row->field_29b_3_2 = $_POST['inputG29-3-18'];
$row->field_29b_4_1 = $_POST['inputG29-2-19'];
$row->field_29b_4_2 = $_POST['inputG29-3-19'];
$row->field_29b_5_1 = $_POST['inputG29-2-20'];
$row->field_29b_5_2 = $_POST['inputG29-3-20'];
$row->field_29b_6_1 = $_POST['inputG29-2-21'];
$row->field_29b_6_2 = $_POST['inputG29-3-21'];
$row->field_29b_7_1 = $_POST['inputG29-2-22'];
$row->field_29b_7_2 = $_POST['inputG29-3-22'];
$row->field_29b_8_1 = $_POST['inputG29-2-23'];
$row->field_29b_8_2 = $_POST['inputG29-3-23'];
$row->field_29b_9_1 = $_POST['inputG29-2-24'];
$row->field_29b_9_2 = $_POST['inputG29-3-24'];
$row->field_29b_10_1 = $_POST['inputG29-2-25'];
$row->field_29b_10_2 = $_POST['inputG29-3-25'];
$row->field_29b_11_1 = $_POST['inputG29-2-26'];
$row->field_29b_11_2 = $_POST['inputG29-3-26'];
$row->field_29b_12_1 = $_POST['inputG29-2-27'];
$row->field_29b_12_2 = $_POST['inputG29-3-27'];
$row->field_29b_13_1 = $_POST['inputG29-2-28'];
$row->field_29b_13_2 = $_POST['inputG29-3-28'];
$row->field_29b_14_1 = $_POST['inputG29-2-29'];
$row->field_29b_14_2 = $_POST['inputG29-3-29'];
$row->field_29b_15_1 = $_POST['inputG29-2-30'];
$row->field_29b_15_2 = $_POST['inputG29-3-30'];
$row->field_29b_16_1 = $_POST['inputG29-2-31'];
$row->field_29b_16_2 = $_POST['inputG29-3-31'];
$row->field_29b_17_1 = $_POST['inputG29-2-32'];
$row->field_29b_17_2 = $_POST['inputG29-3-32'];
$row->field_29b_18_1 = $_POST['inputG29-2-33'];
$row->field_29b_18_2 = $_POST['inputG29-3-33'];
$row->field_30_1 = $_POST['inputG30-2-0'];
$row->field_30_2 = $_POST['inputG30-3-0'];
$row->field_30_3 = $_POST['inputG30-2-1'];
$row->field_30_4 = $_POST['inputG30-3-1'];
$row->field_30_5 = $_POST['inputG30-2-2'];
$row->field_30_6 = $_POST['inputG30-3-2'];
$row->field_30_7 = $_POST['inputG30-2-3'];
$row->field_30_8 = $_POST['inputG30-3-3'];
$row->field_30_9 = $_POST['inputG30-2-4'];
$row->field_30_10 = $_POST['inputG30-3-4'];
$row->field_30_11 = $_POST['inputG30-2-5'];
$row->field_30_12 = $_POST['inputG30-3-5'];
$row->field_30_13 = $_POST['inputG30-2-6'];
$row->field_30_14 = $_POST['inputG30-3-6'];
$row->field_30_15 = $_POST['inputG30-2-7'];
$row->field_30_16 = $_POST['inputG30-3-7'];
$row->field_30_17 = $_POST['inputG30-2-8'];
$row->field_30_18 = $_POST['inputG30-3-8'];
$row->field_30_19 = $_POST['inputG30-2-9'];
$row->field_30_20 = $_POST['inputG30-3-9'];
$row->field_30_21 = $_POST['inputG30-2-10'];
$row->field_30_22 = $_POST['inputG30-3-10'];
$row->field_30_23 = $_POST['inputG30-2-11'];
$row->field_30_24 = $_POST['inputG30-3-11'];
$row->field_30_25 = $_POST['inputG30-2-12'];
$row->field_30_26 = $_POST['inputG30-3-12'];
$row->field_30_27 = $_POST['inputG30-2-13'];
$row->field_30_28 = $_POST['inputG30-3-13'];
$row->field_30_29 = $_POST['inputG30-2-14'];
$row->field_30_30 = $_POST['inputG30-3-14'];
$row->field_30_31 = $_POST['inputG30-2-15'];
$row->field_30_32 = $_POST['inputG30-3-15'];
$row->field_30_33 = $_POST['inputG30-2-16'];
$row->field_30_34 = $_POST['inputG30-3-16'];
$row->field_30_35 = $_POST['inputG30-2-17'];
$row->field_30_36 = $_POST['inputG30-3-17'];
$row->field_30_37 = $_POST['inputG30-2-18'];
$row->field_30_38 = $_POST['inputG30-3-18'];
$row->field_30_39 = $_POST['inputG30-2-19'];
$row->field_30_40 = $_POST['inputG30-3-19'];
$row->field_30_41 = $_POST['inputG30-2-20'];
$row->field_30_42 = $_POST['inputG30-3-20'];
$row->field_30_43 = $_POST['inputG30-2-21'];
$row->field_30_44 = $_POST['inputG30-3-21'];
$row->field_30_45 = $_POST['inputG30-2-22'];
$row->field_30_46 = $_POST['inputG30-3-22'];
$row->field_30_47 = $_POST['inputG30-2-23'];
$row->field_30_48 = $_POST['inputG30-3-23'];
$row->field_30_49 = $_POST['inputG30-2-24'];
$row->field_30_50 = $_POST['inputG30-3-24'];
$row->field_30_51 = $_POST['inputG30-2-25'];
$row->field_30_52 = $_POST['inputG30-3-25'];
$row->field_30_53 = $_POST['inputG30-2-26'];
$row->field_30_54 = $_POST['inputG30-3-26'];
$row->field_30_55 = $_POST['inputG30-2-27'];
$row->field_30_56 = $_POST['inputG30-3-27'];
$row->field_30_57 = $_POST['inputG30-2-28'];
$row->field_30_58 = $_POST['inputG30-3-28'];
$row->field_30_59 = $_POST['inputG30-2-29'];
$row->field_30_60 = $_POST['inputG30-3-29'];
$row->field_30_61 = $_POST['inputG30-2-30'];
$row->field_30_62 = $_POST['inputG30-3-30'];
$row->field_30_63 = $_POST['inputG30-2-31'];
$row->field_30_64 = $_POST['inputG30-3-31'];
$row->field_30_65 = $_POST['inputG30-2-32'];
$row->field_30_66 = $_POST['inputG30-3-32'];
$row->field_30_67 = $_POST['inputG30-2-33'];
$row->field_30_68 = $_POST['inputG30-3-33'];
$row->field_30_69 = $_POST['inputG30-2-34'];
$row->field_30_70 = $_POST['inputG30-3-34'];
$row->field_30_71 = $_POST['inputG30-2-35'];
$row->field_30_72 = $_POST['inputG30-3-35'];
$row->field_30_73 = $_POST['inputG30-2-36'];
$row->field_30_74 = $_POST['inputG30-3-36'];
$row->field_30_75 = $_POST['inputG30-2-37'];
$row->field_30_76 = $_POST['inputG30-3-37'];
$row->field_30_77 = $_POST['inputG30-2-38'];
$row->field_30_78 = $_POST['inputG30-3-38'];
$row->field_30_79 = $_POST['inputG30-2-39'];
$row->field_30_80 = $_POST['inputG30-3-39'];
$row->field_30_81 = $_POST['inputG30-2-40'];
$row->field_30_82 = $_POST['inputG30-3-40'];
$row->field_30_83 = $_POST['inputG30-2-41'];
$row->field_30_84 = $_POST['inputG30-3-41'];
$row->field_30_85 = $_POST['inputG30-2-42'];
$row->field_30_86 = $_POST['inputG30-3-42'];
$row->field_30_87 = $_POST['inputG30-2-43'];
$row->field_30_88 = $_POST['inputG30-3-43'];
$row->field_30_89 = $_POST['inputG30-2-44'];
$row->field_30_90 = $_POST['inputG30-3-44'];
$row->field_30_91 = $_POST['inputG30-2-45'];
$row->field_30_92 = $_POST['inputG30-3-45'];
$row->field_30_93 = $_POST['inputG30-2-46'];
$row->field_30_94 = $_POST['inputG30-3-46'];
$row->field_30_95 = $_POST['inputG30-2-47'];
$row->field_30_96 = $_POST['inputG30-3-47'];
$row->field_30_97 = $_POST['inputG30-2-48'];
$row->field_30_98 = $_POST['inputG30-3-48'];
$row->field_30_99 = $_POST['inputG30-2-49'];
$row->field_30_100 = $_POST['inputG30-3-49'];
$row->field_30_101 = $_POST['inputG30-2-50'];
$row->field_30_102 = $_POST['inputG30-3-50'];
$row->field_30_103 = $_POST['inputG30-2-51'];
$row->field_30_104 = $_POST['inputG30-3-51'];
$row->field_34_1 = $_POST['inputG34-2-0'];
$row->field_34_2 = $_POST['inputG34-2-1'];
$row->field_34_3 = $_POST['inputG34-2-2'];
$row->field_34_4 = $_POST['inputG34-2-3'];
$row->field_34_5 = $_POST['inputG34-2-4'];
$row->field_34_6 = $_POST['inputG34-2-5'];
$row->field_34_7 = $_POST['inputG34-2-6'];
$row->field_34_8 = $_POST['inputG34-2-7'];
$row->field_34_9 = $_POST['inputG34-2-8'];
$row->field_34_10 = $_POST['inputG34-2-9'];
$row->field_34_11 = $_POST['inputG34-2-10'];
$row->field_34_12 = $_POST['inputG34-2-11'];
$row->field_34_13 = $_POST['inputG34-2-12'];
$row->field_34_14 = $_POST['inputG34-2-13'];
$row->field_34_15 = $_POST['inputG34-2-14'];
$row->field_34_16 = $_POST['inputG34-2-15'];
$row->field_34_17 = $_POST['inputG34-2-16'];
$row->field_34_18 = $_POST['inputG34-2-17'];
$row->field_34_19 = $_POST['inputG34-2-18'];
$row->field_34_20 = $_POST['inputG34-2-19'];
$row->field_35_1 = $_POST['inputG35-2-0'];
$row->field_35_2 = $_POST['inputG35-3-0'];
$row->field_35_3 = $_POST['inputG35-4-0'];
$row->field_35_4 = $_POST['inputG35-5-0'];
$row->field_35_5 = $_POST['inputG35-6-0'];
$row->field_35_6 = $_POST['inputG35-2-1'];
$row->field_35_7 = $_POST['inputG35-3-1'];
$row->field_35_8 = $_POST['inputG35-4-1'];
$row->field_35_9 = $_POST['inputG35-5-1'];
$row->field_35_10 = $_POST['inputG35-6-1'];
$row->field_35_11 = $_POST['inputG35-2-2'];
$row->field_35_12 = $_POST['inputG35-3-2'];
$row->field_35_13 = $_POST['inputG35-4-2'];
$row->field_35_14 = $_POST['inputG35-5-2'];
$row->field_35_15 = $_POST['inputG35-6-2'];
$row->field_35_16 = $_POST['inputG35-2-3'];
$row->field_35_17 = $_POST['inputG35-3-3'];
$row->field_35_18 = $_POST['inputG35-4-3'];
$row->field_35_19 = $_POST['inputG35-5-3'];
$row->field_35_20 = $_POST['inputG35-6-3'];
$row->field_35_21 = $_POST['inputG35-2-4'];
$row->field_35_22 = $_POST['inputG35-3-4'];
$row->field_35_23 = $_POST['inputG35-4-4'];
$row->field_35_24 = $_POST['inputG35-5-4'];
$row->field_35_25 = $_POST['inputG35-6-4'];
$row->field_35_26 = $_POST['inputG35-2-5'];
$row->field_35_27 = $_POST['inputG35-3-5'];
$row->field_35_28 = $_POST['inputG35-4-5'];
$row->field_35_29 = $_POST['inputG35-5-5'];
$row->field_35_30 = $_POST['inputG35-6-5'];
$row->field_35_31 = $_POST['inputG35-2-6'];
$row->field_35_32 = $_POST['inputG35-3-6'];
$row->field_35_33 = $_POST['inputG35-4-6'];
$row->field_35_34 = $_POST['inputG35-5-6'];
$row->field_35_35 = $_POST['inputG35-6-6'];

if(isset($_POST['inputG36'])){
	$row->field_36 = "";
	$item = "";
	foreach($_POST['inputG36'] AS $item){
		if($row->field_36 == "")
			$row->field_36 .= $item;
		else
			$row->field_36 .=  ",".$item;
	}
	
}

//$row->field_36 = isset($_POST['inputG36']) ? $_POST['inputG36'] : null;


$row->field_38_1 = $_POST['inputG38-2-0'];
$row->field_38_2 = $_POST['inputG38-2-1'];
$row->field_38_3 = $_POST['inputG38-2-2'];
$row->field_38_4 = $_POST['inputG38-2-3'];
$row->field_38_5 = $_POST['inputG38-2-4'];
$row->field_38_6 = $_POST['inputG38-2-5'];
$row->field_38_7 = $_POST['inputG38-2-6'];
$row->field_39_1 = $_POST['text_118'];
$row->field_39_2 = $_POST['text_119'];
$row->field_39_3 = $_POST['text_121'];
$row->field_39_4 = $_POST['text_122'];

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//

/*********************************************
 * KREDİ KAYDI SABİT KISIMLARI BITER          *
 *********************************************/

$rv = $row->store(false);

$db2 =& JFactory::getDBO();
$query2 = "SELECT * FROM #__kredi_kayitlari ORDER BY id desc";
$db2->setQuery($query2);
$krediler = $db2->loadObjectList();

$newId=$krediler[0]->id;


/**********************************************************
 *   DEĞİŞKEN DEĞERLERİ GEÇİRMEK İÇİN                      *
 ***********************************************************/



$db3 =& JFactory::getDBO();
$query3 = "SELECT * FROM #__property_values";
$db3->setQuery($query3);
$propValues = $db3->loadObjectList();

$property =& JTable::getInstance('property_values', 'Table');

////////////////////////////////////////////////////////////
	
//A2
$section=2;
$columnNo=3;
$inpName='A'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);

//A3
 
$section=3;
$columnNo=5;
$inpName='A'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);

 
//biter

 //A4
$section=4;
$columnNo=3;
$inpName='A'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);
 
//biter

//B6
 $section=6;
 $columnNo=2;
 $inpName='B'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);


//B7
 $section=7;
 $columnNo=2;
 $inpName='B'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);


//B10
 $section=10;
 $columnNo=3;
 $inpName='B'.$section;

 updateRadioSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property,
 		20);


//biter


//B11
 $section=11;
 $columnNo=3;
 $inpName='B'.$section;
 
 updateRadioSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property,
 		23);

//C12
 $section=12;
 $columnNo=4;
 $inpName='C'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);
	
//biter

//C13
 $section=13;
 $columnNo=4;
 $inpName='C'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);


//C14
 $section=14;
 $columnNo=7;
 $inpName='C'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);


//C15
 $section=15;
 $columnNo=4;
 $inpName='C'.$section;


updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);

 //C17
 $section=17;
 $columnNo=4;
 $inpName='C'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);

//C19
 $section=19;
 $columnNo=4;
 $inpName='C'.$section;


updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);

 //D22
 $section=22;
 $columnNo=4;
 $inpName='D'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);
 
//biter


//E25
 $section=25;
 $columnNo=7;
 $inpName='E'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);
 

//F27
 
// $section=27;
// $columnNo=6;
// $inpName='F'.$section;
//
//		
//
//		$db2 =& JFactory::getDBO();
//		$query2 = 'SELECT * FROM #__property_types where section="'.$section.'" order by id asc; ';
//		$db2->setQuery($query2);
//		$propTypes = $db2->loadObjectList();
// 		$propertyStartId=$propTypes[0]->id ;
//
//
//
//$titleArray = array("Ürün/ Hizmet Kalitesi","Ürün/ Hizmet Çesitliligi","Ambalaj","Pazar Payi","Itibar","Üretim maliyeti","Fiyat","Dagitim sistemi","Satis gücü","Tesisler","Isgücü","Teknoloji","Yönetim","Finansal güç","Girdi Kaynaklari","Büyüme egilimi","Üretim kapasiteleri","Patent/ Faydali","Model","Marka imaji");
//
// for($col=1; $col<$columnNo; $col++ )//her bir kolon için
// {
//	$array=$_POST['input'.$inpName.'-'.($col+1)];
//	for($i=0; $i<count($array); $i++)//herbir kolonun herbir elemanı için
//	{
//		if($col==0 && $i<count($titleArray))
//		$property->property_value=$textArray[$i];
//		else 
//		$property->property_value=$array[$i];
//		
//		$property->id = 0; // to insert a new row
//		$property->kredi_id = $row->id;
//		$property->lineNo=($i+1);
//		$property->property_id = ($propertyStartId + $col);
//		if($property->property_value != null)
//		$property->store($propValues);
//	}
//	
// }




//biter

//G31
 $section=31;
 $columnNo=4;
 $inpName='G'.$section;
 
 updateSection($section.'-1',$columnNo,$inpName.'-0',$row,$edit_kredi_id,$property);
 updateSection($section.'-2',$columnNo,$inpName.'-1',$row,$edit_kredi_id,$property);
 updateSection($section.'-3',$columnNo,$inpName.'-2',$row,$edit_kredi_id,$property);
 updateSection($section.'-4',$columnNo,$inpName.'-3',$row,$edit_kredi_id,$property);
//
//$chooseTable=array('0','1','2','3');
//
//for($j=0; $j<4; $j++)
//{
//
//		$db2 =& JFactory::getDBO();
//		$query2 = 'SELECT * FROM #__property_types where section="'.$section.'-'.($chooseTable[$j] + 1).'" order by id asc; ';
//		$db2->setQuery($query2);
//		$propTypes = $db2->loadObjectList();
// 		$propertyStartId=$propTypes[0]->id ;
//
//
// for($col=0; $col<$columnNo; $col++ )//her bir kolon için
// {
//	$array=$_POST['input'.$inpName.'-'.$chooseTable[$j].'-'.($col+1)];
//	for($i=0; $i<count($array); $i++)//herbir kolonun herbir elemanı için
//	{
//		$property->id = 0; // to insert a new row
//		$property->kredi_id = $row->id;
//		$property->lineNo=($i+1);
//		$property->property_value=$array[$i];
//		$property->property_id = ($propertyStartId + $col);
//		if($property->property_value != null)
//		$property->store($propValues);
//	}
//	
// }
// 
//} 
//biter
 
	
 
//G32

 $section=32;
 $columnNo=4;
 $inpName='G'.$section;
 
  updateSection($section.'-1',$columnNo,$inpName.'-0',$row,$edit_kredi_id,$property);
 updateSection($section.'-2',$columnNo,$inpName.'-1',$row,$edit_kredi_id,$property);
 updateSection($section.'-3',$columnNo,$inpName.'-2',$row,$edit_kredi_id,$property);
 updateSection($section.'-4',$columnNo,$inpName.'-3',$row,$edit_kredi_id,$property);
//
//$chooseTable=array('0','1','2','3');
//
//for($j=0; $j<4; $j++)
//{
//
//		$db2 =& JFactory::getDBO();
//		$query2 = 'SELECT * FROM #__property_types where section="'.$section.'-'.($chooseTable[$j] + 1).'" order by id asc; ';
//		$db2->setQuery($query2);
//		$propTypes = $db2->loadObjectList();
// 		$propertyStartId=$propTypes[0]->id ;
//
//
// for($col=0; $col<$columnNo; $col++ )//her bir kolon için
// {
//	$array=$_POST['input'.$inpName.'-'.$chooseTable[$j].'-'.($col+1)];
//	for($i=0; $i<count($array); $i++)//herbir kolonun herbir elemanı için
//	{
//		$property->id = 0; // to insert a new row
//		$property->kredi_id = $row->id;
//		$property->lineNo=($i+1);
//		$property->property_value=$array[$i];
//		$property->property_id = ($propertyStartId + $col);
//		if($property->property_value != null)
//		$property->store($propValues);
//	}
//	
// }
// 
//} 
//biter


//G33
 $section=33;
 $columnNo=3;
 $inpName='G'.$section;

updateSection($section,$columnNo,$inpName,$row,$edit_kredi_id,$property);

//		
//
//		$db2 =& JFactory::getDBO();
//		$query2 = 'SELECT * FROM #__property_types where section="'.$section.'" order by id asc; ';
//		$db2->setQuery($query2);
//		$propTypes = $db2->loadObjectList();
// 		$propertyStartId=$propTypes[0]->id ;
//
//
// for($col=0; $col<$columnNo; $col++ )//her bir kolon için
// {
//	$array=$_POST['input'.$inpName.'-'.($col+1)];
//	for($i=0; $i<count($array); $i++)//herbir kolonun herbir elemanı için
//	{
//		$property->id = 0; // to insert a new row
//		$property->kredi_id = $row->id;
//		$property->lineNo=($i+1);
//		$property->property_value=$array[$i];
//		$property->property_id = ($propertyStartId + $col);
//		if($property->property_value != null)
//		$property->store($propValues);
//	}
//	
// }
 
//biter

	

////G37
// $section=37;
// $columnNo=6;
// $inpName='G'.$section;
//
//		
//
//		$db2 =& JFactory::getDBO();
//		$query2 = 'SELECT * FROM #__property_types where section="'.$section.'" order by id asc; ';
//		$db2->setQuery($query2);
//		$propTypes = $db2->loadObjectList();
// 		$propertyStartId=$propTypes[0]->id ;
//
//
//$inpArray=$_POST['inputG37-2'];
//for($i=0; $i<count($inpArray); $i++)
//{
//		$property->id = 0; // to insert a new row
//		$property->kredi_id = $row->id;
//		$property->lineNo=(($i*4)+1);
//		$property->property_value=$array[$i];
//		$property->property_id = ($propertyStartId + $col);
//		if($property->property_value != null)
//		$property->store($propValues);
//}
//
//
////Diğer kolonlar
// for($col=2; $col<$columnNo; $col++ )//her bir kolon için
// {
//	$array=$_POST['input'.$inpName.'-'.($col+1)];
//	for($i=0; $i<count($array); $i++)//herbir kolonun herbir elemanı için
//	{
//		$property->id = 0; // to insert a new row
//		$property->kredi_id = $row->id;
//		$property->lineNo=($i+1);
//		$property->property_value=$array[$i];
//		$property->property_id = ($propertyStartId + $col);
//		if($property->property_value != null)
//		$property->store($propValues);
//	}
//	
// }
// 


/***********************************************************
 *       DEĞİŞKEN DEĞERLER DE BITER                         *
 ************************************************************/



if(!$edit_kredi_id)
echo '<h5>TALEBİNİZ BAŞARIYLA ALINMIŞTIR.</h5>';
else{
	

	
global $mainframe;
	
$mainframe->redirect(JURI::base().'administrator/index.php?option=com_duzenlekredi', '', ''); 
	

}


?>


</body>
</html>
