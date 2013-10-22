<?php
$link=mysql_connect("localhost","root","qwerty");
mysql_select_db("unavi",$link) or die("Can't connect to DB'");
$st_arr=array(6692,6691,6690,6689,6688,6687,6686,6685,6684,6683,6682,6693,6694,6695,6696,6697,6698,6699,6700,6701,6702,6703,6704,6705,6706,6749,6762,6761,6760,6759,6758,6757,6756,6755,6754,6753,6752,6751,6750,6731,6748,6747,6746,6745,6744,6743,6742,6741,6740,6739,6738,6737,6736,6735,6734,6733,6732,6681,6680,6679,6678,6677,6676,6675,18304,20104,6715,6716,6714,18305,6713,6712,6711,6710,6709,6708,6707,6771,6772,6773,6774,6775,6776,6777,6778,6763,6764,6765,6766,6767,6768,6769,6770,6724,6725,6726,6727,6728,6729,6730,6717,6718,6719,6720,6721,6722,6723);
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title>UNAVI MP test page</title>
</head>
<body>
<?php
foreach ($st_arr as $val)
{
	$name=res2val(mysql_query("SELECT name FROM stores WHERE id=".$val));
	$no="К".substr($name,3);
	//print $no."<br/>";
	mysql_query("INSERT INTO stores_numbers (number,store_id) VALUES ('$no',$val)") or die(mysql_error());
}
?>
</body>
</html>