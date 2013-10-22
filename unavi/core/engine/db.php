<?php
new dbconnect();
class db extends service
{
	// Functions block
	protected function get_module_pass()
	{
		$res=mysql_query("SELECT psswd FROM modules WHERE login='".$_SESSION['login']."'");
		return (mysql_num_rows($res)==0)? FALSE : service::res2val($res);
	}
	protected function set_module()
	{
		$_SESSION['modid']=service::res2val(mysql_query("SELECT id FROM modules WHERE 
			login='".$_SESSION['login']."' && psswd='".$_SESSION['psswd']."'"));
	}
	protected function set_tc()
	{
		$_SESSION['tc']=service::res2val(mysql_query("SELECT tc_id FROM modules WHERE id=".$_SESSION['modid']));
	}
	protected function tc_levels()
	{
		foreach (service::res2sarr(mysql_query("SELECT id FROM levels 
			WHERE tc_id=".$_SESSION['tc']." && visible=1 ORDER BY ind")) as $val) data::$larr[]=intval($val);
	}
	protected function get_tc_name()
	{
		return service::res2val(mysql_query("SELECT ".((data::lang()==0)?"name":"name_en")." FROM tc WHERE id=".$_SESSION['tc']));
	}
	protected function lt($lbl)
	{
		if (data::lang()==0)
		{
			return $lbl;
			return false;
		}
		$res=mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE ".data::$dlang."='$lbl'");
		return (!isset($res) || mysql_num_rows($res)==0)? $lbl : service::res2val($res);
	}
	protected function get_lfen($lbl)
	{
		// get label from english word
		if ($_SESSION['lang']=="en") return $lbl;
		return service::res2val(mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE en='$lbl'"));
	}
	protected function get_level_name()
	{
		return service::res2lev(mysql_query("SELECT no,comment FROM levels WHERE id=".
			(($_SESSION["is_root"])?data::$wlev:$_SESSION['lev'])));
	}
	protected function top10()
	{
		return service::res2arr(mysql_query("SELECT id,name,beg_date,end_date FROM top10 WHERE 
			store_id=".$_SESSION['store']));
	}
	protected function lbl($id)
	{
		return service::res2val(mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE id=$id && type='lbl'"));
	}
	protected function lbl_arr($type)
	{
		return service::res2sarr(mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE type='$type'"));
	}
	protected function set_categories()
	{
		$lang=(isset($_SESSION['lang']))? $_SESSION['lang'] : data::$dlang;
		data::$carr=service::res2karr(mysql_query("SELECT id,name_$lang FROM catalogue WHERE build=1"));
		array_unshift(data::$carr,array("id"=>"0","name_".$lang=>self::lbl(3)));
	}
	protected function get_cat_name()
	{
		if (!isset($_SESSION['cat'])) return false;
		return service::res2val(mysql_query("SELECT name_".$_SESSION['lang']." FROM catalogue WHERE id=".$_SESSION['cat']));
	}
	protected function get_cc_stores()
	{
		// get category stores which are clients
		/*
		 * --== Required Feature ==--
		 * 3 - Category
		 */
		if (!isset($_SESSION['cat'])) return false;
		return service::lang_separate(service::ucompress(service::res2arr(mysql_query(($_SESSION['cat']==0)?
			"SELECT stores.id,stores.name FROM stores,levels,lev_n_stores,stores_n_packs,package,pack_n_feat,feature
			WHERE stores.id=lev_n_stores.store_id && lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']." && 
			stores.id=stores_n_packs.store_id && stores_n_packs.package_id=package.id && 
			package.id=pack_n_feat.package_id && pack_n_feat.feature_id=feature.id && feature.id=3":
			"SELECT stores.id,stores.name FROM stores,levels,lev_n_stores,store_cat,stores_n_packs,package,pack_n_feat,feature
			WHERE stores.id=lev_n_stores.store_id && lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']." && 
			stores.id=store_cat.store_id && store_cat.cat_id=".$_SESSION['cat']." && stores.id=stores_n_packs.store_id && 
			stores_n_packs.package_id=package.id && package.id=pack_n_feat.package_id && pack_n_feat.feature_id=feature.id && 
			feature.id=3")),0));
	}
	protected function get_cf_stores()
	{
		// get category free stores
		if (!isset($_SESSION['cat'])) return false;
		return service::lang_separate(service::res2arr(mysql_query(($_SESSION['cat']==0)?
			"SELECT stores.id,stores.name FROM stores,levels,lev_n_stores 
			WHERE stores.id=lev_n_stores.store_id && lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']:
			"SELECT stores.id,stores.name FROM stores,levels,lev_n_stores,store_cat 
			WHERE stores.id=lev_n_stores.store_id && lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']." && 
			stores.id=store_cat.store_id && store_cat.cat_id=".$_SESSION['cat'])));
	}
	protected function get_bann_stores()
	{
		/*
		 * --== Getting banners stores ==--
		 * 4 - Banner
		 */
		return service::mcompress(service::res2sarr(mysql_query("SELECT stores.id 
			FROM stores,levels,lev_n_stores,stores_n_packs,package,pack_n_feat,feature
			WHERE stores.id=lev_n_stores.store_id && lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']." && 
			stores.id=stores_n_packs.store_id && stores_n_packs.package_id=package.id && package.id=pack_n_feat.package_id && 
			pack_n_feat.feature_id=feature.id && feature.id=4")));
	}
	protected function cat_stores($switcher)
	{
		return array_values(array_unique(service::res2sarr(mysql_query("SELECT stores.id FROM stores,levels,lev_n_stores 
			".(($_SESSION['cat']==0)?"WHERE ":
			",store_cat WHERE store_cat.cat_id=".$_SESSION['cat']." && store_cat.store_id=stores.id && ").
			(($switcher && !$_SESSION['is_root'])?"lev_n_stores.level_id=".$_SESSION['lev']." && ":NULL).
			"lev_n_stores.store_id=stores.id && lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']))));
	}
	protected function get_lev_stores()
	{
		return service::res2sarr(mysql_query("SELECT stores.id FROM stores,levels,lev_n_stores WHERE 
			lev_n_stores.level_id=".$_SESSION['lev']." && lev_n_stores.store_id=stores.id && 
			lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']));
	}
	protected function get_store_cat($id)
	{
		return service::res2sarr(mysql_query("SELECT cat_id FROM store_cat WHERE store_id=".$id));
	}
	protected function get_store()
	{
		$arr=service::res2skarr(mysql_query("SELECT name,phone,website FROM stores WHERE stores.id=".$_SESSION['store']));
		if (data::lang()!=0 && db::get_store_en($_SESSION['store'])!=NULL) $arr['name']=db::get_store_en($_SESSION['store']);
		$res_descr=mysql_query("SELECT stores_descr.descr_".((data::lang()==0)?"df":"en")." FROM stores_n_descr,stores_descr
			WHERE stores_n_descr.store_id=".$_SESSION['store']." && stores_n_descr.descr_id=stores_descr.id");
		$arr['descr']=(mysql_num_rows($res_descr)>0)? ", ".service::res2val($res_descr) : NULL;
		return service::fo_tags($arr);
	}
	protected function get_store_name($inv)
	{
		$id=(isset($inv))? $inv : $_SESSION['store'];
		$val=service::res2val(mysql_query("SELECT name FROM stores WHERE id=".$id));
		return (data::lang()==0)? $val : service::parse_name_en($val,$id);
	}
	protected function get_config($file)
	{
		$xml=simplexml_load_file(data::$raddr."config/".$_SESSION['tc']."/".$file);
		return $xml->children();
	}
	protected function get_comm_config($file)
	{
		$xml=simplexml_load_file(data::$raddr."config/common/".$file);
		return $xml->children();
	}
	protected function store_extra_config($id,$folder)
	{
		$file=data::$raddr."stores/".$_SESSION['modid']."/".((isset($id))?$id:$_SESSION['store'])."/$folder/params.xml";
		if (!file_exists($file)) return false;
		$xml=simplexml_load_file($file);
		foreach ($xml->children() as $val) foreach ($val->attributes() as $key=>$fval) $arr[(string)$key]=intval($fval);
		return $arr;
	}
	protected function lev_of_store($inv)
	{
		return service::res2sarr(mysql_query("SELECT levels.id FROM levels,lev_n_stores WHERE 
			levels.visible=1 && levels.id=lev_n_stores.level_id && lev_n_stores.store_id=".((isset($inv))?$inv:$_SESSION['store']).
			" ORDER BY levels.ind"));
	}
	protected function get_store_levs()
	{
		return service::res2lev(mysql_query("SELECT levels.no,levels.comment FROM levels,lev_n_stores WHERE 
			levels.id=lev_n_stores.level_id && lev_n_stores.store_id=".$_SESSION['store']." ORDER BY levels.ind"));
	}
	protected function get_rstrip()
	{
		foreach (service::res2sarr(mysql_query("SELECT text_".$_SESSION['lang']." FROM runstrip WHERE tc_id=".$_SESSION['tc'])) as $val)
			$str.=$val."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		return $str;
	}
	protected function get_work_time()
	{
		$arr=service::res2arr(mysql_query("SELECT day,time_beg,time_end,break_beg,break_end FROM work_time WHERE
			store_id=".$_SESSION['store']));
		if (service::check_work_time($arr)) return $arr;
		else return false;
	}
	protected function get_store_en($id)
	{
		return service::res2val(mysql_query("SELECT name FROM stores_en WHERE store_id=".$id));
	}
	protected function check_gifts()
	{
		$arr=service::res2karr(mysql_query("SELECT id,deleted FROM gifts WHERE store_id=".$_SESSION['store']));
		if (!is_array($arr)) return false;
		foreach ($arr as $val) if (!array_key_exists("deleted",$val)) $num++;
		return $num!=NULL;
	}
	protected function get_store_image()
	{
		return service::res2val(mysql_query("SELECT image FROM stores WHERE id=".$_SESSION['store']));
	}
	protected function get_logo_id($id)
	{
		if (!isset($_SESSION['store']) && !isset($id)) return false;
		return service::res2val(mysql_query("SELECT logo_id FROM stores WHERE id=".((isset($id))?$id:$_SESSION['store'])));
	}
	protected function get_showcase_id()
	{
		return service::res2val(mysql_query("SELECT showcase_id FROM stores WHERE id=".$_SESSION['store']));
	}
	protected function get_store_features($id)
	{
		$arr=service::res2sarr(mysql_query("SELECT pack_n_feat.feature_id FROM stores,stores_n_packs,package,pack_n_feat 
			WHERE stores.id=".((isset($id))?$id:$_SESSION['store'])." && stores.id=stores_n_packs.store_id && 
			stores_n_packs.package_id=package.id && package.id=pack_n_feat.package_id"));
		return (is_array($arr))? array_values(array_unique($arr)) : array();		
	}
	protected function get_stores_by_feature($feat)
	{
		$arr=service::res2sarr(mysql_query("SELECT stores.id FROM stores,levels,lev_n_stores,stores_n_packs,pack_n_feat,feature
			WHERE stores.id=lev_n_stores.store_id && lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']." && 
			stores.id=stores_n_packs.store_id && stores_n_packs.package_id=pack_n_feat.package_id && pack_n_feat.feature_id=".$feat." GROUP BY stores.id"));
		return (is_array($arr))? array_values(array_unique($arr)) : NULL;
	}
	protected function history_insert_query($device,$id)
	{
		mysql_query("INSERT INTO history(device_type,store_id) VALUES('$device','$id')");
	}
// ********************
}
?>