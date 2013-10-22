<?php
	$link=mysql_connect("localhost","root","qwerty");
	mysql_select_db("unavi",$link);
	function res2sarr($res)
	{
		if (empty($res)) return false;
		while($a_row=mysql_fetch_row($res))
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
	function res2karr($res)
	{
		// result to multi associated array
		if (empty($res)) return false;
		while ($obj=mysql_fetch_object($res))
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
	$res_stores=mysql_query("SELECT id FROM stores WHERE module_id=34");
	foreach (res2sarr($res_stores) as $val) mysql_query("INSERT INTO stores_n_packs(store_id,package_id) VALUES($val,6)");
	/*$res_pts=mysql_query("SELECT products.id, products.top10_id, top10.name FROM top10, products WHERE products.top10_id=top10.id ORDER BY products.top10_id");
	$pointer=0;
	$t10_id=NULL;
	foreach (res2karr($res_pts) as $val)
	{
		if ($val['top10_id']!=$t10_id)
		{
			$t10_id=$val['top10_id'];
		}
		if (++$pointer>10){
			
		}
	}*/
	mysql_close($link);
?>