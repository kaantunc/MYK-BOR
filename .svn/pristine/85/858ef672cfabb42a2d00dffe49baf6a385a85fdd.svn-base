<?php
/**
* @version		$Id: index.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Set flag that this is a parent file
define( '_JEXEC', 1 );

define('JPATH_BASE', dirname(__FILE__) );

define( 'DS', DIRECTORY_SEPARATOR );

require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

JDEBUG ? $_PROFILER->mark( 'afterLoad' ) : null;

/**
 * CREATE THE APPLICATION
 *
 * NOTE :
 */
$mainframe =& JFactory::getApplication('site');
$dbOrc2 	= & JFactory::getOracleDBO(); //Oracle
$juser2 	= & JFactory::getUser(); 	  //Joomla User
$icerik=	"DEĞİŞKENLER\n\r";
$icerik.=	print_r($_REQUEST,true);
$icerik.=	"\n\r=========\n\rDOSYALAR\n\r";
$icerik.=	print_r($_FILES,true);
$component=$_GET[option];
$task=$_GET[task];
$view=$_GET[view];
$layout=$_GET[layout];
//$sql = "DELETE FROM M_ACCESS_LOG WHERE ZAMAN < '".strtotime(date('YmdHis',strtotime("-1 months")))."'";
//$dbOrc2->prep_exec_insert($sql, array());
$sqlLog="insert into m_access_log (USER_ID,AD,ZAMAN,COMPONENT,TASK,\"VIEW\",LAYOUT,ICERIK)
values (?,?,?,?,?,?,?,?)";
$param=Array($juser2->id,$juser2->name,time(),$component,$task,$view,$layout,$icerik);
$dbOrc2->prep_exec_insert($sqlLog, $param);

function dd($string){
	echo "<pre>";
	print_r($string);
	echo "</pre>";
}

if ($_GET["dl"]!=""){
	$file = $_GET["dl"]; // change the path to fit your websites document structure
//	$file=ltrim($file,EK_FOLDER);
//	$fullPath=EK_FOLDER.$file;
	$lenfolder=mb_strlen(EK_FOLDER);
	if (mb_substr($file, 0,mb_strlen(EK_FOLDER))==EK_FOLDER){
		$fullPath=$file;
	} else {
		$fullPath=EK_FOLDER.$file;
	}
	
	if ($fd = fopen ($fullPath, "r")) {
		$fsize = filesize($fullPath);
		$path_parts = pathinfo($fullPath);
		$ext = strtolower($path_parts["extension"]);
		switch ($ext) {
			case "pdf":
				header("Content-type: application/pdf"); // add here more headers for diff. extensions
				header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
				break;
            case "doc":
            case "docx":
                header("Content-Description: File Transfer");
                header('Content-Disposition: attachment; filename="' . $path_parts["basename"] . '"');
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                header('Content-Transfer-Encoding: binary');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Expires: 0');
                break;
			default;
			header("Content-type: application/octet-stream");
			header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
		}
		header("Content-length: $fsize");
		header("Cache-control: private"); //use this to open files directly
		while(!feof($fd)) {
			$buffer = fread($fd, 2048);
			echo $buffer;
		}
	} else {
		echo "Boyle bir dosya kayıtlı değil.";
	}
	fclose ($fd);
	exit;
	
}

if ($_GET["img"]!=""){
	$imgpath=EK_FOLDER.$_GET["img"];
	$finfo = finfo_open(FILEINFO_MIME_TYPE);  // return mime type ala mimetype extension
	$mime_type = finfo_file($finfo, $imgpath);
	finfo_close($finfo);
	 
	switch ($mime_type){
		case "image/jpeg":
			// Set the content type header - in this case image/jpg
			header('Content-Type: image/jpeg');
			 
			// Get image from file
			$img = imagecreatefromjpeg($imgpath);
			 
			// Output the image
			imagejpeg($img);
			 
			break;
		case "image/png":
			// Set the content type header - in this case image/png
			header('Content-Type: image/png');
			 
			// Get image from file
			$img = imagecreatefrompng($imgpath);
			 
			// integer representation of the color black (rgb: 0,0,0)
			$background = imagecolorallocate($img, 0, 0, 0);
			 
			// removing the black from the placeholder
			imagecolortransparent($img, $background);
			 
			// turning off alpha blending (to ensure alpha channel information
			// is preserved, rather than removed (blending with the rest of the
			// image in the form of black))
			imagealphablending($img, false);
			 
			// turning on alpha channel information saving (to ensure the full range
			// of transparency is preserved)
			imagesavealpha($img, true);
			 
			// Output the image
			imagepng($img);
			 
			break;
		case "image/gif":
			// Set the content type header - in this case image/gif
			header('Content-Type: image/gif');
			 
			// Get image from file
			$img = imagecreatefromgif($imgpath);
			 
			// integer representation of the color black (rgb: 0,0,0)
			$background = imagecolorallocate($img, 0, 0, 0);
			 
			// removing the black from the placeholder
			imagecolortransparent($img, $background);
			 
			// Output the image
			imagegif($img);
			 
			break;
	}
	 
	// Free up memory
	imagedestroy($img);
	exit;
}



/**
 * INITIALISE THE APPLICATION
 *
 * NOTE :
 */
// set the language
$mainframe->initialise();
JPluginHelper::importPlugin('system');

// trigger the onAfterInitialise events
JDEBUG ? $_PROFILER->mark('afterInitialise') : null;
$mainframe->triggerEvent('onAfterInitialise');

/**
 * ROUTE THE APPLICATION
 *
 * NOTE :
 */
$mainframe->route();

// authorization
$Itemid = JRequest::getInt( 'Itemid');
$mainframe->authorize($Itemid);

// trigger the onAfterRoute events
JDEBUG ? $_PROFILER->mark('afterRoute') : null;
$mainframe->triggerEvent('onAfterRoute');

/**
 * DISPATCH THE APPLICATION
 *
 * NOTE :
 */
$option = JRequest::getCmd('option');
$mainframe->dispatch($option);

// trigger the onAfterDispatch events
JDEBUG ? $_PROFILER->mark('afterDispatch') : null;
$mainframe->triggerEvent('onAfterDispatch');

/**
 * RENDER  THE APPLICATION
 *
 * NOTE :
 */
$mainframe->render();

// trigger the onAfterRender events
JDEBUG ? $_PROFILER->mark('afterRender') : null;
$mainframe->triggerEvent('onAfterRender');

/**
 * RETURN THE RESPONSE
 */
echo JResponse::toString($mainframe->getCfg('gzip'));
