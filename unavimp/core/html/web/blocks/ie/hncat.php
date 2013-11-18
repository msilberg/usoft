<div class="hncat hncat-<?php print data::gvar("wdir") ?>">
	<table cellspacing="4" cellpadding="3">
	<?php
		$i=0;
		foreach (data::gvar("carr") as $val)
			print "<tr><td><div id=\"".$val['id']."\" class=\"cbtn cbtn".$val['id']." cbtn-pass\"><table cellspacing=\"0\" cellpadding=\"0\"><tr>
				<td class=\"cbtn-icon-cell\"><div class=\"cbtn-icon ci-cont".$val['id']."\" style=\"background-image:url(".
				data::gvar("traddr")."graphics/icons/".$val['id'].".png);\"></div></td>
				<td><div class=\"cbtn-name-table\"><div class=\"cbtn-name cn-cont".$val['id']."\">
				<span class=\"cname\">".$val['name_'.data::gvar("lang")]."<span></div></div></td>
				</tr></table></div></td></tr>";
	?>
		<!-- Service icons button -->
		<tr>
			<td>
				<div class="sibtn sibtn-pass">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class="sibtn-icon-cell">
								<div class="sibtn-icon" style="background-image: url(<?php print data::$traddr ?>graphics/icons/si.png);"></div>
							</td>
							<td>
								<div class="cbtn-name-table">
									<div class="sibtn-name">
										<span class="siname"><?php data::lbl_otp(10) ?></span>
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</div>