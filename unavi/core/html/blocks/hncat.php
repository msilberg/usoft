<div class="hncat hncat-<?php print data::gvar("wdir") ?>">
	<table cellspacing="4" cellpadding="4">
	<?php
		$i=0;
		foreach (data::gvar("carr") as $val)
			print "<tr><td><div id=\"$i\" class=\"cbtn cbtn".($i++)." cbtn-pass\"><span>".
				$val['name_'.data::gvar("lang")]."</span></div></td></tr>";
	?>
		<tr>
			<td>
				<!-- Service icons button -->
				<div class="sibtn sibtn-pass">
					<div class="sibtn-frame">
						<div>
							<?php data::lbl_otp(10) ?>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<div class="drum-gifts drum-gifts-<?php print data::gvar("wdir") ?>" id="drum-gifts-list"></div>
<div class="hot-info hot-info-<?php print data::gvar("wdir") ?>"></div>