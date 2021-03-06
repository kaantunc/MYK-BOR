<?php
/**
* @version $Id: kunena.defines.php 877 2009-06-15 21:26:13Z mahagr $
* Kunena Component
* @package Kunena
* @Copyright (C) 2009 Kunena All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.kunena.com
**/

// Version information
define ('KUNENA_VERSION', '1.5.11');
define ('KUNENA_VERSION_DATE', '2010-04-04');
define ('KUNENA_VERSION_NAME', 'Kirjeldama');
define ('KUNENA_VERSION_BUILD', '1884');

// Default values
define('KUNENA_COMPONENT_NAME', 'com_kunena');
define('KUNENA_LANGUAGE_DEFAULT', 'english');
define('KUNENA_TEMPLATE_DEFAULT', 'default');

$language =& JFactory::getLanguage();
$lang = $language->getBackwardLang();

define('KUNENA_LANGUAGE', $lang);

// File system paths
define('KUNENA_COMPONENT_RELPATH', 'components' .DS. KUNENA_COMPONENT_NAME);

define('KUNENA_ROOT_PATH', JPATH_ROOT);
define('KUNENA_ROOT_PATH_ADMIN', JPATH_ADMINISTRATOR);

define('KUNENA_PATH', KUNENA_ROOT_PATH .DS. KUNENA_COMPONENT_RELPATH);
define('KUNENA_PATH_LIB', KUNENA_PATH .DS. 'lib');
define('KUNENA_PATH_TEMPLATE', KUNENA_PATH .DS. 'template');
define('KUNENA_PATH_TEMPLATE_DEFAULT', KUNENA_PATH_TEMPLATE .DS. KUNENA_TEMPLATE_DEFAULT);

define('KUNENA_PATH_ADMIN', KUNENA_ROOT_PATH_ADMIN .DS. KUNENA_COMPONENT_RELPATH);
define('KUNENA_PATH_ADMIN_LIB', KUNENA_PATH_ADMIN .DS. 'lib');
define('KUNENA_PATH_ADMIN_LANGUAGE', KUNENA_PATH_ADMIN .DS. 'language');
define('KUNENA_PATH_ADMIN_INSTALL', KUNENA_PATH_ADMIN .DS. 'install');
define('KUNENA_PATH_ADMIN_IMAGES', KUNENA_PATH_ADMIN .DS. 'images');

// Kunena uploaded files directory
define('KUNENA_PATH_UPLOADED', KUNENA_ROOT_PATH . '/images/fbfiles');

// Files
define('KUNENA_FILE_LANGUAGE_DEFAULT', KUNENA_PATH_ADMIN_LANGUAGE .DS. 'kunena.' . KUNENA_LANGUAGE_DEFAULT . '.php');
define('KUNENA_FILE_LANGUAGE', KUNENA_PATH_ADMIN_LANGUAGE .DS. 'kunena.' . KUNENA_LANGUAGE . '.php');
define('KUNENA_FILE_INSTALL', KUNENA_PATH_ADMIN .DS. 'manifest.xml');

// URLs


// Constants

// Minimum version requirements
DEFINE('KUNENA_MIN_PHP',   '5.0.3');
DEFINE('KUNENA_MIN_MYSQL', '4.1.19');

// Time related
define ('KUNENA_SECONDS_IN_HOUR', 3600);
define ('KUNENA_SECONDS_IN_YEAR', 31536000);

// Database defines
define ('KUNENA_DB_MISSING_COLUMN', 1054);

?>
