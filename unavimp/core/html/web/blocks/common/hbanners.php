<div class="bann-layer">
	<table cellspacing="2" cellpadding="3">
		<?php
			/*foreach (db::get_bann_stores() as $val)
			{
				print "<td><div id=\"$val\" class=\"bann-cell bann$val bann-pass\">
					<div class=\"bann-logo\" style=\"background-image:url(".data::gvar("get_image").
					db::get_logo_id($val).");\"></div></div></td>";
				if (++$n==data::gvar("bann_num")) break;
				if (!(++$i&1)) print "</tr><tr>";
			}*/
			for ($i=0;$i<7;$i++) print "<tr><td><div id=\"0\" class=\"bann-cell bann0\"><div class=\"bann-logo\"></div></div></td></tr>";
		?>
	</table>
</div>