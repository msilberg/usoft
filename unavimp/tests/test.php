<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php
	/*require_once("/var/www/public_html/unavimp/core/loader.inc");
	$obj=new data("mod",NULL);*/
	$link=mysql_connect("localhost","root","qwerty");
	mysql_select_db("unavi",$link);
?>
<html dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title>UNAVI MP test page</title>
</head>
<body>
<?php
	print mb_strtoupper("Главная","UTF-8");
?>
</body>
</html>
