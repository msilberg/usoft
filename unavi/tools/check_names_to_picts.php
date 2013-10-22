<?php
require_once("/var/www/public_html/unavi/core/loader.inc");
new dbconnect();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title>Test page for Navi v3</title>
</head>
<body>
<table border="1">
<?php
foreach (service::res2arr(mysql_query("SELECT id,name FROM stores WHERE module_id=2")) as $val)
{
	print "<tr>";
	$i=0;
	foreach ($val as $fval)
	{
		if (++$i==1)
		{
			print "<td>$fval</td>";
			$no=$fval;
		}
		else print "<td>$fval</td><td><img src=\"http://localhost/public_html/unavi/graphics/logos/2/$no.png\" /></td>";
	}
	print "</tr>"; 
}
?>
</table>
<hr/><img src="http://localhost/public_html/unavi/graphics/logos/2/2011-06-28 06:43:14.png"/>
</body>
</html>
