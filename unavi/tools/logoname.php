<?php
require_once("/var/www/public_html/unavi/core/loader.inc");
new dbconnect();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<?php
// *** First part ***
//$no=$_GET['no'];
//print (++$no<453)?"<meta http-equiv=\"refresh\" content=\"1; url=http://localhost/public_html/unavi/tools/logoname.php?no=$no\">":NULL; 
?>
<title>Tool for inserting logos name</title>
</head>
<body>
<?php
	// *** First part ***
	/*$res=mysql_query("SELECT id FROM stores");
	while($a_row=mysql_fetch_row($res))
		foreach ($a_row as $val) $arr[]=$val;
	mysql_query("UPDATE stores SET image='".date('U')."' WHERE id=".$arr[($no-1)]);
	print "<h1>$no</h1>";*/
	// *** Second part ***
	/*$res=mysql_query("SELECT image,image_prev FROM stores WHERE module_id=2");
	$path="/home/mike/public_html/unavi/graphics/showcases/";
	$path2="/home/mike/public_html/unavi/graphics/logos/";
	while($a_row=mysql_fetch_row($res))
	{
		$i=1;
		foreach ($a_row as $val)
		{
			if ($i==1) $newname=$path2.$val.".jpg";
			else
			{
				$oldname=$path2.(str_replace(" ","_",$val).".png");
				rename($oldname,$newname);
				print "renamed ".++$rename."<br/>";
			}
			$i++;
		}
	}*/
	// *** Third part ***
	$res=mysql_query("SELECT id,name,image FROM stores WHERE module_id=2");
	$url="http://localhost/public_html/unavi/graphics/showcases/";
	$url2="http://localhost/public_html/unavi/graphics/logos/";
	print "<table border=\"1\">";
	while($a_row=mysql_fetch_object($res))
		print "<tr><td>".$a_row->id."</td><td>".$a_row->name."</td>
			<td><img src=\"".$url.$a_row->image.".jpg\"/></td>
			<td><img src=\"".$url2.$a_row->image.".jpg\"/></td></tr>";
	print "</table>";
?>
</body>
</html>