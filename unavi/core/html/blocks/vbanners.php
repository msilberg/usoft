<div class="bann-layer">
	<table cellspacing="5" cellpadding="3">
		<tr>
		<?php
			foreach (db::get_bann_stores() as $val)
			{
				print "<td><div id=\"$val\" class=\"bann-cell bann$val bann-pass\">
					<div class=\"bann-logo\" style=\"background-image:url(".data::gvar("get_image").
					db::get_logo_id($val).");\"></div></div></td>";
				if (++$n==data::gvar("bann_num")) break;
				if (!(++$i&1)) print "</tr><tr>";
			}
		?>
		</tr>
	</table>
</div>