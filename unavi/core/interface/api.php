<?php
	/*
	 * API modes:
	 * 1 - categoried stores list output
	 * 2 - get text label
	 * 3 - levels background
	 * 4 - levels background text
	 * 5 - stores output for map build
	 * 6 - stores' id's array which belong to chosen category for highlighting them on the map
	 * 7 - get flag of the chosen store
	 * 8 - get store's category
	 * 9 - level name output
	 * 10 - module targeting output
	 * 11 - gets levels where the store is being presented
	 * 12 - Top10 catalagues id's
	 * 13 - calculates the number of video trailers in the folder of chosen store
	 * 14 - outputs necessary parameters required to build store's specific video player
	 * 15 - adds history statistics of visit for map stores at the certain level only
	 * 16 - adds history statistics for the stores presented on permanent banners
	 * 17 - checks defined store's features
	 * 18 - outputs current store's name
	 * 19 - outputs array of stores' Id's which have screensaver feature, array has two types "anime" and "comm"
	 */
	require_once("/var/www/public_html/unavi/core/loader.inc");
	$build=new data(NULL,NULL);
	if (isset($_GET['query']))
	{
		if (isset($_GET['wlev'])) $build->wlev=intval($_GET['wlev']);
		switch (intval($_GET['query']))
		{
			case 1:	$build->loadblock($_GET['block']);
			break;
			case 2: $build->lbl_otp(intval($_GET['lbl']));
			break;
			case 3:	$build->lb_otp();
			break;
			case 4: $build->btl_otp();
			break;
			case 5:	$build->stores_otp();
			break;
			case 6:	$build->cat_stores_otp();
			break;
			case 7: $build->flag_otp();
			break;
			case 8: $build->gstore_cat_otp(intval($_GET['sch']));
			break;
			case 9: $build->level_name_otp();
			break;
			case 10: $build->mtarget_otp();
			break;
			case 11: $build->los_otp();
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
			case 18: $build->store_name_otp();
			break;
			case 19: $build->scrs_stores_otp();
			break;
			case 20: $build->scrs_num_otp();
			break;
			default: $build->test_otp();
		}
	}
	elseif (isset($_GET['var']))
	{
		// get variable
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