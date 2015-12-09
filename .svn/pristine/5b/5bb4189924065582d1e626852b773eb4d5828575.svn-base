<?php
/**
Author: Koumei Deng
Create Date: 25 Feb 2009
License: Commercial
Refered component: PHPExcel (LGPL)
Function:
Simply import Excel(2003) data to database

Note: This function is very simple. Please keep in mind that this component only for manipulating some datatables of simple data, it could not replace the database client. Only for import data.
It's administrator-oriented. Don't try it if you do NOT fully understand the function.
**/

defined( '_JEXEC' ) or die( 'Restricted access' );
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . DIRECTORY_SEPARATOR .'classes');
require_once( JApplicationHelper::getPath( 'html' ) );
require_once 'PHPExcel/IOFactory.php';   

switch($task)
{
	case 'save':
		saveKimport( $option );
		break;
	case 'view':
	default:
		showKimport( $option );
		break;
}
function showKimport( $option )
{
  HTML_kimport::showKimport($option);
}

function saveKimport( $option ){	
	if (isset($_FILES['uploadfile']) && is_array($_FILES['uploadfile'])) {
		$file = $_FILES['uploadfile'];
		upload ($option, $file, '');
	}
	
}

function upload($option, $file, $dest_dir) {
	global $mainframe;

	$format = substr( $file['name'], -3 );
	$allowable = array (
	'xls'
	); //only support excel file (2003)

	$noMatch = 0;
	foreach( $allowable as $ext ) {
		if ( strcasecmp( $format, $ext ) == 0 ) {
			$noMatch = 1;
		}
	}
	if(!$noMatch){
		$mainframe->redirect('index.php?option='.$option, $format.' file type is not supported');
	}else{
		$uf = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tempdata' . DIRECTORY_SEPARATOR .date("YmdGhis").'.'.$format; //uploaded file name
		$upTemp = move_uploaded_file($file['tmp_name'],$uf);
		chmod($uf, 0755);
		if ($upTemp){
			do_import($uf, $option); //after upload file, proceed data import.
		}else{
			$mainframe->redirect('index.php?option='.$option, 'Fail to import data');
		}		
		
	}
}

function do_import($filename, $option) {
	global $mainframe;
	$reader = PHPExcel_IOFactory::createReader('Excel5');
	$excelFile = $reader->load($filename);
	$sheet = $excelFile->getSheet(0);
	
	$sheet_name = $sheet->getTitle();
	$highestRow = $sheet->getHighestRow();
	$highestCol = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
	
	//echo $sheet_name;
	//echo '<br/>';
	
	//echo $highestRow;
	//echo  '<br/>';
	
	//fetch header(field)
	$fields_key = '';
	for ($column = 1; $column < $highestCol; $column++) {  
		$val = $sheet->getCellByColumnAndRow($column, 1)->getValue();  
		$fields_key .= ','.$val;
	}  
	$fields_key = substr($fields_key, 1);
	//echo "<br />";  	
	
	//get type array
	$has_type_row = false;
	$typeVal = $sheet->getCellByColumnAndRow(0, 2)->getValue();  
	if(strcasecmp($typeVal, "type") == 0)
		$has_type_row = true;
	
	$succ_count = 0;
	$fail_to_import = '';
	for ($row = 3; $row <= $highestRow; $row++) {  	  
		$values = '';
		for ($column = 1; $column < $highestCol; $column++) {  
			$cell = $sheet->getCellByColumnAndRow($column, $row);
			$val = ($cell->getValue() instanceof PHPExcel_RichText) ? $cell->getValue()->getPlainText() : $cell->getValue();
			//echo 'val='.$val.'<br/>';
			if(!isset($val) && $val == '')
				$val = 'NULL';
			$val = str_replace("\'", " ", $val); 
			$val = str_replace("\n", "<br/>", $val);

			if($has_type_row){
				$typeVal = ($sheet->getCellByColumnAndRow($column, 2)->getValue() instanceof PHPExcel_RichText) ? $sheet->getCellByColumnAndRow($column, 2)->getValue()->getPlainText() : $sheet->getCellByColumnAndRow($column, 2)->getValue();
				if(strcasecmp($typeVal, "string") == 0 && strcasecmp($val, "null") == 0){
					$val = '';
				}				
				if((strcasecmp($typeVal, "string") != 0 || strcasecmp($typeVal, "char") != 0) && strcasecmp($val, "null") == 0)
					$values .= ','.$val;
				else{

					$values .= ',\''.$val.'\'';
				}
			}else
				$values .= ',\''.$val.'\'';
		}  
		$values = substr($values, 1);
		$sql = "insert into $sheet_name ($fields_key) values ($values)";  	 
		//echo $sql . ';<br/>';
		$sql_err = executeSQL($sql);
		if($sql_err == "success"){
			$succ_count++;
		}else{
			$fail_to_import .= '[row='.$row.':'.$sql_err.']<br/>';
		}

	} 	
	$mainframe->redirect('index.php?option='.$option, 'Imported '.$succ_count.' rows'.(empty($fail_to_import)?'':' reason: '.$fail_to_import));
}

/**
Execute data SQL
**/
function executeSQL($query){
  $db =&JFactory::getDBO();
  $db->setQuery( $query );
  if (!$db->Query()) {
     //echo "<script> alert(\"".$db->getErrorMsg()."\"');window.history.go(-1); </script>\n";
     return $db->getErrorMsg();
  }	
  return "success";
}
?>