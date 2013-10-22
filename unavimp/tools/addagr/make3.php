<?php
$link=mysql_connect("localhost","root","qwerty");
mysql_select_db("unavi",$link) or die("Can't connect to DB'");
function rvp($raw)
{
	// raw variable processing
	if (is_numeric($raw)) return (double)$raw;
	elseif (strtolower($raw)=="true") return true;
	elseif (strtolower($raw)=="false") return false;
	else return $raw;
}
function res2val($res)
{
	if (empty($res) || mysql_num_rows($res)==0) return false;
	while ($a_row=mysql_fetch_row($res))
	{
		return rvp($a_row[0]);
		break;
	}
}
$tnb=6610;
for ($i=6493;$i<=6598;$i++)
{
	mysql_query("DELETE FROM clients WHERE id=".$i);
	mysql_query("DELETE FROM credentials WHERE client_id=".$i);
	$tnt=res2val(mysql_query("SELECT id FROM trade_network WHERE client_id=".$i));
	mysql_query("DELETE FROM trade_network WHERE client_id=".$i);
	mysql_query("UPDATE stores SET trade_network_id=$tnb WHERE trade_network_id=".$tnt);
}
?>