<?php

/*****************************************************
*
*	KREDİ KAYITLARININ SABİT DATALARI İCİN
*
*****************************************************/

defined('_JEXEC') or die('Restricted access');
class TableKredi_Kayitlari extends JTable
{
	  var $id = null;
	  var $sirketUnvani = null;
	  var $sirketAdresi = null;
	  var $kurulus = null;
	  var $vergiDaireNo = null;
	  var $ticariSicilNo = null;
	  var $sirketYetkilileri = null;
	  var $cepTelefonu = null;
	  var $telefon = null;
	  var $faks = null;
	  var $e_posta = null;
	  var $webAdresi = null;
	  var $marka = null;
	  var $sinaiMulkiyet = null;
	  var $hammaddeyeUzaklik = null;
	  var $ulasim = null;
	  var $enerji = null;
	  var $su = null;
	  var $arsaninOzellikleri = null;
	  var $isGucu = null;
	  var $yedekParca = null;
	  var $atiklar = null;
	  var $pazaraUzaklik = null;
	  var $insanSagligi = null;
	  var $ilaveTesvik = null;
	  var $yerel = null;
	  var $bolgesel = null;
	  var $yurtGeneli = null;
	  var $yurtdisi = null;
	  var $toptanSatisOrani = null;
	  var $perakendeSatisOrani = null;
	  var $aylikYurticiCiro = null;
	  var $aylikYurtdisiCiro = null;
	  var $yillikYurticiCiro = null;
	  var $yillikYurtdisiCiro = null;
	  var $yurticiPerakendeMagaza = null;
	  var $yurtdisiPerakendeMagaza = null;
	  var $yurticiToptanDistributor = null;
	  var $yurticiToptanBayi = null;
	  var $yurticiSatisPersoneli = null;
	  var $yurticiFranchising = null;
	  var $yurticiDigerMusteri = null;
	  var $iKCalisanSayisi = null;
	  var $iKUstYoneticiSayisi = null;
	  var $iKAraKademeYonetici = null;
	  var $iKIsciSayisi = null;
	  var $iKDenetciSayisi = null;
	  var $field_26_1 = null;
	  var $field_26_2 = null;
	  var $field_26_3 = null;
	  var $field_28_1 = null;
	  var $field_28_2 = null;
	  var $field_28_3 = null;
	  var $field_28_4 = null;
	  var $field_29a_1_1 = null;
	  var $field_29a_1_2 = null;
	  var $field_29a_2_1 = null;
	  var $field_29a_2_2 = null;
	  var $field_29a_3_1 = null;
	  var $field_29a_3_2 = null;
	  var $field_29a_4_1 = null;
	  var $field_29a_4_2 = null;
	  var $field_29a_5_1 = null;
	  var $field_29a_5_2 = null;
	  var $field_29a_6_1 = null;
	  var $field_29a_6_2 = null;
	  var $field_29a_7_1 = null;
	  var $field_29a_7_2 = null;
	  var $field_29a_8_1 = null;
	  var $field_29a_8_2 = null;
	  var $field_29a_9_1 = null;
	  var $field_29a_9_2 = null;
	  var $field_29a_10_1 = null;
	  var $field_29a_10_2 = null;
	  var $field_29a_11_1 = null;
	  var $field_29a_11_2 = null;
	  var $field_29a_12_1 = null;
	  var $field_29a_12_2 = null;
	  var $field_29a_13_1 = null;
	  var $field_29a_13_2 = null;
	  var $field_29a_14_1 = null;
	  var $field_29a_14_2 = null;
	  var $field_29a_15_1 = null;
	  var $field_29a_15_2 = null;
	  var $field_29b_1_1 = null;
	  var $field_29b_1_2 = null;
	  var $field_29b_2_1 = null;
	  var $field_29b_2_2 = null;
	  var $field_29b_3_1 = null;
	  var $field_29b_3_2 = null;
	  var $field_29b_4_1 = null;
	  var $field_29b_4_2 = null;
	  var $field_29b_5_1 = null;
	  var $field_29b_5_2 = null;
	  var $field_29b_6_1 = null;
	  var $field_29b_6_2 = null;
	  var $field_29b_7_1 = null;
	  var $field_29b_7_2 = null;
	  var $field_29b_8_1 = null;
	  var $field_29b_8_2 = null;
	  var $field_29b_9_1 = null;
	  var $field_29b_9_2 = null;
	  var $field_29b_10_1 = null;
	  var $field_29b_10_2 = null;
	  var $field_29b_11_1 = null;
	  var $field_29b_11_2 = null;
	  var $field_29b_12_1 = null;
	  var $field_29b_12_2 = null;
	  var $field_29b_13_1 = null;
	  var $field_29b_13_2 = null;
	  var $field_29b_14_1 = null;
	  var $field_29b_14_2 = null;
	  var $field_29b_15_1 = null;
	  var $field_29b_15_2 = null;
	  var $field_30_1 = null;
	  var $field_30_2 = null;
	  var $field_30_3 = null;
	  var $field_30_4 = null;
	  var $field_30_5 = null;
	  var $field_30_6 = null;
	  var $field_30_7 = null;
	  var $field_30_8 = null;
	  var $field_30_9 = null;
	  var $field_30_10 = null;
	  var $field_30_11 = null;
	  var $field_30_12 = null;
	  var $field_30_13 = null;
	  var $field_30_14 = null;
	  var $field_30_15 = null;
	  var $field_30_16 = null;
	  var $field_30_17 = null;
	  var $field_30_18 = null;
	  var $field_30_19 = null;
	  var $field_30_20 = null;
	  var $field_30_21 = null;
	  var $field_30_22 = null;
	  var $field_30_23 = null;
	  var $field_30_24 = null;
	  var $field_30_25 = null;
	  var $field_30_26 = null;
	  var $field_30_27 = null;
	  var $field_30_28 = null;
	  var $field_30_29 = null;
	  var $field_30_30 = null;
	  var $field_30_31 = null;
	  var $field_30_32 = null;
	  var $field_30_33 = null;
	  var $field_30_34 = null;
	  var $field_30_35 = null;
	  var $field_30_36 = null;
	  var $field_30_37 = null;
	  var $field_30_38 = null;
	  var $field_30_39 = null;
	  var $field_30_40 = null;
	  var $field_30_41 = null;
	  var $field_30_42 = null;
	  var $field_30_43 = null;
	  var $field_30_44 = null;
	  var $field_30_45 = null;
	  var $field_30_46 = null;
	  var $field_30_47 = null;
	  var $field_30_48 = null;
	  var $field_30_49 = null;
	  var $field_30_50 = null;
	  var $field_30_51 = null;
	  var $field_30_52 = null;
	  var $field_30_53 = null;
	  var $field_30_54 = null;
	  var $field_30_55 = null;
	  var $field_30_56 = null;
	  var $field_30_57 = null;
	  var $field_30_58 = null;
	  var $field_30_59 = null;
	  var $field_30_60 = null;
	  var $field_30_61 = null;
	  var $field_30_62 = null;
	  var $field_30_63 = null;
	  var $field_30_64 = null;
	  var $field_30_65 = null;
	  var $field_30_66 = null;
	  var $field_30_67 = null;
	  var $field_30_68 = null;
	  var $field_30_69 = null;
	  var $field_30_70 = null;
	  var $field_30_71 = null;
	  var $field_30_72 = null;
	  var $field_30_73 = null;
	  var $field_30_74 = null;
	  var $field_30_75 = null;
	  var $field_30_76 = null;
	  var $field_30_77 = null;
	  var $field_30_78 = null;
	  var $field_30_79 = null;
	  var $field_30_80 = null;
	  var $field_30_81 = null;
	  var $field_30_82 = null;
	  var $field_30_83 = null;
	  var $field_30_84 = null;
	  var $field_30_85 = null;
	  var $field_30_86 = null;
	  var $field_30_87 = null;
	  var $field_30_88 = null;
	  var $field_30_89 = null;
	  var $field_30_90 = null;
	  var $field_30_91 = null;
	  var $field_30_92 = null;
	  var $field_30_93 = null;
	  var $field_30_94 = null;
	  var $field_30_95 = null;
	  var $field_30_96 = null;
	  var $field_30_97 = null;
	  var $field_30_98 = null;
	  var $field_30_99 = null;
	  var $field_30_100 = null;
	  var $field_30_101 = null;
	  var $field_30_102 = null;
	  var $field_30_103 = null;
	  var $field_30_104 = null;
	  var $field_34_1 = null;
	  var $field_34_2 = null;
	  var $field_34_3 = null;
	  var $field_34_4 = null;
	  var $field_34_5 = null;
	  var $field_34_6 = null;
	  var $field_34_7 = null;
	  var $field_34_8 = null;
	  var $field_34_9 = null;
	  var $field_34_10 = null;
	  var $field_34_11 = null;
	  var $field_34_12 = null;
	  var $field_34_13 = null;
	  var $field_34_14 = null;
	  var $field_34_15 = null;
	  var $field_34_16 = null;
	  var $field_34_17 = null;
	  var $field_34_18 = null;
	  var $field_34_19 = null;
	  var $field_34_20 = null;
	  var $field_35_1 = null;
	  var $field_35_2 = null;
	  var $field_35_3 = null;
	  var $field_35_4 = null;
	  var $field_35_5 = null;
	  var $field_35_6 = null;
	  var $field_35_7 = null;
	  var $field_35_8 = null;
	  var $field_35_9 = null;
	  var $field_35_10 = null;
	  var $field_35_11 = null;
	  var $field_35_12 = null;
	  var $field_35_13 = null;
	  var $field_35_14 = null;
	  var $field_35_15 = null;
	  var $field_35_16 = null;
	  var $field_35_17 = null;
	  var $field_35_18 = null;
	  var $field_35_19 = null;
	  var $field_35_20 = null;
	  var $field_35_21 = null;
	  var $field_35_22 = null;
	  var $field_35_23 = null;
	  var $field_35_24 = null;
	  var $field_35_25 = null;
	  var $field_35_26 = null;
	  var $field_35_27 = null;
	  var $field_35_28 = null;
	  var $field_35_29 = null;
	  var $field_35_30 = null;
	  var $field_35_31 = null;
	  var $field_35_32 = null;
	  var $field_35_33 = null;
	  var $field_35_34 = null;
	  var $field_35_35 = null;
	  var $field_36 = null;
	  var $field_38_1 = null;
	  var $field_38_2 = null;
	  var $field_38_3 = null;
	  var $field_38_4 = null;
	  var $field_38_5 = null;
	  var $field_38_6 = null;
	  var $field_38_7 = null;
	  var $field_39_1 = null;
	  var $field_39_2 = null;
	  var $field_39_3 = null;
	  var $field_39_4 = null;
	  var $field_29b_16_1 = null;
	  var $field_29b_16_2 = null;
	  var $field_29b_17_1 = null;
	  var $field_29b_17_2 = null;
	  var $field_29b_18_1 = null;
	  var $field_29b_18_2 = null;
	  
	
	function __construct(&$db)
	{
			
		parent::__construct( '#__kredi_kayitlari', 'id', $db );
	}
}
?>

  
  


