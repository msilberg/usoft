<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php
	require_once("/var/www/public_html/unavi/core/loader.inc");
	//$obj=new data(NULL,NULL); 
?>
<html dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title>UNAVI test page</title>
</head>
<body>
	<center>
	<?php
		$arr = service::si_name();
		print_r($arr);
	?>
	</center>
</body>
</html>