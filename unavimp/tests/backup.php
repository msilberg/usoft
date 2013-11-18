<?php
function eext_st(&$arr_res,$sw)
	{
		// stores' equal extraction from different categories of the 2nd level
		$max=0;
		$i=0;
		foreach (self::ver_slice(db::get_scat(),"id") as $val)
		{
			$arr_raw=($sw)? db::get_cc_stores($val) : db::get_cf_stores($val);
			if (is_array($arr_raw))
			{
				if (count($arr_raw)>$max) $max=count($arr_raw);
				$arr_sc[]=array_keys($arr_raw);
			}
		}
		if (!is_array($arr_sc)) return $arr_res; 
		while (count($arr_res)<data::$max_spm && $i<$max)
		{
			foreach ($arr_sc as $val)
				if (count($arr_res) == data::$max_spm) break;
				elseif (isset($val[$i]) && !in_array($val[$i],$arr_res)) $arr_res[]=$val[$i];			
			$i++;
		}
	}
	function promoted_stores()
	{
		$arr_spm=array();
		self::eext_st($arr_spm,TRUE);
		if (count($arr_spm)<data::$max_spm) self::eext_st($arr_spm,FALSE);
		foreach ($arr_spm as $val) $arr_coords[]=db::get_store_coords($val);
		return array_combine($arr_spm,$arr_coords);
	}
?>