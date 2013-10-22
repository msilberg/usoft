<?php
	$msg="<h3>Access is denied</h3>";
	/*if (empty($_POST['login']) || empty($_POST['psswd']))
	{
		print $msg;
		return false;
	}*/
	require_once("/var/www/public_html/unavimp/core/loader.inc");
	$obj=new data("mod",array("login"=>$_POST['login'],"psswd"=>$_POST['psswd']));
	if ($obj->module_login())
	{
		$obj->release=(isset($_POST['release']))? $_POST['release'] : NULL;
		include "/var/www/public_html/unavimp/core/html/mod/body.php";
	}
	else print $msg;
?>