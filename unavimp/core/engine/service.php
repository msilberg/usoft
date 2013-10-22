<?php
class service extends data
{
	// --== Variables ==--
	static $stores_arr;
	static $showflag=FALSE;
	static $mte_lev=FALSE; // multitext element of level
	static $ml_store=FALSE; // store which is being presented on more than one level
	static $prev_queue = array(); // takes previous screensaver queue of stores' ID's
		
	/*
	 * --== Internal Service Functions ==--
	 */
	private function make_scrs_queue($arr)
	{
		foreach ($arr as $val) $length[]=count($val);
		for ($j=0;$j<max($length);$j++) for ($i=0;$i<count($arr);$i++) if (isset($arr[$i][$j])) $queue[]=$arr[$i][$j];
		$queue=array_values(array_unique($queue));
		if (isset($_SESSION['scrslast']) && in_array($_SESSION['scrslast'],$queue))
		{
			$ind=array_search($_SESSION['scrslast'],$queue);
			$queue_beg=array_slice($queue,0,$ind);
			$queue_end=array_slice($queue,$ind+1);
			$queue=array_merge($queue_end,$queue_beg,array($_SESSION['scrslast']));
		}
		return $queue;
	}
	private function get_scrs_comm_no($store)
	{
		$num=self::files_num("stores/".$_SESSION['tc']."/$store/videos/".$_SESSION['mode']."/","flv");
		if ($num>1)
		{
			$last=(isset(self::$prev_queue[$store]['no']))? 
				self::$prev_queue[$store]['no'] :
				((isset(self::$prev_queue[$store]['last_comm_no']))?self::$prev_queue[$store]['last_comm_no']:1);
			$no=(($last+1)>$num)? 1 : $last+1;
			return $no;
		}
		return $num;
	}
	protected function make_unique_marr($arr,$ci,$ri)
	{
		/* Make unique multiarray by determined criteria
		 * ci (criteria index) - index name or number on which the whole array has to be sorted by uniqueness criteria
		 * ri (rest indexes) - has to be always of array type
		 * */
		if (!is_array($arr)) return false;
		$ci_arr=self::ver_slice($arr,$ci);
		$ri_arr=self::ver_slice($arr,$ri);
		$i=0;
		foreach (array_unique($ci_arr) as $val)
		{
			$ind=array_search($val,$ci_arr);
			$arrf[$i][$ci]=$ci_arr[$ind];
			foreach ($ri as $ival) $arrf[$i][$ival]=$ri_arr[$ind][$ival];
			$i++;
		}
		return $arrf;
	}
	protected function turn_arr_type($arr,$type)
	{
		// sets array's each element type to required
		foreach ($arr as $val)
		{
			settype($val,$type);
			$arr2[]=$val;
		}
		return $arr2;
	}
	protected function res2arr($res)
	{
		if (empty($res)) return false;
		$i=0;
		while ($a_row=mysql_fetch_row($res)) $arr[$i++]=$a_row;
		return $arr;
	}
	protected function res2karr($res)
	{
		// result to multi associated array
		if (empty($res)) return false;
		while ($obj=mysql_fetch_object($res))
		{
			$tarr=array();
			while(current($obj))
			{
				$tarr=array_merge($tarr,array(key($obj)=>self::rvp(current($obj))));
				next($obj);
			}
			$arr[]=$tarr;
		}
		return $arr;
	}
	protected function res2skarr($res)
	{
		// result to simple associated array
		if (empty($res)) return false;
		$arr=array();
		while ($obj=mysql_fetch_object($res))
			while(current($obj))
			{
				$arr=array_merge($arr,array(key($obj)=>self::rvp(current($obj))));
				next($obj);
			}
		return $arr;
	}
	protected function res2kvarr($res)
	{
		if (empty($res)) return false;
		while ($a_row=mysql_fetch_row($res)) $arr[$a_row[0]]=self::rvp($a_row[1]);
		return $arr;
	}
	protected function res2sarr($res)
	{
		if (empty($res)) return false;
		while($a_row=mysql_fetch_row($res))
			foreach ($a_row as $val) $arr[]=is_numeric($val)? (double)$val : $val;
		return $arr;	
	}
	protected function res2val($res)
	{
		if (empty($res) || mysql_num_rows($res)==0) return false;
		while ($a_row=mysql_fetch_row($res))
		{
			return self::rvp($a_row[0]);
			break;
		}
	}
	protected function res2raw($res)
	{
		if (empty($res) || mysql_num_rows($res)==0) return false;
		while ($a_row=mysql_fetch_row($res))
		{
			return $a_row[0];
			break;
		}
	}
	protected function rvp($raw)
	{
		// raw variable processing
		if (is_numeric($raw)) return (double)$raw;
		elseif (strtolower($raw)=="true") return true;
		elseif (strtolower($raw)=="false") return false;
		else return $raw;
	}
	protected function check_work_time($arr)
	{
		if (!is_array($arr)) return false;
		$crit=false;
		foreach ($arr as $val) 
			for ($i=1;$i<count($val);$i++) 
				if (!empty($val[$i]))
				{ 
					$crit=true;
					break;
				}
		return $crit;
	}
	protected function compress($arr)
	{
		if (!is_array($arr)) return false;
		foreach ($arr as $val)
		{
			if ($prev_val!=$val) $arr2[]=$val;
			$prev_val=$val;
		}
		return $arr2;	
	}
	protected function fo_tags($arr)
	{
		// is intended for arrays only
		if (!is_array($arr))
		{
			return $arr;
			return false;
		}
		foreach ($arr as $key=>$val) $arr2[$key]=str_replace(array("<",">"),array("&lt;","&gt;"),$val);
		return $arr2;
	}
	protected function arr_invert($arr,$arr_minus)
	{
		// arr and arr_minus must be similar by the structure
		if (!is_array($arr) || !is_array($arr_minus)) return false;
		foreach ($arr as $val) if (!in_array($val,$arr_minus)) $arr2[]=$val;
		return $arr2;
	}
	protected function ver_slice($arr,$no)
	{
		if (!is_array($arr)) return false;
		if (is_array($no))
		{
			$i=0;
			foreach ($arr as $val)
			{
				foreach ($no as $ival) $arr2[$i][$ival]=$val[$ival];
				$i++;
			}
		}
		else foreach ($arr as $val) $arr2[]=$val[$no];
		return $arr2;
	}
	protected function ucompress($arr,$fno)
	{
		if (!is_array($arr)) return false;
		foreach ($arr as $val)
			if ($prev_val!=$val[$fno])
			{
				foreach ($val as $fval) $arr2[$i][]=$fval;
				$prev_val=$val[$fno];
				$i++;
			}
		return $arr2;	
	}
	protected function mcompress($arr)
	{
		if (!is_array($arr)) return false;
		foreach ($arr as $val)
		{
			$is_unique=true;
			for ($i=++$beg;$i<count($arr);$i++)
				if ($val==$arr[$i])
				{
					$is_unique=false;
					break;
				}
			if ($is_unique) $arr2[]=$val;	
		}
		return $arr2;
	}
	protected function rcompress($arr)
	{
		// the incoming array must consist only two elements. criteria goes first
		foreach ($arr as $val) $arr2[$val[0]][]=$val[1];
		return $arr2;
	}
	protected function upper_case($string,$coding='utf-8')
	{
		if(function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string))
		{
			preg_match('#(.)#us',mb_strtoupper(mb_strtolower($string,$coding),$coding),$matches);
			$string=$matches[1].mb_substr($string,1,mb_strlen($string,$coding),$coding);
    	}
		else $string=ucfirst($string);
		return $string;
	}
	protected function lang_separate($arr)
	{
		if (!is_array($arr)) return false;
		foreach (((data::lang()==0)?$arr:self::parse_name_en($arr,NULL)) as $val)
			if (preg_match("|[a-z]|is",$val[1])) $en[$val[0]]=$val[1];
			else $local[$val[0]]=$val[1];
		if (is_array($local)) asort($local);
		if (is_array($en)) asort($en);
		return ((is_array($local))?$local:array())+((is_array($en))?$en:array());
	}
	protected function store_lev()
	{
		if (!db::cat_store_lev()) return false;
		foreach (db::cat_store_lev() as $val) $arr[]=$val;
		return self::compress($arr);
	}
	// ***** Gears functions *****
	protected function stores_sort()
	{
		return ((is_array(db::get_cc_stores(NULL)))?db::get_cc_stores(NULL):array())+((is_array(db::get_cf_stores(NULL)))?db::get_cf_stores(NULL):array());
	}
	protected function store_cat($inv)
	{
		$arr=db::get_store_cat((isset($inv))?$inv:$_SESSION['store']);
		if (!is_array($arr))
		{
			return 0;
			return FALSE;
		}
		if (count($arr)<=1)	return current($arr);
		else
		{
			$cat=isset($_GET['catch'])? intval($_GET['catch']) : NULL;
			if (isset($cat) && $cat!=0 && in_array($cat,$arr)) return $cat;
			else return $arr[0];
		}
	}
	protected function promoted_stores()
	{
		if (!isset($_SESSION['scat'])) return false;
		db::$limiter=TRUE;
		$arr_spm=array();
		$cc_arr=db::get_cc_stores(NULL);
		if(is_array($cc_arr)) $arr_spm=array_slice(array_keys($cc_arr),0,data::$max_spm);
		if (count($arr_spm)<data::$max_spm)
		{
			$cf_arr=db::get_cf_stores(NULL);
			if (!is_array($cf_arr)) return false;
			$arr_spm=array_merge($arr_spm,array_slice(array_keys($cf_arr),0,(data::$max_spm-count($arr_spm))));
		}
		db::$limiter=FALSE;
		foreach ($arr_spm as $val) $arr_coords[]=db::get_store_coords($val);
		return array_combine($arr_spm,$arr_coords);
	}
	protected function scat_prm_st()
	{
		$arr_id=db::get_cc_stores(NULL);
		$arr_st=array();
		if (is_array($arr_id))
			foreach (array_keys($arr_id) as $val)
			{
				$logo=db::get_logo_id($val);
				if (isset($logo)) $arr_st[$val]=data::$get_image.$logo;
			}
		return $arr_st;
	}
	protected function history_insert($type)
	{
		/* --== History statistics types ==--
		 * 4 - visit catalogue
		 * 5 - hit store
		 * 8 - visit entire map
		 * 9 - visit for permanent banners 
		 */
		switch ($type)
		{
			case 4: foreach (db::get_stores_by_cat(NULL) as $val) db::history_insert_query(4,$val);
			break;
			case 5: db::history_insert_query(5,$_SESSION['store']);
			break;
			case 8: if (!$_SESSION['is_root']) foreach (db::get_lev_stores() as $val) db::history_insert_query(8,$val); 
			break;
		}
		foreach (db::get_bann_stores() as $val) db::history_insert_query(9,$val);
	}
	protected function video_style()
	{
		if (!self::mbtns_check(0)) return false;
		$crit=false;
		foreach (db::get_store_features(NULL) as $val)
			if ($val==10)
			{
				$crit=true;
				break;
			} 
		return $crit;
	}
	protected function set_mbtns_arr()
	{
		if (!isset($_SESSION['store'])) return false;
		if (is_array(db::get_store_features(NULL)))
			foreach (db::get_store_features(NULL) as $val)
				switch ($val)
				{
					case 9:
					case 10: data::$mbtns[]=0; // video commercial
					break;
					case 2: if (db::top10()) data::$mbtns[]=1; // top10 catalogue
					break;
					case 6: if (db::check_gifts()) data::$mbtns[]=2; // get discount
					break;
					case 16: data::$mbtns[]=3; // contact
					break;
					case 17: data::$mbtns[]=5; // direct phone
					break;
					case 18: if ($_SESSION['mode']=="web" && is_array(db::get_price_lists())) data::$mbtns[]=6; // price list
				}
		data::$mbtns[]=4; // map of the store's place
		asort(data::$mbtns);
	}
	protected function mbtns_check($btn)
	{
		if (!isset($_SESSION['store']) || !is_array(data::$mbtns)) return false;
		return in_array($btn,data::$mbtns);
	}
	protected function store_video()
	{
		if (!isset($_SESSION['store'])) return FALSE;
		$arr['tc']=$_SESSION['tc'];
		$arr['wdir']=$_SESSION['wdir'];
		$arr['store']=$_SESSION['store'];
		$arr=array_merge($arr,db::store_extra_config(NULL,"videos/".$_SESSION['mode']."/"));
		return $arr;
	}
	protected function daynam($arr,$day)
	{
		foreach (db::get_comm_config("days.xml")->week as $val)
		{
			foreach ($val->attributes() as $sval)
				if (stristr((string)$sval,data::$dlang))
					foreach ($val as $thval) 
						$dn_arr[]=mb_convert_case((db::get_lfen((string)$thval)),MB_CASE_TITLE,'UTF-8');	
		}
		$i=0;
		foreach ($arr as $val)
		{
			if ($val==$day) $daynam.=$dn_arr[$i].",".((data::rtl())?NULL:" ");
			$i++;
		}
		return substr($daynam,0,((data::rtl())?-1:-2));
	}
	protected function work_time()
	{
		$beg=self::ver_slice(db::get_work_time(),1);
		$end=self::ver_slice(db::get_work_time(),2);
		$br_beg=self::ver_slice(db::get_work_time(),3);
		$br_end=self::ver_slice(db::get_work_time(),4);
		for ($i=0;$i<=6;$i++)
			$week[]=(string)(substr($beg[$i],0,-3).
			((empty($br_beg[$i]) || empty($br_end[$i]))?NULL:
			"&nbsp;&#151;&nbsp;".substr($br_beg[$i],0,-3)." ".db::lbl(25)." ".substr($br_end[$i],0,-3)).
			"&nbsp;&#151;&nbsp;".substr($end[$i],0,-3));
		foreach (array_unique($week) as $key=>$val) $arr[]=(string)("<span>".self::daynam($week,$val)."</span>&nbsp;".$val);
		return $arr;
	}
	protected function top10_arr()
	{
		// checks the current date within the top10 period
		if (!isset($_SESSION['store']) || !db::top10()) return false;
		foreach (db::top10() as $val)
		{
			$i=1;
			$crit_null=false;
			$id=array_shift($val);
			$top10=array_shift($val);
			foreach ($val as $sval)
			{
				if (!isset($sval))
				{
					$crit_null=true;
					continue;
				}
				$j=1;
				$date=substr($sval,0,10);
				$time=substr($sval,11);
				switch($i++)
				{
					// beginning date
					case 1:
						$crit_beg=false;
						$next_beg=false;
						foreach (explode("-",$date) as $fval)
						{
							switch ($j)
							{
								case 1:	
									if (intval($fval)<intval(date("Y"))) $crit_beg=true;
									elseif (intval($fval)==intval(date("Y"))) $next_beg=true;
								break;
								case 2:
									if ($next_beg)
									{
										if (intval($fval)!=intval(date("m"))) $next_beg=false;
										if (intval($fval)<intval(date("m"))) $crit_beg=true;
									}
								break;
								case 3:
									if ($next_beg)
									{
										if (intval($fval)!=intval(date("d"))) $next_beg=false;
										if (intval($fval)<intval(date("d"))) $crit_beg=true;
									}
							}
							$j++;
						}
						if ($crit_beg && !$next_beg) break;
						foreach (explode(":",$time) as $fval)
						{
							switch ($j)
							{
								case 4:
									if ($next_beg)
									{
										if (intval($fval)!=intval(date("H"))) $next_beg=false;
										if (intval($fval)<intval(date("H"))) $crit_beg=true;
									}
								break;
								case 5: if ($next_beg && intval($fval)<intval(date("i"))) $crit_beg=true;
							}
							$j++;
						}
					break;
					// end date
					case 2:
						$crit_end=false;
						$next_end=false;
						foreach (explode("-",$date) as $fval)
						{
							switch ($j)
							{
								case 1:	
									if (intval($fval)>intval(date("Y"))) $crit_end=true;
									elseif (intval($fval)==intval(date("Y"))) $next_end=true;
								break;
								case 2:
									if ($next_end)
									{
										if (intval($fval)!=intval(date("m"))) $next_end=false;
										if (intval($fval)>intval(date("m"))) $crit_end=true;
									}
								break;
								case 3:
									if ($next_end)
									{
										if (intval($fval)!=intval(date("d"))) $next_end=false;
										if (intval($fval)>intval(date("d"))) $crit_end=true;
									}
							}
							$j++;
						}
						if ($crit_end && !$next_end) break;
						foreach (explode(":",$time) as $fval)
						{
							switch ($j)
							{
								case 4:
									if ($next_end)
									{
										if (intval($fval)!=intval(date("H"))) $next_end=false;
										if (intval($fval)>intval(date("H"))) $crit_end=true;
									}
								break;
								case 5:	if ($next_end && intval($fval)>intval(date("i"))) $crit_end=true;
							}
							$j++;
						}
				}
			}
			if (($crit_beg && $crit_end) || $crit_null) $arr[$id]=$top10;
		}
		if (!is_array($arr)) return false;
		asort($arr);
		return self::fo_tags($arr);
	}
	protected function parse_name_en($arr,$id)
	{
		if (!isset($arr)) return false;
		if (isset($id))
		{
			if (db::get_store_en($id))
			{
				return (is_array($arr))? array_replace($arr,array(0=>db::get_store_en($id))):
				db::get_store_en($id);
			} 
			else return $arr;
		}
		else
		{
			$i=0;
			foreach ($arr as $val)
			{
				$arr2[$i][]=$val[0];
				if (db::get_store_en($val[0])) $arr2[$i][]=db::get_store_en($val[0]);
				else $arr2[$i][]=$val[1];
				$i++;
			}
			return $arr2;
		}
	}
	protected function files_num($folder,$ext)
	{
		return count(glob(self::$raddr.$folder."*.".$ext));
	}
	protected function set_lang()
	{
		// makes an array of all available languages for the current build 
		foreach (db::get_bconfig("langs.xml") as $val)
			foreach ($val->attributes() as $attr) data::$lang_arr[(string)$attr]=(string)$val;
	}
	protected function set_wdir()
	{
		// determination of the writing direction
		foreach (db::get_comm_config("wdir.xml") as $val)
			if ($_SESSION['lang']==(string)$val)
				foreach ($val->attributes() as $attr) $_SESSION['wdir']=(string)$attr;
	}
	protected function def_lang()
	{
		data::$dlang=current(array_keys(data::$lang_arr));
		if (!isset($_SESSION['lang'])) $_SESSION['lang']=data::$dlang;
	}
	protected function lang_no()
	{
		if (!is_array(data::$lang_arr)) return false;
		$i=0;
		foreach (data::$lang_arr as $key=>$val)
		{
			if ($key==$_SESSION['lang'])
			{
				return $i;
				break;
			}
			$i++;
		}
	}
	protected function check_feat($store,$feat)
	{
		$arr=db::get_stores_by_feature($feat);
		return (is_array($arr) && in_array(((isset($store))?$store:$_SESSION['store']),$arr))? TRUE : FALSE;
	}
	protected function get_search_arr()
	{
		$sch_arr=db::make_search();
		if (!is_array($sch_arr) || count($sch_arr)==0) return false;
		$i=0;
		foreach ($sch_arr as $val)
		{
			$id=(integer)$val->{'id'};
			$coords=db::get_store_coords($id);
			if (!isset($coords[0]['x'])) continue;
			$arr_ready[$i]['id']=$id;
			$arr_ready[$i]['x']=$coords[0]['x'];
			$arr_ready[$i]['y']=$coords[0]['y'];
			$arr_ready[$i]['cat']=db::get_store_cat($id);
			if (($i++)==(data::$max_spm-1)) break;
		}
		return $arr_ready;
	}
	protected function set_slider_params($param)
	{
		// param is an array of required parameters
		$arr['lsbva']=" ls-btn-valign";
		$arr['sc_name']=NULL;
		$arr['elnpp']=NULL; // number of elements per one page
		$arr['sid']="simple-slider";
		switch (intval($_SESSION['slider']))
		{
			case 1:
				// subcategories list
				$arr['num']=$_SESSION['sc_num'];
				$arr['dvd']=data::$max_scats;
				$arr['rows']=data::$scats_rows;
				$arr['cols']=data::$scats_cols;
				$arr['ch']=data::$slch;
			break;
			case 2:
				// stores list
				$arr['num']=$_SESSION['st_num'];
				$arr['dvd']=data::$max_stores;
				$arr['sc_name']="<td class=\"back2scat-cell\"><div class=\"back2scat\">".db::lbl(120)."</div></td>";
				$arr['lsbva']=NULL;
				$arr['rows']=data::$stores_rows;
				$arr['cols']=data::$stores_cols;
				$arr['ch']=data::$slch_st;
			break;
			case 3:
				// search results list
				$arr['num']=$_SESSION['sch_num'];
				$arr['dvd']=data::$max_sch;
				$arr['rows']=data::$sch_rows;
				$arr['cols']=data::$sch_cols;
				$arr['ch']=data::$slch_st;
			break;
			case 4:
				// stores list filtered by content presence
				$arr['num']=$_SESSION['fst_num'];
				$arr['dvd']=data::$max_stores;
				$arr['sc_name']="<td class=\"back2scat-cell\"><div class=\"back2scat\">".db::lbl(120)."</div></td>";
				$arr['lsbva']=NULL;
				$arr['rows']=data::$stores_rows;
				$arr['cols']=data::$stores_cols;
				$arr['ch']=data::$slch_st;
				$arr['sid']="fst-slider";
			break;
			case 5:
				// service icons list
				$arr['num']=$_SESSION['si_num'];
				$arr['dvd']=data::$max_si;
				$arr['cols']=data::$si_cols;
				$arr['rows']=data::$max_si/data::$si_cols;
				$arr['ch']=data::$sich;
		}
		if (is_array($param))
		{
			foreach ($param as $val) $arr2[$val]=$arr[$val];
			return $arr2;
		}
		else return $arr;
	} 
	protected function get_slides_heigts()
	{
		$arrp=self::set_slider_params(array("num","dvd","rows","cols","ch"));
		$pointer=$arrp['num'];
		for ($i=0;$i<ceil($arrp['num']/$arrp['dvd']);$i++)
		{
			$pointer-=$arrp['dvd'];
			$arrh[]=(($pointer<0)?ceil(($arrp['dvd']+$pointer)/$arrp['cols']):$arrp['rows'])*$arrp['ch'];
		}
		return $arrh;
	}
	// screensaver block
	protected function scrs_num()
	{
		$arr=array();
		$arr_anime=db::get_stores_by_feature(12);
		$arr_comm=db::get_stores_by_feature(13);
		$arr=array_merge($arr,is_array($arr_anime)?$arr_anime:array());
		$arr=array_merge($arr,is_array($arr_comm)?$arr_comm:array());
		return count(array_unique($arr));
	}
	protected function scrs_stores()
	{
		$anime=db::get_stores_by_feature(12); // anime
		$comm=db::get_stores_by_feature(13); // commercial
		if (!is_array($anime)) $anime=array();
		if (!is_array($comm)) $comm=array();
		foreach (self::make_scrs_queue(array($anime,$comm)) as $val)
		{
			$attr=array();
			if (in_array($val,$anime) && is_array(db::store_extra_config($val,"animation"))) $attr[]=array("type"=>"anime");
			if (in_array($val,$comm) && is_array(db::store_extra_config($val,"videos"))) $attr[]=array("type"=>"comm");
			$total_queue[$val]=$attr;
		}
		self::$prev_queue=$_SESSION['scrsqueue'];
		$_SESSION['scrsqueue']=array();
		foreach ($total_queue as $key=>$val)
		{
			if (count($val)>1)
				$_SESSION['scrsqueue'][$key]=(self::$prev_queue[$key]['type']=="comm")?
					array("type"=>"anime","last_comm_no"=>self::$prev_queue[$key]['no']) :
					array("type"=>"comm","no"=>self::get_scrs_comm_no($key));
			elseif (count($val)==1)
				$_SESSION['scrsqueue'][$key]=($val[0]['type']=="anime")? 
					current($val) :
					array("type"=>"comm","no"=>self::get_scrs_comm_no($key));
			$_SESSION['scrsqueue'][$key]=array_merge($_SESSION['scrsqueue'][$key],
				(($_SESSION['scrsqueue'][$key]['type']=="anime")?db::store_extra_config($key,"animation"):db::store_extra_config($key,"videos")));
		}
		return $_SESSION['scrsqueue'];
	}
	protected function standby_stores()
	{
		$arr_st=db::get_standby_stores();
		$arr_id=self::ver_slice($arr_st,"id");
		$arr_xy=self::ver_slice($arr_st,array("x","y"));
		$arr_cns=self::make_unique_marr(db::get_storespcat_arr($arr_id),0,array(1)); // array of stores and cateries ID's
		$arr_cns_st=self::ver_slice($arr_cns,0);
		$arr_cns_cat=self::ver_slice($arr_cns,1);
		$i=0;
		foreach ($arr_id as $val)
		{
			$ind=array_search($val,$arr_cns_st);
			$arrf[$i]=array("id"=>(integer)$val,"x"=>(double)$arr_xy[$i]["x"],"y"=>(double)$arr_xy[$i++]["y"],"cat"=>(integer)$arr_cns_cat[$ind]);
		}
		return $arrf;
	}
	protected function reset_slider()
	{
		$_SESSION['scat']=0;
		//$_SESSION['st_num']=0;
		$_SESSION['slides_num']=1;
		$_SESSION['gs_num']=1;
		//$_SESSION['slider']=1;
	}
	protected function detect_browser()
	{
		if (stripos($_SERVER["HTTP_USER_AGENT"],"msie")) $_SESSION['browser']="ie";
		elseif (stripos($_SERVER["HTTP_USER_AGENT"],"firefox")) $_SESSION['browser']="ff";
		elseif (stripos($_SERVER["HTTP_USER_AGENT"],"chrome")) $_SESSION['browser']="cr";
		elseif (stripos($_SERVER["HTTP_USER_AGENT"],"safari")) $_SESSION['browser']="sa";
		elseif (stripos($_SERVER["HTTP_USER_AGENT"],"presto")) $_SESSION['browser']="op";
		else $_SESSION['browser']="an";
		$_SESSION['cbrws']=($_SESSION['browser']=="ie")? "ie" : "common";
	}
	protected function detect_ie_version()
	{
		if ($_SESSION['browser']!="ie") return false;
		if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')) $iev=6;
		elseif (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')) $iev=7;
		elseif (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')) $iev=8;
		elseif (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE 9')) $iev=9;
		elseif (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE 10')) $iev=10;
		else $iev="unknown";
		return $iev;
	}
	protected function som_check()
	{
		// checking the chosen store if it is presented on the map
		$coords=db::get_store_coords(NULL);
		return (isset($coords[0]['x']) && isset($coords[0]['y']) && $coords[0]['x']!=NULL);
	}
	protected function stores_content_check()
	{
		return count(db::get_stores_with_content())>0;
	}
	protected function get_mod_coords()
	{
		foreach (db::get_bconfig("modules.xml")->module as $val)
			if ((integer)$val->attributes()->id==$_SESSION['modid'])
				foreach ($val as $sval) $arr[(string)$sval->attributes()->name]=self::rvp((string)$sval);
		return $arr;
	}
	protected function set_glob_params()
	{
		// setting up the global parameters
		foreach (db::get_config("params.xml")->param as $val)
		{
			$pname=(string)$val->attributes()->name;
			if (isset($val->elem)) foreach ($val->elem as $sval) data::$$pname=array_merge(data::$$pname,array((string)$sval->attributes()->name=>self::rvp((string)$sval))); 
			else data::$$pname=self::rvp((string)$val);
		}
	}
	protected function module_check()
	{
		if (!db::get_module_pass()) return FALSE;
		return (db::get_module_pass()==$_SESSION['psswd']);
	}
	protected function web_check()
	{
		return true;
	}
// **********************
}
?>