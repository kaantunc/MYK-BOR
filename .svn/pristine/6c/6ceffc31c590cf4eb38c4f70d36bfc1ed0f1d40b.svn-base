<?php
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
$ip=$_SERVER['REMOTE_ADDR'];

echo $ip."--".shell_exec('arp '.$ip.' | awk \'{print $4}\'');
 ?>