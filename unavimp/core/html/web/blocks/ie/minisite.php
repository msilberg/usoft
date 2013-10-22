<?php
	$info=db::get_store();
	$wdir=data::gvar("wdir");
	service::set_mbtns_arr();
	//service::history_insert(5);
?>
<div class="minisite minisite-<?php print $wdir ?>">
	<div class="logo-uplayer logo-uplayer-<?php print $wdir ?>"	style="background-image:url(<?php data::get_logo() ?>);"></div>
	<div class="cls-btn-cross cls-btn-cross-<?php print $wdir ?>">
		<div class="cls-btn-icon"></div>
	</div>
	<div class="info-uplayer info-uplayer-<?php print $wdir ?>">
		<div class="info-frame">
			<div class="info-content">
				<div class="info-text">
					<span>
					<?php
						if ($_SESSION['store']==0) data::lbl_otp(97);
						else
						{
							$nn=db::get_new_number(NULL);
							print "<b>".$info['name'].((!empty($nn))?",&nbsp;".db::lbl(116)."&nbsp;".$nn:NULL)."</b>";
						}
					?>
					</span>
					<div class="work-time">
					<?php
						if (db::get_work_time())
						{
							data::lbl_otp(9);
							print "&nbsp;";
							foreach (service::work_time() as $val) print $val.(($val==end(service::work_time()))?NULL:", ");
						}
					?>
					</div>
					<div class="phone-number">
					<?php
						if (service::mbtns_check(5) && !empty($info['phone']))
						{
							data::lbl_otp(6);
							print ":&nbsp;".$info['phone'];
						}
						//data::lbl_otp(98); // <= call center
					?>
					</div>
					<div class="website">
					<?php
						if (!empty($info['website']))
						{
							data::lbl_otp(5);
							print ":&nbsp;".$info['website'];
						}
					?>
					</div>
					<div class="contact-person">
					<?php
						if (!empty($info['cp']))
						{
							data::lbl_otp(93);
							print ":&nbsp;".$info['cp'];
						}
					?>
					</div>
					<div class="description">
					<?php
						if (!empty($info['descr']))
						{
							if (in_array($_SESSION['cat'],array_values(data::$spec_cat)))
							{
								data::lbl_otp(113);
								print "&nbsp;<br/>";
								foreach (json_decode($info['descr']) as $key=>$val) print "<b>".strtoupper($key)."</b>:&nbsp;$val<br/>";
							}
							else
							{
								data::lbl_otp(94);
								print ":&nbsp;".$info['descr'];
							}
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pct-uplayer pct-uplayer-<?php print $wdir ?>">
	<?php
		$file=data::gvar("raddr")."/stores/".$_SESSION['tc']."/".$_SESSION['store']."/animation/anime.php";
		if (service::check_feat(NULL,8) && file_exists($file)) include $file;
		else print "<div class=\"showcase showcase-$wdir\"><img src=\"".data::get_showcase()."\" /></div>";
	?>
	</div>
	<!-- Control elements -->
	<div class="ud-arr ud-arr-act ud-arr-<?php print $wdir ?>" id="info-arr-up"><div></div></div>
	<div class="ud-arr ud-arr-pass ud-arr-<?php print $wdir ?>" id="info-arr-down"><div></div></div>
	<div class="sbtns-uplayer sbtns-uplayer-<?php print $wdir ?>">
	<?php
		$i=3;
		$vars=data::gvar("mbtn_vars");
		if (service::som_check())
		{
			print "<div class=\"storemap-btn sm-btn sm-btn-pass\" style=\"top:335px;\"><div><span class=\"span-in-middle3\">";
			data::lbl_otp(83);
			print "</span></div></div>";
		}
		/*if (service::mbtns_check(3))
			print "<div id=\"".(++$no)."\" class=\"contact-btn sm-btn sm-btn-pass\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\">
				<div><span class=\"span-in-middle3\">".db::lbl(91)."</span></div></div>";
		if (service::mbtns_check(2))
			print "<div id=\"".(++$no)."\" class=\"gdisc-btn sm-btn sm-btn-pass\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\">
				<div><span class=\"span-in-middle3\">".db::lbl(82)."</span></div></div>";*/
		if (service::mbtns_check(1))
			print "<div id=\"".(++$no)."\" class=\"top10-btn sm-btn sm-btn-pass\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\">
				<div><span class=\"span-in-middle3\">".db::lbl((in_array(14,db::get_store_features(NULL)))?90:81)."</span></div></div>";
		if (service::mbtns_check(6))
			print "<div id=\"".(++$no)."\" class=\"price-btn sm-btn sm-btn-pass\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\">
				<div><span class=\"span-in-middle3\">".db::lbl(125)."</span></div></div>";
		if (service::mbtns_check(0))
			print "<div id=\"".(++$no)."\" class=\"video-btn sm-btn sm-btn-pass\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\">
				<div><span class=\"span-in-middle3\">".db::lbl(80)."</span></div></div>";	
	?>
	</div>
</div>