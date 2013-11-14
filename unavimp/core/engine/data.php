<?php
session_start();
class data
{	
	/* --== Global Static Variables ==--
	 * cxs - coord OX start
	 * cxs_corr - OX correction factor
	 * cys - coord OY start
	 * cys_corr - OY correction factor
	 * corr_xmap - middle map OX correction factor
	 * corr_ymap - middle map OY correction
	 * cind - canvas index
	 * ccoords - canvas coords at the root level
	 * slides_num - number of store wall banners' slides 
	 * gs_num - grouped slider number
	 * sa_width - store's animation width
	 * sa_height - store's animation height
	 * prm_st_arr - array of promoted stores
	 * */
	
	static $raddr="";
	static $login,$psswd,$wlev,$tstore,$da,$larr,$carr,$nscale,$sclcorr_ox,$sclcorr_oy,
		$ccoords,$cxs,$cxs_corr,$cys,$cys_corr,$corr_xmap,$corr_ymap,$max_si,$si_cols,$mbtns,$top10_cat,$cells,
		$scs_si,$sich,$anime,$lang_arr,$dlang,$lev_names,$sa_width,$sa_height,$browser,
		$traddr,$raddr2,$get_image,$ls_max_num,$bann_num,$max_spm,$dirdn,$max_scats,$scats_cols,$scats_rows,
		$max_stores,$stores_cols,$stores_rows,$scs,$scs_st,$slch,$slch_st,$nn_type,$max_sch,$sch_cols,$sch_rows,$pctup_w,$pctup_h,
		$bann_no,$standby_lim;
	static $spec_cat=array();
	static $mbtn_vars=array();
	static $shwcs_dmns=array();
	
