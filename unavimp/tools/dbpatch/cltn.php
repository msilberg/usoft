<?php
	$link=mysql_connect("localhost","root","qwerty");
	mysql_select_db("unavi",$link) or die("can't connect");
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
	function res2sarr($res)
	{
		if (empty($res)) return false;
		while($a_row=mysql_fetch_row($res))
			foreach ($a_row as $val) $arr[]=is_numeric($val)? (double)$val : $val;
		return $arr;	
	}
	function res2val($res)
	{
		if (empty($res) || mysql_num_rows($res)==0) return false;
		while ($a_row=mysql_fetch_row($res))
		{
			return $a_row[0];
			break;
		}
	}
	function generatePassword() {
		$length=7;
		$strength=0;
		$vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '23456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
	 
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
		return $password;
	}
	function extract_names($names)
	{
		$pointer=0;
		$arr_names=explode(" ", $names);
		foreach ($arr_names as $val)
		{
			if (empty($val)) continue;
			if (++$pointer<3) $arr[]=$val;
			elseif ($pointer>=3) $arr[2].=$val.(($val==end($arr_names))?NULL:" ");
		}
		if (count($arr)<3) for ($i=0; $i < (3-count($arr)); $i++) $arr[]=" ";
		return $arr;
	}
	/*$res_tn=mysql_query("SELECT id,name FROM trade_network WHERE client_id=0");
	foreach (res2karr($res_tn) as $val)
	{
		$arrn=extract_names($val['name']);
		$res_find=mysql_query("SELECT id FROM clients WHERE contact_surname='".$arrn[0]."' && contact_name='".$arrn[1]."' && contact_middle_name='".$arrn[2]."'");
		if (mysql_num_rows($res_find)==0)
		{
			$res_ins=FALSE;
			while (!$res_ins)
				$res_ins=mysql_query("INSERT INTO clients(uname,psswd,contact_name,contact_surname,contact_middle_name,contact_position)
					VALUES ('admin".rand(0,9999)."','".generatePassword()."','".$arrn[1]."','".$arrn[0]."','".$arrn[2]."','trade network admin')");
			mysql_query("UPDATE trade_network SET client_id=".mysql_insert_id()." WHERE id=".$val['id']);
		}
		else mysql_query("UPDATE trade_network SET client_id=".res2val($res_find)." WHERE id=".$val['id']);
	}*/
	$res_tn=mysql_query("SELECT id,name FROM trade_network");
	$nf=array();
	foreach (res2karr($res_tn) as $val)
	{
		$arrn=extract_names($val['name']);
		$res_find=mysql_query("SELECT id FROM clients WHERE contact_surname='".$arrn[0]."' && contact_name='".$arrn[1]."' && contact_middle_name='".$arrn[2]."'");
		if (mysql_num_rows($res_find)==0) $nf[]=$val['id'];
	}
	print_r($nf);
	mysql_close($link);
	//print_r(array("not found"=>$nf,"found"=>$yf));
?>