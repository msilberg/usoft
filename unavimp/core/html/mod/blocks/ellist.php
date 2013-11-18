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
						<div class="slide-cell sc-scats">
							<?php
								$no=0;
								$sc_arr=db::get_scat();
								$_SESSION['sc_num']=count($sc_arr);
								$arrh=service::get_slides_heigts();
							?>
							<table cellspacing="<?php print data::$scs ?>" cellpadding="<?php print data::$scs ?>" style="height:<?php print $arrh[0] ?>px;"><tr>
							<?php
								foreach ($sc_arr as $val)
								{
									print "<td align=\"center\" valign=\"top\">
										<div id=\"".$val['id']."\" class=\"store-btn-bckgr sb-scats-list store-btn-bckgr-pass\">
										<div id=\"sbf-scats\" class=\"store-btn-frame\">
										<div class=\"store-btn\">".$val['name_'.$_SESSION['lang']]."</div></div></div></td>";
									if (!fmod(++$i,data::$max_scats))
									{
										print "</table></div></td><td><div class=\"slide-cell sc-scats\">
												<table cellspacing=\"".data::$scs."\" cellpadding=\"".data::$scs."\" style=\"height:".$arrh[++$j]."px;\">";
										$i=0;
									}
									elseif (!fmod($i,data::$scats_cols)) print "</tr><tr>";
								}
							?>
							</tr></table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php data::loadblock("wallheader") ?>
</div>