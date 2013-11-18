<?php
require_once("/var/www/public_html/unavi/core/loader.inc");
$obj=new data($_POST['login'],$_POST['psswd']);
if ($obj->module_login()) include "/var/www/public_html/unavi/core/html/body.php";
else print "<h3>Access is denied</h3>";
?>