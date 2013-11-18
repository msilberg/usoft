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
	 * si_arr - complete list of service icons
	 * ssi_arr - selected list of service icons
	 * cind - canvas index
	 * ccoords - canvas coords at the root level
	 * slides_num - number of store wall banners' slides 
	 * gs_num - grouped slider number
	 * sa_width - store's animation width
	 * sa_height - store's animation height 
	 * */
	
	static $login,$psswd,$wlev,$tstore,$store_showcase,$store_logo,$da,$larr,$carr,$nscale,$sclcorr_ox,$sclcorr_oy,
		$ccoords,$cxs,$cxs_corr,$cys,$cys_corr,$corr_xmap,$corr_ymap,$si_arr,$ssi_arr,$mbtns,$top10_cat,$cells,
		$anime,$lang_arr,$dlang,$lev_names,$sa_width,$sa_height;
		
	// --== Static Constants ==--
	
	static $raddr="/var/www/public_html/unavi/";
	static $traddr="http://localhost/public_html/unavi/";
	static $get_image="http://uadmin.no-ip.biz:8080/il/getimage/imageid/";
	static $canvas_w=1115; // Middle canvas width
	static $canvas_h=720; // Middle canvas height
	static $rlevnames_coords=array(400,250); // coords of the common canvas for levels names text
	static $ls_max_num=14; // list slider buttons maximal number per each one pages
	static $wall_w=710;
	static $wall_h=470;
	static $bann_num=14;
	static $mw_w=950;
	static $mw_h=610;
	static $dirdn=19; // drum info rows divide number
	static $num_of_slc=5; // number of buttons in each line in the store list window
	static $wlno=0; // waving level numbers
	static $max_stores=24; // max stores number per each one page
	static $min_rfs=6.5; // minimal allowed root font size
	static $mo_delay=3500; // mouse over protecting delay while loading map
	static $scs = 10; // stores' cells spacing in the stores list
	static $sl=NULL; // store levels, if there are
	static $rccorrox=1; // canvas width correct factor at the Root Level, default value is 1
	static $rccorroy=1; // canvas height correct factor at the Root Level, default value is 1
	static $snt_attr=array("fill"=>"#000000"); // stores names text default attributes
	static $lb_attr=array("stroke"=>"#3fa9f5","stroke-width"=>"2","fill"=>"#c7eafb"); // levels background default attributes
	static $btl_attr=array("rotate"=>0,"break"=>"no","color"=>"#ffffff","font-size"=>16); // levels background text default attributes
	static $mbtn_vars=array("mlt"=>102,"fct"=>80); // minisite buttons variables: mlt - multiplier, fct = linear factor
	
	// --== CONSTRUCTOR ==--
	
	function __construct($login,$psswd)
	{
		//module logining
		if (isset($login) && isset($psswd))
		{
			$_SESSION['login']=$login;
			$_SESSION['psswd']=$psswd;
			if (!service::module_check()) return FALSE;
			db::set_module();
			db::set_tc();
		}
		service::set_lang(); // language
		service::def_lang();
		service::set_wdir();
		service::set_map(); // setting map ratio and canvas coords
		db::set_categories(); // setting categories
		db::tc_levels(); // creating levels array
		service::canvas_coords(); // canvas coords
		service::lev_names(); // levels names
		service::build_si(); // service icons of mall
		// store's showcase and logo
		self::$store_showcase=(db::get_showcase_id())? self::$get_image.db::get_showcase_id() : self::$traddr."graphics/store_icon.png";
		self::$store_logo=(db::get_logo_id(NULL))? self::$get_image.db::get_logo_id(NULL) :	self::$traddr."graphics/store_logo.png";
		if (isset($_SESSION['store'])) service::set_mbtns_arr(); // building minisite buttons
		service::detect_browser();
	}
	function __get($prp)
	{
		return (isset($_SESSION[$prp]))? $_SESSION[$prp] : (isset(self::${$prp})?self::${$prp}:NULL);
	}
	function __set($prp,$val)
	{
		if (service::sv_exceptions($prp,$val)) return false;
		if (isset(self::${$prp})) self::${$prp}=$val;
		else $_SESSION[$prp]=$val;
	}
	public function module_login()
	{
		return (service::module_check())? TRUE : FALSE;
	}
	//=====================================
	public function js_otp()
	{
		foreach (array(
			"jquery.min"=>TRUE,
			"raphael.min"=>TRUE,
			"body"=>TRUE,
			"maps"=>TRUE,
			"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"=>FALSE,
			"http://dl.javafx.com/1.3/dtfx.js"=>FALSE
			) as $key=>$own) 
			print "<script type=\"text/javascript\" language=\"JavaScript\" src=\"".(($own)?self::$traddr."js/$key.js":$key)."\"></script>\n";
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
	/*
	 * Body build functions
	 */
	public function loadblock($name)
	{
		include self::$raddr."core/html/blocks/".$name.".php";
	}
	public function lbl_otp($id)
	{
		print db::lbl($id);
	}
	public function level_name_otp()
	{
		print db::get_level_name();
	}
	public function videos_count_otp()
	{
		print service::files_num("stores/".$_SESSION['modid']."/".$_SESSION['store']."/videos/","flv");
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
	public function stores_otp()
	{
		print json_encode(service::stores());
	}
	public function cat_stores_otp()
	{
		print json_encode(db::cat_stores(TRUE));
	}
	public function flag_otp()
	{
		print json_encode(service::get_flag());
	}
	public function los_otp()
	{
		print json_encode(db::lev_of_store(NULL));
	}
	public function ttcat_otp()
	{
		print current(array_keys(service::top10_arr()));
	}
	public function gstore_cat_otp($id)
	{
		print json_encode(db::get_store_cat($id));
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
	public function store_name_otp()
	{
		print db::get_store_name(NULL);
	}
	public function scrs_stores_otp()
	{
		print json_encode(service::scrs_stores());
	}
	public function scrs_num_otp()
	{
		print service::scrs_num();
	}
	public function check_feat_otp($store,$feat)
	{
		print json_encode(service::check_feat($store,$feat));
	}
	public function test_otp()
	{
		print json_encode(db::get_store_features(NULL));
	}
}
?>