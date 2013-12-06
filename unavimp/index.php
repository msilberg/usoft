<?php
    if (
		stristr($_SERVER['HTTP_HOST'],"www") || 
		stristr($_SERVER['HTTP_HOST'],"infotrade.ua") || 
		stristr($_SERVER['HTTP_HOST'],"uadmin.no-ip.biz") || 
		stristr($_SERVER['HTTP_HOST'],"index.php")
	){
		header("Location: http://un.barabashovo.ua");
	}
	require_once("core/loader.inc");
	$obj=new data("web",array(
        // server.
        "login"=>"c912f37f5e81eff2d63c5cb7ead317a7",
        "psswd"=>"9f98460292db279c2cec6c71cc7eb405"
	));
	if ($obj->module_login())
	{
		$obj->release=(isset($_POST['release']))? $_POST['release'] : NULL;
		include "core/html/web/body.php";
	}
	else
	{
		print "Authorization error";
		return false;
	}
	$obj->show_store(isset($_POST['store']));
    $obj->showie=isset($_GET['showie']);
?>