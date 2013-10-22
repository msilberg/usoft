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
<pre>
<?php
function res2arr($res)
{
	if (empty($res)) return false;
	$i=0;
	while ($a_row=mysql_fetch_row($res)) $arr[$i++]=$a_row;
	return $arr;
}
function res2val($res)
{
	if (empty($res) || mysql_num_rows($res)==0) return false;
	while ($a_row=mysql_fetch_row($res)) return $a_row[0];
}
$res=mysql_query("SELECT id,name,level_id FROM stores WHERE module_id=4");
foreach (res2arr($res) as $val)
{
	$lev=res2val(mysql_query("SELECT no FROM levels WHERE id=".$val[2]));
	print "	&lt;store&gt;
		&lt;!-- $val[1] --&gt;
		&lt;id&gt;$val[0]&lt;/id&gt;
		&lt;area&gt;&lt;/area&gt;
		&lt;flag&gt;&lt;/flag&gt;
		&lt;circle&gt;&lt;/circle&gt;
		&lt;text&gt;
			&lt;coords&gt;&lt;/coords&gt;
			&lt;size&gt;&lt;/size&gt;
			&lt;rotate&gt;&lt;/rotate&gt;
			&lt;break&gt;&lt;/break&gt;
		&lt;/text&gt;
		&lt;!-- $val[2] --&gt;
	&lt;/store&gt;\n";
}
?>
</pre>
</body>
</html>