	// --== CONSTRUCTOR ==--
	function __construct($mode,$data)
	{
		//module logining
		switch ($mode)
		{
			case "web":
			case "mod": $_SESSION['mode']=$mode;
			break;
			default: if ($_SESSION['mode']!="web" && $_SESSION['mode']!="mod") return false;
		}
		if (!empty($data['login']) && !empty($data['psswd']))
		{
			$_SESSION['login']=$data['login'];
			$_SESSION['psswd']=$data['psswd'];
		}
		if (!db::set_unavi()) return false;
		$_SESSION['is_root']=FALSE;
		service::set_glob_params(); // setting up the global paramaters
		service::detect_browser();
		service::set_lang(); // language
		service::def_lang();
		service::set_wdir();
		db::set_categories(); // setting categories
		//db::tc_levels(); // creating levels array
		//service::build_si(); // service icons of mall
	}
	function __get($prp)
	{
		return (isset($_SESSION[$prp]))? $_SESSION[$prp] : (isset(self::${$prp})?self::${$prp}:NULL);
	}
	function __set($prp,$val)
	{
		if (isset(self::${$prp})) self::${$prp}=$val;
		else $_SESSION[$prp]=$val;
	}
	public function module_login()
	{
		return service::module_check();
	}
	public function web_login()
	{
		return service::web_check();
	}
	//=====================================
	public function js_otp()
	{
		// base JS libraries
		$base=array(
			"jquery.min"=>TRUE,
			"OpenLayers"=>TRUE,
			"jquery-ui.min"=>TRUE,
			"jQueryRotateCompressed.2.2"=>TRUE,
			"jquery.utils.min"=>TRUE,
			"jquery-css-transform.min"=>TRUE,
			"rotate3Di.min"=>TRUE,
			"wall.min"=>TRUE
		);
		// JS libraries customization depending on the mode
		switch ($_SESSION['mode'])
		{
			case "web":
				if (!self::is_ie())
					$base=array_merge($base,array(
						"antiscroll.min"=>TRUE,
						"chosen.jquery.min"=>TRUE,
						"jquery.tooltipster.min"=>TRUE
					));
			break;
			case "mod":
				$base=array_merge($base,array(
					"jquery.keyboard.min"=>TRUE
					//"http://dl.javafx.com/1.3/dtfx.js"=>FALSE
				));
		}
		// JS source output
		foreach ($base as $key=>$own) 
			print "<script type=\"text/javascript\" src=\"".(($own)?self::$traddr."js/$key.js":$key)."\"></script>\n";
		// U Navigator JS libraries output
        $libraries = array(
//            'body'
//            , 'pathfinder'
//            , 'header'
            'body' . $_SESSION['release'] . '.min'
            , 'pathfinder' . $_SESSION['release'] . '.min'
            , 'header' . $_SESSION['release'] . '.min'
        );
        foreach ($libraries as $val) {
            print '<script type="text/javascript" src="js/'
                    . $_SESSION['mode'] . '/' . $val . '.js"></script>' . "\n";
        }
		// IE-only libraries output
		if ($_SESSION['mode']=="web" && self::is_ie())
		{
			$ie=array(
				"ieh"=>TRUE
			);
			foreach ($ie as $key=>$own) 
				print "<script type=\"text/javascript\" src=\"".(($own)?self::$traddr."js/ie/$key.js":$key)."\"></script>\n";
		}
	}
	/*
	 * Service functions
	 */ 
	public function gvar($var)
	{
		if (isset($_SESSION[$var])) return $_SESSION[$var];
		elseif (isset(self::${$var})) return self::${$var};
		else return "uknown";
	}
	public function rvp_otp($raw)
	{
		return service::rvp($raw);
	}
	protected function rtl()
	{
		return ($_SESSION['wdir']=="rtl")? TRUE : FALSE;
	}
	protected function lang()
	{
		/* *
		 * 0 - Default language of the current build
		 * Others by the order 
		 * */
		switch ($_SESSION['lang'])
		{
			case self::$dlang: return 0;
			break;
			default: return service::lang_no();
		}
	}
	protected function lev_sup()
	{
		return ($_SESSION['lev']==end(self::$larr))? TRUE : FALSE; // supremum
	}
	protected function lev_inf()
	{
		return ($_SESSION['lev']==self::$larr[0])? TRUE : FALSE; // infimum
	}
	protected function get_logo()
	{
		print (db::get_logo_id(NULL))? self::$get_image.db::get_logo_id(NULL) :	self::$traddr."graphics/store_logo_".$_SESSION['mode'].".png";
	}
	protected function get_showcase()
	{
		return (db::get_showcase_id())? self::$get_image.db::get_showcase_id() : 
			self::$traddr."graphics/".((self::is_ie())?"ie/":null)."store_icon_".$_SESSION['mode'].".png";
	}
	protected function fget_image($name)
	{
		print self::$traddr."graphics/".$name;
	}
	public function is_ie()
	{
		return $SESSION['browser'] === 'ie' && self::iev_otp() < 10;
	}
	/*
	 * Body build functions
	 */
	public function loadblock($name)
	{
		$dir=self::$raddr."core/html/".$_SESSION['mode']."/blocks/".(($_SESSION['mode']=="web")?$_SESSION['cbrws']."/":NULL);
		$ext=".php";
		if (is_array($name)) foreach ($name as $val) include $dir.$val.$ext;
		else include $dir.$name.$ext;
            }
	public function getiframe($name)
	{
		$ext_arr=array("html","php");
		$dir="core/html/".$_SESSION['mode']."/iframes/".$name."/index.";
		$i=0;
		foreach ($ext_arr as $val)
		{
			if (file_exists(self::$raddr.$dir.$val)) break;
			$i++;
		}
		print self::$traddr.$dir.$ext_arr[$i];
	}
	public function lbl_otp($id)
	{
		$lbl=db::lbl($id);
		if (is_array($lbl))
		{
			foreach ($lbl as $val) $arr[]=service::upper_case($val);
			print json_encode($arr);
		}
		else print service::upper_case($lbl);
	}
	public function lbl_lc_otp($id)
	{
		print db::lbl($id);
	}
	public function lbl_upper_otp($id)
	{
		print mb_strtoupper(db::lbl($id),"UTF-8");
	}
	public function level_name_otp()
	{
		print db::get_level_name();
	}
	public function videos_count_otp()
	{
		print service::files_num("stores/".$_SESSION['tc']."/".$_SESSION['store']."/videos/".$_SESSION['mode']."/","flv"); // has to be improved
	}
	public function lb_otp()
	{
		print json_encode(service::lb());
	}
	public function btl_otp()
	{
		print json_encode(service::btl());
	}
	public function mtarget_otp()
	{
		print json_encode(service::mod_targeting());
	}
	public function ttcat_otp()
	{
		print json_encode(current(array_keys(service::top10_arr())));
	}
	public function gstore_cat_otp($id)
	{
		$store_cat=db::get_store_cat($id);
		if (in_array($store_cat,array_values(self::$spec_cat))) $_SESSION['cat']=$store_cat;
		else
		{
			$arr=db::get_store_cnsc($id);
			if (!is_array($arr))
			{
				print NAN;
				return false;
			}
			$_SESSION['cat']=$arr['parent'];
			$_SESSION['scat']=$arr['cat_id'];
		}
		print $_SESSION['cat'];
	}
	public function store_video_otp()
	{
		print json_encode(service::store_video());
	}
	public function map_history_insert()
	{
		service::history_insert(8);
	}
	public function bann_only_history()
	{
		service::history_insert(NULL);
	}
	public function store_name_otp($id)
	{
		print db::get_store_name($id);
	}
	public function check_feat_otp($store,$feat)
	{
		print json_encode(service::check_feat($store,$feat));
	}
	public function stores_otp()
	{
		print json_encode(db::get_bankers());
	}
	public function store_coords_otp()
	{
		print json_encode(db::get_store_coords(NULL));
	}
	public function promoted_stores_otp()
	{
		print json_encode(service::promoted_stores());
	}
	public function sch_id_otp()
	{
		print json_encode(service::get_search_arr());
	}
	public function get_spec_cat($name)
	{
		print self::$spec_cat[$name];
	}
	public function scat_name_otp()
	{
		print db::get_scat_name();
	}
	public function mod_coords_otp()
	{
		print json_encode(service::get_mod_coords());
	}
	public function scrs_stores_otp()
	{
		print json_encode(service::scrs_stores());
	}
	public function scrs_num_otp()
	{
		print service::scrs_num();
	}
	public function content_check_otp()
	{
		print json_encode(service::stores_content_check());
	}
	public function tc_name_otp()
	{
		print db::get_tc_name();
	}
	public function standby_stores_otp()
	{
		print json_encode(service::standby_stores());
	}
	public function ssi_otp($id)
	{
		print json_encode(db::get_ssi($id));
	}
	public function top10_arr_otp()
	{
		return service::top10_arr();
	}
	public static function iev_otp()
	{
		return service::detect_ie_version();
	}
	public function test_otp()
	{
		print json_encode(db::make_search());
    }
}
?>