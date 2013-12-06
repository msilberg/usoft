<?php
	require_once("core/loader.inc");
	$build=new data(NULL,NULL);
	if (isset($_GET['query']))
	{
		if (isset($_GET['wlev'])) $build->wlev=intval($_GET['wlev']);
		switch (intval($_GET['query']))
		{
			case 1: $build->loadblock($_GET['block']);
			break;
			case 2: $build->lbl_otp(stristr($_GET['lbl'],",")?(string)$_GET['lbl']:intval($_GET['lbl']));
			break;
			case 3: $build->stores_otp();
			break;
			case 4: $build->get_spec_cat($_GET['cname']);
			break;
			case 5: $build->promoted_stores_otp();
			break;
			case 6: $build->sch_id_otp();
            break;
			case 7: $build->scat_name_otp();
			break;
			case 8: $build->gstore_cat_otp(intval($_GET['sch']));
			break;
			case 9: $build->store_coords_otp();
			break;
			case 10: $build->mtarget_otp();
			break;
			case 12: $build->ttcat_otp();
			break;
			case 13: $build->videos_count_otp();
			break;
			case 14: $build->store_video_otp();
			break;
			case 15: $build->map_history_insert();
			break;
			case 16: $build->bann_only_history();
			break;
			case 17: $build->check_feat_otp($_GET['store'],$_GET['feat']);
			break;
			case 18: $build->store_name_otp((isset($_GET['sch']))?$_GET['sch']:NULL);
			break;
			case 19: $build->mod_coords_otp();
			break;
			case 20: $build->scrs_stores_otp();
			break;
			case 21: $build->scrs_num_otp(); 
			break;
			case 22: $build->content_check_otp();
			break;
			case 23: $build->standby_stores_otp();
			break;
			case 24: $build->ssi_otp(intval($_GET['sich']));
			break;
			default:
				header("HTTP/1.0 404 Not Found");
				print "<h1>404 Not Found</h1>The page that you have requested could not be found.";
				exit();
		}
	}
	elseif (isset($_GET['var']))
	{
		// get variable 222
		foreach (explode(",",$_GET['var']) as $val) $arr[$val]=$build->$val;
		print json_encode($arr);
	}
	elseif (isset($_GET['setvar']))
	{
		// set variable and get it back
		if (!isset($_GET['name']) || !isset($_GET['val'])) return false;
		$name=explode(",",$_GET['name']);
		$val=explode(",",$_GET['val']);
		for ($i=0;$i<count($name);$i++)
		{
			if (isset($val[$i])) $build->$name[$i]=$build->rvp_otp($val[$i]);
			$arr[$name[$i]]=$build->$name[$i];
		}
		print json_encode($arr);
	}
?>
