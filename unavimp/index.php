<?php
    if (
		stristr($_SERVER['HTTP_HOST'],"www") || 
		stristr($_SERVER['HTTP_HOST'],"infotrade.ua") || 
		stristr($_SERVER['HTTP_HOST'],"uadmin.no-ip.biz") || 
		stristr($_SERVER['HTTP_HOST'],"index.php")
	){
		header("Location: http://un.barabashovo.ua");
//        header("Location: http://localhost/public_html/uniqoom");
        // leon.
//        header("Location: http://localhost/unavimp");
	}
	require_once("core/loader.inc");
	$obj=new data("web",array(
        // server.
        "login"=>"c912f37f5e81eff2d63c5cb7ead317a7"
        , "psswd"=>"9f98460292db279c2cec6c71cc7eb405"
//		"login"=>"c405082df82299e0581a9fc60bb34c53",
//		"psswd"=>"d96192e3eb961b7cbf2fb7d47e8effef"
        // leon.
//        "login"=>"c912f37f5e81eff2d63c5cb7ead317a7"
//        , "psswd"=>"9f98460292db279c2cec6c71cc7eb405"
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
	if (isset($_POST['store']))
	{
		$obj->shwst=TRUE;
		$obj->store=intval($_POST['store']);
	}
	else
    {
        $obj->shwst=FALSE;
    }
    $obj->showie=isset($_GET['showie']);
?>