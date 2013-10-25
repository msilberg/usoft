<?php
new dbconnect();
class db extends service
{
	// Variables block
	static $limiter=FALSE;
	// Functions block
	protected function get_module_pass()
	{
		$res=mysql_query("SELECT psswd FROM modules WHERE login='".$_SESSION['login']."'");
		return (mysql_num_rows($res)==0)? FALSE : service::res2val($res);
	}
	protected function set_unavi()
	{
		$res_mod=mysql_query("SELECT id FROM modules WHERE login='".$_SESSION['login']."' && psswd='".$_SESSION['psswd']."'");
		if (mysql_num_rows($res_mod)==0) return false;
		$_SESSION['modid']=service::res2val($res_mod);
		$_SESSION['tc']=service::res2val(mysql_query("SELECT tc_id FROM modules WHERE id=".$_SESSION['modid']));
		return true;
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
		if ($_SESSION['lang']=="en")
		{
			return $lbl;
			return false;
		}
		return service::res2val(mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE en='$lbl'"));
	}
	protected function get_level_name()
	{
		return service::res2lev(mysql_query("SELECT no,comment FROM levels WHERE id=".
			(($_SESSION["is_root"])?data::$wlev:$_SESSION['lev'])));
	}
	protected function top10()
	{
		$res=mysql_query("SELECT id,name,beg_date,end_date FROM top10 WHERE store_id=".$_SESSION['store']);
		if (mysql_num_rows($res)==0) return false;
		return service::res2arr($res);
	}
	protected function lbl($id)
	{
		if (stristr($id,",") && gettype($id)=="string")
			return service::res2sarr(mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE id IN ($id) && type='lbl'"));
		else return service::res2raw(mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE id=$id && type='lbl'"));
	}
	protected function lbl_arr($type)
	{
		return service::res2sarr(mysql_query("SELECT ".$_SESSION['lang']." FROM labels WHERE type='$type'"));
	}
	protected function set_categories()
	{
		data::$carr=service::res2karr(mysql_query("SELECT id,name_".((isset($_SESSION['lang']))?$_SESSION['lang']:data::$dlang).
			" FROM catalogue WHERE build=2 && parent IS NULL ORDER BY ind"));
	}
	protected function get_cat_name()
	{
		if (!isset($_SESSION['cat'])) return false;
		return service::res2val(mysql_query("SELECT name_".$_SESSION['lang']." FROM catalogue WHERE id=".$_SESSION['cat']));
	}
	protected function get_scat()
	{
		return service::res2karr(mysql_query(($_SESSION['cat']==0)?
			"SELECT id,name_".$_SESSION['lang']." FROM catalogue WHERE build=2 && parent IS NOT NULL ORDER BY name_".$_SESSION['lang']:
			"SELECT id,name_".$_SESSION['lang']." FROM catalogue WHERE build=2 && parent=".$_SESSION['cat']." ORDER BY name_".$_SESSION['lang']));
	}
	protected function get_cc_stores($inv)
	{
		// get category stores which are clients
		/*
		 * --== Required Feature ==--
		 * 3 - Category
		 */
		return service::lang_separate(service::res2arr(
			mysql_query("SELECT stores.id,stores.name FROM stores,store_cat,stores_n_packs,package,pack_n_feat,feature
				WHERE store_cat.cat_id=".((isset($inv))?$inv:$_SESSION['scat'])." && store_cat.store_id=stores.id && stores.tc_id=".$_SESSION['tc']." && 
				stores.id=stores_n_packs.store_id && stores_n_packs.package_id=package.id && package.id=pack_n_feat.package_id && 
				pack_n_feat.feature_id=feature.id && feature.id=3".((self::$limiter)?" LIMIT 0,".data::$max_spm:NULL))));
	}
	protected function get_cf_stores($inv)
	{
		// get category free stores
		return service::lang_separate(service::res2arr(
			mysql_query("SELECT stores.id,stores.name 
				FROM stores
				INNER JOIN store_cat 
				ON store_cat.store_id=stores.id 
				WHERE store_cat.cat_id=".((isset($inv))?$inv:$_SESSION['scat'])." && stores.tc_id=".$_SESSION['tc']." 
				GROUP BY stores.id".((self::$limiter)?" LIMIT 0,".data::$max_spm:NULL)
			)));
	}
	protected function get_bann_stores()
	{
		/*
		 * --== Getting banners stores ==--
		 * 4 - Banner
		 */
		return service::mcompress(service::res2sarr(mysql_query("SELECT stores.id FROM stores,stores_n_packs,package,pack_n_feat,feature 
			WHERE stores.tc_id=".$_SESSION['tc']." && stores.id=stores_n_packs.store_id && stores_n_packs.package_id=package.id && 
			package.id=pack_n_feat.package_id && pack_n_feat.feature_id=feature.id && feature.id=4")));
	}
	protected function get_bankers()
    {
		return service::res2karr(mysql_query("SELECT stores.id,stores_descr.descr_df,map_object.x,map_object.y
			FROM stores,store_cat,map_object,stores_n_descr,stores_descr 
			WHERE stores.tc_id=".$_SESSION['tc']." && stores.id=store_cat.store_id && store_cat.cat_id=".data::$spec_cat['bankers']." && 
			stores.id=map_object.store_id && stores.id=stores_n_descr.store_id && stores_n_descr.descr_id=stores_descr.id"));
    }
	protected function get_lev_stores()
	{
		return service::res2sarr(mysql_query("SELECT stores.id FROM stores,levels,lev_n_stores WHERE 
			lev_n_stores.level_id=".$_SESSION['lev']." && lev_n_stores.store_id=stores.id && 
			lev_n_stores.level_id=levels.id && levels.tc_id=".$_SESSION['tc']));
	}
	protected function get_store_cat($id)
	{
		$res=mysql_query("SELECT cat_id FROM store_cat WHERE store_id=".$id);
		if (mysql_num_rows($res)==0) return false;
		foreach (service::res2sarr($res) as $val) $arr_crit[$val]=in_array($val,array_values(data::$spec_cat));
		foreach ($arr_crit as $key=>$val)
			$arr_cat[]=($val)? $key : service::res2val(mysql_query("SELECT parent FROM catalogue WHERE id=".$key));
		$arr_cat=service::turn_arr_type($arr_cat,"integer");
		// here the function can be modified to output multiple categories of the first level
		// return service::turn_arr_type($arr_cat,"integer");
		return current($arr_cat);
	}
	protected function get_store_cnsc($inv)
	{
		$res=mysql_query("SELECT store_cat.cat_id,catalogue.parent FROM store_cat,catalogue 
			WHERE store_cat.store_id=".((isset($inv))?$inv:$_SESSION['store'])." && store_cat.cat_id=catalogue.id && catalogue.parent IS NOT NULL");
		if (mysql_num_rows($res)==0) return false;
		$arr=service::res2karr($res);
		return current($arr);		
	}
	protected function get_store()
	{
		$arr=service::res2skarr(mysql_query("SELECT name,phone,website FROM stores WHERE stores.id=".$_SESSION['store']));
		if (data::lang()!=0 && db::get_store_en($_SESSION['store'])!=NULL) $arr['name']=db::get_store_en($_SESSION['store']);
		$res_cp=mysql_query("SELECT contact_person.name_".((data::lang()==0)?"df":"en")." FROM contact_person,stores_n_cp
			WHERE stores_n_cp.store_id=".$_SESSION['store']." && stores_n_cp.cp_id=contact_person.id");
		$arr['cp']=(mysql_num_rows($res_cp)>0)? current(service::res2sarr($res_cp)) : NULL;
		$res_descr=mysql_query("SELECT stores_descr.descr_".((data::lang()==0)?"df":"en")." FROM stores_n_descr,stores_descr
			WHERE stores_n_descr.store_id=".$_SESSION['store']." && stores_n_descr.descr_id=stores_descr.id");
		$arr['descr']=(mysql_num_rows($res_descr)>0)? current(service::res2sarr($res_descr)) : NULL;
		return service::fo_tags($arr);
	}
	protected function get_store_name($inv)
	{
		$id=(isset($inv))? $inv : $_SESSION['store'];
		$val=service::res2val(mysql_query("SELECT name FROM stores WHERE id=".$id));
		return (data::lang()==0)? $val : service::parse_name_en($val,$id);
	}
	protected function get_store_new_name($inv)
	{
		$res=mysql_query("SELECT stores_numbers.store_id,stores_numbers.number FROM stores,store_cat,stores_numbers 
			WHERE store_cat.cat_id=".$_SESSION['scat']." && store_cat.store_id=stores.id && stores.tc_id=".$_SESSION['tc'].
			" && stores.id=stores_numbers.store_id && stores_numbers.type=".(isset($inv)?$inv:1));
		if (mysql_num_rows($res)==0) return false;
		return service::res2kvarr($res);
	}
	protected function get_scat_name()
	{
		return service::res2val(mysql_query("SELECT name_".$_SESSION['lang']." FROM catalogue WHERE build=2 && parent IS NOT NULL && id=".$_SESSION['scat']));
	}
	protected function get_bconfig($file)
	{
		$xml=simplexml_load_file(data::$raddr."config/".$_SESSION['tc']."/base/".$file);
		return $xml->children();
	}
	protected function get_config($file)
	{
		$xml=simplexml_load_file(data::$raddr."config/".$_SESSION['tc']."/".$_SESSION['mode']."/".$file);
		return $xml->children();
	}
	protected function get_comm_config($file)
	{
		$xml=simplexml_load_file(data::$raddr."config/common/".$file);
		return $xml->children();
	}
	protected function store_extra_config($id,$folder)
	{
		$file=data::$raddr."stores/".$_SESSION['tc']."/".((isset($id))?$id:$_SESSION['store'])."/$folder/".(($folder=="videos")?$_SESSION['mode']."/":NULL)."params.xml";
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
		$ig_date=service::res2val(mysql_query("SELECT prop_value FROM property WHERE name='showcase-ignore-date'"));
		return service::res2val(mysql_query("SELECT stores.showcase_id FROM stores,image 
			WHERE stores.id=".$_SESSION['store']." && stores.showcase_id=image.id && image.insertion_date IS NOT NULL && 
			image.insertion_date>".$ig_date));
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
		$arr=service::res2sarr(mysql_query("SELECT stores.id FROM stores,stores_n_packs,pack_n_feat,feature 
			WHERE stores.tc_id=".$_SESSION['tc']." && stores.id=stores_n_packs.store_id && stores_n_packs.package_id=pack_n_feat.package_id && 
			pack_n_feat.feature_id=feature.id && feature.id=".$feat));
		return (is_array($arr))? array_values(array_unique($arr)) : NULL;
	}
	protected function get_store_coords($inv)
	{
		$res=mysql_query("SELECT x,y FROM map_object WHERE store_id=".((isset($inv))?$inv:$_SESSION['store']));
		return (mysql_num_rows($res)==0)? array(array("x"=>NULL)) : service::res2karr($res);
	}
	protected function get_stores_by_cat($inv)
	{
		return service::res2sarr(mysql_query("SELECT stores.id FROM stores,store_cat
			WHERE store_cat.cat_id=".((isset($inv))?$inv:$_SESSION['scat'])." && store_cat.store_id=stores.id && stores.tc_id=".$_SESSION['tc']));	
	}
	protected function make_search()
	{
		$ch=curl_init(data::$raddr2."geo?SERVICE=UniqoomAPI&REQUEST=search&TCID=35&TEXT=".$_SESSION['sch_txt']);
		$opts=array(CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>array('Content-type: application/json'));
		curl_setopt_array($ch,$opts);
		$res=curl_exec($ch);
		$arr_res=json_decode($res);
		curl_close($ch);
		return $arr_res;
	}
	protected function get_new_number($inv)
	{
		$res=mysql_query("SELECT number FROM stores_numbers WHERE type=".data::$nn_type." && store_id=".((isset($inv))?$inv:$_SESSION['store']));
		if (mysql_num_rows($res)==0) return false;
		return service::res2val($res);
	}
	protected function get_price_lists()
	{
		$res=mysql_query("SELECT id,user_data FROM uploaded_file WHERE store_id=".$_SESSION['store']." && type=1 ORDER BY user_data");
		if (mysql_num_rows($res)==0) return false;
		return service::res2karr($res);
	}
	protected function get_stores_with_content()
	{
		$res_tt=mysql_query("SELECT stores.id,stores.name FROM stores,top10,store_cat,catalogue 
			WHERE stores.tc_id=".$_SESSION['tc']." && top10.store_id=stores.id && stores.id=store_cat.store_id 
			&& store_cat.cat_id=catalogue.id && catalogue.id=".$_SESSION['scat']);
		$res_img=mysql_query("SELECT stores.id,stores.name FROM stores,store_cat,catalogue 
			WHERE (stores.logo_id IS NOT NULL OR stores.showcase_id IS NOT NULL) && stores.tc_id=".$_SESSION['tc']." 
			&& stores.id=store_cat.store_id && store_cat.cat_id=catalogue.id && catalogue.id=".$_SESSION['scat']);
		$cat_arr=service::res2karr(mysql_query("SELECT stores.id,stores.name FROM stores,store_cat,catalogue
			WHERE stores.tc_id=".$_SESSION['tc']." && stores.id=store_cat.store_id && store_cat.cat_id=catalogue.id && catalogue.id=".$_SESSION['scat']));
		$video_arr=service::res2karr(mysql_query("SELECT stores.id,stores.name FROM stores,stores_n_packs,package,pack_n_feat,feature 
			WHERE stores.tc_id=".$_SESSION['tc']." && stores.id=stores_n_packs.store_id && stores_n_packs.package_id=package.id && 
			package.id=pack_n_feat.package_id && pack_n_feat.feature_id=feature.id && feature.id IN (9,10)"));
		return ((mysql_num_rows($res_tt)==0)?array():service::res2karr($res_tt))+
			((mysql_num_rows($res_img)==0)?array():service::res2karr($res_img))+
			array_intersect_assoc(((is_array($cat_arr))?$cat_arr:array()),((is_array($video_arr))?$video_arr:array()));
	}
	protected function get_standby_stores()
	{
		$feat=19; // stand-by-promotion
		return service::res2karr(mysql_query("SELECT stores.id,map_object.x,map_object.y FROM stores,stores_n_packs,pack_n_feat,feature,map_object 
			WHERE stores.tc_id=".$_SESSION['tc']." && stores.id=map_object.store_id && stores.id=stores_n_packs.store_id && 
			stores_n_packs.package_id=pack_n_feat.package_id && pack_n_feat.feature_id=feature.id && feature.id=$feat LIMIT 0,".data::$standby_lim));
	}
	protected function get_storespcat_arr($arr)
	{
		// get ID's of parent categories for a set of stores
		if (!is_array($arr)) return false;
		return service::res2arr(mysql_query("SELECT stores.id,catalogue.parent FROM stores,store_cat,catalogue
			WHERE stores.tc_id=".$_SESSION['tc']." && stores.id IN (".implode(",",$arr).
			") && stores.id=store_cat.store_id && catalogue.parent IS NOT NULL && store_cat.cat_id=catalogue.id ORDER BY stores.id"));
	}
	protected function get_si()
	{ 
		return service::make_unique_marr(service::res2karr(mysql_query("SELECT service_icons.name_".$_SESSION['lang'].",service_icons.id 
			FROM map_si,service_icons WHERE map_si.tc_id=".$_SESSION['tc']." && map_si.service_id=service_icons.id"),"name_".$_SESSION['lang']),"id",array("name_".$_SESSION['lang']));
	}
	protected function get_ssi($inv)
	{
		// get coords for the chosen service of the mall
		return service::res2karr(mysql_query("SELECT path_ox,path_oy FROM map_si WHERE service_id=".((isset($inv))?$inv:$_SESSION['si'])));
	}
	protected function get_si_name($inv)
	{
		return service::res2raw(mysql_query("SELECT name_".$_SESSION['lang']." FROM service_icons WHERE id=".((isset($inv))?$inv:$_SESSION['si'])));
	}
	protected function history_insert_query($device,$id)
	{
		mysql_query("INSERT INTO history(device_type,store_id) VALUES('$device','$id')");
	}
// ********************
}
?>