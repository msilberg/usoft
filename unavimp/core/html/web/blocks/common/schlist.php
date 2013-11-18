<?php service::reset_slider() ?>
<div class="sch-container sch-container-<?php print data::gvar("wdir") ?>">
	<div class="slides-scope slides-scope-<?php print data::gvar("wdir") ?>" id="schlist">
		<div class="slides-cont">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<div class="slide-cell">
							<table cellspacing="<?php print data::$scs ?>" cellpadding="<?php print data::$scs ?>">
							<?php
								$sch_arr=db::make_search();
								if (is_array($sch_arr) && count($sch_arr) > 0)
								{
									foreach ($sch_arr as $val)
									{
										print "<tr><td align=\"center\" valign=\"top\">
											<div id=\"".$val->{'id'}."\" class=\"store-btn-bckgr store-btn-bckgr-pass\"><div class=\"store-btn-frame\">
											<div class=\"store-btn simple-list\">".$val->{'txt'}."</div></div></div></td></tr>";
										if (!fmod(++$i,data::$max_scats))
										{
											print "</table></div></td><td><div class=\"slide-cell\">
												<table cellspacing=\"".data::$scs."\" cellpadding=\"".data::$scs."\">";
											$i=0;
										}
										$num++;
									}
									$_SESSION['sch_num']=$num;
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