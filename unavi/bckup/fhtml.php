<?php
class fhtml
{
	// fhtml variables
	static $wdsrc=1; // canvas width downscale correction factor at the root level
	static $hdsrc=1; // canvas height downscale correction factor at the root level
	// stores names text default attributes
	static $snt_attr=array("fill"=>"#000000","font-size"=>NULL);
	// levels backgrounds default attributes 
	static $lb_attr=array("stroke"=>"#3fa9f5","stroke-width"=>"2","fill"=>"#c7eafb");
	// levels background text default attributes
	static $btl_attr=array("rotate"=>0,"break"=>"no","color"=>"#ffffff","font-size"=>16);
	static $sclcorr_ox;
	static $sclcorr_oy;
	
	private function map_output($arr)
	{
		/*
		 * old one
		 */
		// highlightening
		$store_crit=(data::$mgear=="store" && $_SESSION['store']==$arr['id'])? TRUE : FALSE;
		$flag_attr="{\"fill\":\"#ed1c24\",\"stroke\":\"#007eb2\",\"stroke-width\":\"".(($_SESSION['is_root'])?2:4)."\"}";
		if (!$_SESSION['is_root']) print "var link".$arr['id']."=\"".data::$traddr."core/html/blocks/body.php?sch=".$arr['id'].service::addl("lev")."&catch=".$_SESSION['cat']."\";\n";
		if (is_array($arr['area']))
			foreach ($arr['area'] as $val) 
				print ($_SESSION['is_root'])? "var areasm".$arr['id'].(++$i)."=paper".data::$wlev.".path(\"$val\");
					areasm".$arr['id'].$i.".attr({\"fill\":\"$clr1\",\"stroke\":\"$clr2\",\"stroke-width\":\"1\"});
					areasm".$arr['id'].$i.".scale(".data::$nscale.",".data::$nscale.",".data::$nscale.",".
					data::$nscale.");\n":
					"areaArr.push(paper.path(\"$val\"));
					areaArr[areaArr.length-1].attr({\"fill\":\"$clr1\",\"stroke\":\"$clr2\",\"stroke-width\":\"2\"});
					areaArr[areaArr.length-1].mouseover(function(){openStore=setTimeout(function(){if (!wd && !fbdClick){window.location=link".$arr['id']."}},800)}).mouseout(function(){clearTimeout(openStore)}).click(function(){openStore=setTimeout(function(){if (!wd && !fbdClick){window.location=link".$arr['id']."}},800)});\n";
		if (is_array($arr['text']))
			foreach ($arr['text'] as $val)
			{
				$text=($val['break']=="no")? db::get_store_name($arr['id']) :
					service::break_the_name((integer)$arr['id'],$val['break']);
				print ($_SESSION['is_root'])? (($val['size']*data::$nscale>data::$min_rfs)?"text".$arr['id'].(++$i).
					"=paper".data::$wlev.".text(".$val['coords'].",\"$text\");
					text".$arr['id'].$i.".attr({\"font-size\":\"".($val['size']*data::$nscale)."\",\"fill\":\"$clr4\",
						\"font\":\"Arial\",\"direction\":\"".$_SESSION['wdir']."\"});
					text".$arr['id'].$i.".rotate(".$val['rotate'].");
					text".$arr['id'].$i.".scale(".data::$nscale.",".data::$nscale.",".data::$nscale.",".
					data::$nscale.");\n":NULL):
					"textArr.push(paper.text(".$val['coords'].",\"$text\"));
					textArr[textArr.length-1].attr({\"font-size\":\"".$val['size']."\",\"fill\":\"$clr4\",\"font\":\"Arial\",\"direction\":\"".$_SESSION['wdir']."\"});
					textArr[textArr.length-1].rotate(".$val['rotate'].");
					textArr[textArr.length-1].mouseover(function(){openStore=setTimeout(function(){if (!wd && !fbdClick){window.location=link".$arr['id']."}},800)}).mouseout(function(){clearTimeout(openStore)}).click(function(){openStore=setTimeout(function(){if (!wd && !fbdClick){window.location=link".$arr['id']."}},800)});\n";
			}
		if (!$_SESSION['is_root'] && is_array($arr['circle']))
			foreach ($arr['circle'] as $val)
				print ($val!="none")? "circleArr.push(paper.circle($val,4));
					circleArr[circleArr.length-1].attr({\"fill\":\"90-$clr3\",\"stroke\":\"none\"});
					circleArr[circleArr.length-1].mouseover(function(){openStore=setTimeout(function(){if (!wd && !fbdClick){window.location=link".$arr['id']."}},800)}).mouseout(function(){clearTimeout(openStore)}).click(function(){openStore=setTimeout(function(){if (!wd && !fbdClick){window.location=link".$arr['id']."}},800)});\n":NULL;
		if ($store_crit && is_array($arr['flag']))
			foreach ($arr['flag'] as $val)
				print ($_SESSION['is_root'])? "flagsm".(++$i)."=paper".data::$wlev.".path(\"$val\");
					flagsm$i.attr($flag_attr);
					flagsm$i.scale(".data::$nscale.",".data::$nscale.",".data::$nscale.",".data::$nscale.");\n":
					"flagArr.push(paper.path(\"$val\"));\nflagArr[flagArr.length-1].attr($flag_attr);\n";
	}
	private function mtarget()
	{
		/*
		 * Module targeting
		 * Old function
		 */
		
		if (data::$tlev!=data::$wlev) return false;
		print "targeting.run=function(sclCount){
				if (sclCount==0){
					targetObj.target=paper".(($_SESSION['is_root'])?data::$tlev:NULL).".path(\"".data::$tpath."\");
					targetObj.target.attr({
						\"stroke\":\"".((isset($_SESSION['cat']))?"ffffff":"00c400")."\",
						\"fill\":\"00c400\"".(($_SESSION['is_root'])?NULL:",\"opacity\":\".7\"")."
					\n});\n".
					(($_SESSION['is_root'])?
					"targetObj.target.scale(".data::$nscale.",".data::$nscale.",".data::$nscale.",".data::$nscale.");\n":
					"targetObj.target.scale(".data::$midscale.",".data::$midscale.",".data::$midscale.",".data::$midscale.");\n").
					"targetObj.step=.05;
					targetObj.correct=.4;
					targetObj.vscale=1;
					targetObj.direct=false;
					targetObj.makeTargeting=setInterval(function(){	
						if (targetObj.vscale == 1 && targetObj.direct){targetObj.direct = false}else if (targetObj.vscale <= (targetObj.step + targetObj.correct)){targetObj.direct = true}
						if (!targetObj.direct){targetObj.vscale -= targetObj.step}else if (targetObj.direct){targetObj.vscale += targetObj.step}
						targetObj.target.scale(targetObj.vscale,targetObj.vscale);
					},60);
				}else{
					delete targetObj.step;
					delete targetObj.correct;
					delete targetObj.vscale;
					delete targetObj.direct;
					clearInterval(targetObj.makeTargeting);
					targetObj.target.remove();
				}
			}\ntargeting.run(0);\n";
	}
	protected function lev_switch()
	{
		/*
		 * old function
		 */
		if ($_SESSION['is_root']) return false;
		print "<div".self::ftw()." class=\"lev-switch lev-switch".data::wds().
			"\"><table cellspacing=\"5\" cellpadding=\"5\"><tr>".
			(($_SESSION['is_root'])?NULL:
			"<td><div class=\"scale-btn scl-plus pscale-pass\"></div></td>
			<td><div class=\"scale-btn scl-minus nscale-act\"></div></td>").
			"<td class=\"lsp-spacer\"></td>";
		foreach (data::$larr as $val)
			if ($val==$_SESSION['lev']) print "<td><div class=\"lev-btn lev".data::ln()."-btn$val-act\"></div></td>";
			else
			{
				$link=" onClick=\"window.location.href='".data::$traddr."core/html/blocks/body.php?";
				switch (data::$mgear)
				{
					case "store":
						$link.="lev=$val&catch=".$_SESSION['cat'].
							((is_array(data::$sl) && in_array($val,data::$sl))?"&sch=".$_SESSION['store']."&maponly":NULL);
					break;
					case "category": $link.="lev=$val&catch=".$_SESSION['cat'];
					break;
					case "si": $link.="lev=".$val.((in_array($val,data::$si_arr[data::$si]))?"&si=".data::$si:NULL);
					break;
					default: $link.="lev=".$val; 
				}
				$link.="'\"";
				print "<td><div$link class=\"lev-btn lev".data::ln()."-btn$val-pass\"></div></td>";
			}
		print "</tr></table></div>";
	}
	protected function si()
	{
		print "<div class=\"si-cont si-cont".data::wds()."\"><table cellspacing=\"10\" cellpadding=\"5\"><tr>";
		foreach (data::$si_arr as $key=>$val) 
		{
			if (isset(data::$si) && $key==data::$si)
			{
				unset($link);
				$is_act="-act";
			}
			else
			{
				$link=" onClick=\"window.location.href='./body.php?si=".$key.
					(($_SESSION['is_root'])?NULL:"&lev=".
					((in_array($_SESSION['lev'],$val))?$_SESSION['lev']:$val[0]))."'\"";
				unset($is_act);
			}
			print "<td><div$link class=\"si-btn si-btn-".$key.$is_act."\"></div></td>";
		}
		print "<td><div class=\"si-cls si-cls-btn\"></div></td></tr></table></div>
			<div class=\"si-bckgr si-bckgr".data::wds()."\" style=\"width:".((count(data::$si_arr)+1)*130).
			"px;\">&nbsp;</div><div class=\"si-add si-add".data::wds()."\"></div>";
	}
	protected function minisite()
	{
		$info=db::get_store();
		print "<div class=\"minisite minisite".data::wds()."\"></div>
			<div class=\"name-uplayer name-uplayer".data::wds()."\">".$info['name']."</div>
			<div class=\"logo-uplayer logo-uplayer".data::wds()."\" style=\"background-image:url(".
			data::$store_logo.");\"></div><div class=\"cls-btn-cross cls-btn-cross".
			data::wds()."\"></div><div class=\"info-uplayer info-uplayer".data::wds().
			"\"><div class=\"info-content\"><span>".db::get_store_levs()."</span><br/>";
		if (db::get_work_time())
		{
			print "<div class=\"work-time\">".db::lbl(9)."&nbsp;";
			foreach (service::work_time() as $val) print $val.(($val==end(service::work_time()))?NULL:", ");
			print "</div>";
		}
		print ((empty($info['phone']))?NULL:db::lbl(6)."&nbsp;".$info['phone']."<br/>").
			((empty($info['website']))?NULL:db::lbl(5)."&nbsp;".$info['website'])."</div></div>";
		if (service::animated_showcase() && file_exists(data::$raddr.data::$store_folder."animation/anime.php")) 
			include (data::$raddr.data::$store_folder."animation/anime.php");
		else
			print "<div class=\"pct-uplayer pct-uplayer".data::wds().
				"\" style=\"background-image:url(".data::$store_icon.");\"></div>";
		// Control elements
		print "<div class=\"ud-arr ud-arr".data::wds()."\" id=\"info-arr-up\">&uarr;</div>
			<div class=\"ud-arr ud-arr".data::wds()."\" id=\"info-arr-down\">&darr;</div>
			<div class=\"sbtns-uplayer sbtns-uplayer".data::wds()."\">".
			((service::mbtns_check(0))?"<div class=\"video-btn video-btn-bckgr sbtn-ver-text\">
				<span>".db::lbl(80)."</span></div>":NULL).
			((service::mbtns_check(1))?"<div class=\"top10-btn top10-btn-bckgr sbtn-ver-text\">
				<span>".db::lbl(81)."</span></div>":NULL).
			((service::mbtns_check(2))?"<div class=\"getdiscount-btn sbtn-ver-text\"><span>".db::lbl(82)."</span></div>":NULL).
			((db::lev_of_store(NULL))?"<div class=\"store-map-btn wall-cls-btn1 cls-btn-uplayer sbtn-ver-text\"><span>".
			db::lbl(83)."</span></div>":NULL)."</div>";
	}
	protected function stores_list()
	{
		print "<div class=\"slide-elem\"><table cellspacing=\"".data::$scs."\" cellpadding=\"".data::$scs."\"><tr>";
		foreach (service::stores_sort() as $key=>$val)
		{
			$cat=(service::store_cat($key))? service::store_cat($key) : 0;
			print "<td align=\"center\" valign=\"top\"><div class=\"store-btn-bckgr\"><div class=\"store-btn-frame\">
				<div id=\"$key\" class=\"store-btn ".
				((service::promoted_store($key))?
				"promo-list\" style=\"background-image:url(".
				data::$get_image.db::get_logo_id($key).");\">":"simple-list\">".$val)."</div></div></div></td>";
			if (!fmod(++$i,data::$max_stores))
			{
				print "</tr></table></div>\n<div class=\"slide-elem\" style=\"display:none;\">
					<table cellspacing=\"".data::$scs."\" cellpadding=\"".data::$scs."\"><tr>";
				$i=0;
			}
			elseif (!fmod($i,6)) print "</tr><tr>";
		}
		print "</tr></table></div>";
		if (data::sls_crit())
		{
			$stores_num=count(service::stores_sort());
			print "<div class=\"list-slider list-slider".data::wds()."\"><ul>";
			for ($i=1;$i<=(intval($stores_num/data::$max_stores)+((fmod($stores_num,data::$max_stores))?1:0));$i++) 
				print "<li class=\"ls-btn ls-btn-pass\">$i</li>";
			print "</ul></div>";
		}
	}
	protected function wall()
	{
		if (!service::mbtns_check(1)) return false;
		print "<div class=\"wall-uplayer wall-uplayer".data::wds().
			"\"><table cellspacing=\"0\" cellpadding=\"0\"><tr><td><ul class=\"wbtn-list wbtn-list".data::wds()."\">";
		if (data::$top10_cat) 
			foreach (data::$top10_cat as $key=>$val)
			{
				print "<li><div class=\"wall-btn\">$val</div></li>";
				$arr[]=$key;
			}
		print "</ul></td></tr><tr><td align=\"center\">
			<script src=\"http://dl.javafx.com/1.3/dtfx.js\"></script>
			<script>
				javafx({
					archive: \"".data::$traddr."animation/wall/WallGallery.jar\",
					width: ".data::$wall_w.",
					height: ".data::$wall_h.",
					code: \"ua.pp.leon.WallGallery.Main\",
					name: \"WallGallery\",
					id: \"WallGallery\"
				},{	top10id:".$arr[0]."	});
			</script><td><tr></table></div>";
	}
	protected function video_for_minisite()
	{
		if (!service::mbtns_check(0)) return false;
		print "<div class=\"video-list video-list".data::wds()."\"><table cellspacing=\"5\" cellpadding=\"5\"><tr>";
		for ($i=1;$i<=service::files_num("stores/".$_SESSION['tc']."/".$_SESSION['store']."/videos/","jpg");$i++)
		{
			print "<td><div class=\"video-thumb\"><div class=\"video-play\"></div>
				<img src=\"".data::$traddr."stores/".$_SESSION['tc']."/".$_SESSION['store']."/videos/$i.jpg\"/></div></td>";
			if (!fmod($i,3)) print "</tr><tr>";
		}
		print "</tr></table></div><div class=\"vplayer-layer vplayer-layer-pos vplayer-layer-pos".data::wds()."\">
			<div class=\"vplayer-cls vplayer-cls".data::wds()."\"></div><div id=\"videoplayer7267\"></div></div>";
	}
	protected function lott_loader()
	{
		print "<div class=\"third-layer third-layer".data::wds()."\">
			<script src=\"http://dl.javafx.com/1.3/dtfx.js\"></script>
			<script type=\"text/javascript\">
				var moduleId = ".$_SESSION['tc'].";
				var storeId = ".((isset($_SESSION['store']))?$_SESSION['store']:"null").";
				var langName = \"".$_SESSION['lang']."\";
			</script>
			<script type=\"text/javascript\">
				javafx({
					archive: \"".data::$anime."lottery.jar\",
					width: 1130,
					height: 835,
					code: \"ua.pp.leon.lottery.Main\",
					name: \"lottery\"
				},{
					moduleId: moduleId,
					storeId: storeId,
					langName: langName
				});
        	</script>
		</div>\n";
	}
	protected function drum_loader()
	{
		print "<div class=\"second-layer second-layer".data::wds()."\">
			<script src=\"http://dl.javafx.com/1.3/dtfx.js\"></script>
			<script type=\"text/javascript\">
				var moduleId = ".$_SESSION['tc'].";
				var langName = \"".$_SESSION['lang']."\";
			</script>
			<script>
				javafx(
					{
						archive: \"".data::$anime."magic-drum.jar\",
						width: 1130,
						height: 835,
						code: \"ua.pp.leon.magicdrum.Main\",
						name: \"magic-drum\"
					},{
						moduleId: moduleId,
						langName: langName
					}
				);
			</script></div>";
	}
	protected function mplayer_loader()
	{
		return false;
		print "<div class=\"mplayer\"><script src=\"http://dl.javafx.com/1.3/dtfx.js\"></script>
			<script>
				javafx({
					archive: \"".data::$traddr."animation/mplayer/simple-mplayer.jar\",
					width: 1130,
					height: 650,
					code: \"ua.pp.leon.simplemplayer.Main\",
					name: \"simple-mplayer\"
				});
			</script>
		</div>";
	}
	protected function hot_window()
	{
		print "<div class=\"hot-window hot-window".data::wds()."\"><div class=\"hot-dialer hot-dialer".data::wds()."\">
			<script src=\"http://dl.javafx.com/1.3/dtfx.js\"></script>
			<script>
				var moduleId = ".$_SESSION['tc'].";
				javafx(
					{
						archive: \"".data::$anime."dialer.jar\",
						width: 330,
						height: 500,
						code: \"ua.pp.leon.dialer.Test\",
						name: \"dialer\"
					},{
						moduleId: moduleId
					}
				);
			</script>
			</div></div><div class=\"hot-text hot-text".data::wds().
			"\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
			<tr><td colspan=\"2\" valign=\"top\" id=\"hot-text-cell\"><div".self::ftw().">".db::lbl(13)."</div></td></tr>
			<tr><td><!-- div class=\"hot-cancel-spam\"></div --></td><td>
			<!-- div".self::ftw().">".db::lbl(14)."</div --></td></tr>
			<tr><td colspan=\"2\" valign=\"bottom\" id=\"hot-text-cell2\"><div".self::ftw().">".
			db::lbl(11)."</div></td></tr></table></div><div class=\"hot-cls hot-cls-btn hot-cls-btn".
			data::wds()." hcls-bridge-hclear\"></div>";
	}
	protected function lang_panel()
	{
		print "<div class=\"lang-panel lang-panel".data::wds()."\">
		<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>
		<table width=\"100%\" cellspacing=\"7\" cellpadding=\"7\">";
		foreach (data::$lang_arr as $key=>$val)
		{
			$crit=($key==$_SESSION['lang'])? true : false;
			print "<tr><td align=\"center\" valign=\"middle\">".
				(($crit)?NULL:"<a href=\"".data::$traddr."core/html/blocks/rstrip.php?lang=$key\" target=\"frametop\">").
				"<div class=\"lang-btn lang-btn".data::wds()." ".
				(($crit)?"lang-btn-act\">$val</div>":
				"lang-btn-pass\" onClick=\"window.location.href='".
				data::$traddr."core/html/body.php?lang=$key'\">$val</div></a>")."</td></tr>";
		}
		print "</table></td></tr><tr><td><div class=\"arr-up\"></div></td></tr></table></div>";
	}
	protected function ftw()
	{
		// needs to be removed
		return (data::rtl())? NULL : " dir=\"ltr\"";
	}
	protected function hncat()
	{
		$i=0;
		print "<div class=\"hncat hncat".data::wds()."\"><table cellspacing=\"4\" cellpadding=\"4\" border=\"0\">";
		foreach (data::$carr as $val)
			print "<tr><td><div class=\"cbtn cbtn".($i++)." cbtn-pass\"><span>".
				$val['name_'.$_SESSION['lang']]."</span></div></td></tr>";
		print "<tr><td>
			<div class=\"cbtn sibtn-pass sibtn cls-btn-uplayer cls-btn-real2 info-cls wall-cls-btn1\"><span>".
			db::lbl(10)."</span></div></td></tr></table></div>";
	}
	protected function fbanners()
	{
		if (!is_array(db::get_bann_stores())) return false;
		print "<div class=\"bann-layer".(($_SESSION['mode']=="third")?" anime-spacer":NULL)."\">
			<table cellspacing=\"5\" cellpadding=\"3\"><tr>";
		foreach (db::get_bann_stores() as $val)
		{
			print "<td><div class=\"bann-cell ".
			(($_SESSION['mode']=="map" && $_SESSION['store']==$val)?"bann-act":"bann-pass").
			"\" onClick=\"window.location.href='".data::$traddr."core/html/blocks/body.php?sch=$val&catch=".
				service::store_cat($val)."&lev=".db::lev_of_store($val)."'\">
			<div class=\"bann-logo\" style=\"background-image:url(".data::$get_image.db::get_logo_id($val)
			.");\"></div></div></td>";
			if (++$n==data::$bann_num) break;
			if (!(++$i&1)) print "</tr><tr>";
		}
		print "</tr></table></div>";
	}
	protected function frstrip()
	{
		foreach (service::arr_rafi(db::get_rstrip(),1) as $val) $rstrip.=$val."&nbsp;&nbsp;&nbsp;";
		print "<div><table cellspacing=\"0\" cellpadding=\"0\" class=\"rstrip-table\"><tr>
			<td id=\"unavi-lbl\"></td><td><div class=\"hor-scroller\">
			<div class=\"scrollingtext\">$rstrip</div></div></td></tr></table></div>";
	}
	protected function cp()
	{
		// reset button
		print "<div class=\"reset-btn reset-btn-act\"><span>".db::lbl(73)."</span></div>";
	}
	protected function bc()
	{
		print "<div class=\"bc-layer bc-act\">".db::get_level_name()."</div>";
	}
	protected function mode_btns()
	{
		print "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"><tr>
			<td><div class=\"mode-switch lang-pass\"><span>Language</span></div></td>
			<td><div class=\"mode-switch map-btn mbtn-act\"><span>".db::lbl(74)."</span></div></td>
			<td><div class=\"mode-switch drum-btn drum-pass\"><span>".db::lbl(75)."</span></div></td>
			<td><div class=\"mode-switch lott-btn lott-pass\"><span>".db::lbl(76)."</span></div></td>
			<td><div class=\"mode-switch hot-btn hot-pass cls-btn-real2 cls-btn-uplayer wall-cls-btn1 si-cls\">
			<span>".db::lbl(77)."</span></div>
			</td></tr></table>";
	}
	// JavaScript functions block
	protected function js_kit()
	{
		foreach (array(
			"jquery.min",
			"raphael.min",
			"body",
			"maps"
			) as $val) 
			print "<script type=\"text/javascript\" language=\"JavaScript\" src=\"".data::$traddr."js/$val.js\"></script>\n";
		if (service::mbtns_check(0)) 
			print "<script type=\"text/javascript\" language=\"JavaScript\" src=\"".data::$traddr.
				((service::video_style())?"stores/".$_SESSION['tc']."/".$_SESSION['store']."/videos":"js").
				"/video.js\"></script>\n";
	}
	// old functions
	private function bckgr_otp()
	{
		// backrounds output
		foreach (data::$lb as $val)
			if ($val['lev']==data::$wlev)
				print ($_SESSION['is_root'])?"var lb".(++$i)."=paper".data::$wlev.".path(\"".$val['path']."\");
					lb$i.attr({".$val['attr']."});
					lb$i.scale(".data::$nscale.",".data::$nscale.",".data::$nscale.",".data::$nscale.");\n":
					"bckgrArr.push(paper.path(\"".$val['path']."\"));
					bckgrArr[bckgrArr.length-1].attr({".$val['attr']."});\n";
		// background text output
		if (!$_SESSION['is_root'] && is_array(data::$btl))
		{
			foreach (data::$btl as $val)
				if ($val['lev']==data::$wlev)
					print "textArr.push(paper.text(".$val['coords'].",\"".
						(($val['break']=="no")?db::lbl($val['id']):
						service::break_the_name(db::lbl($val['id']),$val['break']))."\"));
						textArr[textArr.length-1].attr({".$val['attr'].",\"direction\":\"".$_SESSION['wdir']."\"});
						textArr[textArr.length-1].rotate(".$val['rotate'].");\n";
		}
	}
	private function bridge2rstrip()
	{
		print "<script type=\"text/javascript\" language=\"JavaScript\">
				var rsDir=".(($_SESSION['wdir']=="ltr")?"'right'":"'left'").";
			</script>\n";
	}
	private function js_objhl()
	{
		// it outputs the vector map
		print "<script type=\"text/javascript\" language=\"JavaScript\">
			var targetObj=new Object();
			var targeting=new Object(0);\n".
			(($_SESSION['is_root'])?NULL:
				"var bckgrArr=new Array();
				var areaArr=new Array();
				var circleArr=new Array();
				var textArr=new Array();
				var siArr=new Array();
				var flagArr=new Array();
				var mapPointer;
				var wd=false;
				var openStore;
				var sclCount=0;\n".
				((is_array(data::$btl))?"var btlArr=new Array();\n":NULL)).
				"function mapotp(){\n".
				(($_SESSION['is_root'])?NULL:"setTimeout(function(){fbdClick=false},".data::$mo_delay.");\n");
		if ($_SESSION['is_root'])
		{
			data::$wlno=0;
			$arr=db::get_config("map.xml");
			foreach (service::canvas_coords() as $tval) 
			{
				data::make_wlev();
				if (isset($arr->tcorr) && data::$tlev==data::$wlev)
					foreach($arr->tcorr as $val)
						if ((isset($val->attributes()->mod) && intval($val->attributes()->mod)==$_SESSION['modid']) || 
							!isset($val->attributes()->mod))
						{
							if (isset($val->attributes()->wdsrc)) self::$wdsrc=(string)$val->attributes()->wdsrc;
							if (isset($val->attributes()->hdsrc)) self::$hdsrc=(string)$val->attributes()->hdsrc;
						}
				print "var paper".data::$wlev."=Raphael($tval[0],$tval[1],".(data::$canvas_w*data::$nscale*self::$wdsrc).
					",".(data::$canvas_h*data::$nscale*self::$hdsrc).");\n";
				self::bckgr_otp();
				foreach (service::whole_map() as $val)
					foreach ($val['area'] as $fval)
						print "var areasm".$val['id'].(++$i)."=paper".data::$wlev.".path(\"$fval\");
							areasm".$arr['id'].$i.".attr({\"fill\":\"$clr1\",\"stroke\":\"$clr2\",\"stroke-width\":\"1\"});
							areasm".$arr['id'].$i.".scale(".data::$nscale.",".data::$nscale.",".data::$nscale.",".
							data::$nscale.");\n";
				print "var lnpaper".data::$wlev."=Raphael(".($tval[0]*data::$ln_xpos).",".
					($tval[1]*data::$ln_ypos).",".(data::$canvas_w*data::$nscale).",".data::$lnh.");
					var levname".data::$wlev."=lnpaper".data::$wlev.".text(".data::$ln_coords.",\"".
					((isset(data::$ln_break))?service::break_the_name(db::get_level_name(),data::$ln_break):
					db::get_level_name()).
					"\");\nlevname".data::$wlev.".attr({
						\"font\":\"Tahoma\",
						\"font-size\":\"".data::$ln_size."\",
						\"font-weight\":\"bold\",
						\"fill\":\"#00a7e6\",
						\"direction\":\"".((data::rtl())?"rtl":"ltr")."\",
					});
					var lnlinker".data::$wlev."=lnpaper".data::$wlev.".rect(0,0,".
					(data::$canvas_w*data::$nscale*0.95).",".data::$lnh.");
					lnlinker".data::$wlev.".attr({
						\"fill\":\"#ffffff\",
						\"opacity\":\"0.0\"
					});
					var linker".data::$wlev."=paper".data::$wlev.".rect(0,0,".
					(data::$canvas_w*data::$nscale*0.95).",".(data::$canvas_w*data::$nscale*0.6).");
					linker".data::$wlev.".attr({
						\"fill\":\"#ffffff\",
						\"opacity\":\"0.0\"
					});
					var openLevel; // ???
					$(lnlinker".data::$wlev.".node).click(function(){ window.location=\"".self::$lev_linker."\" });
					$(linker".data::$wlev.".node).click(function(){	window.location=\"".self::$lev_linker."\" });\n";
				self::mtarget();
			}
		}
		else
		{
			// Here implemented a scaling
			data::make_wlev();
			print "var paper=Raphael(".data::$corr_xmap.",".data::$corr_ymap.",".data::$canvas_w.",".data::$canvas_h.");
				mapPointer = paper.rect(0,0,1,1);
				mapPointer.attr(\"stroke\",\"none\");\n";
			self::bckgr_otp();
			if (is_array(service::rest_of_map())) foreach (service::rest_of_map() as $val) self::map_output($val,FALSE);
			switch (data::$mgear)
			{
				case "category":
				case "store":
					if (is_array(service::obj_map())) foreach (service::obj_map() as $val) self::map_output($val,TRUE);
				break;
				case "si":
					if (is_array(data::$ssi_arr))
						foreach (data::$ssi_arr as $val)
							print "siArr.push(paper.path(\"$val\"));
								siArr[siArr.length-1].attr({
									\"fill\":\"#4de95a\",
									\"stroke\":\"#007eb2\",
									\"stroke-width\":\"4\"
								});\n".((isset(data::$midscale))?
								"siArr[siArr.length-1].scale(".data::$midscale.",".data::$midscale.",".
								data::$midscale.",".data::$midscale.");\n":NULL);
			}
			if (isset(data::$midscale))
				print "for (var i=0;i<bckgrArr.length;i++){
						bckgrArr[i].scale(".data::$midscale.",".data::$midscale.",".
						data::$midscale.",".data::$midscale.");
					}\nfor (var i=0;i<areaArr.length;i++){
						areaArr[i].scale(".data::$midscale.",".data::$midscale.",".
						data::$midscale.",".data::$midscale.");
					}\nif (circleArr.length>0){
						for (var i=0;i<circleArr.length;i++){
							circleArr[i].scale(".data::$midscale.",".data::$midscale.",".
							data::$midscale.",".data::$midscale.");
						}
					}\nfor (var i=0;i<textArr.length;i++){
						textArr[i].scale(".data::$midscale.",".data::$midscale.",".
						data::$midscale.",".data::$midscale.");
					}\n".((data::$mgear=="store")?"for (var i=0;i<flagArr.length;i++){flagArr[i].scale(".data::$midscale.",".data::$midscale.",".data::$midscale.",".data::$midscale.")}\n":NULL);
			self::mtarget();
		}
		print "}\n$(document).ready(function(){\nmapotp()\n});\n</script>\n";
	}
}
?>