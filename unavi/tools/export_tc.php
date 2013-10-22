<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php
	$link=mysql_connect("localhost","root","qwerty");
	mysql_select_db("unavi",$link);
?>
<html dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<title>Clean TC</title>
</head>
<body>
<?php
	$arr_fields=array(
		"stores"=>array("id","name","website","phone","client_id","level_id","module_id","logo_id","showcase_id","trade_network_id","comment"),
		"lev_n_stores"=>array("id","level_id","store_id"),
		"store_cat"=>array("id","cat_id","store_id"),
		"stores_en"=>array("id","name","store_id"),
		"stores_n_packs"=>array("id","store_id","package_id")
	);
	function build_arr($table)
	{
		global $arr_id;
		$i=0;
		foreach($arr_id as $val)
		{
			$res=mysql_query("SELECT * FROM $table WHERE ".(($table=="stores")?"id":"store_id")."=".$val);
			while ($a_row=mysql_fetch_row($res))
			{
				foreach ($a_row as $val) $arr[$i][]=$val;
				$i++;
			}
		}
		return $arr;
	}
	function build_id_arr($table)
	{
		global $arr_id;
		$i=0;
		foreach($arr_id as $val)
		{
			$res=mysql_query("SELECT id FROM $table WHERE store_id=".$val);
			while ($a_row=mysql_fetch_object($res)) $arr[]=$a_row->id;
		}
		return $arr;
	}
	
	$res=mysql_query("SELECT id FROM stores WHERE module_id=6");
	while($a_row=mysql_fetch_row($res)) foreach($a_row as $val) $arr_id[]=$val;
	
	$arr_val['stores']=build_arr("stores");
	$arr_val['lev_n_stores']=build_arr("lev_n_stores");
	$arr_val['store_cat']=build_arr("store_cat");
	$arr_val['stores_en']=build_arr("stores_en");
	$arr_val['stores_n_packs']=build_arr("stores_n_packs");
	
	$arr_tid['stores']=$arr_id;
	$arr_tid['lev_n_stores']=build_id_arr("lev_n_stores");
	$arr_tid['store_cat']=build_id_arr("store_cat");
	$arr_tid['stores_en']=build_id_arr("stores_en");
	$arr_tid['stores_n_packs']=build_id_arr("stores_n_packs");
	
	/*foreach ($arr_fields as $key => $val)
	{
		print "INSERT INTO ".$key."(";
		foreach ($val as $fval) print "`".$fval."`".(($fval==end($val))?NULL:",");
		print ") VALUES<br/>";
		$pointer=NULL;
		foreach ($arr_val[$key] as $sval)
		{
			print "(";
			$pointer2=NULL;
			foreach ($sval as $thval)
			{
				$crit=is_numeric($thval);
				$crit2=$thval==NULL;
				print (($crit || $crit2)?NULL:"'").(($crit2)?"NULL":$thval).(($crit || $crit2)?NULL:"'").((++$pointer2==count($sval))?NULL:",");
			}
			print ")".((++$pointer==count($arr_val[$key]))?";":",")."<br/>";
		}
		print "<br/>";
	}*/
	
	foreach ($arr_tid as $key=>$val)
	{
		foreach ($val as $fval) print "DELETE FROM $key WHERE ".(($key=="stores")?"id":"store_id")."=$fval;<br/>";
		print "-- *******************************<br/>";
	}
?>
</body>
</html>