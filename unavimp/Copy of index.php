<?php
	if (stristr($_SERVER['HTTP_HOST'],"www")) header("Location: http://localhost/public_html/uniqoom");
	require_once("/var/www/public_html/unavimp/core/loader.inc");
	$obj=new data("web",array(
		"login"=>"c405082df82299e0581a9fc60bb34c53",
		"psswd"=>"d96192e3eb961b7cbf2fb7d47e8effef"
	));
	if ($obj->web_login()) include "/var/www/public_html/unavimp/core/html/web/body.php";
	else
	{
		print "Authorization error";
		return false;
	}
	if (isset($_POST['store']))
	{
		$obj->shwst=TRUE;
		$obj->store=intval($_POST['store']);
	}
	else $obj->shwst=FALSE;
?>