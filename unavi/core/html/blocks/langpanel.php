<?php $wdir=data::gvar("wdir") ?>
<div class="lang-panel lang-panel-<?php print $wdir ?>">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="100%" cellspacing="7" cellpadding="7">
				<?php
					foreach (data::gvar("lang_arr") as $key=>$val)
						print "<tr><td align=\"center\" valign=\"middle\">
							<div class=\"lang-elem ".(($key==data::gvar("lang"))?"lang-elem-act\"":"lang-elem-pass\"")." id=\"$key\">$val</div></td></tr>";
				?>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<div class="lang-close">
					<div class="lang-up-arrow"></div>
				</div>
			</td>
		</tr>
	</table>
</div>