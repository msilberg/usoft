<?php 
	//service::history_insert(4)
	service::reset_slider();
?>
<div class="subcat-container subcat-container-<?php print data::gvar("wdir") ?>">
	<div class="slides-scope slides-scope-<?php print data::gvar("wdir") ?>" id="scats">
		<div class="slides-cont">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<div class="slide-cell">
							<table cellspacing="<?php print data::$scs ?>" cellpadding="<?php print data::$scs ?>">
							<?php
								$sc_arr=db::get_scat();
								$_SESSION['sc_num']=count($sc_arr);
								foreach ($sc_arr as $val)
								{
									print "<tr><td align=\"center\" valign=\"top\">
										<div id=\"".$val['id']."\" class=\"store-btn-bckgr store-btn-bckgr-pass\"><div class=\"store-btn-frame\">
										<div class=\"store-btn simple-list\">".$val['name_'.$_SESSION['lang']]."</div></div></div></td></tr>";
									if (!fmod(++$i,data::$max_scats))
									{
										print "</table></div></td><td><div class=\"slide-cell\">
												<table cellspacing=\"".data::$scs."\" cellpadding=\"".data::$scs."\">";
										$i=0;
									}
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