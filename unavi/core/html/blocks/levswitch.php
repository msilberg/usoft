<?php
	$sup=data::lev_sup();
	$inf=data::lev_inf();
?>
<div class="lev-switch"<?php print ($sup || $inf)?" style=\"top:-2px;\"":NULL ?>>
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td class="back2root-cell">
				<div class="back2root">
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td class="lev-back-cell">
								<div class="lev-arrow lev-arrow-<?php print data::gvar("wdir") ?>"></div>
							</td>
							<td>
								<div class="lev-lbl-<?php print data::gvar("wdir") ?>">
									<?php data::lbl_otp(4) ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</td>
			<td class="la-cell">
				<div class="lau-layer<?php print ($sup)?" la-bckgr-act lau-frame-act":NULL ?>">
					<div class="la-frame">
						<div class="lev-arrow lev-arrow-up"<?php print ($sup)?" style=\"border-bottom-color:#222222;\"":NULL ?>></div>
					</div>
				</div>
			</td>
			<td class="la-cell">
				<div class="lad-layer<?php print ($inf)?" la-bckgr-act lad-frame-act-".data::gvar("wdir"):NULL ?>">
					<div class="la-frame">
						<div class="lev-arrow lev-arrow-down"<?php print ($inf)?" style=\"border-top-color:#222222;\"":NULL ?>></div>
					</div>
				</div>
			</td>
		</tr>
	</table>
	<div class="lev-separate ls1 ls1-<?php print data::gvar("wdir")."\"".(($sup)?" style=\"display:none;\"":(($inf)?" style=\"top:2px;\"":NULL))  ?>></div>
	<div class="lev-separate ls2 ls2-<?php print data::gvar("wdir")."\"".(($inf || $sup)?" style=\"display:none;\"":NULL)  ?>></div>
</div>