<?php
	//service::reset_slider();
	$st_arr=service::stores_sort();
	$_SESSION['st_num']=count($st_arr);
	$arrh=service::get_slides_heigts();
	$prmst_arr=service::scat_prm_st();
	$st_new_arr=db::get_store_new_name(NULL);
	if (count($st_arr)==0)
	{
		print "<div class=\"no-results\">";
		data::lbl_otp(92);
		print "</div>";
		return false;
	}
?>
<div class="stores-container">
	<div class="slides-scope slides-scope-<?php print data::gvar("wdir") ?>" id="stores">
		<div class="slides-cont">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<div class="slide-cell sc-stores">
							<table cellpadding="<?php print data::$scs_st ?>" cellspacing="<?php print data::$scs_st ?>" style="height:<?php print $arrh[0] ?>px;">
								<tr>
								<?php
									foreach ($st_arr as $key=>$val)
									{
										print "<td><div class=\"rst-el rst-el-pass\" id=\"$key\"><div".
											((isset($prmst_arr[$key]))?" style=\"display:block;background-image:url(".$prmst_arr[$key].");\">":"><span>".
											$val.(is_array($st_new_arr) && isset($st_new_arr[$key])?", ".$st_new_arr[$key]:NULL)."</span>")."</div></div></td>";
										if (!fmod(++$i,data::$max_stores))
										{
											print "</tr></table></div></td><td><div class=\"slide-cell sc-stores\">
												<table cellspacing=\"".data::$scs_st."\" cellpadding=\"".data::$scs_st."\" style=\"height:".$arrh[++$j]."px;\"><tr>";
											$i=0;
										}
										elseif (!fmod($i,data::$stores_cols)) print "</tr><tr>";
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
</div>