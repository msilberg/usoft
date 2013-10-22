<?php
	$link=mysql_connect("localhost","root","qwerty");
	mysql_select_db("unavi",$link) or die("Can't connect to DB'");
	function res2sarr($res_nn)
	{
		if (empty($res_nn)) return false;
		while($a_row=mysql_fetch_row($res_nn))
			foreach ($a_row as $val) $arr[]=is_numeric($val)? (double)$val : $val;
		return $arr;
	}
	function rvp($raw)
	{
		// raw variable processing
		if (is_numeric($raw)) return (double)$raw;
		elseif (strtolower($raw)=="true") return true;
		elseif (strtolower($raw)=="false") return false;
		else return $raw;
	}
	function res2karr($res_nn)
	{
		// result to multi associated array
		if (empty($res_nn)) return false;
		while ($obj=mysql_fetch_object($res_nn))
		{
			$tarr=array();
			while(current($obj))
			{
				$tarr=array_merge($tarr,array(key($obj)=>rvp(current($obj))));
				next($obj);
			}
			$arr[]=$tarr;
		}
		return $arr;
	}
	function res2arr($res_nn)
	{
		if (empty($res_nn)) return false;
		$i=0;
		while ($a_row=mysql_fetch_row($res_nn)) $arr[$i++]=$a_row;
		return $arr;
	}
	function res2val($res_nn)
	{
		if (empty($res_nn) || mysql_num_rows($res_nn)==0) return false;
		while ($a_row=mysql_fetch_row($res_nn))
		{
			return $a_row[0];
			break;
		}
	}
	$raw_url=$_GET['stores'];
	foreach (explode(',',((substr($raw_url,-1)==",")?substr($raw_url,0,-1):$raw_url)) as $val)
	{
		$res_on=NULL;
		$res_nn=mysql_query("SELECT store_id,number FROM stores_numbers WHERE type=1 && number LIKE '%$val%'");
		if (mysql_num_rows($res_nn)==0)
		{
			$res_on=mysql_query("SELECT id,name FROM stores WHERE module_id=34 && name LIKE '%$val%'");
			if (mysql_num_rows($res_on)==0) continue;
			else foreach (res2karr($res_on) as $sval) $arr_tt[]=array("store_id"=>$sval['id'],"number"=>NULL,"oldname"=>$sval['name']);
		}
		else
		{
			$i=0;
			$arr_tt=array();
			$arr_nn=res2karr($res_nn);
			foreach ($arr_nn as $sval) $arr_on[]=array("oldname"=>res2val(mysql_query("SELECT name FROM stores WHERE id=".$sval['store_id'])));
			foreach ($arr_nn as $thval)
			{
				$keys=array_keys($thval);
				$values=array_values($thval);
				$keys=array_merge($keys,array_keys($arr_on[$i]));
				$values=array_merge($values,array_values($arr_on[$i++]));
				$arr_tt[]=array_combine($keys, $values);
			}
		}
		$sch_res[$val]=$arr_tt;
		$arr_tt=array();
	}
	if (!is_array($sch_res))
	{
		print "ничего не найдено";
		return FALSE;
	}
	print "<table cellspacing=\"0\" cellpadding=\"3\"><tr>
		<td class=\"header\" width=\"10%\"><div class=\"mark-all\">все</div></td>
		<td class=\"header\" width=\"45%\">новый номер</td>
		<td class=\"header\" width=\"45%\">старый номер</td></tr>";
	foreach ($sch_res as $key=>$val)
	{
		print "<tr><td colspan=\"3\" class=\"req-store\">искомый магазин: $key</td></tr><tr>";
		foreach ($val as $fval)
			print "<td align=\"center\" width=\"10%\"><input type=\"checkbox\" class=\"st-ch\" value=\"".$fval['store_id']."\" /></td>
				<td width=\"45%\">".$fval['number']."</td>
				<td width=\"45%\">".$fval['oldname']."</td></tr><tr>";
		print "</tr>";
	}
	print "</table>";
?>