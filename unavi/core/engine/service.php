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
	private function turn_arr_type($arr,$type)
	{
		// sets array's each element type to required
		foreach ($arr as $val)
		{
			settype($val,$type);
			$arr2[]=$val;
		}
		return $arr2;
	}
	private function multi_elem_lev($val)
	{
		// the function checks if the current level has more than one elem tags
		foreach ($val->elem as $sval) foreach (explode(",",(string)$sval->attributes()->lev) as $thval)	if (intval($thval)==data::$wlev) $num++;
		return $num>1;
	}
	private function multi_elem($val)
	{
		foreach ($val->area as $sval)
			if (isset($sval->elem))
			{
				foreach ($sval->elem as $thval) $num+=count(explode(",",(string)$thval->attributes()->lev));
				return $num;
			}
			else return false;
	}
	private function circle_perform()
	{
		if (!isset(self::$stores_arr['circle']) || empty(self::$stores_arr['circle'])) return false;
		if (is_array(self::$stores_arr['circle']))
		{
			$i=0;
			foreach (self::$stores_arr['circle'] as $val)
			{
				foreach (explode(",",$val) as $fval)
					if ($fval=="none") $circle[$i]=NULL; 
					else $circle[$i][]=self::rvp($fval);
				$i++;
			}
		}
		else 
			foreach (explode(",",self::$stores_arr['circle']) as $val)
				if ($val=="none") $circle=NULL;
				else $circle[]=self::rvp($val);
		self::$stores_arr['circle']=$circle;
	}
	private function extract_lev_elem($val,$elem)
	{
		foreach ($val->$elem as $sval)
			if (isset($sval->elem))
			{
				$ml_crit=self::multi_elem_lev($sval);
				if ($ml_crit) self::$stores_arr[$elem]=array();
				foreach ($sval->elem as $thval)
				{
					if (!in_array(data::$wlev,explode(",",(string)$thval->attributes()->lev))) continue;
					if ($ml_crit) array_push(self::$stores_arr[$elem],(string)$thval);
					else self::$stores_arr[$elem]=(string)$thval;
				}
			}
			else self::$stores_arr[$elem]=(string)$sval;
		return self::$stores_arr[$elem];
	}
	private function extract_lev_text_elem($val)
	{
		if ((self::$mte_lev || self::$ml_store) && !in_array(data::$wlev,explode(",",(string)$val->attributes()->lev))) return false;
		if (isset($val->df) || isset($val->en)) foreach (((data::lang()==0)?$val->df:$val->en) as $fval);
		else $fval=$val;
		if (self::$mte_lev)
		{
			array_push(self::$stores_arr['textRotate'],(double)$fval->rotate);
			array_push(self::$stores_arr['textAttr'],array_merge(data::$snt_attr,array("font-size"=>(double)$fval->size)));
			array_push(self::$stores_arr['textCoords'],self::turn_arr_type(explode(",",(string)$fval->coords),"double"));
		}
		else
		{
			self::$stores_arr['textRotate']=(double)$fval->rotate;
			self::$stores_arr['textAttr']=array_merge(data::$snt_attr,array("font-size"=>(double)$fval->size));
			self::$stores_arr['textCoords']=self::turn_arr_type(explode(",",(string)$fval->coords),"double");
		}
		self::$stores_arr['name']=((string)$fval->break=="no")? db::get_store_name(self::$stores_arr['id']) : self::break_the_name(self::$stores_arr['id'],(string)$fval->break);
	}
	private function extract_btl($val)
	{
		foreach ($val->attributes() as $key=>$sval)
		{
			switch ((string)$key)
			{
				case "lev": break;
				case "id":
				case "break": $tarr[(string)$key]=self::rvp((string)$sval);
				break;
				case "rotate":
				case "coords": $arr[(string)$key]=((string)$key=="coords")? self::turn_arr_type(explode(",",(string)$sval),"integer") : intval($sval);
				break;
				default: $arr['attr'][(string)$key]=self::rvp((string)$sval);
			}
			$arr['text']=($tarr['break']=="no")? db::lbl($tarr['id']) : self::break_the_name(db::lbl($tarr['id']),$tarr['break']);
			if ($_SESSION['is_root']) $arr["attr"]["font-size"]*=.9;
		}
		return $arr;
	}
	private function extract_lev_name($val,$elem)
	{
		foreach ($val->$elem as $sval)
			foreach(explode(",",(string)$sval->attributes()->lev) as $thval)
				switch ($elem)
				{
					case "break":
						data::$wlev=$thval; 
						data::$lev_names[$thval]['name']=((string)$sval=="no")?	db::get_level_name() : self::break_the_name(db::get_level_name(),(string)$sval);
					break;
					default: data::$lev_names[$thval][$elem]=(stristr((string)$sval,","))? 
						self::turn_arr_type(explode(",",(string)$sval),"integer") : (double)$sval;
				}
	}
	private function space_pos($t,$no)
	{
		while (++$i<$no)
		{
			$cut_len+=stripos($t," ")+1;
			$t=substr($t,stripos($t," ")+1);
		}
		return $cut_len+stripos($t," ");
	}
	private function diff($val)
	{
		// ltr and rtl presence test
		return (isset($val->rtl) && isset($val->ltr))? true : false;
	}
	private function chval($val,$string)
	{
		// choosing the value depending on the writing direction
		switch ($_SESSION['wdir'])
		{
			case "rtl": $tval=($string)? (string)$val->rtl : $val->rtl;
			break;
			case "ltr": $tval=($string)? (string)$val->ltr : $val->ltr;
			break;
			default: return false;
		}
		return self::rvp($tval);
	}
	private function mapres2arr($val)
	{
		// the function is dealing with "store" tag
		self::$stores_arr=array();
		if ((string)$val->area=="unknown") return false;
		self::$stores_arr['id']=intval($val->id);
		self::extract_lev_elem($val,area);
		self::extract_lev_elem($val,circle);
		self::circle_perform();
		if (self::multi_elem($val)) self::$ml_store=TRUE;
		if (isset($val->text))
			foreach ($val->text as $sval)
			{
				if (isset($sval->elem))
				{
					if (self::multi_elem_lev($sval))
					{
						self::$stores_arr['textRotate']=array();
						self::$stores_arr['textAttr']=array();
						self::$stores_arr['textCoords']=array();
						self::$mte_lev=TRUE;
					}
					foreach ($sval->elem as $thval) self::extract_lev_text_elem($thval);
				}
				else self::extract_lev_text_elem($sval);
				self::$mte_lev=FALSE;
				self::$ml_store=FALSE;
			}
		if (self::$showflag) self::extract_lev_elem($val,flag);
		if (self::multi_elem($val)) self::$stores_arr['mls']=self::multi_elem($val);
		return self::$stores_arr;
	}
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
		$num=self::files_num("stores/".$_SESSION['tc']."/$store/videos/","flv");
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
				$tarr=array_merge($tarr,array(key($obj)=>current($obj)));
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
				$arr=array_merge($arr,array(key($obj)=>current($obj)));
				next($obj);
			}
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
			return $a_row[0];
			break;
		}
	}
	protected function res2lev($res)
	{
		if (empty($res)) return false;
		while ($a_row=mysql_fetch_row($res)) $arr[$a_row[1]][]=db::lt($a_row[0]);
		if (is_array($arr))
			foreach ($arr as $key=>$val) 
			{
				if (count($val)<=1) $lev=((data::rtl() && stristr($key,"smikhut"))?db::lbl(26):db::lbl(1))." ".current($val);
				else
				{
					$lev=db::lbl(4).":";
					foreach ($val as $fval) $lev.=" ".$fval.",";
					$lev=substr($lev,0,-1);
				}
			}
		return $lev;
	}
	protected function sv_exceptions($prp,$val)
	{
		// list of exceptions can be extended using `OR` operator 
		return ($prp=="scrslast" && $val=="undefined")? TRUE : FALSE;
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
		foreach ($arr as $val) $arr2[]=$val[$no];
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
	protected function build_si()
	{
		foreach (db::get_config("si.xml")->service as $val)
			foreach ($val as $sval)
			{
				$si_arr_raw[intval($val->attributes()->id)][]=intval($sval->attributes()->lev);
				if (intval($val->attributes()->id)==$_SESSION['si'] &&
				($_SESSION['is_root'] || (!$_SESSION['is_root'] && intval($sval->attributes()->lev)==$_SESSION['lev'])))
					data::$ssi_arr[intval($sval->attributes()->lev)][]=(string)$sval;
			}
		foreach ($si_arr_raw as $key=>$val) foreach (array_unique($val) as $fval) data::$si_arr[$key][]=$fval;
	}
	public function si_name()
	{
		if (!isset($_SESSION['si'])) return false;
		foreach (db::get_comm_config("sinames.xml") as $val)
			if (intval($val->attributes()->id)==$_SESSION['si'])
			{
				return db::get_lfen((string)$val);
				break;
			}
	}
	protected function stores_sort()
	{
		return ((is_array(db::get_cc_stores()))?db::get_cc_stores():array())+
			((is_array(db::get_cf_stores()))?db::get_cf_stores():array());
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
	protected function promoted_store($id)
	{
		if (!is_array(db::get_cc_stores())) return false;
		$crit=false;
		foreach (db::get_cc_stores() as $key=>$val)
			if ($id==$key)
			{
				$crit=true;
				break;
			}
		return $crit;
	}
	protected function break_the_name($id,$break)
	{
		// the function works only within the JS output
		$text=(gettype($id)=="integer")? db::get_store_name($id) : $id;
		switch ($break)
		{
			case "all": return str_replace(" ","\n",$text);
			break;
			default: return substr_replace($text,"\n",self::space_pos($text,intval($break)),1);
		}
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
			case 4: foreach (db::cat_stores(FALSE) as $val) db::history_insert_query(4,$val);
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
				}
		data::$mbtns[]=4; // map of the store's place
		asort(data::$mbtns);
	}
	protected function mbtns_check($btn)
	{
		if (!isset($_SESSION['store']) || !is_array(data::$mbtns)) return false;
		$crit=false;
		foreach (data::$mbtns as $val) 
			if ($val==$btn)
			{
				$crit=true;
				break;
			}
		return $crit;
	}
	protected function mls_check($inv)
	{
		// checking for multilevel presence of the store
		return count(db::lev_of_store($inv))>1;
	}
	protected function set_map()
	{
		$arr=db::get_config("map.xml");
		/*
		 * Variables required at the Root level
		 */
		// Cells Filled (optional)
		data::$cells=(isset($arr->cells))? explode(",",(string)$arr->cells) : NULL;
		// Little Map down scaling
		data::$nscale=(double)$arr->scaledown;
		// Coord of the little map OX step (rtl, ltr differention is optional)
		foreach ($arr->cxs as $val) data::$cxs=(self::diff($val))? self::chval($val,true) : (double)$arr->cxs; 
		// Coord of the little map OY step (rtl, ltr differention is optional)
		foreach ($arr->cys as $val) data::$cys=(self::diff($val))? self::chval($val,true) : (double)$arr->cys;
		// Little map OX step correction factor (rtl, ltr differention is optional)
		foreach ($arr->cxscorr as $val)	data::$cxs_corr=(self::diff($val))? self::chval($val,true) : (string)$arr->cxscorr;
		// Little map OY step correction factor (rtl, ltr differention is optional)
		foreach ($arr->cyscorr as $val)	data::$cys_corr=(self::diff($val))? self::chval($val,true) : (string)$arr->cyscorr;
		// Canvas width and height correct factor at the Root Level for avoidance of the target sign cutting 
		if (isset($arr->tcorr))
			foreach ($arr->tcorr as $val)
			{
				if (isset($val->attributes()->wdsrc)) data::$rccorrox=(double)$val->attributes()->wdsrc;
				if (isset($val->attributes()->hdsrc)) data::$rccorroy=(double)$val->attributes()->hdsrc;
			}
		/*
		 * Variables required at the certain level
		 */
		// Mouse over protecting delay while loading map
		if (isset($arr->modelay)) data::$mo_delay=(string)$arr->modelay;
		// Middle map OX positon (rtl, ltr differention is optional)
		foreach ($arr->corrxmap as $val) data::$corr_xmap=intval((self::diff($val))?self::chval($val,true):$arr->corrxmap);
		foreach ($arr->corrymap as $val) data::$corr_ymap=intval((self::diff($val))?self::chval($val,true):(string)$arr->corrymap);
		// Scale correction (waving zero) ???
		if (isset($arr->sclcorr))
		{
			foreach ($arr->sclcorr as $val)
				if ((isset($val->attributes()->mod) && intval($val->attributes()->mod)==$_SESSION['modid']) || 
					!isset($val->attributes()->mod))
				{
					if (isset($val->attributes()->ox)) data::$sclcorr_ox=(double)$val->attributes()->ox;
					if (isset($val->attributes()->oy)) data::$sclcorr_oy=(double)$val->attributes()->oy;
				}
		}
	}
	protected function lb()
	{
		// building levels backgrounds including text labels
		foreach (db::get_config("map.xml")->lb as $val)
			foreach ($val->bckgr as $sval)
			{
				if (!$_SESSION['is_root'] && intval($sval->attributes()->lev)!=$_SESSION['lev']) continue;
				$attr=NULL;
				foreach ($sval->attributes() as $key=>$thval) if ((string)$key!="lev") $attr[(string)$key]=(string)$thval;
				$arr[intval($sval->attributes()->lev)][]=array_merge(array("path"=>(string)$sval),
					array("attr"=>((isset($attr))?$attr:data::$lb_attr)));
			}
		return $arr;
	}
	protected function btl()
	{
		// backrounds text labels
		if (isset(db::get_config("map.xml")->btl))
		{
			foreach (db::get_config("map.xml")->btl as $val)
			{
				if (isset($val->df) || isset($val->en)) foreach (((data::lang()==0)?$val->df:$val->en) as $val);
				foreach ($val->lbl as $sval)
					if ($_SESSION['is_root'])
					{
						foreach (data::$larr as $thval)
							if ($thval==intval($sval->attributes()->lev)) $arr[$thval][]=self::extract_btl($sval);
					}
					elseif ($_SESSION['lev']==intval($sval->attributes()->lev)) $arr[$_SESSION['lev']][]=self::extract_btl($sval);
			}
			return $arr;
		}
		else return false;
	}
	protected function mod_targeting()
	{
		// Module targeting
		foreach (db::get_config("map.xml")->target as $val)
			if (intval($val->attributes()->mod)==$_SESSION['modid'])
				return array(intval($val->attributes()->lev)=>(string)$val);
	}
	protected function stores()
	{
		foreach (db::get_config("objmap.xml") as $val)
			if (self::mapres2arr($val))
			{
				$raw_lev_arr=db::lev_of_store(intval($val->id));
				$lev_arr=(is_array($raw_lev_arr))? $raw_lev_arr : array($raw_lev_arr);
				if ($_SESSION['is_root'])
				{
					foreach (data::$larr as data::$wlev) 
						if (in_array(data::$wlev,$lev_arr)) $arr[data::$wlev][]=self::mapres2arr($val);
				}
				elseif (in_array($_SESSION['lev'],$lev_arr))
				{
					data::$wlev=$_SESSION['lev'];
					$arr[$_SESSION['lev']][]=self::mapres2arr($val);
				}
			}
		return $arr;
	}
	protected function get_flag()
	{
		foreach (db::get_config("objmap.xml") as $val) 
			if (intval($val->id)==$_SESSION['store'])
			{
				$los=db::lev_of_store(intval($val->id));
				if ($_SESSION['is_root'] && self::multi_elem($val))	foreach ($los as data::$wlev) $arr[data::$wlev]=self::extract_lev_elem($val,flag);
				else
				{
					data::$wlev=(in_array($_SESSION['lev'],$los))? $_SESSION['lev'] : current($los);
					$arr[data::$wlev]=self::extract_lev_elem($val,flag);
				}
			}
		return $arr;
	}
	protected function store_video()
	{
		if (!isset($_SESSION['store'])) return FALSE;
		$arr['tc']=$_SESSION['tc'];
		$arr['wdir']=$_SESSION['wdir'];
		$arr['store']=$_SESSION['store'];
		$arr=array_merge($arr,db::store_extra_config(NULL,"videos"));
		return $arr;
	}
	protected function canvas_coords()
	{
		$cells_def=is_array(data::$cells);
		$step_x=(2*data::$cxs+data::$nscale*data::$canvas_w)*data::$cxs_corr;
		$step_y=(2*data::$cys+data::$nscale*data::$canvas_h)*data::$cys_corr;
		if (data::rtl())
		{
			$x1=$step_x;
			$x2=data::$cxs;
		}
		else
		{
			$x1=data::$cxs;
			$x2=$step_x;
		}
		for ($i=0;$i<(($cells_def)?4:count(data::$larr));$i++)
			switch ($i)
			{
				case 0: $arr[]=array((double)$x1,(double)data::$cys);
				break;
				case 1: $arr[]=array((double)$x2,(double)data::$cys);
				break;
				case 2: $arr[]=array((double)$x1,(double)$step_y);
				break;
				case 3: $arr[]=array((double)$x2,(double)$step_y);
			}
		if ($cells_def) foreach (data::$cells as $val) $arr2[]=$arr[$val];
		else for ($i=0;$i<count(data::$larr);$i++) $arr2[]=$arr[$i];
		data::$ccoords=$arr2;
	}
	protected function lev_names()
	{
		// Labels with levels names (rtl, ltr differention is optional)
		if (!$_SESSION['is_root']) return false;
		foreach (db::get_config("map.xml")->text as $val)
			if (isset($val->df) || isset($val->en)) foreach (((data::lang()==0)?$val->df:$val->en) as $arr);
			else $arr=$val;
		self::extract_lev_name($arr,"pos");
		self::extract_lev_name($arr,"size");
		self::extract_lev_name($arr,"rotate");
		self::extract_lev_name($arr,"break");
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
		return (is_array($arr))? self::fo_tags($arr) : NULL;
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
		foreach (db::get_config("langs.xml") as $val)
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
	protected function scrs_num()
	{
		$anime=db::get_stores_by_feature(12); // anime
		$comm=db::get_stores_by_feature(13); // commercial
		$arr=array();
		if (is_array($anime)) $arr=array_merge($arr,db::get_stores_by_feature(12));
		if (is_array($comm)) $arr=array_merge($arr,db::get_stores_by_feature(13));
		return count(array_unique($arr));
	}
	protected function scrs_stores()
	{
		if (!$_SESSION['is_root']) return false;
		$anime=db::get_stores_by_feature(12); // anime
		$comm=db::get_stores_by_feature(13); // commercial 
		foreach (self::make_scrs_queue(array($anime,$comm)) as $val)
		{
			$attr=array();
			if (is_array($anime) && in_array($val,$anime) && is_array(db::store_extra_config($val,"animation"))) $attr[]=array("type"=>"anime");
			if (is_array($comm) && in_array($val,$comm) && is_array(db::store_extra_config($val,"videos"))) $attr[]=array("type"=>"comm");
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
	protected function check_feat($store,$feat)
	{
		$arr=db::get_stores_by_feature($feat);
		return (is_array($arr) && in_array(((isset($store))?$store:$_SESSION['store']),$arr))? TRUE : FALSE;
	}
	protected function detect_browser()
	{
		if (isset($_SESSION['browser'])) return false;
		$browser_arr=get_browser(null,true);
		$_SESSION['browser']=strtolower($browser_arr['browser']);
	}
	protected function module_check()
	{
		if (!db::get_module_pass()) return FALSE;
		return (db::get_module_pass()==$_SESSION['psswd'])? TRUE : FALSE;
	}
// **********************
}
?>