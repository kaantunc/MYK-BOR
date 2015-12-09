<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

if($isim != ''){?>
<table style="margin-bottom:15px;margin-left:35px">
<tr>
<td id="notificationNumbersDiv" style="background:url(templates/worldicon.png); padding-bottom:10px;background-repeat:no-repeat; width:25px;height:25px; color:#c00;font-size:15px;font-weight:bold;vertical-align: bottom;text-align:right;border:0px solid #000">	
</td>
<td id="isimGosterDiv" style="padding-left:15px;">	
<div style="padding-bottom:5px;">
<?php echo substr($isim,0,26); ?>
<?php if($kurMu){?>
	<a href="index.php?option=com_profile" style="float:right; color:red;">Profilim</a>
<?php }?>
<br/>
<span id="isimGosterSpan"> olarak giriş yaptınız.</span>
</div>
</td>
</tr>
</table>
	<?php 
		include("uyarisistemi.php");
}
else {?>
<div id="isimGosterDiv" style="width:120px"><span id="isimGosterSpan">Giriş yapmadınız.</span></div>
<?php }
include("yardim.php");

?>