<?php 
/**
 * jSecure Authentication components for Joomla!
 * jSecure Authentication extention prevents access to administration (back end)
 * login page without appropriate access key.
 *
 * @author      $Author: Ajay Lulia $
 * @copyright   Joomla Service Provider - 2010
 * @package     jSecure2.0.1
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     $Id: default.php  $
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> Readme </TITLE>
 </HEAD>

 <BODY>
	<form action="index.php" method="post" name="adminForm">
	<div style='width: 90%; text-align: left;'>
		<p><strong>Drawback:</strong></p>    
		<p>Joomla has one drawback, any web user can easily know the site is created in Joomla! by typing the URL to access the administration area (i.e. www.site name.com/administration). This makes hackers hack the site easily once they crack id and password for Joomla!. </p>    
		<p><strong>Information:</strong></p>      
		<p>jSecure Authentication module prevents access to administration (back end) login page without appropriate access key.</p>      
		<p><strong>Installation steps:</strong></p>
		<ol>
			<li>Login to administration area</li>
			<li>Go to Installer -&gt; select the jSecure2.1.2.zip file.</li>
			<li>Click on Install & upload.</li>
		</ol>      
		<p> Once the plugin is installed there are few manual steps which needs to be followed to make the plugin work: </p>    
		<ol>
			<li>Login to Administration area</li>
			<li>Go to the Plugin Manager </li>
			<li>Enable the <strong>System - jSecure Authentication</strong> plugin </li>
			<li>Go to the jSecure Authentication component configuration in components>jSecure Authentication and set the parameters if you like. By default jSecure is set up so that you will need to enter a secret key that will serve as the new administrator URL. The default key to access login page is "jSecure", so if your website is www.website.com then the new URL for the Joomla administration would be www.website.com/administrator/jSecure. Make sure you change the default key! </li>
			<li>You can also set jSecure Authentication to display a custom form on the administrator page instead of a new URL. If you choose this option then you will still access your administration area with the default URL of /administrator. However, you will have a new login page where you will need to enter the jSecure key. </li>
			<li>Make sure that you set the &quot;enabled&quot; field to &quot;Yes&quot; otherwise jSecure will not be activated. </li>
		</ol>
		<p><em><strong>Note:</strong></em> The key is case sensitive and can **ONLY** contain alphanumeric values. PLEASE don't use numeric values</p>
		<p><strong>How to Use jSecure Authentication:</strong></p>
		<p>By default the component is set to replace the default Joomla URL with one that you will set with this component. For example: </p>
		<p>http://www.site name/administrator/?<em><strong>keyname </strong></em></p>    
		<p><em><strong>keyname:</strong></em> key name is the key specified in the jSecure Authentication component. </p>
		<p>You can also choose to maintain the default Joomla administrator URL and to add an extra login form) If you choose this option, then the Key will become the new password for the form. Once the key has been entered in the new form, the user will be directed to the administrator page.</p>
		<p>
		<strong>COMPONENT PARAMETERS:</strong></p>
		<p> <em><strong>jSecure Authentication</strong></em> component provides following parameters:</p>
		<p><strong>Enable:</strong> For jSecure to be activated set this to yes and go to the plugin manager and set the jSecure plugin to &quot;enabled&quot;.</p>
		<p><strong>Pass Key:</strong> Select whether you want jSecure to create a new URL for the admin area (most popular) or if you want to create a second administrator login form (the &quot;form&quot; option). </p>
		<p><strong>Key:</strong> This is secure key which will be used to grant access to administration area. If you chose the URL option (most popular) then the new URL for your administration area will be http://www.site name/administrator/?<em><strong>keyname.</strong></em> You set the Keyname by inputing your new key in the Key field. The key is case sensitive and can **ONLY** contain alphanumeric values. PLEASE don't use purely numeric values.</p>
		<p><strong><span class="editlinktip"><span>Redirect Options:</span></span></strong> This parameter specifies what action to take if the key does not match. There are two choices:</p>
		<ul>
			<li><em>Redirect to index page</em>: Redirect unauthorized user back to home page</li>
			<li><em>Custom Path</em>: Provide relative path to custom page, for example 404 page not found. </li>
		</ul>
		<p><strong><span class="editlinktip"><span>Send Mail:</span></span></strong> You can set jSecure to email on or more email addresses with an alert if someone tries to unsuccessfully access the Joomla administration area. </p>
		<p><strong><span class="editlinktip"><span>Send Mail Details:</span></span></strong> You can have jSecure mail the wrong Key that was used, the correct Key, or both.</p>
		<p><strong><span class="editlinktip"><span>Email Ids :</span></span></strong>If you chose the &quot;Send Mail&quot; option, then enter the email addresses here. Separate multiple emails with a comma.</p>
		<p><strong><span class="editlinktip"><span>Email Subject: </span></span></strong>Choose an email subject for the email alert.</p>
		<p><strong><span class="editlinktip">Blocked IPs/ White Listed IPs: </span></span></strong>User can choose the options to configure with blocked IPs or white listed IPs.</p> 
		<p><strong><span class="editlinktip">Add a new IP address to the list: </span></span></strong>User friendly to add the IPs.</p>
		<p><strong><span class="editlinktip">IP addresses: </span></span></strong>Displayed the added IP addresses.</p>
		<p><strong><span class="editlinktip">Enable the Master Password: </span></span></strong>To prevent the access from change the configuration of jSecure Authentication.</p>
		<p><strong><span class="editlinktip">Master Password: </span></span></strong>Configure the master password to prevent from accessing.</p>
		<p><strong><span class="editlinktip">Master Password Send Mail: </span></span></strong>To send the mail when admin change the any configuration of jSecure Authentication.</p>
		<p><strong><span class="editlinktip">Master Password E-Mail Subject: </span></span></strong>Configure the subject of email.</p>
		<p><strong><span class="editlinktip">E-Mail Id: </span></span></strong>Add the email id where you get the mail when any changes happen in configuration of jSecure Authentication.</p>


		<p>For More information http://joomlaserviceprovider.com<br>
		Thanks to the team (Ajay Lulia, Bhavin Shah, Mehul Prajapati) for developing the Component and Plugin.<br>
		Thanks to Aaron Handford, Ajay Lulia for help with the component conceptualization.<br>
		Thanks to Sam Moffatt for converting Joomla! 1.0 module to a Joomla!  1.5 system plugin.<br></p>
		<p><B>Change Log:</B></p>
		<p style="padding-left:20px;">
				1.0: Initial Version 1.0.1:<br>
				Fix for J1.5 Native<br><br>
		
				1.0.2(30-Aug-08):<br>
				Fix for J1.5 params (Thanks to Christer) <br><br>
		
				1.0.3(15-Sep-08):<br>
				Fix for J1.5 call to admin login page using index2.php, please update your copy of jSecure Authentication.<br><br>
		
				1.0.4(26-Sep-08):<br>
				Fix for J1.5 to use proper custom tag and fixed a php error.<br><br>
		
				1.0.5(16-Oct-08):<br> 
				Fixed redirection issue.<br><br>
		
				1.0.6(23-Dec-08):<br> 
				Fixed security bug. Updated the readme file.<br><br>
				1.0.7(21-Mar-09):<br>
				Fixed the code for redirection.<br><br>
				1.0.8(02-Jun-09):<br>
				Fixed the case sensitivity check.<br><br>
				1.0.9(10-Jun-09):<br>
				Fixed warning message.<br><br>
				2.0(01-Apr-10):<br>
				Added new features<br><br>
				2.0.1(14-Apr-10):<br>
				1. Optimized the code.<br>
				2. Fixed the IP issue in mail.<br>
				3. Added Licenses information in files.<br><br>
				2.1.0(19-Apr-10):<br>
				Fixed security bug.<br><br>
				2.1.1(31-May-10):<br>
				1. Added Master Password to access the jSecure Authentication.<br>
				2. Added E-mail option to send the change log in jSecure Authentication.<br>
				3. User can choose from White Listed IPs / Blocked IPs.<br>
				4. User Friendly option to add ip address.<br>
			    5. Enter specific IPs(White Listed IPs) that will allow access to administration area.<br><br>
				2.1.2(02-June-10):<br>
				Fixed small error.<br><br>
				<br>
		</p>
		<br>
		<p>
			<strong>License:</strong> This is free software and you may redistribute it under the GPL. jSecure comes with absolutely no warranty. Use at your own risk. For details, see the license at http://www.gnu.org/licenses/gpl.txt Other licenses can be found in LICENSES folder.
		</p>
	</div>
	<input type="hidden" name="option" value="com_jsecure"/>
	<input type="hidden" name="task" value=""/>
	</form>
 </BODY>
</HTML>