<div class="bann-cont">
	<table cellpadding="2" cellspacing="2"><tr>
	<?php
		for ($i=1;$i<=data::$bann_no;$i++)
		{
			print "<td id=\"bann-cell-$i\"></td>";
			if (!fmod(++$j,2)) print "</tr><tr>";
		}
	?>
	</tr></table>
</div>