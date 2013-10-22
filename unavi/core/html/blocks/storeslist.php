<?php service::history_insert(4) ?>
<div class="slides-scope slides-scope-<?php print data::gvar("wdir") ?>">
	<div class="slides-cont">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<div class="slide-cell">
						<table cellspacing="<?php print data::gvar("scs") ?>" cellpadding="<?php print data::gvar("scs") ?>">
							<tr>
							<?php
								foreach (service::stores_sort() as $key=>$val)
								{
									$cat=(service::store_cat($key))? service::store_cat($key) : 0;
									print "<td align=\"center\" valign=\"top\">
										<div id=\"$key\" class=\"store-btn-bckgr\"><div class=\"store-btn-frame\">
										<div class=\"store-btn ".
										((service::promoted_store($key))?"promo-list\" style=\"background-image:url(".
										data::gvar("get_image").db::get_logo_id($key).");\">":"simple-list\">".$val)."</div></div></div></td>";
									if (!fmod(++$i,data::gvar("max_stores")))
									{
										print "</tr></table></div></td><td><div class=\"slide-cell\">
											<table cellspacing=\"".data::gvar("scs")."\" cellpadding=\"".data::gvar("scs")."\"><tr>";
										$i=0;
									}
									elseif (!fmod($i,6)) print "</tr><tr>";
									$num++;
								}
							?>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php
	if ($num>data::gvar("max_stores"))
	{
		$wdir=data::gvar("wdir");
		$_SESSION['slides_num']=intval($num/data::gvar("max_stores"))+((fmod($num,data::gvar("max_stores")))?1:0);
		$crit=$_SESSION['slides_num']>data::$ls_max_num;
		$_SESSION['gs_num']=($crit)? intval($_SESSION['slides_num']/data::$ls_max_num)+((fmod($_SESSION['slides_num'],data::$ls_max_num))?1:0) : 1;
		print "<div class=\"list-slider list-slider-$wdir\">".
			(($crit)?"<table cellspacing=\"0\" cellpadding=\"0\"><tr>
			<td><div id=\"beg\" class=\"ls-move ls-move-beg ls-move-act ls-move-beg-$wdir\"><div class=\"ls-arr-beg-$wdir\"></div></div></td>
			<td><div class=\"ls-btn-scope\"><div class=\"ls-btn-cont\">":NULL)."<table cellspacing=\"0\" cellpadding=\"0\"><tr>";
		for ($i=1;$i<=$_SESSION['slides_num'];$i++) print "<td><div class=\"ls-btn ls-btn-".(($i==1)?"act":"pass")."\">$i</div></td>";
		print "</tr></table>".(($crit)?"</div></div></td>
			<td><div id=\"end\" class=\"ls-move ls-move-end ls-move-pass ls-move-end-$wdir\"><div class=\"ls-arr-end-$wdir\"></div></div></td></tr></table>":NULL)."</div>";
	}
	else
	{
		$_SESSION['slides_num']=1;
		$_SESSION['gs_num']=1;
	}
?>
