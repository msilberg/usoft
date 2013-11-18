<?php
	$fst_arr=db::get_stores_with_content();
	$prmst_arr=service::scat_prm_st();
	$st_new_arr=db::get_store_new_name(NULL);
	$_SESSION['fst_num']=count($fst_arr);
?>
<div class="stores-container">
	<div class="slides-scope slides-scope-<?php print data::gvar("wdir") ?>" id="filter-stores">
		<div class="slides-cont">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<div class="slide-cell">
							<table cellpadding="<?php print data::$scs ?>" cellspacing="<?php print data::$scs ?>">
								<tr>
								<?php
									foreach ($fst_arr as $val)
									{
										print "<td><div class=\"rst-el rst-el-pass\" id=\"".$val['id']."\"><div><span class=\"rst-el-span\">".
											$val['name'].(is_array($st_new_arr) && isset($st_new_arr[$val['id']])?", ".$st_new_arr[$val['id']]:NULL)."</span></div></div></td>";
										if (!fmod(++$i,data::$max_stores))
										{
											print "</tr></table></div></td><td><div class=\"slide-cell\">
												<table cellspacing=\"".data::$scs."\" cellpadding=\"".data::$scs."\"><tr>";
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