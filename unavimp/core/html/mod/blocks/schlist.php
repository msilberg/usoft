<?php
	service::reset_slider();
	$sch_arr=db::make_search();
	$_SESSION['sch_num']=count($sch_arr);
	$arrh=service::get_slides_heigts();
?>
<div class="sch-container sch-container-<?php print data::gvar("wdir") ?>">
	<div class="slides-scope slides-scope-<?php print data::gvar("wdir") ?>" id="schlist">
		<div class="slides-cont">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<div class="slide-cell sc-sch">
							<table cellspacing="<?php print data::$scs_st ?>" cellpadding="<?php print data::$scs_st ?>" style="height:<?php print $arrh[0] ?>px;">
							<?php
								if (is_array($sch_arr) && count($sch_arr) > 0)
									foreach ($sch_arr as $val)
									{
										print "<tr><td align=\"center\" valign=\"top\">
											<div id=\"".$val->{'id'}."\" class=\"store-btn-bckgr sb-sch-list store-btn-bckgr-pass\">
											<div id=\"sbf-sch\" class=\"store-btn-frame\">
											<div class=\"sch-btn2\">".$val->{'txt'}."</div></div></div></td></tr>";
										if (!fmod(++$i,data::$max_sch))
										{
											print "</table></div></td><td><div class=\"slide-cell sc-sch\">
												<table cellspacing=\"".data::$scs_st."\" cellpadding=\"".data::$scs_st."\" style=\"height:".$arrh[++$j]."px;\">";
											$i=0;
										}
									}
								else
								{
									print "<tr><td>";
									data::lbl_otp(92);
									print "</td></tr>";
								}
							?>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php data::loadblock("wallheader") ?>
</div>