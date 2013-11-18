<?php
	$info=db::get_store();
	$wdir=data::gvar("wdir");
	service::history_insert(5);
?>
<div class="minisite minisite-<?php print $wdir ?>"></div>
<div class="logo-uplayer logo-uplayer-<?php print $wdir ?>" style="background-image:url(<?php print data::gvar("store_logo") ?>);"></div>
<div class="cls-btn-cross cls-btn-cross-<?php print $wdir ?>">
	<div class="cls-btn-icon"></div>
</div>
<div class="info-uplayer info-uplayer-<?php print $wdir ?>">
	<div class="info-frame">
		<div class="info-content">
			<div class="info-text">
				<span><?php print $info['name'].$info['descr']."<br/>".db::get_store_levs() ?></span><br/>
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
					if (!empty($info['phone']))
					{
						data::lbl_otp(6);
						print "&nbsp;".$info['phone'];
					}
				?>
				</div>
				<div class="website">
				<?php
					if (!empty($info['website']))
					{
						data::lbl_otp(5);
						print "&nbsp;".$info['website'];
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
	else print "<div class=\"showcase showcase-$wdir\" style=\"background-image:url(".data::gvar("store_showcase").");\"></div>";
?>
</div>
<!-- Control elements -->
<div class="ud-arr ud-arr-act ud-arr-<?php print $wdir ?>" id="info-arr-up"><div></div></div>
<div class="ud-arr ud-arr-pass ud-arr-<?php print $wdir ?>" id="info-arr-down"><div></div></div>
<div class="sbtns-uplayer sbtns-uplayer-<?php print $wdir ?>">
<?php
	$i=4;
	$vars=data::gvar("mbtn_vars");
	if (db::lev_of_store(NULL))
	{
		print "<div class=\"storemap-btn storemap-btn-$wdir\"><div>";
		data::lbl_otp(83);
		print "</div></div>";
	}
	/*if (service::mbtns_check(3))
		print "<div class=\"contact-btn contact-btn-pass sm-btn store-btn-rad-$wdir\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\"><div>".db::lbl(91)."</div></div>";*/
	if (service::mbtns_check(2))
		print "<div class=\"gdisc-btn sm-btn store-btn-rad-$wdir\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\"><div>".db::lbl(82)."</div></div>";
	/*if (service::mbtns_check(1))
		print "<div class=\"top10-btn sm-btn top10-btn-pass store-btn-rad-$wdir\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\">
			<div>".db::lbl((in_array(14,db::get_store_features(NULL)))?90:81)."</div></div>";*/
	if (service::mbtns_check(0))
		print "<div class=\"video-btn sm-btn video-btn-pass store-btn-rad-$wdir\" style=\"top:".(($i--)*$vars['mlt']-$vars['fct'])."px;\"><div>".db::lbl(80)."</div></div>";	
?>
</div>