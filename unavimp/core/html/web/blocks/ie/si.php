<?php
	$wdir=data::gvar("wdir");
	$si_arr=db::get_si();
	$_SESSION['si_num']=count($si_arr);
?>
<div class="si-cont si-cont-<?php print $wdir ?>">
	<div class="slides-scope slides-scope-<?php print $wdir ?>" id="si">
		<div class="slides-cont">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<div class="slide-cell">
							<table cellspacing="<?php print data::$scs_si ?>" cellpadding="<?php print data::$scs_si ?>">
								<tr>
								<?php
									foreach ($si_arr as $val)
									{
										print "<td><div class=\"si-bckgr ".(($_SESSION['si']==$val['id'])?"si-bckgr-act":"si-bckgr-pass")."\" title=\"".
											$val['name_'.$_SESSION['lang']]."\"><span>".service::upper_case($val['name_'.$_SESSION['lang']])."</span>
											<div id=\"".$val['id']."\" style=\"background-image:url(".data::gvar("traddr").
											"graphics/si/".$_SESSION['mode']."/si".$val['id'].".png);\" class=\"si-btn si-btn".$val['id']."\"></div></div></td>";
											if (!fmod(++$i,data::$max_si))
											{
												print "</tr></table></div></td><td><div class=\"slide-cell\">
													<table cellspacing=\"".data::$scs_si."\" cellpadding=\"".data::$scs_si."\"><tr>";
												$i=0;
											}
											elseif (!fmod($i,data::$si_cols)) print "</tr><tr>";
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
	<?php data::loadblock("wallheader") ?>
</div>